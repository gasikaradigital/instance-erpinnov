
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <div class="container mt-5">

                <h2 class="mb-0">Créer un devis</h2>

              <div class="card">
            <div class="card-body">
                <form id="newDraftForm">
                    <div class="row">
                    <div class="col-md-4 mb-3">
                            <label class="form-label">Réf.</label>
                            <select class="form-select custom-form-control" id="clientSelect">
                                <option>Sélectionner un tiers</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Réf. client</label>
                            <select class="form-select custom-form-control" id="clientSelect">
                                <option>Sélectionner un tiers</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Date</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                <input type="date" class="form-control custom-form-control" value="2025-03-25">
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Date prévue de livraison</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-truck"></i></span>
                                <input type="date" class="form-control custom-form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Délai de livraison</label>
                            <input type="text" class="form-control custom-form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Cond. règlement</label>
                            <input type="text" class="form-control custom-form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Mode de règlement</label>
                            <select class="form-select custom-form-control">
                                <option>Sélectionner</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Origine</label>
                            <input type="text" class="form-control custom-form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Modèle de document par défaut</label>
                            <select class="form-select custom-form-control">
                                <option>eratosthene</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Note (publique)</label>
                            <textarea class="form-control custom-form-control" rows="3"></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Note (privée)</label>
                            <textarea class="form-control custom-form-control" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary">
                            <i class="fas fa-times me-1"></i>
                            Annuler
                        </button>
                        <button type="submit" class="btn btn-primary ms-2">
                            <i class="fas fa-save me-1"></i>
                            Créer Brouillon
                        </button>
                    </div>
                </form>
            </div>
    </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const formElements = document.querySelectorAll('.custom-form-control');

            formElements.forEach(element => {
                // Add focus and input event listeners
                element.addEventListener('focus', function() {
                    this.closest('.mb-3').querySelector('label').style.color = '#696cff';
                });

                element.addEventListener('blur', function() {
                    this.closest('.mb-3').querySelector('label').style.color = '';
                });

                // Simulate the color change on input
                element.addEventListener('input', function() {
                    const label = this.closest('.mb-3').querySelector('label');
                    label.style.color = this.value ? '#696cff' : '';
                });
            });
        });
    </script>
