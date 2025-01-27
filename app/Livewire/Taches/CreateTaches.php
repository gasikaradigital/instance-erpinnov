<?php

namespace App\Livewire\Taches;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class CreateTaches extends Component
{
    public $ref;
    public $label;
    public $project_ref;
    public $parent_task_id;
    public $start_date;
    public $end_date;
    public $planned_workload;
    public $progress = 0;
    public $priority = 2; // Moyenne par défaut
    public $visibility = 1; // Tous les contacts par défaut
    public $budget;
    public $assigned_to;
    public $description;
    public $tache_ref;

    public function createDraft()
    {
        $this->validate();
        // Logique de création en brouillon
    }

    public function createAndValidate()
    {
        $this->validate();
        // Logique de création et validation
    }

    //Récupère la réference des tâches pour une génération automatique de référence
    public function getTache(){
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
                    'sortorder' => 'ASC'
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

            return $data;
            
        } catch (Exception $e) {
            Log::error('Erreur récupération tâches:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
        }
    }

    public function render()
    {
        try {
            $user = Auth::user();
            $baseUrl = rtrim($user->url_dolibarr, '/');

            $response = Http::withoutVerifying()
                ->withHeaders([
                    'DOLAPIKEY' => $user->api_key
                ])->get($user->url_dolibarr . '/api/index.php/projects', [
                    'limit' => 100,
                    'sortfield' => 'dateo',
                    'sortorder' => 'ASC'
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

            $tache = $this->getTache();
            foreach($tache as $reference){
                $this->tache_ref[] = $reference->ref;
            }
            
            return view('livewire.taches.create-taches', [
                'projects' => $data,
                'title' => 'Ajout de tâche'
            ]);

        } catch (Exception $e) {
            
            Log::error('Erreur récupération projets:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return view('livewire.taches.create-taches', [
                'data' => []
            ]);
        }
    }

    public function submit()
    {
        dd('kez');
        // $this->setTacheRef();
        // // Récupération de l'utilisateur connecté
        // $user = Auth::user();
        
        // // Validation des paramètres de la requête
        // $data=[
        //     'ref' => $this->tache_ref,
        //     'fk_project' => 1,
        //     'description' => $this->description,
        //     'label' => $this->label,
        //     'date_c' => Carbon::now(),
        //     'date_start' => $this->start_date,
        //     'date_end' => $this->end_date,
        //     'budget_amount' => $this->budget,
            
        //     'project_ref' => $this->project_ref,
            
        // ];

        // try {
        //     // Appel à l'API pour créer une tâche
        //     $response = Http::withoutVerifying()
        //         ->withHeaders([
        //             'DOLAPIKEY' => $user->api_key,
        //         ])
        //         ->post($user->url_dolibarr . '/api/index.php/tasks', [
        //             'fk_project' => $data['fk_project'],
        //             'label' => $data['label'],
        //             'description' => $data['description'] ?? '',
        //         ]);

                
        //     if (!$response->successful()) {
        //         if (!$response->successful()) {
        //             throw new Exception('Erreur API: ' . $response->status() . ' - ' . $response->body());
        //         }                
        //     }
        //     dd($response->json());
        //     $task = $response->json();

        //     return response()->json([
        //         'success' => true,
        //         'message' => 'Tâche créée avec succès.',
        //         'task' => $task,
        //     ], 201);
        // } catch (Exception $e) {
        //     dd($e->getMessage());
        //     return response()->json([
        //         'success' => false,
        //         'message' => $e->getMessage(),
        //     ], 500);
        // }
    }

    /*public function setTacheRef(){
        try{
            if (empty($this->tache_ref)) {
                $this->tache_ref = "PJ2501-00001";
            } else {
                // Récupérer le dernier code client
                $lastCode = end($this->tache_ref);
                
                // Extraire la partie numérique après le tiret
                if (preg_match('/^(.*-)(\d+)$/', $lastCode, $matches)) {
                    $prefix = $matches[1]; // Partie avant le numéro (ex: "CU2501-")
                    $number = (int) $matches[2]; // Partie numérique
    
                    // Incrémenter le numéro
                    $newNumber = str_pad($number + 1, strlen($matches[2]), '0', STR_PAD_LEFT);
    
                    // Retourner le nouveau code client
                    
                    $this->tache_ref = $prefix. $newNumber;
                
                }
            }
        } catch(Exception $e){
            dd($e->getMessage());
        }
        
    }*/
}
