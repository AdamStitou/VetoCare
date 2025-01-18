/// @author Adam 
document.addEventListener("DOMContentLoaded", function () {
    // Récupèr les élémentspar leur identifiant
    let motDePasse1 = document.getElementById("motDePasse1");
    let motDePasse2 = document.getElementById("motDePasse2");
    let submitButton = document.getElementById("submit");

    submitButton.addEventListener('click', function (event) {
         // Vérifie si les deux mot de passe sont différents
        if (motDePasse1.value !== motDePasse2.value) {
             // Empêche l'envoi du formulaire
            event.preventDefault();
            alert("Les mots de passe ne correspondent pas. Veuillez vérifier.");
        } else {
            alert("Vous êtes bien inscrit sur le site. Merci de vous connecter");
        }
    });
});

