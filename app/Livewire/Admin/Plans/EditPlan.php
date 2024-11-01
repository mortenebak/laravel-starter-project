<?php

namespace App\Livewire\Admin\Plans;

use App\Models\Plan;
use Illuminate\Contracts\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use LivewireUI\Modal\ModalComponent;

class EditPlan extends ModalComponent
{
    use LivewireAlert;

    public Plan $plan;

    #[Validate('required|max:255')]
    public string $title = '';

    #[Validate('required|max:255')]
    public string $slug = '';

    #[Validate('required|max:255')]
    public string $stripe_id = '';

    #[Validate('nullable|string|max:255')]
    public string $features = '';

    public function mount(Plan $plan): void
    {
        $this->authorize('edit plans');

        $this->plan = $plan;
        $this->title = $plan->title ?? '';
        $this->slug = $plan->slug ?? '';
        $this->stripe_id = $plan->stripe_id ?? '';
        $this->features = $plan->features ?? '';
    }

    public function save()
    {
        $this->authorize('edit plans');

        $this->validate();

        $this->plan->update([
            'title' => $this->title,
            'slug' => $this->slug,
            'stripe_id' => $this->stripe_id,
            'features' => $this->features,
        ]);

        $this->alert('success', __('plans.update_successful'));

        $this->dispatch('planUpdated');

        $this->closeModal();
    }

    public function render(): View
    {
        return view('livewire.admin.plans.edit-plan');
    }
}
