<?php
require_once("controllers/router/Route.php");
require_once("controllers/MainController.php");

/**
 * Classe qui représente les routes de l'action index
 * @author Clément Boutet
 */
class RouteIndex extends Route{
    private MainController $controller;


    /**
     * Constructeur de la classe
     * @param $controller Controller que l'on utilisera
    */
    public function __construct($controller)
    {
        $this->controller = $controller;
    }

    protected function get(array $params=[]){
        if(isset($_SESSION["id_Utilisateur"])){
            $this->controller->index();
        }
        else{
            header("Location: index.php");
        }
        
    }

    protected function post(array $params=[]){

    }
}
?>