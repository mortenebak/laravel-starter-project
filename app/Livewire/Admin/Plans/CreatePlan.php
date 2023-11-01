<?php

namespace App\Livewire\Admin\Plans;

use Illuminate\Contracts\View\View;
use LivewireUI\Modal\ModalComponent;

class CreatePlan extends ModalComponent
{
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
