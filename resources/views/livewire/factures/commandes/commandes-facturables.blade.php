<div class="container">
    <h4 class="mb-3">Commandes - Validée, Envoi en cours, Livrée (0)</h4>
    
    <!-- Filtres -->
    <div class="card mb-3">
        <div class="card-body">
            <form method="GET" action="#" class="row g-3">
                <div class="col-md-3">
                    <label for="tiers" class="form-label">Tiers</label>
                    <select id="tiers" name="tiers" class="form-select">
                        <option value="">Tous</option>
                        <!-- Remplir dynamiquement avec les tiers -->
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="contact" class="form-label">Contact utilisateur</label>
                    <select id="contact" name="contact" class="form-select">
                        <option value="">Tous</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="produits" class="form-label">Produits/Services</label>
                    <select id="produits" name="produits" class="form-select">
                        <option value="">Tous</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="etat" class="form-label">État</label>
                    <select id="etat" name="etat" class="form-select">
                        <option value="validée">Validée</option>
                        <option value="en_cours">En cours</option>
                        <option value="livrée">Livrée</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Date commande</label>
                    <input type="date" name="date_commande" class="form-control">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Date prévue</label>
                    <input type="date" name="date_prevue" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="facture" class="form-label">Facturé</label>
                    <select id="facture" name="facture" class="form-select">
                        <option value="non">Non</option>
                        <option value="oui">Oui</option>
                    </select>
                </div>
                <div class="col-md-3 align-self-end">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-search"></i> Rechercher
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Tableau des commandes -->
    <div class="table-responsive">
        <table class="table table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Réf.</th>
                    <th>Tiers</th>
                    <th>Date commande</th>
                    <th>Date prévue</th>
                    <th>Montant HT</th>
                    <th>Auteur</th>
                    <th>Expédiable</th>
                    <th>Facturé</th>
                    <th>État</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
               
            </tbody>
        </table>
    </div>

    
</div>
