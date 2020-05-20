<?php
    include_once("/DAO/BoissonManager.php");
    include_once("/DTO/CommandeBoisson.php");
    include_once("/DAO/CommandeBoissonManager.php");

    class ControllerChoixBoisson
    {
        public static function includeView()
        {
            include_once("/pages/choixBoisson/choixBoisson.php");
        }
        
        public static function redirectPanier()
        {
            header('Location: index.php?page=panier');
            exit;
        }
        
        
        public static function getBoissons()
        {
            $tabBoissons = BoissonManager::findAllBoissons();
            return $tabBoissons;
        }
        
        
        public static function boissonSession()//insertion dans la commandeBoisson ?
        {
            //prof : mettre en session un tableau 
            //$tabBoissons = array();
            
            $idBoisson = null;
            $quantiteBoisson = null; //utiles ??? 
            
            unset($_SESSION["idBoisson"]);
            unset($_SESSION["quantiteBoisson"]);
            $boissonSessionIsSet = false;
            
            if(!empty($_POST["liste-boisson-quantite"]) && !empty($_POST["idBoisson"])) // ou isset
            {
                $quantiteBoisson = $_POST["liste-boisson-quantite"];
                $idBoisson = $_POST["idBoisson"];
                
                $_SESSION["idBoisson"] = $idBoisson;
                $_SESSION["quantiteBoisson"] = $quantiteBoisson;

                $boissonSessionIsSet = true;
            }
            
            return $boissonSessionIsSet;
        }
        

    }
    
?>
