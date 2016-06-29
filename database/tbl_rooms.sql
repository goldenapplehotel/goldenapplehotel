-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2016 at 11:07 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `goldenapplehotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rooms`
--

CREATE TABLE IF NOT EXISTS `tbl_rooms` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `en_title` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `ch_title` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `currency_id` int(2) NOT NULL DEFAULT '0',
  `url` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `type_id` int(2) NOT NULL,
  `feature` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `_status` int(2) NOT NULL DEFAULT '1' COMMENT '0=active,1=deactive',
  `_slide` int(2) NOT NULL,
  `en_description` text COLLATE utf8_unicode_ci,
  `ch_description` text COLLATE utf8_unicode_ci,
  `front_status` int(2) NOT NULL DEFAULT '0',
  `promotion_id` int(10) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_rooms`
--

INSERT INTO `tbl_rooms` (`Id`, `en_title`, `ch_title`, `price`, `currency_id`, `url`, `type_id`, `feature`, `_status`, `_slide`, `en_description`, `ch_description`, `front_status`, `promotion_id`) VALUES
(1, 'Superior Room', '高级客房', 55, 0, '4373c6cf9ce1b695e4b309822ddc1434.jpg', 1, '1^2^4^5', 1, 0, 'Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.', '高级客房', 0, 1),
(2, 'Deluxe Double Room', '豪华双人间', 35, 0, 'bdad328bd7bd36835d1f5c98238c4e73.jpg', 1, '1^2^4^5^6', 1, 0, '', '豪华双人间 豪华双人间 豪华双人间豪华双人间豪华双人间豪华双人间豪华双人间豪华双人间豪华双人间豪华双人间豪华双人间豪华双人间', 0, 0),
(3, 'Deluxe Twin Room', '豪华双床房', 33, 0, 'f9ce6069a5191305ea994fedaec67174.jpg', 1, '2^4^5', 1, 0, NULL, '豪华双床房 豪华双床房 豪华双床房 豪华双床房 豪华双床房', 0, 0),
(4, '33', '33', 33, 0, '92d3589b137c52d3d184e0d98c199160.jpg', 1, '2^4^5', 1, 0, NULL, 'fewa', 0, 1),
(5, 'Deluxe Double Room', '', 0, 0, 'd4b8e150da49d6a4721a1e59f2b8d470.jpg', 1, '1^2^6', 1, 0, NULL, '', 0, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
