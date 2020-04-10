<?php

    class Tacos
    {
        private $idTacos;
        private $idTypeTacos;
        
        function getIdTacos() {
            return $this->idTacos;
        }

        function setIdTacos($idTacos) {
            $this->idTacos = $idTacos;
        }
        
        function getIdTypeTacos() {
            return $this->idTypeTacos;
        }

        function setIdTypeTacos($idTypeTacos) {
            $this->idTypeTacos = $idTypeTacos;
        }
        
    }
    
?>