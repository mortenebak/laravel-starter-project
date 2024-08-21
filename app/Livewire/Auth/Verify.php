<?php

namespace App\Livewire\Auth;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
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

    #[Layout('layouts.auth')]
    public function render(): View
    {
        return view('livewire.auth.verify');
    }
}
