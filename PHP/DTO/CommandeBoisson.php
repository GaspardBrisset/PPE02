<?php

    class CommandeBoisson
    {
        private $idCommande;
        private $idBoisson;

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
    }
?>
        