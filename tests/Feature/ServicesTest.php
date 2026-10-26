<?php

namespace Tests\Feature;

use Tests\TestCase;

class ServicesTest extends TestCase
{
    public function test_services_page_lists_every_service(): void
    {
        $this->get('/services')
            ->assertOk()
            ->assertSee('Mining &amp; Industrial Supply', false)
            ->assertSee('id="fuel-energy"', false)
            ->assertSee("What's included", false)
            ->assertSee('Training');
    }

    public function test_header_services_link_goes_to_services_page(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('href="'.route('services.index').'#fuel-energy"', false)
            ->assertSee('All services');
    }

    public function test_quote_form_preselects_service_from_query(): void
    {
        $this->get('/contact?service='.urlencode('Fuel & Energy'))
            ->assertOk()
            ->assertSee('name="service_interest" :value="value" value="Fuel &amp; Energy"', false);
    }
}
