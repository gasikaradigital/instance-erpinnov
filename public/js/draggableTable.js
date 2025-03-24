document.addEventListener('DOMContentLoaded', function() {
    const table = document.getElementById('draggableTable');
    const headerRow = document.getElementById('draggableHeader');
    let draggedColumn = null;
    let draggedIndex = null;
    
    // Créer les indicateurs de drop pour chaque colonne
    const headerCells = headerRow.querySelectorAll('th');
    headerCells.forEach(cell => {
        const leftIndicator = document.createElement('div');
        leftIndicator.className = 'drop-indicator left';
        cell.appendChild(leftIndicator);
        
        const rightIndicator = document.createElement('div');
        rightIndicator.className = 'drop-indicator right';
        cell.appendChild(rightIndicator);
    });
    
    // Fonction pour attacher les événements drag & drop à toutes les cellules d'en-tête
    function attachDragEvents() {
        const headerCells = headerRow.querySelectorAll('th.draggable-column');
        
        headerCells.forEach(cell => {
            cell.addEventListener('dragstart', handleDragStart);
            cell.addEventListener('dragover', handleDragOver);
            cell.addEventListener('dragenter', handleDragEnter);
            cell.addEventListener('dragleave', handleDragLeave);
            cell.addEventListener('drop', handleDrop);
            cell.addEventListener('dragend', handleDragEnd);
        });
    }
    
    // Gestionnaires d'événements
    function handleDragStart(e) {
        draggedColumn = this;
        draggedIndex = parseInt(this.getAttribute('data-col-index'));
        
        // Ajouter une classe pour le style
        this.classList.add('dragging');
        
        // Pour Firefox
        e.dataTransfer.effectAllowed = 'move';
        e.dataTransfer.setData('text/plain', draggedIndex);
        
        // Cacher tous les indicateurs
        hideAllIndicators();
    }
    
    function handleDragOver(e) {
        if (e.preventDefault) {
            e.preventDefault(); // Nécessaire pour permettre le drop
        }
        e.dataTransfer.dropEffect = 'move';
        return false;
    }
    
    function handleDragEnter(e) {
        // Montrer l'indicateur de drop approprié
        if (draggedColumn !== this) {
            const targetIndex = parseInt(this.getAttribute('data-col-index'));
            const indicator = targetIndex > draggedIndex ? this.querySelector('.left') : this.querySelector('.right');
            if (indicator) indicator.style.display = 'block';
        }
    }
    
    function handleDragLeave(e) {
        // Cacher les indicateurs
        this.querySelectorAll('.drop-indicator').forEach(indicator => {
            indicator.style.display = 'none';
        });
    }
    
    function handleDrop(e) {
        if (e.stopPropagation) {
            e.stopPropagation(); // Empêche la redirection dans certains navigateurs
        }
        
        // Cacher tous les indicateurs
        hideAllIndicators();
        
        if (draggedColumn === this) {
            return false;
        }
        
        const targetIndex = parseInt(this.getAttribute('data-col-index'));
        
        // Échanger les colonnes
        swapColumns(draggedIndex, targetIndex);
        
        return false;
    }
    
    function handleDragEnd(e) {
        // Nettoyer
        this.classList.remove('dragging');
        hideAllIndicators();
    }
    
    function hideAllIndicators() {
        document.querySelectorAll('.drop-indicator').forEach(indicator => {
            indicator.style.display = 'none';
        });
    }
    
    // Fonction pour échanger deux colonnes
    function swapColumns(fromIndex, toIndex) {
        // Mettre à jour les attributs data-col-index sur les en-têtes
        const headers = headerRow.querySelectorAll('th');
        const rows = table.querySelectorAll('tbody tr');
        
        // Si nous déplaçons vers la droite
        if (fromIndex < toIndex) {
            // Déplacer chaque colonne entre fromIndex et toIndex d'un cran vers la gauche
            for (let i = fromIndex + 1; i <= toIndex; i++) {
                const header = getElementByColIndex(headers, i);
                if (header) header.setAttribute('data-col-index', i - 1);
                
                // Faire de même pour chaque ligne du tableau
                rows.forEach(row => {
                    const cell = getElementByColIndex(row.children, i);
                    if (cell) cell.setAttribute('data-col-index', i - 1);
                });
            }
            
            // Placer la colonne glissée à la nouvelle position
            const draggedHeader = getElementByColIndex(headers, fromIndex);
            if (draggedHeader) draggedHeader.setAttribute('data-col-index', toIndex);
            
            rows.forEach(row => {
                const cell = getElementByColIndex(row.children, fromIndex);
                if (cell) cell.setAttribute('data-col-index', toIndex);
            });
        } 
        // Si nous déplaçons vers la gauche
        else if (fromIndex > toIndex) {
            // Déplacer chaque colonne entre toIndex et fromIndex d'un cran vers la droite
            for (let i = fromIndex - 1; i >= toIndex; i--) {
                const header = getElementByColIndex(headers, i);
                if (header) header.setAttribute('data-col-index', i + 1);
                
                // Faire de même pour chaque ligne du tableau
                rows.forEach(row => {
                    const cell = getElementByColIndex(row.children, i);
                    if (cell) cell.setAttribute('data-col-index', i + 1);
                });
            }
            
            // Placer la colonne glissée à la nouvelle position
            const draggedHeader = getElementByColIndex(headers, fromIndex);
            if (draggedHeader) draggedHeader.setAttribute('data-col-index', toIndex);
            
            rows.forEach(row => {
                const cell = getElementByColIndex(row.children, fromIndex);
                if (cell) cell.setAttribute('data-col-index', toIndex);
            });
        }
        
        // Réorganiser visuellement les colonnes
        reorderTableColumns();
        
        // Mettre à jour également les références dans le menu dropdown des colonnes
        updateColumnCheckboxReferences();
    }
    
    // Fonction utilitaire pour obtenir un élément par son attribut data-col-index
    function getElementByColIndex(elements, index) {
        for (let i = 0; i < elements.length; i++) {
            if (parseInt(elements[i].getAttribute('data-col-index')) === index) {
                return elements[i];
            }
        }
        return null;
    }
    
    // Fonction pour réorganiser physiquement les colonnes du tableau
    function reorderTableColumns() {
        const headers = Array.from(headerRow.querySelectorAll('th'));
        const sortedHeaders = [...headers].sort((a, b) => {
            return parseInt(a.getAttribute('data-col-index')) - parseInt(b.getAttribute('data-col-index'));
        });
        
        // Réorganiser les en-têtes
        for (let i = 0; i < sortedHeaders.length; i++) {
            headerRow.appendChild(sortedHeaders[i]);
        }
        
        // Réorganiser les cellules de chaque ligne
        const rows = table.querySelectorAll('tbody tr');
        rows.forEach(row => {
            const cells = Array.from(row.children);
            const sortedCells = [...cells].sort((a, b) => {
                return parseInt(a.getAttribute('data-col-index')) - parseInt(b.getAttribute('data-col-index'));
            });
            
            for (let i = 0; i < sortedCells.length; i++) {
                row.appendChild(sortedCells[i]);
            }
        });
    }
    
    // Mise à jour des références dans le menu dropdown des colonnes
    function updateColumnCheckboxReferences() {
        const checkboxes = document.querySelectorAll('.dropdown-menu .form-check-input');
        checkboxes.forEach(checkbox => {
            const colIndex = parseInt(checkbox.getAttribute('data-column'));
            const newHeader = getElementByColIndex(headerRow.querySelectorAll('th'), colIndex);
            if (newHeader) {
                const headerText = newHeader.textContent.trim();
                const label = checkbox.nextElementSibling;
                if (label) {
                    label.textContent = headerText;
                }
            }
        });
    }
    
    // Initialiser les événements de drag & drop
    attachDragEvents();
    
    // Fonctionnalité de masquer/afficher les colonnes avec les checkboxes
    const columnCheckboxes = document.querySelectorAll('.dropdown-menu .form-check-input');
    columnCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const columnIndex = parseInt(this.getAttribute('data-column'));
            const isVisible = this.checked;
            
            // Sélectionner toutes les cellules avec cet index de colonne
            const headerCell = getElementByColIndex(headerRow.querySelectorAll('th'), columnIndex);
            
            if (headerCell) {
                headerCell.style.display = isVisible ? '' : 'none';
                
                // Faire de même pour toutes les cellules dans les lignes du corps du tableau
                const rows = table.querySelectorAll('tbody tr');
                rows.forEach(row => {
                    const cell = getElementByColIndex(row.children, columnIndex);
                    if (cell) {
                        cell.style.display = isVisible ? '' : 'none';
                    }
                });
            }
        });
    });
});
