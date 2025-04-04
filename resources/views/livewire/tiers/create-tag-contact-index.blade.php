
<div class="container-flux p-6">
    <div class="d-flex align-items-center me-2">
        <i class="fas fa-folder fa-xl me-2"></i>
        <h4 class="fw-bold py-3 mb-2">Créer tag/catégorie</h4>
    </div>

    <div class="card mt-3">
        <div class="card-body">
            <form action="javascript:void(0)" method="POST">
                @csrf

                <div class="row">
                    <!-- Référence -->
                    <div class="col-md-6 mb-3">
                        <label for="reference" class="fw-bold text-primary">Réf.</label>
                        <input type="text" class="form-control" id="reference" name="reference">
                    </div>

                    <!-- Position -->
                    <div class="col-md-6 mb-3">
                        <label for="position">Position</label>
                        <input type="text" class="form-control" id="position" name="position">
                    </div>
                </div>

                <div class="row">
                    <!-- Description -->
                    <div class="col-md-12 mb-3">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="5" placeholder="Écrivez votre description ici..."></textarea>
                    </div>
                </div>

                <div class="row">
                    <!-- Couleur -->
                    <div class="col-md-1 mb-3">
                        <label for="color">Couleur</label>
                        <input type="color" class="form-control form-control-color" id="color" name="color">
                    </div>

                    <!-- Catégorie -->
                    <div class="col-md-5 mb-3">
                        <label for="category">Ajouter dans</label>
                        <select class="form-control" id="category" name="category">
                            <option value="">Sélectionner une catégorie</option>
                            <option value="1">Catégorie 1</option>
                            <option value="2">Catégorie 2</option>
                        </select>
                    </div>
                </div>

                <!-- Boutons -->
                <div class="d-flex justify-content-end gap-2">
                    <button type="submit" class="btn btn-primary">Créer tag/catégorie</button>
                    <a href="#" class="btn btn-secondary">Annuler</a>
                </div>
            </form>
        </div>
    </div>
