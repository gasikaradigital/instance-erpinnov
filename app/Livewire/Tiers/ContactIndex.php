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
    public $contacts = [];
    public $filteredContacts;
    public $comercials = [];
    public $roles = [];
    public $tags = [];
    public $typeClient = true;
    public $typeProspect = true;
    public $typeFournisseur = true;

    /**====================================
     * Filtres
     =====================================*/
    public $searchType = 0;
    public $searchQuery = "";
    public $selectedCommerciaux = 0;
    public $selectedTag = 0;
    public $selectedRole = 0;

    public function applyContactFilter()
    {
        $this->filteredContacts = array_filter($this->contacts, function ($contact) {
            // Champ de recherche    
            if (trim($this->searchQuery) != "") {
                switch ($this->searchType) {
                    case 1: {
                            if (!strpos(strtolower($contact->display_name), strtolower(trim($this->searchQuery)))) {
                                return false;
                            }
                            break;
                        }
                    case 2: {
                            if (strpos(strtolower($contact->email), strtolower(trim($this->searchQuery))) === false) {
                                return false;
                            }
                            break;
                        }
                    case 3: {
                            if (strpos(strtolower($contact->phone_mobile), strtolower(trim($this->searchQuery))) === false) {
                                return false;
                            }
                            break;
                        }
                    default: {
                            if (!strpos(strtolower($contact->display_name), strtolower(trim($this->searchQuery)))) {
                                return false;
                            }
                            break;
                        }
                }
            }

            // tags
            if (
                $this->selectedTag != 0 &&
                empty(array_filter($contact->tags, function ($item) {
                    return $item->id == $this->selectedTag;
                }))
            ) {
                return false;
            }

            // Roles
            if (
                $this->selectedRole != 0 &&
                empty(array_filter($contact->roles, function ($item) {
                    return $item->id == $this->selectedRole;
                }))
            ) {
                return false;
            }

            // commerciaux
            if ($this->selectedCommerciaux != 0 && $contact->comercial_id != $this->selectedCommerciaux) {
                return false;
            }
            return true;
        });
    }

    public function resetContactFilter()
    {
        $this->searchType = 0;
        $this->searchQuery = "";
        $this->selectedCommerciaux = 0;
        $this->selectedTag = 0;
        $this->selectedRole = 0;
        $this->filteredContacts = $this->contacts;
    }
    /**====================================
     * Initialisation
     =====================================*/
    // Recuperation des commerciaux
    private function getAllCommecials()
    {
        $user = Auth::user();
        $getAuthorResponse = Http::withHeaders([
            'DOLAPIKEY' => $user->api_key,
            'Accept' => 'application/json'
        ])->get($user->url_dolibarr . '/api/index.php/users?sortfield=t.rowid&sortorder=ASC');

        if ($getAuthorResponse->successful()) {
            $this->comercials = collect($getAuthorResponse->json())->map(function ($author) {
                $author = (object) $author;
                return (object) [
                    'firstname' => $author->firstname,
                    'lastname' => $author->lastname,
                    'id' => $author->id,
                    'name' => $author->name,
                    'display_name' => trim($author->firstname . ' ' . $author->lastname)
                ];
            })->all();
        }
    }

    private function getContactTags($contactId)
    {

        $user = Auth::user();
        $getContactTagsResponse = Http::withHeaders([
            'DOLAPIKEY' => $user->api_key,
            'Accept' => 'application/json'
        ])->get($user->url_dolibarr . '/api/index.php/contacts/' . $contactId . '/categories');

        if ($getContactTagsResponse->successful()) {
            return collect($getContactTagsResponse->json())->map(function ($tag) {
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

    public function mount()
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

            // Recuperation des commerciaux
            $this->getAllCommecials();
            // Conversion du tableau en objets pour faciliter l'utilisation dans la vue
            $this->contacts = collect($response->json())->map(function ($item) use ($user) {
                $item = (object) $item;
                $array_options = (object) $item->array_options;
                $contact = (object) [
                    'code' => $array_options->options_code_contact,
                    'id' => $item->id,
                    'firstname' => $item->firstname,
                    'lastname' => $item->lastname,
                    'display_name' => trim($item->firstname) . ' ' . trim($item->lastname),
                    'phone_mobile' => $item->phone_mobile,
                    'email' => $item->email,
                    'phone_pro' => $item->phone_pro,
                    'visibility' => $item->priv,
                    'alias_name' => $item->name_alias,
                    'roles' => [],
                    'ref' => $item->ref,
                    'comercial_id' => $item->user_creation_id,
                    'thirdpartie' => (object)['id' => $item->socid, 'display_name' => $item->socname],
                    'statut' => $item->statut,
                    'contry' => null,
                    'tags' => []
                ];

                // conversion des roles en objet
                foreach ($item->roles as $role) {
                    $role = (object) $role;
                    array_push($contact->roles, $role);
                    if (count(array_filter($this->roles, function ($item) use ($role) {
                        return $item->id == $role->id;
                    })) == 0) {
                        array_push($this->roles, $role);
                    }
                }
                // Récupérer le nom du pays si country_id existe
                if (!empty($item->country_id)) {
                    try {
                        $countryResponse = Http::withHeaders([
                            'DOLAPIKEY' => $user->api_key
                        ])->get($user->url_dolibarr . '/api/index.php/setup/dictionary/countries/' . $item->country_id);

                        if ($countryResponse->successful()) {
                            $country = $countryResponse->json();
                            $contact->country = $country['label'] ?? 'N/A';
                        }
                    } catch (\Exception $e) {
                        $contact->country = 'N/A';
                    }
                } else {
                    $contact->country = 'N/A';
                }
                // recuperation du tag du contact
                $contact->tags = $this->getContactTags($item->id);
                // ajout dans la liste des tags
                $this->tags = array_unique(array_merge($this->tags, $contact->tags), SORT_REGULAR);
                return $contact;
            })->all();
            $this->filteredContacts = $this->contacts;
        } catch (Exception $e) {
            Log::error('Erreur lors de la récupération des contacts: ' . $e->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.tiers.contact-index');
    }
}
