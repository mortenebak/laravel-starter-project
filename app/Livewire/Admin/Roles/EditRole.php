<?php

namespace App\Livewire\Admin\Roles;

use Exception;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class EditRole extends ModalComponent
{
    use LivewireAlert;

    public $role;
    public string $name = '';
    public array $rolePermissions = [];

    // set validation rules
    protected $rules = [
        'name' => 'required|unique:roles,name|max:255',
    ];

    public static function modalMaxWidth(): string
    {
        return '5xl';
    }

    public function mount($role): void
    {
        $this->role = Role::find($role);
        $this->name = $this->role->name;

        // get user roles
        $this->rolePermissions = $this->role->permissions->pluck('id')->toArray() ?? [];
    }

    public function update(): void
    {
        // Validate request
        $this->validate();

        try {
            // Update category
            $this->role->update([
                'name' => $this->name,
            ]);

            // Update roles
            $this->role->syncPermissions($this->rolePermissions);

            $this->alert('success', 'Role updated successfully!');

            // emit event to refresh users table
            $this->dispatch('roleUpdated');

            $this->closeModal();
        } catch (Exception $e) {
            $this->alert('error', 'Something went wrong!');
        }
    }

    public function render(): View
    {
        return view('livewire.admin.roles.edit-role', [
            'role' => $this->role,
            'permissions' => Permission::all(),
        ]);
    }
}
