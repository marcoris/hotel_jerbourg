# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.25-0ubuntu0.18.04.2)
# Datenbank: loag
# Erstellt am: 2019-03-18 09:55:14 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Export von Tabelle station
# ------------------------------------------------------------

DROP TABLE IF EXISTS `station`;

CREATE TABLE `station` (
  `station_id` int(11) NOT NULL AUTO_INCREMENT,
  `station_name` varchar(45) DEFAULT NULL,
  `station_time` int(11) DEFAULT NULL,
  `sequence` int(11) DEFAULT NULL,
  `station_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`station_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `station` WRITE;
/*!40000 ALTER TABLE `station` DISABLE KEYS */;

INSERT INTO `station` (`station_id`, `station_name`, `station_time`, `sequence`, `station_status`)
VALUES
	(1,'Station1.1',1,1,1),
	(2,'Station1.2',2,2,0),
	(3,'Station1.3',1,3,0),
	(4,'Station1.4',2,4,0),
	(5,'Station1.5',3,5,2),
	(6,'Station1.6',2,6,0),
	(7,'Station1.7',1,7,0),
	(8,'Station1.8',2,8,0),
	(9,'Station1.9',2,9,1),
	(10,'Station2.1',1,1,1),
	(11,'Station2.2',2,2,0),
	(12,'Station2.3',1,3,0),
	(13,'Station2.4',2,4,0),
	(14,'Station2.5',1,5,2),
	(15,'Station2.6',2,6,0),
	(16,'Station2.7',3,7,0),
	(17,'Station2.8',2,8,0),
	(18,'Station2.9',1,9,1),
	(19,'Station3.1',1,1,1),
	(20,'Station3.2',1,2,0),
	(21,'Station3.3',2,3,0),
	(22,'Station3.4',3,4,0),
	(23,'Station3.5',2,5,2),
	(24,'Station3.6',3,6,0),
	(25,'Station3.7',2,7,0),
	(26,'Station3.8',3,8,0),
	(27,'Station3.9',2,9,1),
	(28,'Station4.1',1,1,1),
	(29,'Station4.2',2,2,0),
	(30,'Station4.3',1,3,0),
	(31,'Station4.4',2,4,0),
	(32,'Station4.5',3,5,0),
	(33,'Station4.6',2,6,0),
	(34,'Station4.7',2,7,0),
	(35,'Station4.8',3,8,2);

/*!40000 ALTER TABLE `station` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
