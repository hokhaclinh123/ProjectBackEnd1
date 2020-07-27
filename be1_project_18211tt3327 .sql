-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 03, 2019 at 03:06 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `be1_project_18211tt3327`
--
CREATE DATABASE IF NOT EXISTS `be1_project_18211tt3327` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `be1_project_18211tt3327`;

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts` (
  `account_id` int(11) NOT NULL AUTO_INCREMENT,
  `account_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_role` int(11) NOT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `account_user`, `account_password`, `account_role`) VALUES
(4, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(5, 'thainguyen', '827ccb0eea8a706c4c34a16891f84e7b', 2);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'SEIKO'),
(2, 'ORIENT'),
(3, 'CITIZEN'),
(4, 'CASIO'),
(5, 'TIMEX'),
(6, 'KLEIN'),
(7, 'FALCON');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` decimal(20,0) NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_views` int(11) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_image`, `product_description`, `product_quantity`, `product_views`) VALUES
(1, 'Seiko 5 SNZG09K1 Luxe', '3800000', 'SNZG09K1.jpg/SNZG09K1S2.jpg/SNZG09K1S3.jpg/SNZG09K1S4.jpg\r\n', 'Case size/42 mm;\r\nCase thickness/12 mm;\r\nCase material/Stainless steel;\r\nWindow material/Hardlex;\r\nMovement/Automatic 23 jewels;\r\nBand Material/leather calfskin;\r\nOrigin/Assembly by Malaysia;\r\nwater/resistant	100 m', 2, 55),
(2, 'Seiko SNKK27', '2900000', 'SNKK27.jpg/SNKK27.jpg/SNKK27S2.jpg/SNKK27S3.jpg', 'Case size/42 mm;\r\nCase thickness/9 mm;\r\nCase material/Stainless steel;\r\nWindow material/Mineral;\r\nMovement/Quartz;\r\nBand Material/Stainless steel;\r\nOrigin/Made in Japan;\r\nwater/resistant	100 m', 3, 32),
(3, 'Seiko SRP704', '5500000', 'SRP704.jpg/SRP704.jpg/SRP704S2.jpg/SRP704S3.jpg', 'Case size/43 mm;\r\nCase thickness/13 mm;\r\nCase material/Stainless steel;\r\nWindow material/Hardlex;\r\nMovement/Automatic;\r\nBand Material/Stainless steel;\r\nOrigin/Made in Japan;\r\nwater/resistant	100 m', 2, 14),
(4, 'Seiko SUR251', '3215000', 'SUR251.jpg/SUR251.jpg/SUR251S2.jpg/SUR251S3.jpg', 'Case size/42 mm;\r\nCase thickness/10 mm;\r\nCase material/Stainless steel;\r\nDial Window material type/Hardlex;\r\nMovement/Quartz Solar;\r\nBand Material/Leather calfskin;\r\nOrigin/Japan;\r\nwater/resistant	100 m', 3, 14),
(5, 'Seiko SUR249', '3215000', 'SUR249.jpg/SUR249.jpg/SUR249_S2.jpg/SUR249_S3.jpg', 'Case size/42 mm;\r\nCase thickness/10 mm;\r\nCase material/Stainless steel;\r\nDial Window material type/Hardlex;\r\nMovement/Quartz Solar;\r\nBand Material/Leather calfskin;\r\nOrigin/Japan;\r\nwater/resistant	100 m', 3, 6),
(6, 'Seiko SUR148P1', '3400000', 'SUR148P1.jpg/SUR148P1.jpg/SUR148P1_S2.jpg/SUR148P1_S3.jpg', 'Case size/41 mm;\r\nCase thickness/9 mm;\r\nCase material/Stainless steel Gold tone;\r\nDial Window material type/Scratch Resistant Hardlex;\r\nMovement/Quartz;\r\nBand Material/Stainless steel Gold tone;\r\nOrigin/Japan;\r\nwater/resistant	100 m', 4, 1),
(7, 'Orient FAG02003W0', '4700000', 'FAG02003W0.jpg/FAG02003W0.jpg/FAG02003W0_S2.jpg/FAG02003W0_S3.jpg', 'Case size/42 mm;\r\nCase thickness/11.8 mm;\r\nCase material/Metal;\r\nWindow material/Stainless steel;\r\nMovement/Automatic;\r\nBand Material/leather calfskin;\r\nOrigin/Made in Japan;\r\nwater/resistant	50 m', 4, 18),
(8, 'Orient FAC08001T0', '4700000', 'FAC08001T0.jpg/FAC08001T0_S2.jpg/FAC08001T0.jpg/FAC08001T0_S2.jpg', 'Case size/42 mm;\r\nCase thickness/11.8 mm;\r\nCase material/Metal;\r\nWindow material/Stainless steel;\r\nMovement/Automatic;\r\nBand Material/leather calfskin;\r\nOrigin/Made in Japan;\r\nwater/resistant	50 m', 4, 6),
(9, 'Orient FGW0100AW0', '2800000', 'FGW0100AW0.jpg/FGW0100AW0.jpg/FGW0100AW0_S2.jpg/FGW0100AW0_S3.jpg', 'Case size/38 mm;\r\nCase thickness/7.5 mm;\r\nCase material/Stainless steel;\r\nWindow material/Anti reflective sapphire;\r\nMovement/Quartz;\r\nBand Material/leather calfskin;\r\nOrigin/MADE IN JAPAN;\r\nwater/resistant	30 m', 5, 3),
(10, 'Orient FUNA1003B', '2700000', 'FUNA1003B.jpg/FUNA1003B_S2.jpg/FUNA1003B.jpg/FUNA1003B_S2.jpg', 'Case size/38 mm;\r\nCase thickness/8 mm;\r\nCase material/Stainless steel;\r\nWindow material/Mineral;\r\nMovement/Quartz;\r\nBand Material/leather calfskin;\r\nOrigin/Made in Japan;\r\nwater/resistant	50 m', 6, 0),
(11, 'Orient FAC00009W0', '4600000', 'FAC00009W0.jpg/FAC00009W0_S2.jpg/FAC00009W0_S3.jpg/FAC00009W0_S4.jpg', 'Case size/40 mm;\r\nCase thickness/12 mm;\r\nCase material/Stainless steel;\r\nWindow material/Mineral;\r\nMovement/Automatic;\r\nBand Material/leather calfskin;\r\nOrigin/Made in Japan;\r\nwater/resistant	50 m', 2, 0),
(12, 'Orient Sun FET0T003T0', '7700000', 'FET0T003T0.jpg/FET0T003T0.jpg/FET0T003T0_S2.jpg/FET0T003T0_S3.jpg', 'Case size/42.5 mm;\r\nCase thickness/15 mm;\r\nCase material/Stainless steel;\r\nWindow material/Synthetic sapphire;\r\nMovement/Automatic;\r\nBand Material/leather calfskin;\r\nOrigin/Japanese;\r\nwater/resistant	100 m', 3, 0),
(13, 'Citizen NH8354-58A', '5200000', 'NH8354.jpg/NH8354.jpg/NH8354_S2.jpg/NH8354_S3.jpg', 'Case size/40 mm;\r\nCase thickness/10 mm;\r\nCase material/Stainless steel;\r\nWindow material/Mineral;\r\nMovement/Automatic;\r\nBand Material/Stainless steel;\r\nOrigin/MADE IN JAPAN;\r\nwater/resistant	30 m', 3, 1),
(14, 'Citizen NH8363-14A', '3600000', 'NH8363.jpg/NH8363_S2.jpg/NH8363.jpg/NH8363_S2.jpg', 'Case size/41 mm;\r\nCase thickness/13 mm;\r\nCase material/Stainless steel;\r\nWindow material/Mineral;\r\nMovement/Automatic;\r\nBand Material/Calfskin;\r\nOrigin/Made in Japan;\r\nwater/resistant	50 m', 3, 3),
(15, 'Citizen BL8140-55E', '4700000', 'BL8140.jpg/BL8140.jpg/BL8140_S2.jpg/BL8140_S3.jpg', 'Case size/42 mm;\r\nCase thickness/11.5 mm;\r\nCase material/Stainless steel;\r\nWindow material/Synthetic sapphire;\r\nMovement/Quartz – Eco drive;\r\nBand Material/Stainless steel;\r\nOrigin/Japanese;\r\nwater/resistant	100 m', 2, 4),
(16, 'Citizen AO9003-08E', '6770000', 'AO9003.jpg/AO9003.jpg/AO9003_S2.jpg/AO9003_S3.jpg', 'Case size/42 mm;\r\nCase thickness/11 mm;\r\nCase material/Stainless steel;\r\nWindow material/Mineral;\r\nMovement/Quartz – Eco drive;\r\nBand Material/Synthetic leather;\r\nOrigin/Japanese;\r\nwater/resistant	50 m', 3, 0),
(17, 'Citizen AU1060-51E', '5670000', 'AU1060.jpg/AU1060.jpg/AU1060_S2.jpg/AU1060_S3.jpg', 'Case size/40 mm;\r\nCase thickness/8 mm;\r\nCase material/Stainless steel;\r\nWindow material/Mineral;\r\nMovement/Quartz;\r\nBand Material/Stainless steel;\r\nOrigin/Japanese;\r\nwater/resistant	50 m', 4, 0),
(18, 'Citizen BI5002-06E', '3100000', 'BI5002.jpg/BI5002.jpg/BI5002_S2.jpg/BI5002_S3.jpg', 'Case size/39 mm;\r\nCase thickness/8.5 mm;\r\nCase material/Stainless steel;\r\nWindow material/Mineral;\r\nMovement/Quartz;\r\nBand Material/leather calfskin;\r\nOrigin/Japanese;\r\nwater/resistant	50 m;', 6, 0),
(20, 'Casio AEQ100W-1AV', '1250000', 'AEQ100W.jpg/AEQ100W.jpg/AEQ100W_S2.jpg/AEQ100W_S3.jpg', 'Case size/50 mm;\r\nCase thickness/15.3 mm;\r\nCase material/Resin;\r\nWindow material/Mineral;\r\nMovement/Quartz;\r\nBand Material/Resin;\r\nOrigin/USA;\r\nwater/resistant	100 m', 7, 2),
(19, 'Casio GA100L-2A', '3300000', 'GA100L.jpg/GA100L.jpg/GA100L_S2.jpg/GA100L_S3.jpg', 'Case size/51.2 mm;\r\nCase thickness/16.9 mm;\r\nCase material/Blue Resin;\r\nWindow material/Scratch Resistant Mineral;\r\nMovement/Quartz;\r\nBand Material/Resin;\r\nOrigin/Made in Thailand;\r\nwater/resistant	200 m', 8, 1),
(21, 'Casio AE1200WHD-1A', '900000', 'AE1200WHD.jpg/AE1200WHD.jpg/AE1200WHD_S2.jpg/AE1200WHD_S3.jpg', 'Case size/39.5 mm;\r\nCase thickness/12.5 mm;\r\nCase material/Stainless steel;\r\nWindow material/Mineral;\r\nMovement/Quartz;\r\nBand Material/Stainless steel;\r\nOrigin/Made in Japan;\r\nwater/resistant	100 m', 5, 0),
(22, 'Casio MCW100H-4AV', '1400000', 'MCW100H.jpg/MCW100H.jpg/MCW100H_S2.jpg/MCW100H_S3.jpg', 'Case size/49.3 mm;\r\nCase thickness/13 mm;\r\nCase material/Resin;\r\nDial Window material type/Resin Glass;\r\nMovement/Quartz;\r\nBand Material/Resin;\r\nOrigin/Japan;\r\nwater/resistant	200 m', 2, 2),
(23, 'Casio MTP4500D-1AV', '2220000', 'MTP4500D.jpg/MTP4500D.jpg/MTP4500D_S2.jpg/MTP4500D_S3.jpg', 'Case size/42 mm;\r\nCase thickness/10 mm;\r\nCase material/Stainless steel;\r\nDial Window material type/Anti reflective Mineral;\r\nMovement/Quartz;\r\nBand Material/Stainless steel;\r\nOrigin/Japan;\r\nwater/resistant	100 m', 2, 0),
(24, 'Casio MDV106-1A', '1905000', 'MDV106.jpg/MDV106_S2.jpg/MDV106.jpg/MDV106_S2.jpg', 'Case size/42 mm;\r\nCase thickness/12 mm;\r\nCase material/Stainless steel;\r\nDial Window material type/Anti reflective Mineral;\r\nMovement/Quartz;\r\nBand Material/Resin;\r\nOrigin/Japanese quartz;\r\nwater/resistant	200 m', 3, 0),
(25, 'Timex A300', '1600000', 'A300.jpg/A300.jpg/A300_S2.jpg/A300_S3.jpg', 'Case size/32 mm;\r\nCase thickness/8 mm;\r\nCase material/Brass;\r\nWindow material/Mineral;\r\nMovement/Quartz;\r\nBand Material/Leather;\r\nOrigin/USA;\r\nwater/resistant	50 m', 4, 3),
(26, 'Timex TW2P87700', '1900000', 'TW2P87700.jpg/TW2P87700_S2.jpg/TW2P87700_S3.jpg/TW2P87700_S4.jpg', 'Case size/40 mm;\r\nCase thickness/10 mm;\r\nCase material/Stainless steel;\r\nWindow material/Mineral;\r\nMovement/Quartz;\r\nBand Material/calfskin;\r\nOrigin/USA;\r\nwater/resistant	50 m', 2, 17),
(27, 'Timex T2P289', '1800000', 'T2P289.jpg/T2P289_S2.jpg/T2P289_S3.jpg/T2P289_S4.jpg', 'Case size/40 mm;\r\nCase thickness/10 mm;\r\nCase material/Stainless steel\r\nWindow material/Mineral;\r\nMovement/Quartz;\r\nBand Material/Stainless steel;\r\nOrigin/USA;\r\nwater/resistant	50 m;', 4, 0),
(28, 'Timex T2P450', '1950000', 'T2P450.jpg/T2P450_S2.jpg/T2P450_S3.jpg/T2P450_S4.jpg', 'Case size/27 mm;\r\nCase thickness/9 mm;\r\nCase material/Brass;\r\nWindow material/Mineral;\r\nMovement/Quartz;\r\nBand Material/Crocodile leather;\r\nOrigin/Made in USA;\r\nwater/resistant	50 m', 5, 0),
(29, 'Timex T49905', '2800000', 'T49905.jpg/T49905.jpg/T49905_S2.jpg/T49905_S3.jpg', 'Case size/43 mm;\r\nCase thickness/12 mm;\r\nCase material/Stainless steel;\r\nWindow material/Mineral;\r\nMovement/Quartz;\r\nBand Material/Calfskin;\r\nOrigin/USA;\r\nwater/resistant	100 m', 2, 0),
(30, 'Timex T2P381', '3800000', 'T2P381.jpg/T2P381.jpg/T2P381_S2.jpg/T2P381_S3.jpg', 'Case size/43 mm;\r\nCase thickness/12 mm;\r\nCase material/Stainless steel;\r\nDial Window material type/Anti reflective Mineral;\r\nMovement/Quartz;\r\nBand Material/Brown Leather;\r\nOrigin/USA;\r\nwater/resistant	200 m', 5, 0),
(31, 'Anne Klein 2435SVTT', '2600000', '2435SVTT.jpg/2435SVTT.jpg/2435SVTT_S2.jpg/2435SVTT_S3.jpg', 'Case size/28 mm;\r\nCase thickness/8 mm;\r\nCase material/Metal;\r\nWindow material/Mineral;\r\nMovement/Quartz;\r\nBand Material/alloy;\r\nOrigin/USA;\r\nwater/resistant	30 m', 6, 1),
(32, 'Anne Klein 2952LPRG', '3800000', '2952LPRG.jpg/2952LPRG.jpg/2952LPRG_S2.jpg/2952LPRG_S3.jpg', 'Case size/28 mm * 32 mm;\r\nCase thickness/8 mm;\r\nCase material/Stainless steel;\r\nWindow material/Mineral;\r\nMovement/Quartz;\r\nBand Material/Ceramic;\r\nOrigin/Assembly by USA;\r\nwater/resistant	50 m', 5, 0),
(33, 'Anne Klein 2628BKGB', '3800000', '2628BKGB.jpg/2628BKGB.jpg/2628BKGB_S2.jpg/2628BKGB_S3.jpg', 'Case size/32 mm;\r\nCase thickness/7.5 mm;\r\nCase material/Stainless steel;\r\nWindow material/Mineral;\r\nMovement/Quartz;\r\nBand Material/alloy;\r\nOrigin/USA;\r\nwater/resistant	50 m', 2, 1),
(34, 'Anne Klein 9442CHHY', '2300000', '9442CHHY.jpg/9442CHHY.jpg/9442CHHY_S2.jpg/9442CHHY_S3.jpg', 'Case size/26 mm;\r\nCase thickness/9 mm;\r\nCase material/Stainless steel;\r\nWindow material/Mineral;\r\nMovement/Quartz;\r\nBand Material/Leather;\r\nOrigin/USA;\r\nwater/resistant	50 m', 5, 0),
(35, 'Anne Klein 9918RGLP', '2300000', '9918RGLP.jpg/9918RGLP.jpg/9918RGLP_S2.jpg/9918RGLP_S3.jpg', 'Case size/34 mm;\r\nCase thickness/9 mm;\r\nCase material/Brass;\r\nWindow material/Mineral;\r\nMovement/Quartz;\r\nBand Material/Calfskin;\r\nOrigin/USA;\r\nwater/resistant	50 m', 7, 0),
(36, 'Anne Klein 2348LPDB', '2350000', '2348LPDB.jpg/2348LPDB_S2.jpg/2348LPDB.jpg/2348LPDB_S2.jpg', 'Case size/32 mm;\r\nCase thickness/8 mm;\r\nCase material/Stainless steel;\r\nWindow material/Mineral;\r\nMovement/Quartz;\r\nBand Material/Ceramic;\r\nOrigin/USA;\r\nwater/resistant	50 m', 8, 0),
(37, 'Falcon VZ89', '1100000', 'VZ89.jpg/VZ89_S2.jpg/VZ89.jpg/VZ89_S2.jpg', 'Case size/22 mm;\r\nCase thickness/9 mm;\r\nCase material/Metal;\r\nWindow material/Mineral;\r\nMovement/Quartz;\r\nBand Material/leather calfskin;\r\nOrigin/Made in Japan;\r\nwater/resistant	50 m', 9, 1),
(38, 'Falcon QA36', '984000', 'QA36.jpg/QA36.jpg/QA36_S2.jpg/QA36_S3.jpg', 'Case size/32 mm;\r\nCase thickness/7 mm;\r\nCase material/Stainless steel;\r\nWindow material/acrylic resin;\r\nMovement/Quartz;\r\nBand Material/Synthetic leather belt type;\r\nOrigin/Made in Japan;\r\nwater/resistant	30 m', 8, 2),
(39, 'Falcon D020', '984000', 'D020.jpg/D020_S2.jpg/D020.jpg/D020_S2.jpg', 'Case size/35.5 mm;\r\nCase thickness/9 mm;\r\nCase material/Stainless steel;\r\nWindow material/acrylic resin;\r\nMovement/Quartz;\r\nBand Material/Synthetic leather belt type;\r\nOrigin/Made in Japan;\r\nwater/resistant	30 m', 3, 2),
(40, 'Falcon QA37', '907000', 'QA37.jpg/QA37.jpg/QA37_S2.jpg/QA37_S3.jpg', 'Case size/23 mm;\r\nCase thickness/7 mm;\r\nCase material/Stainless steel;\r\nWindow material/acrylic resin;\r\nMovement/Quartz;\r\nBand Material/Synthetic leather belt type;\r\nOrigin/Made in Japan;\r\nwater/resistant	30 m', 2, 1),
(41, 'Falcon D021', '984000', 'D021.jpg/D021.jpg/D021_S1.jpg/D021_S2.jpg', 'Case size/35.5 mm;\r\nCase thickness/9 mm;\r\nCase material/Stainless steel;\r\nWindow material/acrylic resin;\r\nMovement/Quartz;\r\nBand Material/Synthetic leather belt type;\r\nOrigin/Made in Japan;\r\nwater/resistant	30 m', 5, 1),
(42, 'Falcon D026', '984000', 'D026.jpg/D026_S2.jpg/D026_S3.jpg/D026_S4.jpg', 'Case size/38 mm;\r\nCase thickness/9 mm;\r\nCase material/Stainless steel;\r\nWindow material/acrylic resin;\r\nMovement/Quartz;\r\nBand Material/Synthetic leather belt type;\r\nOrigin/Made in Japan;\r\nwater/resistant	30 m', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

DROP TABLE IF EXISTS `product_category`;
CREATE TABLE IF NOT EXISTS `product_category` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`,`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`product_id`, `category_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 3),
(14, 3),
(15, 3),
(16, 3),
(17, 3),
(18, 3),
(19, 4),
(20, 4),
(21, 4),
(22, 4),
(23, 4),
(24, 4),
(25, 5),
(26, 5),
(27, 5),
(28, 5),
(29, 5),
(30, 5),
(31, 6),
(32, 6),
(33, 6),
(34, 6),
(35, 6),
(36, 6),
(37, 7),
(38, 7),
(39, 7),
(40, 7),
(41, 7),
(42, 7);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
