<?php
require_once("controllers/router/Route.php");
require_once("controllers/UserController.php");

/**
 * Classe représentant la route des rdv d'un utilisateur
 * @author @AdamSTITOU 
 */
class RouteMesRDV extends Route{
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
        $this->controller->displayMesRDV();
    }

    protected function post(array $params=[]){
    }
}


?>