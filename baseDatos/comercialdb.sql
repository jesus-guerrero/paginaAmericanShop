-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: comercial
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clientes` (
  `id` int NOT NULL,
  `primer_nombre` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `segundo_nombre` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `primer_apellido` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `segundo_apellido` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fecha_nac` varchar(8) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `direccion` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `barrio` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ciudad` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `correo` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `contra` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,'','a','','','','','','','','','12'),(123,'jesu','guerrero','c','d','12','barr','quint','ipi','1234','jdg@gmail.com','123'),(312,'','','','aaa@hotmail.com','','','','','','','asd'),(1000,'','','','a@hotmail.com','','','','','','','12'),(1085,'jesus',NULL,'guerrero',NULL,NULL,'pandiaco',NULL,'pasto','304','j@gmail.com','1233'),(3124,'','','',' asd','','','','','','','123'),(3708,'','','','','','','','','','','1233'),(377777,'','','','sfd@g.com','','','','','','','222'),(1111117,'','a','','','','','','','','','12'),(1111118,'','a','','','','','','','','','123'),(3127777,'','','','','','','','','','','123'),(12388899,'','','','sfd@g.com','','','','','','','8'),(31277778,'','','','','','','','','','','123'),(111111111,'','a','','','','','','','','','12');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `listaproductos`
--

DROP TABLE IF EXISTS `listaproductos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `listaproductos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `codigo` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `precio` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `imagen` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `listaproductos`
--

LOCK TABLES `listaproductos` WRITE;
/*!40000 ALTER TABLE `listaproductos` DISABLE KEYS */;
/*!40000 ALTER TABLE `listaproductos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productos` (
  `codigo` varchar(6) COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `presentacion` varchar(18) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_vencimiento` varchar(8) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `unidades` int NOT NULL,
  `imagen` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `precio` int DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES ('001','Resistencia','5.5 KΩ','1/2 watt, 5% tol.','21-04-23',1,'res1.webp',500),('002','Resistencia','1.0 KΩ','1/2 watt, 5% tol.','21-04-23',1,'res2.jpg',500),('003','Resistencia','2.2 KΩ','1/2 watt, 5% tol.','21-04-23',1,'res2.jpg',500),('004','Potenciometro','5.0 KΩ','1/2 watt, 5% tol.','21-04-23',1,'poten.jpg',2000),('005','Potenciometro','10.0 KΩ','1/2 watt, 5% tol.','21-04-23',1,'poten2.jpg',2000),('006','Potenciometro','100.0 KΩ','1/2 watt, 5% tol.','21-04-23',1,'poten3.jpg',3000),('007','Kit para soldar','   22 herramientas','Incluye estuche','No vence',1,'kit1.webp',120000),('008','Mini-Kit soldar','   14 herramientas','Incluye estuche','No vence',1,'kit2.webp',80000),('009','Kit Protoboard','   Cable y leds','Referencia M-B102','No vence',1,'kit3.webp',35000),('010','Led COB 5mm','varios colores','5mm','No vence',1,'led1.webp',1500),('011','Led DIP 3.8v','80 mWatts','80mW','No vence',1,'led2.png',7500),('012','Led SMD 3.0v','1 Watt','1W','No vence',1,'led3.jpg',7000);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-03-22 13:57:01
