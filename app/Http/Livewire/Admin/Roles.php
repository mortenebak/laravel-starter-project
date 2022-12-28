<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Roles extends Component
{
    public function render()
    {
        return view('livewire.admin.roles')
            ->extends('layouts.admin');
    }
}
