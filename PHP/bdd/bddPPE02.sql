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

INSERT INTO Client (nom, prenom, email, telephone, adresse) VALUES 
('JEAN', 'Jean', 'JeanJean@gmail.com', 0607080910, '8 rue des peupliers'),
('COEURDELION', 'Arthur', 'ArthurCDL@gmail.com', 0600000000, '14 impasse du carrefour'),
('QUIPIQUE', 'Francois', 'QuipiqueFrancois@gmail.com', 0699999999, '17 rue Victor Hugo');

INSERT INTO Commande(prixCommande, dateCommande, idClient) VALUES
(14, '2019-12-11', 1),
(17, '2020-01-10', 2),
(11, '2020-07-09', 3);

INSERT INTO Boisson(nomBoisson, prixBoisson) VALUES
('Coca-Cola 33cl', 1),
('Coca-Cola Zero 33cl', 1),
('Coca-Cola cherry 33cl', 1),
('Fanta 33cl', 1),
('IceTea 33cl', 1),
('Oasis 33cl', 1);


INSERT INTO Tacos(tailleTacos, prixTacos) VALUES
('M', 5),
('L', 7),
('XL', 9);

INSERT INTO  Viande(nomViande) VALUES
('Bacon'),
('Steak'),
('Escalope'),
('Poulet marine'),
('Kebab'),
('Cordon Bleu'),
('Nuggets'),
('Merguez'),
('Tenders');

INSERT INTO Sauce(nomSauce) VALUES
('Curry'),
('Barbecue'),
('Blanche'),
('Mayonnaise'),
('Burger'),
('Samurai'),
('Ketchup'),
('Harissa');

INSERT INTO CommandeBoisson(idCommande, idBoisson) VALUES
(1,1),
(1,3),
(2,5),
(3,1),
(3,6);

INSERT INTO CommandeTacos(idCommande, idTacos) VALUES
(1,1),
(1,2),
(2,2),
(2,3),
(3,1);

INSERT INTO TacosViande(idTacos, idViande) VALUES
(1,3),
(2,1),
(2,2),
(3,2),
(3,5),
(3,5),
(1,5);


INSERT INTO TacosSauce(idTacos, idSauce) VALUES
(1,2),
(2,4),
(2,3),
(3,4),
(3,1),
(1,5);
