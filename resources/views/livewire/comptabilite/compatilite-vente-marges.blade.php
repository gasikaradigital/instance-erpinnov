

<div class="container py-5">
<h2 class="text-left fs-3 mb-4">
  <i class="fas fa-chart-line mr-2"></i> Rapport des Ventes et Marges
</h2>


    <!-- Section de filtrage -->
    <div class="row mb-4">
        <div class="col-md-4">
            <label for="start-date" class="form-label">Date de début</label>
            <input type="date" class="form-control" id="start-date">
        </div>
        <div class="col-md-4">
            <label for="end-date" class="form-label">Date de fin</label>
            <input type="date" class="form-control" id="end-date">
        </div>
        <div class="col-md-4">
            <label for="product" class="form-label">Produit</label>
            <select class="form-select" id="product">
                <option value="">Sélectionner un produit</option>
                <option value="product1">Produit 1</option>
                <option value="product2">Produit 2</option>
                <option value="product3">Produit 3</option>
            </select>
        </div>
    </div>

    <!-- Résumé des performances -->
    <div class="row mb-5">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Chiffre d'affaire total</div>
                <div class="card-body">
                    <h5 class="card-title" id="total-revenue">€0</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Marge brute</div>
                <div class="card-body">
                    <h5 class="card-title" id="gross-margin">€0</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header">Marge nette</div>
                <div class="card-body">
                    <h5 class="card-title" id="net-margin">€0</h5>
                </div>
            </div>
        </div>
    </div>


    <!-- Graphiques -->
    <div class="row mb-4">
        <div class="col-md-6">
            <h4 class="mb-3">Évolution des Ventes</h4>
            <canvas id="sales-trend"></canvas>
        </div>
        <div class="col-md-6">
            <h4 class="mb-3">Ventes par Produit</h4>
            <canvas id="product-sales"></canvas>
        </div>
    </div>
    <!-- Tableau des ventes détaillées -->
    <div class="table-responsive">
        <h4 class="mb-3">Détails des Ventes</h4>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Produit</th>
                    <th scope="col">Ventes</th>
                    <th scope="col">Marge Brute</th>
                    <th scope="col">Marge Nette</th>
                </tr>
            </thead>
            <tbody id="sales-table">
                <!-- Les lignes seront générées dynamiquement -->
            </tbody>
        </table>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Chart.js pour les graphiques -->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script>
    // Initialisation des graphiques avec Chart.js
    var ctxSalesTrend = document.getElementById('sales-trend').getContext('2d');
    var ctxProductSales = document.getElementById('product-sales').getContext('2d');

    // Graphique de l'évolution des ventes
    var salesTrendChart = new Chart(ctxSalesTrend, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'], // Exemples de périodes
            datasets: [{
                label: 'Ventes mensuelles (€)',
                data: [1000, 1200, 1500, 1700, 1800],
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderWidth: 1
            }]
        }
    });

    // Graphique des ventes par produit
    var productSalesChart = new Chart(ctxProductSales, {
    type: 'pie',
    data: {
        labels: ['Produit 1', 'Produit 2', 'Produit 3'],
        datasets: [{
            data: [5000, 3000, 2000],
            backgroundColor: ['#FF5733', '#33FF57', '#3357FF']
        }]
    },
    options: {
        responsive: false,
        maintainAspectRatio: false
    }
});


    // Fonction pour simuler l'ajout des données des ventes
    document.getElementById('sales-table').innerHTML = `
        <tr>
            <td>Produit 1</td>
            <td>€5000</td>
            <td>€1500</td>
            <td>€1200</td>
        </tr>
        <tr>
            <td>Produit 2</td>
            <td>€3000</td>
            <td>€900</td>
            <td>€700</td>
        </tr>
        <tr>
            <td>Produit 3</td>
            <td>€2000</td>
            <td>€600</td>
            <td>€500</td>
        </tr>
    `;
</script>


