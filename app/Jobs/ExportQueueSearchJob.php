<?php

namespace App\Jobs;

use App\Mail\EmailMaster;
use App\Models\QueueSearch;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;

class ExportQueueSearchJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(private $data)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $data = QueueSearch::offset($this->data['offset'])->limit($this->data['chunkSize'])->get();
        $path = storage_path('app/exports/' . $this->data['fileName']);
        $fileExport = fopen($path, 'a');
        foreach ($data as $item) {
            $item = $item->toArray();
            fputcsv($fileExport, $item);
        }
        fclose($fileExport);
        // Send mail if finish write file.
        if ($this->data['isLastest']) {
            // Move file from storage to public folder.
            $newPath = public_path('exports/' . $this->data['fileName']);
            rename($path, $newPath);
            $mailData = [
                'subject' => 'Your export was successfull!',
                'to' => $this->data['email'],
                'view' => 'email.notifications',
                'with' => [
                    'file_path' => asset('exports/' . $this->data['fileName'])
                ]
            ];
            Mail::send(new EmailMaster($mailData));
        }
    }
}
