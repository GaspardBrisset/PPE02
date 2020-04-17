<?php
    include_once("/DAO/ViandeManager.php");

    class ControllerChoixViande
    {
            
        public static function includeView()
        {
            include_once("/pages/choixViande/choixViande.php");
        }
        
        public static function getViandes()
        {
            $tabViandes = ViandeManager::findAllViandes();
            return $tabViandes;
        }
        
        public static function redirectSauce()
        {
            header('Location: index.php?page=choixSauce');
            exit;
        }
    }
    
?>