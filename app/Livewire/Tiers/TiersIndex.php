<?php

namespace App\Livewire\Tiers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class TiersIndex extends Component
{
    /*public $typent_id;
    public $typent_code;
    public $name;
    public $name_alias;
    public $client;
    public $code_client;
    public $code_fournisseur;
    public $address;
    public $town;
    public $phone;
    public $email;
    public $url;
    public $status;
    public $nif;
    public $stat;
    public $country_id;
    public $country_code;
    public $fournisseur;
    private $valeur;
    public $codeClient;
    public $zip;*/
    public $data;

    /*public function setValue()
    {
        if($this->fournisseur !== 0)
        {
            $this->generateFournisseurCode();
        }

        $this->valeur = [
            'name' => $this->name,
            'name_alias' =>$this->name_alias,
            'address' => $this->address,
            'town' => $this->town,
            'phone' => $this->phone,
            'email' => $this->email,
            'country_id' => $this->country_id,
            'country_code' => $this->country_code,
            'typent_id' => $this->typent_id,
            'typent_code' => $this->typent_code,
            'multicurrency_code' => 'required|string|in:MGA,EUR,USD',
            'nif' => $this->nif,
            'stat' => $this->stat,
            'zip' => $this->zip,
            'client' => $this->client,
            'fournisseur' => $this->fournisseur,
            'code_client' => $this->code_client,
            'code_fournisseur' => $this->code_fournisseur
        ];
    }*/

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
            
            //Récupération des codes clients qui sont déjà utilisé par d'autre tiers
            foreach($this->data as $codeClient){
                if($codeClient->code_client){
                    $this->codeClient[] = $codeClient->code_client;
                }
            }
            
            return view('livewire.tiers.tiers-index', [
                'data' => $this->data,
                'title' => 'Liste des tiers'
            ]);
        } catch (Exception $e) {
            Log::error('Erreur lors de la récupération des tiers: ' . $e->getMessage());
            return view('livewire.tiers.tiers-index', [
                'data' => [],
                'error' => $e->getMessage(),
                'title' => 'Liste des tiers'
            ]);
        }
    }

    /*public function setTypentCode($typentId)
    {
        switch($typentId)
        {
            case '2':
                $this->typent_code="TE_GROUP";
            break;
            case '3':
                $this->typent_code="TE_MEDIUM";
            break;
            case '4':
                $this->typent_code="TE_SMALL";
            break;
            case '5':
                $this->typent_code="TE_ADMIN";
            break;
            case '8':
                $this->typent_code = "TE_PRIVATE";
            break;
            case '100':
                $this->typent_code = "TE_OTHER";
            break;
        }
    }*/

    /*public function setCountryCode($countryId)
    {
        switch($countryId){
            case '1':
                $this->country_code = "FR";
                break;
            case '2':
                $this->country_code = "BE";
                break;
            case '6':
                $this->country_code = "CH";
                break;
            case '143':
                $this->country_code = "MG";
                break;
        }
    }*/

    /*public function save()
    {
        $this->setTypentCode($this->typent_id);

        $this->setCountryCode($this->country_id);

        $this->generateClientCode();

        $this->generateFournisseurCode();

        $this->setValue();

        try {
            // Préparation des données pour l'API
            $apiData = [
                ...$this->valeur,
                'status' => 1,
                'tva_assuj' => 1,
                'country_code' => 'MG',
                'entity' => 1
            ];


            // Log pour debug
            Log::info('Données envoyées à l\'API:', $apiData);


            $user = Auth::user();
            // Envoi à l'API
            $response = Http::withHeaders([
                'DOLAPIKEY' => $user->api_key,
                'Accept' => 'application/json'
            ])->post($user->url_dolibarr . '/api/index.php/thirdparties', $apiData);

            if (!$response->successful()) {
                Log::error('Réponse API Dolibarr: ' . $response->body());
                throw new Exception('Erreur API: ' . $response->body());
            }

            return redirect('/tiers')->with('success', 'Tiers créé avec succès');
        } catch (Exception $e) {
            dd($e->getMessage());
            Log::error('Erreur création tiers: ' . $e->getMessage());
            return back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }*/

    /*public function generateClientCode()
    {
        if (empty($this->codeClient)) {
            $this->code_client = "CU2501-00001";
        } else {
            // Récupérer le dernier code client
            $lastCode = end($this->codeClient);

            // Extraire la partie numérique après le tiret
            if (preg_match('/^(.*-)(\d+)$/', $lastCode, $matches)) {
                $prefix = $matches[1]; // Partie avant le numéro (ex: "CU2501-")
                $number = (int) $matches[2]; // Partie numérique

                // Incrémenter le numéro
                $newNumber = str_pad($number + 1, strlen($matches[2]), '0', STR_PAD_LEFT);

                // Retourner le nouveau code client

                $this->code_client = $prefix. $newNumber;
            }
        }

    }*/

    /*public function generateFournisseurCode()
    {
        if (empty($this->codeFournisseur)) {
            $this->code_fournisseur = "SU2501-00001";
        } else {
            // Récupérer le dernier code client
            $lastCode = end($this->codeFournisseur);

            // Extraire la partie numérique après le tiret
            if (preg_match('/^(.*-)(\d+)$/', $lastCode, $matches)) {
                $prefix = $matches[1]; // Partie avant le numéro (ex: "CU2501-")
                $number = (int) $matches[2]; // Partie numérique

                // Incrémenter le numéro
                $newNumber = str_pad($number + 1, strlen($matches[2]), '0', STR_PAD_LEFT);

                // Retourner le nouveau code client

                $this->code_Fournisseur = $prefix. $newNumber;
            }
        }
    }*/

}
