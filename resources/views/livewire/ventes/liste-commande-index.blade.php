<div class="container-xxl">
    <!-- En-tête avec titre et bouton d'ajout -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold m-0">Commandes <span class="text-muted">(0)</span></h4>
        <a href="{{ route('commande') }}" class="btn btn-primary">
            <i class="ti ti-plus me-1"></i> Nouvelle commande
        </a>
        
    </div>

    <!-- Filtres -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-3">
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary dropdown-toggle w-100 text-start" type="button">
                            <i class="fas fa-user me-2"></i>
                            Tiers ayant pour commercial
                        </button>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary dropdown-toggle w-100 text-start" type="button">
                            <i class="fas fa-user me-2"></i>
                            Liés à un contact utilisateur...
                        </button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex gap-2">
                        <select class="select2 form-select" wire:model="">
                            <option value="">Rechercher par ...</option>
                            <option value="5">Réf</option>
                            <option value="6">Ref projet</option>
                            <option value="8">Tiers</option>
                            <option value="">Facturé</option>
                            <option value="7">Etat</option>
                        </select>
                        <input type="text" class="form-control" wire:model="" placeholder="Saisir ici ..." />
                        <button class="btn btn-primary" wire:click="search">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Tableau -->
    <div class="card">
        <div class="card-body">
            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="w-px-50">
                                <input type="checkbox" class="form-check-input">
                            </th>
                            <th>
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-sort me-2"></i>
                                    Réf.
                                </div>
                            </th>
                            <th>Tiers</th>
                            <th>Dt de comm.</th>
                            <th>Dt prév. livr.</th>
                            <th>Montant HT</th>
                            <th>Auteur</th>
                            <th>Expédiable</th>
                            <th>Déja dépensé</th>
                            <th>Facturé</th>
                            <th>État</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="checkbox" class="form-check-input">
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <span class="text-success me-2"><i class="fas fa-square"></i></span>
                                    <span>(PROV2)</span>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <span class="text-primary me-2"><i class="fas fa-building"></i></span>
                                    <span>FIBASOM (FIBASOM)</span>
                                </div>
                            </td>
                            <td>16/02/2025</td>
                            <td></td>
                            <td class="text-end">0,00</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="/api/placeholder/24/24" class="rounded-circle me-2" alt="avatar">
                                    <span>Jonastino</span>
                                </div>
                            </td>
                            <td></td>
                            <td class="text-end">100%</td>
                            <td></td>
                            <td>
                                <span class="badge bg-secondary">Brouillon</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-between align-items-center mt-3">
                <div class="d-flex align-items-center">
                    <span class="me-2">Afficher</span>
                    <select class="form-select" style="width: 100px;">
                        <option value="100">100</option>
                    </select>
                    <span class="ms-2">entrées</span>
                </div>
                <div class="btn-group">
                    <button class="btn btn-outline-secondary">
                        <i class="fas fa-list"></i>
                    </button>
                    <button class="btn btn-outline-secondary">
                        <i class="fas fa-th"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
