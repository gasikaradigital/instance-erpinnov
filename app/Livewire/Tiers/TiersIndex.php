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
    private $page = 1;
    public $tags = [];
    private $paginationItemNumber;
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
        if (!array_key_exists($column, $this->visibleColumns)) {
            abort(400, "Colonne invalide");
        }

        $this->visibleColumns[$column] = !$this->visibleColumns[$column];

        // Force le re-rendu
        $this->dispatch('columns-updated', columns: $this->visibleColumns);
    }

    // Propriétés pour les filtres
    public $selectedTypes = ["fournisseur", "client", "prospect"];
    public $selectedTag = 0;
    public $selectedStatus = [1, 0];
    public $selectedCommercial = 0;
    public $searchType = 'nom';
    public $searchQuery = '';

    protected $listeners = ['selectedIdsUpdated'];
    public function selectedIdsUpdated($selectedIds)
    {
        $this->selectedIds = $selectedIds;
    }
    // Appliquer les filtres
    public function applyFilter()
    {

        $filters = (object)[
            'selectedTypes' => $this->selectedTypes,
            'selectedTag' => $this->selectedTag,
            'selectedStatus' => $this->selectedStatus,
            'selectedCommercial' => $this->selectedCommercial,
            'searchType' => $this->searchType,
            'searchQuery' => $this->searchQuery,
        ];


        $this->filteredData = array_filter($this->data, function ($tier) {
            // Par categories
            if ($this->selectedTag != 0) {
                $filteredTags = array_filter($tier->tags, function ($tag) {
                    return $tag->id == $this->selectedTag;
                });
                if (count($filteredTags) == 0) {
                    return false;
                }
            }

            // Par commerciaux
            if ($this->selectedCommercial != 0) {
                $filteredCommercial = array_filter($tier->commerciaux, function ($commercial) {
                    return $commercial->id == $this->selectedCommercial;
                });
                if (count($filteredCommercial) == 0) {
                    return false;
                }
            }

            // Par type
            if (count($this->selectedTypes) != 0) {
                $match = false;

                if (in_array('fournisseur', $this->selectedTypes) && $tier->fournisseur == 1) {
                    $match = true;
                }

                if (in_array('client', $this->selectedTypes) && in_array($tier->client, [1, 3])) {
                    $match = true;
                }

                if (in_array('prospect', $this->selectedTypes) && in_array($tier->client, [2, 3])) {
                    $match = true;
                }

                if (!$match) return false;
            } else {
                return false;
            }

            // par status
            if (count($this->selectedStatus) != 0) {

                $match = false;
                if (in_array(0, $this->selectedStatus) && $tier->status == 0) {
                    $match = true;
                }
                if (in_array(1, $this->selectedStatus) && $tier->status == 1) {
                    $match = true;
                }

                if (!$match) return false;
            } else {
                return false;
            }

            if (!empty(trim($this->searchQuery))) {
                $query = strtolower($this->searchQuery);

                switch ($this->searchType) {
                    case 'email':
                        return strpos(strtolower($tier->email), $query) !== false;
                    case 'telephone':
                        return (strpos(strtolower($tier->phone_mobile), $query) || strpos(strtolower($tier->phone), $query)) !== false;
                    case 'nom':
                    default:
                        return strpos(strtolower($tier->name), $query) !== false;
                }
            }

            return $tier;
        });
    }
    // Réinitialiser les filtres
    public function resetFilter()
    {
        $this->selectedTypes = ["fournisseur", "client", "prospect"];
        $this->selectedTag = 0;
        $this->selectedStatus = [1, 0];
        $this->selectedCommercial = 0;
        $this->searchType = 'nom';
        $this->searchQuery = '';

        $this->filteredData = $this->data;
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
    //Recuperation des tags
    private function getThirdpartieTags($thirdpartieId)
    {

        $user = Auth::user();
        $getThirdpartieTagsResponse = Http::withHeaders([
            'DOLAPIKEY' => $user->api_key,
            'Accept' => 'application/json'
        ])->get($user->url_dolibarr . '/api/index.php/thirdparties/' . $thirdpartieId . '/categories');

        if ($getThirdpartieTagsResponse->successful()) {
            return collect($getThirdpartieTagsResponse->json())->map(function ($tag) {
                $tag = (object) $tag;
                return (object) [
                    'fk_parent' => $tag->fk_parent,
                    'label' => $tag->label,
                    'id' => $tag->id,
                    'color' => $tag->color
                ];
            })->all();
        }
    }


    private function getThirdpartieRepresentatives($thirdpartieId)
    {
        $user = Auth::user();

        $representativesResponse = Http::withHeaders([
            'DOLAPIKEY' => $user->api_key,
            'Accept' => 'application/json'
        ])->get($user->url_dolibarr . '/api/index.php/thirdparties/' . $thirdpartieId . '/representatives?mode=0');

        if ($representativesResponse->successful()) {
            return collect($representativesResponse->json())->map(function ($rep) {
                $rep = (object) $rep;
                return (object) [
                    'id' => $rep->id,
                    'firstname' => $rep->firstname ?? null,
                    'lastname' => $rep->lastname ?? null,
                    'display_name' => trim($rep->firstname . ' ' . $rep->lastname)
                ];
            })->all();
        }

        return []; // ou null selon ta logique
    }
    // Charger les données initiales
    public function mount()
    {
        $user = Auth::user();

        try {
            // Récupération des tiers depuis l'API Dolibarr
            $response = Http::withHeaders([
                'DOLAPIKEY' => $user->api_key
            ])->get($user->url_dolibarr . '/api/index.php/thirdparties?limit=' . $this->paginationItemNumber);

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

                $item->commerciaux = $this->getThirdpartieRepresentatives($item->id);
                $this->commerciaux = array_unique(array_merge($this->commerciaux, $item->commerciaux), SORT_REGULAR);

                $item->tags = $this->getThirdpartieTags($item->id);
                $this->tags = array_unique(array_merge($this->tags, $item->tags), SORT_REGULAR);
                return $item;
            })->all();
            // Initialisation des données filtrées
            $this->filteredData = $this->data;
        } catch (Exception $e) {
            dump($e->getMessage());
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
