<?php
require_once("controllers/MainController.php");
require_once("controllers/UserController.php");
require_once("controllers/AnimalController.php");


foreach(glob("controllers/router/route/*.php") as $file){
    require_once($file);
}

/**
 * Classe permettant d'appeler les bonnes méthodes en fonction de la route dans l'URL
 * @author Clément Boutet
 */
class Router{
    private array $routeList;
    private array $controllerList;

    /**
     * Constructeur de la classe
     */
    public function __construct()
    {
        $this->createControllerList();
        $this->createRouteList();
    }

    private function createControllerList():void{
        $this->controllerList["main"] = new MainController();
        $this->controllerList["user"] = new UserController();
        $this->controllerList["animal"] = new AnimalController();
    }
    
    private function createRouteList():void{
        $this->routeList["index"] = new RouteIndex($this->controllerList["main"]);
        $this->routeList["connexion"] = new RouteConnexion($this->controllerList["user"]);
        $this->routeList["inscription"]= new RouteInscription($this->controllerList["user"]);
        $this->routeList["insertAnimal"] = new RouteAjouterAnimal($this->controllerList["animal"]);
        $this->routeList["mesAnimaux"] = new RouteMesAnimaux($this->controllerList["animal"]);
        $this->routeList["monAnimal"] = new RouteCarnetSante($this->controllerList["animal"]);
        $this->routeList["deconnexion"] = new RouteDeconnexion($this->controllerList["user"]);
        $this->routeList["messagerie"] = new RouteMessagerie($this->controllerList["user"]);
        $this->routeList["rdv"] = new RoutePrendreRDV($this->controllerList["user"]);
        $this->routeList["mesRDV"] = new RouteMesRDV($this->controllerList["user"]);
        $this->routeList["mesClients"] = new RouteMesClients($this->controllerList["user"]);
        $this->routeList["animauxClient"] = new RouteAnimauxClient($this->controllerList["animal"]);
        $this->routeList["animalClient"] = new RouteCarnetAnimalClient($this->controllerList["animal"]);
    }

    /**
     * Permet de vérifier les données dans $_POST et $_GET et d'exécuter les méthodes en conséquence
     * @param array $get Contenu de $_GET
     * @param array $post Contenu de $_POST
     */
    public function routing(array $get, array $post):void{
        if(empty($post)){
            if(isset($get["action"]) && isset($this->routeList[$get["action"]])){
                $this->routeList[$get["action"]]->action();
            }else{
                if(isset($_SESSION["id_Utilisateur"])){
                    $this->routeList["index"]->action();
                }else{
                    $this->routeList["connexion"]->action();
                }
                
            }
        }else{
            $this->routeList[$get["action"]]->action($post, 'POST');
        }
    }


}
?>