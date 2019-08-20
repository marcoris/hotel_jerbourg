# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: co-srv-xdberp1.contria.net (MySQL 5.6.27-log)
# Datenbank: hotel
# Erstellt am: 2019-08-20 15:02:51 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Export von Tabelle guest_to_booking
# ------------------------------------------------------------

DROP TABLE IF EXISTS `guest_to_booking`;

CREATE TABLE `guest_to_booking` (
  `booking_id` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `guest_to_booking` WRITE;
/*!40000 ALTER TABLE `guest_to_booking` DISABLE KEYS */;

INSERT INTO `guest_to_booking` (`booking_id`, `guest_id`)
VALUES
	(1,1),
	(1,2),
	(2,1),
	(2,11),
	(3,3),
	(4,4),
	(4,5),
	(5,6),
	(5,7),
	(6,8),
	(7,3),
	(7,11),
	(8,8),
	(8,11),
	(9,9),
	(9,10),
	(10,11);

/*!40000 ALTER TABLE `guest_to_booking` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
