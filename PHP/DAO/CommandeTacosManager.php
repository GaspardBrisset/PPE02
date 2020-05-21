<?php

    include_once("../PHP/tools/DatabaseLinker.php");
    include_once("../PHP/DTO/CommandeTacos.php");

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
        
        
        public static function findTacosWithCommandeAndTacos($idCommande, $idTacos)
        {
            $tacos = null;
            
            $connex = DatabaseLinker::getConnexion();
            
            $state = $connex->prepare("SELECT * FROM CommandeTacos WHERE idCommande=? AND idTacos=?");
            
            $state->bindParam(1,$idCommande);
            $state->bindParam(2,$idTacos);
            
            $state->execute();
                        
            $resultats = $state->fetchAll();
                    
            if(sizeof($resultats)>0)
            {
                $result = $resultats[0];
                $tacos = new CommandeTacos(); 
                
                $tacos->setIdTacos($result["idTacos"]);
                $tacos->setIdCommande($result["idCommande"]);
            }
            
            return $tacos;
        }        
        
        
        public static function deleteCommandeTacos($idTacos)
        {
            $connex = DatabaseLinker::getConnexion();
            
            $state=$connex->prepare("DELETE FROM CommandeTacos WHERE idTacos=?");
            
            $state->bindParam(1,$idTacos);
            
            $state->execute();
        }
    }
?>