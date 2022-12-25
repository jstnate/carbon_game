# ************************************************************
# Sequel Ace SQL dump
# Version 20035
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.8.3-MariaDB)
# Database: carbon_db
# Generation Time: 2022-12-25 15:39:08 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table cards
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cards`;

CREATE TABLE `cards` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `card_name` varchar(255) NOT NULL,
  `carbon` float DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

LOCK TABLES `cards` WRITE;
/*!40000 ALTER TABLE `cards` DISABLE KEYS */;

INSERT INTO `cards` (`id`, `card_name`, `carbon`, `description`, `image_url`, `type`)
VALUES
	(5,'Transports en commun (Metro, Bus, Tramway)',35,'1 km, 1 passager','transports-commun.png','Transports'),
	(6,'Vélo',0,'1 km, 1 passager','velo.png','Transports'),
	(7,'TGV',2,'1 km, 1 passager','tgv.png','Transports'),
	(8,'Avion (long-courrier)',209,'1 km, 1 passager','avion-long.png','Transports'),
	(9,'Voiture thermique',150,'1 km, 1 passager','voiture-thermique.png','Transports'),
	(10,'Voiture électrique',53,'1 km, 1 passager','voiture-electrique.png','Transports'),
	(11,'Voilier',18,'1 km, 1 passager','voilier.png','Transports'),
	(12,'Paquebot',322,'1 km, 1 passager','paquebot.png','Transports'),
	(13,'Panneaux photovoltaïques',55,'1 KwH d\'électricité','panneau-photo.png','Énergie'),
	(14,'Barrage hydroélectrique',4,'1 KwH d\'électricité','barrage-hydro.png','Énergie'),
	(15,'Centrale à charbon',1038,'1 KwH d\'électricité','centrale-charbon.png','Énergie'),
	(16,'Eolienne',7,'1 KwH d\'électricité','eolienne.png','Énergie'),
	(17,'Centrale nucléaire',6,'1 KwH d\'électricité','nucleaire.png','Énergie'),
	(18,'Centrale au fioul',704,'1 KwH d\'électricité','centrale-fioul.png','Énergie'),
	(19,'Centrale à gaz',406,'1 KwH d\'électricité','centrale-gaz.png','Énergie'),
	(20,'Centrale géothermique',45,'1 KwH d\'électricité','geothermique.png','Énergie'),
	(21,'Vêtements de seconde main',25,'   ','vetements-occasion.png','Biens de consommation'),
	(22,'Vêtements neufs',90,'  ','vetements-neuf.png','Biens de consommation'),
	(23,'Matelas mousse neuf',275000,'Cycle de vie complet','matelas-neuf.png','Biens de consommation'),
	(24,'Matelas mousse d\'occasion',25000,'Cycle de vie complet','matelas-occasion.png','Biens de consommation'),
	(25,'Appareil ménager neuf',238,'Empreinte carbone par jour','menager-classique.png','Biens de consommation'),
	(26,'Appareil ménager à faible consommation énergétique',115,'Empreinte carbone par jour','menager-eco.png','Biens de consommation'),
	(27,'Chauffage au gaz ',712,' 2°C de +, consommation en une journée','chauffage-gaz.png','Maison / quotidien'),
	(28,'Chauffage au fioul',1082,' 2°C de +, consommation en une journée','fioul.png','Maison / quotidien'),
	(29,'Chauffage électrique',68,' 2°C de +, consommation en une journée','chauffage-elec.png','Maison / quotidien'),
	(30,'Ventilateur',8,'Utilisation pendant une journée','ventilateur.png','Maison / quotidien'),
	(31,'Climatisation',115,'Utilisation pendant une journée','clim.png','Maison / quotidien'),
	(32,'Pompe à chaleur',45,'par kWh','pompe-a-chaleur','Maison / quotidien'),
	(33,'Ampoules',71,'10 ampoules équivalents 60W, pendant une journée','ampoule.png','Maison / quotidien'),
	(34,'Ampoules LED',11,'10 ampoules équivalents 60W, pendant une journée','led.png','Maison / quotidien'),
	(35,'Chaudière au gaz',230,'par kWh','chaudiere-a-gaz.png','Maison / quotidien'),
	(36,'Bain ',20,' ','bain.png','Maison / quotidien'),
	(37,'Douche de 5 minutes',10,'Environ 15 litres / minutes','douche-5.png','Maison / quotidien'),
	(38,'Douche de  15 minutes',30,'Environ 15 litres / minutes','douche-15.png','Maison / quotidien'),
	(39,'1 épisode d\'une série en streaming',10,'En France','streaming.png','Loisirs'),
	(40,'1 heure de streaming musical ',55,' ','musique.png','Loisirs'),
	(41,'Jeu vidéo en dématérialisé',27000,' ','jeux-video.png','Loisirs'),
	(42,'Jeu vidéo en physique',20000,' ','jeux-video2.png','Loisirs'),
	(43,'Livre de poche',2700,'Cycle de vie complet','livre-de-poche.png','Loisirs'),
	(44,'Liseuse électronique',170000,'Cycle de vie complet','liseuse.png','Loisirs'),
	(45,'Viande rouge',53000,'1 kg\r\n','viande-rouge.png','Alimentation'),
	(46,'Bouteille de vin',1100,'75cl','vin.png','Alimentation'),
	(47,'Eau en bouteille',393,'1 litre','eau.png','Alimentation'),
	(48,'Eau du robinet',0,'1 litre','eau2.png','Alimentation'),
	(49,'Volaille',8000,'1 kg','volaille.png','Alimentation'),
	(50,'Agneau',25000,'1 kg','agneau.png','Alimentation'),
	(51,'Tri selectif et recyclage',-3000,'1 kg de plastique','tri.png','Habitudes éco-responsable'),
	(52,'Réduction du gaspillage alimentaire',-36000,'par personne, sur 1 an','gaspillage.png','Habitudes éco-responsable'),
	(53,'Ordinateur portable',169,'Cycle de vie complet','ordinateur.png','Numérique'),
	(54,'Smartphone',32,'Cycle de vie complet','smartphone.png','Numérique'),
	(55,'Mail',4,'Envoi d\'un mail','mail.png','Numérique'),
	(56,'Transaction d\'une NFT',48000,' ','transaction-nft.png','Numérique'),
	(57,'Data Center',500,'Consommation d\'une journée, environ 100 gigabits de données','data-center.png','Numérique'),
	(58,'Visioconférence d\'une heure',4,'Qualité HD (720p), 2 personnes','visioconference.png','Numérique');

/*!40000 ALTER TABLE `cards` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table messages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `messages`;

CREATE TABLE `messages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `society` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `description` text NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table partner
# ------------------------------------------------------------

