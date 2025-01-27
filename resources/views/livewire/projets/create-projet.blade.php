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
            <div>
                <h4 class="fw-bold py-3 mb-0">
                    <span class="text-muted fw-light">Projets /</span> Nouveau Projet
                </h4>
                <div class="text-muted">Créez un nouveau projet en remplissant les informations suivantes</div>
            </div>
            <div class="d-flex gap-2">
                <button type="button" class="btn btn-label-secondary" wire:click="saveDraft">
                    <i class="ti ti-file me-1"></i>
                    Brouillon
                </button>
                <button type="button" class="btn btn-primary" wire:click="submit">
                    <i class="ti ti-device-floppy me-1"></i>
                    Enregistrer
                </button>
            </div>
        </div>

        <!-- Formulaire principal -->
        <div class="row">
            <!-- Colonne principale -->
            <div class="col-xl-8 col-lg-7">
                <!-- Informations générales -->
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Informations générales</h5>
                        <small class="text-muted float-end">* champs requis</small>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Référence <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text">PJ2501-</span>
                                    <input type="text" class="form-control" wire:model="ref" placeholder="PJ2501-0001">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Titre <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" wire:model="title" placeholder="Titre du projet">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" wire:model="description" rows="4" placeholder="Description détaillée du projet"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Planning -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Planning</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Date de début</label>
                                <input type="date" class="form-control" wire:model="start_date">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Date de fin prévue</label>
                                <input type="date" class="form-control" wire:model="end_date">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Budget prévisionnel</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" wire:model="budget_amount" step="0.01">
                                    <span class="input-group-text">€</span>
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                                <label class="form-label">Temps prévu (heures)</label>
                                <input type="number" class="form-control" wire:model="planned_workload">
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Colonne latérale -->
            @include('livewire.projets.form-laterale')
        </div>
    </div>
</div>
