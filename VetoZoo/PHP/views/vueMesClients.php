<?php
require_once("models/UserManager.php");
$userManager = new UserManager();
$allClients = $userManager->getAllClients();
?>
<section>
    <!-- author @AdamSTITOU -->
    <br>
    <h1>Mes Clients</h1>
    <div class="wrapper">
        <?php
            for ($i = 0; $i < sizeof($allClients); $i++) {
                echo '<div class="block">';
                echo '<div class="nomClient">';
                echo ("<label>Mon Client</label><br>");
                echo '</div>';
                echo '<div class="nom">';
                $ClientsID = $allClients[$i]->getId_Utilisateur();
                if ($ClientsID !== null) {
                    $_SESSION['id_utilisateur'] = $ClientsID;
                    echo "<a href='index.php?action=animauxClient&id_utilisateur=" . $ClientsID . "'><button>" . $allClients[$i]->getNom() . " ".$allClients[$i]->getPrenom() ."</button></a><br><br>";
                }
                echo '</div>';
                echo '</div>';
            }
        ?>
    </div>
</section>
<style>
    <?php include("public/css/mesClients.css") ?>
</style>