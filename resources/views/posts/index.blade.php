<x-marketing-layout
    :title="'Insights'"
    :description="'Insights and updates from Nexa Mining and Engineering Services.'"
>
    <section class="bg-nexa-navy">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 sm:pt-20 pb-16">
            <p class="font-label text-sm uppercase tracking-[0.2em] text-nexa-green mb-4">Insights</p>
            <h1 class="font-display font-extrabold text-4xl sm:text-5xl text-white">From the field.</h1>
            <p class="mt-5 text-white/55 max-w-xl leading-relaxed">
                Practical notes on compliance, logistics, safety and supply from across our operations.
            </p>
        </div>
    </section>

    <section class="py-20">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            @if ($posts->isEmpty())
                <p class="text-nexa-ink/60">No insights published yet &mdash; check back soon.</p>
            @else
                <div class="border-t border-nexa-ink/15">
                    @foreach ($posts as $post)
                        <a href="{{ route('posts.show', $post) }}" class="grid sm:grid-cols-12 gap-4 sm:gap-8 py-7 border-b border-nexa-ink/15 group">
                            <div class="sm:col-span-2 font-mono text-xs text-nexa-ink/40">{{ $post->published_at->format('d.m.Y') }}</div>
                            <div class="sm:col-span-3">
                                @if ($post->category)
                                    <span class="font-mono text-[11px] uppercase tracking-wide text-nexa-green">{{ $post->category }}</span>
                                @endif
                            </div>
                            <div class="sm:col-span-7">
                                <h2 class="font-display font-semibold text-nexa-ink group-hover:text-nexa-green transition">{{ $post->title }}</h2>
                                <p class="mt-1.5 text-sm text-nexa-ink/55 leading-relaxed line-clamp-2">{{ $post->excerpt }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
</x-marketing-layout>
