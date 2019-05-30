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
-- Table structure for table `tbl_sobre`
--

DROP TABLE IF EXISTS `tbl_sobre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_sobre` (
  `cod_sobre` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `texto` varchar(350) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `ativo` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cod_sobre`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_sobre`
--

LOCK TABLES `tbl_sobre` WRITE;
/*!40000 ALTER TABLE `tbl_sobre` DISABLE KEYS */;
INSERT INTO `tbl_sobre` VALUES (2,'História','Em 2012 Canis Latrans alugou um ponto comercial, inaugurando a primeira loja Acme Tunes.','50024a0b5a0d81935276b9c10b80fd4c.png',1),(3,'Objetivo','Agregar inovação e credibilidade aos produtos e serviços oferecidos aos clientes. ','326ba860fe98b11ab57ae1613805c7de.png',1),(5,'Valores','Qualidade, comprometimento, segurança, prazos, experiências, transparência e inovação.','20a510bf642e8bb65f305788bdb1ccef.png',1),(6,'Premiações','Considerada a melhor locadora com mais avaliações positivas.','55808fa84bdce6adfbae9553fa00ceb2.png',1),(7,'teste','teste','87918f21ae7fb31a1fd4d461ca95a7b3.png',0);
/*!40000 ALTER TABLE `tbl_sobre` ENABLE KEYS */;
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
