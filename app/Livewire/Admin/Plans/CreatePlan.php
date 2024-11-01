<?php

namespace App\Livewire\Admin\Plans;

use App\Models\Plan;
use Illuminate\Contracts\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use LivewireUI\Modal\ModalComponent;

class CreatePlan extends ModalComponent
{
    use LivewireAlert;

    #[Validate('required|max:255|unique:plans,title')]
    public string $title = '';

    #[Validate('required|max:255|unique:plans,slug')]
    public string $slug = '';

    #[Validate('required|max:255|unique:plans,stripe_id')]
    public string $stripe_id = '';

    #[Validate('nullable|string|max:255')]
    public string $features = '';

    public function create(): void
    {
        $this->authorize('create plans');

        $this->validate();

        Plan::query()->create([
            'title' => $this->title,
            'slug' => $this->slug,
            'stripe_id' => $this->stripe_id,
            'features' => $this->features,
        ]);

        $this->dispatch('planCreated');

        $this->alert('success', __('plans.created_successful'));

        $this->closeModal();

    }

    public function mount(): void
    {
        $this->authorize('create plans');
    }

    public function render(): View
    {
        return view('livewire.admin.plans.create-plan');
    }
}
