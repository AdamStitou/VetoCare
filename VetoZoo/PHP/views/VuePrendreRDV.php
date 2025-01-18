<!-- @author @ImraneSAHAB -->
<?php
require_once("models/UserManager.php");
$userManager = new UserManager();
$AllVeterinaries = $userManager->getAllVeterinaries();
?>
<section>
    <form id="AddRDV" action="index.php?action=rdv" method="post">
    <div class="container">
        <div id="petList">
            <select name="animaux" id="Animaux"> 
                <option disabled selected>Mon animal</option>
                <?php
                for($i = 0; $i < sizeof($allOfAnimals); $i++) {
                    echo("<option>" . $allOfAnimals[$i]->getNom() . "</option><br>");
                }
                ?>
            </select>
        </div>
        <div id="veto">
            <select name="vetoTitre" id="vetoTitre">
                <option disabled selected>Vétérinaires</option>
                    <?php
                        for($i = 0; $i < sizeof($AllVeterinaries); $i++) {
                            echo("<option>" . $AllVeterinaries[$i]->getNom() . "</option><br></br>");
                        }
                    ?>
            </select>
        </div>
        <div id="calendar">
            <input type="text" id="datepicker" name="date"/>
            <input type="date" id="dateUpdate" name="NiceDate"/>
        </div>
        <div id="reason">
            <input type="text" placeholder="Motif" name="motif"/>
            <button type="submit" id="confirmButton" >Confirmer</button>
        </div>
        <div id="time">
            <h2 id="horaire">Horaire</h2>
            <input type="time" id="horairepicker" name="heure"/>
        </div>
    </div>
    </form>
</section>


<style>
    <?php include("public/css/prendrerdv.css") ?>
</style>

<script src="public\js\prendrerdv.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>