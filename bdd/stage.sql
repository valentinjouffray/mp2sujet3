-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 10 mars 2022 à 20:23
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetmp2`
--

-- --------------------------------------------------------

--
-- Structure de la table `stage`
--

DROP TABLE IF EXISTS `stage`;
CREATE TABLE IF NOT EXISTS `stage` (
  `stage_id` int(11) NOT NULL AUTO_INCREMENT,
  `stage_libelle` varchar(256) NOT NULL,
  `stage_description` text NOT NULL,
  `stage_entreprise` varchar(128) NOT NULL,
  `stage_date_debut` date DEFAULT NULL,
  `stage_date_fin` date DEFAULT NULL,
  `stage_disponible` tinyint(1) NOT NULL,
  PRIMARY KEY (`stage_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `stage`
--

INSERT INTO `stage` (`stage_id`, `stage_libelle`, `stage_description`, `stage_entreprise`, `stage_date_debut`, `stage_date_fin`, `stage_disponible`) VALUES
(3, 'Traduction de documents.', 'Besoin d\'aide pour traduire des textes.', 'Food Catering Co', '2022-03-14', '2022-04-16', 1),
(2, 'Faire le café', 'Besoin d\'aide pour faire fonctionner la cafetière.', 'Lenovo', '2022-03-17', '2022-03-22', 1),
(11, 'Test2', 'TestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTest', 'Test1', '2022-03-14', '2022-03-18', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
