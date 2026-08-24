@props(['testimonial'])

<div {{ $attributes->merge(['class' => 'border border-nexa-ink/15 bg-white p-6']) }}>
    <span class="font-display text-3xl font-black text-nexa-green leading-none">&ldquo;</span>
    <p class="mt-3 text-sm text-nexa-ink/70 leading-relaxed">{{ $testimonial->quote }}</p>
    <div class="mt-5 pt-4 border-t border-nexa-ink/10">
        <p class="font-display font-semibold text-nexa-ink text-sm">{{ $testimonial->name }}</p>
        <p class="font-mono text-[11px] uppercase tracking-wide text-nexa-ink/40 mt-0.5">
            {{ $testimonial->title }}{{ $testimonial->title && $testimonial->company ? ', ' : '' }}{{ $testimonial->company }}
        </p>
    </div>
</div>
