<?php

class Message{
    private int $idMessage;
    private string $contenu;
    private DateTime $date;
    private int $idUtilisateur;
    private int $idDestinataire;

    public function __construct(array $donnees){
        $this->hydrate($donnees);
    }

    public function getIdMessage(): int {
        return $this->idMessage;
    }

    public function setIdMessage(int $id): void {
        $this->idMessage = $id;
    }

    public function getContenu(): string {
        return $this->contenu;
    }

    public function setContenu(string $contenu): void {
        $this->contenu = $contenu;
    }


    public function getDate(): DateTime {
        return $this->date;
    }

    public function setDate(DateTime $date): void {
        $this->date = $date;
    }

    public function getIdUtilisateur(): int {
        return $this->idUtilisateur;
    }

    public function setIdUtilisateur(int $idUtilisateur): void {
        $this->idUtilisateur = $idUtilisateur;
    }


    public function getIdDestinataire(): int {
        return $this->idDestinataire;
    }

    public function setIdDestinataire(int $idDestinataire): void {
        $this->idDestinataire = $idDestinataire;
    }

    public function hydrate(array $donnees){
        foreach($donnees as $key => $value){
            $method = 'set'.ucfirst($key);
            if(method_exists($this,$method)){
                $this->$method($value);
            }
        }
    }


}

?>