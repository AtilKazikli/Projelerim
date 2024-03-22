-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 22 Mar 2024, 16:18:44
-- Sunucu sürümü: 8.0.31
-- PHP Sürümü: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `rent_services`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `adverts`
--

DROP TABLE IF EXISTS `adverts`;
CREATE TABLE IF NOT EXISTS `adverts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `baslik` varchar(100) COLLATE utf8mb3_turkish_ci NOT NULL,
  `aciklama` text COLLATE utf8mb3_turkish_ci,
  `fiyat` decimal(10,2) DEFAULT NULL,
  `araba_marka` varchar(50) COLLATE utf8mb3_turkish_ci DEFAULT NULL,
  `araba_model` varchar(50) COLLATE utf8mb3_turkish_ci DEFAULT NULL,
  `yil` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `resim` varchar(100) COLLATE utf8mb3_turkish_ci DEFAULT NULL,
  `rank` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb3_turkish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb3_turkish_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb3_turkish_ci NOT NULL,
  `address` text COLLATE utf8mb3_turkish_ci NOT NULL,
  `rank` int NOT NULL,
  `isActive` tinyint NOT NULL,
  `createdAt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `address`, `rank`, `isActive`, `createdAt`) VALUES
(2, 'Atıl', 'ikizatil2@gmail.com', '05434567897', 'bilmemnasdade mahallesi', 0, 1, '2024-01-02 11:56:06'),
(4, 'semih', 'torbacı@gmail.com', '05543456789', 'bilmemne mahallesi', 0, 1, '2024-01-02 09:04:16'),
(5, 'mustafa', 'mustafa09@gmail.com', '05382758295', 'kemer mahallesi', 0, 1, '2024-01-02 11:56:52'),
(6, 'Mehmetcan', 'Mehmetcantopuz@gmail.com', '05423678943', 'ata mahallesi', 0, 1, '2024-01-02 11:57:31');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

DROP TABLE IF EXISTS `kullanicilar`;
CREATE TABLE IF NOT EXISTS `kullanicilar` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ad` varchar(50) COLLATE utf8mb3_turkish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb3_turkish_ci NOT NULL,
  `sifre` varchar(255) COLLATE utf8mb3_turkish_ci NOT NULL,
  `olusturulma_tarihi` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`id`, `ad`, `email`, `sifre`, `olusturulma_tarihi`) VALUES
(1, 'bahadir', 'admin@admin.com', '$2y$10$LWHTyIuSIPXkvWhVk6KLReKhP9AQ.mJ4UpgwDS856qMHhXlf.TOZy', '2024-01-08 08:39:51'),
(2, 'semih', 'asdasd@gmail.com', '$2y$10$edziCqCwGLC/nKBrnAeNtOHIfUy2ICVPYo1xwrtUquiagTK9L4SAi', '2024-01-08 08:44:32'),
(3, 'atıl', 'atil@gmail.com', '4297f44b13955235245b2497399d7a93', '2024-01-08 08:50:14'),
(4, 'asdasd', 'ikizatil2@gmail.com', '4297f44b13955235245b2497399d7a93', '2024-01-08 14:40:29'),
(5, 'Atıl ', 'ikizatil1@hotmail.com', '06fa3c7e8b92f894e3fbd79733b644fe', '2024-01-13 09:35:49'),
(6, 'Atıl ', 'ikizatil1@hotmail.com', '06fa3c7e8b92f894e3fbd79733b644fe', '2024-01-13 09:35:53'),
(7, 'samet', 'samet09@gmail.com', '8e017c2a87245b33b20bf1335f099b44', '2024-01-15 08:28:16'),
(8, 'Atıl ', 'ikizatil4@gmail.com', '016db367f461ddd61522b3f3b90b2ef7', '2024-01-15 08:39:16'),
(9, 'Atıl ', 'ikizatil4@gmail.com', '016db367f461ddd61522b3f3b90b2ef7', '2024-01-15 08:39:29'),
(10, 'Umut', 'ashdjashgdhad@gmail.con', '4297f44b13955235245b2497399d7a93', '2024-01-22 07:47:54');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sender_id` int DEFAULT NULL,
  `receiver_id` int DEFAULT NULL,
  `message` text COLLATE utf8mb3_turkish_ci,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `messagess`
