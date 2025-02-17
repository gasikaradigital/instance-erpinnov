<div class="container-xxl flex-grow-1">
    <!-- En-tête -->
    <h4 class="fw-bold py-3 mb-2">Nouvelle proposition de ventes</h4>
    <div class="card mb-4 col-12">
        <form wire:submit.prevent="save" class="modal-content" id="newCommercialProposalForm">
            <!-- En-tête Modal -->
            

            <!-- Corps Modal -->
            <div class="modal-body">
                <div class="row">
                    <!-- Section 1: Informations générales -->
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-header p-3">
                                <h6 class="card-title mb-0">1. Informations générales</h6>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-2">
                                        <label class="form-label">Réf.</label>
                                        <input disabled type="text" class="form-control" placeholder="Brouillon" wire:model="reference" />
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label">Réf. client</label>
                                        <input type="text" class="form-control" wire:model="client_reference" />
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label">Client <span class="text-danger">*</span></label>
                                        <select class="select2 form-select" wire:model="client_id" required>
                                            <option value="">Sélectionner un tiers</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label">Date de proposition</label>
                                        <input type="date" class="form-control" wire:model="proposal_date" />
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label">Durée de validité</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" wire:model="validity_duration" />
                                            <span class="input-group-text">jours</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section 2: Conditions de ventes -->
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-header p-3">
                                <h6 class="card-title mb-0">2. Conditions de ventes</h6>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-3">
                                        <label class="form-label">Conditions de règlement</label>
                                        <select class="form-select" wire:model="payment_terms">
                                            <option value="">Sélectionner</option>
                                            <option value="">A réception</option>
                                            <option value="">30 jours</option>
                                            <option value="">30 jours fin de mois</option>
                                            <option value="">60 jours</option>
                                            <option value="">60 jours fin de mois</option>
                                            <option value="">A commande</option>
                                            <option value="">A livraison</option>
                                            <option value="">50/50</option>
                                            <option value="">10 jours</option>
                                            <option value="">10 jours fin de mois</option>
                                            <option value="">14 jours</option>
                                            <option value="">14 jours fin de mois</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Mode de règlement</label>
                                        <select class="form-select" wire:model="payment_method">
                                            <option value="">Sélectionner</option>
                                            <option value="">Carte bancaire</option>
                                            <option value="">Chèque</option>
                                            <option value="">Espèce</option>
                                            <option value="">Ordre de prélèvement</option>
                                            <option value="">Virement bancaire</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Origine</label>
                                        <select class="form-select" wire:model="origin">
                                            <option value="">Sélectionner</option>
                                            <option value="">Bouche à oreille</option>
                                            <option value="">Campagne Publipostage</option>
                                            <option value="">Campagne Téléphonique</option>
                                            <option value="">Campagne d'emailing</option>
                                            <option value="">Contact de vente</option>
                                            <option value="">Contact en boutique</option>
                                            <option value="">Employé</option>
                                            <option value="">Incoming contact of a customer</option>
                                            <option value="">Internet</option>
                                            <option value="">Parrainage/Sponsoring</option>
                                            <option value="">Partenaire</option>
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
                            </div>
                        </div>
                    </div>

                    <!-- Section 3: Livraison -->
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-header p-3">
                                <h6 class="card-title mb-0">3. Livraison</h6>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label class="form-label">Méthode d'expédition</label>
                                        <select class="form-select" wire:model="shipping_method">
                                            <option value="">Sélectionner</option>
                                            <option value="">Generic de transport service</option>
                                            <option value="">in-Store Collection</option>
                                            <option value="">UPS</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Délai de livraison (après commande)</label>
                                        <select class="form-select" wire:model="delivery_time">
                                            <option value="">Sélectionner</option>
                                            <option value="">Immédiate</option>
                                            <option value="">1 jour</option>
                                            <option value="">2 jours</option>
                                            <option value="">3 jours</option>
                                            <option value="">4 jours</option>
                                            <option value="">5 jours</option>
                                            <option value="">1 semaine</option>
                                            <option value="">2 semaines</option>
                                            <option value="">3 semaines</option>
                                            <option value="">4 weeks</option>
                                            <option value="">5 weeks</option>
                                            <option value="">6 weeks</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Date de livraison</label>
                                        <input type="date" class="form-control" wire:model="delivery_date" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section 4: Informations complémentaires -->
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-header p-3">
                                <h6 class="card-title mb-0">4. Informations complémentaires</h6>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-2">
                                        <div class="d-flex justify-content-between ">
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
                                    <div class="col-12">
                                        <label class="form-label">Note (publique)</label>
                                        <textarea class="form-control" wire:model="public_note" rows="3"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Note (privée)</label>
                                        <textarea class="form-control" wire:model="private_note" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
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