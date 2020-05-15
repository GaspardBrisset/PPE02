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
        
        
        public static function insertCommandeBoisson($idCommandeSession)
        {
            $commandeBoissonIsSet = false;

            $idBoisson = $_SESSION["idBoisson"];
            $quantiteBoisson = $_SESSION["quantiteBoisson"];
            
            $commandeBoisson = new CommandeBoisson();
            $commandeBoisson->setIdCommande($idCommandeSession);
            $commandeBoisson->setIdBoisson($idBoisson);
            $commandeBoisson->setQuantite($quantiteBoisson);
   
            CommandeBoissonManager::insertCommandeBoisson($commandeBoisson);
            
            if(sizeof(CommandeTacosManager::findBoissonsWithCommande($idCommandeSession))>0)
            {
                $commandeBoissonIsSet = true;
            }
            
            return $commandeBoissonIsSet;
        }
        
        public static function boissonIsAlreadySet()
        {
            //si la boisson est déjà insérée dans la commande, on ajoute la nouvelle quantité à l'ancienne quantité
        }
    }
    
 
?>
