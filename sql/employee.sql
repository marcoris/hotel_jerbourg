# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.25-0ubuntu0.18.04.2)
# Datenbank: loag
# Erstellt am: 2019-03-18 09:54:08 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Export von Tabelle employee
# ------------------------------------------------------------

DROP TABLE IF EXISTS `employee`;

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(11) DEFAULT NULL,
  `absence` int(11) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `personalnumber` varchar(45) DEFAULT NULL,
  `salutation` int(11) DEFAULT '0',
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `login` varchar(25) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;

INSERT INTO `employee` (`employee_id`, `category`, `absence`, `role`, `status`, `personalnumber`, `salutation`, `firstname`, `lastname`, `login`, `password`)
VALUES
	(1,3,1,1,NULL,'123',1,'Marco','Ris','Marco','599fc64fff9cddeab77e2678f22b8e2199c41f2dff6f7ae5d33fb3f6be5a8ad9'),
	(2,3,1,2,NULL,'456',1,'Dispo','Nent','Disponent','bd4927f4322d08b182d410f22cee90598a47e955f2bc006c44d13e40ae4ac7e4'),
	(3,2,1,3,NULL,'11',1,'Jim','Kontrolle','Jim','599fc64fff9cddeab77e2678f22b8e2199c41f2dff6f7ae5d33fb3f6be5a8ad9'),
	(4,1,1,3,NULL,'12',1,'Lukas','Loki','Lukas','cf216900425dcf074880747f7a045a98b837052a4b95f38ffff916c172426a31'),
	(5,1,1,3,NULL,'13',1,'Hans','Loko','Hans','9e1080faa8c65c8d390697c47d8107a0bb677f38643c8496ac9e9a771ffaf7f1'),
	(6,2,1,3,NULL,'15',1,'Ruedi','Kontr','Ruedi','7a90d8640e83cfa1990fd3c7b44c5b2c2ab2cf46f9e5dbd8973ac7bdf3be2c51'),
	(7,1,1,3,NULL,'321',1,'Gerhard','Boss','Gerhard','1982c9b7ce201a107752ba24f69cc8741f2cd4799fefe07b7fb7396736a01e3d'),
	(8,2,1,3,NULL,'112233',0,'Selena','Boss','Little','1a004eb989b06d0ccaf05abeb64c076f044dd5633d01ac1bcdc238b2323ff335'),
	(9,1,1,3,NULL,'16',0,'Eveline','Schoko','Loko','50c02147b0097c7d56315a2adfc1eb291539c58c7fc9083739b786068055bb9f'),
	(10,2,3,3,NULL,'666',1,'Peter','Krank','Peter','b1cbbfb7fc583809e8e2553cfaca9aa2be7ad105e93fc5b07a9c1251ed3e8525'),
	(11,2,1,3,NULL,'17',0,'Test','Kontrolle','Test','985ffceb93caf6daea48f4fdd142684ec44973512fb275f6fef41bbcbc093b66'),
	(12,1,2,3,NULL,'845',1,'Fahrin','Urlaub','Fahrin','6ca808ca55bbf8ecbf5193cc4ee2b3399e92e2c4368e524bd0002ffd0ba50f5b'),
	(13,1,1,3,NULL,'5984',1,'Lak','Lak','Lak','55a64a0efad654c918da835c982ee93ee43e8680274d2832485501076a9f3427'),
	(14,1,1,3,NULL,'598',1,'Looki','Looki','Looki','0de8dfcdac43a77e6caae922f9ecb0533c1e9d714ffd229990e5f673202c4dd9'),
	(15,1,1,3,NULL,'84156',1,'Lokoko','Lokoko','Lokoko','39317eb550d1af199e30a324504735dec18bfc9f62d3259b5dec2a464d337bb1'),
	(16,1,1,3,NULL,'4785',0,'Hikoto','Laki','Laki','59e1642a612e948488813f64c9263a6f32a39db05d36c54afb47d49b96b9ae94'),
	(17,1,1,3,NULL,'5889',1,'Horacio','Leiki','Leiki','778b7bc71af9bfda3f036f98d7e32c63a87503c3fa22e2bd5afec7fa831faea0'),
	(18,2,1,3,NULL,'1559',1,'Kon','Trolle','Kon','3a2a1abe167b31be109493e03bf52e5fe9672aa42e9aba002e8447a2fd74c161'),
	(19,2,1,3,NULL,'15489',0,'Kontr','Olle','Kontr','6ba4c84dbbfe036ede56edfec8b9689c5c769ebea9ca5e7b7f7a3c47f88d97c4'),
	(20,2,1,3,NULL,'156948',1,'Kant','Krantr','Kant','993ca80c8adc79e0977aec454ae53db681ed35858529663e0fd4decf36dae2e0'),
	(21,2,1,3,NULL,'3541',0,'Kontrolle','Kontrolle','Kontrolle','cc4128a4c0d03880625065c0b80d3e0771a2c88af99e45f1e7d6e8c84eae735e'),
	(22,2,1,3,NULL,'9575',1,'Letzte','Kontrolle','Letzte','d9508b71e704da48d5b0983f82a2d72fa8b99fd01ad0492c10d358f71b65cd33');

/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
