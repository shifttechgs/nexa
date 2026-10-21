<?php

namespace App\Models;

use Illuminate\Support\Collection;

/**
 * Client testimonials — hardcoded, no database table. The quotes are real but
 * came without the reviewers' names, so each one carries the theme it speaks
 * to; name, title and company show on the page once they're filled in.
 */
class Testimonial
{
    public function __construct(
        public string $quote,
        public string $topic,
        public ?string $name = null,
        public ?string $title = null,
        public ?string $company = null,
    ) {
    }

    public static function all(): Collection
    {
        return collect([
            new self(
                quote: 'Excellent service from Nexa Mining & Engineering. The team was professional, responsive, and committed to delivering quality work. Communication was clear throughout, and the overall experience was positive. I would recommend them to anyone looking for a reliable engineering partner.',
                topic: 'Professionalism & Service',
            ),
            new self(
                quote: 'Nexa Mining & Engineering demonstrated a strong commitment to quality and attention to detail. Their professional approach and focus on getting the job done properly made a great impression. A good team to work with.',
                topic: 'Quality & Workmanship',
            ),
            new self(
                quote: 'Great experience working with Nexa Mining & Engineering. The team communicated well, handled the process professionally, and showed a clear understanding of the work required. I appreciated their approach and would gladly consider working with them again.',
                topic: 'Communication & Reliability',
            ),
            new self(
                quote: 'I would recommend Nexa Mining & Engineering to businesses looking for professional engineering services. The team showed a positive attitude, took the work seriously, and maintained a professional standard throughout the engagement.',
                topic: 'Overall Recommendation',
            ),
        ]);
    }
}
