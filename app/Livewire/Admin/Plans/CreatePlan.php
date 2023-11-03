<?php

namespace App\Livewire\Admin\Plans;

use App\Models\Plan;
use Illuminate\Contracts\View\View;
use LivewireUI\Modal\ModalComponent;

class CreatePlan extends ModalComponent
{
    public string $title = '';
    public string $slug = '';
    public string $stripe_id = '';

    protected $rules = [
        'title' => 'required|max:255|unique:plans,title',
        'slug' => 'required|max:255|unique:plans,slug',
        'stripe_id' => 'required|max:255|unique:plans,stripe_id',
    ];

    public function create()
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
