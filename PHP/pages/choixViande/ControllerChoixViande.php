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
        
        public static function tailleTacosSession()
        {   
            $idTypeTacos = null;
            
            if(!empty($_POST["button-choix-taille"])) // ou isset
            {
                $idTypeTacos = $_POST["button-choix-taille"];
                $_SESSION["idTypeTacos"] = $idTypeTacos; //vérifier si $_SESSION["idTypeTacos"] est bien supprimé et récrée à chaque fois
            }
            
            return $idTypeTacos;
        }
    }
    
?>