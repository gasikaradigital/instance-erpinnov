<div>
    <div class="card-datatable table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>

                    <th>Code</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Téléphone</th>
                    <th>Tél portable</th>
                    <th>Email</th>
                    <th>Tiers</th>
                    <th>Visibilité</th>
                    <th>Etat</th>
                </tr>
            </thead>
            @if(count($data ?? []) > 0)
            @foreach($data as $contact)
            <tbody>
                <tr>
                    <td>---</td>
                    <td>{{ $contact->firstname }} {{ $contact->lastname }}</td>
                    <td>{{ $contact->lastname}}</td>
                    <td>{{ $contact->phone_pro}}</td>
                    <td>{{ $contact->phone_mobile }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->socname}}</td>
                    <td>
                        @if($contact->priv == "1")
                            <span>Privé</span>
                        @else
                            <span>Ouvert</span>
                        @endif
                    </td>
                    <td>
                        @if($contact->statut == "1")
                            <span class="badge bg-label-success">Ouvert </span>
                        @else
                            <span class="Bagde bg-label-success"> Fermer</span>
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
