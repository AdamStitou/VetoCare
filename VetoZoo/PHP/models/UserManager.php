<?php
require_once("Model.php");
require_once("User.php");
require_once("Message.php");

/**
 * Classe permettant de répertorier les différentes fonctions concernant les utilisateur
 * @author BAYARD Gautier
 */
class UserManager extends Model{

    /**
     * Permet de récupérer tous les utilisateurs en base deonnée
     * @return array Un tableau contenant tous les utilisateurs de la base de données
     * @author BAYARD Gautier
     */
    public function getAllUsers():array{
        $users = [];
        $request = $this->execRequest("SELECT * from utilisateurs;");
        while($donnees = $request->fetch(PDO::FETCH_ASSOC)){
            $users[] = new User($donnees);
        }
        return $users;
    }

    /**
     * Permet de savoir si un utilisateur est un vétérinaire ou un client pour la connexion
     * @return boolean True si c'est un vétérinaire et False le cas échéant
     * @author BAYARD Gautier
     */
    public function isVeterinaire(User $user):bool{
        $isVeterinaire = false;
        $allVeterinaries = [];
        $allVeterinaries = $this->getAllVeterinaries();
        for($i=0;$i<count($allVeterinaries);$i++){
            if($allVeterinaries[$i]->getId_Utilisateur() == $user->getId_Utilisateur()){
                $isVeterinaire = true;            
            } 
        }
        return $isVeterinaire;
    }

    /**
     * Permet de récupérer l'ID du dernier utilisateur inscrit
     * @return int L'ID du dernier utilisateur inscrit
     * @author BAYARD Gautier
     */
    public function getLastUserId(): int {
        $request = $this->execRequest("SELECT id_utilisateur FROM utilisateurs ORDER BY id_utilisateur DESC LIMIT 1;");
        $donnees = $request->fetch(PDO::FETCH_ASSOC);
            return (int)$donnees['id_utilisateur'];
    }

    /**
     * Permet d'ajouter un utilisateur en base de données
     * @param array $donnees Données de l'utilisateur à inscrire
     */
    public function inscription(array $donnees):void{
        $params = [];
        $params[] = 0;
        $params[] = $donnees["nom"];
        $params[] = $donnees["prenom"];
        $params[] = $donnees["codePostal"];
        $params[] = $donnees["ville"];
        $params[] = $donnees["telephone"];
        $params[] = $donnees["email"];
        $params[] = $donnees["motDePasse"];
        
        $this->execRequest("insert into utilisateurs (id_utilisateur, nom, prenom, codePostal, ville, telephone, email, motDePasse) values (?,?,?,?,?,?,?,?)", $params);
        
        $lastUserId = $this->getLastUserId();
        $client = [];
        $client[] = $lastUserId;
        
        $this->execRequest("insert into Client (id_utilisateur) values (?)", $client);
    }

    /**
     * Principe d'authentification
     * @param array $donnees Id, Email et Mot de passe de la tentative de connexion
     * @return bool Vrai si l'utilisateur existe en base de données, sinon faux
     * @author BOUTET Clement
     */
    public function connexion(array $donnees):bool{
        $allUsers = $this->getAllUsers();
        $exist = false;
        for($i=0;$i<count($allUsers);$i++){
            if($allUsers[$i]->getEmail() == $donnees["email"] && $allUsers[$i]->getMotDePasse() == $donnees["motDePasse"]){
                $exist = true;
                session_start();
                $_SESSION["id_Utilisateur"] = $allUsers[$i]->getId_Utilisateur(); 
                $_SESSION['nom_Utilisateur'] = $allUsers[$i] ->getNom();
                $_SESSION['prenom_Utilisateur'] = $allUsers[$i] ->getPrenom();    
                $_SESSION["isVeterinaire"] = $this->isVeterinaire($allUsers[$i]);                       
            } 
        }
        return $exist;
    }


    /**
     * Récupérer la liste de tous les vétérinaires
     * @return  array Le tableau avec tous les vétérinaires dedans 
     * @author BAYARD Gautier
     */
    public function getAllVeterinaries():array{
        $veterinaries = [];
        $request = $this->execRequest("SELECT u.* FROM utilisateurs u INNER JOIN veterinaire v ON u.id_utilisateur = v.id_utilisateur;");
        while($donnees = $request->fetch(PDO::FETCH_ASSOC)){
            $veterinaries[] = new User($donnees);
        }
        return $veterinaries;
    }

