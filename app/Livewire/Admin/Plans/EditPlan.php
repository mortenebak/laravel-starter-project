<?php

namespace App\Livewire\Admin\Plans;

use App\Models\Plan;
use Illuminate\Contracts\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Rule;
use LivewireUI\Modal\ModalComponent;

class EditPlan extends ModalComponent
{
    use LivewireAlert;

    #[Rule(['required', 'max:255', 'unique:plans,title'])]
    public string $title = '';

    #[Rule(['required', 'max:255'])]
    public string $slug = '';

    #[Rule(['required', 'max:255'])]
    public string $stripe_id = '';

    public Plan $plan;

    public function mount(Plan $plan)
    {
        abort_if(! auth()->check(), 403);
        abort_unless(auth()->user()->hasPermissionTo('edit plans'), 403);

        $this->plan = $plan;
        $this->title = $plan->title ?? '';
        $this->slug = $plan->slug ?? '';
        $this->stripe_id = $plan->stripe_id ?? '';
    }

    public function save()
    {
        $this->validate();

        $this->plan->update([
            'title' => $this->title,
            'slug' => $this->slug,
            'stripe_id' => $this->stripe_id,
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
