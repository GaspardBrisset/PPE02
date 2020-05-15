<?php

    include_once("/tools/DatabaseLinker.php");
    include_once("/DTO/CommandeTacos.php");

    class CommandeTacosManager
    {
        public static function insertCommandeTacos($commandeTacos)
        {
            $connex = DatabaseLinker::getConnexion();

            $state=$connex->prepare("INSERT INTO CommandeTacos(idCommande, idTacos) VALUES (?, ?)");

            $idCommande = $commandeTacos->getIdCommande();
            $idTacos = $commandeTacos->getIdTacos();

            $state->bindParam(1,$idCommande);
            $state->bindParam(2,$idTacos);

            $state->execute();           
        }
        
        
        public static function findTacosWithCommande($idCommande)
        {
            $tabTacos = array();
            
            $connex = DatabaseLinker::getConnexion();
            
            $state = $connex->prepare("SELECT idTacos FROM CommandeTacos WHERE idCommande=?");
            
            $state->bindParam(1,$idCommande);
            
            $state->execute();
            
            $resultats = $state->fetchAll();
            
            foreach($resultats as $result)
            {
                $tacos = TacosManager::findTacos($result["idTacos"]);
                $tabTacos[] = $tacos;
            }
            
            return $tabTacos;
        }
        
        public static function findCommandeTacosWithCommande($idCommande)
        {
            $connex = DatabaseLinker::getConnexion();
            $commandeTacos = null;
            
            $state = $connex->prepare("SELECT * FROM CommandeTacos WHERE idCommande=?");
            $state->bindParam(1,$idCommande);
            
            $state->execute();
                        
            $resultats = $state->fetchAll();
                    
            if(sizeof($resultats)>0)
            {
                $result = $resultats[0];
                $commandeTacos = new CommandeTacos(); 
                
                $commandeTacos->setIdCommande($result["idCommande"]);
                $commandeTacos->setIdTacos($result["idTacos"]);
            }
            
            return $commandeTacos;
        }
    }
?>