<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Rule;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Role;

class EditUser extends ModalComponent
{
    use LivewireAlert;

    public $user;

    #[Rule(['required', 'string', 'max:255'])]
    public string $name = '';

    #[Rule(['required', 'string', 'email', 'max:255'])]
    public string $email = '';
    public array $userRoles = [];

    public static function modalMaxWidth(): string
    {
        return '5xl';
    }

    public function mount($user): void
    {
        $this->user = User::find($user);
        $this->name = $this->user->name;
        $this->email = $this->user->email;

        // get user roles
        $this->userRoles = $this->user->roles->pluck('id')->toArray();
    }

    public function update(): void
    {
        // Validate request
        $this->validate();

        try {
            // Update category
            $this->user->update([
                'name' => $this->name,
                'email' => $this->email,
            ]);

            // Convert the userRoles to integers
            $userRoles = Arr::map($this->userRoles, fn ($role): int => (int) $role);

            // Sync the user roles
            $this->user->syncRoles($userRoles);

            $this->alert('success', 'User Updated Successfully!');

            // emit event to refresh users table
            $this->dispatch('userUpdated');

            $this->closeModal();
        } catch (Exception $e) {
            $this->alert('error', 'Something went wrong!');
        }
    }

    public function render(): View
    {
        return view('livewire.admin.users.edit-user', [
            'user' => $this->user,
            'roles' => Role::all(),
        ]);
    }
}
