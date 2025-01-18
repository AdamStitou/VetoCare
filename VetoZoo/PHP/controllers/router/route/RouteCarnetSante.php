<?php
require_once("controllers/router/Route.php");
require_once("controllers/AnimalController.php");

/**
 * Classe représentant la route du carnet de santé d'un client ( vue client)
 * @author @gautierbayard
 */
class RouteCarnetSante extends Route{
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
        $this->controller->displayCarnetSante();
    }

    protected function post(array $params=[]){
        $idanimal = intval($_SESSION['id_Animal']);
        $data = array(
            'observations' => $_POST['observations'],
        );
        $this->controller->clientUpdateAnimal($idanimal, $data);
    }
}


?>