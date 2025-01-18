<?php
require_once("controllers/router/Route.php");
require_once("controllers/AnimalController.php");

/**
 * Classe représentant la route du carnet de l'animal d'un client (vue vétérinaire)
 * @author @gautierbayard
 */
class RouteCarnetAnimalClient extends Route{
    private AnimalController $controller;

    /**
     * Constructeur de la classe
     * @param $controller Controller que l'on utilisera
    */
    public function __construct($controller)
    {
        $this->controller = $controller;
    }

    
    protected function get(array $params=[]){
        $this->controller->displayCarnetAnimalClient();
    }

    protected function post(array $params=[]){
        $idanimal = intval($_SESSION['id_Animal']);
        $data = array(
            'nom' => $_POST['nom'],
            'date_naissance' => $_POST['dateNaissance'],
            'sexe' => $_POST['sexe'],
            'sterile' => $_POST['sterile'],
            'espece' => $_POST['espece'],
            'robe' => $_POST['robe'],
            'race' => $_POST['race'],
            'assure' => $_POST['assure'],
            'signes' => $_POST['signes'],
            'pedigre' => $_POST['pedigre'],
            'depistage' => $_POST['depistage'],
            'date_depistage' => $_POST['dateDepistage'],
            'nom_vaccin' => $_POST['vaccin'],
            'date_vaccin' => $_POST['dateVaccin'],
            'injection_vaccin' => $_POST['nom'],
            'vermifugation' => $_POST['vermifugation'],
            'date_vermifugation' => $_POST['dateVermifugation'],
            'produit_vermifugation' => $_POST['produitVermifugation'],
            'traitement' => $_POST['tiques'],
            'date_traitement' => $_POST['dateTiques'],
            'produit_traitement' => $_POST['produitTiques'],
            'reference_aliment' => $_POST['alimentation'],
            'quantite_aliment' => $_POST['quantiteJournaliere'],
        );
        $this->controller->updateAnimal($idanimal, $data);
    }
}


?>