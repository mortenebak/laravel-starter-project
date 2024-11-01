<div class="p-4 w-full dark:bg-gray-900 flex flex-col space-y-4">

    <h2 class="text-2xl font-bold dark:text-white">Create User</h2>

    <div class="form-group">
        <label for="name" class="block mb-2 text-sm font-medium text-stone-900 dark:text-white">Name</label>
        <input id="name" wire:model.live="name" type="text"
               class="@error('name') is-invalid @enderror bg-gray-50 border border-gray-300 text-stone-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
               placeholder="Enter name" required>
        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
    </div>

    <div class="form-group">
        <label for="email" class="block mb-2 text-sm font-medium text-stone-900 dark:text-white">Email</label>
        <input id="email" wire:model.live="email" type="text"
               class="@error('email') is-invalid @enderror bg-gray-50 border border-gray-300 text-stone-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
               placeholder="Enter email" required>
        @error('email') <span class="text-danger">{{ $message }}</span>@enderror
    </div>

    <div class="form-group">
        <label for="password" class="block mb-2 text-sm font-medium text-stone-900 dark:text-white">Password</label>
        <input id="password" wire:model.live="password" type="text"
               class="@error('password') is-invalid @enderror bg-gray-50 border border-gray-300 text-stone-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
               placeholder="Enter password" required>
        @error('password') <span class="text-danger">{{ $message }}</span>@enderror
    </div>

    <div>
        <button wire:click.prevent="create()" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Create User</button>
    </div>
</div>
