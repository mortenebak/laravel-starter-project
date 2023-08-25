<?php

namespace App\Livewire\Auth;

use Livewire\Component;

class Verify extends Component
{
    public function resend()
    {
        if (auth()->user()->hasVerifiedEmail()) {
            redirect(route('home'));
        }

        auth()->user()->sendEmailVerificationNotification();

        $this->dispatch('resent');

        session()->flash('resent');
    }

    public function render()
    {
        return view('livewire.auth.verify')->extends('layouts.auth');
    }
}
