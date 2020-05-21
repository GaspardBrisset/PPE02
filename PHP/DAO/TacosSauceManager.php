<?php

    include_once("../PHP/tools/DatabaseLinker.php");
    include_once("../PHP/DTO/TacosSauce.php");

    class TacosSauceManager
    {
        public static function insertTacosSauce($tacosSauce)
        {
            $connex = DatabaseLinker::getConnexion();

            $state=$connex->prepare("INSERT INTO TacosSauce(idTacos, idSauce, quantite) VALUES (?, ?, ?)");

            $idTacos = $tacosSauce->getIdTacos();
            $idSauce = $tacosSauce->getIdSauce();
            $quantite = $tacosSauce->getQuantite();

            $state->bindParam(1,$idTacos);
            $state->bindParam(2,$idSauce);
            $state->bindParam(3,$quantite);

            $state->execute();           
        }
        
        public static function findSaucesWithTacos($idTacos)
        {
            $tabSauces = array();
            
            $connex = DatabaseLinker::getConnexion();
            
            $state = $connex->prepare("SELECT idSauce FROM TacosSauce WHERE idTacos=?");
            
            $state->bindParam(1,$idTacos);
            
            $state->execute();
            
            $resultats = $state->fetchAll();
            
            foreach($resultats as $result)
            {
                $sauce = SauceManager::findSauce($result["idSauce"]);
                $tabSauces[] = $sauce;
            }
            
            return $tabSauces;
        }
        
        
        public static function findQuantiteWithSauceAndTacos($idTacos, $idSauce)
        {
            $connex = DatabaseLinker::getConnexion();
            $quantite = null;
            $tacosSauce = null;
            
            $state = $connex->prepare("SELECT * FROM TacosSauce WHERE idTacos=? AND idSauce=?");
            
            $state->bindParam(1,$idTacos);
            $state->bindParam(2,$idSauce);
            
            $state->execute();
            
            $resultats = $state->fetchAll();
                    
            if(sizeof($resultats)>0)
            {
                $result = $resultats[0];
                $tacosSauce = new TacosSauce(); 
                
                $tacosSauce->setIdTacos($result["idTacos"]);
                $tacosSauce->setIdSauce($result["idSauce"]);
                $tacosSauce->setQuantite($result["quantite"]);
                
                $quantite = $tacosSauce->getQuantite();
            }
            
            return $quantite;
        }
        
        public static function deleteTacosSauce($idTacos)
        {
            $connex = DatabaseLinker::getConnexion();
            
            $state=$connex->prepare("DELETE FROM TacosSauce WHERE idTacos=?");
            
            $state->bindParam(1,$idTacos);
            
            $state->execute();
        }
    }
?>