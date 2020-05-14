<?php
    include_once("/DAO/CommandeManager.php");
    include_once("/DAO/TacosManager.php");
    include_once("/DAO/TacosViandeManager.php");
    include_once("/DAO/TacosSauceManager.php");
    include_once("/DAO/ViandeManager.php");
    include_once("/DAO/SauceManager.php");
    include_once("/DTO/Tacos.php");

    class ControllerPanier
    {
        public static function includeView()
        {
            include_once("/pages/panier/panier.php");
        }
        
        public static function insertTacos($idTypeTacosSession)
        {
            $tacos = new Tacos();
            
            $tacos->setIdTypeTacos($idTypeTacosSession);
            
            TacosManager::insertTacos($tacos);
            
            $tacos = TacosManager::findLastTacos();
            return $tacos;
        }
        
        public static function insertCommandeTacos()
        {
            //$commande = new CommandeTacos();   
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
        
        public static function GetSaucesWithTacos($idTacosSauce)
        {
            $tabSauces = TacosSauceManager::findSaucesWithTacos($idTacosSauce);
            return $tabSauces;
        }
    }
?>