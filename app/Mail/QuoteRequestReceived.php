<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

/**
 * A quote request from the contact page, sent to the sales inbox. Reply-To is
 * the buyer, so sales can answer straight from the email.
 */
class QuoteRequestReceived extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @param  array{name: string, company: ?string, email: string, phone: ?string, service_interest: ?string, message: ?string, items: ?array}  $request
     */
    public function __construct(public array $request)
    {
    }

    public function envelope(): Envelope
    {
        $from = $this->request['company'] ?: $this->request['name'];

        return new Envelope(
            replyTo: [new Address($this->request['email'], $this->request['name'])],
            subject: 'Quote request from '.$from,
        );
    }

    public function content(): Content
    {
        return new Content(markdown: 'mail.quote-request');
    }
}
