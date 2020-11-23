-- MySQL dump 10.13  Distrib 5.7.32, for Linux (x86_64)
--
-- Host: localhost    Database: quanlyquancafe
-- ------------------------------------------------------
-- Server version	5.7.32-0ubuntu0.18.04.1

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
-- Table structure for table `bill`
--

DROP TABLE IF EXISTS `bill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bill` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `bill_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `table_id` bigint(20) unsigned NOT NULL,
  `bill_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bartender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` bigint(20) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `number` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bill_bill_code_unique` (`bill_code`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bill`
--

LOCK TABLES `bill` WRITE;
/*!40000 ALTER TABLE `bill` DISABLE KEYS */;
INSERT INTO `bill` VALUES (14,'HD-00001',1,4,'2020-11-20 12:33:54','Dev quèn',2,'2020-11-20 12:27:51','2020-11-20 12:33:54',1),(15,'HD-00002',1,6,'2020-11-20 15:01:24','Thu ngan',2,'2020-11-20 12:27:58','2020-11-20 15:01:24',2),(18,'HD-00004',4,4,'2020-11-20 15:07:44','Phục vụ',2,'2020-11-20 14:36:00','2020-11-20 15:07:44',4),(19,'HD-00005',4,4,'2020-11-20 15:08:30',NULL,1,'2020-11-20 15:08:30','2020-11-20 15:08:30',5),(20,'HD-00006',4,4,'2020-11-22 14:18:08',NULL,1,'2020-11-22 14:18:08','2020-11-22 14:18:08',6),(21,'HD-00007',4,4,'2020-11-22 15:20:48',NULL,1,'2020-11-22 15:20:48','2020-11-22 15:20:48',7),(22,'HD-00008',4,4,'2020-11-22 15:28:49',NULL,1,'2020-11-22 15:28:49','2020-11-22 15:28:49',8),(23,'HD-00009',4,4,'2020-11-22 15:30:56',NULL,1,'2020-11-22 15:30:56','2020-11-22 15:30:56',9),(24,'HD-00010',4,4,'2020-11-23 04:52:37',NULL,1,'2020-11-23 04:52:37','2020-11-23 04:52:37',10),(25,'HD-00011',4,4,'2020-11-23 04:52:56',NULL,1,'2020-11-23 04:52:56','2020-11-23 04:52:56',11),(26,'HD-00012',4,4,'2020-11-23 04:53:31',NULL,1,'2020-11-23 04:53:31','2020-11-23 04:53:31',12),(27,'HD-00013',4,4,'2020-11-23 04:53:37',NULL,1,'2020-11-23 04:53:37','2020-11-23 04:53:37',13),(28,'HD-00014',4,4,'2020-11-23 04:53:42',NULL,1,'2020-11-23 04:53:42','2020-11-23 04:53:42',14),(29,'HD-00015',4,4,'2020-11-23 04:53:46',NULL,1,'2020-11-23 04:53:46','2020-11-23 04:53:46',15),(30,'HD-00016',4,4,'2020-11-23 04:54:38',NULL,1,'2020-11-23 04:54:38','2020-11-23 04:54:38',16),(31,'HD-00017',4,4,'2020-11-23 04:54:42',NULL,1,'2020-11-23 04:54:42','2020-11-23 04:54:42',17),(32,'HD-00018',4,4,'2020-11-23 04:55:01',NULL,1,'2020-11-23 04:55:01','2020-11-23 04:55:01',18),(33,'HD-00019',4,6,'2020-11-23 04:55:35',NULL,1,'2020-11-23 04:55:35','2020-11-23 04:55:35',19),(34,'HD-00020',4,6,'2020-11-23 04:56:02',NULL,1,'2020-11-23 04:56:02','2020-11-23 04:56:02',20),(35,'HD-00021',4,4,'2020-11-23 04:56:22',NULL,1,'2020-11-23 04:56:22','2020-11-23 04:56:22',21),(36,'HD-00022',4,4,'2020-11-23 05:02:27',NULL,1,'2020-11-23 05:02:27','2020-11-23 05:02:27',22);
/*!40000 ALTER TABLE `bill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `billdetail`
--

DROP TABLE IF EXISTS `billdetail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `billdetail` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `bill_id` bigint(20) unsigned NOT NULL,
  `menu_id` bigint(20) unsigned DEFAULT NULL,
  `amount` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `billdetail`
--

LOCK TABLES `billdetail` WRITE;
/*!40000 ALTER TABLE `billdetail` DISABLE KEYS */;
INSERT INTO `billdetail` VALUES (7,11,14,1,'2020-11-18 16:13:10','2020-11-18 16:13:10',NULL),(53,15,14,4,'2020-11-20 12:27:58','2020-11-20 12:27:58',NULL),(54,15,13,1,'2020-11-20 12:27:58','2020-11-20 12:27:58',NULL),(57,14,13,2,'2020-11-20 14:34:22','2020-11-20 14:34:22',NULL),(58,18,14,2,'2020-11-20 14:36:00','2020-11-20 14:36:00',NULL),(59,18,13,2,'2020-11-20 14:36:00','2020-11-20 14:36:00',NULL),(60,18,12,2,'2020-11-20 14:36:00','2020-11-20 14:36:00',NULL),(61,19,14,1,'2020-11-20 15:08:30','2020-11-20 15:08:30',NULL),(62,19,13,1,'2020-11-20 15:08:30','2020-11-20 15:08:30',NULL),(63,20,14,1,'2020-11-22 14:18:08','2020-11-22 14:18:08',NULL),(64,20,13,1,'2020-11-22 14:18:08','2020-11-22 14:18:08',NULL),(65,21,14,1,'2020-11-22 15:20:48','2020-11-22 15:20:48',15000),(66,21,14,2,'2020-11-22 15:20:48','2020-11-22 15:20:48',15000),(67,21,14,3,'2020-11-22 15:20:48','2020-11-22 15:20:48',15000),(68,21,14,1,'2020-11-22 15:20:48','2020-11-22 15:20:48',10000),(69,21,14,1,'2020-11-22 15:20:48','2020-11-22 15:20:48',10000),(70,21,13,1,'2020-11-22 15:20:48','2020-11-22 15:20:48',15000),(71,21,13,1,'2020-11-22 15:20:48','2020-11-22 15:20:48',10000),(72,21,13,1,'2020-11-22 15:20:48','2020-11-22 15:20:48',10000),(73,21,12,1,'2020-11-22 15:20:48','2020-11-22 15:20:48',15000),(74,21,12,1,'2020-11-22 15:20:48','2020-11-22 15:20:48',10000),(75,21,12,1,'2020-11-22 15:20:48','2020-11-22 15:20:48',10000),(76,22,14,1,'2020-11-22 15:28:49','2020-11-22 15:28:49',15000),(77,22,14,1,'2020-11-22 15:28:49','2020-11-22 15:28:49',15000),(78,22,14,1,'2020-11-22 15:28:49','2020-11-22 15:28:49',10000),(79,22,13,1,'2020-11-22 15:28:49','2020-11-22 15:28:49',15000),(80,22,13,1,'2020-11-22 15:28:49','2020-11-22 15:28:49',10000),(81,23,14,1,'2020-11-22 15:30:56','2020-11-22 15:30:56',15000),(82,23,14,1,'2020-11-22 15:30:56','2020-11-22 15:30:56',15000),(83,23,14,1,'2020-11-22 15:30:56','2020-11-22 15:30:56',10000),(84,23,13,1,'2020-11-22 15:30:56','2020-11-22 15:30:56',15000),(85,23,13,1,'2020-11-22 15:30:56','2020-11-22 15:30:56',10000),(86,34,14,1,'2020-11-23 04:56:02','2020-11-23 04:56:02',15000),(87,34,13,1,'2020-11-23 04:56:02','2020-11-23 04:56:02',10000),(88,35,12,1,'2020-11-23 04:56:22','2020-11-23 04:56:22',10000),(89,35,13,2,'2020-11-23 04:56:22','2020-11-23 04:56:22',10000),(90,35,14,3,'2020-11-23 04:56:22','2020-11-23 04:56:22',15000),(91,35,15,4,'2020-11-23 04:56:22','2020-11-23 04:56:22',15000),(100,36,12,1,'2020-11-23 05:05:43','2020-11-23 05:05:43',10000),(101,36,13,1,'2020-11-23 05:05:43','2020-11-23 05:05:43',10000),(102,36,14,1,'2020-11-23 05:05:43','2020-11-23 05:05:43',15000);
/*!40000 ALTER TABLE `billdetail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `goods_delivery_note`
--

DROP TABLE IF EXISTS `goods_delivery_note`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `goods_delivery_note` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `goods_delivery_note_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `supplier_id` bigint(20) unsigned NOT NULL,
  `issue_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deliver` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deliver_phone_number` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `goods_delivery_note_goods_delivery_note_code_unique` (`goods_delivery_note_code`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `goods_delivery_note`
--

LOCK TABLES `goods_delivery_note` WRITE;
/*!40000 ALTER TABLE `goods_delivery_note` DISABLE KEYS */;
INSERT INTO `goods_delivery_note` VALUES (24,'phieu-2',1,4,'2020-11-09 09:56:07','Nguyễn Văn B','0387588688','2020-11-04 14:12:00','2020-11-09 09:56:07'),(26,'PHIEU-1',1,4,'2020-11-09 09:46:07','Nguyễn Văn BC','0387588688','2020-11-09 09:46:07','2020-11-09 09:46:07');
/*!40000 ALTER TABLE `goods_delivery_note` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `goodsdeliverynotedetail`
--

DROP TABLE IF EXISTS `goodsdeliverynotedetail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `goodsdeliverynotedetail` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `matterials_id` bigint(20) unsigned DEFAULT NULL,
  `required_import_goods_id` bigint(20) NOT NULL,
  `amount` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `goodsdeliverynotedetail`
--

LOCK TABLES `goodsdeliverynotedetail` WRITE;
/*!40000 ALTER TABLE `goodsdeliverynotedetail` DISABLE KEYS */;
INSERT INTO `goodsdeliverynotedetail` VALUES (56,3,26,1,'2020-11-09 09:46:07','2020-11-09 09:46:07'),(57,2,24,12,'2020-11-09 09:56:07','2020-11-09 09:56:07'),(58,3,24,12345,'2020-11-09 09:56:07','2020-11-09 09:56:07'),(59,4,24,12,'2020-11-09 09:56:07','2020-11-09 09:56:07'),(60,5,24,156,'2020-11-09 09:56:07','2020-11-09 09:56:07');
/*!40000 ALTER TABLE `goodsdeliverynotedetail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `matterials`
--

DROP TABLE IF EXISTS `matterials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `matterials` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `matterials_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `matterials_matterials_code_unique` (`matterials_code`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matterials`
--

LOCK TABLES `matterials` WRITE;
/*!40000 ALTER TABLE `matterials` DISABLE KEYS */;
INSERT INTO `matterials` VALUES (2,'chan-chau-den','Chân châu đen','kg','2020-10-28 03:26:22','2020-10-28 03:26:22'),(3,'chan-chau-trang','Chân châu trắng','Kg','2020-10-29 14:53:15','2020-10-29 14:53:15'),(4,'xoi-thit','Xoi thit','Bat','2020-10-30 13:22:17','2020-10-30 13:22:17'),(5,'sua','Sữa','Hộp','2020-11-03 14:05:25','2020-11-03 14:05:25'),(7,'COC','Coc','Cốc','2020-11-18 03:57:24','2020-11-18 03:57:24');
/*!40000 ALTER TABLE `matterials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `drinks_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint(20) NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` bigint(20) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menu_drinks_code_unique` (`drinks_code`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (12,'ca-phe-den-da','Cà phê đen đá',10000,'Cốc',0,'2020-10-27 05:45:02','2020-11-18 03:39:52'),(13,'tra-chanh-truyen-thong-EkD','Trà chanh truyền thống',10000,'Cốc',0,'2020-10-27 07:29:43','2020-11-18 01:49:22'),(14,'tra-sua-19','Trà sữa kiwi',15000,'Cốc',0,'2020-10-27 07:31:26','2020-10-27 07:31:26'),(15,'SUA-CHUA-DAU','Sữa chua dâu',15000,'cốc',0,'2020-11-11 09:06:27','2020-11-18 01:49:32');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2020_10_26_033830_create_matterials_table',1),(5,'2020_10_26_040247_create_menu_table',1),(6,'2020_10_26_040303_create_supplier_table',1),(7,'2020_10_26_040322_create_table_table',1),(8,'2020_10_26_041807_create_bill_table',1),(9,'2020_10_26_041924_create_billdetail_table',1),(10,'2020_10_26_042106_create_goodsdeliverynotedetail_table',1),(11,'2020_10_26_084533_create_goods_delivery_note_table',1),(12,'2020_10_26_110054_create_role_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `supplier` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `supplier_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `supplier_supplier_code_unique` (`supplier_code`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplier`
--

LOCK TABLES `supplier` WRITE;
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
INSERT INTO `supplier` VALUES (4,'dingtea-a','Trà sữa kiwi','2020-10-27 22:16:52','2020-10-27 22:16:52'),(5,'dingtea','Chân châu đen','2020-10-28 04:58:49','2020-10-28 04:58:49');
/*!40000 ALTER TABLE `supplier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table`
--

DROP TABLE IF EXISTS `table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `table_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` bigint(20) NOT NULL,
  `status` bigint(20) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table`
--

LOCK TABLES `table` WRITE;
/*!40000 ALTER TABLE `table` DISABLE KEYS */;
INSERT INTO `table` VALUES (4,'ban-1',1,0,'2020-10-27 09:48:41','2020-10-27 09:48:41'),(5,'ban-2',2,1,'2020-10-27 20:17:44','2020-10-27 20:17:44'),(6,'BAN-3',3,0,'2020-11-09 09:40:15','2020-11-09 09:40:15');
/*!40000 ALTER TABLE `table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_card` bigint(20) NOT NULL,
  `gender` bigint(20) NOT NULL DEFAULT '0',
  `status` bigint(20) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_user_code_unique` (`user_code`),
  UNIQUE KEY `users_id_card_unique` (`id_card`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Dev quèn','devquen@gmail.com','6JACmwuHyR',1234567890,0,0,NULL,'$2y$10$EANLZGHJuyFLvUvURDTBpeDBTkfH8lTIShiavpptG1GWZ039NA/ZW',0,NULL,NULL,'2020-11-09 10:36:37'),(2,'Trần Việt Tiến','kenchivas1998@gmail.com','devquen-at-gmailcom',123455677677,1,0,NULL,'$2y$10$cuAXUBDoI7BzYfSIFre5jukm/kpeOYkp09WQzZKhZLdnv.9Fl.NDS',1,NULL,'2020-10-27 10:29:30','2020-11-09 09:56:55'),(3,'User test','test@gmail.com','tester',12345678,0,1,NULL,'$2y$10$T5SZ1zc07jr4QxqbCxD3xen4HfJ1BYOBpr2G/1ZoWNGfDVFqDPWSC',0,NULL,'2020-10-27 20:21:44','2020-10-27 20:22:33'),(4,'Thu ngan','nguyenduclai@gmail.com','NSNDLAI98',125792913,0,0,NULL,'$2y$10$PNCOt./HMBqOAp1xxchc3u4rH4N4AAGozbNcNnqGlEX0GNYyOq5Cy',1,NULL,'2020-11-20 12:47:58','2020-11-20 13:18:37'),(7,'Phục vụ','phucvu@gmail.com','PHUC-VU',123456789,0,0,NULL,'$2y$10$2GywdjNKRFt/KKTmSj7yceYDRLYClhlexEdvR3soZYvdjBjM6ATZu',2,NULL,'2020-11-20 13:05:28','2020-11-20 13:05:28');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-11-23 15:22:07
