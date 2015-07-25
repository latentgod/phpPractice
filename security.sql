-- MySQL dump 10.13  Distrib 5.6.24, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: security
-- ------------------------------------------------------
-- Server version	5.6.24-0ubuntu2.1

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','pwd'),(4,'高飞的的','发达份'),(5,'高飞的发达梵蒂冈','高飞的高飞的');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `comment` text NOT NULL,
  `comment_id` int(255) NOT NULL,
  `create_at` datetime NOT NULL,
  `user` varchar(20) NOT NULL,
  `ip` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES (4,'高飞的份',63,'2015-06-28 05:02:26','彭伟成','127.0.0.1'),(5,'高飞的',63,'2015-06-28 05:02:28','彭伟成','127.0.0.1'),(8,'个地方',59,'2015-06-28 05:02:41','彭伟成','127.0.0.1'),(11,'个地方',82,'2015-06-28 05:03:15','吴标帮','127.0.0.1'),(12,'高度发达',63,'2015-06-28 05:03:27','吴标帮','127.0.0.1'),(17,'2222',84,'2015-06-28 05:04:47','吴标帮','127.0.0.1'),(18,'3333',84,'2015-06-28 05:04:50','吴标帮','127.0.0.1'),(21,'规范高飞的',61,'2015-06-28 05:12:18','吴标帮','127.0.0.1'),(23,'高飞的的',83,'2015-06-28 05:12:34','吴标帮','127.0.0.1'),(26,'梵蒂冈发达',84,'2015-06-28 05:16:20','吴标帮','127.0.0.1'),(27,'高飞的过得',87,'2015-06-28 06:14:12','彭伟成','127.0.0.1'),(28,'分工和发改',87,'2015-06-28 06:14:15','彭伟成','127.0.0.1'),(38,'反倒是',88,'2015-06-29 12:05:25','彭伟成','127.0.0.1');
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `content`
--

DROP TABLE IF EXISTS `content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `content` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `body` mediumtext NOT NULL,
  `create_at` datetime NOT NULL,
  `ip` varchar(20) NOT NULL,
  `user` varchar(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `content`
--

LOCK TABLES `content` WRITE;
/*!40000 ALTER TABLE `content` DISABLE KEYS */;
INSERT INTO `content` VALUES (116,'规范高飞的','个回复电话','2015-07-12 09:52:57','127.0.0.1','qq','secure'),(117,'韩国和规范','和广泛','2015-07-12 09:53:05','127.0.0.1','qq','php'),(118,'和广泛','和广泛个回复','2015-07-12 09:53:10','127.0.0.1','qq','chat');
/*!40000 ALTER TABLE `content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system`
--

DROP TABLE IF EXISTS `system`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `system` (
  `id` int(5) NOT NULL,
  `title` varchar(20) NOT NULL,
  `keywords` text NOT NULL,
  `version` varchar(20) NOT NULL,
  `recode` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system`
--

LOCK TABLES `system` WRITE;
/*!40000 ALTER TABLE `system` DISABLE KEYS */;
INSERT INTO `system` VALUES (1,'信安课室','security php','v1.2.0','5201314','email','666110');
/*!40000 ALTER TABLE `system` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `hobby` varchar(20) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `create_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (19,'阿','as','阿','127.0.0.1','2015-06-21 02:38:55'),(20,'高飞的','asd','大赛','127.0.0.1','2015-06-21 03:26:44'),(24,'发射的分分规范规范','123','123','127.0.0.1','2015-06-25 12:50:43'),(25,'高飞的个地方高飞的高飞的','123','123','127.0.0.1','2015-06-25 01:45:55'),(26,'大声地说','222','请问额','127.0.0.1','2015-06-26 12:53:08'),(27,'阿三','as','阿三','127.0.0.1','2015-06-26 01:08:45'),(28,'和广泛','123','反倒是','127.0.0.1','2015-06-26 08:51:36'),(30,'俄方士大夫到沙发','123','123','127.0.0.1','2015-06-29 03:03:04'),(31,'qwe','qwe','qwe','127.0.0.1','2015-06-30 07:19:48'),(34,'qq','qq','qq','127.0.0.1','2015-07-12 09:52:48');
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

-- Dump completed on 2015-07-12 21:54:54
