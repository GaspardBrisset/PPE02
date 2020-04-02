<?php

    include_once("/tools/DatabaseLinker.php");
    include_once("/DTO/Sauce.php");

    class SauceManager
    {
        public static function findSauce($idSauce)
        {
            $connex = DatabaseLinker::getConnexion();
            $sauce = null;
            
            $state = $connex->prepare("SELECT * FROM Sauce WHERE idSauce=?");
            $state->bindParam(1,$idSauce);
            
            $state->execute();
                        
            $resultats = $state->fetchAll();
                    
            if(sizeof($resultats)>0)
            {
                $result = $resultats[0];
                $sauce = new Sauce(); 
                
                $sauce->setNomSauce($result["nomSauce"]);
            }
            
            return $sauce;
        }
        
        public static function findAllSauces()
        {
            $tabSauces = array();
            
            $connex = DatabaseLinker::getConnexion();
            
            $state = $connex->prepare("SELECT idSauce FROM Sauce");
            $state->execute();
            
            $resultats = $state->fetchAll();
            
            foreach($resultats as $result)
            {
                $sauce = SauceManager::findSauce($result["idSauce"]);
                $tabSauces[] = $sauce;
            }
            
            return $tabSauces;
        }
        
        public static function insertSauce($sauce)
        {
            $connex = DatabaseLinker::getConnexion();
                    
            $state=$connex->prepare("INSERT INTO Sauce(nomSauce) VALUES (?)");
            
            $nomSauce = $sauce->getNomSauce();
            
            $state->bindParam(1,$nomSauce);
            
            $state->execute();           
        }
        
        public static function deleteSauce($idSauce)
        {
            $connex = DatabaseLinker::getConnexion();
            
            $state=$connex->prepare("DELETE FROM Sauce WHERE idSauce=?");
            
            $state->bindParam(1,$idSauce);
            
            $state->execute();
        }
    }