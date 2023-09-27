<div>
    <div class="flex justify-between items-center mb-5 h-10">
        <h1 class="text-3xl font-bold  dark:text-slate-200">
            {{ __('Users') }}
        </h1>
        <div>
            @can('create users')
                <button
                    class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800"
                    wire:click="$dispatch('openModal', {component: 'admin.users.create-user'})">
                    {{ __('Create User') }}
                </button>
            @endcan
        </div>
    </div>

    <div class="flex flex-col space-y-4">
        <div class="flex items-center justify-between">
            <input type="text"
                   class="w-1/4 rounded border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                   wire:model.live="search" placeholder="{{ __('Type in and search...') }}">
            <div class="flex space-x-4">
                <select wire:model.live="roleType"
                        class="rounded border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option value="">{{ __('All roles') }}</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                    @endforeach
                </select>

                <select wire:model.live="perPage"
                        class="rounded border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option value="10">{{ __('10 per page') }}</option>
                    <option value="25">{{ __('25 per page') }}</option>
                    <option value="50">{{ __('50 per page') }}</option>
                </select>
            </div>

        </div>

        <x-table wire:loading.class="opacity-50">
            <x-slot name="head">
                <x-table.heading><a href="#" wire:click.prevent="sortBy('id')">{{ __('ID') }}</a></x-table.heading>
                <x-table.heading><a href="#" wire:click.prevent="sortBy('name')">{{ __('Name') }}</a></x-table.heading>
                <x-table.heading><a href="#" wire:click.prevent="sortBy('email')">{{ __('E-mail') }}</a>
                </x-table.heading>
                <x-table.heading>{{ __('Roles') }}</x-table.heading>
                <x-table.heading class="text-right">{{ __('Actions') }}</x-table.heading>
            </x-slot>

            <x-slot name="body">
                @foreach ($users as $key => $user)
                    <x-table.row>
                        <x-table.cell class="text-xs w-12 text-opacity-50">{{ $user->id }}</x-table.cell>
                        <x-table.cell class="flex-shrink-0 w-1/4">
                            {{ $user->name }}
                        </x-table.cell>
                        <x-table.cell class="flex-shrink-0 w-1/4">
                            {{ $user->email }}
                        </x-table.cell>
                        <x-table.cell class="flex-1">
                            @foreach ($user->roles as $role)
                                <p class="inline-flex bg-primary-100 text-primary-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300">
                                    {{ $role->name }}
                                </p>
                            @endforeach
                        </x-table.cell>
                        <x-table.cell class="flex items-center space-x-2 justify-end">
                            @can('view users')
                                <button class="btn btn-secondary">{{ __('Show') }}</button>
                            @endcan
                            @can('edit users')
                                <button class="btn btn-secondary"
                                        wire:click="$dispatch('openModal', {component: 'admin.users.edit-user', arguments: { user: {{ $user->id }} }})">
                                    {{ __('Edit') }}</button>
                            @endcan

                            @can('delete users')
                                <x-danger-button onclick="deleteUser({{ $user->id }})">
                                    {{ __('Delete') }}
                                </x-danger-button>
                            @endcan
                        </x-table.cell>
                    </x-table.row>
                @endforeach
            </x-slot>
        </x-table>

        <div>
            {{ $users->links() }}
        </div>

        @can('delete users')
            <script>
                function deleteUser(id) {
                    if (confirm("{{ __('Are you sure you want to delete this user?') }}")) {
                        Livewire.dispatch('deleteUser', {id: id});
                    }
                }
            </script>
        @endcan

    </div>

</div>


