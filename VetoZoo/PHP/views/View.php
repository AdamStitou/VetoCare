<?php
session_start();
/**
 * Classe qui permet de gérer les vues de l'application
 * @author Clément Boutet
 */
class View{
    private string $fichier;
    private string $titre;

    /**
     * Créé une instance de View
     * @param string $action Action que l'on veut réaliser, permet de déterminer le fichier associé
     */
    public function __construct(string $action)
    {
        $this->fichier = "views/vue".$action.".php";
        $this->titre = $action;
    }

    /**
     * Permet de générer et d'afficher la vue
     * @param array $donnees Correspond aux données que l'on souhaite afficher
     */
    public function generer(array $donnees):void{
        // Génération de la partie spécifique de la vue
        $contenu = $this->genererFichier($this->fichier, $donnees);
        // Génération du gabarit commun utilisant la partie spécifique
        $vue = $this->genererFichier('views/gabarit.php',
        array('titre' => $this->titre, 'contenu' => $contenu));
        // Renvoi de la vue au navigateur
        echo $vue;

    }

    private function genererFichier(string $fichier, array $donnees){
        if (file_exists($fichier)) {
            // Rend les éléments du tableau $donnees accessibles dans la vue
            // Voir la documentation de extract
            extract($donnees);
            // Démarrage de la temporisation de sortie
            ob_start();
            // Inclut le fichier vue
            // Son résultat est placé dans le tampon de sortie
            require $fichier;
            // Arrêt de la temporisation et renvoi du tampon de sortie
            return ob_get_clean();
          }
          else {
            throw new Exception("Fichier '$fichier' introuvable");
          }
    }
}
?>