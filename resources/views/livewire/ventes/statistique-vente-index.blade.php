<link rel="stylesheet" href="{{ asset('css/custom.css') }}">

<div class="container-xxl">
    <h4 class="fw-bold py-3 mb-4">Statistiques des propositions de ventes</h4>

    <!-- Navigation par onglets -->
    <ul class="nav nav-tabs mb-4">
        <li class="nav-item">
            <a class="nav-link active" href="#">Par mois/année</a>
        </li>
    </ul>

    <div class="row">
        <!-- Zone des filtres -->
        <div class="col-12 col-xl-7 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Filtre</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Tiers</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-building"></i>
                            </span>
                            <select class="form-select">
                                <option value="">Sélectionner un tiers</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Type du tiers</label>
                        <select class="form-select">
                            <option value="">Sélectionner </option>
                            <option value="">Administration </option>
                            <option value="">Autre </option>
                            <option value="">Grand compte </option>
                            <option value="">PME/PMI </option>
                            <option value="">Particulier </option>
                            <option value="">TPE </option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tag/catégorie client</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-tag"></i>
                            </span>
                            <select class="form-select">
                                <option value="">Sélectionner une catégorie</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Créé par</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-user"></i>
                            </span>
                            <select class="form-select">
                                <option value="">Tafitasoa Tsiky Jonastino HERINIANTSOA</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">État</label>
                        <select class="form-select">
                            <option value="">Sélectionner</option>
                            <option value="">Brouillon (à valider)</option>
                            <option value="">Validée (proposition ouverte)</option>
                            <option value="">Signée (à facturer)</option>
                            <option value="">Non signée (fermée)</option>
                            <option value="">Facturée</option>
                            <option value="">Signée (à facturer) ou Facturée</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Année</label>
                        <select class="form-select">
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                        </select>
                    </div>

                    <button class="btn btn-primary w-100">
                        Rafraîchir
                    </button>
                </div>
            </div>
            <!-- Tableau récapitulatif -->
            <div class="card mt-5">
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th>Année</th>
                                <th>Nb de propos. de vent.</th>
                                <th>%</th>
                                <th>Montant TL</th>
                                <th>%</th>
                                <th>Montant moyen</th>
                                <th>%</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Les données seront insérées ici dynamiquement -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Zone des graphiques -->
        <div class="col-12 col-xl-5">
            <!-- Graphiques -->
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Nombre par mois</h5>
                        </div>
                        <div class="card-body ">
                            <div class="chart-legend mb-2 d-flex justify-content-center align-items-center">
                                <span class="badge bg-primary me-2">2023</span>
                                <span class="badge bg-info me-2">2024</span>
                                <span class="badge bg-warning">2025</span>
                            </div>
                            <div>
                                <img src="{{ asset('assets/img/graph.png') }}" alt="Description de l'image"
                                    class="img-fluid" style="max-height: 300px;">

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Montant par mois (HT)</h5>
                        </div>
                        <div class="card-body">
                            <div class="chart-legend mb-2 d-flex justify-content-center align-items-center">
                                <span class="badge bg-primary me-2">2023</span>
                                <span class="badge bg-info me-2">2024</span>
                                <span class="badge bg-warning">2025</span>
                            </div>
                            <div>
                                <img src="{{ asset('assets/img/graph.png') }}" alt="Description de l'image"
                                    class="img-fluid" style="max-height: 300px;">

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Montant moyen</h5>
                        </div>
                        <div class="card-body">
                            <div class="chart-legend mb-2 d-flex justify-content-center align-items-center">
                                <span class="badge bg-primary me-2">2023</span>
                                <span class="badge bg-info me-2">2024</span>
                                <span class="badge bg-warning">2025</span>
                            </div>
                            <div>
                                <img src="{{ asset('assets/img/graph.png') }}" alt="Description de l'image"
                                    class="img-fluid" style="max-height: 300px;">

                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
