@props([
    'heading' => 'Need pricing on something specific?',
    'copy' => "Tell us what you're sourcing and our sales team will send you a quote. Product codes and quantities help us reply faster.",
    // 'dark' (navy) mid-page; 'light' when the band sits directly above the navy footer
    'tone' => 'dark',
    // background for the light tone: 'bg-nexa-bone' (grey) or 'bg-nexa-paper' (white), to contrast with the section above
    'lightBg' => 'bg-nexa-bone',
])

@php
    $dark = $tone !== 'light';
    $c = $dark
        ? ['bg' => 'bg-nexa-navy', 'heading' => 'text-white', 'copy' => 'text-white/65', 'link' => 'text-white/80 hover:text-white border-white/30 hover:border-white', 'rule' => 'border-white/15 divide-white/15', 'label' => 'text-white/45', 'value' => 'text-white', 'muted' => 'text-white/80', 'button' => 'primary-on-dark']
        : ['bg' => $lightBg, 'heading' => 'text-nexa-ink', 'copy' => 'text-nexa-ink/65', 'link' => 'text-nexa-ink/80 hover:text-nexa-ink border-nexa-ink/30 hover:border-nexa-ink', 'rule' => 'border-nexa-line divide-nexa-line', 'label' => 'text-nexa-ink/50', 'value' => 'text-nexa-ink', 'muted' => 'text-nexa-ink/75', 'button' => 'navy'];
@endphp

{{-- Sales band: statement + actions on the left, direct routes to the sales team on the right.
     Shared by the home, services, products and article pages. --}}
<section {{ $attributes->merge(['class' => $c['bg']]) }}>
    <div
        class="site-container py-20 sm:py-28 grid lg:grid-cols-12 gap-12 lg:gap-8 lg:items-end"
        data-reveal x-data="{ shown: false }" x-intersect.once="shown = true" :class="{ 'is-revealed': shown }"
    >
        <div class="lg:col-span-7">
            <h2 class="font-display font-medium text-3xl sm:text-5xl lg:text-[3.5rem] leading-[1.06] tracking-tight text-balance {{ $c['heading'] }}">
                {{ $heading }}
            </h2>
            <p class="mt-6 max-w-md leading-relaxed {{ $c['copy'] }}">{{ $copy }}</p>
            <div class="mt-9 flex flex-wrap items-center gap-x-7 gap-y-4">
                <x-btn :href="route('contact')" :variant="$c['button']">Request a Quote</x-btn>
                @unless (request()->routeIs('products.index'))
                    <a href="{{ route('products.index') }}" class="text-sm font-semibold border-b pb-0.5 transition-colors {{ $c['link'] }}">Browse the catalogue</a>
                @endunless
            </div>
        </div>

        <dl class="lg:col-span-4 lg:col-start-9 border-t divide-y text-sm {{ $c['rule'] }}">
            <div class="py-5">
                <dt class="{{ $c['label'] }}">Email sales</dt>
                <dd class="mt-1"><a href="mailto:sales@nexaminingservices.com" class="font-display text-lg hover:text-nexa-green transition-colors {{ $c['value'] }}">sales@nexaminingservices.com</a></dd>
            </div>
            <div class="py-5">
                <dt class="{{ $c['label'] }}">WhatsApp</dt>
                <dd class="mt-1"><a href="https://wa.me/27837915713" target="_blank" rel="noopener noreferrer" class="font-display text-lg hover:text-nexa-green transition-colors {{ $c['value'] }}">+27 83 791 5713</a></dd>
            </div>
            <div class="py-5">
                <dt class="{{ $c['label'] }}">Offices</dt>
                <dd class="mt-1 {{ $c['muted'] }}">Lubumbashi, DRC &middot; Johannesburg, RSA</dd>
            </div>
        </dl>
    </div>
</section>
