<x-marketing-layout
    :title="$post->title"
    :description="$post->excerpt"
>
    <section class="bg-nexa-navy">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 sm:pt-20 pb-16">
            <a href="{{ route('posts.index') }}" class="font-mono text-xs uppercase tracking-widest text-white/40 hover:text-white transition">
                &larr; All insights
            </a>

            <div class="mt-8 flex items-center gap-4">
                @if ($post->category)
                    <span class="font-mono text-[11px] uppercase tracking-wide text-nexa-green">{{ $post->category }}</span>
                @endif
                <span class="font-mono text-[11px] text-white/35">{{ $post->published_at->format('d.m.Y') }}</span>
            </div>

            <h1 class="mt-4 font-display font-extrabold text-3xl sm:text-5xl text-white leading-tight">{{ $post->title }}</h1>
        </div>
    </section>

    <section class="py-20">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-lg">
                @foreach (explode("\n\n", $post->body) as $paragraph)
                    <p class="text-nexa-ink/75 leading-relaxed mb-6">{{ $paragraph }}</p>
                @endforeach
            </div>

            <div class="mt-14 border border-nexa-ink/15 bg-nexa-navy p-8 sm:p-10 text-white flex flex-col sm:flex-row items-center justify-between gap-6">
                <div>
                    <p class="font-display font-semibold text-lg">Have a question about this?</p>
                    <p class="text-white/55 text-sm mt-1">Talk to our sales team directly.</p>
                </div>
                <a href="{{ route('home') }}#contact" class="inline-flex items-center gap-2 px-6 py-3 text-sm font-semibold text-white bg-nexa-green hover:bg-nexa-navy transition shrink-0">
                    Contact Us
                </a>
            </div>
        </div>
    </section>
</x-marketing-layout>
