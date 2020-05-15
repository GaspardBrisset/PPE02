<?php
    include_once("/DAO/BoissonManager.php");

    class ControllerChoixBoisson
    {
            
        public static function includeView()
        {
            include_once("/pages/choixBoisson/choixBoisson.php");
        }
        
        public static function getBoissons()
        {
            $tabBoissons = BoissonManager::findAllBoissons();
            return $tabBoissons;
        }
        
        public static function BoissonSession()//insertion dans la commandeBoisson ?
        {
            //prof : mettre en session un tableau 
            $tabBoissons = array();
            
            $idBoisson = null;
            
            unset($_SESSION["idBoisson"]);
            
            $boissonSessionIsSet = false;
            
            if(!empty($_POST["liste-boisson-quantite"])) // ou isset
            {
                $idBoisson = $_POST["liste-boisson-quantite"];
                $_SESSION["idBoisson"] = $idBoisson; 
                
                $boisson = BoissonManager::findBoisson($_POST["idBoisson"]);
                $tabBoissons[] = $boisson;
                
                $boissonSessionIsSet = true;
            }
            
            return $boissonSessionIsSet;
        }
    }
?>
