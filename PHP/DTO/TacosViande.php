<?php

    class TacosViande
    {
        private $idTacos;
        private $idViande;
        private $quantite;
        
        function getIdTacos() {
            return $this->idTacos;
        }

        function getIdViande() {
            return $this->idViande;
        }

        function setIdTacos($idTacos) {
            $this->idTacos = $idTacos;
        }

        function setIdViande($idViande) {
            $this->idViande = $idViande;
        }

        function getQuantite() {
            return $this->quantite;
        }

        function setQuantite($quantite) {
            $this->quantite = $quantite;
        }


    }
?>