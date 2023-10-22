-- MySQL dump 10.13  Distrib 5.7.36, for Win64 (x86_64)
--
-- Host: localhost    Database: academia
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod` varchar(20) NOT NULL,
  `nom` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cod` (`cod`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cursos`
--

LOCK TABLES `cursos` WRITE;
/*!40000 ALTER TABLE `cursos` DISABLE KEYS */;
INSERT INTO `cursos` VALUES (1,'01','ingles 1'),(2,'02','ingles avanzado');
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
  `curso` varchar(20) NOT NULL,
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
  `cod_nom` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ci` (`ci`),
  KEY `curso` (`curso`),
  CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`curso`) REFERENCES `cursos` (`cod`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiante`
--

LOCK TABLES `estudiante` WRITE;
/*!40000 ALTER TABLE `estudiante` DISABLE KEYS */;
INSERT INTO `estudiante` VALUES (1,'01','2023-06-06','martin','vega','v-25.537.565','Masculino','1995-06-21','tovar','tovar','(1101)-579-0032','(5432)-543-4534','ingles 1');
/*!40000 ALTER TABLE `estudiante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notas`
--

DROP TABLE IF EXISTS `notas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `curso` varchar(20) NOT NULL,
  `nom_cur` varchar(30) NOT NULL,
  `rep` varchar(14) NOT NULL,
  `nom_est` varchar(30) NOT NULL,
  `nota` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `curso` (`curso`),
  KEY `rep` (`rep`),
  CONSTRAINT `notas_ibfk_1` FOREIGN KEY (`curso`) REFERENCES `cursos` (`cod`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `notas_ibfk_2` FOREIGN KEY (`rep`) REFERENCES `estudiante` (`ci`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notas`
--

LOCK TABLES `notas` WRITE;
/*!40000 ALTER TABLE `notas` DISABLE KEYS */;
INSERT INTO `notas` VALUES (8,'01','ingles 1','v-25.537.565','martin vega','10'),(9,'01','ingles 1','v-25.537.565','martin vega','20');
/*!40000 ALTER TABLE `notas` ENABLE KEYS */;
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
  `telm` varchar(15) NOT NULL,
  `telf` varchar(15) NOT NULL,
  `ci_est` varchar(14) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ci` (`ci`),
  KEY `ci_est` (`ci_est`),
  CONSTRAINT `representante_ibfk_1` FOREIGN KEY (`ci_est`) REFERENCES `estudiante` (`ci`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `representante`
--

LOCK TABLES `representante` WRITE;
/*!40000 ALTER TABLE `representante` DISABLE KEYS */;
INSERT INTO `representante` VALUES (1,'v-08.710.201','isaura','paredes','tia','(0123)-456-7895','(0123)-456-7899','v-25.537.565');
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
INSERT INTO `usuario` VALUES ('academia','21100e9e60400b9704419459ec2babfd','nom','ape','pre','res',1);
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

-- Dump completed on 2023-06-07 12:29:06
