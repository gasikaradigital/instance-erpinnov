<div>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                
                <h5 class="mb-3">
                    <i class="fas fa-barcode me-3"></i>
                    Informations de Lot/Série
                </h5>
            </div>
            
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row g-3">
                        <!-- Produit -->
                        <div class="col-md-2">
                            <label for="produit" class="form-label mb-2">Produit</label> <!-- Ajout de `mb-2` pour espacer le label -->
                            <select class="form-select" id="produit" name="produit">
                                <option value="">Sélectionner</option>
                                <option value="">PRD-001 - Serve - 1325</option>
                                <option value="">PRD-002 - Serve - 321</option>
                                <option value="">SER-001 - Service Test</option>
                            </select>
                        </div>

                        <!-- Lot/Série -->
                        <div class="col-md-2">
                            <label for="libelle" class="form-label mb-2">Lot/Série</label> <!-- Ajout de `mb-2` pour espacer le label -->
                            <input type="text" class="form-control" id="libelle" name="libelle" placeholder="Saisissez un libellé" />
                        </div>

                        <!-- DLC -->
                        <div class="col-md-2">
                            <label for="dlc" class="form-label mb-2">DLC</label> <!-- Ajout de `mb-2` pour espacer le label -->
                            <input type="date" class="form-control" id="dlc" name="dlc" />
                        </div>

                        <!-- DMD/DLUO -->
                        <div class="col-md-2">
                            <label for="dmd_dluo" class="form-label mb-2">DMD/DLUO</label> <!-- Ajout de `mb-2` pour espacer le label -->
                            <input type="date" class="form-control" id="dmd_dluo" name="dmd_dluo" />
                        </div>
                        <!-- Fichier -->
                        <div class="col-md-2">
                            <label for="file" class="form-label mb-2">Fichiers joints</label> <!-- Ajout de `mb-2` pour espacer le label -->
                            <input type="file" class="form-control" id="file" name="file" />
                        </div>
                    </div>

                    <!-- Enregistrement des informations -->
                    <div class="d-flex justify-content-end gap-3 mt-3">
                        <button type="button" class="btn btn-secondary">
                            <i class="fas fa-times me-2"></i>Annuler
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Créer
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4">
    <h5 class="mb-3">
        <i class="fas fa-history me-2"></i>
        Les 10 derniers événements liés
    </h5>
    <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      
        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addEventModal">
            <i class="fas fa-plus"></i>
        </button>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover mb-0">
                <thead>
                    <tr>
                        <th class="text-center">
                            <i class="fas fa-hashtag"></i>
                            <span class="ms-2">Réf.</span>
                        </th>
                        <th>
                            <i class="fas fa-calendar"></i>
                            <span class="ms-2">Date</span>
                        </th>
                        <th>
                            <i class="fas fa-user"></i>
                            <span class="ms-2">Par</span>
                        </th>
                        <th>
                            <i class="fas fa-tag"></i>
                            <span class="ms-2">Type</span>
                        </th>
                        <th>
                            <i class="fas fa-heading"></i>
                            <span class="ms-2">Titre</span>
                        </th>
                        <th class="text-center">
                            <i class="fas fa-cogs"></i>
                            <span class="ms-2">Actions</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td colspan="6" class="text-center text-muted py-3">
                                <i class="fas fa-inbox fa-2x mb-2"></i>
                                <p class="mb-0">Aucun événement</p>
                            </td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>

<!-- Modal pour ajouter un événement -->
<div class=" modal fade" id="addEventModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-plus-circle me-2"></i>
                    Ajouter un événement
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Type d'événement</label>
                            <select class="form-select">
                                <option>Sélectionner un type</option>
                                <!-- Options dynamiques -->
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Titre</label>
                            <input type="text" class="form-control" placeholder="Titre de l'événement">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" rows="3" placeholder="Description détaillée"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-2"></i>Annuler
                </button>
                <button type="button" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Enregistrer
                </button>
            </div>
        </div>
    </div>
</div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Exemple de gestion d'événements
    const deleteButtons = document.querySelectorAll('.btn-danger');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            if(confirm('Voulez-vous vraiment supprimer cet événement ?')) {
                // Logique de suppression
            }
        });
    });
});
</script>
