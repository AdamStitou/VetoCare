/// @author Adam 
document.addEventListener("DOMContentLoaded", function () {
  //slectionne le champs de mot de passe
  let inputsMotDePasse = document.querySelectorAll(".motDePasse");
  // selectionne l'icone eye qui masquera et affichera le mdp
  let eye = document.getElementsByClassName("eye");
  let open = false;
  for (let i = 0; i < eye.length; i++) {
    //fonction qui gère l'action de cliquer sur l'icone 
    eye[i].onclick = function () {
      // Vérifie si le mot de passe est actuellement masqué
      if (open == false) {
        //met le mot de passe en texte
        inputsMotDePasse[i].type = "text";
        //change l'icone en eye non barré 
        eye[i].classList.remove("fa-eye-slash");
        eye[i].classList.add("fa-eye");
        // indiquer que le mot de passe n'est pas masqué
        open = true;
        // si le mot de passe ne l'est pas 
      } else {
        inputsMotDePasse[i].type = "password";
         //change l'icone en eye barré 
        eye[i].classList.remove("fa-eye");
        eye[i].classList.add("fa-eye-slash");
         // indiquer que le mot de passe est masqué
        open = false;
      }
    };
  }
});
