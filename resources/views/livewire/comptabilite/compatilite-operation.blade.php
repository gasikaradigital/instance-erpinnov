
<div class="container mt-4">
<h2 class="text-left fs-3 mb-4">
  <i class="fas fa-book mr-2"></i> Opérations - Journaux
</h2>


    <!-- Filtres -->
    <div class="row mb-3">
        <div class="col-md-4">
            <input type="text" class="form-control" placeholder="Groupe de comptes personnalisé">
        </div>
        <div class="col-md-3">
            <input type="date" class="form-control" value="2025-01-01">
        </div>
        <div class="col-md-3">
            <input type="date" class="form-control" value="2025-12-31">
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary w-100">Filtrer</button>
        </div>
    </div>

    <!-- Modes d'affichage -->
    <div class="btn-group mb-3" role="group">
        <button class="btn btn-outline-primary" data-view="liste" title="Vue Liste">
            <i class="fas fa-list"></i>
        </button>
        <button class="btn btn-outline-secondary" data-view="comptable" title="Affichage Comptable">
            <i class="fas fa-calculator"></i>
        </button>
        <button class="btn btn-outline-success" data-view="auxiliaire" title="Affichage Comptable Auxiliaire">
            <i class="fas fa-file-invoice"></i>
        </button>
        <button class="btn btn-outline-info" data-view="flux-operationnels" title="Flux Opérationnels">
            <i class="fas fa-wallet"></i>
        </button>
    </div>

    <!-- Vue Liste -->
    <table id="vue-liste" class="table table-bordered table-striped py-0">
        <thead class="table-light">
            <tr>
                <th><input type="checkbox" id="select-all"></th>
                <th>Num. Écriture</th>
                <th>Journal</th>
                <th>Date</th>
                <th>Pièce</th>
                <th>Libellé</th>
                <th>Lettrage</th>
                <th>Débit</th>
                <th>Crédit</th>
                <th>Solde</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input type="checkbox" class="select-row"></td>
                <td>109</td>
                <td>AC</td>
                <td>01/01/2025</td>
                <td><a href="#">SI2501-0112</a></td>
                <td>Bail Villa Hasha...</td>
                <td>A</td>
                <td class="text-end">2 400,00</td>
                <td class="text-end">-</td>
                <td class="text-end">2 400,00</td>
            </tr>
        </tbody>
    </table>

    <!-- Vue Comptable -->
    <table id="vue-comptable" class="table table-bordered table-striped d-none">
        <thead class="table-light">
            <tr>
                <th><input type="checkbox" id="select-all-comptable"></th>
                <th>Journal</th>
                <th>Pièce</th>
                <th>Libellé</th>
                <th>Débit</th>
                <th>Crédit</th>
                <th>Solde</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input type="checkbox" class="select-row-comptable"></td>
                <td>AC</td>
                <td><a href="#">SI2501-0112</a></td>
                <td>Bail Villa Hasha...</td>
                <td class="text-end">2 400,00</td>
                <td class="text-end">-</td>
                <td class="text-end">2 400,00</td>
            </tr>
        </tbody>
    </table>

    <!-- Vue Comptable Auxiliaire -->
    <table id="vue-auxiliaire" class="table table-bordered table-striped d-none">
        <thead class="table-light">
            <tr>
                <th><input type="checkbox" id="select-all-auxiliaire"></th>
                <th>Compte Auxiliaire</th>
                <th>Libellé</th>
                <th>Débit</th>
                <th>Crédit</th>
                <th>Solde</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input type="checkbox" class="select-row-auxiliaire"></td>
                <td>401005</td>
                <td>Bail Villa Hasha...</td>
                <td class="text-end">2 400,00</td>
                <td class="text-end">-</td>
                <td class="text-end">2 400,00</td>
            </tr>
        </tbody>
    </table>

    <!-- Vue Flux Opérationnels -->
    <table id="vue-flux-operationnels" class="table table-bordered table-striped d-none">
        <thead class="table-light">
            <tr>
                <th>Opération</th>
                <th>Montant</th>
                <th>Type</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Vente produit X</td>
                <td class="text-end">5 000,00</td>
                <td>Entrée</td>
                <td>15/03/2025</td>
            </tr>
            <tr>
                <td>Achat fournitures</td>
                <td class="text-end">-2 000,00</td>
                <td>Sortie</td>
                <td>20/03/2025</td>
            </tr>
            <tr>
                <td>Paiement fournisseurs</td>
                <td class="text-end">-3 500,00</td>
                <td>Sortie</td>
                <td>22/03/2025</td>
            </tr>
            <tr>
                <td>Vente produit Y</td>
                <td class="text-end">6 000,00</td>
                <td>Entrée</td>
                <td>23/03/2025</td>
            </tr>
        </tbody>
    </table>

</div>

<!-- Bootstrap & FontAwesome -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Script pour gérer l'affichage dynamique et sélection -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let buttons = document.querySelectorAll(".btn-group button");

        buttons.forEach(button => {
            button.addEventListener("click", function() {
                let view = this.getAttribute("data-view");

                // Masquer tous les tableaux
                document.getElementById("vue-liste").classList.add("d-none");
                document.getElementById("vue-comptable").classList.add("d-none");
                document.getElementById("vue-auxiliaire").classList.add("d-none");
                document.getElementById("vue-flux-operationnels").classList.add("d-none");

                // Afficher le tableau correspondant
                document.getElementById(`vue-${view}`).classList.remove("d-none");
            });
        });

        // Fonction pour la sélection globale
        function setupSelection(selectAllId, rowClass) {
            let selectAll = document.getElementById(selectAllId);
            let checkboxes = document.querySelectorAll(`.${rowClass}`);

            selectAll.addEventListener("change", function() {
                checkboxes.forEach(checkbox => {
                    checkbox.checked = this.checked;
                });
            });
        }

        setupSelection("select-all", "select-row");
        setupSelection("select-all-comptable", "select-row-comptable");
        setupSelection("select-all-auxiliaire", "select-row-auxiliaire");
    });
</script>

