<?php
require_once("controllers/router/Route.php");
require_once("controllers/UserController.php");

/**
 * Classe qui représente les routes de l'action connexion
 * @author Clément Boutet
 */
class RouteConnexion extends Route{
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
        $this->controller->displayConnexion();
    }

    protected function post(array $params=[]){
        session_unset();
        session_destroy();
        $data = [
            "id"=> 0,
            "email" => parent::getParam($params, "email", false),
            "motDePasse" => parent::getParam($params, "motDePasse", false)
        ];
        $this->controller->connexion($data);
    }
}
?>