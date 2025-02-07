
<link rel="stylesheet" href="{{ asset('css/custom.css') }}">

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>
            <i class="fas fa-box me-2"></i>
            Produits (Stocks par lot/série) 
        </h4>
        <div class="dropdown">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                20
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">10</a></li>
                <li><a class="dropdown-item" href="#">20</a></li>
                <li><a class="dropdown-item" href="#">50</a></li>
            </ul>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="dropdown">
                        <select class="form-select">
                            <option value=""disabled selected>Tag/catégorie de produits</option>
                            <option value=""></option>
                            <option value="">- Sans catégorie -</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="dropdown">
                        <select class="form-select">
                            <option value=""disabled selected>Tag/catégorie de produits</option>
                            <option value=""></option>
                            <option value="">- Sans catégorie -</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="lotSerieOnly" checked>
                        <label class="form-check-label" for="lotSerieOnly">
                            Produits soumis au lot/série uniquement
                        </label>
                    </div>
                </div>
            </div>

            <div class="table-view active">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" class="form-check-input" id="selectAll">
                                </th>
                                <th>Réf. produit</th>
                                <th>Libellé</th>
                                <th>Entrepôt</th>
                                <th>Lot/Série</th>
                                <th>DLC</th>
                                <th>DMD/DLUO</th>
                                <th>Stock physique</th>
                                <th>État (Vente)</th>
                                <th>État (Achat)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="11" class="text-center">Aucun enregistrement trouvé</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>