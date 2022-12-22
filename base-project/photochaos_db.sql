CREATE DATABASE  IF NOT EXISTS `photochaos` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `photochaos`;
-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: photochaos
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `photo`
--

DROP TABLE IF EXISTS `photo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `photo` (
  `id_photo` int unsigned NOT NULL,
  `title` varchar(45) NOT NULL,
  `file_name` varchar(45) NOT NULL,
  `file_extension` varchar(4) NOT NULL,
  `created_at` timestamp NOT NULL,
  `dimensions` int NOT NULL,
  `resolution` int NOT NULL,
  `id_autor` int unsigned NOT NULL,
  `score` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`id_photo`,`id_autor`),
  UNIQUE KEY `id_photo_UNIQUE` (`id_photo`),
  UNIQUE KEY `file_name_UNIQUE` (`file_name`),
  KEY `fk_photo_photographer1_idx` (`id_autor`),
  CONSTRAINT `fk_photo_photographer1` FOREIGN KEY (`id_autor`) REFERENCES `photographer` (`id_photographer`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photo`
--

LOCK TABLES `photo` WRITE;
/*!40000 ALTER TABLE `photo` DISABLE KEYS */;
INSERT INTO `photo` VALUES (0,'Irritable Bowel Syndrome Therapy','arcused','jpg','2022-11-01 01:34:22',0,0,1,0),(1,'Antiseptic','luctus','jpg','2022-03-01 00:58:29',0,0,1,5),(2,'Phentermine Hydrochloride','leoodioporttitor','jpg','2022-07-21 17:48:54',0,0,2,4),(3,'EC-Naprosyn','hachabitasse','jpg','2021-12-19 19:57:10',0,0,3,2),(4,'HEADACHE VOMITING','faucibuoorciluctus','jpg','2022-01-25 22:48:49',0,0,4,0);
/*!40000 ALTER TABLE `photo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photo_has_tag`
--

DROP TABLE IF EXISTS `photo_has_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `photo_has_tag` (
  `id_photo` int unsigned NOT NULL,
  `id_tag` int NOT NULL,
  PRIMARY KEY (`id_photo`,`id_tag`),
  KEY `fk_photo_has_tag_tag1_idx` (`id_tag`),
  KEY `fk_photo_has_tag_photo1_idx` (`id_photo`),
  CONSTRAINT `fk_photo_has_tag_photo1` FOREIGN KEY (`id_photo`) REFERENCES `photo` (`id_photo`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `fk_photo_has_tag_tag1` FOREIGN KEY (`id_tag`) REFERENCES `tag` (`id_tag`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photo_has_tag`
--

LOCK TABLES `photo_has_tag` WRITE;
/*!40000 ALTER TABLE `photo_has_tag` DISABLE KEYS */;
INSERT INTO `photo_has_tag` VALUES (1,0),(1,1),(3,1);
/*!40000 ALTER TABLE `photo_has_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tag`
--

DROP TABLE IF EXISTS `tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tag` (
  `id_tag` int NOT NULL,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id_tag`),
  UNIQUE KEY `id_tag_UNIQUE` (`id_tag`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tag`
--

LOCK TABLES `tag` WRITE;
/*!40000 ALTER TABLE `tag` DISABLE KEYS */;
INSERT INTO `tag` VALUES (1,'drugs'),(0,'plant');
/*!40000 ALTER TABLE `tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photographer`
--

DROP TABLE IF EXISTS `photographer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `photographer` (
  `id_photographer` int unsigned NOT NULL,
  `username` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `birthdate` date NOT NULL,
  `presentation` varchar(150) NOT NULL,
  `image_profile` varchar(50) DEFAULT NULL,
  `total_uploads` int DEFAULT NULL,
  `total_votes` int DEFAULT NULL,
  PRIMARY KEY (`id_photographer`),
  UNIQUE KEY `id_photographer_UNIQUE` (`id_photographer`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `password_UNIQUE` (`password`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photographer`
--

LOCK TABLES `photographer` WRITE;
/*!40000 ALTER TABLE `photographer` DISABLE KEYS */;
INSERT INTO `photographer` VALUES (0,'bsmallacombe0','bsmallacombe0@bizjournals.com','416zinvelzj','2022-03-31 03:51:03','BreeSmal','Smallacombe','1991-10-22','dfasdfsa','gqerqg',0,0),(1,'dmeneely1','dmeneely1@epa.gov','aCevQuNqBq','2022-04-14 11:11:00','Dasie','Meneely','2013-06-12','fasd','gqerg',2,0),(2,'mstandering2','mstandering2@weather.com','VfT3yMoevkrQ','2022-01-08 02:41:55','Mahala','Standering','2007-07-09','fasd','gqeg',1,3),(3,'gparris3','gparris3@rediff.com','0GlV8c','2022-05-11 20:26:57','Gayla','Parris','2021-04-24','fasdf','gqeg',1,1),(4,'rrapier4','rrapier4@google.es','ilZ9N6t87tE','2022-11-12 21:30:36','Rustin','Rapier','2022-06-10','gasdga','erqgr',1,0);
/*!40000 ALTER TABLE `photographer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vote`
--

DROP TABLE IF EXISTS `vote`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vote` (
  `id_vote` int unsigned NOT NULL,
  `score` int NOT NULL,
  `comments` varchar(250) DEFAULT NULL,
  `id_photographer` int unsigned NOT NULL,
  `id_photo` int unsigned NOT NULL,
  PRIMARY KEY (`id_vote`,`id_photographer`,`id_photo`),
  UNIQUE KEY `id_vote_UNIQUE` (`id_vote`),
  KEY `fk_vote_photographer_idx` (`id_photographer`),
  KEY `fk_vote_photo1_idx` (`id_photo`),
  CONSTRAINT `fk_vote_photo1` FOREIGN KEY (`id_photo`) REFERENCES `photo` (`id_photo`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `fk_vote_photographer` FOREIGN KEY (`id_photographer`) REFERENCES `photographer` (`id_photographer`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vote`
--

LOCK TABLES `vote` WRITE;
/*!40000 ALTER TABLE `vote` DISABLE KEYS */;
INSERT INTO `vote` VALUES (0,5,'fsdfasdfaf',2,1),(1,4,NULL,2,2),(2,2,'fasdfasfa',2,3),(3,5,NULL,3,1);
/*!40000 ALTER TABLE `vote` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-22  9:20:41
