<?php
require_once("controllers/router/Route.php");
require_once("controllers/UserController.php");

/**
 * Classe représentant la route des animaux d'un client (vue client)
 * @author Clément Boutet
 */
class RouteMesAnimaux extends Route{
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
        $this->controller->displayMesAnimaux();
    }

    protected function post(array $params=[]){
    }
}


?>