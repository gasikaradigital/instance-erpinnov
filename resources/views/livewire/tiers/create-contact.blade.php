<div class="container-xxl flex-grow-1 {{ route('create-contact') }}">
    <!-- En-tête -->
    <h4 class="fw-bold py-3 mb-2 ">Nouveau contact </h4>
    <div class="card mb-4 col-12 ">
        <form wire:submit.prevent="save" class="modal-content" id="addNewContactForm">
            <!-- En-tête Modal -->
            <div class="modal-header py-2 mx-2">
                <h5 class="modal-title">Ajouter un nouveau contact</h5>
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
                                    <div class="col-md-2">
                                        <div class="d-flex justify-content-between ">
                                        <label class="form-label">Titre de civilité <span
                                                class="text-danger">*</span></label>
                                                <i class="fas fa-info-circle" ></i></div>
                                        <select class="select2 form-select" wire:model="typent_id" required>
                                            <option value="">Sélectionner</option>
                                            <option value="5">Madame</option>
                                            <option value="100">Monsieur</option>
                                            <option value="2">Mademoiselle</option>
                                            <option value="3">Maître</option>
                                            <option value="8">Docteur</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label">Nom </label>
                                        <input type="text" class="form-control" wire:model="name" />
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label">Prénoms</label>
                                        <input type="text" class="form-control" wire:model="surname" />
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label for="birthdate" class="form-label">Date de naissance</label>
                                            <input type="date" class="form-control" id="birthdate" name="birthdate" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label">Tiers <span
                                                class="text-danger">*</span></label>
                                        <select class="select2 form-select" wire:model="contact" required>
                                            <option value="">Sélectionner un tiers</option>
                                            <option value=""></option>
                                        </select>
                                    </div>                         
                                    <div class="col-md-2">
                                        <label class="form-label">Poste/fonction</label>
                                        <input type="text" class="form-control" wire:model="poste" />
                                    </div>
                                    <div class="col-md-2">
                                        <i class="fas fa-tag"></i>
                                        <label class="form-label">Tags/catégories.</label>
                                        <input type="text" class="form-control" wire:model="tags" />
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
                                    
                                    <div class="col-md-1">
                                        <label class="form-label">Adresse</label>
                                        <input type="text" class="form-control" wire:model="address" />
                                        
                                    </div>
                                    <div class="col-md-1">
                                        <label class="form-label">Code</label>
                                        <input type="text" class="form-control" wire:model="zip" />
                                        
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <label class="form-label">Ville</label>
                                        <input type="text" class="form-control" wire:model="town" />
                                    </div>
                                    <div class="col-md-2">
                                        <div class="d-flex justify-content-between">
                                        <label class="form-label">Pays</label>
                                        <i class="fas fa-info-circle" style="margin-left: 135px;"></i>
                                        </div>
                                        <select class="select2 form-select" wire:model="country_id">
                                            <option value="">Sélectionner</option>
                                            <option value="1">France</option>
                                            <option value="2">Belgique</option>
                                            <option value="3">Suisse</option>
                                            <option value="143">Madagascar</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <i class="fas fa-phone"></i>
                                        <label class="form-label">Tél pro.</label>
                                        <input type="tel" class="form-control" wire:model="phonePro" />
                                    </div>
                                    <div class="col-md-2">
                                        <i class="fas fa-phone"></i>
                                        <label class="form-label">Tél perso</label>
                                        <input type="tel" class="form-control" wire:model="phonePers" />
                                    </div>
                                    <div class="col-md-2">
                                        <i class="fas fa-mobile-alt"></i>
                                        <label class="form-label">Tél portable</label>
                                        <input type="tel" class="form-control" wire:model="phone" />
                                    </div>
                                    <div class="col-md-2">
                                        <i class="fas fa-at"></i>
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" wire:model="email" />
                                    </div>
                                    <div class="col-md-2">
                                    
                                        <label class="form-label">Facebook</label>
                                        <input type="email" class="form-control" wire:model="facebook" />
                                    </div>
                                    <div class="col-md-2">
                                        <i class="fas fa-external-link-alt"></i>
                                        <label class="form-label">Site web</label>
                                        <input type="url" class="form-control" wire:model="url" />
                                    </div>
                                    <div class="col-md-2">
                                        <div class="d-flex justify-content-between">
                                        <label class="form-label">Département / Canton</label>
                                        <i class="fas fa-info-circle" style="margin-left: 35px;"></i>
                                        </div>
                                        <div class="d-flex gap-2">
                                            <select class="select2 form-select" wire:model="departement">
                                                <option value=""></option>
                                                <option value=""></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <i class="fas fa-fax"></i>
                                        <label class="form-label">Fax</label>
                                        <input type="text" class="form-control" wire:model="fax"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header p-3">
                                <h6 class="card-title mb-0">3. Informations complémentaires</h6>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-2">
                                            <label class="form-label">Visibilité</label>
                                            <select class="select2 form-select" wire:model="visibility">
                                                <option value="">Partagé</option>
                                                <option value="">Privé</option>
                                            </select>
                                    </div>
                                </div>
                            </div>   
            </div>
            <!-- Pied Modal -->
            <div class="modal-footer py-4">
                <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal">
                    <i class="ti ti-x ti-xs me-1"></i>
                    Annuler
                </button>
                <button type="submit" class="btn btn-primary ms-2">
                    <i class="ti ti-device-floppy ti-xs me-1"></i>
                    Enregistrer
                </button>
            </div>

        </form>
    </div>
</div>
