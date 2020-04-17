<?php
    include_once("/DAO/TypeTacosManager.php");

    class ControllerChoixTacos
    {
            
        public static function includeView()
        {
            include_once("/pages/choixTacos/choixTacos.php");
        }
        
        public static function getTypesTacos()
        {
            $tabTypesTacos = TypeTacosManager::findAllTypeTacos();
            return $tabTypesTacos;
        }
        
        public static function redirectViande()
        {
            header('Location: index.php?page=choixViande');
            exit;
        }
    }
    
?>