DROP TABLE IF EXISTS `stage`;
CREATE TABLE IF NOT EXISTS `stage` (
  `stage_id` int(11) NOT NULL AUTO_INCREMENT,
  `stage_libelle` varchar(256) NOT NULL,
  `stage_entreprise` varchar(128) NOT NULL,
  `stage_date_debut` date DEFAULT NULL,
  `stage_date_fin` date DEFAULT NULL,
  `stage_disponible` tinyint(1) NOT NULL,
  PRIMARY KEY (`stage_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `stage` (`stage_id`, `stage_libelle`, `stage_entreprise`, `stage_date_debut`, `stage_date_fin`, `stage_disponible`) VALUES
(1, 'Brancher un clavier', 'Ubisoft', '2022-03-14', '2022-03-15', 1);
COMMIT;

