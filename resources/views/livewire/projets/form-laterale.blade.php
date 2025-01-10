<div class="col-xl-4 col-lg-5">
    <!-- État et priorité -->
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">État et priorité</h5>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label d-block">Statut</label>
                <div class="btn-group w-100" role="group">
                    @foreach([
                        ['value' => 0, 'label' => 'Brouillon', 'color' => 'secondary'],
                        ['value' => 1, 'label' => 'Ouvert', 'color' => 'primary'],
                        ['value' => 2, 'label' => 'En cours', 'color' => 'info']
                    ] as $status)
                        <input type="radio" class="btn-check" name="status"
                            id="status_{{ $status['value'] }}"
                            wire:model="status_id"
                            value="{{ $status['value'] }}">
                        <label class="btn btn-outline-{{ $status['color'] }}"
                            for="status_{{ $status['value'] }}">
                            {{ $status['label'] }}
                        </label>
                    @endforeach
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Priorité</label>
                <select class="form-select" wire:model="priority">
                    <option value="0">Basse</option>
                    <option value="1">Normale</option>
                    <option value="2">Haute</option>
                    <option value="3">Urgente</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Visibilité</label>
                <select class="form-select" wire:model="visibility">
                    <option value="0">Privé</option>
                    <option value="1">Public</option>
                </select>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" wire:model="bill_time" id="bill_time">
                <label class="form-check-label" for="bill_time">
                    Temps facturable
                </label>
            </div>
        </div>
    </div>

    <!-- Client et contacts -->
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Client et contacts</h5>
            <button type="button" class="btn btn-primary btn-sm">
                <i class="ti ti-plus me-1"></i>Ajouter
            </button>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label">Client</label>
                <select class="form-select" wire:model="client_id">
                    <option value="">Sélectionner un client</option>
                    {{-- Options des clients --}}
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label d-block">Contacts associés</label>
                <div class="d-flex flex-wrap gap-2">
                        <div class="badge bg-label-primary"
                             x-data="{ show: true }"
                             x-show="show"
                             x-transition.duration.300ms>
                            <i class="ti ti-user me-1"></i>
                            Jhon Doe
                            <button type="button"
                                    class="btn btn-icon btn-sm"
                                    @click="show = false; setTimeout(() => $wire.removeContact(1), 300)">
                                <i class="ti ti-x"></i>
                            </button>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Équipe -->
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Équipe projet</h5>
            <button type="button" class="btn btn-primary btn-sm">
                <i class="ti ti-plus me-1"></i>Ajouter
            </button>
        </div>
        <div class="card-body">
            <div class="d-flex flex-column gap-3">
                <!-- Liste des membres -->
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-2">
                        <div class="avatar avatar-sm">
                            <img src="" alt="avatar" class="rounded-circle">
                        </div>
                        <div>
                            <h6 class="mb-0">Jane Smith</h6>
                            <small class="text-muted">Chef de projet</small>
                        </div>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="button" class="btn btn-icon btn-sm btn-text-secondary rounded-pill">
                            <i class="ti ti-pencil"></i>
                        </button>
                        <button type="button" class="btn btn-icon btn-sm btn-text-secondary rounded-pill">
                            <i class="ti ti-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
