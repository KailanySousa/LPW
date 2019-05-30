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
-- Table structure for table `tbl_ator`
--

DROP TABLE IF EXISTS `tbl_ator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_ator` (
  `cod_ator` int(11) NOT NULL AUTO_INCREMENT,
  `nome_ator` varchar(100) NOT NULL,
  `nome_completo_ator` varchar(200) NOT NULL,
  `imagem_ator` text NOT NULL,
  `data_nascimento` varchar(100) NOT NULL,
  `ativo` tinyint(4) NOT NULL DEFAULT '0',
  `ator_mes` tinyint(4) NOT NULL DEFAULT '0',
  `cod_pais` int(11) NOT NULL,
  PRIMARY KEY (`cod_ator`),
  KEY `fk_ator_pais_idx` (`cod_pais`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_ator`
--

LOCK TABLES `tbl_ator` WRITE;
/*!40000 ALTER TABLE `tbl_ator` DISABLE KEYS */;
INSERT INTO `tbl_ator` VALUES (1,'Sandra Bullock','Sandra Annette Bullock','6b5fcf2867a7e98fd116b6c520df39d3.jpg','26 de Julho de 1964',1,0,2),(3,'Jennifer Aniston','Jennifer Joanna Aniston','97a518b76819e49caa2c9a9a70185bff.jpg','11 de Fevereiro de 1969',1,1,2),(4,'Kelly Overton','Kelly Overton','f1848ba4327ec44a5111f27fb3b18d87.jpg','28 de Agosto de 1978',1,1,2),(5,'Lana Parrila','Lana Maria Parrila','b0759535bd90fee23bff0c823235aa79.jpg','15 de Julho de 1977',1,1,2),(6,'Jhonny Depp','John Christopher Depp II','357d89e05faec29e050a5702b5a8af53.jpg','9 de Julho de 1963',1,1,2),(7,'Gerard Butler','Gerard James Butler','51599f456dfd8a612b83aea0ff5eeb4c.jpg','13 de Novembro de 1969',1,1,3),(8,'Jennifer Morrison','Jennifer Marie Morrison','7e83af8afb02847162ad2657cae948ab.jpg','12 de Abril de 1979',1,1,2),(10,'Rodrigo Santoro','Rodrigo Junqueira Reis Santoro','7b7596c3cde4d05a2c234190e0ebcf50.jpg','22 de Agosto de 1975',1,0,1),(14,'Dwayne Johnson','Dwayne Douglas Johnson','50adfadb07f8b5c9d6cc6e29806de957.jpg','2 de Maio de 1972',1,0,2);
/*!40000 ALTER TABLE `tbl_ator` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-04-26 16:55:18
