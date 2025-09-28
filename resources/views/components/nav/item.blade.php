@props([
    'href' => null,
])
<a @if($href) href="{{ $href }}" @endif wire:navigate
   {{ $attributes->merge(['class' => 'relative font-medium leading-6 text-neutral-600 transition duration-150 ease-out hover:text-neutral-900']) }}
   x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false">
    <span class="block">
        {{ $slot }}
    </span>
    <span class="absolute bottom-0 left-0 inline-block w-full h-0.5 -mb-1 overflow-hidden">
        <span x-show="hover" class="absolute inset-0 inline-block w-full h-1 h-full transform bg-gray-900"
              x-transition:enter="transition ease duration-200" x-transition:enter-start="scale-0"
              x-transition:enter-end="scale-100" x-transition:leave="transition ease-out duration-300"
              x-transition:leave-start="scale-100" x-transition:leave-end="scale-0">
        </span>
    </span>
</a>
