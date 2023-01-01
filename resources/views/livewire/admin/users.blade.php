<div>
    <div class="flex justify-between items-center mb-5 h-10">
        <h1 class="text-3xl font-bold  dark:text-slate-200">
            Users
        </h1>
        <div>
            @can('create users')
                <x-button>Add new user</x-button>
            @endcan
        </div>
    </div>

    <div class="flex flex-col space-y-4">
        <div class="flex items-center justify-between">
            <input type="text" class="w-1/4 rounded border border-gray-200" wire:model="search" placeholder="Type in and search...">

            <select wire:model="perPage" class="rounded border border-gray-200">
                <option value="10">{{ __('10 pr side') }}</option>
                <option value="25">2{{ __('5 pr side') }}</option>
                <option value="50">{{ __('50 pr side') }}</option>
            </select>
        </div>

        <x-table wire:loading.class="opacity-50">
            <x-slot name="head">
                <x-table.heading><a href="#" wire:click.prevent="sortBy('id')">{{__('ID') }}</a></x-table.heading>
                <x-table.heading><a href="#" wire:click.prevent="sortBy('name')">{{ __('Name') }}</a></x-table.heading>
                <x-table.heading><a href="#" wire:click.prevent="sortBy('email')">{{ __('E-mail') }}</a></x-table.heading>
                <x-table.heading>{{ __('Roles') }}</x-table.heading>
                <x-table.heading>{{ __('Show/Edit') }}</x-table.heading>
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
                                <p class="text-xs font-semibold inline-block py-1 px-2 rounded-full text-stone-600 bg-stone-200 last:mr-0 mr-1">
                                    {{ $role->name }}
                                </p>
                            @endforeach
                        </x-table.cell>
                        <x-table.cell class="flex-shrink-0 w-1/4">
                            @can('view users')
                                <a href="#">
                                    <button class="btn btn-secondary">{{ __('Show') }}</button>
                                </a>
                            @endcan
                            @can('edit users')
                                <button class="btn btn-secondary" wire:click='$emit("openModal", "admin.users.edit-user", {{ json_encode(["user" => $user->id]) }})'>{{ __('Edit') }}</button>
                            @endcan

                            @can('delete users')
                                <form action="#" method="POST"
                                      onsubmit="return confirm('{{ __('Are you sure that you want to delete this user?') }}');"
                                      style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <x-danger-button type="submit">
                                        {{ __('Delete') }}
                                    </x-danger-button>
                                </form>
                            @endcan
                        </x-table.cell>
                    </x-table.row>
                @endforeach
            </x-slot>
        </x-table>
        <div>
            {{ $users->links() }}
        </div>

    </div>

</div>


