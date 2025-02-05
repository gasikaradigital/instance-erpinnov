<div class="container">
    <!-- Onglet Titre -->
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="#">Par mois/année</a>
        </li>
    </ul>

    <!-- Section des filtres -->
    <div class="card mt-3">
        <div class="card-header bg-light">
            <strong>Filtres</strong>
        </div>
        <div class="card-body">
            <form method="GET" action="">
                <div class="row g-3">
                    <!-- Tiers -->
                    <div class="col-md-6">
                        <label class="form-label">Tiers</label>
                        <select class="form-select">
                            <option value="">Sélectionner...</option>
                            <!-- Ajoutez vos options ici -->
                        </select>
                    </div>

                    <!-- Type du tiers -->
                    <div class="col-md-6">
                        <label class="form-label">Type du tiers</label>
                        <input type="text" class="form-control" placeholder="Type du tiers">
                    </div>

                    <!-- Tag/catégorie client -->
                    <div class="col-md-6">
                        <label class="form-label">Tag/catégorie client</label>
                        <input type="text" class="form-control" placeholder="Catégorie">
                    </div>

                    <!-- Créé par -->
                    <div class="col-md-6">
                        <label class="form-label">Créé par</label>
                        <select class="form-select">
                            <option value="">SuperAdmin</option>
                            <!-- Autres utilisateurs -->
                        </select>
                    </div>

                    <!-- État -->
                    <div class="col-md-6">
                        <label class="form-label">État</label>
                        <select class="form-select">
                            <option value="">Sélectionner...</option>
                        </select>
                    </div>

                    <!-- Année -->
                    <div class="col-md-6">
                        <label class="form-label">Année</label>
                        <select class="form-select">
                            @for ($year = 2015; $year <= 2030; $year++)
                                <option value="{{ $year }}" {{ $year == date('Y') ? 'selected' : '' }}>{{ $year }}</option>
                            @endfor
                        </select>
                    </div>
                </div>

                <!-- Bouton Rafraîchir -->
                <div class="d-flex justify-content-end mt-3">
                    <button type="submit" class="btn btn-primary px-4">RAFRACHIR</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Graphiques -->
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-light">
                    <strong>Nb de factures par mois</strong>
                </div>
                <div class="card-body">
                    <canvas id="facturesChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-light">
                    <strong>Montant de factures par mois (HT)</strong>
                </div>
                <div class="card-body">
                    <canvas id="montantChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Tableau des données -->
    <div class="table-responsive mt-4">
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Année</th>
                    <th>Nb de factures</th>
                    <th>%</th>
                    <th>Montant total</th>
                    <th>%</th>
                    <th>Montant moyen</th>
                    <th>%</th>
                </tr>
            </thead>
            <tbody>
                <!-- Exemples de données -->
                <tr>
                    <td>2025</td>
                    <td>0</td>
                    <td>0%</td>
                    <td>0€</td>
                    <td>0%</td>
                    <td>0€</td>
                    <td>0%</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Script pour les graphiques Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctxFactures = document.getElementById('facturesChart').getContext('2d');
    new Chart(ctxFactures, {
        type: 'bar',
        data: {
            labels: ['Jan.', 'Fév.', 'Mars', 'Avr.', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
            datasets: [
                { label: '2023', data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], backgroundColor: 'purple' },
                { label: '2024', data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], backgroundColor: 'blue' },
                { label: '2025', data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], backgroundColor: 'orange' }
            ]
        }
    });

    const ctxMontant = document.getElementById('montantChart').getContext('2d');
    new Chart(ctxMontant, {
        type: 'line',
        data: {
            labels: ['Jan.', 'Fév.', 'Mars', 'Avr.', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
            datasets: [
                { label: '2023', data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], borderColor: 'purple', fill: false },
                { label: '2024', data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], borderColor: 'blue', fill: false },
                { label: '2025', data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], borderColor: 'orange', fill: false }
            ]
        }
    });
</script>
