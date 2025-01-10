<?php

namespace App\Livewire\Projets;

use Livewire\Component;

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
        // Validation
        $this->validate([
            'ref' => 'required|unique:projects,ref',
            'title' => 'required|min:3',
            'status_id' => 'required|integer',
            // Autres règles de validation
        ]);

        // Création du projet
    }

    public function render()
    {
        return view('livewire.projets.create-projet');
    }
}
