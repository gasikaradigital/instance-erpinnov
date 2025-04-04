<?php

namespace App\Livewire\Tiers;

use DateTime;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Http;
use Livewire\Component;


class ListeDevis extends Component
{

    public $proposals = [];
    public $filteredProposals = [];
    public $commericals = [];
    public $tags = [];
    public $contacts = [];
    public $products = [];

    /**=============================================
     * Filtres
     ==============================================*/
    // props 
    public $selectedCommercialId = 0;
    public $selectedClientTag = 0;
    public $selectedContact = 0;
    public $selectedProduct = 0;
    public $refSearchQuery = "";
    public $datepStart;
    public $datepEnd;
    public $dateFinStart;
    public $dateFinEnd;
    //methodes
    public function resetProposalFilter()
    {
        $this->selectedCommercialId = 0;
        $this->selectedClientTag = 0;
        $this->selectedContact = 0;
        $this->selectedProduct = 0;
        $this->refSearchQuery = "";
        $this->datepStart = null;
        $this->datepEnd = null;
        $this->dateFinStart = null;
        $this->dateFinEnd = null;

        $this->filteredProposals = $this->proposals;
    }
    public function applyProposalFilter()
    {
        $this->filteredProposals = array_filter($this->proposals, function ($proposal) {
            // Commercials
            if ($this->selectedCommercialId != 0 && $proposal->user_author_id != $this->selectedCommercialId) {
                return false;
            }

            // Tags Client
            if ($this->selectedClientTag != 0) {
                $filteredTags = array_filter($proposal->client_categories, function ($tags) {
                    return $tags->id == $this->selectedClientTag;
                });
                if (count($filteredTags) == 0) {
                    return false;
                }
            }

            // Produits et Services
            if ($this->selectedProduct != 0) {
                $filteredProducts = array_filter($proposal->lines, function ($line) {
                    return $line->product_id == $this->selectedProduct;
                });
                if (count($filteredProducts) == 0) {
                    return false;
                }
            }

            // Contacts
            if ($this->selectedContact != 0 && !in_array($this->selectedContact, $proposal->contacts_ids)) {
                return false;
            }

            // date de proposition
            if ($this->datepStart != null) {
                $datepStartString = DateTime::createFromFormat("Y-m-d", $this->datepStart);
                $datepStartString->modify("-1 day");
                $datepStartTimestamp = $datepStartString->getTimestamp();
                if ($proposal->datep <= $datepStartTimestamp) {
                    return false;
                }
            }

            if ($this->datepEnd != null) {
                $datepEndString = DateTime::createFromFormat("Y-m-d", $this->datepEnd);
                $datepEndString->modify("+1 day");
                $datepEndTimestamp = $datepEndString->getTimestamp();
                if ($proposal->datep >= $datepEndTimestamp) {
                    return false;
                }
            }

            // date de fin de proposition
            if ($this->dateFinStart != null) {
                $dateFinStartString = DateTime::createFromFormat("Y-m-d", $this->dateFinStart);
                $dateFinStartString->modify("-1 day");
                $dateFinStartTimestamp = $dateFinStartString->getTimestamp();
                if ($proposal->fin_validite <= $dateFinStartTimestamp) {
                    return false;
                }
            }

            if ($this->dateFinEnd != null) {
                $dateFinEndString = DateTime::createFromFormat("Y-m-d", $this->dateFinEnd);
                $dateFinEndString->modify("+1 day");
                $dateFinEndTimestamp = $dateFinEndString->getTimestamp();
                if ($proposal->fin_validite >= $dateFinEndTimestamp) {
                    return false;
                }
            }

            if (trim($this->refSearchQuery) !== "" && strpos(strtolower($proposal->ref), strtolower(trim($this->refSearchQuery))) === false) {
                return false;
            }

            return true;
        });
    }
    /**=============================================
     * Initialisations
     ==============================================*/

