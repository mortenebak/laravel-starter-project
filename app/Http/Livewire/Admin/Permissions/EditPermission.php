<?php

namespace App\Http\Livewire\Admin\Permissions;

use Exception;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Permission;

class EditPermission extends ModalComponent
{
    public $permission;

    public string $name = '';

    // set validation rules
    protected $rules = [
        'name' => 'required|max:255|unique:permissions,name',
    ];

    public static function modalMaxWidth(): string
    {
        return '5xl';
    }

    public function mount($permission)
    {
        $this->permission = Permission::find($permission);
        $this->name = $this->permission->name;
    }

    public function update()
    {
        // Validate request
        $this->validate();
        try {
            // Update category
            $this->permission->update([
                'name' => $this->name,
            ]);
            session()->flash('success', 'Permission Updated Successfully!!');

            // emit event to refresh permissions table
            $this->emit('permissionUpdated');

            $this->closeModal();
        } catch (Exception $e) {
            session()->flash('error', 'Something goes wrong while updating permission!!');
        }
    }

    public function cancel()
    {
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.admin.permissions.edit-permission');
    }
}
