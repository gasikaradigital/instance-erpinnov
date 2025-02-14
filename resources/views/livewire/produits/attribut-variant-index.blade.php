<link rel="stylesheet" href="{{ asset('css/custom.css') }}">

<div class="container mt-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="d-flex align-items-center">
            <i class="fas fa-box text-success me-2"></i>
            <h4 class="fw-bold py-3 mb-2">Attributs de variantes pour les produits et les services</h4>
        </div>

        <div class="d-flex gap-2 align-items-center action-menu">
            <select class="form-select" style="width: 250px;">
                <option>-- Sélectionner l'action --</option>
                <option>Re-générer le PDF</option>
                <option>Modifier la valeur d'un extrafield</option>
                <option>Augmenter/diminuer le prix client</option>
                <option>Basculer le statut En vente</option>
                <option>Basculer le statut En achat</option>
                <option>Affecter un tag/catégorie</option>
                <option data-icon="fas fa-trash-alt">Supprimer</option>
            </select>

            <button class="btn btn-secondary">CONFIRMER</button>
        </div>

        <div class="d-flex gap-2">
            <select class="form-select" style="width: 110px;">
                <option>10</option>
                <option>15</option>
                <option>20</option>
                <option>25</option>
                <option>50</option>
                <option>100</option>
                <option>250</option>
                <option>500</option>
                <option>1000</option>
                <option>5000</option>
                <option>10000</option>
            </select>
            <button class="btn btn-outline-secondary" id="listView">
                <i class="fas fa-bars"></i>
            </button>
            <button class="btn btn-outline-secondary" id="gridView">
                <i class="fas fa-th-large"></i>
            </button>
            <button class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nouveau attribut">
                <a href="{{ route('create-attribut') }}" class="btn btn-primary">
                    <i class="ti ti-plus"></i>
                </a>
            </button>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <!-- Table View -->
            <div class="table-view active">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" class="form-check-input" id="selectAll">
                                </th>
                                <th>Réf</th>
                                <th>Libellé</th>
                                <th>Nombre de valeurs différentes</th>
                                <th>Nombre de produits</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input type="checkbox" class="form-check-input row-checkbox">
                                </td>
                                <td>ATR-001</td>
                                <td>Couleur</td>
                                <td>10</td>
                                <td>50</td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" class="form-check-input row-checkbox">
                                </td>
                                <td>ATR-002</td>
                                <td>Taille</td>
                                <td>5</td>
                                <td>30</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Grid View -->
            <div class="grid-view">
                <div class="row mt-3">
                    <div class="col-md-3">
                        <div class="product-card">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <div class="product-icon">
                                    <i class="fas fa-tags text-warning fa-2x"></i>
                                </div>
                                <input type="checkbox" class="form-check-input row-checkbox">
                            </div>
                            <div class="product-details">
                                <h6 class="mb-1">ATR-001</h6>
                                <p class="text-muted mb-1">Couleur</p>
                                <p class="text-muted mb-1">10 valeurs</p>
                                <p class="text-success">50 produits</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="product-card">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <div class="product-icon">
                                    <i class="fas fa-tags text-warning fa-2x"></i>
                                </div>
                                <input type="checkbox" class="form-check-input row-checkbox">
                            </div>
                            <div class="product-details">
                                <h6 class="mb-1">ATR-002</h6>
                                <p class="text-muted mb-1">Taille</p>
                                <p class="text-muted mb-1">5 valeurs</p>
                                <p class="text-success">30 produits</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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


<script>
document.addEventListener('DOMContentLoaded', function() {
    const actionMenu = document.querySelector('.action-menu');
    
    function updateActionMenu() {
        const checkedBoxes = document.querySelectorAll('.row-checkbox:checked');
        console.log('Cases cochées:', checkedBoxes.length); // Ajout d'un log pour vérifier
        if (checkedBoxes.length > 0) {
            actionMenu.classList.add('visible');
        } else {
            actionMenu.classList.remove('visible');
        }
    }

    // Gestion des vues
    const gridViewBtn = document.getElementById('gridView');
    const listViewBtn = document.getElementById('listView');
    const gridView = document.querySelector('.grid-view');
    const tableView = document.querySelector('.table-view');

    gridViewBtn.addEventListener('click', function() {
        gridView.classList.add('active');
        tableView.classList.remove('active');
        gridViewBtn.classList.add('active');
        listViewBtn.classList.remove('active');
    });

    listViewBtn.addEventListener('click', function() {
        tableView.classList.add('active');
        gridView.classList.remove('active');
        listViewBtn.classList.add('active');
        gridViewBtn.classList.remove('active');
    });

    // Gestion des checkboxes
    const selectAllCheckbox = document.getElementById('selectAll');
    const rowCheckboxes = document.querySelectorAll('.row-checkbox');

    selectAllCheckbox.addEventListener('change', function() {
        rowCheckboxes.forEach(checkbox => {
            checkbox.checked = selectAllCheckbox.checked;
        });
        updateActionMenu(); // Appel de la fonction pour vérifier la visibilité du menu
    });

    rowCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            if (!checkbox.checked) {
                selectAllCheckbox.checked = false;
            } else if (Array.from(rowCheckboxes).every(cb => cb.checked)) {
                selectAllCheckbox.checked = true;
            }
            updateActionMenu(); // Appel de la fonction pour vérifier la visibilité du menu
        });
    });
});

</script>