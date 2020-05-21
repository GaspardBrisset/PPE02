<?php
    include_once("../PHP/DAO/SauceManager.php");

    class ControllerChoixSauce
    {
        public static function includeView()
        {
            include_once("choixSauce.php");
        }
        
        public static function getSauces()
        {
            $tabSauces = SauceManager::findAllSauces();
            return $tabSauces;
        }
        
        public static function redirectPanier()
        {
            header('Location: index.php?page=panier');
            exit;
        }
        
        public static function SaucesSession() 
        {   
            
            $idSauce1 = null;
            $idSauce2 = null;

            unset($_SESSION["idSauce1"]);
            unset($_SESSION["idSauce2"]);
            
            $sauceSessionIsSet = false;
            
            if(!empty($_POST["button-choix-sauce1"])) 
            {
                $idSauce1 = $_POST["button-choix-sauce1"];
                $_SESSION["idSauce1"] = $idSauce1; 
                
                $sauceSessionIsSet = true;
                
                if(!empty($_POST["button-choix-sauce2"])) 
                {
                    $idSauce2 = $_POST["button-choix-sauce2"];
                    $_SESSION["idSauce2"] = $idSauce2; 
                }
            }
            
            return $sauceSessionIsSet;
        }
        
    }
    
?>