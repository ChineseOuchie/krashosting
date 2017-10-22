-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: localhost    Database: krashosting
-- ------------------------------------------------------
-- Server version	5.6.35

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
-- Table structure for table `customproduct`
--

DROP TABLE IF EXISTS `customproduct`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customproduct` (
  `idcustomproduct` int(11) NOT NULL AUTO_INCREMENT,
  `mb` varchar(45) NOT NULL,
  `ssl` tinyint(4) NOT NULL,
  `prijs` int(111) NOT NULL,
  `idklanten` int(11) NOT NULL,
  PRIMARY KEY (`idcustomproduct`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customproduct`
--

LOCK TABLES `customproduct` WRITE;
/*!40000 ALTER TABLE `customproduct` DISABLE KEYS */;
/*!40000 ALTER TABLE `customproduct` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `klanten`
--

DROP TABLE IF EXISTS `klanten`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `klanten` (
  `idklanten` int(11) NOT NULL AUTO_INCREMENT,
  `voornaam` varchar(45) NOT NULL,
  `tussenvoegsel` varchar(45) DEFAULT NULL,
  `achternaam` varchar(45) NOT NULL,
  `email` mediumtext NOT NULL,
  `telefoonnummer` int(10) NOT NULL,
  `idproducten` int(11) NOT NULL,
  PRIMARY KEY (`idklanten`),
  KEY `producten_idx` (`idproducten`),
  CONSTRAINT `producten` FOREIGN KEY (`idproducten`) REFERENCES `producten` (`idproducten`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `klanten`
--

LOCK TABLES `klanten` WRITE;
/*!40000 ALTER TABLE `klanten` DISABLE KEYS */;
/*!40000 ALTER TABLE `klanten` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medewerkers`
--

DROP TABLE IF EXISTS `medewerkers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medewerkers` (
  `idmedewerkers` int(11) NOT NULL AUTO_INCREMENT,
  `voornaam` varchar(45) NOT NULL,
  `achternaam` varchar(45) NOT NULL,
  `telefoonnummer` varchar(45) NOT NULL,
  `bsn` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `bedrijfsemail` varchar(45) NOT NULL,
  `wachtwoord` varchar(45) NOT NULL,
  `idtype` int(11) NOT NULL,
  PRIMARY KEY (`idmedewerkers`),
  KEY `type_idx` (`idtype`),
  CONSTRAINT `type` FOREIGN KEY (`idtype`) REFERENCES `type` (`idtype`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medewerkers`
--

LOCK TABLES `medewerkers` WRITE;
/*!40000 ALTER TABLE `medewerkers` DISABLE KEYS */;
INSERT INTO `medewerkers` VALUES (22,'Stefan','de Graaf','0642364578','230200369','stefan.degraaf@ictmbo.nl','stefan.degraaf@krashosting.nl','replacepw',1),(23,'Anne Marie','de Graaf','1234567890','123456789','mama@mam.nl','annemarie.degraaf@krashosting.nl','replacepw',2),(24,'Willem Jan','de Graaf','1234567890','123456789','wj@wj.nl','willemjan.degraaf@krashosting.nl','8Kw?r?@5bH5vEQCJ7UJgOijUar9By&',2);
/*!40000 ALTER TABLE `medewerkers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producten`
--

DROP TABLE IF EXISTS `producten`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producten` (
  `idproducten` int(11) NOT NULL AUTO_INCREMENT,
  `naam` varchar(45) NOT NULL,
  `mb` varchar(45) NOT NULL,
  `ssl` tinyint(4) NOT NULL,
  `prijspermaan` int(111) NOT NULL,
  PRIMARY KEY (`idproducten`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producten`
--

LOCK TABLES `producten` WRITE;
/*!40000 ALTER TABLE `producten` DISABLE KEYS */;
/*!40000 ALTER TABLE `producten` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sitecontent`
--

DROP TABLE IF EXISTS `sitecontent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sitecontent` (
  `idsitecontent` int(11) NOT NULL AUTO_INCREMENT,
  `headings` varchar(99) NOT NULL,
  `teksten` text NOT NULL,
  PRIMARY KEY (`idsitecontent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sitecontent`
--

LOCK TABLES `sitecontent` WRITE;
/*!40000 ALTER TABLE `sitecontent` DISABLE KEYS */;
/*!40000 ALTER TABLE `sitecontent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type` (
  `idtype` int(11) NOT NULL AUTO_INCREMENT,
  `naam` varchar(45) NOT NULL,
  `create` tinyint(4) NOT NULL,
  `read` tinyint(4) NOT NULL,
  `update` tinyint(4) NOT NULL,
  `delete` tinyint(4) NOT NULL,
  PRIMARY KEY (`idtype`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type`
--

LOCK TABLES `type` WRITE;
/*!40000 ALTER TABLE `type` DISABLE KEYS */;
INSERT INTO `type` VALUES (1,'Admin',1,1,1,1),(2,'Medewerker',1,1,1,0);
/*!40000 ALTER TABLE `type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'krashosting'
--

--
-- Dumping routines for database 'krashosting'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-17 16:08:53
