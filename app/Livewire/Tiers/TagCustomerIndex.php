<?php

namespace App\Livewire\Tiers;

use Exception;
use Livewire\Component;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class TagCustomerIndex extends Component
{
    public $categoriesList;
    public $searchQuery;
    public $filteredCategoriesList;

    protected $rules=[
        'searchQuery'=>'string|max:255'
    ];


    public function applyLabelFilter(){
        if (!empty($this->searchQuery)) {
            $this->filteredCategoriesList = $this->categoriesList->filter(function ($categorie) {
                return stripos($categorie['label'], $this->searchQuery) !== false;
            });
        }else{
            $this->filteredCategoriesList=$this->categoriesList;
        }
    }

    public function mount()
    {
        $user = Auth::user();
        try {
            $getCustomerTagsResponse = Http::withHeaders([
                'DOLAPIKEY' => $user->api_key
            ])->get($user->url_dolibarr . '/api/index.php/categories?sortfield=t.rowid&sortorder=ASC&limit=100&type=customer');

            if(!$getCustomerTagsResponse->successful()){
                
            }
            $this->categoriesList = collect($getCustomerTagsResponse->json());
            $this->filteredCategoriesList = $this->categoriesList;
        } catch (Exception $e) {
            dump("Erreur lors de la recupération des tags : " . $e->getMessage());
        }
    }
    

    public function render()
    {

        return view('livewire.tiers.tag-customer-index');
    }
}
