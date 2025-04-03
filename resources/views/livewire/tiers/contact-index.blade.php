{{-- resources/views/livewire/tiers/index.blade.php --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
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
    <div class="container-flux p-6 flex-grow-1 container-p-y">
        <div class="d-flex align-items-center mb-3">
            <div class="d-flex align-items-center me-2">
                <i class="fas fa-box text-success me-2"></i>
                <h4 class="fw-bold py-3 mb-2">Liste des contacts </h4>
            </div>
            <div class="d-flex align-items-center">
                <div class="dropdown">
                    <button class="btn btn-outline-secondary view-toggle me-2 " id="collumToggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="ti ti-list"></i>
                    </button>
                    <ul class="dropdown-menu shadow-sm py-2 px-3" aria-labelledby="collumToggle">
                        <li><label class="dropdown-item"><input type="checkbox" checked> Code</label></li>
                        <li><label class="dropdown-item"><input type="checkbox" checked> Nom</label></li>
                        <li><label class="dropdown-item"><input type="checkbox" checked> Type</label></li>
                        <li><label class="dropdown-item"><input type="checkbox" checked> Nature</label></li>
                        <li><label class="dropdown-item"><input type="checkbox" checked> Email</label></li>
                        <li><label class="dropdown-item"><input type="checkbox" checked> Commerciaux</label></li>
                        <li><label class="dropdown-item"><input type="checkbox" checked> Telephone</label></li>
                        <li><label class="dropdown-item"><input type="checkbox" checked> Statut</label></li>
                        <li class="text-center mt-2">
                            <button class="btn btn-primary btn-sm">Valider</button>
                        </li>
                    </ul>
                </div>
                <select class="form-select me-2" style="max-width: 90px;">
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
                <button class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ __('Nouveau contact') }}">
                    <a style="color: white;" href="{{ route('create-contact') }}"><i  class="fas fa-plus" ></i></a>
                </button>
            </div>
        </div>
         <!-- Menu d'action -->
         <div class="d-flex gap-2 align-items-center action-menu mb-3">
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
              <!-- Liste des Tiers -->
        <div class="card">

            <div class="card-header border-bottom">

                <!-- Filtres -->
                <div class="row g-3 mt-2">
                    <div class="col-md-3" style="max-width: 175px;">
                            <div class="dropdown">
                                <button class="form-select mb-0 d-flex justify-content-between align-items-center border rounded"
                                    type="button" id="typeDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span>Types</span>
                                </button>
                                <ul class="dropdown-menu py-1 shadow-sm" aria-labelledby="typeDropdown"
                                    style="min-width: 100%;">
                                    <li class="px-3 py-1">
                                        <div class="form-check mb-0">
                                            <input class="form-check-input" type="checkbox" name="type" id="client"
                                                value="client" wire:model.live="filterTypes">
                                            <label class="form-check-label small" for="client">Client</label>
                                        </div>
                                    </li>
                                    <li class="px-3 py-1">
                                        <div class="form-check mb-0">
                                            <input class="form-check-input" type="checkbox" name="type" id="prospect"
                                                value="prospect" wire:model.live="filterTypes">
                                            <label class="form-check-label small" for="prospect">Prospect</label>
                                        </div>
                                    </li>
                                    <li class="px-3 py-1">
                                        <div class="form-check mb-0">
                                            <input class="form-check-input" type="checkbox" name="type" id="fournisseur"
                                                value="fournisseur" wire:model.live="filterTypes">
                                            <label class="form-check-label small" for="fournisseur">Fournisseur</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                    </div>


                    <div class="col-md-3">
                        <div class="input-group border rounded">
                            <span class="input-group-text border-0">
                                <i class="fas fa-tag "></i>
                            </span>
                            <input type="text" class="form-control border-0" placeholder="Tag/catégorie">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select border rounded">
                            <option value="">Commerciaux</option>
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                    </div>

                    <div class="col-md-3" style="max-width:200px;">
                        <select class="form-select border rounded">
                            <option value="">Roles</option>
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="col-md-6" style="max-width: 400px;">
                        <div class="input-group border rounded">

                        <select class="form-select border-0">
                            <option value="" class="fs-6">Rechercher par</option>
                            <option value="">Nom</option>
                            <option value="">Type</option>
                            <option value="">Email</option>
                            <option value="">Télephone</option>
                        </select>
                            <input type="text" class="form-control border-0" placeholder="Rechercher..." wire:model="searchName">
                            <button class="btn btn-outline-secondary border-0" type="button" wire:click="performSearch"> <!-- Bouton pour effectuer la recherche -->
                                <i class="ti ti-search border-0"></i>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
            <livewire:tiers.contact-liste :data="$data" />
        </div>
    </div>

</div>

