/// author @ImraneSAHAB
// Fonction pour vérifier l'état de connexion de l'utilisateur
function checkUserLoggedIn() {
    // Récupérez la valeur de l'attribut de données
    var userIsLoggedIn = document.body.dataset.userIsLoggedIn === 'true';

    if (userIsLoggedIn === false) {
        // Redirigez l'utilisateur vers la page de connexion
        window.location.href = "index.php?action=connexion";
    } else {
        var script = document.createElement('script');
        script.src = 'public/js/header.js';
        document.head.appendChild(script);
    }
}

// Associez cette fonction à l'événement de clic du bouton "Ajouter un animal"
  function addanimal(){
 var addButton = document.querySelector(".ajout");
if (addButton) {
    addButton.addEventListener("click", checkUserLoggedIn);
}}
