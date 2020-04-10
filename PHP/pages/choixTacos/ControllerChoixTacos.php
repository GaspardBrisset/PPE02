<?php

    class ControllerChoixTacos
    {
        public static function includeView()
        {
            include_once("/pages/choixTacos/choixTacos.php");
        }
        
        public static function getTypeTacos()
        {
            
        }
        
        public static function redirectViande()
        {
            header('Location: index.php?page=choixViande');
            exit;
        }
    }
    
?>