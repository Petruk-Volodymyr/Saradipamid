-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: saradipamid
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
-- Table structure for table `noski`
--

DROP TABLE IF EXISTS `noski`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `noski` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nazwa` text COLLATE utf8_polish_ci NOT NULL,
  `typ` int(11) NOT NULL,
  `cena` int(11) NOT NULL,
  `foto` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tym` (`typ`),
  CONSTRAINT `noski_ibfk_1` FOREIGN KEY (`typ`) REFERENCES `typy` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `noski`
--

LOCK TABLES `noski` WRITE;
/*!40000 ALTER TABLE `noski` DISABLE KEYS */;
INSERT INTO `noski` VALUES (1,'Olisza',1,32,'img/BD/1.png'),(2,'Omka',2,42,'img/BD/2.png'),(3,'Lukoi',4,32,'img/BD/3.png'),(4,'Żmych',4,40,'img/BD/4.png'),(5,'Okam',3,60,'img/BD/5.png'),(6,'Okam',3,60,'img/BD/5.png'),(7,'Okam',3,60,'img/BD/5.png');
/*!40000 ALTER TABLE `noski` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typy`
--

DROP TABLE IF EXISTS `typy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `typ` enum('Wełniane','Bawełniane','Syntetyczne','Specjalistyczne') COLLATE utf8_polish_ci NOT NULL,
  `opis` varchar(20000) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `inf2` (`opis`) USING HASH
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typy`
--

LOCK TABLES `typy` WRITE;
/*!40000 ALTER TABLE `typy` DISABLE KEYS */;
INSERT INTO `typy` VALUES (1,'Wełniane','Wełniane skarpety to skarpety wykonane z wełny, która ma właściwości termoregulacyjne. Zapewniają one ciepło w zimie i chłód w ciepłe dni. Wełniane skarpety zwykle kosztują więcej niż bawełniane.'),(2,'Bawełniane','Bawełniane skarpety są najbardziej popularnym rodzajem skarpetek. Wykonane są z miękkiej i elastycznej bawełnianej przędzy, która zapewnia wygodę podczas noszenia. Bawełniane skarpety są dostępne w różnych rozmiarach, kolorach i wzorach.'),(3,'Syntetyczne','Syntetyczne skarpety to skarpety wykonane z materiałów syntetycznych, takich jak poliester lub nylon. Charakteryzują się wysoką wytrzymałością i elastycznością, często stosowane są w sporcie lub do pracy w szczególnych warunkach.'),(4,'Specjalistyczne','Specjalistyczne skarpety to skarpety przeznaczone do konkretnego rodzaju sportu lub aktywności, takie jak bieganie, piłka nożna, wspinaczka, medycyna.');
/*!40000 ALTER TABLE `typy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imie` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `login` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `haslo` varchar(500) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `wiek` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Andzrej','Zarczuk','az_jebacPiS10','bd51b681a5dd70b9ff4bed0c95c51e7a','az.1ti@gmail.com','1939-09-01'),(2,'Oleg','Mongol','bebra','202cb962ac59075b964b07152d234b70','ebr@notgmail.com','2000-02-01'),(3,'anton','lakpotochumbenkowiczenkowicz','bebroid','202cb962ac59075b964b07152d234b70','bebr@notgmail.com','3333-03-12'),(4,'Kiril','Spermenko','nikita','c4ca4238a0b923820dcc509a6f75849b','niki@notgmail.com','2001-02-12'),(5,'barak','obama','motus','25d55ad283aa400af464c76d713c07ad','obam@notgmail.com','2000-02-21');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zamowienia`
--

DROP TABLE IF EXISTS `zamowienia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zamowienia` (
  `id_zam` int(11) NOT NULL AUTO_INCREMENT,
  `id_tow` int(11) NOT NULL,
  `id_klienta` int(11) NOT NULL,
  `gdzie` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `dataczas` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_zam`),
  KEY `zam` (`id_tow`,`id_klienta`),
  KEY `id_klienta` (`id_klienta`),
  CONSTRAINT `zamowienia_ibfk_1` FOREIGN KEY (`id_tow`) REFERENCES `noski` (`id`),
  CONSTRAINT `zamowienia_ibfk_2` FOREIGN KEY (`id_klienta`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zamowienia`
--

LOCK TABLES `zamowienia` WRITE;
/*!40000 ALTER TABLE `zamowienia` DISABLE KEYS */;
INSERT INTO `zamowienia` VALUES (1,5,2,'kijany 19B','2023-03-30 17:40:53'),(2,3,2,'Lublin 17a','2023-03-30 17:41:03'),(3,7,1,'Lupok 17','2023-03-30 17:42:00'),(4,3,1,'Aluk 11B','2023-03-30 17:42:07'),(5,3,2,'kijany 19A','2023-03-30 18:02:52'),(6,1,2,'Kijany 10','2023-03-30 18:02:59'),(7,7,2,'Jawisz 17B','2023-03-30 18:03:08');
/*!40000 ALTER TABLE `zamowienia` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-04-01 14:45:26
