<div class="container-flux  p-6 flex-grow-1" >
    <!-- En-tête -->
    <div class="card mb-10 col-12 p-10">
        <div class="d-flex align-items-center">
            <i class="menu-icon fas fa-user fa-4x me-2"></i> <!-- Agrandit l'icône -->
            <h2 class="fs-3 mb-0">Nouveau salarié</h2>
        </div>
         <p class="opacitymedium"> Ce formulaire permet de créer un utilisateur interne à votre société/institution. Pour créer un utilisateur externe (client, fournisseur, ...), utilisez le bouton 'Créer compte utilisateur' qui se trouve sur la fiche du contact du tiers.</p>
         <hr class="opacitymedium mt-2">
         <form>
            <div class="row">
                <!-- Première ligne -->
                <div class="col-md-3 mb-3">
                    <label for="civilite" class="form-label">Titre civilité</label>
                    <select id="civilite" class="form-select">
                        <option value="">Sélectionner</option>
                        <option value="M">Monsieur</option>
                        <option value="Mme">Madame</option>
                    </select>
                </div>

                <div class="col-md-3 mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" id="nom" class="form-control">
                </div>

                <!-- Deuxième ligne -->
                <div class="col-md-3 mb-3">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input type="text" id="prenom" class="form-control">
                </div>

                <div class="col-md-3 mb-3">
                    <label for="identifiant" class="form-label">Identifiant</label>
                    <input type="text" id="identifiant" class="form-control">
                </div>

                <!-- Troisième ligne -->
                <div class="col-md-3 mb-3">
                    <label for="admin" class="form-label">Administrateur du système</label>
                    <select id="admin" class="form-select">
                        <option value="Oui">Oui</option>
                        <option value="Non">Non</option>
                    </select>
                </div>

                <div class="col-md-3 mb-3">
                    <label for="genre" class="form-label">Genre</label>
                    <select id="genre" class="form-select">
                        <option value="">Sélectionner</option>
                        <option value="Homme">Homme</option>
                        <option value="Femme">Femme</option>
                        <option value="Autre">Autre</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Salarié</label>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" checked />
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="Utilisateur" class="form-label">Utilisateur externe ?</label>
                    <div for="Utilisateur" class="form-label d-flex align-items-center">
                        Interne
                        <i class="menu-icon fas fa-info-circle fa-fw fa-xs ms-1  opacityhigh" style="font-size: 0.8em;"></i>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <i class="fas fa-user fa-sm me-2"></i>
                    <label for="responsable" class="form-label">Responsable hiérarchique</label>
                    <select id="responsable" class="form-select">
                        <option value="">Sélectionner</option>
                        <option value="SuperAdmin">SuperAdmin</option>
                        <option value="test_francky">test francky</option>
                    </select>
                </div>

                 <!-- Valideur notes de frais -->
    <div class="col-md-3 mb-3">
        <i class="fas fa-user fa-sm me-2"></i>
        <label for="valideur_frais" class="form-label ">
            Valideur des notes de frais
            <i class="menu-icon fas fa-info-circle fa-fw fa-xs ms-1" style="font-size: 0.8em;"></i>
        </label>
        <select id="valideur_frais" class="form-select">
            <option value="">Sélectionner</option>
            <option value="SuperAdmin">SuperAdmin</option>
            <option value="test_francky">test francky</option>
        </select>
    </div>

    <!-- Valideur congés -->
    <div class="col-md-3 mb-3">
        <i class="fas fa-user fa-sm me-2"></i>
        <label for="valideur_conges" class="form-label ">
            Valideur des congés
            <i class="menu-icon fas fa-info-circle fa-fw fa-xs ms-1 " style="font-size: 0.8em;"></i>
        </label>
        <select id="valideur_conges" class="form-select">
            <option value="">Sélectionner</option>
            <option value="SuperAdmin">SuperAdmin</option>
            <option value="test_francky">test francky</option>
        </select>
    </div>
    <hr class="opacitymedium mt-2">
</div>
<button type="submit" class="btn btn-primary mt-3">Créer salarié</button>
            </div>
        </form>
        </form>
    </div>
</div>
