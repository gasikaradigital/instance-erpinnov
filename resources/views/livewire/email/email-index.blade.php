<div>
    <div class="container-flux p-6 flex-grow-1 container-p-y">
        <div class="card">
            <div class="row g-0">
                <!-- Sidebar -->
                <div class="col-12 col-lg-3 border-end">
                    <div class="p-3">
                        <button class="btn btn-primary w-100 mb-4" data-bs-toggle="modal" data-bs-target="#composeModal">
                            <i class="ti ti-plus me-1"></i> Nouveau
                        </button>

                        <nav class="email-nav">
                            <ul class="list-unstyled mb-4">
                                <li class="active">
                                    <a href="#" class="d-flex align-items-center p-2 rounded">
                                        <i class="ti ti-inbox me-2"></i>
                                        Boîte de réception
                                        <span class="badge bg-primary rounded-pill ms-auto">12</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex align-items-center p-2 rounded">
                                        <i class="ti ti-send me-2"></i>
                                        Envoyés
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex align-items-center p-2 rounded">
                                        <i class="ti ti-file me-2"></i>
                                        Brouillons
                                        <span class="badge bg-warning rounded-pill ms-auto">4</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex align-items-center p-2 rounded">
                                        <i class="ti ti-star me-2"></i>
                                        Favoris
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex align-items-center p-2 rounded">
                                        <i class="ti ti-trash me-2"></i>
                                        Corbeille
                                    </a>
                                </li>
                            </ul>

                            <h6 class="text-uppercase text-muted mb-3">Étiquettes</h6>
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#" class="d-flex align-items-center p-2 rounded">
                                        <span class="badge bg-success rounded-pill me-2"></span>
                                        Personnel
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex align-items-center p-2 rounded">
                                        <span class="badge bg-info rounded-pill me-2"></span>
                                        Travail
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex align-items-center p-2 rounded">
                                        <span class="badge bg-warning rounded-pill me-2"></span>
                                        Important
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- Email List -->
                <div class="col-12 col-lg-9">
                    <div class="card-body">
                        <!-- Search -->
                        <div class="mb-4">
                            <div class="input-group">
                                <span class="input-group-text border-0 bg-transparent">
                                    <i class="ti ti-search"></i>
                                </span>
                                <input type="text" class="form-control border-0 shadow-none" placeholder="Rechercher...">
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div>
                                <div class="btn-group me-2">
                                    <button class="btn btn-outline-primary btn-sm">
                                        <i class="ti ti-trash"></i>
                                    </button>
                                    <button class="btn btn-outline-primary btn-sm">
                                        <i class="ti ti-archive"></i>
                                    </button>
                                    <button class="btn btn-outline-primary btn-sm">
                                        <i class="ti ti-tag"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="btn-group">
                                <button class="btn btn-sm btn-icon btn-outline-primary">
                                    <i class="ti ti-chevron-left"></i>
                                </button>
                                <button class="btn btn-sm btn-icon btn-outline-primary">
                                    <i class="ti ti-chevron-right"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Email Items -->
                        <div class="email-list">
                            @foreach(range(1,5) as $email)
                            <div class="email-item d-flex align-items-center p-3 border-bottom">
                                <div class="form-check me-3">
                                    <input type="checkbox" class="form-check-input">
                                </div>
                                <div class="flex-shrink-0">
                                    <img src="{{ asset('images/avatar.jpg') }}" class="rounded-circle" width="40">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <div class="d-flex align-items-center mb-1">
                                        <h6 class="mb-0">John Doe</h6>
                                        <span class="badge bg-info ms-2">Travail</span>
                                        <small class="text-muted ms-auto">10:35 AM</small>
                                    </div>
                                    <p class="mb-0 text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit...</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<style>
    /* resources/css/email.css */
.email-nav a {
    color: #666;
    text-decoration: none;
    transition: all 0.3s;
}

.email-nav a:hover,
.email-nav .active a {
    background-color: #f8f9fa;
    color: #696cff;
}

.email-item {
    transition: all 0.3s;
    cursor: pointer;
}

.email-item:hover {
    background-color: #f8f9fa;
}

@media (max-width: 992px) {
    .email-nav {
        margin-bottom: 1rem;
    }

    .col-lg-3 {
        border-right: none !important;
        border-bottom: 1px solid #dee2e6;
        margin-bottom: 1rem;
    }
}

.form-control:focus {
    box-shadow: none;
    border-color: #696cff;
}

.badge {
    padding: 0.45em 0.65em;
}

.modal-header {
    background-color: #f8f9fa;
}

.btn-primary {
    background-color: #696cff;
    border-color: #696cff;
}

.btn-primary:hover {
    background-color: #5f65e8;
    border-color: #5f65e8;
}
</style>
</div>
