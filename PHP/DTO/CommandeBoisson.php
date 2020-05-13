<?php

    class CommandeBoisson
    {
        private $idCommande;
        private $idBoisson;
        private $quantite;

        function getIdCommande() {
            return $this->idCommande;
        }

        function setIdCommande($idCommande) {
            $this->idCommande = $idCommande;
        }
        
        function getIdBoisson() {
            return $this->idBoisson;
        }

        function setIdBoisson($idBoisson) {
            $this->idBoisson = $idBoisson;
        }
        
        function getQuantite() {
            return $this->quantite;
        }

        function setQuantite($quantite) {
            $this->quantite = $quantite;
        }


    }
?>
        