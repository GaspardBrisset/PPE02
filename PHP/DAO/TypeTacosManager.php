<?php

    include_once("/tools/DatabaseLinker.php");
    include_once("/DTO/TypeTacos.php");

    class TypeTacosManager
    {
        public static function findTypeTacos($idTypeTacos)
        {
            $connex = DatabaseLinker::getConnexion();
            $typeTacos = null;
            
            $state = $connex->prepare("SELECT * FROM TypeTacos WHERE idTypeTacos=?");
            $state->bindParam(1,$idTypeTacos);
            
            $state->execute();
                        
            $resultats = $state->fetchAll();
                    
            if(sizeof($resultats)>0)
            {
                $result = $resultats[0];
                $typeTacos = new TypeTacos(); 
                
                $typeTacos->setIdTypeTacos($result["idTypeTacos"]);
                $typeTacos->setTaille($result["taille"]);
                $typeTacos->setPrixTaille($result["prixTaille"]);
            }
            
            return $typeTacos;
        }
        
        public static function findAllTypeTacos()
        {
            $tabTypeTacos = array();
            
            $connex = DatabaseLinker::getConnexion();
            
            $state = $connex->prepare("SELECT idTypeTacos FROM TypeTacos");
            $state->execute();
            
            $resultats = $state->fetchAll();
            
            foreach($resultats as $result)
            {
                $typeTacos = TypeTacosManager::findTypeTacos($result["idTypeTacos"]);
                $tabTypeTacos[] = $typeTacos;
            }
            
            return $tabTypeTacos;
        }
        
        public static function insertTypeTacos($typeTacos)
        {
            $connex = DatabaseLinker::getConnexion();
                    
            $state=$connex->prepare("INSERT INTO TypeTacos(taille, prixTaille) VALUES (?, ?)");
            
            $taille = $typeTacos->getTaille();
            $prixTaille = $typeTacos->getPrixTaille();
            
            $state->bindParam(1,$taille);
            $state->bindParam(2,$prixTaille);
            
            $state->execute();           
        }
        
        public static function deleteTypeTacos($idTypeTacos)
        {
            $connex = DatabaseLinker::getConnexion();
            
            $state=$connex->prepare("DELETE FROM TypeTacos WHERE idTypeTacos=?");
            
            $state->bindParam(1,$idTypeTacos);
            
            $state->execute();
        }
    }