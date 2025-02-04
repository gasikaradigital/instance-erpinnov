<div class="container">
    <div class="card shadow-lg p-4">
        <h4 class="mb-4">Nouveau compte financier</h4>
        <form action="#" method="POST">
            @csrf
            <div class="row">
                <!-- Colonne 1 -->
                <div class="col-md-3">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Ref.</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Libellé compte ou caisse</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Type de compte</label>
                        <select class="form-select">
                            <option value="">Compte bancaire épargne/placement</option>
                            <option>Compte bancaire, chèque, courant ou carte</option>
                            <option value="*">Compte caisse/liquide</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Devise</label>
                        <select class="form-select">
                            <option value="">Euro</option>
                            <option>Ariary</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Etat</label>
                        <select class="form-select">
                            <option value="">Ouvert</option>
                            <option>Fermé</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Pays</label>
                        <select class="form-select">
                            <option value="">Belgique</option>
                            <option>France</option>
                            <option value="">Madagascar</option>
                            <option value="">Suisse</option>
                        </select>
                    </div>
                </div>

                <!-- Colonne 2 -->
                <div class="col-md-3">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Domicialisation du compte</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Web</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Solde initial</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Date</label>
                        <input type="date" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Solde minimum autorisé</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Solde minimum désiré</label>
                        <input type="text" class="form-control">
                    </div>
                </div>

                <!-- Colonne 3 -->
                <div class="col-md-3"> 
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nom de la banque</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Code IBAN</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Code BIC/SWIFT</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Numéro de compte</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Nom du propriétaire du compte</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Adresse du propriétaire du compte</label>
                        <input type="text" class="form-control">
                    </div>

                </div>

                <!-- Colonne 4 -->
                <div class="col-md-3">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Code postal du proriétaire du compte</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Ville du propriétaire du compte</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Pays du propriétaire du compte</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Compte comptable</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
            </div>

            <div class="text-center mt-3">
                <button type="submit" class="btn btn-primary w-50">Enregistrer la banque</button>
            </div>
        </form>
    </div>
</div>