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
        
        public static function SaucesSession() //mettre dans le controller de viande
        {   
            //prof : mettre en session un tableau avec les sauces
            
            $idSauce1 = null;
            $idSauce2 = null;

            unset($_SESSION["idSauce1"]);
            unset($_SESSION["idSauce2"]);
            
            $sauceSessionIsSet = false;
            
            if(!empty($_POST["button-choix-sauce1"])) // ou isset
            {
                $idSauce1 = $_POST["button-choix-sauce1"];
                $_SESSION["idSauce1"] = $idSauce1; 
                
                $sauceSessionIsSet = true;
                
                if(!empty($_POST["button-choix-sauce2"])) // ou isset
                {
                    $idSauce2 = $_POST["button-choix-sauce2"];
                    $_SESSION["idSauce2"] = $idSauce2; 
                }
            }
            
            return $sauceSessionIsSet;
        }
        
    }
    
?>