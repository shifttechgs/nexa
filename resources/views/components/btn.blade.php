@props([
    'href' => null,
    'variant' => 'primary',
    'arrow' => true,
    'size' => 'md',
])

@php
    $base = 'group inline-flex items-center gap-2 font-semibold transition-colors duration-200 rounded-none focus:outline-none focus-visible:ring-2 focus-visible:ring-nexa-green/50 focus-visible:ring-offset-2';

    $sizes = [
        'md' => 'px-6 py-3.5 text-sm',
        'sm' => 'px-5 py-2.5 text-sm',
    ];

    $variants = [
        'primary' => 'bg-nexa-green text-white hover:bg-nexa-navy',
        'navy' => 'bg-nexa-navy text-white hover:bg-nexa-green',
        'light' => 'bg-white text-nexa-navy hover:bg-nexa-navy hover:text-white',
        'outline' => 'border border-nexa-ink/25 text-nexa-ink hover:border-nexa-ink hover:bg-nexa-ink/[0.04]',
        'outline-light' => 'border border-white/25 text-white hover:border-white hover:bg-white/5',
    ];

    $classes = $base.' '.($sizes[$size] ?? $sizes['md']).' '.($variants[$variant] ?? $variants['primary']);
    $tag = $href ? 'a' : 'button';
@endphp

<{{ $tag }}
    @if ($href) href="{{ $href }}" @else type="{{ $attributes->get('type', 'button') }}" @endif
    {{ $attributes->except('type')->merge(['class' => $classes]) }}
>
    {{ $slot }}
    @if ($arrow)
        <span aria-hidden="true" class="inline-block transition-transform duration-300 group-hover:translate-x-1">&rarr;</span>
    @endif
</{{ $tag }}>
