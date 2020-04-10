<?php

    class TypeTacos
    {
        private $idTypeTacos;
        private $taille;
        private $prixTaille;
        
        function getIdTypeTacos() {
            return $this->idTypeTacos;
        }

        function getTaille() {
            return $this->taille;
        }

        function getPrixTaille() {
            return $this->prixTaille;
        }

        function setIdTypeTacos($idTypeTacos) {
            $this->idTypeTacos = $idTypeTacos;
        }

        function setTaille($taille) {
            $this->taille = $taille;
        }

        function setPrixTaille($prixTaille) {
            $this->prixTaille = $prixTaille;
        }

    }
    
?>
        
