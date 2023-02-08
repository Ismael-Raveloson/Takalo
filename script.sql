CREATE DATABASE Takalo;
USE Takalo;

CREATE TABLE Categories
(
    idCategories INT PRIMARY KEY AUTO_INCREMENT,
    nomCategories VARCHAR(50)
);

CREATE TABLE Users
(
    idUsers INT PRIMARY KEY AUTO_INCREMENT,
    usersname  VARCHAR(50),
    email VARCHAR(50),
    mdp VARCHAR(50),
    admin INT
);

CREATE TABLE Items
(
    idItems INT PRIMARY KEY AUTO_INCREMENT,
    nameItems VARCHAR(50),
    idUsers INT,
    idCategories INT,
    priceItems INT,
    photo VARCHAR(50),
    descri VARCHAR(50),
    FOREIGN KEY(idUsers) REFERENCES Users(idUsers),
    FOREIGN key(idCategories) REFERENCES Categories(idCategories)
);

CREATE TABLE Transactions
(
    idTransaction INT PRIMARY KEY AUTO_INCREMENT,
    idItems1 INT,
    idItems2 INT,
    idUsers1 INT,
    idUsers2 INT,
    FOREIGN KEY(idItems1)REFERENCES Items(idItems),
    FOREIGN KEY(idItems2)REFERENCES Items(idItems),
    FOREIGN KEY(idUsers1)REFERENCES Users(idUsers),
    FOREIGN KEY(idUsers2)REFERENCES Users(idUsers)
); 

CREATE TABLE HistoriqueTransaction(
    idHistorique INT PRIMARY KEY AUTO_INCREMENT,
    idItems INT,
    idUsers INT,
    dateHeureEchange TIMESTAMP,
    FOREIGN KEY(idItems) REFERENCES Items(idItems),
    FOREIGN key(idUsers) REFERENCES Users(idUsers)
);

INSERT INTO Categories(nomCategories) VALUES("Livre");
INSERT INTO Categories(nomCategories) VALUES("DVD");
INSERT into Categories(nomCategories) VALUES("vetements homme");
insert into Categories(nomCategories) VALUES("vetement femme");

INSERT INTO Users(usersname,email,mdp,admin) VALUES("koto","koto@gmailcom","koto01",0);
INSERT INTO Users(usersname,email,mdp,admin) VALUES("rabe","rabe@gmail.com","rabe01",1);
INSERT INTO Users(usersname,email,mdp,admin) VALUES("randria","randria@gmail.com","randria01",1);
INSERT INTO Users(usersname,email,mdp,admin) VALUES("bema","bema@gamil.com","bema01",1);


INSERT into Items(nameItems,idUsers,idCategories,priceItems,photo,descri) VALUES("Tales a bedtime",02,01,12,"assets/image/Livre/L1.jpg","Roman");
INSERT into Items(nameItems,idUsers,idCategories,priceItems,photo,descri) VALUES("The passion within",03,01,20,"assets/image/Livre/L2.jpg","Woman journal");
INSERT into Items(nameItems,idUsers,idCategories,priceItems,photo,descri) VALUES("Anne Frank",03,02,15,"assets/image/DVD/D2.jpg","Some of best days of our lives");
INSERT into Items(nameItems,idUsers,idCategories,priceItems,photo,descri) VALUES("Cancer",04,04,10,"assets/image/DVD/D1.jpg","Album");
INSERT into Items(nameItems,idUsers,idCategories,priceItems,photo,descri) VALUES("shirt bleu",04,04,25,"assets/image/shirt_femme/l5.jpg","pour femme");
INSERT into Items(nameItems,idUsers,idCategories,priceItems,photo,descri) VALUES("shirt gris",02,04,25,"assets/image/shirt_femme/l6.jpg","pour femme");
INSERT into Items(nameItems,idUsers,idCategories,priceItems,photo,descri) VALUES("shirt noir",02,04,25,"assets/image/shirt_femme/l7.jpg","pour femme");
INSERT into Items(nameItems,idUsers,idCategories,priceItems,photo,descri) VALUES("chemise rouge",03,04,30,"assets/image/shirt_femme/l8.jpg","pour homme et femme");
INSERT into Items(nameItems,idUsers,idCategories,priceItems,photo,descri) VALUES("sweat blanc",02,03,50,"assets/image/shirt_homme/l1.jpg","sweat blanc pour homme");
INSERT into Items(nameItems,idUsers,idCategories,priceItems,photo,descri) VALUES("sweat armé",01,03,23,"assets/image/shirt_homme/l2.jpg","sweat blanc pour homme");
INSERT into Items(nameItems,idUsers,idCategories,priceItems,photo,descri) VALUES("maillot rouge ",02,03,55,"assets/image/shirt_homme/l4.jpg","Manchester United");
INSERT into Items(nameItems,idUsers,idCategories,priceItems,photo,descri) VALUES("maillot gris",03,03,60,"assets/image/shirt_homme/l3.jpg","Allemagne");
