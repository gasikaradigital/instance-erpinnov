<div>
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <div class="card-datatable table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>
    <div class="dropdown">
        <span  id="columnToggle" data-bs-toggle="dropdown" aria-expanded="false">
                         <i class="fas fa-list"></i>
                         </span>

                        <!-- Case à cocher "Tout sélectionner" -->
                        <input type="checkbox" class="form-check-input" id="selectAll" wire:click="toggleSelectAll"
                            {{ count($selectedIds) === count($data) ? 'checked' : '' }}>

                                 <ul class="dropdown-menu shadow-sm py-1" aria-labelledby="columnToggle">
                                         <li class="px-3 py-1">
                                                 <div class="form-check mb-0">
                                                    <input class="form-check-input" type="checkbox" id="nomCheck" data-column="4">
                                                        <label class="form-check-label small" for="nomCheck">
                                                                Code
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li class="px-3 py-1">
                                                        <div class="form-check mb-0">
                                                            <input class="form-check-input" type="checkbox" id="prenomCheck" data-column="5" checked>
                                                            <label class="form-check-label small" for="prenomCheck">
                                                                Nom
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li class="px-3 py-1">
                                                        <div class="form-check mb-0">
                                                            <input class="form-check-input" type="checkbox" id="genreCheck" data-column="6" checked>
                                                            <label class="form-check-label small" for="genreCheck">
                                                                Type
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li class="px-3 py-1">
                                                        <div class="form-check mb-0">
                                                            <input class="form-check-input" type="checkbox" id="salarieCheck" data-column="7" checked>
                                                            <label class="form-check-label small" for="salarieCheck">
                                                                Nature tiers
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li class="px-3 py-1">
                                                        <div class="form-check mb-0">
                                                            <input class="form-check-input" type="checkbox" id="responsableCheck" data-column="8" checked>
                                                            <label class="form-check-label small" for="responsableCheck">
                                                                Email
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li class="px-3 py-1">
                                                        <div class="form-check mb-0">
                                                            <input class="form-check-input" type="checkbox" id="compteCheck" data-column="9">
                                                            <label class="form-check-label small" for="compteCheck">
                                                                Commerciaux
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li class="px-3 py-1">
                                                        <div class="form-check mb-0">
                                                            <input class="form-check-input" type="checkbox" id="telCheck" data-column="10" checked>
                                                            <label class="form-check-label small" for="telCheck">
                                                                Téléphone
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li class="px-3 py-1">
                                                        <div class="form-check mb-0">
                                                            <input class="form-check-input" type="checkbox" id="telCheck" data-column="10" checked>
                                                            <label class="form-check-label small" for="telCheck">
                                                               Statut
                                                            </label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                    </th>

                    </th>
                    <th>Code</th>
                    <th>Nom</th>
                    <th>Type</th>
                    <th>Nature tiers</th>
                    <th>Email</th>
                    <th>Commerciaux</th>
                    <th>Téléphone</th>
                    <th>Statut</th>
                </tr>
            </thead>
            @if (count($this->data) > 0)
                @foreach ($this->data as $tier)
                    <tr wire:key="tier-{{ $tier->id }}">
                        <td>
                            <!-- Case à cocher pour chaque élément -->
                            <input type="checkbox" class="form-check-input row-checkbox"
                                wire:click="toggleSelect({{ $tier->id }})"
                                {{ in_array($tier->id, $selectedIds) ? 'checked' : '' }}>
                        </td>
                        <td>{{ $tier->code_client }}</td>
                        <td>{{ $tier->name }}</td>
                        <td>
                            @switch($tier->typent_code)
                                @case('TE_ADMIN')
                                    <span class="badge bg-label-primary">Administration</span>
                                @break

                                @case('TE_OTHER')
                                    <span class="badge bg-label-primary">Autre</span>
                                @break

                                @case('TE_GROUP')
                                    <span class="badge bg-label-primary">Grand Compte</span>
                                @break

                                @case('TE_MEDIUM')
                                    <span class="badge bg-label-primary">PME/PMI</span>
                                @break

                                @case('TE_PRIVATE')
                                    <span class="badge bg-label-primary">Particulier</span>
                                @break

                                @case('TE_SMALL')
                                    <span class="badge bg-label-primary">TPE</span>
                                @break

                                @default
                                    <span class="badge bg-label-primary"></span>
                            @endswitch
                        </td>
                        <td>
                            @switch($tier->client)
                                @case('2')
                                    <span class="badge bg-info">P</span>
                                @break

                                @case('1')
                                    <span class="badge bg-success">C</span>
                                @break

                                @case('0')
                                    <span class="badge bg-danger">NCP</span>
                                @break
                            @endswitch
                        </td>
                        <td>{{ $tier->email }}</td>
                        <td> ---__---</td>

                        <td>{{ $tier->phone }}</td>
                        <td>
                            @if ($tier->status == '1')
                                <span class="badge bg-label-success">Actif</span>
                            @else
                                <span class="badge bg-label-danger">Inactif</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="9" class="text-center">Aucun résultat trouvé.</td>
                </tr>
            @endif
        </table>
    </div>
    <script src="{{ asset('js/CheckboxControl.js') }}"></script>
</div>
