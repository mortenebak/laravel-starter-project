<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Exception;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Role;

class EditUser extends ModalComponent
{
    use LivewireAlert;

    public $user;
    public string $name = '';
    public string $email = '';
    public array $userRoles = [];

    // set validation rules
    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
    ];

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
        $this->userRoles = $this->user->roles->pluck('id')->toArray() ?? [];
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

            // Update roles
            $this->user->syncRoles($this->userRoles);

            $this->alert('success', 'User Updated Successfully!');

            // emit event to refresh users table
            $this->dispatch('userUpdated');

            $this->closeModal();
        } catch(Exception $e) {
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
