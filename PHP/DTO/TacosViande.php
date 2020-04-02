<?php

    class TacosViande
    {
        private $idTacos;
        private $idViande;
        
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

    }
?>