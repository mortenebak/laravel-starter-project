<?php

namespace App\Livewire\Admin;

use App\Models\Plan;
use Exception;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class Plans extends Component
{
    use LivewireAlert;
    use WithPagination;

    public int $perPage = 25;

    public string $sortField = 'title';

    public bool $sortAsc = true;

    public string $search = '';

    public array $searchableFields = ['title', 'slug', 'stripe_id'];

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

    #[Layout('layouts.admin')]
    public function render(): View
    {
        return view('livewire.admin.plans', [
            'plans' => Plan::query()->search($this->searchableFields, $this->search)
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->paginate($this->perPage),
        ]);
    }

    public function destroy($id): void
    {
        try {
            Permission::query()->find($id)->delete();
            $this->alert('success', 'Permission deleted successfully!');
        } catch (Exception $e) {
            $this->alert('error', 'Something went wrong!');
        }
    }
}
