-- MySQL dump 10.13  Distrib 5.5.41, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: device-management
-- ------------------------------------------------------
-- Server version	5.5.41-0ubuntu0.14.04.1

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
-- Table structure for table `api_access`
--

DROP TABLE IF EXISTS `api_access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `api_access` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `access_token` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `api_access`
--

LOCK TABLES `api_access` WRITE;
/*!40000 ALTER TABLE `api_access` DISABLE KEYS */;
INSERT INTO `api_access` VALUES (1,'111111','2015-04-24 17:44:56','2015-04-25 17:44:56');
/*!40000 ALTER TABLE `api_access` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `device_holder_info`
--

DROP TABLE IF EXISTS `device_holder_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `device_holder_info` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `device_id` bigint(20) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `purpose` varchar(200) NOT NULL,
  `comments` varchar(300) DEFAULT NULL,
  `device_status` enum('Assigned','Released','Available','Broken','Theft') DEFAULT NULL,
  `device_assigned_date` datetime NOT NULL,
  `device_released_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `device_holder_info`
--

LOCK TABLES `device_holder_info` WRITE;
/*!40000 ALTER TABLE `device_holder_info` DISABLE KEYS */;
INSERT INTO `device_holder_info` VALUES (6,22,1,'test','test','Released','0000-00-00 00:00:00','2015-04-28 10:39:14'),(20,22,2,'','','Released','2015-04-28 10:37:32','2015-04-28 10:38:35'),(21,22,1,'','','Released','2015-04-28 10:38:35','2015-04-28 10:39:14'),(22,22,2,'','','Released','2015-04-28 10:39:14',NULL);
/*!40000 ALTER TABLE `device_holder_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `device_tracker`
--

DROP TABLE IF EXISTS `device_tracker`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `device_tracker` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `current_location` varchar(300) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `wifi` varchar(100) NOT NULL,
  `os_version` varchar(10) NOT NULL,
  `device_id` bigint(20) NOT NULL,
  `device_holding_user` bigint(20) NOT NULL,
  `pin_verification_status` bit(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `device_tracker`
--

LOCK TABLES `device_tracker` WRITE;
/*!40000 ALTER TABLE `device_tracker` DISABLE KEYS */;
INSERT INTO `device_tracker` VALUES (1,'test','xxx.xxx.xxx.xxx','test','5',22,2,'','2015-04-28 18:22:22','0000-00-00 00:00:00'),(2,'test','xxx.xxx.xxx.xxx','test','5',22,2,'\0','2015-04-28 18:23:18','0000-00-00 00:00:00'),(3,'xxxxxxxxxxxxxx','xxx.xxx.xxx.xxx','dssdasds','5',22,2,'','2015-04-28 18:31:21','0000-00-00 00:00:00'),(4,'xxxxxxxxxxxxxx','xxx.xxx.xxx.xxx','dssdasds','5',22,2,'','2015-04-28 18:31:28','0000-00-00 00:00:00'),(5,'xxxxxxxxxxxxxx','xxx.xxx.xxx.xxx','dssdasds','5',22,2,'\0','2015-04-28 18:31:36','0000-00-00 00:00:00'),(6,'xxxxxxxxxxxxxx','xxx.xxx.xxx.xxx','dssdasds','5',22,2,'\0','2015-04-28 18:32:31','0000-00-00 00:00:00'),(7,'xxxxxxxxxxxxxx','xxx.xxx.xxx.xxx','dssdasds','5',22,2,'\0','2015-04-28 18:33:20','0000-00-00 00:00:00'),(8,'xxxxxxxxxxxxxx','xxx.xxx.xxx.xxx','dssdasds','5',22,2,'\0','2015-04-28 18:34:28','0000-00-00 00:00:00'),(9,'test','xxx.xxx.xxx.xxx','1334444','5',22,2,'','2015-04-29 10:31:48','0000-00-00 00:00:00'),(10,'test','xxx.xxx.xxx.xxx','1334444','5',22,2,'','2015-04-29 10:32:27','0000-00-00 00:00:00'),(11,'test','xxx.xxx.xxx.xxx','1334444','5',22,2,'','2015-04-29 10:32:38','0000-00-00 00:00:00'),(12,'test','xxx.xxx.xxx.xxx','1334444','5',22,2,'','2015-04-29 10:33:41','0000-00-00 00:00:00'),(13,'test','xxx.xxx.xxx.xxx','1334444','5',22,2,'','2015-04-29 10:35:16','0000-00-00 00:00:00'),(14,'test','xxx.xxx.xxx.xxx','1334444','5',22,2,'\0','2015-04-29 10:35:26','0000-00-00 00:00:00'),(15,'test','xxx.xxx.xxx.xxx','1334444','5',22,2,'\0','2015-04-29 10:43:11','0000-00-00 00:00:00'),(16,'test','xxx.xxx.xxx.xxx','1334444','5',22,2,'','2015-04-29 10:43:53','0000-00-00 00:00:00'),(17,'test','xxx.xxx.xxx.xxx','1334444','5',22,2,'','2015-04-29 10:45:04','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `device_tracker` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deviceinfo`
--

DROP TABLE IF EXISTS `deviceinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `deviceinfo` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `device_id` varchar(200) NOT NULL,
  `make` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `type` varchar(100) NOT NULL,
  `os` varchar(50) NOT NULL,
  `IMEI` varchar(100) NOT NULL,
  `accessoryinfo` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deviceinfo`
--

LOCK TABLES `deviceinfo` WRITE;
/*!40000 ALTER TABLE `deviceinfo` DISABLE KEYS */;
INSERT INTO `deviceinfo` VALUES (21,'shhhdfsa','tttt','test','xxxx','xxx','xxx','xqwww','2015-04-24 15:42:34',NULL),(22,'sddsdsa','sdaadsdsa','dssdsad','ssddas','sassa','2431442','sdadsadas','2014-12-12 00:00:00',NULL),(23,'21wqew','wwq','weqew','eweqeq','ddi','dsjdjdjasjdsajdsa','ssdjsaddjsa','0000-00-00 00:00:00',NULL),(24,'shhhdfsa','tttt','test','xxxx','xxx','xxx','xqwww','2015-04-24 16:20:50',NULL),(25,'shhhdfsa','tttt','test','xxxx','xxx','xxx','xqwww','2015-04-24 16:20:56',NULL),(26,'shhhdfsa','tttt','test','xxxx','xxx','xxx','xqwww','2015-04-24 16:20:59',NULL),(27,'shhhdfsa','tttt','test','xxxx','xxx','xxx','xqwww','0000-00-00 00:00:00',NULL),(28,'shhhdfsa','tttt','test','xxxx','xxx','xxx','xqwww','0000-00-00 00:00:00',NULL),(29,'shhhdfsa','tttt','test','xxxx','xxx','xxx','xqwww','0000-00-00 00:00:00',NULL),(30,'shhhdfsa','tttt','test','xxxx','xxx','xxx','xqwww','2015-04-24 16:41:09',NULL),(31,'shhhdfsa','tttt','test','xxxx','xxx','xxx','xqwww','2015-04-24 16:41:13',NULL);
/*!40000 ALTER TABLE `deviceinfo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `unique_id` varchar(20) NOT NULL,
  `pin` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'111','1111','0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'114','111','2015-04-27 00:00:00','2015-04-27 00:00:00');
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

-- Dump completed on 2015-04-29 11:31:52
