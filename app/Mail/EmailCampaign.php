<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Campaign;
use App\Models\CampaignMail;


class EmailCampaign extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Campaign $campaign, public CampaignMail $mail)
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
            with: [
                'body' => $this->getBody(),
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }

    public function getBody(): string
    {
        $body = $this->campaign->body;
        $pattern = '/href="([^"]*)"/';
        preg_match_all($pattern, $body, $matches);

        foreach ($matches[1] as $index => $oldValue) {
            $newValue = 'href="'.route('tracking.clicks', ['mail' => $this->mail, 'f' => $oldValue]).'"';
            $body = str_replace($matches[0][$index], $newValue, $body);
        }

        return $body;
    }
}
