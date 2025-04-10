<?php

namespace App\Livewire\Produits;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Exception;

class ProduitsDashboardIndex extends Component
{
    // Constantes
    const TYPE_PRODUIT = 0;
    const TYPE_SERVICE = 1;

    const STATUS_HORS_VENTE = 0;
    const STATUS_EN_VENTE = 1;

    const STATUS_HORS_ACHAT = 0;
    const STATUS_EN_ACHAT = 1;


    /**
     * Affiche la liste des produits
     */
    
    public function render()
    {
        $user = Auth::user();

        try {
            $response = Http::withHeaders([
                'DOLAPIKEY' => $user->api_key,
            ])->get($user->url_dolibarr . '/api/index.php/products', [
                'limit' => 100,
                'sortfield' => 'ref',
                'sortorder' => 'ASC',
            ]);

            if (!$response->successful()) {
                throw new Exception('Erreur API: ' . $response->status());
            }

            $data = collect($response->json())->map(function ($item) {
                return (object) [
                    'id' => $item['id'],
                    'ref' => $item['ref'],
                    'label' => $item['label'],
                    'description' => $item['description'] ?? '',
                    'type' => $item['type'],
                    'type_label' => $item['type'] == self::TYPE_PRODUIT ? 'Produit' : 'Service',
                    'price_ht_formatted' => number_format($item['price'], 2, ',', ' ') . ' €',
                    'price_ttc_formatted' => number_format($item['price_ttc'], 2, ',', ' ') . ' €',
                    'tva_tx' => $item['tva_tx'],
                    'status' => $item['status'],
                    'status_buy' => $item['status_buy'],
                    'stock_reel' => $item['stock_reel'] ?? 0,
                    'barcode' => $item['barcode'] ?? '',
                    'status_label' => $item['status'] == self::STATUS_EN_VENTE ? 'En vente' : 'Hors vente',
                    'status_class' => $item['status'] == self::STATUS_EN_VENTE ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800',
                    'weight' => $item['weight'] ?? 0,
                    'weight_formatted' => $this->formatWeight($item['weight'] ?? 0, $item['weight_units'] ?? 0),
                ];
            })->all();

            $counts = [
                'produits' => [
                    'en_vente' => 0,
                    'en_achat' => 0,
                    'hors_vente' => 0,
                    'hors_achat' => 0,
                ],
                'services' => [
                    'en_vente' => 0,
                    'en_achat' => 0,
                    'hors_vente' => 0,
                    'hors_achat' => 0,
                ],
            ];

            foreach ($data as $produit) {
                $type = ($produit->type == 0) ? 'produits' : 'services';
            
                // Gestion de la vente
                $counts[$type][$produit->status == 1 ? 'en_vente' : 'hors_vente']++;
            
                // Gestion de l'achat
                $counts[$type][$produit->status_buy == 1 ? 'en_achat' : 'hors_achat']++;
            }
            
            //dd($counts);

            return view('livewire.produits.produits-dashboard-index', [
                'data' => $data,
                'counts' => $counts,
                'title' => 'Liste des produits',
            ]);

        } catch (Exception $e) {
            Log::error('Erreur récupération produits:', [
                'message' => $e->getMessage(),
            ]);

            return view('livewire.produits.produits-dashboard-index', [
                'data' => [],
                'error' => "Erreur de chargement des produits.",
                'title' => 'Liste des produits',
            ]);
        }
    }

    /**
     * Formate un poids selon son unité
     */
    private function formatWeight($weight, $unit)
    {
        $units = [
            -6 => 'mg',
            -3 => 'g',
            0 => 'kg',
            3 => 't',
        ];

        return number_format($weight, 2, ',', ' ') . ' ' . ($units[$unit] ?? '');
    }
}
