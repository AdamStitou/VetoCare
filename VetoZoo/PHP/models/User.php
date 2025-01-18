<?php

/**
 * Classe qui représente un utilisateur de l'application web 
 */ 
class User{
    private int $id_utilisateur;
    private string $email;
    private string $telephone;
    private string $nom;
    private string $prenom;
    private string $ville;
    private int $codePostal;
    private string $motDePasse;
    private bool $estVeterinaire;

    /**
     * Constructeur de la classe User
     */
    public function __construct(array $donnees){
        $this->hydrate($donnees);
    }


    /**
     * Getter pour l'id
     * @return int l'id
     */
    public function getId_Utilisateur(): int {
        return $this->id_utilisateur;
    }

    /**
     * Setter pour l'id
     * @param string' $id Correspond au nouvel id
     */
    public function setId_Utilisateur(int $id_utilisateur): void {
        $this->id_utilisateur = $id_utilisateur;
    }

    /**
     * Getter pour l'email
     * @return string l'email
     */
    public function getEmail(): string {
        return $this->email;
    }

    /**
     * Setter pour l'email
     * @param string' $email Correspond au nouvel email
     */
    public function setEmail(string $email): void {
        $this->email = $email;
    }

    /**
     * Getter pour le numéro de téléphone
     * @return string le numéro de téléphone
     */ 
    public function getTelephone(): string {
        return $this->telephone;
    }

    /**
     * Setter pour le numéro de téléphone
     * @param string $telephone Correspond au nouveau numéro de téléphone
     */
    public function setTelephone(string $telephone): void {
        $this->telephone = $telephone;
    }

    /**
     * Getter pour le nom
     * @return string le nom
     */
    public function getNom(): string {
        return $this->nom;
    }

    /**
     * Setter pour le nom
     * @param string $nom Correspond au nouveau nom
     */
    public function setNom(string $nom): void {
        $this->nom = $nom;
    }

    /**
     * Getter pour le prenom
     * @return string le prenom
     */
    public function getPrenom(): string {
        return $this->prenom;
    }

    /**
     * Setter pour le prenom
     * @param string $prenom Correspond au nouveau prenom
     */
    public function setPrenom(string $prenom): void {
        $this->prenom = $prenom;
    }

    /**
     * Getter pour la ville
     * @return string la ville
     */
    public function getVille(): string {
        return $this->ville;
    }

    /**
     * Setter pour la ville
     * @param string $ville Correspond à la nouvelle ville
     */
    public function setVille(string $ville): void {
        $this->ville = $ville;
    }

    /**
     * Getter pour le code postal
     * @return int le code postal
     */
    public function getCodePostal(): int {
        return $this->codePostal;
    }

    /**
     * Setter pour le code postal
     * @param int $codePostal Correspond au nouveau code postal
     */
    public function setCodePostal(int $codePostal): void {
        $this->codePostal = $codePostal;
    }

    /**
     * Getter pour le mot de passe
     * @return string le mot de passe
     */
    public function getMotDePasse() : string{
        return $this->motDePasse;
    }

    /**
     * Setter pour le mot de passe
     * @param string $motDePasse Correspond au nouveau mot de passe
     */
    public function setMotDePasse(string $motDePasse):void{
        $this->motDePasse = $motDePasse;
    }

    /**
     * Getter pour le statut
     * @return string true si l'utilisateur est un vétérinaire, non sinon
     */
    public function getEstVeterinaire() : bool{
        return $this->estVeterinaire;
    }

    /**
     * Setter pour le statut
     * @param string $estVeterinaire correspond au statut
     */
    public function setEstVeterinaire(bool $estVeterinaire):void{
        $this->estVeterinaire = $estVeterinaire;
    }


    /**
     * Permet de créer un objet à partir d'un tableau contenant les données souhaitées
     * @param array $donnes Données de l'utilisateur
     */
    public function hydrate(array $donnees):void{
        foreach($donnees as $key => $value){
            $method = 'set'.ucfirst($key);
            if(method_exists($this,$method)){
                $this->$method($value);
            }
        }
    }
}

class rdv{
    private int $id_rdv;
    private datetime $moment;
    private string $statut;
    private string $motif;
    private int $id_utilisateur;
    private int $id_utilisateur_1;
    
    /**
     * Constructeur de la classe User
     */
    public function __construct(array $donnees){
        $this->hydrate($donnees);
    }

    /**
     * Getter pour l'identifiant du rdv
     * @return string l'identifiant du rdv
     */
    public function getId_Rdv(): int {
        return $this->id_rdv;
    }

    /**
     * Setter pour l'identifiant du rdv'
     * @param string $id_rdv Correspond au nouvel identifiant du rdv
     */
    public function setId_Rdv(int $id_rdv): void {
        $this->id_rdv = $id_rdv;
    }

    /**
     * Getter pour le moment de rdv
     * @return string le moment
     */
    public function getMoment(): datetime {
        return $this->moment;
    }

    /**
     * Setter pour le moment du rdv
     * @param string $moment Correspond à la nouvelle ville
     */
    public function setMoment(string $moment): void {
        $this->moment = new datetime($moment);
    }
    /**
     * Getter pour le motif
     * @return string le motif
     */
    public function getMotif(): string {
        return $this->motif;
    }

    /**
     * Setter pour le motif
     * @param string $motif Correspond au nouveau motif de rdv
     */
    public function setMotif(string $motif): void {
        $this->motif = $motif;
    }

    /**
     * Getter pour l'id
     * @return int l'id
     */
    public function getId_Utilisateur(): int {
        return $this->id_utilisateur;
    }

    /**
     * Setter pour l'id
     * @param string' $id_utilisateur Correspond au nouvel id
     */
    public function setId_Utilisateur(int $id_utilisateur): void {
        $this->id_utilisateur = $id_utilisateur;
    }

    /**
     * Getter pour l'id
     * @return int l'id
     */
    public function getId_Utilisateur_1(): int {
        return $this->id_utilisateur_1;
    }

    /**
     * Setter pour l'id
     * @param string' $id_utilisateur_1 Correspond au nouvel id
     */
    public function setId_Utilisateur_1(int $id_utilisateur_1): void {
        $this->id_utilisateur_1 = $id_utilisateur_1;
    }

    /**
     * Permet de créer un objet à partir d'un tableau contenant les données souhaitées
     * @param array $donnes Données de l'utilisateur
     */
    public function hydrate(array $donnees):void{
        foreach($donnees as $key => $value){
            $method = 'set'.ucfirst($key);
            if(method_exists($this,$method)){
                $this->$method($value);
            }
        }
    }
}

?>