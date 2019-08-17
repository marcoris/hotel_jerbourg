# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.25-0ubuntu0.18.04.2)
# Datenbank: loag
# Erstellt am: 2019-03-15 10:36:06 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Export von Tabelle useplan_to_employee
# ------------------------------------------------------------

DROP TABLE IF EXISTS `useplan_to_employee`;

CREATE TABLE `useplan_to_employee` (
  `useplan_id` int(11) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

LOCK TABLES `useplan_to_employee` WRITE;
/*!40000 ALTER TABLE `useplan_to_employee` DISABLE KEYS */;

INSERT INTO `useplan_to_employee` (`useplan_id`, `employee_id`)
VALUES
	(1,3),
	(1,4),
	(2,3),
	(2,17),
	(3,3),
	(3,12),
	(4,3),
	(4,7),
	(5,3),
	(5,12),
	(6,3),
	(6,14),
	(7,5),
	(7,3),
	(8,5),
	(8,18),
	(9,5),
	(9,11),
	(10,5),
	(10,21),
	(11,5),
	(11,22),
	(12,5),
	(12,19);

/*!40000 ALTER TABLE `useplan_to_employee` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
