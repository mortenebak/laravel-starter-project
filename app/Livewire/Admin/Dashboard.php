<?php

namespace App\Livewire\Admin;

use Illuminate\View\View;
use Livewire\Component;

class Dashboard extends Component
{
    public function render(): View
    {
        return view('livewire.admin.dashboard')
            ->extends('layouts.admin');
    }
}
