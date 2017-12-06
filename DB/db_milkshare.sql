-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 06 Décembre 2017 à 14:21
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_milkshare`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_article`
--

CREATE TABLE `t_article` (
  `idArticle` int(11) NOT NULL,
  `artNom` varchar(150) NOT NULL,
  `artPrix` decimal(15,3) NOT NULL,
  `artDescription` tinytext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_article`
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
  `cliNom` varchar(50) NOT NULL,
  `cliPrenom` varchar(50) NOT NULL,
  `cliMail` varchar(254) NOT NULL,
  `cliMotDePasse` varchar(25) NOT NULL,
  `cliAdresse` varchar(200) NOT NULL,
  `cliLocalite` varchar(50) NOT NULL,
  `cliCodePostal` int(11) NOT NULL,
  `cliTel` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_client`
--

INSERT INTO `t_client` (`idClient`, `cliNom`, `cliPrenom`, `cliMail`, `cliMotDePasse`, `cliAdresse`, `cliLocalite`, `cliCodePostal`, `cliTel`) VALUES
(1, 'Alexandre', 'MICHEL', 'alex@michel.co', '.etml-', 'Rue de Sébeillon 12', 'Lausanne', 1004, '888 888 88 88'),
(2, 'Canton', 'Dylan', 'cantondy@etml.educanet2.ch', '.etml-', 'Rte de Lausanne 16', 'Le Mont-sur-Lausanne ', 1052, '+41766151157'),
(4, 'Beggah', 'Bader', 'beggahba@etml.educanet2.ch', '.etml-', 'Chemin de la Cassinette 7', 'Lausanne', 1018, '+41787750702'),
(6, 'Valzino', 'Benjamin', 'valzinobe@etml.educanet2.ch', '.etml-', 'Av. de Morges 7', 'Lausanne', 1004, '+41768035310'),
(7, 'Simpson', 'Bart', 'simpsonbart@yahoo.fr', '.etml-', 'Route de Genève 25', 'Lausanne', 1004, '+41787787787'),
(8, 'Delajungle', 'Eliza', 'delajungle.Eliza@ahoo.fr', '.etml-', 'Rue de la Borde 25', 'Lausanne', 1018, '+41787574747'),
(10, 'Dinosaure', 'Denver', 'denver@yahoo.fr', '.etml-', 'Rue de la Borde 15', 'Lausanne', 1018, '+41778787744');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_commande`
--

INSERT INTO `t_commande` (`idCommande`, `comDateDemande`, `comDateLivraison`, `comQuantite`, `fkClient`, `fkArticle`) VALUES
(1, '2017-11-22', '2017-11-22', 2, 1, 1),
(2, '2017-11-22', '2019-08-01', 50, 1, 2),
(3, '2017-11-22', '2017-11-22', 3, 1, 2),
(4, '2017-11-30', '2017-12-30', 20, 2, 2),
(5, '2017-12-01', '2017-12-04', 10, 8, 1),
(6, '2017-12-01', '2017-12-04', 2, 6, 2);

--
-- Index pour les tables exportées
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
-- AUTO_INCREMENT pour les tables exportées
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
  MODIFY `idClient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `t_commande`
--
ALTER TABLE `t_commande`
  MODIFY `idCommande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `t_commande`
--
ALTER TABLE `t_commande`
  ADD CONSTRAINT `FK_t_commande_idArticle` FOREIGN KEY (`fkArticle`) REFERENCES `t_article` (`idArticle`),
  ADD CONSTRAINT `FK_t_commande_idClient` FOREIGN KEY (`fkClient`) REFERENCES `t_client` (`idClient`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
