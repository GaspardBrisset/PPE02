<?php

    include_once("/tools/DatabaseLinker.php");
    include_once("/DTO/Commande.php");

    class CommandeManager
    {
        public static function findCommande($idCommande)
        {
            $connex = DatabaseLinker::getConnexion();
            $commande = null;
            
            $state = $connex->prepare("SELECT * FROM Commande WHERE idCommande=?");
            $state->bindParam(1,$idCommande);
            
            $state->execute();
                        
            $resultats = $state->fetchAll();
                    
            if(sizeof($resultats)>0)
            {
                $result = $resultats[0];
                $commande = new Commande(); 
                
                $commande->setIdCommande($result["idCommande"]);
                $commande->setPrixCommande($result["prixCommande"]);
                $commande->setDateCommande($result["dateCommande"]);
                $commande->setIdClient($result["idClient"]);
            }
            
            return $commande;
        }
        
        public static function findAllCommandes()
        {
            $tabCommandes = array();
            
            $connex = DatabaseLinker::getConnexion();
            
            $state = $connex->prepare("SELECT idCommande FROM Commande");
            $state->execute();
            
            $resultats = $state->fetchAll();
            
            foreach($resultats as $result)
            {
                $commande = CommandeManager::findCommande($result["idCommande"]);
                $tabCommandes[] = $commande;
            }
            
            return $tabCommandes;
        }
        
        public static function insertCommande($commande)
        {
            $connex = DatabaseLinker::getConnexion();
                    
            $state=$connex->prepare("INSERT INTO Commande(prixCommande, dateCommande, idClient) VALUES (?, ?, ?)");
            
            $prixCommande = $commande->getPrixCommande();
            $dateCommande = $commande->getDateCommande();
            $idClient = $commande->getIdClient();
            
            $state->bindParam(1,$prixCommande);
            $state->bindParam(2,$dateCommande);
            $state->bindParam(3,$idClient);
            
            $state->execute();           
        }
        
        public static function deleteCommande($idCommande)
        {
            $connex = DatabaseLinker::getConnexion();
            
            $state=$connex->prepare("DELETE FROM Commande WHERE idCommande=?");
            
            $state->bindParam(1,$idCommande);
            
            $state->execute();
        }
        
        public static function findLastCommande()
        {
            $connex = DatabaseLinker::getConnexion();
            $commande = null;
            
            $state = $connex->prepare("SELECT * FROM Commande WHERE idCommande =(SELECT MAX(idCommande) FROM Commande)");
            
            $state->execute();
                        
            $resultats = $state->fetchAll();
                    
            if(sizeof($resultats)>0)
            {
                $result = $resultats[0];
                $commande = new Commande(); 
                
                $commande->setIdCommande($result["idCommande"]);
                $commande->setPrixCommande($result["prixCommande"]);
                $commande->setDateCommande($result["dateCommande"]);
                $commande->setIdClient($result["idClient"]);
            }
            
            return $commande;
        }
    }