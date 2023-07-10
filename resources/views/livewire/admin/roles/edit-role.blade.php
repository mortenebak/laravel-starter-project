<div class="p-4 w-full dark:bg-gray-900 flex flex-col space-y-4">

    <h2 class="text-2xl font-bold dark:text-white">
        {{ __('Edit Role') }}
    </h2>

    <div class="form-group">
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            {{ __('Name') }}
        </label>
        <input id="name" wire:model="name" type="text"
               class="@error('name') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
               placeholder="Enter name" required>
        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
    </div>

    <div class="form-group">
        <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            {{ __('Permissions') }}
        </label>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
            @foreach ($permissions as $permission)
                <div class="flex items-center">
                    <input type="checkbox" wire:model="rolePermissions" value="{{ $permission->id }}"
                           class="form-checkbox h-5 w-5 text-blue-600">
                    <label class="ml-2 text-gray-700 dark:text-white">{{ $permission->name }}</label>
                </div>
            @endforeach
        </div>
    </div>


    <div class="flex justify-between items-center">
        <button wire:click.prevent="update()"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            {{ __('Update Role') }}
        </button>
        <x-secondary-button wire:click="closeModal">
            {{ __('Cancel') }}
        </x-secondary-button>
    </div>

</div>
