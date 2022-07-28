-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 28 juil. 2022 à 12:09
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
-- Base de données : `bibliotheque2`
--
CREATE DATABASE IF NOT EXISTS `bibliotheque2` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bibliotheque2`;

-- --------------------------------------------------------

--
-- Structure de la table `etat`
--

DROP TABLE IF EXISTS `etat`;
CREATE TABLE IF NOT EXISTS `etat` (
  `id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `etat` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etat`
--

INSERT INTO `etat` (`id`, `etat`) VALUES
(1, 'Parfait'),
(2, 'Bon'),
(3, 'Moyen'),
(4, 'Mauvais'),
(5, 'Horrible');

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

DROP TABLE IF EXISTS `film`;
CREATE TABLE IF NOT EXISTS `film` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `titre` varchar(120) NOT NULL,
  `description` text NOT NULL,
  `date_parution` datetime NOT NULL,
  `photo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`id`, `titre`, `description`, `date_parution`, `photo`) VALUES
(1, 'La ligne verte', 'Paul Edgecomb, pensionnaire centenaire d\'une maison de retraite, est hanté par ses souvenirs. Gardien-chef du pénitencier de Cold Mountain, en 1935, en Louisiane, il était chargé de veiller au bon déroulement des exécutions capitales au bloc E (la ligne verte) en s\'efforçant d\'adoucir les derniers moments des condamnés. Parmi eux se trouvait un colosse du nom de John Coffey, accusé du viol et du meurtre de deux fillettes.', '2022-07-28 12:01:57', 'http://fr.web.img4.acsta.net/medias/nmedia/18/66/15/78/19254683.jpg'),
(2, 'Les visiteurs', 'Comment en l\'An de Grâce 1112, le comte de Montmirail et son fidèle écuyer, Jacquouille la Fripouille, vont se retrouver propulsés en l\'an 1992 après avoir bu une potion magique fabriquée par l\'enchanteur Eusaebius leur permettant de se défaire d\'un terrible sort.', '2022-07-28 12:01:57', 'http://fr.web.img6.acsta.net/medias/nmedia/18/36/07/69/18659413.jpg'),
(3, 'Jumper', 'David Rice a toujours cru qu\'il était parfaitement ordinaire avant qu\'il ne découvre par accident qu\'il possède un don. David est un Jumper, qui peut se téléporter partout où il veut.', '2022-07-28 12:02:56', 'http://fr.web.img6.acsta.net/c_215_290/medias/nmedia/18/65/09/72/18888244.jpg'),
(4, 'Le Hobbit', 'Le Hobbit est une oeuvre cinématographique américano-néo-zélandaise de fantasy coécrite, produite et réalisée par Peter Jackson, adaptée du roman Le Hobbit de l\'écrivain britannique J. R. R. Tolkien. Elle est composée d\'Un voyage inattendu, de La Désolation de Smaug et de La Bataille des Cinq Armées.', '2022-07-28 12:02:56', 'https://static.fnac-static.com/multimedia/FR/Images_Produits/FR/fnac.com/Visual_Principal_340/1/5/6/0602537155651/tsp20121108114103/Le-Hobbit-un-voyage-inattendu.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `id_user` int(6) NOT NULL,
  `ref_produit` varchar(40) NOT NULL,
  `date_location` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_utilisateur_location` (`id_user`),
  KEY `fk_produit_location` (`ref_produit`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `location`
--

INSERT INTO `location` (`id`, `id_user`, `ref_produit`, `date_location`) VALUES
(1, 1, 'HB-201', '2019-04-01 00:00:00'),
(2, 1, 'TX-203', '2019-04-23 00:00:00'),
(3, 4, 'HB-201', '2019-04-29 00:00:00'),
(4, 1, 'XS-123', '2018-04-02 00:00:00'),
(5, 3, 'HB-201', '2019-04-29 00:00:00'),
(6, 3, 'TX-203', '2019-04-01 00:00:00'),
(7, 3, 'XS-123', '2019-04-01 00:00:00'),
(8, 3, 'XW-555', '2019-04-07 00:00:00'),
(9, 1, 'TX-203', '2019-04-02 00:00:00'),
(10, 1, 'XW-555', '2019-04-23 00:00:00'),
(11, 2, 'XW-555', '2019-04-23 00:00:00'),
(12, 3, 'XS-123', '2019-04-21 00:00:00'),
(13, 3, 'XX-12', '2019-04-16 00:00:00'),
(14, 4, 'XS-123', '2019-04-15 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `ref` varchar(40) NOT NULL,
  `id_film` int(6) NOT NULL,
  `stock` tinyint(1) NOT NULL,
  `id_etat` tinyint(1) NOT NULL,
  PRIMARY KEY (`ref`),
  KEY `fk_etat_produit` (`id_etat`),
  KEY `fk_film_produit` (`id_film`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`ref`, `id_film`, `stock`, `id_etat`) VALUES
('1113115934XXX-D-XXX429612441', 1, 1, 1),
('1149258824XXX-D-XXX1770447252', 1, 1, 1),
('11806319XXX-D-XXX910612679', 1, 1, 1),
('1439635869XXX-D-XXX1379167154', 1, 1, 1),
('1687543377XXX-D-XXX2112394587', 1, 1, 1),
('1926384314XXX-D-XXX918392079', 1, 1, 1),
('2025558832XXX-D-XXX268876745', 1, 1, 1),
('20XXX-D-XXX2', 1, 1, 1),
('20XXX-D-XXX74', 1, 1, 1),
('24XXX-D-XXX62', 1, 1, 1),
('28XXX-D-XXX11', 1, 1, 1),
('29XXX-D-XXX69', 1, 1, 1),
('37XXX-D-XXX62', 1, 1, 1),
('37XXX-D-XXX7', 1, 1, 1),
('38XXX-D-XXX73', 1, 1, 1),
('6XXX-D-XXX4', 1, 1, 1),
('7XXX-D-XXX34', 1, 1, 1),
('811445009XXX-D-XXX1706666770', 1, 1, 1),
('CXW-52', 4, 1, 1),
('FD-4562', 1, 1, 4),
('FS-5542', 1, 1, 2),
('HB-201', 4, 1, 2),
('JHG-542', 2, 1, 2),
('TX-203', 1, 1, 1),
('XS-123', 3, 1, 3),
('XW-555', 2, 0, 2),
('XX-12', 3, 1, 2),
('XXX-D-XXX', 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `nom` varchar(60) NOT NULL,
  `prenom` varchar(60) NOT NULL,
  `mail` varchar(120) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `activation` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `mail`, `ip`, `date_creation`, `activation`) VALUES
(1, 'Martin', 'Julien', 'm.julien@gmail.com', '125.25.24.3', '2022-07-28 12:01:26', 1),
(2, 'Pierre', 'Louis', 'p.louis@outlook.fr', '225.210.14.25', '2022-07-28 12:01:26', 0),
(3, 'Guillart', 'Benjamin', 'bgdu59@gmail.com', '201.210.2.10', '2022-07-28 12:01:26', 1),
(4, 'Demette', 'Sofiane', 'petitfiloudubled@gmail.com', '211.25.14.10', '2022-07-28 12:01:26', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `fk_produit_location` FOREIGN KEY (`ref_produit`) REFERENCES `produit` (`ref`),
  ADD CONSTRAINT `fk_utilisateur_location` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `fk_etat_produit` FOREIGN KEY (`id_etat`) REFERENCES `etat` (`id`),
  ADD CONSTRAINT `fk_film_produit` FOREIGN KEY (`id_film`) REFERENCES `film` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
