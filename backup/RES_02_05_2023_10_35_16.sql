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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod` varchar(20) NOT NULL,
  `nom` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cod` (`cod`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cursos`
--

LOCK TABLES `cursos` WRITE;
/*!40000 ALTER TABLE `cursos` DISABLE KEYS */;
INSERT INTO `cursos` VALUES (3,'01','ingles 1'),(4,'02','ingles nivel 2');
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiante`
--

LOCK TABLES `estudiante` WRITE;
/*!40000 ALTER TABLE `estudiante` DISABLE KEYS */;
INSERT INTO `estudiante` VALUES (1,'01','2023-05-01','dscsfds','fsdfsd','v-25.537.565','Masculino','2023-05-17','tovar','dsfsdfsd','(6545)-364-5645','(5464)-564-5645','ingles 1'),(3,'01','2023-05-01','awdawda','vega','v-46.516.565','Femenino','2023-05-09','tovar','wdwqdwe','(6435)-435-4354','(3453)-453-4534','ingles 1'),(4,'01','2023-05-02','martin e','wadwad','v-12.345.678','Masculino','2023-05-09','wadawda','wdwqdwe','(0151)-265-1561','(3453)-453-4534','ingles 1'),(5,'02','2023-05-02','martin','vega','v-33.333.333','Femenino','1988-02-17','tovar','dadasdasdasd','(5165)-156-1561','(5165)-156-1561','ingles nivel 2');
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
INSERT INTO `instrumento` VALUES (1,'032434635','Guitarra','Bestler','1/2','');
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
INSERT INTO `nucleo` VALUES (1,'Silla','Marca','Modelo','Serial','Codigo','Descripcion');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oficina`
--

LOCK TABLES `oficina` WRITE;
/*!40000 ALTER TABLE `oficina` DISABLE KEYS */;
INSERT INTO `oficina` VALUES (1,'Nombre','Marca','Modelo','Serial','Codigo','Descripcion');
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
  `telm` varchar(15) NOT NULL,
  `telf` varchar(15) NOT NULL,
  `ci_est` varchar(14) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ci` (`ci`),
  KEY `ci_est` (`ci_est`),
  CONSTRAINT `representante_ibfk_1` FOREIGN KEY (`ci_est`) REFERENCES `estudiante` (`ci`) ON DELETE NO ACTION ON UPDATE CASCADE
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
INSERT INTO `usuario` VALUES ('martin','48d4a0ea55732c2d74e012277831bee4','martin','vega','apodo','tito',1),('orquesta','c4750a8944b801eb3ad2791d33f77a65','nom','ape','pre','res',1);
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

-- Dump completed on 2023-05-02 10:35:16
