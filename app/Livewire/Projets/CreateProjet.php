<?php

namespace App\Livewire\Projets;

use Livewire\Component;
use Exception;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\WithPagination;

class CreateProjet extends Component
{
    // Informations générales
    public $ref;
    public $title;
    public $description;

    // Planning
    public $start_date;
    public $end_date;
    public $budget_amount;
    public $planned_workload;

    // État et priorité
    public $status_id = 0;
    public $priority = 1;
    public $visibility = 1;
    public $bill_time = false;

    // Client et contacts
    public $client_id;
    public $contacts = [];

    // Équipe
    public $team = [];

    public function mount()
    {
        // Initialisation si nécessaire
        $this->ref = 'PRJ-' . date('Y') . '-';
    }

    public function saveDraft()
    {
        // Logique de sauvegarde en brouillon
    }

    public function removeContact()
    {
        unset($this->selectedContacts[1]);
    }

    public function submit()
    {   
        try {
            $user = Auth::user();
            $baseUrl = rtrim($user->url_dolibarr, '/');

            $projectData = [
                'ref' => $this->ref,
                'title' => $this->title,
                'status' => $this->status_id,
                'statut' => $this->status_id,
                'description' => $this->description ?? '',
                'public' => $this->visibility ? 1 : 0,
                'date_start' => Carbon::parse($this->start_date)->format('Y-m-d'),
                'date_end' => strtotime(str_replace('/', '-', $this->end_date)),
                'budget_amount' => $this->budget_amount ?? 0,
            ];

            Log::info('Tentative création projet:', [
                'url' => $baseUrl . '/api/index.php/projects',
                'data' => $projectData
            ]);

            $response = Http::withoutVerifying()
                ->withHeaders([
                    'DOLAPIKEY' => $user->api_key
                ])
                ->post($baseUrl . '/api/index.php/projects', $projectData);

            if (!$response->successful()) {
                $errorMessage = $response->body();
                Log::error('Erreur API création projet:', [
                    'status' => $response->status(),
                    'body' => $errorMessage,
                    'data' => $projectData
                ]);
                throw new Exception('Erreur création projet: ' . $errorMessage);
            }

            return redirect()
                ->route('projets')
                ->with('success', 'Projet créé avec succès');

        } catch (Exception $e) {
            Log::error('Erreur création projet:', [
                'message' => $e->getMessage(),
                'data' => $projectData ?? null
            ]);
            return back()
                ->withInput()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function render()
    {
        return view('livewire.projets.create-projet');
    }
}
