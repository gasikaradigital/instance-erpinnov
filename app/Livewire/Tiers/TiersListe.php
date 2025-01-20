<?php

namespace App\Livewire\Tiers;

use Livewire\Component;

class TiersListe extends Component
{
    public $data;

    public function mount($data = null)
    {
        $this->data = $data;
    }

    public function render()
    {
        return view('livewire.tiers.tiers-liste',[
            'data' => $this->data,
        ]);
    }
}
