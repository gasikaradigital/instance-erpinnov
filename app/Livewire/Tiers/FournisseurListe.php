<?php

namespace App\Livewire\Tiers;

use Livewire\Component;

class FournisseurListe extends Component
{
    public $data;

    public function mount($data = null)
    {
        $this->data = $data;
    }

    public function render()
    {
        
        return view('livewire.tiers.fournisseur-liste',[
            'data' => $this->data,
        ]);
    }
}
