<?php
/**
 * @author Clément Boutet
 */
require_once("controllers/router/Router.php");
$router = new Router();

if (isset($_SESSION['start']) && (time() - $_SESSION['start'] > 1800)) {
    session_unset(); 
    session_destroy(); 
}

$_SESSION['start'] = time();
$userIsLoggedIn = isset($_SESSION['userIsLoggedIn']) && $_SESSION['userIsLoggedIn'] === false;
$router->routing($_GET, $_POST);
?>