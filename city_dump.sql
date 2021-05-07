-- MySQL dump 10.13  Distrib 8.0.15, for Win64 (x86_64)
--
-- Host: localhost    Database: city
-- ------------------------------------------------------
-- Server version	8.0.15

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8mb4 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `baner`
--

DROP TABLE IF EXISTS `baner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `baner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adver_text` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `owner` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sedate` (`start_date`,`end_date`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `baner`
--

LOCK TABLES `baner` WRITE;
/*!40000 ALTER TABLE `baner` DISABLE KEYS */;
INSERT INTO `baner` VALUES (5,'&lt;h1&gt;TEST&lt;/h1&gt;','C:\\Users\\alkostyakov\\Desktop\\city\\usrimg\\1604560130airplane.jpg',2,'2020-11-05 00:00:00','2020-11-09 00:00:00'),(6,'this is test','usrimganer_img.jpg',2,'2021-03-25 00:00:00','2021-03-26 00:00:00');
/*!40000 ALTER TABLE `baner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bidders`
--

DROP TABLE IF EXISTS `bidders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `bidders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tender_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `price` int(6) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tender_id` (`tender_id`),
  KEY `company_id` (`company_id`),
  CONSTRAINT `bidders_ibfk_1` FOREIGN KEY (`tender_id`) REFERENCES `tender` (`id`),
  CONSTRAINT `bidders_ibfk_2` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bidders`
--

LOCK TABLES `bidders` WRITE;
/*!40000 ALTER TABLE `bidders` DISABLE KEYS */;
INSERT INTO `bidders` VALUES (4,1,20,15000,'I can do it!'),(5,3,20,20000,'I can do it!!!!'),(7,2,20,24000,'This is my offer!'),(8,4,20,23000,'I can do it');
/*!40000 ALTER TABLE `bidders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `c_document_type`
--

DROP TABLE IF EXISTS `c_document_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `c_document_type` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `descript` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `c_document_type`
--

LOCK TABLES `c_document_type` WRITE;
/*!40000 ALTER TABLE `c_document_type` DISABLE KEYS */;
INSERT INTO `c_document_type` VALUES (1,'Lease contract'),(2,'Fire chek');
/*!40000 ALTER TABLE `c_document_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `c_type`
--

DROP TABLE IF EXISTS `c_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `c_type` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `descript` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `c_type`
--

LOCK TABLES `c_type` WRITE;
/*!40000 ALTER TABLE `c_type` DISABLE KEYS */;
INSERT INTO `c_type` VALUES (1,'test'),(2,'entertainment');
/*!40000 ALTER TABLE `c_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `city_metadata`
--

DROP TABLE IF EXISTS `city_metadata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `city_metadata` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `city_metadata`
--

LOCK TABLES `city_metadata` WRITE;
/*!40000 ALTER TABLE `city_metadata` DISABLE KEYS */;
INSERT INTO `city_metadata` VALUES (1,'shows','374');
/*!40000 ALTER TABLE `city_metadata` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) DEFAULT NULL,
  `pas` varchar(255) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `legal_address` varchar(255) DEFAULT NULL,
  `physical_address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `description` text,
  `type` tinyint(4) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`),
  KEY `type` (`type`),
  CONSTRAINT `company_ibfk_1` FOREIGN KEY (`type`) REFERENCES `c_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company`
--

LOCK TABLES `company` WRITE;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
INSERT INTO `company` VALUES (2,'qwe','123','q','w','e','123456789','twist_gaems@mail.ru','qweqweqweqweqwe',1,NULL),(4,'qqq','123','q','w','e','123456789','twist_gaems@mail.ru','qweqweqweqweqwe',1,NULL),(13,'www','123','q','w','e','123456789','twist_gaems@mail.ru','qweqweqweqweqwe',1,NULL),(20,'testc','3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2','OOO testc','Tomsk District 223232','Moscow District 11344','123456789','qqqq@mail.ru','Our company is test company',1,'C:\\Users\\alkostyakov\\Desktop\\city\\usrimg\\fon.jpg'),(21,'apark','3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2','OOO APARK HOLDING','Moscow, Pushkina 23','PHD City, Kolotushkina 112','12345678900','apark1234@mail.ru','Amusement park',2,NULL),(23,'cc','3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2','cc','cc','cc','cc','cc@mail.com','qeqweqweqweq',1,NULL);
/*!40000 ALTER TABLE `company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_document`
--

DROP TABLE IF EXISTS `company_document`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `company_document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company` int(11) NOT NULL,
  `nubmers` varchar(255) DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `type` (`type`),
  CONSTRAINT `company_document_ibfk_1` FOREIGN KEY (`type`) REFERENCES `c_document_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_document`
--

LOCK TABLES `company_document` WRITE;
/*!40000 ALTER TABLE `company_document` DISABLE KEYS */;
INSERT INTO `company_document` VALUES (2,20,'1234 123456',2);
/*!40000 ALTER TABLE `company_document` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `complaint`
--

DROP TABLE IF EXISTS `complaint`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `complaint` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `to_c` int(11) DEFAULT NULL,
  `to_u` int(11) DEFAULT NULL,
  `from_c` int(11) DEFAULT NULL,
  `from_u` int(11) DEFAULT NULL,
  `body` text,
  `type` tinyint(4) DEFAULT NULL,
  `to_alt` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `type` (`type`),
  KEY `from_c` (`from_c`),
  KEY `from_u` (`from_u`),
  KEY `to_c` (`to_c`),
  KEY `to_u` (`to_u`),
  CONSTRAINT `complaint_ibfk_1` FOREIGN KEY (`type`) REFERENCES `complaint_type` (`id`),
  CONSTRAINT `complaint_ibfk_2` FOREIGN KEY (`from_c`) REFERENCES `company` (`id`),
  CONSTRAINT `complaint_ibfk_3` FOREIGN KEY (`from_u`) REFERENCES `user` (`id`),
  CONSTRAINT `complaint_ibfk_4` FOREIGN KEY (`to_c`) REFERENCES `company` (`id`),
  CONSTRAINT `complaint_ibfk_5` FOREIGN KEY (`to_u`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `complaint`
--

LOCK TABLES `complaint` WRITE;
/*!40000 ALTER TABLE `complaint` DISABLE KEYS */;
INSERT INTO `complaint` VALUES (2,20,NULL,20,NULL,'This is test complaint',1,NULL),(4,21,NULL,NULL,2,'QWERTY!',1,NULL),(5,20,NULL,NULL,2,'TEST!',1,NULL),(7,21,NULL,NULL,2,'qweqweqweqewq',1,NULL),(8,21,NULL,NULL,2,'Test complaint!',1,NULL);
/*!40000 ALTER TABLE `complaint` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `complaint_type`
--

DROP TABLE IF EXISTS `complaint_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `complaint_type` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `descript` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `complaint_type`
--

LOCK TABLES `complaint_type` WRITE;
/*!40000 ALTER TABLE `complaint_type` DISABLE KEYS */;
INSERT INTO `complaint_type` VALUES (1,'test');
/*!40000 ALTER TABLE `complaint_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discount_card`
--

DROP TABLE IF EXISTS `discount_card`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `discount_card` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner` int(11) DEFAULT NULL,
  `serial_number` varchar(50) DEFAULT NULL,
  `company` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `dcnumber` (`serial_number`),
  KEY `company` (`company`),
  CONSTRAINT `discount_card_ibfk_1` FOREIGN KEY (`company`) REFERENCES `company` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discount_card`
--

LOCK TABLES `discount_card` WRITE;
/*!40000 ALTER TABLE `discount_card` DISABLE KEYS */;
INSERT INTO `discount_card` VALUES (6,NULL,'1234123412',20),(14,2,'4321432122',2);
/*!40000 ALTER TABLE `discount_card` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doc_type`
--

DROP TABLE IF EXISTS `doc_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `doc_type` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `descript` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doc_type`
--

LOCK TABLES `doc_type` WRITE;
/*!40000 ALTER TABLE `doc_type` DISABLE KEYS */;
INSERT INTO `doc_type` VALUES (1,'doc_test'),(2,'doc_test2');
/*!40000 ALTER TABLE `doc_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `document`
--

DROP TABLE IF EXISTS `document`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` tinyint(4) NOT NULL,
  `numbers` varchar(50) NOT NULL,
  `owner` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `doc_unique` (`numbers`),
  KEY `owner` (`owner`),
  KEY `type` (`type`),
  CONSTRAINT `document_ibfk_1` FOREIGN KEY (`owner`) REFERENCES `user` (`id`),
  CONSTRAINT `document_ibfk_2` FOREIGN KEY (`owner`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `document_ibfk_3` FOREIGN KEY (`type`) REFERENCES `doc_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `document`
--

LOCK TABLES `document` WRITE;
/*!40000 ALTER TABLE `document` DISABLE KEYS */;
INSERT INTO `document` VALUES (1,1,'1111',2),(2,1,'2222',2),(19,1,'6666',2),(20,1,'1231qq2',2),(21,1,'5555',2),(23,1,'44421',2),(24,1,'1231231',2);
/*!40000 ALTER TABLE `document` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `f_type`
--

DROP TABLE IF EXISTS `f_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `f_type` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `descript` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `f_type`
--

LOCK TABLES `f_type` WRITE;
/*!40000 ALTER TABLE `f_type` DISABLE KEYS */;
INSERT INTO `f_type` VALUES (1,'test'),(2,'Car fine'),(3,'Speed fine');
/*!40000 ALTER TABLE `f_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fine`
--

DROP TABLE IF EXISTS `fine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `fine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document` varchar(50) DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `type` (`type`),
  CONSTRAINT `fine_ibfk_1` FOREIGN KEY (`type`) REFERENCES `f_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fine`
--

LOCK TABLES `fine` WRITE;
/*!40000 ALTER TABLE `fine` DISABLE KEYS */;
INSERT INTO `fine` VALUES (8,'44421',2,'This is car fine, dont worry!','10');
/*!40000 ALTER TABLE `fine` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `news_text` text,
  `author` int(11) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `heading` varchar(50) DEFAULT NULL,
  `descript` varchar(100) DEFAULT NULL,
  `public_date` datetime DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `author` (`author`),
  KEY `type` (`type`),
  CONSTRAINT `news_ibfk_1` FOREIGN KEY (`author`) REFERENCES `user` (`id`),
  CONSTRAINT `news_ibfk_2` FOREIGN KEY (`type`) REFERENCES `news_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (9,'test',2,'C:\\Users\\alkostyakov\\Desktop\\city\\usrimg\\some.png','test','test','2020-10-30 09:24:59',2);
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news_moder`
--

DROP TABLE IF EXISTS `news_moder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `news_moder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `news` int(11) NOT NULL,
  `moderator` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `news` (`news`),
  KEY `moderator` (`moderator`),
  CONSTRAINT `news_moder_ibfk_1` FOREIGN KEY (`news`) REFERENCES `news` (`id`),
  CONSTRAINT `news_moder_ibfk_2` FOREIGN KEY (`moderator`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news_moder`
--

LOCK TABLES `news_moder` WRITE;
/*!40000 ALTER TABLE `news_moder` DISABLE KEYS */;
/*!40000 ALTER TABLE `news_moder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news_type`
--

DROP TABLE IF EXISTS `news_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `news_type` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `descript` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news_type`
--

LOCK TABLES `news_type` WRITE;
/*!40000 ALTER TABLE `news_type` DISABLE KEYS */;
INSERT INTO `news_type` VALUES (1,'sport'),(2,'politic');
/*!40000 ALTER TABLE `news_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `owner_service`
--

DROP TABLE IF EXISTS `owner_service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `owner_service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `relese_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`user`),
  KEY `service_id` (`service_id`),
  CONSTRAINT `owner_service_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`id`),
  CONSTRAINT `owner_service_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `owner_service`
--

LOCK TABLES `owner_service` WRITE;
/*!40000 ALTER TABLE `owner_service` DISABLE KEYS */;
INSERT INTO `owner_service` VALUES (15,2,2,'2020-11-13'),(16,2,2,'2020-11-13'),(17,1,2,'2020-11-13'),(18,1,2,'2020-11-13');
/*!40000 ALTER TABLE `owner_service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `req_type`
--

DROP TABLE IF EXISTS `req_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `req_type` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `descript` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `req_type`
--

LOCK TABLES `req_type` WRITE;
/*!40000 ALTER TABLE `req_type` DISABLE KEYS */;
INSERT INTO `req_type` VALUES (1,'test'),(2,'Urban problems'),(3,'Personal');
/*!40000 ALTER TABLE `req_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requests`
--

DROP TABLE IF EXISTS `requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` tinyint(4) DEFAULT NULL,
  `descript` varchar(255) DEFAULT NULL,
  `owner_u` int(11) DEFAULT NULL,
  `owner_c` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `answer` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `type` (`type`),
  KEY `owner_u` (`owner_u`),
  KEY `owner_c` (`owner_c`),
  KEY `status` (`status`),
  CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`type`) REFERENCES `req_type` (`id`),
  CONSTRAINT `requests_ibfk_2` FOREIGN KEY (`owner_u`) REFERENCES `user` (`id`),
  CONSTRAINT `requests_ibfk_3` FOREIGN KEY (`owner_c`) REFERENCES `company` (`id`),
  CONSTRAINT `requests_ibfk_4` FOREIGN KEY (`status`) REFERENCES `requests_status` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requests`
--

LOCK TABLES `requests` WRITE;
/*!40000 ALTER TABLE `requests` DISABLE KEYS */;
INSERT INTO `requests` VALUES (1,1,'QWEQWEQWEQWEQ',NULL,NULL,1,NULL),(2,1,'qwqqqqqq',NULL,20,3,'This is test answer!'),(3,1,'Светофоры не работают!',2,NULL,4,'QQQQQQQQ'),(5,3,'Хочу припарковаться!',5,NULL,1,NULL),(6,2,'It\'s not my problem!',2,NULL,1,NULL);
/*!40000 ALTER TABLE `requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requests_status`
--

DROP TABLE IF EXISTS `requests_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `requests_status` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requests_status`
--

LOCK TABLES `requests_status` WRITE;
/*!40000 ALTER TABLE `requests_status` DISABLE KEYS */;
INSERT INTO `requests_status` VALUES (1,'no'),(2,'wait'),(3,'confirm'),(4,'rejected');
/*!40000 ALTER TABLE `requests_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `role` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `descript` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'admin'),(2,'moderator'),(3,'city_represent'),(4,'user'),(5,'news_writer'),(6,'manager');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` tinyint(4) DEFAULT NULL,
  `price` int(3) DEFAULT NULL,
  `provider` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `type` (`type`),
  CONSTRAINT `service_ibfk_1` FOREIGN KEY (`type`) REFERENCES `service_type` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service`
--

LOCK TABLES `service` WRITE;
/*!40000 ALTER TABLE `service` DISABLE KEYS */;
INSERT INTO `service` VALUES (1,1,1,21),(2,2,1,21),(3,2,1,21);
/*!40000 ALTER TABLE `service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service_promotion`
--

DROP TABLE IF EXISTS `service_promotion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `service_promotion` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `descript` varchar(50) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service_promotion`
--

LOCK TABLES `service_promotion` WRITE;
/*!40000 ALTER TABLE `service_promotion` DISABLE KEYS */;
/*!40000 ALTER TABLE `service_promotion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service_type`
--

DROP TABLE IF EXISTS `service_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `service_type` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `descript` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service_type`
--

LOCK TABLES `service_type` WRITE;
/*!40000 ALTER TABLE `service_type` DISABLE KEYS */;
INSERT INTO `service_type` VALUES (1,'Adult ticket'),(2,'Child ticket');
/*!40000 ALTER TABLE `service_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ten_type`
--

DROP TABLE IF EXISTS `ten_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `ten_type` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ten_type`
--

LOCK TABLES `ten_type` WRITE;
/*!40000 ALTER TABLE `ten_type` DISABLE KEYS */;
INSERT INTO `ten_type` VALUES (1,'Equipment supply'),(2,'Construction');
/*!40000 ALTER TABLE `ten_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tender`
--

DROP TABLE IF EXISTS `tender`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tender` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `winner` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `type` (`type`),
  CONSTRAINT `tender_ibfk_1` FOREIGN KEY (`type`) REFERENCES `ten_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tender`
--

LOCK TABLES `tender` WRITE;
/*!40000 ALTER TABLE `tender` DISABLE KEYS */;
INSERT INTO `tender` VALUES (1,'Test tender','This is test tender',2,4),(2,'SECOND TEST TENDER','SECOND TEST TENDERSECOND TEST TENDERSECOND TEST TENDERSECOND TEST TENDERSECOND TEST TENDERSECOND TEST TENDERSECOND TEST TENDERSECOND TEST TENDERSECOND TEST TENDERSECOND TEST TENDERSECOND TEST TENDERSECOND TEST TENDERSECOND TEST TENDERSECOND TEST TENDERSEC',1,6),(3,'This is one more tender','Lorem ipsum!',1,NULL),(4,'This is testtest','Description!',2,NULL);
/*!40000 ALTER TABLE `tender` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) DEFAULT NULL,
  `second_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `birth_date` date NOT NULL,
  `login` varchar(255) NOT NULL,
  `pas` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (2,'qwe','asd','zxc','qqqq@mail.ru','2000-02-29','testuser','3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2','C:\\Users\\alkostyakov\\Desktop\\city\\usrimg\\sun.png'),(5,'qwe','w','e','qqqq@mail.ru','2020-09-29','newu','3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2',NULL),(10,'rrrr','tttt','sssss','qqqq@mail.ru','2021-03-25','testc','3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2',NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_right`
--

DROP TABLE IF EXISTS `user_right`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `user_right` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` tinyint(4) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role` (`role`),
  KEY `user` (`user`),
  CONSTRAINT `user_right_ibfk_1` FOREIGN KEY (`role`) REFERENCES `role` (`id`),
  CONSTRAINT `user_right_ibfk_2` FOREIGN KEY (`user`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_right`
--

LOCK TABLES `user_right` WRITE;
/*!40000 ALTER TABLE `user_right` DISABLE KEYS */;
INSERT INTO `user_right` VALUES (1,1,2),(2,6,2),(3,5,2),(4,4,NULL),(6,4,2);
/*!40000 ALTER TABLE `user_right` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `worker`
--

DROP TABLE IF EXISTS `worker`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `worker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) DEFAULT NULL,
  `company` int(11) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `auto_reg` varchar(10) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `worker`
--

LOCK TABLES `worker` WRITE;
/*!40000 ALTER TABLE `worker` DISABLE KEYS */;
INSERT INTO `worker` VALUES (1,'test_worker',20,'Manager','Q123EE','manager@mail.ru'),(2,'one more worker',20,'Tester','R555EO','test@mail.ru'),(3,'qwe qweq wqe',20,'Test user','Q123EE','testuser@mail.ru');
/*!40000 ALTER TABLE `worker` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-03-25 16:43:52
