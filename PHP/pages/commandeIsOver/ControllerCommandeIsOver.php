<?php

    include_once("/DAO/ClientManager.php");
    include_once("/DAO/CommandeManager.php");

    date_default_timezone_set('Europe/Paris');
    
    class ControllerCommandeIsOver
    {
        public static function includeView()
        {
            include_once("/pages/commandeIsOver/commandeIsOver.php");
        }
        
        
        public static function getClient($idClientSession)
        {
            $client = ClientManager::findClient($idClientSession);
            return $client;
        }

                
        public static function updateCommande()
        {
            $commande = CommandeManager::findCommande($_SESSION["idCommande"]);
            
            $commande->setPrixCommande($_SESSION["prixTotal"]);
            $commande->setDateCommande(date("Y-m-d H:i:s"));
            $commande->setIdClient($_SESSION["idClient"]);
            
            CommandeManager::updateCommande($commande);
            
            $commande = CommandeManager::findCommande($_SESSION["idCommande"]);
            
            return $commande;
        }
    }
    
?>