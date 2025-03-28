
    <!-- Bootstrap CSS -->
    <!-- Font Awesome pour les icônes -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <div class="container-fluid mt-3">
        <!-- En-tête avec titre et boutons -->
        <div class="d-flex align-items-center mb-3">
            <div class="d-flex align-items-center">
                <i class="fas fa-file-invoice fa-xl mb-2 me-2"></i>
                <h2 class="fw-bold fs-3 mb-2">Propositions commerciales </h2>
                <span class="badge text-dark mb-2 fs-3">(2)</span>
            </div>
            <div>
                <div class="dropdown d-inline-block me-2">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="affichageDropdown" data-bs-toggle="dropdown">
                        20
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="affichageDropdown">
                        <li><a class="dropdown-item" href="#">10</a></li>
                        <li><a class="dropdown-item" href="#">20</a></li>
                        <li><a class="dropdown-item" href="#">50</a></li>
                    </ul>
                </div>
                <button class="btn btn-outline-secondary me-2">
                    <i class="fas fa-list"></i>
                </button>
                <button class="btn btn-outline-secondary me-2">
                    <i class="fas fa-th-large"></i>
                </button>
                <button class="btn btn-primary rounded-circle">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>

        <!-- Filtres de recherche -->
        <div class="card mb-3">
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-2">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <select class="form-select">
                                <option selected>Tiers ayant pour commercial</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <select class="form-select">
                                <option selected>Lié à un contact utilisateur...</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-box"></i></span>
                            <select class="form-select">
                                <option selected>Comprenant des produits/services avec...</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-tag"></i></span>
                            <select class="form-select">
                                <option selected>Tags/catégories clients/prosp...</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row g-3 mt-2">
                    <div class="col-md-2">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Rechercher...">
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="input-group">
                            <span class="input-group-text">Du</span>
                            <input type="date" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="input-group">
                            <span class="input-group-text">au</span>
                            <input type="date" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="input-group">
                            <span class="input-group-text">Du</span>
                            <input type="date" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="input-group">
                            <span class="input-group-text">au</span>
                            <input type="date" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tableau des propositions -->
        <div class="card">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="align-middle" style="width: 30px;">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="checkAll">
                                </div>
                            </th>
                            <th class="align-middle">
                                <a href="#" class="text-decoration-none text-dark">
                                    <i class="fas fa-sort-down"></i> Réf
                                </a>
                            </th>
                            <th class="align-middle">Tiers</th>
                            <th class="align-middle">Date de proposition</th>
                            <th class="align-middle">Date fin</th>
                            <th class="align-middle">Montant HT</th>
                            <th class="align-middle">Auteur</th>
                            <th class="align-middle">État</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="align-middle">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td class="align-middle">
                                <a href="#" class="text-decoration-none">
                                    <i class="fas fa-file-alt text-success"></i> (PROV14)
                                </a>
                            </td>
                            <td class="align-middle">
                                <a href="#" class="text-decoration-none">
                                    <i class="fas fa-building text-primary"></i> tiera (tiers)
                                </a>
                            </td>
                            <td class="align-middle">13/03/2025</td>
                            <td class="align-middle">13/03/2025</td>
                            <td class="align-middle">0,00</td>
                            <td class="align-middle">
                                <a href="#" class="text-decoration-none">
                                    <i class="fas fa-user text-secondary"></i> SuperAdmin
                                </a>
                            </td>
                            <td class="align-middle">
                                <span class="badge bg-light text-dark">Brouillon</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="align-middle">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td class="align-middle">
                                <a href="#" class="text-decoration-none">
                                    <i class="fas fa-file-alt text-success"></i> (PROV13)
                                </a>
                            </td>
                            <td class="align-middle">
                                <a href="#" class="text-decoration-none">
                                    <i class="fas fa-building text-primary"></i> tiera (tiers)
                                </a>
                            </td>
                            <td class="align-middle">13/03/2025</td>
                            <td class="align-middle">13/03/2025</td>
                            <td class="align-middle">0,00</td>
                            <td class="align-middle">
                                <a href="#" class="text-decoration-none">
                                    <i class="fas fa-user text-secondary"></i> SuperAdmin
                                </a>
                            </td>
                            <td class="align-middle">
                                <span class="badge bg-light text-dark">Brouillon</span>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5" class="text-start">Total</td>
                            <td>0,00</td>
                            <td colspan="2"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS avec Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script pour le fonctionnement du tableau -->
    <script>
        // Sélectionner/désélectionner tous les éléments
        document.getElementById('checkAll').addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('tbody .form-check-input');
            checkboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });

        document.getElementById('checkAllTiers').addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('tbody .form-check-input');
            checkboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });

        // Fonctionnalité de tri (à implémenter selon vos besoins)
        document.querySelectorAll('th a').forEach(header => {
            header.addEventListener('click', function(e) {
                e.preventDefault();
                // Implémentez ici la logique de tri
                console.log('Tri par ' + this.textContent.trim());
            });
        });

        // Fonctionnalité pour les filtres dropdown
        document.querySelectorAll('.dropdown-item').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                const dropdownButton = this.closest('.dropdown').querySelector('.dropdown-toggle');
                dropdownButton.textContent = this.textContent;
                // Implémentez ici la logique de filtrage
                console.log('Filtre: ' + this.textContent);
            });
        });
    </script>
