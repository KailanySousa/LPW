CREATE DATABASE  IF NOT EXISTS `db_locadora` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */;
USE `db_locadora`;
-- MySQL dump 10.13  Distrib 8.0.15, for Win64 (x86_64)
--
-- Host: localhost    Database: db_locadora
-- ------------------------------------------------------
-- Server version	8.0.15

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
-- Table structure for table `tbl_atividade_ator`
--

DROP TABLE IF EXISTS `tbl_atividade_ator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_atividade_ator` (
  `cod_atividade_ator` int(11) NOT NULL AUTO_INCREMENT,
  `cod_ator` int(11) NOT NULL,
  `cod_atividade` int(11) NOT NULL,
  PRIMARY KEY (`cod_atividade_ator`),
  KEY `fk_tbl_atividade_ator_tbl_ator1_idx` (`cod_ator`),
  KEY `fk_tbl_atividade_ator_tbl_atividade1_idx` (`cod_atividade`),
  CONSTRAINT `fk_tbl_atividade_ator_tbl_atividade1` FOREIGN KEY (`cod_atividade`) REFERENCES `tbl_atividade` (`cod_atividade`),
  CONSTRAINT `fk_tbl_atividade_ator_tbl_ator1` FOREIGN KEY (`cod_ator`) REFERENCES `tbl_ator` (`cod_ator`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_atividade_ator`
--

LOCK TABLES `tbl_atividade_ator` WRITE;
/*!40000 ALTER TABLE `tbl_atividade_ator` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_atividade_ator` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-04-14 23:28:35
