<?php
require_once("Model.php");
require_once("Animal.php");

/**
 * Classe permettant de gérer toutes les fonctions concernant les Animaux 
 * @gautierbayard
 */ 
class AnimalManager extends Model{

    /**
     * Permet de récupérer tous les Animaux de l'utilisateur connecté en base deonnée
     * @return array Un tableau contenant animaux de l'utilisateur connecté dans la base de données
     * @author gautierbayard
     */
    public function getAllAnimals():array{
        $animals = [];
        $request = $this->execRequest("SELECT * from animal WHERE id_Utilisateur='" . $_SESSION['id_Utilisateur'] . "';");
        while($donnees = $request->fetch(PDO::FETCH_ASSOC)){
            $animals[] = new Animal($donnees);
        }
        return $animals;
    }

    /**
     * Permet de récupérer tous les Animaux d'un client que le vétérinaire a séléctionné
     * @return array Un tableau contenant animaux du client 
     * @param int $clientAnimalId identifiant de l'animal du client séléctionné
     * @author gautierbayard
     */    
    public function getAnimauxDuClients(int $clientAnimalId):array{
        $animals = [];
        $request = $this->execRequest("SELECT * from animal WHERE id_Utilisateur='" . $clientAnimalId . "';");
        while($donnees = $request->fetch(PDO::FETCH_ASSOC)){
            $animals[] = new Animal($donnees);
        }
        return $animals;
    }

    /**
     * Permet de récupérer l'identifiant d'un animal avec son nom
     * @return int Renvoie l'identifiant du client
     * @param string $nomAnimal Nom de l'animal séléctionné
     * @author gautierbayard
     */  
    public function getAnimalIDByName(string $nomAnimal): ?int {
        $id = null;
        $request = $this->execRequest("SELECT id_animal FROM animal WHERE id_Utilisateur = ? AND nom = ?", [$_SESSION['id_Utilisateur'], $nomAnimal]);

        $id = $request->fetchColumn();
        return $id !== false ? (int)$id : null;
    }

    /**
     * Permet de récupérer un animal spécifique du client connecté en base de données grace à son identifiant.
     * @param int $id_animal L'identifiant de l'animal 
     * @return Animal Un tableau contenant l'animal spécifié par l'utilisateur dans la base de données.
     * @author gautierbayard
     */
    public function getThisAnimalBy_ID(int $id_animal): Animal {
        $request = $this->execRequest("SELECT * FROM animal WHERE id_Utilisateur = ? AND id_animal = ?", [$_SESSION['id_Utilisateur'], $id_animal]);

        if ($donnees = $request->fetch(PDO::FETCH_ASSOC)) {
            return new Animal($donnees);
        }

        return null;
    }

    /**
     * Permet de récupérer un animal spécifique du client connecté en base de données grace à son identifiant.
     * @param int $id_animal L'identifiant de l'animal 
     * @return Animal Un tableau contenant l'animal spécifié par l'utilisateur dans la base de données.
     * @author gautierbayard
     */
    public function getAnimal(int $id_animal): Animal {
    $request = $this->execRequest("SELECT * FROM animal WHERE id_animal = ?", [$id_animal]);

        if ($donnees = $request->fetch(PDO::FETCH_ASSOC)) {
            return new Animal($donnees);
        }

        return null;
    }


    /**
     * Permet de réaliser l'insertion d'un animal dans la base de données
     * @param array $donnees Les données de l'animal provenant du formulaire.
     * @author gautierbayard
     */
    public function insertAnimal(array $donnees){
        $params = [];
        $params[] = $donnees["nom"];
        $params[] = $donnees["espece"];
        $params[] = $donnees["genre"];
        $params[] = $donnees["race"];
        $params[] = $donnees["robe"];
        $params[] = $donnees["num_identification"];
        $params[] = $donnees["poids"];
        $params[] = $donnees["sterile"];
        $params[] = $donnees["assurance"];
        $params[] = $donnees["pedigre"];
        $params[] = $donnees["id_Utilisateur"];
        $params[] = $donnees["photo"];

        $this->execRequest("insert into animal (nom, espece, genre, race, robe, num_identification, poids, sterile, assurance, pedigre, id_Utilisateur, photo) values (?,?,?,?,?,?,?,?,?,?,?,?)", $params);
}
    
