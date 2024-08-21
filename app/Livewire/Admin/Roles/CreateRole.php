<?php

namespace App\Livewire\Admin\Roles;

use Exception;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Rule;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateRole extends ModalComponent
{
    use LivewireAlert;

    #[Rule(['required', 'max:255', 'unique:roles,name'])]
    public string $name = '';

    public array $rolePermissions = [];

    public static function modalMaxWidth(): string
    {
        return '5xl';
    }

    public function mount()
    {
        abort_if(!auth()->check(), 403);
        abort_if(!auth()
            ->user()
            ->hasPermissionTo('create roles'), 403);
    }

    public function create(): void
    {
        // Validate request
        $this->validate();
        try {
            // Update category
            $role = Role::create([
                'name' => $this->name,
            ]);

            $permissions = collect($this->rolePermissions)
                ->map(function ($permission) use ($role) {
                    // convert string to int
                    return (int)$permission;
                })
                ->toArray();

            $role->syncPermissions($permissions);

            $this->alert('success', 'Role Created Successfully!');

            // emit event to refresh permissions table
            $this->dispatch('roleCreated');

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
        return view('livewire.admin.roles.create-role', [
            'permissions' => Permission::all(),
        ]);
    }
}
