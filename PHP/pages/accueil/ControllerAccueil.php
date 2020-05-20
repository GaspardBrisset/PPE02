<?php
    include_once("/DAO/TypeTacosManager.php");
    include_once("/DAO/ViandeManager.php");
    include_once("/DAO/SauceManager.php");
    include_once("/DAO/BoissonManager.php");

    class ControllerAccueil
    {
        public static function includeView()
        {
            include_once("/pages/accueil/accueil.php");
        }
        
        public static function redirectTacos()
        {
            header('Location: index.php?page=choixTacos');
            exit;
        }
        
        public static function getTypesTacos()
        {
            $tabTypesTacos = TypeTacosManager::findAllTypeTacos();
            return $tabTypesTacos;
        }
        
        public static function getViandes()
        {
            $tabViandes = ViandeManager::findAllViandes();
            return $tabViandes;
        }
        
        public static function getSauces()
        {
            $tabSauces = SauceManager::findAllSauces();
            return $tabSauces;
        }
        
        public static function getBoissons()
        {
            $tabBoissons = BoissonManager::findAllBoissons();
            return $tabBoissons;
        }
    }
    

?>