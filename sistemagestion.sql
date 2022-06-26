CREATE DATABASE  IF NOT EXISTS `sistemagestion` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `sistemagestion`;
-- MySQL dump 10.13  Distrib 5.6.11, for Win32 (x86)
--
-- Host: localhost    Database: sistemagestion
-- ------------------------------------------------------
-- Server version	5.6.13-log

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
-- Table structure for table `archivos`
--

DROP TABLE IF EXISTS `archivos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `archivos` (
  `id_archivo` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_arc` varchar(30) NOT NULL,
  `Tipo_arc` varchar(30) NOT NULL,
  `Peso_arc` varchar(30) NOT NULL,
  `Dueño_arc` int(11) NOT NULL,
  `Fecha_sub` datetime NOT NULL,
  `Archivo` mediumblob,
  PRIMARY KEY (`id_archivo`),
  KEY `Dueño_arc` (`Dueño_arc`),
  CONSTRAINT `archivos_ibfk_1` FOREIGN KEY (`Dueño_arc`) REFERENCES `empleado` (`id_empleado`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `archivos`
--

LOCK TABLES `archivos` WRITE;
/*!40000 ALTER TABLE `archivos` DISABLE KEYS */;
/*!40000 ALTER TABLE `archivos` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger audi_modarc before update
on archivos
for each row
insert into audi_archivos (Nombre_anterior,Tipo_anterior,Peso_anterior,Nombre_nuevo,
Tipo_nuevo,Peso_nuevo,Dueño,Fecha_subida,Fecha_mod,Usuario_res,Accion)
values
(old.Nombre_arc,old.Tipo_arc,old.Peso_arc,new.Nombre_arc,new.Tipo_arc,new.Peso_arc,
new.Dueño_arc,new.Fecha_sub,now(),current_user(),'Actualizacion') */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger audi_elimarc after delete
on archivos
for each row
insert into audi_archivos(Nombre_anterior,Tipo_anterior,Peso_anterior,Dueño,
Fecha_subida,Fecha_mod,Usuario_res,Accion)
values
(old.Nombre_arc,old.Tipo_arc,old.Peso_arc,old.Dueño_arc,old.Fecha_sub,now(),
current_user(),'Registro Eliminacion') */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `audi_archivos`
--

DROP TABLE IF EXISTS `audi_archivos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `audi_archivos` (
  `id_audi` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Anterior` varchar(30) DEFAULT NULL,
  `Tipo_anterior` varchar(30) DEFAULT NULL,
  `Peso_anterior` varchar(30) DEFAULT NULL,
  `Nombre_nuevo` varchar(30) DEFAULT NULL,
  `Tipo_nuevo` varchar(30) DEFAULT NULL,
  `Peso_nuevo` varchar(30) DEFAULT NULL,
  `Dueño` int(11) DEFAULT NULL,
  `Fecha_subida` datetime DEFAULT NULL,
  `Fecha_mod` datetime DEFAULT NULL,
  `Usuario_res` varchar(45) DEFAULT NULL,
  `Accion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_audi`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audi_archivos`
--

LOCK TABLES `audi_archivos` WRITE;
/*!40000 ALTER TABLE `audi_archivos` DISABLE KEYS */;
INSERT INTO `audi_archivos` VALUES (1,'EpsObando2022','pdf','15mb','ArsObando2022','pdf','12mb',1,'2022-04-23 11:08:02','2022-04-23 11:11:17','root@localhost','Actualizacion'),(2,'ArsObando2022','pdf','12mb',NULL,NULL,NULL,1,'2022-04-23 11:08:02','2022-04-23 12:48:03','root@localhost','Registro Eliminacion');
/*!40000 ALTER TABLE `audi_archivos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `audi_empleado`
--

DROP TABLE IF EXISTS `audi_empleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `audi_empleado` (
  `id_audi` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_anterior` varchar(30) DEFAULT NULL,
  `Apellido_anterior` varchar(30) DEFAULT NULL,
  `Edad_anterior` int(11) DEFAULT NULL,
  `Salario_anterior` int(11) DEFAULT NULL,
  `Direccion_anterior` varchar(30) DEFAULT NULL,
  `Correo_anterior` varchar(30) DEFAULT NULL,
  `Telefono_anterior` varchar(15) DEFAULT NULL,
  `Horario_anterior` varchar(20) DEFAULT NULL,
  `Estado_anterior` enum('activo','inactivo') DEFAULT NULL,
  `Cargo_anterior` varchar(40) DEFAULT NULL,
  `Area_anterior` varchar(20) DEFAULT NULL,
  `Funciones_anteriores` text,
  `Profesion_anterior` text,
  `Diasdes_anteriores` varchar(30) NOT NULL,
  `Contraseña_anterior` varchar(20) DEFAULT NULL,
  `NivelEd_anterior` varchar(50) DEFAULT NULL,
  `Admin_antes` enum('si','no') DEFAULT NULL,
  `Nombre_nuevo` varchar(30) DEFAULT NULL,
  `Apellido_nuevo` varchar(30) DEFAULT NULL,
  `Edad_nueva` int(11) DEFAULT NULL,
  `Salario_nuevo` int(11) DEFAULT NULL,
  `Direccion_nueva` varchar(30) DEFAULT NULL,
  `Correo_nuevo` varchar(30) DEFAULT NULL,
  `Telefono_nuevo` varchar(15) DEFAULT NULL,
  `Horario_nuevo` varchar(20) DEFAULT NULL,
  `Estado_nuevo` enum('activo','inactivo') DEFAULT NULL,
  `Cargo_nuevo` varchar(40) DEFAULT NULL,
  `Area_nueva` varchar(20) DEFAULT NULL,
  `Funciones_nuevas` text,
  `Profesion_nueva` text,
  `Diasdes_nuevos` varchar(30) DEFAULT NULL,
  `Contraseña_nueva` varchar(20) DEFAULT NULL,
  `NivelEd_nuevo` varchar(50) DEFAULT NULL,
  `Admin_ahora` enum('si','no') DEFAULT NULL,
  `Doc_emp` varchar(15) DEFAULT NULL,
  `Usuario_res` varchar(45) DEFAULT NULL,
  `Fecha_modificacion` datetime DEFAULT NULL,
  `Accion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_audi`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audi_empleado`
--

LOCK TABLES `audi_empleado` WRITE;
/*!40000 ALTER TABLE `audi_empleado` DISABLE KEYS */;
INSERT INTO `audi_empleado` VALUES (1,'Andres Felipe','Obando Gonzalez',19,3200000,'Cra104a #75d15','pipeobandog@hotmail.com','3184544534','7am-5pm','inactivo','Ingeniero de software','','','','','aobandog2022','Profesional Universitario','si','Andres Felipe','Obando Gonzalez',19,4500000,'Cra104a#75d15','pipeobandog@hotmail.com','3184544534','7am-6pm','activo','Jefe de grupo','IT','Desarrollar un software de gestion para una empresa','Ingeniero de software ','sabados/domingos','aobandog2022','egresado universitario','si','1001066376','root@localhost','2022-04-22 22:51:53','Actualizacion'),(2,'felipe','obando',20,340000,'dfer123','dadada@gmail.com','2345','todo el dia','activo','asd','df','asd','asddf','miercoles','asda','dfgh','no',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'19292949','root@localhost','2022-04-22 23:15:44','Registro Eliminado');
/*!40000 ALTER TABLE `audi_empleado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleado`
--

DROP TABLE IF EXISTS `empleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empleado` (
  `id_empleado` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_emp` varchar(30) NOT NULL,
  `Apellido_emp` varchar(30) NOT NULL,
  `Documento_emp` varchar(15) NOT NULL,
  `Edad_emp` int(11) NOT NULL,
  `Salario_emp` int(11) NOT NULL,
  `Direccion_emp` varchar(30) NOT NULL,
  `Correo_emp` varchar(30) NOT NULL,
  `Telefono_emp` varchar(15) NOT NULL,
  `Horario_emp` varchar(20) NOT NULL,
  `Estado_emp` enum('activo','inactivo') NOT NULL,
  `Cargo_emp` varchar(40) NOT NULL,
  `Area_emp` varchar(20) NOT NULL,
  `Funciones_emp` text NOT NULL,
  `Profesion_emp` text NOT NULL,
  `Diasdes_emp` varchar(30) NOT NULL,
  `Contraseña_usuario` varchar(20) NOT NULL,
  `NivelEducativo_emp` varchar(50) NOT NULL,
  `FechaAfiliacion_emp` date NOT NULL,
  `Admin` enum('si','no') NOT NULL,
  PRIMARY KEY (`id_empleado`),
  UNIQUE KEY `Documento_emp` (`Documento_emp`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleado`
--

LOCK TABLES `empleado` WRITE;
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
INSERT INTO `empleado` VALUES (1,'Andres Felipe','Obando Gonzalez','1001066376',19,4500000,'Cra104a#75d15','pipeobandog@hotmail.com','3184544534','7am-6pm','activo','Jefe de grupo','IT','Desarrollar un software de gestion para una empresa','Ingeniero de software ','sabados/domingos','aobandog2022','egresado universitario','2022-04-18','si'),(5,'felipe andres','obando','19212949',20,340000,'dfer123','dadada@gmail.com','2345','todo el dia','activo','asd','df','asd','asddf','miercoles','asda','dfgh','2022-04-22','no'),(6,'felipe','obando','1212949',20,340000,'dfer123','dadada@gmail.com','2345','todo el dia','activo','asd','df','asd','asddf','miercoles','asda','dfgh','2022-04-22','no');
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger audi_modemp before update
on empleado
for each row
insert into audi_empleado(Nombre_anterior,Apellido_Anterior,Edad_anterior,Salario_anterior,
Direccion_anterior,Correo_anterior,Telefono_anterior,Horario_anterior,Estado_anterior,
Cargo_anterior,Area_anterior,Funciones_anteriores,Profesion_anterior,Diasdes_anteriores,Contraseña_anterior,
NivelEd_anterior,Admin_antes,Nombre_nuevo,Apellido_nuevo,Edad_nueva,Salario_nuevo,
Direccion_nueva,Correo_nuevo,Telefono_nuevo,Horario_nuevo,Estado_nuevo,Cargo_nuevo,Area_nueva,Funciones_nuevas,
Profesion_nueva,Diasdes_nuevos,Contraseña_nueva,NivelEd_nuevo,Admin_ahora,Doc_emp,
Usuario_res,Fecha_modificacion,Accion)
values
(old.Nombre_emp,old.Apellido_emp,old.Edad_emp,old.Salario_emp,old.Direccion_emp,old.Correo_emp,
old.Telefono_emp,old.Horario_emp,old.Estado_emp,old.Cargo_emp,old.Area_emp,old.Funciones_emp,
old.Profesion_emp,old.Diasdes_emp,old.Contraseña_usuario,old.NivelEducativo_emp,old.Admin,
new.Nombre_emp,new.Apellido_emp,new.Edad_emp,new.Salario_emp,new.Direccion_emp,new.Correo_emp,
new.Telefono_emp,new.Horario_emp,new.Estado_emp,new.Cargo_emp,new.Area_emp,new.Funciones_emp,
new.Profesion_emp,new.Diasdes_emp,new.Contraseña_usuario,new.NivelEducativo_emp,
new.Admin,new.Documento_emp,current_user(),now(),'Actualizacion') */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger audi_elimemp after delete
on empleado
for each row
insert into audi_empleado(Nombre_anterior,Apellido_Anterior,Edad_anterior,Salario_anterior,
Direccion_anterior,Correo_anterior,Telefono_anterior,Horario_anterior,Estado_anterior,
Cargo_anterior,Area_anterior,Funciones_anteriores,Profesion_anterior,Diasdes_anteriores,Contraseña_anterior,
NivelEd_anterior,Admin_antes,Doc_emp,Usuario_res,Fecha_modificacion,Accion)
values
(old.Nombre_emp,old.Apellido_emp,old.Edad_emp,old.Salario_emp,old.Direccion_emp,old.Correo_emp,
old.Telefono_emp,old.Horario_emp,old.Estado_emp,old.Cargo_emp,old.Area_emp,old.Funciones_emp,
old.Profesion_emp,old.Diasdes_emp,old.Contraseña_usuario,old.NivelEducativo_emp,old.Admin,
old.Documento_emp,current_user(),now(),'Registro Eliminado') */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-01 17:28:35
