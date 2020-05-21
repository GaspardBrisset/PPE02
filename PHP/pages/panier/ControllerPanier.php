<?php
    include_once("../PHP/DAO/CommandeManager.php");
    include_once("../PHP/DAO/TacosManager.php");
    include_once("../PHP/DAO/TacosViandeManager.php");
    include_once("../PHP/DAO/TypeTacosManager.php");
    include_once("../PHP/DAO/TacosSauceManager.php");
    include_once("../PHP/DAO/ViandeManager.php");
    include_once("../PHP/DAO/SauceManager.php");
    include_once("../PHP/DTO/Tacos.php");
    include_once("../PHP/DTO/Commande.php");
    include_once("../PHP/DAO/CommandeTacosManager.php");
    include_once("../PHP/DAO/CommandeBoissonManager.php");

    class ControllerPanier
    {
        public static function includeView()
        {
            include_once("panier.php");
        }
        
        
        public static function newCommande()
        {
            $commande = new Commande();
            
            CommandeManager::insertCommande($commande);
            
            $commande = CommandeManager::findLastCommande();
            $_SESSION["idCommande"] = $commande->getIdCommande();
            //return $commande;
        }
        
        
        public static function insertTacos($idTypeTacosSession)
        {
            $tacos = new Tacos();
            
            $tacos->setIdTypeTacos($idTypeTacosSession);
            
            TacosManager::insertTacos($tacos);
            
            $tacos = TacosManager::findLastTacos();
            
            return $tacos;
        }
        
        
        public static function insertCommandeTacos($idTacos)
        {
            $commandeTacosIsSet = false;
            
            $tacos = TacosManager::findTacos($idTacos);
            
            $idCommande = $_SESSION["idCommande"];
            $commande = CommandeManager::findCommande($idCommande);

            
            $commandeTacos = new CommandeTacos();
            $commandeTacos->setIdCommande($idCommande);
            $commandeTacos->setIdTacos($idTacos);
            

            CommandeTacosManager::insertCommandeTacos($commandeTacos);
            
            
            if(sizeof(CommandeTacosManager::findTacosWithCommande($idCommande))>0)
            {
                $commandeTacosIsSet = true;
            }
            
            return $commandeTacosIsSet;
        }
        
        
        public static function insertTacosViande($idTacos)
        {
            $tacosViandeIsSet = false;
            
            $tacos = TacosManager::findTacos($idTacos);
            
            $idTacosViande = $idTacos;
            $idViande1 = $_SESSION["idViande1"];
            $viande1 = ViandeManager::findViande($idViande1);
            $viande2 = null;
            $viande3 = null;
            
            if(isset($_SESSION["idViande2"]))
            {
                $idViande2 = $_SESSION["idViande2"];
                $viande2 = ViandeManager::findViande($idViande2);
            }
            
            if(isset($_SESSION["idViande3"]))
            {
                $idViande3 = $_SESSION["idViande3"];
                $viande3 = ViandeManager::findViande($idViande3);
            }
            
            $quantiteViande1 = 0;
            $quantiteViande2 = 0;
            $quantiteViande3 = 0;

            
            if($tacos->getIdTypeTacos()==1) //Taille M, 1 viande
            {
                $quantiteViande1 = 1;
            }
            else if($tacos->getIdTypeTacos()==2) //Taille L, 2 viandes
            {
                if($viande1->getIdViande()==$viande2->getIdViande())
                {
                    $quantiteViande1 = 2;
                }
                else
                {
                    $quantiteViande1 = 1;
                    $quantiteViande2 = 1;
                }
            }
            else if($tacos->getIdTypeTacos()==3) //Taille XL, 3 viandes
            {
                if($viande1->getIdViande()==$viande2->getIdViande() && $viande1->getIdViande()==$viande3->getIdViande()) //1=2=3
                {                   
                    $quantiteViande1 = 3;
                }
                else if($viande1->getIdViande()==$viande2->getIdViande() && $viande1->getIdViande()!=$viande3->getIdViande()) //3!= 1=2
                {
                    $quantiteViande1 = 2;
                    $quantiteViande3 = 1;
                }
                else if($viande1->getIdViande()!=$viande2->getIdViande() && $viande2->getIdViande()==$viande3->getIdViande()) //1!= 2=3
                {
                    $quantiteViande1 = 1;
                    $quantiteViande2 = 2;
                }
                else if($viande1->getIdViande()!=$viande2->getIdViande() && $viande1->getIdViande()==$viande3->getIdViande()) //2!= 1=3
                {
                    $quantiteViande1 = 2;
                    $quantiteViande2 = 1;
                }
                else if($viande1->getIdViande()!=$viande2->getIdViande() && $viande1->getIdViande()!=$viande3->getIdViande()) //1!=2!=3
                {
                    $quantiteViande1 = 1;
                    $quantiteViande2 = 1;
                    $quantiteViande3 = 1;
                }
            }
            
            $tacosViande1 = new TacosViande();
            $tacosViande1->setIdTacos($idTacosViande);
            $tacosViande1->setIdViande($idViande1);
            $tacosViande1->setQuantite($quantiteViande1);
            
            TacosViandeManager::insertTacosViande($tacosViande1);
            
            if($quantiteViande2>0)
            {
                $tacosViande2 = new TacosViande();
                $tacosViande2->setIdTacos($idTacosViande);
                $tacosViande2->setIdViande($idViande2);
                $tacosViande2->setQuantite($quantiteViande2);
            
                TacosViandeManager::insertTacosViande($tacosViande2);
            }
            
           if($quantiteViande3>0)
           {
                $tacosViande3 = new TacosViande();
                $tacosViande3->setIdTacos($idTacosViande);
                $tacosViande3->setIdViande($idViande3);
                $tacosViande3->setQuantite($quantiteViande3);
                
                TacosViandeManager::insertTacosViande($tacosViande3);
           }
            
            
            if(sizeof(TacosViandeManager::findViandesWithTacos($idTacosViande))>0)
            {
                $tacosViandeIsSet = true;
            }
            
            return $tacosViandeIsSet;
        }
        
        
        
        public static function GetViandesWithTacos($idTacosViande)
        {
            $tabViandes = TacosViandeManager::findViandesWithTacos($idTacosViande);
            return $tabViandes;
        }
        
        
        
        public static function insertTacosSauce($idTacos)
        {
            $tacosSauceIsSet = false;
            
            $tacos = TacosManager::findTacos($idTacos);
            
            $idTacosSauce = $idTacos;
            $idSauce1 = $_SESSION["idSauce1"];
            
            $sauce1 = SauceManager::findSauce($idSauce1);
            $sauce2 = null;
            
            if(isset($_SESSION["idSauce2"]))
            {
                $idSauce2 = $_SESSION["idSauce2"];
                $sauce2 = SauceManager::findSauce($idSauce2);
            }
            
            $quantiteSauce1 = 0;
            $quantiteSauce2 = 0;
            
            if($tacos->getIdTypeTacos()==1)
            {
                $quantiteSauce1 = 1;
            }
            else if($tacos->getIdTypeTacos()==2 || $tacos->getIdTypeTacos()==3)
            {
                if($sauce1->getIdSauce()==$sauce2->getIdSauce())
                {
                    $quantiteSauce1 = 2;
                }
                else
                {
                    $quantiteSauce1 = 1;
                    $quantiteSauce2 = 1;
                }
            }
            
            $tacosSauce1 = new TacosSauce();
            $tacosSauce1->setIdTacos($idTacosSauce);
            $tacosSauce1->setIdSauce($idSauce1);
            $tacosSauce1->setQuantite($quantiteSauce1);
            
            TacosSauceManager::insertTacosSauce($tacosSauce1);
            
            if($quantiteSauce2>0)
            {
                $tacosSauce2 = new TacosSauce();
                $tacosSauce2->setIdTacos($idTacosSauce);
                $tacosSauce2->setIdSauce($idSauce2);
                $tacosSauce2->setQuantite($quantiteSauce2);

                TacosSauceManager::insertTacosSauce($tacosSauce2);
            }
            
            if(sizeof(TacosSauceManager::findSaucesWithTacos($idTacosSauce))>0)
            {
                $tacosSauceIsSet = true;
            }
            
            return $tacosSauceIsSet;
        }
        
        public static function GetSaucesWithTacos($idTacos)
        {
            $tabSauces = TacosSauceManager::findSaucesWithTacos($idTacos);
            return $tabSauces;
        }
        
        public static function getCommande($idCommande)
        {
            $commande = CommandeManager::findCommande($idCommande);
            return $commande;
        }
        
        public static function getTacosWithCommande($idCommande)
        {
            $tabTacos = CommandeTacosManager::findTacosWithCommande($idCommande);
            return $tabTacos;
        }
        
        public static function getBoissonWithCommande($idCommande)
        {
            $tabBoissons = CommandeBoissonManager::findBoissonsWithCommande($idCommande);
            return $tabBoissons;           
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
            
            if(sizeof(CommandeBoissonManager::findBoissonsWithCommande($idCommandeSession))>0)
            {
                $commandeBoissonIsSet = true;
            }
            
            return $commandeBoissonIsSet;
        }
        
        public static function boissonIsAlreadySet($idBoisson)
        {
            //si la boisson est déjà insérée dans la commande, on ajoute la nouvelle quantité à l'ancienne quantité
            
            $tabBoissons = CommandeBoissonManager::findBoissonsWithCommande($_SESSION["idCommande"]);
            
            $boissonIsAlreadySet = false;
            
            foreach($tabBoissons as $boisson)
            {
                if($boisson->getIdBoisson()==$idBoisson)
                {
                    $boissonIsAlreadySet = true;
                }
            }
            
            return $boissonIsAlreadySet;
        }
        
        
        public static function updateQuantiteBoisson($idBoisson, $quantiteBoisson)
        {
            $commandeBoisson = CommandeBoissonManager::findCommandeBoissonWithCommandeAndBoisson($_SESSION["idCommande"], $idBoisson);
            
            $newQuantiteBoisson = $commandeBoisson->getQuantite()+$quantiteBoisson;
            $commandeBoisson->setQuantite($newQuantiteBoisson);
            CommandeBoissonManager::updateQuantiteBoisson($commandeBoisson, $_SESSION["idCommande"]);
        }
        
        public static function getTypesTacosWithTacos($idTypeTacos)
        {
            $tabTypesTacos = TypeTacosManager::findTypeTacos($idTypeTacos);
            return $tabTypesTacos; 
        }
        
        public static function getQuantiteWithViandeAndTacos($idTacos, $idViande)
        {
            $quantiteViande = TacosViandeManager::findQuantiteWithViandeAndTacos($idTacos, $idViande);
            return $quantiteViande;
        }
        
        public static function getQuantiteWithSauceAndTacos($idTacos, $idSauce)
        {
            $quantiteSauce = TacosSauceManager::findQuantiteWithSauceAndTacos($idTacos, $idSauce);
            return $quantiteSauce;
        }
        
        public static function getQuantiteWithCommandeAndBoisson($idCommande, $idBoisson)
        {
            $quantiteBoisson = CommandeBoissonManager::findQuantiteWithCommandeAndBoisson($idCommande, $idBoisson);
            return $quantiteBoisson;
        }
        
    }
?>