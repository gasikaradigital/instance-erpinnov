{{-- resources/views/livewire/tiers/index.blade.php --}}
<div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <div>
        @section('vendor-style')
            @vite(['resources/assets/vendor/libs/select2/select2.scss', 'resources/assets/vendor/libs/@form-validation/form-validation.scss'])
        @endsection

        @section('vendor-script')
            @vite(['resources/assets/vendor/libs/moment/moment.js', 'resources/assets/vendor/libs/select2/select2.js', 'resources/assets/vendor/libs/@form-validation/popular.js', 'resources/assets/vendor/libs/@form-validation/bootstrap5.js', 'resources/assets/vendor/libs/@form-validation/auto-focus.js'])
        @endsection

        <div class="container-flux flex-grow-1 container-p-y p-6">
            <div class="d-flex align-items-center">
                <i class="fas fa-box fa-xl me-2"></i>
                <h2 class="fw-bold fs-3 mb-2">Liste des tiers</h2>
                <div class="dropdown">
                    <span id="columnToggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <button class="btn btn-light btn-sm view-toggle ms-2" data-view="list"><i
                                class="fas fa-list"></i></button>
                    </span>
                    <ul class="dropdown-menu shadow-sm py-1  px-6" aria-labelledby="columnToggle">
                        @foreach ($visibleColumns as $column => $isVisible)
                            <li>
                                <div class="form-check px-3">
                                    <input type="checkbox" id="col-{{ $column }}" class="form-check-input"
                                        {{ $isVisible ? 'checked' : '' }}
                                        wire:click="$parent.toggleColumn('{{ $column }}')">
                                    <label class="form-check-label" for="col-{{ $column }}">
                                        {{ ucfirst($column) }}
                                    </label>
                                </div>
                            </li>
                        @endforeach
                        <li>
                            <button class="btn btn-primary">Valider</button>
                        </li>
                    </ul>
                </div>
                <select class="form-select form-select-sm ms-2" style="max-width: 100px;">
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

                <button class="btn btn-primary btn-sm ms-2" data-bs-toggle="tooltip" data-bs-placement="bottom"
                    title="{{ __('Nouveau tiers') }}">
                    <a href="{{ route('create-tiers') }}" class="btn btn-primary btn-sm p-0 px-1">
                        <i class="ti ti-plus"></i>
                    </a>
                </button>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <!-- Menu d'action -->
                <div
                    class="d-flex gap-2 align-items-center action-menu {{ count($selectedIds) !== 0 ? 'visible' : '' }}">
                    <select class="form-select" wire:model="selectedAction" style="width: 250px;">
                        <option value="">-- Sélectionner l'action --</option>
                        <option value="CHANGE_STATUS_TO_OPEN">Définir sur le statut Ouvert</option>
                        <option value="CHANGE_STATUS_TO_CLOSE">Définir sur le statut Clos</option>
                        <option value="DELETE_TIERS">Supprimer</option>
                    </select>

                    <button class="btn btn-secondary" wire:click="executeAction">CONFIRMER</button>
                </div>

                <div wire:loading wire:target="executeAction">
                    <span class="spinner-border spinner-border-sm text-primary" role="status"></span>
                    Exécution en cours...
                </div>

            </div>

            <!-- Liste des Tiers -->
            <div class="card">
                <div class="card-header border-bottom pb-3">
                    <!-- Filtres -->
                    <div class="row g-2 mt-2">
                        <!-- Filtre par type -->
                        <div class="col-md-1">
                            <div class="dropdown">
                                <button
                                    class="form-select form-select-sm d-flex justify-content-between align-items-center"
                                    type="button" id="typeDropdown" data-bs-toggle="dropdown" aria-expanded="false"
                                    style="padding-right: 28px;">
                                    <span>Types</span>
                                </button>
                                <ul class="dropdown-menu py-1 shadow-sm" aria-labelledby="typeDropdown"
                                    style="min-width: 100%;">
                                    <li class="px-3 py-1">
                                        <div class="form-check mb-0">
                                            <input class="form-check-input" type="checkbox" name="type[]"
                                                id="client" value="client" wire:model.lazy="selectedTypes">
                                            <label class="form-check-label small" for="client">Client</label>
                                        </div>
                                    </li>
                                    <li class="px-3 py-1">
                                        <div class="form-check mb-0">
                                            <input class="form-check-input" type="checkbox" name="type[]"
                                                id="prospect" value="prospect" wire:model.lazy="selectedTypes">
                                            <label class="form-check-label small" for="prospect">Prospect</label>
                                        </div>
                                    </li>
                                    <li class="px-3 py-1">
                                        <div class="form-check mb-0">
                                            <input class="form-check-input" type="checkbox" name="type[]"
                                                id="fournisseur" value="fournisseur" wire:model.lazy="selectedTypes">
                                            <label class="form-check-label small" for="fournisseur">Fournisseur</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Filtre par catégorie -->
                        <div class="col-md-2">
                            <select class="form-select form-select-sm" wire:model.lazy="selectedTag">
                                <option value="0">Categories</option>
                                @foreach ($tags as $tag)
                                    <option value={{ $tag->id }}>
                                        {{ $tag->label }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Filtre par statut -->
                        <div class="col-md-1">
                            <div class="dropdown">
                                <button
                                    class="form-select form-select-sm d-flex justify-content-between align-items-center"
                                    type="button" id="typeDropdown" data-bs-toggle="dropdown" aria-expanded="false"
                                    style="padding-right: 28px;">
                                    <span>Statut</span>
                                </button>
                                <ul class="dropdown-menu py-1 shadow-sm" aria-labelledby="typeDropdown"
                                    style="min-width: 100%;">
                                    <li class="px-3 py-1">
                                        <div class="form-check mb-0">
                                            <input class="form-check-input" value='1' type="checkbox"
                                                name="status[]" id="prospect" wire:model.lazy="selectedStatus">
                                            <label class="form-check-label small" for="prospect">Actif</label>
                                        </div>
                                    </li>
                                    <li class="px-3 py-1">
                                        <div class="form-check mb-0">
                                            <input class="form-check-input" value='0' type="checkbox"
                                                name="status[]" id="fournisseur" wire:model.lazy="selectedStatus">
                                            <label class="form-check-label small" for="fournisseur">Inactif</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>


                        <!-- Filtre par commerciaux -->
                        <div class="col-md-2">
                            <select class="form-select form-select-sm" wire:model.lazy="selectedCommercial">
                                <option value="default">Commerciaux</option>
                                @foreach ($commerciaux as $commercial)
                                    <option value={{ $commercial->id }}>
                                        {{ $commercial->display_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group input-group-sm">
                                <!-- Select pour type de recherche -->
                                <select class="form-select form-select-sm" wire:model.lazy="searchType"
                                    style="max-width: 120px;">
                                    <option value="name">Nom</option>
                                    <option value="email">Email</option>
                                    <option value="phone">Téléphone</option>
                                </select>

                                <!-- Champ de recherche -->
                                <input type="text" class="form-control form-control-sm"
                                    placeholder="Rechercher..." wire:model.lazy="searchQuery">
                            </div>
                        </div>

                        <!-- Boutons de filtre-->
                        <div class="col-md-3 d-flex gap-2">
                            <button class="w-50 btn btn-primary btn-sm py-1 d-flex gap-2 align-items-center"
                                wire:click='applyFilter'>
                                <i class="fas fa-filter"></i>
                                <span class="text-lowercase font-weight-light">Filtrer</span>
                            </button>
                            <button class="w-50 btn btn-secondary btn-sm py-1" wire:click='resetFilter'>
                                <span class="text-lowercase font-weight-light">Réinitialiser</span>
                            </button>
                        </div>

                    </div>
                </div>

                <div>
                    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
                    <link rel="stylesheet"
                        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
                    <link rel="stylesheet"
                        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
                    <div class="card-datatable table-responsive">
                        <table class="table table-hover" id="draggableTable">
                            <thead>
                                <tr id="draggableHeader">
                                    <th data-col-index="0" draggable="true" class="draggable-column">
                                        <input type="checkbox" class="form-check-input" id="selectAll"
                                            wire:click="toggleSelectAll"
                                            {{ count($selectedIds) === count($filteredData) ? 'checked' : '' }}>
                                    </th>
                                    @php
                                        $visibleCount = 1;
                                    @endphp
                                    @if ($visibleColumns['code'] ?? false)
                                        <th data-col-index="{{ $visibleCount }}" draggable="true"
                                            class="draggable-column">Code</th>
                                        @php
                                            $visibleCount++;
                                        @endphp
                                    @endif

                                    @if ($visibleColumns['nom'] ?? false)
                                        <th data-col-index="{{ $visibleCount }}" draggable="true"
                                            class="draggable-column">Nom</th>

                                        @php
                                            $visibleCount++;
                                        @endphp
                                    @endif

                                    @if ($visibleColumns['type'] ?? false)
                                        <th data-col-index="{{ $visibleCount }}" draggable="true"
                                            class="draggable-column">Type</th>
                                        @php
                                            $visibleCount++;
                                        @endphp
                                    @endif

                                    @if ($visibleColumns['nature'] ?? false)
                                        <th data-col-index="{{ $visibleCount }}" draggable="true"
                                            class="draggable-column">Nature
                                            tiers</th>
                                        @php
                                            $visibleCount++;
                                        @endphp
                                    @endif

                                    @if ($visibleColumns['email'] ?? false)
                                        <th data-col-index="{{ $visibleCount }}" draggable="true"
                                            class="draggable-column">Email</th>
                                        @php
                                            $visibleCount++;
                                        @endphp
                                    @endif

                                    @if ($visibleColumns['commerciaux'] ?? false)
                                        <th data-col-index="{{ $visibleCount }}" draggable="true"
                                            class="draggable-column">Commerciaux
                                        </th>
                                        @php
                                            $visibleCount++;
                                        @endphp
                                    @endif

                                    @if ($visibleColumns['telephone'] ?? false)
                                        <th data-col-index="{{ $visibleCount }}" draggable="true"
                                            class="draggable-column">Téléphone
                                        </th>
                                        @php
                                            $visibleCount++;
                                        @endphp
                                    @endif

                                    @if ($visibleColumns['statut'] ?? false)
                                        <th data-col-index="{{ $visibleCount }}" draggable="true"
                                            class="draggable-column">Statut</th>
                                        @php
                                            $visibleCount++;
                                        @endphp
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($filteredData) > 0)
                                    @foreach ($filteredData as $tier)
                                        @php
                                            $dataIndexCounter = 1;
                                        @endphp
                                        <tr wire:key="tier-{{ $tier->id }}">
                                            <td data-col-index="0">
                                                <input type="checkbox" class="form-check-input row-checkbox"
                                                    wire:click="toggleSelect({{ $tier->id }})"
                                                    {{ in_array($tier->id, $selectedIds) ? 'checked' : '' }}>
                                            </td>

                                            @if ($visibleColumns['code'] ?? false)
                                                <td data-col-index="{{ $dataIndexCounter }}">{{ $tier->code_client }}
                                                </td>
                                                @php
                                                    $dataIndexCounter++;
                                                @endphp
                                            @endif

                                            @if ($visibleColumns['nom'] ?? false)
                                                <td data-col-index="{{ $dataIndexCounter }}">{{ $tier->name }}</td>
                                                @php
                                                    $dataIndexCounter++;
                                                @endphp
                                            @endif

                                            @if ($visibleColumns['type'] ?? false)
                                                <td data-col-index="{{ $dataIndexCounter }}">
                                                    @switch($tier->typent_code)
                                                        @case('TE_ADMIN')
                                                            <span class="badge bg-label-primary">Administration</span>
                                                        @break

                                                        @case('TE_OTHER')
                                                            <span class="badge bg-label-primary">Autre</span>
                                                        @break

                                                        @case('TE_GROUP')
                                                            <span class="badge bg-label-primary">Grand Compte</span>
                                                        @break

                                                        @case('TE_MEDIUM')
                                                            <span class="badge bg-label-primary">PME/PMI</span>
                                                        @break

                                                        @case('TE_PRIVATE')
                                                            <span class="badge bg-label-primary">Particulier</span>
                                                        @break

                                                        @case('TE_SMALL')
                                                            <span class="badge bg-label-primary">TPE</span>
                                                        @break

                                                        @default
                                                            <span class="badge bg-label-primary"></span>
                                                    @endswitch
                                                </td>
                                                @php
                                                    $dataIndexCounter++;
                                                @endphp
                                            @endif
                                            @if ($visibleColumns['nature'])
                                                <td data-col-index="{{ $dataIndexCounter }}">
                                                    @switch($tier->client)
                                                        @case('2')
                                                            <span class="badge bg-info">P</span>
                                                        @break

                                                        @case('1')
                                                            <span class="badge bg-success">C</span>
                                                        @break

                                                        @case('0')
                                                            <span class="badge bg-danger">NCP</span>
                                                        @break
                                                    @endswitch
                                                </td>
                                                @php
                                                    $dataIndexCounter++;
                                                @endphp
                                            @endif

                                            @if ($visibleColumns['email'])
                                                <td data-col-index="{{ $dataIndexCounter }}">{{ $tier->email }}</td>
                                                @php
                                                    $dataIndexCounter++;
                                                @endphp
                                            @endif
                                            @if ($visibleColumns['commerciaux'])
                                                <td data-col-index="{{ $dataIndexCounter }}">---__---</td>
                                                @php
                                                    $dataIndexCounter++;
                                                @endphp
                                            @endif
                                            @if ($visibleColumns['telephone'])
                                                <td data-col-index="{{ $dataIndexCounter }}">{{ $tier->phone }}</td>
                                                @php
                                                    $dataIndexCounter++;
                                                @endphp
                                            @endif
                                            @if ($visibleColumns['statut'])
                                                <td data-col-index="{{ $dataIndexCounter }}">
                                                    @if ($tier->status == '1')
                                                        <span class="badge bg-label-success">Actif</span>
                                                    @else
                                                        <span class="badge bg-label-danger">Inactif</span>
                                                    @endif
                                                </td>
                                                @php
                                                    $dataIndexCounter++;
                                                @endphp
                                            @endif
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="{{ count(array_filter($visibleColumns)) + 1 }}"
                                            class="text-center">
                                            Aucun résultat trouvé.
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <link rel="stylesheet" href="{{ asset('css/draggableTable.css') }}" />
                    <script src="{{ asset('js/draggableTable.js') }}"></script>
                    <script src="{{ asset('js/CheckboxControl.js') }}"></script>
                </div>
            </div>
        </div>

        @include('livewire.tiers.modal.form')
    </div>
</div>
