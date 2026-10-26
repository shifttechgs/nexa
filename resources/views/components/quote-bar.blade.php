{{-- Floating quote-list summary; appears once a product is added, links to the quote form.
     Hidden while the quote form itself (#contact on the contact page) is on screen.
     "Clear" empties the list; the close button hides the bar for this browser session
     until another product is added. --}}
<div
    x-data="{
        atForm: false,
        dismissed: (() => { try { return sessionStorage.getItem('nexa-quote-bar-dismissed') === '1'; } catch (e) { return false; } })(),
        dismiss(value) {
            this.dismissed = value;
            try { value ? sessionStorage.setItem('nexa-quote-bar-dismissed', '1') : sessionStorage.removeItem('nexa-quote-bar-dismissed'); } catch (e) {}
        },
    }"
    x-init="
        const form = document.getElementById('contact');
        if (form) new IntersectionObserver(([entry]) => atForm = entry.isIntersecting, { threshold: 0.15 }).observe(form);
        $watch('$store.quote.count', (count, previous) => { if (count > previous) dismiss(false); });
    "
    x-show="$store.quote.count > 0 && !atForm && !dismissed"
    x-cloak
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 translate-y-4"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 translate-y-4"
    class="fixed inset-x-4 bottom-4 z-40 sm:inset-x-auto sm:right-6 sm:bottom-6"
    role="region"
    aria-label="Quote list"
>
    <div class="flex items-center justify-between gap-4 bg-nexa-navy text-white pl-5 pr-2 py-2 shadow-2xl shadow-black/30 ring-1 ring-white/10">
        <div class="min-w-0">
            <p class="text-sm" aria-live="polite">
                <span class="font-semibold" x-text="$store.quote.count"></span>
                <span x-text="$store.quote.count === 1 ? 'product in your quote' : 'products in your quote'"></span>
            </p>
            <button type="button" @click="$store.quote.clear()" class="text-xs text-white/50 hover:text-white underline underline-offset-2 transition-colors">
                Clear list
            </button>
        </div>
        <div class="flex items-center gap-1 shrink-0">
            <a href="{{ route('contact') }}#quote-form" class="inline-flex items-center gap-1.5 bg-nexa-green px-4 py-2.5 text-sm font-semibold hover:bg-white hover:text-nexa-navy transition-colors">
                Send quote request <span aria-hidden="true">&rarr;</span>
            </a>
            <button
                type="button"
                @click="dismiss(true)"
                class="flex h-10 w-10 items-center justify-center text-white/55 hover:text-white hover:bg-white/10 transition-colors"
                aria-label="Hide quote bar"
            >
                <svg viewBox="0 0 20 20" class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" aria-hidden="true"><path d="M5 5l10 10M15 5 5 15"/></svg>
            </button>
        </div>
    </div>
</div>
