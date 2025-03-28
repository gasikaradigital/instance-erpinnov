<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<style>
    body {
        font-size: 1.1rem;
    }

    h2 {
        font-size: 1.5rem;
    }
</style>

<div class="container mt-4">
    <div class="card">
        <div class="card-body">
            <div class="row mb-4 align-items-center">
                <h2 class="text-left fs-3">
                    <i class="fas fa-cart-plus me-2" style="font-size: 30px; color:rgb(0, 0, 0);"></i>
                    Journal des achats
                </h2>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <p><strong>Nom du rapport :</strong> Journal des achats</p>
                    <p><strong>Période d'analyse :</strong>
                        <input type="date" class="form-control d-inline w-auto" value="2025-02-01">
                        -
                        <input type="date" class="form-control d-inline w-auto" value="2025-02-28">
                    </p>
                </div>
                <div class="col-md-6">
                    <p><strong>Description :</strong> Journal des achats<br>- Les factures d'acomptes sont incluses</p>
                    <p><strong>Généré le :</strong> <span id="generatedDateTime">28/03/2025 09:05</span></p>
                </div>
            </div>
            <button class="btn btn-primary">RAFRAICHIR</button>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Pièce (Réf. facture)</th>
                        <th>Compte</th>
                        <th>Type</th>
                        <th>Débit</th>
                        <th>Crédit</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Données dynamiques à insérer ici -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Fonction pour formater la date et l'heure
    function formatDateTime(date) {
        const day = String(date.getDate()).padStart(2, '0');
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const year = date.getFullYear();
        const hours = String(date.getHours()).padStart(2, '0');
        const minutes = String(date.getMinutes()).padStart(2, '0');

        return `${day}/${month}/${year} ${hours}:${minutes}`;
    }

    // Mettre à jour la date et l'heure lors du chargement de la page
    document.addEventListener('DOMContentLoaded', function () {
        const now = new Date();
        document.getElementById('generatedDateTime').textContent = formatDateTime(now);
    });

    // Optionnel: Mettre à jour aussi lors du clic sur le bouton RAFRAICHIR
    document.querySelector('.btn-primary').addEventListener('click', function () {
        const now = new Date();
        document.getElementById('generatedDateTime').textContent = formatDateTime(now);
    });
</script>