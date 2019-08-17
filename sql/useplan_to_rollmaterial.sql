# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.25-0ubuntu0.18.04.2)
# Datenbank: loag
# Erstellt am: 2019-03-15 10:36:59 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Export von Tabelle useplan_to_rollmaterial
# ------------------------------------------------------------

DROP TABLE IF EXISTS `useplan_to_rollmaterial`;

CREATE TABLE `useplan_to_rollmaterial` (
  `useplan_id` int(11) DEFAULT NULL,
  `rollmaterial_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

LOCK TABLES `useplan_to_rollmaterial` WRITE;
/*!40000 ALTER TABLE `useplan_to_rollmaterial` DISABLE KEYS */;

INSERT INTO `useplan_to_rollmaterial` (`useplan_id`, `rollmaterial_id`)
VALUES
	(1,14),
	(1,2),
	(1,3),
	(1,4),
	(2,14),
	(2,2),
	(2,3),
	(2,4),
	(3,20),
	(3,2),
	(3,6),
	(3,3),
	(3,4),
	(3,8),
	(3,9),
	(4,13),
	(4,2),
	(4,3),
	(4,4),
	(5,21),
	(5,2),
	(5,6),
	(5,3),
	(5,4),
	(5,8),
	(5,9),
	(6,23),
	(6,2),
	(6,6),
	(6,3),
	(6,4),
	(6,8),
	(6,9),
	(7,20),
	(7,2),
	(7,3),
	(7,4),
	(8,21),
	(8,2),
	(8,3),
	(8,4),
	(9,23),
	(9,2),
	(9,3),
	(9,4),
	(10,18),
	(10,2),
	(10,3),
	(10,4),
	(11,14),
	(11,2),
	(11,3),
	(11,4),
	(12,23),
	(12,2),
	(12,6),
	(12,3),
	(12,4),
	(12,8),
	(12,9);

/*!40000 ALTER TABLE `useplan_to_rollmaterial` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
