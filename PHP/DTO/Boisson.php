<?php

    class Boisson
    {
        private $idBoisson;
        private $nomBoisson;
        private $prixBoisson;
        
        function getIdBoisson() {
            return $this->idBoisson;
        }

        function setIdBoisson($idBoisson) {
            $this->idBoisson = $idBoisson;
        }

        function getNomBoisson() {
            return $this->nomBoisson;
        }

        function setNomBoisson($nomBoisson) {
            $this->nomBoisson = $nomBoisson;
        }

        function getPrixBoisson() {
            return $this->prixBoisson;
        }

        function setPrixBoisson($prixBoisson) {
            $this->prixBoisson = $prixBoisson;
        }
    }
    
?>