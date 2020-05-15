<?php
    include_once("/DAO/BoissonManager.php");

    class ControllerChoixBoisson
    {
            
        public static function includeView()
        {
            include_once("/pages/choixBoisson/choixBoisson.php");
        }
        
        public static function getBoissons()
        {
            $tabBoissons = BoissonManager::findAllBoissons();
            return $tabBoissons;
        }
    }
?>
