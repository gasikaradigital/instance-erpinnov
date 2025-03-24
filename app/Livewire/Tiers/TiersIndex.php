<?php

namespace App\Livewire\Tiers;

use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Pest\Mutate\Mutators\ControlStructures\ForeachEmptyIterable;

class TiersIndex extends Component
{
    // Données brutes et filtrées
    public $data = [];
    public $filteredData = [];
    public $selectedIds = [];
    public $selectedAction = '';
    private $commerciaux = [];
    public $visibleColumns = [
        "code" => true,
        "nom" => true,
        "type" => true,
        "nature" => true,
        "email" => true,
        "commerciaux" => true,
        "telephone" => true,
        "statut" => true
    ];

    public function toggleColumn($column)
    {
        // Debug immédiat
        dump("vody eeeeeee");
        if (!array_key_exists($column, $this->visibleColumns)) {
            abort(400, "Colonne invalide");
        }

        $this->visibleColumns[$column] = !$this->visibleColumns[$column];

        // Force le re-rendu
        $this->dispatch('columns-updated', columns: $this->visibleColumns);
    }

    // Propriétés pour les filtres
    public $filterType = ''; // prospect, client, fournisseur
    public $filterCategorie = '';
    public $filterStatut = 'default';
    public $filterComerciaux = 'default';
    public $filterSearchType = 'nom'; // nom, email, telephone
    public $filterSearchValue = '';

    /**=================================
     * Listeners
    =================================**/
    // Mettre à jour la liste des ID sélectionnés
    protected $listeners = ['selectedIdsUpdated'];
    public function selectedIdsUpdated($selectedIds)
    {
        $this->selectedIds = $selectedIds;
    }

    /**=================================
     * Filtres
    =================================**/
    // Appliquer les filtres lorsque les propriétés sont mises à jour
    public function updated($propertyName)
    {
        if (str_starts_with($propertyName, 'filter')) {
            $this->applyFilters();
        }
    }

    // Appliquer tous les filtres
    public function applyFilters()
    {
        $this->filteredData = array_filter($this->data, function ($item) {
            // Filtre par type
            if (!empty($this->filterType)) {
                if ($this->filterType === 'client' && ($item->client != 1 && $item->client != 3)) {
                    return false;
                }
                if ($this->filterType === 'prospect' && ($item->client != 2 && $item->client != 3)) {
                    return false;
                }
                if ($this->filterType === 'fournisseur' && $item->fournisseur == 0) {
                    return false;
                }
            }

            // Filtre par catégorie
            if (!empty($this->filterCategorie) && $item->categorie !== $this->filterCategorie) {
                return false;
            }

            // Filtre par statut
            if ($this->filterStatut !== 'default' && $item->status != $this->filterStatut) {
                return false;
            }

            // Filtre par commerciaux
            if ($this->filterComerciaux !== 'default' && $item->comerciaux !== $this->filterComerciaux) {
                return false;
            }

            // Filtre de recherche
            if (!empty($this->filterSearchValue)) {
                $searchValue = strtolower($this->filterSearchValue);

                switch ($this->filterSearchType) {
                    case 'nom':
                        if (strpos(strtolower($item->nom), $searchValue) === false) {
                            return false;
                        }
                        break;
                    case 'email':
                        if (strpos(strtolower($item->email), $searchValue) === false) {
                            return false;
                        }
                        break;
                    case 'telephone':
                        if (strpos($item->telephone, $searchValue) === false) {
                            return false;
                        }
                        break;
                }
            }

            // Si tous les filtres sont satisfaits, inclure l'élément
            return true;
        });
    }

    // Réinitialiser les filtres
    public function resetFilters()
    {
        $this->filterType = '';
        $this->filterCategorie = '';
        $this->filterStatut = 'default';
        $this->filterComerciaux = 'default';
        $this->filterSearchType = 'nom';
        $this->filterSearchValue = '';
        $this->applyFilters();
    }

