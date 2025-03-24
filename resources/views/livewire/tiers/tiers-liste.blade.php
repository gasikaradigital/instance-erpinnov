<div>
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <div class="card-datatable table-responsive">
        <table class="table table-hover" id="draggableTable">
            <thead>
                <tr id="draggableHeader">
                    <th data-col-index="0" draggable="true" class="draggable-column">
                        <input type="checkbox" class="form-check-input" id="selectAll" wire:click="toggleSelectAll"
                            {{ count($selectedIds) === count($data) ? 'checked' : '' }}>
                    </th>
                    @php
                        $visibleCount = 1;
                    @endphp
                    @if ($visibleColumns['code'] ?? false)
                        <th data-col-index="{{ $visibleCount }}" draggable="true" class="draggable-column">Code</th>
                        @php
                            $visibleCount++;
                        @endphp
                    @endif

                    @if ($visibleColumns['nom'] ?? false)
                        <th data-col-index="{{ $visibleCount }}" draggable="true" class="draggable-column">Nom</th>

                        @php
                            $visibleCount++;
                        @endphp
                    @endif

                    @if ($visibleColumns['type'] ?? false)
                        <th data-col-index="{{ $visibleCount }}" draggable="true" class="draggable-column">Type</th>
                        @php
                            $visibleCount++;
                        @endphp
                    @endif

                    @if ($visibleColumns['nature'] ?? false)
                        <th data-col-index="{{ $visibleCount }}" draggable="true" class="draggable-column">Nature
                            tiers</th>
                        @php
                            $visibleCount++;
                        @endphp
                    @endif

                    @if ($visibleColumns['email'] ?? false)
                        <th data-col-index="{{ $visibleCount }}" draggable="true" class="draggable-column">Email</th>
                        @php
                            $visibleCount++;
                        @endphp
                    @endif

                    @if ($visibleColumns['commerciaux'] ?? false)
                        <th data-col-index="{{ $visibleCount }}" draggable="true" class="draggable-column">Commerciaux
                        </th>
                        @php
                            $visibleCount++;
                        @endphp
                    @endif

                    @if ($visibleColumns['telephone'] ?? false)
                        <th data-col-index="{{ $visibleCount }}" draggable="true" class="draggable-column">Téléphone
                        </th>
                        @php
                            $visibleCount++;
                        @endphp
                    @endif

                    @if ($visibleColumns['statut'] ?? false)
                        <th data-col-index="{{ $visibleCount }}" draggable="true" class="draggable-column">Statut</th>
                        @php
                            $visibleCount++;
                        @endphp
                    @endif
                </tr>
            </thead>
            <tbody>
                @if (count($data) > 0)
                    @foreach ($data as $tier)
                        @php
                            $dataIndexCounter = 1;
                        @endphp
                        <tr wire:key="tier-{{ $tier->id }}">
                            <td data-col-index="0">
                                <input type="checkbox" class="form-check-input row-checkbox"
                                    wire:click="toggleSelect({{ $tier->id }})"
                                    {{ in_array($tier->id, $selectedIds) ? 'checked' : '' }}>
                            </td>

                            @if ($visibleColumns['code'] ?? false)
                                <td data-col-index="{{ $dataIndexCounter }}">{{ $tier->code_client }}</td>
                                @php
                                    $dataIndexCounter++;
                                @endphp
                            @endif

                            @if ($visibleColumns['nom'] ?? false)
                                <td data-col-index="{{ $dataIndexCounter }}">{{ $tier->name }}</td>
                                @php
                                    $dataIndexCounter++;
                                @endphp
                            @endif

                            @if ($visibleColumns['type'] ?? false)
                                <td data-col-index="{{ $dataIndexCounter }}">
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
                                @php
                                    $dataIndexCounter++;
                                @endphp
                            @endif
                            @if ($visibleColumns['nature'])
                                <td data-col-index="{{ $dataIndexCounter }}">
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
                                @php
                                    $dataIndexCounter++;
                                @endphp
                            @endif

                            @if ($visibleColumns['email'])
                                <td data-col-index="{{ $dataIndexCounter }}">{{ $tier->email }}</td>
                                @php
                                    $dataIndexCounter++;
                                @endphp
                            @endif
                            @if ($visibleColumns['commerciaux'])
                                <td data-col-index="{{ $dataIndexCounter }}">---__---</td>
                                @php
                                    $dataIndexCounter++;
                                @endphp
                            @endif
                            @if ($visibleColumns['telephone'])
                                <td data-col-index="{{ $dataIndexCounter }}">{{ $tier->phone }}</td>
                                @php
                                    $dataIndexCounter++;
                                @endphp
                            @endif
                            @if ($visibleColumns['statut'])
                                <td data-col-index="{{ $dataIndexCounter }}">
                                    @if ($tier->status == '1')
                                        <span class="badge bg-label-success">Actif</span>
                                    @else
                                        <span class="badge bg-label-danger">Inactif</span>
                                    @endif
                                </td>
                                @php
                                    $dataIndexCounter++;
                                @endphp
                            @endif
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="{{ count(array_filter($visibleColumns)) + 1 }}" class="text-center">
                            Aucun résultat trouvé.
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    <link rel="stylesheet" href="{{ asset('css/draggableTable.css') }}" />
    <script src="{{ asset('js/draggableTable.js') }}"></script>
    <script src="{{ asset('js/CheckboxControl.js') }}"></script>
</div>
