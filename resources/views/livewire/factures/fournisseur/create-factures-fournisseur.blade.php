<div class="container">
    <div class="card shadow-lg p-4">
        <h4 class="mb-4">Créer une Facture fournisseur</h4>
        <form action="#" method="POST">
            @csrf
            <div class="row">
                <!-- Colonne 1 -->
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Fournisseur</label>
                        <select class="form-select">
                            <option>Sélectionner un fournisseur</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Ref. facture fournisseur</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Type</label>
                        <div class="d-flex flex-wrap">
                            <div class="form-check me-3">
                                <input class="form-check-input" type="radio" name="type" checked>
                                <label class="form-check-label">Facture standard</label>
                            </div>
                            <div class="form-check me-3">
                                <input class="form-check-input" type="radio" name="type">
                                <label class="form-check-label">Facture d'acompte</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="type">
                                <label class="form-check-label">Facture d'avoir</label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Libellé</label>
                        <input type="text" class="form-control">
                    </div>
                </div>

                <!-- Colonne 2 -->
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Date de facturation</label>
                        <input type="date" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Condition de règlement</label>
                        <select class="form-select">
                            <option>Sélectionner</option>
                            <option value="*">A réception</option>
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

                    <div class="mb-3">
                        <label class="form-label fw-bold">Mode de règlement</label>
                        <select class="form-select">
                            <option>Sélectionner</option>
                            <option value="*">Carte bancaire</option>
                            <option value="">Chèque</option>
                            <option value="">Espèce</option>
                            <option value="">Ordre de prélèvement</option>
                            <option value="">Virement bancaire</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Compte bancaire</label>
                        <select class="form-select">
                            <option>Aucun compte bancaire actif</option>
                        </select>
                    </div>
                </div>

                <!-- Colonne 3 -->
                <div class="col-md-4"> 
                    <div class="mb-3">
                        <label class="form-label fw-bold">Projet</label>
                        <select class="form-select">
                            <option>Sélectionner un projet</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Incoterms</label>
                        <select class="form-select">
                            <option>Sélectionner</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Modèle de document</label>
                        <select class="form-select">
                            <option>Sponge</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Devise</label>
                        <select class="form-select">
                            <option>Euros (€)</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Note (publique)</label>
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                </div>
            </div>

            <div class="text-center mt-3">
                <button type="submit" class="btn btn-primary w-50">Enregistrer la facture fournisseur</button>
            </div>
        </form>
    </div>
</div>