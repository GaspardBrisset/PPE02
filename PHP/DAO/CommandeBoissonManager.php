<?php

    include_once("../PHP/tools/DatabaseLinker.php");
    include_once("../PHP/DTO/CommandeBoisson.php");
    include_once("../PHP/DAO/BoissonManager.php");

    class CommandeBoissonManager
    {
        public static function insertCommandeBoisson($commandeBoisson)
        {
            $connex = DatabaseLinker::getConnexion();

            $state=$connex->prepare("INSERT INTO CommandeBoisson(idCommande, idBoisson, quantite) VALUES (?, ?, ?)");

            $idCommande = $commandeBoisson->getIdCommande();
            $idBoisson = $commandeBoisson->getIdBoisson();
            $quantite = $commandeBoisson->getQuantite();

            $state->bindParam(1,$idCommande);
            $state->bindParam(2,$idBoisson);
            $state->bindParam(3,$quantite);

            $state->execute();           
        }
        
        public static function findBoissonsWithCommande($idCommande)
        {
            $tabBoissons = array();
            
            $connex = DatabaseLinker::getConnexion();
            
            $state = $connex->prepare("SELECT idBoisson FROM CommandeBoisson WHERE idCommande=?");
            
            $state->bindParam(1,$idCommande);
            
            $state->execute();
            
            $resultats = $state->fetchAll();
            
            foreach($resultats as $result)
            {
                $boisson = BoissonManager::findBoisson($result["idBoisson"]);
                $tabBoissons[] = $boisson;
            }
            
            return $tabBoissons;
        }
        
        public static function findBoissonsWithCommandeAndBoisson($idCommande, $idBoisson)
        {
            $tabBoissons = array();
            
            $connex = DatabaseLinker::getConnexion();
            
            $state = $connex->prepare("SELECT idBoisson FROM CommandeBoisson WHERE idCommande=? AND idBoisson=?");
            
            $state->bindParam(1,$idCommande);
            $state->bindParam(2,$idBoisson);
            
            $state->execute();
            
            $resultats = $state->fetchAll();
            
            foreach($resultats as $result)
            {
                $boisson = BoissonManager::findBoisson($result["idBoisson"]);
                $tabBoissons[] = $boisson;
            }
            
            return $tabBoissons;
        }
        
        
        public static function findCommandeBoissonWithCommandeAndBoisson($idCommande, $idBoisson)
        {
            $connex = DatabaseLinker::getConnexion();
            $commandeBoisson = null;
            
            $state = $connex->prepare("SELECT * FROM CommandeBoisson WHERE idCommande=? AND idBoisson=?");
            $state->bindParam(1,$idCommande);
            $state->bindParam(2,$idBoisson);
            
            $state->execute();
                        
            $resultats = $state->fetchAll();
                    
            if(sizeof($resultats)>0)
            {
                $result = $resultats[0];
                $commandeBoisson = new CommandeBoisson(); 
                
                $commandeBoisson->setIdCommande($result["idCommande"]);
                $commandeBoisson->setIdBoisson($result["idBoisson"]);
                $commandeBoisson->setQuantite($result["quantite"]);
            }
            
            return $commandeBoisson;
        }
        
        
        public static function findQuantiteWithCommandeAndBoisson($idCommande, $idBoisson)
        {
            $connex = DatabaseLinker::getConnexion();
            $quantite = null;
            $commandeBoisson = null;
            
            $state = $connex->prepare("SELECT * FROM CommandeBoisson WHERE idCommande=? AND idBoisson=?");
            
            $state->bindParam(1,$idCommande);
            $state->bindParam(2,$idBoisson);
            
            $state->execute();
            
            $resultats = $state->fetchAll();
                    
            if(sizeof($resultats)>0)
            {
                $result = $resultats[0];
                $commandeBoisson = new CommandeBoisson(); 
                
                $commandeBoisson->setIdCommande($result["idCommande"]);
                $commandeBoisson->setIdBoisson($result["idBoisson"]);
                $commandeBoisson->setQuantite($result["quantite"]);
                
                $quantite = $commandeBoisson->getQuantite();
            }
            
            return $quantite;
        }
        
        public static function updateQuantiteBoisson($commandeBoisson, $idCommande)
        {
            $connex = DatabaseLinker::getConnexion();
            
            $newQuantiteBoisson = $commandeBoisson->getQuantite();
            $idBoisson = $commandeBoisson->getIdBoisson();
            
            $state=$connex->prepare("UPDATE CommandeBoisson SET quantite=? WHERE idBoisson=? AND idCommande=?");
            
            $state->bindParam(1,$newQuantiteBoisson);
            $state->bindParam(2,$idBoisson);
            $state->bindParam(3,$idCommande);
            
            $state->execute();
        }
        
        public static function deleteBoissonInCommande($idBoisson, $idCommande)
        {
            $connex = DatabaseLinker::getConnexion();
            
            $state=$connex->prepare("DELETE FROM CommandeBoisson WHERE idBoisson=? AND idCommande=?");
            
            $state->bindParam(1,$idBoisson);
            $state->bindParam(2,$idCommande);
            
            $state->execute();
        }
    }
?>
