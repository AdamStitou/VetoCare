<!-- author @gautierbayard-->
<?php
$animalManager = new AnimalManager();
$_SESSION['id_Animal'] = intval($_GET['id_Animal']);
$_SESSION['info_carnet'] = $animalManager->getAllCarnetAnimal(intval($_SESSION['id_Animal']));
?>
<body>
    <div class="carnet">
        <h1>Carnet de santé</h1>

        <div class="proprietaire ">
            <label class="tab">Propriétaire :  </label>
            <div class="info-content"> <?php echo $_SESSION['info_carnet']['nom_proprio'], "   ",$_SESSION['info_carnet']['prenom_proprio'] ?> </div>
        </div>

        <div class="parent">
            <div class="colonne1">
                <div class="section-info">
                    <label class="tab">Nom :  </label>
                    <div class="info-content">
                        <?php echo $_SESSION['info_carnet']['nom']; ?>
                    </div>
                </div>
                <div class="section-info">
                    <label class="tab">Date de naissance :  </label>
                    <div class="info-content"><?php echo $_SESSION['info_carnet']['date_naissance']->format('Y-m-d'); ?></div>
                </div>
                <div class="section-info">
                    <label class="tab">Sexe :  </label>
                    <div class="info-content"><?php echo $_SESSION['info_carnet']['sexe']; ?></div>
                </div>
                <div class="section-info">
                    <label class="tab">Stérilisé :  </label>
                    <div class="info-content"><?php echo $_SESSION['info_carnet']['sterile']; ?></div>
                </div>
            </div>
            <div class="colonne2">
                <div class="section-info">
                    <label class="tab">Espèce :  </label>
                    <div class="info-content"><?php echo $_SESSION['info_carnet']['espece']; ?></div>
                </div>
                <div class="section-info">
                    <label class="tab">Race :  </label>
                    <div class="info-content"><?php echo $_SESSION['info_carnet']['race']; ?></div>
                </div> 

                <div class="section-info">
                    <label class="tab">Robe :  </label>
                    <div class="info-content">  <?php echo $_SESSION['info_carnet']['robe']; ?>   </div>
                </div>
                <div class="section-info">
                    <label class="tab">Assuré :  </label>
                    <div class="info-content"> <?php echo $_SESSION['info_carnet']['assure']; ?> </div>
                </div>
            </div>
            <div class="sectionphoto">
                <?php
                $base64Image =  base64_encode($_SESSION['info_carnet']['photo']);
                if ($base64Image != null) {
                    echo '<img src="data:image/jpeg;base64,' . $base64Image . '" alt="Photo de l\'animal">';
                } else {
                    echo 'Aucune photo disponible.';
                }
                ?>
            </div>
        </div>

        <div class="parent-signes-pedigree">
            <div class="pedigree-div1">
                <label>Signes particuliers :  </label>
                <div class="info-content"> <?php echo $_SESSION['info_carnet']['signes']; ?> </div>
            </div>
            <div class="pedigree-div2">
                <label>Pedigree(LOOF) :  </label>
                <div class="info-content"><?php echo $_SESSION['info_carnet']['pedigre']; ?></div>
            </div>
        </div>

        <div class="etiquette-tatouage">
            <div class="etiquette">
                <label>Emplacement pour étiquette puce / Numéro de tatouage :  </label>
                <div class="puce-tatouage">    </div>
            </div>
        </div>

        <div class="observations">
        <form id="formCarnet" method="post" action="index.php?action=monAnimal&id_Animal=<?php echo $_SESSION['id_Animal']; ?>">
            <div class="observations-texte">
                <label>Vos observations / À signaler au vétérinaire :  </label>
            </div>
            <div class="observations-content">
                <div class="info-content editable-observations"> <?php echo $_SESSION['info_carnet']['observations']; ?> </div>
                <input type="hidden" name="observations" value="<?php echo htmlspecialchars($_SESSION['info_carnet']['observations']); ?>"/>
                <button type="submit" class="save-button">Valider</button>
            </div>
        </form>
        </div>


        <div class="parent-bottom">
            <div class="bottom-div1">
                <label>Dépistage Felv/ FIV :  </label>
                <div class="info-content"><?php echo $_SESSION['info_carnet']['depistage']; ?></div>
            </div>
            <div class="bottom-div2">
                <label>Date :  </label>
                <div class="info-content"><?php echo $_SESSION['info_carnet']['date_depistage']->format('Y-m-d'); ?></div>
            </div>
            <div class="bottom-div3">
                <label>Vignette :  </label>
                <div class="info-content"><!-- Contenu --></div>
            </div>
        </div>

        <div class="parent-bottom">
            <div class="bottom-div1">
                <label>Rappel de vaccinations :  </label>
                <div class="info-content"><?php echo $_SESSION['info_carnet']['nom_vaccin']; ?></div>
            </div>
            <div class="bottom-div2">
                <label>Date :  </label>
                <div class="info-content"><?php echo $_SESSION['info_carnet']['date_vaccin']->format('Y-m-d'); ?></div>
            </div>
            <div class="bottom-div3">
                <label>Vignette :  </label>
                <div class="info-content"><!-- Contenu --></div>
            </div>
        </div>

        <div class="parent-bottom">
            <div class="bottom-div1">
                <label>Vermifugations / Recommandations :  </label>
                <div class="info-content"><?php echo $_SESSION['info_carnet']['vermifugation']; ?></div>
            </div>
            <div class="bottom-div2">
                <label>Date :  </label>
                <div class="info-content"><?php echo $_SESSION['info_carnet']['date_vermifugation']->format('Y-m-d'); ?></div>
            </div>
            <div class="bottom-div3">
                <label>Produit :  </label>
                <div class="info-content"><!-- Contenu --></div>
            </div>
        </div>

        <div class="parent-bottom">
            <div class="bottom-div1">
            <label>Traitement puces / tiques / Recommandations :  </label>
                <div class="info-content"><?php echo $_SESSION['info_carnet']['traitement']; ?></div>
            </div>
            <div class="bottom-div2">
                <label>Date :  </label>
                <div class="info-content"><?php echo $_SESSION['info_carnet']['date_traitement']->format('Y-m-d'); ?></div>
            </div>
            <div class="bottom-div3">
                <label>Produit :  </label>
                <div class="info-content"><!-- Contenu --></div>
            </div>
        </div>
        

        <div class="parent-alimentation">
            <div class="alimentation-div1">
                <h2>Alimentation / Recommandation</h2>
            </div>
            <div class="alimentation-div2">
                <label>Référence de l'aliment recommandé :  </label>
                <div class="info-content"><?php echo $_SESSION['info_carnet']['reference_aliment']; ?></div>
            </div>
            <div class="alimentation-div3">
                <label>Quantité journalière :  </label>
                <div class="info-content"><?php echo $_SESSION['info_carnet']['quantite_aliment']; ?></div>
            </div>
        </div>


    </div>
</body>

<style><?php include("public/css/carnetanimal.css");?></style>
<script src="public\js\modificationsAnimal.js"></script>