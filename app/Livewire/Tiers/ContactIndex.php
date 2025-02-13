<?php

namespace App\Livewire\Tiers;

use Livewire\Component;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class ContactIndex extends Component
{
    public $data;

    public function render()
    {
        $user  = Auth::user();
        
        try {
            // Récupération des tiers depuis l'API Dolibarr
            $response = Http::withHeaders([
                'DOLAPIKEY' =>  $user->api_key 
            ])->get($user->url_dolibarr . '/api/index.php/contacts');

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
            //dd($this->data);
            return view('livewire.tiers.contact-index',[
                'data' => $this->data,
            ]);
            
        } catch (Exception $e) {
            Log::error('Erreur lors de la récupération des contacts: ' . $e->getMessage());
        }
       
    }
}
