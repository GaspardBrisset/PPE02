<?php
    include_once("/DAO/CommandeManager.php");
    include_once("/DAO/TacosManager.php");
    include_once("/DAO/TacosViandeManager.php");
    include_once("/DAO/TacosSauceManager.php");
    include_once("/DAO/ViandeManager.php");
    include_once("/DAO/SauceManager.php");
    include_once("/DTO/Tacos.php");
    include_once("/DTO/Commande.php");
    include_once("/DAO/CommandeTacosManager.php");
    include_once("/DAO/CommandeBoissonManager.php");

    class ControllerDeleteTacos
    {
        public static function includeView()
        {
            include_once("/pages/deleteTacos/deleteTacos.php");
        }
        
        public static function redirectPanier()
        {
            header('Location: index.php?page=panier');
            exit;
        }
        
        public static function deleteTacos($idTacos)
        {
            $tacosIsDeleted = false;
            TacosManager::deleteTacos($idTacos);
            
            $tacos = TacosManager::findTacos($idTacos);
            
            if($tacos==null)
            {
                $tacosIsDeleted = true;
            }
            
            return $tacosIsDeleted;
        }
        
        public static function deleteTacosAndSauce($idTacos)
        {
            $tacosSauceIsDeleted = false;
            TacosSauceManager::deleteTacosSauce($idTacos);
            
            $tabSauces = TacosSauceManager::findSaucesWithTacos($idTacos);
            
            if(empty($tabSauces))
            {
                $tacosSauceIsDeleted = true;
            }
            
            return $tacosSauceIsDeleted;
        }
        
        public static function deleteTacosAndViande($idTacos)
        {
            $tacosViandeIsDeleted = false;
            TacosViandeManager::deleteTacosViande($idTacos);
            
            $tabViandes = TacosViandeManager::findViandesWithTacos($idTacos);
            
            if(empty($tabViandes))
            {
                $tacosViandeIsDeleted = true;
            }
            
            return $tacosViandeIsDeleted;
        }
        
        public static function deleteTacosInCommande($idTacos)
        {
            $tacosInCommandeIsDeleted = false;
            CommandeTacosManager::deleteCommandeTacos($idTacos);
            //echo "idCommande : ".$_SESSION["idCommande"];
            
            $tacos = CommandeTacosManager::findTacosWithCommandeAndTacos($_SESSION["idCommande"], $idTacos);
            
            if($tacos==null)
            {
                $tacosInCommandeIsDeleted = true;
            }
            
            return $tacosInCommandeIsDeleted;
        }
    }
?>
