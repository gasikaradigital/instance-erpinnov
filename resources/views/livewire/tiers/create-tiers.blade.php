<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="{{ asset('css/produitService.css') }}">

<div class="container-flux p-6 flex-grow-1">
    <!-- En-tête -->
    <div class="d-flex align-items-center">
        <i class="menu-icon fas fa-user fa-2x me-2"></i> <!-- Agrandit l'icône -->
        <h2 class=" fw-bold fs-3 mb-0 ">Nouveau tiers</h2>
    </div>

    <form wire:submit.prevent="save" id="addNewTierForm">
        <!-- Section 1: Informations générales -->
        <div class="card p-3 mb-4" id="section1Card">
            <div class="card-header p-3 ">
                <h6 class="card-title mb-0" id="section1Title">1. Informations générales</h6>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Nom du tiers</label>
                        <input type="text" class="form-control" wire:model="name" />
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Nom court/Alias</label>
                        <input type="text" class="form-control" wire:model="name_alias" />
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Nature de tiers <span class="text-danger">*</span></label>
                        <select class="select2 form-select" wire:model="client" required>
                            <option value=""></option>
                            <option value="1">Client</option>
                            <option value="2">Prospect</option>
                            <option value="0">Ni client, ni prospect</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="d-flex justify-content-between">
                            <label class="form-label">
                                Type du tiers <span class="text-danger">*</span>
                            </label>
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
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Fournisseur <span class="text-danger">*</span></label>
                        <div class="d-flex align-items-center gap-2">
                            <div class="form-check mb-0">
                                <input type="checkbox" id="fournisseur-oui" class="form-check-input" value="1" wire:model="fournisseur" checked>
                                <label class="form-check-label" for="fournisseur-oui">Oui</label>
                            </div>
                            <div class="form-check mb-0">
                                <input type="checkbox" id="fournisseur-non" class="form-check-input" value="0" wire:model="fournisseur">
                                <label class="form-check-label" for="fournisseur-non">Non</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3"><!-- à modifier aprèS -->
                         <label class="form-label">Assujetti à la TVA</label>
                            <div class="d-flex align-items-center gap-2">
                                <div class="form-check mb-0">
                                <input type="checkbox" class="form-check-input" wire:model="tva_assuj"/>
                                <label class="form-check-label" for="TVA-oui">Oui</label>
                            </div>
                         <div class="form-check mb-0">
                                <input type="checkbox" class="form-check-input" wire:model="tva_assuj"/>
                                <label class="form-check-label" for="TVA-non">Non</label>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Identité professionnel 1</label>
                        <input type="text" class="form-control" wire:model="idprof1" />
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Identité professionnel 2</label>
                        <input type="text" class="form-control" wire:model="idprof2" />
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Identité professionnel 3</label>
                        <input type="text" class="form-control" wire:model="idprof3" />
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Numéro TVA</label>
                        <input type="text" class="form-control" wire:model="tva_intra" />
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="d-flex justify-content-between">
                            <label class="form-label">Effectifs</label>
                        </div>
                        <select class="select2 form-select" wire:model="effectif_id">
                            <option value=""></option>
                            <option value="1">1 - 5</option>
                            <option value="2">6 - 10</option>
                            <option value="3">11 - 50</option>
                            <option value="4">51 - 100</option>
                            <option value="5">101 - 500</option>
                            <option value="6"> 500</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="d-flex justify-content-between">
                            <label class="form-label">Type d'entité légale</label>
                        </div>
                        <select class="select2 form-select" wire:model="typeEntite">
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Capital (Euros)</label>
                        <input type="text" class="form-control" wire:model="capital" />
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Tags/catégories clients/prosp.</label>
                        <input type="text" class="form-control" wire:model="tags" />
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Tags/catégories fournisseurs</label>
                        <input type="text" class="form-control" wire:model="tagsFournisseur" />
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Maison Mère</label>
                        <select class="select2 form-select" wire:model="parent">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Assigner des commerciaux</label>
                        <input type="text" class="form-control" wire:model="maisonMere" />
                    </div>
                    <div class="col-md-3 mb-3">
              <label class="form-label">Logo</label>
             <div class="input-group">
             <input type="file" class="form-control custom-file-input" style="border-radius: 4px !important;" wire:model="logo" id="logoInput" hidden />
             <div class="form-control d-flex justify-content-between align-items-center" style="border-radius: 4px !important;"
             onclick="document.getElementById('logoInput').click()"
             style="cursor: pointer; background-color: white;">
            <span class="file-name text-muted border-0">Logo</span>
            <i class="fas fa-folder"></i>
        </div>
    </div>
