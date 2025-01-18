<?php
require_once("controllers/router/Route.php");
require_once("controllers/UserController.php");

/**
 * Classe représentant la route des clients d'un vétérinaire (vue vétérinaire)
 * @author @AdamSTITOU @gautierbayard
 */
class RouteMesClients extends Route{
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
        $this->controller->displayMesClients();
    }

    protected function post(array $params=[]){
    }
}


?>