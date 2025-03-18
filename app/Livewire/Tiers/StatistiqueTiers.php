<?php

namespace App\Livewire\Tiers;

use Livewire\Component;

class StatistiqueTiers extends Component
{
    private $total_prospect;
    private $total_client; 
    private $total_fournisseur;
    private $total_autres;
    private $tiers;

    public function mount($total_prospect = 0,$total_client = 0,$total_fournisseur = 0,$total_autres = 0,$tiers){
        $this->total_prospect = $total_prospect;
        $this->total_client = $total_client;
        $this->total_fournisseur = $total_fournisseur;
        $this->total_autres = $total_autres;
        $this->tiers = $tiers;

    }

    public function render()
    {
        
        return view('livewire.tiers.statistique-tiers',[
            'total_autres'=>$this->total_autres,
            'total_client'=>$this->total_client,
            'total_fournisseur'=>$this->total_fournisseur,
            'total_prospect'=>$this->total_prospect,
            'tiers'=>$this->tiers
        ]);
    }
}
