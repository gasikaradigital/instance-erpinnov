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

    public function setValue()
    {
        switch($this->civility_code)
        {
            case('MME'):
                $this->civility = "Madame";
                break;
            case('MR'):
                $this->civility = "Monsieur";
                break;
            case('MLE'):
                $this->civility = "Mademoiselle";
                break;
            case('MTRE'):
                $this->civility = "Maître";
                break;
            case('DR'):
                $this->civility = "Docteur";
                break;
        }

        switch($this->country_id)
        {
            case('1'):
                $this->country_code = "FR";
                break;
            case('2'):
                $this->country_code = "BE";
                break;
            case('6'):
                $this->country_code = "CH";
                break;
            case('143'):
                $this->country_code = "MG";
                break;
        }

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
            'town' => $this->town,
            'country_id' => $this->country_id,
            'country_code' => $this->country_code,
            'phone_pro' => $this->phone_pro,
            'phone_mobile' => $this->phone_mobile,
            'phone_perso' => $this->phone_perso,
            'email' => $this->email,
            'mail' => $this->email,
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
                'entity' => 1
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

    public function render()
    {
        $user  = Auth::user();
        
        try {
            // Récupération des tiers depuis l'API Dolibarr
            $response = Http::withHeaders([
                'DOLAPIKEY' =>  $user->api_key 
            ])->get($user->url_dolibarr . '/api/index.php/thirdparties');

            if (!$response->successful()) {
                throw new Exception('Erreur API: ' . $response->status());
            }

            // Conversion du tableau en objets pour faciliter l'utilisation dans la vue
            $this->data = collect($response->json())->map(function($item) {
                $item = (object) $item;

                // Récupérer le nom du pays si country_id existe
                if (!empty($item->country_id)) {
                    try {
                        $countryResponse = Http::withHeaders([
                            'DOLAPIKEY' => $user->api_key
                        ])->get($user->url_dolibarr . '/api/index.php/setup/dictionary/countries/' . $item->country_id);

                        if ($countryResponse->successful()) {
                            $country = $countryResponse->json();
                            $item->country = $country['label'] ?? 'N/A';
                        }
                    } catch (\Exception $e) {
                        $item->country = 'N/A';
                    }
                } else {
                    $item->country = 'N/A';
                }

                return $item;
            })->all();

            return view('livewire.tiers.create-contact',[
                'data' => $this->data,
            ]);
            
        } catch (Exception $e) {
            Log::error('Erreur lors de la récupération des contacts: ' . $e->getMessage());
        }
               
    }
}
