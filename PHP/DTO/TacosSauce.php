<?php

    class TacosSauce
    {
        private $idTacos;
        private $idSauce;
        
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

    }
?>