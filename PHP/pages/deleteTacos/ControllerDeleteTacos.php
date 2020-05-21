<?php
    include_once("../PHP/DAO/CommandeManager.php");
    include_once("../PHP/DAO/TacosManager.php");
    include_once("../PHP/DAO/TacosViandeManager.php");
    include_once("../PHP/DAO/TacosSauceManager.php");
    include_once("../PHP/DAO/ViandeManager.php");
    include_once("../PHP/DAO/SauceManager.php");
    include_once("../PHP/DTO/Tacos.php");
    include_once("../PHP/DTO/Commande.php");
    include_once("../PHP/DAO/CommandeTacosManager.php");
    include_once("../PHP/DAO/CommandeBoissonManager.php");

    class ControllerDeleteTacos
    {
        public static function includeView()
        {
            include_once("deleteTacos.php");
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
            
            $tacos = CommandeTacosManager::findTacosWithCommandeAndTacos($_SESSION["idCommande"], $idTacos);
            
            if($tacos==null)
            {
                $tacosInCommandeIsDeleted = true;
            }
            
            return $tacosInCommandeIsDeleted;
        }
    }
?>
