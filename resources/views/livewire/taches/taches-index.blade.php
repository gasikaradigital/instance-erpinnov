<div>
<div class="container-flux p-6 flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold py-3 mb-0">
            <span class="text-muted fw-light">Tâches /</span> Liste
        </h4>
        <a href="{{ route('create-tache') }}" class="btn btn-primary">
            <i class="ti ti-plus me-1"></i>
            Nouvelle tâche
        </a>
    </div>

    @include('livewire.taches.statistique')

    @include('livewire.taches.filters')

    <!-- Liste des Tâches -->
    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Réf.</th>
                        <th>Description</th>
                        <th>Projet</th>
                        <th>Date début</th>
                        <th>Date fin</th>
                        <th>Temps prévu</th>
                        <th>Temps passé</th>
                        <th>Progrès</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                @if(count($data ?? []) > 0)
                @foreach($data as $tache)
                <tbody>
                    <tr>
                        <td class="text-center py-4">
                            <div class="text-muted">{{ $tache->ref }}</div>
                        </td>
                        <td class="text-center py-4">
                            <div class="text-muted">{{ $tache->description }}</div>
                        </td>
                        <td class="text-center py-4">
                            <div class="text-muted">{{ $tache->project_title }}</div>
                        </td>
                        <td class="text-center py-4">
                            <div class="text-muted">{{ $tache->date_start_formatted }}</div>
                        </td>
                        <td class="text-center py-4">
                            <div class="text-muted">{{ $tache->date_end_formatted }}</div>
                        </td>
                        <td class="text-center py-4">
                            <div class="text-muted">{{ $tache->planned_workload_formatted }}</div>
                        </td>
                        <td class="text-center py-4">
                            <div class="text-muted">{{ $tache->duration_effective_formatted }}</div>
                        </td>
                        <td class="text-center py-4">
                            <div class="text-muted">{{ $tache->progress }}%</div>
                        </td>
                    </tr>
                </tbody>
                @endforeach
                @endif
            </table>
        </div>
    </div>
    
</div>
</div>
