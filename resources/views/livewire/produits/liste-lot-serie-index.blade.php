
<link rel="stylesheet" href="{{ asset('css/custom.css') }}">

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>
            <i class="fas fa-barcode me-2"></i>
            Liste des numéros de lots/séries 
        </h4>
        <div class="d-flex gap-2">
            <div class="dropdown">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    20
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#">10</a></li>
                    <li><a class="dropdown-item" href="#">20</a></li>
                    <li><a class="dropdown-item" href="#">50</a></li>
                </ul>
            </div>
            <button class="btn btn-primary">
                <a  href="{{ Route('create-lot-serie') }}"><i class="fas fa-plus"></i></a>
            </button>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-view active">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" class="form-check-input" id="selectAll">
                                </th>
                                <th>Produit</th>
                                <th>Lot/Série</th>
                                <th>DLC</th>
                                <th>DMD/DLUO</th>
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

