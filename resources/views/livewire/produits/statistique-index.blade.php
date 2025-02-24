<div class="container-flux p-6 py-4">
    <!-- Header -->
    <div>
        <div class="d-flex align-items-center mb-4">
            <div class="me-2">
                <i class="fas fa-cube text-success"></i>
            </div>
            <h1 class="h4 mb-0">Statistiques</h1>
        </div>

        <!-- Tabs -->
        <ul class="nav nav-tabs mb-4" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" href="#graphique" role="tab" data-bs-toggle="tab">Graphique</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#produits-popularite" role="tab" data-bs-toggle="tab">Produits par
                    popularité</a>
            </li>
        </ul>

        <div class="tab-content">
            <!-- Graphique Tab -->
            <div class="tab-pane fade show active" id="graphique">
                <!-- Filtre -->
                <div class="card mb-4">
                    <div class="card-header py-2 bg-light">
                        <h5 class="mb-0">Filtre</h5>
                    </div>
                    <div class="card-body mt-3">
                        <form>
                            <div class="row g-3">
                                <!-- Exemple de filtre -->
                                <div class="col-md-2">
                                    <label for="type" class="form-label">Type</label>
                                    <select id="type" class="form-select" aria-label="Sélectionnez un type">
                                        <option>Sélectionner</option>
                                        <option>Produit</option>
                                        <option>Service</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Produit ou Service</label>
                                    <select class="form-select">
                                        <option selected>Sélectionner...</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Tags/catégories</label>
                                    <select class="form-select">
                                        <option selected>Sélectionner...</option>
                                        <option>-- Sans tag/catégorie</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Tiers</label>
                                    <select class="form-select">
                                        <option selected>Sélectionner...</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Année</label>
                                    <select class="form-select">
                                        <option selected>2025</option>
                                        <option>2024</option>
                                        <option>2023</option>
                                        <option>2022</option>
                                        <option>2021</option>
                                        <option>2020</option>
                                        <option>2019</option>
                                        <option>2018</option>
                                        <option>2017</option>
                                        <option>2016</option>
                                    </select>
                                </div>
                                <div class="col-md-2 d-flex align-items-end">
                                    <button type="button" class="btn btn-secondary w-100">
                                        Rafraîchir
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Statistiques Boutons -->
                <div class="row mb-4">
                    <div class="col-md-4">
                        <button type="button" class="btn btn-primary w-100 active">
                            <i class="fas fa-chart-bar me-2"></i> Somme des quantités
                        </button>
                    </div>
                    <div class="col-md-4">
                        <button type="button" class="btn btn-outline-primary w-100">
                            Nombre d'entités référentes
                        </button>
                    </div>
                    <div class="col-md-4">
                        <button type="button" class="btn btn-outline-primary w-100">
                            Montant des produits
                        </button>
                    </div>
                </div>

                <!-- Graphique Cards -->
                <div class="row">
                    <!-- Exemple de card -->
                    <div class="col-md-6 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h6 class="card-title mb-0">Nombre d'unités sur Proposals</h6>
                                    <button class="btn btn-sm btn-link">
                                        <i class="fas fa-sync"></i>
                                    </button>
                                </div>
                                <div class="text-center mb-3">
                                    <img src="{{ asset('assets/img/graph.png') }}" alt="Description de l'image"
                                        class="img-fluid" style="max-height: 200px;">
                                </div>
                                <canvas id="proposalsChart" height="35"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6  mt-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h6 class="card-title mb-0">Nombre d'unités sur Propositions commerciales
                                        fournisseurs</h6>
                                    <button class="btn btn-sm btn-link">
                                        <i class="fas fa-sync"></i>
                                    </button>
                                </div>
                                <div class="text-center mb-3">
                                    <img src="{{ asset('assets/img/graph.png') }}" alt="Description de l'image"
                                        class="img-fluid" style="max-height: 200px;">
                                </div>
                                <canvas id="proposalsChart" height="35"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6  mt-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h6 class="card-title mb-0">Nombre d'unités sur Commandes</h6>
                                    <button class="btn btn-sm btn-link">
                                        <i class="fas fa-sync"></i>
                                    </button>
                                </div>
                                <div class="text-center mb-3">
                                    <img src="{{ asset('assets/img/graph.png') }}" alt="Description de l'image"
                                        class="img-fluid" style="max-height: 200px;">
                                </div>
                                <canvas id="proposalsChart" height="35"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6  mt-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h6 class="card-title mb-0">Nombre d'unités sur Commandes fournisseurs</h6>
                                    <button class="btn btn-sm btn-link">
                                        <i class="fas fa-sync"></i>
                                    </button>
                                </div>
                                <div class="text-center mb-3">
                                    <img src="{{ asset('assets/img/graph.png') }}" alt="Description de l'image"
                                        class="img-fluid" style="max-height: 200px;">
                                </div>
                                <canvas id="proposalsChart" height="35"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6  mt-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h6 class="card-title mb-0">Nombre d'unités sur Factures</h6>
                                    <button class="btn btn-sm btn-link">
                                        <i class="fas fa-sync"></i>
                                    </button>
                                </div>
                                <div class="text-center mb-3">
                                    <img src="{{ asset('assets/img/graph.png') }}" alt="Description de l'image"
                                        class="img-fluid" style="max-height: 200px;">
                                </div>
                                <canvas id="proposalsChart" height="35"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6  mt-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h6 class="card-title mb-0">Nombre d'unités sur Factures fournisseurs</h6>
                                    <button class="btn btn-sm btn-link">
                                        <i class="fas fa-sync"></i>
                                    </button>
                                </div>
                                <div class="text-center mb-3">
                                    <img src="{{ asset('assets/img/graph.png') }}" alt="Description de l'image"
                                        class="img-fluid" style="max-height: 200px;">
                                </div>
                                <canvas id="proposalsChart" height="35"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6  mt-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h6 class="card-title mb-0">Nombre d'unités sur Contacts</h6>
                                    <button class="btn btn-sm btn-link">
                                        <i class="fas fa-sync"></i>
                                    </button>
                                </div>
                                <div class="text-center mb-3">
                                    <img src="{{ asset('assets/img/graph.png') }}" alt="Description de l'image"
                                        class="img-fluid" style="max-height: 200px;">
                                </div>
                                <canvas id="proposalsChart" height="35"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6  mt-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h6 class="card-title mb-0">Nombre d'unités sur Contacts fournisseurs</h6>
                                    <button class="btn btn-sm btn-link">
                                        <i class="fas fa-sync"></i>
                                    </button>
                                </div>
                                <div class="text-center mb-3">
                                    <img src="{{ asset('assets/img/graph.png') }}" alt="Description de l'image"
                                        class="img-fluid" style="max-height: 200px;">
                                </div>
                                <canvas id="proposalsChart" height="35"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Produits Popularité -->
            <div class="tab-pane fade" id="produits-popularite">
                <div class="card">
                    <div class="card-header py-2 bg-light d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Liste des produits par popularité</h5>
                        <div class="d-flex gap-2">
                            <select class="form-select form-select-sm" style="width: 200px;">
                                <option></option>
                                <option>Propositions commerciales</option>
                                <option>Orders</option>
                                <option>Facture</option>
                            </select>
                            <button class="btn btn-secondary btn-sm">Rechercher</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Réf.</th>
                                        <th>Type</th>
                                        <th>Libellé</th>
                                        <th class="text-end">Qté</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="4" class="text-center">
                                            Sélectionnez un objet pour voir les statistiques
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
