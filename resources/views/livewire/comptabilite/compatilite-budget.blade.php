<div class="container">
<h2 class="mb-4 text-left fs-3">
  <i class="fas fa-file-invoice-dollar mr-2"></i> Rapport Budgétaire
</h2>


    <!-- 🛠️ Filtres -->
    <div class="row mb-3">
        <div class="col-md-4">
            <select class="form-select">
                <option>Période</option>
                <option>Janvier</option>
                <option>Février</option>
            </select>
        </div>
        <div class="col-md-4">
            <select class="form-select">
                <option>Catégorie</option>
                <option>Marketing</option>
                <option>RH</option>
            </select>
        </div>
        <div class="col-md-4">
            <button class="btn btn-primary">Filtrer</button>
        </div>
    </div>
    <!-- 📝 Tableau des Variances -->
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title text-center text-secondary">💰 Détails du Budget</h5>
            <table class="table table-hover text-center">
                <thead class="table-primary">
                    <tr>
                        <th>Catégorie</th>
                        <th>Budget (€)</th>
                        <th>Réalisation (€)</th>
                        <th>Écart (€)</th>
                        <th>Explication</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Marketing</td>
                        <td>10,000</td>
                        <td>12,000</td>
                        <td class="text-danger">-2,000</td>
                        <td>Dépenses publicitaires</td>
                    </tr>
                    <tr>
                        <td>RH</td>
                        <td>5,000</td>
                        <td>4,500</td>
                        <td class="text-success">+500</td>
                        <td>Optimisation de formation</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Styles CSS supplémentaires -->
