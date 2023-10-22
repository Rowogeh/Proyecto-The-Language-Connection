-- MySQL dump 10.13  Distrib 5.7.14, for Win32 (AMD64)
--
-- Host: localhost    Database: orquestav2
-- ------------------------------------------------------
-- Server version	5.7.14

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
-- Table structure for table `estudiante`
--

DROP TABLE IF EXISTS `estudiante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estudiante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rep` varchar(14) NOT NULL,
  `inst` varchar(20) NOT NULL,
  `insc` date NOT NULL,
  `nom` varchar(60) NOT NULL,
  `ape` varchar(60) NOT NULL,
  `ci` varchar(14) NOT NULL,
  `gen` varchar(14) NOT NULL,
  `fnac` date NOT NULL,
  `lnac` varchar(60) NOT NULL,
  `dir` varchar(90) NOT NULL,
  `telm` varchar(15) NOT NULL,
  `telf` varchar(15) NOT NULL,
  `pro` varchar(50) NOT NULL,
  `prog` varchar(50) NOT NULL,
  `edi` varchar(10) NOT NULL,
  `edb` varchar(10) NOT NULL,
  `edd` varchar(10) NOT NULL,
  `eds` varchar(10) NOT NULL,
  `iti` varchar(50) NOT NULL,
  `dirt` varchar(60) NOT NULL,
  `dirtt` varchar(20) NOT NULL,
  `tlf` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ci` (`ci`),
  KEY `rep` (`rep`),
  KEY `inst` (`inst`),
  CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`rep`) REFERENCES `representante` (`ci`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `estudiante_ibfk_2` FOREIGN KEY (`inst`) REFERENCES `instrumento` (`cod`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiante`
--

LOCK TABLES `estudiante` WRITE;
/*!40000 ALTER TABLE `estudiante` DISABLE KEYS */;
INSERT INTO `estudiante` VALUES (1,'v-24.584.962','12311','2020-01-31','Juna','Josa','v-12.312.312','Masculino','1212-12-12','caracas','la arboleda','(1231)-231-2312','(1231)-212-3123','Profesor 2','Orquesta Infantil','Aprovada','Aprovada','Aprovada','Cursando','UPTM','Bailadores, Municipio Rivas Davila, Estado Mérida.','Eduardo Espinoza','(1231)-231-2312');
/*!40000 ALTER TABLE `estudiante` ENABLE KEYS */;
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
  `mdl` varchar(30) NOT NULL,
  `des` varchar(90) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cod` (`cod`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instrumento`
--

LOCK TABLES `instrumento` WRITE;
/*!40000 ALTER TABLE `instrumento` DISABLE KEYS */;
INSERT INTO `instrumento` VALUES (1,'12311','Guitarra','Ideal','1/8','hola');
/*!40000 ALTER TABLE `instrumento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nucleo`
--

DROP TABLE IF EXISTS `nucleo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nucleo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(15) NOT NULL,
  `mar` varchar(30) NOT NULL,
  `mdl` varchar(30) NOT NULL,
  `ser` varchar(30) NOT NULL,
  `cod` varchar(30) NOT NULL,
  `des` varchar(90) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nucleo`
--

LOCK TABLES `nucleo` WRITE;
/*!40000 ALTER TABLE `nucleo` DISABLE KEYS */;
INSERT INTO `nucleo` VALUES (1,'Silla','asd','asd','1231','123','asd');
/*!40000 ALTER TABLE `nucleo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oficina`
--

DROP TABLE IF EXISTS `oficina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oficina` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(15) NOT NULL,
  `mar` varchar(30) NOT NULL,
  `mdl` varchar(30) NOT NULL,
  `ser` varchar(30) NOT NULL,
  `cod` varchar(30) NOT NULL,
  `des` varchar(90) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oficina`
--

LOCK TABLES `oficina` WRITE;
/*!40000 ALTER TABLE `oficina` DISABLE KEYS */;
/*!40000 ALTER TABLE `oficina` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `representante`
--

LOCK TABLES `representante` WRITE;
/*!40000 ALTER TABLE `representante` DISABLE KEYS */;
INSERT INTO `representante` VALUES (1,'v-24.584.962','cesar','sosa','padre','electricista','(1231)-231-2312','(1231)-231-2312','(1231)-231-2312');
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
INSERT INTO `usuario` VALUES ('orquesta','c4750a8944b801eb3ad2791d33f77a65','nom','ape','pre','res',1),('sosa','25d55ad283aa400af464c76d713c07ad','sosa','sosa','k','k',1);
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

-- Dump completed on 2020-01-31  9:19:45
