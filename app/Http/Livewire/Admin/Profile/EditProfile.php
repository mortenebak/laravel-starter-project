<?php

namespace App\Http\Livewire\Admin\Profile;

use Livewire\Component;

class EditProfile extends Component
{

    public $name;
    public $email;

    public function mount()
    {
        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;
    }

    public function updateProfile()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . auth()->user()->id . ',id',
        ]);

        auth()->user()->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);
    }


    public function render()
    {
        return view('livewire.admin.profile.edit-profile')->extends('layouts.admin');
    }
}
