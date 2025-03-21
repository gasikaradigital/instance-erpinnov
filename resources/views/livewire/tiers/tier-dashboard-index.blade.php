<div class="container-flux p-6">
    <div class="row">
        <!-- Statistiques -->
        <livewire:tiers.statistique-tiers :tiers='$tier' :total_prospect='$prospect' :total_client='$client' :total_fournisseur='$fournisseur' :total_autres="0"/>
        <!-- Derniers tiers modifiés -->
        <div class="col-md-4">
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
                                        <a href="{{ route('tiers-info', ['id' => $tier->id]) }}"
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

</div>