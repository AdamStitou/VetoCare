<?php
require_once("views/View.php");

/**
 * Classe permettant le contrôle global de l'application
 * @author Clément Boutet
 */
class MainController{
 
    /**
     * Permet d'initier la génération de l'index
     */
    public function index() : void{
        $indexView = new View("Index");
        $indexView->generer([]);
    }
}
?>