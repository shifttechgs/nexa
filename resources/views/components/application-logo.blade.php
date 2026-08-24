@props(['mark' => false, 'transparent' => false])

@if ($mark)
    <img src="{{ asset('images/favicon-512.png') }}" alt="Nexa" {{ $attributes->merge(['class' => 'object-contain']) }} />
@elseif ($transparent)
    <img src="{{ asset('images/nexa-logo.png') }}" alt="Nexa Mining and Engineering Services" {{ $attributes->merge(['class' => 'object-contain']) }} />
@else
    <img src="{{ asset('images/nexa-logo.jpg') }}" alt="Nexa Mining and Engineering Services" {{ $attributes->merge(['class' => 'object-contain']) }} />
@endif
