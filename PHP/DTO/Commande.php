<?php

    class Commande
    {
        private $idCommande;
        private $prixCommande;
        private $dateCommande;
        private $idClient;
        
        function getIdCommande() {
            return $this->idCommande;
        }

        function setIdCommande($idCommande) {
            $this->idCommande = $idCommande;
        }

        function getPrixCommande() {
            return $this->prixCommande;
        }

        function setPrixCommande($prixCommande) {
            $this->prixCommande = $prixCommande;
        }
        
        function getDateCommande() {
            return $this->dateCommande;
        }

        function setDateCommande($dateCommande) {
            $this->dateCommande = $dateCommande;
        }
        
        function getIdClient() {
            return $this->idClient;
        }

        function setIdClient($idClient) {
            $this->idClient = $idClient;
        }
    }

?>
