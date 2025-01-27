<div class="container-xxl flex-grow-1 container-p-y">
    <!-- En-tête -->
    <h4 class="fw-bold py-3 mb-4">
        Nouveau contact 
    </h4>
    <div class="card mb-4">
            <form wire:submit.prevent="save" class="modal-content" id="addNewTierForm">
                <!-- En-tête Modal -->
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter un nouveau contact</h5>
                </div>

                <!-- Corps Modal -->
                <div class="modal-body">
                    <div class="row">
                        <!-- Section 1: Informations générales -->
                        <div class="col-12">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label class="form-label">Nom</label>
                                            <input type="text" class="form-control" wire:model="name"/>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Prenom</label>
                                            <input type="text" class="form-control" wire:model="name_alias"/>
                                        </div>
                                        <!-- <div class="col-md-6">
                                            <label class="form-label">Référence externe</label>
                                            <input type="text" class="form-control" name="ref_ext" />
                                        </div> -->
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label class="form-label">Tiers <span class="text-danger">*</span></label>
                                            <select class="select2 form-select" wire:model="client" required placeholder="Sélectionner un tiers">
                                                <option value="">Sélectionner</option>
                                                <option value="1">Client</option>
                                                <option value="2">Prospect</option>
                                                <option value="3">Prospect/Client</option>
                                                <option value="0">Ni prospect, ni client</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label class="form-label">Titre civilité <span class="text-danger">*</span></label>
                                            <select class="select2 form-select" wire:model="fournisseur" required>
                                                <option value=""></option>
                                                <option value="0">Madame</option>
                                                <option value="1">Monsieur</option>
                                                <option value="">Mademoiselle</option>
                                                <option value="">Maître</option>
                                                <option value="">Docteur</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Poste/fonction</label>
                                            <input type="text" class="form-control" wire:model="name_alias"/>
                                        </div>
                                    </div>

                                    <div class="col-8">
                                        <label class="form-label">Adresse</label>
                                        <textarea class="form-control" wire:model="address" rows="2"></textarea>
                                    </div>
                                    <div class="row g-3">
                                        
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
                                            <label class="form-label">Visibilité</label>
                                            <select class="select2 form-select" wire:model="country_id">
                                                <option value="">Partagé</option>
                                                <option value="1">Privé</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Section 2: Informations complémentaires -->
                        <div class="col-12">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="card-header p-3">
                                        <h6 class="card-title mb-0">Informations personnelles</h6>
                                    </div>

                                    <div class="row g-3"> 
                                        <div class="col-md-4">
                                            <label class="form-label">Date de naissance</label>
                                            <input type="date" class="form-control" wire:model="name"/>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center"> 
                                        <div class="col-auto">
                                            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                                <i class="ti ti-x ti-xs me-1"></i>
                                                Annuler
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="ti ti-device-floppy ti-xs me-1"></i>
                                                Ajouter
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </div>
        </form>
    </div>
</div>
