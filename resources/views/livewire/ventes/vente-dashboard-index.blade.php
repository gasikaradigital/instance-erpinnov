<link rel="stylesheet" href="{{ asset('css/custom.css') }}">

<div class="container">
    <div class="d-flex align-items-center">
    <i class="menu-icon fas fa-suitcase"></i>
    <h4 class="fw-bold py-3 mb-2">Espace commercial</h4>
    </div>
    <div class="row">
        <!-- colonne gauches -->
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Statistiques - Propositions de ventes</h5>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        @if (count($statistics ?? []) > 0)
                            <!-- Si données disponibles -->
                        @else
                            <div>
                                <img src="{{ asset('assets/img/nography.png') }}" alt="Description de l'image"
                                    class="img-fluid" style="max-height: 100px;">
                            </div>
                            <p class="text-muted mt-3">Pas assez de données...</p>
                        @endif
                    </div>
                    <div class="mt-3">
                        <p class="text-end mb-0">Total: {{ $total ?? 0 }}</p>
                    </div>
                </div>
            </div>

            <!-- Statistiques - commandes -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Statistiques - Ventes</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <canvas id="orderStats" width="200" height="200"></canvas>
                        </div>
                        <div class="col-md-4">
                            <div class="legend mt-4">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="badge me-2"
                                        style="background-color: #e9ecef">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                    <span>Brouillon</span>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <span class="badge me-2"
                                        style="background-color: #ffc107">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                    <span>Validée</span>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <span class="badge me-2"
                                        style="background-color: #198754">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                    <span>En cours</span>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <span class="badge me-2"
                                        style="background-color: #6c757d">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                    <span>Livrée</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <span class="badge me-2"
                                        style="background-color: #f8f9fa">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                    <span>Annulée</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- ventes brouillons -->
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Commandes brouillons <span class="badge bg-secondary">1</span></h5>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center ">
                                <span class="text-success me-2" style="font-size: 0.8em;">
                                    <i class="fas fa-square"></i>
                                </span>
                                (PROV2)
                                <span class="text-primary me-2 ">
                                    <i class="fas fa-file-text p-2"></i>
                                </span>
                                <span class="text-primary">FIBASOM...</span>
                            </div>
                            <span class="text-end">0,00</span>
                        </div>
                    </div>
                    <div class="px-3 py-2 border-top">
                        <p class="text-end mb-0">Total: 0,00</p>
                    </div>
                </div>
            </div>
            <!-- derniers fournisseurs modifiés -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Les 3 derniers fournisseurs modifiés <span class="badge bg-secondary">3</span></h5>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <span class="text-primary me-2">
                                    <i class="bi bi-building"></i>
                                </span>
                                <span>Maitre MAHATEZA Pascalette</span>
                                <span class="text-muted ms-2">(Maitre MAHATEZA Pascalette)</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="badge bg-info me-3">F</span>
                                <span class="text-muted">14/02/2025</span>
                            </div>
                        </div>

                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <span class="text-primary me-2">
                                    <i class="bi bi-building"></i>
                                </span>
                                <span>SNACK NY DIA</span>
                                <span class="text-muted ms-2">(SNACK NY DIA)</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="badge bg-info me-3">F</span>
                                <span class="text-muted">12/02/2025</span>
                            </div>
                        </div>

                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <span class="text-primary me-2">
                                    <i class="bi bi-building"></i>
                                </span>
                                <span>SERVICE SECOURS</span>
                                <span class="text-muted ms-2">(SERVICE SECOURS)</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="badge bg-info me-3">F</span>
                                <span class="text-muted">11/02/2025</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--colonne à  droite -->
        <div class="col-md-4">
            <!-- derniers clients ou prospects -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Les 3 derniers clients ou prospects <span class="badge bg-secondary">
                        </span></h5>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <span class="me-2"><i class="bi bi-building text-primary"></i></span>
                                <div>
                                    HOTEL PLUS <span class="text-muted">(Matériel de cuisine)</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="badge bg-light text-dark me-2">P</span>
                                <span class="badge bg-success">C</span>
                                <span class="ms-3 text-muted">10/02/2025</span>
                            </div>
                        </div>

                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <span class="me-2"><i class="bi bi-building text-primary"></i></span>
                                <div>
                                    RTN <span class="text-muted">(Television, publicité)</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="badge bg-light text-dark me-2">P</span>
                                <span class="badge bg-success">C</span>
                                <span class="ms-3 text-muted">01/02/2025</span>
                            </div>
                        </div>

                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <span class="me-2"><i class="bi bi-building text-primary"></i></span>
                                <div>
                                    Electrical Engineering Madagascar <span class="text-muted">(Electricité
                                        Tana)</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="badge bg-light text-dark me-2">P</span>
                                <span class="badge bg-success">C</span>
                                <span class="ms-3 text-muted">31/01/2025</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- derniers propositions de ventes modifiéS -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Les 3 dernières propositions de ventes modifiées <span class="badge bg-secondary">
                            <!-- Valeurs -->
                        </span></h5>
                </div>
                <div class="card-body">
                    <p class="text-muted">Pas de proposition</p>
                </div>
            </div>

            <!--derniers ventes modifiés-->
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Les 3 dernières ventes modifiées <span class="badge bg-secondary"><!-- Valeurs -->
                        </span></h5>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center ">
                                <span class="text-success me-2" style="font-size: 0.8em;">
                                    <i class="fas fa-square"></i>
                                </span>
                                (PROV2)
                                <span class="text-primary me-2 ">
                                    <i class="fas fa-file-text p-2"></i>
                                </span>
                                <span class="text-primary">FIBASOM...</span>
                            </div>
                            <span class="text-end">16/02/2025</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- proposition de ventes en brouillons -->
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Propositions de ventes brouillons <span class="badge bg-secondary"> <!-- Valeurs -->
                        </span></h5>
                </div>
                <div class="card-body">
                    <p class="text-muted">Pas de proposition</p>
                </div>
            </div>

        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('orderStats').getContext('2d');
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Brouillon', 'Validée', 'En cours', 'Livrée', 'Annulée'],
                datasets: [{
                    data: [1, 1, 1, 1, 1], // Remplacez à remplacer par les données réelles
                    backgroundColor: [
                        '#e9ecef', // Brouillon
                        '#ffc107', // Validée
                        '#198754', // En cours
                        '#6c757d', // Livrée
                        '#f8f9fa' // Annulée
                    ],
                    borderWidth: 1,
                    borderColor: '#fff'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '70%',
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    });
</script>
