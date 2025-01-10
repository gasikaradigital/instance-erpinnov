<div wire:ignore class="modal fade" id="tierModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <form class="modal-content" id="addNewTierForm">
            <!-- En-tête Modal -->
            <div class="modal-header">
                <h5 class="modal-title">Ajouter un nouveau tiers</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

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
                                    <div class="col-12">
                                        <label class="form-label">Raison Sociale <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="nom" required />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Nom court/Alias</label>
                                        <input type="text" class="form-control" name="name_alias" />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Référence externe</label>
                                        <input type="text" class="form-control" name="ref_ext" />
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Type de tiers <span class="text-danger">*</span></label>
                                        <select class="select2 form-select" name="fk_typent" required>
                                            <option value="">Sélectionner</option>
                                            <option value="1">Client</option>
                                            <option value="2">Prospect</option>
                                            <option value="3">Fournisseur</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Code client</label>
                                        <input type="text" class="form-control" name="code_client" />
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Code fournisseur</label>
                                        <input type="text" class="form-control" name="code_fournisseur" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section 2: Coordonnées -->
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-header p-3">
                                <h6 class="card-title mb-0">2. Coordonnées</h6>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label">Adresse</label>
                                        <textarea class="form-control" name="address" rows="2"></textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Code postal</label>
                                        <input type="text" class="form-control" name="zip" />
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Ville</label>
                                        <input type="text" class="form-control" name="town" />
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Pays</label>
                                        <select class="select2 form-select" name="fk_pays">
                                            <option value="">Sélectionner</option>
                                            <option value="1">France</option>
                                            <option value="2">Belgique</option>
                                            <option value="3">Suisse</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Téléphone</label>
                                        <input type="tel" class="form-control" name="phone" />
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" />
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Site web</label>
                                        <input type="url" class="form-control" name="url" />
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
                                    <div class="col-md-6">
                                        <label class="form-label">N° TVA Intracommunautaire</label>
                                        <input type="text" class="form-control" name="tva_intra" />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Capital social</label>
                                        <input type="text" class="form-control" name="capital" />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Effectif</label>
                                        <select class="select2 form-select" name="fk_effectif">
                                            <option value="">Sélectionner</option>
                                            <option value="1">1-9 employés</option>
                                            <option value="2">10-49 employés</option>
                                            <option value="3">50-249 employés</option>
                                            <option value="4">250+ employés</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Statut</label>
                                        <select class="select2 form-select" name="status">
                                            <option value="1">Actif</option>
                                            <option value="0">Inactif</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pied Modal -->
            <div class="modal-footer">
                <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal">
                    <i class="ti ti-x ti-xs me-1"></i>
                    Annuler
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="ti ti-device-floppy ti-xs me-1"></i>
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
</div>
