-- MySQL dump 10.13  Distrib 5.6.16, for Win32 (x86)
--
-- Host: localhost    Database: math
-- ------------------------------------------------------
-- Server version	5.6.16

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
-- Table structure for table `chapter_names`
--

DROP TABLE IF EXISTS `chapter_names`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chapter_names` (
  `chapter_id` int(11) NOT NULL AUTO_INCREMENT,
  `chapter_name` varchar(255) NOT NULL,
  `chapter_order` int(11) DEFAULT NULL,
  PRIMARY KEY (`chapter_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chapter_names`
--

LOCK TABLES `chapter_names` WRITE;
/*!40000 ALTER TABLE `chapter_names` DISABLE KEYS */;
INSERT INTO `chapter_names` VALUES (1,'Relations and Functions',2);
INSERT INTO `chapter_names` VALUES (2,'Linear and Quadratic Functions',12);
INSERT INTO `chapter_names` VALUES (3,'Polynomial Functions',3);
INSERT INTO `chapter_names` VALUES (4,'Rational Functions',1);
INSERT INTO `chapter_names` VALUES (5,'Further Topics in Functions',5);
INSERT INTO `chapter_names` VALUES (6,'Exponential and Logarithmic Functions',13);
INSERT INTO `chapter_names` VALUES (7,'Hooked on Conics',7);
INSERT INTO `chapter_names` VALUES (8,'Systems of Equations and Matrices',8);
INSERT INTO `chapter_names` VALUES (9,'Sequences and the Binomial Theorem',6);
INSERT INTO `chapter_names` VALUES (12,'bbbbb',0);
INSERT INTO `chapter_names` VALUES (14,'gdsag',4);
INSERT INTO `chapter_names` VALUES (17,'dsagasdg',9);
INSERT INTO `chapter_names` VALUES (18,'adsgsad',10);
INSERT INTO `chapter_names` VALUES (19,'asdgsadgsadg',11);
INSERT INTO `chapter_names` VALUES (20,'fffffffff',14);
/*!40000 ALTER TABLE `chapter_names` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `concept_names`
--

DROP TABLE IF EXISTS `concept_names`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `concept_names` (
  `concept_id` int(11) NOT NULL AUTO_INCREMENT,
  `concept_name` varchar(255) NOT NULL,
  PRIMARY KEY (`concept_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `concept_names`
--

