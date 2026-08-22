@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 focus:border-nexa-green focus:ring-nexa-green rounded-md shadow-sm']) }}>
