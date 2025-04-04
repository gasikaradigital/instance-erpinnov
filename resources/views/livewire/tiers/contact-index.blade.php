<div>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <div>
        @section('vendor-style')
            @vite(['resources/assets/vendor/libs/select2/select2.scss', 'resources/assets/vendor/libs/@form-validation/form-validation.scss'])
        @endsection

        @section('vendor-script')
            @vite(['resources/assets/vendor/libs/moment/moment.js', 'resources/assets/vendor/libs/select2/select2.js', 'resources/assets/vendor/libs/@form-validation/popular.js', 'resources/assets/vendor/libs/@form-validation/bootstrap5.js', 'resources/assets/vendor/libs/@form-validation/auto-focus.js'])
        @endsection
        <div class="container-flux p-6 flex-grow-1 container-p-y">
            <div class="d-flex align-items-center mb-3">
                <div class="d-flex align-items-center me-2">
                    <i class="fas fa-box text-success me-2"></i>
                    <h4 class="fw-bold py-3 mb-2">Liste des contacts </h4>
                </div>
                <div class="d-flex align-items-center">
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary view-toggle me-2 " id="collumToggle"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ti ti-list"></i>
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
                    <select class="form-select me-2" style="max-width: 90px;">
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
                    <button class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="{{ __('Nouveau contact') }}">
                        <a style="color: white;" href="{{ route('create-contact') }}"><i class="fas fa-plus"></i></a>
                    </button>
                </div>
            </div>
            <!-- Menu d'action -->
            <div class="d-flex gap-2 align-items-center action-menu mb-3">
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
            <!-- Liste des Tiers -->
            <div class="card">
                <div class="card-header border-bottom">
                    <div class="row g-3 mt-2">

                        <div class="col-md-2">
                            <select class="form-select border rounded" wire:model.lazy="selectedTag">
                                <option value="0">Tags/Categories</option>
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select border rounded" wire:model.lazy="selectedCommerciaux">
                                <option value="0">Commerciaux</option>
                                @foreach ($comercials as $comercial)
                                    <option value="{{ $comercial->id }}">{{ $comercial->display_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3" style="max-width:200px;">
                            <select class="form-select border rounded" wire:model.lazy="selectedRole">
                                <option value="0">Roles</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4" style="max-width: 400px;">
                            <div class="input-group border rounded">

                                <select class="form-select border-0" wire:model.lazy="searchType">
                                    <option value="0" class="fs-6">Rechercher par</option>
                                    <option value="1">Nom</option>
                                    <option value="2">Email</option>
                                    <option value="3">Télephone</option>
                                </select>
                                <input type="text" class="form-control border-0" placeholder="Rechercher..."
                                    wire:model.lazy="searchQuery">
                            </div>
                        </div>
                        <div class="col-md-2 d-flex gap-2">
                            <button class="w-50 btn btn-primary border d-flex gap-3 align-items-center"
                                wire:click='applyContactFilter'>
                                <i class="fas fa-filter"></i>
                                <span class="text-lowercase font-weight-light">Filtrer</span>
                            </button>
                            <button class="w-50 btn btn-secondary border" wire:click='resetContactFilter'>
                                <span class="text-lowercase font-weight-light">Réinitialiser</span>
                            </button>
                        </div>
                    </div>

                </div>
                <div>
                    <div class="card-datatable table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" class="form-check-input" id="selectAll">
                                    </th>
                                    <th>Code</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Téléphone</th>
                                    <th>Tél portable</th>
                                    <th>Email</th>
                                    <th>Tiers</th>
                                    <th>Visibilité</th>
                                    <th>Etat</th>
                                </tr>
                            </thead>
                            @if (count($filteredContacts ?? []) > 0)
                                @foreach ($filteredContacts as $contact)
                                    <tbody>
                                        <tr>

                                            <td>
                                                <input type="checkbox" class="form-check-input row-checkbox">
                                            </td>
                                            <td>{{ $contact->array_options['options_code_contact'] ?? 'N/A' }}</td>

                                            {{-- <td>{{ $contact->code_contact }}</td> --}}
                                            <td>{{ $contact->display_name }}</td>
                                            <td>{{ $contact->lastname }}</td>
                                            <td>{{ $contact->phone_pro }}</td>
                                            <td>{{ $contact->phone_mobile }}</td>
                                            <td>{{ $contact->email }}</td>
                                            <td>{{ $contact->thirdpartie->display_name }}</td>
                                            <td>
                                                @if ($contact->visibility == '1')
                                                    <span>Privé</span>
                                                @else
                                                    <span>Ouvert</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($contact->statut == '1')
                                                    <span class="badge bg-label-success">Ouvert </span>
                                                @else
                                                    <span class="Bagde bg-label-success"> Fermer</span>
                                                @endif
                                            </td>
                                        </tr>

                                    </tbody>
                                @endforeach
                            @endif
                        </table>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between align-items-center">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/CheckboxControl.js') }}"></script>
</div>