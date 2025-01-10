<?php

namespace App\Livewire\Projets;

use Livewire\Component;
use Livewire\WithPagination;

class ProjetIndex extends Component
{
    use WithPagination;

    // Filtres
    public $search = '';
    public $selectedStatus = '';
    public $selectedPriority = '';
    public $selectedClient = '';

    // Statistiques
    public $activeProjects = 0;
    public $pendingProjects = 0;
    public $completedProjects = 0;
    public $lateProjects = 0;

    protected $queryString = [
        'search' => ['except' => ''],
        'selectedStatus' => ['except' => ''],
        'selectedPriority' => ['except' => ''],
        'selectedClient' => ['except' => ''],
    ];

    public function mount()
    {
        $this->loadStatistics();
    }

    public function loadStatistics()
    {
        // Implémenter le chargement des statistiques
        // $this->activeProjects = Project::where('status', 'active')->count();
        // etc.
    }

    public function resetFilters()
    {
        $this->reset(['search', 'selectedStatus', 'selectedPriority', 'selectedClient']);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        // $projects = Project::query()
        //     ->when($this->search, function($query) {
        //         $query->where(function($q) {
        //             $q->where('ref', 'like', '%'.$this->search.'%')
        //               ->orWhere('title', 'like', '%'.$this->search.'%');
        //         });
        //     })
        //     ->when($this->selectedStatus !== '', function($query) {
        //         $query->where('status_id', $this->selectedStatus);
        //     })
        //     ->when($this->selectedPriority !== '', function($query) {
        //         $query->where('priority', $this->selectedPriority);
        //     })
        //     ->when($this->selectedClient !== '', function($query) {
        //         $query->where('client_id', $this->selectedClient);
        //     })
        //     ->orderBy('created_at', 'desc')
        //     ->paginate(10);

        return view('livewire.projets.projet-index', [
            // 'projects' => $projects
        ]);
    }
}
