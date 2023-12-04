// on définit la variable pour les avertissements
var nombreAvertissements = 0;

// fonction utilisée lorsqu'on veut publier
function publierTexte() {
    // on récupère ce qui correspond à l'id "texte"
    var texte = document.getElementById("texte").value;

    var erreurMessageElement = document.getElementById("erreurMessage");
    erreurMessageElement.innerHTML = "";

    // on définit la liste des mots interdits
    var motsInterdits = ['bite','voldemort', 'con', 'connard', 'hitler', 'sexe', 'couillon', 'pute', 'salope', 'negro', 'négro', 'connard', 'foutre', 'gueule', 'batard', 'bâtard', 'cul', 'merde', 'couilles', 'couille', 'enfoire', 'enfoiré', 'pisse', 'petasse', 'pétasse', 'pd', 'pouffiasse', 'baise', 'baiser', 'gland', 'branleur', 'queue', 'salaud', 'fils de', 'suce', 'penis', 'pénis', 'chatte', 'fils de', 'encule', 'enculé'];

    // la variable est fausse pour le moment
    var motInterditTrouve = false;

    // on compare chaque mot du texte pour voir si il contient un mot interdit
    motsInterdits.forEach(mot => {
        
        var regex = new RegExp('\\b' + mot + '\\b', 'gi'); //on définit regex (regular expression) pour que chaque mot puisse être analysé

        // si un mot interdit est trouve on sort de la boucle 
        if (regex.test(texte)) {
            motInterditTrouve = true;
            return; 
        }
    });

    // on augment le nombre d'avertissement a chaque mot interdit trouvé
    if (motInterditTrouve) {
        nombreAvertissements++;

        // si l'on recoit 2 avertissements, le nombre d'avertissement est reinitialisé puis l'utilisateur est renvoye sur l'url (définition du respect)
        if (nombreAvertissements === 2) {
            nombreAvertissements = 0;
            window.location.href = "https://www.google.com/search?q=d%C3%A9finition+respect&rlz=1C1GCEU_frBE1041BE1041&oq=d%C3%A9finition+respe&gs_lcrp=EgZjaHJvbWUqBwgAEAAYgAQyBwgAEAAYgAQyBggBEEUYOTIKCAIQABgKGBYYHjIICAMQABgWGB4yCggEEAAYChgWGB4yCAgFEAAYFhgeMggIBhAAGBYYHjIICAcQABgWGB4yCAgIEAAYFhgeMggICRAAGBYYHqgCALACAA&sourceid=chrome&ie=UTF-8";
        } else {
            //si il n'a pas encore 2 avertissement on affiche le message d'erreur
            erreurMessageElement.innerHTML = "<span style='font-weight: bold;'>Merci de rester courtois dans l'espace commentaire. >:(";
            document.getElementById("textForm").style.border = "2px solid red";
        }
    } else {
        // si aucun mot interdit n'est trouve on cache le formulaire pour qu'il soit envoyé
        document.getElementById("textForm").style.display = "none";
    }
}
