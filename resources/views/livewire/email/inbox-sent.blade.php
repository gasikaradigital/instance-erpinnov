 <!-- Conteneur pour les messages envoyés (affiché) -->
 <div class="sent-container">
    <!-- Search -->
    <div class="mb-4">
        <div class="input-group">
            <span class="input-group-text border-0 bg-transparent">
                <i class="ti ti-search"></i>
            </span>
            <input type="text" class="form-control border-0 shadow-none email-search" placeholder="Rechercher un message envoyé">
        </div>
    </div>

    <!-- Actions -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="d-flex">
            <div class="form-check mx-3">
                <input type="checkbox" class="form-check-input">
            </div>
            <div class="btn-group me-2">
                <i class="ti ti-trash fs-4 me-2" style="cursor: pointer;"></i>
                <i class="ti ti-copy fs-4 me-2" style="cursor: pointer;"></i>
                <div class="dropdown">
                    <i class="ti ti-folder fs-4 me-2" style="cursor: pointer;" data-bs-toggle="dropdown"></i>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#"><i class="ti ti-archive fs-4 me-2" style="cursor: pointer;"></i>Archiver</a></li>
                        <li><a class="dropdown-item" href="#"><i class="ti ti-trash fs-4 me-2" style="cursor: pointer;"></i>Corbeille</a></li>
                    </ul>
                </div>
                
                <div class="dropdown">
                    <i class="ti ti-tag fs-4" style="cursor: pointer;" data-bs-toggle="dropdown"></i>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#"><i class="badge badge-dot bg-success me-2" style="cursor: pointer;"></i>Personnel</a></li>
                        <li><a class="dropdown-item" href="#"><i class="badge badge-dot bg-info me-2" style="cursor: pointer;"></i>Travail</a></li>
                        <li><a class="dropdown-item" href="#"><i class="badge badge-dot bg-warning me-2" style="cursor: pointer;"></i>Important</a></li>
                        <li><a class="dropdown-item" href="#"><i class="badge badge-dot bg-danger me-2" style="cursor: pointer;"></i>Privé</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="btn-group me-2">
            <i class="ti ti-refresh fs-4 me-2" style="cursor: pointer;"></i>
            <div class="dropdown">
                <i class="ti ti-dots-vertical fs-4" style="cursor: pointer;" data-bs-toggle="dropdown"></i>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Imprimer</a></li>
                    <li><a class="dropdown-item" href="#">Exporter</a></li>
                    <li><a class="dropdown-item" href="#">Supprimer</a></li>
                    <li><a class="dropdown-item" href="#">Archive</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Email Items pour les messages envoyés -->
    <div class="email-list">
        @foreach (range(1, 4) as $email)
            <div class="email-item d-flex align-items-center p-3 border-bottom"
                data-email-id="sent-{{ $email }}">
                <div class="form-check me-3">
                    <input type="checkbox" class="form-check-input email-checkbox">
                </div>
                <div>
                    <i class="ti ti-star fs-4 me-3 email-star"></i>
                </div>
                <div class="flex-shrink-0">
                    <div class="avatar-initial rounded-circle bg-label-primary">
                        <span>À</span>
                    </div>
                </div>
                <div class="flex-grow-1 ms-3">
                    <div class="d-flex align-items-center mb-1">
                        <h6 class="mb-0">Destinataire {{ $email }}</h6>
                        <small class="text-muted ms-auto">
                            <i class="badge badge-dot bg-info me-2"></i>
                            {{ date('H:i A', strtotime("-$email hour")) }}</small>
                    </div>
                    <p class="mb-0 text-muted">Message envoyé {{ $email }} - Votre contenu professionnel ici...</p>
                </div>
            </div>
        @endforeach
    </div>
</div>

