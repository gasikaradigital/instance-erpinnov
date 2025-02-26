<div class="container-flux p-6">
    <div class="row">
        <!-- Statistiques -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-light fw-bold">📊 Statistiques</div>
                <div class="card-body text-center">
                    <div style="width: 300px; margin: auto;">
                        <canvas id="tierChart"></canvas>
                    </div>
                    <p class="mt-3 fw-bold">Nombre total des tiers : <span class="badge bg-primary"></span></p>
                </div>
            </div>
        </div>

        <!-- Derniers tiers modifiés -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-light fw-bold">🕒 Les derniers tiers modifiés</div>
                <div class="card-body">
                    <ul class="list-group">
                        @if(count($data ?? []) > 0)
                        @foreach($data as $tier)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                           
                                    <div>
                                        <i class="bi bi-buildings me-2"></i>
                                        <a href="#" class="fw-bold">{{ $tier->name }}</a>
                                    </div>
                                
                            <div>
                            @switch($tier->client)
                                @case('2')
                                    <span class="badge bg-success">P</span>
                                @break

                                @case('3')
                                    <span class="badge bg-success">P</span>
                                    <span class="badge bg-success">C</span>
                                @break

                                @case('1')
                                    <span class="badge bg-success">C</span>
                                @break

                                @case('0')
                                    @if($tier->fournisseur == 1)
                                        <span class="badge bg-info">F</span>
                                    <!-- <span class="badge bg-label-primary">Ni client, ni prospect</span> -->
                                    @endif
                                @break
                            @endswitch
                                
                            </div>
                            <span class="text-muted">12/02/2025</span>
                        </li>
                        @endforeach
                        @endif
                    </ul>
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
