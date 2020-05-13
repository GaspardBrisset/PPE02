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
        
        public static function typeTacosSession()
        {
            $idTypeTacos = null;
            
            unset($_SESSION["idTypeTacos"]);
            
            $typeTacosIsSet = false;
            
            if(!empty($_POST["button-choix-taille"])) // ou isset
            {
                $idTypeTacos = $_POST["button-choix-taille"];
                $_SESSION["idTypeTacos"] = $idTypeTacos;
                
                $typeTacosIsSet = true;
            }
            
            return $typeTacosIsSet;
        }
    }
    
?>