<?php

namespace App\Livewire\Tiers;

use App\Services\CodeGeneratorService;
use Livewire\Component;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class CreateTiers extends Component
{
    public $typent_id;
    public $selectedClientCategorie = 0;
    public $selectedFournisseurCategorie = 0;
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
    public $codeClient;
    public $zip;
    public $data;
    public $parent;
    public $capital;
    public $effectif;
    public $effectif_id;
    public $tva_assuj;
    public $tva_intra;
    public $fax;
    public $location_incoterms;
    public $fk_incoterms;
    public $idprof1;
    public $idprof2;
    public $idprof3;
    public $categories = [];

    public function setValue()
    {
        $codeGeneratorService = app(CodeGeneratorService::class);
        $codeFournisseur = null;
        $this->code_client = $codeGeneratorService->generateClientCode();
        if ($this->fournisseur !== 0) {
            $this->code_fournisseur = $codeGeneratorService->generateFournisseurCode();
        }

        switch ($this->effectif_id) {
            case 1:
                $this->effectif = "1 - 5";
                break;
            case 2:
                $this->effectif = "6 - 10";
                break;
            case 3:
                $this->effectif = "11 - 50";
                break;
            case 4:
                $this->effectif = "51 - 100";
                break;
            case 5:
                $this->effectif = "101 - 500";
                break;
            case 6:
                $this->effectif = "> 500";
        }

        $this->valeur = [
            'name' => $this->name,
            'name_alias' => $this->name_alias,
            'address' => $this->address,
            'town' => $this->town,
            'phone' => $this->phone,
            'email' => $this->email,
            'country_id' => $this->country_id,
            'country_code' => $this->country_code,
            'typent_id' => $this->typent_id,
            'typent_code' => $this->typent_code,
            'multicurrency_code' => 'required|string|in:MGA,EUR,USD',
            'comercial_id' => 1,
            'nif' => $this->nif,
            'stat' => $this->stat,
            'zip' => $this->zip,
            'client' => $this->client,
            'fournisseur' => $this->fournisseur,
            'code_client' => $this->code_client,
            'code_fournisseur' => $this->code_fournisseur,
            'parent' => $this->parent,
            'capital' => $this->capital,
            'effectif' => $this->effectif,
            'effectif_id' => $this->effectif_id,
            'tva_assuj' => $this->tva_assuj,
            'tva_intra' => $this->tva_intra,
            'fax' => $this->fax,
            'fk_incoterms' => $this->fk_incoterms,
            'location_incoterms' => $this->location_incoterms,
            'idprof1' => $this->idprof1,
            'idprof2' => $this->idprof2,
            'idprof3' => $this->idprof3,
            'commerciax' => "1"
        ];
    }

    public function setTypentCode($typentId)
    {
        switch ($typentId) {
            case '2':
                $this->typent_code = "TE_GROUP";
                break;
            case '3':
                $this->typent_code = "TE_MEDIUM";
                break;
            case '4':
                $this->typent_code = "TE_SMALL";
                break;
            case '5':
                $this->typent_code = "TE_ADMIN";
                break;
            case '8':
                $this->typent_code = "TE_PRIVATE";
                break;
            case '100':
                $this->typent_code = "TE_OTHER";
                break;
        }
    }

    public function setCountryCode($countryId)
    {
        switch ($countryId) {
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
    }

    public function save()
    {

        $this->setTypentCode($this->typent_id);

        $this->setCountryCode($this->country_id);


        try {

            $this->setValue();

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
    }

    public function mount()
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
            $this->data = collect($response->json())->map(function ($item) {
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
            foreach ($this->data as $codeClient) {
                if ($codeClient->code_client) {
                    $this->codeClient[] = $codeClient->code_client;
                }
            }
        } catch (Exception $e) {
            Log::error('Erreur lors de la récupération des tiers: ' . $e->getMessage());
        }

        try {
            $getCategoriesResponse = Http::withHeaders([
                'DOLAPIKEY' =>  $user->api_key
            ])->get($user->url_dolibarr . '/api/index.php/categories');
            if ($getCategoriesResponse->successful()) {
                $this->categories = collect($getCategoriesResponse->json())
                    ->map(function ($item) {
                        if ($item['type'] == 1 || $item['type'] == 2) {
                            return [
                                'name' => $item['label'],
                                'id' => $item['id'],
                                'parent' => $item['fk_parent'],
                                'type' => $item['type']
                            ];
                        }
                    })
                    ->filter()
                    ->values()
                    ->all();
                dump($this->categories);
            } else {
                dump($getCategoriesResponse->status());
            }
        } catch (Exception $e) {
            dump("erreur" . $e->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.tiers.create-tiers', [
            'data' => $this->data,
        ]);
    }
}
