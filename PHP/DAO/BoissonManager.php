<?php

    include_once("../PHP/tools/DatabaseLinker.php");
    include_once("../PHP/DTO/Boisson.php");

    class BoissonManager
    {
        public static function findBoisson($idBoisson)
        {
            $connex = DatabaseLinker::getConnexion();
            $boisson = null;
            
            $state = $connex->prepare("SELECT * FROM Boisson WHERE idBoisson=?");
            $state->bindParam(1, $idBoisson);
            
            $state->execute();
                        
            $resultats = $state->fetchAll();
                    
            if(sizeof($resultats)>0)
            {
                $result = $resultats[0];
                $boisson = new Boisson(); 
                
                $boisson->setIdBoisson($result["idBoisson"]);
                $boisson->setNomBoisson($result["nomBoisson"]);
                $boisson->setPrixBoisson($result["prixBoisson"]);
            }
            
            return $boisson;
        }
        
        public static function findAllBoissons()
        {
            $tabBoissons = array();
            
            $connex = DatabaseLinker::getConnexion();
            
            $state = $connex->prepare("SELECT idBoisson FROM Boisson");
            $state->execute();
            
            $resultats = $state->fetchAll();
            
            foreach($resultats as $result)
            {
                $boisson = BoissonManager::findBoisson($result["idBoisson"]);
                $tabBoissons[] = $boisson;
            }
            
            return $tabBoissons;
        }
        
        public static function insertBoisson($boisson)
        {
            $connex = DatabaseLinker::getConnexion();
                    
            $state=$connex->prepare("INSERT INTO Boisson(nomBoisson, prixBoisson) VALUES (?, ?)");
            
            $nomBoisson = $boisson->getNomBoisson();
            $prixBoisson = $boisson->getPrixBoisson();
            
            $state->bindParam(1,$nomBoisson);
            $state->bindParam(2,$prixBoisson);
            
            $state->execute();           
        }
        
        public static function deleteBoisson($idBoisson)
        {
            $connex = DatabaseLinker::getConnexion();
            
            $state=$connex->prepare("DELETE FROM Boisson WHERE idBoisson=?");
            
            $state->bindParam(1,$idBoisson);
            
            $state->execute();
        }
    }