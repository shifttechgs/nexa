@props(['product'])

{{-- Adds / removes a product from the quote list ($store.quote, resources/js/app.js) --}}
<button
    type="button"
    @click.prevent="$store.quote.toggle(@js($product->sku), @js($product->name))"
    :aria-pressed="$store.quote.has(@js($product->sku)).toString()"
    {{ $attributes->merge(['class' => 'inline-flex items-center gap-1.5 px-3.5 py-2 text-sm font-semibold transition-colors duration-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-nexa-green/50']) }}
    :class="$store.quote.has(@js($product->sku))
        ? 'bg-nexa-green text-white hover:bg-nexa-green-dark'
        : 'border border-nexa-ink/25 text-nexa-ink hover:border-nexa-ink'"
>
    <span x-show="!$store.quote.has(@js($product->sku))">+ Add to quote</span>
    <span x-show="$store.quote.has(@js($product->sku))" x-cloak>&check; In your quote</span>
</button>
