<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/header.css">
    <link rel="stylesheet" href="public/css/footer.css">
    <link rel="stylesheet" href="public/css/addanimal.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <meta name="author" content="Clément Boutet">
    
    <title><?= $titre?></title>
</head>
<body>
    <header>
      <div id="header-name"><a href="index.php">VétoCare</a></div>
      <div id="header-login">
        <?php if(!isset($_SESSION["id_Utilisateur"])):?>
          <a href="index.php?action=connexion"><button class="header-first-btn">Connexion</button></a>
          <a href="index.php?action=inscription"><button class="header-sec-btn" id="inscription-btn">Inscription</button></a>
        <?php else:?>
          <a href="index.php?action=deconnexion"><button class="header-first-btn">Déconnexion</button></a>
          <button class="header-sec-btn"><i class="fa-solid fa-circle-user"></i> <?= $_SESSION["prenom_Utilisateur"]. " " . $_SESSION["nom_Utilisateur"]?></button>
        <?php endif; ?>
      </div>
      <div id="side-menu">
        <?php if (isset($_SESSION["id_Utilisateur"])):?>            <!-- Analyse si l'utilisateur est connecté -->
          <?php if ($_SESSION["isVeterinaire"]):?>                  <!-- Analyse si l'utilisateur est un vétérinaire -->
            <a href="index.php?action=mesClients"><button id="animaux" class="side-item">Mes clients</button></a>
            <a href="index.php?action=mesRDV"><button id="rdv" class="side-item">Mes rendez-vous</button></a>
            <a href="index.php?action=messagerie"><button id="mess" class="side-item">Messagerie</button></a>
          <?php else: ?>
            <a href="index.php?action=mesAnimaux"><button id="animaux" class="side-item">Mes animaux</button></a>
            <a href="index.php?action=rdv"><button id="rdv" class="side-item">Prendre rendez-vous</button></a>
            <a href="index.php?action=mesRDV"><button id="rdv" class="side-item">Mes rendez-vous</button></a>
            <a href="index.php?action=messagerie"><button id="mess" class="side-item">Messagerie</button></a>
            <button id="ajout" class="side-item ajout">Ajouter un animal</button>
          <?php endif; ?>
        <?php endif; ?>
      </div>
      <dialog id="addanimal">
        <!-- Un dialogue pour afficher le formulaire -->
        <div class="form-container">
            <!-- Un conteneur pour le formulaire avec des styles CSS associés -->
            <form id="form" action="index.php?action=insertAnimal" method="post">
                <!-- Formulaire -->
                <div class="form-group">
                    <!-- Groupe de formulaire avec une étiquette et un champ -->
                    <label for="nomAnimal">Nom de l'animal:</label>
                    <!-- Étiquette pour le champ de texte "Nom de l'animal" -->
                    <input type="text" id="nomAnimal" name="nomAnimal" required>
                    <!-- Champ de texte pour le nom de l'animal, obligatoire -->
                </div>
                <div class="form-group">
                    <label for="espece">Espèce:</label>
                    <select id="espece" name="especeAnimal" required>
                        <!-- Liste déroulante pour sélectionner l'espèce -->
                        <option value="Chien">Chien</option>
                        <option value="Chat">Chat</option>
                        <option value="Lapin">Lapin</option>
                    </select>
                </div>
                <div class="form-group">
                    <p>Genre de l'animal:</p>
                    <br>
                    <label for="genreMale">
                        <input type="radio" id="genreMale" name="genreAnimal" value="Mâle" required> Mâle
                    </label>
                    <label for="genreFemelle">
                        <input type="radio" id="genreFemelle" name="genreAnimal" value="Femelle" required> Femelle
                    </label>
                </div>
                <div class="form-group">
                    <label for="race">Race de l'animal :</label>
                    <input type="text" id="race" name="raceAnimal" required>
                </div>
                <div class="form-group">
                    <label for="poids">Poids de l'animal (en kg) :</label>
                    <input type="text" id="poids" name="poidsAnimal" required>
                </div>
                <div class="form-group">
                    <label>Stérilisé ?</label>
                    <br>
                    <label for="sterileOui">Oui</label>
                    <input type="radio" id="sterileOui" name="sterileAnimal" value="Oui" required>
                    <label for="sterileNon">Non</label>
                    <input type="radio" id="sterileNon" name="sterileAnimal" value="Non" required>
                </div>
                <button id="addsub" type="submit" >Soumettre</button>
                <!-- Bouton "Soumettre" pour envoyer le formulaire -->
            </form>
        </div>
        <button id="fermerbtn">Fermer</button>
      <!-- Bouton pour fermer le dialogue -->
      </dialog>
      <!-- Fin de la pop-up -->
      <!-- author @ImraneSAHAB -->
      <div id="logo">
        <img src="public/img/logo.png" alt="">
      </div>
    
    </header>

    <main>
      <?= $contenu?>
    </main>

    <footer>
      <p>© 2023 Tous Droits Réservés</p>
      <div id="social">
        <i class="fa-brands fa-lg fa-instagram"></i>
        <i class="fa-brands fa-lg fa-facebook"></i>
        <i class="fa-brands fa-lg fa-twitter"></i>
        <i class="fa-brands fa-lg fa-linkedin"></i>
      </div>
      <div id="alpha">
        <a href="" class="letter">A</a>
        <a href="" class="letter">B</a>
        <a href="" class="letter">C</a>
        <a href="" class="letter">D</a>
        <a href="" class="letter">E</a>
        <a href="" class="letter">F</a>
        <a href="" class="letter">G</a>
        <a href="" class="letter">H</a>
        <a href="" class="letter">I</a>
        <a href="" class="letter">J</a>
        <a href="" class="letter">K</a>
        <a href="" class="letter">L</a>
        <a href="" class="letter">M</a>
        <a href="" class="letter">N</a>
        <a href="" class="letter">O</a>
        <a href="" class="letter">P</a>
        <a href="" class="letter">Q</a>
        <a href="" class="letter">R</a>
        <a href="" class="letter">S</a>
        <a href="" class="letter">T</a>
        <a href="" class="letter">U</a>
        <a href="" class="letter">V</a>
        <a href="" class="letter">W</a>
        <a href="" class="letter">X</a>
        <a href="" class="letter">Y</a>
        <a href="" class="letter">Z</a>
      </div>
    </footer>
    <script src="public/js/header.js"></script>
</body>
</html>