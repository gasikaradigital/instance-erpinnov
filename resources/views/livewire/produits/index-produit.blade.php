{{-- resources/views/livewire/produits/index.blade.php --}}
<div>
    @section('vendor-style')
    @vite([
        'resources/assets/vendor/libs/select2/select2.scss',
        'resources/assets/vendor/libs/@form-validation/form-validation.scss'
    ])
    @endsection

    @section('vendor-script')
    @vite([
        'resources/assets/vendor/libs/moment/moment.js',
        'resources/assets/vendor/libs/select2/select2.js',
        'resources/assets/vendor/libs/@form-validation/popular.js',
        'resources/assets/vendor/libs/@form-validation/bootstrap5.js',
        'resources/assets/vendor/libs/@form-validation/auto-focus.js'
    ])
    @endsection

    <div class="container-xxl flex-grow-1 container-p-y">
        <livewire:produits.statistique-produits />
        <!-- Liste des Produits/Services -->
        <div class="card">
            <div class="card-header border-bottom">
                <div class="d-flex justify-content-between align-items-center row">
                    <div class="col-sm-6 col-8">
                        <h5 class="card-title mb-0">Liste des Produits/Services</h5>
                    </div>
                    <div class="col-sm-6 col-4 text-end">
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ti ti-plus me-1"></i>
                                <span class="d-none d-sm-inline-block">Nouveau</span>
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="{{ route('create-produits', ['type' => 'product']) }}"
                                    >
                                        <i class="ti ti-box me-1"></i>
                                        Produit
                                    </a>
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="{{ route('create-services', ['type' => 'service']) }}"
                                    >
                                        <i class="ti ti-tools me-1"></i>
                                        Service
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Filtres -->
                <div class="row g-3 mt-3">
                    <div class="col-md-3">
                        <select class="form-select">
                            <option value="">Type</option>
                            <option value="product">Produit</option>
                            <option value="service">Service</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select">
                            <option value="">Statut</option>
                            <option value="on_sale">En vente</option>
                            <option value="off_sale">Hors vente</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select">
                            <option value="">Stock</option>
                            <option value="in_stock">En stock</option>
                            <option value="out_stock">Rupture</option>
                            <option value="alert">Alerte stock</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="ti ti-search"></i></span>
                            <input type="text" class="form-control" placeholder="Rechercher...">
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Réf.</th>
                            <th>Libellé</th>
                            <th>Prix HT</th>
                            <th>Prix TTC</th>
                            <th>Stock</th>
                            <th>Statut</th>
                            <th>Type</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><span class="fw-medium">PRD-001</span></td>
                            <td>Produit test</td>
                            <td>99.99 €</td>
                            <td>119.99 €</td>
                            <td>
                                <span class="badge bg-label-success">50</span>
                            </td>
                            <td>
                                <span class="badge bg-label-primary">En vente</span>
                            </td>
                            <td>
                                <span class="badge bg-label-info">Produit</span>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="ti ti-dots-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0);">
                                            <i class="ti ti-eye me-1"></i> Voir
                                        </a>
                                        <a class="dropdown-item" href="javascript:void(0);">
                                            <i class="ti ti-pencil me-1"></i> Modifier
                                        </a>
                                        <a class="dropdown-item text-danger" href="javascript:void(0);">
                                            <i class="ti ti-trash me-1"></i> Supprimer
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="card-footer">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="pagination-info">
                        <span>Affichage de 1 à 10 sur 100 entrées</span>
                    </div>
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <li class="page-item prev">
                                <a class="page-link" href="javascript:void(0);"><i class="ti ti-chevron-left"></i></a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="javascript:void(0);">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0);">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0);">3</a>
                            </li>
                            <li class="page-item next">
                                <a class="page-link" href="javascript:void(0);"><i class="ti ti-chevron-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

</div>
