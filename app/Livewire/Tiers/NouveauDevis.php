<?php

namespace App\Livewire\Tiers;

use App\Services\CodeGeneratorService;
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
    public $ref_client;
    public $socid; // id du tier
    public $availability;
    public $mode_reglement_id;
    public $cond_reglement_id;
    public $demand_reason_id;
    public $availability_id;
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
    protected $rules = [
        'socid' => 'required|integer',
        'datep' => 'required|date_format:d/m/y',
        'ref_client' => 'string',
        'duree_validite' => 'integer',
        'cond_reglement_id' => 'integer',
        'mode_reglement_id' => 'integer',
        'demand_reason_id' => 'integer',
        'availability_id' => 'integer',
        'delivery_date' => 'date_format:d/m/y',
        'note_public' => 'string',
        'note_private' => 'string'
    ];
    private function setApiData()
    {
        $this->validate();
        $data_proposition = '';
        $delivery_date = '';

        $this->apiData = [
            'socid' => $this->socid,
            'ref_client' => $this->ref_client,
            'datep' => $data_proposition,
            'duree_validite' => $this->duree_validite,
            'cond_reglement_id' => $this->cond_reglement_id,
            'mode_reglement_id' => $this->mode_reglement_id,
            'demand_reason_id' => $this->demand_reason_id,
            'availability_id' => $this->availability_id,
            'delivery_date' => $delivery_date,
            'note_public' => $this->note_public,
            'note_private' => $this->note_private,
            'user_author' => 1
        ];
    }
    /**========================================
     * actions
     =========================================*/

    public function createProposal()
    {
        $this->setApiData();
        try {
            $user = Auth::user();
            $createProposalResponse = Http::withHeaders([
                'DOLAPIKEY' => $user->api_key,
                'Accept' => 'application/json'
            ])->post($user->url_dolibarr . '/api/index.php/proposals', $this->apiData);
            if ($createProposalResponse->successful()) {
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
