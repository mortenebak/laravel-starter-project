<div>
    <div class="flex justify-between items-center mb-5">
        <div class="flex flex-col gap-2">
            <h1 class="text-3xl font-bold dark:text-neutral-200">
                {{ __('Dashboard') }}
            </h1>
            <x-p>
                {{ __('Welcome back, :name', ['name' => auth()->user()->name]) }}
            </x-p>
        </div>
        <div>

        </div>
    </div>
    <x-p class="dark:text-neutral-200">
        {{ __('Here is a quick overview of your application\'s statistics and recent activities.') }}
    </x-p>

    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl min-h-[40rem]">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20"/>
            </div>
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20"/>
            </div>
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20"/>
            </div>
        </div>
        <div class="relative h-full flex-1 rounded-xl border border-neutral-200 dark:border-neutral-700">
            <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20"/>
        </div>
    </div>
</div>

