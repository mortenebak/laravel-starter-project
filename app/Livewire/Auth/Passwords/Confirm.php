<?php

namespace App\Livewire\Auth\Passwords;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Confirm extends Component
{
    /** @var string */
    public $password = '';

    public function confirm()
    {
        $this->validate([
            'password' => 'required|current_password',
        ]);

        session()->put('auth.password_confirmed_at', time());

        return redirect()->intended(route('home'));
    }

    #[Layout('layouts.auth')]
    public function render(): View
    {
        return view('livewire.auth.passwords.confirm');
    }
}
