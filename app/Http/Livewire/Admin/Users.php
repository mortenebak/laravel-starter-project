<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    public int $perPage = 25;
    public string $sortField = 'name';
    public bool $sortAsc = true;
    public string $search = '';
    public array $searchableFields = ['name', 'email'];

    public function updatingSearch(): void
    {
        $this->gotoPage(1);
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
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
                       ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                       ->paginate($this->perPage)
                    ])
            ->extends('layouts.admin');
    }
}
