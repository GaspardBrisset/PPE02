<?php

    class ControllerPresentationTacos
    {
        public static function includeView()
        {
            include_once("/pages/presentationTacos/presentationTacos.php");
        }
        
        public static function redirectUser()
        {
            header('Location: index.php?page=choixTacos');
            exit;
        }
    }
    
?>