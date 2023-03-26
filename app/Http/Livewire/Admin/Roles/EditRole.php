<?php

namespace App\Http\Livewire\Admin\Roles;

use App\Models\User;
use Exception;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class EditRole extends ModalComponent
{
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

    public function mount($role)
    {
        $this->role = Role::find($role);
        $this->name = $this->role->name;

        // get user roles
        $this->rolePermissions = $this->role->permissions->pluck('id')->toArray() ?? [];
    }

    public function update()
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

            session()->flash('success', 'Role Updated Successfully!!');

            // emit event to refresh users table
            $this->emit('roleUpdated');

            $this->closeModal();
        } catch(Exception $e) {
            session()->flash('error', 'Something goes wrong while updating role!!');
        }
    }

    public function render()
    {
        return view('livewire.admin.roles.edit-role', [
            'role' => $this->role,
            'permissions' => Permission::all(),
        ]);
    }
}
