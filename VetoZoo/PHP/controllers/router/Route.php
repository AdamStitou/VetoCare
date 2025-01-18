<?php

/**
 * Classe qui représente les routes dans l'URL
 * @author Clément Boutet
 */
abstract class Route{

    /**
     * Apelle la méthode correspondante suivant si la requête est de type get ou post
     * @param array $params Eventuels données de la requêtes
     * @param string $method Methode de la requête
     */
    public function action(array $params = [], string $method = 'GET'):void{
        if($method == 'GET'){
            $this->get($params);
        }
        else if($method == 'POST'){
            $this->post($params);
        }
    }

    protected function getParam(array $array, string $paramName, bool $canBeEmpty=true)
    {
        if (isset($array[$paramName])) {
            if(!$canBeEmpty && empty($array[$paramName]))
                throw new Exception("Paramètre '$paramName' vide");
            return $array[$paramName];
        } else
            throw new Exception("Paramètre '$paramName' absent");
    }

    protected abstract function get(array $params = []);
    protected abstract function post(array $params = []);
}
?>