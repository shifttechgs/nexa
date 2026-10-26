<?php

namespace Tests\Feature;

use Tests\TestCase;

class RegionsTest extends TestCase
{
    public function test_region_page_shows_mining_areas_and_office(): void
    {
        $this->get('/regions/drc')
            ->assertOk()
            ->assertSee('Where the mines are')
            ->assertSee('Haut-Katanga')
            ->assertSee('No. 32 Avenue Mwange, Golf Plateau')
            ->assertSee(route('regions.show', 'zambia'), false);
    }

    public function test_region_without_office_says_where_it_is_supplied_from(): void
    {
        $this->get('/regions/zimbabwe')
            ->assertOk()
            ->assertSee('Great Dyke')
            ->assertSee('Supplied from');
    }

    public function test_unknown_region_is_not_found(): void
    {
        $this->get('/regions/atlantis')->assertNotFound();
    }

    public function test_home_and_footer_link_to_region_pages(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('href="'.route('regions.show', 'south-africa').'"', false);
    }
}
