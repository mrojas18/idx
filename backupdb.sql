-- MySQL dump 10.13  Distrib 8.0.36, for Linux (x86_64)
--
-- Host: localhost    Database: test
-- ------------------------------------------------------
-- Server version	8.0.36

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `bancos`
--

LOCK TABLES `bancos` WRITE;
/*!40000 ALTER TABLE `bancos` DISABLE KEYS */;
INSERT INTO `bancos` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (1,'Galicia','2024-06-09 19:27:58','2024-06-09 19:27:58'),(2,'HSBC','2024-06-09 19:28:07','2024-06-09 19:28:07');
/*!40000 ALTER TABLE `bancos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('5c785c036466adea360111aa28563bfd556b5fba','i:1;',1718066999),('5c785c036466adea360111aa28563bfd556b5fba:timer','i:1718066999;',1718066999),('rojas.manuelr@gmail.com|127.0.0.1','i:2;',1718066443),('rojas.manuelr@gmail.com|127.0.0.1:timer','i:1718066443;',1718066443),('rojas.menuelr@gmail.com|127.0.0.1','i:1;',1718066434),('rojas.menuelr@gmail.com|127.0.0.1:timer','i:1718066434;',1718066434);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `cuentas`
--

LOCK TABLES `cuentas` WRITE;
/*!40000 ALTER TABLE `cuentas` DISABLE KEYS */;
INSERT INTO `cuentas` (`id`, `banco_id`, `moneda`, `monto`, `created_at`, `updated_at`) VALUES (1,1,'USD',1000,'2024-06-09 19:28:36','2024-06-09 19:28:36'),(2,1,'ARS',1000,'2024-06-09 19:28:43','2024-06-09 19:28:43'),(3,2,'USD',1000,'2024-06-09 19:28:50','2024-06-09 19:28:50'),(4,2,'ARS',1000,'2024-06-09 19:28:57','2024-06-09 19:28:57');
/*!40000 ALTER TABLE `cuentas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `instrumentos`
--

LOCK TABLES `instrumentos` WRITE;
/*!40000 ALTER TABLE `instrumentos` DISABLE KEYS */;
INSERT INTO `instrumentos` (`id`, `nombre`, `ticker_usd`, `ticker_ars`, `ratio`, `created_at`, `updated_at`, `precio_usd`, `precio_ars`) VALUES (1,'Wells Fargo','WFCD','WFC',5,'2024-06-09 21:43:41','2024-06-11 21:23:20',11.8,14989.5),(2,'BERKSHIRE HATHAWAY INC','brkbd','brkb',22,'2024-06-09 21:45:18','2024-06-11 21:23:24',19.05,24320),(3,'Amazon','AMZND','AMZN',144,'2024-06-09 22:08:16','2024-06-11 21:23:27',1.34,1710),(4,'Google','GOGLD','GOOGL',58,'2024-06-09 22:08:55','2024-06-11 21:23:31',3.14,3980),(5,'Microsoft','MSFTD','MSFT',30,'2024-06-09 22:09:34','2024-06-11 21:23:34',14.8,18900),(6,'Apple','AAPLD','AAPL',20,'2024-06-09 22:09:59','2024-06-11 21:23:37',10.5,13550),(7,'Facebook / Meta','METAD','META',24,'2024-06-09 22:10:37','2024-06-11 21:23:40',21.95,27668),(8,'SPY SPDR S&P 500','SPYD','SPY',20,'2024-06-09 22:11:17','2024-06-11 21:23:44',27.55,35150),(9,'Bank of America','BA.CD','BA.C',4,'2024-06-09 22:11:57','2024-06-11 21:23:47',9.85,12724.5),(10,'XLE','XLED','XLE',4,'2024-06-09 22:12:37','2024-06-11 21:23:50',46.25,59205.5),(11,'Coca Cola','KOD','KO',5,'2024-06-09 22:12:58','2024-06-11 21:23:54',13,16578.5),(12,'Walmart','WMTD','WMT',18,'2024-06-09 22:13:27','2024-06-11 21:23:57',4,4860.5),(13,'Vista Energy','VISTD','VIST',3,'2024-06-09 22:13:51','2024-06-11 21:24:00',14.8,18951),(14,'Nu Holding','NUD','NU',2,'2024-06-09 22:14:43','2024-06-11 21:24:04',6.17,7750);
/*!40000 ALTER TABLE `instrumentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `migrations`
--



--
-- Dumping data for table `operacion`
--

LOCK TABLES `operacion` WRITE;
/*!40000 ALTER TABLE `operacion` DISABLE KEYS */;
INSERT INTO `operacion` (`id`, `instrumento_id`, `fecha`, `tipo`, `cantidad`, `cotizacion`, `usd`, `ars`, `cuenta_id`, `created_at`, `updated_at`) VALUES (1,1,'2021-10-19','C',39,1,429.67,83618,1,'2024-06-09 21:55:56','2024-06-10 00:54:02'),(2,13,'2024-03-03','C',23,1,297.57,302032.71,1,'2024-06-10 00:49:03','2024-06-10 00:49:03'),(3,13,'2024-03-20','C',12,1,182.51,189264.27,1,'2024-06-10 00:49:59','2024-06-10 00:49:59'),(4,13,'2024-03-22','C',24,1,368.34,381600,1,'2024-06-10 00:50:50','2024-06-10 00:50:50'),(5,13,'2024-05-31','C',13,1,220.13,267457.01,1,'2024-06-10 00:51:31','2024-06-10 00:51:31'),(6,1,'2022-03-15','C',12,1,124.56,24042,1,'2024-06-10 00:54:54','2024-06-10 00:54:54'),(7,3,'2022-01-19','C',240,1,310.54,59877.86,1,'2024-06-09 23:19:01','2024-06-09 23:19:01'),(8,6,'2022-01-19','C',32,1,293.61,59366.42,1,'2024-06-09 23:21:47','2024-06-09 23:21:47'),(9,9,'2021-10-19','C',36,1,439.62,87219.85,1,'2024-06-10 00:10:59','2024-06-10 00:10:59'),(10,11,'2023-12-01','C',17,1,195.5,173995,1,'2024-06-11 21:26:55','2024-06-11 21:26:55'),(11,11,'2024-02-29','C',15,1,190.18,197023,1,'2024-06-11 21:27:43','2024-06-11 21:27:43'),(12,11,'2024-03-22','C',29,1,373.7,387150,1,'2024-06-11 21:28:28','2024-06-11 21:28:28'),(13,2,'2024-04-05','C',24,1,471.1,488058.4,1,'2024-06-11 21:32:24','2024-06-11 21:32:24');
/*!40000 ALTER TABLE `operacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('DM8TATphho01yVgc1dNINVTLpwWu9okU8GV4V3Ys',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoicGxkUGlpM2tpTGRVUFEwZGRnZk5heHJZNENuV0NKUGZlVDB4aW5JOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly8xMjcuMC4wLjE6OTAwMi8/bW9ub3NwYWNlVWlkPTgwNzA2MSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1718151423),('fY9FBIgEWxWMj8A46Lqs2dwE3v5WfzcFJgksPm4w',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiTnhsRUpXdkFrRFM0cE40eGNtV1FsUEZlbzRtRFA1cFFPREhucEphMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6OTAwMi8/bW9ub3NwYWNlVWlkPTg3NTUzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1718152603),('k5vVq2Xf0zYAGOxsiWQjQX8yONXGO0qUMr3QKHMe',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiQ0pFNEx1cGRrcHVCVHYwY1JsTEVjN1Q1V1Q0R0xEWGFuOGtUSmZIaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6OTAwMi8/bW9ub3NwYWNlVWlkPTAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1718152603),('r55vfmJQCn3f8xvD9NGumWbQL2afEbyzAMWmKmYR',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiU2pzYTlVR3hDZFp2c256VkowTUhnMjRVV080SjBtc0hNcmdTc29ZeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1718151730),('ueFEgU6J8D3zqmcdeXuZrlT2sav0KUbhmg4tMqM4',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoidE9DQUxIMGozaDN2WXAzUDJCZlkwYTRBS1ljY1RMVHpnWXM4dENOZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6OTAwMi8/bW9ub3NwYWNlVWlkPTAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1718151422),('xawYIxVQLznbJvwlV7WtonuSU981L8Vs3OcexELn',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ0ZyV05lQXFCU3FISnJuNDVzdGhJNzJONllJNHVXcWJzNU1EeTc5ayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1718152604),('Z04JHiN0aRM5QzyWgA6xVW0r9T8wHpVZsJGYJLKk',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','YTo2OntzOjY6Il90b2tlbiI7czo0MDoiRVRMcnRPTmZ1TGZQWURhYUYzUXRVbGtkZGhGY3VZUG5NY1NRYU52aiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjU1OiJsb2dpbl9iYWNrcGFja181OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoyMjoicGFzc3dvcmRfaGFzaF9iYWNrcGFjayI7czo2MDoiJDJ5JDEyJHlWdlM5NC9reFlmMDNYTFFMQkJyeWVsZXRleEhyTXd0LnFuNzZ6QkNMc1hjQWsyNklLTkxhIjtzOjY6ImNyZWF0ZSI7YToxOntzOjEwOiJzYXZlQWN0aW9uIjtzOjE2OiJzYXZlX2FuZF9wcmV2aWV3Ijt9fQ==',1718152376);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (1,'Manuel','rojas.manuelr@gmail.com',NULL,'$2y$12$yVvS94/kxYf03XLQLBBryeletexHrMwt.qn76zBCLsXcAk26IKNLa','ZRCBuWgwWioRc8DwBLBiHnKa9nDoM13kYTWCHZBgynVHAIWbw1OmE8zHF6hn','2024-06-09 19:14:58','2024-06-09 19:14:58');
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

-- Dump completed on 2024-06-12  0:38:55
