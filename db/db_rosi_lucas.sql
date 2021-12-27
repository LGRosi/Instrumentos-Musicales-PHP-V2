-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: db_rosi_lucas
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.22-MariaDB

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
-- Table structure for table `listados`
--

DROP TABLE IF EXISTS `listados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `listados` (
  `listado_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuario_fk` int(10) unsigned NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `descripcion` text NOT NULL,
  `imgPc` varchar(255) NOT NULL,
  `imgTablet` varchar(255) NOT NULL,
  `imgCelular` varchar(255) NOT NULL,
  `imgMiniatura` varchar(255) NOT NULL,
  `alt` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `precioTachado` varchar(50) NOT NULL,
  `precio` varchar(50) NOT NULL,
  `descuento` varchar(45) NOT NULL,
  PRIMARY KEY (`listado_id`),
  KEY `fk_listados_usuarios1_idx` (`usuario_fk`),
  CONSTRAINT `fk_listados_usuarios1` FOREIGN KEY (`usuario_fk`) REFERENCES `usuarios` (`usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `listados`
--

LOCK TABLES `listados` WRITE;
/*!40000 ALTER TABLE `listados` DISABLE KEYS */;
INSERT INTO `listados` VALUES (1,1,'Bajo Epiphone','El Toby Standard IV presenta la clásica forma ergonómica del cuerpo diseñada por Tobias que los bajistas encuentran tan fácil de tocar, proporcionando un sonido enfocado y terminado que tiene todo el golpe de un vertical con todos los detalles claros de un eléctrico. Ya sea que esté en su garaje o en un escenario, el Toby Standard IV está perfectamente equilibrado con un sonido rico y una gran capacidad de reproducción.','bajo_pc.jpg','bajo_tablet.jpg','bajo_celular.jpg','bajo_miniatura.png','instrumento musical de cuerdas Bajo Epiphone','Bajo Epiphone','$ 29.997','$ 23.997','20% OFF'),(2,1,'Batería Yamaha','La nueva RYDEEN (pack con 5 cascos) es exactamente el kit con el que a cualquier baterista principiante le gustaría tocar. Esta batería incluye el set de hardware HW680W de Yamaha y sujeciones de toms. Los cascos están fabricados en láminas de álamo de 6 capas.','bateria_pc.jpg','bateria_tablet.jpg','bateria_celular.jpg','bateria_miniatura.png','instrumento musical de percusión Batería Yamaha','Batería Yamaha','$ 63.210','$ 41.086','35% OFF'),(3,1,'Guitarra Acústica','Esta guitarra cuenta con una construccion artesanal, materiales y principalmente un sonido inconfundible. Fabricada con maderas seleccionadas GRACIA ofrece excelentes guitarras con una relacion Calidad/Precio inigualable, sin duda la mejor opcion para iniciarse en el mundo de la música.','guitarra_pc.jpg','guitarra_tablet.jpg','guitarra_celular.jpg','guitarra_miniatura.png','Instrumento musical de cuerdas Guitarra Acústica','Guitarra Acústica','$ 25.999','$ 22.099','15% OFF'),(4,1,'Saxo Parker','Llave de Fa # agudo, Zapatillas de cuero con resonador plástico, Apoyapulgar metálico ergonométrico, Llaves de notas graves con balancín, Campana labrada, Llave de Fa agudo frontal anatómica, Terminación: Laqueado dorado con campana y cuerpo labrados, Incluye estuche','saxo_pc.jpg','saxo_tablet.jpg','saxo_celular.jpg','saxo_miniatura.png','Instrumento musical de viento Saxo Parker','Saxo Parker','$ 58.910','$ 50.065','15% OFF'),(5,1,'Guitarra Eléctrica','Incluye: Guitarra eléctrica, Amplificador de 10 Watts, Correa, Funda, Cable, Palanca, Púas. Características de la guitarra: Cuerpo de tilo, Diapasón de rosewood, Mástil de maple, 21 trastes de alpaca, Clavijas diecast cromadas, Cejuela de hueso sintético, Puente cromado con palanca de trémolo, 3 micrófonos de bobina simple, Cuerdas .009','guitarraElectrica_pc.jpg','guitarraElectrica_tablet.jpg','guitarraElectrica_celular.jpg','guitarraElectrica_miniatura.png','Instrumento musical eléctrico Guitarra eléctrica','Guitarra eléctrica','$ 30.072','$ 25.060','16% OFF'),(6,1,'Sintetizador Novation','Mininova es un compacto, super-cool estudio y sintetizador en vivo con el motor de sonido igual que su hermano mayor; UltraNova. Viene con 256 sonidos increíbles a bordo que se puede ajustar con cinco mandos, o totalmente deformar con ocho botones de animar. Cuenta con hasta 18 voces con hasta cinco efectos de sintetizador de cada sonido. Mininova también tiene un efecto VocalTune a bordo, así como un vocoder clásico por lo que puede volver a crear iconos sonidos vocales de hip hop, urbano y música electrónica.','sintetizador_pc.jpg','sintetizador_tablet.jpg','sintetizador_celular.jpg','sintetizador_miniatura.png','Instrumento musical eléctrico Sintetizador Novation','Sintetizador Novation','$ 83.277','$ 42.471','49% OFF');
/*!40000 ALTER TABLE `listados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `rol_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`rol_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Administrador'),(2,'Usuario');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `usuario_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rol_fk` tinyint(3) unsigned NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`usuario_id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `fk_usuarios_roles_idx` (`rol_fk`),
  CONSTRAINT `fk_usuarios_roles` FOREIGN KEY (`rol_fk`) REFERENCES `roles` (`rol_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,1,'admin@admin.com','$2y$10$QST.JQLSIgCwxgaHB2/r.ezeVkLeN6MD2AdQeiPVNuDe3fxq/DD/O'),(2,2,'uno@uno.com','$2y$10$QST.JQLSIgCwxgaHB2/r.ezeVkLeN6MD2AdQeiPVNuDe3fxq/DD/O'),(3,2,'dos@dos.com','$2y$10$QST.JQLSIgCwxgaHB2/r.ezeVkLeN6MD2AdQeiPVNuDe3fxq/DD/O'),(4,2,'tres@tres.com','$2y$10$QST.JQLSIgCwxgaHB2/r.ezeVkLeN6MD2AdQeiPVNuDe3fxq/DD/O'),(5,2,'cuatro@cuatro.com','$2y$10$QST.JQLSIgCwxgaHB2/r.ezeVkLeN6MD2AdQeiPVNuDe3fxq/DD/O');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-10 18:42:10
