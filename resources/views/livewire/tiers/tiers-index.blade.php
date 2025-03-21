{{-- resources/views/livewire/tiers/index.blade.php --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<div>
    @section('vendor-style')
        @vite(['resources/assets/vendor/libs/select2/select2.scss', 'resources/assets/vendor/libs/@form-validation/form-validation.scss'])
    @endsection

    @section('vendor-script')
        @vite(['resources/assets/vendor/libs/moment/moment.js', 'resources/assets/vendor/libs/select2/select2.js', 'resources/assets/vendor/libs/@form-validation/popular.js', 'resources/assets/vendor/libs/@form-validation/bootstrap5.js', 'resources/assets/vendor/libs/@form-validation/auto-focus.js'])
    @endsection

    <div class="container-flux flex-grow-1 container-p-y p-6">
    <div class="d-flex align-items-center">
                <i class="fas fa-box text-success me-2"></i>
                <h4 class="fw-bold py-3 mb-2">Liste des tiers</h4>
                <div class="dropdown">
        <span  id="columnToggle" data-bs-toggle="dropdown" aria-expanded="false">
                 <button class="btn btn-light btn-sm view-toggle ms-2" data-view="list"><i class="fas fa-list"></i></button>
                                </span>
                                    <ul class="dropdown-menu shadow-sm py-1" aria-labelledby="columnToggle">
                                         <li class="px-3 py-1">
                                                 <div class="form-check mb-0">
                                                    <input class="form-check-input" type="checkbox" id="nomCheck" data-column="4">
                                                        <label class="form-check-label small" for="nomCheck">
                                                                Code
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li class="px-3 py-1">
                                                        <div class="form-check mb-0">
                                                            <input class="form-check-input" type="checkbox" id="prenomCheck" data-column="5" checked>
                                                            <label class="form-check-label small" for="prenomCheck">
                                                                Nom
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li class="px-3 py-1">
                                                        <div class="form-check mb-0">
                                                            <input class="form-check-input" type="checkbox" id="genreCheck" data-column="6" checked>
                                                            <label class="form-check-label small" for="genreCheck">
                                                                Type
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li class="px-3 py-1">
                                                        <div class="form-check mb-0">
                                                            <input class="form-check-input" type="checkbox" id="salarieCheck" data-column="7" checked>
                                                            <label class="form-check-label small" for="salarieCheck">
                                                                Nature tiers
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li class="px-3 py-1">
                                                        <div class="form-check mb-0">
                                                            <input class="form-check-input" type="checkbox" id="responsableCheck" data-column="8" checked>
                                                            <label class="form-check-label small" for="responsableCheck">
                                                                Email
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li class="px-3 py-1">
                                                        <div class="form-check mb-0">
                                                            <input class="form-check-input" type="checkbox" id="compteCheck" data-column="9">
                                                            <label class="form-check-label small" for="compteCheck">
                                                                Commerciaux
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li class="px-3 py-1">
                                                        <div class="form-check mb-0">
                                                            <input class="form-check-input" type="checkbox" id="telCheck" data-column="10" checked>
                                                            <label class="form-check-label small" for="telCheck">
                                                                Téléphone
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li class="px-3 py-1">
                                                        <div class="form-check mb-0">
                                                            <input class="form-check-input" type="checkbox" id="telCheck" data-column="10" checked>
                                                            <label class="form-check-label small" for="telCheck">
                                                               Statut
                                                            </label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
    <select class="form-select form-select-sm ms-2" style="max-width: 100px;">
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

    <button class="btn btn-primary btn-sm ms-2" data-bs-toggle="tooltip" data-bs-placement="bottom"
        title="{{ __('Nouveau produit') }}">
        <a href="{{ route('create-tiers') }}" class="btn btn-primary btn-sm p-0 px-1">
            <i class="ti ti-plus"></i>
        </a>
    </button>
</div>
        <div class="d-flex justify-content-between align-items-center mb-3">
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

        </div>

        <!-- Liste des Tiers -->
<div class="card">
    <div class="card-header border-bottom pb-3">
        <!-- Filtres -->
        <div class="row g-2 mt-2">
            <!-- Filtre par type -->
           <div class="col-md-2">
    <div class="dropdown">
        <button class="form-select form-select-sm d-flex justify-content-between align-items-center" type="button" id="typeDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="padding-right: 28px;">
            <span>Types de tiers</span>
        </button>
        <ul class="dropdown-menu py-1 shadow-sm" aria-labelledby="typeDropdown" style="min-width: 100%;">
            <li class="px-3 py-1">
                <div class="form-check mb-0">
                    <input class="form-check-input" type="checkbox" name="type" id="client" value="client" wire:model.live="filterTypes">
                    <label class="form-check-label small" for="client">Client</label>
                </div>
            </li>
            <li class="px-3 py-1">
                <div class="form-check mb-0">
                    <input class="form-check-input" type="checkbox" name="type" id="prospect" value="prospect" wire:model.live="filterTypes">
                    <label class="form-check-label small" for="prospect">Prospect</label>
                </div>
            </li>
            <li class="px-3 py-1">
                <div class="form-check mb-0">
                    <input class="form-check-input" type="checkbox" name="type" id="fournisseur" value="fournisseur" wire:model.live="filterTypes">
                    <label class="form-check-label small" for="fournisseur">Fournisseur</label>
                </div>
            </li>
        </ul>
    </div>
</div>

            <!-- Filtre par catégorie -->
            <div class="col-md-2">
                <div class="input-group input-group-sm">
                    <span class="input-group-text"><i class="fas fa-tag"></i></span>
                    <input type="text" class="form-control form-control-sm" placeholder="Tag/catégorie"
                        wire:model="filterCategorie">
                </div>
            </div>

            <!-- Filtre par statut -->
            <div class="col-md-2">
                <select class="form-select form-select-sm" wire:model.lazy="filterStatut">
                    <option value="default">Statut</option>
                    <option value="1">Actif</option>
                    <option value="0">Inactif</option>
                </select>
            </div>

            <!-- Filtre par commerciaux -->
            <div class="col-md-2">
                <select class="form-select form-select-sm" wire:model="filterComerciaux">
                    <option value="default">Commerciaux</option>
                    @foreach ($commerciaux as $commercial)
                    <option value={{$commercial->id}}>{{$commercial->firstname . $commercial->lastname}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
            <select class="form-select form-select-sm " wire:model="filterSearchType">
                        <option value="name">Nom</option>
                        <option value="email">Email</option>
                        <option value="phone">Téléphone</option>
                    </select>
            </div>

            <!-- Filtre de recherche -->
            <div class="col-md-2">
                <div class="input-group input-group-sm border ">
                    <input type="text" class="form-control form-control-sm border-0" placeholder="Rechercher..."
                        wire:model="filterSearchValue">
                    <span class="border-0" wire:click="applyFilters ">
                        <i class="ti ti-search btn-sm  me-2 border-0"></i>
                    </span>

                </div>
            </div>
        </div>
    </div>

    <!-- Liste des tiers filtrés -->
    <livewire:tiers.tiers-liste :data="$filteredData" :key="'tiers-liste-' . count($filteredData)" :commerciaux="$commerciaux"/>
</div>
    </div>

    @include('livewire.tiers.modal.form')
</div>
