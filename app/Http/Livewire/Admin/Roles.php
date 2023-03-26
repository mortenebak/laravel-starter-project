<?php

namespace App\Http\Livewire\Admin;

use Exception;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Roles extends Component
{
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

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = ! $this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function render()
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

    public function destroy($id)
    {
        try {
            Role::find($id)->delete();
            session()->flash('success', 'Role Deleted Successfully!');
        } catch (Exception $e) {
            session()->flash('error', 'Something goes wrong while deleting role!');
        }
    }
}
