<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
    /* Styles pour l'aspect formulaire en colonnes */
.row.mb-3 {
    border-bottom: 1px solid #e9ecef;
    padding: 0.75rem 0;
    margin-bottom: 0 !important;
    transition: background-color 0.2s ease;
}

.row.mb-3:hover {
    background-color: rgba(0, 0, 0, 0.02);
}

.row.mb-3:last-child {
    border-bottom: none;
}

/* Style pour les libellés */
.col-md-4 .form-label {
    color: #6c757d;
    font-weight: 500;
    margin-bottom: 0;
    display: flex;
    align-items: center;
    height: 100%;
}

/* Style pour les valeurs */
.col-md-8 {
    display: flex;
    align-items: center;
}

.col-md-8 span {
    font-weight: 400;
}

/* Style pour les badges */
.badge {
    font-size: 0.75rem;
    padding: 0.25em 0.5em;
    font-weight: 600;
    border-radius: 4px;
}

.badge.bg-light {
    border: 1px solid #dee2e6;
}

.badge.bg-success {
    background-color: #28a745 !important;
}

/* Style pour le conteneur global */
.col-md-6 {
    background-color: #fff;
    border-radius: 0.375rem;
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    padding: 1.5rem;
    margin-bottom: 1.5rem;
}

/* Responsive design pour mobile */
@media (max-width: 768px) {
    .col-md-4, .col-md-8 {
        width: 100%;
        padding: 0.25rem 0.5rem;
    }

    .col-md-4 {
        border-bottom: none;
    }

    .row.mb-3 {
        padding: 0.5rem 0;
    }
}
</style>

<div class="container-flux p-6 flex-grow-1">

    <!-- Informations du tiers -->
    <div class="card mb-4">
         <!-- En-tête -->
    <div class="d-flex justify-content-between align-items-center p-4 mb-4">
        <div class="d-flex align-items-center">
            <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHJlY3Qgd2lkdGg9IjYwIiBoZWlnaHQ9IjYwIiBmaWxsPSIjNjA2M2I2Ii8+PHRleHQgeD0iMzAiIHk9IjM2IiBmb250LXNpemU9IjI0IiB0ZXh0LWFuY2hvcj0ibWlkZGxlIiBmaWxsPSJ3aGl0ZSI+SDwvdGV4dD48L3N2Zz4=" class="me-3" width="50" height="50" alt="Logo">
            <div>
                <h3 class="text-success mb-0">hartsimba</h3>
                <p class="text-muted mb-0">hartsimba</p>
            </div>
        </div>
        <div class="d-flex">
            <a href="#" class="btn btn-link me-2">Retour liste</a>
            <button class="btn btn-secondary">Clos</button>
        </div>
    </div>
        <div class="card-body">
            <div class="row mb-4">
                <!-- Première colonne -->
                <div class="col-md-6">
                    <!-- Nature de tiers -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Nature de tiers</label>
                        </div>
                        <div class="col-md-8">
                            <div class="d-flex">
                                <span class="badge bg-light text-dark me-1">P</span>
                                <span class="badge bg-success text-white">C</span>
                            </div>
                        </div>
                    </div>

                    <!-- Code client -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Code client</label>
                        </div>
                        <div class="col-md-8">
                            <span>CU2504-00005</span>
                        </div>
                    </div>

                    <!-- Identifiant professionnel 1 -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Identifiant professionnel 1</label>
                        </div>
                        <div class="col-md-8">
                            <span></span>
                        </div>
                    </div>

                    <!-- Identifiant professionnel 2 -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Identifiant professionnel 2</label>
                        </div>
                        <div class="col-md-8">
                            <span></span>
                        </div>
                    </div>

                    <!-- Identifiant professionnel 3 -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Identifiant professionnel 3</label>
                        </div>
                        <div class="col-md-8">
                            <span></span>
                        </div>
                    </div>

                    <!-- Identifiant professionnel 4 -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Identifiant professionnel 4</label>
                        </div>
                        <div class="col-md-8">
                            <span></span>
                        </div>
                    </div>

                    <!-- Identifiant professionnel 5 -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Identifiant professionnel 5</label>
                        </div>
                        <div class="col-md-8">
                            <span></span>
                        </div>
                    </div>

                    <!-- Identifiant professionnel 6 -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Identifiant professionnel 6</label>
                        </div>
                        <div class="col-md-8">
                            <span></span>
                        </div>
                    </div>

                    <!-- Numéro de TVA -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Numéro de TVA</label>
                        </div>
                        <div class="col-md-8">
                            <span></span>
                        </div>
                    </div>
                </div>
                <!-- Deuxième colonne -->
                <div class="col-md-6">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Tags/catégories clients</label>
                        </div>
                        <div class="col-md-8">
                            <span></span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Type du tiers</label>
                        </div>
                        <div class="col-md-8">
                            <div class="d-flex align-items-center">
                                <span></span>
                                <button class="btn btn-sm btn-link text-muted">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Effectifs</label>
                        </div>
                        <div class="col-md-8">
                            <span></span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Type d'entité légale</label>
                        </div>
                        <div class="col-md-8">
                            <span></span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Capital</label>
                        </div>
                        <div class="col-md-8">
                            <span>0,00 €</span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Maison mère</label>
                        </div>
                        <div class="col-md-8">
                            <div class="d-flex align-items-center">
                                <span></span>
                                <button class="btn btn-sm btn-link text-muted">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Commerciaux</label>
                        </div>
                        <div class="col-md-8">
                            <div class="d-flex align-items-center">
                                <span>
                                    <button class="btn btn-sm btn-link">
                                        <i class="fas fa-user me-1"></i>SuperAdmin
                                    </button>
                                </span>
                                <button class="btn btn-sm btn-link text-muted">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Lien adhérent</label>
                        </div>
                        <div class="col-md-8">
                            <span>Tiers non lié à un adhérent</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Boutons d'action -->
            <div class="d-flex mt-3">
                <button class="btn btn-light me-2">ENVOYER EMAIL</button>
                <button class="btn btn-primary me-2">MODIFIER</button>
                <button class="btn btn-info me-2">CLONER</button>
                <button class="btn btn-warning me-2">FUSIONNER</button>
                <button class="btn btn-danger">SUPPRIMER</button>
            </div>
        </div>
    </div>

    <!-- Fichiers joints et événements -->
    <div class="row">
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-header bg-white">
                    <h5 class="card-title">Fichiers joints</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <thead>
                                <tr>
                                    <th>Fichiers</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Aucun</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h5 class="card-title">Les 10 derniers événements</h5>
                    <div>
                        <button class="btn btn-sm btn-link">
                            <i class="fas fa-comments"></i>
                        </button>
                        <button class="btn btn-sm btn-link">
                            <i class="fas fa-list"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <thead>
                                <tr>
                                    <th>Réf.</th>
                                    <th>Date</th>
                                    <th>Par</th>
                                    <th>Type</th>
                                    <th>Titre</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="5">Aucun</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
