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
  `bill_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bartender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` bigint(20) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `number` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bill_bill_code_unique` (`bill_code`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bill`
--

LOCK TABLES `bill` WRITE;
/*!40000 ALTER TABLE `bill` DISABLE KEYS */;
INSERT INTO `bill` VALUES (22,'HD-00001',6,8,'2020-11-28 13:28:47',NULL,1,'2020-11-28 06:28:47','2020-11-28 06:28:47',1),(23,'HD-00002',6,9,'2020-11-28 13:29:00',NULL,1,'2020-11-28 06:29:00','2020-11-28 06:29:00',2),(24,'HD-00003',6,10,'2020-11-28 13:29:12',NULL,1,'2020-11-28 06:29:12','2020-11-28 06:29:12',3),(25,'HD-00004',6,11,'2020-11-28 13:29:28',NULL,1,'2020-11-28 06:29:28','2020-11-28 06:29:28',4),(26,'HD-00005',6,8,'15:42:19 28-11-2020',NULL,1,'2020-11-28 08:42:19','2020-11-28 08:42:19',5);
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
  `price` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `billdetail`
--

LOCK TABLES `billdetail` WRITE;
/*!40000 ALTER TABLE `billdetail` DISABLE KEYS */;
INSERT INTO `billdetail` VALUES (69,22,16,3,50000,'2020-11-28 06:28:47','2020-11-28 06:28:47'),(70,22,17,3,40000,'2020-11-28 06:28:47','2020-11-28 06:28:47'),(71,22,18,1,6000,'2020-11-28 06:28:47','2020-11-28 06:28:47'),(72,23,18,2,6000,'2020-11-28 06:29:00','2020-11-28 06:29:00'),(73,23,17,2,40000,'2020-11-28 06:29:00','2020-11-28 06:29:00'),(74,24,16,2,50000,'2020-11-28 06:29:12','2020-11-28 06:29:12'),(75,24,17,2,40000,'2020-11-28 06:29:12','2020-11-28 06:29:12'),(76,25,18,5,6000,'2020-11-28 06:29:28','2020-11-28 06:29:28'),(77,25,16,1,50000,'2020-11-28 06:29:28','2020-11-28 06:29:28'),(78,26,18,1,6000,'2020-11-28 08:42:19','2020-11-28 08:42:19');
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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `goods_delivery_note`
--

LOCK TABLES `goods_delivery_note` WRITE;
/*!40000 ALTER TABLE `goods_delivery_note` DISABLE KEYS */;
INSERT INTO `goods_delivery_note` VALUES (28,'PNK-0001',7,7,'2020-11-28 06:38:27','Trần Việt Tiến','0971418994','2020-11-28 06:38:27','2020-11-28 06:38:27'),(29,'PNK-0002',7,8,'2020-11-28 06:39:14','Nguyễn Văn Anh','0359118994','2020-11-28 06:39:14','2020-11-28 06:39:14');
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
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `goodsdeliverynotedetail`
--

LOCK TABLES `goodsdeliverynotedetail` WRITE;
/*!40000 ALTER TABLE `goodsdeliverynotedetail` DISABLE KEYS */;
INSERT INTO `goodsdeliverynotedetail` VALUES (63,9,28,10,'2020-11-28 06:38:27','2020-11-28 06:38:27'),(64,10,28,1,'2020-11-28 06:38:27','2020-11-28 06:38:27'),(65,9,29,10,'2020-11-28 06:39:14','2020-11-28 06:39:14'),(66,12,29,20,'2020-11-28 06:39:14','2020-11-28 06:39:14');
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
  `is_active` bigint(20) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `matterials_matterials_code_unique` (`matterials_code`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matterials`
--

LOCK TABLES `matterials` WRITE;
/*!40000 ALTER TABLE `matterials` DISABLE KEYS */;
INSERT INTO `matterials` VALUES (9,'CF1','Cafe hòa tan','hộp',1,'2020-11-28 06:35:17','2020-11-28 06:35:17'),(10,'ST','Sữa tươi','hộp',1,'2020-11-28 06:35:32','2020-11-28 06:35:32'),(11,'DG','Đường kính','kg',1,'2020-11-28 06:35:51','2020-11-28 06:35:51'),(12,'CF2','Cafe nguyên chất','kg',1,'2020-11-28 06:36:24','2020-11-28 06:36:24'),(14,'CHAN-CHAU-DEN','Trà sữa kiwi','Cốc',0,'2020-11-28 08:14:43','2020-11-28 08:14:56');
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
  `is_active` bigint(20) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menu_drinks_code_unique` (`drinks_code`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (16,'CFS','Cà phê sữa',50000,'cốc',0,1,'2020-11-28 06:20:01','2020-11-28 08:04:10'),(17,'CFD','Cafe đen',40000,'cốc',0,1,'2020-11-28 06:20:20','2020-11-28 06:20:20'),(18,'CFT','Cafe trứng',6000,'cốc',0,1,'2020-11-28 06:21:43','2020-11-28 06:21:43'),(19,'TRA-SUA','Trà sữa kiwi',4,'Cốc',0,0,'2020-11-28 08:12:05','2020-11-28 08:12:08');
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
  `is_active` bigint(20) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `supplier_supplier_code_unique` (`supplier_code`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplier`
--

LOCK TABLES `supplier` WRITE;
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
INSERT INTO `supplier` VALUES (6,'VNM','Vinamilk',1,'2020-11-28 06:32:14','2020-11-28 06:32:14'),(7,'TN','Trung Nguyên',1,'2020-11-28 06:33:16','2020-11-28 06:33:16'),(8,'HL','Highland',1,'2020-11-28 06:33:32','2020-11-28 06:33:32'),(9,'TEST','Test',0,'2020-11-28 07:59:19','2020-11-28 08:17:47'),(10,'DINGTEA-A','Trà sữa kiwi',0,'2020-11-28 08:18:22','2020-11-28 08:18:25');
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table`
--

LOCK TABLES `table` WRITE;
/*!40000 ALTER TABLE `table` DISABLE KEYS */;
INSERT INTO `table` VALUES (8,'01',1,0,'2020-11-28 06:26:37','2020-11-28 06:26:37'),(9,'02',2,0,'2020-11-28 06:26:44','2020-11-28 06:26:44'),(10,'03',3,0,'2020-11-28 06:26:50','2020-11-28 06:26:50'),(11,'04',4,0,'2020-11-28 06:27:01','2020-11-28 06:27:01');
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
INSERT INTO `users` VALUES (1,'Tiến Trần','trantien2456@gmail.com','QL',1234567890,0,0,NULL,'$2y$10$EANLZGHJuyFLvUvURDTBpeDBTkfH8lTIShiavpptG1GWZ039NA/ZW',0,NULL,NULL,'2020-11-09 10:36:37'),(6,'Thu ngân','thungan@gmail.com','TN',12345678,0,0,NULL,'$2y$10$E99mk3fPUvukkn.5rQ6cS.N2UxvG2tJShZ.twhIimBqiuDhmOz/.W',1,NULL,'2020-11-22 15:29:27','2020-11-22 15:29:27'),(7,'Phục vụ','phucvu@gmail.com','PV',123,0,0,NULL,'$2y$10$ZhmSxwOnkuQCJNg38WGDJ.LYYYIUjZrp7RZVu8VziW/Zi.DWADMaS',2,NULL,'2020-11-22 15:38:45','2020-11-22 15:38:45');
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

-- Dump completed on 2020-11-28 15:48:34
