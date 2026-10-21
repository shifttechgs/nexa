<x-marketing-layout
    :title="'Contact'"
    :description="'Request a quote from Nexa Mining and Engineering Services, or contact our sales team in Lubumbashi and Johannesburg.'"
>
    <!-- Quote form + direct contacts over the quarry photo; this section is the page header -->
    <section id="contact" class="relative pt-28 sm:pt-32 pb-24 bg-nexa-navy overflow-hidden">
        <img
            src="{{ asset('images/photos/hero-quarry-1920.jpg') }}"
            srcset="{{ asset('images/photos/hero-quarry-1280.jpg') }} 1280w, {{ asset('images/photos/hero-quarry-1920.jpg') }} 1920w, {{ asset('images/photos/hero-quarry-2560.jpg') }} 2560w, {{ asset('images/photos/hero-quarry-3200.jpg') }} 3200w"
            sizes="100vw"
            alt=""
            aria-hidden="true"
            class="absolute inset-0 h-full w-full object-cover"
            fetchpriority="high"
        >
        <div class="contact-grade absolute inset-0"></div>

        <div class="relative site-container">
            <div class="grid lg:grid-cols-2 gap-14 lg:gap-20 items-stretch">

                <div class="flex flex-col" data-reveal x-data="{ shown: false }" x-intersect.once="shown = true" :class="{ 'is-revealed': shown }">
                    <div>
                        <nav aria-label="Breadcrumb" class="text-sm text-white/45">
                            <a href="{{ route('home') }}" class="hover:text-white transition">Home</a>
                            <span class="mx-2 text-white/25">/</span>
                            <span class="text-white/75" aria-current="page">Contact</span>
                        </nav>
                        <h1 class="mt-6 font-display font-medium text-4xl sm:text-5xl lg:text-6xl tracking-tightest text-white max-w-md">Get a quote.</h1>
                        <p class="mt-5 text-white/55 leading-relaxed max-w-sm">
                            Tell us what you need and our sales team will reply. You can also reach us directly.
                        </p>
                    </div>

                    <dl class="mt-16 lg:mt-auto border-t border-white/10 divide-y divide-white/10 text-sm">
                        <div class="flex items-center justify-between gap-6 py-4">
                            <dt class="font-mono text-[11px] uppercase tracking-widest text-white/35 shrink-0">Email</dt>
                            <dd class="text-right"><a href="mailto:sales@nexaminingservices.com" class="font-semibold text-white hover:text-nexa-green transition">sales@nexaminingservices.com</a></dd>
                        </div>
                        <div class="flex items-center justify-between gap-6 py-4">
                            <dt class="font-mono text-[11px] uppercase tracking-widest text-white/35 shrink-0">WhatsApp</dt>
                            <dd class="text-right"><a href="https://wa.me/27837915713" target="_blank" rel="noopener noreferrer" class="font-semibold text-white hover:text-nexa-green transition">+27 83 791 5713</a></dd>
                        </div>
                        <div class="flex items-center justify-between gap-6 py-4">
                            <dt class="font-mono text-[11px] uppercase tracking-widest text-white/35 shrink-0">Head Office</dt>
                            <dd class="font-semibold text-white text-right">No. 32 Avenue Mwange, Golf Plateau, Commune Annexe, Lubumbashi, DRC</dd>
                        </div>
                        <div class="flex items-center justify-between gap-6 py-4">
                            <dt class="font-mono text-[11px] uppercase tracking-widest text-white/35 shrink-0">South Africa Office</dt>
                            <dd class="font-semibold text-white text-right">16 Caithness Road, Blairgowrie, 2194, RSA</dd>
                        </div>
                    </dl>
                </div>

                <div id="quote-form" class="scroll-mt-[96px] lg:scroll-mt-[112px] bg-nexa-paper p-8 sm:p-10" data-reveal x-data="{ shown: false }" x-intersect.once="shown = true" :class="{ 'is-revealed': shown }">
                    @if (session('status') === 'quote-request-sent')
                        <div class="mb-6 border border-nexa-green/30 bg-nexa-green/5 px-5 py-4 text-sm font-medium text-nexa-green-dark" x-data x-init="$store.quote.clear()">
                            Thanks, we've received your request. Our sales team will be in touch shortly.
                        </div>
                    @elseif (session('status') === 'quote-request-failed')
                        <div class="mb-6 border border-nexa-red/30 bg-nexa-red/5 px-5 py-4 text-sm font-medium text-nexa-red" role="alert">
                            Sorry, your request didn't go through. Please try again, or email it to
                            <a href="mailto:{{ config('services.quotes.to') }}" class="underline underline-offset-2">{{ config('services.quotes.to') }}</a>.
                        </div>
                    @endif

                    @php
                        $field ='w-full border-0 border-b border-nexa-ink/20 rounded-none bg-transparent px-0 py-2 text-nexa-ink placeholder:text-nexa-ink/30 focus:ring-0 focus:border-nexa-green transition-colors';
                    @endphp

                    <form method="POST" action="{{ route('quote-requests.store') }}" class="grid sm:grid-cols-2 gap-x-8 gap-y-7">
                        @csrf

                        {{-- Honeypot: hidden from people and screen readers, so only bots fill it in --}}
                        <div class="hidden" aria-hidden="true">
                            <label for="website">Website</label>
                            <input id="website" name="website" type="text" tabindex="-1" autocomplete="off">
                        </div>

                        <div class="sm:col-span-1">
                            <label for="name" class="block font-mono text-[11px] uppercase tracking-widest text-nexa-ink/50 mb-2">Full name</label>
                            <input id="name" name="name" type="text" value="{{ old('name') }}" required placeholder="John Doe"
                                class="{{ $field }}">
                            @error('name') <p class="mt-1.5 text-xs text-nexa-red">{{ $message }}</p> @enderror
                        </div>

                        <div class="sm:col-span-1">
                            <label for="company" class="block font-mono text-[11px] uppercase tracking-widest text-nexa-ink/50 mb-2">Company</label>
                            <input id="company" name="company" type="text" value="{{ old('company') }}" placeholder="Company name"
                                class="{{ $field }}">
                            @error('company') <p class="mt-1.5 text-xs text-nexa-red">{{ $message }}</p> @enderror
                        </div>

                        <div class="sm:col-span-1">
                            <label for="email" class="block font-mono text-[11px] uppercase tracking-widest text-nexa-ink/50 mb-2">Email</label>
                            <input id="email" name="email" type="email" value="{{ old('email') }}" required placeholder="name@company.com"
                                class="{{ $field }}">
                            @error('email') <p class="mt-1.5 text-xs text-nexa-red">{{ $message }}</p> @enderror
                        </div>

                        <div class="sm:col-span-1">
                            <label for="phone" class="block font-mono text-[11px] uppercase tracking-widest text-nexa-ink/50 mb-2">Phone</label>
                            <input id="phone" name="phone" type="text" value="{{ old('phone') }}" placeholder="+27 00 000 0000"
                                class="{{ $field }}">
                            @error('phone') <p class="mt-1.5 text-xs text-nexa-red">{{ $message }}</p> @enderror
                        </div>

                        {{-- Service of interest: custom listbox in place of a native <select> so the open list matches the form.
                             The choice is submitted through the hidden input; ?service= pre-selects it when it names a real service. --}}
                        @php
                            $serviceTitles = \App\Models\Service::all()->pluck('title');
                            $chosenService = old('service_interest', request('service'));
                            $chosenService = $serviceTitles->contains($chosenService) ? $chosenService : '';
                        @endphp
                        <div
                            class="sm:col-span-2 relative"
                            x-data="{
                                open: false,
                                value: @js($chosenService),
                                options: @js($serviceTitles->values()),
                                highlighted: 0,
                                show() {
                                    this.open = true;
                                    this.highlighted = Math.max(0, this.options.indexOf(this.value));
                                    this.$nextTick(() => this.$refs.list.focus());
                                },
                                choose(option) {
                                    this.value = option;
                                    this.open = false;
                                    this.$refs.button.focus();
                                },
                                move(step) {
                                    this.highlighted = (this.highlighted + step + this.options.length) % this.options.length;
                                },
                            }"
                            @click.outside="open = false"
                        >
                            <span id="service_interest_label" class="block font-mono text-[11px] uppercase tracking-widest text-nexa-ink/50 mb-2">Service of interest</span>
                            <input type="hidden" name="service_interest" :value="value" value="{{ $chosenService }}">
                            <button
                                type="button"
                                x-ref="button"
                                @click="open ? open = false : show()"
                                @keydown.arrow-down.prevent="open ? move(1) : show()"
                                @keydown.arrow-up.prevent="open ? move(-1) : show()"
                                aria-haspopup="listbox"
                                :aria-expanded="open.toString()"
                                aria-labelledby="service_interest_label service_interest_value"
                                class="flex w-full items-center justify-between gap-4 border-b py-2 text-left transition-colors focus:outline-none"
                                :class="open ? 'border-nexa-green' : 'border-nexa-ink/20 focus:border-nexa-green'"
                            >
                                <span id="service_interest_value" :class="value ? 'text-nexa-ink' : 'text-nexa-ink/30'" x-text="value || 'Select a service…'">{{ $chosenService ?: 'Select a service…' }}</span>
                                <svg viewBox="0 0 12 12" class="h-3 w-3 shrink-0 text-nexa-ink/45 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true"><path d="m2.5 4.5 3.5 3.5 3.5-3.5"/></svg>
                            </button>
                            <ul
                                x-ref="list"
                                x-cloak
                                x-show="open"
                                x-transition.opacity.duration.150ms
                                role="listbox"
                                tabindex="-1"
                                aria-labelledby="service_interest_label"
                                :aria-activedescendant="'service-option-' + highlighted"
                                @keydown.arrow-down.prevent="move(1)"
                                @keydown.arrow-up.prevent="move(-1)"
                                @keydown.home.prevent="highlighted = 0"
                                @keydown.end.prevent="highlighted = options.length - 1"
                                @keydown.enter.prevent="choose(options[highlighted])"
                                @keydown.space.prevent="choose(options[highlighted])"
                                @keydown.escape.prevent="open = false; $refs.button.focus()"
                                @keydown.tab="open = false"
                                class="absolute inset-x-0 top-full z-20 mt-1 bg-nexa-paper border border-nexa-line shadow-[0_12px_32px_-12px_rgba(11,35,64,0.25)] focus:outline-none"
                            >
                                <template x-for="(option, i) in options" :key="option">
                                    <li
                                        :id="'service-option-' + i"
                                        role="option"
                                        :aria-selected="(value === option).toString()"
                                        @click="choose(option)"
                                        @mouseenter="highlighted = i"
                                        class="flex cursor-pointer items-center justify-between gap-4 border-b border-nexa-line last:border-b-0 px-4 py-3 text-[15px] transition-colors"
                                        :class="highlighted === i ? 'bg-nexa-bone text-nexa-ink' : 'text-nexa-ink/80'"
                                    >
                                        <span x-text="option"></span>
                                        <svg x-show="value === option" viewBox="0 0 16 16" class="h-3.5 w-3.5 shrink-0 text-nexa-green" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m3.5 8.5 3 3 6-7"/></svg>
                                    </li>
                                </template>
                            </ul>
                            @error('service_interest') <p class="mt-1.5 text-xs text-nexa-red">{{ $message }}</p> @enderror
                        </div>

                        {{-- Quote list: products added from the catalogue, submitted as items[] --}}
                        <div class="sm:col-span-2" x-data x-show="$store.quote.count > 0" x-cloak>
                            <p class="block font-mono text-[11px] uppercase tracking-widest text-nexa-ink/50 mb-3">Products in your quote</p>
                            <ul class="border-t border-nexa-ink/10">
                                <template x-for="(item, index) in $store.quote.items" :key="item.sku">
                                    <li class="flex items-center gap-4 border-b border-nexa-ink/10 py-3">
                                        <div class="min-w-0 flex-1">
                                            <p class="font-medium text-nexa-ink truncate" x-text="item.name"></p>
                                            <p class="text-xs text-nexa-ink/45" x-text="item.sku"></p>
                                        </div>
                                        <label class="flex items-center gap-2 text-xs text-nexa-ink/50">
                                            Qty
                                            <input
                                                type="number" min="1" inputmode="numeric"
                                                class="w-16 border-0 border-b border-nexa-ink/20 bg-transparent px-0 py-1 text-sm text-nexa-ink focus:ring-0 focus:border-nexa-green"
                                                :value="item.qty"
                                                @change="$store.quote.setQty(item.sku, $event.target.value)"
                                            >
                                        </label>
                                        <button type="button" @click="$store.quote.remove(item.sku)" class="text-xs text-nexa-ink/45 hover:text-nexa-red transition" :aria-label="'Remove ' + item.name">Remove</button>
                                        <input type="hidden" :name="'items[' + index + '][sku]'" :value="item.sku">
                                        <input type="hidden" :name="'items[' + index + '][name]'" :value="item.name">
                                        <input type="hidden" :name="'items[' + index + '][qty]'" :value="item.qty">
                                    </li>
                                </template>
                            </ul>
                            <a href="{{ route('products.index') }}" class="mt-3 inline-block text-xs font-semibold text-nexa-ink/60 hover:text-nexa-ink transition">+ Add more products</a>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="message" class="block font-mono text-[11px] uppercase tracking-widest text-nexa-ink/50 mb-2">Message</label>
                            <textarea id="message" name="message" rows="3" x-data :required="$store.quote.count === 0" placeholder="Tell us about your project"
                                class="{{ $field }} resize-none">{{ old('message') }}</textarea>
                            @error('message') <p class="mt-1.5 text-xs text-nexa-red">{{ $message }}</p> @enderror
                        </div>

                        <div class="sm:col-span-2 mt-2 pt-6 border-t border-nexa-ink/10">
                            <x-btn type="submit" variant="primary" :arrow="false">Send Request</x-btn>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-marketing-layout>
