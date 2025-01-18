/// @author Adam 
document.addEventListener("DOMContentLoaded", function () {
  //selectionne le mot de passe
  let inputsMotDePasse = document.querySelectorAll(".motDePasse");
  // Sélectionne les éléments pour de critères de validations
  let critereChiffre = document.querySelector(".chiffre");
  let critereMajuscule = document.querySelector(".majuscule");
  let critereMinuscule = document.querySelector(".minuscule");
  let critereTailleMDP = document.querySelector(".tailleMDP");
  // regarde le champs pendant la saisie du mot de passe
  if (
    inputsMotDePasse.length > 0 &&
    critereChiffre &&
    critereMajuscule &&
    critereMinuscule &&
    critereTailleMDP
  ) {
    inputsMotDePasse.forEach((input) => {
      input.addEventListener("input", function () {
        validation(this);
        if (!this.value) {
          remove();
        }
      });
    });

    // la fonction verifie la validation selon des critères pres selectionné
    function validation(password) {
      const chiffre = password.value.match(/\d/g);
      const majuscule = password.value.match(/[A-Z]/);
      const minuscule = password.value.match(/[a-z]/);
      // critère de presence de au moins 2 choffres
      if (chiffre && chiffre.length >= 2) {
        password.classList.remove("invalide");
        critereChiffre.classList.remove("error");
        password.classList.add("succes");
        critereChiffre.classList.add("succes");
      } else {
        password.classList.remove("succes");
        critereChiffre.classList.remove("succes");
        password.classList.add("invalide");
        critereChiffre.classList.add("error");
      }
      // Vérifie qu'il y a au moins une lettre majuscule
      if (majuscule) {
        password.classList.remove("invalide");
        critereMajuscule.classList.remove("error");
        password.classList.add("succes");
        critereMajuscule.classList.add("succes");
      } else {
        password.classList.remove("succes");
        critereMajuscule.classList.remove("succes");
        password.classList.add("invalide");
        critereMajuscule.classList.add("error");
      }
      // Vérifie qu'il y a au moins une lettre minuscule
      if (minuscule) {
        password.classList.remove("invalide");
        critereMinuscule.classList.remove("error");
        password.classList.add("succes");
        critereMinuscule.classList.add("succes");
      } else {
        password.classList.remove("succes");
        critereMinuscule.classList.remove("succes");
        password.classList.add("invalide");
        critereMinuscule.classList.add("error");
      }
      // Vérifie qu'il y a au moins 6 caractères
      if (password.value.length >= 6) {
        critereTailleMDP.classList.remove("error");
        critereTailleMDP.classList.add("succes");
      } else {
        critereTailleMDP.classList.add("error");
        critereTailleMDP.classList.remove("succes");
      }
    }
    // la fonction permet de supprimer les classe de styles
    function remove() {
      inputsMotDePasse.forEach((input) => {
        input.classList.remove("invalide");
        input.classList.remove("succes");
      });

      critereChiffre.classList.remove("error");
      critereChiffre.classList.remove("succes");

      critereMajuscule.classList.remove("error");
      critereMajuscule.classList.remove("succes");

      critereMinuscule.classList.remove("error");
      critereMinuscule.classList.remove("succes");

      critereTailleMDP.classList.remove("error");
      critereTailleMDP.classList.remove("succes");
    }
  } else {
    console.error("des éléments sont introuvables");
  }
});
