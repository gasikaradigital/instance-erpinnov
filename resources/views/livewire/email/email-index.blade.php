<div>
    <script src="{{ asset('css/custom.css') }}"></script>
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

                                    <a href="javascript:void(0)" class="d-flex align-items-center p-2 rounded">
                                        <i class="badge badge-dot bg-success  me-2"></i>
                                        Personnel
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" class="d-flex align-items-center p-2 rounded">
                                        <i class="badge badge-dot bg-info me-2"></i>
                                        Travail
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" class="d-flex align-items-center p-2 rounded">
                                        <i class="badge badge-dot bg-warning me-2"></i>
                                        Important
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" class="d-flex align-items-center p-2 rounded">
                                        <i class="badge badge-dot bg-danger me-2"></i>
                                        Privé
                                    </a>
                                </li>
                            </ul>
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
                        </nav>
                    </div>
                </div>
                {{-- Email list Inbox --}}
                @include('livewire.email.inbox-index')
            </div>
        </div>
    </div>
    {{-- Nouveau mail --}}
    @include('livewire.email.create-mail')
    <script src="{{ asset('js/email.js') }}"></script>
</div>
