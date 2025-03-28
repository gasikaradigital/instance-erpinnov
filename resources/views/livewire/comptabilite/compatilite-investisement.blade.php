
<div class="container mt-4">
<h2 class="text-left fs-3 mb-4">
  <i class="fas fa-arrow-up mr-2"></i> Flux d'Investissement
</h2>


    <!-- Section d'affichage des flux d'investissement -->
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header  text-white ">
                    <h4>Investissements - Acquisitions et Cessions d'Actifs</h4>
                </div>
                <div class="card-body">
                    <!-- Filtres -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="Recherche par type d'actif">
                        </div>
                        <div class="col-md-4">
                            <input type="date" class="form-control" value="2025-01-01">
                        </div>
                        <div class="col-md-4">
                            <input type="date" class="form-control" value="2025-12-31">
                        </div>
                    </div>

                    <!-- Tableau des Flux d'Investissement -->
                    <table class="table table-striped table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Type d'Actif</th>
                                <th>Description</th>
                                <th>Montant</th>
                                <th>Date</th>
                                <th>Type de Flux</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Achat Machine</td>
                                <td>Acquisition d'une nouvelle machine pour la production</td>
                                <td class="text-end">-15 000,00</td>
                                <td>01/01/2025</td>
                                <td>Sortie</td>
                            </tr>
                            <tr>
                                <td>Vente Équipement</td>
                                <td>Vente d'un ancien équipement de bureau</td>
                                <td class="text-end">5 000,00</td>
                                <td>10/02/2025</td>
                                <td>Entrée</td>
                            </tr>
                            <tr>
                                <td>Achat Véhicule</td>
                                <td>Acquisition d'un véhicule de transport</td>
                                <td class="text-end">-20 000,00</td>
                                <td>15/03/2025</td>
                                <td>Sortie</td>
                            </tr>
                            <tr>
                                <td>Vente Machine</td>
                                <td>Vente d'une machine vieillissante</td>
                                <td class="text-end">8 000,00</td>
                                <td>20/03/2025</td>
                                <td>Entrée</td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- Graphique des flux d'investissement -->
                    <div class="row mt-5">
                        <div class="col-md-12">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <h5>Graphique des Flux d'Investissement</h5>
                                    <canvas id="investment-chart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap & FontAwesome -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Chart.js pour les graphiques -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Script pour générer le graphique des flux d'investissement -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Données du graphique
        const data = {
            labels: ['Achat Machine', 'Vente Équipement', 'Achat Véhicule', 'Vente Machine'],
            datasets: [{
                label: 'Flux d\'Investissement',
                data: [-15000, 5000, -20000, 8000],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        };

        // Configuration du graphique
        const config = {
            type: 'bar',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                    }
                },
                scales: {
                    x: {
                        stacked: true
                    },
                    y: {
                        stacked: true
                    }
                }
            }
        };

        // Création du graphique
        var ctx = document.getElementById('investment-chart').getContext('2d');
        new Chart(ctx, config);
    });
</script>

