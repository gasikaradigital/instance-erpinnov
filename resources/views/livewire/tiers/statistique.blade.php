<div class="row mb-3">
    <div class="col-12 mb-0 ">
        <div class="card card-hover-shadow mb-4">
            <div class="card-header bg-light fw-bold mb-3">
                <h5 class="card-title mb-0">Aperçu des statistiques</h5>
            </div>
            <div class="card-body">
                <div class="row d-flex justify-content-between align-items-center mb-4">
                    <!-- Tiers Actifs -->
                    <div class="col-md-6 col-lg-3 text-center">
                        <div class="d-flex flex-column align-items-center">
                            <div class="avatar bg-light-primary p-2 mb-3">
                                <span class="avatar-initial rounded bg-primary">
                                    <i class="ti ti-building ti-md"></i>
                                </span>
                            </div>
                            <div class="content-center">
                                <span class="fw-medium d-block mb-1">Tiers Actifs</span>
                                <div class="d-flex align-items-baseline justify-content-center">
                                    <h4 class="mb-0 me-2">{{ count(array_filter($data, function($item) { return $item->status == 1; })) }}                                    </h4>
                                    <small class="text-success"></small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Clients -->
                    <div class="col-md-6 col-lg-3 text-center">
                        <div class="d-flex flex-column align-items-center">
                            <div class="avatar bg-light-success p-2 mb-3">
                                <span class="avatar-initial rounded bg-success">
                                    <i class="ti ti-users ti-md"></i>
                                </span>
                            </div>
                            <div class="content-center">
                                <span class="fw-medium d-block mb-1">Clients</span>
                                <div class="d-flex align-items-baseline justify-content-center">
                                    <h4 class="mb-0 me-2">{{ count(array_filter($data, function($item) { return $item->client == 1 || $item->client==3; })) }}</h4>
                                    <small class="text-success"></small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Fournisseurs -->
                    <div class="col-md-6 col-lg-3 text-center">
                        <div class="d-flex flex-column align-items-center">
                            <div class="avatar bg-light-warning p-2 mb-3">
                                <span class="avatar-initial rounded bg-warning">
                                    <i class="ti ti-truck ti-md"></i>
                                </span>
                            </div>
                            <div class="content-center">
                                <span class="fw-medium d-block mb-1">Fournisseurs</span>
                                <div class="d-flex align-items-baseline justify-content-center">
                                    <h4 class="mb-0 me-2">{{ count(array_filter($data, function($item) { return $item->fournisseur == 1; })) }}</h4>
                                    <small class="text-danger"></small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Prospects -->
                    <div class="col-md-6 col-lg-3 text-center">
                        <div class="d-flex flex-column align-items-center">
                            <div class="avatar bg-light-info p-2 mb-3">
                                <span class="avatar-initial rounded bg-info">
                                    <i class="ti ti-target ti-md"></i>
                                </span>
                            </div>
                            <div class="content-center">
                                <span class="fw-medium d-block mb-1">Prospects</span>
                                <div class="d-flex align-items-baseline justify-content-center">
                                    <h4 class="mb-0 me-2">{{ count(array_filter($data, function($item) { return $item->client == 2 || $item->client==3; })) }}</h4>
                                    <small class="text-success"></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
