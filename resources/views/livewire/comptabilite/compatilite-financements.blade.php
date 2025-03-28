
    <div class="container mt-5">
    <h2 class="text-left fs-3 mb-4">
  <i class="fas fa-credit-card mr-2"></i> Flux de Financement
</h2>

        <div class="card">
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="typeFlux" class="form-label">Type de flux</label>
                        <select class="form-select" id="typeFlux">
                            <option value="apport">Apport en capital</option>
                            <option value="emprunt">Emprunt</option>
                            <option value="remboursement">Remboursement de dette</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="montant" class="form-label">Montant</label>
                        <input type="number" class="form-control" id="montant" placeholder="Entrez le montant">
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" class="form-control" id="date">
                    </div>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </form>
            </div>
        </div>
        <h3 class="mt-4">Historique des Flux</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Montant</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <!-- Les données seront insérées ici dynamiquement -->
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

