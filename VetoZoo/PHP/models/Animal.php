<?php
/**
 * Classe regroupant toutes les informations d'un animal
 * @gautierbayard
 */ 
class Animal{
    private string $proprietaire;
    private int $id_animal;
    private string $nom;
    private string $espece;
    private string $genre;
    private string $race;
    private string $robe;
    private string $num_identification;
    private float $poids;
    private bool $sterile;
    private bool $assurance;
    private string $pedigre;    
    private ?string $photo;
    private ?DateTime $date_naissance;

    // Getter pour le propriétaire de l'animal
    public function getProprietaire(): string {
        return $this->proprietaire;
    }

    // Setter pour le propriétaire de l'animal
    public function setProprietaire(string $proprietaire): void {
        $this->proprietaire = $proprietaire;
    }

    // Getter pour l'id_animal
    public function getId_Animal(): string {
        return $this->id_animal;
    }

    // Setter pour l'id_animal
    public function setId_Animal(string $id_animal): void {
        $this->id_animal = $id_animal;
    }

    // Getter pour le nom
    public function getNom(): string {
        return $this->nom;
    }

    // Setter pour le nom
    public function setNom(string $nom): void {
        $this->nom = $nom;
    }

    // Getter pour l'espece
    public function getEspece(): string {
        return $this->espece;
    }

    // Setter pour l'espece
    public function setEspece(string $espece): void {
        $this->espece = $espece;
    }

    // Getter pour le genre
    public function getGenre(): string {
        return $this->genre;
    }

    // Setter pour le genre
    public function setGenre(string $genre): void {
        $this->genre = $genre;
    }

    // Getter pour la race
    public function getRace(): string {
        return $this->race;
    }

    // Setter pour la race
    public function setRace(string $race): void {
        $this->race = $race;
    }

    // Getter pour le numéro d'identification
    public function getNum_identification(): string {
        return $this->num_identification;
    }

    // Getter pour la robe
    public function getRobe(): string {
        return $this->robe;
    }

    // Setter pour la robe
    public function setRobe(string $robe): void {
        $this->robe = $robe;
    }       

    // Setter pour le numéro d'identification
    public function setNum_identification(string $num_identification): void {
        $this->num_identification = $num_identification;
    }

    // Getter pour le poids
    public function getPoids(): float {
        return $this->poids;
    }

    // Setter pour le poids
    public function setPoids(float $poids): void {
        $this->poids = $poids;
    }
    // Getter pour la stérilité 
    public function getSterile(): bool {
        return $this->sterile;
    }

    // Setter pour la stérilité 
    public function setSterile(bool $sterile): void {
        $this->sterile = $sterile;
    }
    // Getter pour l'assurance
    public function getAssurance(): bool {
        return $this->assurance;
    }

    // Setter pour l'assurance
    public function setAssurance(bool $assurance): void {
        $this->assurance = $assurance;
    }

    // Getter pour le pedigre
    public function getPedigre(): string {
        return $this->pedigre;
    }

    // Setter pour le pedigre
    public function setPedigre(string $pedigre): void {
        $this->pedigre = $pedigre;
    }
    
    // Getter pour la date de naissance de l'animal
    public function getDate_Naissance(): ?DateTime {
        return $this->date_naissance;
    }
    
    // Setter pour la date de naissance de l'animal
    public function setDate_Naissance(?string $date_naissance): void {
        $this->date_naissance = new DateTime($date_naissance);
    }

    // Getter pour la photo de l'animal
    public function getPhoto(): ?string {
        return $this->photo;
    }

    // Setter pour la photo 
    public function setPhoto(?string $photo): void {
        $this->photo = $photo;
    }

