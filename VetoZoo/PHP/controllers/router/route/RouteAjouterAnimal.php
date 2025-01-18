<?php
require_once("controllers/router/Route.php");
require_once("controllers/AnimalController.php");

/**
 * Classe qui représente les routes de la création d'un animal
 * @author gautierbayard
 */
class RouteAjouterAnimal extends Route{
    
    private AnimalController $controller;


    /**
     * Constructeur de la classe
     * @param $controller Controller que l'on utilisera dans cette route
    */
    public function __construct($controller)
    {
        $this->controller = $controller;
    }

    
    protected function get(array $params=[]){
    }
    
    /**
     * Récupération des données envoyés par le formulaire afin de créer un animal et son carnet de santé.
     * @param array $params=[] Informations transmises par le formulaire de création d'un animal
     * @gautierbayard
     */
    protected function post(array $params=[]){

        $data = [
            "nom" => parent::getParam($params, "nomAnimal", false),
            "espece" => parent::getParam($params, "especeAnimal", false),
            "genre" => parent::getParam($params, "genreAnimal", false),
            "race" => parent::getParam($params, "raceAnimal", false),
            "poids" => parent::getParam($params, "poidsAnimal", false),
            "sterile" => parent::getParam($params, "sterileAnimal", false),
        ];
        // Transformation des données du formulaire false|true en 0|1 afin de les insérés dans la bdd
        if ($data["sterile"]='non'){
            $data["sterile"]= $data["sterile"] = 0;
        }else {$data["sterile"]= $data["sterile"] = 1;}

        $this->controller->insertAnimal($data);   
        $this->controller->createCarnet($data);
    }
}
?>