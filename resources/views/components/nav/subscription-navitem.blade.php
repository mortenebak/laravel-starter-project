@props([
    'to_route' => null
])
<a wire:navigate.hover href="{{ route($to_route) }}"
   class="border-b-2 @if (request()->routeIs($to_route)) border-b-indigo-600 text-indigo-600 @else border-b-transparent @endif hover:border-b-indigo-600 flex items-center h-full hover:text-indigo-600 font-medium"
>
    {{ $slot }}
</a>
