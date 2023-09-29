<?php

namespace App\Livewire\Auth\Passwords;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ChangePassword extends Component
{
    public $current_password;
    public $password;
    public $password_confirmation;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed|different:current_password',
        ]);
    }

    public function changePassword()
    {
        $this->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed|different:current_password',
        ]);

        if (Hash::check($this->current_password, auth()->user()->password)) {
            $user = User::findOrFail(auth()->user()->id);
            $user->password = Hash::make($this->password);
            $user->save();
            session()->flash('password_success', 'Password has been changed successfully!');
        } else {
            session()->flash('password_error', 'Password does not match!');
        }
    }

    public function render()
    {
        return view('livewire.auth.passwords.change-password')->extends('layouts.admin');
    }
}
