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

    // Déclaration des propriétés liées aux champs du formulaire
    public string|null $ref = null;
    public $label;
    public $description;
    public $status;
    public $status_buy;
    public $barcode;
    public $price;
    public $tva_tx;
    public $price_ttc;
    public $cost_price;
    public $stock;
    public $seuil_stock_alerte;
    public $weight;
    public $weight_units;
    public $length;
    public $length_units;
    public $surface;
    public $surface_units;
    public $volume;
    public $volume_units;

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

        $validated=[
            'ref' => $this->ref,
            'type' => '0',
            'label' => $this->label,
            'description' => $this->description,
            'status' => $this->status,
            'status_label' => $this->status_label,
            'barcode' => $this->barcode,
            'price_ht_formatted' => $this->price,
            'tva_tx' => $this->tva_tx,
            'price_ttc_formatted' => $this->price_ttc,
            'barcode' => $this->barcode,
            'stock_reel' => $this->stock,
            'type_label' => 'Produit',
            'status_buy' => $this->status_buy
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


    public function render()
    {
        return view('livewire.produits.create-produits');
    }
}