    /**
     * Création du carnet de santé du dernier animal créer par l'utilisateur connecté
     * @param array $donnees Les donnees importantes pour la création d'un carnet de santé
     * @author gautierbayard
     */
    public function insertCarnet(array $donnees){

        // Création de la requête sql afin d'avoir le dernier animal créé
        $sql = "SELECT id_animal FROM animal WHERE id_Utilisateur = ? ORDER BY id_animal DESC LIMIT 1";
        // Envoie de la requête et stocke les informations du dernier animal
        $request = $this->execRequest($sql, [$_SESSION['id_Utilisateur']]);

        // Si la requête est bien réalisé, insère les données dans $params afin de créer le carnet
        if ($request) {
            $result = $request->fetch(PDO::FETCH_ASSOC);
            if ($result && isset($result['id_animal'])) {
                $id_animal = $result['id_animal'];

                $params = [];
                $params[] = $donnees['traitement'];
                $params[] = $id_animal;
                $params[] = $donnees['date_traitement'];
                $params[] = $donnees['produit_traitement'];
                $params[] = $donnees['signes'];
                $params[] = $donnees['observations'];
                $params[] = $donnees['vermifugation'];
                $params[] = $donnees['date_vermifugation'];
                $params[] = $donnees['produit_vermifugation'];
                $params[] = $donnees['reference_aliment'];
                $params[] = $donnees['quantite_aliment'];
                $params[] = $donnees['isDepiste'];
                $params[] = $donnees['date_depistage'];
                $params[] = $donnees['date_naissance'];
                $params[] = $donnees['nom_vaccin'];
                $params[] = $donnees['date_vaccin'];

                $this->execRequest("INSERT INTO carnet_de_sante (traitement, id_animal, date_traitement, produit_traitement, signes, observations, vermifugation, date_vermifugation, produit_vermifugation, reference_aliment, quantite_aliment, isDepiste, date_depistage, date_naissance, nom_vaccin, date_vaccin) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)", $params);
            }
        } 
    }

    /**
     * Récupère le nom du propriétaire d'un animal à partir de son nom.
     * @param string $nomAnimal Le nom de l'animal.
     * @return ?string Retourne le nom du propriétaire s'il existe, sinon retourne null.
     * @author gautierbayard
    */
    public function getNomProprietaireByNomAnimal(string $nomAnimal): ?string {
        $nomProprietaire = "Introuvable";
        $query = "SELECT U.nom FROM Utilisateurs U JOIN Animal A ON U.id_utilisateur = A.id_utilisateur WHERE A.nom = ?";

        $request = $this->execRequest($query, [$nomAnimal]);
    
        if ($donnees = $request->fetch(PDO::FETCH_ASSOC)) {
            $nomProprietaire = $donnees['nom'];
        }
        return $nomProprietaire;
    }

    /**
     * Récupère les informations du carnet de l'animal voulu
     * @param int $id_animal L'identifiant de l'animal 
     * @return CarnetSante Retourne les informations du carnet de santé d'un animal
     * @author gautierbayard
    */
    public function getCarnetByAnimalID(int $id_animal): CarnetSante {
        $request = $this->execRequest("SELECT * FROM carnet_de_sante WHERE id_animal =?", [$id_animal]);

        if ($donnees = $request->fetch(PDO::FETCH_ASSOC)) {
            return new CarnetSante($donnees);
        }
        return null;
    }

    /**
     * Récupère le prénom du propriétaire d'un animal à partir du nom de son animal.
     * @param string $nomAnimal Le nom de l'animal.
     * @return string Retourne le nom du propriétaire s'il existe, sinon retourne null.
     * @author gautierbayard
    */
    public function getPrenomProprietaireByNomAnimal(string $nomAnimal): ?string {
        $prenomProprietaire = "Introuvable";

        $request = $this->execRequest("SELECT U.prenom FROM Utilisateurs U JOIN Animal A ON U.id_utilisateur = A.id_utilisateur WHERE A.nom = ?", [$nomAnimal]);

        if ($donnees = $request->fetch(PDO::FETCH_ASSOC)) {
            $prenomProprietaire = $donnees['prenom'];
        }
        return $prenomProprietaire;
    } 

