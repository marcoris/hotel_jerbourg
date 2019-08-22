# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: co-srv-xdberp1.contria.net (MySQL 5.6.27-log)
# Datenbank: hotel
# Erstellt am: 2019-08-19 08:22:36 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Export von Tabelle guests
# ------------------------------------------------------------

DROP TABLE IF EXISTS `guests`;

CREATE TABLE `guests` (
  `guest_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `salutation` int(11) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `birthday` varchar(11) DEFAULT NULL,
  `identity` varchar(11) DEFAULT NULL UNIQUE,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`guest_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `guests` WRITE;
/*!40000 ALTER TABLE `guests` DISABLE KEYS */;

INSERT INTO `guests` (`guest_id`, `salutation`, `firstname`, `lastname`, `birthday`, `identity`, `created`, `updated`, `deleted`)
VALUES
	(1,0,'Hans','Guckindieluft','01.01.1970','0123456789','2019-08-19 09:44:46',NULL,NULL),
	(2,1,'Hasi','Guckindieluft','01.01.1970','1234567890','2019-08-19 09:47:30',NULL,NULL),
	(3,0,'Marco','Ris','23.07.1984','2345678901','2019-08-19 09:48:05',NULL,NULL),
	(4,1,'Pamela','Anderson','01.01.1970','3456789012','2019-08-19 09:48:35',NULL,NULL),
	(5,1,'Sandra','Bullock','01.01.1970','4567890123','2019-08-19 09:49:17',NULL,NULL),
	(6,0,'Walter','White','01.01.1970','5678901234','2019-08-19 09:49:50',NULL,NULL),
	(7,1,'Skyler','White','01.01.1970','6789012345','2019-08-19 09:50:17',NULL,NULL),
	(8,0,'Jessy','Pinkman','01.01.1970','7890123456','2019-08-19 09:50:47',NULL,NULL),
	(9,0,'Homer','Simpson','01.01.1970','8901234567','2019-08-19 09:51:13',NULL,NULL),
	(10,1,'Marge','Simpson','01.01.1970','9012345678','2019-08-19 09:51:37',NULL,NULL),
	(11,1,'Sandra','Muster','01.01.1970','00112233445','2019-08-19 09:52:07',NULL,NULL);

/*!40000 ALTER TABLE `guests` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
