<?php

namespace App\Models;

use Illuminate\Support\Collection;

/**
 * Sample client testimonials for this demo site — hardcoded, no database table.
 * These are placeholders, not real client quotes; swap the content for actual
 * client words when they're available.
 */
class Testimonial
{
    public function __construct(
        public string $quote,
        public string $name,
        public ?string $title = null,
        public ?string $company = null,
    ) {
    }

    public static function all(): Collection
    {
        return collect([
            new self(
                quote: '[Placeholder — replace with a real quote from a client about delivery reliability: did their order arrive on time and in full?]',
                name: 'Client Name',
                title: 'Job Title',
                company: 'Company Name',
            ),
            new self(
                quote: '[Placeholder — replace with a real quote about product or safety performance: how did our supplies hold up on site?]',
                name: 'Client Name',
                title: 'Job Title',
                company: 'Company Name',
            ),
            new self(
                quote: '[Placeholder — replace with a real quote about responsiveness or support: how did our sales/support team handle their request?]',
                name: 'Client Name',
                title: 'Job Title',
                company: 'Company Name',
            ),
        ]);
    }
}
