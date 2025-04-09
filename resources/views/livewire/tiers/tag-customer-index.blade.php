<link rel="stylesheet" href="{{ asset('css/hierarchie.css') }}">
<div class="container-flux p-6">
    <div class="card-header py-2 d-flex mb-3 align-items-center">
        <h5 class="mb-0 ms-4 pe-3"><i class="bi bi-tags"></i> Espace tags/catégories des clients</h5>
        <a href="{{ Route('create-tag-customer') }}" class="btn btn-primary" data-bs-toggle="tooltip"
            data-bs-placement="bottom" title="{{ __('Nouveau tags/catégories') }}"><i class="fas fa-add"></i></a>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="mb-3 mt-md-3">
                <label for="search" class="form-label">Rechercher</label>
                <div class="row">
                    <div class="col-md-5">
                        <div class="input-group border rounded ">
                            <input type="text" class="form-control form-control-sm border-0" id="search" wire:model='searchQuery'
                                placeholder="Nom...">
                            <button class="btn btn-primary btn-sm" wire:click='applyLabelFilter'>RECHERCHER</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-md-5">
        <div class="card-body">
            <h6>Tags/catégories</h6>

            <div class="d-flex justify-content-end mb-2">
                <button class="btn btn-sm btn-outline-primary" id="collapse-all">
                    <i class="fas fa-compress-alt"></i> Annuler déroulement
                </button>
                <button class="btn btn-sm btn-outline-primary" id="expand-all">
                    <i class="fas fa-expand-alt"></i> Tout dérouler
                </button>
            </div>

            @if (empty($filteredCategoriesList) || count($filteredCategoriesList) === 0)
                <div class="alert alert-secondary" role="alert">
                    Aucun tag/catégorie de ce type n'a été créé
                </div>
            @else
                <div class="tree">
                    <ul class="list-unstyled">
                        <?php
                 $items = $filteredCategoriesList;
// Fonction récursive pour générer la hiérarchie
function getChildren($items, $parentId) {
    $children = [];
    foreach ($items as $item) {
        if ($item['fk_parent'] == $parentId) {
            $children[] = $item;
        }
    }
    return $children;
}

function buildHierarchy($items, $parentId = 0) {
    $children = getChildren($items, $parentId);

    if (empty($children)) {
        return '';
    }

    $html = '<div class="tree-children">';
    foreach ($children as $child) {
        $hasChildren = !empty(getChildren($items, $child['id']));
        $onclick = $hasChildren ? ' onclick="toggleExpand(this.parentNode)"' : '';

        $html .= '<div class="tree-item">';
        $html .= '<div class="tree-row">'; // Nouveau conteneur pour aligner le contenu et les boutons
        $html .= '<div class="tree-content ' . $child['color'] . '"' . $onclick . '>';
        $html .= '<span class="chevron">▶</span>' . htmlspecialchars($child['label']);
        $html .= '</div>';

        // Ajout des boutons d'action alignés à droite
        $html .= '<div class="action-buttons">';
        $html .= '<a href="" title="Voir"><i class="fas fa-eye"></i></a>';
        $html .= '<a href="" title="Modifier"><i class="fas fa-edit"></i></a>';
        $html .= '<a href="" title="Supprimer"><i class="fas fa-trash"></i></a>';
        $html .= '</div>';
        $html .= '</div>'; // Fin du conteneur tree-row

        $html .= '<div class="connector"></div>';

        // Récursivement construire les enfants
        $childrenHtml = buildHierarchy($items, $child['id']);
        if (!empty($childrenHtml)) {
            $html .= $childrenHtml;
        }

        $html .= '</div>';
    }
    $html .= '</div>';

    return $html;
}

// Trouver les éléments racines (parent_id = 0)
$rootItems = getChildren($items, 0);
foreach ($rootItems as $rootItem) {
    echo '<div class="tree-item">';
    echo '<div class="tree-row">'; // Nouveau conteneur pour aligner le contenu et les boutons
    echo '<div class="tree-content ' . $rootItem['color'] . '" onclick="toggleExpand(this.parentNode.parentNode)">';
    echo '<span class="chevron">▶</span>' . htmlspecialchars($rootItem['label']);
    echo '</div>';

    // Ajout des boutons d'action alignés à droite pour les éléments racine
    echo '<div class="action-buttons">';
    echo '<a href="" title="Voir"><i class="fas fa-eye"></i></a>';
    echo '<a href="" title="Modifier"><i class="fas fa-edit"></i></a>';
    echo '<a href="" title="Supprimer"><i class="fas fa-trash"></i></a>';
    echo '</div>';
    echo '</div>'; // Fin du conteneur tree-row

    echo '<div class="connector"></div>';

    // Construire la hiérarchie pour cet élément racine
    echo buildHierarchy($items, $rootItem['id']);

    echo '</div>';
}
?>
                </ul>
            </div>
        @endif
    </div>
</div>
</div>
<script>
    function toggleExpand(item) {
        item.classList.toggle('expanded');
    }

    // Auto-expand the first level for demonstration
    document.addEventListener('DOMContentLoaded', function() {
        const rootItems = document.querySelectorAll('.tree > .tree-item');
        if (rootItems.length > 0) {
            rootItems[0].classList.add('expanded');
        }
    });
</script>


<!-- JavaScript pour l'expansion/réduction -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Gérer le clic sur les icônes d'expansion
        document.querySelectorAll('.toggle-icon').forEach(function(icon) {
            if (!icon.classList.contains('invisible')) {
                icon.addEventListener('click', function() {
                    const listItem = this.closest('li');
                    const childrenList = listItem.querySelector('.category-children');

                    if (this.classList.contains('collapsed')) {
                        childrenList.style.display = 'block';
                        this.classList.remove('collapsed');
                        this.classList.add('expanded');
                        this.querySelector('i').style.transform = 'rotate(90deg)';
                    } else {
                        childrenList.style.display = 'none';
                        this.classList.remove('expanded');
                        this.classList.add('collapsed');
                        this.querySelector('i').style.transform = 'rotate(0deg)';
                    }
                });
            }
        });

        // Tout dérouler
        document.getElementById('expand-all').addEventListener('click', function() {
            document.querySelectorAll('.category-children').forEach(function(list) {
                list.style.display = 'block';
            });

            document.querySelectorAll('.toggle-icon:not(.invisible)').forEach(function(icon) {
                icon.classList.remove('collapsed');
                icon.classList.add('expanded');
                icon.querySelector('i').style.transform = 'rotate(90deg)';
            });
        });

        // Tout réduire
        document.getElementById('collapse-all').addEventListener('click', function() {
            document.querySelectorAll('.category-children').forEach(function(list) {
                list.style.display = 'none';
            });

            document.querySelectorAll('.toggle-icon:not(.invisible)').forEach(function(icon) {
                icon.classList.remove('expanded');
                icon.classList.add('collapsed');
                icon.querySelector('i').style.transform = 'rotate(0deg)';
            });
        });
    });
</script>
