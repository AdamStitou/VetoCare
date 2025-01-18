<div id="contacts-container">
    <div id="contacts-title">
        <h2>Mes contacts :</h2>
    </div>
    <div id="veterinaires">
        <form action="" method="post">
            <select name="idVeterinaire" id="liste-veterinaires" onchange="this.form.submit()">
                <option value="" disabled selected hidden>Mes vétérinaires</option>
                <?php
                    for($i = 0; $i < sizeof($veterinaires); $i++) {
                        echo("<option value=\"".$veterinaires->getIdUtilisateur()."\">" . $veterinaires->getNom()." ".$veterinaires->getPrenom() . "</option><br></br>");
                    }
                ?>
            </select>
        </form>
    </div>
</div>
<div id="messagerie-container">
    <div id="messagerie-title">
        <h2>Messagerie :</h2>
    </div>
    <div id="messagerie">
        <div id="chat">
            <?php
                if(isset($_SESSION["nomDestinataire"])){
                    echo($_SESSION["nomDestinataire"]);
                }
            ?>
            <div id="messages">
                <?php
                    if(isset($messages)){
                        foreach($messages as $message){
                            echo("<p>".$message->getContenu()."</p><br>");
                        }
                        
                        
                    }
                ?>
            </div>
            <div id="input">
                <div id="message-input">
                    <form action="index.php?action=messagerie" method="post">
                        <input type="text" name="message" id="message" placeholder="Votre message...">
                        <button type="submit" id="envoyer"><i class="fa-solid fa-paper-plane"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    <?php include("public/css/messagerie.css") ?>
</style>