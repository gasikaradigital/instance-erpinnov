<!-- resources/views/products/index.blade.php -->

<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
<div class="container-flux p-6 mt-4">
    <div class="row mb-4">
        <div class="col">
            <div class="d-flex align-items-center">
                <i class="fas fa-box text-success me-2"></i>
                <h4 class="mb-0">Produits en stocks</h4>
            </div>
        </div>
        <div class="col-auto">
            <select class="form-select">
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-3">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-tag"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="Rechercher...">
                        <button class="btn btn-outline-secondary" type="button">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="stockInsuffisant">
                        <label class="form-check-label" for="stockInsuffisant">
                            Stock insuffisant
                        </label>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>
                                <div class="dropdown">
                                    <button class="btn btn-link text-dark p-0" data-bs-toggle="dropdown">
                                        Réf.
                                        <i class="fas fa-sort ms-1"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Croissant</a></li>
                                        <li><a class="dropdown-item" href="#">Décroissant</a></li>
                                    </ul>
                                </div>
                              
                            </th>
                            <th>Libellé</th>
                            <th>Limite stock pour alerte</th>
                            <th>Stock désiré optimal</th>
                            <th>Stock physique</th>
                            <th>
                                Stock virtuel
                                <i class="fas fa-info-circle text-muted" data-bs-toggle="tooltip" title="Stock incluant les commandes en cours"></i>
                            </th>
                            <th>En vente</th>
                            <th>En achat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Exemple de ligne -->
                        <tr>
                            <td>PRD001</td>
                            <td>Produit exemple</td>
                            <td>10</td>
                            <td>50</td>
                            <td>25</td>
                            <td>30</td>
                            <td>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" checked>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <nav aria-label="Page navigation" class="mt-4">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Précédent</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Suivant</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>






<script>
    // Initialiser les tooltips Bootstrap
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
