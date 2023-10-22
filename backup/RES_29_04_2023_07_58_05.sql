-- MySQL dump 10.13  Distrib 5.7.36, for Win64 (x86_64)
--
-- Host: localhost    Database: orquestav2
-- ------------------------------------------------------
-- Server version	5.7.36

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
-- Table structure for table `cursos`
--

DROP TABLE IF EXISTS `cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cursos` (
  `nom` varchar(90) NOT NULL,
  `cod` varchar(200) NOT NULL,
  PRIMARY KEY (`nom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cursos`
--

LOCK TABLES `cursos` WRITE;
/*!40000 ALTER TABLE `cursos` DISABLE KEYS */;
/*!40000 ALTER TABLE `cursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estudiante`
--

DROP TABLE IF EXISTS `estudiante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estudiante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inst` varchar(20) NOT NULL,
  `insc` date NOT NULL,
  `nom` varchar(60) NOT NULL,
  `ape` varchar(60) NOT NULL,
  `ci` varchar(14) NOT NULL,
  `gen` varchar(14) NOT NULL,
  `dir` varchar(90) NOT NULL,
  `telf` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ci` (`ci`),
  KEY `inst` (`inst`),
  CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`inst`) REFERENCES `instrumento` (`cod`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiante`
--

LOCK TABLES `estudiante` WRITE;
/*!40000 ALTER TABLE `estudiante` DISABLE KEYS */;
INSERT INTO `estudiante` VALUES (1,'01','2023-04-24','martin','vega','v-25.537.565','Masculino','sddas',''),(2,'03','2023-04-29','martin','vega','v-46.516.565','Masculino','sddas','(0151)-265-1561');
/*!40000 ALTER TABLE `estudiante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horario`
--

DROP TABLE IF EXISTS `horario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `horario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(90) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nom` (`nom`),
  CONSTRAINT `horario_ibfk_1` FOREIGN KEY (`nom`) REFERENCES `cursos` (`nom`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horario`
--

LOCK TABLES `horario` WRITE;
/*!40000 ALTER TABLE `horario` DISABLE KEYS */;
/*!40000 ALTER TABLE `horario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instrumento`
--

DROP TABLE IF EXISTS `instrumento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instrumento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod` varchar(20) NOT NULL,
  `nom` varchar(15) NOT NULL,
  `mar` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cod` (`cod`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instrumento`
--

LOCK TABLES `instrumento` WRITE;
/*!40000 ALTER TABLE `instrumento` DISABLE KEYS */;
INSERT INTO `instrumento` VALUES (1,'01','Arpa','Bestler'),(2,'','Instrumento','Marca'),(4,'02','Corno','Bestler'),(5,'03','Contrabajo','Ideal');
/*!40000 ALTER TABLE `instrumento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `representante`
--

DROP TABLE IF EXISTS `representante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `representante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ci` varchar(14) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `ape` varchar(60) NOT NULL,
  `par` varchar(60) NOT NULL,
  `ocu` varchar(60) NOT NULL,
  `telm` varchar(15) NOT NULL,
  `telf` varchar(15) NOT NULL,
  `telo` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ci` (`ci`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `representante`
--

LOCK TABLES `representante` WRITE;
/*!40000 ALTER TABLE `representante` DISABLE KEYS */;
/*!40000 ALTER TABLE `representante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `usu` varchar(15) NOT NULL,
  `pass` varchar(90) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `ape` varchar(30) NOT NULL,
  `pre` varchar(30) NOT NULL,
  `res` varchar(30) NOT NULL,
  `lvl` int(11) NOT NULL,
  PRIMARY KEY (`usu`),
  UNIQUE KEY `usu` (`usu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES ('orquesta','c4750a8944b801eb3ad2791d33f77a65','nom','ape','pre','res',1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-04-29  7:58:06
