<div class="container-fluid dashboard-container p-4">
<!-- Top Stats Cards -->
    <div class="row g-4 mb-4">
        <!-- Main Analytics Card -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100 bg-primary bg-gradient text-white">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between">
                        <h5 class="fw-semibold mb-3"><i class="bi bi-bar-chart-fill me-2"></i>Analytics</h5>
                        <div class="dropdown">
                            <button class="btn btn-sm text-white p-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#">Exporter</a></li>
                                <li><a class="dropdown-item" href="#">Paramètres</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="stats-value mb-3">
                        <div class="d-flex align-items-baseline">
                            <h3 class="mb-1">28.5%</h3>
                            <span class="ms-2 badge bg-success rounded-pill">
                                <i class="bi bi-arrow-up-short"></i>3.2%
                            </span>
                        </div>
                        <p class="text-white-50 mb-0">Taux de conversion</p>
                    </div>
                    <div class="row stats-details g-3">
                        <div class="col-6">
                            <div class="stat-item p-2 rounded bg-white bg-opacity-10">
                                <h5 class="mb-0">199</h5>
                                <small>En retard</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="stat-item p-2 rounded bg-white bg-opacity-10">
                                <h5 class="mb-0">59.58%</h5>
                                <small>Progression</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sales Overview -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-semibold mb-0"><i class="bi bi-currency-euro me-2 text-primary"></i>Ventes</h5>
                        <span class="badge bg-success text-white px-3 py-2 rounded-pill">+18.2%</span>
                    </div>
                    <div class="sales-value mb-4">
                        <h3 class="mb-1 fw-bold">€42.5k</h3>
                        <p class="text-muted mb-0">Revenu mensuel</p>
                    </div>
                    <div class="d-flex justify-content-between mb-2 small">
                        <span class="text-muted">Objectif: €56.8k</span>
                        <span class="fw-semibold">75%</span>
                    </div>
                    <div class="progress rounded-pill" style="height: 8px;">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 75%"></div>
                        <div class="progress-bar bg-success" role="progressbar" style="width: 25%"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Projects Overview -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between mb-3">
                        <h5 class="fw-semibold mb-0"><i class="bi bi-kanban me-2 text-warning"></i>Projets</h5>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-light rounded-circle p-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#">Voir tous</a></li>
                                <li><a class="dropdown-item" href="#">Filtrer</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="project-stats text-center mb-3">
                        <!-- Utilisation du composant de progression circulaire de Bootstrap -->
                        <div class="position-relative d-inline-block mx-auto mb-3">
                            <div class="position-relative" style="width: 120px; height: 120px;">
                                <div class="position-absolute top-50 start-50 translate-middle">
                                    <span class="fs-2 fw-bold">85%</span>
                                </div>
                                <!-- Cet élément sera stylé avec des classes Bootstrap -->
                                <div class="rounded-circle border border-3 border-primary" style="width: 120px; height: 120px;"></div>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="bg-light rounded p-3 text-center">
                                    <span class="fw-semibold">30</span>
                                    <small class="text-muted d-block">Ouverts</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="bg-light rounded p-3 text-center">
                                    <span class="fw-semibold">236</span>
                                    <small class="text-muted d-block">Tâches</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Support Stats -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between mb-3">
                        <h5 class="fw-semibold mb-0"><i class="bi bi-headset me-2 text-info"></i>Support</h5>
                        <span class="badge bg-info text-white px-3 py-2 rounded-pill">7 jours</span>
                    </div>
                    <div class="support-stats">
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="p-3 rounded bg-light text-center">
                                    <h3 class="mb-1 fw-bold">164</h3>
                                    <small class="text-muted">Total Tickets</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="p-3 rounded bg-light text-center">
                                    <h3 class="mb-1 fw-bold">28</h3>
                                    <small class="text-muted">En attente</small>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="d-flex justify-content-between mb-2 small">
                                <span class="text-muted">Taux de résolution</span>
                                <span class="fw-semibold">85%</span>
                            </div>
                            <div class="progress" style="height: 6px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 85%"></div>
                            </div>
                        </div>
                        <div class="text-end mt-3">
                            <a href="#" class="btn btn-sm btn-outline-info rounded-pill">Voir détails</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Calendar and Stats Section -->
    <div class="row g-4 mb-4">
        <!-- Calendar Card -->
        <div class="col-xl-8">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white p-3 border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="fw-semibold mb-0">
                            <i class="bi bi-calendar3 me-2 text-primary"></i>
                            Calendrier - Février 2025
                        </h5>
                        <div class="d-flex">
                            <button class="btn btn-sm btn-outline-secondary me-2" type="button">
                                <i class="bi bi-calendar-week me-1"></i> Mois
                            </button>
                            <div class="btn-group">
                                <button class="btn btn-sm btn-light" type="button">
                                    <i class="bi bi-chevron-left"></i>
                                </button>
                                <button class="btn btn-sm btn-primary" type="button">
                                    Aujourd'hui
                                </button>
                                <button class="btn btn-sm btn-light" type="button">
                                    <i class="bi bi-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <table class="table table-bordered text-center mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="text-muted small py-2">Lun</th>
                                <th class="text-muted small py-2">Mar</th>
                                <th class="text-muted small py-2">Mer</th>
                                <th class="text-muted small py-2">Jeu</th>
                                <th class="text-muted small py-2">Ven</th>
                                <th class="text-muted small py-2">Sam</th>
                                <th class="text-muted small py-2">Dim</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-muted small py-2">29</td>
                                <td class="text-muted small py-2">30</td>
                                <td class="text-muted small py-2">31</td>
                                <td class="small py-2 text-nowrap">1</td>
                                <td class="small py-2 text-nowrap">2</td>
                                <td class="small py-2 text-nowrap bg-light">3</td>
                                <td class="small py-2 text-nowrap bg-light">4</td>
                            </tr>
                            <tr>
                                <td class="small py-2 text-nowrap">5</td>
                                <td class="small py-2 text-nowrap">6</td>
                                <td class="small py-2 text-nowrap position-relative">
                                    7
                                    <div class="position-absolute bottom-0 start-50 translate-middle-x mb-1">
                                        <span class="badge bg-primary rounded-circle p-1" style="width: 8px; height: 8px;"></span>
                                    </div>
                                </td>
                                <td class="small py-2 text-nowrap">8</td>
                                <td class="small py-2 text-nowrap position-relative fw-bold bg-primary bg-opacity-10">
                                    9
                                    <div class="position-absolute bottom-0 start-50 translate-middle-x mb-1">
                                        <span class="badge bg-primary rounded-circle p-1" style="width: 8px; height: 8px;"></span>
                                    </div>
                                </td>
                                <td class="small py-2 text-nowrap bg-light">10</td>
                                <td class="small py-2 text-nowrap bg-light">11</td>
                            </tr>
                            <tr>
                                <td class="small py-2 text-nowrap">12</td>
                                <td class="small py-2 text-nowrap">13</td>
                                <td class="small py-2 text-nowrap">14</td>
                                <td class="small py-2 text-nowrap">15</td>
                                <td class="small py-2 text-nowrap position-relative">
                                    16
                                    <div class="position-absolute bottom-0 start-50 translate-middle-x mb-1">
                                        <span class="badge bg-success rounded-circle p-1" style="width: 8px; height: 8px;"></span>
                                    </div>
                                </td>
                                <td class="small py-2 text-nowrap bg-light">17</td>
                                <td class="small py-2 text-nowrap bg-light">18</td>
                            </tr>
                            <tr>
                                <td class="small py-2 text-nowrap">19</td>
                                <td class="small py-2 text-nowrap position-relative">
                                    20
                                    <div class="position-absolute bottom-0 start-50 translate-middle-x mb-1">
                                        <span class="badge bg-danger rounded-circle p-1" style="width: 8px; height: 8px;"></span>
                                    </div>
                                </td>
                                <td class="small py-2 text-nowrap">21</td>
                                <td class="small py-2 text-nowrap">22</td>
                                <td class="small py-2 text-nowrap">23</td>
                                <td class="small py-2 text-nowrap bg-light">24</td>
                                <td class="small py-2 text-nowrap bg-light">25</td>
                            </tr>
                            <tr>
                                <td class="small py-2 text-nowrap">26</td>
                                <td class="small py-2 text-nowrap">27</td>
                                <td class="small py-2 text-nowrap">28</td>
                                <td class="small py-2 text-nowrap">29</td>
                                <td class="text-muted small py-2">1</td>
                                <td class="text-muted small py-2 bg-light">2</td>
                                <td class="text-muted small py-2 bg-light">3</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Events List -->
        <div class="col-xl-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white p-3 border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="fw-semibold mb-0">
                            <i class="bi bi-calendar-event me-2 text-primary"></i>
                            Événements à venir
                        </h5>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#"><i class="bi bi-plus-circle me-2"></i>Ajouter événement</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-calendar-check me-2"></i>Tous les événements</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item border-0 px-3 py-3">
                            <div class="d-flex">
                                <div class="me-3">
                                    <div class="d-flex flex-column align-items-center">
                                        <span class="badge bg-primary rounded-pill px-2">9 Fév</span>
                                        <div class="vr my-2" style="height: 30px;"></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="d-flex align-items-center mb-1">
                                        <h6 class="mb-0">Réunion client</h6>
                                        <span class="badge bg-light text-primary ms-2">Visio</span>
                                    </div>
                                    <p class="text-muted small mb-1">
                                        <i class="bi bi-clock me-1"></i> 09:00 - 10:30
                                    </p>
                                    <p class="text-muted small mb-0">
                                        <i class="bi bi-people me-1"></i> Équipe commerciale, Acme Corp.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="list-group-item border-0 px-3 py-3">
                            <div class="d-flex">
                                <div class="me-3">
                                    <div class="d-flex flex-column align-items-center">
                                        <span class="badge bg-success rounded-pill px-2">16 Fév</span>
                                        <div class="vr my-2" style="height: 30px;"></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="d-flex align-items-center mb-1">
                                        <h6 class="mb-0">Point d'équipe</h6>
                                        <span class="badge bg-light text-success ms-2">Interne</span>
                                    </div>
                                    <p class="text-muted small mb-1">
                                        <i class="bi bi-clock me-1"></i> 14:00 - 15:00
                                    </p>
                                    <p class="text-muted small mb-0">
                                        <i class="bi bi-geo-alt me-1"></i> Salle de réunion 2
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="list-group-item border-0 px-3 py-3">
                            <div class="d-flex">
                                <div class="me-3">
                                    <div class="d-flex flex-column align-items-center">
                                        <span class="badge bg-danger rounded-pill px-2">20 Fév</span>
                                        <div class="vr my-2" style="height: 30px;"></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="d-flex align-items-center mb-1">
                                        <h6 class="mb-0">Livraison projet X</h6>
                                        <span class="badge bg-light text-danger ms-2">Deadline</span>
                                    </div>
                                    <p class="text-muted small mb-1">
                                        <i class="bi bi-clock me-1"></i> Toute la journée
                                    </p>
                                    <p class="text-muted small mb-0">
                                        <i class="bi bi-file-earmark-text me-1"></i> Documents à fournir
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white text-center py-3 border-0">
                    <button class="btn btn-outline-primary btn-sm rounded-pill px-3">
                        <i class="bi bi-plus-circle me-1"></i> Nouvel événement
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Stats Section avec widgets déplaçables -->
    <div class="row g-4" id="draggable-widgets">
        <!-- Factures -->
        <div class="col-xl-4 col-md-6 draggable-item">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white py-3 px-3 border-0">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <div class="bg-info text-white rounded p-2 me-3">
                                <i class="bi bi-file-earmark-text fs-4"></i>
                            </div>
                            <div>
                                <h5 class="fw-semibold mb-0">Factures</h5>
                                <small class="text-muted">Aperçu mensuel</small>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="drag-handle me-2 text-muted cursor-move">
                                <i class="bi bi-grip-vertical"></i>
                            </span>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-light rounded-circle p-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>Voir toutes</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-plus-circle me-2"></i>Nouvelle facture</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i>Paramètres</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="invoice-stats">
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="p-3 bg-light rounded text-center">
                                    <h3 class="mb-1 fw-bold">5</h3>
                                    <small class="text-muted">En attente</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="p-3 bg-light rounded text-center">
                                    <h3 class="mb-1 fw-bold text-nowrap">€28,450</h3>
                                    <small class="text-muted">Total</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="d-flex justify-content-between mb-2 small">
                            <span class="text-muted">Taux de paiement</span>
                            <span class="text-dark fw-semibold">20%</span>
                        </div>
                        <div class="progress rounded-pill" style="height: 8px;">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white border-0 p-3">
                    <a href="#" class="btn btn-sm btn-outline-info w-100 rounded-pill">
                        <i class="bi bi-list-ul me-1"></i> Voir toutes les factures
                    </a>
                </div>
            </div>
        </div>

        <!-- Comptes Bancaires -->
        <div class="col-xl-4 col-md-6 draggable-item">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white py-3 px-3 border-0">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <div class="bg-secondary text-white rounded p-2 me-3">
                                <i class="bi bi-bank fs-4"></i>
                            </div>
                            <div>
                                <h5 class="fw-semibold mb-0">Comptes</h5>
                                <small class="text-muted">État bancaire</small>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="drag-handle me-2 text-muted cursor-move">
                                <i class="bi bi-grip-vertical"></i>
                            </span>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-light rounded-circle p-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-arrow-repeat me-2"></i>Rapprochement</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-upload me-2"></i>Importer relevé</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="bank-stats mb-3">
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="p-3 bg-light rounded text-center">
                                    <h4 class="mb-1 fw-bold">55</h4>
                                    <small class="text-muted">À rapprocher</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="p-3 bg-light rounded text-center">
                                    <h4 class="mb-1 fw-bold">0</h4>
                                    <small class="text-muted">Chèques</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="d-flex justify-content-between mb-2 small">
                            <span class="text-muted">Solde actuel</span>
                            <span class="text-dark fw-semibold">€42,650.75</span>
                        </div>
                        <div class="progress rounded-pill" style="height: 8px;">
                            <div class="progress-bar bg-secondary" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white border-0 p-3">
                    <a href="#" class="btn btn-sm btn-outline-secondary w-100 rounded-pill">
                        <i class="bi bi-cash-coin me-1"></i> Rapprochement bancaire
                    </a>
                </div>
            </div>
        </div>

        <!-- Contrats -->
        <div class="col-xl-4 col-md-6 draggable-item">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white py-3 px-3 border-0">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <div class="bg-dark text-white rounded p-2 me-3">
                                <i class="bi bi-briefcase fs-4"></i>
                            </div>
                            <div>
                                <h5 class="fw-semibold mb-0">Contrats</h5>
                                <small class="text-muted">Services actifs</small>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="drag-handle me-2 text-muted cursor-move">
                                <i class="bi bi-grip-vertical"></i>
                            </span>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-light rounded-circle p-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-plus-circle me-2"></i>Nouveau contrat</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-search me-2"></i>Rechercher</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="contract-stats">
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="p-3 bg-light rounded text-center">
                                    <h4 class="mb-1 fw-bold">3</h4>
                                    <small class="text-muted">Actifs</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="p-3 bg-light rounded text-center">
                                    <h4 class="mb-1 fw-bold">1</h4>
                                    <small class="text-muted">À activer</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="d-flex align-items-center p-3 bg-light rounded mb-2">
                            <div class="bg-success bg-opacity-25 text-success rounded p-1 me-3 d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                <i class="bi bi-check-circle"></i>
                            </div>
                            <div>
                                <h6 class="mb-1 fw-semibold">Maintenance mensuelle</h6>
                                <small class="text-muted">Renouvellement: 15/03/2025</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white border-0 p-3">
                    <a href="#" class="btn btn-sm btn-dark w-100 rounded-pill">
                        <i class="bi bi-eye me-1"></i> Voir tous les contrats
                    </a>
                </div>
            </div>
        </div>

        <!-- Tableau des derniers produits/services -->
        <div class="col-12 draggable-item">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3 px-3 border-0">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <div class="bg-primary text-white rounded p-2 me-3">
                                <i class="bi bi-box-seam fs-4"></i>
                            </div>
                            <div>
                                <h5 class="fw-semibold mb-0">Les 3 derniers produits/services modifiés</h5>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="drag-handle me-2 text-muted cursor-move">
                                <i class="bi bi-grip-vertical"></i>
                            </span>
                            <button class="btn btn-sm btn-light me-1" title="Actualiser">
                                <i class="bi bi-arrow-clockwise"></i>
                            </button>
                            <button class="btn btn-sm btn-light" title="Fermer">
                                <i class="bi bi-x-lg"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="py-2 px-3 border-0">Référence</th>
                                    <th class="py-2 px-3 border-0">Libellé</th>
                                    <th class="py-2 px-3 border-0 text-end">Prix</th>
                                    <th class="py-2 px-3 border-0">Type</th>
                                    <th class="py-2 px-3 border-0">Date</th>
                                    <th class="py-2 px-3 border-0 text-center" colspan="2">Statut</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="py-2 px-3">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-box text-warning me-2"></i>
                                            <span>CHR_DV</span>
                                        </div>
                                    </td>
                                    <td class="py-2 px-3">CHARGE DIVERS</td>
                                    <td class="py-2 px-3 text-end">0,00</td>
                                    <td class="py-2 px-3">HT</td>
                                    <td class="py-2 px-3">20/02/2025</td>
                                    <td class="py-2 px-3 text-center"><i class="bi bi-circle"></i></td>
                                    <td class="py-2 px-3 text-center"><i class="bi bi-circle-fill text-success"></i></td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-3">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-box text-warning me-2"></i>
                                            <span>MAT-CUISINE</span>
                                        </div>
                                    </td>
                                    <td class="py-2 px-3">matériel et outil de ...</td>
                                    <td class="py-2 px-3 text-end">0,00</td>
                                    <td class="py-2 px-3">HT</td>
                                    <td class="py-2 px-3">10/02/2025</td>
                                    <td class="py-2 px-3 text-center"><i class="bi bi-circle-fill text-success"></i></td>
                                    <td class="py-2 px-3 text-center"><i class="bi bi-circle-fill text-success"></i></td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-3">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-box text-warning me-2"></i>
                                            <span>ARD</span>
                                        </div>
                                    </td>
                                    <td class="py-2 px-3">ARDOISE NOIRE</td>
                                    <td class="py-2 px-3 text-end">0,00</td>
                                    <td class="py-2 px-3">HT</td>
                                    <td class="py-2 px-3">06/02/2025</td>
                                    <td class="py-2 px-3 text-center"><i class="bi bi-circle"></i></td>
                                    <td class="py-2 px-3 text-center"><i class="bi bi-circle-fill text-success"></i></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


@push('scripts')
<!-- jsDelivr -->
<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
<!-- CDNJS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>
@endpush
