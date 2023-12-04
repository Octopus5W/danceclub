//on ajoute l'evenement au moment ou on voit envoyer le contenu
document.addEventListener('DOMContentLoaded', function () {
    // on selectionne dans le document 'form' (le formulaire d'inscription)
    const form = document.querySelector('form');
    //au moment ou on appuie sur le submit 
    form.addEventListener('submit', function (event) {
        // si le formulaire ne remplit pas la fonction de validation on empeche sa soumission
        if (!validateForm()) {
            event.preventDefault();
        }
    });
    // on définit la fonction de validation du formulaire 
    function validateForm() {
        let isValid = true;
    
        resetStyles();
        // on définit à quoi correspond la constante "fields"
        const fields = [
            { id: 'nom', message: 'Veuillez remplir ce champ' },
            { id: 'prenom', message: 'Veuillez remplir ce champ' },
            { id: 'dateDeNaissance', message: 'Veuillez remplir ce champ' },
            { id: 'username', message: 'Veuillez remplir ce champ' },
            { id: 'email', message: 'Veuillez remplir ce champ' },
            { id: 'mdp', message: 'Veuillez remplir ce champ' },
            { id: 'mdpverif', message: 'Veuillez remplir ce champ' },
        ];
        // on récupère chaque id des champs dans le document 
        fields.forEach(function (field) {
            const input = document.getElementById(field.id);
            // on verifie si le champ est vide
            if (!input.value.trim()) {
                // si oui, il n'est pas valide
                isValid = false;
                displayError(input, field.message);
            } else {
                if (field.id !== 'mdp' && field.id !== 'mdpverif') {
                    input.classList.add('is-valid-js');
                }
            }
        });
        // on récupère les mots de passe 
        const mdpInput = document.getElementById('mdp');
        const mdpVerifInput = document.getElementById('mdpverif');
        // on vérifie que les mots de passe sont égaux
        if (mdpInput.value !== mdpVerifInput.value) {
            // si non on envoie le message d'erreur
            isValid = false;
            displayError(mdpVerifInput, 'Les mots de passe ne correspondent pas.');
        } else {
            if (mdpVerifInput.id !== 'mdpverif') {
                mdpVerifInput.classList.add('is-valid-js');
            }
        }
        // on envoie l'etat du formulaire valide une fois que tout est bon
        return isValid;
    }

        // on définit la fonction d'affichage des erreurs
    function displayError(element, message) {
        // on créée la div pour les erreurs 
        const errorDiv = document.createElement('div');
        errorDiv.className = 'alert alert-danger-js error-message';
        errorDiv.textContent = message;
        // on lui ajoute la classe css
        element.classList.add('is-invalid-js');
        // on definit l'endroit ou on veut que le message d'erreur apparaisse
        element.parentNode.insertBefore(errorDiv, element.nextSibling);
    }
    // on définint la fonction de reinitialisation des styles
    function resetStyles() {
        // on recupere les messages d'erreurs du formulaire
        const errorMessages = form.querySelectorAll('.alert-danger-js');
        // et on les supprime :p
        errorMessages.forEach(function (errorMessage) {
            errorMessage.remove();
        });
        // maintenant pour tous les champs du formulaire, on supprime les classes de validation quon aurait ajouté
        const inputs = form.querySelectorAll('input');
        inputs.forEach(function (input) {
            input.classList.remove('is-invalid-js', 'is-valid-js');
        });
    }
});
