<div class="container">
    <div class="row">
        <!-- Statistiques -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <i class="bi bi-box-seam"></i> Statistiques
                </div>
                <div class="card-body text-center">
                    <div style="max-width: 300px; margin: auto;">
                        <canvas id="statsChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Derniers produits/services -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <i class="bi bi-box"></i> Les 3 derniers produits/services modifiés
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>PRD-003 - test-stock</span>
                            <span class="badge bg-primary">120,00 HT</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>PRD-002 - test</span>
                            <span class="badge bg-secondary">0,00 HT</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>PRD-001 - serve</span>
                            <span class="badge bg-secondary">0,00 HT</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Entrepôts et Mouvements de stock -->
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-warning text-white">
                    <i class="bi bi-building"></i> Les 3 derniers entrepôts modifiés
                </div>
                <div class="card-body">
                    <p>Aucun</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-danger text-white">
                    <i class="bi bi-arrow-left-right"></i> Derniers mouvements de stock
                </div>
                <div class="card-body">
                    <p>Aucun</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script pour le graphique -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('statsChart').getContext('2d');

    var statsData = @json($counts);

    var statsChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Produits en vente", "Produits en achat", "Services en vente", "Services en achat"],
            datasets: [{
                data: [
                    statsData.produits.en_vente,
                    statsData.produits.en_achat,
                    statsData.services.en_vente,
                    statsData.services.en_achat
                ],
                backgroundColor: ['#6f42c1', '#198754', '#ffc107', '#0dcaf0']
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
</script>
