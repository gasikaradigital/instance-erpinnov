<div>
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <div class="card-datatable table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>
                        <!-- Case à cocher "Tout sélectionner" -->
                        <input type="checkbox" class="form-check-input" id="selectAll" wire:click="toggleSelectAll"
                            {{ count($selectedIds) === count($data) ? 'checked' : '' }}>
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
