-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3308
-- Время создания: Июн 16 2020 г., 12:10
-- Версия сервера: 8.0.18
-- Версия PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `emarket`
--

-- --------------------------------------------------------

--
-- Структура таблицы `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `id_brand` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `brand` varchar(50) NOT NULL,
  PRIMARY KEY (`id_brand`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `brands`
--

INSERT INTO `brands` (`id_brand`, `brand`) VALUES
(1, 'Apple'),
(2, 'Samsung'),
(3, 'Huawai'),
(4, 'Xiaomi'),
(5, 'Honor'),
(6, 'LG'),
(7, 'Nokia');

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id_cart` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `id_good` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_cart`),
  KEY `fk_purchase` (`id_good`),
  KEY `fk_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id_cart`, `user_id`, `id_good`) VALUES
(24, 10, 8),
(25, 1, 8);

-- --------------------------------------------------------

--
-- Структура таблицы `colors`
--

DROP TABLE IF EXISTS `colors`;
CREATE TABLE IF NOT EXISTS `colors` (
  `id_color` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `color` varchar(30) NOT NULL,
  PRIMARY KEY (`id_color`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `colors`
--

INSERT INTO `colors` (`id_color`, `color`) VALUES
(1, 'Black'),
(2, 'White'),
(3, 'Red'),
(4, 'Gold'),
(5, 'Silver'),
(6, 'Pink'),
(8, 'Blue'),
(9, 'Green');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

DROP TABLE IF EXISTS `goods`;
CREATE TABLE IF NOT EXISTS `goods` (
  `id_good` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `descryption` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_brand` int(10) UNSIGNED NOT NULL,
  `year` int(10) UNSIGNED NOT NULL,
  `main_photo` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `small_photo1` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `small_photo2` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `small_photo3` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `added` bigint(20) UNSIGNED NOT NULL,
  `id_color` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `id_ram` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `id_storage` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `price` float UNSIGNED NOT NULL,
  PRIMARY KEY (`id_good`),
  KEY `fk_purchase_user` (`added`),
  KEY `FK_color` (`id_color`),
  KEY `fk_storage` (`id_storage`),
  KEY `FK_ram` (`id_ram`),
  KEY `fk_brands` (`id_brand`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id_good`, `name`, `descryption`, `id_brand`, `year`, `main_photo`, `small_photo1`, `small_photo2`, `small_photo3`, `added`, `id_color`, `id_ram`, `id_storage`, `price`) VALUES
(8, 'Iphone 11', 'One of the most popular', 1, 2019, 'img/db/iphone11Gold1.jpg', 'img/db/iphone11Gold2.jpg', 'img/db/iphone11Gold3.jpg', 'img/db/iphone11Gold4.jpg', 10, 4, 7, 6, 2300),
(9, 'Iphone 11 Pro', 'Powerfull and beautyfull', 1, 2018, 'img/db/Iphone11ProG1.jpg', 'img/db/Iphone11ProG2.jpg', 'img/db/Iphone11ProG3.jpg', 'img/db/Honor9ABlue4.jpg', 10, 6, 7, 5, 2367),
(10, 'Honor 10I', 'Cool phone', 5, 2019, 'img/db/Honor10iB1.jpg', 'img/db/Honor10iB2.jpg', 'img/db/Honor10iB3.jpg', 'img/db/Honor10iB4.jpg', 1, 8, 6, 4, 1765),
(11, 'Honor 9S', 'Something', 5, 2019, 'img/db/Honor9SB1.jpg', 'img/db/Honor9SB2.jpg', 'img/db/Honor9SB3.jpg', 'img/db/Honor9SB4.jpg', 1, 1, 1, 1, 345),
(12, 'Huawai 23Ue', '', 3, 2020, 'img/db/Honor9ABlue1.jpg', NULL, 'img/db/Honor9ABlue3.jpg', 'img/db/Honor9ABlue4.jpg', 1, 5, 5, 1, 1789),
(13, 'Mi Redmi 8A 2', 'powerfull', 4, 2017, 'img/db/Redmi8A2B1.jpg', 'img/db/Redmi8A2B2.jpg', 'img/db/Redmi8A2B3.jpg', 'img/db/Redmi8A2B4.jpg', 1, 1, 6, 5, 2676),
(14, 'Samsung Galaxy A31', 'Super powerfull', 2, 2016, 'img/db/SgalA31R1.jpg', 'img/db/SgalA32R2.jpg', 'img/db/SgalA32R3.jpg', 'img/db/SgalA32R4.jpg', 1, 3, 4, 2, 567),
(15, 'Samsung Galaxy Z Flip', 'You will be very glad with it', 2, 2019, 'img/db/sgalZflipP1.jpg', 'img/db/sgalZflipP2.jpg', 'img/db/sgalZflipP3.jpg', 'img/db/sgalZflipP4.jpg', 1, 6, 6, 4, 1567),
(16, 'iPhone SE', 'The newest', 1, 2020, 'img/db/iphonese1.jpg', 'img/db/iphonese2.jpg', 'img/db/iphonese3.jpg', 'img/db/iphonese.jpg', 10, 2, 7, 6, 2000),
(17, 'Honor 30 8', 'Unusual', 5, 2016, 'img/db/Honor308Gr1.jpg', 'img/db/Honor308Gr2.jpg', 'img/db/Honor308Gr3.jpg', 'img/db/Honor308Gr4.jpg', 10, 9, 6, 4, 1045),
(18, 'Mi Note Lite 6', 'light and beautiful', 4, 2020, 'img/db/MiNote10Lite61.jpg', 'img/db/MiNote10Lite62.jpg', 'img/db/MiNote10Lite63.jpg', 'img/db/MiNote10Lite65.jpg', 10, 1, 6, 2, 1567),
(19, 'Honor 30 8', 'Brilliant', 5, 2015, 'img/db/Honor308s1.jpg', 'img/db/Honor308s2.jpg', 'img/db/Honor308s3.jpg', 'img/db/Honor308Gr4.jpg', 11, 5, 6, 4, 890),
(20, 'iphone 11', 'For you', 1, 2019, 'img/db/iphone11G1.jpg', 'img/db/iphone11G2.jpg', 'img/db/iphone11G3.jpg', 'img/db/iphone11G4.jpg', 11, 9, 7, 7, 1789);

-- --------------------------------------------------------

--
-- Структура таблицы `rams`
--

DROP TABLE IF EXISTS `rams`;
CREATE TABLE IF NOT EXISTS `rams` (
  `id_ram` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ram` varchar(10) NOT NULL,
  PRIMARY KEY (`id_ram`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `rams`
--

INSERT INTO `rams` (`id_ram`, `ram`) VALUES
(1, '128MB'),
(2, '256MB'),
(3, '512MB'),
(4, '1GB'),
(5, '2GB'),
(6, '4GB'),
(7, '8GB');

-- --------------------------------------------------------

--
-- Структура таблицы `storages`
--

DROP TABLE IF EXISTS `storages`;
CREATE TABLE IF NOT EXISTS `storages` (
  `id_storage` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `storage` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_storage`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `storages`
--

INSERT INTO `storages` (`id_storage`, `storage`) VALUES
(1, '8GB'),
(2, '16GB'),
(3, '32GB'),
(4, '64GB'),
(5, '128GB'),
(6, '256GB'),
(7, '512GB');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_login` varchar(30) CHARACTER SET cp1251 NOT NULL,
  `user_password` varchar(32) CHARACTER SET cp1251 NOT NULL,
  `user_hash` varchar(32) CHARACTER SET cp1251 NOT NULL,
  `user_ip` int(10) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `user_login`, `user_password`, `user_hash`, `user_ip`) VALUES
(1, 'hello', 'ec6a6536ca304edf844d1d248a4f08dc', '70e9d689670470e58ae60da20f0b6153', 0),
(2, 'iamnew', '2f7b52aacfbf6f44e13d27656ecb1f59', '52451efb02eface52b33c748a4cd4450', 0),
(3, 'new', '2c7a5a6bfa4b5baee3b981b7803c3747', '18c2fd742be3d231ad23d3c5e5ed3d7a', 0),
(10, 'try', '2f7b52aacfbf6f44e13d27656ecb1f59', '5cea0e74347e4543ea2148ff8d4bd9e8', 0),
(11, 'rita', '16bbc67855f77ff088931e609dd8e003', '0bccb7b65134e8ae45f752f5acf41cee', 0);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_purchase` FOREIGN KEY (`id_good`) REFERENCES `goods` (`id_good`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `goods`
--
ALTER TABLE `goods`
  ADD CONSTRAINT `FK_color` FOREIGN KEY (`id_color`) REFERENCES `colors` (`id_color`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ram` FOREIGN KEY (`id_ram`) REFERENCES `rams` (`id_ram`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_brands` FOREIGN KEY (`id_brand`) REFERENCES `brands` (`id_brand`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_purchase_user` FOREIGN KEY (`added`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_storage` FOREIGN KEY (`id_storage`) REFERENCES `storages` (`id_storage`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
