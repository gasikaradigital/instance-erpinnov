<?php

namespace App\Livewire\Tiers;

use App\Models\CodeGenerator;
use Livewire\Component;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Services\CodeGeneratorService;

class CreateContact extends Component
{
    public $data;
    public $civility_code;
    public $civility;
    public $lastname;
    public $firstname;
    public $socid;
    public $code_contact;
    public $codeContact; // Pour stocker les codes existants
    public $poste;
    public $address;
    public $zip;
    public $town;
    public $country_id;
    public $country_code;
    public $phone_pro;
    public $phone_perso;
    public $phone_mobile;
    public $email;
    public $fax;
    public $priv;
    public $value;
    protected $codeGeneratorService;
    
    public function mount(){
    }
    
    private $civilityMap = [
        'MME' => 'Madame',
        'MR' => 'Monsieur',
        'MLE' => 'Mademoiselle',
        'MTRE' => 'Maître',
        'DR' => 'Docteur',
    ];

    private $countryCodeMap = [
        '1' => 'FR',
        '2' => 'BE',
        '6' => 'CH',
        '143' => 'MG',
    ];

    public function setValue()
    {   
        $this->civility = $this->civilityMap[$this->civility_code] ?? 'Unknown';
        $this->country_code = $this->countryCodeMap[$this->country_id] ?? null;
        $codeGeneratorService = app(CodeGeneratorService::class);
        $this->code_contact = $codeGeneratorService->generateContactCode();
        $this->value = [
            'civility' => $this->civility,
            'civility_code' => $this->civility_code,
            'lastname' => $this->lastname,
            'firstname' => $this->firstname,
            'socid' => $this->socid,
            'fk_soc' => $this->socid,
            'poste' => $this->poste,
            'address' => $this->address,
            'zip' => $this->zip,
            'town' => $this->town,
            'country_id' => $this->country_id,
            'country_code' => $this->country_code,
            'phone_pro' => $this->phone_pro,
            'phone_mobile' => $this->phone_mobile,
            'phone_perso' => $this->phone_perso,
            'email' => $this->email,
            'fax' => $this->fax,
            'priv' => $this->priv,
            'array_options' => [
                'options_code_contact' => $this->code_contact
            ]
        ];
    }

    public function save()
    {

        
        try {
            $this->setValue();

            $apiData = [
                ...$this->value,
                'statut' => 1,
                'entity' => 1
            ];

            Log::info('Données envoyées à l\'API:', $apiData);

            $user = Auth::user();
            
            $response = Http::withHeaders([
                'DOLAPIKEY' => $user->api_key,
                'Accept' => 'application/json'
            ])->post($user->url_dolibarr . '/api/index.php/contacts', $apiData);

            if (!$response->successful()) {
                Log::error('Réponse API Dolibarr: ' . $response->body());
                throw new Exception('Erreur API: ' . $response->body());
            }

            return redirect('/contact')->with('success', 'Contact créé avec succès');
        } catch (Exception $e) {
            Log::error('Erreur création de contact: ' . $e->getMessage());
            return back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function render()
    {
        $user = Auth::user();
        
        try {
            $response = Http::withHeaders([
                'DOLAPIKEY' => $user->api_key 
            ])->get($user->url_dolibarr . '/api/index.php/contacts');
    
            if (!$response->successful()) {
                throw new Exception('Erreur API: ' . $response->status());
            }
    
            $this->data = collect($response->json())->map(function($item) {
                $item = (object) $item;
                
                // Accès direct au code_contact depuis array_options
                $item->code_contact = $item->array_options['options_code_contact'] ?? 'N/A';
                
                // Valeurs par défaut pour les autres champs
                $item->firstname = $item->firstname ?? '';
                $item->lastname = $item->lastname ?? '';
                $item->phone_pro = $item->phone_pro ?? '';
                $item->phone_mobile = $item->phone_mobile ?? '';
                $item->email = $item->email ?? '';
                $item->socname = $item->socname ?? '';
                $item->priv = $item->priv ?? '0';
                $item->statut = $item->statut ?? '0';
    
                return $item;
            })->all();
    
            return view('livewire.tiers.create-contact', [
                'data' => $this->data,
            ]);
            
        } catch (Exception $e) {
            Log::error('Erreur lors de la récupération des contacts: ' . $e->getMessage());
            $this->data = [];
            return view('livewire.tiers.create-contact', [
                'data' => $this->data,
            ]);
        }
    }
}