<?php

    include_once("../PHP/tools/DatabaseLinker.php");
    include_once("../PHP/DTO/Client.php");

    class ClientManager
    {
        public static function findClient($idClient)
        {
            $connex = DatabaseLinker::getConnexion();
            $client = null;
            
            $state = $connex->prepare("SELECT * FROM Client WHERE idClient=?");
            $state->bindParam(1,$idClient);
            
            $state->execute();
                        
            $resultats = $state->fetchAll();
                    
            if(sizeof($resultats)>0)
            {
                $result = $resultats[0];
                $client = new Client(); 
                
                $client->setIdClient($result["idClient"]);
                $client->setNom($result["nom"]);
                $client->setPrenom($result["prenom"]);
                $client->setEmail($result["email"]);
                $client->setTelephone($result["telephone"]);
                $client->setAdresse($result["adresse"]);
            }
            
            return $client;
        }
        
        public static function findAllClients()
        {
            $tabClients = array();
            
            $connex = DatabaseLinker::getConnexion();
            
            $state = $connex->prepare("SELECT idClient FROM Client");
            $state->execute();
            
            $resultats = $state->fetchAll();
            
            foreach($resultats as $result)
            {
                $client = ClientManager::findClient($result["idClient"]);
                $tabClients[] = $client;
            }
            
            return $tabClients;
        }
        
        public static function insertClient($client)
        {
            $connex = DatabaseLinker::getConnexion();
                    
            $state=$connex->prepare("INSERT INTO Client(nom, prenom, email, telephone, adresse) VALUES (?, ?, ?, ?, ?)");
            
            $nom = $client->getNom();
            $prenom = $client->getPrenom();
            $email = $client->getEmail();
            $telephone = $client->getTelephone();
            $adresse = $client->getAdresse();
            
            $state->bindParam(1,$nom);
            $state->bindParam(2,$prenom);
            $state->bindParam(3,$email);
            $state->bindParam(4,$telephone);
            $state->bindParam(5,$adresse);
            
            $state->execute();           
        }
        
        public static function deleteClient($idClient)
        {
            $connex = DatabaseLinker::getConnexion();
            
            $state=$connex->prepare("DELETE FROM Client WHERE idClient=?");
            
            $state->bindParam(1,$idClient);
            
            $state->execute();
        }
        
        
        public static function findLastClient()
        {
            $connex = DatabaseLinker::getConnexion();
            $client = null;
            
            $state = $connex->prepare("SELECT * FROM Client WHERE idClient =(SELECT MAX(idClient) FROM Client)");
            
            $state->execute();
                        
            $resultats = $state->fetchAll();
                    
            if(sizeof($resultats)>0)
            {
                $result = $resultats[0];
                $client = new Client(); 
                
                $client->setIdClient($result["idClient"]);
                $client->setNom($result["nom"]);
                $client->setPrenom($result["prenom"]);
                $client->setEmail($result["email"]);
                $client->setTelephone($result["telephone"]);
                $client->setAdresse($result["adresse"]);
            }
            
            return $client;
        }
    }