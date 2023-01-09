<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use LivewireUI\Modal\ModalComponent;

class CreateUser extends ModalComponent
{

    public $name;
    public $email;
    public $password = '';

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
    ];

    public function mount()
    {
        $this->password = Str::random(16);
    }

    public function create()
    {
        $this->validate();

        try {
            $user = User::query()->create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);

            event(new Registered($user));

            session()->flash('success', 'User created Successfully!');

            // emit event to refresh users table
            $this->emit('userCreated');

            $this->closeModal();

        } catch (\Exception $e) {
            session()->flash('error', 'Something goes wrong while creating the user!');
        }
    }

    public function render(): View
    {
        return view('livewire.admin.users.create-user');
    }
}
