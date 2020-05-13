<?php

    class TacosSauce
    {
        private $idTacos;
        private $idSauce;
        private $quantite;
        
        function getIdTacos() {
            return $this->idTacos;
        }

        function getIdSauce() {
            return $this->idSauce;
        }

        function setIdTacos($idTacos) {
            $this->idTacos = $idTacos;
        }

        function setIdSauce($idSauce) {
            $this->idSauce = $idSauce;
        }

        function getQuantite() {
            return $this->quantite;
        }

        function setQuantite($quantite) {
            $this->quantite = $quantite;
        }


    }
?>