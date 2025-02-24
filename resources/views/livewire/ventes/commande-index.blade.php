
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingCommande">
                <button class="accordion-button bg-secondary collapsed text-white" type="button" 
                        data-bs-toggle="collapse" 
                        data-bs-target="#collapseCommande" 
                        aria-expanded="false" 
                        aria-controls="collapseCommande">
                    Nouveau commande
                </button>
            </h2>
            <div id="collapseCommande" 
                 class="accordion-collapse collapse" 
                 aria-labelledby="headingCommande" 
                 data-bs-parent="#mainAccordionGroup">
                <div class="accordion-body p-0">
                    <form method="POST" action="javascript:void(0)">
                        @csrf
                        <div class="card shadow-sm">
                            <div class="card-body mt-2">
                                <!-- Section 1: Informations générales -->
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <label class="form-label">Réf.</label>
                                        <input disabled type="text" class="form-control" placeholder="Brouillon" wire:model="reference" />
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Réf. client</label>
                                        <input type="text" class="form-control" wire:model="client_reference" />
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Client <span class="text-danger">*</span></label>
                                        <select class="select2 form-select" wire:model="client_id" required>
                                            <option value="">Sélectionner un tiers</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label">Date de proposition</label>
                                        <input type="date" class="form-control" wire:model="proposal_date" />
                                    </div>
                                    <div class="col-md-1">
                                        <label class="form-label">Durée de validité</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" wire:model="validity_duration" />
                                            <span class="input-group-text">jours</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Section 2: Conditions de ventes -->
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <label class="form-label">Conditions de règlement</label>
                                        <select class="form-select" wire:model="payment_terms">
                                            <option value="">Sélectionner</option>
                                            <option value="">A réception</option>
                                            <option value="">30 jours</option>
                                            <option value="">30 jours fin de mois</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Mode de règlement</label>
                                        <select class="form-select" wire:model="payment_method">
                                            <option value="">Sélectionner</option>
                                            <option value="">Carte bancaire</option>
                                            <option value="">Chèque</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Origine</label>
                                        <select class="form-select" wire:model="origin">
                                            <option value="">Sélectionner</option>
                                            <option value="">Bouche à oreille</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Devise</label>
                                        <select class="form-select" wire:model="currency">
                                            <option value="">Sélectionner</option>
                                            <option value="MGA">Ariary (MGA)</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Section 3: Livraison -->
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <label class="form-label">Méthode d'expédition</label>
                                        <select class="form-select" wire:model="shipping_method">
                                            <option value="">Sélectionner</option>
                                            <option value="">Generic de transport service</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Délai de livraison</label>
                                        <select class="form-select" wire:model="delivery_time">
                                            <option value="">Sélectionner</option>
                                            <option value="">Immédiate</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Date de livraison</label>
                                        <input type="date" class="form-control" wire:model="delivery_date" />
                                    </div>
                                </div>

                                <!-- Section 4: Informations complémentaires -->
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
                                    <div class="col-md-2">
                                        <label class="form-label">Déjà dépensé</label>
                                        <select class="form-select" wire:model="">
                                            <option value="">Sélectionner</option>
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
