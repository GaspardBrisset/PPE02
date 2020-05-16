<?php

    include_once("/DAO/ClientManager.php");
    include_once("/DAO/CommandeManager.php");

    date_default_timezone_set('Europe/Paris');
    
    class ControllerInfosClient
    {
        public static function includeView()
        {
            include_once("/pages/infosClient/infosClient.php");
        }

        public static function insertClient()
        {
            $client = new Client();
            
            $client->setNom($_POST["nom"]);
            $client->setPrenom($_POST["prenom"]);
            $client->setEmail($_POST["email"]);
            $client->setTelephone($_POST["telephone"]);
            $client->setAdresse($_POST["adresse"]);
            
            ClientManager::insertClient($client);
        }
        
        
        public static function clientSession()
        {
            $idClient = null;
            
            unset($_SESSION["idClient"]);
            
            $clientIsSet = false;
            
            if(!empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["email"]) && !empty($_POST["telephone"]) && !empty($_POST["adresse"])) // ou isset
            {
                $client = ClientManager::findLastClient();
                $idClient = $client->getIdClient();
                $_SESSION["idClient"] = $idClient;
                
                $clientIsSet = true;
            }
            
            return $clientIsSet;
        }
        
        public static function redirectCommandeIsOver()
        {
            header('Location: index.php?page=CommandeIsOver');
            exit;
        }
    }
?>
