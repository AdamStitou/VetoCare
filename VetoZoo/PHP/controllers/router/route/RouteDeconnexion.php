<?php
require_once("controllers/router/Route.php");
require_once("controllers/UserController.php");

/**
 * Classe qui représente les routes de l'action déconnexion
 * @author Clément Boutet
 */
class RouteDeconnexion extends Route{
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
        $this->controller->deconnexion();
    }

    protected function post(array $params=[]){

    }
}
?>