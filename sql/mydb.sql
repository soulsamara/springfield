CREATE DATABASE  IF NOT EXISTS `mydb` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `mydb`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: mydb
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.21-MariaDB

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
-- Table structure for table `asignatura`
--

DROP TABLE IF EXISTS `asignatura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asignatura` (
  `id_asignatura` int(11) NOT NULL AUTO_INCREMENT,
  `asignatura` varchar(255) NOT NULL,
  PRIMARY KEY (`id_asignatura`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asignatura`
--

LOCK TABLES `asignatura` WRITE;
/*!40000 ALTER TABLE `asignatura` DISABLE KEYS */;
INSERT INTO `asignatura` VALUES (1,'Biologia'),(2,'Matematicas'),(3,'Sistemas');
/*!40000 ALTER TABLE `asignatura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asignatura_alumno`
--

DROP TABLE IF EXISTS `asignatura_alumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asignatura_alumno` (
  `id_asignatura` int(11) DEFAULT NULL,
  `id_alumno` int(11) DEFAULT NULL,
  `id_asignatura_alumno` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_asignatura_alumno`),
  KEY `IDX_BD5922FC37C95619` (`id_asignatura`),
  KEY `IDX_BD5922FC320260C0` (`id_alumno`),
  CONSTRAINT `FK_BD5922FC320260C0` FOREIGN KEY (`id_alumno`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_BD5922FC37C95619` FOREIGN KEY (`id_asignatura`) REFERENCES `asignatura` (`id_asignatura`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asignatura_alumno`
--

LOCK TABLES `asignatura_alumno` WRITE;
/*!40000 ALTER TABLE `asignatura_alumno` DISABLE KEYS */;
INSERT INTO `asignatura_alumno` VALUES (1,1,2);
/*!40000 ALTER TABLE `asignatura_alumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historial`
--

DROP TABLE IF EXISTS `historial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `historial` (
  `id_historial` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `accion_realizada` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_historial`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historial`
--

LOCK TABLES `historial` WRITE;
/*!40000 ALTER TABLE `historial` DISABLE KEYS */;
INSERT INTO `historial` VALUES (2,'2017-06-03',NULL),(3,'2017-06-03',NULL),(4,'2017-06-03','ettssqs'),(5,'2017-06-03','La nota de 1 ha sido actualizada en el periodo: 20144');
/*!40000 ALTER TABLE `historial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nota_semestre_alumno`
--

DROP TABLE IF EXISTS `nota_semestre_alumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nota_semestre_alumno` (
  `id_nota` int(11) NOT NULL AUTO_INCREMENT,
  `nota1` double NOT NULL,
  `nota2` double NOT NULL,
  `nota3` double NOT NULL,
  `id_asignatura_alumno` int(11) NOT NULL,
  `semestre` varchar(25) NOT NULL,
  `promedio` float DEFAULT NULL,
  PRIMARY KEY (`id_nota`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nota_semestre_alumno`
--

LOCK TABLES `nota_semestre_alumno` WRITE;
/*!40000 ALTER TABLE `nota_semestre_alumno` DISABLE KEYS */;
INSERT INTO `nota_semestre_alumno` VALUES (1,3.5,2.5,4.3,1,'20171',10),(2,2.6,5,2.3,1,'20172',NULL),(3,4.3,2.2,5,1,'20171',3.83333),(11,5,1,3,1,'20172',NULL),(12,5,1,4,1,'20171',NULL),(13,5,3,2,1,'20172',NULL),(14,5,4,4,1,'20144',NULL),(15,5,6,6,1,'20144',NULL);
/*!40000 ALTER TABLE `nota_semestre_alumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profesor_asignatura`
--

DROP TABLE IF EXISTS `profesor_asignatura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profesor_asignatura` (
  `id_profesor` int(11) NOT NULL,
  `id_asignatura` int(11) NOT NULL,
  `id_profesor_asignatura` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_profesor_asignatura`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profesor_asignatura`
--

LOCK TABLES `profesor_asignatura` WRITE;
/*!40000 ALTER TABLE `profesor_asignatura` DISABLE KEYS */;
INSERT INTO `profesor_asignatura` VALUES (3,1,2),(5,3,3);
/*!40000 ALTER TABLE `profesor_asignatura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id_tipo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_usuario`
--

LOCK TABLES `tipo_usuario` WRITE;
/*!40000 ALTER TABLE `tipo_usuario` DISABLE KEYS */;
INSERT INTO `tipo_usuario` VALUES (1,'Profesor'),(2,'Alumno');
/*!40000 ALTER TABLE `tipo_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D64992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_8D93D649A0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_8D93D649C05FB297` (`confirmation_token`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'aavendano','aavendano','aavendano@test.com','aavendano@test.com',1,'test','123456','0000-00-00 00:00:00','2','0000-00-00 00:00:00','1'),(2,'alumno','alumno','soul.samara@gmail.com','soul.samara@gmail.com',1,NULL,'$2y$13$uuESmWUxJibJQqIF2QeHMOaW13W87d47/XwsVdjOQ/nOJ79iToQnK','2017-06-05 03:00:49',NULL,NULL,'a:0:{}'),(3,'profesor','profesor','samara@gmail.com','samara@gmail.com',1,NULL,'$2y$13$GBkuyKRKP4qGA.qDGpP9MuAKzke5mGePoGIqzU/IXkEJhuHPfHVEa','2017-06-05 03:06:06',NULL,NULL,'a:1:{i:0;s:10:\"ROLE_ADMIN\";}'),(4,'adminuser','adminuser','soul@gmail.com','soul@gmail.com',1,NULL,'$2y$13$dTYKfjBH3MGKo1VnyZkaY.J6vnwaGsw6C36OSRLnQTp0JpG9/1ufa',NULL,NULL,NULL,'a:1:{i:0;s:16:\"ROLE_SUPER_ADMIN\";}');
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

-- Dump completed on 2017-06-05  8:47:42
