
    <!-- Compose Modal -->
    <div class="modal fade" id="composeModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nouveau message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <input type="email" class="form-control" placeholder="À:">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Objet:">
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" rows="10"></textarea>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">
                                <i class="ti ti-send me-1"></i> Envoyer
                            </button>
                            <button type="button" class="btn btn-outline-secondary"
                                data-bs-dismiss="modal">Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
