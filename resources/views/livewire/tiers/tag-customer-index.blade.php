<div class="container-flux p-6">
    <div class="card mb-3">
        <div class="card-header py-2 bg-light d-flex align-items-center">
        <h5 class="mb-0 pe-3"><i class="bi bi-tags"></i> Espace tags/catégories des clients</h5>
            <a href="{{ Route('create-tag-customer') }}" class="btn btn-primary" data-bs-toggle="tooltip"
                data-bs-placement="bottom" title="{{ __('Nouveau tags/catégories') }}"><i class="fas fa-add"></i></a>
        </div>
        <div class="card-body">
            <div class="mb-3 mt-md-4">
                <label for="search" class="form-label">Rechercher</label>
                <div class="row">
                    <div class="col-md-5">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm" id="search" wire:model='searchQuery'
                                placeholder="Nom...">
                            <button class="btn btn-primary btn-sm" wire:click='applyLabelFilter'>RECHERCHER</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<div class="card mt-md-5">
    <div class="card-body">
        <h6>Tags/catégories</h6>

        <div class="d-flex justify-content-end mb-2">
            <button class="btn btn-sm btn-outline-primary mr-2" id="collapse-all">
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
            <div class="category-tree">
                <ul class="list-unstyled">
                    @php
                        // Affichage du contenu des données pour le débogage
                        // echo '<pre>';
                        // print_r($filteredCategoriesList);
                        // echo '</pre>';

                        // Fonction pour afficher les catégories récursivement
                        function displayCategoryTree($categories, $level = 0) {
                            foreach ($categories as $category) {
                                $hasChildren = !empty($category['children']);
                                $categoryColor = !empty($category['color']) ? $category['color'] : '#CCCCCC';
                                $textColor = !empty($category['text_color']) ? $category['text_color'] : '#FFFFFF';
                                $categoryName = !empty($category['name']) ? $category['name'] : 'Sans nom';

                                echo '<li class="category-item" data-level="' . $level . '">';

                                // Indentation selon le niveau
                                echo str_repeat('<span class="indentation"></span>', $level);

                                // Icône d'expansion si a des enfants
                                if ($hasChildren) {
                                    echo '<span class="toggle-icon collapsed"><i class="fas fa-caret-right"></i></span>';
                                } else {
                                    echo '<span class="toggle-icon invisible"><i class="fas fa-caret-right"></i></span>';
                                }

                                // Tag avec couleur
                                echo '<span class="category-tag" style="background-color: ' . $categoryColor . '; color: ' . $textColor . ';">' . $categoryName . '</span>';

                                // Boutons d'action
                                echo '<div class="action-buttons">';
                                echo '<a href="#" class="view-btn" title="Voir"><i class="fas fa-eye"></i></a>';
                                echo '<a href="#" class="edit-btn" title="Modifier"><i class="fas fa-pencil-alt"></i></a>';
                                echo '<a href="#" class="delete-btn" title="Supprimer"><i class="fas fa-trash"></i></a>';
                                echo '</div>';

                                // Afficher récursivement les enfants
                                if ($hasChildren) {
                                    echo '<ul class="list-unstyled category-children" style="display: none;">';
                                    displayCategoryTree($category['children'], $level + 1);
                                    echo '</ul>';
                                }

                                echo '</li>';
                            }
                        }

                        // Organisation des données pour la hiérarchie
                        $categoryTree = [];
                        $categoryMap = [];

                        // Première passe: créer un mappage de toutes les catégories
                        foreach ($filteredCategoriesList as $category) {
                            // Vérifier la structure des données
                            if (is_object($category)) {
                                // Si c'est un objet, on essaie d'accéder aux propriétés
                                $id = $category->id ?? null;
                                $name = $category->name ?? 'Sans nom';
                                $color = $category->color ?? '#CCCCCC';
                                $textColor = $category->text_color ?? '#FFFFFF';
                                $parentId = $category->parent_id ?? null;
                            } elseif (is_array($category)) {
                                // Si c'est un tableau, on accède aux clés
                                $id = $category['id'] ?? null;
                                $name = $category['name'] ?? 'Sans nom';
                                $color = $category['color'] ?? '#CCCCCC';
                                $textColor = $category['text_color'] ?? '#FFFFFF';
                                $parentId = $category['parent_id'] ?? null;
                            } else {
                                // Si ce n'est ni un objet ni un tableau, on passe
                                continue;
                            }

                            // Vérifier que l'ID est défini
                            if (is_null($id)) {
                                continue;
                            }

                            $categoryMap[$id] = [
                                'id' => $id,
                                'name' => $name,
                                'color' => $color,
                                'text_color' => $textColor,
                                'parent_id' => $parentId,
                                'children' => []
                            ];
                        }

                        // Deuxième passe: construire l'arbre
                        foreach ($categoryMap as $id => $category) {
                            if (empty($category['parent_id'])) {
                                // C'est une catégorie racine
                                $categoryTree[$id] = &$categoryMap[$id];
                            } else {
                                // C'est un enfant, l'ajouter à son parent
                                if (isset($categoryMap[$category['parent_id']])) {
                                    $categoryMap[$category['parent_id']]['children'][$id] = &$categoryMap[$id];
                                } else {
                                    // Si le parent n'existe pas, l'ajouter comme racine
                                    $categoryTree[$id] = &$categoryMap[$id];
                                }
                            }
                        }

                        // Afficher l'arbre si non vide
                        if (!empty($categoryTree)) {
                            displayCategoryTree($categoryTree);
                        } else {
                            echo '<div class="alert alert-info">Impossible de construire l\'arborescence des catégories.</div>';
                        }
                    @endphp
                </ul>
            </div>
        @endif
    </div>
</div>
</div>

<!-- CSS pour le style des catégories -->
<style>
    .category-tree {
        width: 100%;
    }

    .category-item {
        display: flex;
        align-items: center;
        margin-bottom: 4px;
        position: relative;
    }

    .indentation {
        display: inline-block;
        width: 20px;
    }

    .toggle-icon {
        cursor: pointer;
        width: 20px;
        text-align: center;
        margin-right: 5px;
    }

    .toggle-icon.expanded i {
        transform: rotate(90deg);
    }

    .category-tag {
        padding: 2px 8px;
        border-radius: 4px;
        display: inline-block;
        font-size: 14px;
    }

    .category-children {
        margin-left: 20px;
    }

    .action-buttons {
        margin-left: auto;
        display: flex;
        gap: 10px;
    }

    .action-buttons a {
        color: #6c757d;
    }

    .action-buttons a:hover {
        color: #343a40;
    }
</style>
</div>

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