</div>
                </div>
            </div>
        </div>

        <!-- Section 2: Coordonnées -->
        <div class="card mb-4" id="section2Card">
            <div class="card-header p-3">
                <h6 class="card-title mb-0" id="section2Title">2. Coordonnées</h6>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Adresse</label>
                        <input type="text" class="form-control" wire:model="address" />
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Code postal</label>
                        <input type="text" class="form-control" wire:model="zip" />
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Ville</label>
                        <input type="text" class="form-control" wire:model="town" />
                    </div>
                    <div class="col-md-3 mb-3">
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
                    <div class="col-md-3 mb-3">
                        <i class="fas fa-phone"></i>
                        <label class="form-label">Téléphone</label>
                        <input type="tel" class="form-control" wire:model="phone" />
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" wire:model="email" />
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Facebook</label>
                        <input class="form-control" wire:model="facebook" />
                    </div>
                    <div class="col-md-3 mb-3">
                        <i class="fas fa-external-link-alt"></i>
                        <label class="form-label">Site web</label>
                        <input type="text" class="form-control" wire:model="url" />
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="d-flex justify-content-between">
                            <label class="form-label">Département / Canton</label>
                        </div>
                        <div class="d-flex gap-2">
                            <select class="select2 form-select" wire:model="departement">
                                <option value=""></option>
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Fax</label>
                        <input type="text" class="form-control" wire:model="fax" />
                    </div>
                </div>
            </div>
        </div>

        <!-- Section 3: Informations complémentaires -->
        <div class="card mb-4" id="section3Card">
            <div class="card-header p-3">
                <h6 class="card-title mb-0" id="section3Title">3. Informations complémentaires</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Statut</label>
                        <select class="select2 form-select" wire:model="status">
                            <option value="1">Actif</option>
                            <option value="0">Inactif</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <i class="fas fa-euro-sign"></i>
                        <label class="form-label">Devise</label>
                        <select class="select2 form-select" wire:model="status">
                            <option value="1">Euro</option>
                            <option value="0">Ariary</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Incoterms</label>
                        <input type="text" class="form-control" wire:model="location_incoterms" />
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label"> </label>
                        <div class="d-flex gap-2">
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
                    <div class="col-md-3 mb-3" id="siret-field" style="display: none;">
                        <label class="form-label">SIRET</label>
                        <input type="text" class="form-control" wire:model="siret" />
                    </div>
                    <div class="col-md-3 mb-3" id="siren-field" style="display: none;">
                        <label class="form-label">SIREN</label>
                        <input type="text" class="form-control" wire:model="siren" />
                    </div>
                    <div class="col-md-3 mb-3" id="nif-field" style="display: none;">
                        <label class="form-label">NIF</label>
                        <input type="text" class="form-control" wire:model="nif" />
                    </div>
                    <div class="col-md-3 mb-3" id="stat-field" style="display: none;">
                        <label class="form-label">STAT</label>
                        <input type="text" class="form-control" wire:model="stat" />
                    </div>
                    <div class="col-md-3 mb-3" id="statut-juridique-field" style="display: none;">
                        <label class="form-label">Statut Juridique</label>
                        <input type="text" class="form-control" wire:model="statutJuridique" />
                    </div>
                </div>
            </div>
        </div>

        <!-- Pied Modal -->
        <div class="d-flex align-items-center">
            <div class="modal-footer py-3">
                <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal">
                    <i class="ti ti-x ti-xs me-1"></i>
                    Annuler
                </button>
                <button type="submit" class="btn btn-primary ms-2">
                    <i class="ti ti-device-floppy ti-xs me-1"></i>
                    Enregistrer
                </button>
            </div>
        </div>
    </form>
</div>

<script>
    // Fonction pour gérer l'affichage des champs spécifiques par pays
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

    // Fonction pour gérer l'affichage du nom de fichier pour l'input logo
    document.getElementById('logoInput').addEventListener('change', function() {
        const fileName = this.files[0] ? this.files[0].name : 'Logo';
        document.querySelector('.file-name').textContent = fileName;
    });

    // Animation pour les titres des sections quand on interagit avec les champs
    document.addEventListener('DOMContentLoaded', function() {
        // Configuration des sections
        const sections = [
            { card: 'section1Card', title: 'section1Title' },
            { card: 'section2Card', title: 'section2Title' },
            { card: 'section3Card', title: 'section3Title' }
        ];

        // Couleur originale des titres
        const originalColor = '';
        // Couleur primary de Bootstrap (peut être ajustée selon votre thème)
        const primaryColor = '#696cff';

        // Ajouter des gestionnaires d'événements pour chaque section
        sections.forEach(section => {
            const card = document.getElementById(section.card);
            const title = document.getElementById(section.title);

            // Ajouter des événements pour tous les champs d'entrée dans la carte
            const inputs = card.querySelectorAll('input, select, textarea');

            inputs.forEach(input => {
                // Changer la couleur quand on focus sur un champ
                input.addEventListener('focus', function() {
                    title.style.color = primaryColor;
                });

                // Maintenir la couleur quand on tape dans un champ
                input.addEventListener('input', function() {
                    title.style.color = primaryColor;
                });

                // Maintenir la couleur quand on change une sélection
                input.addEventListener('change', function() {
                    title.style.color = primaryColor;
                });

                // Détecter simplement le mouvement du curseur sur n'importe quel champ
                input.addEventListener('mouseover', function() {
                    title.style.color = primaryColor;
                });
            });

            // Ajouter un événement pour la carte entière pour détecter quand le curseur est au-dessus
            card.addEventListener('mouseover', function() {
                title.style.color = primaryColor;
            });

            // Réinitialiser la couleur lorsque le curseur quitte la carte
            card.addEventListener('mouseout', function(e) {
                // Seulement réinitialiser si le curseur quitte complètement la carte
                if (!card.contains(e.relatedTarget)) {
                    // Vérifier si aucun champ n'a le focus à l'intérieur de la carte
                    const hasFocus = Array.from(inputs).some(input => document.activeElement === input);
                    if (!hasFocus) {
                        title.style.color = originalColor;
                    }
                }
            });
        });
    });
</script>
