<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Permissions extends Component
{
    public function render()
    {
        return view('livewire.admin.permissions')
            ->extends('layouts.admin');
    }
}
