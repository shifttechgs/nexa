<?php

namespace Tests\Feature;

use Tests\TestCase;

class SeoTest extends TestCase
{
    public function test_sitemap_lists_pages_products_regions_and_articles(): void
    {
        $this->get('/sitemap.xml')
            ->assertOk()
            ->assertHeader('Content-Type', 'application/xml; charset=UTF-8')
            ->assertSee(route('products.show', 'surface-bulk-emulsion'), false)
            ->assertSee(route('regions.show', 'zimbabwe'), false)
            ->assertSee(route('contact'), false);
    }

    public function test_robots_blocks_crawlers_outside_production(): void
    {
        $this->get('/robots.txt')->assertOk()->assertSee('Disallow: /');
    }

    public function test_robots_points_to_sitemap_in_production(): void
    {
        $this->app['env'] = 'production';

        $this->get('/robots.txt')
            ->assertOk()
            ->assertDontSee('Disallow: /')
            ->assertSee('Sitemap: '.route('sitemap'));
    }

    public function test_pages_have_canonical_social_tags_and_organization_schema(): void
    {
        $this->get('/products?category=Explosives')
            ->assertOk()
            ->assertSee('<link rel="canonical" href="'.route('products.index').'">', false)
            ->assertSee('property="og:image"', false)
            ->assertSee('"@type":"Organization"', false)
            ->assertSee('393 Diamond Drive', false);
    }

    public function test_home_page_publishes_faq_schema(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('"@context":"https://schema.org","@type":"FAQPage"', false)
            ->assertSee('What countries do you deliver to?');
    }
}
