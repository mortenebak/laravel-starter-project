<div>
    <div class="flex justify-between items-center mb-5 h-10">
        <h1 class="text-3xl font-bold  dark:text-slate-200">
            Users
        </h1>
        <div>
            @can('create users')
                <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                        wire:click='$emit("openModal", "admin.users.create-user")'>
                    Add new user
                </button>
            @endcan
        </div>
    </div>

    <div class="flex flex-col space-y-4">
        <div class="flex items-center justify-between">
            <input type="text"
                   class="w-1/4 rounded border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                   wire:model="search" placeholder="Type in and search...">
            <div class="flex space-x-4">
                <select wire:model="roleType"
                        class="rounded border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">All roles</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                    @endforeach
                </select>

                <select wire:model="perPage"
                        class="rounded border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="10">{{ __('10 pr side') }}</option>
                    <option value="25">2{{ __('5 pr side') }}</option>
                    <option value="50">{{ __('50 pr side') }}</option>
                </select>
            </div>

        </div>

        <x-table wire:loading.class="opacity-50">
            <x-slot name="head">
                <x-table.heading><a href="#" wire:click.prevent="sortBy('id')">{{__('ID') }}</a></x-table.heading>
                <x-table.heading><a href="#" wire:click.prevent="sortBy('name')">{{ __('Name') }}</a></x-table.heading>
                <x-table.heading><a href="#" wire:click.prevent="sortBy('email')">{{ __('E-mail') }}</a>
                </x-table.heading>
                <x-table.heading>{{ __('Roles') }}</x-table.heading>
                <x-table.heading class="text-right">{{ __('Actions') }}</x-table.heading>
            </x-slot>

            <x-slot name="body">
                @foreach($users as $key => $user)
                    <x-table.row>
                        <x-table.cell class="text-xs w-12 text-opacity-50">{{ $user->id }}</x-table.cell>
                        <x-table.cell class="flex-shrink-0 w-1/4">
                            {{ $user->name }}
                        </x-table.cell>
                        <x-table.cell class="flex-shrink-0 w-1/4">
                            {{ $user->email }}
                        </x-table.cell>
                        <x-table.cell class="flex-1">
                            @foreach($user->roles as $role)
                                <p class="inline-flex bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                    {{ $role->name }}
                                </p>
                            @endforeach
                        </x-table.cell>
                        <x-table.cell class="flex items-center space-x-2 justify-end">
                            @can('view users')
                                <a href="#">
                                    <button class="btn btn-secondary">{{ __('Show') }}</button>
                                </a>
                            @endcan
                            @can('edit users')
                                <button class="btn btn-secondary"
                                        wire:click='$emit("openModal", "admin.users.edit-user", {{ json_encode(["user" => $user->id]) }})'>{{ __('Edit') }}</button>
                            @endcan

                            @can('delete users')
                                <x-danger-button onclick="deleteUser({{$user->id}})">
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
                    if (confirm("Are you sure to delete this user?"))
                        window.livewire.emit('deleteUser', id);
                }
            </script>
        @endcan

    </div>

</div>


