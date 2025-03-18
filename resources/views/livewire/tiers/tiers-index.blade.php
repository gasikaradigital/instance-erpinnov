{{-- resources/views/livewire/tiers/index.blade.php --}}
<div>
    @section('vendor-style')
        @vite(['resources/assets/vendor/libs/select2/select2.scss', 'resources/assets/vendor/libs/@form-validation/form-validation.scss'])
    @endsection

    @section('vendor-script')
        @vite(['resources/assets/vendor/libs/moment/moment.js', 'resources/assets/vendor/libs/select2/select2.js', 'resources/assets/vendor/libs/@form-validation/popular.js', 'resources/assets/vendor/libs/@form-validation/bootstrap5.js', 'resources/assets/vendor/libs/@form-validation/auto-focus.js'])
    @endsection

    <livewire:tiers.statistique :data="$data" />

    <div class="container-flux flex-grow-1 container-p-y p-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="d-flex align-items-center">
                <i class="fas fa-box text-success me-2"></i>
                <h4 class="fw-bold py-3 mb-2">Liste des tiers</h4>
            </div>

            <!-- Menu d'action -->
            <div class="d-flex gap-2 align-items-center action-menu {{ count($selectedIds) !== 0 ? 'visible' : '' }}">
                <select class="form-select" wire:model="selectedAction" style="width: 250px;">
                    <option value="">-- Sélectionner l'action --</option>
                    <option value="CHANGE_STATUS_TO_OPEN">Définir sur le statut Ouvert</option>
                    <option value="CHANGE_STATUS_TO_CLOSE">Définir sur le statut Clos</option>
                    <option value="DELETE_TIERS">Supprimer</option>
                </select>

                <button class="btn btn-secondary" wire:click="executeAction">CONFIRMER</button>
            </div>

            <div wire:loading wire:target="executeAction">
                <span class="spinner-border spinner-border-sm text-primary" role="status"></span>
                Exécution en cours...
            </div>

            <div class="d-flex gap-2">
                <select class="form-select" style="width: 110px;">
                    <option>10</option>
                    <option>15</option>
                    <option>20</option>
                    <option>25</option>
                    <option>50</option>
                    <option>100</option>
                    <option>250</option>
                    <option>500</option>
                    <option>1000</option>
                    <option>5000</option>
                    <option>10000</option>
                </select>
                <button class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="bottom"
                    title="{{ __('Nouveau produit') }}">
                    <a href="{{ route('create-tiers') }}" class="btn btn-primary">
                        <i class="ti ti-plus"></i>
                    </a>
                </button>
            </div>
        </div>

        <!-- Liste des Tiers -->
        <div class="card">
            <div class="card-header border-bottom">
                <!-- Filtres -->
                <div class="row g-3 mt-3">
                    <!-- Filtre par type -->
                    <div class="col-md-3">
                        <div class="d-flex gap-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="type" id="client"
                                    value="client" wire:model.live="filterType">
                                <label class="form-check-label" for="client">Client</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="type" id="prospect"
                                    value="prospect" wire:model.live="filterType">
                                <label class="form-check-label" for="prospect">Prospect</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="type" id="fournisseur"
                                    value="fournisseur" wire:model.live="filterType">
                                <label class="form-check-label" for="fournisseur">Fournisseur</label>
                            </div>
                        </div>
                    </div>

                    <!-- Filtre par catégorie -->
                    <div class="col-md-2">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-tag"></i></span>
                            <input type="text" class="form-control" placeholder="Tag/catégorie"
                                wire:model="filterCategorie">
                        </div>
                    </div>

                    <!-- Filtre par statut -->
                    <div class="col-md-2">
                        <select class="form-select" wire:model.lazy="filterStatut">
                            <option value="default">Statut</option>
                            <option value="1">Actif</option>
                            <option value="0">Inactif</option>
                        </select>
                    </div>

                    <!-- Filtre par commerciaux -->
                    <div class="col-md-2">
                        <select class="form-select" wire:model="filterComerciaux">
                            <option value="default">Commerciaux</option>
                            @foreach ($commerciaux as $commercial)
                            <option value={{$commercial->id}}>{{$commercial->firstname . $commercial->lastname}}</option> 
                            @endforeach
                        </select>
                    </div>

                    <!-- Filtre de recherche -->
                    <div class="col-md-3">
                        <div class="input-group">
                            <select class="form-select" wire:model="filterSearchType">
                                <option value="name">Nom</option>
                                <option value="email">Email</option>
                                <option value="phone">Téléphone</option>
                            </select>
                            <input type="text" class="form-control" placeholder="Rechercher..."
                                wire:model="filterSearchValue">
                            <button class="btn btn-outline-secondary" type="button" wire:click="applyFilters">
                                <i class="ti ti-search"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Bouton de réinitialisation -->
                <div class="d-flex justify-content-end mt-3">
                    <button class="btn btn-outline-danger" wire:click="resetFilters">Réinitialiser</button>
                </div>
            </div>

            <!-- Liste des tiers filtrés -->
            <livewire:tiers.tiers-liste :data="$filteredData" :key="'tiers-liste-' . count($filteredData)" :commerciaux="$commerciaux"/>
        </div>
    </div>

    @include('livewire.tiers.modal.form')
</div>
