<!-- author @ImraneSAHAB @AdamStitou -->
<img src="public/img/Veto.png" class="fond" alt="image de clinique">
<section>
    <form id="co" action="index.php?action=connexion" method="post">
        <fieldset>
            <h2 id="Connexion">Connexion :</h2>
            <label for="email">Adresse e-mail :</label><br/>
            <input type="email" id="email" name="email"  required/><br/>
            <label for="motDePasse">Votre mot de passe :</label><br/>
            <input type="password" id="motDePasse" name="motDePasse" required/><br/>
            <input type="submit" id="boutonConnexion" value="Connexion" />
            <p>
                Pas encore inscrit ?
                <a href="index.php?action=inscription"> inscrivez-vous </a>
            </p>
        </fieldset>
    </form>
</section>

<style>
    <?php include("public/css/connexion.css");?>
</style>