    /**=================================
     * Actions
    =================================**/
    // Supprimer des tiers
    private function deleteTiers($tierList)
    {
        $user = Auth::user();

        try {
            foreach ($tierList as $tier) {
                $response = Http::withHeaders([
                    'DOLAPIKEY' => $user->api_key,
                    'Accept' => 'application/json'
                ])->delete($user->url_dolibarr . '/api/index.php/thirdparties/' . $tier);

                if ($response->successful()) {
                    // Filtrer les éléments qui ne correspondent pas au `tier` supprimé
                    $this->data = array_filter($this->data, fn($item) => $item->id != $tier);
                    $this->filteredData = array_filter($this->filteredData, fn($item) => $item->id != $tier);
                    $this->selectedIds = array_filter($this->selectedIds, fn($id) => $id != $tier);
                } else {
                    dump('Erreur API pour le tiers ' . $tier . ': ' . $response->status());
                }
            }
        } catch (Exception $e) {
            dump('Erreur lors de la suppression des tiers: ' . $e->getMessage());
        }
    }

    // modifier le status en ouvert
    private function changeStatusToOpen($tierList)
    {
        $this->changeTiersStatus($tierList, 1);
    }


    // modifier le status en ouvert
    private function changeStatusToClose($tierList)
    {
        $this->changeTiersStatus($tierList, 0);
    }

    // mettre le status des tiers
    private function changeTiersStatus($tierList, $status)
    {
        if ($status != 0 && $status != 1) {
            return;
        }
        $user = Auth::user();
        $requestBody = ['status' => $status];

        try {
            foreach ($tierList as $tier) {
                $response = Http::withHeaders([
                    'DOLAPIKEY' => $user->api_key,
                    'Accept' => 'application/json'
                ])->put($user->url_dolibarr . '/api/index.php/thirdparties/' . $tier, $requestBody);

                if ($response->successful()) {
                    $updatedData = $response->json(); // Récupère la réponse de l'API

                    // Mettre à jour `$data`
                    $this->data = array_map(function ($item) use ($tier, $updatedData) {
                        if ($item->id == $tier) {
                            dump("Mise à jour de \$data pour le tiers : " . $tier); // Log
                            return (object) $updatedData; // Conversion en objet si nécessaire
                        }
                        return $item;
                    }, $this->data);

                    // Mettre à jour `$filteredData`
                    $this->applyFilters();
                } else {
                    dump('Erreur API pour le tiers ' . $tier . ': ' . $response->status() . ' - ' . $response->body());
                }
            }
        } catch (Exception $e) {
            dump('Erreur lors de la mise à jour des tiers: ' . $e->getMessage());
        }
    }

    // executer un action
    public function executeAction()
    {
        switch ($this->selectedAction) {
            case "DELETE_TIERS":
                $this->deleteTiers($this->selectedIds);
                break;
            case "CHANGE_STATUS_TO_OPEN":
                $this->changeStatusToOpen($this->selectedIds);
                break;
            case "CHANGE_STATUS_TO_CLOSE":
                $this->changeStatusToClose($this->selectedIds);
                break;
            default:
                return "CANNOT EXECUTE ACTION";
        }
    }
    /**=================================
     * Montage
    =================================**/
    // Charger les données initiales
    public function mount()
    {
        $user = Auth::user();

        try {
            // Récupération des tiers depuis l'API Dolibarr
            $response = Http::withHeaders([
                'DOLAPIKEY' => $user->api_key
            ])->get($user->url_dolibarr . '/api/index.php/thirdparties');

            if (!$response->successful()) {
                throw new Exception('Erreur API: ' . $response->status());
            }

            // Conversion du tableau en objets
            $this->data = collect($response->json())->map(function ($item) use ($user) {
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
                try {
                    $representativesResponse = Http::withHeaders([
                        'DOLAPIKEY' => $user->api_key
                    ])->get($user->url_dolibarr . '/api/index.php/thirdparties/' . $item->id . '/representatives?mode=0');

                    if ($representativesResponse->successful()) {
                        $commerciaux = $representativesResponse->json();
                        $item->commerciaux = $commerciaux ?? [];
                        $this->commerciaux = json_decode(json_encode(array_unique(array_merge($commerciaux, $this->commerciaux))));
                    }
                } catch (\Exception $e) {
                    $item->commerciaux = [];
                }
                return $item;
            })->all();

            // Initialisation des données filtrées
            $this->filteredData = $this->data;
        } catch (Exception $e) {
            Log::error('Erreur lors de la récupération des tiers: ' . $e->getMessage());
        }
    }

    /**=================================
     * Affichage
    =================================**/
    public function render()
    {
        return view('livewire.tiers.tiers-index', [
            'filteredData' => $this->filteredData,
            'commerciaux' => $this->commerciaux,
        ]);
    }
}
