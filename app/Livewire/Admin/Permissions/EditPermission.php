<?php

namespace App\Livewire\Admin\Permissions;

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

    public static function modalMaxWidth(): string
    {
        return '5xl';
    }

    public function mount($permission): void
    {
        abort_if(! auth()->check(), 403);
        abort_if(! auth()->user()->hasPermissionTo('edit permissions'), 403);

        $this->permission = Permission::find($permission);
        $this->name = $this->permission->name;
    }

    public function update(): void
    {
        // Validate request
        $this->validate([
            'name' => 'required|max:255|unique:permissions,name,' . $this->permission->id,
        ]);
        try {
            // Update category
            $this->permission->update([
                'name' => $this->name,
            ]);

            $this->alert('success', 'Permission updated successfully!');

            // emit event to refresh permissions table
            $this->dispatch('permissionUpdated');

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
