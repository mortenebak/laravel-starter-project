<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Rule;
use LivewireUI\Modal\ModalComponent;

class CreateUser extends ModalComponent
{
    use LivewireAlert;

    #[Rule(['required', 'string', 'max:255'])]
    public $name;

    #[Rule(['required', 'string', 'email', 'max:255', 'unique:users,email'])]
    public $email;

    #[Rule(['required', 'string', 'min:8'])]
    public $password = '';

    public function mount(): void
    {
        $this->password = Str::random(16);
    }

    public function create(): void
    {
        $this->validate();

        try {
            $user = User::query()
                ->create([
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
