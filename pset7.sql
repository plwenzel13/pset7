-- MySQL dump 10.13  Distrib 5.5.46, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: pset7
-- ------------------------------------------------------
-- Server version	5.5.46-0ubuntu0.14.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `history` (
  `transaction_id` int(25) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `transaction` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `symbol` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `shares` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(65,4) DEFAULT NULL,
  `deposit` decimal(65,4) unsigned DEFAULT NULL,
  `withdrawl` decimal(65,4) unsigned DEFAULT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history`
--

LOCK TABLES `history` WRITE;
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
INSERT INTO `history` VALUES (12,15,'BUY','2016-06-11 03:31:33','CHK','5',NULL,0.0000,22.1000),(13,15,'DEPOSIT','2016-06-11 03:32:43','','',0.0000,100.0000,0.0000),(14,15,'SELL','2016-06-11 04:05:04','BAC','0',13.8300,0.0000,0.0000),(15,15,'SELL','2016-06-11 04:13:13','RAD','0',7.8300,0.0000,0.0000),(16,15,'BUY','2016-06-11 04:43:21','RAD','2',7.8300,0.0000,15.6600),(17,15,'SELL','2016-06-11 04:45:22','RAD','0',7.8300,0.0000,0.0000),(18,15,'SELL','2016-06-11 04:46:24','RAD','0',7.8300,0.0000,0.0000),(19,15,'SELL','2016-06-11 04:48:25','RAD','0',7.8300,0.0000,0.0000),(20,15,'SELL','2016-06-12 05:08:06','FREE','10',1.1500,0.0000,0.0000),(21,15,'SELL','2016-06-12 05:24:42','GOOG','5',719.4100,3597.0500,0.0000),(22,15,'SOLD','2016-06-12 21:34:15','GOOG','3',719.4100,2158.2300,NULL),(23,15,'SOLD','2016-06-12 21:37:03','CHK','10',4.4200,44.2000,NULL),(24,15,'SOLD','2016-06-12 22:29:21','FREE','10',1.1500,11.5000,NULL),(25,15,'SOLD','2016-06-12 22:35:09','FREE','5',1.1500,5.7500,NULL),(26,15,'BUY','2016-06-12 22:36:07','FREE','10',1.1500,NULL,11.5000),(27,15,'DEPOSIT','2016-06-12 22:36:58','','',NULL,150.0000,NULL),(28,15,'SOLD','2016-06-12 22:52:16','WFT','5',6.5800,32.9000,NULL);
/*!40000 ALTER TABLE `history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portfolio`
--

DROP TABLE IF EXISTS `portfolio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `symbol` varchar(11) NOT NULL,
  `shares` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`,`symbol`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portfolio`
--

LOCK TABLES `portfolio` WRITE;
/*!40000 ALTER TABLE `portfolio` DISABLE KEYS */;
INSERT INTO `portfolio` VALUES (1,9,'WFT',3),(3,10,'FREE',10),(10,9,'CHK',3),(11,17,'FREE',20),(13,15,'GOOG',2),(14,15,'WFT',15),(15,15,'FREE',25),(19,15,'SIRI',15),(21,15,'FCX',2);
/*!40000 ALTER TABLE `portfolio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hash` varchar(255) NOT NULL,
  `cash` decimal(65,4) unsigned NOT NULL DEFAULT '0.0000',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'andi','','$1$UeKNnAIn$FQcyQzy4uonqcj5DSr0dh.',10000.0000),(2,'caesar','','$1$UeKNnAIn$FQcyQzy4uonqcj5DSr0dh.',10000.0000),(3,'eli','','$1$UeKNnAIn$FQcyQzy4uonqcj5DSr0dh.',10000.0000),(4,'hdan','','$1$UeKNnAIn$FQcyQzy4uonqcj5DSr0dh.',10000.0000),(5,'jason','','$1$UeKNnAIn$FQcyQzy4uonqcj5DSr0dh.',10000.0000),(6,'john','','$1$UeKNnAIn$FQcyQzy4uonqcj5DSr0dh.',10000.0000),(7,'levatich','','$1$UeKNnAIn$FQcyQzy4uonqcj5DSr0dh.',10000.0000),(8,'rob','','$1$UeKNnAIn$FQcyQzy4uonqcj5DSr0dh.',10000.0000),(9,'skroob','','$1$UeKNnAIn$FQcyQzy4uonqcj5DSr0dh.',6346.7030),(10,'zamyla','','$1$UeKNnAIn$FQcyQzy4uonqcj5DSr0dh.',10000.0000),(15,'dixie','pjwenzel@att.net','$1$UeKNnAIn$FQcyQzy4uonqcj5DSr0dh.',15277.0700),(16,'pwenzel','','$1$UeKNnAIn$FQcyQzy4uonqcj5DSr0dh.',10000.0000),(17,'nika','','$1$UeKNnAIn$FQcyQzy4uonqcj5DSr0dh.',9977.0000);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-06-12 23:48:04
