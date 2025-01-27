<?php

namespace App\Livewire\Projets;

use Exception;
use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
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

        try {
            $user = Auth::user();
            $baseUrl = rtrim($user->url_dolibarr, '/');

            $response = Http::withoutVerifying()
                ->withHeaders([
                    'DOLAPIKEY' => $user->api_key
                ])->get($user->url_dolibarr . '/api/index.php/projects', [
                    'limit' => 100,
                    'sortfield' => 'dateo',
                    'sortorder' => 'DESC'
                ]);
            
            if (!$response->successful()) {
                throw new Exception('Erreur API: ' . $response->status());
            }

            $data = collect($response->json())->map(function($item) {
                $projet = (object) $item;
                $projet->status = $projet->status ?? 0;
                $projet->title = $projet->title ?? $projet->ref;
                return $projet;
            })->all();
            
            return view('livewire.projets.projet-index', [
                'data' => $data,
                'title' => 'Liste des Projets'
            ]);

        } catch (Exception $e) {
            dd($e->getMessage());
            Log::error('Erreur récupération projets:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return view('livewire.projets.projet-index', [
                'data' => [],
                'title' => 'Liste des Projets',
                'error' => "Une erreur s'est produite lors du chargement des projets."
            ]);
        }
    }
}
