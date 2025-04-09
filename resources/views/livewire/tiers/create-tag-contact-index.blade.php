<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="{{ asset('css/produitService.css') }}">


<div class="container-flux p-6 flex-grow-1">
    <!-- En-tête -->
    <div class="d-flex align-items-center">
        <i class="menu-icon fas fa-folder fa-2x me-2"></i>
        <h2 class="fw-bold fs-3 mb-0">Créer tag/catégorie</h2>
    </div>

    <form id="createTagForm">
        <!-- Section principale -->
        <div class="card p-3 mb-4" id="mainCard">
            <div class="card-header p-3">
                <h6 class="card-title mb-0" id="mainTitle">Informations du tag/catégorie</h6>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <!-- Référence -->
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Réf.</label>
                        <input type="text" class="form-control"  style="max-width: 250px;" id="reference" name="reference" />
                    </div>

                    <!-- Position -->
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Position</label>
                        <input type="text" class="form-control" id="position" style="max-width: 250px;" name="position" />
                    </div>

                    <!-- Catégorie -->
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Ajouter dans</label>
                        <select class="select2 form-select" style="max-width: 250px;" id="category" name="category">
                            <option value="">Sélectionner une catégorie</option>
                            <option value="1">Catégorie 1</option>
                            <option value="2">Catégorie 2</option>
                        </select>
                    </div>
                    <!-- Couleur -->
                    <div class="col-md-1 mb-3">
                        <label class="form-label">Couleur</label>
                        <input type="color" class="form-control form-control-color" id="color" name="color" />
                    </div>
                     <!-- Description avec éditeur enrichi -->
                    <div class="col-md-7 mb-3">
                    <label class="form-label fw-medium pt-1">Description</label>
                      <textarea id="description" class="form-control border-0" style="min-height: 150px;"></textarea>
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
                    Créer tag/catégorie
                </button>
            </div>
        </div>
    </form>
</div>
<!-- Utilisation de la dernière version sécurisée de CKEditor 4 -->
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialisation de CKEditor avec configuration correspondant à l'image fournie
        try {
            CKEDITOR.replace('description', {
                toolbar: [
                    { name: 'misc', items: ['Maximize'] },
                    { name: 'format', items: ['Format'] },
                    { name: 'size', items: ['FontSize'] },
                    { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike'] },
                    { name: 'colors', items: ['TextColor'] },
                    { name: 'justify', items: ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'] },
                    { name: 'lists', items: ['NumberedList', 'BulletedList', 'Outdent', 'Indent'] },
                    { name: 'insert', items: ['Link'] },
                    { name: 'document', items: ['Source'] }
                ],
                language: 'fr',
                height: 200,
                removePlugins: 'elementspath',
                resize_enabled: true,
                resize_dir: 'both',
                startupFocus: false,
                autoGrow_onStartup: false,
                // Personnalisation des libellés pour correspondre à l'image
                format_tags: 'p;h1;h2;h3;h4;h5;h6;pre;div',
                // Ajouter des styles pour que l'interface ressemble à celle de l'image
                contentsCss: [
                    'body { font-family: Arial, sans-serif; font-size: 14px; margin: 20px; }',
                    '.cke_top { background: #f8f9fa !important; border-bottom: 1px solid #dee2e6 !important; }'
                ]
            });

            // On vérifie si l'instance CKEditor a bien été créée
            if (CKEDITOR.instances.description) {
                console.log("CKEditor initialized successfully");
            } else {
                console.error("CKEditor initialization failed");
                // Solution de repli - afficher le textarea normal
                document.getElementById('description').style.display = 'block';
            }
        } catch (e) {
            console.error("Error initializing CKEditor:", e);
            // Solution de repli
            document.getElementById('description').style.display = 'block';
        }

        // Configuration de la section
        const mainCard = document.getElementById('mainCard');
        const mainTitle = document.getElementById('mainTitle');

        // Couleur originale du titre
        const originalColor = '';
        // Couleur primary de Bootstrap
        const primaryColor = '#696cff';

        // Ajouter des gestionnaires d'événements pour la section
        const inputs = mainCard.querySelectorAll('input, select');

        inputs.forEach(input => {
            // Changer la couleur quand on focus sur un champ
            input.addEventListener('focus', function() {
                mainTitle.style.color = primaryColor;
            });

            // Maintenir la couleur quand on tape dans un champ
            input.addEventListener('input', function() {
                mainTitle.style.color = primaryColor;
            });

            // Maintenir la couleur quand on change une sélection
            input.addEventListener('change', function() {
                mainTitle.style.color = primaryColor;
            });

            // Détecter simplement le mouvement du curseur sur n'importe quel champ
            input.addEventListener('mouseover', function() {
                mainTitle.style.color = primaryColor;
            });
        });

        // Gérer également l'éditeur CKEditor si disponible
        if (CKEDITOR.instances && CKEDITOR.instances.description) {
            try {
                // Gestion du focus sur l'éditeur
                CKEDITOR.instances.description.on('focus', function() {
                    mainTitle.style.color = primaryColor;
                });

                // Gestion des changements dans l'éditeur
                CKEDITOR.instances.description.on('change', function() {
                    mainTitle.style.color = primaryColor;
                });
            } catch (e) {
                console.warn("Error attaching event handlers to CKEditor:", e);
            }
        }

        // Ajouter un événement pour la carte entière pour détecter quand le curseur est au-dessus
        mainCard.addEventListener('mouseover', function() {
            mainTitle.style.color = primaryColor;
        });

        // Réinitialiser la couleur lorsque le curseur quitte la carte
        mainCard.addEventListener('mouseout', function(e) {
            // Seulement réinitialiser si le curseur quitte complètement la carte
            if (!mainCard.contains(e.relatedTarget)) {
                // Vérifier si aucun champ n'a le focus à l'intérieur de la carte
                const hasFocus = Array.from(inputs).some(input => document.activeElement === input);

                // Vérifier si l'éditeur a le focus (si disponible)
                let hasEditorFocus = false;
                if (CKEDITOR.instances && CKEDITOR.instances.description) {
                    try {
                        hasEditorFocus = CKEDITOR.instances.description.focusManager.hasFocus;
                    } catch (e) {
                        console.warn("Error checking CKEditor focus:", e);
                    }
                }

                if (!hasFocus && !hasEditorFocus) {
                    mainTitle.style.color = originalColor;
                }
            }
        });
    });
</script>
