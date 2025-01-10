<div class="container-xxl flex-grow-1 container-p-y">
    <!-- En-tête -->
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Tâches /</span> Nouvelle tâche
    </h4>

    <!-- Card principale -->
    <div class="card mb-4">
        <div class="card-header">
            <div class="nav-align-top">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#tab-task">
                            <i class="ti ti-file me-1"></i>
                            Tâche
                        </button>
                    </li>
                </ul>
            </div>
        </div>

        <div class="card-body">
            <form>
                <!-- Première section -->
                <div class="row mb-4">
                    <label class="col-sm-2 col-form-label">Référence</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Généré automatiquement si vide">
                    </div>
                </div>

                <div class="row mb-4">
                    <label class="col-sm-2 col-form-label">Libellé <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" required>
                    </div>
                </div>

                <!-- Projet parent -->
                <div class="row mb-4">
                    <label class="col-sm-2 col-form-label">Projet parent</label>
                    <div class="col-sm-10">
                        <select class="form-select">
                            <option value="">Sélectionner un projet</option>
                        </select>
                    </div>
                </div>

                <!-- Tâche parente -->
                <div class="row mb-4">
                    <label class="col-sm-2 col-form-label">Tâche parente</label>
                    <div class="col-sm-10">
                        <select class="form-select">
                            <option value="">Sélectionner une tâche</option>
                        </select>
                    </div>
                </div>

                <!-- Dates -->
                <div class="row mb-4">
                    <label class="col-sm-2 col-form-label">Date de début</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control">
                    </div>
                    <label class="col-sm-2 col-form-label">Date de fin</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control">
                    </div>
                </div>

                <!-- Temps prévu -->
                <div class="row mb-4">
                    <label class="col-sm-2 col-form-label">Temps prévu</label>
                    <div class="col-sm-4">
                        <div class="input-group">
                            <input type="number" class="form-control" step="0.1" min="0">
                            <span class="input-group-text">jours</span>
                        </div>
                    </div>
                </div>

                <!-- Progression -->
                <div class="row mb-4">
                    <label class="col-sm-2 col-form-label">Progression</label>
                    <div class="col-sm-4">
                        <div class="input-group">
                            <input type="number" class="form-control" min="0" max="100" value="0">
                            <span class="input-group-text">%</span>
                        </div>
                    </div>
                </div>

                <!-- Priorité -->
                <div class="row mb-4">
                    <label class="col-sm-2 col-form-label">Priorité</label>
                    <div class="col-sm-4">
                        <select class="form-select">
                            <option value="0">La plus basse</option>
                            <option value="1">Basse</option>
                            <option value="2" selected>Moyenne</option>
                            <option value="3">Haute</option>
                            <option value="4">La plus haute</option>
                        </select>
                    </div>
                </div>

                <!-- Visibilité -->
                <div class="row mb-4">
                    <label class="col-sm-2 col-form-label">Visibilité</label>
                    <div class="col-sm-10">
                        <select class="form-select">
                            <option value="0">Privée (visible par le créateur uniquement)</option>
                            <option value="1" selected>Tous les contacts du projet</option>
                        </select>
                    </div>
                </div>

                <!-- Budget -->
                <div class="row mb-4">
                    <label class="col-sm-2 col-form-label">Budget</label>
                    <div class="col-sm-4">
                        <div class="input-group">
                            <input type="number" class="form-control" step="0.01" min="0">
                            <span class="input-group-text">€</span>
                        </div>
                    </div>
                </div>

                <!-- Assignation -->
                <div class="row mb-4">
                    <label class="col-sm-2 col-form-label">Assigné à</label>
                    <div class="col-sm-10">
                        <select class="form-select">
                            <option value="">Non assigné</option>
                        </select>
                    </div>
                </div>

                <!-- Description -->
                <div class="row mb-4">
                    <label class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="4"></textarea>
                    </div>
                </div>

                <!-- Boutons d'action -->
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                        <button type="button" class="btn btn-secondary me-2" onclick="window.history.back()">
                            <i class="ti ti-x me-1"></i>
                            Annuler
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="ti ti-device-floppy me-1"></i>
                            Créer brouillon
                        </button>
                        <button type="submit" class="btn btn-success">
                            <i class="ti ti-device-floppy me-1"></i>
                            Créer et valider
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
