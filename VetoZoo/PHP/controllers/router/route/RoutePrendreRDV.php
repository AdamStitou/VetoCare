<?php
require_once("controllers/router/Route.php");
require_once("controllers/UserController.php");

/**
 * Classe représentant la route de prise de rdv (vue client)
 * @author @AdamSTITOU @ImraneSAHAB
 */
class RoutePrendreRDV extends Route{
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
        $this->controller->displayprendrerdv();
    }

    protected function post(array $params=[]){
        $statut = "En cours";
        $data = [
            "date" => parent::getParam($params, "NiceDate", false),
            "heure" => parent::getParam($params, "heure", false),
            "statut" => $statut,
            "motif" => parent::getParam($params, "motif", false),
            "animal" => parent::getParam($params, "animaux", false), 
            "nom_Utilisateur" => parent::getParam($params, "vetoTitre", false)
        ];
        $this->controller->prendrerdv($data);
    }
}


?>