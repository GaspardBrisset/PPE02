<?php

    include_once("/tools/DatabaseLinker.php");
    //include_once("/DTO/Tacos.php");
    include_once("/DTO/TacosViande.php");

    class TacosViandeManager
    {
        public static function insertTacosViande($tacosViande)
        {
            $connex = DatabaseLinker::getConnexion();

            $state=$connex->prepare("INSERT INTO TacosViande(idTacos, idViande, quantite) VALUES (?, ?, ?)");

            $idTacos = $tacosViande->getIdTacos();
            $idViande = $tacosViande->getIdViande();
            $quantite = $tacosViande->getQuantite();

            $state->bindParam(1,$idTacos);
            $state->bindParam(2,$idViande);
            $state->bindParam(3,$quantite);

            $state->execute();           
        }
        
        public static function findViandesWithTacos($idTacos)
        {
            $tabViandes = array();
            
            $connex = DatabaseLinker::getConnexion();
            
            $state = $connex->prepare("SELECT idViande FROM TacosViande WHERE idTacos=?");
            
            $state->bindParam(1,$idTacos);
            
            $state->execute();
            
            $resultats = $state->fetchAll();
            
            foreach($resultats as $result)
            {
                $viande = ViandeManager::findViande($result["idViande"]);
                $tabViandes[] = $viande;
            }
            
            return $tabViandes;
        }
        
        public static function findTacosViandeWithTacos($idTacos)
        {
            $connex = DatabaseLinker::getConnexion();
            $tacosViande = null;
            
            $state = $connex->prepare("SELECT * FROM TacosViande WHERE idTacos=?");
            $state->bindParam(1,$idTacos);
            
            $state->execute();
                        
            $resultats = $state->fetchAll();
                    
            if(sizeof($resultats)>0)
            {
                $result = $resultats[0];
                $tacosViande = new TacosViande(); 
                
                $tacosViande->setIdTacos($result["idTacos"]);
                $tacosViande->setIdViande($result["idViande"]);
                $tacosViande->setQuantite($result["quantite"]);
            }
            
            return $tacosViande;
        }
        
        public static function findQuantiteWithViandeAndTacos($idTacos, $idViande)
        {
            $connex = DatabaseLinker::getConnexion();
            $quantite = null;
            $tacosViande = null;
            
            $state = $connex->prepare("SELECT * FROM TacosViande WHERE idTacos=? AND idViande=?");
            
            $state->bindParam(1,$idTacos);
            $state->bindParam(2,$idViande);
            
            $state->execute();
            
            $resultats = $state->fetchAll();
                    
            if(sizeof($resultats)>0)
            {
                $result = $resultats[0];
                $tacosViande = new TacosViande(); 
                
                $tacosViande->setIdTacos($result["idTacos"]);
                $tacosViande->setIdViande($result["idViande"]);
                $tacosViande->setQuantite($result["quantite"]);
                
                $quantite = $tacosViande->getQuantite();
            }
            
            return $quantite;
        }
    }
?>