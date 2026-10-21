@props(['product'])

{{-- Catalogue card: flat white panel (no border, no shadow), meant to sit on a grey bg-nexa-bone band
     (the catalogue page sits it on white and passes a border).
     The title link covers the whole card; the quote button sits above it. --}}
<article {{ $attributes->merge(['class' => 'group relative flex flex-col bg-nexa-paper']) }}>
    <div class="relative aspect-[4/3] overflow-hidden bg-nexa-mist">
        <img
            src="{{ $product->imageUrl() }}"
            alt=""
            class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 group-hover:scale-105 group-active:scale-105"
            loading="lazy"
        >
    </div>

    <div class="flex flex-1 flex-col p-5 sm:p-6">
        <p class="text-[13px] font-medium text-nexa-green">{{ $product->category }}</p>
        <h3 class="mt-1.5 font-display font-medium text-lg leading-snug tracking-tight text-nexa-ink group-hover:text-nexa-green transition-colors duration-300">
            <a href="{{ route('products.show', $product) }}" class="after:absolute after:inset-0 focus:outline-none focus-visible:underline">
                {{ $product->name }}
            </a>
        </h3>
        <p class="mt-2 text-sm text-nexa-ink/60 leading-relaxed line-clamp-2">{{ $product->summary }}</p>

        @if ($product->specs)
            <dl class="mt-4 space-y-1 text-[13px]">
                @foreach ($product->specs as $label => $value)
                    <div class="flex justify-between gap-4">
                        <dt class="text-nexa-ink/50">{{ $label }}</dt>
                        <dd class="text-right text-nexa-ink">{{ $value }}</dd>
                    </div>
                @endforeach
            </dl>
        @endif

        <div class="mt-auto pt-5 flex items-center justify-between gap-3">
            <span class="text-xs text-nexa-ink/40">{{ $product->sku }}</span>
            <x-quote-toggle :product="$product" class="relative z-10" />
        </div>
    </div>
</article>
