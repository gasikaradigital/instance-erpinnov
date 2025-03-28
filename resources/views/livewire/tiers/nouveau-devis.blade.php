<!-- Font Awesome -->
<div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/produitService.css') }}">
    <div class="container mt-5">

        <div class="d-flex align-items-center">
            <i class="menu-icon fas fa-file-signature fa-2x me-2"></i> <!-- Agrandit l'icône -->
            <h2 class="fs-3 mb-0">Créer un devis</h2>
        </div>

        <div class="card p-2 mb-3">
            <div class="card-body">
                <form id="newDraftForm"  wire:submit.prevent="submit">
                    <!-- Section 1: Informations client -->
                    <h3 class="fs-5 mb-2 text-secondary"><i class="fas fa-user-tie me-2"></i>Informations client</h3>
                    <div class="row mb-2">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Réf. client</label>
                            <input type="text" class="form-control custom-form-control" id="refId" wire:model='ref_client'>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Client</label>
                            <div class="input-group border rounded">
                                <select class="form-select custom-form-control border-0" id="clientSelect"
                                    wire:model.live="socid">
                                    <option value="0" disabled>Sélectionner un tier</option>
                                    @foreach ($listeTiers as $tier)
                                        <option value="{{ $tier['id'] }}">{{ $tier['name'] }}</option>
                                    @endforeach
                                </select>
                                <a  href="{{ route('create-tiers') }}" class="input-group-text border-0"><i class="fas fa-plus"></i></a>
                            </div>
                        </div>
                        @if (count($contactList) != 0)
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Contact</label>
                                <select class="form-select custom-form-control">
                                    <option value="0" disabled>Sélectionner</option>
                                    @foreach ($contactList as $contact)
                                        <option value="{{ $contact['id'] }}">{{ $contact['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

                    <!-- Section 2: Dates -->
                    <div class="card p-2 mb-3">
                        <div class="card-body">
                    <h3 class="fs-5 mb-2 text-secondary"><i class="fas fa-calendar-alt me-2"></i>Dates et délais</h3>
                    <div class="row mb-2">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Date de proposition</label>
                            <div class="input-group border rounded">
                                <input type="date" class="form-control custom-form-control border-0"
                                    wire:model='datep'>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Date de livraison</label>
                            <div class="input-group border rounded">
                                <input type="date" class="form-control custom-form-control border-0"
                                    wire:model="delivery_date">
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Durée de validité</label>
                            <div class="input-group border rounded">
                                <input type="number" class="form-control custom-form-control border-0" wire:model='duree_validite'>
                                <span class="input-group-text border-0"><i class="fas fa-clock"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                    <!-- Section 3: Conditions de règlement -->
                    <div class="card p-2 mb-3 ">
                        <div class="card-body">
                    <h3 class="fs-5 mb-2 text-secondary"><i class="fas fa-money-check-alt me-2"></i>Conditions de
                        règlement</h3>
                    <div class="row mb-2">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Cond. règlement</label>
                            <select class="form-select custom-form-control" wire:model.live='cond_reglement_id'>
                                <option value="0" disabled>Sélectionner</option>
                                <option value="1" data-deposit_percent="" data-select2-id="36">À réception</option>
                                <option value="2" data-deposit_percent="" data-select2-id="37">30 jours</option>
                                <option value="3" data-deposit_percent="" data-select2-id="38">30 jours fin de mois
                                </option>
                                <option value="4" data-deposit_percent="" data-select2-id="39">60 jours</option>
                                <option value="5" data-deposit_percent="" data-select2-id="40">60 jours fin de mois
                                </option>
                                <option value="6" data-deposit_percent="" data-select2-id="41">À commande</option>
                                <option value="7" data-deposit_percent="" data-select2-id="42">À livraison</option>
                                <option value="8" data-deposit_percent="" data-select2-id="43">50/50</option>
                                <option value="9" data-deposit_percent="" data-select2-id="44">10 jours</option>
                                <option value="10" data-deposit_percent="" data-select2-id="45">10 jours fin de mois
                                </option>
                                <option value="11" data-deposit_percent="" data-select2-id="46">14 jours</option>
                                <option value="12" data-deposit_percent="" data-select2-id="47">14 jours fin de
                                    mois</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Mode de règlement</label>
                            <select class="form-select custom-form-control select2" id="modeReglement"
                                wire:model='mode_reglement_id'>
                                <option value="0" disabled>Sélectionner</option>
                                <option value="1">Carte bancaire</option>
                                <option value="2">Chèque</option>
                                <option value="3">Espèce</option>
                                <option value="4">Ordre de prélèvement</option>
                                <option value="5">Virement bancaire</option>
                                <!-- Ajoutez vos options ici -->
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Origine</label>
                            <select class="form-select custom-form-control" wire:model='demand_reason_id'>
                                <option value="0" disabled>Sélectionner</option>
                                <option value="1">Bouche à oreille</option>
                                <option value="2">Campagne Publicitaires</option>
                                <option value="3">Campagne Téléphonique</option>
                                <option value="4">Campagne d'emailing</option>
                                <option value="5">Contact commercial</option>
                                <option value="6">Contact en boutique</option>
                                <option value="7">Employé</option>
                                <option value="8">Incoming contact of a customer</option>
                                <option value="9">Internet</option>
                                <option value="10">Parrainage/Sponsoring</option>
                                <option value="11">Partenaire</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Délai de livraison (après commande)</label>
                            <select class="form-select custom-form-control" wire:model='availability_id'>
                                <option value="0" disabled>Sélectionner</option>
                                <option value="1">Bouche à oreille</option>
                                <option value="2">Campagne Publicitaires</option>
                                <option value="3">Campagne Téléphonique</option>
                                <option value="4">Campagne d'emailing</option>
                                <option value="5">Contact commercial</option>
                                <option value="6">Contact en boutique</option>
                                <option value="7">Employé</option>
                                <option value="8">Incoming contact of a customer</option>
                                <option value="9">Internet</option>
                                <option value="10">Parrainage/Sponsoring</option>
                                <option value="11">Partenaire</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Modèle de document par défaut</label>
                            <select class="form-select custom-form-control select2">
                                <option>eratosthene</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>


                    <!-- Section 4: Notes -->
                    <div class="card p-2 mb-3">
                        <div class="card-body">
                    <h3 class="fs-5 mb-3 text-secondary"><i class="fas fa-sticky-note me-2"></i>Notes et commentaires
                    </h3>
                    <div class="row mb-2">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Note (publique)</label>
                            <textarea class="form-control custom-form-control" rows="3" wire:model='note_public'></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Note (privée)</label>
                            <textarea class="form-control custom-form-control" rows="3" wire:model='note_private'></textarea>
                        </div>
                    </div>
                </div>
            </div>
                </form>

        <div class="d-flex p-2">
            <button type="button" class="btn btn-label-secondary" wire:click='dumping()'>
                <i class="fas fa-times me-1"></i>
                Annuler
            </button>
            <button type="submit" class="btn btn-primary ms-2" wire:click='createProposal'>
                <i class="fas fa-save me-1"></i>
                Créer Brouillon
            </button>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const formElements = document.querySelectorAll('.custom-form-control');

            formElements.forEach(element => {
                // Add focus and input event listeners
                element.addEventListener('focus', function() {
                    this.closest('.mb-3').querySelector('label').style.color = '#696cff';
                });

                element.addEventListener('blur', function() {
                    this.closest('.mb-3').querySelector('label').style.color = '';
                });

                // Simulate the color change on input
                element.addEventListener('input', function() {
                    const label = this.closest('.mb-3').querySelector('label');
                    label.style.color = this.value ? '#696cff' : '';
                });
            });
        });

        $(document).ready(function() {
            $('#modeReglement').select2({
                placeholder: "Rechercher un mode de règlement",
                allowClear: true,
                width: '100%'
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Écouter l'événement personnalisé
            window.addEventListener('client-changed', function(event) {
                const clientId = event.detail.clientId;
                console.log('Client changed:', clientId);

                // Vous pouvez ajouter ici d'autres actions à déclencher
                // Par exemple, réinitialiser certains champs, faire un appel AJAX, etc.
            });
        });
    </script>
</div>
