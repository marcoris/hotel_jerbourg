# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: co-srv-xdberp1.contria.net (MySQL 5.6.27-log)
# Datenbank: hotel
# Erstellt am: 2019-08-19 08:20:56 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Export von Tabelle bookings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `bookings`;

CREATE TABLE `bookings` (
  `booking_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `guest1_id` int(11) NOT NULL DEFAULT '0',
  `guest2_id` int(11) NOT NULL DEFAULT '0',
  `room_id` int(11) NOT NULL DEFAULT '0',
  `booking_status` int(11) NOT NULL DEFAULT '0',
  `arrive` varchar(11) DEFAULT '',
  `depart` varchar(11) DEFAULT '',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`booking_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `bookings` WRITE;
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;

INSERT INTO `bookings` (`booking_id`, `guest1_id`, `guest2_id`, `room_id`, `booking_status`, `arrive`, `depart`, `created`, `updated`, `deleted`)
VALUES
	(1,1,2,1,4,'18.12.2018','25.12.2018','2018-12-16 10:06:41',NULL,NULL),
	(2,1,11,10,4,'01.07.2019','02.07.2019','2019-01-01 10:09:00',NULL,NULL),
	(3,3,0,10,1,'18.08.2019','20.08.2019','2019-08-19 10:11:32',NULL,NULL),
	(4,4,5,11,1,'18.08.2019','22.08.2019','2019-08-19 10:12:44',NULL,NULL),
	(5,6,7,6,0,'20.08.2019','25.08.2019','2019-08-19 10:14:15',NULL,NULL),
	(6,8,0,13,1,'20.08.2019','26.08.2019','2019-08-19 10:15:11',NULL,NULL),
	(7,3,11,2,1,'20.08.2019','21.08.2019','2019-08-19 10:18:08',NULL,NULL),
	(8,8,11,3,1,'20.08.2019','21.08.2019','2019-08-19 10:18:48',NULL,NULL),
	(9,9,10,4,1,'25.08.2019','30.08.2019','2019-08-19 10:19:37',NULL,NULL),
	(10,11,0,5,2,'26.08.2019','27.08.2019','2019-08-19 10:20:22',NULL,NULL);

/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
