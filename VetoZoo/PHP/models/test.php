<?php
require_once("Message.php");


$data = [
    "idMessage" => 1,
    "contenu"=>"hello",
    "date"=>new DateTime(), 
    "idUtilisateur"=>2, 
    "idDestinataire"=>3
];
$message = new Message($data);

$_SESSION["message"][] = serialize($message);

echo(gettype(unserialize($_SESSION["message"][0])));
?>