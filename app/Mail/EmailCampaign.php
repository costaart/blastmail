<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Campaign;


class EmailCampaign extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Campaign $campaign)
    {
        
    }


    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->campaign->subject,
        );
    }


    public function content(): Content
    {
        return new Content(
            markdown: 'mail.email-campaign',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
