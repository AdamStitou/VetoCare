<!-- author @gautierBAYARD @ImraneSAHAB-->
<?php
require_once("models/UserManager.php");
$userManager = new UserManager();
$AllClients = $userManager->getAllClients();
$allRDV = $userManager->getAllRDV();
?>
<section>
    <!-- author @gautierBAYARD @ImraneSAHAB-->
    <br>
    <h1>Mes Rendez-Vous</h1>
    <div class="wrapper">
    <?php if (isset($_SESSION["id_Utilisateur"])):?> 
        <?php if ($_SESSION["isVeterinaire"]):?>
        <?php
            for($i = 0; $i < sizeof($allRDV); $i++) {
                echo("<a>" . $allRDV[$i]->getMoment() . "  " . $allRDV[$i]->getMotif() . "</a><br></br>");
                echo '<div class="block">';
                echo '<div class="moment">';
                echo ("<label>Mes Clients " . $allAnimals[$i]->getEspece() . " :</label><br>");
                echo '</div>';
                echo '<div class="nom">';
                $animalID = $allAnimals[$i]->getId_Animal();
                if ($animalID !== null) {
                    $_SESSION['id_animal'] = $animalID;
                    echo "<a href='index.php?action=monAnimal&id_Animal=" . $animalID . "'><button>" . $allAnimals[$i]->getNom() . "</button></a><br><br>";
                }
            }
        ?>
        <?php endif; ?>
        <?php endif; ?>
        </select>
    </div>
</section>
<style>
    <?php include("public/css/mesAnimaux.css") ?>
</style>