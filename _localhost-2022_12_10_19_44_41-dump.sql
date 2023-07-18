-- MySQL dump 10.13  Distrib 8.0.31, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: DONER
-- ------------------------------------------------------
-- Server version	8.0.31

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
-- Table structure for table `content`
--

DROP TABLE IF EXISTS `content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `content` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `content`
--

LOCK TABLES `content` WRITE;
/*!40000 ALTER TABLE `content` DISABLE KEYS */;
INSERT INTO `content` VALUES (1,'navigation','{\"logo\":\"\\/progect doner\\/nev\\/logo.svg\",\"links\":[{\"text\":\"Home\",\"is_anchor\":false,\"href\":\"\"},{\"text\":\"About\",\"is_anchor\":true,\"href\":\"#about-us\"},{\"text\":\"Menu\",\"is_anchor\":true,\"href\":\"#catalog\"},{\"text\":\"Gallery\",\"is_anchor\":true,\"href\":\"#gallery\"},{\"text\":\"Reviews\",\"is_anchor\":true,\"href\":\"#reviews\"}]}'),(2,'banner','[{\"description\":\"ARE YOU HUNGRY?\",\"links\":\"Our DONER is the best and useful\",\"button\":{\"text\":\"Buy Now\",\"is_anchor\":true,\"href\":\"#catalog\"}},{\"description\":\"ONLY TODAY\",\"links\":\"Sale 20%\",\"button\":{\"text\":\"Login\",\"is_anchor\":true,\"href\":\"login\"}},{\"description\":\"EVERY DAY\",\"links\":\"Fast, Satisfying, Useful\",\"button\":{\"text\":\"Buy Now\",\"is_anchor\":true,\"href\":\"#catalog\"}}]'),(3,'video','{\"video\":{\"image\":\"progect doner\\/nev\\/123456.jpg\",\"url\":\"#\"},\"description\":{\"pre_title\":\"The best ingredients\",\"title\":\"High quality and delisious\",\"quote\":\"quick and tasty\",\"text\":\"check it yourself\",\"sign\":\"progect doner\\/nev\\/signature.png\"}}'),(4,'catalog','{\"title\":\"What kind do you want?\",\"description\":\"Who are in extremely love with eco friendly system.\"}'),(5,'gallery','{\"title\":\"What kind of meat do you want?\",\"description\":\"Who are in extremely love with eco friendly system.\",\"gallery\":{\"left\":[\"progect%20doner\\/nev\\/266_s.jpg\",\"progect%20doner\\/nev\\/276_s.jpg\"],\"right\":{\"top\":[\"progect%20doner\\/nev\\/269_s.jpg\"],\"bottom\":[\"progect%20doner\\/nev\\/270_s.jpg\",\"progect%20doner\\/nev\\/271_s.jpg\"]}}}'),(6,'reviews','{\"title\":\"What kind of Doner we serve for you?\",\"description\":\"Who are in extremely love with eco friendly system.\",\"reviews\":[{\"logo\":\"progect%20doner\\/nev\\/r1.png\",\"name\":\"Company Name\",\"review\":\"3\",\"text\":\"Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.\"},{\"logo\":\"progect%20doner\\/nev\\/r2.png\",\"name\":\"Another Company\",\"review\":\"5\",\"text\":\"Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer.\"},{\"numberFirst\":\"329\",\"clients\":\"Happy clients\",\"numberSecond\":\"983\",\"projects\":\"Total Projects\",\"numberAll\":\"261\",\"all\":\"All Rolls\",\"numberTotal\":\"1369\",\"total\":\"Total Submitted\"}]}'),(7,'footer','{\"about_us\":{\"title\":\"Contact\",\"description\":\"Glasgow 85 W Nile St, Glasgow G1 2St glasgow@donerhaus.uk +12302041350\"},\"copyright\":\"Copyright Haus Holdings Ltd 2021. All rights reserved.\",\"newsletter\":{\"title\":\"Newsletter\",\"description\":\"Stay apdate with our latest\"},\"socials\":{\"title\":\"Follow Us\",\"description\":\"Let us be social\",\"list\":[{\"link\":\"https:\\/\\/facebook.com\",\"icon\":\"fa-brands fa-facebook-f\"},{\"link\":\"https:\\/\\/twitter.com\",\"icon\":\"fa-brands fa-twitter\"},{\"link\":\"https:\\/\\/youtube.com\",\"icon\":\"fa-brands fa-youtube\"}]}}');
/*!40000 ALTER TABLE `content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_products`
--

DROP TABLE IF EXISTS `order_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_products` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `order_id` bigint DEFAULT NULL,
  `product_id` bigint DEFAULT NULL,
  `quantity` int unsigned NOT NULL,
  `single_price` float unsigned NOT NULL,
  `additions` json DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `order_products_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `order_products_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_products`
