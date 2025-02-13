<?php

namespace App\Livewire\Tiers;

use Livewire\Component;

class ProspectsListe extends Component
{
    public $data;

    public function mount($data = null)
    {
        $this->data = $data;
    }

    public function render()
    {
        return view('livewire.tiers.prospects-liste',[
            'data' => $this->data,
        ]);
    }
}
