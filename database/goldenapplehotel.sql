-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2016 at 11:45 AM
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
-- Table structure for table `ci_cookies`
--

CREATE TABLE IF NOT EXISTS `ci_cookies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cookie_id` varchar(255) DEFAULT NULL,
  `netid` varchar(255) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `orig_page_requested` varchar(120) DEFAULT NULL,
  `php_session_id` varchar(40) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('322f5e472c304d4e597cc6f72d7ee2ba', '127.0.0.1', 'Microsoft Windows Network Diagnostics', 1463212821, 'a:2:{s:9:"user_data";s:0:"";s:8:"language";s:7:"english";}'),
('dea22079fca82d4e597c30c8d57fc090', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36', 1463215017, 'a:2:{s:9:"user_data";s:0:"";s:8:"language";s:7:"english";}'),
('90576107a00102740061a801abd5f983', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36', 1463212460, 'a:2:{s:9:"user_data";s:0:"";s:8:"language";s:7:"english";}'),
('d43e10574c700752eac4322c82e8b2b6', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36', 1463214543, 'a:2:{s:9:"user_data";s:0:"";s:8:"language";s:7:"english";}'),
('133ffa9d8805ba5481003d6c10ee891d', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0', 1403662883, 'a:4:{s:9:"user_data";s:0:"";s:8:"language";s:7:"english";s:9:"user_name";s:5:"admin";s:12:"is_logged_in";b:1;}'),
('cb2c684000a46453a4d9c2bf4a4ef137', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0', 1406001243, 'a:4:{s:9:"user_data";s:0:"";s:8:"language";s:7:"english";s:9:"user_name";s:5:"admin";s:12:"is_logged_in";b:1;}');

-- --------------------------------------------------------

--
-- Table structure for table `ci_user`
--

CREATE TABLE IF NOT EXISTS `ci_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(225) CHARACTER SET utf8 DEFAULT NULL,
  `photo` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `enabled` int(11) NOT NULL,
  `last_login` datetime NOT NULL,
  `address1` text,
  `address2` text,
  `phone1` varchar(50) DEFAULT NULL,
  `phone2` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `ci_user`
--

INSERT INTO `ci_user` (`id`, `first_name`, `last_name`, `email`, `user_name`, `password`, `photo`, `enabled`, `last_login`, `address1`, `address2`, `phone1`, `phone2`) VALUES
(1, 'Rin', 'Narith', 'rin_narith@yahoo.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', '', 1, '2016-06-29 10:48:13', NULL, NULL, NULL, NULL),
(6, 'Klaing', 'Ny', 'klaingny@pcspgroup.com', 'klaingny', '95ebc3c7b3b9f1d2c40fec14415d3cb8', '', 1, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner`
--

CREATE TABLE IF NOT EXISTS `tbl_banner` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `en_title` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ch_title` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `en_comfortable_title` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ch_comfortable_title` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `en_description` text COLLATE utf8_unicode_ci,
  `ch_description` text COLLATE utf8_unicode_ci,
  `url` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `_status` int(2) NOT NULL DEFAULT '1' COMMENT '0=active,1=deactive',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_banner`
--

INSERT INTO `tbl_banner` (`Id`, `en_title`, `ch_title`, `en_comfortable_title`, `ch_comfortable_title`, `en_description`, `ch_description`, `url`, `_status`) VALUES
(1, 'Promotion', '', 'the hotel', '', 'special promotion', '', '2ea47110df21768aa799dac7cd952b76.jpg', 0),
(2, 'The sunny room', '', 'confirm table room ', '', 'The sunny room are very interested ', '', '626b005961beae28716603b405e2678a.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_explores`
--

CREATE TABLE IF NOT EXISTS `tbl_explores` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `en_title` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ch_title` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `en_description` text COLLATE utf8_unicode_ci,
  `ch_description` text COLLATE utf8_unicode_ci,
  `img` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `_status` int(2) NOT NULL DEFAULT '1' COMMENT '0=active,1=deactive',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_features`
--

CREATE TABLE IF NOT EXISTS `tbl_features` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `en_feature` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `_status` int(2) NOT NULL DEFAULT '0',
  `ch_feature` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_features`
--

INSERT INTO `tbl_features` (`Id`, `en_feature`, `_status`, `ch_feature`) VALUES
(1, 'Dinners', 1, '晚餐'),
(2, 'Broadband Internet access', 1, ''),
(4, 'Tea and Coffee making facilities', 1, ''),
(5, 'Hair Dryer', 1, ''),
(6, 'Iron and Ironing Board', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallerys`
--

CREATE TABLE IF NOT EXISTS `tbl_gallerys` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `url` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` int(2) NOT NULL,
  `create_date` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `_status` int(2) NOT NULL DEFAULT '1',
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_main_gallery`
--

CREATE TABLE IF NOT EXISTS `tbl_main_gallery` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `en_name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ch_name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `_status` int(2) NOT NULL DEFAULT '1' COMMENT '0=active,1=deactive',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nav`
--

CREATE TABLE IF NOT EXISTS `tbl_nav` (
  `Id` int(2) NOT NULL AUTO_INCREMENT,
  `en_title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `ch_title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `_status` int(2) NOT NULL DEFAULT '1',
  `_models` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_nav`
--

INSERT INTO `tbl_nav` (`Id`, `en_title`, `ch_title`, `_status`, `_models`) VALUES
(1, 'home', '家', 1, 'index'),
(2, 'explore', '探索', 1, 'explore'),
(3, 'room', '房间', 1, 'hotel'),
(4, 'booking', '预订', 1, 'booking'),
(5, 'news', '新闻', 1, 'news'),
(6, 'gallery', '画廊', 1, 'gallery'),
(7, 'contact', '联系', 1, 'contact');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_promotions`
--

CREATE TABLE IF NOT EXISTS `tbl_promotions` (
  `Id` int(2) NOT NULL AUTO_INCREMENT,
  `en_title` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ch_title` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `_type` int(2) NOT NULL DEFAULT '0' COMMENT '0=promotion,1=discount',
  `en_description` text COLLATE utf8_unicode_ci,
  `ch_description` text COLLATE utf8_unicode_ci,
  `_status` int(2) NOT NULL DEFAULT '1',
  `price` float DEFAULT NULL,
  `_percent` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_promotions`
--

INSERT INTO `tbl_promotions` (`Id`, `en_title`, `ch_title`, `_type`, `en_description`, `ch_description`, `_status`, `price`, `_percent`) VALUES
(1, 'Khmer New Years', 'Khmer New Years', 0, 'Khmer New Years', 'Khmer New Years', 1, NULL, '33');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_rooms`
--

INSERT INTO `tbl_rooms` (`Id`, `en_title`, `ch_title`, `price`, `currency_id`, `url`, `type_id`, `feature`, `_status`, `_slide`, `en_description`, `ch_description`, `front_status`, `promotion_id`) VALUES
(1, 'Superior Room', '高级客房', 55, 0, '4373c6cf9ce1b695e4b309822ddc1434.jpg', 1, '1^2^4^5', 1, 0, 'Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.', '高级客房', 0, 1),
(2, 'Deluxe Double Room', '豪华双人间', 35, 0, 'bdad328bd7bd36835d1f5c98238c4e73.jpg', 1, '1^2^4^5^6', 1, 0, '', '豪华双人间 豪华双人间 豪华双人间豪华双人间豪华双人间豪华双人间豪华双人间豪华双人间豪华双人间豪华双人间豪华双人间豪华双人间', 0, 0),
(3, 'Deluxe Twin Room', '豪华双床房', 33, 0, 'f9ce6069a5191305ea994fedaec67174.jpg', 1, '2^4^5', 1, 0, NULL, '豪华双床房 豪华双床房 豪华双床房 豪华双床房 豪华双床房', 0, 0),
(4, '33', '33', 33, 0, '92d3589b137c52d3d184e0d98c199160.jpg', 1, '2^4^5', 1, 0, NULL, 'fewa', 0, 1),
(5, 'Deluxe Double Room', '', 0, 0, 'd4b8e150da49d6a4721a1e59f2b8d470.jpg', 1, '1^2^6', 1, 0, NULL, '', 0, 1),
(6, 'aaaa', '', 222, 0, '7483e0d94dc10deb6a473bb50fb2baf9.jpg', 1, '2', 1, 0, NULL, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rooms_feature`
--

CREATE TABLE IF NOT EXISTS `tbl_rooms_feature` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `room_id` int(10) NOT NULL,
  `feature_id` int(10) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rooms_gallery`
--

CREATE TABLE IF NOT EXISTS `tbl_rooms_gallery` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `rooms_id` int(10) NOT NULL,
  `url` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `_status` int(2) NOT NULL DEFAULT '0' COMMENT '0=active,1=deactive',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=44 ;

--
-- Dumping data for table `tbl_rooms_gallery`
--

INSERT INTO `tbl_rooms_gallery` (`Id`, `rooms_id`, `url`, `_status`) VALUES
(28, 1, '64bfd98e257fd314c23e4618264e5688.jpg', 1),
(29, 1, '15ad592a3e0c60a2c814a2f133735058.jpg', 1),
(30, 2, '4dbc5fc66b2c5cff1d10c12ea3853b78.jpg', 1),
(31, 2, 'c73dc13ae01733783e1fb78ad7475b09.jpg', 1),
(32, 2, '996d4649f29a479664306e2353bc60c9.jpg', 1),
(34, 1, 'c632fe4f7a66793487d19d74083e60bb.jpg', 1),
(35, 1, 'd89d9835676410ffc359af9c37b95f8f.jpg', 1),
(36, 3, '7ea8c4b1607c404af6e824bd7c0a1667.jpg', 1),
(37, 3, '961e26cc7b0cce699f6abd31cbf7c92f.jpg', 1),
(38, 4, 'a560601e00cd7109a8b80b3d63c698ce.jpg', 0),
(39, 4, '33ea1e7b9a41543ff0b74d28bf6340ef.jpg', 0),
(40, 5, '699c5f5ef46472235f7f07c71186fb0e.jpg', 0),
(41, 5, '2b7792dc4dca687340ccd9e13adfd4fe.jpg', 0),
(42, 6, '5420a1a70ed6160b97b25e2aacc2dd91.jpg', 0),
(43, 6, '7b90bc063c306679559ec237226a0187.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rooms_type`
--

CREATE TABLE IF NOT EXISTS `tbl_rooms_type` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `en_name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ch_name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `_status` int(2) NOT NULL DEFAULT '1',
  `_models` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_rooms_type`
--

INSERT INTO `tbl_rooms_type` (`Id`, `en_name`, `ch_name`, `_status`, `_models`) VALUES
(1, 'Single', '单', 1, ''),
(2, 'Family', '家庭', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  `profile` varchar(1000) DEFAULT NULL,
  `enabled` int(10) DEFAULT '1',
  `send_email` int(11) DEFAULT '0',
  `social_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `date_create`, `profile`, `enabled`, `send_email`, `social_id`) VALUES
(1, 'dara', '202cb962ac59075b964b07152d234b70', 'sun.angkorwat@gmail.com', '2016-05-27 18:20:01', NULL, 1, 0, NULL),
(2, 'panary', '202cb962ac59075b964b07152d234b70', 'sun.angkorwat@gmail.com', '2016-05-27 18:20:20', NULL, 1, 0, NULL),
(3, 'ty', '202cb962ac59075b964b07152d234b70', 'sun.ty@gmail.com', '2016-05-28 10:03:26', NULL, 1, 0, NULL),
(4, 'wang', '202cb962ac59075b964b07152d234b70', 'wang@gmail.com', '2016-05-28 15:13:14', NULL, 1, 0, NULL),
(5, 're', '202cb962ac59075b964b07152d234b70', 's@gmail.com', '2016-05-29 06:20:45', NULL, 1, 0, NULL),
(6, 'Angkor Wat Sun', NULL, 'sundara_prem@yahoo.com', '2016-05-29 07:47:19', 'https://scontent.xx.fbcdn.net/v/t1.0-1/p50x50/11217506_1976971945861960_80082911952677889_n.jpg?oh=2839bc8867f508b5d3ade277c3014030&oe=57D6D58B', 1, 0, '2005025726389915'),
(7, 'Angkorwat Pro', NULL, NULL, '2016-05-29 08:17:12', 'https://scontent.xx.fbcdn.net/v/t1.0-1/p50x50/13221481_263451200670106_4356149819741039869_n.jpg?oh=e0e3f409c2d9199db67a547a7af6011a&oe=57C8FB96', 1, 0, '273719972976562'),
(8, 'sdf', 'd9729feb74992cc3482b350163a1a010', 'sdff', '2016-05-29 08:53:31', NULL, 1, 0, NULL),
(9, 'sdfsf', '202cb962ac59075b964b07152d234b70', 'ssdsf', '2016-05-29 08:54:03', NULL, 1, 0, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
