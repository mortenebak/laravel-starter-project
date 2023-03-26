<?php

namespace App\Http\Livewire\Admin\Roles;

use Exception;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateRole extends ModalComponent
{
    public string $name = '';

    public array $rolePermissions = [];

    // set validation rules
    protected $rules = [
        'name' => 'required|max:255|unique:roles,name',
    ];

    public static function modalMaxWidth(): string
    {
        return '5xl';
    }

    public function create()
    {
        // Validate request
        $this->validate();
        try {
            // Update category
            $role = Role::create([
                'name' => $this->name,
            ]);

            $role->syncPermissions($this->rolePermissions);

            session()->flash('success', 'Role created Successfully!');

            // emit event to refresh permissions table
            $this->emit('roleCreated');

            $this->closeModal();
        } catch (Exception $e) {
            session()->flash('error', 'Something goes wrong while creating the permission!!');
        }
    }

    public function cancel()
    {
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.admin.roles.create-role', [
            'permissions' => Permission::all(),
        ]);
    }
}
