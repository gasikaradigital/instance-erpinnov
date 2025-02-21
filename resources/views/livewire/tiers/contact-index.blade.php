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

    <div class="container-xxl flex-grow-1 container-p-y">
         <!-- Menu d'action -->
         <div class="d-flex gap-2 align-items-center mb-5 justify-content-center action-menu">
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

                <div class="d-flex justify-content-between align-items-center row">
                    <!-- Titre à gauche -->
                    <div class="col-sm-6 col-8">
                        <h5 class="card-title mb-0">Liste des contacts</h5>
                    </div>
                    <div class="col-sm-6 col-4 text-end">
                        <a href="{{ route('create-contact') }}" class="btn btn-primary">
                            <i class="ti ti-plus"></i> Nouveau Contact
                        </a>
                    </div>
                </div>
                <!-- Filtres -->
                <div class="row g-3 mt-3">
                    <div class="col-md-2">
                        <select class="form-select" wire:model="type">
                            <option value="">Type de Tiers</option>
                            <option value="client">Client</option>
                            <option value="fournisseur">Fournisseur</option>
                            <option value="prospect">Prospect</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select class="form-select">
                            <option value="">Commerciaux</option>
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <select class="form-select">
                            <option value="">Roles</option>
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="col-md-4">
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
            <livewire:tiers.contact-liste :data="$data" />
        </div>
    </div>

</div>

