-- MySQL dump 10.13  Distrib 8.0.11, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: db_locadora
-- ------------------------------------------------------
-- Server version	8.0.11

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbl_estado`
--

DROP TABLE IF EXISTS `tbl_estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_estado` (
  `cod_estado` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(100) NOT NULL,
  `sigla` varchar(2) NOT NULL,
  PRIMARY KEY (`cod_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_estado`
--

LOCK TABLES `tbl_estado` WRITE;
/*!40000 ALTER TABLE `tbl_estado` DISABLE KEYS */;
INSERT INTO `tbl_estado` VALUES (6,'Rio de Janeiro','RJ'),(7,'São Paulo','SP'),(8,'Acre','AC'),(9,'Alagoas','AL'),(10,'Amapá','AP'),(11,'Amazonas','AM'),(12,'Bahia','BA'),(13,'Ceará','CE'),(14,'Distrito Federal','DF'),(15,'Espírito Santo','ES'),(16,'Goiás','GO'),(17,'Maranhão','MA'),(18,'Mato Grosso','MT'),(19,'Mato Grosso do Sul','MS'),(20,'Minas Gerais','MG'),(21,'Pará','PA'),(22,'Paraíba','PB'),(23,'Paraná','PR'),(24,'Pernambuco','PE'),(25,'Piauí','PI'),(26,'Rio Grande do Norte','RS'),(27,'Rio Grande do Sul','RS'),(28,'Rondônia','RO'),(29,'Roraima','RR'),(30,'Santa Catarina','SC'),(31,'Sergipe','SE'),(32,'Tocantins','TO');
/*!40000 ALTER TABLE `tbl_estado` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-04-26 16:55:19
