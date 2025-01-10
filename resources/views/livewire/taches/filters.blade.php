<!-- Filtres Rapides -->
<div class="row mb-4">
    <div class="col">
        <div class="nav-align-top">
            <ul class="nav nav-tabs nav-fill" role="tablist">
                <li class="nav-item">
                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab">
                        <i class="ti ti-list me-1"></i>
                        Toutes
                        <span class="badge rounded-pill bg-label-secondary ms-1">0</span>
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab">
                        <i class="ti ti-loader me-1"></i>
                        En cours
                        <span class="badge rounded-pill bg-label-warning ms-1">0</span>
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab">
                        <i class="ti ti-check me-1"></i>
                        Terminées
                        <span class="badge rounded-pill bg-label-success ms-1">0</span>
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab">
                        <i class="ti ti-alert-circle me-1"></i>
                        En retard
                        <span class="badge rounded-pill bg-label-danger ms-1">0</span>
                    </button>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- Filtres et Recherche -->
<div class="card mb-4">
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="ti ti-search"></i>
                    </span>
                    <input type="text" class="form-control" placeholder="Rechercher une tâche...">
                </div>
            </div>
            <div class="col-md-8">
                <div class="d-flex gap-2">
                    <select class="form-select">
                        <option value="">Statut</option>
                        <option value="draft">Brouillon</option>
                        <option value="planned">Planifiée</option>
                        <option value="in_progress">En cours</option>
                        <option value="done">Terminée</option>
                        <option value="canceled">Annulée</option>
                    </select>
                    <select class="form-select">
                        <option value="">Priorité</option>
                        <option value="0">Basse</option>
                        <option value="1">Normale</option>
                        <option value="2">Haute</option>
                        <option value="3">Urgente</option>
                    </select>
                    <select class="form-select">
                        <option value="">Projet</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
