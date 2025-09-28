@props([
    'size' => 'md'
])

@php
    $size = match ($size) {
       'lg' => 'md:text-lg',
        default => '',
    };
@endphp

<p {{ $attributes->merge(['class' => "mb-6 font-light text-neutral-500 dark:text-neutral-400 $size"]) }}>
    {{ $slot }}
</p>
