<link rel="stylesheet" href="{{ asset('css/hierarchie.css') }}">
<div class="container-flux p-6">
    <div class="card-header py-2 d-flex mb-3 align-items-center">
        <h5 class="mb-0 me-2"><i class="bi bi-tags"></i> Espace tags/catégories des contacts</h5>
        <a href="{{Route('create-tag-contact')}}" class="btn btn-primary mb-0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ __('Nouveau tags/catégories') }}"><i class="fas fa-add"></i></a>
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
                            <button class="btn btn-primary btn-sm " wire:click='applyLabelFilter'>RECHERCHER</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-md-5">
        <div class="card-body">
            <h6>Tags/catégories</h6>
            <div class="tree">
                <?php
                // Fonction récursive pour générer la hiérarchie
                // Exemple de données au format que vous avez fourni
$items = $filteredCategoriesList;
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
        $html .= '<div class="tree-content ' . $child['color'] . '"' . $onclick . '>';
        $html .= '<span class="chevron">▶</span>' . htmlspecialchars($child['label']);
        $html .= '</div>';
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
                    echo '<div class="tree-content ' . $rootItem['color'] . '" onclick="toggleExpand(this.parentNode)">';
                    echo '<span class="chevron">▶</span>' . htmlspecialchars($rootItem['label']);
                    echo '</div>';
                    echo '<div class="connector"></div>';

                    // Construire la hiérarchie pour cet élément racine
                    echo buildHierarchy($items, $rootItem['id']);

                    echo '</div>';
                }
                ?>
            </div>

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
