@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-bold text-sm text-stone-700 mb-1']) }}>
    {{ $value ?? $slot }}
</label>
