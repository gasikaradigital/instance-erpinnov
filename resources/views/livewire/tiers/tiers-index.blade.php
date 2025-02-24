{{-- resources/views/livewire/tiers/index.blade.php --}}
<div>
    @section('vendor-style')
    @vite([
        'resources/assets/vendor/libs/select2/select2.scss',
        'resources/assets/vendor/libs/@form-validation/form-validation.scss'
    ])
    @endsection

    @section('vendor-script')
    @vite([
        'resources/assets/vendor/libs/moment/moment.js',
        'resources/assets/vendor/libs/select2/select2.js',
        'resources/assets/vendor/libs/@form-validation/popular.js',
        'resources/assets/vendor/libs/@form-validation/bootstrap5.js',
        'resources/assets/vendor/libs/@form-validation/auto-focus.js'
    ])
    @endsection
    <div class="container-flux flex-grow-1 container-p-y p-5">
        <livewire:tiers.statistique :data = "$data"/>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="d-flex align-items-center">
                <i class="fas fa-box text-success me-2"></i>
                <h4 class="fw-bold py-3 mb-2">Liste des tiers </h4>
            </div>
    
          
                <!-- Menu d'action -->
                <div class="d-flex gap-2 align-items-center action-menu">
                    <select class="form-select" style="width: 250px;">
                        <option>-- Sélectionner l'action --</option>
                        <option>Re-générer le PDF</option>
                        <option>Modifier la valeur d'un extrafield</option>
                        <option>Augmenter/diminuer le prix client</option>
                        <option>Basculer le statut En vente</option>
                        <option>Basculer le statut En achat</option>
                        <option>Affecter un tag/catégorie</option>
                        <option  data-icon="fas fa-trash-alt">Supprimer</option>
                    </select>
                
                    <button class="btn btn-secondary">CONFIRMER</button>
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
                <button class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ __('Nouveau produit') }}">
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
                    <div class="col-md-3">
                        <div class="d-flex gap-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="type" id="client" value="client" wire:model="type">
                                <label class="form-check-label" for="client">
                                    Client
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="type" id="prospect" value="prospect" wire:model="type">
                                <label class="form-check-label" for="prospect">
                                    Prospect
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="type" id="fournisseur" value="fournisseur" wire:model="type">
                                <label class="form-check-label" for="fournisseur">
                                    Fournisseur
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="col-md-2">
                        <select class="form-select">
                            <option value="">Statut</option>
                            <option value="actif">Actif</option>
                            <option value="inactif">Inactif</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select class="form-select">
                            <option value="">Commerciaux</option>
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="col-md-5">
                        <div class="input-group">                            

                        <select class="form-select">
                            <option value="" class="fs-6">Rechercher par</option>
                            <option value="">Nom</option>
                            <option value="">Type</option>
                            <option value="">Email</option>
                            <option value="">Télephone</option>
                        </select>
                            <input type="text" class="form-control" placeholder="Rechercher..." wire:model="searchName">
                            <button class="btn btn-outline-secondary" type="button" wire:click="performSearch"> <!-- Bouton pour effectuer la recherche -->
                                <i class="ti ti-search"></i>
                            </button>
                        </div>
                    </div>
                </div>

            </div>

            <livewire:tiers.tiers-liste :data="$data" />
        </div>
    </div>
    @include('livewire.tiers.modal.form')
</div>

