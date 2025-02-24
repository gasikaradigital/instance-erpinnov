<div class="container-flux p-6">
    <!-- En-tête avec titre et bouton d'ajout -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold m-0">Liste des ventes <span class="text-muted"></span></h4>
        <a href="{{ route('new-proposition') }}" class="btn btn-primary">
            <i class="ti ti-plus me-1"></i> Nouveau devis
        </a>
    </div>

    <!-- Filtres -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-2">
                    <select class="select2 form-select" wire:model="" placeholder="Types">
                        <option value="">Devis </option>
                        <option value="">Commande</option>
                        <option value="">Facture</option>
                    </select>
                </div>
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
                            <option value="">Client </option>
                            <option value="">Devis validé</option>
                            <option value="">Devis en attente</option>
                            <option value="">Facture payée</option>
                            <option value="">Facture non payée</option>

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
                            <th>Client</th>
                            <th>Date</th>
                            <th>Montant</th>
                            <th>Statut</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="checkbox" class="form-check-input row-checkbox">
                            </td>
                            <td>CMD-2024-001</td>
                            <td>Client B</td>
                            <td>12/02/2024</td>
                            <td>750€</td>
                            <td>Validée</td>
                            <td><button class="btn btn-primary btn-sm">Voir</button></td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" class="form-check-input row-checkbox">
                            </td>
                            <td>DV-2024-001</td>
                            <td>Client A</td>
                            <td>10/02/2024</td>
                            <td>500€</td>
                            <td>En attente</td>
                            <td><button class="btn btn-primary btn-sm">Voir</button></td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" class="form-check-input row-checkbox">
                            </td>
                            <td>FACT-2024-002</td>
                            <td>Client D</td>
                            <td>20/02/2024</td>
                            <td>850€</td>
                            <td>Non payée</td>
                            <td><button class="btn btn-danger btn-sm">Relancer</button></td>
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
