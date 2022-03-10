-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 10 mars 2022 à 19:46
-- Version du serveur : 5.7.36
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mp2_sujet3_1`
--
CREATE DATABASE IF NOT EXISTS `mp2_sujet3_1` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `mp2_sujet3_1`;

DELIMITER $$
--
-- Procédures
--
DROP PROCEDURE IF EXISTS `proc_add_article`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_add_article` (IN `_titre` VARCHAR(100) CHARSET utf8, IN `_desc` VARCHAR(150) CHARSET utf8, IN `_corps` TEXT CHARSET utf8, IN `_date` DATE, IN `_lien` VARCHAR(250) CHARSET utf8)  BEGIN
INSERT INTO 
`article`
(`descArticle`, `corpsArticle`, `dateArticle`, `titre`, `img`) VALUES (_desc,_corps,_date,_titre,_lien);

END$$

DROP PROCEDURE IF EXISTS `proc_add_user`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_add_user` (IN `_email` VARCHAR(250) CHARSET utf8, IN `_psw` VARCHAR(250) CHARSET utf8, IN `_prenom` VARCHAR(40) CHARSET utf8, IN `_nom` VARCHAR(40) CHARSET utf8)  BEGIN
INSERT INTO `utilisateur`(`emailUtilisateur`,`prenomUtilisateur`,`nomUtilisateur`, `pswUtilisateur`) VALUES (_email,_prenom,_nom,_psw);
END$$

DROP PROCEDURE IF EXISTS `proc_article_detaille`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_article_detaille` (IN `_id` INT)  BEGIN

SELECT *
FROM article
WHERE article.idArticle =_id;

END$$

DROP PROCEDURE IF EXISTS `proc_connexion_utilisateur`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_connexion_utilisateur` (IN `_email` VARCHAR(250) CHARSET utf8, IN `_psw` VARCHAR(250) CHARSET utf8)  BEGIN
SELECT * 
FROM `utilisateur` 
WHERE utilisateur.emailUtilisateur = _email
AND utilisateur.pswUtilisateur = _psw;

END$$

DROP PROCEDURE IF EXISTS `proc_delete_article`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_delete_article` (IN `_id` INT)  BEGIN
DELETE FROM `article` WHERE article.idArticle = _id;
END$$

DROP PROCEDURE IF EXISTS `proc_get_article`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_get_article` ()  BEGIN

SELECT *
FROM article;

END$$

DROP PROCEDURE IF EXISTS `proc_get_last_article`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_get_last_article` ()  BEGIN
SELECT *
FROM article
ORDER by article.dateArticle DESC
LIMIT 2;

END$$

DROP PROCEDURE IF EXISTS `proc_update_article`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_update_article` (IN `_id` INT, IN `_titre` VARCHAR(100) CHARSET utf8, IN `_desc` VARCHAR(150) CHARSET utf8, IN `_corps` TEXT CHARSET utf8, IN `_date` DATE, IN `_lien` VARCHAR(250) CHARSET utf8)  BEGIN
UPDATE `article` 
SET`descArticle`=_desc,
`corpsArticle`=_corps,
`dateArticle`=_date,
`titre`=_titre,
`img`=_lien 
WHERE article.idArticle = _id;

END$$

DROP PROCEDURE IF EXISTS `proc_update_psw`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_update_psw` (IN `_id` INT, IN `_psw` VARCHAR(250) CHARSET utf8)  BEGIN
UPDATE utilisateur SET utilisateur.pswUtilisateur = _psw WHERE utilisateur.id = _id;


END$$