    /**
     * Collecte toutes les informations devant être présente dans la page du carnet de l'animal 
     * @param int $id_animal L'identifiant de l'animal
     * @return array Retourne toutes les données initialisées si non trouvé dans la bdd
     * @author gautierbayard
    */
    public function getAllCarnetAnimal(int $id_animal): array {
        if ($_SESSION["isVeterinaire"]){
            $animalData = $this->getAnimal($id_animal);
            $carnetData = $this->getCarnetByAnimalID($id_animal);            
        } else{
            $animalData = $this->getThisAnimalBy_ID($id_animal);
            $carnetData = $this->getCarnetByAnimalID($id_animal);
        }
        $animalManager = new AnimalManager();

        $carnetInfo = array(
            'nom_proprio' => $animalManager->getNomProprietaireByNomAnimal($animalData->getNom()),
            'prenom_proprio' => $animalManager->getPrenomProprietaireByNomAnimal($animalData->getNom()),
            'nom' => $animalData->getNom() ?? "",
            'date_naissance' => $animalData->getDate_Naissance() ?? date('0000-00-00'), 
            'sexe' => $animalData->getGenre() ?? "",
            'sterile' => $animalData->getSterile() ?? 0,
            'espece' => $animalData->getEspece() ?? "",
            'robe' => $animalData->getRobe() ?? "",
            'race' => $animalData->getRace() ?? "",
            'assure' => $animalData->getAssurance() ?? 0,
            'signes' => $carnetData->getSignes() ?? "", 
            'observations' => $carnetData->getObservations() ?? "",
            'pedigre' => $animalData->getPedigre() ?? "",
            'depistage' => $carnetData->getIsDepiste() ?? 0, 
            'date_depistage' => $carnetData->getDate_Depistage() ?? date('0000-00-00'),
            'nom_vaccin' => $carnetData->getNom_Vaccin() ?? "",
            'date_vaccin' => $carnetData->getDate_Vaccin() ?? date('0000-00-00'),
            'injection_vaccin' => $carnetData->getDate_Vaccin() ?? 'null',
            'vermifugation' => $carnetData->getVermifugation() ?? 0,
            'date_vermifugation' => $carnetData->getDate_Vermifugation() ?? date('0000-00-00'),
            'produit_vermufigation' => $carnetData->getProduit_Vermifugation() ?? "",
            'traitement' => $carnetData->getTraitement() ?? "",
            'date_traitement' => $carnetData->getDate_Traitement() ?? date('0000-00-00'),
            'produit_traitement' => $carnetData->getProduit_Traitement() ?? "",
            'reference_aliment' => $carnetData->getReference_Aliment() ?? "",
            'quantite_aliment' => $carnetData->getQuantite_Aliment() ?? 0,
            'photo' =>  $animalData->getPhoto() ?? null
        );

        return $carnetInfo;
    }