LOCK TABLES `concept_names` WRITE;
/*!40000 ALTER TABLE `concept_names` DISABLE KEYS */;
INSERT INTO `concept_names` VALUES (1,'Composition of Functions');
INSERT INTO `concept_names` VALUES (2,'Vertical Line Test');
INSERT INTO `concept_names` VALUES (3,'Simplifying Fractions');
INSERT INTO `concept_names` VALUES (4,'Domain');
INSERT INTO `concept_names` VALUES (5,'Range');
/*!40000 ALTER TABLE `concept_names` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `content`
--

DROP TABLE IF EXISTS `content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `content` (
  `idcontent` int(11) NOT NULL AUTO_INCREMENT,
  `content` blob,
  `medium_id` int(11) DEFAULT NULL,
  `submitter_type` varchar(255) DEFAULT NULL,
  `submitter_id` int(11) DEFAULT NULL,
  `contentgroup_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcontent`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `content`
--

LOCK TABLES `content` WRITE;
/*!40000 ALTER TABLE `content` DISABLE KEYS */;
INSERT INTO `content` VALUES (1,'							<article class=\"leadingLetter\">B</article>\n							<p class=\"vote-text\">efore we embark upon any further adventures with functions, we need to take some time to gather our thoughts and gain some perspective. Chapter 1 first introduced us to functions in Section 1.3. At that time, functions were specific kinds of relations - sets of points in the plane which passed the Vertical Line Test, Theorem 1.1. In Section 1.4, we developed the idea that functions are processes - rules which match inputs to outputs - and this gave rise to the concepts of domain and range. We spoke about how functions could be combined in Section 1.5 using the four basic arithmetic operations, took a more detailed look at their graphs in Section 1.6 and studied how their graphs behaved under certain classes of transformations in Section 1.7. In Chapter 2, we took a closer look at three families of functions: linear functions (Section 2.1), absolute value functions1 (Section 2.2), and quadratic functions (Section 2.3).</p> ',NULL,NULL,NULL,NULL);
INSERT INTO `content` VALUES (2,'<p class=\"vote-text\">Linear and quadratic functions were special cases of polynomial functions, which we studied in generality in Chapter 3. Chapter 3 culminated with the Real Factorization Theorem, Theorem 3.16, which says that all polynomial functions with real coefficients can be thought of as products of linear and quadratic functions. Our next step was to enlarge our field of study to rational functions in Chapter 4. Being quotients of polynomials, we can ultimately view this family of functions as being built up of linear and quadratic functions as well. So in some sense, Chapters 2, 3, and 4 can be thought of as an exhaustive study of linear and quadratic functions and their arithmetic combinations as described in Section 1.5. We now wish to study other algebraic functions, such as \\(f(x) = \\sqrt{x}\\) and \\(g(x) = x^{2/3}\\), and the purpose of the first two sections of this chapter is to see how these kinds of functions arise from polynomial and rational functions. To that end, we first study a new way to combine functions as defined below.</p>',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contentgroup_type_names`
--

DROP TABLE IF EXISTS `contentgroup_type_names`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contentgroup_type_names` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contentgroup_type_names`
--

LOCK TABLES `contentgroup_type_names` WRITE;
/*!40000 ALTER TABLE `contentgroup_type_names` DISABLE KEYS */;
INSERT INTO `contentgroup_type_names` VALUES (1,'definition');
INSERT INTO `contentgroup_type_names` VALUES (2,'example');
INSERT INTO `contentgroup_type_names` VALUES (3,'summary');
INSERT INTO `contentgroup_type_names` VALUES (4,'explanation');
/*!40000 ALTER TABLE `contentgroup_type_names` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contentgroups`
--

DROP TABLE IF EXISTS `contentgroups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contentgroups` (
  `contentgroup_id` int(11) NOT NULL AUTO_INCREMENT,
  `order` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`contentgroup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contentgroups`
--

LOCK TABLES `contentgroups` WRITE;
/*!40000 ALTER TABLE `contentgroups` DISABLE KEYS */;
/*!40000 ALTER TABLE `contentgroups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contentgroups_concepts`
--

DROP TABLE IF EXISTS `contentgroups_concepts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contentgroups_concepts` (
  `idcontentgroups_concepts` int(11) NOT NULL AUTO_INCREMENT,
  `contentgroup_id` int(11) DEFAULT NULL,
  `concept_id` int(11) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcontentgroups_concepts`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contentgroups_concepts`
--

LOCK TABLES `contentgroups_concepts` WRITE;
/*!40000 ALTER TABLE `contentgroups_concepts` DISABLE KEYS */;
/*!40000 ALTER TABLE `contentgroups_concepts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contentmedium_names`
--

DROP TABLE IF EXISTS `contentmedium_names`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contentmedium_names` (
  `medium_id` int(11) NOT NULL AUTO_INCREMENT,
  `medium_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`medium_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contentmedium_names`
--

LOCK TABLES `contentmedium_names` WRITE;
/*!40000 ALTER TABLE `contentmedium_names` DISABLE KEYS */;
INSERT INTO `contentmedium_names` VALUES (1,'video');
INSERT INTO `contentmedium_names` VALUES (2,'text');
INSERT INTO `contentmedium_names` VALUES (3,'interactive');
/*!40000 ALTER TABLE `contentmedium_names` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `group_included_sections`
--

DROP TABLE IF EXISTS `group_included_sections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `group_included_sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `completion_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group_included_sections`
--

LOCK TABLES `group_included_sections` WRITE;
/*!40000 ALTER TABLE `group_included_sections` DISABLE KEYS */;
INSERT INTO `group_included_sections` VALUES (1,1,1,1397280421);
INSERT INTO `group_included_sections` VALUES (2,1,2,1401290738);
INSERT INTO `group_included_sections` VALUES (3,1,3,1415262203);
INSERT INTO `group_included_sections` VALUES (4,1,4,NULL);
/*!40000 ALTER TABLE `group_included_sections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `group_members`
--

DROP TABLE IF EXISTS `group_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `group_members` (
  `group_members_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`group_members_id`),
  UNIQUE KEY `group_members_id_UNIQUE` (`group_members_id`),
  KEY `group_id` (`group_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group_members`
--

LOCK TABLES `group_members` WRITE;
/*!40000 ALTER TABLE `group_members` DISABLE KEYS */;
INSERT INTO `group_members` VALUES (1,1,2);
INSERT INTO `group_members` VALUES (2,1,3);
INSERT INTO `group_members` VALUES (3,1,4);
/*!40000 ALTER TABLE `group_members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(255) NOT NULL,
  `group_admin_id` int(10) NOT NULL,
  `subject_id` int(10) NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`group_id`),
  KEY `group_admin_id` (`group_admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'Math Section 1',1,1,'2014-03-29 00:08:52','0000-00-00 00:00:00');
INSERT INTO `groups` VALUES (3,'mathgroup2',1,1,'2014-03-29 00:08:52','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `piece_names`
--

DROP TABLE IF EXISTS `piece_names`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `piece_names` (
  `piece_id` int(11) NOT NULL AUTO_INCREMENT,
  `section_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`piece_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `piece_names`
--

LOCK TABLES `piece_names` WRITE;
/*!40000 ALTER TABLE `piece_names` DISABLE KEYS */;
/*!40000 ALTER TABLE `piece_names` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `problem_tags`
--

DROP TABLE IF EXISTS `problem_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `problem_tags` (
  `problem_id` int(11) NOT NULL,
  `tag` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `problem_tags`
--

LOCK TABLES `problem_tags` WRITE;
/*!40000 ALTER TABLE `problem_tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `problem_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `problems`
--

DROP TABLE IF EXISTS `problems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `problems` (
  `problem_id` int(11) NOT NULL AUTO_INCREMENT,
  `chapter_id` int(10) NOT NULL,
  `section_id` int(10) NOT NULL,
  `problem` blob NOT NULL,
  `answer` varchar(255) DEFAULT NULL,
  `answerBoxHTML` blob,
  `range` varchar(255) DEFAULT NULL,
  `domain` varchar(255) DEFAULT NULL,
  `problem_type` varchar(255) NOT NULL COMMENT 'chapter test, section test, and homework ',
  `time_spent` int(11) DEFAULT NULL,
  PRIMARY KEY (`problem_id`),
  KEY `chapter_id` (`chapter_id`),
  KEY `lesson_id` (`section_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `problems`
--

LOCK TABLES `problems` WRITE;
/*!40000 ALTER TABLE `problems` DISABLE KEYS */;
INSERT INTO `problems` VALUES (1,5,1,'<p>Let: $x^2 - x + 1$ and $g(x) = 3x - 5$</p>\r\n<p>find f(g(x))</p>\r\n<br>\r\n<div class=\"input-group col-xs-12 col-md-4 col-md-offset-4\">\r\n<div class=\"input-group-addon\">\\(f(g(x)) = \\)</div>\r\n</div>\r\n<div class=\"col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3\">\r\n	<div class=\"ProblemEditorContainer ProblemEditor\" id=\"editor\" tabindex=\"0\"></div>\r\n</div>','9x^2-33x+31',NULL,NULL,NULL,'pq',NULL);
INSERT INTO `problems` VALUES (2,5,1,'<p>Does this graph represent a valid function?</p>\r\n	<img class=\"graphQuestion\" src=\"DOCUMENT_ROOTimg/math-1050/problem_assets/1.png\"/><br>\r\n<br/>\r\n\r\n	<input type=\"radio\" id=\"radio1\" name=\"radios\" value=\"yes\" checked>\r\n       <label for=\"radio1\">Yes</label>\r\n    <input type=\"radio\" id=\"radio2\" name=\"radios\" value=\"no\">\r\n       <label for=\"radio2\">No</label>\r\n\r\n','yes',NULL,NULL,NULL,'pk',NULL);
INSERT INTO `problems` VALUES (3,5,1,'<p>Let: $f(x) = 3x - 1\\) and \\(g(x) = frac{1}{x+3}$</p>\r\n<p>find f(g(5))</p>\r\n<div class=\"col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3\">\r\n	<div class=\"ProblemEditorContainer ProblemEditor\" id=\"editor\" tabindex=\"0\"></div>\r\n</div>','-\\dfrac{x}{x+3}',NULL,NULL,NULL,'pq',NULL);
INSERT INTO `problems` VALUES (4,5,1,'<p>Does this graph represent a valid function?</p>\r\n	<img class=\"graphQuestion\" src=\"DOCUMENT_ROOTimg/math-1050/problem_assets/2.png\"/><br>\r\n<br/>\r\n\r\n	<input type=\"radio\" id=\"radio1\" name=\"radios\" value=\"yes\" checked>\r\n       <label for=\"radio1\">Yes</label>\r\n    <input type=\"radio\" id=\"radio2\" name=\"radios\" value=\"no\">\r\n       <label for=\"radio2\">No</label>\r\n\r\n','no',NULL,NULL,NULL,'pk',NULL);
INSERT INTO `problems` VALUES (5,5,1,'<p>Does this graph represent a valid function?</p>\r\n	<img class=\"graphQuestion\" src=\"DOCUMENT_ROOTimg/math-1050/problem_assets/3.png\"/><br>\r\n<br/>\r\n\r\n	<input type=\"radio\" id=\"radio1\" name=\"radios\" value=\"yes\" checked>\r\n       <label for=\"radio1\">Yes</label>\r\n    <input type=\"radio\" id=\"radio2\" name=\"radios\" value=\"no\">\r\n       <label for=\"radio2\">No</label>\r\n','no',NULL,NULL,NULL,'pk',NULL);
INSERT INTO `problems` VALUES (6,5,1,'	<p>Simplify the following expression:</p>\r\n	<span style=\"font-size: 2.5em;\">\\(\\frac{\\frac{5x}{x^2}}{\\frac{x^2}{-5x}}\\)</span><br><br>\r\n<div class=\"col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3\">\r\n	<div class=\"ProblemEditorContainer ProblemEditor\" id=\"editor\" tabindex=\"0\"></div>\r\n</div>','\\dfrac{-25}{x^2}',NULL,NULL,NULL,'pk',NULL);
INSERT INTO `problems` VALUES (8,5,1,'<p>What is the domain of the points on this graph?</p>\r\n<img class=\"graphQuestion\" src=\"DOCUMENT_ROOTimg/math-1050/problem_assets/4.png\"/><br>\r\n<div class=\"col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3\">\r\n	<div class=\"ProblemEditorContainer ProblemEditor\" id=\"editor\" tabindex=\"0\"></div>\r\n</div>','[-3,4]',NULL,NULL,NULL,'pk',NULL);
INSERT INTO `problems` VALUES (9,5,1,'<p>What is the range of the following function?</p>\r\n<img class=\"graphQuestion\" src=\"DOCUMENT_ROOTimg/math-1050/problem_assets/5.png\"/><br>\r\n<div class=\"col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3\">\r\n	<div class=\"ProblemEditorContainer ProblemEditor\" id=\"editor\" tabindex=\"0\"></div>\r\n</div>','[-4,3]',NULL,NULL,NULL,'pk',NULL);
INSERT INTO `problems` VALUES (10,5,1,'<p>What is the range of the following function?</p>\r\n<img class=\"graphQuestion\" src=\"DOCUMENT_ROOTimg/math-1050/problem_assets/6.png\"/><br>\r\n<div class=\"col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3\">\r\n	<div class=\"ProblemEditorContainer ProblemEditor\" id=\"editor\" tabindex=\"0\"></div>\r\n</div>','(0,\\infty)',NULL,NULL,NULL,'pk',NULL);
INSERT INTO `problems` VALUES (11,5,1,'<p>let \\(f(x)=x^2-4x\\) and \\(g(x)=2-\\sqrt{x+3}\\)</p>\n<p>Find \\((g \\circ f)(1)\\)</p>','1','<!--<input class=\"form-control\" id=\"studentAns11\" type=\"text\" onkeyup=\"interpretLex(\'studentAns11\',\'displayStudentAns11\')\">\r\n</div>\r\n<div id=\"displayStudentAns11\"></div>-->\r\n\r\n<div class=\"ProblemEditorContainer ProblemEditor\" id=\"editor\" tabindex=\"0\"></div>',NULL,NULL,'pp',NULL);
INSERT INTO `problems` VALUES (12,5,1,'<p>let \\(f(x)=x^2-4x\\) and \\(g(x)=2-\\sqrt{x+3}\\)</p>\n<p>Find and simplify \\((g \\circ f)(x)\\)</p>','2-\\sqrt{x^{2}-4x+3}','<input class=\"form-control\" id=\"studentAns14\" type=\"text\" onkeyup=\"interpretLex(\'studentAns14\',\'displayStudentAns14\')\">\r\n</div>\r\n<div id=\"displayStudentAns14\"></div>',NULL,NULL,'pp',NULL);
INSERT INTO `problems` VALUES (13,5,1,'<p>let \\(f(x)=x^2-4x\\), \\(g(x)=2-\\sqrt{x+3}\\) and \\(h(x)=\\frac{2x}{x+1}\\)</p>\n<p>Find and simplify \\((h \\circ (g \\circ f))(x)\\)</p>','\\frac{4-2*\\sqrt{x^{2}-4x+3}}{3-\\sqrt{x^{2}-4x+3}}','<input class=\"form-control\" id=\"studentAns19\" type=\"text\" onkeyup=\"interpretLex(\'studentAns19\',\'displayStudentAns19\')\">\r\n</div>\r\n<div id=\"displayStudentAns19\"></div>',NULL,NULL,'pp',NULL);
INSERT INTO `problems` VALUES (15,5,1,'<p>let \\(f(x)=x^2-4x\\) and \\(g(x)=2-\\sqrt{x+3}\\)</p>\n<p>Find and simplify \\((f \\circ g)(x)\\)</p>','x-1','<input class=\"form-control\" id=\"studentAns15\" type=\"text\" onkeyup=\"interpretLex(\'studentAns15\',\'displayStudentAns15\')\">\n</div>\n<div id=\"displayStudentAns15\"></div>',NULL,NULL,'pp',NULL);
INSERT INTO `problems` VALUES (16,5,1,'<p>let \\(g(x)=2-\\sqrt{x+3}\\) and \\(h(x)=\\frac{2x}{x+1}\\)</p>\n<p>Find and simplify \\((g \\circ h)(x)\\)</p>','2-\\sqrt{\\frac{5x+3}{x+1}}','<input class=\"form-control\" id=\"studentAns16\" type=\"text\" onkeyup=\"interpretLex(\'studentAns16\',\'displayStudentAns16\')\">\n</div>\n<div id=\"displayStudentAns16\"></div>',NULL,NULL,'pp',NULL);
INSERT INTO `problems` VALUES (17,5,1,'<p>let \\(g(x)=2-\\sqrt{x+3}\\) and \\(h(x)=\\frac{2x}{x+1}\\)</p>\n<p>Find and simplify \\((h \\circ g)(x)\\)</p>','\\frac{4-2*\\sqrt{x+3}}{3-\\sqrt{x+3}}','<input class=\"form-control\" id=\"studentAns17\" type=\"text\" onkeyup=\"interpretLex(\'studentAns17\',\'displayStudentAns17\')\">\n</div>\n<div id=\"displayStudentAns17\"></div>',NULL,NULL,'pp',NULL);
INSERT INTO `problems` VALUES (18,5,1,'<p>let \\(h(x)=\\frac{2x}{x+1}\\)</p>\n<p>Find and simplify \\((h \\circ h)(x)\\)</p>','\\frac{4x}{3x+1}','<input class=\"form-control\" id=\"studentAns18\" type=\"text\" onkeyup=\"interpretLex(\'studentAns18\',\'displayStudentAns18\')\">\n</div>\n<div id=\"displayStudentAns18\"></div>',NULL,NULL,'pp',NULL);
INSERT INTO `problems` VALUES (20,5,1,'<p>let \\(f(x)=x^2-4x\\), \\(g(x)=2-\\sqrt{x+3}\\) and \\(h(x)=\\frac{2x}{x+1}\\)</p>\n<p>Find and simplify \\((h \\circ g) \\circ f))(x)\\)</p>','\\frac{4-2*\\sqrt{x^2-4x+3}}{3-\\sqrt{x^2-4x+3}}','<input class=\"form-control\" id=\"studentAns20\" type=\"text\" onkeyup=\"interpretLex(\'studentAns20\',\'displayStudentAns20\')\">\n</div>\n<div id=\"displayStudentAns20\"></div>',NULL,NULL,'pp',NULL);
INSERT INTO `problems` VALUES (22,5,1,'<p>let \\(f(x)=x^2-4x\\) and \\(g(x)=2-\\sqrt{x+3}\\)</p>\n<p>Find \\((f \\circ g)(x)\\)</p>','0','<input class=\"form-control\" id=\"studentAns12\" type=\"text\" onkeyup=\"interpretLex(\'studentAns12\',\'displayStudentAns12\')\">\n</div>\n<div id=\"displayStudentAns12\"></div>',NULL,NULL,'pp',NULL);
INSERT INTO `problems` VALUES (23,5,1,'<p>let \\(g(x)=2-\\sqrt{x+3}\\)</p>\n<p>Find \\((g \\circ g)(x)\\)</p>','2-\\sqrt{2}','<input class=\"form-control\" id=\"studentAns13\" type=\"text\" onkeyup=\"interpretLex(\'studentAns13\',\'displayStudentAns13\')\">\n</div>\n<div id=\"displayStudentAns13\"></div>',NULL,NULL,'pp',NULL);
/*!40000 ALTER TABLE `problems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `problems_concepts`
--

DROP TABLE IF EXISTS `problems_concepts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `problems_concepts` (
  `id_problem_tags` int(11) NOT NULL AUTO_INCREMENT,
  `problem_id` int(11) NOT NULL,
  `concept_id` int(11) NOT NULL,
  `priority` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_problem_tags`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `problems_concepts`
--

LOCK TABLES `problems_concepts` WRITE;
/*!40000 ALTER TABLE `problems_concepts` DISABLE KEYS */;
INSERT INTO `problems_concepts` VALUES (1,1,1,NULL);
INSERT INTO `problems_concepts` VALUES (2,2,2,NULL);
INSERT INTO `problems_concepts` VALUES (3,3,1,NULL);
INSERT INTO `problems_concepts` VALUES (4,4,2,NULL);
INSERT INTO `problems_concepts` VALUES (5,5,2,NULL);
INSERT INTO `problems_concepts` VALUES (6,6,3,NULL);
INSERT INTO `problems_concepts` VALUES (7,8,4,NULL);
INSERT INTO `problems_concepts` VALUES (8,9,5,NULL);
INSERT INTO `problems_concepts` VALUES (9,10,5,NULL);
INSERT INTO `problems_concepts` VALUES (10,11,1,NULL);
INSERT INTO `problems_concepts` VALUES (11,12,1,NULL);
INSERT INTO `problems_concepts` VALUES (12,13,1,NULL);
INSERT INTO `problems_concepts` VALUES (13,15,1,NULL);
INSERT INTO `problems_concepts` VALUES (14,16,1,NULL);
INSERT INTO `problems_concepts` VALUES (15,17,1,NULL);
INSERT INTO `problems_concepts` VALUES (16,18,1,NULL);
INSERT INTO `problems_concepts` VALUES (17,20,1,NULL);
INSERT INTO `problems_concepts` VALUES (18,22,1,NULL);
INSERT INTO `problems_concepts` VALUES (19,23,1,NULL);
INSERT INTO `problems_concepts` VALUES (20,2,1,NULL);
/*!40000 ALTER TABLE `problems_concepts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `progress`
--

DROP TABLE IF EXISTS `progress`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `progress` (
  `user_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `progress`
--

LOCK TABLES `progress` WRITE;
/*!40000 ALTER TABLE `progress` DISABLE KEYS */;
/*!40000 ALTER TABLE `progress` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `section_names`
--

DROP TABLE IF EXISTS `section_names`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `section_names` (
  `section_id` int(11) NOT NULL AUTO_INCREMENT,
  `chapter_id` int(11) NOT NULL,
  `section_name` varchar(255) NOT NULL,
  `friendly_view_section_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`section_id`),
  KEY `chapter_id` (`chapter_id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `section_names`
--

LOCK TABLES `section_names` WRITE;
/*!40000 ALTER TABLE `section_names` DISABLE KEYS */;
INSERT INTO `section_names` VALUES (1,1,'Sets of Numbers',2);
INSERT INTO `section_names` VALUES (2,1,'The Cartesian Coordinate Plane',9);
INSERT INTO `section_names` VALUES (3,1,'Distance in the Plane',3);
INSERT INTO `section_names` VALUES (4,1,'Relations',1);
INSERT INTO `section_names` VALUES (5,1,'Graphs of Equations',4);
INSERT INTO `section_names` VALUES (6,1,'Introduction to Functions',10);
INSERT INTO `section_names` VALUES (7,1,'Function Notation',6);
INSERT INTO `section_names` VALUES (8,1,'Function Arithmetic',8);
INSERT INTO `section_names` VALUES (9,1,'Graphs of Functions',5);
INSERT INTO `section_names` VALUES (10,1,'Transformations',7);
INSERT INTO `section_names` VALUES (11,2,'Linear Functions',9);
INSERT INTO `section_names` VALUES (12,2,'Absolute Value Functions',8);
INSERT INTO `section_names` VALUES (13,2,'Quadratic Functions',0);
INSERT INTO `section_names` VALUES (14,2,'Inequalities with Absolute Value and Quadratic Functions',5);
INSERT INTO `section_names` VALUES (15,2,'Regression',13);
INSERT INTO `section_names` VALUES (16,3,'Graphs of Polynomials',12);
INSERT INTO `section_names` VALUES (17,3,'The Factor Theorem and the Remainder Theorem',14);
INSERT INTO `section_names` VALUES (18,3,'Real Zeros of Polynomials - With a calculator',15);
INSERT INTO `section_names` VALUES (19,3,'Real Zeros of Polynomials - Without a calculator',16);
INSERT INTO `section_names` VALUES (20,3,'Complex Zeros and the Fundemental Theroem of Algebra',19);
INSERT INTO `section_names` VALUES (21,4,'Introduction to Rational Functions',3);
INSERT INTO `section_names` VALUES (22,4,'Graphs of Rational Functions',1);
INSERT INTO `section_names` VALUES (23,4,'Rational Inequalities and Applications',5);
INSERT INTO `section_names` VALUES (24,5,'Composition of Functions',1);
INSERT INTO `section_names` VALUES (25,5,'Inverse Functions',2);
INSERT INTO `section_names` VALUES (26,5,'Other Algebraic Functions',3);
INSERT INTO `section_names` VALUES (27,6,'Introduction to Exponential and Logarithmic Functions',1);
INSERT INTO `section_names` VALUES (28,6,'Properties of Logarithms',2);
INSERT INTO `section_names` VALUES (29,6,'Exponential Equations and Inequalities',3);
INSERT INTO `section_names` VALUES (30,6,'Logarithmic Equations and Inequalities',4);
INSERT INTO `section_names` VALUES (31,6,'Applications of Exponential Functions',5);
INSERT INTO `section_names` VALUES (32,6,'Applications of Logarithmic Functions',6);
INSERT INTO `section_names` VALUES (33,7,'Introduction to conics',1);
INSERT INTO `section_names` VALUES (34,7,'Circles',2);
INSERT INTO `section_names` VALUES (35,7,'Parabolas',3);
INSERT INTO `section_names` VALUES (36,7,'Ellipses',4);
INSERT INTO `section_names` VALUES (37,7,'Hyperbolas',5);
INSERT INTO `section_names` VALUES (38,8,'Systems of Linear Equations: Gaussian Elimination',1);
INSERT INTO `section_names` VALUES (39,8,'Systems of Linear Equations: Augmented Matrices',2);
INSERT INTO `section_names` VALUES (40,8,'Matric Arithmetic',3);
INSERT INTO `section_names` VALUES (41,8,'Systems of Linear Equations: Matric Inverses',4);
INSERT INTO `section_names` VALUES (42,8,'Definition and Properties of the Determinant',5);
INSERT INTO `section_names` VALUES (43,8,'Cramer\'s Rule and Matrix Adjoints',6);
INSERT INTO `section_names` VALUES (44,8,'Partial Fraction Decomposition',7);
INSERT INTO `section_names` VALUES (45,8,'Systems of Non-Linear Equations and Inequalities',8);
INSERT INTO `section_names` VALUES (46,9,'Sequences',1);
INSERT INTO `section_names` VALUES (47,9,'Summation Notation',2);
INSERT INTO `section_names` VALUES (48,9,'Mathematical Induction',3);
INSERT INTO `section_names` VALUES (49,9,'The Binomial Theorem',4);
INSERT INTO `section_names` VALUES (50,4,'undefined',2);
INSERT INTO `section_names` VALUES (51,4,'undefined',4);
INSERT INTO `section_names` VALUES (62,12,'fasde',2);
INSERT INTO `section_names` VALUES (63,12,'eeeeeeeeeedd',1);
INSERT INTO `section_names` VALUES (66,18,'asdfasdf',NULL);
/*!40000 ALTER TABLE `section_names` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sidebar_content`
--

DROP TABLE IF EXISTS `sidebar_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sidebar_content` (
  `chapter_id` int(10) NOT NULL,
  `lesson_id` int(10) NOT NULL,
  `concept_id` int(10) NOT NULL,
  `content` text NOT NULL,
  `type` int(2) NOT NULL COMMENT 'Referenced from sidebar_types table',
  KEY `chapter_id` (`chapter_id`),
  KEY `lesson_id` (`lesson_id`),
  KEY `concept_id` (`concept_id`),
  KEY `type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sidebar_content`
--

LOCK TABLES `sidebar_content` WRITE;
/*!40000 ALTER TABLE `sidebar_content` DISABLE KEYS */;
/*!40000 ALTER TABLE `sidebar_content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sidebar_types`
--

DROP TABLE IF EXISTS `sidebar_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sidebar_types` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sidebar_types`
--

LOCK TABLES `sidebar_types` WRITE;
/*!40000 ALTER TABLE `sidebar_types` DISABLE KEYS */;
INSERT INTO `sidebar_types` VALUES (1,'Important');
INSERT INTO `sidebar_types` VALUES (2,'Resources');
INSERT INTO `sidebar_types` VALUES (3,'Pitfalls');
INSERT INTO `sidebar_types` VALUES (4,'Recycled');
/*!40000 ALTER TABLE `sidebar_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_completion`
--

DROP TABLE IF EXISTS `student_completion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_completion` (
  `student_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `concept_id` int(11) NOT NULL,
  `amount_completed` tinyint(3) NOT NULL,
  KEY `student_id` (`student_id`,`group_id`,`concept_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_completion`
--

LOCK TABLES `student_completion` WRITE;
/*!40000 ALTER TABLE `student_completion` DISABLE KEYS */;
/*!40000 ALTER TABLE `student_completion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_attempts`
--

DROP TABLE IF EXISTS `user_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_attempts` (
  `id_user_attempts` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `problem_id` int(11) NOT NULL,
  `correct` tinyint(1) NOT NULL,
  `user_answer` varchar(255) NOT NULL,
  `user_work` text NOT NULL,
  `vars` varchar(255) NOT NULL,
  `date_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_user_attempts`),
  KEY `user_id` (`user_id`),
  KEY `problem_id` (`problem_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_attempts`
--

LOCK TABLES `user_attempts` WRITE;
/*!40000 ALTER TABLE `user_attempts` DISABLE KEYS */;
INSERT INTO `user_attempts` VALUES (1,2,5,0,'yes','','',NULL);
INSERT INTO `user_attempts` VALUES (3,2,5,1,'no','','',NULL);
INSERT INTO `user_attempts` VALUES (4,2,2,0,'no','','',NULL);
INSERT INTO `user_attempts` VALUES (5,2,2,0,'no','','',NULL);
INSERT INTO `user_attempts` VALUES (6,3,5,1,'no','','',NULL);
INSERT INTO `user_attempts` VALUES (7,3,2,1,'yes','','',NULL);
INSERT INTO `user_attempts` VALUES (8,3,11,1,'1','','',NULL);
INSERT INTO `user_attempts` VALUES (9,4,5,1,'no','','',NULL);
INSERT INTO `user_attempts` VALUES (10,4,2,0,'no','','',NULL);
INSERT INTO `user_attempts` VALUES (11,4,2,1,'yes','','',NULL);
/*!40000 ALTER TABLE `user_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_passwords`
--

DROP TABLE IF EXISTS `user_passwords`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_passwords` (
  `id` int(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `previous_pass` varchar(255) NOT NULL,
  `change_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password` (`password`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_passwords`
--

LOCK TABLES `user_passwords` WRITE;
/*!40000 ALTER TABLE `user_passwords` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_passwords` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-11-11 13:52:19
