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
        <livewire:tiers.statistique />
        <!-- Liste des Tiers -->
        <div class="card">

            <div class="card-header border-bottom">

                <div class="d-flex justify-content-between align-items-center row">
                    <!-- Titre à gauche -->
                    <div class="col-sm-6 col-8">
                        <h5 class="card-title mb-0">Liste des Tiers</h5>
                    </div>

                    <!-- Bouton à droite -->
                    <div class="col-sm-6 col-4 text-end">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tierModal">
                            <i class="ti ti-plus me-1"></i>
                            <span class="d-none d-sm-inline-block">Nouveau Tiers</span>
                        </button>
                    </div>
                </div>
                <!-- Filtres -->
                <div class="row g-3 mt-3">
                    <div class="col-md-4">
                        <select class="form-select">
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
                            <span class="input-group-text"><i class="ti ti-search"></i></span>
                            <input type="text" class="form-control" placeholder="Rechercher...">
                        </div>
                    </div>
                </div>

            </div>

            <livewire:tiers.tiers-liste />
        </div>
    </div>
    @include('livewire.tiers.modal.form')
</div>