    /**
     * Récupérer la liste de tous les clients
     * @return  array Le tableau avec tous les clients dedans 
     * @author BAYARD Gautier
     */
    public function getAllClients():array{
        $clients = [];
        $request = $this->execRequest("SELECT u.* FROM utilisateurs u INNER JOIN client c ON u.id_utilisateur = c.id_utilisateur;");
        while($donnees = $request->fetch(PDO::FETCH_ASSOC)){
            $clients[] = new User($donnees);
        }
        return $clients;
    }

    /**
     * Permet de réaliser l'insertion d'un rendez-vous dans la base de données
     * @param array $donnees Les données du rendez-vous provenant du formulaire.
     * @author BAYARD Gautier
     */
    public function insertrdv(array $donnees){
        $userManager = new UserManager();
        $animalManager = new AnimalManager();

        $params = [];
        $params[] = $donnees["moment"]->format('Y-m-d H:i:s'); 
        $params[] = $donnees["statut"];                         
        $params[] = $donnees["motif"];             
        $params[] = $animalManager->getAnimalIDByName($donnees["animal"]);            
        $params[] = $_SESSION["id_Utilisateur"];            
        $params[] = $userManager->getIdUtilisateurByNom($donnees["nom_Utilisateur"]);

        $this->execRequest("insert into rendez_vous (moment, statut, motif, id_animal, id_utilisateur, id_utilisateur_1) values (?,?,?,?,?,?)", $params);
    }

    /**
     * Permets l'obtention de tout les rendez-vous d'un utilisateur
     * @return array Liste de rdv
     * @author BAYARD Gautier
     */
    public function getAllRDV(): array {
        $allRDV = [];
    
        $sql = "SELECT * FROM rendez_vous WHERE id_utilisateur = :idUtilisateur OR id_utilisateur_1 = :idUtilisateur";
        $request = $this->execRequest($sql, ['idUtilisateur' => $_SESSION["id_Utilisateur"]]);

    
        while ($donnees = $request->fetch(PDO::FETCH_ASSOC)) {
            $allRDV[] = new rdv($donnees);
        }
    
        return $allRDV;
    }

    /**
     * Permet d'avoir l'identifiant d'un utilisateur avec son nom
     * @param string $nom_Utilisateur Nom de l'utilisateur voulu
     * @return int L'identifiant de l'utilisateur ou null
     * @author BAYARD Gautier
     */
    public function getIdUtilisateurByNom(string $nom_Utilisateur): ?int {
        $request = $this->execRequest("SELECT u.id_utilisateur FROM utilisateurs u WHERE u.nom = ?", [$nom_Utilisateur]);
        $result = $request->fetch(PDO::FETCH_ASSOC);
        return $result ? intval($result['id_utilisateur']) : null;
    }

    /**
     * Mets à jour la messagerie dans la bdd
     * @author BOUTET Clement
     */
    public function envoyerMessage(array $data):void{
        $params = [];
        $params[] = $data["id"];
        $params[] = $data["message"];
        $params[] = $data["date"];
        $params[] = $data["idUtilisateur"];
        $params[] = $data["idDestinataire"];
        $this->execRequest("insert into messages (idMessage,contenu,date,idUtilisateur,idDestinataire) values (?,?,?,?,?)",$params);
    }

    /**
     * Obtenir les messages d'une discussion afin de les afficher
     * @return array Liste des messages 
     * @author BAYARD Gautier
     */
    public function getMessagesDiscussion():array{
        $messages = [];
        if(isset($_SESSION["idDestinataire"])){
            $_SESSION["messages"] = [];
            $request = $this->execRequest(
                "select * from messages where (idUtilisateur = ? and idDestinataire = ?) or (idUtilisateur = ? and idDestinataire = ?) order by date asc ",
                [$_SESSION["idUtilisateur"], $_SESSION["idDestinataire"],$_SESSION["idDestinataire"],$_SESSION["idUtilisateur"]]
            );
            while($donnees = $request->fetch(PDO::FETCH_ASSOC)){
                $data["idMessage"] = $donnees["idMessage"];
                $data["contenu"] = $donnees["contenu"];
                $data["date"] = new DateTime($donnees["date"]);
                $data["idUtilisateur"] = $donnees["idUtilisateur"];
                $data["idDestinataire"] = $donnees["idDestinataire"];
                $message = new Message($data);
                $messages[] = $message;
            }
            
        }
        return $messages;
        
    }
}
?>