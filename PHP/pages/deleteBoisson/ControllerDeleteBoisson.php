<?php
    include_once("/DAO/CommandeManager.php");
    include_once("/DAO/TacosManager.php");
    include_once("/DAO/TacosViandeManager.php");
    include_once("/DAO/TacosSauceManager.php");
    include_once("/DAO/ViandeManager.php");
    include_once("/DAO/SauceManager.php");
    include_once("/DTO/Tacos.php");
    include_once("/DTO/Commande.php");
    include_once("/DAO/CommandeTacosManager.php");
    include_once("/DAO/CommandeBoissonManager.php");

    class ControllerDeleteBoisson
    {
        public static function includeView()
        {
            include_once("/pages/deleteBoisson/deleteBoisson.php");
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