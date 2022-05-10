-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: db_admkampus
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `mst_dosen`
--

DROP TABLE IF EXISTS `mst_dosen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mst_dosen` (
  `id_dosen` int(11) NOT NULL AUTO_INCREMENT,
  `nama_dosen` varchar(100) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(25) NOT NULL,
  PRIMARY KEY (`id_dosen`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mst_dosen`
--

LOCK TABLES `mst_dosen` WRITE;
/*!40000 ALTER TABLE `mst_dosen` DISABLE KEYS */;
INSERT INTO `mst_dosen` VALUES (1,'Galang Putra','Ratna 2','2022-04-04','Laki Laki');
/*!40000 ALTER TABLE `mst_dosen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mst_jurusan`
--

DROP TABLE IF EXISTS `mst_jurusan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mst_jurusan` (
  `id_jurusan` int(11) NOT NULL AUTO_INCREMENT,
  `nm_jurusan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_jurusan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mst_jurusan`
--

LOCK TABLES `mst_jurusan` WRITE;
/*!40000 ALTER TABLE `mst_jurusan` DISABLE KEYS */;
INSERT INTO `mst_jurusan` VALUES (1,'Application Software Engineering 1');
/*!40000 ALTER TABLE `mst_jurusan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mst_login`
--

DROP TABLE IF EXISTS `mst_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mst_login` (
  `id_login` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `isactive` enum('1','0') NOT NULL,
  PRIMARY KEY (`id_login`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mst_login`
--

LOCK TABLES `mst_login` WRITE;
/*!40000 ALTER TABLE `mst_login` DISABLE KEYS */;
INSERT INTO `mst_login` VALUES (1,'Galang','galang215','202cb962ac59075b964b07152d234b70','1'),(3,'Galang P','galang20','d8578edf8458ce06fbc5bb76a58c5ca4','1');
/*!40000 ALTER TABLE `mst_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mst_mahasiswa`
--

DROP TABLE IF EXISTS `mst_mahasiswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mst_mahasiswa` (
  `id_mhs` int(11) NOT NULL AUTO_INCREMENT,
  `nim_mhs` int(11) NOT NULL,
  `nama_mhs` varchar(100) NOT NULL,
  `ttl_mhs` date NOT NULL,
  `alamat_mhs` varchar(150) NOT NULL,
  `jk_mhs` varchar(25) NOT NULL,
  `jurusan_mhs` varchar(50) NOT NULL,
  PRIMARY KEY (`id_mhs`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mst_mahasiswa`
--

LOCK TABLES `mst_mahasiswa` WRITE;
/*!40000 ALTER TABLE `mst_mahasiswa` DISABLE KEYS */;
INSERT INTO `mst_mahasiswa` VALUES (1,2147483647,'Galang Putra','2022-04-01','Ratna 2','Laki Laki','Application Software Engineering');
/*!40000 ALTER TABLE `mst_mahasiswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mst_matkul`
--

DROP TABLE IF EXISTS `mst_matkul`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mst_matkul` (
  `id_matkul` int(11) NOT NULL AUTO_INCREMENT,
  `nm_matkul` varchar(100) NOT NULL,
  `sks_matkul` int(11) NOT NULL,
  PRIMARY KEY (`id_matkul`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mst_matkul`
--

LOCK TABLES `mst_matkul` WRITE;
/*!40000 ALTER TABLE `mst_matkul` DISABLE KEYS */;
INSERT INTO `mst_matkul` VALUES (1,'Web Programming',20);
/*!40000 ALTER TABLE `mst_matkul` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mst_menu`
--

DROP TABLE IF EXISTS `mst_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mst_menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `isactive` enum('1','0') NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mst_menu`
--

LOCK TABLES `mst_menu` WRITE;
/*!40000 ALTER TABLE `mst_menu` DISABLE KEYS */;
INSERT INTO `mst_menu` VALUES (1,'User Login','mod_userlogin','1'),(2,'Pegawai','mod_pegawai','1'),(3,'Dosen','mod_dosen','1'),(4,'Mahasiswa','mod_mahasiswa','1'),(5,'Jurusan','mod_jurusan','1'),(6,'Mata Kuliah','mod_matkul','1');
/*!40000 ALTER TABLE `mst_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mst_pegawai`
--

DROP TABLE IF EXISTS `mst_pegawai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mst_pegawai` (
  `id_pegawai` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pegawai` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `jenis_kelamin` varchar(25) NOT NULL,
  PRIMARY KEY (`id_pegawai`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mst_pegawai`
--

LOCK TABLES `mst_pegawai` WRITE;
/*!40000 ALTER TABLE `mst_pegawai` DISABLE KEYS */;
INSERT INTO `mst_pegawai` VALUES (3,'Galang Putra','2022-04-13','Ratna 2','Laki Laki'),(5,'Galang Putra1','2022-05-04','Ratna 2','Perempuan');
/*!40000 ALTER TABLE `mst_pegawai` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-10 14:00:11
