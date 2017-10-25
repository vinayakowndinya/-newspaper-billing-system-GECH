-- MySQL dump 10.13  Distrib 5.6.30, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: newspaper
-- ------------------------------------------------------
-- Server version	5.6.30-1

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
-- Table structure for table `attendance`
--

DROP TABLE IF EXISTS `attendance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attendance` (
  `paper` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `day` varchar(20) DEFAULT NULL,
  `delivery` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attendance`
--

LOCK TABLES `attendance` WRITE;
/*!40000 ALTER TABLE `attendance` DISABLE KEYS */;
<<<<<<< HEAD
INSERT INTO `attendance` VALUES ('PRAJA VANI',NULL,NULL,''),('VIJAYA KARNATAKA',NULL,NULL,''),('PRAJA VANI',NULL,NULL,''),('VIJAYA KARNATAKA',NULL,NULL,''),('JANA MITHRA','2017-04-01',NULL,'no'),('PRAJA VANI','2017-04-01',NULL,'yes'),('SAMYUKTHA KARNATAKA','2017-04-01',NULL,'no'),('VIJAYA KARNATAKA','2017-04-01',NULL,'yes'),('JANA MITHRA','2017-04-02',NULL,'no'),('PRAJA VANI','2017-04-02',NULL,'yes'),('SAMYUKTHA KARNATAKA','2017-04-02',NULL,'no'),('VIJAYA KARNATAKA','2017-04-02',NULL,'no'),('JANA MITHRA','2017-04-03',NULL,'no'),('PRAJA VANI','2017-04-03',NULL,'no'),('SAMYUKTHA KARNATAKA','2017-04-03',NULL,'no'),('VIJAYA KARNATAKA','2017-04-03',NULL,'no'),('JANA MITHRA','2017-04-04',NULL,'no'),('PRAJA VANI','2017-04-04',NULL,'no'),('SAMYUKTHA KARNATAKA','2017-04-04',NULL,'no'),('VIJAYA KARNATAKA','2017-04-04',NULL,'no'),('JANA MITHRA','2017-04-05',NULL,'no'),('PRAJA VANI','2017-04-05',NULL,'no'),('SAMYUKTHA KARNATAKA','2017-04-05',NULL,'no'),('VIJAYA KARNATAKA','2017-04-05',NULL,'no'),('JANA MITHRA','2017-04-06',NULL,'no'),('PRAJA VANI','2017-04-06',NULL,'yes'),('SAMYUKTHA KARNATAKA','2017-04-06',NULL,'no'),('VIJAYA KARNATAKA','2017-04-06',NULL,'no'),('JANA MITHRA','2017-04-07',NULL,'no'),('PRAJA VANI','2017-04-07',NULL,'no'),('SAMYUKTHA KARNATAKA','2017-04-07',NULL,'yes'),('VIJAYA KARNATAKA','2017-04-07',NULL,'no'),('JANA MITHRA','2017-04-08',NULL,'no'),('PRAJA VANI','2017-04-08',NULL,'no'),('SAMYUKTHA KARNATAKA','2017-04-08',NULL,'no'),('VIJAYA KARNATAKA','2017-04-08',NULL,'no'),('JANA MITHRA','2017-04-09',NULL,'no'),('PRAJA VANI','2017-04-09',NULL,'no'),('SAMYUKTHA KARNATAKA','2017-04-09',NULL,'no'),('VIJAYA KARNATAKA','2017-04-09',NULL,'no'),('JANA MITHRA','2017-04-10',NULL,'no'),('PRAJA VANI','2017-04-10',NULL,'no'),('SAMYUKTHA KARNATAKA','2017-04-10',NULL,'no'),('VIJAYA KARNATAKA','2017-04-10',NULL,'no'),('JANA MITHRA','2017-04-11',NULL,'no'),('PRAJA VANI','2017-04-11',NULL,'no'),('SAMYUKTHA KARNATAKA','2017-04-11',NULL,'no'),('VIJAYA KARNATAKA','2017-04-11',NULL,'no'),('JANA MITHRA','2017-04-12',NULL,'no'),('PRAJA VANI','2017-04-12',NULL,'no'),('SAMYUKTHA KARNATAKA','2017-04-12',NULL,'no'),('VIJAYA KARNATAKA','2017-04-12',NULL,'no'),('JANA MITHRA','2017-04-13',NULL,'no'),('PRAJA VANI','2017-04-13',NULL,'no'),('SAMYUKTHA KARNATAKA','2017-04-13',NULL,'no'),('VIJAYA KARNATAKA','2017-04-13',NULL,'no'),('JANA MITHRA','2017-04-14',NULL,'no'),('PRAJA VANI','2017-04-14',NULL,'no'),('SAMYUKTHA KARNATAKA','2017-04-14',NULL,'no'),('VIJAYA KARNATAKA','2017-04-14',NULL,'no'),('JANA MITHRA','2017-04-15',NULL,'no'),('PRAJA VANI','2017-04-15',NULL,'no'),('SAMYUKTHA KARNATAKA','2017-04-15',NULL,'no'),('VIJAYA KARNATAKA','2017-04-15',NULL,'no'),('JANA MITHRA','2017-04-16',NULL,'no'),('PRAJA VANI','2017-04-16',NULL,'no'),('SAMYUKTHA KARNATAKA','2017-04-16',NULL,'no'),('VIJAYA KARNATAKA','2017-04-16',NULL,'no'),('JANA MITHRA','2017-04-17',NULL,'no'),('PRAJA VANI','2017-04-17',NULL,'no'),('SAMYUKTHA KARNATAKA','2017-04-17',NULL,'no'),('VIJAYA KARNATAKA','2017-04-17',NULL,'no'),('JANA MITHRA','2017-04-18',NULL,'no'),('PRAJA VANI','2017-04-18',NULL,'no'),('SAMYUKTHA KARNATAKA','2017-04-18',NULL,'no'),('VIJAYA KARNATAKA','2017-04-18',NULL,'no'),('JANA MITHRA','2017-04-19',NULL,'no'),('PRAJA VANI','2017-04-19',NULL,'no'),('SAMYUKTHA KARNATAKA','2017-04-19',NULL,'no'),('VIJAYA KARNATAKA','2017-04-19',NULL,'no'),('JANA MITHRA','2017-04-20',NULL,'no'),('PRAJA VANI','2017-04-20',NULL,'no'),('SAMYUKTHA KARNATAKA','2017-04-20',NULL,'no'),('VIJAYA KARNATAKA','2017-04-20',NULL,'no'),('JANA MITHRA','2017-04-21',NULL,'no'),('PRAJA VANI','2017-04-21',NULL,'no'),('SAMYUKTHA KARNATAKA','2017-04-21',NULL,'no'),('VIJAYA KARNATAKA','2017-04-21',NULL,'no'),('JANA MITHRA','2017-04-22',NULL,'no'),('PRAJA VANI','2017-04-22',NULL,'no'),('SAMYUKTHA KARNATAKA','2017-04-22',NULL,'no'),('VIJAYA KARNATAKA','2017-04-22',NULL,'no'),('JANA MITHRA','2017-04-23',NULL,'no'),('PRAJA VANI','2017-04-23',NULL,'no'),('SAMYUKTHA KARNATAKA','2017-04-23',NULL,'no'),('VIJAYA KARNATAKA','2017-04-23',NULL,'no'),('JANA MITHRA','2017-04-24',NULL,'no'),('PRAJA VANI','2017-04-24',NULL,'no'),('SAMYUKTHA KARNATAKA','2017-04-24',NULL,'no'),('VIJAYA KARNATAKA','2017-04-24',NULL,'no'),('JANA MITHRA','2017-04-25',NULL,'no'),('PRAJA VANI','2017-04-25',NULL,'no'),('SAMYUKTHA KARNATAKA','2017-04-25',NULL,'no'),('VIJAYA KARNATAKA','2017-04-25',NULL,'no'),('JANA MITHRA','2017-04-26',NULL,'no'),('PRAJA VANI','2017-04-26',NULL,'no'),('SAMYUKTHA KARNATAKA','2017-04-26',NULL,'no'),('VIJAYA KARNATAKA','2017-04-26',NULL,'no'),('JANA MITHRA','2017-04-27',NULL,'no'),('PRAJA VANI','2017-04-27',NULL,'no'),('SAMYUKTHA KARNATAKA','2017-04-27',NULL,'no'),('VIJAYA KARNATAKA','2017-04-27',NULL,'no'),('JANA MITHRA','2017-04-28',NULL,'no'),('PRAJA VANI','2017-04-28',NULL,'yes'),('SAMYUKTHA KARNATAKA','2017-04-28',NULL,'no'),('VIJAYA KARNATAKA','2017-04-28',NULL,'no'),('JANA MITHRA','2017-04-29',NULL,'no'),('PRAJA VANI','2017-04-29',NULL,'no'),('SAMYUKTHA KARNATAKA','2017-04-29',NULL,'no'),('VIJAYA KARNATAKA','2017-04-29',NULL,'no'),('JANA MITHRA','2017-04-30',NULL,'no'),('PRAJA VANI','2017-04-30',NULL,'no'),('SAMYUKTHA KARNATAKA','2017-04-30',NULL,'no'),('VIJAYA KARNATAKA','2017-04-30',NULL,'no'),('JANA MITHRA','2017-05-01',NULL,'yes'),('PRAJA VANI','2017-05-01',NULL,'yes'),('SAMYUKTHA KARNATAKA','2017-05-01',NULL,'yes'),('VIJAYA KARNATAKA','2017-05-01',NULL,'yes'),('JANA MITHRA','2017-05-02',NULL,'yes'),('PRAJA VANI','2017-05-02',NULL,'yes'),('SAMYUKTHA KARNATAKA','2017-05-02',NULL,'yes'),('VIJAYA KARNATAKA','2017-05-02',NULL,'yes'),('JANA MITHRA','2017-05-03',NULL,'yes'),('PRAJA VANI','2017-05-03',NULL,'yes'),('SAMYUKTHA KARNATAKA','2017-05-03',NULL,'yes'),('VIJAYA KARNATAKA','2017-05-03',NULL,'yes'),('JANA MITHRA','2017-05-04',NULL,'yes'),('PRAJA VANI','2017-05-04',NULL,'yes'),('SAMYUKTHA KARNATAKA','2017-05-04',NULL,'yes'),('VIJAYA KARNATAKA','2017-05-04',NULL,'yes'),('JANA MITHRA','2017-05-05',NULL,'no'),('PRAJA VANI','2017-05-05',NULL,'no'),('SAMYUKTHA KARNATAKA','2017-05-05',NULL,'no'),('VIJAYA KARNATAKA','2017-05-05',NULL,'no'),('JANA MITHRA','2017-05-06',NULL,'no'),('PRAJA VANI','2017-05-06',NULL,'no'),('SAMYUKTHA KARNATAKA','2017-05-06',NULL,'no'),('VIJAYA KARNATAKA','2017-05-06',NULL,'no'),('JANA MITHRA','2017-05-07',NULL,'no'),('PRAJA VANI','2017-05-07',NULL,'yes'),('SAMYUKTHA KARNATAKA','2017-05-07',NULL,'no'),('VIJAYA KARNATAKA','2017-05-07',NULL,'no'),('JANA MITHRA','2017-05-08',NULL,'no'),('PRAJA VANI','2017-05-08',NULL,'no'),('SAMYUKTHA KARNATAKA','2017-05-08',NULL,'yes'),('VIJAYA KARNATAKA','2017-05-08',NULL,'no'),('JANA MITHRA','2017-05-09',NULL,'no'),('PRAJA VANI','2017-05-09',NULL,'yes'),('SAMYUKTHA KARNATAKA','2017-05-09',NULL,'no'),('VIJAYA KARNATAKA','2017-05-09',NULL,'no'),('JANA MITHRA','2017-05-10',NULL,'no'),('PRAJA VANI','2017-05-10',NULL,'no'),('SAMYUKTHA KARNATAKA','2017-05-10',NULL,'no'),('VIJAYA KARNATAKA','2017-05-10',NULL,'no'),('JANA MITHRA','2017-05-11',NULL,'no'),('PRAJA VANI','2017-05-11',NULL,'no'),('SAMYUKTHA KARNATAKA','2017-05-11',NULL,'no'),('VIJAYA KARNATAKA','2017-05-11',NULL,'no'),('JANA MITHRA','2017-05-12',NULL,'no'),('PRAJA VANI','2017-05-12',NULL,'no'),('SAMYUKTHA KARNATAKA','2017-05-12',NULL,'no'),('VIJAYA KARNATAKA','2017-05-12',NULL,'no'),('JANA MITHRA','2017-05-13',NULL,'no'),('PRAJA VANI','2017-05-13',NULL,'no'),('SAMYUKTHA KARNATAKA','2017-05-13',NULL,'no'),('VIJAYA KARNATAKA','2017-05-13',NULL,'no'),('JANA MITHRA','2017-05-14',NULL,'no'),('PRAJA VANI','2017-05-14',NULL,'no'),('SAMYUKTHA KARNATAKA','2017-05-14',NULL,'no'),('VIJAYA KARNATAKA','2017-05-14',NULL,'no'),('JANA MITHRA','2017-05-15',NULL,'no'),('PRAJA VANI','2017-05-15',NULL,'no'),('SAMYUKTHA KARNATAKA','2017-05-15',NULL,'no'),('VIJAYA KARNATAKA','2017-05-15',NULL,'no'),('JANA MITHRA','2017-05-16',NULL,'no'),('PRAJA VANI','2017-05-16',NULL,'no'),('SAMYUKTHA KARNATAKA','2017-05-16',NULL,'yes'),('VIJAYA KARNATAKA','2017-05-16',NULL,'no'),('JANA MITHRA','2017-05-17',NULL,'no'),('PRAJA VANI','2017-05-17',NULL,'no'),('SAMYUKTHA KARNATAKA','2017-05-17',NULL,'no'),('VIJAYA KARNATAKA','2017-05-17',NULL,'no'),('JANA MITHRA','2017-05-18',NULL,'no'),('PRAJA VANI','2017-05-18',NULL,'no'),('SAMYUKTHA KARNATAKA','2017-05-18',NULL,'no'),('VIJAYA KARNATAKA','2017-05-18',NULL,'no'),('JANA MITHRA','2017-05-19',NULL,'no'),('PRAJA VANI','2017-05-19',NULL,'no'),('SAMYUKTHA KARNATAKA','2017-05-19',NULL,'no'),('VIJAYA KARNATAKA','2017-05-19',NULL,'no'),('JANA MITHRA','2017-05-20',NULL,'no'),('PRAJA VANI','2017-05-20',NULL,'no'),('SAMYUKTHA KARNATAKA','2017-05-20',NULL,'no'),('VIJAYA KARNATAKA','2017-05-20',NULL,'no'),('JANA MITHRA','2017-05-21',NULL,'no'),('PRAJA VANI','2017-05-21',NULL,'no'),('SAMYUKTHA KARNATAKA','2017-05-21',NULL,'no'),('VIJAYA KARNATAKA','2017-05-21',NULL,'no'),('JANA MITHRA','2017-05-22',NULL,'no'),('PRAJA VANI','2017-05-22',NULL,'no'),('SAMYUKTHA KARNATAKA','2017-05-22',NULL,'no'),('VIJAYA KARNATAKA','2017-05-22',NULL,'no'),('JANA MITHRA','2017-05-23',NULL,'no'),('PRAJA VANI','2017-05-23',NULL,'no'),('SAMYUKTHA KARNATAKA','2017-05-23',NULL,'no'),('VIJAYA KARNATAKA','2017-05-23',NULL,'no'),('JANA MITHRA','2017-05-24',NULL,'no'),('PRAJA VANI','2017-05-24',NULL,'no'),('SAMYUKTHA KARNATAKA','2017-05-24',NULL,'no'),('VIJAYA KARNATAKA','2017-05-24',NULL,'no'),('JANA MITHRA','2017-05-25',NULL,'no'),('PRAJA VANI','2017-05-25',NULL,'no'),('SAMYUKTHA KARNATAKA','2017-05-25',NULL,'no'),('VIJAYA KARNATAKA','2017-05-25',NULL,'no'),('JANA MITHRA','2017-05-26',NULL,'no'),('PRAJA VANI','2017-05-26',NULL,'no'),('SAMYUKTHA KARNATAKA','2017-05-26',NULL,'no'),('VIJAYA KARNATAKA','2017-05-26',NULL,'no'),('JANA MITHRA','2017-05-27',NULL,'no'),('PRAJA VANI','2017-05-27',NULL,'no'),('SAMYUKTHA KARNATAKA','2017-05-27',NULL,'no'),('VIJAYA KARNATAKA','2017-05-27',NULL,'no'),('JANA MITHRA','2017-05-28',NULL,'no'),('PRAJA VANI','2017-05-28',NULL,'no'),('SAMYUKTHA KARNATAKA','2017-05-28',NULL,'no'),('VIJAYA KARNATAKA','2017-05-28',NULL,'no'),('JANA MITHRA','2017-05-29',NULL,'no'),('PRAJA VANI','2017-05-29',NULL,'no'),('SAMYUKTHA KARNATAKA','2017-05-29',NULL,'no'),('VIJAYA KARNATAKA','2017-05-29',NULL,'no'),('JANA MITHRA','2017-05-30',NULL,'yes'),('PRAJA VANI','2017-05-30',NULL,'yes'),('SAMYUKTHA KARNATAKA','2017-05-30',NULL,'yes'),('VIJAYA KARNATAKA','2017-05-30',NULL,'yes'),('JANA MITHRA','2017-05-31',NULL,'yes'),('PRAJA VANI','2017-05-31',NULL,'yes'),('SAMYUKTHA KARNATAKA','2017-05-31',NULL,'yes'),('VIJAYA KARNATAKA','2017-05-31',NULL,'yes');
=======
INSERT INTO `attendance` VALUES ('prajavani','2016-10-28','sat','yes'),('vijaya karnataka','2016-10-28','sat','yes'),('kannada prabha','2016-10-28','sat','yes'),('samyuktha karnataka','2016-10-28','sat','yes'),('janamitra','2016-10-28','sat','no'),('vijaya vani','2016-10-28','sat','no'),('Indian express','2016-10-28','sat','no'),('the hindu','2016-10-28','sat','yes'),('times of India','2016-10-28','sat','yes'),('prajavani','2016-10-28','mon','yes'),('vijaya karnataka','2016-10-28','mon','no'),('kannada prabha','2016-10-28','mon','no'),('samyuktha karnataka','2016-10-28','mon','no'),('janamitra','2016-10-28','mon','no'),('vijaya vani','2016-10-28','mon','no'),('Indian express','2016-10-28','mon','no'),('the hindu','2016-10-28','mon','no'),('times of India','2016-10-28','mon','yes'),('prajavani','2016-10-28','sat','yes'),('vijaya karnataka','2016-10-28','sat','yes'),('kannada prabha','2016-10-28','sat','yes'),('samyuktha karnataka','2016-10-28','sat','yes'),('janamitra','2016-10-28','sat','yes'),('vijaya vani','2016-10-28','sat','yes'),('Indian express','2016-10-28','sat','no'),('the hindu','2016-10-28','sat','no'),('times of India','2016-10-28','sat','no'),('prajavani','2016-10-28','wed','yes'),('vijaya karnataka','2016-10-28','wed','yes'),('kannada prabha','2016-10-28','wed','yes'),('samyuktha karnataka','2016-10-28','wed','yes'),('janamitra','2016-10-28','wed','yes'),('vijaya vani','2016-10-28','wed','yes'),('Indian express','2016-10-28','wed','no'),('the hindu','2016-10-28','wed','no'),('times of India','2016-10-28','wed','no');
>>>>>>> b2023243aa19b4c80c636634fe80e2a8dcce75ca
/*!40000 ALTER TABLE `attendance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cost`
--

DROP TABLE IF EXISTS `cost`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cost` (
<<<<<<< HEAD
  `slno` int(4) NOT NULL,
  `paper` varchar(50) NOT NULL,
  `sunday` float(4,2) DEFAULT NULL,
  `monday` float(4,2) DEFAULT NULL,
  `tuesday` float(4,2) DEFAULT NULL,
  `wednesday` float(4,2) DEFAULT NULL,
  `thursday` float(4,2) DEFAULT NULL,
  `friday` float(4,2) DEFAULT NULL,
  `saturday` float(4,2) DEFAULT NULL,
  PRIMARY KEY (`paper`),
  UNIQUE KEY `slno` (`slno`),
  UNIQUE KEY `slno_2` (`slno`)
=======
  `slno` int(11) NOT NULL,
  `paper` varchar(100) DEFAULT NULL,
  `day` varchar(20) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  PRIMARY KEY (`slno`)
>>>>>>> b2023243aa19b4c80c636634fe80e2a8dcce75ca
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cost`
--

LOCK TABLES `cost` WRITE;
/*!40000 ALTER TABLE `cost` DISABLE KEYS */;
<<<<<<< HEAD
INSERT INTO `cost` VALUES (1,'JANA MITHRA',5.00,2.00,5.00,4.00,4.00,4.00,4.00),(2,'PRAJA VANI',7.00,2.00,6.00,5.00,5.00,5.00,5.00),(3,'SAMYUKTHA KARNATAKA',7.00,2.00,6.50,5.00,5.00,5.00,5.00),(4,'VIJAYA KARNATAKA',8.00,5.00,5.00,7.00,5.00,5.00,5.00);
=======
INSERT INTO `cost` VALUES (1,'prajavani','sun',4),(2,'prajavani','mon',4),(3,'prajavani','tue',4),(4,'prajavani','wed',4),(5,'prajavani','thu',4),(6,'prajavani','fri',4),(7,'prajavani','sat',4),(8,'vijaya karnataka','sun',4),(9,'vijaya karnataka','mon',4),(10,'vijaya karnataka','tue',4),(11,'vijaya karnataka','wed',4),(12,'vijaya karnataka','thu',4),(13,'vijaya karnataka','fri',4),(14,'vijaya karnataka','sat',4),(15,'kannada prabha','sun',4),(16,'kannada prabha','mon',4),(17,'kannada prabha','tue',4),(18,'kannada prabha','wed',4),(19,'kannada prabha','thu',4),(20,'kannada prabha','fri',4),(21,'kannada prabha','sat',4),(22,'samyuktha karnataka','sun',4),(23,'samyuktha karnataka','mon',4),(24,'samyuktha karnataka','tue',4),(25,'samyuktha karnataka','wed',4),(26,'samyuktha karnataka','thu',4),(27,'samyuktha karnataka','fri',4),(28,'samyuktha karnataka','sat',4),(29,'janamitra','sun',4),(30,'janamitra','mon',4),(31,'janamitra','tue',4),(32,'janamitra','wed',4),(33,'janamitra','thu',4),(34,'janamitra','fri',4),(35,'janamitra','sat',4);
>>>>>>> b2023243aa19b4c80c636634fe80e2a8dcce75ca
/*!40000 ALTER TABLE `cost` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `history` (
<<<<<<< HEAD
  `paper` varchar(50) DEFAULT NULL,
  `date` varchar(15) DEFAULT NULL,
  `bill` float DEFAULT NULL,
  UNIQUE KEY `uq` (`paper`,`date`)
=======
  `d1` date DEFAULT NULL,
  `d2` date DEFAULT NULL,
  `pj` int(11) DEFAULT NULL,
  `vk` int(11) DEFAULT NULL,
  `kp` int(11) DEFAULT NULL,
  `sk` int(11) DEFAULT NULL,
  `jm` int(11) DEFAULT NULL,
  `vv` int(11) DEFAULT NULL,
  `ie` int(11) DEFAULT NULL,
  `th` int(11) DEFAULT NULL,
  `ti` int(11) DEFAULT NULL
>>>>>>> b2023243aa19b4c80c636634fe80e2a8dcce75ca
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history`
--

LOCK TABLES `history` WRITE;
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
INSERT INTO `history` VALUES ('2016-10-27','2016-10-27',5,5,8,8,5,5,8,8,5);
/*!40000 ALTER TABLE `history` ENABLE KEYS */;
UNLOCK TABLES;
<<<<<<< HEAD

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `priv` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (5,'admin','password',1),(7,'normal3','pass3',3),(11,'norma','password',1);
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notes`
--

DROP TABLE IF EXISTS `notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notes` (
  `date` date DEFAULT NULL,
  `note` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notes`
--

LOCK TABLES `notes` WRITE;
/*!40000 ALTER TABLE `notes` DISABLE KEYS */;
INSERT INTO `notes` VALUES ('2017-05-04','kj'),('2017-05-04','Rate of praja vani was increased by .5 and reached 2.50 on mondays');
/*!40000 ALTER TABLE `notes` ENABLE KEYS */;
UNLOCK TABLES;
=======
>>>>>>> b2023243aa19b4c80c636634fe80e2a8dcce75ca
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

<<<<<<< HEAD
-- Dump completed on 2017-05-08 11:20:11
=======
-- Dump completed on 2016-10-28 19:19:49
>>>>>>> b2023243aa19b4c80c636634fe80e2a8dcce75ca
