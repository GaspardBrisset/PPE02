<?php
    include_once("../PHP/DAO/ClientManager.php");
    include_once("../PHP/DAO/CommandeManager.php");

    class ControllerInfosClient
    {
        public static function includeView()
        {
            include_once("infosClient.php");
        }

        public static function newClient()
        {
            unset($_SESSION["idClient"]);
            
            $idClient = null;
            $clientIsSet = false;
            
            if(!empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["email"]) && !empty($_POST["telephone"]) && !empty($_POST["adresse"])) // ou isset
            {
                $client = new Client();
                
                $client->setNom($_POST["nom"]);
                $client->setPrenom($_POST["prenom"]);
                $client->setEmail($_POST["email"]);
                $client->setTelephone($_POST["telephone"]);
                $client->setAdresse($_POST["adresse"]);
                
                ClientManager::insertClient($client);
                
                $client = ClientManager::findLastClient();
                $idClient = $client->getIdClient();
                $_SESSION["idClient"] = $idClient;
                if(!empty($_SESSION["idClient"]))
                {
                    $clientIsSet = true;
                }
            }
            
            return $clientIsSet;
        }
        
        
        public static function redirectCommandeIsOver()
        {
            header('Location: index.php?page=commandeIsOver');
            exit;
        }
    }
?>
