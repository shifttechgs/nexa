@props(['label', 'active' => false])

{{-- Header dropdown: opens on hover or click; the slot is the list of links.
     - a click straight after hovering keeps it open instead of toggling it shut
     - closing on mouse-out waits a moment, so a diagonal move towards the panel doesn't drop it
     - keyboard: ↓/↑ from the button open it on the first/last link, ↓/↑ move between links,
       Escape closes and returns focus, tabbing out closes it
     - choosing a link closes it (matters for same-page #anchors) --}}
<div
    class="relative"
    x-data="{
        menu: false,
        viaHover: false,
        timer: null,
        open() { clearTimeout(this.timer); this.menu = true; },
        close() { clearTimeout(this.timer); this.menu = false; this.viaHover = false; },
        links() { return [...this.$refs.panel.querySelectorAll('a')]; },
        focusLink(index) {
            const focus = (tries = 40) => {
                const links = this.links();
                const link = links[(index + links.length) % links.length];
                if (! link) return;
                link.focus();
                // the fade-in only un-hides the panel a frame or two later; retry until it takes
                if (document.activeElement !== link && tries > 0) setTimeout(() => focus(tries - 1), 15);
            };
            // already open: move now, so quick repeated keys each count
            if (this.menu) return focus();
            this.open();
            focus();
        },
        step(by) {
            const links = this.links();
            this.focusLink(links.indexOf(document.activeElement) + by);
        },
    }"
    @mouseenter="open(); viaHover = true"
    @mouseleave="timer = setTimeout(() => close(), 180)"
    @keydown.escape="if (menu) { close(); $refs.button.focus(); }"
    @focusout="if (! $el.contains($event.relatedTarget)) close()"
    @click.outside="close()"
>
    <button
        type="button"
        x-ref="button"
        @class(['nav-link inline-flex items-center gap-1.5 uppercase tracking-[0.14em]', 'nav-link--active' => $active])
        @click="viaHover ? (viaHover = false) : (menu ? close() : open())"
        @keydown.arrow-down.prevent="focusLink(0)"
        @keydown.arrow-up.prevent="focusLink(-1)"
        :aria-expanded="menu.toString()"
        aria-haspopup="true"
    >
        {{ $label }}
        <svg viewBox="0 0 12 12" class="h-2.5 w-2.5 transition-transform duration-200" :class="{ 'rotate-180': menu }" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true"><path d="m2.5 4.5 3.5 3.5 3.5-3.5"/></svg>
    </button>
    <div
        x-ref="panel"
        x-cloak
        x-show="menu"
        x-transition.opacity.duration.150ms
        @keydown.arrow-down.prevent="step(1)"
        @keydown.arrow-up.prevent="step(-1)"
        @keydown.home.prevent="focusLink(0)"
        @keydown.end.prevent="focusLink(-1)"
        @click="if ($event.target.closest('a')) close()"
        {{ $attributes->merge(['class' => 'absolute left-0 top-full pt-3 w-72']) }}
    >
        <div class="bg-nexa-paper border border-nexa-line shadow-[0_12px_32px_-12px_rgba(11,35,64,0.25)] normal-case tracking-normal font-sans text-sm">
            {{ $slot }}
        </div>
    </div>
</div>
