
<section>
    <form id="inscription" action="index.php?action=inscription" method="post">
    <fieldset>
    <h2>Inscription</h2>

    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom"  required />

    <label for="prenom">Prenom :</label>
    <input type="text" id="prenom" name="prenom" required/>

    <label for="codePostal">Code postal :</label>
    <input type="number" id="codePostal" name="codePostal" required/>

    <label for="ville">Ville :</label>
    <input type="text" id="ville" name="ville" required/>


    <label for="telephone" >Numero de telephone :</label>
    <input type="tel" id="telephone" name="telephone" required/>

    <label for="email" >Adresse e-mail </label>
    <input type="email" id="email" name="email" required/>

    <label for="motDePasse" >Votre mot de passe :</label>
    <span class="passwordContainer">
        <input type="password" class="motDePasse" id="motDePasse1" name="motDePasse" required/>
        <i class="fa-solid fa-eye-slash eye"></i>
    </span>

    <label for="motDePasse" >Comfirmez votre mot de passe :</label>
    <span class="passwordContainer">
        <input type="password" class="motDePasse" id="motDePasse2" name="motDePasse"  required/>
        <i class="fa-solid fa-eye-slash eye" ></i>
    </span>

    <input type="submit" id="submit" value="inscription" />
    <p>
        Vous êtes déjà inscrit ?
        <a href="index.php?action=connexion"> connectez-vous </a>
    </p>
    <div class="validator-criters">
     <span class="minuscule"></i>&nbsp; le mot de passe doit contenir au moins une minuscule </span><br>
     <span class="majuscule"></i>&nbsp; le mot de passe doit contenir au moins une majuscule </span><br>
     <span class="chiffre"></i>&nbsp; le mot de passe doit contenir au moins 2 chiffres </span><br>
     <span class="tailleMDP"></i>&nbsp; le mot de passe doit contenir au moins 6 caractères </span>
     </div>
    </fieldset>
    </form>
    

</section>
<script src="public\js\validator.js"></script>
<script src="public\js\hide_show.js"></script>
<script src="public\js\comfirmation.js"></script>
<style>
    <?php include("public/css/inscription.css") ?>
</style>