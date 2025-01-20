<?php

namespace App\Livewire\Tiers;

use Livewire\Component;

class Statistique extends Component
{
    public $data;

    public function mount($data = null)
    {
        $this->data = $data;
    }

    public function render()
    {
        return view('livewire.tiers.statistique',[
            'data' => $this->data,
        ]);
    }
}
