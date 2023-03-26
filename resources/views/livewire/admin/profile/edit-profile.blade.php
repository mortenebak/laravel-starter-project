<div>
    <div class="flex justify-between items-center mb-5 h-10">
        <h1 class="text-3xl font-bold dark:text-gray-200">
            Edit your account
        </h1>
    </div>
    <div>
        <form wire:submit.prevent="updateProfile">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex flex-col">
                    <label for="name" class="text-gray-700 dark:text-gray-200">Name</label>
                    <input type="text" name="name" id="name" wire:model="name" class="border border-gray-300 p-2 rounded mt-2 focus:outline-none focus:border-blue-500 dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600">
                    @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div class="flex flex-col">
                    <label for="email" class="text-gray-700 dark:text-gray-200">Email</label>
                    <input type="email" name="email" id="email" wire:model="email" class="border border-gray-300 p-2 rounded mt-2 focus:outline-none focus:border-blue-500 dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600">
                    @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="flex justify-end mt-4 items-center space-x-4">
                <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Update
                </button>
            </div>
        </form>
    </div>
    <div class="mt-40">

        <div class="flex p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
            <div>
               <h2 class="text-xl font-bold">Danger zone</h2>
                <p>
                    Deleting your account will delete all your data and you will not be able to recover it.
                </p>
            </div>
        </div>

    </div>
</div>
