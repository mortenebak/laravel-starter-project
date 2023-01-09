<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class Users extends Component
{
    use WithPagination;

    protected $listeners = [
        'deleteUser' => 'destroy',
        'userUpdated' => '$refresh',
        'userCreated' => '$refresh',
    ];

    public int $perPage = 25;

    public string $sortField = 'name';

    public bool $sortAsc = true;

    public string $search = '';

    public string $roleType = '';

    public array $searchableFields = ['name', 'email'];

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
        return view('livewire.admin.users', [
            'users' => User::query()->search($this->searchableFields, $this->search)
                ->with('roles')
                ->when($this->sortField, fn ($query) => $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc'))
                ->when($this->roleType, fn ($query) => $query->role($this->roleType))
                ->paginate($this->perPage),
            'roles' => Role::all(),
        ])
            ->extends('layouts.admin');
    }

    public function destroy($id)
    {
        try {
            User::find($id)->delete();
            session()->flash('success', 'User Deleted Successfully!!');
        } catch (\Exception $e) {
            session()->flash('error', 'Something goes wrong while deleting User!!');
        }
    }
}
