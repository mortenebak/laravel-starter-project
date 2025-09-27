<div {{ $attributes->merge(['class' => 'bg-white overflow-hidden shadow-sm sm:rounded-lg border border-stone-200']) }}>
    <div class="p-5 [&>p]:mb-2">
        {{ $slot }}
    </div>
</div>
