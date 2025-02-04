<div class="container">
    <div class="card shadow-lg p-4">
        <h4 class="mb-4">Créer une Facture</h4>
        <form action="#" method="POST">
            @csrf
            <div class="row">
                <!-- Colonne 1 -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Client</label>
                        <select class="form-select">
                            <option>Sélectionner un client</option>
                        </select>
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
                                <label class="form-check-label">Facture de remplacement</label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Date de facturation</label>
                        <input type="date" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Mode de règlement</label>
                        <select class="form-select">
                            <option>Sélectionner</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Compte bancaire</label>
                        <select class="form-select">
                            <option>Aucun compte bancaire actif</option>
                        </select>
                    </div>
                </div>

                <!-- Colonne 2 -->
                <div class="col-md-6">
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
                <button type="submit" class="btn btn-primary w-50">Enregistrer la facture</button>
            </div>
        </form>
    </div>
</div>