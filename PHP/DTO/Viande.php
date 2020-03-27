<?php
    
    class Viande
    {
        private $idViande;
        private $nomViande;
        
        function getIdViande() {
            return $this->idViande;
        }

        function setIdViande($idViande) {
            $this->idViande = $idViande;
        }
        
        function getNomViande() {
            return $this->nomViande;
        }

        function setNomViande($nomViande) {
            $this->nomViande = $nomViande;
        }


    }

?>
