<div>
    @section('vendor-style')
        @vite(['resources/assets/vendor/libs/select2/select2.scss', 'resources/assets/vendor/libs/@form-validation/form-validation.scss'])
    @endsection

    @section('vendor-script')
        @vite(['resources/assets/vendor/libs/moment/moment.js', 'resources/assets/vendor/libs/select2/select2.js', 'resources/assets/vendor/libs/@form-validation/popular.js', 'resources/assets/vendor/libs/@form-validation/bootstrap5.js', 'resources/assets/vendor/libs/@form-validation/auto-focus.js'])
    @endsection
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Liste des prospects -->
        <div class="card">

            <div class="card-header border-bottom">

                <div class="d-flex justify-content-between align-items-center row">
                    <!-- Titre à gauche -->
                    <div class="col-sm-6 col-8">
                        <h5 class="card-title mb-0">Liste des Prospects</h5>
                    </div>
                    <div class="col-sm-6 col-4 text-end">
                        <a href="{{route('create-prospects')}}" class="btn btn-primary">
                            <i class="ti ti-plus"></i> Nouveau Prospects
                        </a>
                    </div>
                </div>
                <!-- Filtres -->
                <div class="row g-3 mt-3">
                    <div class="col-md-4">
                        <select class="form-select" wire:model="type">
                            <option value="">Type de Tiers</option>
                            <option value="client">Client</option>
                            <option value="fournisseur">Fournisseur</option>
                            <option value="prospect">Prospect</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select class="form-select">
                            <option value="">Statut</option>
                            <option value="actif">Actif</option>
                            <option value="inactif">Inactif</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Rechercher..."
                                wire:model="searchName">
                            <button class="btn btn-outline-secondary" type="button" wire:click="performSearch">
                                <!-- Bouton pour effectuer la recherche -->
                                <i class="ti ti-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <livewire:tiers.prospects-liste/>
            </div>
           
        </div>
    </div>
</div>
