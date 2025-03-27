
    <div class="container mt-4">
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
            <h4>📈 Évolution du Chiffre d'Affaires
                <span id="statusBadge" class="badge"></span>
            </h4>
            <canvas id="revenusChart" style="width:0cm; height:5cm;"></canvas>

        </div>

        <!-- Table des transactions -->
        <div class="mt-5">
            <h4>📜 Transactions récentes</h4>
            <table class="table table-striped">
                <thead>
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

    <!-- Script pour afficher le graphique et le statut -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var ctx = document.getElementById('revenusChart').getContext('2d');

            // Données du chiffre d'affaires
            var dataValues = [12000, 15000, 14000, 16000, 18000, 20000];

            // Fonction pour déterminer la tendance et le statut
            function getStatusTrend(data) {
                let lastValue = data[data.length - 1];
                let previousValue = data[data.length - 2];

                if (lastValue > previousValue) {
                    return { text: "En hausse ", class: "bg" };
                } else if (lastValue < previousValue) {
                    return { text: "En baisse ", class: "bg" };
                } else {
                    return { text: "Stable ", class: "bg" };
                }
            }

            // Appliquer le statut au badge
            var statusBadge = document.getElementById("statusBadge");
            if (statusBadge) {
                var status = getStatusTrend(dataValues);
                statusBadge.textContent = status.text;
                statusBadge.className = "badge p-2 text-white " + status.class;
            } else {
                console.error("⚠️ Erreur : L'élément #statusBadge n'existe pas dans le DOM !");
            }

            // Création du graphique
            var revenusChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin'],
                    datasets: [{
                        label: 'Chiffre d\'affaires (€)',
                        data: dataValues,
                        borderColor: 'blue',
                        backgroundColor: 'rgba(0, 0, 255, 0.2)',
                        fill: true,
                        tension: 0.3
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: true
                        }
                    }
                }
            });
        });
    </script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

