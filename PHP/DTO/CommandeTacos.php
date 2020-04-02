<?php

    class CommandeTacos
    {
        private $idCommande;
        private $idTacos;
        
        function getIdCommande() {
            return $this->idCommande;
        }

        function getIdTacos() {
            return $this->idTacos;
        }

        function setIdCommande($idCommande) {
            $this->idCommande = $idCommande;
        }

        function setIdTacos($idTacos) {
            $this->idTacos = $idTacos;
        }

    }
    
?>
