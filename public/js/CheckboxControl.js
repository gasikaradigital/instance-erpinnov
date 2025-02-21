
    document.addEventListener('DOMContentLoaded', function() {
        const actionMenu = document.querySelector('.action-menu');
        
        function updateActionMenu() {
            const checkedBoxes = document.querySelectorAll('.row-checkbox:checked');
            console.log('Cases cochées:', checkedBoxes.length); // Ajout d'un log pour vérifier
            if (checkedBoxes.length > 0) {
                actionMenu.classList.add('visible');
            } else {
                actionMenu.classList.remove('visible');
            }
        }
        // Gestion des checkboxes
        const selectAllCheckbox = document.getElementById('selectAll');
        const rowCheckboxes = document.querySelectorAll('.row-checkbox');
    
        selectAllCheckbox.addEventListener('change', function() {
            rowCheckboxes.forEach(checkbox => {
                checkbox.checked = selectAllCheckbox.checked;
            });
            updateActionMenu(); // Appel de la fonction pour vérifier la visibilité du menu
        });
    
        rowCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                if (!checkbox.checked) {
                    selectAllCheckbox.checked = false;
                } else if (Array.from(rowCheckboxes).every(cb => cb.checked)) {
                    selectAllCheckbox.checked = true;
                }
                updateActionMenu(); // Appel de la fonction pour vérifier la visibilité du menu
            });
        });
    });
    