-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 22 nov. 2017 à 16:17
-- Version du serveur :  5.7.17
-- Version de PHP :  7.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_milkshare`
--

CREATE DATABASE IF NOT EXISTS db_milkshare DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE db_milkshare;

-- --------------------------------------------------------

--
-- Structure de la table `t_article`
--

CREATE TABLE `t_article` (
  `idArticle` int(11) NOT NULL,
  `artNom` varchar(150) COLLATE utf8_general_ci NOT NULL,
  `artPrix` decimal(15,3) NOT NULL,
  `artDescription` tinytext COLLATE utf8_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `t_article`
--

INSERT INTO `t_article` (`idArticle`, `artNom`, `artPrix`, `artDescription`) VALUES
(1, 'Lait entier bio', '2.000', 'Lait BIO à 2 fr le litre.'),
(2, 'Paquet œufs de poule', '3.600', 'Paquet de 6 œufs de poule Bio');

-- --------------------------------------------------------

--
-- Structure de la table `t_client`
--

CREATE TABLE `t_client` (
  `idClient` int(11) NOT NULL,
  `cliNom` varchar(50) COLLATE utf8_general_ci NOT NULL,
  `cliPrenom` varchar(50) COLLATE utf8_general_ci NOT NULL,
  `cliMail` varchar(25) COLLATE utf8_general_ci NOT NULL,
  `cliMotDePasse` varchar(25) COLLATE utf8_general_ci NOT NULL,
  `cliAdresse` varchar(200) COLLATE utf8_general_ci NOT NULL,
  `cliLocalite` varchar(50) COLLATE utf8_general_ci NOT NULL,
  `cliCodePostal` int(11) NOT NULL,
  `cliTel` varchar(20) COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `t_client`
--

INSERT INTO `t_client` (`idClient`, `cliNom`, `cliPrenom`, `cliMail`, `cliMotDePasse`, `cliAdresse`, `cliLocalite`, `cliCodePostal`, `cliTel`) VALUES
(1, 'Alexandre', 'MICHEL', 'alex@michel.co', '.Alex-44', 'ETML', 'Lausanne', 1001, '888 888 88 88');

-- --------------------------------------------------------

--
-- Structure de la table `t_commande`
--

CREATE TABLE `t_commande` (
  `idCommande` int(11) NOT NULL,
  `comDateDemande` date NOT NULL,
  `comDateLivraison` date NOT NULL,
  `comQuantite` int(11) NOT NULL,
  `fkClient` int(11) NOT NULL,
  `fkArticle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `t_commande`
--

INSERT INTO `t_commande` (`idCommande`, `comDateDemande`, `comDateLivraison`, `comQuantite`, `fkClient`, `fkArticle`) VALUES
(1, '2017-11-22', '2017-11-22', 2, 1, 1),
(2, '2017-11-22', '2019-08-01', 50, 1, 2),
(3, '2017-11-22', '2017-11-22', 3, 1, 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `t_article`
--
ALTER TABLE `t_article`
  ADD PRIMARY KEY (`idArticle`);

--
-- Index pour la table `t_client`
--
ALTER TABLE `t_client`
  ADD PRIMARY KEY (`idClient`);

--
-- Index pour la table `t_commande`
--
ALTER TABLE `t_commande`
  ADD PRIMARY KEY (`idCommande`),
  ADD KEY `FK_t_commande_idClient` (`fkClient`),
  ADD KEY `FK_t_commande_idArticle` (`fkArticle`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `t_article`
--
ALTER TABLE `t_article`
  MODIFY `idArticle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `t_client`
--
ALTER TABLE `t_client`
  MODIFY `idClient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `t_commande`
--
ALTER TABLE `t_commande`
  MODIFY `idCommande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `t_commande`
--
ALTER TABLE `t_commande`
  ADD CONSTRAINT `FK_t_commande_idArticle` FOREIGN KEY (`fkArticle`) REFERENCES `t_article` (`idArticle`),
  ADD CONSTRAINT `FK_t_commande_idClient` FOREIGN KEY (`fkClient`) REFERENCES `t_client` (`idClient`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
