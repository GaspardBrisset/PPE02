<?php
    include_once("../PHP/DAO/CommandeManager.php");
    include_once("../PHP/DTO/Commande.php");
    include_once("../PHP/DAO/CommandeBoissonManager.php");

    class ControllerDeleteBoisson
    {
        public static function includeView()
        {
            include_once("deleteBoisson.php");
        }
        
        public static function redirectPanier()
        {
            header('Location: index.php?page=panier');
            exit;
        }
        
        public static function deleteBoisson($idBoisson)
        {
            $boissonIsDeleted = false;
            CommandeBoissonManager::deleteBoissonInCommande($idBoisson, $_SESSION["idCommande"]);
            
            $tabBoissons = CommandeBoissonManager::findBoissonsWithCommandeAndBoisson($_SESSION["idCommande"], $idBoisson);
            
            if(empty($tabBoissons))
            {
                $boissonIsDeleted = true;
            }
            
            return $boissonIsDeleted;
        }
    }
?>