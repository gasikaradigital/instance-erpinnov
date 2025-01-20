<div>
    @section('vendor-style')
    @vite([
        'resources/assets/vendor/libs/bs-stepper/bs-stepper.scss'
    ])
    @endsection

    @section('vendor-script')
    @vite([
        'resources/assets/vendor/libs/bs-stepper/bs-stepper.js'
    ])
    @endsection

    <div class="container-xxl flex-grow-1 container-p-y">
        {{-- En-tête --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold py-3 mb-0">
                <span class="text-muted fw-light">Services /</span> Nouveau Service
            </h4>
            <button type="button" class="btn btn-outline-primary" id="saveDraft">
                <i class="ti ti-file me-1"></i>Sauvegarder en brouillon
            </button>
        </div>


        {{-- Formulaire principal --}}
        <div class="card mb-4">
            <div class="card-body">
                <div class="bs-stepper horizontal wizard-modern wizard-modern-horizontal">

                    {{-- Header du Stepper --}}
                    <div class="bs-stepper-header mb-4">
                        {{-- Étape 1: Informations générales --}}
                        <div class="step active" data-target="#step1">
                            <div class="d-flex align-items-center">
                                <div class="step-trigger px-0">
                                    <span class="bs-stepper-circle">1</span>
                                    <span class="bs-stepper-label ms-2">
                                        <span class="bs-stepper-title">Informations générales</span>
                                        <span class="bs-stepper-subtitle">Données de base</span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="line"></div>

                        {{-- Étape 2: Prix et conditions --}}
                        <div class="step" data-target="#step2">
                            <div class="d-flex align-items-center">
                                <div class="step-trigger px-0">
                                    <span class="bs-stepper-circle">2</span>
                                    <span class="bs-stepper-label ms-2">
                                        <span class="bs-stepper-title">Prix et conditions</span>
                                        <span class="bs-stepper-subtitle">Tarification</span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="line"></div>

                        {{-- Étape 3: Comptabilité --}}
                        <div class="step" data-target="#step3">
                            <div class="d-flex align-items-center">
                                <div class="step-trigger px-0">
                                    <span class="bs-stepper-circle">3</span>
                                    <span class="bs-stepper-label ms-2">
                                        <span class="bs-stepper-title">Comptabilité</span>
                                        <span class="bs-stepper-subtitle">Codes comptables</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Contenu du formulaire --}}
                    <div class="bs-stepper-content p-0">
                        <form wire:submit.prevent="submit">
                            {{-- Étape 1: Informations générales --}}
                            <div class="content {{ $currentStep == 1 ? 'active dstepper-block' : 'd-none' }}">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label class="form-label" for="ref">Référence <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="ref" wire:model="ref" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label" for="label">Libellé <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="label" wire:model="label" required>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label" for="description">Description</label>
                                                <textarea class="form-control" id="description" wire:model="description" rows="3"></textarea>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label" for="status">Statut</label>
                                                <select class="form-select" id="status" wire:model="status">
                                                    <option value="">Choisissez</option>
                                                    <option value="1">En service</option>
                                                    <option value="0">Hors service</option>
                                                </select>
                                            </div>
                                            <!-- <div class="col-md-6">
                                                <label class="form-label">Durée du service</label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" wire:model="duration_value" min="0" step="1">
                                                    <select class="form-select" wire:model="duration_unit" style="max-width: 100px;">
                                                        <option value="h">Heure(s)</option>
                                                        <option value="d">Jour(s)</option>
                                                        <option value="w">Semaine(s)</option>
                                                        <option value="m">Mois</option>
                                                        <option value="y">Année(s)</option>
                                                    </select>
                                                </div>
                                            </div> -->
                                        </div>
                                        <div class="d-flex justify-content-between mt-4">
                                            <button type="button" class="btn btn-label-secondary" onclick="history.back()">
                                                <i class="ti ti-arrow-left me-sm-1"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Retour</span>
                                            </button>
                                            <button type="button" class="btn btn-primary" wire:click="nextStep">
                                                <span class="align-middle d-sm-inline-block d-none me-sm-1">Suivant</span>
                                                <i class="ti ti-arrow-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Étape 2: Prix et conditions --}}
                            <div class="content {{ $currentStep == 2 ? 'active dstepper-block' : 'd-none' }}">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label class="form-label" for="price">Prix de vente HT</label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" id="price" wire:model="price" step="0.01">
                                                    <span class="input-group-text">€</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label" for="tva_tx">TVA</label>
                                                <select class="form-select" id="tva_tx" wire:model="tva_tx">
                                                    <option value="20">20%</option>
                                                    <option value="10">10%</option>
                                                    <option value="5.5">5.5%</option>
                                                    <option value="2.1">2.1%</option>
                                                    <option value="0">0%</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label" for="price_ttc">Prix de vente TTC</label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" id="price_ttc" wire:model="price_ttc" step="0.01">
                                                    <span class="input-group-text">€</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label" for="price_min">Prix minimal HT</label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" id="price_min" wire:model="price_min" step="0.01">
                                                    <span class="input-group-text">€</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label" for="price_min_ttc">Prix minimal TTC</label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" id="price_min_ttc" wire:model="price_min_ttc" step="0.01">
                                                    <span class="input-group-text">€</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between mt-4">
                                            <button type="button" class="btn btn-label-secondary" wire:click="previousStep">
                                                <i class="ti ti-arrow-left me-sm-1"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Précédent</span>
                                            </button>
                                            <button type="button" class="btn btn-primary" wire:click="nextStep">
                                                <span class="align-middle d-sm-inline-block d-none me-sm-1">Suivant</span>
                                                <i class="ti ti-arrow-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Étape 3: Comptabilité --}}
                            <div class="content {{ $currentStep == 3 ? 'active dstepper-block' : 'd-none' }}">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <!-- <div class="col-md-6">
                                                <label class="form-label" for="accountancy_code_sell">Code comptable vente</label>
                                                <input type="text" class="form-control" id="accountancy_code_sell" wire:model="accountancy_code_sell">
                                                <div class="form-text">Code comptable pour les ventes</div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label" for="accountancy_code_buy">Code comptable achat</label>
                                                <input type="text" class="form-control" id="accountancy_code_buy" wire:model="accountancy_code_buy">
                                                <div class="form-text">Code comptable pour les achats</div>
                                            </div> -->
                                        </div>
                                        <div class="d-flex justify-content-between mt-4">
                                            <button type="button" class="btn btn-label-secondary" wire:click="previousStep">
                                                <i class="ti ti-arrow-left me-sm-1"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Précédent</span>
                                            </button>
                                            <button type="submit" class="btn btn-success">
                                                <i class="ti ti-device-floppy me-sm-1"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Enregistrer</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
