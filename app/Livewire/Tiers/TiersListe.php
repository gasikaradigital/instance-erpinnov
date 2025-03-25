<?php

namespace App\Livewire\Tiers;

use Livewire\Component;

class TiersListe extends Component
{
    public $data;
    public $selectedIds = []; 
    public $commerciaux = [];
    public $visibleColumns;


    protected $listeners = ['updateVisibleColumns' => 'setVisibleColumns'];

    public function setVisibleColumns($columns)
    {
        $this->visibleColumns = $columns;
    }

    public function toggleSelect($id)
    {
        if (in_array($id, $this->selectedIds)) {
            $this->selectedIds = array_diff($this->selectedIds, [$id]);
        } else {
            $this->selectedIds[] = $id;
        }

        $this->dispatch('selectedIdsUpdated', selectedIds: $this->selectedIds);
    }

    public function toggleSelectAll()
    {
        if (count($this->selectedIds) === count($this->data)) {
            $this->selectedIds = [];
        } else {
            $this->selectedIds = array_column($this->data, 'id');
        }
        $this->dispatch('selectedIdsUpdated', selectedIds: $this->selectedIds);
    }

    public function render()
    {
        return view('livewire.tiers.tiers-liste');
    }
}