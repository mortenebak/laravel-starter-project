<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use LivewireUI\Modal\ModalComponent;

class CreateUser extends ModalComponent
{
    use LivewireAlert;

    public $name;
    public $email;
    public $password = '';

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
    ];

    public function mount(): void
    {
        $this->password = Str::random(16);
    }

    public function create(): void
    {
        $this->validate();

        try {
            $user = User::query()->create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);

            event(new Registered($user));

            $this->alert('success', 'User added successfully!');

            // emit event to refresh users table
            $this->dispatch('userCreated');

            $this->closeModal();
        } catch (Exception $e) {
            $this->alert('error', 'Something went wrong!');
        }
    }

    public function render(): View
    {
        return view('livewire.admin.users.create-user');
    }
}
