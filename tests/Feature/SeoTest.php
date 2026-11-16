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

    public function test_product_page_publishes_product_and_breadcrumb_schema(): void
    {
        $this->get('/products/surface-bulk-emulsion')
            ->assertOk()
            ->assertSee('"@type":"Product"', false)
            ->assertSee('"sku":"EXP-001"', false)
            ->assertSee('"@type":"BreadcrumbList"', false);
    }

    public function test_titles_add_the_brand_only_when_it_fits(): void
    {
        $this->get('/')->assertSee('<title>Mining Supply in the DRC and Southern Africa | Nexa Mining</title>', false);
        $this->get('/contact')->assertSee('<title>Contact | Nexa Mining &amp; Engineering</title>', false);
        $this->get('/insights/ohada-compliance-regional-mining-suppliers')
            ->assertSee('<title>Understanding OHADA Compliance for Regional Mining Suppliers</title>', false);
    }

    public function test_fonts_are_self_hosted(): void
    {
        $this->get('/')
            ->assertSee('rel="preload"', false)
            ->assertDontSee('fontshare.com', false)
            ->assertDontSee('fonts.googleapis.com', false);
    }

    public function test_home_page_publishes_faq_schema(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('"@context":"https://schema.org","@type":"FAQPage"', false)
            ->assertSee('What countries do you deliver to?');
    }
}