--

DROP TABLE IF EXISTS `messagess`;
CREATE TABLE IF NOT EXISTS `messagess` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sender_id` int DEFAULT NULL,
  `receiver_id` int DEFAULT NULL,
  `message_text` text COLLATE utf8mb3_turkish_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_read` int DEFAULT '0',
  `is_deleted` int DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `sender_id` (`sender_id`),
  KEY `receiver_id` (`receiver_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `messagess`
--

INSERT INTO `messagess` (`id`, `sender_id`, `receiver_id`, `message_text`, `created_at`, `is_read`, `is_deleted`) VALUES
(1, 7, 1, 'asxas', '2024-01-15 07:41:46', 0, 0),
(2, NULL, 1, 'asdasd', '2024-01-17 16:28:56', 0, 0),
(3, NULL, 1, 'asdasd', '2024-01-17 16:32:16', 0, 0),
(4, NULL, 1, 'kaçkdasd', '2024-01-19 07:29:03', 0, 0),
(5, NULL, 1, 'dafsdfsdf', '2024-01-22 04:27:10', 0, 0),
(6, NULL, 1, 'sasdax', '2024-01-22 04:41:19', 0, 0),
(7, NULL, 1, 'ajksdasd', '2024-01-22 04:49:20', 0, 0),
(8, NULL, 1, 'jahskdasd', '2024-01-22 04:49:37', 0, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `url` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `image_url` varchar(255) COLLATE utf8mb3_turkish_ci NOT NULL,
  `description` text COLLATE utf8mb3_turkish_ci NOT NULL,
  `rank` int NOT NULL,
  `isActive` tinyint NOT NULL,
  `createdAt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `url`, `name`, `image_url`, `description`, `rank`, `isActive`, `createdAt`) VALUES
(9, 'asdasd.com', 'ADK', '', '                                                        <p>asdasdas</p>                                                ', 4, 1, '2024-01-07 13:22:02'),
(7, 'asdasdalmsdnkasd.com', 'Fiatt', '', 'asdmnasdad', 2, 1, '2024-01-02 11:58:50'),
(8, '', 'Mercedes', '', '', 3, 1, '2024-01-02 11:58:59'),
(5, '', 'BMW', '', '', 1, 1, '2024-01-02 11:58:36'),
(4, '', 'Porsche', '', '', 0, 1, '2024-01-02 11:58:20'),
(10, 'asda', 'semih', '', '<p>asdasd</p>', 5, 1, '2024-01-07 13:32:17'),
(11, 'asdasd.com', 'ADK', 'alsskdjoajsd-com', '                                                        <p>asdasdas</p>                                                ', 6, 1, '2024-01-10 20:53:55'),
(12, 'asdasd', 'ZEYNEO', '', '<p>asdasd</p>', 7, 1, '2024-01-10 21:12:03');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `reservation_id` int NOT NULL AUTO_INCREMENT,
  `customer_id` int DEFAULT NULL,
  `car_id` int DEFAULT NULL,
  `reservation_date` date DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT '1',
  `createdAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updateAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`reservation_id`),
  KEY `customer_id` (`customer_id`),
  KEY `car_id` (`car_id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `reservations`
--

INSERT INTO `reservations` (`reservation_id`, `customer_id`, `car_id`, `reservation_date`, `start_date`, `end_date`, `isActive`, `createdAt`, `updateAt`) VALUES
(12, 2, 3, '2020-04-20', '2007-05-20', '2019-08-20', 1, '2024-01-10 17:05:27', '2024-01-10 17:05:27');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `resimler`
--

