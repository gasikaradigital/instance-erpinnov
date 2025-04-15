<div>
    <div class="container-flux p-6  pb-0">
        <div class="row">
            <!-- Statistiques -->
            <livewire:tiers.statistique :data="$data" />
            <livewire:tiers.statistique-tiers :tiers='$tier' :total_prospect='$prospect' :total_client='$client' :total_fournisseur='$fournisseur'
                :total_autres="0" />
            <!-- Derniers tiers modifiés -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-light fw-bold">🕒 Les 3 derniers tiers modifiés</div>
                    <div class="card-body">
                        <ul class="list-group">
                            @if (count($data ?? []) > 0)
                                @foreach (collect($data)->sortByDesc('date_modification')->take(3) as $index => $tier)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <!-- Nom du tiers -->
                                        <div>
                                            <i class="bi bi-buildings me-2"></i>
                                            <a href="{{ route('info-tiers', ['id' => $tier->id]) }}"
                                                class="fw-bold">{{ $tier->name }}</a>
                                        </div>

                                        <!-- Badges pour le statut du tiers -->
                                        <div>
                                            @switch($tier->client)
                                                @case('2')
                                                    <span class="badge bg-success">P</span> <!-- Prospect -->
                                                @break

                                                @case('3')
                                                    <span class="badge bg-success">P</span> <!-- Prospect -->
                                                    <span class="badge bg-success">C</span> <!-- Client -->
                                                @break

                                                @case('1')
                                                    <span class="badge bg-success">C</span> <!-- Client -->
                                                @break

                                                @case('0')
                                                    @if ($tier->fournisseur == 1)
                                                        <span class="badge bg-info">F</span> <!-- Fournisseur -->
                                                    @endif
                                                @break
                                            @endswitch
                                        </div>

                                        <!-- Date (à remplacer par une valeur dynamique si nécessaire) -->
                                        <span class="text-muted">
                                            {{ date('d/m/Y', $tier->date_modification) }}
                                        </span>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row p-6 pb-0 ">
        <div class="col-md-6  ">
            <div class="card ">
                <div class="card-header  bg-light fw-bold d-flex justify-content-between align-items-center">
                    <h5 class="card-title">Les 10 derniers Tiers</h5>
                    <div>
                        <button class="btn btn-sm btn-link">
                            <i class="fas fa-comments"></i>
                        </button>
                        <button class="btn btn-sm btn-link">
                            <i class="fas fa-list"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="draggableTable">
                            <thead>
                                <tr id="draggableHeader">
                                    <th data-col-index="0" draggable="true" class="draggable-column">
                                        <input type="checkbox" class="form-check-input" id="selectAll">
                                    </th>
                                    <th data-col-index="1" draggable="true" class="draggable-column">Code</th>
                                    <th data-col-index="2" draggable="true" class="draggable-column">Nom</th>
                                    <th data-col-index="2" draggable="true" class="draggable-column">Type</th>
                                    <th data-col-index="5" draggable="true" class="draggable-column">Email</th>
                                    <th data-col-index="7" draggable="true" class="draggable-column">Téléphone</th>
                                    <th data-col-index="8" draggable="true" class="draggable-column">Statut</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $tier)
                                <tr>
                                    <td data-col-index="0">
                                        <input type="checkbox" class="form-check-input row-checkbox">
                                    </td>
                                    <td data-col-index="1">{{$tier->code_client}}</td>
                                    <td data-col-index="2">{{ $tier->name }}</td>
                                    <td data-col-index="4">
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
                                    <td data-col-index="5">{{$tier->email}}</td>
                                    <td data-col-index="7">{{$tier->phone}}</td>
                                    <td data-col-index="8">
                                        <span class="badge bg-label-success">{{$tier->status == 1 ? 'Actif' : 'Inactif'}}</span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 ">
            <div class="card ">
                <div class="card-header  bg-light fw-bold d-flex justify-content-between align-items-center">
                    <h5 class="card-title">Les 10 derniers Contacts</h5>
                    <div>
                        <button class="btn btn-sm btn-link">
                            <i class="fas fa-comments"></i>
                        </button>
                        <button class="btn btn-sm btn-link">
                            <i class="fas fa-list"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="draggableTable">
                            <thead>
                                <tr id="draggableHeader">
                                    <th data-col-index="0" draggable="true" class="draggable-column">
                                        <input type="checkbox" class="form-check-input" id="selectAll">
                                    </th>
                                    <th data-col-index="1" draggable="true" class="draggable-column">Code</th>
                                    <th data-col-index="2" draggable="true" class="draggable-column">Nom</th>
                                    <th data-col-index="3" draggable="true" class="draggable-column">Prénom</th>
                                    <th data-col-index="5" draggable="true" class="draggable-column">Email</th>
                                    <th data-col-index="7" draggable="true" class="draggable-column">Téléphone</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $contact)
                                    <tr>
                                        <td data-col-index="0">
                                            <input type="checkbox" class="form-check-input row-checkbox">
                                        </td>
                                        <td data-col-index="1">{{ $contact->contactCode }}</td>
                                        <td data-col-index="2">{{ $contact->firstname }}</td>
                                        <td data-col-index="3">
                                            <span class="badge bg-label-primary">{{ $contact->lastname }}</span>
                                        </td>
                                        <td data-col-index="4">
                                            <span class="badge bg-success">{{ $contact->email }}</span>
                                        </td>
                                        <td data-col-index="5">{{ $contact->phone_mobile }}</td>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row p-6 pb-0 ">
        <div class="col-md-6 ">
            <div class="card ">
                <div class="card-header  bg-light fw-bold d-flex justify-content-between align-items-center">
                    <h5 class="card-title">Les 10 derniers Devis</h5>
                    <div>
                        <button class="btn btn-sm btn-link">
                            <i class="fas fa-comments"></i>
                        </button>
                        <button class="btn btn-sm btn-link">
                            <i class="fas fa-list"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="draggableTable">
                            <thead>
                                <tr id="draggableHeader">
                                    <th data-col-index="0" draggable="true" class="draggable-column">
                                        <input type="checkbox" class="form-check-input" id="selectAll">
                                    </th>
                                    <th data-col-index="1" draggable="true" class="draggable-column">Ref</th>
                                    <th data-col-index="2" draggable="true" class="draggable-column">Date de
                                        proposition</th>
                                    <th data-col-index="3" draggable="true" class="draggable-column">Date fin</th>
                                    <th data-col-index="4" draggable="true" class="draggable-column">Montant HT</th>
                                    <th data-col-index="5" draggable="true" class="draggable-column">Etat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($proposals as $proposal)
                                    <tr>
                                        <td data-col-index="0">
                                            <input type="checkbox" class="form-check-input row-checkbox">
                                        </td>
                                        <td data-col-index="1">{{ $proposal->ref }}</td>
                                        <td data-col-index="2">{{ $proposal->datep_string }}</td>
                                        <td data-col-index="3">
                                            <span
                                                class="badge bg-label-primary">{{ $proposal->date_fin_validite_string }}</span>
                                        </td>
                                        <td data-col-index="4">
                                            <span class="badge bg-success">{{ $proposal->total_ht }}</span>
                                        </td>
                                        <td data-col-index="5">Brouillon</td>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Script pour le graphique -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var ctx = document.getElementById('tierChart').getContext('2d');
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Prospects', 'Clients', 'Fournisseurs', 'Autres'],
                datasets: [{
                    data: ['1', '1', '1', 0],
                    backgroundColor: ['#6f42c1', '#0d6efd', '#f39c12', '#28a745']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    });
</script>
