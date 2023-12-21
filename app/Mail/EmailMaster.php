<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmailMaster extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(private $data = [])
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: $this->data['from'] ?? null,
            to: $this->data['to'] ?? [],
            cc: $this->data['cc'] ?? [],
            bcc: $this->data['bcc'] ?? [],
            replyTo: $this->data['replyTo'] ?? [],
            subject: $this->data['subject'] ?? null,
            tags: $this->data['replyTo'] ?? [],
            metadata: $this->data['replyTo'] ?? [],
            using: $this->data['replyTo'] ?? [],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: $this->data['view'] ?? null,
            html: $this->data['html'] ?? null,
            text: $this->data['text'] ?? null,
            markdown: $this->data['markdown'] ?? null,
            with: $this->data['with'] ?? [],
            htmlString: $this->data['htmlString'] ?? null,
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
