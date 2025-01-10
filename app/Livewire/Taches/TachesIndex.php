<?php

namespace App\Livewire\Taches;

use Livewire\Component;
use Livewire\WithPagination;

class TachesIndex extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'created_at';
    public $sortDirection = 'desc';
    public $filters = [
        'status' => '',
        'priority' => '',
        'assignee' => ''
    ];

    public function sortBy($field)
    {
        $this->sortDirection = $this->sortField === $field
            ? $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc'
            : 'asc';

        $this->sortField = $field;
    }

    public function render()
    {
        // $tasks = Task::query()
        //     ->when($this->search, function($query) {
        //         $query->where('ref', 'like', '%'.$this->search.'%')
        //             ->orWhere('label', 'like', '%'.$this->search.'%');
        //     })
        //     ->when($this->filters['status'], function($query) {
        //         $query->where('status', $this->filters['status']);
        //     })
        //     ->when($this->filters['priority'], function($query) {
        //         $query->where('priority', $this->filters['priority']);
        //     })
        //     ->when($this->filters['assignee'], function($query) {
        //         $query->where('assignee_id', $this->filters['assignee']);
        //     })
        //     ->orderBy($this->sortField, $this->sortDirection)
        //     ->paginate(10);

        return view('livewire.taches.taches-index', [
            // 'tasks' => $tasks
        ]);
    }
}
