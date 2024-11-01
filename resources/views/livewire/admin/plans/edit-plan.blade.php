<div class="p-4 w-full dark:bg-gray-900 flex flex-col space-y-4">

    <h2 class="text-2xl font-bold dark:text-white">
        {{ __('Edit Plan') }}
    </h2>

    <div class="form-group">
        <label for="title" class="block mb-2 text-sm font-medium text-stone-900 dark:text-white">
            {{ __('Title') }}
        </label>
        <input id="title" wire:model.live="title" type="text"
               class="@error('title') is-invalid @enderror bg-gray-50 border border-gray-300 text-stone-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
               placeholder="Enter title" required>
        @error('title') <span class="text-danger">{{ $message }}</span>@enderror
    </div>

    <div class="form-group">
        <label for="slug" class="block mb-2 text-sm font-medium text-stone-900 dark:text-white">
            {{ __('Slug') }}
        </label>
        <input id="slug" wire:model.live="slug" type="text"
               class="@error('slug') is-invalid @enderror bg-gray-50 border border-gray-300 text-stone-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
               placeholder="Enter slug" required>
        @error('slug') <span class="text-danger">{{ $message }}</span>@enderror
    </div>

    <div class="form-group">
        <label for="stripe_id" class="block mb-2 text-sm font-medium text-stone-900 dark:text-white">
            {{ __('Stripe ID') }}
        </label>
        <input id="stripe_id" wire:model.live="stripe_id" type="text"
               class="@error('stripe_id') is-invalid @enderror bg-gray-50 border border-gray-300 text-stone-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
               placeholder="Enter Stripe ID" required>
        @error('stripe_id') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="features" class="block mb-2 text-sm font-medium text-stone-900 dark:text-white">
            {{ __('plans.features') }}
        </label>
        <textarea wire:model="features" name="features" id="features" class="min-h-[200px] bg-gray-50 border border-gray-300 text-stone-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"></textarea>
        <small class="text-stone-500">
            {{ __('plans.features_hint') }}
        </small>
        @error('features') <span class="text-danger">{{ $message }}</span>@enderror
    </div>

    <div class="flex justify-between items-center">

        <x-secondary-button wire:click="closeModal">
            {{ __('plans.cancel') }}
        </x-secondary-button>
        <button wire:click.prevent="save" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
            {{ __('plans.save') }}
        </button>
    </div>

</div>
