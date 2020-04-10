<?php

    class ControllerChoixTacos
    {
        public static function includeView()
        {
            include_once("/pages/choixTacos/choixTacos.php");
        }
        
        public static function redirectUser()
        {
            header('Location: index.php?page=choixTacos');
            exit;
        }
    }
    
?>