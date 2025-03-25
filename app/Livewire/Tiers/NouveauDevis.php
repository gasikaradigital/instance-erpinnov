<?php

namespace App\Livewire\Tiers;

use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

use Livewire\Component;

use Illuminate\Support\Collection;

class NouveauDevis extends Component
{
    private $tiers = [];
    private $contacts = []; // contacts du tier
    public $listeTiers = [];
    public $socid; // id du tier
    public $availability;
    public $mode_reglement_id;
    public $cond_reglement_id;
    public $demand_reason_id;
    public $note_public;
    public $note_private;
    public $datep;
    public $delivery_date;
    public $fin_validite;
    public $user_author_id;
    public $duree_validite;
    private $apiData;

    /**=====================================
     * validations
    =========================================*/
    private function setApiData()
    {
        $this->validate();

        $this->apiData = [
            'socid' => $this->socid
        ];
    }
    /**========================================
     * actions
     =========================================*/

    public function createProposal()
    {
        $this->setApiData;
        try {
            $user = Auth::user();
            $createProposalResponse = Http::withHeaders([
                'DOLAPIKEY' => $user->api_key,
                'Accept' => 'application/json'
            ])->post($user->url_dolibarr . '/api/index.php/proposals', $this->apiData);
            if($createProposalResponse->successful()){
                return redirect('/tiers');
            }
        } catch (Exception $e) {

        }
    }

    /**========================================
     * initialisation
     =========================================*/
    public function mount()
    {
        // recuperation des listes des tiers
        try {
            $user = Auth::user();

            $getTiersResponse = Http::withHeaders([
                'DOLAPIKEY' => $user->api_key
            ])->get($user->url_dolibarr . '/api/index.php/thirdparties');

            if ($getTiersResponse->successful()) {
                $this->tiers = collect($getTiersResponse->json());
                $this->listeTiers = collect($this->tiers)->map(function ($item) {
                    return ['name' => $item['name'], 'id' => $item['id']];
                })->all();
            }
            
        } catch (Exception $e) {
        }
    }

    public function render()
    {
        return view('livewire.tiers.nouveau-devis');
    }
}
