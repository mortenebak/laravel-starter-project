<div>
    <div class="flex justify-between items-center mb-5 h-10">
        <h1 class="text-3xl font-bold">
            Roles
        </h1>
        <div>
            @can('create roles')
                <x-button>Add new role</x-button>
            @endcan
        </div>
    </div>
</div>
