<div>
    <div class="container-flux p-6 flex-grow-1 container-p-y">
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
                            <th>Description</th>
                            <th>Crée</th>
                            <th>Fin</th>
                            <th>Montant opportunité</th>
                            <th>Statut</th>
                            <th>Visibilité</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    @if(count($data ?? [] > 0))
                    @foreach($data as $projet)
                    <tbody>
                        {{-- @forelse($projects as $project) --}}
                        <tr>
                            <td>
                                <span class="fw-medium">{{ $projet->ref}}</span>
                            </td>
                            <td>{{ $projet->title }}</td>
                            <td>{{ $projet->description}}</td>
                            <td>@php
                                    $timestamp = $projet->date_start; // Votre timestamp
                                    $date = \Carbon\Carbon::createFromTimestamp($timestamp)->setTimezone('Europe/Paris');
                                @endphp

                                {{ $date->format('d/m/Y') }}
                            </td>
                            <td>
                                @php
                                    $timestamp = $projet->date_end; // Votre timestamp
                                    $date = \Carbon\Carbon::createFromTimestamp($timestamp)->setTimezone('Europe/Paris');
                                @endphp

                                {{ $date->format('d/m/Y') }}
                            </td>
                            <td>{{ $projet->budget_amount}}</td>
                            <td>
                                <span class="badge bg-label-primary">En cours</span>
                            </td>
                            <td>
                            @switch($projet->public)
                                @case ('0')
                                <span class="badge bg-label-warning">Contact asigné</span>
                                @break
                                
                                @case ('1')
                                <span class="badge bg-label-warning">Tout le monde</span>
                                @break

                            @endswitch
                                
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
                        
                    </tbody>
                    @endforeach
                    @else
                    <tbody>
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
                    @endif
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
