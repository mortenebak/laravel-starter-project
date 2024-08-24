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

    <div class="flex flex-col space-y-4">
        <div class="flex items-center justify-between">
            <input type="text"
                   class="w-1/4 rounded border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                   wire:model.live="search" placeholder="{{ __('Type in and search...') }}">
            <div class="flex space-x-4">
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
                <x-table.heading><a href="#" wire:click.prevent="sortBy('title')">{{ __('Title') }}</a>
                </x-table.heading>
                <x-table.heading><a href="#" wire:click.prevent="sortBy('stripe_id')">{{ __('Stripe ID') }}</a>
                </x-table.heading>
                <x-table.heading class="text-right">{{ __('Actions') }}</x-table.heading>
            </x-slot>

            <x-slot:body>
                @forelse ($plans as $plan)
                    <x-table.row>
                        <x-table.cell>
                            {{ $plan->id }}
                        </x-table.cell>
                        <x-table.cell>{{ $plan->title }}</x-table.cell>
                        <x-table.cell>{{ $plan->stripe_id }}</x-table.cell>
                        <x-table.cell class="text-right">
                            @can('edit plans')
                                <x-secondary-button wire:click.prevent="$dispatch('openModal', {component: 'admin.plans.edit-plan', arguments: { plan: {{ $plan->id }} }})">
                                    @lang('plans.edit_plan')
                                </x-secondary-button>
                            @endcan
                            @can('delete plans')
                                <x-secondary-button wire:click.prevent="deletePlan('{{ $plan->id }}')" wire:confirm="{{ __('plans.confirm_deletion') }}">
                                    @lang('plans.delete_plan')
                                </x-secondary-button>
                            @endcan
                        </x-table.cell>
                    </x-table.row>
                @empty
                    <x-table.row>
                        <x-table.cell colspan="4">
                            <div class="text-center py-2">
                                @lang('plans.no_plans_found')
                            </div>
                        </x-table.cell>
                    </x-table.row>
                @endforelse
            </x-slot:body>
        </x-table>

    </div>

</div>
