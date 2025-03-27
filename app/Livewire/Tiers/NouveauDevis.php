<?php

namespace App\Livewire\Tiers;

use App\Services\CodeGeneratorService;
use DateTime;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

use Livewire\Component;

use Illuminate\Support\Collection;

class NouveauDevis extends Component
{
    private $tiers = [];
    private $contacts = [];
    public $contactList = [];
    public $listeTiers = [];
    public $contacts_ids = [];
    public $ref_client;
    public $socid = 0; // id du tier
    public $mode_reglement_id=0;
    public $cond_reglement_id=0;
    public $demand_reason_id=0;
    public $availability_id = 0;
    public $note_public;
    public $note_private;
    public $datep;
    public $delivery_date=null;
    public $fin_validite;
    public $user_author_id;
    public $duree_validite=0;
    private $apiData;

    public function dumping(){
        dump($this->contacts_ids);
    }
    /**=====================================
     * validations
    =========================================*/
    protected $rules =  [
        'socid' => 'required|integer|gt:0',
        'datep' => 'required|date_format:Y-m-d',
        'ref_client' => 'nullable|string',
        'duree_validite' => 'nullable|integer',
        'cond_reglement_id' => 'nullable|integer',
        'mode_reglement_id' => 'nullable|integer',
        'demand_reason_id' => 'nullable|integer',
        'availability_id' => 'nullable|integer',
        'delivery_date' => 'nullable|date_format:Y-m-d',
        'note_public' => 'nullable|string',
        'note_private' => 'nullable|string'
    ];

    protected $messages = [
        'socid.required' => 'La sélection d\'un client est obligatoire.',
        'socid.integer' => 'L\'identifiant du client doit être un nombre entier.',
        'socid.gt' => 'Veuillez sélectionner un client valide.',
    
        'datep.required' => 'La date de proposition est obligatoire.',
        'datep.date_format' => 'Le format de la date de proposition est invalide. Utilisez AAAA-MM-JJ.',
    
        'ref_client.string' => 'La référence client doit être une chaîne de caractères.',
    
        'duree_validite.integer' => 'La durée de validité doit être un nombre entier.',
    
        'cond_reglement_id.integer' => 'Les conditions de règlement doivent être un nombre entier.',
    
        'mode_reglement_id.integer' => 'Le mode de règlement doit être un nombre entier.',
    
        'demand_reason_id.integer' => 'La raison de la demande doit être un nombre entier.',
    
        'availability_id.integer' => 'L\'identifiant de disponibilité doit être un nombre entier.',
    
        'delivery_date.date_format' => 'Le format de la date de livraison est invalide. Utilisez AAAA-MM-JJ.',
    
        'note_public.string' => 'La note publique doit être une chaîne de caractères.',
    
        'note_private.string' => 'La note privée doit être une chaîne de caractères.'
    ];
    /**
     * hooks 
     */
    public function updatedSocid($value)
    {
        $this->contacts = $this->getContactByTier($value);
        if ($this->contacts != null) {
            $this->contactList = collect($this->contacts)->map(function ($item) {
                $contact = ['id' => $item['id'], 'name' => $item['firstname'] . ' ' . $item['lastname']];
                return $contact;
            })->all();
        } else {
            $this->contacts_ids = [];
            $this->contactList = [];
        }
        $this->dispatch('client-changed', clientId: $value);
    }

    /**========================================
     * actions
     =========================================*/

     // validation et assignation des valeur du body (création du devis)
     private function setApiData()
    {
        $this->validate();
        $date_proposition = DateTime::createFromFormat('Y-m-d', $this->datep);
        $date_proposition_timestamp = $date_proposition->getTimestamp();

        if($this->delivery_date!=null){
        $delivery_date = DateTime::createFromFormat('Y-m-d', $this->delivery_date);
        $delivery_date_timestamp = $delivery_date->getTimestamp();
        }
        $this->apiData = [
            'socid' => $this->socid != 0 ? $this->socid : null,
            'ref_client' => $this->ref_client,
            'contacts_ids'=>$this->contacts_ids,
            'datep' => $date_proposition_timestamp,
            'duree_validite' => $this->duree_validite,
            'cond_reglement_id' => $this->cond_reglement_id,
            'mode_reglement_id' => $this->mode_reglement_id,
            'demand_reason_id' => $this->demand_reason_id,
            'availability_id' => $this->availability_id,
            'delivery_date' => $this->delivery_date == null ? null : $delivery_date_timestamp,
            'note_public' => $this->note_public,
            'note_private' => $this->note_private,
            'user_author' => 1
        ];
    }

    // recuperation des contacts avec l'id du tiers
    private function getContactByTier($tierId)
    {
        try {
            $user = Auth::user();
            $getContactsResponse = Http::withHeaders([
                'DOLAPIKEY' => $user->api_key,
                'Accept' => 'application/json'
            ])->get($user->url_dolibarr . '/api/index.php/contacts?sortfield=t.rowid&sortorder=ASC&thirdparty_ids=' . $tierId);

            if ($getContactsResponse->successful()) {
                return collect($getContactsResponse->json());
            }
            return null;
        } catch (Exception $e) {
            dump($e->getMessage());
        }
    }

    // creation du devis
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
            }else{
                dump(json_encode($this->apiData));
                dump($createProposalResponse);
            }
        } catch (Exception $e) {
            dump($e->getMessage());
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
