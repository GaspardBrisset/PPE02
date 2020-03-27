<?php

    class Tacos
    {
        private $idTacos;
        private $tailleTacos;
        private $prixTacos;
        
        function getIdTacos() {
            return $this->idTacos;
        }

        function setIdTacos($idTacos) {
            $this->idTacos = $idTacos;
        }
        
        function getTailleTacos() {
            return $this->tailleTacos;
        }

        function setTailleTacos($tailleTacos) {
            $this->tailleTacos = $tailleTacos;
        }
        
        function getPrixTacos() {
            return $this->prixTacos;
        }

        function setPrixTacos($prixTacos) {
            $this->prixTacos = $prixTacos;
        }
    }
    
?>