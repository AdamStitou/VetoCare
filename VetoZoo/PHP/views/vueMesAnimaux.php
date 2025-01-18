<section>
    <!-- author @AdamSTITOU @ImraneSAHAB @gautierBAYARD-->
    <br>
    <h1>Mes animaux</h1>
    <div class="wrapper">
        <?php
            for ($i = 0; $i < sizeof($allAnimals); $i++) {
                echo '<div class="block">';
                echo '<div class="espece">';
                echo ("<label>Mon " . $allAnimals[$i]->getEspece() . " :</label><br>");
                echo '</div>';
                echo '<div class="nom">';
                $animalID = $allAnimals[$i]->getId_Animal();
                if ($animalID !== null) {
                    $_SESSION['id_animal'] = $animalID;
                    echo "<a href='index.php?action=monAnimal&id_Animal=" . $animalID . "'><button>" . $allAnimals[$i]->getNom() . "</button></a><br><br>";
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