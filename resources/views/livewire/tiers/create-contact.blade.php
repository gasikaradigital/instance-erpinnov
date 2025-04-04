<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="{{ asset('css/produitService.css') }}">
<div class="container-flux p-6 flex-grow-1">
    <!-- En-tête -->
    <div class="d-flex align-items-center">
        <i class="menu-icon fas fa-user fa-2x me-2"></i>
        <h4 class="fw-bold py-3 mb-2">Nouveau contact</h4>
    </div>
        <form wire:submit.prevent="save"id="addNewContactForm">

 <!-- Corps Modal -->
            <div class="modal-body">
                <div class="row">
                    <!-- Section 1: Informations générales -->
                    <div class="col-12">
                        <div class="card p-3 mb-4" id="section1Card">
                            <div class="card-header p-3">
                                <h6 class="card-title mb-0" id="section1Title">1. Informations générales</h6>
                            </div>

                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-3 mb-3">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label">Titre de civilité <span class="text-danger">*</span></label>
                                            <i class="fas fa-info-circle"></i>
                                        </div>
                                        <select class="select2 form-select" wire:model="civility_code" required>
                                            <option value="">Sélectionner</option>
                                            <option value="MME">Madame</option>
                                            <option value="MR">Monsieur</option>
                                            <option value="MLE">Mademoiselle</option>
                                            <option value="MTRE">Maître</option>
                                            <option value="DR">Docteur</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Nom</label>
                                        <input type="text" class="form-control" wire:model="lastname" />
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Prénoms</label>
                                        <input type="text" class="form-control" wire:model="firstname" />
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Tiers <span class="text-danger">*</span></label>
                                        @if(count($data ?? []) > 0)
                                        <select class="select2 form-select" wire:model="socid">
                                            @foreach($data as $tier)
                                                <option value="{{ $tier->id }}">{{ $tier->name }}</option>
                                            @endforeach
                                        </select>
                                        @endif
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Poste/fonction</label>
                                        <input type="text" class="form-control" wire:model="poste" />
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <i class="fas fa-tag"></i>
                                        <label class="form-label">Tags/catégories</label>
                                        <input type="text" class="form-control" wire:model="tags" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section 2: Coordonnées -->
                    <div class="col-12">
                        <div class="card mb-4" id="section2Card">
                            <div class="card-header p-3">
                                <h6 class="card-title mb-0" id="section2Title">2. Coordonnées</h6>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Adresse</label>
                                        <input type="text" class="form-control" wire:model="address" />
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Code</label>
                                        <input type="text" class="form-control" wire:model="zip" />
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Ville</label>
                                        <input type="text" class="form-control" wire:model="town" />
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label">Pays</label>
                                            <i class="fas fa-info-circle"></i>
                                        </div>
                                        <select class="select2 form-select" wire:model="country_id">
                                            <option value="">Sélectionner</option>
                                            <option value="1">France</option>
                                            <option value="2">Belgique</option>
                                            <option value="6">Suisse</option>
                                            <option value="143">Madagascar</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <i class="fas fa-phone"></i>
                                        <label class="form-label">Tél pro.</label>
                                        <input type="tel" class="form-control" wire:model="phone_pro" />
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <i class="fas fa-phone"></i>
                                        <label class="form-label">Tél perso</label>
                                        <input type="tel" class="form-control" wire:model="phone_perso" />
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <i class="fas fa-mobile-alt"></i>
                                        <label class="form-label">Tél portable</label>
                                        <input type="tel" class="form-control" wire:model="phone_mobile" />
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <i class="fas fa-at"></i>
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" wire:model="email" />
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <i class="fas fa-fax"></i>
                                        <label class="form-label">Fax</label>
                                        <input type="text" class="form-control" wire:model="fax"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card mb-4" id="section3Card">
                            <div class="card-header p-3">
                                <h6 class="card-title mb-0" id="section3Title">3. Informations complémentaires</h6>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Visibilité</label>
                                        <div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="public" value="0" wire:model="priv">
                                                <label class="form-check-label" for="public">Partagé</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="private" value="1" wire:model="priv">
                                                <label class="form-check-label" for="private">Privé</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pied Modal -->
            <div class="d-flex align-items-center">
            <div class="modal-footer py-3">
                <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal">
                    <i class="ti ti-x ti-xs me-1"></i>
                    Annuler
                </button>
                <button type="submit" class="btn btn-primary ms-2">
                    <i class="ti ti-device-floppy ti-xs me-1"></i>
                    Enregistrer
                </button>
            </div>
        </div>
        </form>
</div>

<script>
    // Animation pour les titres des sections quand on interagit avec les champs
    document.addEventListener('DOMContentLoaded', function() {
        // Configuration des sections
        const sections = [
            { card: 'section1Card', title: 'section1Title' },
            { card: 'section2Card', title: 'section2Title' },
            { card: 'section3Card', title: 'section3Title' }
        ];

        // Couleur originale des titres
        const originalColor = '';
        // Couleur primary de Bootstrap (peut être ajustée selon votre thème)
        const primaryColor = '#696cff';

        // Ajouter des gestionnaires d'événements pour chaque section
        sections.forEach(section => {
            const card = document.getElementById(section.card);
            const title = document.getElementById(section.title);

            // Ajouter des événements pour tous les champs d'entrée dans la carte
            const inputs = card.querySelectorAll('input, select, textarea');

            inputs.forEach(input => {
                // Changer la couleur quand on focus sur un champ
                input.addEventListener('focus', function() {
                    title.style.color = primaryColor;
                });

                // Maintenir la couleur quand on tape dans un champ
                input.addEventListener('input', function() {
                    title.style.color = primaryColor;
                });

                // Maintenir la couleur quand on change une sélection
                input.addEventListener('change', function() {
                    title.style.color = primaryColor;
                });

                // Détecter simplement le mouvement du curseur sur n'importe quel champ
                input.addEventListener('mouseover', function() {
                    title.style.color = primaryColor;
                });
            });

            // Ajouter un événement pour la carte entière pour détecter quand le curseur est au-dessus
            card.addEventListener('mouseover', function() {
                title.style.color = primaryColor;
            });

            // Réinitialiser la couleur lorsque le curseur quitte la carte
            card.addEventListener('mouseout', function(e) {
                // Seulement réinitialiser si le curseur quitte complètement la carte
                if (!card.contains(e.relatedTarget)) {
                    // Vérifier si aucun champ n'a le focus à l'intérieur de la carte
                    const hasFocus = Array.from(inputs).some(input => document.activeElement === input);
                    if (!hasFocus) {
                        title.style.color = originalColor;
                    }
                }
            });
        });
    });
</script>
