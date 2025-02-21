<link rel="stylesheet" href="{{ asset('css/custom.css') }}">

<div>
    <div class="card-datatable table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>
                        <input type="checkbox" class="form-check-input" id="selectAll">
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
            @if(count($data ?? []) > 0)
            @foreach($data as $tier)
            <tbody>
                <tr>
                    <td>
                        <input type="checkbox" class="form-check-input row-checkbox">
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
                            <span class="badge bg-label-primary">Prospect</span>
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
                    <td>---</td>
                    <td>{{ $tier->phone}}</td>
                    <td>
                    @if($tier->status == "1")
                        <span class="badge bg-label-success">Actif</span>
                    @else
                        <span class="Bagde bg-label-success"> Inactif</span>
                    @endif
                    </td>
                </tr>
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
<script src="{{ asset('js/CheckboxControl.js') }}"></script>



