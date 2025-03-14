<?php

namespace App\Livewire\Tiers;

use Livewire\Component;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class TierDashboardIndex extends Component
{
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
            
            //Récupération des nombres de tiers
            $nombre_tier = count($this->data);
            
            $nombre_client = 0;
            $nombre_prospect = 0;
            $nombre_prospect_client = 0;
            $nombre_fournisseur = 0;

            foreach($this->data as $tier)
            {
                switch($tier->client){
                    case '0':
                        if($tier->fournisseur == 1)
                        {
                            $nombre_fournisseur = $nombre_fournisseur + 1;
                        }
                        break;
                    case '1':
                        $nombre_client = $nombre_client + 1;
                        break;
                    case '2':
                        $nombre_prospect = $nombre_prospect + 1;
                        break;
                    case '3':
                        $nombre_client = $nombre_client + 1;
                        $nombre_prospect = $nombre_prospect + 1;
                        break;
                }
            }

            return view('livewire.tiers.tier-dashboard-index', [
                'data' => $this->data,
                'tier' => $nombre_tier,
                'client' => $nombre_client,
                'prospect' => $nombre_prospect,
                'fournisseur' => $nombre_fournisseur,
                'title' => 'Liste des tiers'
            ]);

        } catch (Exception $e) {
            throw new \Exception("Erreur API Dolibarr : " . $e->getMessage());
            Log::error('Erreur lors de la récupération des tiers: ' . $e->getMessage());
            return view('livewire.tiers.tier-dashboard-index', [
                'data' => [],
                'error' => $e->getMessage(),
                'title' => 'Liste des tiers'
            ]);
        }
        return view('livewire.tiers.tier-dashboard-index');
    }
}
