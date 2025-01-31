<?php

namespace App\Livewire\Produits;

use Livewire\Component;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class CreateProduits extends Component
{

    public $currentStep = 1;
    public $totalSteps = 4;

    // Constantes
    const TYPE_PRODUIT = 0;
    const TYPE_SERVICE = 1;

    const STATUS_HORS_VENTE = 0;
    const STATUS_EN_VENTE = 1;

    const STATUS_HORS_ACHAT = 0;
    const STATUS_EN_ACHAT = 1;

    // Déclaration des propriétés liées aux champs du formulaire
    public $reference_produit;
    public $label;
    public $description;
    public $status;
    public $status_label;
    public $status_buy;
    public $barcode;
    public $price;
    public $price_min;
    public $price_base_type;
    public $tva_tx;
    public $price_ttc;
    public $cost_price;
    public $stock;
    public $seuil_stock_alerte;
    public $weight;
    public $weight_units;
    public $length;
    public $length_units;
    public $width;
    public $height;
    public $surface;
    public $surface_units;
    public $volume;
    public $volume_units;
    public $status_batch;
    public $sell_or_eat_by_mandatory;
    public $url;
    public $accountancy_code_sell;
    public $accountancy_code_sell_export;
    public $accountancy_code_buy;
    public $accountancy_code_buy_export;

    public function nextStep()
    {
        if ($this->currentStep < $this->totalSteps) {
            $this->currentStep++;
            $this->dispatch('changeStep', ['step' => $this->currentStep]);
        }
    }

    public function previousStep()
    {
        if ($this->currentStep > 1) {
            $this->currentStep--;
            $this->dispatch('changeStep', ['step' => $this->currentStep]);
        }
    }

    public function submit()
    {
        
        switch($this->status){
            case '1':
                $this->status_label = 'En vente';
                break;
            case '0':
                $this->status_label = 'Hors vente';
                break;
        }

        $this->generateReferenceProduit();

        $validated=[
            'ref' => $this->reference_produit,
            'type' => '0',
            'label' => $this->label,
            'description' => $this->description,
            'status' => $this->status,
            'status_label' => $this->status_label,
            'barcode' => $this->barcode,
            'price' => $this->price,
            'tva_tx' => $this->tva_tx,
            'price_ttc' => $this->price,
            'price_min' => $this->price_min,
            'price_min_ttc' => $this->price_min,
            'price_base_type' => $this->price_base_type,
            'barcode' => $this->barcode,
            'stock_reel' => $this->stock,
            'type_label' => 'Produit',
            'status_buy' => $this->status_buy,
            'status_batch' => $this->status_batch ?? '',
            'sell_or_eat_by_mandatory' => $this->sell_or_eat_by_mandatory ?? '',
            'url' => $this->url ?? '',
            'weight' => $this->weight ?? '',
            'weight_units' => $this->weight_units ?? '',
            'length' => $this->length ?? '',
            'length_units' => $this->length_units ?? '',
            'width' => $this->width ?? '',
            'height' => $this->height ?? '',
            'surface' => $this->surface ?? '',
            'volume' => $this->volume ?? '',
            'accountancy_code_sell' => $this->accountancy_code_sell ?? '',
            'accountancy_code_sell_export' => $this->accountancy_code_sell_export ?? '',
            'accountancy_code_buy' => $this->accountancy_code_buy ?? '',
            'accountancy_code_buy_export' => $this->accountancy_code_buy_export ?? '',
        ];
        
        
        $user = Auth::user();
        
        try {
            $response = Http::withHeaders([
                'DOLAPIKEY' => $user->api_key
            ])->post($user->url_dolibarr . '/api/index.php/products', $validated);

            if (!$response->successful()) {
                throw new Exception('Erreur création produit: ' . $response->body());
            }

            return redirect()->route('produits')
                           ->with('success', 'Produit créé avec succès');

        } catch (Exception $e) {
            dd($e->getMessage());
            return back()->withInput()
                        ->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function generateReferenceProduit()
    {
        if (empty($this->reference_produit)) {
            $this->reference_produit = "PRD-001";
        } else {
            // Récupérer le dernier code client
            $lastCode;
            if(is_array($this->reference_produit))
            {
                $lastCode = end($this->reference_produit);
            } else {
                $lastCode = $this->reference_produit;
            }
           
            // Extraire la partie numérique après le tiret
            if (preg_match('/^(.*-)(\d+)$/', $lastCode, $matches)) {
                $prefix = $matches[1]; // Partie avant le numéro (ex: "CU2501-")
                $number = (int) $matches[2]; // Partie numérique

                // Incrémenter le numéro
                $newNumber = str_pad($number + 1, strlen($matches[2]), '0', STR_PAD_LEFT);

                // Retourner le nouveau code client
                $this->reference_produit = $prefix. $newNumber;
            }
        }

    }


    public function render()
    {
        $user = Auth::user();
        try {
            $response = Http::withHeaders([
                'DOLAPIKEY' => $user->api_key
            ])->get($user->url_dolibarr . '/api/index.php/products', [
                'limit' => 100,
                'sortfield' => 'ref',
                'sortorder' => 'ASC'
            ]);

            if (!$response->successful()) {
                throw new Exception('Erreur API: ' . $response->status());
            }
            
            $data = collect($response->json())->map(function($item) {
                return (object) [
                    'id' => $item['id'] ?? null,
                    'ref' => $item['ref'] ?? '',
                    'label' => $item['label'] ?? '',
                    'description' => $item['description'] ?? '',
                    'type' => $item['type'] ?? '',
                    'type_label' => $item['type'] == self::TYPE_PRODUIT ? 'Produit' : 'Service',
                    'price_ht_formatted' => number_format($item['price'], 2, ',', ' ') . ' €',
                    'price_ttc_formatted' => number_format($item['price_ttc'], 2, ',', ' ') . ' €',
                    'tva_tx' => $item['tva_tx'] ?? '',
                    'status' => $item['status'] ?? '',
                    'status_buy' => $item['status_buy'] ?? '',
                    'stock_reel' => $item['stock_reel'] ?? 0,
                    'barcode' => $item['barcode'] ?? '',
                    'status_label' => $item['status'] == self::STATUS_EN_VENTE ? 'En vente' : 'Hors vente',
                    'status_class' => $item['status'] == self::STATUS_EN_VENTE ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800',
                    'weight' => $item['weight'] ?? 0,
                    'weight_units' => $item['weight_units'],
                    'length' => $item['length'],
                    'width' => $item['width'],
                    'height' => $item['height'],
                    'surface' => $item['surface'],
                    'volume' => $item['volume'],
                    'accountancy_code_sell' => $item['accountancy_code_sell'],
                    'accountancy_code_sell_export' => $item['accountancy_code_sell_export'],
                    'accountancy_code_buy' => $item['accountancy_code_buy'],
                    'accountancy_code_buy_export' => $item['accountancy_code_buy_export'],
                    'url' => $item['url'],
                    
                    //'weight_formatted' => $this->formatWeight($item['weight'] ?? 0, $item['weight_units'] ?? 0)
                ];
            })->all();
            
            //Récupération des codes clients qui sont déjà utilisé par d'autre tiers
            foreach($data as $produit){
                if($produit->ref && $produit->type == 0){
                    $this->reference_produit[] = $produit->ref;
                }
            }
            
            return view('livewire.produits.create-produits');

        } catch (Exception $e) {
            Log::error('Erreur récupération produits:', [
                'message' => $e->getMessage()
            ]);
        }
    }
}