DROP TABLE IF EXISTS `partner`;

CREATE TABLE `partner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `partner_name` varchar(255) NOT NULL,
  `partner_mail` varchar(250) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

LOCK TABLES `partner` WRITE;
/*!40000 ALTER TABLE `partner` DISABLE KEYS */;

INSERT INTO `partner` (`id`, `partner_name`, `partner_mail`, `logo`, `created_at`)
VALUES
	(10,'IIM Digital School','nicolas.rauber@devinci.fr','footer-iim.png','2022-12-21 23:53:28');

/*!40000 ALTER TABLE `partner` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `function` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`id`, `name`, `email`, `password`, `function`, `created_at`)
VALUES
	(1,'Nathan LEFETEY','nathan.lefetey@edu.devinci.fr','4b375fa12b9cb9a482a54e7cd2722714','administrateur','2022-12-16 16:04:25'),
	(2,'Adam SIMON','adam.simon@edu.devinci.fr','24de6ec03a257034fb13ece99574df1a','administrateur','2022-12-16 16:25:57'),
	(3,'Ambre KOUITINI','ambre.kouitini@edu.devinci.fr','ec9331a92577050b2f651e163ce406be','administrateur','2022-12-16 16:25:59'),
	(4,'Alexis BOUGY','alexis.bougy@edu.devinci.fr','ba7c94b0431f30103c7eb5cdae180be6','administrateur','2022-12-25 16:36:24'),
	(5,'Nicolas RAUBER','nicolas.rauber@edu.devinci.fr','ba7c94b0431f30103c7eb5cdae180be6','administrateur','2022-12-16 16:26:03');

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
