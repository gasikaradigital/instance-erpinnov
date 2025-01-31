{{-- resources/views/products/create.blade.php --}}
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
        <!-- En-tête -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold py-3 mb-0">
                <span class="text-muted fw-light">Produits /</span> Nouveau Produit
            </h4>
            <button type="button" class="btn btn-outline-primary" id="saveDraft">
                <i class="ti ti-file me-1"></i>Sauvegarder en brouillon
            </button>
        </div>

        <!-- Titre -->
        <div class="card mb-4">
            <div class="card-body">
                <!-- Stepper horizontal -->
                <div class="bs-stepper horizontal wizard-modern wizard-modern-horizontal">
                    <div class="bs-stepper-header mb-4">
                        <!-- Étape 1: Informations générales -->
                        <div class="step {{ $currentStep >= 1 ? 'active' : '' }}" data-target="#step1">
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

                        <!-- Étape 2: Prix -->
                        <div class="step {{ $currentStep >= 2 ? 'active' : '' }}" data-target="#step2">
                            <div class="d-flex align-items-center">
                                <div class="step-trigger px-0">
                                    <span class="bs-stepper-circle">2</span>
                                    <span class="bs-stepper-label ms-2">
                                        <span class="bs-stepper-title">Informations supplémentaire</span>
                                        <span class="bs-stepper-subtitle">Tarification/Stock</span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="line"></div> -->

                        <!-- Étape 3: Stock -->
                        <!-- <div class="step {{ $currentStep >= 3 ? 'active' : '' }}" data-target="#step3">
                            <div class="d-flex align-items-center">
                                <div class="step-trigger px-0">
                                    <span class="bs-stepper-circle">3</span>
                                    <span class="bs-stepper-label ms-2">
                                        <span class="bs-stepper-title">Stock</span>
                                        <span class="bs-stepper-subtitle">Gestion du stock</span>
                                    </span>
                                </div>
                            </div>
                        </div> -->

                        <!-- <div class="line"></div> -->

                        <!-- Étape 4: Dimensions -->
                        <!-- <div class="step {{ $currentStep >= 4 ? 'active' : '' }}" data-target="#step4">
                            <div class="d-flex align-items-center">
                                <div class="step-trigger px-0">
                                    <span class="bs-stepper-circle">4</span>
                                    <span class="bs-stepper-label ms-2">
                                        <span class="bs-stepper-title">Dimensions</span>
                                        <span class="bs-stepper-subtitle">Caractéristiques physiques</span>
                                    </span>
                                </div>
                            </div>
                        </div> -->
                    </div>

                    <!-- Contenu du formulaire -->
                    <div class="bs-stepper-content p-0">
                        <form>
                            <!-- Étape 1: Informations générales -->
                            <div class="content {{ $currentStep == 1 ? 'active dstepper-block' : 'd-none' }}">
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <label class="form-label" for="label">Libellé <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="label" wire:model="label" required placeholder="Entrez le libellé">
                                    </div>
                                </div>

                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <label class="form-label" for="status">Statut de vente</label>
                                        <select class="form-select" id="status" wire:model="status">
                                            <option value=""></option>
                                            <option value="1">En vente</option>
                                            <option value="0">Hors vente</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="status_buy">Statut d'achat</label>
                                        <select class="form-select" id="status_buy" wire:model="status_buy">
                                            <option value=""></option>
                                            <option value="1">En achat</option>
                                            <option value="0">Hors achat</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <label class="form-label" for="lot_series">Utilisation des numéros de lots/série</label>
                                        <select class="form-select" id="lot_series" wire:model="status_batch">
                                            <option value=""></option>
                                            <option value="0">Non (lot/série non utilisé)</option>
                                            <option value="1">Oui (lot/série requis)</option>
                                            <option value="2">Oui (numéro de série unique requis)</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="DLC">DLC ou DMD/DLUO est obligatoie</label>
                                        <select class="form-select" id="lot_series" wire:model="sell_or_eat_by_mandatory">
                                            <option value=""></option>
                                            <option value="0">Aucune</option>
                                            <option value="1">DLC</option>
                                            <option value="2">DMD/DLUO</option>
                                            <option value="3">DLC et DMD/DLUO</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <label class="form-label" for="barcode">Valeur du code-barres <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="barcode" wire:model="barcode" required placeholder="Entrez la référence">
                                    </div>
                                </div>

                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <label class="form-label" for="description">Description <span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="" id="" rows="3" wire:model="description"></textarea> 
                                    </div>
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

                            <!-- Étape 2: Prix -->
                            <div class="content {{ $currentStep == 2 ? 'active dstepper-block' : 'd-none' }}">
                                <div class="card mb-4">
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="form-label" for="barcode">URL publique <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="url" wire:model="url" required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="form-label" for="description">Limite stock pour alerte <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="url" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label" for="description"> Stock désiré optimal <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="url" required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="form-label" for="barcode">Nature de produit <span class="text-danger">*</span></label>
                                                <select class="form-select" id="lot_series">
                                                    <option value=""></option>
                                                    <option value="required">Matière prmière</option>
                                                    <option value="unique">Produit manufacturé</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row g-4">
                                            <div class="col-md-4">
                                                <label for="volume">Prix de vente</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="volume" wire:model="price">
                                                    <select class="form-select" id="volumeUnit" wire:model="price_base_type">
                                                        <option value="HT">HT</option>
                                                        <option value="TTC">TTC</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="volume">Prix de vente min</label>
                                                <input type="text" class="form-control" id="volume" wire:model="price_min">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="volume">Poids</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="volume" wire:model="weight" >
                                                    <select class="form-select" id="volumeUnit" wire:model="weight_units">
                                                        <option value="3">tonne</option>
                                                        <option value="dm3">Kg</option>
                                                        <option value="">g</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="length">Longueur (m)</label>
                                                <input type="number" class="form-control" id="length" wire:model="length" placeholder="Entrez la longueur">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="width">Largeur (m)</label>
                                                <input type="number" class="form-control" id="width" wire:model="width" placeholder="Entrez la largeur">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="height">Hauteur (m)</label>
                                                <input type="number" class="form-control" id="height" wire:model="height" placeholder="Entrez la hauteur">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="volume">Surface</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="volume">
                                                    <select class="form-select" id="volumeUnit" wire:model="surface">
                                                        <option value="m3">cm²</option>
                                                        <option value="dm3">m²</option>
                            
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="volume">Volume</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="volume" wire:model="volume" >
                                                    <select class="form-select" id="volumeUnit">
                                                        <option value="m3">m³</option>
                                                        <option value="dm3">dm³</option>
                                                        <option value="">cm³</option>
                                                        <option value="">litre³</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="volume">Pays</label>
                                                <select class="form-select" id="volumeUnit">
                                                    <option value="m3">Belgique</option>
                                                    <option value="dm3">France</option>
                                                    <option value="">Madagascar</option>
                                                    <option value="">Suisse</option>
                                                </select>            
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="length">Code comptable (vente)</label>
                                                <input type="text" class="form-control" id="length" wire:model="accountancy_code_sell">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="width">Code comptable (vente à l'export)</label>
                                                <input type="text" class="form-control" id="width" wire:model="accountancy_code_sell_export">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="length">Code comptable (achat)</label>
                                                <input type="text" class="form-control" id="length" wire:model="accountancy_code_buy">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="width">Code comptable (achat import)</label>
                                                <input type="text" class="form-control" id="width" wire:model="accountancy_code_buy_export">
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between mt-4">
                                            <button type="button" class="btn btn-label-secondary" wire:click="previousStep">
                                                <i class="ti ti-arrow-left me-sm-1"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Précédent</span>
                                            </button>
                                            <button type="submit" class="btn btn-success" wire:click="submit">
                                                <i class="ti ti-device-floppy me-sm-1"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Enregistrer</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Étape 3: Stock -->
                            <!-- <div class="content {{ $currentStep == 3 ? 'active dstepper-block' : 'd-none' }}">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label class="form-label" for="stock">Stock physique</label>
                                                <input type="number" class="form-control" id="stock" wire:model="stock" min="0">
                                                <div class="form-text">Quantité actuellement en stock</div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label" for="seuil_stock_alerte">Seuil d'alerte</label>
                                                <input type="number" class="form-control" id="seuil_stock_alerte" wire:model="seuil_stock_alerte" min="0">
                                                <div class="form-text">Niveau de stock minimum avant alerte</div>
                                            </div>
                                            <div class="col-12">
                                                <div class="alert alert-warning">
                                                    <div class="d-flex">
                                                        <i class="ti ti-alert-triangle me-2 mt-1"></i>
                                                        <div>Une alerte sera générée lorsque le stock physique passera sous le seuil d'alerte</div>
                                                    </div>
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
                            </div> -->

                            <!-- Étape 4: Dimensions -->
                            <!-- <div class="content {{ $currentStep == 4 ? 'active dstepper-block' : 'd-none' }}">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label class="form-label" for="weight">Poids</label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" id="weight" wire:model="weight" step="0.01" min="0">
                                                    <select class="form-select" id="weight_units" wire:model="weight_units" style="max-width: 100px;">
                                                        <option value="0">Kg</option>
                                                        <option value="1">g</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label" for="length">Longueur</label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" id="length" wire:model="length" step="0.01" min="0">
                                                    <select class="form-select" id="length_units" wire:model="length_units" style="max-width: 100px;">
                                                        <option value="0">m</option>
                                                        <option value="1">cm</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label" for="surface">Surface</label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" id="surface" wire:model="surface" step="0.01" min="0">
                                                    <select class="form-select" id="surface_units" wire:model="surface_units" style="max-width: 100px;">
                                                        <option value="0">m²</option>
                                                        <option value="1">cm²</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label" for="volume">Volume2</label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" id="volume" wire:model="volume" step="0.01" min="0">
                                                    <select class="form-select" id="volume_units" wire:model="volume_units" style="max-width: 100px;">
                                                        <option value="0">m³</option>
                                                        <option value="1">cm³</option>
                                                        <option value="">l</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between mt-4">
                                            <button type="button" class="btn btn-label-secondary" wire:click="previousStep">
                                                <i class="ti ti-arrow-left me-sm-1"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Précédent</span>
                                            </button>
                                            <button type="submit" class="btn btn-success">
                                                <i class="ti ti-device-floppy me-sm-1"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Enregistrer2</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
