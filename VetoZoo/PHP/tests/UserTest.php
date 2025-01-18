<?php
require_once("PHP/models/User.php");
use PHPUnit\Framework\TestCase;

// ./vendor/bin/phpunit PHP/tests

/**
 * Test pour la classe User
 * @author Clément Boutet
 */
class UserTest extends TestCase{


    /**
     * Test les properties concernant l'attribut nom
     */
    public function testNom():void{
        $user = new User([
            "email"=>"lg@gmail.com",
            "telephone"=> "0780320584",
            "nom"=>"Gallagher",
            "prenom"=>"Liam",
            "ville"=>"Manchester",
            "codePostal"=>96,
            "motDePasse"=>"YouKnowWhatIMean"
        ]);
        $this->assertSame($user->getNom(),"Gallagher");
        $user->setNom("gallagher");
        $this->assertSame($user->getNom(),"gallagher");
    }


    /**
     * Test les properties concernant l'attribut prenom
     */
    public function testPrenom():void{
        $user = new User([
            "email"=>"lg@gmail.com",
            "telephone"=> "0780320584",
            "nom"=>"Gallagher",
            "prenom"=>"Liam",
            "ville"=>"Manchester",
            "codePostal"=>96,
            "motDePasse"=>"YouKnowWhatIMean"
        ]);
        $this->assertSame($user->getPrenom(),"Liam");
        $user->setPrenom("liam");
        $this->assertSame($user->getPrenom(),"liam");
    }


    /**
     * Test les properties concernant l'attribut email
     */
    public function testEmail():void{
        $user = new User([
            "email"=>"lg@gmail.com",
            "telephone"=> "0780320584",
            "nom"=>"Gallagher",
            "prenom"=>"Liam",
            "ville"=>"Manchester",
            "codePostal"=>96,
            "motDePasse"=>"YouKnowWhatIMean"
        ]);
        $this->assertSame($user->getEmail(),"lg@gmail.com");
        $user->setEmail("LG@gmail.com");
        $this->assertSame($user->getEmail(),"LG@gmail.com");
    }


    /**
     * Test les properties concernant l'attribut telephone
     */
    public function testTelephone():void{
        $user = new User([
            "email"=>"lg@gmail.com",
            "telephone"=> "0780320584",
            "nom"=>"Gallagher",
            "prenom"=>"Liam",
            "ville"=>"Manchester",
            "codePostal"=>96,
            "motDePasse"=>"YouKnowWhatIMean"
        ]);
        $this->assertSame($user->getTelephone(),"0780320584");
        $user->setTelephone("0000000000");
        $this->assertSame($user->getTelephone(),"0000000000");
    }


    /**
     * Test les properties concernant l'attribut ville
     */
    public function testVille():void{
        $user = new User([
            "email"=>"lg@gmail.com",
            "telephone"=> "0780320584",
            "nom"=>"Gallagher",
            "prenom"=>"Liam",
            "ville"=>"Manchester",
            "codePostal"=>96,
            "motDePasse"=>"YouKnowWhatIMean"
        ]);
        $this->assertSame($user->getVille(),"Manchester");
        $user->setVille("City");
        $this->assertSame($user->getVille(),"City");
    }


    /**
     * Test les properties concernant l'attribut code postal
     */
    public function testCodePostal():void{
        $user = new User([
            "email"=>"lg@gmail.com",
            "telephone"=> "0780320584",
            "nom"=>"Gallagher",
            "prenom"=>"Liam",
            "ville"=>"Manchester",
            "codePostal"=>96,
            "motDePasse"=>"YouKnowWhatIMean"
        ]);
        $this->assertSame($user->getCodePostal(),96);
        $user->setCodePostal(96000);
        $this->assertSame($user->getCodePostal(),96000);
    }

    /**
     * Test les properties concernant l'attribut mot de passe 
     */
    public function testMotDePasse():void{
        $user = new User([
            "email"=>"lg@gmail.com",
            "telephone"=> "0780320584",
            "nom"=>"Gallagher",
            "prenom"=>"Liam",
            "ville"=>"Manchester",
            "codePostal"=>96,
            "motDePasse"=>hash("sha256","YouKnowWhatIMean")
        ]);
        $this->assertSame($user->getMotDePasse(),hash("sha256","YouKnowWhatIMean"));
        $user->setMotDePasse(hash("sha256","C'mon"));
        $this->assertSame($user->getMotDePasse(),hash("sha256","C'mon"));
    }

    
}
?>