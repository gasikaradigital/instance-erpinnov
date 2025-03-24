<div>
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <div class="card-datatable table-responsive">
        <table class="table table-hover" id="draggableTable">
            <thead>
                <tr id="draggableHeader">
                    <th data-col-index="0" draggable="true" class="draggable-column">
                        <div class="dropdown">
                            <!-- Case à cocher "Tout sélectionner" -->
                            <input type="checkbox" class="form-check-input" id="selectAll" wire:click="toggleSelectAll"
                                {{ count($selectedIds) === count($data) ? 'checked' : '' }}>
                        </div>
                    </th>
                    <th data-col-index="1" draggable="true" class="draggable-column">Code</th>
                    <th data-col-index="2" draggable="true" class="draggable-column">Nom</th>
                    <th data-col-index="3" draggable="true" class="draggable-column">Type</th>
                    <th data-col-index="4" draggable="true" class="draggable-column">Nature tiers</th>
                    <th data-col-index="5" draggable="true" class="draggable-column">Email</th>
                    <th data-col-index="6" draggable="true" class="draggable-column">Commerciaux</th>
                    <th data-col-index="7" draggable="true" class="draggable-column">Téléphone</th>
                    <th data-col-index="8" draggable="true" class="draggable-column">Statut</th>
                </tr>
            </thead>
            <tbody>
                @if (count($this->data) > 0)
                    @foreach ($this->data as $tier)
                        <tr wire:key="tier-{{ $tier->id }}">
                            <td data-col-index="0">
                                <!-- Case à cocher pour chaque élément -->
                                <input type="checkbox" class="form-check-input row-checkbox"
                                    wire:click="toggleSelect({{ $tier->id }})"
                                    {{ in_array($tier->id, $selectedIds) ? 'checked' : '' }}>
                            </td>
                            <td data-col-index="1">{{ $tier->code_client }}</td>
                            <td data-col-index="2">{{ $tier->name }}</td>
                            <td data-col-index="3">
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
                            <td data-col-index="4">
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
                            <td data-col-index="5">{{ $tier->email }}</td>
                            <td data-col-index="6">---__---</td>
                            <td data-col-index="7">{{ $tier->phone }}</td>
                            <td data-col-index="8">
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
            </tbody>
        </table>
    </div>
    <link rel="stylesheet" href="{{asset('css/draggableTable.css')}}"/>
    <script src="{{ asset('js/draggableTable.js') }}"></script>
    <script src="{{ asset('js/CheckboxControl.js') }}"></script>
</div>
