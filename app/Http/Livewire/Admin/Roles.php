<?php

namespace App\Http\Livewire\Admin;

use Exception;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Roles extends Component
{
    use LivewireAlert;
    use WithPagination;

    public int $perPage = 25;

    public string $sortField = 'name';

    public bool $sortAsc = true;

    public string $search = '';

    public array $searchableFields = ['name'];

    protected $listeners = [
        'deleteRole' => 'destroy',
        'roleUpdated' => '$refresh',
        'roleCreated' => '$refresh',
    ];

    public function updatingSearch(): void
    {
        $this->gotoPage(1);
    }

    public function sortBy($field): void
    {
        if ($this->sortField === $field) {
            $this->sortAsc = ! $this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function render(): View
    {
        return view('livewire.admin.roles', [
            'roles' => Role::query()->search($this->searchableFields, $this->search)
                ->when($this->sortField, fn ($query) => $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc'))
                ->with('permissions')
                ->paginate($this->perPage),
            'permissions' => Permission::all(),
        ])
            ->extends('layouts.admin');
    }

    public function destroy($id): void
    {
        try {
            Role::find($id)->delete();
            $this->alert('success', 'Role deleted successfully!');
        } catch (Exception $e) {
            $this->alert('error', 'Something went wrong!');
        }
    }
}
