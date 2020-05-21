<?php

    include_once("../PHP/tools/DatabaseLinker.php");
    include_once("../PHP/DTO/Viande.php");

    class ViandeManager
    {
        public static function findViande($idViande)
        {
            $connex = DatabaseLinker::getConnexion();
            $viande = null;
            
            $state = $connex->prepare("SELECT * FROM Viande WHERE idViande=?");
            $state->bindParam(1,$idViande);
            
            $state->execute();
                        
            $resultats = $state->fetchAll();
                    
            if(sizeof($resultats)>0)
            {
                $result = $resultats[0];
                $viande = new Viande(); 
                
                $viande->setIdViande($result["idViande"]);
                $viande->setNomViande($result["nomViande"]);
            }
            
            return $viande;
        }
        
        public static function findAllViandes()
        {
            $tabViandes = array();
            
            $connex = DatabaseLinker::getConnexion();
            
            $state = $connex->prepare("SELECT idViande FROM Viande");
            $state->execute();
            
            $resultats = $state->fetchAll();
            
            foreach($resultats as $result)
            {
                $viande = ViandeManager::findViande($result["idViande"]);
                $tabViandes[] = $viande;
            }
            
            return $tabViandes;
        }
        
        public static function insertViande($viande)
        {
            $connex = DatabaseLinker::getConnexion();
                    
            $state=$connex->prepare("INSERT INTO Viande(nomViande) VALUES (?)");
            
            $nomViande = $viande->getNomViande();
            
            $state->bindParam(1,$nomViande);
            
            $state->execute();           
        }
        
        public static function deleteViande($idViande)
        {
            $connex = DatabaseLinker::getConnexion();
            
            $state=$connex->prepare("DELETE FROM Viande WHERE idViande=?");
            
            $state->bindParam(1,$idViande);
            
            $state->execute();
        }
    }