<div>
    <div class="flex justify-between items-center mb-5 h-10">
        <h1 class="text-3xl font-bold  dark:text-slate-200">
            {{ __('Plans') }}
        </h1>
        <div>
            @can('create plans')
                <button
                    class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800"
                    wire:click="$dispatch('openModal', {component: 'admin.plans.create-plan'})">
                    {{ __('Create Plan') }}
                </button>
            @endcan
        </div>
    </div>

</div>