DROP PROCEDURE IF EXISTS `proc_update_util`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_update_util` (IN `_id` INT, IN `_prenom` VARCHAR(40) CHARSET utf8, IN `_nom` VARCHAR(40) CHARSET utf8, IN `_email` VARCHAR(250) CHARSET utf8)  BEGIN

UPDATE `utilisateur` 
SET 
`nomUtilisateur`= _nom,
`prenomUtilisateur`= _prenom,
`emailUtilisateur`=_email 
WHERE utilisateur.id = _id;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `idArticle` int(11) NOT NULL AUTO_INCREMENT,
  `descArticle` varchar(150) NOT NULL,
  `corpsArticle` text NOT NULL,
  `dateArticle` date NOT NULL,
  `titre` varchar(100) NOT NULL,
  `img` varchar(250) NOT NULL,
  PRIMARY KEY (`idArticle`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`idArticle`, `descArticle`, `corpsArticle`, `dateArticle`, `titre`, `img`) VALUES
(1, 'L\'UniversitÃ© Le Havre Normandie s\'associe au message de solidaritÃ© adressÃ© par France UniversitÃ©s aux universitÃ©s ukrainiennes.', 'L\'UniversitÃ© Le Havre Normandie solidaire des universitÃ©s ukrainiennes\r\n\r\nDans les circonstances dramatiques que connaÃ®t l\'Ukraine, France UniversitÃ©s affirme sa solidaritÃ© avec les universitÃ©s d\'Ukraine qui sont pour les universitÃ©s franÃ§aises des partenaires privilÃ©giÃ©s, notamment dans le cadre de l\'Association des universitÃ©s europÃ©ennes (EUA). PrÃ©sents dans les alliances europÃ©ennes, nos collÃ¨gues enseignants et chercheurs ukrainiens doivent pouvoir retrouver au plus vite les conditions leur permettant de mener Ã  bien leurs enseignements et leurs travaux.\r\n\r\nLa prÃ©sidence franÃ§aise de l\'Union europÃ©enne doit aussi Ãªtre inopportunitÃ© de mobiliser toutes les Ã©nergies pour la sÃ©curitÃ© des Ã©tudiantes et des Ã©tudiants, et, plus largement, pour la paix.\r\n\r\nIl est de la responsabilitÃ© des universitÃ©s d\'Europe durer pour que la raison et intelligence emportent.', '2022-03-01', 'L\'UniversitÃ© Le Havre Normandie solidaire des universitÃ©s ukrainiennes', 'src/ukraine.jpg'),
(2, 'La section locale Normandie de la SociÃ©tÃ© FranÃ§aise de Physique participe...', 'La section locale Normandie de la SociÃ©tÃ© FranÃ§aise de Physique participe, comme l\'an passÃ©, Ã  la grande soirÃ©e Nuit des Temps 2022. Elle se dÃ©roulera le 10 mars 2022 et des confÃ©rences, dÃ©bats, tables rondes, expositions, et jeux interactifs y seront proposÃ©s.\r\n\r\nAu programme, deux confÃ©rences grand public, suivies dune connexion nationale multi-sites :\r\n\r\n18h00 Ã  18h30 : Ã  L\'imagerie ultra-rapide ou comment capturer des images Ã  la vitesse de la lumiÃ¨re !\r\nThomas GODIN  Enseignant Chercheur  DÃ©partement Optique et lasers - CORIA UMR CNRS 6614  UniversitÃ© de Rouen / INSA Rouen\r\n\r\n', '2022-03-07', 'La nuit des temps 2022', 'src/nuit.jpg'),
(3, 'Ateliers de formationvendredi 11 mars 2022 Ã  13:00Atelier de formationBU central', 'La bibliomÃ©trie est Ã©tude quantitative de la production de livres, de revues, d\'articles. Elle permet aux chercheurs de mesurer la production et la diffusion de leurs Ã©crits. Il existe plusieurs indicateurs et outils bibliomÃ©triques.\r\nVenez en savoir plus et rencontrer d\'autres doctorants et enseignants-chercheurs.\r\n\r\nCet atelier est animÃ© par le dÃ©partement appui Ã  la recherche de la BU.\r\n\r\nEn raison des conditions sanitaires actuelles, il est conseillÃ© de venir avec votre propre ordinateur ou tablette.\r\n\r\nDate : Vendredi 11 mars 2022 de 13h Ã  14h\r\n\r\nLieu : BU centrale du Havre, salle de formation', '2022-01-04', 'Initiation Ã  la bibliomÃ©trie', 'src/biblio.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

DROP TABLE IF EXISTS `formation`;
CREATE TABLE IF NOT EXISTS `formation` (
  `id_formation` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `duree` int(11) NOT NULL,
  `acces` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `presentation` longtext COLLATE utf8_unicode_ci,
  `debouches` longtext COLLATE utf8_unicode_ci,
  `type_formation` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nom_etablissement` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `titre_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_formation`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`id_formation`, `titre`, `duree`, `acces`, `presentation`, `debouches`, `type_formation`, `nom_etablissement`, `description`, `titre_url`) VALUES
