@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Left Column -->
        <div class="col-md-8">
            <!-- Statistics - Commercial Propositions -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Statistiques - Propositions commerciales</h5>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        @if(count($statistics ?? []) > 0)
                            <div class="row">
                                <!-- Add your statistics charts here -->
                            </div>
                        @else
                            <p class="text-muted">Pas assez de données...</p>
                        @endif
                    </div>
                    <div class="mt-3">
                        <p class="text-end mb-0">Total: {{ $total ?? 0 }}</p>
                    </div>
                </div>
            </div>

            <!-- Statistics - Orders -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Statistiques - Commandes</h5>
                </div>
                <div class="card-body">
                    <div class="donut-chart-container">
                        <!-- Add your donut chart here -->
                        <div class="legend">
                            <div class="d-flex align-items-center mb-2">
                                <span class="badge bg-warning me-2">&nbsp;</span> Validée
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <span class="badge bg-success me-2">&nbsp;</span> En cours
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <span class="badge bg-secondary me-2">&nbsp;</span> Livrée
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="badge bg-light me-2">&nbsp;</span> Annulée
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Draft Proposals -->
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Propositions commerciales brouillons <span class="badge bg-secondary">0</span></h5>
                </div>
                <div class="card-body">
                    <p class="text-muted">Pas de proposition</p>
                </div>
            </div>

            <!-- Draft Orders -->
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Commandes brouillons <span class="badge bg-secondary">1</span></h5>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <i class="bi bi-file-earmark-text text-success"></i>
                                (PROV2) FIBASOM...
                            </div>
                            <span>0.00</span>
                        </div>
                    </div>
                    <div class="text-end mt-2">
                        <p class="mb-0">Total: 0.00</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div class="col-md-4">
            <!-- Latest Clients -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Les 3 derniers clients ou prospects <span class="badge bg-secondary">3</span></h5>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        @foreach([
                            ['name' => 'HOTEL PLUS', 'desc' => '(Matériel de cuisine)', 'date' => '10/02/2025'],
                            ['name' => 'RTN', 'desc' => '(Television, publicité)', 'date' => '01/02/2025'],
                            ['name' => 'Electrical Engineering Madagascar', 'desc' => '(Electricité Tana)', 'date' => '31/01/2025']
                        ] as $client)
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <i class="bi bi-building"></i>
                                <strong>{{ $client['name'] }}</strong>
                                <small class="text-muted">{{ $client['desc'] }}</small>
                            </div>
                            <span class="text-muted">{{ $client['date'] }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Latest Modified Commercial Proposals -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Les 3 dernières propositions commerciales modifiées <span class="badge bg-secondary">0</span></h5>
                </div>
                <div class="card-body">
                    <p class="text-muted">Pas de proposition</p>
                </div>
            </div>

            <!-- Latest Modified Orders -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Les 3 dernières commandes modifiées <span class="badge bg-secondary">1</span></h5>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <i class="bi bi-file-earmark-text text-success"></i>
                                (PROV2) FIBASOM
                            </div>
                            <span>16/02/2025</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Latest Modified Suppliers -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Les 3 derniers fournisseurs modifiés <span class="badge bg-secondary">3</span></h5>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        @foreach([
                            ['name' => 'Maitre MAHATEZA Pascalette', 'date' => '14/02/2025'],
                            ['name' => 'SNACK NY DIA', 'date' => '12/02/2025'],
                            ['name' => 'SERVICE SECOURS', 'date' => '11/02/2025']
                        ] as $supplier)
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <i class="bi bi-building"></i>
                                {{ $supplier['name'] }}
                            </div>
                            <span class="text-muted">{{ $supplier['date'] }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .card {
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    }
    .badge {
        font-weight: normal;
    }
    .list-group-item {
        border-left: none;
        border-right: none;
    }
    .list-group-item:first-child {
        border-top: none;
    }
    .list-group-item:last-child {
        border-bottom: none;
    }
</style>
@endpush