<?php

namespace App\Imports;

use App\Models\QueueSearch;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class TestImport implements ToModel, WithChunkReading, ShouldQueue
{
    public function model(array $row)
    {
        try {
            $data = [
                'salesforce_id'        => $row[0],
                'criteria_id'          => $row[1],
                'uule'                 => $row[2],
                'table_no'             => $row[3],
                'keyword_id'           => $row[4],
                'keyword_name'         => $row[5],
                'name'                 => $row[6],
                'location'             => $row[7],
                'address'              => $row[8],
                'geo_longitude'        => $row[9],
                'geo_latitude'         => $row[10],
                'geo_zoom'             => $row[11],
                'remuneration_ranking' => $row[12],
                'counter'              => rand(1, 20),
                'ranked_in_flag'       => 1,
                'date_at'              => $row[15],
                'delete_flag'          => $row[16],

            ];
            QueueSearch::create($data);
        } catch (\Exception $e) {
            info($e->getMessage());
        }
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
