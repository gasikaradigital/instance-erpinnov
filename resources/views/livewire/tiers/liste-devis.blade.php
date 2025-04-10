<!-- Bootstrap CSS -->
<!-- Font Awesome pour les icônes -->
<div>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <div class="container-fluid mt-3">
        <!-- En-tête avec titre et boutons -->
        <div class="d-flex align-items-center mb-3">
            <div class="d-flex align-items-center">
                <i class="fas fa-file-invoice fa-xl mb-2 me-2"></i>
                <h2 class="fw-bold fs-3 mb-2">Propositions commerciales </h2>
                <span class="badge text-dark mb-2 fs-3">({{ count($filteredProposals) }})</span>
            </div>
            <div class="d-flex align-items-center">
                <div class="dropdown">
                    <button class="btn btn-outline-secondary view-toggle me-2 " id="collumToggle"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-list"></i>
                    </button>
                    <ul class="dropdown-menu shadow-sm py-2 px-3" aria-labelledby="collumToggle">
                        <li><label class="dropdown-item"><input type="checkbox" checked> Code</label></li>
                        <li><label class="dropdown-item"><input type="checkbox" checked> Nom</label></li>
                        <li><label class="dropdown-item"><input type="checkbox" checked> Type</label></li>
                        <li><label class="dropdown-item"><input type="checkbox" checked> Nature</label></li>
                        <li><label class="dropdown-item"><input type="checkbox" checked> Email</label></li>
                        <li><label class="dropdown-item"><input type="checkbox" checked> Commerciaux</label></li>
                        <li><label class="dropdown-item"><input type="checkbox" checked> Telephone</label></li>
                        <li><label class="dropdown-item"><input type="checkbox" checked> Statut</label></li>
                        <li class="text-center mt-2">
                            <button class="btn btn-primary btn-sm">Valider</button>
                        </li>
                    </ul>
                </div>
                <select class="form-select form-select-sm me-2" style="max-width: 100px;">
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
                <button class="btn btn-primary" wire:click="dumping">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>

        <!-- Filtres de recherche -->
        <div class="card mb-3">
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-3">
                        <div class="input-group border">
                            <span class="input-group-text border-0"><i class="fas fa-user"></i></span>
                            <select class="form-select border-0" name="selectedCommercialId" wire:model.lazy='selectedCommercialId'>
                                <option value="0">Tiers ayant pour commercial</option>
                                @foreach ($commericals as $commercial)
                                    @dump($commercial)
                                    <option value="{{ $commercial->id }}">{{ $commercial->display_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group border">
                            <span class="input-group-text border-0"><i class="fas fa-user"></i></span>
                            <select class="form-select border-0" name="selectedContact" wire:model.lazy="selectedContact">
                                <option value="0">Lié à un contact utilisateur...</option>
                                @foreach ($contacts as $contact)
                                    <option value="{{ $contact->id }}">{{ $contact->display_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group border">
                            <span class="input-group-text border-0"><i class="fas fa-box"></i></span>
                            <select class="form-select border-0" name="selectedProduct" wire:model.lazy="selectedProduct">
                                <option value="0">Comprenant des produits/services</option>
                                @foreach ($products as $product)
                                    @if ($product->product_id != null)
                                        <option value="{{ $product->product_id }}">{{ $product->poduct_display_name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group border">
                            <span class="input-group-text border-0"><i class="fas fa-tag"></i></span>
                            <select class="form-select border-0" name="selectedClientTag" wire:model.lazy="selectedClientTag">
                                <option value='0'>Tags/catégories clients/prosp...</option>
                                @foreach ($tags as $tag)
                                    <option value='{{ $tag->id }}'>{{ $tag->label }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row g-3 mt-2">
                    <div class="col-md-1">
                        <div class="input-group border">
                            <input type="text" class="form-control border-0" placeholder="Réf..." name="refSearchQuery"
                                wire:model.lazy="refSearchQuery">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group border">
                            <span class="input-group-text border-0">Du</span>
                            <input type="date" class="form-control border-0" wire:model.lazy="datepStart" name="datepStart">
                            <span class="input-group-text border-0">au</span>
                            <input type="date" class="form-control border-0" wire:model.lazy="datepEnd" name="datepEnd">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="input-group border">
                            <span class="input-group-text border-0">Du</span>
                            <input type="date" class="form-control border-0" wire:model.lazy="dateFinStart" name="dateFinStart">
                            <span class="input-group-text border-0">au</span>
                            <input type="date" class="form-control border-0" wire:model.lazy="dateFinEnd" name="dateFinEnd">
                        </div>
                    </div>
                    <div class="col-md-3 d-flex gap-2">
                        <button class="w-50 btn btn-primary border d-flex gap-3 align-items-center"
                            wire:click='applyProposalFilter'>
                            <i class="fas fa-filter"></i>
                            <span class="text-lowercase font-weight-light">Filtrer</span>
                        </button>
                        <button class="w-50 btn btn-secondary border" wire:click='resetProposalFilter'>
                            <span class="text-lowercase font-weight-light">Réinitialiser</span>
                        </button>
                    </div>


                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <!-- Menu d'action -->
                        <div class="d-flex gap-2 align-items-center action-menu">
                            <select class="form-select" wire:model.lazy="selectedAction" style="width: 250px;">
                                <option value="">-- Sélectionner l'action --</option>
                                <option value="">Définir sur le statut Ouvert</option>
                                <option value="">Définir sur le statut Clos</option>
                                <option value="">Supprimer</option>
                            </select>

                            <button class="btn btn-secondary" wire:click="executeAction">CONFIRMER</button>
                        </div>

                        <div wire:loading wire:target="executeAction">
                            <span class="spinner-border spinner-border-sm text-primary" role="status"></span>
                            Exécution en cours...
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
                        @foreach ($filteredProposals as $proposal)
                            <tr>
                                <td class="align-middle">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <a href="#" class="text-decoration-none">
                                        <i class="fas fa-file-alt text-success"></i> {{ $proposal->ref }}
                                    </a>
                                </td>
                                <td class="align-middle">
                                    <a href="#" class="text-decoration-none">
                                        <i class="fas fa-building text-primary"></i>
                                        {{ $proposal->client->display_name }} (tiers)
                                    </a>
                                </td>
                                <td class="align-middle">{{ $proposal->datep_string }}</td>
                                <td class="align-middle">{{ $proposal->date_fin_validite_string }}</td>
                                <td class="align-middle">{{ $proposal->total_ht }}</td>
                                <td class="align-middle">
                                    <a href="#" class="text-decoration-none">

                                        <i class="fas fa-user text-secondary"></i> <span class="text-secondary">
                                            {{ $proposal->user_author_display_name }}</span>
                                    </a>
                                </td>
                                <td class="align-middle">
                                    <span class="badge bg-light text-dark">Brouillon</span>
                                </td>
                            </tr>
                        @endforeach
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
    </body>

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
    </script>
    <div>
