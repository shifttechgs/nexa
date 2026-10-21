@props(['text'])

{{--
    Oversized footer wordmark — the ShiftTech signature close.
    Letters rise in on scroll, a slow light sweeps across them, and a soft
    spotlight follows the cursor. All motion is off under prefers-reduced-motion.
--}}
<div
    {{ $attributes->merge(['class' => 'footer-wordmark-wrap px-4 pb-4 sm:pb-6 overflow-hidden']) }}
    aria-hidden="true"
    x-data="{ shown: false, spot: false }"
    x-intersect.once.margin.-10%="shown = true"
    @mouseenter="spot = true"
    @mouseleave="spot = false"
    @mousemove="$el.style.setProperty('--mx', $event.clientX + 'px'); $el.style.setProperty('--my', $event.clientY + 'px')"
    :class="{ 'is-revealed': shown, 'is-spot': spot }"
>
    <p class="footer-wordmark text-center text-[23vw] lg:text-[17rem]">@foreach (mb_str_split($text) as $i => $letter)<span class="fw-letter" style="--i: {{ $i }}">{{ $letter }}</span>@endforeach</p>
</div>
