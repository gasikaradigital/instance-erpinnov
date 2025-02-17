<div class="container-xxl flex-grow-1">
    <!-- En-tête -->
    <h4 class="fw-bold py-3 mb-2">Nouvelle opportunité ou projet</h4>
    <div class="card mb-4 col-12">
        <form wire:submit.prevent="save" class="modal-content" id="newOpportunityForm">

            <!-- Corps Modal -->
            <div class="modal-body mx-5 mt-2">
                <div class="row g-3">
                    <!-- Informations de base -->
                    <div class="col-md-3">
                        <label class="form-label">Réf.</label>
                        <div class="input-group">
                            <input type="text" class="form-control" wire:model="reference" value="PJ250217-003-NOMPRC" readonly />
                            <span class="input-group-text">
                                <i class="fas fa-info-circle"></i>
                            </span>
                        </div>
                    </div>
                    
                    <div class="col-md-9">
                        <label class="form-label">Libellé</label>
                        <input type="text" class="form-control" wire:model="label" />
                    </div>

                    <!-- Usage -->
                    <div class="col-12">
                        <label class="form-label">Usage</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" wire:model="follow_opportunity" checked>
                            <label class="form-check-label">Suivre une opportunité</label>
                            <i class="fas fa-info-circle ms-1"></i>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" wire:model="follow_tasks" checked>
                            <label class="form-check-label">Suivre des tâches ou du temps passé</label>
                            <i class="fas fa-info-circle ms-1"></i>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" wire:model="bill_time">
                            <label class="form-check-label">Facturer le temps passé</label>
                            <i class="fas fa-info-circle ms-1"></i>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" wire:model="event_management">
                            <label class="form-check-label">Gestion d'organisation d'événements</label>
                            <i class="fas fa-info-circle ms-1"></i>
                        </div>
                    </div>

                    <!-- Informations principales -->
                    <div class="col-md-4">
                        <label class="form-label">Tiers</label>
                        <select class="select2 form-select" wire:model="third_party">
                            <option value="">Sélectionner un tiers</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">État</label>
                        <input type="text" class="form-control bg-success text-white" value="Ouvert" readonly />
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Visibilité</label>
                        <select class="form-select" wire:model="visibility">
                            <option value="assigned">Contacts assignés</option>
                        </select>
                    </div>

                    <!-- Informations financières -->
                    <div class="col-md-4">
                        <label class="form-label">Statut opportunité</label>
                        <div class="input-group">
                            <select class="form-select" wire:model="opportunity_status">
                                <option value="">Sélectionner</option>
                            </select>
                            <span class="input-group-text">%</span>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Montant opportunité</label>
                        <div class="input-group">
                            <input type="number" class="form-control" wire:model="opportunity_amount" />
                            <span class="input-group-text">MGA</span>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Budget</label>
                        <div class="input-group">
                            <input type="number" class="form-control" wire:model="budget" />
                            <span class="input-group-text">MGA</span>
                        </div>
                    </div>

                    <!-- Date et Description -->
                    <div class="col-md-6">
                        <label class="form-label">Date</label>
                        <input type="date" class="form-control" wire:model="date" value="2025-02-17" />
                    </div>

                    <div class="col-12">
                        <label class="form-label">Description</label>
                        {{-- <div class="editor-toolbar">
                            <!-- Barre d'outils de l'éditeur -->
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fas fa-bold"></i></button>
                                <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fas fa-italic"></i></button>
                                <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fas fa-underline"></i></button>
                                <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fas fa-list"></i></button>
                                <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fas fa-link"></i></button>
                            </div>
                        </div> --}}
                        <textarea class="form-control" wire:model="description" rows="4"></textarea>
                    </div>

                    <!-- Tags et Avancement -->
                    <div class="col-md-6">
                        <label class="form-label">Tags/catégories</label>
                        <input type="text" class="form-control" wire:model="tags" />
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Avancement</label>
                        <select class="form-select" wire:model="progress">
                            <option value="">Sélectionner</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Pied Modal -->
            <div class="modal-footer py-4">
                <button type="button" class="btn btn-label-secondary">
                    <i class="ti ti-x ti-xs me-1"></i>
                    Annuler
                </button>
                <button type="submit" class="btn btn-primary ms-2">
                    <i class="ti ti-device-floppy ti-xs me-1"></i>
                    Créer brouillon
                </button>
            </div>
        </form>
    </div>
</div>