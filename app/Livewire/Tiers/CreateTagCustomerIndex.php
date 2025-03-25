<?php

namespace App\Livewire\Tiers;

use Exception;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class CreateTagCustomerIndex extends Component
{
    public $categoriesList;
    public $tagRef;
    public $tagPosition;
    public $tagDescription;
    public $tagColor="#000000";
    public $tagParentId=0;

    /**=============================================
     *  Validation
     ===============================================*/
     protected $rules = [
        'tagRef' => 'required|string|max:255', // Le libellé du tag est obligatoire
        'tagPosition' => 'required|integer|min:0', // La position doit être un entier positif
        'tagDescription' => 'nullable|string|max:500', // La description est optionnelle
        'tagColor' => ['required', 'regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/'], // La couleur doit être au format hexadécimal
        'tagParentId' => 'nullable|integer|min:0', // L'ID du parent est optionnel, mais doit être un entier positif si fourni
    ];


    protected $messages = [
        'tagRef.required' => 'Le libellé du tag est obligatoire.',
        'tagRef.max' => 'Le libellé du tag ne doit pas dépasser 255 caractères.',
        'tagPosition.required' => 'La position est obligatoire.',
        'tagPosition.integer' => 'La position doit être un nombre entier.',
        'tagPosition.min' => 'La position doit être un nombre positif.',
        'tagDescription.max' => 'La description ne doit pas dépasser 500 caractères.',
        'tagColor.required' => 'La couleur est obligatoire.',
        'tagColor.regex' => 'La couleur doit être au format hexadécimal (ex: #FFFFFF ou #FFF).',
        'tagParentId.integer' => 'L\'ID du parent doit être un nombre entier.',
        'tagParentId.min' => 'L\'ID du parent doit être un nombre positif.',
    ];

    /**=============================================
     *  Methodes
     ===============================================*/

    private function createCustomerTag($creationRequestData)
    {
        $user = Auth::user();
        try {

            
            $requestData = $creationRequestData;
            dump($requestData);
            $response = Http::withHeaders([
                'DOLAPIKEY' => $user->api_key
            ])->post($user->url_dolibarr . '/api/index.php/categories', $requestData);

            if ($response->successful()) {
                dump($response->json());
                return redirect()->to(Route("tag-customer"));
            } else {
                dump($response->status());
                Log::error("Error during costumer tag creation" . $response->status());
            }
        } catch (Exception $e) {
            dump($response->status());
            Log::error("Error " . $e->getMessage());
        }
    }

    public function executeCustomerTagCreation()
    {
        $this->validate();

        $this->tagColor = strtolower(str_replace('#', '', $this->tagColor));
        $requestData = [
            'label' => $this->tagRef,
            'position' => $this->tagPosition,
            'type' => 2,
            'description' => $this->tagDescription,
            'color' => $this->tagColor,
            'fk_parent' => $this->tagParentId
        ];

        $this->createCustomerTag($requestData);
    }

    /**=============================================
     *  Initialisation des données
     ===============================================*/
    public function mount()
    {
        $user = Auth::user();
        try {

            $getCustomerTagsResponse = Http::withHeaders([
                'DOLAPIKEY' => $user->api_key
            ])->get($user->url_dolibarr . '/api/index.php/categories?sortfield=t.rowid&sortorder=ASC&limit=100&type=2');

            if (!$getCustomerTagsResponse->successful()) {
            }
            $this->categoriesList = collect($getCustomerTagsResponse->json());
        } catch (Exception $e) {
            Log::error("Error " . $e->getMessage());
        }
    }

    /**=============================================
     *  Affichage
     ===============================================*/
    public function buildCategoryPath($category, $categoriesList, $path = [])
    {
        $path[] = $category['label']; // Utiliser le label au lieu de l'ID

        foreach ($categoriesList as $parent) {
            if ($parent['id'] == $category['fk_parent']) {
                return $this->buildCategoryPath($parent, $categoriesList, $path);
            }
        }

        return implode('->', array_reverse($path));
    }

    public function render()
    {
        return view('livewire.tiers.create-tag-customer-index', [
            'categoriesList' => $this->categoriesList
        ]);
    }
}
