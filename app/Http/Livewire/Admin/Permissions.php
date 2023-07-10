<?php

namespace App\Http\Livewire\Admin;

use Exception;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class Permissions extends Component
{
    use LivewireAlert;
    use WithPagination;

    public int $perPage = 25;

    public string $sortField = 'name';

    public bool $sortAsc = true;

    public string $search = '';

    public array $searchableFields = ['name'];

    protected $listeners = [
        'deletePermission' => 'destroy',
        'permissionCreated' => '$refresh',
        'permissionUpdated' => '$refresh',
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
        return view('livewire.admin.permissions', [
            'permissions' => Permission::query()->search($this->searchableFields, $this->search)
                ->with('roles')
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->paginate($this->perPage),
        ])
            ->extends('layouts.admin');
    }

    public function destroy($id): void
    {
        try {
            Permission::find($id)->delete();
            $this->alert('success', 'Permission deleted successfully!');
        } catch (Exception $e) {
            $this->alert('error', 'Something went wrong!');
        }
    }
}
