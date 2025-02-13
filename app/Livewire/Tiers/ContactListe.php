<?php

namespace App\Livewire\Tiers;

use Livewire\Component;

class ContactListe extends Component
{
    public $data;

    public function mount($data = null)
    {
        $this->data = $data;
    }

    public function render()
    {
        return view('livewire.tiers.contact-liste',[
            'data' => $this->data,
        ]);
    }
}
