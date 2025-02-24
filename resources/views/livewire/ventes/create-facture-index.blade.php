
<div class="accordion-item">
    <h2 class="accordion-header" id="headingFacture">
        <button class="accordion-button bg-success collapsed text-white" type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#collapseFacture" 
                aria-expanded="false" 
                aria-controls="collapseFacture">
            Nouvelle facture
        </button>
    </h2>
    <div id="collapseFacture" 
         class="accordion-collapse collapse" 
         aria-labelledby="headingFacture" 
         data-bs-parent="#mainAccordionGroup">
        <div class="accordion-body p-0">
            <form method="POST" action="javascript:void(0)">
                @csrf
                <div class="card shadow-sm">
                    <div class="card-body mt-2">
                        <!-- Section 1: Informations générales -->
                        <div class="row mb-3">
                            <div class="col-md-2">
                                <label class="form-label">Client</label>
                                <select class="select2 form-select" wire:model="" required>
                                    <option value="">Sélectionner un tiers</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Type <span class="text-danger">*</span></label>
                                <select class="select2 form-select" wire:model="" required>
                                    <option value="">Sélectionner</option>
                                    <option value="">Facture standard</option>
                                    <option value="">Facture d'acompte</option>
                                    <option value="">Facture de remplacement</option>
                                    <option value="">Facture avoir</option>
                                    <option value="">Facture modèle</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Date de facturation</label>
                                <input type="date" class="form-control" wire:model="" />
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Conditions de règlement</label>
                                <select class="form-select" wire:model="payment_terms">
                                    <option value="">Sélectionner</option>
                                    <option value="">A réception</option>
                                    <option value="">30 jours</option>
                                    <option value="">30 jours fin de mois</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Mode de règlement</label>
                                <select class="form-select" wire:model="payment_method">
                                    <option value="">Sélectionner</option>
                                    <option value="">Carte bancaire</option>
                                    <option value="">Chèque</option>
                                </select>
                            </div>
                             
                            <div class="col-md-2">
                                <label class="form-label">Compte bancaire</label>
                                <input type="text" class="form-control" wire:model="" />
                            </div>
                           
                        </div>

                        <!-- Section 2: Conditions de ventes -->
                        <div class="row mb-3 ">
                          
                            <div class="col-md-2">
                                <label class="form-label">Incoterms</label>

                                <div class="d-flex gap-2">

                                    <input type="text" class="form-control" wire:model="location_incoterms" />
                                    <select class="select2 form-select" wire:model="fk_incoterms">
                                        <option value="">Sélectionner</option>
                                        <option value="5">CFR</option>
                                        <option value="6">CIF</option>
                                        <option value="8">CIP</option>
                                        <option value="7">CPT</option>
                                        <option value="10">DAP</option>
                                        <option value="9">DAT</option>
                                        <option value="11">DDP</option>
                                        <option value="12">DPU</option>
                                        <option value="1">EXW</option>
                                        <option value="3">FAS</option>
                                        <option value="2">FCA</option>
                                        <option value="4">FOB</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Devise</label>
                                <select class="form-select" wire:model="currency">
                                    <option value="">Sélectionner</option>
                                    <option value="MGA">Ariary (MGA)</option>
                                </select>
                            </div>
                        </div>

                        <!-- Section 3: Informations complémentaires -->
                        <div class="row mb-3">
                            <div class="col-md-2">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label">Projet</label>
                                    <button type="button" class="btn btn-link p-0" data-bs-toggle="tooltip" title="Nouveau projet">
                                        <a href="{{ route('new-opportunity') }}"><i class="fas fa-plus-circle"></i></a>
                                    </button>
                                </div>
                                <select class="form-select" wire:model="project_id">
                                    <option value="">Sélectionner</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Modèle de document</label>
                                <select class="form-select" wire:model="document_template">
                                    <option value="cyan">cyan</option>
                                </select>
                            </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Note (publique)</label>
                                    <textarea class="form-control" wire:model="public_note" rows="1"></textarea>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Note (privée)</label>
                                    <textarea class="form-control" wire:model="private_note" rows="1"></textarea>
                                </div>
                        </div>

                    </div>

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
                </div>
            </form>
        </div>
    </div>
</div>
