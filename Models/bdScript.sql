CREATE DATABASE  IF NOT EXISTS `crudstore` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `crudstore`;
-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: crudstore
-- ------------------------------------------------------
-- Server version	8.0.35

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
-- Table structure for table `people`
--

DROP TABLE IF EXISTS `people`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `people` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `dni` bigint NOT NULL,
  `cuit` bigint NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(200) NOT NULL,
  `img` varchar(45) DEFAULT NULL,
  `role_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `people_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `people`
--

LOCK TABLES `people` WRITE;
/*!40000 ALTER TABLE `people` DISABLE KEYS */;
INSERT INTO `people` VALUES (1,'Lucas','DeBoca',45612340,20456123409,'Lucas@gmail.com','$2y$10$Hq5JhH.yPqx10SKFPTrhiuLe83mnw4WbjFaN/c/sKkmNMhS5AlFz.',NULL,1),(2,'Jhon','Garayc',1321465,2013214659,'Jhon@gmail.com','$2y$10$lLgm9S8YVpsgWN8XonlIF.RCklL9chEW2s7zcJ/FQzbJnY370mPl6',NULL,2),(3,'Julian','DeFerro',4596312,2045963125,'Julian@gmail.com','$2y$10$oLxaY/NqmmfvRP7Ul0vRv.zs.78ws/zkqE0d5HrPlTwkn6Uvdngde',NULL,3),(4,'Leon','Garay Leon',45612352,20456123529,'Leon@gmail.com','$2y$10$C58jjb6xxjtalfjnt3rMOOtn8d4WS.zrgz.5cyelr/IAsSgFHCz/2',NULL,2),(5,'Oscar','DeRiver',45963123,20459631239,'Oscar@gmail.com','$2y$10$t7APewymacQ/5DET7cs63ej6n5HPhmPOsSW3112.eqDPk8SDdVk0W',NULL,2),(6,'Rodrigo','DeBoca',56963452,20569634529,'Rodrigo@gmail.com','$2y$10$Wfpcqy6RJ53UXGQNbFbEeO2szxqoaW.WxdbPL3LZ9Ik34JvB2IXhS',NULL,2);
/*!40000 ALTER TABLE `people` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `brand` varchar(50) DEFAULT NULL,
  `cost` float DEFAULT NULL,
  `price` float DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `img` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Reloj','Once',3000,15000,15,'https://http2.mlstatic.com/D_NQ_NP_942099-MLA49011470720_022022-O.webp'),(15,'Mouse','Logitech',130000,230000,10,'https://http2.mlstatic.com/D_NQ_NP_2X_734377-MLA32146296800_092019-F.webp'),(16,'Mouse','Logitech',30000,300000,3,'https://mexx-img-2019.s3.amazonaws.com/Mouse-Gamer-Logitech-G502X-Plus-Gaming-Blanco_45737_1.jpeg'),(17,'Teclado League of Legends','Logitech',102000,199999,5,'https://logitechar.vtexassets.com/arquivos/ids/158338-800-800?v=637741502044200000&width=800&height=800&aspect=true'),(18,'PC Gamer','Lion Componets',250000,450000,5,'https://app.contabilium.com/files/explorer/16277/Productos-Servicios/concepto-9303097.jpg'),(19,'Teclado','COTO',5000,15000,1,'https://hard-digital.com.ar/files/Teclado%20Logitech%20K120/1.jpg'),(20,'Pantalla 27\"','Samsung',30000,100000,9,'https://images.samsung.com/is/image/samsung/p6pim/ar/lf27t350fhlczb/gallery/ar-t35f-388813-lf27t350fhlczb-456992044?$650_519_PNG$'),(21,'Cable HDMI','Generico',1000,4500,99,'https://compucordoba.com.ar/img/Public/1078-producto-cable-hdmi-4-4168.jpg'),(22,'Auriculares','ONCE',1500,5999,2,'https://www.sevenelectronics.com.ar/images/0000698180000080594972.png'),(23,'Auriculares','Logitech',30000,250000,50,'https://www.infinitonline.com.ar/images/000000000000108723590g733-blue-gallery-1.png'),(24,'Gabinete Gaimer','Generico',15000,25000,6,'https://i.blogs.es/f10d2f/cz05/450_1000.webp'),(25,'Gabinete Gamer','Couner',180000,500000,1,'https://http2.mlstatic.com/D_NQ_NP_2X_833677-MLU72984228881_112023-F.webp'),(26,'MEMORIA RAM DDR4 16GB','CORSAIR ',25000,105000,3,'https://statics.qloud.com.ar/crosshair-gaming-02-2023/283_25-07-2023-02-07-24-3c216802-956d-4a62-8785-e5604126113d.jpg');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` int NOT NULL,
  `tipo` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Admin'),(2,'Usuario'),(3,'SuperAdmin');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-01-16 17:19:57
