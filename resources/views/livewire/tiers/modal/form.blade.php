<div wire:ignore class="modal fade" id="tierModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <form wire:submit.prevent="save" class="modal-content" id="addNewTierForm">
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
                                    <div class="col-md-6">
                                        <label class="form-label">Nom du tiers</label>
                                        <input type="text" class="form-control" wire:model="name"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Nom court/Alias</label>
                                        <input type="text" class="form-control" wire:model="name_alias"/>
                                    </div>
                                    <!-- <div class="col-md-6">
                                        <label class="form-label">Référence externe</label>
                                        <input type="text" class="form-control" name="ref_ext" />
                                    </div> -->
                                    <div class="col-md-4">
                                        <label class="form-label">Nature de tiers <span class="text-danger">*</span></label>
                                        <select class="select2 form-select" wire:model="client" required>
                                            <option value="">Sélectionner</option>
                                            <option value="1">Client</option>
                                            <option value="2">Prospect</option>
                                            <option value="3">Prospect/Client</option>
                                            <option value="0">Ni prospect, ni client</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Fournisseur <span class="text-danger">*</span></label>
                                        <select class="select2 form-select" wire:model="fournisseur" required>
                                            <option value="">Choisissez</option>
                                            <option value="0">Non</option>
                                            <option value="1">Oui</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Type du tiers <span class="text-danger">*</span></label>
                                        <select class="select2 form-select" wire:model="typent_id" required>
                                            <option value="">Sélectionner</option>
                                            <option value="5">Administration</option>
                                            <option value="100">Autre</option>
                                            <option value="2">Grand compte</option>
                                            <option value="3">PME/MPI</option>
                                            <option value="8">Particulier</option>
                                            <option value="4">TPE</option>
                                        </select>
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
                                        <textarea class="form-control" wire:model="address" rows="2"></textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Code postal</label>
                                        <input type="text" class="form-control" wire:model="zip"/>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Ville</label>
                                        <input type="text" class="form-control" wire:model="town"/>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Pays</label>
                                        <select class="select2 form-select" wire:model="country_id">
                                            <option value="">Sélectionner</option>
                                            <option value="1">France</option>
                                            <option value="2">Belgique</option>
                                            <option value="3">Suisse</option>
                                            <option value="143">Madagascar</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Téléphone</label>
                                        <input type="tel" class="form-control" wire:model="phone"/>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" wire:model="email"/>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Site web</label>
                                        <input type="url" class="form-control" wire:model="url"/>
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
                                    <!-- <div class="col-md-6">
                                        <label class="form-label">N° TVA Intracommunautaire</label>
                                        <input type="text" class="form-control" wire:model="tva_intra"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Capital social</label>
                                        <input type="text" class="form-control" wire:model="capital"/>
                                    </div> -->
                                    <!-- <div class="col-md-6">
                                        <label class="form-label">Effectif</label>
                                        <select class="select2 form-select" wire:model="fk_effectif">
                                            <option value="">Sélectionner</option>
                                            <option value="1">1-9 employés</option>
                                            <option value="2">10-49 employés</option>
                                            <option value="3">50-249 employés</option>
                                            <option value="4">250+ employés</option>
                                        </select>
                                    </div> -->
                                    <div class="col-md-6">
                                        <label class="form-label">Statut</label>
                                        <select class="select2 form-select" wire:model="status">
                                            <option value="1">Actif</option>
                                            <option value="0">Inactif</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Devise</label>
                                        <select class="select2 form-select" wire:model="status">
                                            <option value="1">Euro</option>
                                            <option value="0">Ariary</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Nif</label>
                                        <input type="text" class="form-control" wire:model="nif"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Stat</label>
                                        <input type="text" class="form-control" wire:model="stat"/>
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



