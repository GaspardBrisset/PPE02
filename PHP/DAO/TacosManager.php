<?php

    include_once("/tools/DatabaseLinker.php");
    include_once("/DTO/Tacos.php");

    class TacosManager
    {
        public static function findTacos($idTacos)
        {
            $connex = DatabaseLinker::getConnexion();
            $tacos = null;
            
            $state = $connex->prepare("SELECT * FROM Tacos WHERE idTacos=?");
            $state->bindParam(1,$idTacos);
            
            $state->execute();
                        
            $resultats = $state->fetchAll();
                    
            if(sizeof($resultats)>0)
            {
                $result = $resultats[0];
                $tacos = new Tacos(); 
                
                $tacos->setIdTacos($result["idTacos"]);
                $tacos->setTailleTacos($result["tailleTacos"]);
                $tacos->setPrixTacos($result["prixTacos"]);
            }
            
            return $tacos;
        }
        
        public static function findAllTacos()
        {
            $tabTacos = array();
            
            $connex = DatabaseLinker::getConnexion();
            
            $state = $connex->prepare("SELECT idTacos FROM Tacos");
            $state->execute();
            
            $resultats = $state->fetchAll();
            
            foreach($resultats as $result)
            {
                $tacos = TacosManager::findTacos($result["idTacos"]);
                $tabTacos[] = $tacos;
            }
            
            return $tabTacos;
        }
        
        public static function insertTacos($tacos)
        {
            $connex = DatabaseLinker::getConnexion();
                    
            $state=$connex->prepare("INSERT INTO Tacos(tailleTacos, prixTacos) VALUES (?, ?)");
            
            $tailleTacos = $tacos->getTailleTacos();
            $prixTacos = $tacos->getPrixTacos();
            
            $state->bindParam(1,$tailleTacos);
            $state->bindParam(2,$prixTacos);
            
            $state->execute();           
        }
        
        public static function deleteTacos($idTacos)
        {
            $connex = DatabaseLinker::getConnexion();
            
            $state=$connex->prepare("DELETE FROM Tacos WHERE idTacos=?");
            
            $state->bindParam(1,$idTacos);
            
            $state->execute();
        }
    }