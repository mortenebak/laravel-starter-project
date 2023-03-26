<?php

namespace App\Http\Livewire\Admin\Permissions;

use Exception;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Permission;

class CreatePermission extends ModalComponent
{
    public string $name = '';

    // set validation rules
    protected $rules = [
        'name' => 'required|max:255|unique:permissions,name',
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
            Permission::create([
                'name' => $this->name,
            ]);

            session()->flash('success', 'Permission created Successfully!');

            // emit event to refresh permissions table
            $this->emit('permissionCreated');

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
        return view('livewire.admin.permissions.create-permission');
    }
}
