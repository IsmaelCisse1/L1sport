CREATE DATABASE IF NOT EXISTS L1sport;
USE L1sport;

CREATE TABLE Utilisateur (
    user_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    role ENUM('user', 'admin') NOT NULL DEFAULT 'user',
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(50) UNIQUE NOT NULL,
    mdp VARCHAR(100) NOT NULL, 
    adresse VARCHAR(255) NOT NULL,
    payclick_user VARCHAR(50) NOT NULL
);

CREATE TABLE Abonnement (
    abo_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nomAbo VARCHAR(255),
    prixAbo DECIMAL(10,2),
    descAbo TEXT,
    date_debut DATE,
    date_fin DATE,
    status ENUM('actif', 'inactif')
);

CREATE TABLE Users_abo (
    user_abo_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    user_id INT,
    abo_id INT,
    FOREIGN KEY (user_id) REFERENCES Utilisateur(user_id),
    FOREIGN KEY (abo_id) REFERENCES Abonnement(abo_id)
);

CREATE TABLE Gestion_admin (
    gestion_admin_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    article_id INT,
    user_id INT,
    FOREIGN KEY (article_id) REFERENCES Article(article_id),
    FOREIGN KEY (user_id) REFERENCES Utilisateur(user_id)
);

CREATE TABLE Article (
    article_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    titreArticle VARCHAR(50),
    contenuArticle TEXT,
    photoArticle VARCHAR(255),
    videoArticle VARCHAR(255)
);

CREATE TABLE Club (
    club_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nomEquipe VARCHAR(50),
    logoEquipe VARCHAR(255)
);

CREATE TABLE Match (
    match_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    club_id INT,
    lieuMatch VARCHAR(50),
    dateMatch DATETIME,
    scoreMatch VARCHAR(10),
    FOREIGN KEY (club_id) REFERENCES Club(club_id)
);
