<?php

namespace App\Http\Livewire\Admin\Permissions;

use Exception;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Permission;

class EditPermission extends ModalComponent
{
    use LivewireAlert;

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

    public function mount($permission): void
    {
        $this->permission = Permission::find($permission);
        $this->name = $this->permission->name;
    }

    public function update(): void
    {
        // Validate request
        $this->validate();
        try {
            // Update category
            $this->permission->update([
                'name' => $this->name,
            ]);

            $this->alert('success', 'Permission updated successfully!');

            // emit event to refresh permissions table
            $this->emit('permissionUpdated');

            $this->closeModal();
        } catch (Exception $e) {
            $this->alert('error', 'Something went wrong!');
        }
    }

    public function cancel(): void
    {
        $this->closeModal();
    }

    public function render(): View
    {
        return view('livewire.admin.permissions.edit-permission');
    }
}
