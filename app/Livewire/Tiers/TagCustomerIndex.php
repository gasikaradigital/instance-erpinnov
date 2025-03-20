<?php

namespace App\Livewire\Tiers;

use Exception;
use Livewire\Component;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class TagCustomerIndex extends Component
{
    private $categoriesList;

    public function mount()
    {
        $user = Auth::user();
        try {
            $getCustomerTagsResponse = Http::withHeaders([
                'DOLAPIKEY' => $user->api_key
            ])->get($user->url_dolibarr . '/api/index.php/categories?sortfield=t.rowid&sortorder=ASC&limit=100&type=2');

            if(!$getCustomerTagsResponse->successful()){
                
            }
            $this->categoriesList = collect($getCustomerTagsResponse->json());
        } catch (Exception $e) {
            dump("Erreur lors de la recupération des tags : " . $e->getMessage());
        }
    }

    public function render()
    {

        return view('livewire.tiers.tag-customer-index', [
            'categories' => $this->categoriesList
        ]);
    }
}