DROP TABLE IF EXISTS `resimler`;
CREATE TABLE IF NOT EXISTS `resimler` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ilan_id` int DEFAULT NULL,
  `resim_yolu` varchar(255) COLLATE utf8mb3_turkish_ci DEFAULT NULL,
  `resim_baslik` varchar(255) COLLATE utf8mb3_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ilan_id` (`ilan_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
  `sale_id` int NOT NULL AUTO_INCREMENT,
  `customer_id` int DEFAULT NULL,
  `car_id` int DEFAULT NULL,
  `sale_date` date DEFAULT NULL,
  `sale_amount` int DEFAULT NULL,
  `payment_method` varchar(50) COLLATE utf8mb3_turkish_ci DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `sale_status` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci DEFAULT NULL,
  `description` text COLLATE utf8mb3_turkish_ci,
  `isActive` tinyint NOT NULL,
  `createdAt` datetime NOT NULL,
  PRIMARY KEY (`sale_id`),
  KEY `customer_id` (`customer_id`),
  KEY `car_id` (`car_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1234235 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `sales`
--

INSERT INTO `sales` (`sale_id`, `customer_id`, `car_id`, `sale_date`, `sale_amount`, `payment_method`, `delivery_date`, `sale_status`, `description`, `isActive`, `createdAt`) VALUES
(8, 2, 2, '2009-02-20', 2, 'cash', '2010-02-20', 'Satıldı', '<p>Çok iyi araba</p>', 1, '2024-01-10 19:59:29'),
(2, 3, 3, '2009-02-20', 2, 'cash', '2010-02-20', 'Satılmadı', '<p>Son kasa</p>', 1, '2024-01-10 20:21:55'),
(3, 4, 2, '2009-02-20', 2, 'cash', '2010-02-20', 'Satıldı', '<p>deneme açıklama</p>', 1, '2024-01-10 20:23:50'),
(6, 3, 2, '2009-02-20', 2, 'online', '2010-02-20', 'Satıldı', '<p>Alabilirsiniz</p>', 1, '2024-01-10 20:25:52'),
(9, 6, 8, '2009-02-20', 5, 'cash', '2010-02-20', 'satılmadı', '<p>çok iyii model</p>', 1, '2024-01-11 10:36:48');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb3_turkish_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb3_turkish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb3_turkish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb3_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `password`) VALUES
(1, '', 'semih', 'semih@gmail.com', '123123123');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `vehicles`
--

DROP TABLE IF EXISTS `vehicles`;
CREATE TABLE IF NOT EXISTS `vehicles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `brand` varchar(255) COLLATE utf8mb3_turkish_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb3_turkish_ci NOT NULL,
  `year` int NOT NULL,
  `plate_number` varchar(20) COLLATE utf8mb3_turkish_ci NOT NULL,
  `color` varchar(50) COLLATE utf8mb3_turkish_ci NOT NULL,
  `rank` int NOT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `isActive` tinyint NOT NULL,
  `createdAt` datetime NOT NULL,
  `updateAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `vehicles`
--

INSERT INTO `vehicles` (`id`, `brand`, `model`, `year`, `plate_number`, `color`, `rank`, `description`, `isActive`, `createdAt`, `updateAt`) VALUES
(4, 'Mercedes', 'a81', 2008, '35ed987', 'mavi', 0, '<p>açıklama deneme</p>', 1, '2024-01-22 07:46:11', '2024-01-22 04:46:11'),
(5, 'fiat', 'c200', 2008, '03abz28', 'beyaz', 0, '<p>jasdadsh</p>', 1, '2023-12-28 14:39:21', '2023-12-28 14:39:21'),
(6, 'opel', 'meriva', 2009, '34ef44', 'turuncu', 0, 'Son model kasadır', 1, '2024-01-02 11:52:41', '2024-01-02 11:52:41'),
(7, 'porsche', 'cayanne', 2021, '09as293', 'beyaz', 0, '<p>ASNMNDBASDJ</p>', 1, '2024-01-02 11:54:08', '2024-01-02 11:54:08'),
(8, 'bmw', 'a180', 2017, '34ef48', 'siyah', 0, '<p>asdasdasdasd</p>', 1, '2024-01-02 11:54:37', '2024-01-02 11:54:37'),
(9, 'Audi', 'A1', 2021, '34ef45', 'mavi', 0, '<p>asdasdad</p>', 1, '2024-01-08 20:20:57', '2024-01-08 17:20:57');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
