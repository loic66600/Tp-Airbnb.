-- MySQL dump 10.13  Distrib 5.7.29, for Linux (x86_64)
--
-- Host: localhost    Database: data_base_airbnb
-- ------------------------------------------------------
-- Server version	5.7.29

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES UTF8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(255) DEFAULT NULL,
  `zip_code` int(11) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `address`
--

LOCK TABLES `address` WRITE;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
INSERT INTO `address` VALUES (1,'12 rue du paradis',66000,'Perpignan','France','0658673165'),(2,'13 rue du plaisir',66600,'Rivesaltes','France','0658613041'),(3,'12 rue du paradis',66000,'La Valette','Malte','0658673165'),(4,'14 avenue de Prades',66500,'Prades','France','0623252128'),(5,'route de Chambord',41000,'Chambord','France','0268516378'),(6,'1 avenue du cocotier',10200,'Port  Louis','Maurice','1836313235'),(7,NULL,NULL,NULL,NULL,NULL),(8,'12 rue du paradis',41000,'orleans','France','0658613036'),(9,NULL,NULL,NULL,NULL,NULL),(10,'12 rue du paradis',66600,'Calce','France','0764169927'),(11,NULL,NULL,NULL,NULL,NULL),(12,NULL,NULL,NULL,NULL,NULL),(13,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipement`
--

DROP TABLE IF EXISTS `equipement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipement`
--

LOCK TABLES `equipement` WRITE;
/*!40000 ALTER TABLE `equipement` DISABLE KEYS */;
INSERT INTO `equipement` VALUES (1,'Produits de nettoyage','Salle de bain','produit.svg'),(2,'Shampooing','Salle de bain','shampooing.svg'),(3,'Douche extérieure','Salle de bain','douche-ex.svg'),(4,'Eau chaude','Salle de bain','eau-chaude.svg'),(5,'Lave-linge','Chambre et linge','lave-linge.svg'),(6,'Draps','Chambre et linge','draps.svg'),(7,'Oreillers et couvertures supplémentaires','Chambre et linge','oreiller.svg'),(8,'Stores','Chambre et linge','store.svg'),(9,'Fer à repasser','Chambre et linge','fer.svg'),(10,'Étendoir à linge','Chambre et linge','etendoir.svg'),(11,'TV HD','Divertissement','tv.svg'),(12,'Système audio','Divertissement','audio.svg'),(13,'Lit pour bébé','Famille','lit-baby.svg'),(14,'Lit parapluie','Famille','lit-parapluie.svg'),(15,'Jouets et livres pour enfants','Famille','jouet.svg'),(16,'Baignoire pour bébés','Famille','baignoir-baby.svg'),(17,'Vaisselle pour enfants','Famille','vaisselle-baby.svg'),(18,'Caches-prises','Famille','cache-prise.svg'),(19,'Barrières de sécurité pour bébé','Famille','security-barriere.svg'),(20,'Climatisation centrale','Chauffage et climisation','clim.svg'),(21,'Chauffage central','Chauffage et climisation','chauffage.svg'),(22,'Wi-Fi','Internet et bureau','wifi.svg'),(23,'Espace de travail','Internet et bureau','bureau.svg'),(24,'Cuisine','Cuisine et salle à manger','cuisine.svg'),(25,'Réfrigérateur','Cuisine et salle à manger','frigo.svg'),(26,'Four à micro-ondes','Cuisine et salle à manger','microndes.svg'),(27,'Équipements de cuisine de base','Cuisine et salle à manger','ustensible.svg'),(28,'Vaisselle et couverts','Cuisine et salle à manger','vaisselle.svg'),(29,'Four','Cuisine et salle à manger','four.svg'),(30,'Bouilloire électrique','Cuisine et salle à manger','bouilloire.svg'),(31,'Cafetière','Cuisine et salle à manger','cafetiere.svg'),(32,'Grille-pain','Cuisine et salle à manger','grille-pain.svg'),(33,'Table à manger','Cuisine et salle à manger','table-manger.svg'),(34,'Plaque de cuisson','Cuisine et salle à manger','plaque.svg'),(35,'Entrée privée','Caractéristiques','entrer.svg'),(36,'Entrée public','Caractéristiques','entrer.svg'),(37,'Privé : patio ou balcon','Extérieur','balcon.svg'),(38,'Mobilier extérieur','Extérieur','mobilier.svg'),(39,'Espace repas en plein air','Extérieur','mobilier.svg'),(40,'Barbecue','Extérieur','barbecue.svg'),(41,'Vélos','Extérieur','velo.svg'),(42,'Chaises longues','Extérieur','chaise-longue.svg'),(43,'Parking privé (2 places)','Parking et installations','voiture.svg'),(44,'Parking gratuit dans la rue','Parking et installations','voiture.svg');
/*!40000 ALTER TABLE `equipement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logement`
--

DROP TABLE IF EXISTS `logement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `price_per_night` float DEFAULT NULL,
  `nb_room` int(11) DEFAULT NULL,
  `nb_bed` int(11) DEFAULT NULL,
  `nb_bath` int(11) DEFAULT NULL,
  `nb_traveler` int(11) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `type_id` (`type_id`),
  KEY `user_id` (`user_id`),
  KEY `address_id` (`address_id`),
  CONSTRAINT `logement_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`),
  CONSTRAINT `logement_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `logement_ibfk_3` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logement`
