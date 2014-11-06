-- MySQL dump 10.13  Distrib 5.5.38, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: universal
-- ------------------------------------------------------
-- Server version	5.5.38-0ubuntu0.14.04.1

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
-- Table structure for table `badges`
--

DROP TABLE IF EXISTS `badges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `badges` (
  `idbadges` int(11) NOT NULL AUTO_INCREMENT,
  `badgeName` varchar(255) DEFAULT NULL,
  `badgeDescription` varchar(255) NOT NULL,
  `category` varchar(20) NOT NULL,
  `picURI` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idbadges`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `badges`
--

LOCK TABLES `badges` WRITE;
/*!40000 ALTER TABLE `badges` DISABLE KEYS */;
INSERT INTO `badges` VALUES (1,'Beginners Luck','Kissed at least 3 people','Quantity','');
INSERT INTO `badges` VALUES (2,'badgeName','Kissed at least 5 people','Quantity','');
INSERT INTO `badges` VALUES (3,'badgeName','Kissed at least 10 people','Quantity',NULL);
INSERT INTO `badges` VALUES (4,'badgeName','Kissed at least 15 people','Quantity',NULL);
INSERT INTO `badges` VALUES (5,'Made the grade','Have a rating of at least 50','Quality',NULL);
INSERT INTO `badges` VALUES (6,'Honor Roll','Have a rating of at least 75','Quality',NULL);
INSERT INTO `badges` VALUES (7,'Star Student','Achieved a rating of at least 90','Quality',NULL);
INSERT INTO `badges` VALUES (9,'Perfectionist','Achieved a perfect rating of 100','Quality',NULL);
INSERT INTO `badges` VALUES (10,'Alpha Male','Ranked as the best male kisser in your city','Ranking',NULL);
INSERT INTO `badges` VALUES (11,'Kissr MVP','Ranked in the top 10 of your city','Ranking',NULL);
INSERT INTO `badges` VALUES (12,'Social Butterfly','Ranked in the top 100 of your city','Ranking',NULL);
INSERT INTO `badges` VALUES (13,'Alpha Female','Ranked as the best female kisser in your city','Ranking',NULL);
INSERT INTO `badges` VALUES (14,'Beginners Luck','Kissed at least 3 people','Quantity','');
INSERT INTO `badges` VALUES (15,'badgeName','Kissed at least 5 people','Quantity','');
INSERT INTO `badges` VALUES (16,'badgeName','Kissed at least 10 people','Quantity',NULL);
INSERT INTO `badges` VALUES (17,'badgeName','Kissed at least 15 people','Quantity',NULL);
INSERT INTO `badges` VALUES (18,'Made the grade','Have a rating of at least 50','Quality',NULL);
INSERT INTO `badges` VALUES (19,'Honor Roll','Have a rating of at least 75','Quality',NULL);
INSERT INTO `badges` VALUES (20,'Star Student','Achieved a rating of at least 90','Quality',NULL);
INSERT INTO `badges` VALUES (21,'Perfectionist','Achieved a perfect rating of 100','Quality',NULL);
INSERT INTO `badges` VALUES (22,'Alpha Male','Ranked as the best male kisser in your city','Ranking',NULL);
INSERT INTO `badges` VALUES (23,'Kissr MVP','Ranked in the top 10 of your city','Ranking',NULL);
INSERT INTO `badges` VALUES (24,'Social Butterfly','Ranked in the top 100 of your city','Ranking',NULL);
INSERT INTO `badges` VALUES (25,'Alpha Female','Ranked as the best female kisser in your city','Ranking',NULL);
/*!40000 ALTER TABLE `badges` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `badgesforusers`
--

DROP TABLE IF EXISTS `badgesforusers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `badgesforusers` (
  `idbadgesForUsers` int(11) NOT NULL AUTO_INCREMENT,
  `badgeid` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  PRIMARY KEY (`idbadgesForUsers`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `badgesforusers`
--

LOCK TABLES `badgesforusers` WRITE;
/*!40000 ALTER TABLE `badgesforusers` DISABLE KEYS */;
/*!40000 ALTER TABLE `badgesforusers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `codes`
--

DROP TABLE IF EXISTS `codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `codes` (
  `code` varchar(20) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `subject_id` int(10) NOT NULL,
  `used` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `codes`
--

LOCK TABLES `codes` WRITE;
/*!40000 ALTER TABLE `codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `idcomments` int(11) NOT NULL AUTO_INCREMENT,
  `ratingid` int(11) DEFAULT NULL,
  `commenterid` int(11) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `commentDate` date DEFAULT NULL,
  `commentTime` time DEFAULT NULL,
  PRIMARY KEY (`idcomments`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,5,1,'damn','2014-09-09','08:32:52');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ratings`
--

DROP TABLE IF EXISTS `ratings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ratings` (
  `idratings` int(11) NOT NULL AUTO_INCREMENT,
  `raterid` int(11) DEFAULT NULL,
  `rateeid` int(11) DEFAULT NULL,
  `inputRateeName` varchar(255) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `rateDate` date DEFAULT NULL,
  `rateTime` time DEFAULT NULL,
  `active` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`idratings`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ratings`
--

LOCK TABLES `ratings` WRITE;
/*!40000 ALTER TABLE `ratings` DISABLE KEYS */;
INSERT INTO `ratings` VALUES (10,173,1,'boo lee',100,'2014-10-26',NULL,0);
/*!40000 ALTER TABLE `ratings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject_list`
--

DROP TABLE IF EXISTS `subject_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subject_list` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(255) NOT NULL,
  PRIMARY KEY (`subject_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject_list`
--

LOCK TABLES `subject_list` WRITE;
/*!40000 ALTER TABLE `subject_list` DISABLE KEYS */;
INSERT INTO `subject_list` VALUES (1,'Math');
/*!40000 ALTER TABLE `subject_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_passwords`
--

DROP TABLE IF EXISTS `user_passwords`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_passwords` (
  `password_id` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `previous_pass` varchar(255) NOT NULL,
  `date_changed` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`password_id`),
  KEY `password` (`password`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_passwords`
--

LOCK TABLES `user_passwords` WRITE;
/*!40000 ALTER TABLE `user_passwords` DISABLE KEYS */;
INSERT INTO `user_passwords` VALUES (1,1,'$2y$10$1Xaj3KNg2MpiUVQclc6TsOHKnS3Iw5fCaRVDouakFp2Kyi4Zq0Aky','','0000-00-00 00:00:00');
INSERT INTO `user_passwords` VALUES (3,2,'$2y$10$As1MrPixI0wXWLJj/z/.Oe.zQZYtrcUAj3A19967b.kefpP2CRMr2','','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `user_passwords` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `date_registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_purchase` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `card_number` int(12) NOT NULL,
  `user_firstname` varchar(45) DEFAULT NULL,
  `user_lastname` varchar(45) DEFAULT NULL,
  `user_type` varchar(45) DEFAULT NULL,
  `credits` int(2) NOT NULL,
  `birthday` date NOT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `ID` (`id`),
  KEY `firstname` (`user_firstname`),
  KEY `lastname` (`user_lastname`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'test@test.com','2014-04-12 20:11:46','0000-00-00 00:00:00',0,'josh','doe','professor',0,'0000-00-00',NULL);
INSERT INTO `users` VALUES (2,'a','2014-04-12 20:11:46','0000-00-00 00:00:00',0,'firstNameStudent','lastNameStudent','student',0,'0000-00-00',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_subjects`
--

DROP TABLE IF EXISTS `users_subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_subjects` (
  `idusers_subjects` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `tableName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idusers_subjects`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_subjects`
--

LOCK TABLES `users_subjects` WRITE;
/*!40000 ALTER TABLE `users_subjects` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_subjects` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

