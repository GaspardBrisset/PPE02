<?php

    class Client
    {
        private $idClient;
        private $nom;
        private $prenom;
        private $email;
        private $telephone;
        private $adresse;
        
        function getIdClient() {
            return $this->idClient;
        }

        function setIdClient($idClient) {
            $this->idClient = $idClient;
        }

        function getNom() {
            return $this->nom;
        }

        function setNom($nom) {
            $this->nom = $nom;
        }

        function getPrenom() {
            return $this->prenom;
        }

        function setPrenom($prenom) {
            $this->prenom = $prenom;
        }

        function getEmail() {
            return $this->email;
        }

        function setEmail($email) {
            $this->email = $email;
        }

        function getTelephone() {
            return $this->telephone;
        }

        function setTelephone($telephone) {
            $this->telephone = $telephone;
        }

        function getAdresse() {
            return $this->adresse;
        }

        function setAdresse($adresse) {
            $this->adresse = $adresse;
        }

    }
?>