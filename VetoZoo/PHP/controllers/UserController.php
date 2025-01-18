<?php
require_once("views/View.php");
require_once("models/UserManager.php");
require_once("models/Message.php");


/**
 * Répertorie les méthodes concernant le contrôle des utilistateurs
 * @author Clément Boutet
 */
class UserController{

    /**
     * Permet d'afficher la page d'inscription
     * @author clement boutet
     */
    public function displayInscription(): void{
        $inscriptionView = new View("Inscription");
        $inscriptionView->generer([]);
    }

    /**
     * Permet d'initier la procédure d'inscription
     * @param array $donnees Données de l'utilisateur à inscrire
     * @author clement boutet
     */
    public function inscription(array $donnees):void{
        $userManager = new UserManager();
        $userManager->inscription($donnees);
        $indexView = new View("Connexion");
        $indexView->generer([]);

    }
 
    /**
     * Permet d'afficher la page de connexion
     * @author clement boutet
     */
    public function displayConnexion() : void{
        $connexionView = new View("Connexion");
        $connexionView->generer([]);
    }

    
    /**
     * Permet d'initier la procédure de connexion
     * @param array $data Données de la tentative de connexion
     * @author clement boutet
     */
    public function connexion(array $data):void{
        $userManager = new UserManager();
        $succes = $userManager->connexion($data);
        if($succes){
            $indexView = new View("Index");
            $indexView->generer(["redirection"=>true]);
        }
        else{
            echo("<script>window.alert(\"utilisateur introuvable\");window.location.href =\"index.php?action=connexion\";</script>");
        }

    }

    /**
     * Permets la déconnexion d'un utilisateur
     * @author clement boutet
     */
    public function deconnexion():void{
        session_unset(); 
        session_destroy(); 
        header("Location: index.php");
    }

    /**
     * Permets d'afficher la messagerie 
     * @author BAYARD Gautier
     */
    public function displayMessagerie($idVet=null):void{
        $userManager = new UserManager();
        $veterinaires = $userManager->getAllVeterinaries();
        $messages = $userManager->getMessagesDiscussion();
        if(isset($idVet)){
            $veterinaire = null;
            foreach($veterinaires as $vet){
                if($vet->getIdUtilisateur() == $idVet){
                    $veterinaire = $vet;
                }
            }
            $nomVeterinaire = "<div id=\"nomDocteur\">DR. ".$veterinaire->getNom()."</div>";
            $_SESSION["nomDestinataire"] = $nomVeterinaire;
            $_SESSION["idDestinataire"] = $idVet;
            echo("<script>alert('".var_dump($_SESSION["messages"])."')</script>");
            header("Location: index.php?action=messagerie");exit;
        }else{
            $messagerieView = new View('Messagerie');
            if(isset($messages)){
                $messagerieView->generer(["veterinaires"=>$veterinaires, "messages"=>$messages]);
            }
            else{
                $messagerieView->generer(["veterinaires"=>$veterinaires]);
            }
        }
    }

    /**
     * Permet d'afficher la page de rendez-vous 
     * @author gautierbayard
     */
    public function displayprendrerdv(){
        $rdvView = new View("prendrerdv");
        $animalManager = new AnimalManager();
        $allOfAnimals = $animalManager->getAllAnimals();
        $rdvView->generer(["allOfAnimals"=>$allOfAnimals]);
    }

    /**
     * Permet d'initier la procédure prise de rdv
     * @param array $data Données de la tentative de prise de rdv
     *  @author gautierbayard
     */
    public function prendrerdv(array $donnees): void {
        $rdvView = new View("Index");
        
        $moment = new DateTime($donnees["date"] . ' ' . $donnees["heure"]);
        

        // Initialisez les données pour l'insertion
        $data = [
            "moment" => $moment,
            "statut" => $donnees["statut"],
            "motif" => $donnees["motif"],
            "animal" => $donnees["animal"], 
            "nom_Utilisateur" => $donnees["nom_Utilisateur"],
        ];

        $userManager = new UserManager();
        $userManager->insertrdv($data);
        $rdvView->generer(["redirection"=>true]);
    }

    /**
     * Permet d'afficher les rendez-vous d'un utilisateur
     * @author gautierbayard
     */
    public function displayMesRDV(){
        $mesRDVview = new View("MesRDV");
        $userManager = new UserManager();
        $allRDV = $userManager->getAllRDV();
        $mesRDVview->generer(["allRDV"=>$allRDV]);
    }

    /**
     * Permet d'afficher les Clients 
     *  @author Adam Stitou
     */
    public function displayMesClients() : void{
        $MesClientsView = new View("mesClients");
        $userManager = new UserManager();
        $allOfClients = $userManager->getAllClients();
        $MesClientsView->generer(["allOfClients"=>$allOfClients]);
    }

    /**
     * Permet d'afficher les Animaux d'un client spécifique
     *  @author gautierbayard
     */
    public function displayAnimauxClient() : void{
        $MesAnimauxClient = new View("animauxClient");
        $MesAnimauxClient->generer([]);
    }

    /**
     * Permets d'actualiser l'affichage lorsque un message est envoyé ou reçu
     * @author clement boutet
     */
    public function envoyerMessage(array $data):void{
        $userManager = new UserManager();
        $userManager->envoyerMessage($data);
        header("Location: index.php?action=messagerie");
    }

    

}
?>