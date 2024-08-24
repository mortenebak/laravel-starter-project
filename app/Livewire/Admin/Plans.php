<?php

namespace App\Livewire\Admin;

use App\Models\Plan;
use Exception;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Session;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Plans extends Component
{
    use LivewireAlert;
    use WithPagination;

    #[Session]
    public int $perPage = 25;

    public string $sortField = 'title';

    public bool $sortAsc = true;

    #[Url]
    public string $search = '';

    public array $searchableFields = ['title', 'slug', 'stripe_id'];

    protected $listeners = [
        'deletePlan' => 'destroy',
        'planCreated' => '$refresh',
        'planUpdated' => '$refresh',
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
            'plans' => Plan::query()
                ->when($this->search, function ($query) {
                    $query->search($this->searchableFields, $this->search);
                })
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->paginate($this->perPage),
        ]);
    }

    public function deletePlan(string $id): void
    {
        try {
            Plan::query()->where('id', '=', $id)->delete();
            $this->alert('success', __('plans.plan_was_deleted'));
            $this->dispatch('deletePlan');
        } catch (Exception $e) {
            $this->alert('error', __('plans.something_went_wrong'));
        }
    }
}
