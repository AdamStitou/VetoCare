<?php
require_once("PHP/models/Animal.php");
use PHPUnit\Framework\TestCase;

/**
 * Tests unitaires de la création d'un Animal
 * @gautierbayard
 */
class AnimalTest extends TestCase{
    private string $nom;
    private string $espece;
    private string $genre;
    private string $race;
    private string $num_identification;
    private float $poids;
    private bool $sterile;
    private bool $assurance;
    private string $pedigre;   

    /**
     * Test de l'ajout / modification du nom
     */
    public function testNom():void{
        $animal = new Animal([
            "nom" => "Puppy",
            "espece" => "chient",
            "genre" => "Masculin",
            "race" => "Golden Retreiver",
            "num_identification" => "1234ABCD",
            "poids" => "21.00",
            "sterile" => "1",
            "assurance" => "1",
            "pedigre" => "",
        ]);
        $this->assertSame($animal->getNom(),"Puppy");
        $animal->setNom("Luffy");
        $this->assertSame($animal->getNom(),"Luffy");
    }

    /**
     * Test de l'ajout / modification de l'espèce
     */
    public function testEspece():void{
        $animal = new Animal([
            "nom" => "Puppy",
            "espece" => "chient",
            "genre" => "Masculin",
            "race" => "Golden Retreiver",
            "num_identification" => "1234ABCD",
            "poids" => "21.00",
            "sterile" => "1",
            "assurance" => "1",
            "pedigre" => "",
        ]);
        $this->assertSame($animal->getEspece(),"chient");
        $animal->setEspece("Lapin");
        $this->assertSame($animal->getEspece(),"Lapin");
    }

    /**
     * Test de l'ajout / modification du genre
     */
    public function testGenre():void{
        $animal = new Animal([
            "nom" => "Puppy",
            "espece" => "chient",
            "genre" => "Masculin",
            "race" => "Golden Retreiver",
            "num_identification" => "1234ABCD",
            "poids" => "21.00",
            "sterile" => "1",
            "assurance" => "1",
            "pedigre" => "",
        ]);
        $this->assertSame($animal->getGenre(),"Masculin");
        $animal->setGenre("Feminin");
        $this->assertSame($animal->getGenre(),"Feminin");
    }

    /**
     * Test de l'ajout / modification de la race
     */
    public function testRace():void{
        $animal = new Animal([
            "nom" => "Puppy",
            "espece" => "chient",
            "genre" => "Masculin",
            "race" => "Golden Retreiver",
            "num_identification" => "1234ABCD",
            "poids" => "21.00",
            "sterile" => "1",
            "assurance" => "1",
            "pedigre" => "",
        ]);
        $this->assertSame($animal->getRace(),"Golden Retreiver");
        $animal->setRace("Chiwawa");
        $this->assertSame($animal->getRace(),"Chiwawa");
    }

    /**
     * Test de l'ajout / modification du Numéro d'identification
     */
    public function testNumIdentification():void{
        $animal = new Animal([
            "nom" => "Puppy",
            "espece" => "chient",
            "genre" => "Masculin",
            "race" => "Golden Retreiver",
            "num_identification" => "jbrjr",
            "poids" => "21.00",
            "sterile" => "1",
            "assurance" => "1",
            "pedigre" => "",
        ]);
        $this->assertSame($animal->getNum_identification(),"jbrjr");
        $animal->setNum_identification("abcd0000");
        $this->assertSame($animal->getNum_identification(),"abcd0000");
    }

    /**
     * Test de l'ajout / modification du poids 
     */
    public function testPoids():void{
        $animal = new Animal([
            "nom" => "Puppy",
            "espece" => "chient",
            "genre" => "Masculin",
            "race" => "Golden Retreiver",
            "num_identification" => "1234ABCD",
            "poids" => "21.00",
            "sterile" => "1",
            "assurance" => "1",
            "pedigre" => "",
        ]);
        $this->assertSame($animal->getPoids(),(float)21);
        $animal->setPoids("10.00");
        $this->assertSame($animal->getPoids(),(float)10);
    }

    /**
     * Test de l'ajout / modification de la stérilité de l'animal
     */
    public function testSterile():void{
        $animal = new Animal([
            "nom" => "Puppy",
            "espece" => "chient",
            "genre" => "Masculin",
            "race" => "Golden Retreiver",
            "num_identification" => "1234ABCD",
            "poids" => "21.00",
            "sterile" => "1",
            "assurance" => "1",
            "pedigre" => "",
        ]);
        $this->assertSame($animal->getSterile(),true);
        $animal->setSterile("0");
        $this->assertSame($animal->getSterile(),false);
    }

    /**
     * Test de l'ajout / modification de l'assurance
     */
    public function testAssurance():void{
        $animal = new Animal([
            "nom" => "Puppy",
            "espece" => "chient",
            "genre" => "Masculin",
            "race" => "Golden Retreiver",
            "num_identification" => "1234ABCD",
            "poids" => "21.00",
            "sterile" => "1",
            "assurance" => "1",
            "pedigre" => "",
        ]);
        $this->assertSame($animal->getAssurance(),true);
        $animal->setAssurance("0");
        $this->assertSame($animal->getAssurance(),false);
    }

    /**
     * Test de l'ajout / modification du Pedigre
     */
    public function testPedigre():void{
        $animal = new Animal([
            "nom" => "Puppy",
            "espece" => "chient",
            "genre" => "Masculin",
            "race" => "Golden Retreiver",
            "num_identification" => "1234ABCD",
            "poids" => "21.00",
            "sterile" => "1",
            "assurance" => "1",
            "pedigre" => "",
        ]);
        $this->assertSame($animal->getPedigre(),"");
        $animal->setPedigre("JeSuis");
        $this->assertSame($animal->getPedigre(),"JeSuis");
    }

    
}
?>