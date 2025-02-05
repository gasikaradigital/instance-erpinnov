<div class="container mt-5">
    {{-- <h2 class="text-center mb-4">Tiers / Contacts</h2> --}}
    <div class="row">
        <!-- Graphique des statistiques -->
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="card-header">Statistiques</div> --}}
                <div class="card-body">
                    <canvas id="statsChart"></canvas>
                    {{-- <p class="text-center mt-3">Nombre total des tiers: <strong>2</strong></p> --}}
                </div>
            </div>
        </div>
        <!-- Derniers tiers modifiés -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Les 3 derniers tiers modifiés</div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            User
                            <span>
                                <span class="badge bg-primary">P</span> 
                                <span>13/02/2025</span>
                            </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Entreprise
                            <span>
                                <span class="badge bg-success">C</span> 
                                <span>08/07/2025</span>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>