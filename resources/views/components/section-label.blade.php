@props(['text' => null, 'dark' => false])

<p {{ $attributes->merge(['class' => 'font-label text-xs uppercase tracking-[0.2em] flex items-center gap-2.5 '.($dark ? 'text-white/50' : 'text-nexa-ink/50')]) }}>
    <span class="inline-block h-1.5 w-1.5 bg-nexa-green"></span>
    {{ $text ?? $slot }}
</p>
