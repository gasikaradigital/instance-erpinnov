<div class="card mb-4">
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-3">
                <label class="form-label">Recherche</label>
                <input type="text" class="form-control" wire:model.debounce.300ms="search" placeholder="Rechercher...">
            </div>
            <div class="col-md-2">
                <label class="form-label">Statut</label>
                <select class="form-select" wire:model="selectedStatus">
                    <option value="">Tous</option>
                    <option value="0">Brouillon</option>
                    <option value="1">Ouvert</option>
                    <option value="2">En cours</option>
                    <option value="3">En attente</option>
                    <option value="4">Terminé</option>
                    <option value="5">Annulé</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label">Priorité</label>
                <select class="form-select" wire:model="selectedPriority">
                    <option value="">Toutes</option>
                    <option value="0">Basse</option>
                    <option value="1">Normale</option>
                    <option value="2">Haute</option>
                    <option value="3">Urgente</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label">Client</label>
                <select class="form-select" wire:model="selectedClient">
                    <option value="">Tous</option>
                    {{-- @foreach($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                    @endforeach --}}
                </select>
            </div>
            <div class="col-md-3 d-flex align-items-end">
                <button class="btn btn-outline-secondary" wire:click="resetFilters">
                    <i class="ti ti-refresh me-1"></i>
                    Réinitialiser
                </button>
            </div>
        </div>
    </div>
</div>
