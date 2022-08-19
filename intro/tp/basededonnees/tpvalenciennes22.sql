-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 17 août 2022 à 15:17
-- Version du serveur : 5.7.21
-- Version de PHP : 8.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tpvalenciennes22`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `nom` varchar(150) NOT NULL,
  `prenom` varchar(150) NOT NULL,
  `mail` varchar(220) NOT NULL,
  `demande` text NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `nom`, `prenom`, `mail`, `demande`, `date_creation`) VALUES
(1, 'test', 'test', 'test@test.fr', 'salut c\'est cool', '2022-08-17 10:54:18');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `civilite` enum('1','2') NOT NULL,
  `nom` varchar(120) NOT NULL,
  `prenom` varchar(120) NOT NULL,
  `naissance` date NOT NULL,
  `email` varchar(180) NOT NULL,
  `password` varchar(220) NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `civilite`, `nom`, `prenom`, `naissance`, `email`, `password`, `date_creation`, `ip`) VALUES
(1, '1', 'PARIS', 'Anthony', '1990-01-01', 'test@test.fr', '123456', '2022-08-17 10:11:34', '::1'),
(2, '1', 'test', 'test', '1990-01-01', 'test1@test.fr', '123456', '2022-08-17 10:17:10', '::1'),
(4, '1', 'l\'test', 'jean', '1990-10-10', 'testtest@test.fr', '123456', '2022-08-17 11:20:28', '123.123.123');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
