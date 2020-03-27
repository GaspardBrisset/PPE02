DROP DATABASE IF EXISTS bdd_tacos;

CREATE DATABASE IF NOT EXISTS bdd_tacos
CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE bdd_tacos;

CREATE TABLE IF NOT EXISTS Client(
idClient INT AUTO_INCREMENT,
nom VARCHAR(64),
prenom VARCHAR(64),
email VARCHAR(64),
telephone INT,
adresse VARCHAR(64),
PRIMARY KEY(idClient));

CREATE TABLE IF NOT EXISTS Commande(
idCommande INT AUTO_INCREMENT,
prixCommande FLOAT,
dateCommande DATETIME,
idClient INT,
PRIMARY KEY(idCommande));

CREATE TABLE IF NOT EXISTS CommandeBoisson(
idCommande INT,
idBoisson INT,
PRIMARY KEY(idCommande, idBoisson));

CREATE TABLE IF NOT EXISTS Boisson(
idBoisson INT AUTO_INCREMENT,
nomBoisson VARCHAR(64),
prixBoisson FLOAT,
PRIMARY KEY(idBoisson));

CREATE TABLE IF NOT EXISTS CommandeTacos(
idCommande INT,
idTacos INT,
PRIMARY KEY(idCommande, idTacos));

CREATE TABLE IF NOT EXISTS Tacos(
idTacos INT AUTO_INCREMENT,
tailleTacos VARCHAR(64),
prixTacos FLOAT,
PRIMARY KEY(idTacos));

CREATE TABLE IF NOT EXISTS TacosViande(
idTacos INT,
idViande INT,
PRIMARY KEY(idTacos, idViande));

CREATE TABLE IF NOT EXISTS Viande(
idViande INT AUTO_INCREMENT,
nomViande VARCHAR(64),
PRIMARY KEY(idViande));

CREATE TABLE IF NOT EXISTS TacosSauce(
idTacos INT,
idSauce INT,
PRIMARY KEY(idTacos, idSauce));

CREATE TABLE IF NOT EXISTS Sauce(
idSauce INT AUTO_INCREMENT,
nomSauce VARCHAR(64),
PRIMARY KEY(idSauce));

ALTER TABLE Commande
ADD CONSTRAINT Commande_idClient
FOREIGN KEY (idClient)
REFERENCES Client(idClient);

ALTER TABLE CommandeBoisson
ADD CONSTRAINT CommandeBoisson_idBoisson
FOREIGN KEY (idBoisson)
REFERENCES Boisson(idBoisson);

ALTER TABLE CommandeBoisson
ADD CONSTRAINT CommandeBoisson_idCommande
FOREIGN KEY (idCommande)
REFERENCES Commande(idCommande);

ALTER TABLE CommandeTacos
ADD CONSTRAINT CommandeTacos_idCommande
FOREIGN KEY (idCommande)
REFERENCES Commande(idCommande);

ALTER TABLE CommandeTacos
ADD CONSTRAINT CommandeTacos_idTacos
FOREIGN KEY (idTacos)
REFERENCES Tacos(idTacos);

ALTER TABLE TacosViande
ADD CONSTRAINT TacosViande_idTacos
FOREIGN KEY (idTacos)
REFERENCES Tacos(idTacos);

ALTER TABLE TacosViande
ADD CONSTRAINT TacosViande_idViande
FOREIGN KEY (idViande)
REFERENCES Viande(idViande);

ALTER TABLE TacosSauce
ADD CONSTRAINT TacosSauce_idTacos
FOREIGN KEY (idTacos)
REFERENCES Tacos(idTacos);

ALTER TABLE TacosSauce
ADD CONSTRAINT TacosSauce_idSauce
FOREIGN KEY (idSauce)
REFERENCES Sauce(idSauce);