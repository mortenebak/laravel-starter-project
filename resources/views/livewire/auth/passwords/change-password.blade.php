<div>
    <div class="flex justify-between items-center mb-5 h-10">
        <h1 class="text-3xl font-bold dark:text-stone-200">
            {{ __('Change Password') }}
        </h1>
        <div>

        </div>
    </div>
    <div class="dark:text-slate-200">
        @if (Session::has('password_success'))
            <div class="alert alert-success" role="alert">{{ Session::get('password_success') }}</div>
        @endif
        @if (Session::has('password_error'))
            <div class="alert alert-danger" role="alert">{{ Session::get('password_error') }}</div>
        @endif
        <form class="space-y-4" wire:submit.prevent="changePassword">
            <div class="form-group">
                <label class="block mb-2 text-sm font-bold text-stone-900 dark:text-white" for="current_password">Current
                    Password</label>
                <input type="password" id="current_password" placeholder="Current Password"
                       class="bg-gray-50 border border-gray-300 text-stone-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       name="current_password" wire:model="current_password"/>
                @error('current_password') <p class="text-danger">{{ $message }}</p> @enderror

            </div>
            <div class="form-group">
                <label class="block mb-2 text-sm font-bold text-stone-900 dark:text-white" for="new_password">New
                    Password</label>
                <input type="password" id="new_password" placeholder="New Password"
                       class="bg-gray-50 border border-gray-300 text-stone-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       name="password" wire:model="password"/>
                @error('password') <p class="text-danger">{{ $message }}</p> @enderror

            </div>

            <div class="form-group">
                <label class="block mb-2 text-sm font-bold text-stone-900 dark:text-white" for="confirm_password">Confirm
                    Password</label>
                <input type="password" id="confirm_password" placeholder="Confirm Password"
                       class="bg-gray-50 border border-gray-300 text-stone-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       name="password_confirmation" wire:model="password_confirmation"/>
                @error('password_confirmation') <p class="text-danger">{{ $message }}</p> @enderror

            </div>
            <div class="form-group">
                <x-button>
                    {{ __('Change Password') }}
                </x-button>

            </div>
        </form>
    </div>
</div>
