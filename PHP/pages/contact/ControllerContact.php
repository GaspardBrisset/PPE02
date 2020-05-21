<?php

    include_once("../PHP/DAO/ClientManager.php");
    include_once("../PHP/DAO/MessageManager.php");

    class ControllerContact
    {
        public static function includeView()
        {
            include_once("contact.php");
        }
        
        public static function newMessage()
        {
            $messageIsSet = false;
            
            if(!empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["email"]) && !empty($_POST["telephone"]) && !empty($_POST["contenuMessage"]))
            {
                $client = new Client();
                
                $client->setNom($_POST["nom"]);
                $client->setPrenom($_POST["prenom"]);
                $client->setEmail($_POST["email"]);
                $client->setTelephone($_POST["telephone"]);
                
                ClientManager::insertClient($client);
                $client = ClientManager::findLastClient();
                
                $message = new Message();
                $message->setContenuMessage($_POST["contenuMessage"]);
                $message->setIdClient($client->getIdClient());
                
                MessageManager::insertMessage($message);
                
                $message = MessageManager::findLastMessage();
                
                if($message!=null)
                {
                    $messageIsSet = true;
                }
            }
            
            return $messageIsSet;      
        }
    }
?>