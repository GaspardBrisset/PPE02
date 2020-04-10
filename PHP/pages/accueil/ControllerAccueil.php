<?php


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
    }
    

?>