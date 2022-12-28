<div>
    <div class="flex justify-between items-center mb-5 h-10">
        <h1 class="text-3xl font-bold">
            Permissions
        </h1>
        <div>
            @can('create permissions')
                <x-button>Add new permission</x-button>
            @endcan
        </div>
    </div>
</div>
