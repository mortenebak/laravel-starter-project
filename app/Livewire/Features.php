<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Features extends Component
{
    #[Layout('layouts.frontend')]
    public function render(): View
    {
        return view('livewire.features');
    }
}
