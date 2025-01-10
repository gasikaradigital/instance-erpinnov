<div>
<div class="container-xxl flex-grow-1 container-p-y">
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
                        <th>Priorité</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="11" class="text-center py-4">
                            <div class="text-muted">Aucune tâche trouvée</div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>
</div>
