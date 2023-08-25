<?php

namespace App\Livewire\Admin\Permissions;

use Exception;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Permission;

class CreatePermission extends ModalComponent
{
    use LivewireAlert;

    public string $name = '';

    // set validation rules
    protected $rules = [
        'name' => 'required|max:255|unique:permissions,name',
    ];

    public static function modalMaxWidth(): string
    {
        return '5xl';
    }

    public function create(): void
    {
        // Validate request
        $this->validate();
        try {
            // Update category
            Permission::create([
                'name' => $this->name,
            ]);

            $this->alert('success', 'Permission created successfully!');

            // emit event to refresh permissions table
            $this->dispatch('permissionCreated');

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
        return view('livewire.admin.permissions.create-permission');
    }
}
