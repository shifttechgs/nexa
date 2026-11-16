<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Product;
use App\Models\Region;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    /** Every public page, built from the same data the pages use, so new products or articles appear automatically. */
    public function sitemap(): Response
    {
        $urls = collect([
            ['loc' => route('home'), 'priority' => '1.0'],
            ['loc' => route('services.index'), 'priority' => '0.9'],
            ['loc' => route('products.index'), 'priority' => '0.9'],
            ['loc' => route('contact'), 'priority' => '0.8'],
            ['loc' => route('posts.index'), 'priority' => '0.6'],
        ])
            ->merge(Region::all()->map(fn (Region $region) => ['loc' => route('regions.show', $region->slug), 'priority' => '0.8']))
            ->merge(Product::all()->map(fn (Product $product) => ['loc' => route('products.show', $product), 'priority' => '0.7']))
            ->merge(Post::all()->map(fn (Post $post) => [
                'loc' => route('posts.show', $post),
                'lastmod' => $post->published_at->toDateString(),
                'priority' => '0.6',
            ]));

        return response()
            ->view('sitemap', ['urls' => $urls])
            ->header('Content-Type', 'application/xml; charset=UTF-8');
    }

    public function robots(): Response
    {
        // Keep local and staging copies out of search results; anything else (production) is open.
        $lines = app()->environment(['local', 'testing', 'staging'])
            ? ['User-agent: *', 'Disallow: /']
            : ['User-agent: *', 'Disallow:', '', 'Sitemap: '.route('sitemap')];

        return response(implode("\n", $lines)."\n")->header('Content-Type', 'text/plain; charset=UTF-8');
    }
}