    // Recuperation des commerciaux
    private function getAllCommecials()
    {
        $user = Auth::user();
        $getAuthorResponse = Http::withHeaders([
            'DOLAPIKEY' => $user->api_key,
            'Accept' => 'application/json'
        ])->get($user->url_dolibarr . '/api/index.php/users?sortfield=t.rowid&sortorder=ASC');

        if ($getAuthorResponse->successful()) {
            $this->commericals = collect($getAuthorResponse->json())->map(function ($author) {
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

    // Récuperation des tags
    private function getClientTags($clientId)
    {

        $user = Auth::user();
        $getThirdpartiesTagsResponse = Http::withHeaders([
            'DOLAPIKEY' => $user->api_key,
            'Accept' => 'application/json'
        ])->get($user->url_dolibarr . '/api/index.php/thirdparties/' . $clientId . '/categories');

        if ($getThirdpartiesTagsResponse->successful()) {
            return collect($getThirdpartiesTagsResponse->json())->map(function ($tag) {
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

    private function getAllContacts()
    {
        $user = Auth::user();
        $getContactsResponse = Http::withHeaders([
            'DOLAPIKEY' => $user->api_key,
            'Accept' => 'application/json'
        ])->get($user->url_dolibarr . '/api/index.php/contacts');

        if ($getContactsResponse->successful()) {
            $this->contacts = collect($getContactsResponse->json())->map(function ($contact) {
                $contact = (object) $contact;
                return (object) [
                    'lastname' => $contact->lastname,
                    'firstname' => $contact->firstname,
                    'name' => $contact->name,
                    'display_name' => trim($contact->firstname . ' ' . $contact->lastname),
                    'id' => $contact->id
                ];
            })->all();
        }
    }

    private function getAllProducts()
    {
        $user = Auth::user();
        $getContactsResponse = Http::withHeaders([
            'DOLAPIKEY' => $user->api_key,
            'Accept' => 'application/json'
        ])->get($user->url_dolibarr . '/api/index.php/products');

        if ($getContactsResponse->successful()) {
            $this->products = collect($getContactsResponse->json())->map(function ($product) {
                $product = (object) $product;
                return (object) [
                    'label' => $product->label,
                    'id' => $product->id
                ];
            })->all();
        }
    }
    // Fonction de montage
    public function mount()
    {
        try {
            $user = Auth::user();
            $getProposalsResponse = Http::withHeaders([
                'DOLAPIKEY' => $user->api_key,
                'Accept' => 'application/json'
            ])->get($user->url_dolibarr . '/api/index.php/proposals?sortfield=t.rowid&limit=10&sortorder=DESC');

            if ($getProposalsResponse->successful()) {

                $this->getAllCommecials();
                $this->getAllContacts();

                $this->proposals = collect($getProposalsResponse->json())->map(function ($item) use ($user) {
                    $item = (object) $item;
                    $proposal = (object) [
                        'socid' => $item->socid,
                        'ref' => $item->ref,
                        'contacts_ids' => $item->contacts_ids,
                        'datep' => $item->datep,
                        'datep_string' => date('d/m/Y', $item->datep),
                        'duree_validite' => $item->duree_validite,
                        'cond_reglement_id' => $item->cond_reglement_id,
                        'mode_reglement_id' => $item->mode_reglement_id,
                        'demand_reason_id' => $item->demand_reason_id,
                        'availability_id' => $item->availability_id,
                        'fin_validite' => $item->fin_validite,
                        'date_fin_validite_string' => date('d/m/Y', $item->fin_validite),
                        'user_author' => $item->user_author,
                        'total_ht' => $item->total_ht,
                        'client_categories' => [],
                        'client' => (object) ['display_name' => ""],
                        'user_author_id' => $item->user_author_id,
                        'user_author_display_name' => '',
                        'user_author_name' => '',
                        'lines' => []
                    ];

                    foreach ($item->lines as $lineItem) {
                        $lineItem = (object) $lineItem;
                        $line = (object) [
                            'id' => $lineItem->id,
                            'product_id' => $lineItem->fk_product,
                            'ref' => $lineItem->ref,
                            'product_type' => $lineItem->product_type,
                            'description' => $lineItem->description,
                            'poduct_display_name' => $lineItem->product_ref
                        ];
                        array_push($proposal->lines, $line);

                        $existingProduct = array_filter($this->products, function ($product) use ($line) {
                            return $product->product_id == $line->product_id;
                        });

                        if (count($existingProduct) == 0) {
                            array_push($this->products, $line);
                        }
                    }
                    // Get thirdpartie belongs to proposal
                    $getClientResponse = Http::withHeaders([
                        'DOLAPIKEY' => $user->api_key,
                        'Accept' => 'application/json'
                    ])->get($user->url_dolibarr . '/api/index.php/thirdparties/' . $proposal->socid);

                    $proposal->client_categories = $this->getClientTags($proposal->socid);

                    $this->tags = array_unique(array_merge($this->tags, $proposal->client_categories), SORT_REGULAR);

                    if ($getClientResponse->successful()) {
                        $client = (object) $getClientResponse->json();
                        $proposal->client->display_name =  $client->name;
                        $user_authors = array_filter($this->commericals, fn($item) => $item->id === $proposal->user_author_id);
                        if (count($user_authors) != 0) {
                            $proposal->user_author_display_name = $user_authors[0]->display_name;
                            $proposal->user_author_name = $user_authors[0]->name;
                        }
                    }

                    return $proposal;
                })->all();
                $this->filteredProposals = $this->proposals;
            }
        } catch (Exception $e) {
        }
    }
    public function render()
    {
        return view('livewire.tiers.liste-devis');
    }
}
