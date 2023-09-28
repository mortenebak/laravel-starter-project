<?php

namespace App\Livewire\Admin;

use Illuminate\View\View;
use Livewire\Component;

class Dashboard extends Component
{
    public function mount()
    {
        abort_if(! auth()->check(), 403);
        abort_if(! auth()->user()->hasPermissionTo('access dashboard'), 403);
    }

    public function render(): View
    {
        return view('livewire.admin.dashboard')
            ->extends('layouts.admin');
    }
}
