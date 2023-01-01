<div>
    <div class="flex justify-between items-center mb-5 h-10">
        <h1 class="text-3xl font-bold  dark:text-slate-200">
            Permissions
        </h1>
        <div>
            @can('create permissions')
                <x-button>Add new permission</x-button>
            @endcan
        </div>
    </div>

    <div class="flex flex-col space-y-4">
        <div class="flex items-center justify-between">
            <input type="text"
                   class="w-1/4 rounded border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                   wire:model="search" placeholder="Type in and search...">

            <select wire:model="perPage"
                    class="rounded border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="10">{{ __('10 pr side') }}</option>
                <option value="25">2{{ __('5 pr side') }}</option>
                <option value="50">{{ __('50 pr side') }}</option>
            </select>
        </div>

        <x-table wire:loading.class="opacity-50">
            <x-slot name="head">
                <x-table.heading><a href="#" wire:click.prevent="sortBy('id')">{{__('ID') }}</a></x-table.heading>
                <x-table.heading><a href="#" wire:click.prevent="sortBy('name')">{{ __('Name') }}</a></x-table.heading>
                <x-table.heading class="text-right">{{ __('Actions') }}</x-table.heading>
            </x-slot>

            <x-slot name="body">
                @foreach($permissions as $key => $permission)
                    <x-table.row>
                        <x-table.cell class="text-xs w-12 text-opacity-50">{{ $permission->id }}</x-table.cell>
                        <x-table.cell class="flex-shrink-0 w-1/4">
                            {{ $permission->name }}
                        </x-table.cell>
                        <x-table.cell class="flex items-center space-x-2 justify-end">
                            @can('edit permissions')
                                <button class="btn btn-secondary"
                                        wire:click='$emit("openModal", "admin.permissions.edit-permission", {{ json_encode(["permission" => $permission->id]) }})'>{{ __('Edit') }}</button>
                            @endcan

                            @can('delete permissions')
                                <x-danger-button onclick="deletePermission({{$permission->id}})">
                                    {{ __('Delete') }}
                                </x-danger-button>
                            @endcan
                        </x-table.cell>
                    </x-table.row>
                @endforeach
            </x-slot>
        </x-table>

        <div>
            {{ $permissions->links() }}
        </div>

        @can('delete permissions')
            <script>
                function deletePermission(id) {
                    if (confirm("Are you sure to delete this permission?"))
                        window.livewire.emit('deletePermission', id);
                }
            </script>
        @endcan

    </div>
</div>
