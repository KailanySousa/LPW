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
-- Table structure for table `tbl_atividade`
--

DROP TABLE IF EXISTS `tbl_atividade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_atividade` (
  `cod_atividade` int(11) NOT NULL AUTO_INCREMENT,
  `atividade` varchar(100) NOT NULL,
  PRIMARY KEY (`cod_atividade`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_atividade`
--

LOCK TABLES `tbl_atividade` WRITE;
/*!40000 ALTER TABLE `tbl_atividade` DISABLE KEYS */;
INSERT INTO `tbl_atividade` VALUES (1,'Ator'),(2,'Músico'),(3,'Produtor'),(4,'Cineasta'),(5,'Roteirista'),(6,'Diretor'),(7,'Modelo');
/*!40000 ALTER TABLE `tbl_atividade` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_atividade_ator`
--

LOCK TABLES `tbl_atividade_ator` WRITE;
/*!40000 ALTER TABLE `tbl_atividade_ator` DISABLE KEYS */;
INSERT INTO `tbl_atividade_ator` VALUES (1,6,1),(2,6,2),(3,6,3),(4,6,4),(5,1,3),(6,1,1),(7,4,1),(8,4,5),(9,4,6),(10,4,3),(11,10,1),(12,3,1),(13,3,6),(14,3,3),(15,8,7),(16,8,1),(17,8,6),(18,8,3),(19,5,1),(20,7,1),(21,7,3),(22,14,1);
/*!40000 ALTER TABLE `tbl_atividade_ator` ENABLE KEYS */;
UNLOCK TABLES;

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

--
-- Table structure for table `tbl_cidade`
--

DROP TABLE IF EXISTS `tbl_cidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_cidade` (
  `cod_cidade` int(11) NOT NULL AUTO_INCREMENT,
  `cidade` varchar(100) NOT NULL,
  `cod_estado` int(11) NOT NULL,
  PRIMARY KEY (`cod_cidade`),
  KEY `cod_estado` (`cod_estado`),
  CONSTRAINT `tbl_cidade_ibfk_1` FOREIGN KEY (`cod_estado`) REFERENCES `tbl_estado` (`cod_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_cidade`
--

LOCK TABLES `tbl_cidade` WRITE;
/*!40000 ALTER TABLE `tbl_cidade` DISABLE KEYS */;
INSERT INTO `tbl_cidade` VALUES (2,'São Paulo',7),(3,'Teresina',25),(4,'Itapevi',7);
/*!40000 ALTER TABLE `tbl_cidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_diretor`
--

DROP TABLE IF EXISTS `tbl_diretor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_diretor` (
  `cod_diretor` int(11) NOT NULL AUTO_INCREMENT,
  `nome_diretor` varchar(200) NOT NULL,
  PRIMARY KEY (`cod_diretor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_diretor`
--

LOCK TABLES `tbl_diretor` WRITE;
/*!40000 ALTER TABLE `tbl_diretor` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_diretor` ENABLE KEYS */;
UNLOCK TABLES;

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

--
-- Table structure for table `tbl_faleconosco`
--

DROP TABLE IF EXISTS `tbl_faleconosco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_faleconosco` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `profissao` varchar(100) NOT NULL,
  `sexo` char(1) NOT NULL,
  `telefone` varchar(100) DEFAULT NULL,
  `celular` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `facebook` text,
  `home_page` text,
  `info_produtos` text,
  `sugestao` text,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_faleconosco`
--

LOCK TABLES `tbl_faleconosco` WRITE;
/*!40000 ALTER TABLE `tbl_faleconosco` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_faleconosco` ENABLE KEYS */;
UNLOCK TABLES;

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
  PRIMARY KEY (`cod_filme`),
  KEY `fk_tbl_filme_tbl_pais1_idx` (`cod_pais`),
  CONSTRAINT `fk_tbl_filme_tbl_pais1` FOREIGN KEY (`cod_pais`) REFERENCES `tbl_pais` (`cod_pais`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_filme`
--

LOCK TABLES `tbl_filme` WRITE;
/*!40000 ALTER TABLE `tbl_filme` DISABLE KEYS */;
INSERT INTO `tbl_filme` VALUES (1,'teste','tes',1,'reste','teste',1,0,'10.00');
/*!40000 ALTER TABLE `tbl_filme` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_filme_ator`
--

DROP TABLE IF EXISTS `tbl_filme_ator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_filme_ator` (
  `cod_filme_ator` int(11) NOT NULL AUTO_INCREMENT,
  `cod_filme` int(11) NOT NULL,
  `cod_ator` int(11) NOT NULL,
  PRIMARY KEY (`cod_filme_ator`),
  KEY `fk_tbl_filme_ator_tbl_filme1_idx` (`cod_filme`),
  KEY `fk_tbl_filme_ator_tbl_ator1_idx` (`cod_ator`),
  CONSTRAINT `fk_tbl_filme_ator_tbl_ator1` FOREIGN KEY (`cod_ator`) REFERENCES `tbl_ator` (`cod_ator`),
  CONSTRAINT `fk_tbl_filme_ator_tbl_filme1` FOREIGN KEY (`cod_filme`) REFERENCES `tbl_filme` (`cod_filme`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_filme_ator`
--

LOCK TABLES `tbl_filme_ator` WRITE;
/*!40000 ALTER TABLE `tbl_filme_ator` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_filme_ator` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_filme_diretor`
--

DROP TABLE IF EXISTS `tbl_filme_diretor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_filme_diretor` (
  `cod_filme_diretor` int(11) NOT NULL AUTO_INCREMENT,
  `cod_diretor` int(11) NOT NULL,
  `cod_filme` int(11) NOT NULL,
  PRIMARY KEY (`cod_filme_diretor`),
  KEY `fk_tbl_filme_diretor_tbl_diretor1_idx` (`cod_diretor`),
  KEY `fk_tbl_filme_diretor_tbl_filme1_idx` (`cod_filme`),
  CONSTRAINT `fk_tbl_filme_diretor_tbl_diretor1` FOREIGN KEY (`cod_diretor`) REFERENCES `tbl_diretor` (`cod_diretor`),
  CONSTRAINT `fk_tbl_filme_diretor_tbl_filme1` FOREIGN KEY (`cod_filme`) REFERENCES `tbl_filme` (`cod_filme`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_filme_diretor`
--

LOCK TABLES `tbl_filme_diretor` WRITE;
/*!40000 ALTER TABLE `tbl_filme_diretor` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_filme_diretor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_loja`
--

DROP TABLE IF EXISTS `tbl_loja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_loja` (
  `cod_loja` int(11) NOT NULL AUTO_INCREMENT,
  `endereco` varchar(100) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `endereco_mapa` text NOT NULL,
  `cod_cidade` int(11) NOT NULL,
  `ativo` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cod_loja`),
  KEY `cod_cidade` (`cod_cidade`),
  CONSTRAINT `tbl_endereco_ibfk_1` FOREIGN KEY (`cod_cidade`) REFERENCES `tbl_cidade` (`cod_cidade`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_loja`
--

LOCK TABLES `tbl_loja` WRITE;
/*!40000 ALTER TABLE `tbl_loja` DISABLE KEYS */;
INSERT INTO `tbl_loja` VALUES (13,'Av. Bruna, n07','06657-800','aa',4,1),(14,'Rua Vermelha, nº265','06654-805','aaa',4,0);
/*!40000 ALTER TABLE `tbl_loja` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_nivelusuario`
--

DROP TABLE IF EXISTS `tbl_nivelusuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_nivelusuario` (
  `cod_nivel` int(11) NOT NULL AUTO_INCREMENT,
  `nivel` varchar(100) NOT NULL,
  `ativo` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`cod_nivel`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_nivelusuario`
--

LOCK TABLES `tbl_nivelusuario` WRITE;
/*!40000 ALTER TABLE `tbl_nivelusuario` DISABLE KEYS */;
INSERT INTO `tbl_nivelusuario` VALUES (9,'Administrador',1);
/*!40000 ALTER TABLE `tbl_nivelusuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_pais`
--

DROP TABLE IF EXISTS `tbl_pais`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_pais` (
  `cod_pais` int(11) NOT NULL AUTO_INCREMENT,
  `pais` varchar(45) NOT NULL,
  PRIMARY KEY (`cod_pais`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_pais`
--

LOCK TABLES `tbl_pais` WRITE;
/*!40000 ALTER TABLE `tbl_pais` DISABLE KEYS */;
INSERT INTO `tbl_pais` VALUES (1,'Brasil'),(2,'Estados Unidos'),(3,'Reino Unido');
/*!40000 ALTER TABLE `tbl_pais` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_promocao`
--

DROP TABLE IF EXISTS `tbl_promocao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_promocao` (
  `cod_promocao` int(11) NOT NULL AUTO_INCREMENT,
  `percentual_desconto` varchar(45) NOT NULL,
  `cod_filme` int(11) NOT NULL,
  PRIMARY KEY (`cod_promocao`),
  KEY `fk_promocao_filme_idx` (`cod_filme`),
  CONSTRAINT `fk_promocao_filme` FOREIGN KEY (`cod_filme`) REFERENCES `tbl_filme` (`cod_filme`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_promocao`
--

LOCK TABLES `tbl_promocao` WRITE;
/*!40000 ALTER TABLE `tbl_promocao` DISABLE KEYS */;
INSERT INTO `tbl_promocao` VALUES (1,'10',1);
/*!40000 ALTER TABLE `tbl_promocao` ENABLE KEYS */;
UNLOCK TABLES;

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

--
-- Table structure for table `tbl_usuario`
--

DROP TABLE IF EXISTS `tbl_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_usuario` (
  `cod_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(200) NOT NULL,
  `email_usuario` varchar(250) NOT NULL,
  `senha_usuario` varchar(255) NOT NULL,
  `ativo` tinyint(1) DEFAULT '0',
  `cod_nivel` int(11) NOT NULL,
  PRIMARY KEY (`cod_usuario`),
  KEY `fk_usuario_nivel` (`cod_nivel`),
  CONSTRAINT `fk_usuario_nivel` FOREIGN KEY (`cod_nivel`) REFERENCES `tbl_nivelusuario` (`cod_nivel`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_usuario`
--

LOCK TABLES `tbl_usuario` WRITE;
/*!40000 ALTER TABLE `tbl_usuario` DISABLE KEYS */;
INSERT INTO `tbl_usuario` VALUES (8,'Kailany','kailany-sousa@gmail.com','202cb962ac59075b964b07152d234b70',0,9),(9,'Ayla','ayla-sousa@gmail.com','202cb962ac59075b964b07152d234b70',0,9);
/*!40000 ALTER TABLE `tbl_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'db_locadora'
--

--
-- Dumping routines for database 'db_locadora'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-04-22 10:37:50
