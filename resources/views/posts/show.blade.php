@php
    $url = route('posts.show', $post);
@endphp

<x-marketing-layout
    :title="$post->title"
    :description="$post->excerpt"
>
    <x-slot:head>
        <meta property="og:type" content="article">
        <meta property="og:title" content="{{ $post->title }}">
        <meta property="og:description" content="{{ $post->excerpt }}">
        <meta property="og:url" content="{{ $url }}">
        <meta property="og:image" content="{{ $post->imageUrl() }}">
        <meta property="article:published_time" content="{{ $post->published_at->toIso8601String() }}">
        <meta name="twitter:card" content="summary_large_image">
        <script type="application/ld+json">{!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'Article',
            'headline' => $post->title,
            'description' => $post->excerpt,
            'image' => $post->imageUrl(),
            'datePublished' => $post->published_at->toIso8601String(),
            'articleSection' => $post->category,
            'mainEntityOfPage' => $url,
            'publisher' => ['@type' => 'Organization', 'name' => 'Nexa Mining and Engineering Services'],
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG) !!}</script>
    </x-slot:head>

    <!-- Header -->
    <section class="bg-nexa-navy">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 pt-28 sm:pt-32 pb-28">
            <a href="{{ route('posts.index') }}" class="text-sm text-white/45 hover:text-white transition">&larr; All articles</a>

            <p class="mt-8 text-sm text-white/50">
                @if ($post->category)
                    <span class="font-medium text-nexa-green">{{ $post->category }}</span>
                    <span class="mx-1.5 text-white/25">&middot;</span>
                @endif
                <time datetime="{{ $post->published_at->toDateString() }}">{{ $post->published_at->format('j F Y') }}</time>
                <span class="mx-1.5 text-white/25">&middot;</span>
                {{ $post->readingMinutes() }} min read
            </p>

            <h1 class="mt-4 font-display font-medium text-3xl sm:text-5xl tracking-tight text-white leading-tight text-balance">{{ $post->title }}</h1>
        </div>
    </section>

    <section class="pb-20">
        <!-- Photo, overlapping the header -->
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="-mt-16 relative aspect-[16/9] overflow-hidden bg-nexa-mist">
                <img src="{{ $post->imageUrl() }}" alt="" class="absolute inset-0 h-full w-full object-cover">
            </div>
        </div>

        <div class="mt-14 max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <article class="article-body">
                {!! $post->bodyHtml() !!}
            </article>
        </div>
    </section>

    {{-- Light when nothing follows it, so it doesn't run into the navy footer --}}
    <x-sales-cta
        :tone="$more->isEmpty() ? 'light' : 'dark'"
        heading="Have a question about this?"
        copy="Our sales team can talk it through with you and point you to the right products for your site."
    />

    @if ($more->isNotEmpty())
        <section class="bg-nexa-bone py-20">
            <div class="site-container">
                <div class="flex items-end justify-between gap-4">
                    <h2 class="font-display font-medium text-2xl sm:text-3xl tracking-tight text-nexa-ink">More articles</h2>
                    <a href="{{ route('posts.index') }}" class="shrink-0 text-sm font-semibold text-nexa-ink border-b border-nexa-ink/30 hover:border-nexa-ink pb-0.5 transition">View all</a>
                </div>
                <div class="mt-8 grid gap-4 lg:gap-6 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($more as $item)
                        <x-post-card :post="$item" />
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</x-marketing-layout>
