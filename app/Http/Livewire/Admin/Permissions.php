<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class Permissions extends Component
{
    use WithPagination;

    protected $listeners = [
        'deletePermission' => 'destroy',
        'permissionCreated' => '$refresh',
        'permissionUpdated' => '$refresh',
    ];

    public int $perPage = 25;

    public string $sortField = 'name';

    public bool $sortAsc = true;

    public string $search = '';

    public array $searchableFields = ['name'];

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
        return view('livewire.admin.permissions', [
            'permissions' => Permission::query()->search($this->searchableFields, $this->search)
                ->with('roles')
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->paginate($this->perPage),
        ])
            ->extends('layouts.admin');
    }

    public function destroy($id)
    {
        try {
            Permission::find($id)->delete();
            session()->flash('success', 'Permission Deleted Successfully!');
        } catch (\Exception $e) {
            session()->flash('error', 'Something goes wrong while deleting permission!');
        }
    }
}
