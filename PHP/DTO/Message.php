<?php

    class Message
    {
        private $idMessage;
        private $contenuMessage;
        private $idClient;
        
        function getIdMessage() {
            return $this->idMessage;
        }

        function getContenuMessage() {
            return $this->contenuMessage;
        }

        function getIdClient() {
            return $this->idClient;
        }

        function setIdMessage($idMessage) {
            $this->idMessage = $idMessage;
        }

        function setContenuMessage($contenuMessage) {
            $this->contenuMessage = $contenuMessage;
        }

        function setIdClient($idClient) {
            $this->idClient = $idClient;
        }
    }
?>
        