    /**
     * Collecte toutes les informations devant être présente dans la page du carnet de l'animal 
     * @param int $id_animal L'identifiant de l'animal
     * @return array Retourne toutes les données initialisées si non trouvé dans la bdd
     * @author gautierbayard
    */
    public function updateAnimal($idanimal, $data) {
        $animalManager = new AnimalManager();
        $animalData = $this->getAnimal(intval($idanimal));
        $carnetData = $this->getCarnetByAnimalID(intval($idanimal));
        
        // Préparation pour la modification des valeurs dans la bdd de l'animal
        $animalData->setNom($data["nom"]);
        $animalData->setDate_Naissance($data["date_naissance"]);
        $animalData->setGenre($data["sexe"]);
        $animalData->setSterile($data["sterile"]);
        $animalData->setEspece($data["espece"]);
        $animalData->setRobe($data["robe"]);
        $animalData->setRace($data["race"]);
        $animalData->setAssurance($data["assure"]);
        $animalData->setPedigre($data["pedigre"]);
        
        // Préparation pour la modification des valeurs dans la bdd du carnet de santé
        $carnetData->setSignes($data["signes"]);
        $carnetData->setIsDepiste($data["depistage"]);
        $carnetData->setDate_Depistage($data["date_depistage"]);
        $carnetData->setNom_Vaccin($data["nom_vaccin"]);
        $carnetData->setDate_Vaccin($data["date_vaccin"]);
        $carnetData->setVermifugation($data["vermifugation"]);
        $carnetData->setDate_Vermifugation($data["date_vermifugation"]);
        $carnetData->setProduit_Vermifugation($data["produit_vermifugation"]);
        $carnetData->setTraitement($data["traitement"]);
        $carnetData->setDate_Traitement($data["date_traitement"]);
        $carnetData->setProduit_Traitement($data["produit_traitement"]);
        $carnetData->setReference_Aliment($data["reference_aliment"]);
        $carnetData->setQuantite_Aliment($data["quantite_aliment"]);

        // Gestion de l'animal
        $query1 = "UPDATE animal SET 
            nom = :nom,
            date_naissance = :date_naissance,
            genre = :genre,
            espece = :espece,
            race = :race,
            robe = :robe,
            sterile = :sterile,
            assurance = :assurance
        WHERE id_animal = :id_animal";
        $params1 = [
            ':nom' => $animalData->getNom(),
            ':date_naissance' => $animalData->getDate_Naissance()->format('Y-m-d'),
            ':genre' => $animalData->getGenre(),
            ':espece' => $animalData->getEspece(),
            ':race' => $animalData->getRace(),
            ':robe' => $animalData->getRobe(),
            ':sterile' => $data["sterile"] == '1' ? 1 : 0,
            ':assurance' => $data["assure"] == '1' ? 1 : 0,
            ':id_animal' => $idanimal
        ];
        $this->execRequest($query1, $params1);

        // Gestion de carnet de l'animal
        $query2 = "UPDATE carnet_de_sante SET 
                    signes = :signes,
                    vermifugation = :vermifugation,
                    date_vermifugation = :date_vermifugation,
                    produit_vermifugation = :produit_vermifugation,
                    traitement = :traitement,
                    date_traitement = :date_traitement,
                    produit_traitement = :produit_traitement,
                    reference_aliment = :reference_aliment,
                    quantite_aliment = :quantite_aliment,
                    isDepiste = :isDepiste,
                    date_depistage = :date_depistage,
                    nom_vaccin = :nom_vaccin,
                    date_vaccin = :date_vaccin
            WHERE id_carnet = :id_carnet";

        $params2 = [
            ':signes' => $carnetData->getSignes(),
            ':vermifugation' => $carnetData->getVermifugation(),
            ':date_vermifugation' => $carnetData->getDate_Vermifugation()->format('Y-m-d'),
            ':produit_vermifugation' => $carnetData->getProduit_Vermifugation(),
            ':traitement' => $carnetData->getTraitement(),
            ':date_traitement' => $carnetData->getDate_Traitement()->format('Y-m-d'),
            ':produit_traitement' => $carnetData->getProduit_Traitement(),
            ':reference_aliment' => $carnetData->getReference_Aliment(),
            ':quantite_aliment' => $carnetData->getQuantite_Aliment(),
            ':isDepiste' => $carnetData->getIsDepiste(),
            ':date_depistage' => $carnetData->getDate_Depistage()->format('Y-m-d'),
            ':nom_vaccin' => $carnetData->getNom_Vaccin(),
            ':date_vaccin' => $carnetData->getDate_Vaccin()->format('Y-m-d'),
            ':id_carnet' => $carnetData->getId_Carnet()
        ];

        // Exécution de la requête
        $this->execRequest($query2, $params2);
    }

    /**
     * Ajuster la base de données en fonction de ce que modifie le client dans le champs "observations" afin d'en avertir le vétérinaire
     * @author BAYARD Gautier
     */
    public function clientUpdateAnimal($idanimal, $data){
        $carnetData = $this->getCarnetByAnimalID(intval($idanimal));

        // Préparation pour la modification des valeurs dans la bdd du carnet de santé
        $carnetData->setObservations($data["observations"]);

        // Gestion de carnet de l'animal
        $query = "UPDATE carnet_de_sante SET observations = :observations WHERE id_carnet = :id_carnet";

        $params = [
            ':observations' => $carnetData->getObservations(),
            ':id_carnet' => $carnetData->getId_Carnet()
        ];

        // Exécution de la requête
        $this->execRequest($query, $params);
    }

}
?>