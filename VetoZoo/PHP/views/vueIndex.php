<?php
if(isset($redirection)){
    echo("
    <script>
        window.location.href =\"index.php?action=index\";
    </script>");
}
?>

<section id="description">
    <div class="infos">
        <img id="img-chat" src="public/img/ChatOrange.png" alt="" />
        <img id="img-chien" src="public/img/chien.png" alt="" />
        <p id="Titre" > Description</p>
        <p>
            Nous sommes conscients de l'importance de la relation entre les animaux et leurs propriétaires, 
            c'est pourquoi nous nous consacrons à fournir des soins compatissants et personnalisés. N'hésitez
            pas à explorer notre site pour en savoir plus sur les services que nous pouvons vous offrir, ainsi qu'à vos amis à fourrure !
        </p>
    </div>
</section>
<section id="fonctionnalites">
    <div class="infos">
        <p id="Titre">Carnet de santé</p>
        <p>
            Vous pourrez retrouver tous les carnets de santé de vos animaux.
            Vous y trouverez des comptes rendus de consultation, des
            ordonnances, ainsi que des informations importantes concernant la
            santé de votre animal. Notez qu'il vous est également possible de
            consigner des informations diverses, telles qu'une prise de poids
            anormale ou un comportement suspect, afin d'en informer votre
            vétérinaire lors d'un prochain rendez-vous.
        </p>
        <a href=""><button class="infosBouton">Accéder >></button></a>
    </div>

    <div class="infos">
        <p id="Titre">Prendre rendez-vous</p>
        <p>
            VétoZoo vous offre la possibilité de prendre rendez-vous directement en ligne avec votre vétérinaire.
            Un calendrier virtuel vous permettra de sélectionner la date et l'heure qui
            vous conviennent en fonctiondes disponibilités de votre praticien.
        </p>
        <a href=""><button class="infosBouton">Accéder >></button></a>
    </div>

    <div class="infos">
        <p id="Titre">Messagerie</p>
        <p>
            Sur notre plateforme, vous pourrez dialoguer en temps réel avec votre vétérinaire
            via un système de messagerie instantanée. Il vous sera donc possible d'échanger avec 
            votre praticien à tout moment, que ce soit pour des raisons diverses et variées.
        </p>
        <a href=""><button class="infosBouton">Accéder >></button></a>
    </div>

    <div class="infos">
        <p>Ajouter un animal</p>
        <p>
            Il est évident que vous pouvez posséder parfois plus d'un animal. C'est 
            pourquoi vous pourrez disposer des carnets de santé,
            un pour chacun de vos petits compagnons. Pour ajouter un nouvel animal, 
            vous devrez remplir un petit questionnaire portant sur les informations de base de votre animal.
            Si ces informations vous sont inconnues, votre vétérinaire pourra les compléter pour vous lors d'un rendez-vous.
        </p>
        <button class="infosBouton ajout">Accéder >></button>
    </div>
</section>


<style>
    <?php include("public/css/index.css") ?>
</style>
<script>
    <?php include("public/js/header.js")?>
</script>