<?php
    include_once("/DAO/SauceManager.php");

    class ControllerChoixSauce
    {
            
        public static function includeView()
        {
            include_once("/pages/choixSauce/choixSauce.php");
        }
        
        public static function getSauces()
        {
            $tabSauces = SauceManager::findAllSauces();
            return $tabSauces;
        }
        
        /*
        public static function redirectSauce()
        {
            header('Location: index.php?page=choixSauce');
            exit;
        }*/
        
        /*
        public static function Viande1Session() //mettre dans le controller de viande
        {   
            $idViande1 = null;
            
            unset($_SESSION["idViande1"]);
            
            if(!empty($_POST["button-choix-viande1"])) // ou isset
            {
                $idViande1 = $_POST["button-choix-viande1"];
                $_SESSION["idViande1"] = $idViande1; 
            }
            
            return $idViande1;
        }
        
        public static function Viande2Session()
        {   
            $idViande2 = null;
            
            unset($_SESSION["idViande2"]);
            
            if(!empty($_POST["button-choix-viande2"])) // ou isset
            {
                $idViande2 = $_POST["button-choix-viande2"];
                $_SESSION["idViande2"] = $idViande2; 
            }
            
            return $idViande2;
        }
        
        public static function Viande3Session()
        {   
            $idViande3 = null;
            
            unset($_SESSION["idViande3"]);
            
            if(!empty($_POST["button-choix-viande3"])) // ou isset
            {
                $idViande3 = $_POST["button-choix-viande3"];
                $_SESSION["idViande3"] = $idViande3; 
            }
            
            return $idViande3;
        }
        
         */
    }
    
?>