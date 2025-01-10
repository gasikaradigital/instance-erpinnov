<?php

namespace App\Livewire\Produits;

use Livewire\Component;

class CreateProduits extends Component
{
    public $currentStep = 1;
    public $totalSteps = 4;

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

    public function render()
    {
        return view('livewire.produits.create-produits');
    }
}
