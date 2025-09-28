<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Privacy extends Component
{
    #[Layout('layouts.frontend')]
    public function render(): View
    {
        return view('livewire.privacy');
    }
}
