
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="d-flex align-items-center">
                <i class="fas fa-tags me-2"></i>
                <h5 class="mb-0">Nouveau Attribut de variante</h5>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <form action="javascript:void(0)" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="reference" class="form-label">Réf.</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="reference" 
                                name="reference" 
                                value="{{ old('reference') }}"
                                placeholder="Saisissez une référence"
                            >
                        </div>

                        <div class="mb-3">
                            <label for="libelle" class="form-label">Libellé</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="libelle" 
                                name="libelle" 
                                value="{{ old('libelle') }}"
                                placeholder="Saisissez un libellé"
                            >
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn-secondary">
                                <i class="fas fa-times me-2"></i>Annuler
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Créer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


