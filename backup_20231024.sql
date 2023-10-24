-- MySQL dump 10.19  Distrib 10.2.38-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: mtcdb
-- ------------------------------------------------------
-- Server version	10.2.38-MariaDB

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
-- Table structure for table `bases`
--

DROP TABLE IF EXISTS `bases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `gender` enum('Male','Female','other') NOT NULL,
  `univ` varchar(50) NOT NULL,
  `body` text NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bases`
--

LOCK TABLES `bases` WRITE;
/*!40000 ALTER TABLE `bases` DISABLE KEYS */;
INSERT INTO `bases` VALUES (1,'KoutaOhi','Male','Chiba University of Commerce','IT','2023-07-24 05:17:08','2023-07-24 05:17:08',NULL),(2,'TakeshiTanaka','Male','Tokyo University','I study stastistics','2023-07-26 15:54:45','2023-07-26 15:54:45',NULL),(3,'dd','Male','dd','','2023-08-01 00:54:22','2023-08-01 00:54:22',NULL),(4,'dd','Male','dd','','2023-08-01 04:15:03','2023-08-01 04:15:03',NULL),(5,'dd','Male','dd','','2023-08-01 04:20:14','2023-08-01 04:20:14',NULL),(6,'dd','Male','dd','','2023-08-01 04:21:32','2023-08-01 04:21:32',NULL),(7,'dd','Male','dd','','2023-08-01 04:22:29','2023-08-01 04:22:29',NULL),(8,'dd','Male','dd','','2023-08-01 04:27:11','2023-08-01 04:27:11',NULL),(9,'cc','Male','cc','','2023-08-04 09:43:38','2023-08-04 09:43:38',NULL),(10,'HayataYamamoto','Male','HoseiUniversity','','2023-08-04 12:11:31','2023-08-04 12:11:31',NULL),(11,'TakeruKagawa','Male','Chiba University of Commerce','','2023-08-04 15:19:24','2023-08-04 15:19:24',NULL),(12,'HayataYamamoto','Male','Chiba University of Commerce','','2023-08-04 15:27:16','2023-08-04 15:27:16',NULL),(13,'HayataYamamoto','Male','ChibaUniversityofCommerce','','2023-08-04 15:31:09','2023-08-04 15:31:09',NULL),(14,'Yuya Morimoto','Male','Keio University','','2023-08-29 05:43:14','2023-08-29 05:43:14',NULL),(15,'TakedaAtsuya','Male','Maiji University','','2023-08-29 07:49:29','2023-08-29 07:49:29',NULL),(16,'TakedaAtsuya','Male','Maiji University','','2023-08-29 07:50:35','2023-08-29 07:50:35',NULL),(17,'TakedaAtsuya','Male','Meiji University','','2023-08-29 09:05:44','2023-08-29 09:05:44',NULL);
/*!40000 ALTER TABLE `bases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `communities`
--

DROP TABLE IF EXISTS `communities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `communities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `explanation` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `communities`
--

LOCK TABLES `communities` WRITE;
/*!40000 ALTER TABLE `communities` DISABLE KEYS */;
/*!40000 ALTER TABLE `communities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
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
-- Table structure for table `individual_user`
--

DROP TABLE IF EXISTS `individual_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `individual_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `individual_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `individuals_users_user_id_foreign` (`user_id`),
  KEY `individuals_users_individual_id_foreign` (`individual_id`),
  CONSTRAINT `individuals_users_individual_id_foreign` FOREIGN KEY (`individual_id`) REFERENCES `individuals` (`id`),
  CONSTRAINT `individuals_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `individual_user`
--

LOCK TABLES `individual_user` WRITE;
/*!40000 ALTER TABLE `individual_user` DISABLE KEYS */;
INSERT INTO `individual_user` VALUES (1,3,5,NULL,NULL),(13,3,2,NULL,NULL);
/*!40000 ALTER TABLE `individual_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `individuals`
--

DROP TABLE IF EXISTS `individuals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `individuals` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` enum('qualification','product','topic') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admin_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `individuals`
--

LOCK TABLES `individuals` WRITE;
/*!40000 ALTER TABLE `individuals` DISABLE KEYS */;
INSERT INTO `individuals` VALUES (2,'ITパスポート','仲間と協力してITパスポートを取得しよう！','qualification','2023-09-11 13:21:55','2023-09-11 13:21:55',1,'storage/itpass.png'),(3,'タスク管理アプリ','Laravelでタスク管理アプリを作りましょう','product','2023-09-12 12:09:03','2023-10-08 19:42:57',1,'https://res.cloudinary.com/dqujklh6e/image/upload/v1696794177/ijdcmhtrpmaqr4ejkvuu.jpg'),(4,'Git','Gitがなかなか理解できないので、詳しい方一緒に勉強しましょう～','topic','2023-09-12 12:10:30','2023-10-08 18:36:50',3,'https://res.cloudinary.com/dqujklh6e/image/upload/v1696790209/rfi5bivpss7gzlsjeuve.jpg'),(5,'基本情報技術者','みんなで過去問道場をやりましょう','qualification','2023-09-12 12:11:46','2023-10-08 21:23:45',1,'https://res.cloudinary.com/dqujklh6e/image/upload/v1696800224/lij9pexbd6jzisw6zb5p.jpg'),(6,'マッチングアプリ','マッチングアプリ作りましょう','product','2023-09-12 12:12:48','2023-10-08 19:30:04',1,'https://res.cloudinary.com/dqujklh6e/image/upload/v1696793403/h7sqryip6jfcja8awzkx.jpg'),(7,'Python','Pythonでディープラーニングを学びたい人集まれ','topic','2023-09-12 12:13:54','2023-10-08 19:28:21',1,'https://res.cloudinary.com/dqujklh6e/image/upload/v1696793300/z55nqnpczbfwse3yhye2.jpg'),(8,'応用情報技術者','難関資格取りたい人集まれ～～','qualification','2023-09-12 12:24:30','2023-10-08 21:25:04',1,'https://res.cloudinary.com/dqujklh6e/image/upload/v1696800303/xo3lhcg0fi97f9jcyuld.jpg'),(9,'(変更テスト)ゲーム','ちょっと難しいゲーム作りやりたい人、一緒に作りましょう～','product','2023-09-12 12:25:15','2023-10-13 16:25:24',3,'https://res.cloudinary.com/dqujklh6e/image/upload/v1696790085/ovi7vcb3knjjv4bd8mic.jpg'),(10,'ディープラーニング','ディープラーニングの理論から学びます','topic','2023-09-12 12:27:08','2023-10-08 18:38:44',3,'https://res.cloudinary.com/dqujklh6e/image/upload/v1696790324/nyitex29gfigdzpfa9wj.jpg'),(11,'GG検定','みんなで協力して「G検定」合格しましょう','qualification','2023-09-12 12:28:02','2023-10-08 16:56:40',3,'https://res.cloudinary.com/dqujklh6e/image/upload/v1696784200/hhcjecv5hwybgjfydlfs.jpg'),(12,'動画配信アプリ','次世代のYouTubeを作ろう！','product','2023-09-12 12:29:00','2023-10-08 19:39:33',1,'https://res.cloudinary.com/dqujklh6e/image/upload/v1696793973/x1uyejuizzeudobqsrni.jpg'),(13,'Office','ビジネスの基礎！Officeを使いこなそう！','topic','2023-09-12 12:29:41','2023-10-08 19:44:14',1,'https://res.cloudinary.com/dqujklh6e/image/upload/v1696794254/wops9yokzj15z82pyzyw.jpg'),(18,'Docker勉強会','Dockerの環境構築について学びましょう。','topic','2023-10-09 09:00:42','2023-10-09 09:00:42',3,'https://res.cloudinary.com/dqujklh6e/image/upload/v1696842041/jb8jhirh5esxexpsjhj2.jpg'),(19,'kkkkk','kkk','qualification','2023-10-12 08:16:21','2023-10-12 08:16:21',1,'https://res.cloudinary.com/dqujklh6e/image/upload/v1697098580/t2vejph9i8ep9c6rmvem.jpg');
/*!40000 ALTER TABLE `individuals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `membership_requests`
--

DROP TABLE IF EXISTS `membership_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `membership_requests` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `individuals_id` bigint(20) unsigned DEFAULT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `membership_requests`
--

LOCK TABLES `membership_requests` WRITE;
/*!40000 ALTER TABLE `membership_requests` DISABLE KEYS */;
INSERT INTO `membership_requests` VALUES (1,3,NULL,'pending','2023-09-30 18:50:57','2023-09-30 18:50:57'),(2,3,NULL,'pending','2023-10-01 17:02:52','2023-10-01 17:02:52'),(3,3,NULL,'pending','2023-10-02 07:22:31','2023-10-02 07:22:31'),(4,3,NULL,'pending','2023-10-02 07:22:40','2023-10-02 07:22:40'),(5,3,NULL,'pending','2023-10-02 07:40:29','2023-10-02 07:40:29'),(6,3,NULL,'pending','2023-10-02 07:44:46','2023-10-02 07:44:46'),(7,3,NULL,'pending','2023-10-02 07:57:22','2023-10-02 07:57:22'),(8,3,NULL,'pending','2023-10-02 08:26:57','2023-10-02 08:26:57'),(9,3,NULL,'pending','2023-10-02 08:27:43','2023-10-02 08:27:43'),(10,3,NULL,'pending','2023-10-02 13:38:42','2023-10-02 13:38:42'),(11,3,NULL,'pending','2023-10-02 13:43:33','2023-10-02 13:43:33'),(12,3,NULL,'pending','2023-10-02 13:45:50','2023-10-02 13:45:50'),(13,3,NULL,'pending','2023-10-02 13:48:16','2023-10-02 13:48:16'),(14,3,NULL,'pending','2023-10-02 13:49:07','2023-10-02 13:49:07'),(15,3,NULL,'pending','2023-10-02 13:53:07','2023-10-02 13:53:07'),(16,3,NULL,'pending','2023-10-02 13:59:49','2023-10-02 13:59:49'),(17,3,NULL,'pending','2023-10-02 14:15:31','2023-10-02 14:15:31'),(18,3,NULL,'pending','2023-10-02 14:42:12','2023-10-02 14:42:12'),(19,3,NULL,'pending','2023-10-02 15:58:17','2023-10-02 15:58:17'),(20,3,NULL,'pending','2023-10-02 16:01:55','2023-10-02 16:01:55'),(21,3,NULL,'pending','2023-10-02 16:04:47','2023-10-02 16:04:47'),(22,3,NULL,'pending','2023-10-02 16:18:00','2023-10-02 16:18:00'),(23,3,NULL,'pending','2023-10-02 16:24:50','2023-10-02 16:24:50'),(24,3,NULL,'pending','2023-10-02 16:26:35','2023-10-02 16:26:35'),(25,3,NULL,'pending','2023-10-02 16:29:26','2023-10-02 16:29:26'),(26,3,NULL,'pending','2023-10-02 17:02:47','2023-10-02 17:02:47'),(27,3,NULL,'pending','2023-10-02 17:04:51','2023-10-02 17:04:51'),(28,3,NULL,'pending','2023-10-02 17:05:51','2023-10-02 17:05:51'),(29,3,NULL,'pending','2023-10-02 17:08:20','2023-10-02 17:08:20'),(30,3,NULL,'pending','2023-10-02 17:13:48','2023-10-02 17:13:48'),(31,3,NULL,'pending','2023-10-02 17:14:49','2023-10-02 17:14:49'),(32,3,NULL,'pending','2023-10-02 17:15:26','2023-10-02 17:15:26'),(33,3,NULL,'pending','2023-10-02 17:20:00','2023-10-02 17:20:00'),(34,3,NULL,'pending','2023-10-02 17:25:24','2023-10-02 17:25:24'),(35,3,NULL,'pending','2023-10-02 17:26:55','2023-10-02 17:26:55'),(36,3,NULL,'pending','2023-10-02 17:27:17','2023-10-02 17:27:17'),(37,3,NULL,'pending','2023-10-02 17:28:17','2023-10-02 17:28:17'),(38,3,NULL,'pending','2023-10-02 17:28:52','2023-10-02 17:28:52'),(39,3,NULL,'pending','2023-10-02 17:32:21','2023-10-02 17:32:21'),(40,3,NULL,'pending','2023-10-02 17:33:01','2023-10-02 17:33:01'),(41,3,NULL,'pending','2023-10-02 17:35:10','2023-10-02 17:35:10'),(42,3,NULL,'pending','2023-10-02 17:35:33','2023-10-02 17:35:33'),(43,3,NULL,'pending','2023-10-02 17:42:24','2023-10-02 17:42:24'),(44,3,NULL,'pending','2023-10-02 17:42:34','2023-10-02 17:42:34'),(45,3,NULL,'pending','2023-10-02 17:42:50','2023-10-02 17:42:50'),(46,3,NULL,'pending','2023-10-02 17:43:33','2023-10-02 17:43:33'),(47,3,NULL,'pending','2023-10-02 18:09:26','2023-10-02 18:09:26'),(48,3,NULL,'pending','2023-10-02 18:10:59','2023-10-02 18:10:59'),(49,3,NULL,'pending','2023-10-02 18:11:39','2023-10-02 18:11:39'),(50,3,NULL,'pending','2023-10-02 18:19:46','2023-10-02 18:19:46'),(51,3,NULL,'pending','2023-10-02 18:22:02','2023-10-02 18:22:02'),(52,3,NULL,'pending','2023-10-02 18:22:38','2023-10-02 18:22:38'),(53,3,NULL,'pending','2023-10-02 18:25:00','2023-10-02 18:25:00'),(54,3,NULL,'pending','2023-10-02 18:27:17','2023-10-02 18:27:17'),(55,3,NULL,'pending','2023-10-02 18:27:27','2023-10-02 18:27:27'),(56,3,NULL,'pending','2023-10-02 18:28:39','2023-10-02 18:28:39'),(57,3,NULL,'pending','2023-10-02 18:29:24','2023-10-02 18:29:24'),(58,3,NULL,'pending','2023-10-02 18:31:20','2023-10-02 18:31:20'),(59,3,NULL,'pending','2023-10-02 18:35:18','2023-10-02 18:35:18'),(60,3,NULL,'pending','2023-10-02 18:35:25','2023-10-02 18:35:25'),(61,3,NULL,'pending','2023-10-02 20:11:49','2023-10-02 20:11:49'),(62,3,NULL,'pending','2023-10-02 20:15:37','2023-10-02 20:15:37'),(63,3,NULL,'pending','2023-10-02 20:15:44','2023-10-02 20:15:44'),(64,3,NULL,'pending','2023-10-02 20:18:48','2023-10-02 20:18:48'),(65,3,NULL,'pending','2023-10-02 20:18:56','2023-10-02 20:18:56'),(66,3,NULL,'pending','2023-10-02 20:29:33','2023-10-02 20:29:33'),(67,3,NULL,'pending','2023-10-02 20:29:38','2023-10-02 20:29:38'),(68,3,NULL,'pending','2023-10-02 20:31:30','2023-10-02 20:31:30'),(69,3,NULL,'pending','2023-10-02 20:40:50','2023-10-02 20:40:50'),(70,3,NULL,'pending','2023-10-03 07:14:36','2023-10-03 07:14:36'),(71,3,NULL,'pending','2023-10-03 07:14:37','2023-10-03 07:14:37'),(72,3,NULL,'pending','2023-10-03 07:17:18','2023-10-03 07:17:18'),(73,3,NULL,'pending','2023-10-03 07:17:18','2023-10-03 07:17:18'),(74,3,NULL,'pending','2023-10-03 07:18:11','2023-10-03 07:18:11'),(75,3,NULL,'pending','2023-10-03 07:18:11','2023-10-03 07:18:11'),(76,3,NULL,'pending','2023-10-03 07:18:42','2023-10-03 07:18:42'),(77,3,NULL,'pending','2023-10-03 07:18:43','2023-10-03 07:18:43'),(78,3,NULL,'pending','2023-10-03 07:36:23','2023-10-03 07:36:23'),(79,3,NULL,'pending','2023-10-03 07:36:23','2023-10-03 07:36:23'),(80,3,NULL,'pending','2023-10-03 08:03:20','2023-10-03 08:03:20'),(81,3,NULL,'pending','2023-10-03 09:59:42','2023-10-03 09:59:42');
/*!40000 ALTER TABLE `membership_requests` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (72,'2023_08_04_194054_create_univ_table',1),(78,'2014_10_12_000000_create_users_table',2),(91,'2014_10_12_100000_create_password_resets_table',3),(92,'2019_08_19_000000_create_failed_jobs_table',3),(93,'2019_12_14_000001_create_personal_access_tokens_table',3),(94,'2023_07_24_174255_create_posts_table',3),(95,'2023_08_04_205521_add_data_to_univ_table',3),(96,'2023_08_05_001552_rename_table_name',3),(97,'2023_08_05_003611_add_new_data_to_table',3),(98,'2023_08_08_120038_create_table_events',3),(99,'2023_08_31_184936_add_new_column_to_users',4),(100,'2023_09_03_195348_create_communities_table',5),(101,'2023_09_04_102512_reorder_columns_in_users',5),(102,'2023_09_08_020011_add_new_column_to_communities_table',5),(103,'2023_09_08_185624_remove_column_from_communities',5),(104,'2023_09_10_175515_create_table_individuals',6),(105,'2023_09_10_185038_add_new_column_to_individuals',7),(106,'2023_09_19_033228_add_event_date_to_events',7),(107,'2023_09_23_033549_add_new_column_to_users',8),(118,'2023_09_24_170504_create_individual_users',9),(119,'2023_09_28_023217_add_new_column_to_posts',9);
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
  PRIMARY KEY (`email`)
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
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `individual_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_individuals`
--

DROP TABLE IF EXISTS `table_individuals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_individuals` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` enum('qualification','product','topic') COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_individuals`
--

LOCK TABLES `table_individuals` WRITE;
/*!40000 ALTER TABLE `table_individuals` DISABLE KEYS */;
/*!40000 ALTER TABLE `table_individuals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `univ`
--

DROP TABLE IF EXISTS `univ`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `univ` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `univ_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locate` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `univ`
--

LOCK TABLES `univ` WRITE;
/*!40000 ALTER TABLE `univ` DISABLE KEYS */;
/*!40000 ALTER TABLE `univ` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `univs`
--

DROP TABLE IF EXISTS `univs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `univs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `univ_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locate` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `univs`
--

LOCK TABLES `univs` WRITE;
/*!40000 ALTER TABLE `univs` DISABLE KEYS */;
INSERT INTO `univs` VALUES (1,'Chiba University of Commerce','Chiba','2023-08-04 11:57:41','2023-08-04 11:57:41'),(2,'ChibaUniversityofCommerce','Chiba','2023-08-04 15:38:15','2023-08-04 15:38:15'),(3,'Meiji University','Tokyo','2023-08-29 09:05:44','2023-08-29 09:05:44'),(4,'ChibaUniversityofCommerce','Chiba','2023-10-19 08:14:01','2023-10-19 08:14:01'),(5,'ChibaUniversityofCommerce','Chiba','2023-10-19 08:15:02','2023-10-19 08:15:02'),(6,'ChibaUniversityofCommerce','Chiba','2023-10-19 08:15:02','2023-10-19 08:15:02'),(7,'ChibaUniversityofCommerce','Chiba','2023-10-19 08:16:17','2023-10-19 08:16:17'),(8,'ChibaUniversityofCommerce','Chiba','2023-10-19 08:16:17','2023-10-19 08:16:17'),(9,'ChibaUniversityofCommerce','Chiba','2023-10-19 08:41:38','2023-10-19 08:41:38'),(10,'ChibaUniversityofCommerce','Chiba','2023-10-19 09:13:35','2023-10-19 09:13:35'),(11,'ChibaUniversityofCommerce','Chiba','2023-10-19 09:20:05','2023-10-19 09:20:05'),(12,'ChibaUniversityofCommerce','Chiba','2023-10-19 09:20:05','2023-10-19 09:20:05');
/*!40000 ALTER TABLE `univs` ENABLE KEYS */;
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
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `univ` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `grade` enum('学部1年','学部2年','学部3年','学部4年','修士1年','修士2年','博士1年','博士2年','博士3年') COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'KoutaOhi','koutaohi.s0605@gmail.com',NULL,'$2y$10$YTG5z/Nv1GVD95eJJKodSegIoINShNk23.uiX5W2kgi/ddtN/VRL6',NULL,'2023-08-12 16:58:37','2023-08-12 16:58:37','','0000-00-00','学部1年','/storage/prf_img/prf_pic_1.png'),(2,'TakeshiYukimura','koutaft273456@gmail.com',NULL,'$2y$10$tiZnbBjDOcmd8AjC4p9KX.IvKPorNBtahcms/D2p8w6juT8B1SK/e',NULL,'2023-08-30 05:10:35','2023-08-30 05:10:35','','0000-00-00','学部1年','/storage/prf_img/prf_pic_2.png'),(3,'test','ttt@gmail.com',NULL,'$2y$10$0OKHk3lIvFdajO85QdncAOAugpoc2a2J7m7uYHbmNMp4UPm8zKU22',NULL,'2023-09-06 08:14:05','2023-09-06 08:14:05','test','2000-01-01','学部1年','/storage/prf_img/prf_pic_3.png'),(4,'test2','ttt2@gmail.com',NULL,'$2y$10$8veIQh4ykITbUEnUDSksceygivQsA46xzqSp5Y1Ukg4tz4tzxHm0C',NULL,'2023-09-06 12:20:59','2023-09-06 12:20:59','test2','2000-01-01','学部1年','/storage/prf_img/prf_pic_4.png'),(5,'Takeda Yuichi','takeda@gmail.com',NULL,'$2y$10$ppy7Kza7MEUWbWC6kr32xeqcT.HODjDAiFQhLOB/jAueJOfpLOIAW',NULL,'2023-10-06 21:35:57','2023-10-08 09:37:07','Chiba University','1999-10-16','学部4年','https://res.cloudinary.com/dqujklh6e/image/upload/v1696628156/gvhr4c0rqjju3idyv7ml.jpg');
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

-- Dump completed on 2023-10-24 18:32:16
