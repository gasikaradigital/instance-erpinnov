
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="{{ asset('css/devis.css') }}">

<div class="container-fluid py-3">
  <div class="card">
    <div class="card-header bg-white pt-3 pb-0">
      <ul class="nav nav-tabs border-bottom-0" id="devisTabs" role="tablist">
        <li class="nav-item me-3" role="presentation">
          <button class="nav-link active px-1 pb-3 text-dark fw-semibold border-0 border-bottom-0 border-3 border-primary" id="devis-tab" data-bs-toggle="tab" data-bs-target="#devis-tab-pane" type="button" role="tab" aria-controls="devis-tab-pane" aria-selected="true">Nouveau devis</button>
        </li>
      </ul>
    </div>

    <div class="card-body">
      <div class="tab-content" id="devisTabsContent">
        <!-- Formulaire de création de devis -->
        <div class="tab-pane fade show active" id="devis-tab-pane" role="tabpanel" aria-labelledby="devis-tab" tabindex="0">
          <form id="devisForm">
            <!-- Section informations client -->
            <div class="row mb-4">
              <div class="col-12">
                <h5 class="fw-bold mb-3">Informations client</h5>
              </div>

              <div class="col-md-6 mb-3">
                <label for="client" class="form-label fw-medium pt-1">Client <span class="text-danger">*</span></label>
                <div class="input-group border rounded">
                  <input type="text" class="form-control border-0" id="client" required>
                  <span class="input-group-text border-0 icon-bg-white"><i class="bi bi-search" style="font-size: 16px;"></i></span>
                </div>
                <small class="form-text text-muted">Sélectionnez un client existant ou créez-en un nouveau</small>
              </div>

              <div class="col-md-6 mb-3">
                <label for="contact" class="form-label fw-medium pt-1">Contact</label>
                <div class="input-group border rounded">
                  <input type="text" class="form-control border-0" id="contact">
                  <span class="input-group-text border-0 icon-bg-white"><i class="bi bi-search" style="font-size: 16px;"></i></span>
                </div>
              </div>
            </div>

            <!-- Section informations devis -->
            <div class="row mb-4">
              <div class="col-12">
                <h5 class="fw-bold mb-3">Informations devis</h5>
              </div>

              <div class="col-md-4 mb-3">
                <label for="ref_devis" class="form-label fw-medium pt-1">Référence <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="ref_devis" required>
              </div>

              <div class="col-md-4 mb-3">
                <label for="date_creation" class="form-label fw-medium pt-1">Date de création <span class="text-danger">*</span></label>
                <div class="input-group border rounded">
                  <input type="date" class="form-control border-0" id="date_creation" required>
                  <span class="input-group-text border-0 icon-bg-white"><i class="bi bi-calendar" style="font-size: 16px;"></i></span>
                </div>
              </div>

              <div class="col-md-4 mb-3">
                <label for="validite" class="form-label fw-medium pt-1">Validité <span class="text-danger">*</span></label>
                <div class="input-group border rounded">
                  <input type="number" class="form-control border-0" id="validite" value="30" required>
                  <select class="form-select border-top-0 border-right-0 border-bottom-0" style="max-width: 100px;">
                    <option selected>Jours</option>
                    <option>Mois</option>
                  </select>
                </div>
              </div>

              <div class="col-md-4 mb-3">
                <label for="commercial" class="form-label fw-medium pt-1">Commercial <span class="text-danger">*</span></label>
                <select class="form-select" id="commercial" required>
                  <option value="" selected disabled>Sélectionnez un commercial</option>
                  <!-- Options de commerciaux -->
                </select>
              </div>

              <div class="col-md-4 mb-3">
                <label for="conditions_reglement" class="form-label fw-medium pt-1">Conditions de règlement <span class="text-danger">*</span></label>
                <select class="form-select" id="conditions_reglement" required>
                  <option value="" selected disabled>Sélectionnez une condition</option>
                  <option>À réception</option>
                  <option>30 jours</option>
                  <option>30 jours fin de mois</option>
                  <option>60 jours</option>
                  <option>60 jours fin de mois</option>
                </select>
              </div>

              <div class="col-md-4 mb-3">
                <label for="mode_reglement" class="form-label fw-medium pt-1">Mode de règlement <span class="text-danger">*</span></label>
                <select class="form-select" id="mode_reglement" required>
                  <option value="" selected disabled>Sélectionnez un mode</option>
                  <option>Virement bancaire</option>
                  <option>Chèque</option>
                  <option>Carte bancaire</option>
                  <option>Espèces</option>
                  <option>Prélèvement</option>
                </select>
              </div>

              <div class="col-md-12 mb-3">
                <label for="projet" class="form-label fw-medium pt-1">Projet/Affaire</label>
                <div class="input-group border rounded">
                  <input type="text" class="form-control border-0" id="projet">
                  <span class="input-group-text border-0 icon-bg-white"><i class="bi bi-search" style="font-size: 16px;"></i></span>
                </div>
              </div>
            </div>

            <!-- Section articles du devis -->
            <div class="row mb-4">
              <div class="col-12">
                <h5 class="fw-bold mb-3">Articles du devis</h5>
              </div>

              <div class="col-12 mb-3">
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead class="table-light">
                      <tr>
                        <th style="width: 5%">#</th>
                        <th style="width: 35%">Produit/Service <span class="text-danger">*</span></th>
                        <th style="width: 10%">Quantité <span class="text-danger">*</span></th>
                        <th style="width: 15%">Prix unitaire HT <span class="text-danger">*</span></th>
                        <th style="width: 10%">Remise</th>
                        <th style="width: 10%">TVA <span class="text-danger">*</span></th>
                        <th style="width: 15%">Total HT</th>
                        <th style="width: 5%">Actions</th>
                      </tr>
                    </thead>
                    <tbody id="lignes_devis">
                      <tr id="ligne_1">
                        <td>1</td>
                        <td>
                          <div class="input-group">
                            <input type="text" class="form-control article-input" required>
                            <span class="input-group-text"><i class="bi bi-search"></i></span>
                          </div>
                        </td>
                        <td><input type="number" class="form-control quantite-input" value="1" min="1" required></td>
                        <td><input type="number" class="form-control prix-input" step="0.01" required></td>
                        <td>
                          <div class="input-group">
                            <input type="number" class="form-control remise-input" value="0" min="0" max="100">
                            <span class="input-group-text">%</span>
                          </div>
                        </td>
                        <td>
                          <select class="form-select tva-select" required>
                            <option value="20">20%</option>
                            <option value="10">10%</option>
                            <option value="5.5">5.5%</option>
                            <option value="2.1">2.1%</option>
                            <option value="0">0%</option>
                          </select>
                        </td>
                        <td class="total-ht">0,00 €</td>
                        <td>
                          <button type="button" class="btn btn-sm btn-outline-danger delete-ligne" title="Supprimer">
                            <i class="bi bi-trash"></i>
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>

                <div class="text-center mt-2">
                  <button type="button" class="btn btn-outline-primary" id="ajouter_ligne">
                    <i class="bi bi-plus-circle me-1"></i> Ajouter une ligne
                  </button>
                </div>
              </div>
            </div>

            <!-- Section totaux -->
            <div class="row mb-4">
              <div class="col-md-6 offset-md-6">
                <table class="table table-sm">
                  <tbody>
                    <tr>
                      <td class="fw-medium text-end">Total HT :</td>
                      <td class="text-end" id="total_ht">0,00 €</td>
                    </tr>
                    <tr>
                      <td class="fw-medium text-end">Total TVA :</td>
                      <td class="text-end" id="total_tva">0,00 €</td>
                    </tr>
                    <tr>
                      <td class="fw-medium text-end">Total TTC :</td>
                      <td class="text-end fw-bold" id="total_ttc">0,00 €</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <!-- Section conditions et notes -->
            <div class="row mb-4">
              <div class="col-md-6 mb-3">
                <label for="conditions_particulieres" class="form-label fw-medium pt-1">Conditions particulières</label>
                <textarea class="form-control" id="conditions_particulieres" rows="4"></textarea>
              </div>

              <div class="col-md-6 mb-3">
                <label for="notes_privees" class="form-label fw-medium pt-1">Notes privées (non visibles pour le client)</label>
                <textarea class="form-control" id="notes_privees" rows="4"></textarea>
              </div>
            </div>

            <!-- Boutons d'action -->
            <hr>
            <div class="row mt-4">
              <div class="col-12 d-flex justify-content-center gap-2">
                <button type="submit" class="btn btn-primary px-4">
                  <i class="bi bi-plus-circle me-1"></i> Créer le devis
                </button>
                <button type="button" class="btn btn-outline-primary px-4">
                  <i class="bi bi-save me-1"></i> Enregistrer brouillon
                </button>
                <button type="button" class="btn btn-secondary px-4">
                  <i class="bi bi-x-circle me-1"></i> Annuler
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Fonction pour ajouter une nouvelle ligne
  document.getElementById('ajouter_ligne').addEventListener('click', function() {
    const lignesDevis = document.getElementById('lignes_devis');
    const nouvelleLigne = document.createElement('tr');
    const nombreLignes = lignesDevis.querySelectorAll('tr').length + 1;

    nouvelleLigne.id = `ligne_${nombreLignes}`;
    nouvelleLigne.innerHTML = `
      <td>${nombreLignes}</td>
      <td>
        <div class="input-group">
          <input type="text" class="form-control article-input" required>
          <span class="input-group-text"><i class="bi bi-search"></i></span>
        </div>
      </td>
      <td><input type="number" class="form-control quantite-input" value="1" min="1" required></td>
      <td><input type="number" class="form-control prix-input" step="0.01" required></td>
      <td>
        <div class="input-group">
          <input type="number" class="form-control remise-input" value="0" min="0" max="100">
          <span class="input-group-text">%</span>
        </div>
      </td>
      <td>
        <select class="form-select tva-select" required>
          <option value="20">20%</option>
          <option value="10">10%</option>
          <option value="5.5">5.5%</option>
          <option value="2.1">2.1%</option>
          <option value="0">0%</option>
        </select>
      </td>
      <td class="total-ht">0,00 €</td>
      <td>
        <button type="button" class="btn btn-sm btn-outline-danger delete-ligne" title="Supprimer">
          <i class="bi bi-trash"></i>
        </button>
      </td>
    `;

    lignesDevis.appendChild(nouvelleLigne);

    // Ajouter les événements à la nouvelle ligne
    attachEventsToLigne(nouvelleLigne);
  });

  // Fonction pour attacher les événements aux lignes
  function attachEventsToLigne(ligne) {
    // Suppression de ligne
    const btnDelete = ligne.querySelector('.delete-ligne');
    if (btnDelete) {
      btnDelete.addEventListener('click', function() {
        if (document.querySelectorAll('#lignes_devis tr').length > 1) {
          ligne.remove();
          // Renuméroter les lignes
          document.querySelectorAll('#lignes_devis tr').forEach((tr, index) => {
            tr.id = `ligne_${index + 1}`;
            tr.querySelector('td:first-child').textContent = index + 1;
          });
          // Recalculer les totaux
          calculerTotaux();
        } else {
          alert('Impossible de supprimer la dernière ligne');
        }
      });
    }

    // Calcul du total HT
    const quantiteInput = ligne.querySelector('.quantite-input');
    const prixInput = ligne.querySelector('.prix-input');
    const remiseInput = ligne.querySelector('.remise-input');

    [quantiteInput, prixInput, remiseInput].forEach(input => {
      if (input) {
        input.addEventListener('input', function() {
          calculerLigneTotale(ligne);
          calculerTotaux();
        });
      }
    });
  }

  // Fonction pour calculer le total d'une ligne
  function calculerLigneTotale(ligne) {
    const quantite = parseFloat(ligne.querySelector('.quantite-input').value) || 0;
    const prix = parseFloat(ligne.querySelector('.prix-input').value) || 0;
    const remise = parseFloat(ligne.querySelector('.remise-input').value) || 0;

    const totalHT = quantite * prix * (1 - remise / 100);
    ligne.querySelector('.total-ht').textContent = totalHT.toFixed(2) + ' €';
  }

  // Fonction pour calculer les totaux du devis
  function calculerTotaux() {
    let totalHT = 0;
    let totalTVA = 0;

    document.querySelectorAll('#lignes_devis tr').forEach(ligne => {
      const totalLigneText = ligne.querySelector('.total-ht').textContent;
      const totalLigne = parseFloat(totalLigneText.replace(' Ar', '')) || 0;
      const tvaRate = parseFloat(ligne.querySelector('.tva-select').value) || 0;

      totalHT += totalLigne;
      totalTVA += totalLigne * (tvaRate / 100);
    });

    const totalTTC = totalHT + totalTVA;

    document.getElementById('total_ht').textContent = totalHT.toFixed(2) + ' Ar';
    document.getElementById('total_tva').textContent = totalTVA.toFixed(2) + ' Ar';
    document.getElementById('total_ttc').textContent = totalTTC.toFixed(2) + ' Ar';
  }

  // Initialiser les événements sur les lignes existantes
  document.querySelectorAll('#lignes_devis tr').forEach(ligne => {
    attachEventsToLigne(ligne);
  });

  // Préremplir la date du jour
  const aujourdhui = new Date().toISOString().split('T')[0];
  document.getElementById('date_creation').value = aujourdhui;
});
</script>
