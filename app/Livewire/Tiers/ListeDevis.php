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

    private $proposals = [];
    public $filteredProposals = [];
    public function mount()
    {
        try {
            $user = Auth::user();
            $getProposalsResponse = Http::withHeaders([
                'DOLAPIKEY' => $user->api_key,
                'Accept' => 'application/json'
            ])->get($user->url_dolibarr . '/api/index.php/proposals?sortfield=t.rowid&limit=10&sortorder=ASC');

            if ($getProposalsResponse->successful()) {
                $this->proposals = collect($getProposalsResponse->json())->map(function ($item) use ($user) {
                    $proposal = [
                        'socid' => $item['socid'],
                        'ref' => $item['ref'],
                        'contacts_ids' => $item['contacts_ids'],
                        'datep' => $item['datep'],
                        'datep_string'=>date('d/m/Y', $item['datep']),
                        'duree_validite' => $item['duree_validite'],
                        'cond_reglement_id' => $item['cond_reglement_id'],
                        'mode_reglement_id' => $item['mode_reglement_id'],
                        'demand_reason_id' => $item['demand_reason_id'],
                        'availability_id' => $item['availability_id'],
                        'fin_validite' => $item['fin_validite'],
                        'date_fin_validite_string'=>date('d/m/Y', $item['fin_validite']),
                        'user_author' => $item['user_author'],
                        'total_ht' => $item['total_ht'],
                        'client_categories' => [],
                        'client'=>[],
                        'user_author_id'=>$item['user_author_id'],
                        'user_author_display_name'=>'',
                        'user_author_name'=>''
                    ];

                    $getClientResponse = Http::withHeaders([
                        'DOLAPIKEY' => $user->api_key,
                        'Accept' => 'application/json'
                    ])->get($user->url_dolibarr . '/api/index.php/thirdparties/' . $proposal['socid']);

                    if ($getClientResponse->successful()) {
                        $client = $getClientResponse->json();
                        $proposal['client'] = ['display_name' => $client['name']];

                        $getAuthorResponse = Http::withHeaders([
                            'DOLAPIKEY' => $user->api_key,
                            'Accept' => 'application/json'
                        ])->get($user->url_dolibarr . '/api/index.php/users/' . $proposal['user_author_id']);

                        if ($getAuthorResponse->successful()) {
                            $author = $getAuthorResponse->json();
                            $proposal['user_author_display_name'] = trim($author['firstname'] . ' '. $author['lastname']);
                            $proposal['user_author_name'] = $author['name'];
                        }
                    }

                    return $proposal;
                })->all();
                $this->filteredProposals = $this->proposals;
                dump($this->filteredProposals);
            }
        } catch (Exception $e) {
        }
    }
    public function render()
    {
        return view('livewire.tiers.liste-devis');
    }
}
