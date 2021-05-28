-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 28 mai 2021 à 08:00
-- Version du serveur :  5.7.31
-- Version de PHP : 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `eclaireurs`
--

-- --------------------------------------------------------

--
-- Structure de la table `activite`
--

DROP TABLE IF EXISTS `activite`;
CREATE TABLE IF NOT EXISTS `activite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateDebut` date NOT NULL,
  `heureDebut` time NOT NULL,
  `dateFin` date NOT NULL,
  `heureFin` time NOT NULL,
  `lieu` varchar(150) NOT NULL,
  `lieuRDV` varchar(100) NOT NULL,
  `prix` float NOT NULL,
  `description` varchar(1500) NOT NULL,
  `id_TRANSPORT` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ACTIVITE_TRANSPORT0_FK` (`id_TRANSPORT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `branche`
--

DROP TABLE IF EXISTS `branche`;
CREATE TABLE IF NOT EXISTS `branche` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  `ageDebut` int(11) NOT NULL,
  `ageFin` int(11) NOT NULL,
  `id_RESPONSABLE` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `branche`
--

INSERT INTO `branche` (`id`, `libelle`, `ageDebut`, `ageFin`, `id_RESPONSABLE`) VALUES
(1, 'Louveteaux', 8, 11, 0),
(2, 'Les éclaireurs', 12, 15, 0),
(3, 'Les aînés', 16, 19, 0);

-- --------------------------------------------------------

--
-- Structure de la table `encadrer`
--

DROP TABLE IF EXISTS `encadrer`;
CREATE TABLE IF NOT EXISTS `encadrer` (
  `id` int(11) NOT NULL,
  `id_ACTIVITE` int(11) NOT NULL,
  PRIMARY KEY (`id`,`id_ACTIVITE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `jeune`
--

DROP TABLE IF EXISTS `jeune`;
CREATE TABLE IF NOT EXISTS `jeune` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `dateNaissance` date NOT NULL,
  `sexe` char(1) NOT NULL,
  `rue` varchar(100) NOT NULL,
  `codePostal` varchar(5) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `mail` varchar(75) NOT NULL,
  `cotisation` float NOT NULL,
  `id_PARENT` int(11) NOT NULL,
  `id_PARENT_Parent2` int(11) DEFAULT NULL,
  `id_BRANCHE` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `parent`
--

DROP TABLE IF EXISTS `parent`;
CREATE TABLE IF NOT EXISTS `parent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `sexe` char(1) NOT NULL,
  `rue` varchar(100) NOT NULL,
  `codePostal` varchar(5) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `mail` varchar(75) NOT NULL,
  `idRole` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `participer`
--

DROP TABLE IF EXISTS `participer`;
CREATE TABLE IF NOT EXISTS `participer` (
  `id` int(11) NOT NULL,
  `id_JEUNE` int(11) NOT NULL,
  `regleON` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`,`id_JEUNE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `posseder`
--

DROP TABLE IF EXISTS `posseder`;
CREATE TABLE IF NOT EXISTS `posseder` (
  `id` int(11) NOT NULL,
  `id_RESPONSABLE` int(11) NOT NULL,
  `dateObtention` date NOT NULL,
  PRIMARY KEY (`id`,`id_RESPONSABLE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `proposer`
--

DROP TABLE IF EXISTS `proposer`;
CREATE TABLE IF NOT EXISTS `proposer` (
  `id` int(11) NOT NULL,
  `id_PARENT` int(11) NOT NULL,
  `nbPlaces` int(11) NOT NULL,
  PRIMARY KEY (`id`,`id_PARENT`),
  KEY `Proposer_PARENT1_FK` (`id_PARENT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `qualification`
--

DROP TABLE IF EXISTS `qualification`;
CREATE TABLE IF NOT EXISTS `qualification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `intitule` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `responsable`
--

DROP TABLE IF EXISTS `responsable`;
CREATE TABLE IF NOT EXISTS `responsable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `sexe` char(1) NOT NULL,
  `dateNaissance` date NOT NULL,
  `rue` varchar(100) NOT NULL,
  `codePostal` varchar(5) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `mail` varchar(75) NOT NULL,
  `id_BRANCHE` int(11) NOT NULL,
  `idRole` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `RESPONSABLE_BRANCHE0_FK` (`id_BRANCHE`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `responsable`
--

INSERT INTO `responsable` (`id`, `nom`, `prenom`, `sexe`, `dateNaissance`, `rue`, `codePostal`, `ville`, `telephone`, `mail`, `id_BRANCHE`, `idRole`) VALUES
(4, 'Dietmann', 'Loïc', 'M', '2001-10-20', '23 avenue des champs', '68116', 'Guewenheim', '0715461465', 'loic.dietmann@a2l.project', 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permission` varchar(50) DEFAULT NULL,
  `login` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `permission`, `login`, `password`, `level`) VALUES
(1, 'administrateur', 'admin', 'administrateur', 1),
(2, 'responsable', 'resp1', 'resp1', 2),
(13, 'parent', 'eric.ostermann', 'Qywnkpnp6G', 3);

-- --------------------------------------------------------

--
-- Structure de la table `transport`
--

DROP TABLE IF EXISTS `transport`;
CREATE TABLE IF NOT EXISTS `transport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `activite`
--
ALTER TABLE `activite`
  ADD CONSTRAINT `ACTIVITE_TRANSPORT0_FK` FOREIGN KEY (`id_TRANSPORT`) REFERENCES `transport` (`id`);

--
-- Contraintes pour la table `proposer`
--
ALTER TABLE `proposer`
  ADD CONSTRAINT `Proposer_ACTIVITE0_FK` FOREIGN KEY (`id`) REFERENCES `activite` (`id`),
  ADD CONSTRAINT `Proposer_PARENT1_FK` FOREIGN KEY (`id_PARENT`) REFERENCES `parent` (`id`);

--
-- Contraintes pour la table `responsable`
--
ALTER TABLE `responsable`
  ADD CONSTRAINT `RESPONSABLE_BRANCHE0_FK` FOREIGN KEY (`id_BRANCHE`) REFERENCES `branche` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
