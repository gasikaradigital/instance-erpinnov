{{-- Nouveau vente --}}
<div class="container-flux p-6">
    <div class="accordion" id="mainAccordionGroup">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingVente">
                <button class="accordion-button bg-primary text-white" type="button" 
                        data-bs-toggle="collapse" 
                        data-bs-target="#collapseVente" 
                        aria-expanded="true" 
                        aria-controls="collapseVente">
                    Nouveau vente
                </button>
            </h2>
            <div id="collapseVente" 
                 class="accordion-collapse collapse show" 
                 aria-labelledby="headingVente" 
                 data-bs-parent="#mainAccordionGroup">
                <div class="accordion-body p-0">
                    <form method="POST" action="javascript:void(0)">
                        @csrf
                        <div class="card shadow-sm">
                            <div class="card-body mt-2">
                                <!-- Section 1: Informations générales -->
                                <div class="row mb-4">
                                    <div class="col-md-3 mb-3">
                                        <label for="ref" class="form-label">Réf.</label>
                                        <input type="text" class="form-control" id="ref" name="ref" value="Brouillon">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="ref_client" class="form-label">Réf. client</label>
                                        <input type="text" class="form-control" id="ref_client" name="ref_client">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="client" class="form-label">Client *</label>
                                        <select class="form-select" id="client" name="client" required>
                                            <option value="">Sélectionner un tiers</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="date_proposition" class="form-label">Date de proposition</label>
                                        <input type="date" class="form-control" id="date_proposition" name="date_proposition">
                                    </div>
                                    <div class="col-md-1 mb-3">
                                        <label for="validite" class="form-label">Validité</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="validite" name="validite">
                                            <span class="input-group-text">jours</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Section 2: Conditions de ventes -->
                                <div class="row mb-4">
                                    <div class="col-md-3 mb-3">
                                        <label for="conditions_reglement" class="form-label">Conditions de règlement</label>
                                        <select class="form-select" id="conditions_reglement" name="conditions_reglement">
                                            <option value="">Sélectionner</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="mode_reglement" class="form-label">Mode de règlement</label>
                                        <select class="form-select" id="mode_reglement" name="mode_reglement">
                                            <option value="">Sélectionner</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="origine" class="form-label">Origine</label>
                                        <select class="form-select" id="origine" name="origine">
                                            <option value="">Sélectionner</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="devise" class="form-label">Devise</label>
                                        <select class="form-select" id="devise" name="devise">
                                            <option value="">Sélectionner</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Section 3: Livraison -->
                                <div class="row mb-4">
                                    <div class="col-md-3 mb-3">
                                        <label for="methode_expedition" class="form-label">Méthode d'expédition</label>
                                        <select class="form-select" id="methode_expedition" name="methode_expedition">
                                            <option value="">Sélectionner</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="delai_livraison" class="form-label">Délai de livraison</label>
                                        <select class="form-select" id="delai_livraison" name="delai_livraison">
                                            <option value="">Sélectionner</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="date_livraison" class="form-label">Date de livraison</label>
                                        <input type="date" class="form-control" id="date_livraison" name="date_livraison">
                                    </div>
                                </div>

                                <!-- Section 4: Informations complémentaires -->
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="projet" class="form-label">Projet</label>
                                        <select class="form-select" id="projet" name="projet">
                                            <option value="">Sélectionner</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="modele_document" class="form-label">Modèle de document</label>
                                        <select class="form-select" id="modele_document" name="modele_document">
                                            <option value="cyan">cyan</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="note_publique" class="form-label">Note (publique)</label>
                                        <textarea class="form-control" id="note_publique" name="note_publique" rows="1"></textarea>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="note_privee" class="form-label">Note (privée)</label>
                                        <textarea class="form-control" id="note_privee" name="note_privee" rows="1"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer text-end">
                                <button type="button" class="btn btn-secondary" onclick="window.history.back()">Annuler</button>
                                <button type="submit" class="btn btn-primary">Créer brouillon</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
   


{{-- Nouveau commande --}}

@include('livewire.ventes.commande-index')
@include('livewire.ventes.create-facture-index')

</div>
</div>