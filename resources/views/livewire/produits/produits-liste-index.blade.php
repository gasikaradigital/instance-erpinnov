
<link rel="stylesheet" href="{{ asset('css/custom.css') }}">

<div class="container-flux p-6 mt-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="d-flex align-items-center">
            <i class="fas fa-box text-success me-2"></i>
            <h4 class="fw-bold py-3 mb-2">Liste des produits et services </h4>
        </div>

      
            <!-- Menu d'action -->
            <div class="d-flex gap-2 align-items-center action-menu">
                <select class="form-select" style="width: 250px;">
                    <option>-- Sélectionner l'action --</option>
                    <option>Re-générer le PDF</option>
                    <option>Modifier la valeur d'un extrafield</option>
                    <option>Augmenter/diminuer le prix client</option>
                    <option>Basculer le statut En vente</option>
                    <option>Basculer le statut En achat</option>
                    <option>Affecter un tag/catégorie</option>
                    <option  data-icon="fas fa-trash-alt">Supprimer</option>
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
            <button class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ __('Nouveau produit') }}">
                <a href="{{ route('create-produits') }}" class="btn btn-primary">
                    <i class="ti ti-plus"></i>
                </a>
            </button>
        
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-tag"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="Tag/catégorie">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="showVariants">
                        <label class="form-check-label" for="showVariants">
                            Afficher les variantes de produits
                        </label>
                    </div>
                </div>
            </div>

            <!-- Table View -->
            <div class="table-view active">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" class="form-check-input" id="selectAll">
                                </th>
                                <th>Réf. prod</th>
                                <th>Libellé</th>
                                <th>Prix de vent.</th>
                                <th>Prix de vente min.</th>
                                <th>Prix d'ach'.</th>
                                <th>Stock désiré opti.</th>
                                <th>Stock phy.</th>
                                <th>Stock vir.</th>
                                <th>État (Vente)</th>
                                <th>État (Achat)</th>
                                </tr>
                            </tr>
                        </thead>
                        @if(count($data ?? []) > 0)
                        @foreach($data as $produit)
                        <tbody>
                            <tr>
                                <td>
                                    <input type="checkbox" class="form-check-input row-checkbox">
                                </td>
                                <td><i class="fas fa-box text-warning me-1"></i> {{ $produit->ref }}</td>
                                <td>{{ $produit->label }}</td>
                                <td>{{ $produit->price }}</td>
                                <td>{{ $produit->price_min }} HT</td>
                                <td>@if($produit->buyprice == null)
                                        <span>0</span>
                                    @else
                                        <span>{{ $produit->buyprice }}</span>
                                    @endif
                                </td>
                                <td>{{ $produit->desiredstock }}</td>
                                <td>
                                    @if($produit->stock_reel == null)
                                        <span>0</span>
                                    @else
                                        <span>{{ $produit->stock_reel }}</span>
                                    @endif
                                </td>
                                <td>@if($produit->stock_theorique == null)
                                        <span>0</span>
                                    @else
                                        <span>{{ $produit->stock_reel }}</span>
                                    @endif
                                </td>
                                <td>
                                    @if($produit->status == 1)
                                        <span class="badge bg-success">En vente</span>
                                    @else
                                        <span class="badge bg-secondary">Hors vente</span>
                                    @endif
                                </td>
                                <td>
                                    @if($produit->status_buy == 1)
                                        <span class="badge bg-success">En achat</span>
                                    @else
                                        <span class="badge bg-secondary">Hors achat</span>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                        @endif
                    </table>
                </div>
            </div>

            <!-- Grid View -->
            
            <div class="grid-view">
                <div class="table-view active">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" class="form-check-input" id="selectAll">
                                    </th>
                                    <th>Réf. prod</th>
                                <th>Libellé</th>
                                <th>Prix de vent.</th>
                                <th>Meilleur pr de vent.</th>
                                <th>Prix d'ach'.</th>
                                <th>Meilleur pr d'ach.</th>
                                <th>Stock désiré opti.</th>
                                <th>Stock phy.</th>
                                <th>Stock vir.</th>
                                <th>État (Vente)</th>
                                <th>État (Achat)</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="row mt-3 ">
                    <div class="col-md-3">
                        <div class="product-card ">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <div class="product-icon">
                                    <i class="fas fa-box text-warning fa-2x"></i>
                                </div>
                                <input type="checkbox" class="form-check-input row-checkbox">
                            </div>
                            <div class="product-details">
                                <h6 class="mb-1">PRD-001</h6>
                                <p class="text-muted mb-1">serve</p>
                                <p class="text-success mb-2">0,00 HT</p>
                                <div class="d-flex align-items-center mb-2">
                                    <span class="text-muted me-2">0</span>
                                    <div class="status-dots">
                                        <span class="status-dot"></span>
                                        <span class="status-dot"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="product-card">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <div class="product-icon">
                                    <i class="fas fa-box text-warning fa-2x"></i>
                                </div>
                                <input type="checkbox" class="form-check-input row-checkbox">
                            </div>
                            <div class="product-details">
                                <h6 class="mb-1">PRD-002</h6>
                                <p class="text-muted mb-1">test</p>
                                <p class="text-success mb-2">0,00 HT</p>
                                <div class="d-flex align-items-center mb-2">
                                    <span class="text-muted me-2">0</span>
                                    <div class="status-dots">
                                        <span class="status-dot"></span>
                                        <span class="status-dot"></span>
                                    </div>
                                </div>
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