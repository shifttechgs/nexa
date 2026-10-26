<?php

namespace Tests\Feature;

use App\Models\Post;
use Tests\TestCase;

class ArticlesTest extends TestCase
{
    public function test_articles_index_lists_posts(): void
    {
        $this->get('/insights')
            ->assertOk()
            ->assertSee('Understanding OHADA Compliance for Regional Mining Suppliers')
            ->assertSee('min read');
    }

    public function test_article_page_shows_body_and_more_articles(): void
    {
        $this->get('/insights/ohada-compliance-regional-mining-suppliers')
            ->assertOk()
            ->assertSee('OHADA Common Court of Justice')
            ->assertSee('More articles')
            ->assertSee('Bulk Fuel Delivery');
    }

    public function test_article_page_renders_markdown_and_structured_data(): void
    {
        $this->get('/insights/bulk-fuel-delivery-choosing-a-partner')
            ->assertOk()
            ->assertSee('<h2 id="four-things-that-matter-more-than-price">', false)
            ->assertSee('<ol>', false)
            ->assertSee('"@type":"Article"', false);
    }

    public function test_markdown_body_escapes_raw_html(): void
    {
        $post = new Post(
            title: 'T',
            slug: 't',
            excerpt: 'E',
            body: "## Heading\n\n<script>alert(1)</script> and [bad](javascript:alert(1))",
            category: null,
            published_at: now(),
        );

        $html = $post->bodyHtml();

        $this->assertStringContainsString('<h2 id="heading">Heading</h2>', $html);
        $this->assertStringNotContainsString('<script>', $html);
        $this->assertStringNotContainsString('href="javascript:', $html);
    }

    public function test_unknown_article_is_404(): void
    {
        $this->get('/insights/not-an-article')->assertNotFound();
    }

    public function test_home_page_shows_latest_articles(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('Latest articles.')
            ->assertSee('View all articles');
    }
}
