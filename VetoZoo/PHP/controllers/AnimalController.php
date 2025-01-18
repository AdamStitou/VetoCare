<?php
require_once("views/View.php");
require_once("models/AnimalManager.php");

/**
 * Contrôleur pour la gestion des animaux.
 * @author @gautierbayard
 */
class AnimalController {

    /**
     * Gère l'ajout d'un nouvel animal à la base de données.
     * @param array $donnees Les données de l'animal provenant du formulaire.
     * @author @gautierbayard
     */
    public function insertAnimal(array $donnees) {
        $animalManager = new AnimalManager();

        // Initialise les données non présentes dans le formulaire
        $donnees['num_identification'] = $donnees['num_identification'] ?? '';
        $donnees['assurance'] = $donnees['assurance'] ?? 0;
        $donnees['robe'] = $donnees['robe'] ?? '';
        $donnees['pedigre'] = $donnees['pedigre'] ?? '';
        $donnees['idNaissance'] = $donnees['id_naissance'] ?? '';
        $donnees['id_Utilisateur'] = $_SESSION['id_Utilisateur'];
        $donnees['photo'] = $donnees['photo'] ?? null;
        
        $animalManager->insertAnimal($donnees);
    }
 
    /**
     * Afficher la page contenant les animaux du client
     * @author @gautierbayard
     */
    public function displayMesAnimaux(){
        $mesAnimauxView = new View("MesAnimaux");
        $animalManager = new AnimalManager();
        $allAnimals = $animalManager->getAllAnimals();
        $mesAnimauxView->generer(["allAnimals"=>$allAnimals]);
    }

    /**
     * Afficher la page du carnet de santé de son animal
     * @author @gautierbayard
     */
    public function displayCarnetSante(){
        $monCarnetView = new View("MonAnimal");
        $monCarnetView->generer([]);
    }

    /**
     * Afficher la page du carnet de santé de l'animal d'un client
     * @author @gautierbayard
     */
    public function displayCarnetAnimalClient(){
        $CarnetAnimalClientView = new View("AnimalClient");
        $CarnetAnimalClientView->generer([]);
    }

    /**
     * Afficher les animaux d'un client
     * @author @gautierbayard
     */
    public function displayAnimauxClient(){
        $AnimauxDuClientsView = new View("AnimauxClient");
        $AnimauxDuClientsView->generer([]);
    }

    /**
     * Permet la création d'un carnet de santé pour le dernier animal créer par un utilisateur 
     * @author @gautierbayard
     */
    public function createCarnet(array $data){
        $animalManager = new AnimalManager();
    
        // Initialisation des données
        $donnees = []; 
        $donnees['traitement'] = $donnees['traitement'] ?? '';
        $donnees['date_traitement'] = date('0000-00-00'); 
        $donnees['produit_traitement'] = ''; 
        $donnees['signes'] = '';
        $donnees['observations'] = ""; 
        $donnees['vermifugation'] = 0; 
        $donnees['date_vermifugation'] = date('0000-00-00');
        $donnees['produit_vermifugation'] = '';
        $donnees['reference_aliment'] = '';
        $donnees['quantite_aliment'] = 0;
        $donnees['isDepiste'] = 0;
        $donnees['date_depistage'] = date('0000-00-00');
        $donnees['date_naissance'] = date('0000-00-00');
        $donnees['nom_vaccin'] = "";
        $donnees['date_vaccin'] = date('0000-00-00');    
        $donnees['id_Utilisateur'] = $_SESSION['id_Utilisateur'];

        // Envoie des données au manager
        $animalManager->insertCarnet($donnees);
        
        $indexView = new View("Index");
        $indexView->generer(["confirmation"=>"L'ajout de l'animal s'est déroulée avec succès !"]);
    }

    /**
     * Mettre à jour les données de l'animal d'un client
     * @author @gautierbayard
     */
    public function updateAnimal($idanimal, $data) {
        $CarnetAnimalClientView = new View("AnimalClient");
        $animalManager = new AnimalManager();
        $animalManager->updateAnimal($idanimal, $data);
        $CarnetAnimalClientView->generer(["confirmation"=>"La modification de l'animal s'est déroulée avec succès !"]);
    }

    /**
     * Mettre à jour les problèmes connus sur son animal
     * @author @gautierbayard
     */
    public function clientUpdateAnimal($idanimal, $data){
        $carnetAnimalView = new View("MonAnimal");
        $animalManager = new AnimalManager();
        $animalManager->clientUpdateAnimal($idanimal, $data);
        $carnetAnimalView->generer(["confirmation"=>"La modification de l'animal s'est déroulée avec succès !"]);
    }
}

?>