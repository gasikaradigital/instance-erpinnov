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

        try {
            $user = Auth::user();
            $baseUrl = rtrim($user->url_dolibarr, '/');

            // Récupérer toutes les tâches
            $response = Http::withoutVerifying()
                ->withHeaders([
                    'DOLAPIKEY' => $user->api_key
                ])
                ->get($baseUrl . '/api/index.php/tasks', [
                    'limit' => 100,
                    'sortfield' => 't.dateo',
                    'sortorder' => 'DESC'
                ]);

            if (!$response->successful()) {
                throw new Exception('Erreur API: ' . $response->status());
            }

            // Récupérer la liste des projets pour avoir les références
            $projetsResponse = Http::withoutVerifying()
                ->withHeaders([
                    'DOLAPIKEY' => $user->api_key
                ])
                ->get($baseUrl . '/api/index.php/projects', [
                    'limit' => 100
                ]);

            $projets = [];
            if ($projetsResponse->successful()) {
                $projets = collect($projetsResponse->json())->keyBy('id')->map(function($projet) {
                    return [
                        'ref' => $projet['ref'],
                        'title' => $projet['title']
                    ];
                })->all();
            }

            $data = collect($response->json())->map(function($item) use ($projets) {
                $task = (object) $item;

                // Formatage des dates
                $task->date_start_formatted = Carbon::parse($task->date_start)->format('d/m/Y');
                $task->date_end_formatted = $task->date_end ? Carbon::parse($task->date_end)->format('d/m/Y') : '-';

                // Informations du projet
                $task->project_ref = $projets[$task->fk_project]['ref'] ?? 'N/A';
                $task->project_title = $projets[$task->fk_project]['title'] ?? 'N/A';

                // Progression et statut
                $task->progress = $task->progress ?? 0;
                $task->status_label = $this->getStatusLabel($task->status);
                $task->status_class = $this->getStatusClass($task->status);

                // Formatage des temps
                $task->planned_workload_formatted = $this->formatWorkload($task->planned_workload ?? 0);
                $task->duration_effective_formatted = $this->formatWorkload($task->duration_effective ?? 0);

                return $task;
            })->all();
dd($data);
            return view('livewire.taches.taches-index', [
                'data' => $data,
                'title' => 'Toutes les Tâches'
            ]);

        } catch (Exception $e) {
            Log::error('Erreur récupération tâches:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return view('livewire.taches.taches-index', [
                'data' => [],
                'title' => 'Toutes les Tâches',
                'error' => "Une erreur s'est produite lors du chargement des tâches."
            ]);
        }

    }
}
