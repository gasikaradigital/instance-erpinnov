<div class="container-xxl flex-grow-1">
    <!-- En-tête -->
    <h4 class="fw-bold py-3 mb-2 ">
        Nouveau tiers
    </h4>
    <div class="card mb-4 col-12 ">
        <form wire:submit.prevent="save" class="modal-content" id="addNewTierForm">
            <!-- En-tête Modal -->
            <div class="modal-header py-2 mx-2">
                <h5 class="modal-title">Ajouter un nouveau tiers</h5>
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
                                        <label class="form-label">Nom du tiers</label>
                                        <input type="text" class="form-control" wire:model="name" />
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label">Nom court/Alias</label>
                                        <input type="text" class="form-control" wire:model="name_alias" />
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label">Nature de tiers <span
                                                class="text-danger">*</span></label>
                                        <select class="select2 form-select" wire:model="client" required>
                                            <option value=""></option>
                                            <option value="1">Client</option>
                                            <option value="2">Prospect</option>
                                            <option value="0">Ni client, ni prospect</option>
                                        </select>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label">
                                                Type du tiers <span class="text-danger">*</span>
                                            </label>
                                            <i class="fas fa-info-circle"></i>
                                        </div>
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
                                    <div class="col-md-2">
                                        <label class="form-label">Fournisseur <span class="text-danger">*</span></label>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="form-check mb-0">

                                                <input type="radio" id="fournisseur-oui" class="form-check-input" value="1" wire:model="fournisseur" checked>

                                                <label class="form-check-label" for="fournisseur-oui">Oui</label>
                                            </div>
                                            <div class="form-check mb-0">
                                                <input type="radio" id="fournisseur-non" class="form-check-input"
                                                    value="0" wire:model="fournisseur">
                                                <label class="form-check-label" for="fournisseur-non">Non</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2 d-flex flex-column">{{-- à modifier aprèS --}}
                                        <label class="form-label">Assujetti à la TVA</label>
                                        <div class="form-check">

                                            <input type="checkbox" class="form-check-input" wire:model="tva_assuj"/>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label">Identité professionnel 1</label>
                                        <input type="text" class="form-control" wire:model="idprof1" />
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label">Identité professionnel 2</label>
                                        <input type="text" class="form-control" wire:model="idprof2" />
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label">Identité professionnel 3</label>
                                        <input type="text" class="form-control" wire:model="idprof3" />
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label">Numéro TVA</label>
                                        <input type="text" class="form-control" wire:model="tva_intra" />
                                    </div>
                                    <div class="col-md-2">
                                        <div class="d-flex justify-content-between ">
                                        <label class="form-label">Effectifs</label>
                                        <i class="fas fa-info-circle" ></i></div>
                                        <select class="select2 form-select" wire:model="effectif_id">

                                            <option value=""></option>
                                            <option value="1">1 - 5</option>
                                            <option value="2">6 - 10</option>
                                            <option value="3">11 - 50</option>
                                            <option value="4">51 - 100</option>
                                            <option value="5">101 - 500</option>
                                            <option value="6">> 500</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="d-flex justify-content-between ">

                                            <label class="form-label">Type d'entité légale</label>
                                            <i class="fas fa-info-circle"></i>
                                        </div>
                                        <select class="select2 form-select" wire:model="typeEntite">
                                            <option value=""></option>
                                            <option value=""></option>
                                        </select>

                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label">Capital (Euros)</label>
                                        <input type="text" class="form-control" wire:model="capital" />
                                    </div>
                                    <div class="col-md-2">
                                        <i class="fas fa-tag"></i>
                                        <label class="form-label">Tags/catégories clients/prosp.</label>
                                        <input type="text" class="form-control" wire:model="tags" />
                                    </div>
                                    <div class="col-md-2">
                                        <i class="fas fa-tag"></i>
                                        <label class="form-label">Tags/catégories fournisseurs</label>
                                        <input type="text" class="form-control" wire:model="tagsFournisseur" />
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label">Maison Mère</label>
                                        @if(count($data ?? []) > 0)
                                        <select class="select2 form-select" wire:model="parent">
                                            @foreach($data as $tier)
                                                <option value="{{ $tier->id }}">{{ $tier->name }}</option>
                                            @endforeach
                                        </select>
                                        @endif
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label">Assigner des commerciaux</label>
                                        <input type="text" class="form-control" wire:model="maisonMere" />
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label">Logo</label>
                                        <input type="file" class="form-control" wire:model="logo" />
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
                                    <div class="col-md-2">
                                        <label class="form-label">Adresse</label>
                                        <input type="text" class="form-control" wire:model="address" />
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label">Code postal</label>
                                        <input type="text" class="form-control" wire:model="zip" />
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label">Ville</label>
                                        <input type="text" class="form-control" wire:model="town" />
                                    </div>
                                    <div class="col-md-2">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label">Pays</label>
                                            <i class="fas fa-info-circle"></i>
                                        </div>
                                        <select class="select2 form-select" id="country" onchange="toggleFields()">
                                            <option value="">Sélectionner</option>
                                            <option value="France">France</option>
                                            <option value="Belgique">Belgique</option>
                                            <option value="Suisse">Suisse</option>
                                            <option value="Madagascar">Madagascar</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <i class="fas fa-phone"></i>
                                        <label class="form-label">Téléphone</label>
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
                                        <input type="text" class="form-control" wire:model="url" />
                                    </div>
                                    <div class="col-md-2">
                                        {{-- <i class="fas fa-map-marked-alt"></i> --}}
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label">Département / Canton</label>
                                            <i class="fas fa-info-circle"></i>
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
                                        <input type="text" class="form-control" wire:model="fax" />
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
                                    <div class="col-md-2">
                                        <label class="form-label">Statut</label>
                                        <select class="select2 form-select" wire:model="status">
                                            <option value="1">Actif</option>
                                            <option value="0">Inactif</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <i class="fas fa-euro-sign"></i>
                                        <label class="form-label">Devise</label>
                                        <select class="select2 form-select" wire:model="status">
                                            <option value="1">Euro</option>
                                            <option value="0">Ariary</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Incoterms</label>

                                        <div class="d-flex gap-2">

                                            <input type="text" class="form-control" wire:model="location_incoterms" />
                                            <select class="select2 form-select" wire:model="fk_incoterms">
                                                <option value="">Sélectionner</option>
                                                <option value="5">CFR</option>
                                                <option value="6">CIF</option>
                                                <option value="8">CIP</option>
                                                <option value="7">CPT</option>
                                                <option value="10">DAP</option>
                                                <option value="9">DAT</option>
                                                <option value="11">DDP</option>
                                                <option value="12">DPU</option>
                                                <option value="1">EXW</option>
                                                <option value="3">FAS</option>
                                                <option value="2">FCA</option>
                                                <option value="4">FOB</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2" id="siret-field" style="display: none;">
                                        <label class="form-label">SIRET</label>
                                        <input type="text" class="form-control" wire:model="siret" />
                                    </div>
                                    <div class="col-md-2" id="siren-field" style="display: none;">
                                        <label class="form-label">SIREN</label>
                                        <input type="text" class="form-control" wire:model="siren" />
                                    </div>
                                    <div class="col-md-2" id="nif-field" style="display: none;">
                                        <label class="form-label">NIF</label>
                                        <input type="text" class="form-control" wire:model="nif" />
                                    </div>
                                    <div class="col-md-2" id="stat-field" style="display: none;">
                                        <label class="form-label">STAT</label>
                                        <input type="text" class="form-control" wire:model="stat" />
                                    </div>
                                    <div class="col-md-2" id="statut-juridique-field" style="display: none;">
                                        <label class="form-label">Statut Juridique</label>
                                        <input type="text" class="form-control" wire:model="statutJuridique" />
                                    </div>
                                </div>
                            </div>
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
<script>
    function toggleFields() {
        const country = document.getElementById("country").value;
        // France-specific fields
        const siretField = document.getElementById("siret-field");
        const sirenField = document.getElementById("siren-field");
        // Madagascar-specific fields
        const nifField = document.getElementById("nif-field");
        const statField = document.getElementById("stat-field");
        const statutJuridiqueField = document.getElementById("statut-juridique-field");

        // Hide all fields by default
        siretField.style.display = "none";
        sirenField.style.display = "none";
        nifField.style.display = "none";
        statField.style.display = "none";
        statutJuridiqueField.style.display = "none";

        // Show relevant fields based on the selected country
        if (country === "France") {
            siretField.style.display = "block";
            sirenField.style.display = "block";
        } else if (country === "Madagascar") {
            nifField.style.display = "block";
            statField.style.display = "block";
            statutJuridiqueField.style.display = "block";
        }
    }
</script>