--

LOCK TABLES `logement` WRITE;
/*!40000 ALTER TABLE `logement` DISABLE KEYS */;
INSERT INTO `logement` VALUES (1,'Maison','maison avec piscine chauffée 55 m2 sécurisée avec plage et escaliers ,bain finlandais et  sauna extérieur 8 personnes dans un cadre naturelle et paisible, maison toute équipée avec grande cuisine , véranda salon cocooning, grandes pièces à vivre avec cheminée , 2 chambres avec lits doubles et 1 avec lit double et lit à étage,  Joli parc animalier où les enfants pourrons découvrir de nombreux animaux, plan d\'eau et grands espaces extérieurs.',92,1,1,1,2,1,1,2,1),(2,'Cabane','Cabane dans les arbres pour deux personnes. La petite cabane dispose d\'un canapé, d’un lit 2 places, de l\'électricité (lumière et prise de courant), d\'une douche à l\'Italienne (eau chaude) et d\'un WC. Pour les nuits moins chaudes, le logement dispose d\'un petit chauffage. A l\'extérieur, vous pourrez profiter de la petite terrasse avec une vue sur les montagnes, face au coucher du soleil ! ',80,1,1,1,1,1,2,2,2),(3,'Île','a Villa Lighthouse Ligero de luxe avec jacuzzi est située sur l\'île d\'Hôte, à 20 m de la mer, à 5 km de la plage de galets Milna et à 2,8 km du centre de Vis. Villa de luxe Lighthouse Ligero s\'étend sur 91 m2 de surface habitable sur une propriété de 44 000 m2.',150,4,8,2,4,1,3,2,3),(4,'Moulin','Indigo Windmill est un joyau caché sur la côte portugaise, c\'est le cadre parfait pour vos vacances !  Il dispose de caractéristiques uniques : il a été construit sur le sommet de la colline du centre-ville de Lourinhã, à côté d\'une ancienne église du XIVe siècle, de sorte qu\'il a l\'impression d\'être à la campagne, mais à distance de marche du centre-ville ! C\'est aussi l\'un des rares moulins à vent avec un espace de vie extérieur agréable et à seulement 3 minutes de la plage !  Vous tomberez amoureux du séjour au moulin à vent Indigo ! Chaque espace est fait pour plaire à vos sens !  Le logement La propriété est murée, elle dispose de deux accès, d\'un portail pour accéder au parking et d\'une porte arrière avec accès au centre ville !  Vous entrez dans le jardin et passerez par la pergola(nous mettons simplement des rideaux verticaux pour vous garder au chaud en hiver). Il dispose d\'un jacuzzi, d\'une cuisine entièrement équipée avec barbecue, d\'une table pour 6 personnes et d\'un canapé. Un escalier en pierre vous amènera au patio du moulin à vent d\'où vous aurez une vue agréable et paisible sur les environs. À l\'intérieur du moulin à vent, au rez-de-chaussée, il y aura la cuisine et la salle de bain, à l\'étage un salon/salle à manger et dans le grenier sous le mât du moulin à vent, une chambre magique confortable avec vue sur l\'église.  Accès des voyageurs Tous les espaces sont accessibles et exclusifs pour nos clients  Autres remarques - Les voyageurs de plus de 190 cm (6\'4\") pourraient rencontrer des désagréments dans la cuisine et la salle de bain où le plafond ne fait que 191 cm - Le canapé est confortable pour une personne de taille moyenne - Les enfants sont les bienvenus, cependant, en raison de la structure du moulin à vent, les escaliers  peuvent être un risque potentiel. Cependant, les fenêtres peuvent être ouvertes pour éviter les risques. Nous vous recommandons de les surveiller à l\'intérieur du moulin à vent.  ',62,1,1,1,1,1,4,2,4),(5,'Chateau',' Le Château de Longecourt situé à 15 Km de Dijon est un havre de paix pour votre halte en Bourgogne! Nous vous réserverons un accueil chaleureux et convivial. Vous ne manquerez pas d\'être séduit par l\'authenticité du lieu, des chambres et des jardins.',165,4,6,1,8,1,5,2,5),(6,'paradis','Casa Ana fait partie des 8 villas privées de The Villas at Rincon Bay, situées dans le quartier tropical d\'Ocama Retreat de 35 acres. Profitez d\'un luxe contemporain discret et d\'un service de style complexe hôtelier 5 étoiles dans ce paradis naturel avec 3 plages, des sentiers sinueux de la jungle et une vue époustouflante sur l\'océan. La villa est un chef-d\' œuvre architectural, qui s\'étend sur trois niveaux intérieurs, dont deux terrasses, des chaises suspendues, une piscine à débordement, des douches extérieures et une cuisine complète. La quintessence de la vie tropicale !',75,1,1,1,2,1,6,2,6),(7,'Bellevue','maison de campagne',69,2,2,1,4,0,1,3,8),(8,'la rossignol ','maison de campagne au millieu de foret',78,2,2,1,4,1,1,3,10);
/*!40000 ALTER TABLE `logement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logementequipement`
--

DROP TABLE IF EXISTS `logementequipement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logementequipement` (
  `logement_id` int(11) NOT NULL,
  `equipement_id` int(11) NOT NULL,
  PRIMARY KEY (`logement_id`,`equipement_id`),
  KEY `equipement_id` (`equipement_id`),
  CONSTRAINT `logementequipement_ibfk_1` FOREIGN KEY (`logement_id`) REFERENCES `logement` (`id`),
  CONSTRAINT `logementequipement_ibfk_2` FOREIGN KEY (`equipement_id`) REFERENCES `equipement` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logementequipement`
--

LOCK TABLES `logementequipement` WRITE;
/*!40000 ALTER TABLE `logementequipement` DISABLE KEYS */;
INSERT INTO `logementequipement` VALUES (1,1),(4,2),(5,2),(6,2),(1,3),(6,3),(8,5),(2,6),(3,6),(7,6),(3,7),(7,7),(1,11),(5,11),(7,11),(8,11),(4,12),(6,12),(8,20),(1,22),(3,22),(7,22),(8,22),(5,23),(7,23),(8,23),(7,24),(4,25),(2,31),(4,31),(8,31),(2,32),(2,33),(3,37),(6,39),(5,43);
/*!40000 ALTER TABLE `logementequipement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `logement_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `logement_id` (`logement_id`),
  CONSTRAINT `media_ibfk_1` FOREIGN KEY (`logement_id`) REFERENCES `logement` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media`
--

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
INSERT INTO `media` VALUES (1,'maison1','maison1.webp',1,1),(2,'cabane','cabane.webp',1,2),(3,'ile','maison_ile3.webp',1,3),(4,'moulin','moulin4.webp',1,4),(5,'chateau','chateau.webp',1,5),(6,'paradis','paradis.webp',1,6),(7,'interieur','interieur1.webp',1,1),(9,'salon','salon2.webp',1,2),(10,'cabane','vuecabane2.webp',1,2),(13,'lit','lit3.webp',1,3),(14,'vue','vue3.webp',1,3),(15,'vue','vue4.webp',1,4),(16,'douche','douche4.webp',1,4),(17,'vestige','vestige5.webp',1,5),(18,'gallerie','gallerie5.webp',1,5),(19,'lit','lit1.webp',1,1),(20,'vue','vue5.webp',1,6),(21,'fauteuil','fauteuille5.webp',1,6),(22,NULL,'667524352cbac_maisonCampagne.webp',NULL,7),(23,NULL,'6675439ee5f16_maisonCampagne.webp',NULL,8);
/*!40000 ALTER TABLE `media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_number` varchar(255) DEFAULT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `nb_adult` int(11) DEFAULT NULL,
  `nb_child` int(11) DEFAULT NULL,
  `price_total` float DEFAULT NULL,
  `logement_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `logement_id` (`logement_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`logement_id`) REFERENCES `logement` (`id`),
  CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservation`
--

LOCK TABLES `reservation` WRITE;
/*!40000 ALTER TABLE `reservation` DISABLE KEYS */;
INSERT INTO `reservation` VALUES (43,'FACT2406_1','2024-06-18','2024-06-23',1,1,460,1,3),(65,'FACT2406_00065','2024-07-02','2024-07-04',1,0,156,8,3);
/*!40000 ALTER TABLE `reservation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type`
--

LOCK TABLES `type` WRITE;
/*!40000 ALTER TABLE `type` DISABLE KEYS */;
INSERT INTO `type` VALUES (1,'Maison','maison1.webp',1),(2,'Cabane','cabane.webp',1),(3,'Isoler','maison_ile3',1),(4,'Moulin','moulin4.webp',1),(5,'Chateau','chateau.webp',1),(6,'Île de paradis','paradis.webp',1),(7,'Villa','Villa.png',1),(8,'Grand froid','Grand froid.png',1),(9,'Paris','Paris.png',1);
/*!40000 ALTER TABLE `type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `address_id` (`address_id`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (2,'admin@admin.fr','$2y$10$MojYjG5JkzN.3W4cV8wEaOFG38J9/xC.3jOXn7sZeKjXNHHKbiUA6','Loic','Rossignol',1,2),(3,'admin2@admin.com','$2y$10$qQBeDqH0e8l1AfnsXsGgD.V693gFwkE9Gh.F8d.i4lurSUoDKdKQO','Rossignol','loic',1,3),(5,'eymeric57@hotmail.fr','$2y$10$JopuKhr0FAF6tk/AX9mXhukGNafQKdY55ESnyKWqeKpYXg2tnAiGm','Marlier','eymeric',1,9),(6,'user@psg.fr','$2y$10$8eExAULPAztUMy.bJeJEee54XdWfDHY5z.qSx23PW/a8tc0IIDsli','Bauer','Geoffrey',1,11),(7,'admin@psg.fr','$2y$10$RWstZ7GPBDg/rflDIBBoOueNP.uXZu/1NuTn1MBwplr4NelUHISMK','Bauer','Geoffrey',1,12),(8,'vbijufhff@fhfj.fr','$2y$10$qnp8/6uehkP.UHJRtEgpSuTDobDlH7xBNuWxVu/IYwv/QLFmkesOq','big','dil',1,13);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-21 15:00:48
