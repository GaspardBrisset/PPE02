<?php

    class Sauce
    {
        private $idSauce;
        private $nomSauce;
        
        function getIdSauce() {
            return $this->idSauce;
        }

        function setIdSauce($idSauce) {
            $this->idSauce = $idSauce;
        }
        
        function getNomSauce() {
            return $this->nomSauce;
        }

        function setNomSauce($nomSauce) {
            $this->nomSauce = $nomSauce;
        }
    }

?>