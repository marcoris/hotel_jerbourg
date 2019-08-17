# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.25-0ubuntu0.18.04.2)
# Datenbank: loag
# Erstellt am: 2019-03-15 10:34:31 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Export von Tabelle station_to_line
# ------------------------------------------------------------

DROP TABLE IF EXISTS `station_to_line`;

CREATE TABLE `station_to_line` (
  `station_id` int(11) DEFAULT NULL,
  `line_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

LOCK TABLES `station_to_line` WRITE;
/*!40000 ALTER TABLE `station_to_line` DISABLE KEYS */;

INSERT INTO `station_to_line` (`station_id`, `line_id`)
VALUES
	(1,2),
	(2,2),
	(3,2),
	(4,2),
	(5,2),
	(6,2),
	(7,2),
	(8,2),
	(9,2),
	(10,3),
	(11,3),
	(12,3),
	(13,3),
	(14,3),
	(15,3),
	(16,3),
	(17,3),
	(18,3),
	(19,4),
	(20,4),
	(21,4),
	(22,4),
	(23,4),
	(24,4),
	(25,4),
	(26,4),
	(27,4),
	(28,5),
	(29,5),
	(30,5),
	(31,5),
	(32,5),
	(33,5),
	(34,5),
	(35,5);

/*!40000 ALTER TABLE `station_to_line` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
