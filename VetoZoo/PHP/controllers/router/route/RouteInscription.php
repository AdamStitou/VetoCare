<?php
require_once("controllers/router/Route.php");
require_once("controllers/UserController.php");

/**
 * Classe qui représente les routes de l'action inscription
 * @author Clément Boutet
 */
class RouteInscription extends Route{
    private UserController $controller;

    /**
     * Constructeur de la classe
     * @param $controller Controller que l'on utilisera
    */
    public function __construct($controller)
    {
        $this->controller = $controller;
    }

    
    protected function get(array $params=[]){
        $this->controller->displayInscription();
    }

    protected function post(array $params=[]){
        $data = [
            "email" => parent::getParam($params, "email", false),
            "telephone" => parent::getParam($params, "telephone", false),
            "nom" => parent::getParam($params, "nom", false),
            "prenom" => parent::getParam($params, "prenom", false),
            "motDePasse" => parent::getParam($params, "motDePasse", false),
            "ville" => parent::getParam($params, "ville", false),
            "codePostal" => parent::getParam($params, "codePostal", false),
        ];
        $this->controller->inscription($data);
    }
}
?>