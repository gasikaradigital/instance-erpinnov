
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/produitService.css') }}">
    <div class="container mt-5">

                <div class="d-flex align-items-center">
                  <i class="menu-icon fas fa-file-signature fa-2x me-2"></i> <!-- Agrandit l'icône -->
                  <h2 class="fs-3 mb-0 ">Créer un devis</h2>
               </div>

              <div class="card">
            <div class="card-body">
                <form id="newDraftForm">
                    <div class="row">
                    <div class="col-md-3 mb-3">
                            <label class="form-label">Réf. client</label>
                            <input type="text" class="form-control custom-form-control" id="refId">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Contact</label>
                            <select  class="form-select custom-form-control">
                            <option>Sélectionner</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Client</label>
                            <div class="input-group border rounded">
                            <select class="form-select custom-form-control border-0" id="clientSelect">
                                <option>Sélectionner un tier</option>
                                @foreach ($listeTiers as $tier)
                                <option value="{{$tier['id']}}">{{$tier['name']}}</option>
                                @endforeach
                            </select>
                            <span class=" input-group-text border-0"><i class="fas fa-plus "></i></span>
                        </div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label">Date de proposition</label>
                            <div class="input-group border rounded">
                                <input type="date" class="form-control custom-form-control border-0" value="2025-03-25">
                            </div>
                        </div>
                         <div class="col-md-3 mb-3">
                            <label class="form-label">Date de livraison</label>
                            <div class="input-group border rounded">
                                <input type="date" class="form-control custom-form-control border-0" value="2025-03-25">
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Durée de validité</label>
                            <div class="input-group border rounded">
                                <input type="text" class="form-control custom-form-control border-0">
                                <span class="input-group-text border-0"><i class="fas  fa-clock"></i></span>
                            </div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label">Cond. règlement</label>
                            <select  class="form-select custom-form-control">
                            <option>Sélectionner</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
    <label class="form-label">Mode de règlement</label>
    <select class="form-select custom-form-control select2" id="modeReglement">
        <option value="">Sélectionner</option>
        <!-- Ajoutez vos options ici -->
    </select>
</div>
                    <div class="col-md-3 mb-3">
                            <label class="form-label">Origine</label>
                            <select class="form-select custom-form-control">
                            <option>Sélectionner</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Modèle de document par défaut</label>
                            <select class="form-select custom-form-control select2">
                                <option>eratosthene</option>
                            </select>
                        </div>


                        <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Note (publique)</label>
                            <textarea class="form-control custom-form-control" rows="3"></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Note (privée)</label>
                            <textarea class="form-control custom-form-control" rows="3"></textarea>
                        </div>
                        </div>

                      </div>

                </form>
            </div>
    </div>
    <div class="d-flex p-3">
                        <button type="button" class="btn btn-label-secondary">
                            <i class="fas fa-times me-1"></i>
                            Annuler
                        </button>
                        <button type="submit" class="btn btn-primary ms-2">
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


