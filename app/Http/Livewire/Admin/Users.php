<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Users extends Component
{
    public function render()
    {
        return view('livewire.admin.users')
            ->extends('layouts.admin');
    }
}
