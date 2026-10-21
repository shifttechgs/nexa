<?php

namespace Tests\Feature;

use App\Mail\QuoteRequestReceived;
use Illuminate\Support\Facades\Mail;
use RuntimeException;
use Tests\TestCase;

class QuoteRequestMailTest extends TestCase
{
    public function test_quote_request_is_emailed_to_sales_with_reply_to_the_buyer(): void
    {
        Mail::fake();
        config(['services.quotes.to' => 'sales@example.test']);

        $this->post('/quote-requests', [
            'name' => 'Test Buyer',
            'company' => 'Kolwezi Copper',
            'email' => 'buyer@example.com',
            'service_interest' => 'Fuel & Energy',
            'message' => 'Diesel for the north pit.',
            'items' => [
                ['sku' => 'EXP-001', 'name' => 'Surface Bulk Emulsion', 'qty' => 20],
            ],
        ])->assertSessionHasNoErrors()->assertSessionHas('status', 'quote-request-sent');

        Mail::assertSent(QuoteRequestReceived::class, function (QuoteRequestReceived $mail) {
            $mail->assertHasReplyTo('buyer@example.com', 'Test Buyer');
            $mail->assertHasSubject('Quote request from Kolwezi Copper');
            $mail->assertSeeInHtml('Diesel for the north pit.');
            $mail->assertSeeInHtml('Surface Bulk Emulsion');
            $mail->assertSeeInHtml('EXP-001');

            return $mail->hasTo('sales@example.test');
        });
    }

    public function test_honeypot_submissions_are_dropped_silently(): void
    {
        Mail::fake();

        $this->post('/quote-requests', [
            'name' => 'Bot',
            'email' => 'bot@example.com',
            'message' => 'Buy now',
            'website' => 'http://spam.example',
        ])->assertSessionHas('status', 'quote-request-sent');

        Mail::assertNothingSent();
    }

    public function test_a_mail_failure_is_reported_and_keeps_the_buyers_input(): void
    {
        Mail::shouldReceive('to')->andThrow(new RuntimeException('SMTP down'));

        $this->post('/quote-requests', [
            'name' => 'Test Buyer',
            'email' => 'buyer@example.com',
            'message' => 'Diesel for the north pit.',
        ])
            ->assertSessionHas('status', 'quote-request-failed')
            ->assertSessionHasInput('message', 'Diesel for the north pit.');
    }
}
