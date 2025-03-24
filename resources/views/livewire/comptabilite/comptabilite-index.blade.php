<div class="container mt-4">
        <h2 class="text-center">📊 Tableau de Bord Comptable</h2>

        <!-- Indicateurs financiers -->
        <div class="row text-center mt-4">
            <div class="col-md-3">
                <div class="card p-3 shadow">
                    <h5>💰 Chiffre d'affaires</h5>
                    <p class="fs-4 text-success">150 000 €</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-3 shadow">
                    <h5>📉 Dépenses</h5>
                    <p class="fs-4 text-danger">45 000 €</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-3 shadow">
                    <h5>📊 Bénéfice net</h5>
                    <p class="fs-4 text-primary">105 000 €</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-3 shadow">
                    <h5>🏦 Trésorerie</h5>
                    <p class="fs-4 text-warning">60 000 €</p>
                </div>
            </div>
        </div>

        <!-- Graphique des revenus -->
        <div class="mt-5">
            <h4>📈 Évolution du Chiffre d'Affaires</h4>
            <canvas id="revenusChart"></canvas>
        </div>

        <!-- Table des transactions -->
        <div class="mt-5">
            <h4>📜 Transactions récentes</h4>
            <table class="table table-striped">
                <thead class="table bg-secondary">
                    <tr>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Montant</th>
                        <th>Type</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2025-03-01</td>
                        <td>Facture Client #1023</td>
                        <td class="text-success">+ 5 000 €</td>
                        <td>Revenu</td>
                    </tr>
                    <tr>
                        <td>2025-03-02</td>
                        <td>Paiement Fournisseur</td>
                        <td class="text-danger">- 2 500 €</td>
                        <td>Dépense</td>
                    </tr>
                    <tr>
                        <td>2025-03-05</td>
                        <td>Facture Client #1025</td>
                        <td class="text-success">+ 3 200 €</td>
                        <td>Revenu</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
    <!-- Script pour afficher le graphique -->
    <script>
        var ctx = document.getElementById('revenusChart').getContext('2d');
        var revenusChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin'],
                datasets: [{
                    label: 'Chiffre d\'affaires (€)',
                    data: [12000, 15000, 14000, 16000, 18000, 20000],
                    borderColor: 'blue',
                    fill: false
                }]
            },
            options: {
                responsive: true
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
