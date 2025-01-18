<?php
require_once("models/AnimalManager.php");
$animalManager = new AnimalManager();
$_SESSION['id_utilisateur_bis'] = intval($_GET['id_utilisateur']);
$animauxClients = $animalManager->getAnimauxDuClients(intval($_SESSION['id_utilisateur_bis']));
?>

<section>
    <!-- author @AdamSTITOU @Gautier Bayard -->
    <br>
    <h1>Animaux de mon Client</h1>
    <div class="wrapper">
        <?php
            for ($i = 0; $i < sizeof($animauxClients); $i++) {
                echo '<div class="block">';
                echo '<div class="espece">';
                echo ("<label>Son " . $animauxClients[$i]->getEspece() . " :</label><br>");
                echo '</div>';
                echo '<div class="nom">';
                $animalID = $animauxClients[$i]->getId_Animal();
                if ($animalID !== null) {
                    echo "<a href='index.php?action=animalClient&id_Animal=" . $animalID . "'><button>" . $animauxClients[$i]->getNom() . "</button></a><br><br>";
                }
                echo '</div>';
                echo '</div>';
            }
        ?>
    </div>
</section>
<style>
    <?php include("public/css/mesAnimaux.css") ?>
</style>