--

LOCK TABLES `order_products` WRITE;
/*!40000 ALTER TABLE `order_products` DISABLE KEYS */;
INSERT INTO `order_products` VALUES (1,1,1,2,3,'[{\"name\": \"Potatos\", \"price\": 0.75, \"total\": 0.75, \"quantity\": 1, \"parent_id\": 1, \"product_id\": 13}, {\"name\": \"Cheesе\", \"price\": 1, \"total\": 1, \"quantity\": 1, \"parent_id\": 1, \"product_id\": 10}]'),(2,2,2,2,3.5,'[{\"name\": \"Potatos\", \"price\": 0.75, \"total\": 0.75, \"quantity\": 1, \"parent_id\": 2, \"product_id\": 13}, {\"name\": \"Cheesе\", \"price\": 12, \"total\": 12, \"quantity\": 1, \"parent_id\": 2, \"product_id\": 10}]');
/*!40000 ALTER TABLE `order_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `user_id` bigint DEFAULT NULL,
  `total` float unsigned NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,1,7.75,'2022-12-04 00:06:38'),(2,19,19.75,'2022-12-10 19:43:08');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `quantity` int unsigned DEFAULT '0',
  `price` float NOT NULL,
  `is_option` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Chicken S','Fillet, Beijing cabbage, fat, tomatoes, pickled cucumbers, sprouted oil,  sauce',298,3,0),(2,'Chicken M','Fillet, Beijing cabbage, fat, tomatoes, pickled cucumbers, sprouted oil,  sauce',348,3.5,0),(3,'Chicken L','Fillet, Beijing cabbage, fat, tomatoes, pickled cucumbers, sprouted oil,  sauce',400,4,0),(4,'Beef S','Fillet, Beijing cabbage, fat, tomatoes, pickled cucumbers, sprouted oil,  sauce',300,3.5,0),(5,'Beef M','Fillet, Beijing cabbage, fat, tomatoes, pickled cucumbers, sprouted oil,  sauce',350,4,0),(6,'Beef L','Fillet, Beijing cabbage, fat, tomatoes, pickled cucumbers, sprouted oil,  sauce',400,4.5,0),(7,'Lamb S','Fillet, Beijing cabbage, fat, tomatoes, pickled cucumbers, sprouted oil,  sauce',300,4,0),(8,'Lamb M','Fillet, Beijing cabbage, fat, tomatoes, pickled cucumbers, sprouted oil,  sauce',350,4.5,0),(9,'Lamb L','Fillet,LBeijing cabbage, fat, tomatoes, pickled cucumbers, sprouted oil,  sauce',400,5,0),(10,'Cheesе','for the best taste',98,12,1),(11,'Pineapple','for the best taste',100,1.5,1),(12,'Corn','for the best taste',100,0.5,1),(13,'Potatos','for the best taste',98,0.75,1),(18,'Ayran','tgerayareyry',10,4,1),(21,'Ayran7777','test_test_777',10,35,NULL),(23,'Test111','test_test_777',10,35,NULL),(24,'Test222','test_test_777',10,35,NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `surname` varchar(110) NOT NULL,
  `email` varchar(110) NOT NULL,
  `password` text NOT NULL,
  `is_admin` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `surname` (`surname`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Vitaliy','Blazhko','test@test.com','$2y$10$tjsAua1hHjMHsRJU2BVGz.dfQHF3oZ2ymKbkQpRXk0UXCiZLHjJAm',1),(19,'Vitaliy','Blazhkovich','test1@test.com','$2y$10$jiyI6SoT5M/gGn4mucftr.d1rWd7IP9M7xcIQKf0GRYWQ/HO7yVOO',0),(21,'Vitaliy','Blazhkor','test@test11.com','$2y$10$E4eDq3JKUeKUC5VDsFm2nuWHWNzZzz17LovBnXapl4kAgc2eCxn0i',0);
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

-- Dump completed on 2022-12-10 19:44:41
