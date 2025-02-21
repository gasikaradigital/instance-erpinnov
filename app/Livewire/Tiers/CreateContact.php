<?php

namespace App\Livewire\Tiers;

use Livewire\Component;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class CreateContact extends Component
{
    public $data;
    public $civility_code;
    public $civility;
    public $lastname;
    public $firstname;
    public $socid;
    // public $code_contact;
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
        
        $this->value = [
            'civility' => $this->civility,
            'civility_code' => $this->civility_code,
            'lastname' => $this->lastname,
            'firstname' => $this->firstname,
            'socid' => $this->socid,
            'fk_id' => $this->socid,
            'poste' => $this->poste,
            'address' => $this->address,
            'zip' => $this->zip,
            // 'code_contact' => $this->code_contact,
            'town' => $this->town,
            'country_id' => $this->country_id,
            'country_code' => $this->country_code,
            'phone_pro' => $this->phone_pro,
            'phone_mobile' => $this->phone_mobile,
            'phone_perso' => $this->phone_perso,
            'email' => $this->email,
            'fax' => $this->fax,
            'priv' => $this->priv,
        ];
    }

    public function save()
    {
        
        $this->setValue();
        
        try {
            // Préparation des données pour l'API
            $apiData = [
                ...$this->value,
                'statut' => 1,
                'entity' => 1,
                
            ];


            // Log pour debug
            Log::info('Données envoyées à l\'API:', $apiData);

            $user = Auth::user();
            
            // Envoi à l'API
            $response = Http::withHeaders([
                'DOLAPIKEY' => $user->api_key,
                'Accept' => 'application/json'
            ])->post($user->url_dolibarr . '/api/index.php/contacts', $apiData);

            if (!$response->successful()) {
                Log::error('Réponse API Dolibarr: ' . $response->body());
                throw new Exception('Erreur API: ' . $response->body());
            }

            return redirect('/contact')->with('success', 'Contacts créé avec succès');
        } catch (Exception $e) {
            dd($e->getMessage());
            Log::error('Erreur création de contact: ' . $e->getMessage());
            return back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

//     public function generateContactCode()
// {
//     if (empty($this->codeContact)) {
//         $this->code_contact = "CO2501-00001";
//     } else {
//         // Récupérer le dernier code contact
//         $lastCode = end($this->codeContact);

//         // Extraire la partie numérique après le tiret
//         if (preg_match('/^(.*-)(\d+)$/', $lastCode, $matches)) {
//             $prefix = $matches[1]; // Partie avant le numéro (ex: "CO2501-")
//             $number = (int) $matches[2]; // Partie numérique

//             // Incrémenter le numéro
//             $newNumber = str_pad($number + 1, strlen($matches[2]), '0', STR_PAD_LEFT);

//             // Retourner le nouveau code contact
//             $this->code_contact = $prefix . $newNumber;
//         }
//     }
// }

public function render()
{
    $user = Auth::user();
    
    try {
        // Change the endpoint to fetch contacts instead of thirdparties
        $response = Http::withHeaders([
            'DOLAPIKEY' => $user->api_key 
        ])->get($user->url_dolibarr . '/api/index.php/thirdparties');

        if (!$response->successful()) {
            throw new Exception('Erreur API: ' . $response->status());
        }

        // Transform the data
        $this->data = collect($response->json())->map(function($item) {
            $item = (object) $item;
            
            // Add default values for potentially missing fields
            $item->code_contact = $item->code_contact ?? 'N/A';
            $item->firstname = $item->firstname ?? '';
            $item->lastname = $item->lastname ?? '';
            $item->phone_pro = $item->phone_pro ?? '';
            $item->phone_mobile = $item->phone_mobile ?? '';
            $item->email = $item->email ?? '';
            $item->socname = $item->socname ?? '';
            $item->priv = $item->priv ?? '0';

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
