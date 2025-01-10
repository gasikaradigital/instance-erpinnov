<div>
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold py-3 mb-0">Projets</h4>
            <a href="{{ route('create-project') }}" class="btn btn-primary">
                <i class="ti ti-plus me-1"></i>
                Nouveau projet
            </a>
        </div>

        <!-- Filtres -->
        @include('livewire.projets.filter')

        <livewire:projets.projet-statistique />

        <!-- Liste des projets -->
        <div class="card">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Réf.</th>
                            <th>Titre</th>
                            <th>Client</th>
                            <th>Cée</th>
                            <th>Fin</th>
                            <th>Progression</th>
                            <th>Statut</th>
                            <th>Priorité</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @forelse($projects as $project) --}}
                        <tr>
                            <td>
                                <span class="fw-medium">PRJ-2024-001</span>
                            </td>
                            <td>Développement Site Web</td>
                            <td>Client Example</td>
                            <td>01/01/2024</td>
                            <td>31/03/2024</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="progress w-100 me-2" style="height: 8px;">
                                        <div class="progress-bar" role="progressbar" style="width: 45%"></div>
                                    </div>
                                    <span class="text-muted">45%</span>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-label-primary">En cours</span>
                            </td>
                            <td>
                                <span class="badge bg-label-warning">Haute</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="#" class="btn btn-icon btn-sm btn-text-secondary rounded-pill">
                                        <i class="ti ti-eye"></i>
                                    </a>
                                    <a href="#" class="btn btn-icon btn-sm btn-text-secondary rounded-pill">
                                        <i class="ti ti-edit"></i>
                                    </a>
                                    <a href="#" class="btn btn-icon btn-sm btn-text-secondary rounded-pill">
                                        <i class="ti ti-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        {{-- @empty --}}
                        <tr>
                            <td colspan="9" class="text-center py-4">
                                <div class="text-center mb-3">
                                    <i class="ti ti-folder-off fs-1 text-muted"></i>
                                </div>
                                <h6 class="text-muted mb-0">Aucun projet trouvé</h6>
                                <p class="text-muted mb-0">Commencez par créer un nouveau projet</p>
                            </td>
                        </tr>
                        {{-- @endforelse --}}
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="card-footer py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="text-muted">
                        Affichage de 1 à 10 sur 25 entrées
                    </div>
                    {{-- {{ $projects->links() }} --}}
                </div>
            </div>
        </div>
    </div>
</div>
