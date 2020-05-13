<?php
    include_once("/DAO/CommandeManager.php");
    include_once("/DAO/TacosManager.php");
    include_once("/DTO/Tacos.php");

    class ControllerPanier
    {
        public static function includeView()
        {
            include_once("/pages/panier/ControllerPanier.php");
        }
        
        public static function insertTacos()
        {
            $tacos = new Tacos();
            
            $idTypeTacos = $_SESSION["idTypeTacos"];
            $tacos->setIdTypeTacos($idTypeTacos);
            
            TacosManager::insertTacos($tacos); 
        }
        
        public static function insertCommandeTacos()
        {
            $commande = new CommandeTacos();   
        }
        
        public static function insertTacosViande($idTacos)
        {
            $tacos = TacosManager::findTacos($idTacos);
            
            $idTacosViande = $idTacos;
            $idViande1 = $_SESSION["idViande1"];
            $idViande2 = $_SESSION["idViande2"];
            $idViande3 = $_SESSION["idViande3"];
            $quantiteViande1 = 0;
            $quantiteViande2 = 0;
            $quantiteViande3 = 0;

            
            $viande1 = ViandeManager::findViande($idViande1);
            $viande2 = ViandeManager::findViande($idViande2);
            $viande3 = ViandeManager::findViande($idViande3);
            
            if($tacos->getIdTypeTacos()==1)
            {
                $quantiteViande1 = 1;
                
                $tacosViande = new TacosViande();
                $tacosViande->setIdTacos($idTacos);
                $tacosViande->setIdViande($idViande1);
                $tacosViande->setQuantite($quantiteViande1);
            }
            else if($tacos->getIdTypeTacos()==2) //rajouter newTacosViande
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
            else if($tacos->getIdTypeTacos()==3) //rajouter newTacosViande
            {
                if($viande1->getIdViande()==$viande2->getIdViande() || $viande1->getIdViande()==$viande3->getIdViande() || $viande2->getIdViande()==$viande3->getIdViande() ) 
                {                   
                    if($viande1->getIdViande()!=$viande2->getIdViande() || $viande1->getIdViande()!=$viande3->getIdViande() || $viande2->getIdViande()!=$viande3->getIdViande()) //1=2=3
                    {
                        $quantiteViande1 = 2;
                        $quantiteViande2 = 1;
                    }
                    else //1=2=3
                    {
                        $quantiteViande1 = 3;
                    }
                }
                else
                {
                    $quantiteViande1 = 1;
                    $quantiteViande2 = 1;
                    $quantiteViande3 = 1;
                }
            }
            
            
            
        }
    }
?>