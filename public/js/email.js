document.addEventListener('DOMContentLoaded', function() {
    console.log("DOM chargé, initialisation des scripts...");
    
    // Vérifier l'existence des éléments clés
    const searchInput = document.querySelector(".email-search");
    const emailItemsList = document.querySelectorAll(".email-item");
    
    console.log("Élément de recherche trouvé:", !!searchInput);
    console.log("Nombre d'emails trouvés:", emailItemsList.length);
    
    // Configurer la recherche si les éléments existent
    if (searchInput) {
        console.log("Ajout de l'écouteur d'événement à la recherche");
        
        searchInput.addEventListener("input", function() {
            const searchText = this.value.toLowerCase();
            console.log("Recherche de:", searchText);
            
            document.querySelectorAll(".email-item").forEach(item => {
                const emailSender = item.querySelector("h6")?.textContent.toLowerCase() || "";
                const emailContent = item.querySelector("p")?.textContent.toLowerCase() || "";
                
                const visible = emailSender.includes(searchText) || emailContent.includes(searchText);
                console.log(`Email de "${emailSender}": ${visible ? "affiché" : "masqué"}`);
                
                item.style.display = visible ? "flex" : "none";
            });
        });
    } else {
        console.error("ERREUR: L'élément de recherche .email-search n'a pas été trouvé");
    }
    
    // Reste du code pour les clics sur les emails, etc.
    // ...
    
    // Quand un email est cliqué
    document.querySelectorAll('.email-item').forEach(item => {
        item.addEventListener('click', function() {
            const emailId = this.dataset.emailId;
            console.log("Email cliqué, ID:", emailId);
            
            // Masquer le conteneur de la liste d'emails
            document.querySelector('.email-list-container').style.display = 'none';
            // Afficher le conteneur des détails
            document.querySelector('.email-detail-container').style.display = 'block';
            // Charger les données de l'email
            loadEmailDetails(emailId);
        });
    });

    // Empêcher l'ouverture du message en cliquant sur la checkbox
    document.querySelectorAll(".email-checkbox").forEach(checkbox => {
        checkbox.addEventListener("click", function(event) {
            event.stopPropagation();
            console.log("Checkbox cliquée");
        });
    });

    // Empêcher l'ouverture du message en cliquant sur l'étoile
    document.querySelectorAll(".email-star").forEach(star => {
        star.addEventListener("click", function(event) {
            event.stopPropagation();
            this.classList.toggle("text-warning");
            console.log("Étoile cliquée, favori toggled");
        });
    });
    
    // Retour à la liste
    const backButton = document.getElementById('back-to-list');
    if (backButton) {
        backButton.addEventListener('click', function(e) {
            e.preventDefault();
            console.log("Retour à la liste cliqué");
            
            // Masquer les détails
            document.querySelector('.email-detail-container').style.display = 'none';
            // Afficher la liste
            document.querySelector('.email-list-container').style.display = 'block';
        });
    } else {
        console.warn("Bouton de retour 'back-to-list' non trouvé");
    }
});

    //Les selections avec Checkbox des mails
    const selectAllCheckbox = document.querySelector(".form-check-input");
    const emailCheckboxes = document.querySelectorAll(".email-checkbox");

    // Gérer la sélection/désélection de tous les emails
    selectAllCheckbox.addEventListener("change", function () {
        emailCheckboxes.forEach(checkbox => {
            checkbox.checked = selectAllCheckbox.checked;
        });
    });

    // Vérifier si tous les emails sont sélectionnés ou non
    emailCheckboxes.forEach(checkbox => {
        checkbox.addEventListener("change", function () {
            const allChecked = [...emailCheckboxes].every(chk => chk.checked);
            const someChecked = [...emailCheckboxes].some(chk => chk.checked);
            
            selectAllCheckbox.checked = allChecked;
            selectAllCheckbox.indeterminate = someChecked && !allChecked;
        });
    });
 

function loadEmailDetails(emailId) {
    console.log("Chargement des détails de l'email ID:", emailId);
    // Votre code pour charger les détails de l'email...
}
