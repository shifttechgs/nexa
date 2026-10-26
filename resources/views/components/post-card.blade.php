@props(['post'])

{{-- Article card: flat white panel (no border, no shadow) for a grey bg-nexa-bone band.
     The title link covers the whole card. --}}
<article {{ $attributes->merge(['class' => 'group relative flex flex-col bg-nexa-paper']) }}>
    <div class="relative aspect-[16/10] overflow-hidden bg-nexa-mist">
        <img
            src="{{ $post->imageUrl() }}"
            alt=""
            class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 group-hover:scale-105 group-active:scale-105"
            loading="lazy"
        >
    </div>

    <div class="flex flex-1 flex-col p-6 sm:p-7">
        <p class="text-[13px] text-nexa-ink/50">
            @if ($post->category)
                <span class="font-medium text-nexa-green">{{ $post->category }}</span>
                <span class="mx-1.5 text-nexa-ink/25">&middot;</span>
            @endif
            <time datetime="{{ $post->published_at->toDateString() }}">{{ $post->published_at->format('j M Y') }}</time>
            <span class="mx-1.5 text-nexa-ink/25">&middot;</span>
            {{ $post->readingMinutes() }} min read
        </p>

        <h3 class="mt-3 font-display font-medium text-xl leading-snug tracking-tight text-nexa-ink group-hover:text-nexa-green transition-colors duration-300">
            <a href="{{ route('posts.show', $post) }}" class="after:absolute after:inset-0 focus:outline-none focus-visible:underline">
                {{ $post->title }}
            </a>
        </h3>
        <p class="mt-3 text-sm text-nexa-ink/60 leading-relaxed line-clamp-3">{{ $post->excerpt }}</p>

        <span class="mt-auto pt-6 inline-flex items-center gap-1.5 text-sm font-semibold text-nexa-ink">
            Read article
            <span class="inline-block transition-transform duration-300 group-hover:translate-x-1" aria-hidden="true">&rarr;</span>
        </span>
    </div>
</article>