    public function __construct(array $donnees){
        $this->hydrate($donnees);
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

    /**
     * Classe regrouppant toutes les informations d'un Carnet de santé, ses getter et ses setters
     * @autor @gautierbayard
    */
class CarnetSante{
    private int $idCarnet;
    private string $traitement;
    private int $idClient;
    private int $idAnimal;
    private DateTime $date_traitement;
    private string $produit_traitement;
    private string $signes;
    private string $observations;
    private bool $vermifugation;
    private DateTime $date_vermifugation;
    private string $produit_vermifugation;
    private string $reference_aliment;
    private float $quantite_aliment;
    private bool $isDepiste;
    private DateTime $date_depistage;
    private string $nom_vaccin;
    private DateTime $date_vaccin;

    // Getter pour l'id du carnet
    public function getId_Carnet(): int {
        return $this->idCarnet;
    }
    
    // Setter pour l'id du carnet
    public function setId_Carnet(int $id_Carnet): void {
        $this->idCarnet = $id_Carnet;
    }

    // Getter pour le traitement de l'animal
    public function getTraitement(): string {
        return $this->traitement;
    }
    
    // Setter pour le traitement de l'animal
    public function setTraitement(string $traitement): void {
        $this->traitement = $traitement;
    }

    // Getter pour l'id client
    public function getId_Client(): int {
        return $this->idClient;
    }
    
    // Setter pour l'id client
    public function setId_Client(int $id_client): void {
        $this->idClient = $id_client;
    }

    // Getter pour l'id de l'animal
    public function getId_Animal(): int {
        return $this->idAnimal;
    }
    
    // Setter pour l'id de l'animal
    public function setId_Animal(int $id_animal): void {
        $this->idAnimal = $id_animal;
    }

    // Getter pour la date du traitement de l'animal
    public function getDate_Traitement(): DateTime {
        return $this->date_traitement;
    }
    
    // Setter pour la date du traitement de l'animal
    public function setDate_Traitement(?string $date_traitement): void {
        $this->date_traitement = new DateTime($date_traitement);
    }    

    // Getter pour le produit de traitement de l'animal
    public function getProduit_Traitement(): string {
        return $this->produit_traitement;
    }
    
    // Setter pour le produit de traitement de l'animal
    public function setProduit_Traitement(?string $produit_traitement): void {
        $this->produit_traitement = $produit_traitement;
    }

    // Getter pour les signes de l'animal
    public function getSignes(): string {
        return $this->signes;
    }
    
    // Setter pour les signes de l'animal
    public function setSignes(?string $signes): void {
        $this->signes = $signes;
    }

    // Getter pour les observations du client sur l'animal
    public function getObservations(): string {
        return $this->observations;
    }
    
    // Setter pour les observations du client sur l'animal
    public function setObservations(?string $observations): void {
        $this->observations = $observations;
    }

    // Getter pour la vermifugation de l'animal
    public function getVermifugation(): bool {
        return $this->vermifugation;
    }
    
    // Setter pour la vermifugation de l'animal
    public function setVermifugation(?bool $vermifugation): void {
        $this->vermifugation = $vermifugation;
    }

// Si vous voyez ce message, envoyer un mail à gautier.bayard@iut-dijon.-ubourgogne.fr

    // Getter pour la date du traitement de l'animal
    public function getDate_Vermifugation(): DateTime {
        return $this->date_vermifugation;
    }
    
    // Setter pour la date du traitement de l'animal
    public function setDate_Vermifugation(?string $date_vermifugation): void {
        $this->date_vermifugation = new DateTime($date_vermifugation);
    }    

    // Getter pour le produit de la vermifugation de l'animal
    public function getProduit_Vermifugation(): string {
        return $this->produit_vermifugation;
    }
    
    // Setter pour le produit de la vermifugation de l'animal
    public function setProduit_Vermifugation(?string $produit_vermifugation): void {
        $this->produit_vermifugation = $produit_vermifugation;
    }

    // Getter pour la référence de l'aliment de l'animal 
    public function getReference_Aliment(): string {
        return $this->reference_aliment;
    }
    
    // Setter pour la référence de l'aliment de l'animal
    public function setReference_Aliment(?string $reference_aliment): void {
        $this->reference_aliment = $reference_aliment;
    }

    // Getter pour la quantité de l'aliment de l'animal
    public function getQuantite_Aliment(): float {
        return $this->quantite_aliment;
    }
    
    // Setter pour la quantité de l'aliment de l'animal
    public function setQuantite_Aliment(?float $quantite_aliment): void {
        $this->quantite_aliment = $quantite_aliment;
    }

    // Getter pour le depistage de l'animal
    public function getIsDepiste(): bool {
        return $this->isDepiste;
    }
    
    // Setter pour le depistage de l'animal
    public function setIsDepiste(?bool $isDepiste): void {
        $this->isDepiste = $isDepiste;
    }

    // Getter pour la date de dépistage de l'animal
    public function getDate_Depistage(): DateTime {
        return $this->date_depistage;
    }
    
    // Setter pour la date de dépistage de l'animal
    public function setDate_Depistage(?string $date_depistage): void {
        $this->date_depistage = new DateTime($date_depistage);
    }

    // Getter pour le nom du vaccin de l'animal
    public function getNom_Vaccin(): string {
        return $this->nom_vaccin;
    }
    
    // Setter pour le nom du vaccin l'animal
    public function setNom_Vaccin(?string $nom_vaccin): void {
        if ($nom_vaccin !== null) {
            $this->nom_vaccin = $nom_vaccin;
        }
    }    

    // Getter pour la date de vaccin de l'animal
    public function getDate_Vaccin(): DateTime {
        return $this->date_vaccin;
    }
    
    // Setter pour la date de vaccin de l'animal
    public function setDate_Vaccin(?string $date_vaccin): void {
        $this->date_vaccin = new DateTime($date_vaccin);
    }    

    public function __construct(array $donnees){
        $this->nom_vaccin = "";
        $this->date_vermifugation = new DateTime(2020-10-12);
        $this->hydrate($donnees);
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