<?php

    include_once("../PHP/tools/DatabaseLinker.php");
    include_once("../PHP/DTO/Message.php");

    class MessageManager
    {
        public static function findMessage($idMessage)
        {
            $connex = DatabaseLinker::getConnexion();
            $message = null;
            
            $state = $connex->prepare("SELECT * FROM Message WHERE idMessage=?");
            $state->bindParam(1, $idMessage);
            
            $state->execute();
                        
            $resultats = $state->fetchAll();
                    
            if(sizeof($resultats)>0)
            {
                $result = $resultats[0];
                $message = new Message(); 
                
                $message->setIdMessage($result["idMessage"]);
                $message->setContenuMessage($result["contenuMessage"]);
                $message->setIdClient($result["idClient"]);

            }
            return $message;
        }
        
        public static function findAllMessages()
        {
            $tabMessages = array();
            
            $connex = DatabaseLinker::getConnexion();
            
            $state = $connex->prepare("SELECT idMessage FROM Message");
            $state->execute();
            
            $resultats = $state->fetchAll();
            
            foreach($resultats as $result)
            {
                $message = MessageManager::findMessage($result["idMessage"]);
                $tabMessages[] = $message;
            }
            
            return $tabMessages;
        }
        
        public static function insertMessage($message)
        {
            $connex = DatabaseLinker::getConnexion();
                    
            $state=$connex->prepare("INSERT INTO Message(contenuMessage, idClient) VALUES (?, ?)");
            
            $contenuMessage = $message->getContenuMessage();
            $idClient = $message->getIdClient();
            
            $state->bindParam(1,$contenuMessage);
            $state->bindParam(2,$idClient);
            
            $state->execute();           
        }
        
        public static function findLastMessage()
        {
            $connex = DatabaseLinker::getConnexion();
            $message = null;
            
            $state = $connex->prepare("SELECT * FROM Message WHERE idMessage=(SELECT MAX(idMessage) FROM Message)");
            
            $state->execute();
                        
            $resultats = $state->fetchAll();
                    
            if(sizeof($resultats)>0)
            {
                $result = $resultats[0];
                $message = new Message(); 
                
                $message->setIdMessage($result["idMessage"]);
                $message->setContenuMessage($result["contenuMessage"]);
                $message->setIdClient($result["idClient"]);
            }
            
            return $message;
        }
    }
    
?>