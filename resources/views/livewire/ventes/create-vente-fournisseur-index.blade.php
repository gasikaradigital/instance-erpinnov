<div class="container-xxl flex-grow-1">
    <!-- En-tête -->
    <h4 class="fw-bold py-3 mb-2">Nouvelle demande de prix</h4>
    <div class="card mb-4 col-12">
        <form wire:submit.prevent="save" class="modal-content">

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
                                    <div class="col-md-3">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label">Réf. <span class="text-danger">*</span></label>
                                            <i class="fas fa-info-circle"></i>
                                        </div>
                                        <input type="text" class="form-control" wire:model="ref" value="Brouillon" readonly />
                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-label">Fournisseur <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <select class="select2 form-select" wire:model="fournisseur">
                                                <option value="">Sélectionner un tiers</option>
                                            </select>
                                            <button class="btn btn-outline-primary" type="button">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>

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
                                   
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section 2: Détails de livraison -->
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-header p-3">
                                <h6 class="card-title mb-0">2. Détails de livraison</h6>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-3">
                                        <label class="form-label">Méthode d'expédition</label>
                                        <select class="form-select" wire:model="shipping_method">
                                            <option value="">Sélectionner</option>
                                            <option value="">Generic de transport service</option>
                                            <option value="">in-Store Collection</option>
                                            <option value="">UPS</option>
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-label">Date de livraison</label>
                                        <div class="input-group">
                                            <input type="date" class="form-control" wire:model="date_livraison" id="dateLivraison">
                                            <button class="btn btn-outline-secondary" type="button" onclick="setCurrentDate()">
                                                Maintenant
                                            </button>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-label">Modèle de document</label>
                                        <select class="select2 form-select" wire:model="modele">
                                            <option value="aurore">aurore</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section 3: Informations complémentaires -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header p-3">
                                <h6 class="card-title mb-0">3. Informations complémentaires</h6>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-3">
                                        <label class="form-label">Projet</label>
                                        <div class="input-group">
                                            <select class="select2 form-select" wire:model="projet">
                                                <option value="">Sélectionner</option>
                                            </select>
                                            <button class="btn btn-outline-primary" type="button">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-label">Devise</label>
                                        <select class="select2 form-select" wire:model="devise">
                                            <option value="EUR">Euros (€)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pied Modal -->
            <div class="modal-footer py-4">
                <button type="reset" class="btn btn-label-secondary">
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
<script>
    function setCurrentDate() {
        // Créer un nouvel objet Date
        const now = new Date();
        
        // Formater la date au format YYYY-MM-DD pour l'input type="date"
        const year = now.getFullYear();
        const month = String(now.getMonth() + 1).padStart(2, '0');
        const day = String(now.getDate()).padStart(2, '0');
        const formattedDate = `${year}-${month}-${day}`;
        
        // Mettre à jour la valeur du champ date
        const dateInput = document.getElementById('dateLivraison');
        dateInput.value = formattedDate;
        
        // Déclencher l'événement input pour Livewire
        dateInput.dispatchEvent(new Event('input'));
        
        // Si vous utilisez Livewire, vous pouvez également émettre un événement
        Livewire.emit('dateUpdated', formattedDate);
    }
</script>