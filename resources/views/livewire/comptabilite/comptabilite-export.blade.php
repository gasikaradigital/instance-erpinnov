<div class="container-flux p-6">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header  text-white py-0">
                    <h5 class="mb-0">Exporter les documents sources</h5>
                </div>
                <div class="card-body">
                   

                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">Période d'analyse:</label>
                            <div class="d-flex align-items-center mb-3">
                                <input type="date" value="20/03/2023" class="form-control w-25" >
                                <button class="btn btn-outline-secondary ms-2" type="button">Maintenant</button>
                                <span class="mx-3">-</span>
                                <input type="date" value="20/03/2023" class="form-control w-25" >
                                <button class="btn btn-outline-secondary ms-2" type="button">Maintenant</button>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="d-flex">
                                <div class="form-check me-4">
                                    <input class="form-check-input" type="checkbox" id="factures" checked>
                                    <label class="form-check-label" for="factures">
                                        Factures
                                    </label>
                                </div>
                                <div class="form-check me-4">
                                    <input class="form-check-input" type="checkbox" id="factures_fournisseur" checked>
                                    <label class="form-check-label" for="factures_fournisseur">
                                        Factures fournisseur
                                    </label>
                                </div>
                                <div class="form-check me-4">
                                    <input class="form-check-input" type="checkbox" id="charges_fiscales" checked>
                                    <label class="form-check-label" for="charges_fiscales">
                                        Charges fiscales ou sociales
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="paiement_divers" checked>
                                    <label class="form-check-label" for="paiement_divers">
                                        Paiement divers
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-12 text-end">
                            <button type="button" class="btn btn-primary px-4">RECHERCHER</button>
                        </div>
                    </div>

                    <hr>

                    <div class="mt-4 mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <span>20/03/2023 - 20/03/2023</span>
                            <button class="btn btn-sm btn-outline-secondary" type="button">TÉLÉCHARGEMENT</button>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr class="bg-light">
                                    <th>Type</th>
                                    <th>Date</th>
                                    <th>Date échéance</th>
                                    <th>Réf.</th>
                                    <th>Document</th>
                                    <th>Payé</th>
                                    <th>Total HT</th>
                                    <th>Total TTC</th>
                                    <th>Total TVA</th>
                                    <th>Tiers</th>
                                    <th>Code</th>
                                    <th>Pays</th>
                                    <th>Numéro de TVA</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="13" class="text-center py-3">Aucun enregistrement trouvé</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap 5 JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>