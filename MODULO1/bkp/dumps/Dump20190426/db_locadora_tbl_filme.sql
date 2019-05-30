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
-- Table structure for table `tbl_filme`
--

DROP TABLE IF EXISTS `tbl_filme`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_filme` (
  `cod_filme` int(11) NOT NULL AUTO_INCREMENT,
  `nome_filme` varchar(200) NOT NULL,
  `imagem_filme` text NOT NULL,
  `cod_pais` int(11) NOT NULL,
  `duracao_filme` varchar(45) NOT NULL,
  `sinopse` text NOT NULL,
  `ativo` tinyint(4) NOT NULL DEFAULT '0',
  `filme_mes` tinyint(4) NOT NULL DEFAULT '0',
  `preco` varchar(45) NOT NULL,
  `cod_classificacao` int(11) NOT NULL,
  `ano_lancamento` int(11) NOT NULL,
  `trailer` text NOT NULL,
  `avaliacao` int(11) DEFAULT NULL,
  PRIMARY KEY (`cod_filme`),
  KEY `fk_tbl_filme_tbl_pais1_idx` (`cod_pais`),
  KEY `fk_tbl_filme_tbl_classificacao_idx` (`cod_classificacao`),
  CONSTRAINT `fk_tbl_filme_tbl_classificacao` FOREIGN KEY (`cod_classificacao`) REFERENCES `tbl_classificacao` (`cod_classificacao`),
  CONSTRAINT `fk_tbl_filme_tbl_pais1` FOREIGN KEY (`cod_pais`) REFERENCES `tbl_pais` (`cod_pais`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_filme`
--

LOCK TABLES `tbl_filme` WRITE;
/*!40000 ALTER TABLE `tbl_filme` DISABLE KEYS */;
INSERT INTO `tbl_filme` VALUES (2,'Caçador de Recompensas','bc5161993ade514a613f4134714724f3.jpg',1,'130 minutos','teste',1,1,'19,90',3,2010,'teste',NULL),(3,'Bob Esponja','90cb25040b90328b7068ec082f53f342.jpg',2,'150 minutos','teste',0,0,'19,90',1,2016,'teste',NULL);
/*!40000 ALTER TABLE `tbl_filme` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-04-26 16:55:17
