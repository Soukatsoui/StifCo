-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 25 Mars 2014 à 14:32
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `stifco`
--
CREATE DATABASE IF NOT EXISTS `Nom de la table` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `Nom de la table`;

-- --------------------------------------------------------

--
-- Structure de la table `fevrier`
--

CREATE TABLE IF NOT EXISTS `fevrier` (
  `id` varchar(18) NOT NULL,
  `ville` varchar(60) NOT NULL,
  `lieu` varchar(18) NOT NULL,
  `places` int(11) NOT NULL,
  `gare` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `fevrier`
--

INSERT INTO `fevrier` (`id`, `ville`, `lieu`, `places`, `gare`) VALUES
('2-13-2014 08:47', 'dammarie les lys', 'poste', 1, 'Melun'),
('2-16-2014 09:59', 'dammarie les lys', 'eglise', 2, 'Meaux');

-- --------------------------------------------------------

--
-- Structure de la table `juillet`
--

CREATE TABLE IF NOT EXISTS `juillet` (
  `id` varchar(18) NOT NULL,
  `ville` varchar(60) NOT NULL,
  `lieu` varchar(18) NOT NULL,
  `places` int(11) NOT NULL,
  `gare` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `juillet`
--

INSERT INTO `juillet` (`id`, `ville`, `lieu`, `places`, `gare`) VALUES
('5-7-2014 10:08', 'achere la foret', 'poste', 1, 'Melun'),
('7-5-2014 08:24', 'achere la foret', 'mairie', 3, 'Melun');

-- --------------------------------------------------------

--
-- Structure de la table `juin`
--

CREATE TABLE IF NOT EXISTS `juin` (
  `id` varchar(18) NOT NULL,
  `ville` varchar(60) NOT NULL,
  `lieu` varchar(18) NOT NULL,
  `places` int(11) NOT NULL,
  `gare` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `juin`
--

INSERT INTO `juin` (`id`, `ville`, `lieu`, `places`, `gare`) VALUES
('6-13-2014 22:16', 'ballancourt', 'poste', 1, 'Ballancourt');

-- --------------------------------------------------------

--
-- Structure de la table `mars`
--

CREATE TABLE IF NOT EXISTS `mars` (
  `id` varchar(18) NOT NULL,
  `ville` varchar(60) NOT NULL,
  `lieu` varchar(18) NOT NULL,
  `places` int(11) NOT NULL,
  `gare` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `mars`
--

INSERT INTO `mars` (`id`, `ville`, `lieu`, `places`, `gare`) VALUES
('3-14-2014 12:59', 'chartrettes', 'mairie', 2, 'Melun'),
('3-19-2014 16:43', 'Danmarie les lys', 'poste', 3, 'Melun'),
('3-4-2014 10:46', 'dammarie les lys', 'mairie', 3, 'Melun'),
('3-6-2014 09:14', 'dammarie les lys', 'poste', 2, 'Melun'),
('3-7-2014 18:44', 'boissettes', 'poste', 2, 'Melun'),
('3-9-2014 13:51', 'ville', 'poste', 3, 'Melun');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `email` varchar(42) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `ville` varchar(36) NOT NULL,
  `codepostal` int(7) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`email`, `nom`, `prenom`, `adresse`, `ville`, `codepostal`) VALUES
('donald.duck@rien.fr', 'Donald', 'Duck', '3 Rue des Canards', 'PicsouVille', 12345),
('gilles.chamillard@gmail.com', 'Chamillard', 'Gilles', '164 Allée des Pierres', 'Dammarie les Lys', 77190),
('nicolassoliveau@gmail.com', 'Soliveau', 'Nicolas', '3 chemin des sables', 'Saint Germain Laval', 77130),
('nizar.benragdel@gmail.com', 'ben rgadel', 'nizar', '138 rue salvador allende ', 'nanterre', 92000),
('O.C@stif.com', 'Chabaud', 'Ori', 'Linden house', 'Salventier', 86700),
('riri@riendutout.fr', 'riri', 'riri', 'rien', 'rien', 33333),
('snabouls@riendutt.fr', 'naboulsi', 'soumaya', '89 rue toto', 'paris', 75008),
('thana@riendutout.fr', 'Tharamalingam', 'Thanaletcumi', '45,rue royale', 'Fontainebleau', 77300),
('to@to.fr', 'tom', 'cho', 'ahaha', 'coulommiers', 77120),
('walther.laureen@gmail.com', 'Walther', 'Laureen', '12 allée du muguet', 'VAUX LE PENIL', 77000);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
