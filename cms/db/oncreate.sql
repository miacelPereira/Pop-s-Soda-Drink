CREATE DATABASE  IF NOT EXISTS `db_oncreate` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `db_oncreate`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: db_oncreate
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.38-MariaDB

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
-- Table structure for table `tbl_brinde`
--

DROP TABLE IF EXISTS `tbl_brinde`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_brinde` (
  `id_brinde` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_brinde`),
  UNIQUE KEY `id_brinde_UNIQUE` (`id_brinde`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_brinde`
--

LOCK TABLES `tbl_brinde` WRITE;
/*!40000 ALTER TABLE `tbl_brinde` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_brinde` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_caminhao`
--

DROP TABLE IF EXISTS `tbl_caminhao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_caminhao` (
  `id_caminhao` int(11) NOT NULL AUTO_INCREMENT,
  `modelo_caminhao` varchar(100) NOT NULL,
  `placa` varchar(10) NOT NULL,
  `ano` int(11) NOT NULL,
  `capacidade_peso` double NOT NULL,
  `cubagem` double NOT NULL,
  PRIMARY KEY (`id_caminhao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_caminhao`
--

LOCK TABLES `tbl_caminhao` WRITE;
/*!40000 ALTER TABLE `tbl_caminhao` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_caminhao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_carrinho_compra_pf`
--

DROP TABLE IF EXISTS `tbl_carrinho_compra_pf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_carrinho_compra_pf` (
  `id_carrinho_compra_pf` int(11) NOT NULL AUTO_INCREMENT,
  `id_pessoa_fisica` int(11) NOT NULL,
  `id_brinde` int(11) NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`id_carrinho_compra_pf`),
  KEY `fk_tbl_carrinho_compra_tbl_pessoa_fisica_idx` (`id_pessoa_fisica`),
  KEY `fk_tbl_carrinho_compra_tbl_brinde_idx` (`id_brinde`),
  CONSTRAINT `fk_tbl_carrinho_compra_tbl_brinde` FOREIGN KEY (`id_brinde`) REFERENCES `tbl_brinde` (`id_brinde`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_carrinho_compra_tbl_pessoa_fisica` FOREIGN KEY (`id_pessoa_fisica`) REFERENCES `tbl_pessoa_fisica` (`id_pessoa_fisica`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_carrinho_compra_pf`
--

LOCK TABLES `tbl_carrinho_compra_pf` WRITE;
/*!40000 ALTER TABLE `tbl_carrinho_compra_pf` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_carrinho_compra_pf` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_carrinho_compra_pj`
--

DROP TABLE IF EXISTS `tbl_carrinho_compra_pj`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_carrinho_compra_pj` (
  `id_carrinho_compra` int(11) NOT NULL AUTO_INCREMENT,
  `id_pessoa_juridica` int(11) NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`id_carrinho_compra`),
  KEY `fk_tbl_carrinho_compra_tbl_pessoa_juridica_idx` (`id_pessoa_juridica`),
  CONSTRAINT `fk_tbl_carrinho_compra_tbl_pessoa_juridica` FOREIGN KEY (`id_pessoa_juridica`) REFERENCES `tbl_pessoa_juridica` (`id_pessoa_juridica`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_carrinho_compra_pj`
--

LOCK TABLES `tbl_carrinho_compra_pj` WRITE;
/*!40000 ALTER TABLE `tbl_carrinho_compra_pj` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_carrinho_compra_pj` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_carrinho_produto`
--

DROP TABLE IF EXISTS `tbl_carrinho_produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_carrinho_produto` (
  `id_carrinho_produto` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) NOT NULL,
  `valor` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `id_carrinho_pj` int(11) DEFAULT NULL,
  `id_produto` int(11) NOT NULL,
  `id_carrinho_pf` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_carrinho_produto`),
  KEY `fk_tbl_carrinho_produto_tbl_carrinho_compra_idx` (`id_carrinho_pj`),
  KEY `fk_tbl_carrinho_produto_tbl_produto_acabado_idx` (`id_produto`),
  KEY `fk_tbl_carrinho_produto_tbl_carrinho_compra_pf_idx` (`id_carrinho_pf`),
  CONSTRAINT `fk_tbl_carrinho_produto_tbl_carrinho_compra` FOREIGN KEY (`id_carrinho_pj`) REFERENCES `tbl_carrinho_compra_pj` (`id_carrinho_compra`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_carrinho_produto_tbl_carrinho_compra_pf` FOREIGN KEY (`id_carrinho_pf`) REFERENCES `tbl_carrinho_compra_pf` (`id_carrinho_compra_pf`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_carrinho_produto_tbl_produto_acabado` FOREIGN KEY (`id_produto`) REFERENCES `tbl_produto_acabado` (`id_produto_acabado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_carrinho_produto`
--

LOCK TABLES `tbl_carrinho_produto` WRITE;
/*!40000 ALTER TABLE `tbl_carrinho_produto` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_carrinho_produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_cartao_bandeira`
--

DROP TABLE IF EXISTS `tbl_cartao_bandeira`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_cartao_bandeira` (
  `id_cartao_bandeira` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `id_cartao_pessoa_juriduca` int(11) NOT NULL,
  `id_cartao_pessoa_fisica` int(11) NOT NULL,
  PRIMARY KEY (`id_cartao_bandeira`),
  UNIQUE KEY `id_cartao_bandeira_UNIQUE` (`id_cartao_bandeira`),
  KEY `fk_tbl_cartao_bandeira_tbl_cartao_pessoa_juridica_idx` (`id_cartao_pessoa_juriduca`),
  KEY `fk_Tbl_cartao_bandeira_tbl_cartao_pessoa_fisica_idx` (`id_cartao_pessoa_fisica`),
  CONSTRAINT `fk_Tbl_cartao_bandeira_tbl_cartao_pessoa_fisica` FOREIGN KEY (`id_cartao_pessoa_fisica`) REFERENCES `tbl_pessoa_fisica` (`id_pessoa_fisica`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_cartao_bandeira_tbl_cartao_pessoa_juridica` FOREIGN KEY (`id_cartao_pessoa_juriduca`) REFERENCES `tbl_pessoa_juridica` (`id_pessoa_juridica`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_cartao_bandeira`
--

LOCK TABLES `tbl_cartao_bandeira` WRITE;
/*!40000 ALTER TABLE `tbl_cartao_bandeira` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_cartao_bandeira` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_cartao_pessoa_fisica`
--

DROP TABLE IF EXISTS `tbl_cartao_pessoa_fisica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_cartao_pessoa_fisica` (
  `id_cartao_pessoa_fisica` int(11) NOT NULL AUTO_INCREMENT,
  `id_pessoa_fisica` int(11) NOT NULL,
  `numero_cartao` int(11) NOT NULL,
  `mes_ano` varchar(7) NOT NULL,
  `cvv` varchar(10) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `id_cartao_bandeira` int(11) NOT NULL,
  PRIMARY KEY (`id_cartao_pessoa_fisica`),
  UNIQUE KEY `id_cartao_pessoa_fisica_UNIQUE` (`id_cartao_pessoa_fisica`),
  KEY `fk_tbl_cartao_pessoa_juridica_tbl_cartao_bandeira_idx` (`id_cartao_bandeira`),
  KEY `fk_tbl_cartao_pessoa_fisica_tbl_pessoa_fisica0_idx` (`id_pessoa_fisica`),
  CONSTRAINT `fk_tbl_cartao_pessoa_fisica_tbl_cartao_bandeira0` FOREIGN KEY (`id_cartao_bandeira`) REFERENCES `tbl_cartao_bandeira` (`id_cartao_bandeira`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_cartao_pessoa_fisica_tbl_pessoa_fisica0` FOREIGN KEY (`id_pessoa_fisica`) REFERENCES `tbl_pessoa_fisica` (`id_pessoa_fisica`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_cartao_pessoa_fisica`
--

LOCK TABLES `tbl_cartao_pessoa_fisica` WRITE;
/*!40000 ALTER TABLE `tbl_cartao_pessoa_fisica` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_cartao_pessoa_fisica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_cartao_pessoa_juridica`
--

DROP TABLE IF EXISTS `tbl_cartao_pessoa_juridica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_cartao_pessoa_juridica` (
  `id_cartao_pessoa_juridica` int(11) NOT NULL AUTO_INCREMENT,
  `id_pessoa_juridica` int(11) NOT NULL,
  `numero_cartao` int(11) NOT NULL,
  `mes_ano` varchar(7) NOT NULL,
  `cvv` varchar(10) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `id_cartao_bandeira` int(11) NOT NULL,
  PRIMARY KEY (`id_cartao_pessoa_juridica`),
  KEY `fk_tbl_cartao_pessoa_juridica_tbl_pessoa_juridica_idx` (`id_pessoa_juridica`),
  KEY `fk_tbl_cartao_pessoa_juridica_tbl_cartao_bandeira_idx` (`id_cartao_bandeira`),
  CONSTRAINT `fk_tbl_cartao_pessoa_juridica_tbl_cartao_bandeira` FOREIGN KEY (`id_cartao_bandeira`) REFERENCES `tbl_cartao_bandeira` (`id_cartao_bandeira`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_cartao_pessoa_juridica_tbl_pessoa_juridica` FOREIGN KEY (`id_pessoa_juridica`) REFERENCES `tbl_pessoa_juridica` (`id_pessoa_juridica`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_cartao_pessoa_juridica`
--

LOCK TABLES `tbl_cartao_pessoa_juridica` WRITE;
/*!40000 ALTER TABLE `tbl_cartao_pessoa_juridica` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_cartao_pessoa_juridica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_comentario`
--

DROP TABLE IF EXISTS `tbl_comentario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_comentario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) NOT NULL,
  `comentario` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_tbl_comentario_tbl_posts_idx` (`id_post`),
  CONSTRAINT `fk_tbl_comentario_tbl_posts` FOREIGN KEY (`id_post`) REFERENCES `tbl_posts` (`id_post`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_comentario`
--

LOCK TABLES `tbl_comentario` WRITE;
/*!40000 ALTER TABLE `tbl_comentario` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_comentario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_corredor`
--

DROP TABLE IF EXISTS `tbl_corredor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_corredor` (
  `id_corredor` int(11) NOT NULL AUTO_INCREMENT,
  `nome` int(11) NOT NULL,
  PRIMARY KEY (`id_corredor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_corredor`
--

LOCK TABLES `tbl_corredor` WRITE;
/*!40000 ALTER TABLE `tbl_corredor` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_corredor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_divulgacao`
--

DROP TABLE IF EXISTS `tbl_divulgacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_divulgacao` (
  `id_divulgacao` int(11) NOT NULL AUTO_INCREMENT,
  `nome_estabelecimento` varchar(45) NOT NULL,
  `nome_evento` varchar(45) NOT NULL,
  `endereco_evento` varchar(45) NOT NULL,
  `imagem` text NOT NULL,
  `data` datetime NOT NULL,
  `id_pesso_juridica` int(11) NOT NULL,
  PRIMARY KEY (`id_divulgacao`),
  UNIQUE KEY `id_divulgacao_UNIQUE` (`id_divulgacao`),
  KEY `fk_tbl_divulgacao_tbl_pessoa_juridica_idx` (`id_pesso_juridica`),
  CONSTRAINT `fk_tbl_divulgacao_tbl_pessoa_juridica` FOREIGN KEY (`id_pesso_juridica`) REFERENCES `tbl_pessoa_juridica` (`id_pessoa_juridica`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_divulgacao`
--

LOCK TABLES `tbl_divulgacao` WRITE;
/*!40000 ALTER TABLE `tbl_divulgacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_divulgacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_embalagem`
--

DROP TABLE IF EXISTS `tbl_embalagem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_embalagem` (
  `id_embalagem` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) NOT NULL,
  `unidade_medida` varchar(100) NOT NULL,
  `peso_bruto` double NOT NULL,
  `imposto` double NOT NULL,
  `tempo_ressuprimento` int(11) NOT NULL,
  `intervalo_ressuprimento` int(11) NOT NULL,
  `foto` text NOT NULL,
  `localizacao` int(11) NOT NULL,
  `quantidade_estoque` int(11) NOT NULL,
  PRIMARY KEY (`id_embalagem`),
  KEY `fk_tbl_embalagem_tbl_prateleira_idx` (`localizacao`),
  CONSTRAINT `fk_tbl_embalagem_tbl_prateleira` FOREIGN KEY (`localizacao`) REFERENCES `tbl_prateleira` (`id_prateleira`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_embalagem`
--

LOCK TABLES `tbl_embalagem` WRITE;
/*!40000 ALTER TABLE `tbl_embalagem` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_embalagem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_embalagem_perdida`
--

DROP TABLE IF EXISTS `tbl_embalagem_perdida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_embalagem_perdida` (
  `id_embalagem_perdida` int(11) NOT NULL AUTO_INCREMENT,
  `id_ordem_producao` int(11) NOT NULL,
  `id_embalagem` int(11) NOT NULL,
  `quantidade_perdida` int(11) NOT NULL,
  PRIMARY KEY (`id_embalagem_perdida`),
  KEY `fk_tbl_embalagem_perdida_tbl_ordem_producao_idx` (`id_ordem_producao`),
  KEY `fk_tbl_embalagem_perdida_tbl_embalagem_idx` (`id_embalagem`),
  CONSTRAINT `fk_tbl_embalagem_perdida_tbl_embalagem` FOREIGN KEY (`id_embalagem`) REFERENCES `tbl_embalagem` (`id_embalagem`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_embalagem_perdida_tbl_ordem_producao` FOREIGN KEY (`id_ordem_producao`) REFERENCES `tbl_ordem_producao` (`id_ordem_producao`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_embalagem_perdida`
--

LOCK TABLES `tbl_embalagem_perdida` WRITE;
/*!40000 ALTER TABLE `tbl_embalagem_perdida` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_embalagem_perdida` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_enquetes`
--

DROP TABLE IF EXISTS `tbl_enquetes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_enquetes` (
  `id_enquetes` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  PRIMARY KEY (`id_enquetes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_enquetes`
--

LOCK TABLES `tbl_enquetes` WRITE;
/*!40000 ALTER TABLE `tbl_enquetes` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_enquetes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_escola`
--

DROP TABLE IF EXISTS `tbl_escola`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_escola` (
  `id_solicitacao_escola` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `cnpj` varchar(30) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `cep` int(11) NOT NULL,
  PRIMARY KEY (`id_solicitacao_escola`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_escola`
--

LOCK TABLES `tbl_escola` WRITE;
/*!40000 ALTER TABLE `tbl_escola` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_escola` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_fale_conosco`
--

DROP TABLE IF EXISTS `tbl_fale_conosco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_fale_conosco` (
  `id_contato` int(11) NOT NULL,
  `frase` varchar(45) NOT NULL,
  `primeiro_nome` varchar(45) DEFAULT NULL,
  `sobrenome` varchar(45) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `celular` varchar(45) DEFAULT NULL,
  `mensagem` varchar(45) DEFAULT NULL,
  `tipo_mensagem` int(11) NOT NULL,
  PRIMARY KEY (`id_contato`),
  KEY `fk_tbl_contato_tbl_tipo_mensagem_idx` (`tipo_mensagem`),
  CONSTRAINT `fk_tbl_contato_tbl_tipo_mensagem` FOREIGN KEY (`tipo_mensagem`) REFERENCES `tbl_tipo_mensagem` (`id_tipo_mensagem`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_fale_conosco`
--

LOCK TABLES `tbl_fale_conosco` WRITE;
/*!40000 ALTER TABLE `tbl_fale_conosco` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_fale_conosco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_fornecedor_f`
--

DROP TABLE IF EXISTS `tbl_fornecedor_f`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_fornecedor_f` (
  `id_fornecedor_f` int(11) NOT NULL AUTO_INCREMENT,
  `rg` varchar(30) NOT NULL,
  `razao_social` varchar(100) NOT NULL,
  `nome_fantasia` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `inscricao_estadual` int(11) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `numero` int(11) NOT NULL,
  `site` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_fornecedor_f`),
  UNIQUE KEY `id_fornecedor_f_UNIQUE` (`id_fornecedor_f`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_fornecedor_f`
--

LOCK TABLES `tbl_fornecedor_f` WRITE;
/*!40000 ALTER TABLE `tbl_fornecedor_f` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_fornecedor_f` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_fornecedor_j`
--

DROP TABLE IF EXISTS `tbl_fornecedor_j`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_fornecedor_j` (
  `id_fornecedor_j` int(11) NOT NULL AUTO_INCREMENT,
  `cnpj` varchar(30) NOT NULL,
  `razao_social` varchar(100) NOT NULL,
  `nome_fantasia` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `inscricao_estadual` varchar(30) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `numero` int(11) NOT NULL,
  `site` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_fornecedor_j`),
  UNIQUE KEY `rg_UNIQUE` (`id_fornecedor_j`),
  UNIQUE KEY `cnpj_UNIQUE` (`cnpj`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_fornecedor_j`
--

LOCK TABLES `tbl_fornecedor_j` WRITE;
/*!40000 ALTER TABLE `tbl_fornecedor_j` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_fornecedor_j` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_foto`
--

DROP TABLE IF EXISTS `tbl_foto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_foto` (
  `id_foto` int(11) NOT NULL AUTO_INCREMENT,
  `img` text,
  `id_produto_acabado` int(11) NOT NULL,
  PRIMARY KEY (`id_foto`),
  KEY `fk_tbl_foto_tbl_produto_acabado_idx` (`id_produto_acabado`),
  CONSTRAINT `fk_tbl_foto_tbl_produto_acabado` FOREIGN KEY (`id_produto_acabado`) REFERENCES `tbl_produto_acabado` (`id_produto_acabado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_foto`
--

LOCK TABLES `tbl_foto` WRITE;
/*!40000 ALTER TABLE `tbl_foto` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_foto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_foto_brinde`
--

DROP TABLE IF EXISTS `tbl_foto_brinde`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_foto_brinde` (
  `id_foto_brinde` int(11) NOT NULL AUTO_INCREMENT,
  `img` text,
  `id_brinde` int(11) NOT NULL,
  PRIMARY KEY (`id_foto_brinde`),
  KEY `fk_tbl_foto_brinde_tbl_brinde_idx` (`id_brinde`),
  CONSTRAINT `fk_tbl_foto_brinde_tbl_brinde` FOREIGN KEY (`id_brinde`) REFERENCES `tbl_brinde` (`id_brinde`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='	';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_foto_brinde`
--

LOCK TABLES `tbl_foto_brinde` WRITE;
/*!40000 ALTER TABLE `tbl_foto_brinde` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_foto_brinde` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_fotos_evento`
--

DROP TABLE IF EXISTS `tbl_fotos_evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_fotos_evento` (
  `id_fotos_evento` int(11) NOT NULL AUTO_INCREMENT,
  `fotos` text NOT NULL,
  `id_escola` int(11) NOT NULL,
  PRIMARY KEY (`id_fotos_evento`),
  UNIQUE KEY `id_fotos_imagens_UNIQUE` (`id_fotos_evento`),
  KEY `fk_tbl_fotos_evento_tbl_pops_escola_idx` (`id_escola`),
  CONSTRAINT `fk_tbl_fotos_evento_tbl_pops_escola` FOREIGN KEY (`id_escola`) REFERENCES `tbl_pops_escola` (`id_escola`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_fotos_evento`
--

LOCK TABLES `tbl_fotos_evento` WRITE;
/*!40000 ALTER TABLE `tbl_fotos_evento` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_fotos_evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_fotos_noticias`
--

DROP TABLE IF EXISTS `tbl_fotos_noticias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_fotos_noticias` (
  `id_fotos_noticias` int(11) NOT NULL AUTO_INCREMENT,
  `fotos` text NOT NULL,
  `id_noticias` int(11) NOT NULL,
  PRIMARY KEY (`id_fotos_noticias`),
  UNIQUE KEY `id_fotos_imagens_UNIQUE` (`id_fotos_noticias`),
  KEY `fk_tbl_fotos_noticias_tbl_noticias_idx` (`id_noticias`),
  CONSTRAINT `fk_tbl_fotos_noticias_tbl_noticias` FOREIGN KEY (`id_noticias`) REFERENCES `tbl_noticias` (`id_noticias`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_fotos_noticias`
--

LOCK TABLES `tbl_fotos_noticias` WRITE;
/*!40000 ALTER TABLE `tbl_fotos_noticias` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_fotos_noticias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_funcionario`
--

DROP TABLE IF EXISTS `tbl_funcionario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_funcionario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `matricula` varchar(100) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `id_permissao` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `matricula_UNIQUE` (`matricula`),
  KEY `fk_tbl_funcionario_tbl_perfis_acesso_idx` (`id_permissao`),
  CONSTRAINT `fk_tbl_funcionario_tbl_perfis_acesso` FOREIGN KEY (`id_permissao`) REFERENCES `tbl_permissao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_funcionario`
--

LOCK TABLES `tbl_funcionario` WRITE;
/*!40000 ALTER TABLE `tbl_funcionario` DISABLE KEYS */;
INSERT INTO `tbl_funcionario` VALUES (1,'Administrador do Sistema','CMS001','123',1);
/*!40000 ALTER TABLE `tbl_funcionario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_habilitacao`
--

DROP TABLE IF EXISTS `tbl_habilitacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_habilitacao` (
  `id_habilitacao` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_habilitacao` varchar(1) NOT NULL,
  `motorista` int(11) NOT NULL,
  `vencimento_habilitacao` date NOT NULL,
  PRIMARY KEY (`id_habilitacao`),
  KEY `fk_tbl_habilitacao_tbl_motorista_idx` (`motorista`),
  CONSTRAINT `fk_tbl_habilitacao_tbl_motorista` FOREIGN KEY (`motorista`) REFERENCES `tbl_motorista` (`id_motorista`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_habilitacao`
--

LOCK TABLES `tbl_habilitacao` WRITE;
/*!40000 ALTER TABLE `tbl_habilitacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_habilitacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_historia`
--

DROP TABLE IF EXISTS `tbl_historia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_historia` (
  `id_historia` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) NOT NULL,
  `frase_impacto` varchar(45) NOT NULL,
  `texto1` varchar(45) NOT NULL,
  `imagem1` text NOT NULL,
  `texto2` varchar(45) NOT NULL,
  `imagem2` text NOT NULL,
  PRIMARY KEY (`id_historia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='	';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_historia`
--

LOCK TABLES `tbl_historia` WRITE;
/*!40000 ALTER TABLE `tbl_historia` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_historia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_itinerario`
--

DROP TABLE IF EXISTS `tbl_itinerario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_itinerario` (
  `id_itinerario` int(11) NOT NULL AUTO_INCREMENT,
  `motorista` int(11) NOT NULL,
  `caminhao` int(11) NOT NULL,
  `data` datetime NOT NULL,
  PRIMARY KEY (`id_itinerario`),
  KEY `fk_tbl_itinerario_tbl_motorista_idx` (`motorista`),
  KEY `fk_tbl_itinerario_tbl_caminhao_idx` (`caminhao`),
  CONSTRAINT `fk_tbl_itinerario_tbl_caminhao` FOREIGN KEY (`caminhao`) REFERENCES `tbl_caminhao` (`id_caminhao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_itinerario_tbl_motorista` FOREIGN KEY (`motorista`) REFERENCES `tbl_motorista` (`id_motorista`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_itinerario`
--

LOCK TABLES `tbl_itinerario` WRITE;
/*!40000 ALTER TABLE `tbl_itinerario` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_itinerario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_itinerario_pagamento`
--

DROP TABLE IF EXISTS `tbl_itinerario_pagamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_itinerario_pagamento` (
  `id_itinerario_pagamento` int(11) NOT NULL AUTO_INCREMENT,
  `id_itinerario` int(11) NOT NULL,
  `id_pagamento` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_itinerario_pagamento`),
  KEY `fk_tbl_itinerario_pagamento_tbl_itinerario_idx` (`id_itinerario`),
  KEY `fk_tbl_itinerario_pagamento_tbl_pagamento_idx` (`id_pagamento`),
  CONSTRAINT `fk_tbl_itinerario_pagamento_tbl_itinerario` FOREIGN KEY (`id_itinerario`) REFERENCES `tbl_itinerario` (`id_itinerario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_itinerario_pagamento_tbl_pagamento` FOREIGN KEY (`id_pagamento`) REFERENCES `tbl_pagamento` (`id_pagamento`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_itinerario_pagamento`
--

LOCK TABLES `tbl_itinerario_pagamento` WRITE;
/*!40000 ALTER TABLE `tbl_itinerario_pagamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_itinerario_pagamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_materia_prima`
--

DROP TABLE IF EXISTS `tbl_materia_prima`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_materia_prima` (
  `id_materia_prima` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) NOT NULL,
  `unidade_medida` varchar(100) NOT NULL,
  `peso_bruto` double NOT NULL,
  `imposto` double NOT NULL,
  `tempo_ressuprimento` int(11) NOT NULL,
  `intervalo_ressuprimento` int(11) NOT NULL,
  `foto` text NOT NULL,
  `localizacao` int(11) NOT NULL,
  `quantidade_estoque` int(11) NOT NULL,
  PRIMARY KEY (`id_materia_prima`),
  KEY `fk_tbl_materia_prima_tbl_prateleira_idx` (`localizacao`),
  CONSTRAINT `fk_tbl_materia_prima_tbl_prateleira` FOREIGN KEY (`localizacao`) REFERENCES `tbl_prateleira` (`id_prateleira`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_materia_prima`
--

LOCK TABLES `tbl_materia_prima` WRITE;
/*!40000 ALTER TABLE `tbl_materia_prima` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_materia_prima` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_materia_prima_perdida`
--

DROP TABLE IF EXISTS `tbl_materia_prima_perdida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_materia_prima_perdida` (
  `id_materia_prima_perdida` int(11) NOT NULL,
  `id_ordem_producao` int(11) NOT NULL,
  `id_materia_prima` int(11) NOT NULL,
  `quantidade_perdida` int(11) NOT NULL,
  PRIMARY KEY (`id_materia_prima_perdida`),
  KEY `fk_tbl_materia_prima_perdida_tbl_ordem_producao_idx` (`id_ordem_producao`),
  KEY `fk_tbl_materia_prima_perdida_tbl_materia_prima_idx` (`id_materia_prima`),
  CONSTRAINT `fk_tbl_materia_prima_perdida_tbl_materia_prima` FOREIGN KEY (`id_materia_prima`) REFERENCES `tbl_materia_prima` (`id_materia_prima`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_materia_prima_perdida_tbl_ordem_producao` FOREIGN KEY (`id_ordem_producao`) REFERENCES `tbl_ordem_producao` (`id_ordem_producao`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_materia_prima_perdida`
--

LOCK TABLES `tbl_materia_prima_perdida` WRITE;
/*!40000 ALTER TABLE `tbl_materia_prima_perdida` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_materia_prima_perdida` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_materia_produto`
--

DROP TABLE IF EXISTS `tbl_materia_produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_materia_produto` (
  `id_materia_produto` int(11) NOT NULL AUTO_INCREMENT,
  `id_materia_prima` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  PRIMARY KEY (`id_materia_produto`),
  KEY `fk_tbl_materia_produto_tbl_produto_idx` (`id_produto`),
  KEY `fk_tbl_materia_produto_tbl_materia_prima_idx` (`id_materia_prima`),
  CONSTRAINT `fk_tbl_materia_produto_tbl_materia_prima` FOREIGN KEY (`id_materia_prima`) REFERENCES `tbl_materia_prima` (`id_materia_prima`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_materia_produto_tbl_produto` FOREIGN KEY (`id_produto`) REFERENCES `tbl_produto_acabado` (`id_produto_acabado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_materia_produto`
--

LOCK TABLES `tbl_materia_produto` WRITE;
/*!40000 ALTER TABLE `tbl_materia_produto` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_materia_produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_missao_valores`
--

DROP TABLE IF EXISTS `tbl_missao_valores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_missao_valores` (
  `id_missao_valores` int(11) NOT NULL AUTO_INCREMENT,
  `missao` text NOT NULL,
  `valores` text NOT NULL,
  `imagem` text NOT NULL,
  `titulo` varchar(45) NOT NULL,
  PRIMARY KEY (`id_missao_valores`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_missao_valores`
--

LOCK TABLES `tbl_missao_valores` WRITE;
/*!40000 ALTER TABLE `tbl_missao_valores` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_missao_valores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_motorista`
--

DROP TABLE IF EXISTS `tbl_motorista`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_motorista` (
  `id_motorista` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `rg` varchar(45) NOT NULL,
  `cpf` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id_motorista`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_motorista`
--

LOCK TABLES `tbl_motorista` WRITE;
/*!40000 ALTER TABLE `tbl_motorista` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_motorista` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_nossas_lojas`
--

DROP TABLE IF EXISTS `tbl_nossas_lojas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_nossas_lojas` (
  `id_nossas_lojas` int(11) NOT NULL AUTO_INCREMENT,
  `nome_estabelecimento` varchar(45) DEFAULT NULL,
  `endereco` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `uf` varchar(45) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `imagem` text,
  PRIMARY KEY (`id_nossas_lojas`),
  UNIQUE KEY `id_nossas_lojas_UNIQUE` (`id_nossas_lojas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_nossas_lojas`
--

LOCK TABLES `tbl_nossas_lojas` WRITE;
/*!40000 ALTER TABLE `tbl_nossas_lojas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_nossas_lojas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_nota_fiscal_compra`
--

DROP TABLE IF EXISTS `tbl_nota_fiscal_compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_nota_fiscal_compra` (
  `id_nota_fiscal` int(11) NOT NULL AUTO_INCREMENT,
  `id_fornecedor_f` int(11) NOT NULL,
  `id_fornecedor_j` int(11) NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`id_nota_fiscal`),
  KEY `fk_tbl_nota_fiscal_compra_tbl_fornecedor_idx` (`id_fornecedor_j`),
  KEY `fk_tbl_nota_fiscal_compra_tbl_fornecedor_f_idx` (`id_fornecedor_f`),
  CONSTRAINT `fk_tbl_nota_fiscal_compra_tbl_fornecedor` FOREIGN KEY (`id_fornecedor_j`) REFERENCES `tbl_fornecedor_j` (`id_fornecedor_j`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_nota_fiscal_compra_tbl_fornecedor_f` FOREIGN KEY (`id_fornecedor_f`) REFERENCES `tbl_fornecedor_f` (`id_fornecedor_f`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_nota_fiscal_compra`
--

LOCK TABLES `tbl_nota_fiscal_compra` WRITE;
/*!40000 ALTER TABLE `tbl_nota_fiscal_compra` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_nota_fiscal_compra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_nota_fiscal_embalagem`
--

DROP TABLE IF EXISTS `tbl_nota_fiscal_embalagem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_nota_fiscal_embalagem` (
  `id_nota_fiscal_embalagem` int(11) NOT NULL AUTO_INCREMENT,
  `id_nota_fiscal` int(11) NOT NULL,
  `id_embalagem` int(11) NOT NULL,
  `quantidade_embalagem` int(11) NOT NULL,
  PRIMARY KEY (`id_nota_fiscal_embalagem`),
  KEY `fk_tbl_nota_fiscal_embalagem_tbl_embalagem_idx` (`id_embalagem`),
  KEY `fk_tbl_nota_fiscal_embalagem_tbl_nota_fiscal_compra_idx` (`id_nota_fiscal`),
  CONSTRAINT `fk_tbl_nota_fiscal_embalagem_tbl_embalagem` FOREIGN KEY (`id_embalagem`) REFERENCES `tbl_embalagem` (`id_embalagem`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_nota_fiscal_embalagem_tbl_nota_fiscal_compra` FOREIGN KEY (`id_nota_fiscal`) REFERENCES `tbl_nota_fiscal_compra` (`id_nota_fiscal`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_nota_fiscal_embalagem`
--

LOCK TABLES `tbl_nota_fiscal_embalagem` WRITE;
/*!40000 ALTER TABLE `tbl_nota_fiscal_embalagem` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_nota_fiscal_embalagem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_nota_fiscal_materia_prima`
--

DROP TABLE IF EXISTS `tbl_nota_fiscal_materia_prima`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_nota_fiscal_materia_prima` (
  `id_nota_fiscal_materia_prima` int(11) NOT NULL,
  `id_nota_fiscal` int(11) NOT NULL,
  `id_materia_prima` int(11) NOT NULL,
  `quantidade_materia_prima` int(11) NOT NULL,
  PRIMARY KEY (`id_nota_fiscal_materia_prima`),
  KEY `fk_tbl_nota_fiscal_materia_prima_tbl_nota_fiscal_compra_idx` (`id_nota_fiscal`),
  KEY `fk_tbl_nota_fiscal_materia_prima_tbl_materia_prima_idx` (`id_materia_prima`),
  CONSTRAINT `fk_tbl_nota_fiscal_materia_prima_tbl_materia_prima` FOREIGN KEY (`id_materia_prima`) REFERENCES `tbl_materia_prima` (`id_materia_prima`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_nota_fiscal_materia_prima_tbl_nota_fiscal_compra` FOREIGN KEY (`id_nota_fiscal`) REFERENCES `tbl_nota_fiscal_compra` (`id_nota_fiscal`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_nota_fiscal_materia_prima`
--

LOCK TABLES `tbl_nota_fiscal_materia_prima` WRITE;
/*!40000 ALTER TABLE `tbl_nota_fiscal_materia_prima` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_nota_fiscal_materia_prima` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_noticias`
--

DROP TABLE IF EXISTS `tbl_noticias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_noticias` (
  `id_noticias` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) NOT NULL,
  `descricao` varchar(45) NOT NULL,
  `imagem` text NOT NULL,
  PRIMARY KEY (`id_noticias`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_noticias`
--

LOCK TABLES `tbl_noticias` WRITE;
/*!40000 ALTER TABLE `tbl_noticias` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_noticias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_nutricional`
--

DROP TABLE IF EXISTS `tbl_nutricional`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_nutricional` (
  `id_nutricional` int(11) NOT NULL AUTO_INCREMENT,
  `calorias_quantidade` varchar(45) NOT NULL,
  `calorias_porcentagem` varchar(45) NOT NULL,
  `pontos_quantidade` varchar(45) NOT NULL,
  `pontos_porcentagem` varchar(45) NOT NULL,
  `carboidratos_quantidades` varchar(45) NOT NULL,
  `carboidratos_porcentagem` varchar(45) NOT NULL,
  `proteina_quantidade` varchar(45) NOT NULL,
  `proteina_porcentagem` varchar(45) NOT NULL,
  `gorduras_totais_quantidade` varchar(45) NOT NULL,
  `gorduras_totais_porcentagem` varchar(45) NOT NULL,
  `gorduras_saturadas_quantidade` varchar(45) NOT NULL,
  `gorduras_saturadas_porcentagem` varchar(45) NOT NULL,
  `fibra_alimentar_quantidade` varchar(45) NOT NULL,
  `fibra_alimentar_porcentagem` varchar(45) NOT NULL,
  `sodio_quantidade` varchar(45) NOT NULL,
  `sodio_porcentagem` varchar(45) NOT NULL,
  PRIMARY KEY (`id_nutricional`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_nutricional`
--

LOCK TABLES `tbl_nutricional` WRITE;
/*!40000 ALTER TABLE `tbl_nutricional` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_nutricional` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_opcoes_enquete`
--

DROP TABLE IF EXISTS `tbl_opcoes_enquete`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_opcoes_enquete` (
  `id_opcoes_enquete` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `id_enquetes` int(11) NOT NULL,
  PRIMARY KEY (`id_opcoes_enquete`),
  KEY `fk_tbl_opcoes_enquete_tbl_enquetes_idx` (`id_enquetes`),
  CONSTRAINT `fk_tbl_opcoes_enquete_tbl_enquetes` FOREIGN KEY (`id_enquetes`) REFERENCES `tbl_enquetes` (`id_enquetes`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_opcoes_enquete`
--

LOCK TABLES `tbl_opcoes_enquete` WRITE;
/*!40000 ALTER TABLE `tbl_opcoes_enquete` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_opcoes_enquete` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_ordem_producao`
--

DROP TABLE IF EXISTS `tbl_ordem_producao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_ordem_producao` (
  `id_ordem_producao` int(11) NOT NULL AUTO_INCREMENT,
  `data` datetime NOT NULL,
  `enviar_producao` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_ordem_producao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_ordem_producao`
--

LOCK TABLES `tbl_ordem_producao` WRITE;
/*!40000 ALTER TABLE `tbl_ordem_producao` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_ordem_producao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_ordem_producao_item`
--

DROP TABLE IF EXISTS `tbl_ordem_producao_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_ordem_producao_item` (
  `id_ordem_producao_item` int(11) NOT NULL AUTO_INCREMENT,
  `quantidade_perdida` int(11) NOT NULL,
  `quantidade_produzida` int(11) NOT NULL,
  `id_ordem_producao` int(11) NOT NULL,
  `id_produto_acabado` int(11) NOT NULL,
  PRIMARY KEY (`id_ordem_producao_item`),
  KEY `fk_tbl_ordem_producao_item_tbl_ordem_producao_idx` (`id_ordem_producao`),
  KEY `fk_tbl_ordem_producao_item_tbl_produto_acabado_idx` (`id_produto_acabado`),
  CONSTRAINT `fk_tbl_ordem_producao_item_tbl_ordem_producao` FOREIGN KEY (`id_ordem_producao`) REFERENCES `tbl_ordem_producao` (`id_ordem_producao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_ordem_producao_item_tbl_produto_acabado` FOREIGN KEY (`id_produto_acabado`) REFERENCES `tbl_produto_acabado` (`id_produto_acabado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_ordem_producao_item`
--

LOCK TABLES `tbl_ordem_producao_item` WRITE;
/*!40000 ALTER TABLE `tbl_ordem_producao_item` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_ordem_producao_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_ordem_producao_status`
--

DROP TABLE IF EXISTS `tbl_ordem_producao_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_ordem_producao_status` (
  `id_ordem_producao_status` int(11) NOT NULL AUTO_INCREMENT,
  `id_ordem_producao` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `total_ordem_producao` int(11) NOT NULL,
  PRIMARY KEY (`id_ordem_producao_status`),
  KEY `fk_tbl_ordem_producao_status_tbl_ordem_producao_idx` (`id_ordem_producao`),
  CONSTRAINT `fk_tbl_ordem_producao_status_tbl_ordem_producao` FOREIGN KEY (`id_ordem_producao`) REFERENCES `tbl_ordem_producao` (`id_ordem_producao`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_ordem_producao_status`
--

LOCK TABLES `tbl_ordem_producao_status` WRITE;
/*!40000 ALTER TABLE `tbl_ordem_producao_status` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_ordem_producao_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_pagamento`
--

DROP TABLE IF EXISTS `tbl_pagamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_pagamento` (
  `id_pagamento` int(11) NOT NULL AUTO_INCREMENT,
  `valor_total` double NOT NULL,
  `data` date NOT NULL,
  `efetuado` tinyint(4) NOT NULL,
  `id_carrinho` int(11) NOT NULL,
  `id_pessoa_juridica` int(11) NOT NULL,
  `id_pessoa_fisica` int(11) NOT NULL,
  PRIMARY KEY (`id_pagamento`),
  KEY `fk_tbl_pagamento_tbl_carrinho_compra_idx` (`id_carrinho`),
  KEY `fk_tbl_pagamento_tbl_pessoa_juridica_idx` (`id_pessoa_juridica`),
  KEY `fk_tbl_pagamento_tbl_pessoa_fisica_idx` (`id_pessoa_fisica`),
  CONSTRAINT `fk_tbl_pagamento_tbl_carrinho_compra` FOREIGN KEY (`id_carrinho`) REFERENCES `tbl_carrinho_compra_pj` (`id_carrinho_compra`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_pagamento_tbl_pessoa_fisica` FOREIGN KEY (`id_pessoa_fisica`) REFERENCES `tbl_pessoa_fisica` (`id_pessoa_fisica`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_pagamento_tbl_pessoa_juridica` FOREIGN KEY (`id_pessoa_juridica`) REFERENCES `tbl_pessoa_juridica` (`id_pessoa_juridica`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_pagamento`
--

LOCK TABLES `tbl_pagamento` WRITE;
/*!40000 ALTER TABLE `tbl_pagamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_pagamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_patrocinadores`
--

DROP TABLE IF EXISTS `tbl_patrocinadores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_patrocinadores` (
  `id_patrocinador` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) NOT NULL,
  `imagem` text NOT NULL,
  `nome_equipe` varchar(45) NOT NULL,
  `modalidade` varchar(45) NOT NULL,
  PRIMARY KEY (`id_patrocinador`),
  UNIQUE KEY `id_fale_conosco_UNIQUE` (`id_patrocinador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_patrocinadores`
--

LOCK TABLES `tbl_patrocinadores` WRITE;
/*!40000 ALTER TABLE `tbl_patrocinadores` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_patrocinadores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_permissao`
--

DROP TABLE IF EXISTS `tbl_permissao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_permissao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `pg_pf_home` varchar(10) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `pg_pf_historia` varchar(10) DEFAULT NULL,
  `pg_cms_user` varchar(10) DEFAULT NULL,
  `pg_pf_produto` varchar(10) DEFAULT NULL,
  `pg_pf_brindes` varchar(10) DEFAULT NULL,
  `pg_pf_noticias` varchar(10) DEFAULT NULL,
  `pg_pf_divulgacao` varchar(10) DEFAULT NULL,
  `pg_pf_videos` varchar(10) DEFAULT NULL,
  `pg_pf_patrocinados` varchar(10) DEFAULT NULL,
  `pg_pf_eventos` varchar(10) DEFAULT NULL,
  `pg_pf_nossaslojas` varchar(10) DEFAULT NULL,
  `pg_pf_promocoes` varchar(10) DEFAULT NULL,
  `pg_pf_faleconosco` varchar(10) DEFAULT NULL,
  `pg_pf_popsnaescola` varchar(10) DEFAULT NULL,
  `pg_pf_missaovalores` varchar(10) DEFAULT NULL,
  `padrao` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_permissao`
--

LOCK TABLES `tbl_permissao` WRITE;
/*!40000 ALTER TABLE `tbl_permissao` DISABLE KEYS */;
INSERT INTO `tbl_permissao` VALUES (1,'Administrador','CRUD',1,'CRUD','CRUD','CRUD','CRUD','CRUD','CRUD','CRUD','CRUD','CRUD','CRUD','CRUD','CRUD','CRUD','CRUD',1),(4,'Marketing','CRU',1,'','','','CR','CRUD','CRUD','CRUD','CRUD','CRUD','CRUD','CRUD','R','CRUD','R',1);
/*!40000 ALTER TABLE `tbl_permissao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_pessoa_fisica`
--

DROP TABLE IF EXISTS `tbl_pessoa_fisica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_pessoa_fisica` (
  `id_pessoa_fisica` int(11) NOT NULL AUTO_INCREMENT,
  `cpf` varchar(30) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `senha` varchar(45) NOT NULL,
  PRIMARY KEY (`id_pessoa_fisica`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_pessoa_fisica`
--

LOCK TABLES `tbl_pessoa_fisica` WRITE;
/*!40000 ALTER TABLE `tbl_pessoa_fisica` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_pessoa_fisica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_pessoa_juridica`
--

DROP TABLE IF EXISTS `tbl_pessoa_juridica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_pessoa_juridica` (
  `id_pessoa_juridica` int(11) NOT NULL AUTO_INCREMENT,
  `cnpj` varchar(30) NOT NULL,
  `razao_social` varchar(100) NOT NULL,
  `nome_fantasia` varchar(100) NOT NULL,
  `renda_mensal` double NOT NULL,
  `tipo_estabelecimento` varchar(100) NOT NULL,
  `foto` text NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `numero` int(11) NOT NULL,
  `nome_responsavel` varchar(100) NOT NULL,
  `telefone` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `verificacao` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_pessoa_juridica`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_pessoa_juridica`
--

LOCK TABLES `tbl_pessoa_juridica` WRITE;
/*!40000 ALTER TABLE `tbl_pessoa_juridica` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_pessoa_juridica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_pops_escola`
--

DROP TABLE IF EXISTS `tbl_pops_escola`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_pops_escola` (
  `id_escola` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) NOT NULL,
  `frase_evento` varchar(45) NOT NULL,
  `imagem` text NOT NULL,
  `frase_imagem` varchar(45) NOT NULL,
  `data_imagem` varchar(45) NOT NULL,
  PRIMARY KEY (`id_escola`),
  UNIQUE KEY `id_escola_UNIQUE` (`id_escola`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_pops_escola`
--

LOCK TABLES `tbl_pops_escola` WRITE;
/*!40000 ALTER TABLE `tbl_pops_escola` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_pops_escola` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_posts`
--

DROP TABLE IF EXISTS `tbl_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_posts` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `post` text NOT NULL,
  `id_pessoa_fisica` int(11) NOT NULL,
  PRIMARY KEY (`id_post`),
  UNIQUE KEY `id_UNIQUE` (`id_post`),
  KEY `fk_tbl_posts_tbl_pessoa_fisica_idx` (`id_pessoa_fisica`),
  CONSTRAINT `fk_tbl_posts_tbl_pessoa_fisica` FOREIGN KEY (`id_pessoa_fisica`) REFERENCES `tbl_pessoa_fisica` (`id_pessoa_fisica`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_posts`
--

LOCK TABLES `tbl_posts` WRITE;
/*!40000 ALTER TABLE `tbl_posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_prateleira`
--

DROP TABLE IF EXISTS `tbl_prateleira`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_prateleira` (
  `id_prateleira` int(11) NOT NULL,
  `nome` int(11) NOT NULL,
  `corredor` int(11) NOT NULL,
  PRIMARY KEY (`id_prateleira`),
  KEY `fk_tbl_prateleira_tbl_corredor_idx` (`corredor`),
  CONSTRAINT `fk_tbl_prateleira_tbl_corredor` FOREIGN KEY (`corredor`) REFERENCES `tbl_corredor` (`id_corredor`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_prateleira`
--

LOCK TABLES `tbl_prateleira` WRITE;
/*!40000 ALTER TABLE `tbl_prateleira` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_prateleira` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_produto_acabado`
--

DROP TABLE IF EXISTS `tbl_produto_acabado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_produto_acabado` (
  `id_produto_acabado` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) NOT NULL,
  `unidade_medida` varchar(100) NOT NULL,
  `peso_bruto` double NOT NULL,
  `imposto` double NOT NULL,
  `demanda_mensal` int(11) NOT NULL,
  `tempo_ressuprimento` int(11) NOT NULL,
  `intervalo_ressuprimento` int(11) NOT NULL,
  `quantidade_estoque` int(11) NOT NULL,
  `preco_unidade` double NOT NULL,
  `quantidade_fardo` int(11) NOT NULL,
  `preco_fardo` double NOT NULL,
  `localizacao` int(11) NOT NULL,
  `embalagem` int(11) NOT NULL,
  `id_nutricional` int(11) NOT NULL,
  PRIMARY KEY (`id_produto_acabado`),
  KEY `fk_tbl_produto_tbl_embalagem_idx` (`embalagem`),
  KEY `fk_tbl_produto_acabado_tbl_prateleira_idx` (`localizacao`),
  KEY `fk_tbl_produto_acabado_tbl_nutricional_idx` (`id_nutricional`),
  CONSTRAINT `fk_tbl_produto_acabado_tbl_nutricional` FOREIGN KEY (`id_nutricional`) REFERENCES `tbl_nutricional` (`id_nutricional`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_produto_acabado_tbl_prateleira` FOREIGN KEY (`localizacao`) REFERENCES `tbl_prateleira` (`id_prateleira`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_produto_tbl_embalagem` FOREIGN KEY (`embalagem`) REFERENCES `tbl_embalagem` (`id_embalagem`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_produto_acabado`
--

LOCK TABLES `tbl_produto_acabado` WRITE;
/*!40000 ALTER TABLE `tbl_produto_acabado` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_produto_acabado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_promocao`
--

DROP TABLE IF EXISTS `tbl_promocao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_promocao` (
  `id_promocao` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `descricao` varchar(45) NOT NULL,
  `id_tipo_promocao` int(11) NOT NULL,
  PRIMARY KEY (`id_promocao`),
  UNIQUE KEY `id_UNIQUE` (`id_promocao`),
  KEY `fk_tbl_promocao_tbl_tipo_promocao_idx` (`id_tipo_promocao`),
  CONSTRAINT `fk_tbl_promocao_tbl_tipo_promocao` FOREIGN KEY (`id_tipo_promocao`) REFERENCES `tbl_tipo_promocao` (`id_tipo_promocao`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_promocao`
--

LOCK TABLES `tbl_promocao` WRITE;
/*!40000 ALTER TABLE `tbl_promocao` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_promocao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_resposta_enquete`
--

DROP TABLE IF EXISTS `tbl_resposta_enquete`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_resposta_enquete` (
  `id_resposta_enquete` int(11) NOT NULL AUTO_INCREMENT,
  `resposta` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `id_enquetes` int(11) NOT NULL,
  PRIMARY KEY (`id_resposta_enquete`),
  KEY `fk_tbl_resposta_enquete_tbl_enquetes_idx` (`id_enquetes`),
  CONSTRAINT `fk_tbl_resposta_enquete_tbl_enquetes` FOREIGN KEY (`id_enquetes`) REFERENCES `tbl_enquetes` (`id_enquetes`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_resposta_enquete`
--

LOCK TABLES `tbl_resposta_enquete` WRITE;
/*!40000 ALTER TABLE `tbl_resposta_enquete` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_resposta_enquete` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_resposta_promocao`
--

DROP TABLE IF EXISTS `tbl_resposta_promocao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_resposta_promocao` (
  `id_resposta_promocao` int(11) NOT NULL AUTO_INCREMENT,
  `id_pessoa_fisica` int(11) NOT NULL,
  `id_promocao` int(11) NOT NULL,
  `resposta` varchar(200) NOT NULL,
  PRIMARY KEY (`id_resposta_promocao`),
  KEY `fk_tbl_resposta_promocao_tbl_pessoa_fisica_idx` (`id_pessoa_fisica`),
  KEY `fk_tbl_resposta_promocao_tbl_promocao_idx` (`id_promocao`),
  CONSTRAINT `fk_tbl_resposta_promocao_tbl_pessoa_fisica` FOREIGN KEY (`id_pessoa_fisica`) REFERENCES `tbl_pessoa_fisica` (`id_pessoa_fisica`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_resposta_promocao_tbl_promocao` FOREIGN KEY (`id_promocao`) REFERENCES `tbl_promocao` (`id_promocao`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_resposta_promocao`
--

LOCK TABLES `tbl_resposta_promocao` WRITE;
/*!40000 ALTER TABLE `tbl_resposta_promocao` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_resposta_promocao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_status_login`
--

DROP TABLE IF EXISTS `tbl_status_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_status_login` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(11) NOT NULL,
  `id_pessoa_juridica` int(11) NOT NULL,
  PRIMARY KEY (`id_status`),
  UNIQUE KEY `id_estabelecimento_UNIQUE` (`id_status`),
  KEY `fk_tbl_login_estabelecimento_tbl_pessoa_juridica_idx` (`id_pessoa_juridica`),
  CONSTRAINT `fk_tbl_login_estabelecimento_tbl_pessoa_juridica` FOREIGN KEY (`id_pessoa_juridica`) REFERENCES `tbl_pessoa_juridica` (`id_pessoa_juridica`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_status_login`
--

LOCK TABLES `tbl_status_login` WRITE;
/*!40000 ALTER TABLE `tbl_status_login` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_status_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_status_login_pessoa_fisica`
--

DROP TABLE IF EXISTS `tbl_status_login_pessoa_fisica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_status_login_pessoa_fisica` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(11) NOT NULL,
  `id_pessoa_fisica` int(11) NOT NULL,
  PRIMARY KEY (`id_status`),
  UNIQUE KEY `id_estabelecimento_UNIQUE` (`id_status`),
  KEY `fk_tbl_login_estabelecimento_tbl_pessoa_juridica0_idx` (`id_pessoa_fisica`),
  CONSTRAINT `fk_tbl_login_estabelecimento_tbl_pessoa_juridica0` FOREIGN KEY (`id_pessoa_fisica`) REFERENCES `tbl_pessoa_fisica` (`id_pessoa_fisica`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_status_login_pessoa_fisica`
--

LOCK TABLES `tbl_status_login_pessoa_fisica` WRITE;
/*!40000 ALTER TABLE `tbl_status_login_pessoa_fisica` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_status_login_pessoa_fisica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_telefone_escola`
--

DROP TABLE IF EXISTS `tbl_telefone_escola`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_telefone_escola` (
  `id_telefone_escola` int(11) NOT NULL AUTO_INCREMENT,
  `telefone` varchar(16) NOT NULL,
  `id_solicitacao_escola` int(11) NOT NULL,
  PRIMARY KEY (`id_telefone_escola`),
  KEY `fk_tbl_telefone_escola_tbl_solicitacao_evento_idx` (`id_solicitacao_escola`),
  CONSTRAINT `fk_tbl_telefone_escola_tbl_solicitacao_evento` FOREIGN KEY (`id_solicitacao_escola`) REFERENCES `tbl_escola` (`id_solicitacao_escola`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_telefone_escola`
--

LOCK TABLES `tbl_telefone_escola` WRITE;
/*!40000 ALTER TABLE `tbl_telefone_escola` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_telefone_escola` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tipo_mensagem`
--

DROP TABLE IF EXISTS `tbl_tipo_mensagem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_tipo_mensagem` (
  `id_tipo_mensagem` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_mensagem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tipo_mensagem`
--

LOCK TABLES `tbl_tipo_mensagem` WRITE;
/*!40000 ALTER TABLE `tbl_tipo_mensagem` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_tipo_mensagem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tipo_promocao`
--

DROP TABLE IF EXISTS `tbl_tipo_promocao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_tipo_promocao` (
  `id_tipo_promocao` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id_tipo_promocao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tipo_promocao`
--

LOCK TABLES `tbl_tipo_promocao` WRITE;
/*!40000 ALTER TABLE `tbl_tipo_promocao` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_tipo_promocao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_videos`
--

DROP TABLE IF EXISTS `tbl_videos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_videos` (
  `id_videos` int(11) NOT NULL,
  `nome_video` varchar(45) NOT NULL,
  `video` text NOT NULL,
  `vizualizacoes` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_videos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_videos`
--

LOCK TABLES `tbl_videos` WRITE;
/*!40000 ALTER TABLE `tbl_videos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_videos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'db_oncreate'
--

--
-- Dumping routines for database 'db_oncreate'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-04-01  2:42:14
