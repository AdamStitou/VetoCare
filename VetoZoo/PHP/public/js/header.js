  // author ImraneSAHAB
  document.addEventListener("DOMContentLoaded", function () {
    // Attend que le DOM soit prêt pour manipuler les éléments HTML
  
    const addanimal = document.getElementById("addanimal");
    // Récupère l'élément avec l'ID "addanimal" (la boîte de dialogue)
  
    var ajout = document.getElementsByClassName("ajout");
    // Récupère l'élément avec l'ID "ajout" (le bouton pour ouvrir la boîte de dialogue)
  
    const fermerbtn = document.getElementById("fermerbtn");
    // Récupère l'élément avec l'ID "fermerbtn" (le bouton pour fermer la boîte de dialogue)
  
    for (let i = 0; i < ajout.length; i++) {
      ajout[i].addEventListener("click", function () {
        // Ajoute un gestionnaire d'événement lorsque le bouton "ajout" est cliqué
        addanimal.showModal();
        // Ouvre la boîte de dialogue en utilisant la méthode "showModal()"
      });
    }
  
    fermerbtn.addEventListener("click", function () {
      // Ajoute un gestionnaire d'événement lorsque le bouton "fermerbtn" est cliqué
      addanimal.close();
      // Ferme la boîte de dialogue en utilisant la méthode "close()"
    });
  });
