<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use LivewireUI\Modal\ModalComponent;

class EditUser extends ModalComponent
{

    public $user;

    public function mount($user)
    {
        $this->user = User::find($user);
    }

    public function render()
    {
        return view('livewire.admin.users.edit-user');
    }
}
