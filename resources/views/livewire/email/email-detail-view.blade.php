<!-- Email Detail View -->
<div class="email-detail">
    <!-- Header with navigation and actions -->
    <div class="d-flex justify-content-between align-items-center p-3 border-bottom">
        <div>
            <button class="btn btn-sm btn-outline-secondary" id="back-to-list">
                <i class="ti ti-arrow-left"></i> Retour
            </button>
        </div>
        <div>
            <button class="btn btn-sm btn-outline-secondary me-2">
                <i class="ti ti-star"></i>
            </button>
            <button class="btn btn-sm btn-outline-secondary me-2">
                <i class="ti ti-trash"></i>
            </button>
            <button class="btn btn-sm btn-outline-secondary">
                <i class="ti ti-dots-vertical"></i>
            </button>
        </div>
    </div>

    <!-- Email Content Card -->
    <div class="card m-4 shadow-sm">
        <div class="card-body">
            <!-- Email header info -->
            <div class="d-flex align-items-center mb-4">
                <div class="flex-shrink-0">
                    <img src="{{ asset('assets/img/avatar.jpeg') }}" class="rounded-circle" width="50">
                </div>
                <div class="flex-grow-1 ms-3">
                    <div class="d-flex justify-content-between">
                        <h5 class="mb-0">Jonastino</h5>
                        <div class="email-actions">
                            <button class="btn btn-link text-muted">
                                <i class="ti ti-edit"></i>
                            </button>
                            <button class="btn btn-link text-muted">
                                <i class="ti ti-star"></i>
                            </button>
                            <button class="btn btn-link text-muted">
                                <i class="ti ti-dots-vertical"></i>
                            </button>
                        </div>
                    </div>
                    <div class="text-muted small">iAmAhoot@email.com</div>
                    <div class="text-muted small">February 25th 2025, 10:10 AM</div>
                </div>
            </div>

            <!-- Email body -->
            <div class="email-body mb-4">
                <p class="mb-0 text-muted">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit...
                </p>
            </div>

            <!-- Attachments -->
            {{-- 
            <div class="email-attachments">
                <h6>Attachments</h6>
                <div class="attachment-item d-flex align-items-center p-2 border rounded mb-2">
                    <i class="ti ti-file-spreadsheet fs-4 me-2"></i>
                    <div class="flex-grow-1">report.xlsx</div>
                    <button class="btn btn-sm btn-outline-primary">
                        <i class="ti ti-download"></i>
                    </button>
                </div>
            </div>
            --}}
        </div>
    </div>

    <!-- Reply Section Card -->
    <div class="card m-4 shadow-sm">
        <div class="card-body">
            <div class="reply-box">
                <div class="d-flex align-items-center mb-2">
                    <strong>Reply to Ross Geller</strong>
                </div>
                <div class="border rounded">
                    <div class="toolbar p-2 border-bottom">
                        <button class="btn btn-sm btn-link text-muted me-1">
                            <i class="ti ti-bold"></i>
                        </button>
                        <button class="btn btn-sm btn-link text-muted me-1">
                            <i class="ti ti-italic"></i>
                        </button>
                        <button class="btn btn-sm btn-link text-muted me-1">
                            <i class="ti ti-underline"></i>
                        </button>
                        <button class="btn btn-sm btn-link text-muted me-1">
                            <i class="ti ti-list"></i>
                        </button>
                        <button class="btn btn-sm btn-link text-muted me-1">
                            <i class="ti ti-list-numbers"></i>
                        </button>
                        <button class="btn btn-sm btn-link text-muted me-1">
                            <i class="ti ti-link"></i>
                        </button>
                        <button class="btn btn-sm btn-link text-muted">
                            <i class="ti ti-photo"></i>
                        </button>
                    </div>
                    <div class="p-3">
                        <textarea class="form-control border-0" rows="3" placeholder="Write your message..."></textarea>
                    </div>
                    <!-- Bouton d'envoi -->
                    <div class="p-2 border-top d-flex justify-content-end">
                        <button class="btn btn-primary">
                            <i class="ti ti-send"></i> Envoyer
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- Fermeture correcte de .email-detail -->
