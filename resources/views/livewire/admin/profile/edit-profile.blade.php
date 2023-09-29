<div>
    <div class="flex justify-between items-center mb-5 h-10">
        <h1 class="text-3xl font-bold dark:text-gray-200">
            Edit Your Account
        </h1>
    </div>
    <div>
        <form wire:submit="updateProfile">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex flex-col">
                    <label for="name" class="text-gray-700 dark:text-gray-200">Name</label>
                    <input type="text" name="name" id="name" wire:model.live="name" class="border border-gray-300 p-2 rounded mt-2 focus:outline-none focus:border-primary-500 dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600">
                    @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div class="flex flex-col">
                    <label for="email" class="text-gray-700 dark:text-gray-200">Email</label>
                    <input type="email" name="email" id="email" wire:model.live="email" class="border border-gray-300 p-2 rounded mt-2 focus:outline-none focus:border-primary-500 dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600">
                    @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="flex justify-end mt-4 items-center space-x-4">
                <button type="submit"
                        class="text-white bg-primary-700 hover:bg-primary-800 focus:rng-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                    Update Profile
                </button>
            </div>
        </form>
    </div>
</div>
