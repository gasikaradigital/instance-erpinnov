<div>
    <div class="card-datatable table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Nom</th>
                    <th>Type</th>
                    <th>Nature tiers</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            @if(count($data ?? []) > 0)
            @foreach($data as $tier)
            <tbody>
                <tr>
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
                            <span class="badge bg-label-primary">Prospect</span>
                        @break

                        @case('3')
                            <span class="badge bg-label-primary">Prospect/Client</span>
                        @break

                        @case('1')
                            <span class="badge bg-label-primary">Client</span>
                        @break

                        @case('0')
                            <span class="badge bg-label-primary">Ni client, ni prospect</span>
                        @break
                    @endswitch
                    </td>
                    <td>{{ $tier->email }}</td>
                    <td>{{ $tier->phone}}</td>
                    <td>
                    @if($tier->status == "1")
                        <span class="badge bg-label-success">Actif</span>
                    @else
                        <span class="Bagde bg-label-success"> Inactif</span>
                    @endif
                    </td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="ti ti-dots-vertical"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="javascript:void(0);">
                                    <i class="ti ti-pencil me-1"></i> Modifier
                                </a>
                                <a class="dropdown-item" href="javascript:void(0);">
                                    <i class="ti ti-trash me-1"></i> Supprimer
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
                <!-- Ajoutez d'autres lignes similaires pour plus d'exemples -->
            </tbody>
            @endforeach
            @endif
            
        </table>
    </div>

    <div class="card-footer">
        <div class="d-flex justify-content-between align-items-center">
        </div>
    </div>
</div>
