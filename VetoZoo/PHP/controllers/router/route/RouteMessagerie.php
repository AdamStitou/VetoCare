<?php
require_once("controllers/router/Route.php");
require_once("controllers/UserController.php");

/**
 * Classe représentant la route de la messagerie 
 * @author Clément Boutet
 */
class RouteMessagerie extends Route{
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
        $this->controller->displayMessagerie();
    }
    
    protected function post(array $params=[]){
        if(!isset($_POST["idVeterinaire"])){
            $date = new DateTime(); 
            $data = [
                "id" => 0,
                "message"=> parent::getParam($params,"message",false),
                "date" => $date->format('Y-m-d H:i:s'),
                "idUtilisateur" => $_SESSION["idUtilisateur"],
                "idDestinataire" => $_SESSION["idDestinataire"]
            ];
        
            $this->controller->envoyerMessage($data);
        }
        else{
            $this->controller->displayMessagerie($params["idVeterinaire"]);
        }
        
    }
}


?>