(1, 'DUT informatique', 2, 'BaccalaurÃ©at', 'Les dÃ©partements Informatique des IUT forment les professionnels qui participent Ã  la conception, la rÃ©alisation et la mise en Å“uvre de solutions informatiques correspondant aux besoins des utilisateurs.\r\nLe technicien supÃ©rieur en informatique exerce son activitÃ© dans les entreprises et organisations : sociÃ©tÃ©s de service en ingÃ©nierie informatique (SSII), tÃ©lÃ©communications, banques, assurances, grande distribution, industries, centre d\'appels, services publics, Ã©diteurs de logiciels, etc.\r\nIl met ses compÃ©tences spÃ©cialistes en informatique (Web, mobile, embarquÃ©e, gestion, etc.) au service des fonctions des entreprises ou administrations (production industrielle, finance, comptabilitÃ©, ressources humaines, logistique, etc.).\r\n', 'Licence Professionnelle, Licence, Ã©cole ingÃ©nieur, DUETI : DiplÃ´me Universitaire Ã©tudes de technologie Ã  international de l\'IUT du Havre (poursuites d\'Ã©tudes Ã  l\'Ã©tranger). Les compÃ©tences acquises Ã  l\'issue de la formation permettent au technicien supÃ©rieur d\'occuper un emploi d\'informaticien, selon ses aptitudes et ses choix personnels, centre sur deux familles activitÃ©s : Famille activitÃ©s n1 : analyse, dÃ©veloppement, diagnostic et support du logiciel Famille activitÃ©s n 2 : administration, gestion et exploitation de parc, assistance technique Ã  des utilisateurs, clients, services.\r\n', 'DUT', 'IUT du Havre', 'Stage de professionnalisation de 10 semaines, peut Ãªtre fait Ã  l\'Ã©tranger. Dans le domaine de l\'informatique en gÃ©nÃ©ral.', 'DUT_informatique'),
(2, 'BUT informatique', 3, 'BaccalaurÃ©at', 'Cette formation a pour objectif de former en trois ans les informaticiens qui participent  la conception, la rÃ©alisation\r\nA travers le parcours-A  RÃ©alisation applications : conception, dÃ©veloppement, validation , nous nous concentrons sur le cycle de vie du logiciel : de expression du besoin client,  la conception,  la programmation,  la validation, et  la maintenance de application.\r\nElle forme aux mÃ©tiers de concepteur-dÃ©veloppeurs applications (mobile, web, Internet, jeux vidÃ©o)', 'Poursuite d\'Ã©tudes :\r\nLicence Professionnelle,\r\nLicence,\r\nÃ©cole ingÃ©nieur,\r\nDUETI : DiplÃ´me Universitaire d\'Ã©tudes de technologie Ã  l\'international de l\'IUT du Havre (poursuites Ã©tudes Ã  Ã©tranger).\r\nInsertion professionnelle :\r\nÃ©dition de logiciels\r\nProgrammation, conseil et autres activitÃ©s informatiques\r\nServices information\r\nTraitement de d\'annÃ©es, hÃ©bergement et activitÃ©s connexes ; portails internet\r\nMe?tiers :\r\nDÃ©butant :\r\nConcepteur de?veloppeur (applications, mobile, web, IoT, jeux vide?os...) ;\r\n\r\nAprÃ¨s 2 ou 3 annÃ©es expÃ©rience :\r\nLead dÃ©velopper (selon les secteurs et les technologies)\r\n\r\nSecteurs activitÃ©?s :\r\nAdministration entreprise\r\nCommerce - Distribution\r\nEnseignement\r\nIndustrie\r\nInformatique - TÃ©lÃ©communications\r\nSocial\r\n', 'BUT', 'IUT du Havre', 'Les compÃ©tences en informatique sont fondÃ©es, Ã  la fois, sur des enseignements thÃ©oriques solides, des travaux pratiques utilisant les technologies les plus modernes, des projets proches des situations industrielles et des stages d\'une durÃ©e totale de 24 semaines (8 en B.U.T. 2 et 16 en B.U.T.3).\r\nLe titulaire du BU.T. Informatique dispose de plus de compÃ©tences en matiÃ¨re de raisonnement et de modÃ©lisation mathÃ©matiques, en Ã©conomie et gestion des entreprises et des administrations, et en expression-communication et langue anglaise.', 'BUT_informatique'),
(3, 'Master informatique', 2, 'bac+3', 'Ce master informatique de lÃ©universitÃ© du Havre forme des cadres de haut niveau, ingÃ©nieurs et chercheurs possÃ©dant une solide culture informatique.\r\nLes compÃ©tences acquises, en particulier, concernent le Web, internet des objets, la sÃ©curitÃ©, la programmation mobile et le Big Data. Les jeunes diplÃ´mes sont capables exercer leur profession dans des industries de haute technologie, mais aussi apporter leur expertise dans des PME et des TPE.\r\nLa formation offre une approche contextuelle et globale des problÃ¨mes et des systÃ¨mes Ã©tudies, prenant en compte en particulier les incertitudes inhÃ©rentes aux environnements rÃ©els. Les Ã©tudiants ainsi formÃ©s sont prÃ©parÃ©s au traitement de problÃ¨mes, Ã©ventuellement partiellement dÃ©finis, relevant de domaines variÃ©s dans lesquels informatique et le numÃ©rique sont fortement prÃ©sents.', 'Poursuite d\'Ã©tude :     Architecte WEB,\r\n    Architecte de d\'annÃ©es Informatiques,\r\n    Architecte systÃ¨me et rÃ©seaux,\r\n    Chef de projet internet,\r\n    Data scientist,\r\n    IngÃ©nieur Ã©tude, ingÃ©nieur de dÃ©veloppement,\r\n    Chef de projet informatique, architecte informatique rÃ©partie,\r\n    Concepteur Informatique,\r\n    DÃ©veloppeur Big Data,\r\n    Chef de service ordonnancement, responsable planification\r\n    IngÃ©nieur mÃ©thode ordonnancement, planification\r\n    IngÃ©nieur technico-commercial...', 'Master', '', '', 'Master_informatique'),
(8, 'Licence Pro DASI', 1, 'bac +2', 'La licence DASI a pour objectif de former les Ã©tudiants  l\'acquisition de compÃ©tences techniques dans le domaine du dÃ©veloppement et de administration de sites Web. Les cours comportent 450h de cours obligatoires dont 40% sont dispensÃ©s par des professionnels. 150h de projets tuteurs et 15 semaines de stage pour les Ã©lÃ¨ves en initiales.\r\n\r\nLes Ã©tudiants seront en capacitÃ© de rÃ©aliser du dÃ©veloppement logiciel, comme du dÃ©veloppement web, gÃ©rer une base de donnÃ©es.', ' AprÃ¨s obtention de leur licence, les Ã©tudiants peuvent devenir:\r\n    IntÃ©grateur Web\r\n    DÃ©veloppeur Internet-Intranet-Extranet\r\n    Gestionnaire de sites de commerce Ã©lectronique\r\n    Administrateur de bases de donnÃ©es pour le Web\r\n    DÃ©veloppeur Client-Serveur et Web\r\n    Chef de projet NTIC\r\n    Chef de projet Web\r\n    Chef de projet e-commerce\r\n    Responsable sÃ©curitÃ© des systÃ¨mes information.\r\n', 'Licence Professionelle', 'IUT du Havre', 'L\'annÃ©e peut se faire en initiale ou en alternance. \r\nPendant que les Ã©tudiants alternants sont en entreprise, les autres sont en mode projet. Ils auront un projet par semestre et une periode de stage de 15 semaines dans une entreprise de l\'informatique.', 'Licence_DASI'),
(9, 'Licence Informatique', 3, 'Baccalaureat', 'La licence informatique apporte des connaissances thÃ©oriques et pratiques dans les grands domaines de informatique gÃ©nÃ©rale et scientifique (algorithmique et programmation, gestion des bases de donnÃ©es, gÃ©nie logiciel, programmation web, systÃ¨me exploitation et rÃ©seaux...). Elle permet Ã©galement acquÃ©rir des connaissances en mathÃ©matiques.', 'La vocation principale de la Licence Informatique est de poursuivre en Master. Toutefois elle peut permettre accÃ©der aux mÃ©tiers :\r\nAdministrateur de bases de d\'annÃ©es, dÃ©veloppeur web, administrateur systÃ¨me ou rÃ©seaux... dans les secteurs activitÃ©s suivants : Secteur privÃ© (industriel ou de service) ou public (administration, grands organismes ou collectivitÃ©s territoriales) ou dans les centres de recherche et de dÃ©veloppement publics ou privÃ©s', 'Licence', 'Site Lebon , UFR des Sciences et Techniques', '', 'Licence_Info');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomUtilisateur` varchar(40) NOT NULL,
  `prenomUtilisateur` varchar(40) NOT NULL,
  `emailUtilisateur` varchar(250) NOT NULL,
  `pswUtilisateur` varchar(250) NOT NULL,
  `perm` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nomUtilisateur`, `prenomUtilisateur`, `emailUtilisateur`, `pswUtilisateur`, `perm`) VALUES
(1, 'Hubert', 'Jean', 'test@test.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0),
(3, 'Dupont', 'Pierre', 'util@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0),
(16, 'Kiop', 'Alexandra', 'e@e', '58e6b3a414a1e090dfc6029add0f3555ccba127f', 0),
(17, 'PrÃ©sentation', 'Utilisateur', 'presentation@test.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
