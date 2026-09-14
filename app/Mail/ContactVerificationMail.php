<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactVerificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $otp;
    public string $recipientName;

    public function __construct(string $otp, string $recipientName = 'Client')
    {
        $this->otp = $otp;
        $this->recipientName = $recipientName;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Verify your ORDO email address',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contact-verification',
            text: 'emails.contact-verification-text',
            with: [
                'otp' => $this->otp,
                'recipientName' => $this->recipientName,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
