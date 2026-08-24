<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * These are placeholders, not real client quotes — is_placeholder stays true
     * until someone replaces the content with an actual client's words and swaps
     * this flag to false. The homepage shows a dev-only warning banner (visible
     * only when APP_DEBUG=true) for as long as any published testimonial here
     * is still flagged as a placeholder.
     */
    public function run(): void
    {
        $placeholders = [
            [
                'quote' => '[Placeholder — replace with a real quote from a client about delivery reliability: did their order arrive on time and in full?]',
                'name' => 'Client Name',
                'title' => 'Job Title',
                'company' => 'Company Name',
                'sort' => 1,
            ],
            [
                'quote' => '[Placeholder — replace with a real quote about product or safety performance: how did our supplies hold up on site?]',
                'name' => 'Client Name',
                'title' => 'Job Title',
                'company' => 'Company Name',
                'sort' => 2,
            ],
            [
                'quote' => '[Placeholder — replace with a real quote about responsiveness or support: how did our sales/support team handle their request?]',
                'name' => 'Client Name',
                'title' => 'Job Title',
                'company' => 'Company Name',
                'sort' => 3,
            ],
        ];

        foreach ($placeholders as $data) {
            Testimonial::updateOrCreate(
                ['sort' => $data['sort']],
                $data + ['is_placeholder' => true, 'published' => true]
            );
        }
    }
}
