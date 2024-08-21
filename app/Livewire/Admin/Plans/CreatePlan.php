<?php

namespace App\Livewire\Admin\Plans;

use App\Models\Plan;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Rule;
use LivewireUI\Modal\ModalComponent;

class CreatePlan extends ModalComponent
{
    #[Rule(['required', 'max:255', 'unique:plans,title'])]
    public string $title = '';

    #[Rule(['required', 'max:255', 'unique:plans,slug'])]
    public string $slug = '';

    #[Rule(['required', 'max:255', 'unique:plans,stripe_id'])]
    public string $stripe_id = '';

    public function create(): void
    {
        $this->validate();

        Plan::query()->create([
            'title' => $this->title,
            'slug' => $this->slug,
            'stripe_id' => $this->stripe_id,
        ]);

        $this->dispatch('planCreated');
    }

    public function mount(): void
    {
        abort_if(! auth()->check(), 403);
        abort_unless(auth()->user()->hasPermissionTo('create plans'), 403);
    }

    public function render(): View
    {
        return view('livewire.admin.plans.create-plan');
    }
}
