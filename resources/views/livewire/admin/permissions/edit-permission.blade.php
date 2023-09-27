<div class="p-4 w-full dark:bg-gray-900 flex flex-col space-y-4">

    <h2 class="text-2xl font-bold dark:text-white">
        {{ __('Update Permission') }}
    </h2>

    <div class="form-group">
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            {{ __('Name') }}
        </label>
        <input id="name" wire:model.live="name" type="text"
               class="@error('name') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
               placeholder="Enter name" required>
        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
    </div>

    <div class="flex justify-between items-center">
        <button wire:click.prevent="update()" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
            {{ __('Update Permission') }}
        </button>
        <x-secondary-button wire:click="closeModal">
            {{ __('Cancel') }}
        </x-secondary-button>
    </div>
</div>
