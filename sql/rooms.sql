# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: co-srv-xdberp1.contria.net (MySQL 5.6.27-log)
# Datenbank: hotel
# Erstellt am: 2019-08-19 08:22:55 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Export von Tabelle rooms
# ------------------------------------------------------------

DROP TABLE IF EXISTS `rooms`;

CREATE TABLE `rooms` (
  `room_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `room_number` varchar(11) DEFAULT NULL,
  `room_status` int(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `rooms` WRITE;
/*!40000 ALTER TABLE `rooms` DISABLE KEYS */;

INSERT INTO `rooms` (`room_id`, `category_id`, `room_number`, `room_status`, `created`, `updated`, `deleted`)
VALUES
	(1,1,'100',0,'2019-08-19 09:54:17',NULL,NULL),
	(2,1,'101',1,'2019-08-19 09:54:17',NULL,NULL),
	(3,1,'102',1,'2019-08-19 09:54:17',NULL,NULL),
	(4,1,'103',1,'2019-08-19 09:54:17',NULL,NULL),
	(5,1,'104',1,'2019-08-19 09:54:17',NULL,NULL),
	(6,2,'200',0,'2019-08-19 09:54:17',NULL,NULL),
	(7,2,'201',0,'2019-08-19 09:54:17',NULL,NULL),
	(8,2,'202',0,'2019-08-19 09:54:17',NULL,NULL),
	(9,2,'203',0,'2019-08-19 09:54:17',NULL,NULL),
	(10,3,'300',1,'2019-08-19 09:54:17',NULL,NULL),
	(11,3,'301',1,'2019-08-19 09:54:17',NULL,NULL),
	(12,3,'302',0,'2019-08-19 09:54:17',NULL,NULL),
	(13,3,'303',1,'2019-08-19 09:54:17',NULL,NULL),
	(14,1,'105',0,'2019-08-19 09:54:17',NULL,NULL),
	(15,1,'106',0,'2019-08-19 09:54:17',NULL,NULL),
	(16,1,'107',0,'2019-08-19 09:54:17',NULL,NULL),
	(17,1,'108',0,'2019-08-19 09:54:17',NULL,NULL),
	(18,1,'109',0,'2019-08-19 09:54:17',NULL,NULL),
	(19,1,'110',0,'2019-08-19 09:54:17',NULL,NULL),
	(20,1,'111',0,'2019-08-19 09:54:17',NULL,NULL),
	(21,1,'112',0,'2019-08-19 09:54:17',NULL,NULL),
	(22,1,'113',0,'2019-08-19 09:54:17',NULL,NULL),
	(23,1,'114',0,'2019-08-19 09:54:17',NULL,NULL),
	(24,2,'204',0,'2019-08-19 09:54:17',NULL,NULL),
	(25,2,'205',0,'2019-08-19 09:54:17',NULL,NULL),
	(26,2,'206',0,'2019-08-19 09:54:17',NULL,NULL),
	(27,2,'207',0,'2019-08-19 09:54:17',NULL,NULL),
	(28,2,'208',0,'2019-08-19 09:54:17',NULL,NULL),
	(29,2,'209',0,'2019-08-19 09:54:17',NULL,NULL);

/*!40000 ALTER TABLE `rooms` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
