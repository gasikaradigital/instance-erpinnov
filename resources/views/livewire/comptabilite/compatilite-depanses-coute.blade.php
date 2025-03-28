<div class="container mt-5">
    <!-- Titre avec icône -->
    <div class="row mb-4">
        <h2 class="text-left fs-3">
            <i class="fas fa-chart-pie mr-3"></i> Rapport des Dépenses et Contrôle des Coûts
        </h2>
    </div>

    <!-- Objectif : explication du rapport -->
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    <strong>Objectif</strong>
                </div>
                <div class="card-body">
                    <p>Suivre l’ensemble des charges pour maîtriser les coûts et optimiser la rentabilité de
                        l’entreprise.</p>
                </div>
            </div>
        </div>


    </div>

    <!-- Analyse des Dépenses par catégorie -->
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <strong>Analyse des Dépenses</strong>
                </div>
                <div class="card-body">
                    <h5>Dépenses par catégorie</h5>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Catégorie</th>
                                <th>Dépenses Réelles</th>
                                <th>Budget Prévisionnel</th>
                                <th>Écart</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Charges fixes</td>
                                <td>€12,000</td>
                                <td>€11,500</td>
                                <td>€500</td>
                            </tr>
                            <tr>
                                <td>Charges variables</td>
                                <td>€8,000</td>
                                <td>€8,500</td>
                                <td>-€500</td>
                            </tr>
                            <tr>
                                <td>Charges imprévues</td>
                                <td>€3,000</td>
                                <td>€2,500</td>
                                <td>€500</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Graphique des marges -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    <strong>Marge nette</strong>
                </div>
                <div class="card-body">
                    <canvas id="marginChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Graphiques pour une vue d'ensemble -->
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    <strong>Répartition des Dépenses</strong>
                </div>
                <div class="card-body">
                <canvas id="expenseChart" style="width:0; height:4cm;"></canvas>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
   // Graphique des marges nettes
var ctxMargin = document.getElementById('marginChart').getContext('2d');
var marginChart = new Chart(ctxMargin, {
    type: 'bar',
    data: {
        labels: ['Marge brute', 'Marge nette'],
        datasets: [{
            label: 'Marge',
            data: [20000, 15000], // Remplacer par les marges réelles
            backgroundColor: ['#4CAF50', '#FF9800'],
            borderColor: ['#FFFFFF', '#FFFFFF'],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true,
                max: 25000 // Ajuster la taille pour réduire la hauteur du graphique
            }
        }
    }
});

// Graphique des dépenses par catégorie
var ctxExpense = document.getElementById('expenseChart').getContext('2d');
var expenseChart = new Chart(ctxExpense, {
    type: 'pie',
    data: {
        labels: ['Charges fixes', 'Charges variables', 'Charges imprévues'],
        datasets: [{
            label: 'Répartition des Dépenses',
            data: [12000, 8000, 3000], // Remplacer par les données réelles
            backgroundColor: ['#36A2EB', '#FF6384', '#FFCE56'],
            borderColor: ['#FFFFFF', '#FFFFFF', '#FFFFFF'],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false
    }
});

</script>