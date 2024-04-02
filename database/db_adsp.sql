-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 20, 2024 at 02:44 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_adsp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_buisness_category`
--

DROP TABLE IF EXISTS `tb_buisness_category`;
CREATE TABLE IF NOT EXISTS `tb_buisness_category` (
  `bca_id` int(11) NOT NULL AUTO_INCREMENT,
  `bca_bd_id` int(11) NOT NULL,
  `bca_bc_id` int(11) NOT NULL,
  PRIMARY KEY (`bca_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_buisness_category`
--

INSERT INTO `tb_buisness_category` (`bca_id`, `bca_bd_id`, `bca_bc_id`) VALUES
(13, 1, 4),
(12, 1, 3),
(11, 1, 2),
(4, 2, 2),
(5, 2, 3),
(6, 2, 4),
(7, 3, 6),
(8, 3, 7),
(9, 3, 8),
(10, 3, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tb_buisness_cities`
--

DROP TABLE IF EXISTS `tb_buisness_cities`;
CREATE TABLE IF NOT EXISTS `tb_buisness_cities` (
  `bc_id` int(11) NOT NULL AUTO_INCREMENT,
  `bc_name` varchar(100) NOT NULL,
  `bc_added_date` varchar(50) DEFAULT NULL,
  `bc_status` enum('a','d') NOT NULL DEFAULT 'a',
  PRIMARY KEY (`bc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_buisness_cities`
--

INSERT INTO `tb_buisness_cities` (`bc_id`, `bc_name`, `bc_added_date`, `bc_status`) VALUES
(2, 'gaya', NULL, 'a'),
(3, 'patna', NULL, 'a'),
(4, 'danapur', NULL, 'a'),
(5, 'Purina', NULL, 'a');

-- --------------------------------------------------------

--
-- Table structure for table `tb_business_appointments`
--

DROP TABLE IF EXISTS `tb_business_appointments`;
CREATE TABLE IF NOT EXISTS `tb_business_appointments` (
  `ba_id` int(11) NOT NULL AUTO_INCREMENT,
  `ba_ub_id` int(11) NOT NULL,
  `ba_day` varchar(20) NOT NULL,
  `ba_active` enum('a','d') NOT NULL,
  `ba_start_time` varchar(20) NOT NULL,
  `ba_end_time` varchar(20) NOT NULL,
  `ba_added_on` varchar(50) NOT NULL,
  PRIMARY KEY (`ba_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_business_appointments`
--

INSERT INTO `tb_business_appointments` (`ba_id`, `ba_ub_id`, `ba_day`, `ba_active`, `ba_start_time`, `ba_end_time`, `ba_added_on`) VALUES
(1, 1, 'monday', 'a', '02:00PM', '03:00PM', '2024-03-13 22:18:53'),
(2, 1, 'tuesday', 'a', '05:00PM', '01:00PM', '2024-03-13 22:18:53');

-- --------------------------------------------------------

--
-- Table structure for table `tb_business_blog`
--

DROP TABLE IF EXISTS `tb_business_blog`;
CREATE TABLE IF NOT EXISTS `tb_business_blog` (
  `bb_id` int(11) NOT NULL AUTO_INCREMENT,
  `bb_ub_id` int(11) NOT NULL,
  `bb_blog_title` longtext,
  `bb_blog_description` longtext,
  `bb_blog_image` varchar(100) DEFAULT NULL,
  `bb_added_on` varchar(50) NOT NULL,
  PRIMARY KEY (`bb_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_business_blog`
--

INSERT INTO `tb_business_blog` (`bb_id`, `bb_ub_id`, `bb_blog_title`, `bb_blog_description`, `bb_blog_image`, `bb_added_on`) VALUES
(1, 1, 'blog title', 'blog description', 'business_blog_1.png', '2024-03-15 07:45:17'),
(2, 1, 'blog title', 'blog description', 'business_blog_2.png', '2024-03-15 07:45:46');

-- --------------------------------------------------------

--
-- Table structure for table `tb_business_certicate`
--

DROP TABLE IF EXISTS `tb_business_certicate`;
CREATE TABLE IF NOT EXISTS `tb_business_certicate` (
  `bce_id` int(11) NOT NULL AUTO_INCREMENT,
  `bce_ub_id` int(11) NOT NULL,
  `bce_name` varchar(200) NOT NULL,
  `bce_image` varchar(100) NOT NULL,
  `bce_added_on` varchar(50) NOT NULL,
  PRIMARY KEY (`bce_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_business_certicate`
--

INSERT INTO `tb_business_certicate` (`bce_id`, `bce_ub_id`, `bce_name`, `bce_image`, `bce_added_on`) VALUES
(1, 1, 'certificate name', 'business_certificate1.png', '2024-03-14 22:38:28'),
(2, 1, 'certificate name', 'business_certificate2.png', '2024-03-14 22:38:45');

-- --------------------------------------------------------

--
-- Table structure for table `tb_business_details`
--

DROP TABLE IF EXISTS `tb_business_details`;
CREATE TABLE IF NOT EXISTS `tb_business_details` (
  `bd_id` int(11) NOT NULL AUTO_INCREMENT,
  `bd_user_id` int(11) NOT NULL,
  `bd_business_name` varchar(5000) NOT NULL,
  `bd_business_id` varchar(50) NOT NULL,
  `bd_url` varchar(1000) DEFAULT NULL,
  `bd_city` int(11) NOT NULL,
  `bd_category` int(11) NOT NULL,
  `bd_meta_title` varchar(1000) DEFAULT NULL,
  `bd_meta_keywords` varchar(5000) DEFAULT NULL,
  `bd_meta_description` text,
  `bd_added_date` varchar(50) NOT NULL,
  `bd_status` enum('a','d') NOT NULL DEFAULT 'a',
  PRIMARY KEY (`bd_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_business_details`
--

INSERT INTO `tb_business_details` (`bd_id`, `bd_user_id`, `bd_business_name`, `bd_business_id`, `bd_url`, `bd_city`, `bd_category`, `bd_meta_title`, `bd_meta_keywords`, `bd_meta_description`, `bd_added_date`, `bd_status`) VALUES
(1, 1, 'radheshyam updated', 'BI1BN31', 'https://hailey.com/', 3, 1, 'cloth title', 'cloth Keywords', 'buisnessname\r\nbest top 10 food shop in city, hardware in patna, printer in patna, keyword in patna, monitors in patna, Meta Keywords, Meta Description', '2024-02-26 17:26:57', 'a'),
(2, 1, 'radheshyam', 'BI2BN31', 'https://hailey.com/', 3, 1, 'cloth title', 'cloth Keywords', 'buisnessname\r\nbest top 10 food shop in city, hardware in patna, printer in patna, keyword in patna, monitors in patna, Meta Keywords, Meta Description', '2024-02-26 17:28:26', 'a'),
(3, 1, 'shopeemart', 'BI3BN25', 'https://hailey.com/', 2, 5, 'best hardware', 'hardware meta keywords', 'hardware meta description', '2024-02-26 20:24:59', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `tb_business_enquiry`
--

DROP TABLE IF EXISTS `tb_business_enquiry`;
CREATE TABLE IF NOT EXISTS `tb_business_enquiry` (
  `be_id` int(11) NOT NULL AUTO_INCREMENT,
  `be_ub_id` int(11) NOT NULL,
  `be_customer_name` varchar(100) NOT NULL,
  `be_phone_number` varchar(20) DEFAULT NULL,
  `be_email` varchar(100) DEFAULT NULL,
  `be_added_on` varchar(50) NOT NULL,
  PRIMARY KEY (`be_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_business_feedback`
--

DROP TABLE IF EXISTS `tb_business_feedback`;
CREATE TABLE IF NOT EXISTS `tb_business_feedback` (
  `bf_id` int(11) NOT NULL AUTO_INCREMENT,
  `bf_ub_id` int(11) NOT NULL,
  `bf_customer_name` varchar(100) NOT NULL,
  `bf_feedback` varchar(1000) NOT NULL,
  `bf_added_on` varchar(50) NOT NULL,
  PRIMARY KEY (`bf_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_business_gallery`
--

DROP TABLE IF EXISTS `tb_business_gallery`;
CREATE TABLE IF NOT EXISTS `tb_business_gallery` (
  `bg_id` int(11) NOT NULL AUTO_INCREMENT,
  `bg_ub_id` int(11) NOT NULL,
  `bg_image` varchar(500) DEFAULT NULL,
  `bg_product_type` varchar(200) NOT NULL,
  `bg_product_url` varchar(500) NOT NULL,
  `bg_added_on` varchar(50) NOT NULL,
  PRIMARY KEY (`bg_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_business_gallery`
--

INSERT INTO `tb_business_gallery` (`bg_id`, `bg_ub_id`, `bg_image`, `bg_product_type`, `bg_product_url`, `bg_added_on`) VALUES
(1, 1, 'business_gallery1.jpg', 'product type', 'gallery url', '2024-03-19 22:02:37'),
(2, 1, 'business_gallery2.jpg', 'product type', 'gallery url', '2024-03-19 22:04:39');

-- --------------------------------------------------------

--
-- Table structure for table `tb_business_hours`
--

DROP TABLE IF EXISTS `tb_business_hours`;
CREATE TABLE IF NOT EXISTS `tb_business_hours` (
  `bh_id` int(11) NOT NULL AUTO_INCREMENT,
  `bh_ub_id` int(11) NOT NULL,
  `bh_day` varchar(20) NOT NULL,
  `bh_active` enum('a','d') NOT NULL,
  `bh_start_time` varchar(20) NOT NULL,
  `bh_end_time` varchar(20) NOT NULL,
  `bh_added_on` varchar(50) NOT NULL,
  PRIMARY KEY (`bh_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_business_hours`
--

INSERT INTO `tb_business_hours` (`bh_id`, `bh_ub_id`, `bh_day`, `bh_active`, `bh_start_time`, `bh_end_time`, `bh_added_on`) VALUES
(1, 1, 'monday', 'a', '03:00AM', '04:00AM', '2024-03-13 21:44:52'),
(2, 1, 'tuesday', 'a', '03:00AM', '05:00AM', '2024-03-13 21:44:52'),
(4, 1, 'tuesday', 'a', '03:00AM', '05:00AM', '2024-03-13 21:50:27'),
(3, 1, 'monday', 'a', '03:00AM', '04:00AM', '2024-03-13 21:50:27');

-- --------------------------------------------------------

--
-- Table structure for table `tb_business_offers`
--

DROP TABLE IF EXISTS `tb_business_offers`;
CREATE TABLE IF NOT EXISTS `tb_business_offers` (
  `bo_id` int(11) NOT NULL AUTO_INCREMENT,
  `bo_ub_id` int(11) NOT NULL,
  `bo_offers` varchar(300) NOT NULL,
  `bo_added_on` varchar(50) NOT NULL,
  PRIMARY KEY (`bo_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_business_payment`
--

DROP TABLE IF EXISTS `tb_business_payment`;
CREATE TABLE IF NOT EXISTS `tb_business_payment` (
  `bpa_id` int(11) NOT NULL AUTO_INCREMENT,
  `bpa_ub_id` int(11) NOT NULL,
  `bpa_method_name` varchar(200) NOT NULL,
  `bpa_method_image` varchar(100) NOT NULL,
  `bpa_added_on` varchar(50) NOT NULL,
  PRIMARY KEY (`bpa_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_business_payment`
--

INSERT INTO `tb_business_payment` (`bpa_id`, `bpa_ub_id`, `bpa_method_name`, `bpa_method_image`, `bpa_added_on`) VALUES
(1, 1, 'bpa_method_name', 'business_payment_1.png', '2024-03-14 22:50:57'),
(2, 1, 'paytm', 'business_payment_2.png', '2024-03-14 22:55:56');

-- --------------------------------------------------------

--
-- Table structure for table `tb_business_product`
--

DROP TABLE IF EXISTS `tb_business_product`;
CREATE TABLE IF NOT EXISTS `tb_business_product` (
  `bp_id` int(11) NOT NULL AUTO_INCREMENT,
  `bp_ub_id` int(11) NOT NULL,
  `bp_image` varchar(500) DEFAULT NULL,
  `bp_name` varchar(500) DEFAULT NULL,
  `bp_url` varchar(500) DEFAULT NULL,
  `bp_price` varchar(100) DEFAULT NULL,
  `bp_added_on` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`bp_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_business_product`
--

INSERT INTO `tb_business_product` (`bp_id`, `bp_ub_id`, `bp_image`, `bp_name`, `bp_url`, `bp_price`, `bp_added_on`) VALUES
(1, 1, 'business_product1.jpg', 'name', 'url', '898989', '2024-03-13 17:51:25'),
(2, 1, 'business_product2.jpg', 'name', 'url', '898989', '2024-03-15 07:53:00'),
(3, 1, 'business_product3.jpg', 'product', 'product url', 'product price', '2024-03-19 22:29:20');

-- --------------------------------------------------------

--
-- Table structure for table `tb_business_services`
--

DROP TABLE IF EXISTS `tb_business_services`;
CREATE TABLE IF NOT EXISTS `tb_business_services` (
  `bs_id` int(11) NOT NULL AUTO_INCREMENT,
  `bs_ub_id` int(11) NOT NULL,
  `bs_service_name` varchar(200) NOT NULL,
  `bs_image` varchar(500) DEFAULT NULL,
  `bs_service_url` varchar(200) NOT NULL,
  `bs_added_on` varchar(50) NOT NULL,
  PRIMARY KEY (`bs_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_business_services`
--

INSERT INTO `tb_business_services` (`bs_id`, `bs_ub_id`, `bs_service_name`, `bs_image`, `bs_service_url`, `bs_added_on`) VALUES
(1, 1, 'service name', 'business_service1.jpg', 'service url', '2024-03-19 21:52:35'),
(2, 1, 'service name', 'business_service2.jpg', 'service url', '2024-03-19 22:05:20');

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

DROP TABLE IF EXISTS `tb_category`;
CREATE TABLE IF NOT EXISTS `tb_category` (
  `ca_id` int(11) NOT NULL AUTO_INCREMENT,
  `ca_bd_url` varchar(5000) NOT NULL,
  `ca_name` varchar(50) NOT NULL,
  `ca_meta_title` varchar(5000) NOT NULL,
  `ca_meta_keywords` varchar(5000) NOT NULL,
  `ca_meta_description` text NOT NULL,
  `ca_added_date` varchar(50) DEFAULT NULL,
  `ca_active` enum('a','d') NOT NULL DEFAULT 'a',
  PRIMARY KEY (`ca_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`ca_id`, `ca_bd_url`, `ca_name`, `ca_meta_title`, `ca_meta_keywords`, `ca_meta_description`, `ca_added_date`, `ca_active`) VALUES
(1, 'https://hailey.com/', 'cloth', 'cloth meta title', 'cloth meta keyword', 'cloth meta description', NULL, 'a'),
(2, 'https://hailey.com/', 'mens cloth', 'mens cloth meta title', 'mens cloth meta keyword', 'mens cloth meta description', NULL, 'a'),
(3, 'https://hailey.com/', 'womens cloth', 'womes cloth meta title', 'womens cloth meta keywords', 'womens cloth meta description', NULL, 'a'),
(4, 'https://hailey.com/', 'kids cloth', 'kids cloth meta title', 'kids cloth meta keywords', 'kids cloth meta description', NULL, 'a'),
(5, 'https://hailey.com/', 'hardware', 'hardware meta title', 'hardware meta keywords', 'hardware meta description', NULL, 'a'),
(6, 'https://hailey.com/', 'printer', 'printer meta title', 'printer meta keywords', 'printer meta description', NULL, 'a'),
(7, 'https://hailey.com/', 'keyboard', 'keyboard meta title', 'keyword meta keywords', 'keyboard meta description', NULL, 'a'),
(8, 'https://hailey.com/', 'mouse', 'mouse meta title', 'mouse meta keywords', 'mouse meta description', NULL, 'a'),
(9, 'https://hailey.com/', 'monitors', 'monitors meta title', 'monitors meta keywords', 'monitors meta description', NULL, 'a');

-- --------------------------------------------------------

--
-- Table structure for table `tb_cities`
--

DROP TABLE IF EXISTS `tb_cities`;
CREATE TABLE IF NOT EXISTS `tb_cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(255) NOT NULL,
  `state_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `state_id` (`state_id`)
) ENGINE=InnoDB AUTO_INCREMENT=604 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_cities`
--

INSERT INTO `tb_cities` (`id`, `city`, `state_id`) VALUES
(1, 'North and Middle Andaman', 32),
(2, 'South Andaman', 32),
(3, 'Nicobar', 32),
(4, 'Adilabad', 1),
(5, 'Anantapur', 1),
(6, 'Chittoor', 1),
(7, 'East Godavari', 1),
(8, 'Guntur', 1),
(9, 'Hyderabad', 1),
(10, 'Kadapa', 1),
(11, 'Karimnagar', 1),
(12, 'Khammam', 1),
(13, 'Krishna', 1),
(14, 'Kurnool', 1),
(15, 'Mahbubnagar', 1),
(16, 'Medak', 1),
(17, 'Nalgonda', 1),
(18, 'Nellore', 1),
(19, 'Nizamabad', 1),
(20, 'Prakasam', 1),
(21, 'Rangareddi', 1),
(22, 'Srikakulam', 1),
(23, 'Vishakhapatnam', 1),
(24, 'Vizianagaram', 1),
(25, 'Warangal', 1),
(26, 'West Godavari', 1),
(27, 'Anjaw', 3),
(28, 'Changlang', 3),
(29, 'East Kameng', 3),
(30, 'Lohit', 3),
(31, 'Lower Subansiri', 3),
(32, 'Papum Pare', 3),
(33, 'Tirap', 3),
(34, 'Dibang Valley', 3),
(35, 'Upper Subansiri', 3),
(36, 'West Kameng', 3),
(37, 'Barpeta', 2),
(38, 'Bongaigaon', 2),
(39, 'Cachar', 2),
(40, 'Darrang', 2),
(41, 'Dhemaji', 2),
(42, 'Dhubri', 2),
(43, 'Dibrugarh', 2),
(44, 'Goalpara', 2),
(45, 'Golaghat', 2),
(46, 'Hailakandi', 2),
(47, 'Jorhat', 2),
(48, 'Karbi Anglong', 2),
(49, 'Karimganj', 2),
(50, 'Kokrajhar', 2),
(51, 'Lakhimpur', 2),
(52, 'Marigaon', 2),
(53, 'Nagaon', 2),
(54, 'Nalbari', 2),
(55, 'North Cachar Hills', 2),
(56, 'Sibsagar', 2),
(57, 'Sonitpur', 2),
(58, 'Tinsukia', 2),
(59, 'Araria', 4),
(60, 'Aurangabad', 4),
(61, 'Banka', 4),
(62, 'Begusarai', 4),
(63, 'Bhagalpur', 4),
(64, 'Bhojpur', 4),
(65, 'Buxar', 4),
(66, 'Darbhanga', 4),
(67, 'Purba Champaran', 4),
(68, 'Gaya', 4),
(69, 'Gopalganj', 4),
(70, 'Jamui', 4),
(71, 'Jehanabad', 4),
(72, 'Khagaria', 4),
(73, 'Kishanganj', 4),
(74, 'Kaimur', 4),
(75, 'Katihar', 4),
(76, 'Lakhisarai', 4),
(77, 'Madhubani', 4),
(78, 'Munger', 4),
(79, 'Madhepura', 4),
(80, 'Muzaffarpur', 4),
(81, 'Nalanda', 4),
(82, 'Nawada', 4),
(83, 'Patna', 4),
(84, 'Purnia', 4),
(85, 'Rohtas', 4),
(86, 'Saharsa', 4),
(87, 'Samastipur', 4),
(88, 'Sheohar', 4),
(89, 'Sheikhpura', 4),
(90, 'Saran', 4),
(91, 'Sitamarhi', 4),
(92, 'Supaul', 4),
(93, 'Siwan', 4),
(94, 'Vaishali', 4),
(95, 'Pashchim Champaran', 4),
(96, 'Bastar', 36),
(97, 'Bilaspur', 36),
(98, 'Dantewada', 36),
(99, 'Dhamtari', 36),
(100, 'Durg', 36),
(101, 'Jashpur', 36),
(102, 'Janjgir-Champa', 36),
(103, 'Korba', 36),
(104, 'Koriya', 36),
(105, 'Kanker', 36),
(106, 'Kawardha', 36),
(107, 'Mahasamund', 36),
(108, 'Raigarh', 36),
(109, 'Rajnandgaon', 36),
(110, 'Raipur', 36),
(111, 'Surguja', 36),
(112, 'Diu', 29),
(113, 'Daman', 29),
(114, 'Central Delhi', 25),
(115, 'East Delhi', 25),
(116, 'New Delhi', 25),
(117, 'North Delhi', 25),
(118, 'North East Delhi', 25),
(119, 'North West Delhi', 25),
(120, 'South Delhi', 25),
(121, 'South West Delhi', 25),
(122, 'West Delhi', 25),
(123, 'North Goa', 26),
(124, 'South Goa', 26),
(125, 'Ahmedabad', 5),
(126, 'Amreli District', 5),
(127, 'Anand', 5),
(128, 'Banaskantha', 5),
(129, 'Bharuch', 5),
(130, 'Bhavnagar', 5),
(131, 'Dahod', 5),
(132, 'The Dangs', 5),
(133, 'Gandhinagar', 5),
(134, 'Jamnagar', 5),
(135, 'Junagadh', 5),
(136, 'Kutch', 5),
(137, 'Kheda', 5),
(138, 'Mehsana', 5),
(139, 'Narmada', 5),
(140, 'Navsari', 5),
(141, 'Patan', 5),
(142, 'Panchmahal', 5),
(143, 'Porbandar', 5),
(144, 'Rajkot', 5),
(145, 'Sabarkantha', 5),
(146, 'Surendranagar', 5),
(147, 'Surat', 5),
(148, 'Vadodara', 5),
(149, 'Valsad', 5),
(150, 'Ambala', 6),
(151, 'Bhiwani', 6),
(152, 'Faridabad', 6),
(153, 'Fatehabad', 6),
(154, 'Gurgaon', 6),
(155, 'Hissar', 6),
(156, 'Jhajjar', 6),
(157, 'Jind', 6),
(158, 'Karnal', 6),
(159, 'Kaithal', 6),
(160, 'Kurukshetra', 6),
(161, 'Mahendragarh', 6),
(162, 'Mewat', 6),
(163, 'Panchkula', 6),
(164, 'Panipat', 6),
(165, 'Rewari', 6),
(166, 'Rohtak', 6),
(167, 'Sirsa', 6),
(168, 'Sonepat', 6),
(169, 'Yamuna Nagar', 6),
(170, 'Palwal', 6),
(171, 'Bilaspur', 7),
(172, 'Chamba', 7),
(173, 'Hamirpur', 7),
(174, 'Kangra', 7),
(175, 'Kinnaur', 7),
(176, 'Kulu', 7),
(177, 'Lahaul and Spiti', 7),
(178, 'Mandi', 7),
(179, 'Shimla', 7),
(180, 'Sirmaur', 7),
(181, 'Solan', 7),
(182, 'Una', 7),
(183, 'Anantnag', 8),
(184, 'Badgam', 8),
(185, 'Bandipore', 8),
(186, 'Baramula', 8),
(187, 'Doda', 8),
(188, 'Jammu', 8),
(189, 'Kargil', 8),
(190, 'Kathua', 8),
(191, 'Kupwara', 8),
(192, 'Leh', 8),
(193, 'Poonch', 8),
(194, 'Pulwama', 8),
(195, 'Rajauri', 8),
(196, 'Srinagar', 8),
(197, 'Samba', 8),
(198, 'Udhampur', 8),
(199, 'Bokaro', 34),
(200, 'Chatra', 34),
(201, 'Deoghar', 34),
(202, 'Dhanbad', 34),
(203, 'Dumka', 34),
(204, 'Purba Singhbhum', 34),
(205, 'Garhwa', 34),
(206, 'Giridih', 34),
(207, 'Godda', 34),
(208, 'Gumla', 34),
(209, 'Hazaribagh', 34),
(210, 'Koderma', 34),
(211, 'Lohardaga', 34),
(212, 'Pakur', 34),
(213, 'Palamu', 34),
(214, 'Ranchi', 34),
(215, 'Sahibganj', 34),
(216, 'Seraikela and Kharsawan', 34),
(217, 'Pashchim Singhbhum', 34),
(218, 'Ramgarh', 34),
(219, 'Bidar', 9),
(220, 'Belgaum', 9),
(221, 'Bijapur', 9),
(222, 'Bagalkot', 9),
(223, 'Bellary', 9),
(224, 'Bangalore Rural District', 9),
(225, 'Bangalore Urban District', 9),
(226, 'Chamarajnagar', 9),
(227, 'Chikmagalur', 9),
(228, 'Chitradurga', 9),
(229, 'Davanagere', 9),
(230, 'Dharwad', 9),
(231, 'Dakshina Kannada', 9),
(232, 'Gadag', 9),
(233, 'Gulbarga', 9),
(234, 'Hassan', 9),
(235, 'Haveri District', 9),
(236, 'Kodagu', 9),
(237, 'Kolar', 9),
(238, 'Koppal', 9),
(239, 'Mandya', 9),
(240, 'Mysore', 9),
(241, 'Raichur', 9),
(242, 'Shimoga', 9),
(243, 'Tumkur', 9),
(244, 'Udupi', 9),
(245, 'Uttara Kannada', 9),
(246, 'Ramanagara', 9),
(247, 'Chikballapur', 9),
(248, 'Yadagiri', 9),
(249, 'Alappuzha', 10),
(250, 'Ernakulam', 10),
(251, 'Idukki', 10),
(252, 'Kollam', 10),
(253, 'Kannur', 10),
(254, 'Kasaragod', 10),
(255, 'Kottayam', 10),
(256, 'Kozhikode', 10),
(257, 'Malappuram', 10),
(258, 'Palakkad', 10),
(259, 'Pathanamthitta', 10),
(260, 'Thrissur', 10),
(261, 'Thiruvananthapuram', 10),
(262, 'Wayanad', 10),
(263, 'Alirajpur', 11),
(264, 'Anuppur', 11),
(265, 'Ashok Nagar', 11),
(266, 'Balaghat', 11),
(267, 'Barwani', 11),
(268, 'Betul', 11),
(269, 'Bhind', 11),
(270, 'Bhopal', 11),
(271, 'Burhanpur', 11),
(272, 'Chhatarpur', 11),
(273, 'Chhindwara', 11),
(274, 'Damoh', 11),
(275, 'Datia', 11),
(276, 'Dewas', 11),
(277, 'Dhar', 11),
(278, 'Dindori', 11),
(279, 'Guna', 11),
(280, 'Gwalior', 11),
(281, 'Harda', 11),
(282, 'Hoshangabad', 11),
(283, 'Indore', 11),
(284, 'Jabalpur', 11),
(285, 'Jhabua', 11),
(286, 'Katni', 11),
(287, 'Khandwa', 11),
(288, 'Khargone', 11),
(289, 'Mandla', 11),
(290, 'Mandsaur', 11),
(291, 'Morena', 11),
(292, 'Narsinghpur', 11),
(293, 'Neemuch', 11),
(294, 'Panna', 11),
(295, 'Rewa', 11),
(296, 'Rajgarh', 11),
(297, 'Ratlam', 11),
(298, 'Raisen', 11),
(299, 'Sagar', 11),
(300, 'Satna', 11),
(301, 'Sehore', 11),
(302, 'Seoni', 11),
(303, 'Shahdol', 11),
(304, 'Shajapur', 11),
(305, 'Sheopur', 11),
(306, 'Shivpuri', 11),
(307, 'Sidhi', 11),
(308, 'Singrauli', 11),
(309, 'Tikamgarh', 11),
(310, 'Ujjain', 11),
(311, 'Umaria', 11),
(312, 'Vidisha', 11),
(313, 'Ahmednagar', 12),
(314, 'Akola', 12),
(315, 'Amrawati', 12),
(316, 'Aurangabad', 12),
(317, 'Bhandara', 12),
(318, 'Beed', 12),
(319, 'Buldhana', 12),
(320, 'Chandrapur', 12),
(321, 'Dhule', 12),
(322, 'Gadchiroli', 12),
(323, 'Gondiya', 12),
(324, 'Hingoli', 12),
(325, 'Jalgaon', 12),
(326, 'Jalna', 12),
(327, 'Kolhapur', 12),
(328, 'Latur', 12),
(329, 'Mumbai City', 12),
(330, 'Mumbai suburban', 12),
(331, 'Nandurbar', 12),
(332, 'Nanded', 12),
(333, 'Nagpur', 12),
(334, 'Nashik', 12),
(335, 'Osmanabad', 12),
(336, 'Parbhani', 12),
(337, 'Pune', 12),
(338, 'Raigad', 12),
(339, 'Ratnagiri', 12),
(340, 'Sindhudurg', 12),
(341, 'Sangli', 12),
(342, 'Solapur', 12),
(343, 'Satara', 12),
(344, 'Thane', 12),
(345, 'Wardha', 12),
(346, 'Washim', 12),
(347, 'Yavatmal', 12),
(348, 'Bishnupur', 13),
(349, 'Churachandpur', 13),
(350, 'Chandel', 13),
(351, 'Imphal East', 13),
(352, 'Senapati', 13),
(353, 'Tamenglong', 13),
(354, 'Thoubal', 13),
(355, 'Ukhrul', 13),
(356, 'Imphal West', 13),
(357, 'East Garo Hills', 14),
(358, 'East Khasi Hills', 14),
(359, 'Jaintia Hills', 14),
(360, 'Ri-Bhoi', 14),
(361, 'South Garo Hills', 14),
(362, 'West Garo Hills', 14),
(363, 'West Khasi Hills', 14),
(364, 'Aizawl', 15),
(365, 'Champhai', 15),
(366, 'Kolasib', 15),
(367, 'Lawngtlai', 15),
(368, 'Lunglei', 15),
(369, 'Mamit', 15),
(370, 'Saiha', 15),
(371, 'Serchhip', 15),
(372, 'Dimapur', 16),
(373, 'Kohima', 16),
(374, 'Mokokchung', 16),
(375, 'Mon', 16),
(376, 'Phek', 16),
(377, 'Tuensang', 16),
(378, 'Wokha', 16),
(379, 'Zunheboto', 16),
(380, 'Angul', 17),
(381, 'Boudh', 17),
(382, 'Bhadrak', 17),
(383, 'Bolangir', 17),
(384, 'Bargarh', 17),
(385, 'Baleswar', 17),
(386, 'Cuttack', 17),
(387, 'Debagarh', 17),
(388, 'Dhenkanal', 17),
(389, 'Ganjam', 17),
(390, 'Gajapati', 17),
(391, 'Jharsuguda', 17),
(392, 'Jajapur', 17),
(393, 'Jagatsinghpur', 17),
(394, 'Khordha', 17),
(395, 'Kendujhar', 17),
(396, 'Kalahandi', 17),
(397, 'Kandhamal', 17),
(398, 'Koraput', 17),
(399, 'Kendrapara', 17),
(400, 'Malkangiri', 17),
(401, 'Mayurbhanj', 17),
(402, 'Nabarangpur', 17),
(403, 'Nuapada', 17),
(404, 'Nayagarh', 17),
(405, 'Puri', 17),
(406, 'Rayagada', 17),
(407, 'Sambalpur', 17),
(408, 'Subarnapur', 17),
(409, 'Sundargarh', 17),
(410, 'Karaikal', 27),
(411, 'Mahe', 27),
(412, 'Puducherry', 27),
(413, 'Yanam', 27),
(414, 'Amritsar', 18),
(415, 'Bathinda', 18),
(416, 'Firozpur', 18),
(417, 'Faridkot', 18),
(418, 'Fatehgarh Sahib', 18),
(419, 'Gurdaspur', 18),
(420, 'Hoshiarpur', 18),
(421, 'Jalandhar', 18),
(422, 'Kapurthala', 18),
(423, 'Ludhiana', 18),
(424, 'Mansa', 18),
(425, 'Moga', 18),
(426, 'Mukatsar', 18),
(427, 'Nawan Shehar', 18),
(428, 'Patiala', 18),
(429, 'Rupnagar', 18),
(430, 'Sangrur', 18),
(431, 'Ajmer', 19),
(432, 'Alwar', 19),
(433, 'Bikaner', 19),
(434, 'Barmer', 19),
(435, 'Banswara', 19),
(436, 'Bharatpur', 19),
(437, 'Baran', 19),
(438, 'Bundi', 19),
(439, 'Bhilwara', 19),
(440, 'Churu', 19),
(441, 'Chittorgarh', 19),
(442, 'Dausa', 19),
(443, 'Dholpur', 19),
(444, 'Dungapur', 19),
(445, 'Ganganagar', 19),
(446, 'Hanumangarh', 19),
(447, 'Juhnjhunun', 19),
(448, 'Jalore', 19),
(449, 'Jodhpur', 19),
(450, 'Jaipur', 19),
(451, 'Jaisalmer', 19),
(452, 'Jhalawar', 19),
(453, 'Karauli', 19),
(454, 'Kota', 19),
(455, 'Nagaur', 19),
(456, 'Pali', 19),
(457, 'Pratapgarh', 19),
(458, 'Rajsamand', 19),
(459, 'Sikar', 19),
(460, 'Sawai Madhopur', 19),
(461, 'Sirohi', 19),
(462, 'Tonk', 19),
(463, 'Udaipur', 19),
(464, 'East Sikkim', 20),
(465, 'North Sikkim', 20),
(466, 'South Sikkim', 20),
(467, 'West Sikkim', 20),
(468, 'Ariyalur', 21),
(469, 'Chennai', 21),
(470, 'Coimbatore', 21),
(471, 'Cuddalore', 21),
(472, 'Dharmapuri', 21),
(473, 'Dindigul', 21),
(474, 'Erode', 21),
(475, 'Kanchipuram', 21),
(476, 'Kanyakumari', 21),
(477, 'Karur', 21),
(478, 'Madurai', 21),
(479, 'Nagapattinam', 21),
(480, 'The Nilgiris', 21),
(481, 'Namakkal', 21),
(482, 'Perambalur', 21),
(483, 'Pudukkottai', 21),
(484, 'Ramanathapuram', 21),
(485, 'Salem', 21),
(486, 'Sivagangai', 21),
(487, 'Tiruppur', 21),
(488, 'Tiruchirappalli', 21),
(489, 'Theni', 21),
(490, 'Tirunelveli', 21),
(491, 'Thanjavur', 21),
(492, 'Thoothukudi', 21),
(493, 'Thiruvallur', 21),
(494, 'Thiruvarur', 21),
(495, 'Tiruvannamalai', 21),
(496, 'Vellore', 21),
(497, 'Villupuram', 21),
(498, 'Dhalai', 22),
(499, 'North Tripura', 22),
(500, 'South Tripura', 22),
(501, 'West Tripura', 22),
(502, 'Almora', 33),
(503, 'Bageshwar', 33),
(504, 'Chamoli', 33),
(505, 'Champawat', 33),
(506, 'Dehradun', 33),
(507, 'Haridwar', 33),
(508, 'Nainital', 33),
(509, 'Pauri Garhwal', 33),
(510, 'Pithoragharh', 33),
(511, 'Rudraprayag', 33),
(512, 'Tehri Garhwal', 33),
(513, 'Udham Singh Nagar', 33),
(514, 'Uttarkashi', 33),
(515, 'Agra', 23),
(516, 'Allahabad', 23),
(517, 'Aligarh', 23),
(518, 'Ambedkar Nagar', 23),
(519, 'Auraiya', 23),
(520, 'Azamgarh', 23),
(521, 'Barabanki', 23),
(522, 'Badaun', 23),
(523, 'Bagpat', 23),
(524, 'Bahraich', 23),
(525, 'Bijnor', 23),
(526, 'Ballia', 23),
(527, 'Banda', 23),
(528, 'Balrampur', 23),
(529, 'Bareilly', 23),
(530, 'Basti', 23),
(531, 'Bulandshahr', 23),
(532, 'Chandauli', 23),
(533, 'Chitrakoot', 23),
(534, 'Deoria', 23),
(535, 'Etah', 23),
(536, 'Kanshiram Nagar', 23),
(537, 'Etawah', 23),
(538, 'Firozabad', 23),
(539, 'Farrukhabad', 23),
(540, 'Fatehpur', 23),
(541, 'Faizabad', 23),
(542, 'Gautam Buddha Nagar', 23),
(543, 'Gonda', 23),
(544, 'Ghazipur', 23),
(545, 'Gorkakhpur', 23),
(546, 'Ghaziabad', 23),
(547, 'Hamirpur', 23),
(548, 'Hardoi', 23),
(549, 'Mahamaya Nagar', 23),
(550, 'Jhansi', 23),
(551, 'Jalaun', 23),
(552, 'Jyotiba Phule Nagar', 23),
(553, 'Jaunpur District', 23),
(554, 'Kanpur Dehat', 23),
(555, 'Kannauj', 23),
(556, 'Kanpur Nagar', 23),
(557, 'Kaushambi', 23),
(558, 'Kushinagar', 23),
(559, 'Lalitpur', 23),
(560, 'Lakhimpur Kheri', 23),
(561, 'Lucknow', 23),
(562, 'Mau', 23),
(563, 'Meerut', 23),
(564, 'Maharajganj', 23),
(565, 'Mahoba', 23),
(566, 'Mirzapur', 23),
(567, 'Moradabad', 23),
(568, 'Mainpuri', 23),
(569, 'Mathura', 23),
(570, 'Muzaffarnagar', 23),
(571, 'Pilibhit', 23),
(572, 'Pratapgarh', 23),
(573, 'Rampur', 23),
(574, 'Rae Bareli', 23),
(575, 'Saharanpur', 23),
(576, 'Sitapur', 23),
(577, 'Shahjahanpur', 23),
(578, 'Sant Kabir Nagar', 23),
(579, 'Siddharthnagar', 23),
(580, 'Sonbhadra', 23),
(581, 'Sant Ravidas Nagar', 23),
(582, 'Sultanpur', 23),
(583, 'Shravasti', 23),
(584, 'Unnao', 23),
(585, 'Varanasi', 23),
(586, 'Birbhum', 24),
(587, 'Bankura', 24),
(588, 'Bardhaman', 24),
(589, 'Darjeeling', 24),
(590, 'Dakshin Dinajpur', 24),
(591, 'Hooghly', 24),
(592, 'Howrah', 24),
(593, 'Jalpaiguri', 24),
(594, 'Cooch Behar', 24),
(595, 'Kolkata', 24),
(596, 'Malda', 24),
(597, 'Midnapore', 24),
(598, 'Murshidabad', 24),
(599, 'Nadia', 24),
(600, 'North 24 Parganas', 24),
(601, 'South 24 Parganas', 24),
(602, 'Purulia', 24),
(603, 'Uttar Dinajpur', 24);

-- --------------------------------------------------------

--
-- Table structure for table `tb_countries`
--

DROP TABLE IF EXISTS `tb_countries`;
CREATE TABLE IF NOT EXISTS `tb_countries` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `countryCode` char(2) NOT NULL DEFAULT '',
  `name` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=251 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_countries`
--

INSERT INTO `tb_countries` (`id`, `countryCode`, `name`) VALUES
(1, 'AD', 'Andorra'),
(2, 'AE', 'United Arab Emirates'),
(3, 'AF', 'Afghanistan'),
(4, 'AG', 'Antigua and Barbuda'),
(5, 'AI', 'Anguilla'),
(6, 'AL', 'Albania'),
(7, 'AM', 'Armenia'),
(8, 'AO', 'Angola'),
(9, 'AQ', 'Antarctica'),
(10, 'AR', 'Argentina'),
(11, 'AS', 'American Samoa'),
(12, 'AT', 'Austria'),
(13, 'AU', 'Australia'),
(14, 'AW', 'Aruba'),
(15, 'AX', 'Åland'),
(16, 'AZ', 'Azerbaijan'),
(17, 'BA', 'Bosnia and Herzegovina'),
(18, 'BB', 'Barbados'),
(19, 'BD', 'Bangladesh'),
(20, 'BE', 'Belgium'),
(21, 'BF', 'Burkina Faso'),
(22, 'BG', 'Bulgaria'),
(23, 'BH', 'Bahrain'),
(24, 'BI', 'Burundi'),
(25, 'BJ', 'Benin'),
(26, 'BL', 'Saint Barthélemy'),
(27, 'BM', 'Bermuda'),
(28, 'BN', 'Brunei'),
(29, 'BO', 'Bolivia'),
(30, 'BQ', 'Bonaire'),
(31, 'BR', 'Brazil'),
(32, 'BS', 'Bahamas'),
(33, 'BT', 'Bhutan'),
(34, 'BV', 'Bouvet Island'),
(35, 'BW', 'Botswana'),
(36, 'BY', 'Belarus'),
(37, 'BZ', 'Belize'),
(38, 'CA', 'Canada'),
(39, 'CC', 'Cocos [Keeling] Islands'),
(40, 'CD', 'Democratic Republic of the Congo'),
(41, 'CF', 'Central African Republic'),
(42, 'CG', 'Republic of the Congo'),
(43, 'CH', 'Switzerland'),
(44, 'CI', 'Ivory Coast'),
(45, 'CK', 'Cook Islands'),
(46, 'CL', 'Chile'),
(47, 'CM', 'Cameroon'),
(48, 'CN', 'China'),
(49, 'CO', 'Colombia'),
(50, 'CR', 'Costa Rica'),
(51, 'CU', 'Cuba'),
(52, 'CV', 'Cape Verde'),
(53, 'CW', 'Curacao'),
(54, 'CX', 'Christmas Island'),
(55, 'CY', 'Cyprus'),
(56, 'CZ', 'Czech Republic'),
(57, 'DE', 'Germany'),
(58, 'DJ', 'Djibouti'),
(59, 'DK', 'Denmark'),
(60, 'DM', 'Dominica'),
(61, 'DO', 'Dominican Republic'),
(62, 'DZ', 'Algeria'),
(63, 'EC', 'Ecuador'),
(64, 'EE', 'Estonia'),
(65, 'EG', 'Egypt'),
(66, 'EH', 'Western Sahara'),
(67, 'ER', 'Eritrea'),
(68, 'ES', 'Spain'),
(69, 'ET', 'Ethiopia'),
(70, 'FI', 'Finland'),
(71, 'FJ', 'Fiji'),
(72, 'FK', 'Falkland Islands'),
(73, 'FM', 'Micronesia'),
(74, 'FO', 'Faroe Islands'),
(75, 'FR', 'France'),
(76, 'GA', 'Gabon'),
(77, 'GB', 'United Kingdom'),
(78, 'GD', 'Grenada'),
(79, 'GE', 'Georgia'),
(80, 'GF', 'French Guiana'),
(81, 'GG', 'Guernsey'),
(82, 'GH', 'Ghana'),
(83, 'GI', 'Gibraltar'),
(84, 'GL', 'Greenland'),
(85, 'GM', 'Gambia'),
(86, 'GN', 'Guinea'),
(87, 'GP', 'Guadeloupe'),
(88, 'GQ', 'Equatorial Guinea'),
(89, 'GR', 'Greece'),
(90, 'GS', 'South Georgia and the South Sandwich Islands'),
(91, 'GT', 'Guatemala'),
(92, 'GU', 'Guam'),
(93, 'GW', 'Guinea-Bissau'),
(94, 'GY', 'Guyana'),
(95, 'HK', 'Hong Kong'),
(96, 'HM', 'Heard Island and McDonald Islands'),
(97, 'HN', 'Honduras'),
(98, 'HR', 'Croatia'),
(99, 'HT', 'Haiti'),
(100, 'HU', 'Hungary'),
(101, 'ID', 'Indonesia'),
(102, 'IE', 'Ireland'),
(103, 'IL', 'Israel'),
(104, 'IM', 'Isle of Man'),
(105, 'IN', 'India'),
(106, 'IO', 'British Indian Ocean Territory'),
(107, 'IQ', 'Iraq'),
(108, 'IR', 'Iran'),
(109, 'IS', 'Iceland'),
(110, 'IT', 'Italy'),
(111, 'JE', 'Jersey'),
(112, 'JM', 'Jamaica'),
(113, 'JO', 'Jordan'),
(114, 'JP', 'Japan'),
(115, 'KE', 'Kenya'),
(116, 'KG', 'Kyrgyzstan'),
(117, 'KH', 'Cambodia'),
(118, 'KI', 'Kiribati'),
(119, 'KM', 'Comoros'),
(120, 'KN', 'Saint Kitts and Nevis'),
(121, 'KP', 'North Korea'),
(122, 'KR', 'South Korea'),
(123, 'KW', 'Kuwait'),
(124, 'KY', 'Cayman Islands'),
(125, 'KZ', 'Kazakhstan'),
(126, 'LA', 'Laos'),
(127, 'LB', 'Lebanon'),
(128, 'LC', 'Saint Lucia'),
(129, 'LI', 'Liechtenstein'),
(130, 'LK', 'Sri Lanka'),
(131, 'LR', 'Liberia'),
(132, 'LS', 'Lesotho'),
(133, 'LT', 'Lithuania'),
(134, 'LU', 'Luxembourg'),
(135, 'LV', 'Latvia'),
(136, 'LY', 'Libya'),
(137, 'MA', 'Morocco'),
(138, 'MC', 'Monaco'),
(139, 'MD', 'Moldova'),
(140, 'ME', 'Montenegro'),
(141, 'MF', 'Saint Martin'),
(142, 'MG', 'Madagascar'),
(143, 'MH', 'Marshall Islands'),
(144, 'MK', 'Macedonia'),
(145, 'ML', 'Mali'),
(146, 'MM', 'Myanmar [Burma]'),
(147, 'MN', 'Mongolia'),
(148, 'MO', 'Macao'),
(149, 'MP', 'Northern Mariana Islands'),
(150, 'MQ', 'Martinique'),
(151, 'MR', 'Mauritania'),
(152, 'MS', 'Montserrat'),
(153, 'MT', 'Malta'),
(154, 'MU', 'Mauritius'),
(155, 'MV', 'Maldives'),
(156, 'MW', 'Malawi'),
(157, 'MX', 'Mexico'),
(158, 'MY', 'Malaysia'),
(159, 'MZ', 'Mozambique'),
(160, 'NA', 'Namibia'),
(161, 'NC', 'New Caledonia'),
(162, 'NE', 'Niger'),
(163, 'NF', 'Norfolk Island'),
(164, 'NG', 'Nigeria'),
(165, 'NI', 'Nicaragua'),
(166, 'NL', 'Netherlands'),
(167, 'NO', 'Norway'),
(168, 'NP', 'Nepal'),
(169, 'NR', 'Nauru'),
(170, 'NU', 'Niue'),
(171, 'NZ', 'New Zealand'),
(172, 'OM', 'Oman'),
(173, 'PA', 'Panama'),
(174, 'PE', 'Peru'),
(175, 'PF', 'French Polynesia'),
(176, 'PG', 'Papua New Guinea'),
(177, 'PH', 'Philippines'),
(178, 'PK', 'Pakistan'),
(179, 'PL', 'Poland'),
(180, 'PM', 'Saint Pierre and Miquelon'),
(181, 'PN', 'Pitcairn Islands'),
(182, 'PR', 'Puerto Rico'),
(183, 'PS', 'Palestine'),
(184, 'PT', 'Portugal'),
(185, 'PW', 'Palau'),
(186, 'PY', 'Paraguay'),
(187, 'QA', 'Qatar'),
(188, 'RE', 'Réunion'),
(189, 'RO', 'Romania'),
(190, 'RS', 'Serbia'),
(191, 'RU', 'Russia'),
(192, 'RW', 'Rwanda'),
(193, 'SA', 'Saudi Arabia'),
(194, 'SB', 'Solomon Islands'),
(195, 'SC', 'Seychelles'),
(196, 'SD', 'Sudan'),
(197, 'SE', 'Sweden'),
(198, 'SG', 'Singapore'),
(199, 'SH', 'Saint Helena'),
(200, 'SI', 'Slovenia'),
(201, 'SJ', 'Svalbard and Jan Mayen'),
(202, 'SK', 'Slovakia'),
(203, 'SL', 'Sierra Leone'),
(204, 'SM', 'San Marino'),
(205, 'SN', 'Senegal'),
(206, 'SO', 'Somalia'),
(207, 'SR', 'Suriname'),
(208, 'SS', 'South Sudan'),
(209, 'ST', 'São Tomé and Príncipe'),
(210, 'SV', 'El Salvador'),
(211, 'SX', 'Sint Maarten'),
(212, 'SY', 'Syria'),
(213, 'SZ', 'Swaziland'),
(214, 'TC', 'Turks and Caicos Islands'),
(215, 'TD', 'Chad'),
(216, 'TF', 'French Southern Territories'),
(217, 'TG', 'Togo'),
(218, 'TH', 'Thailand'),
(219, 'TJ', 'Tajikistan'),
(220, 'TK', 'Tokelau'),
(221, 'TL', 'East Timor'),
(222, 'TM', 'Turkmenistan'),
(223, 'TN', 'Tunisia'),
(224, 'TO', 'Tonga'),
(225, 'TR', 'Turkey'),
(226, 'TT', 'Trinidad and Tobago'),
(227, 'TV', 'Tuvalu'),
(228, 'TW', 'Taiwan'),
(229, 'TZ', 'Tanzania'),
(230, 'UA', 'Ukraine'),
(231, 'UG', 'Uganda'),
(232, 'UM', 'U.S. Minor Outlying Islands'),
(233, 'US', 'United States'),
(234, 'UY', 'Uruguay'),
(235, 'UZ', 'Uzbekistan'),
(236, 'VA', 'Vatican City'),
(237, 'VC', 'Saint Vincent and the Grenadines'),
(238, 'VE', 'Venezuela'),
(239, 'VG', 'British Virgin Islands'),
(240, 'VI', 'U.S. Virgin Islands'),
(241, 'VN', 'Vietnam'),
(242, 'VU', 'Vanuatu'),
(243, 'WF', 'Wallis and Futuna'),
(244, 'WS', 'Samoa'),
(245, 'XK', 'Kosovo'),
(246, 'YE', 'Yemen'),
(247, 'YT', 'Mayotte'),
(248, 'ZA', 'South Africa'),
(249, 'ZM', 'Zambia'),
(250, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `tb_states`
--

DROP TABLE IF EXISTS `tb_states`;
CREATE TABLE IF NOT EXISTS `tb_states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `country_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_states`
--

INSERT INTO `tb_states` (`id`, `name`, `country_id`) VALUES
(1, 'ANDHRA PRADESH', 105),
(2, 'ASSAM', 105),
(3, 'ARUNACHAL PRADESH', 105),
(4, 'BIHAR', 105),
(5, 'GUJRAT', 105),
(6, 'HARYANA', 105),
(7, 'HIMACHAL PRADESH', 105),
(8, 'JAMMU & KASHMIR', 105),
(9, 'KARNATAKA', 105),
(10, 'KERALA', 105),
(11, 'MADHYA PRADESH', 105),
(12, 'MAHARASHTRA', 105),
(13, 'MANIPUR', 105),
(14, 'MEGHALAYA', 105),
(15, 'MIZORAM', 105),
(16, 'NAGALAND', 105),
(17, 'ORISSA', 105),
(18, 'PUNJAB', 105),
(19, 'RAJASTHAN', 105),
(20, 'SIKKIM', 105),
(21, 'TAMIL NADU', 105),
(22, 'TRIPURA', 105),
(23, 'UTTAR PRADESH', 105),
(24, 'WEST BENGAL', 105),
(25, 'DELHI', 105),
(26, 'GOA', 105),
(27, 'PONDICHERY', 105),
(28, 'LAKSHDWEEP', 105),
(29, 'DAMAN & DIU', 105),
(30, 'DADRA & NAGAR', 105),
(31, 'CHANDIGARH', 105),
(32, 'ANDAMAN & NICOBAR', 105),
(33, 'UTTARANCHAL', 105),
(34, 'JHARKHAND', 105),
(35, 'CHATTISGARH', 105);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE IF NOT EXISTS `tb_user` (
  `us_id` int(11) NOT NULL AUTO_INCREMENT,
  `us_profile_photo` varchar(500) DEFAULT NULL,
  `us_first_name` varchar(100) NOT NULL,
  `us_last_name` varchar(100) DEFAULT NULL,
  `us_email` varchar(200) NOT NULL,
  `us_organisation` varchar(100) DEFAULT NULL,
  `us_phone_number` varchar(20) NOT NULL,
  `us_address` varchar(1000) NOT NULL,
  `us_state` varchar(50) DEFAULT NULL,
  `us_zipcode` varchar(50) DEFAULT NULL,
  `us_country` varchar(50) DEFAULT NULL,
  `us_language` varchar(50) DEFAULT NULL,
  `us_timezone` varchar(50) DEFAULT NULL,
  `us_currency` varchar(10) DEFAULT NULL,
  `us_password` varchar(1000) DEFAULT NULL,
  `us_template_id` int(11) DEFAULT NULL,
  `us_active` enum('a','d') DEFAULT NULL,
  `us_added_date` varchar(50) DEFAULT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`us_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`us_id`, `us_profile_photo`, `us_first_name`, `us_last_name`, `us_email`, `us_organisation`, `us_phone_number`, `us_address`, `us_state`, `us_zipcode`, `us_country`, `us_language`, `us_timezone`, `us_currency`, `us_password`, `us_template_id`, `us_active`, `us_added_date`, `type`) VALUES
(1, 'us_profile1.jpg', 'admin', 'admin', 'admin@gmail.com', 'organisation', '9898989898', 'address', 'state', '878787', 'country', 'language', 'timezone', 'currency', '6a8eabb9447e2fd817035c282e2275d4fa21f91409dd4726eb071d35e645418192feb3b5f0c60ff836345481bcf3739e3c728e91bd97aa191f92c148be4becae', NULL, 'a', '2024-03-11 12:00:39', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_business`
--

DROP TABLE IF EXISTS `tb_user_business`;
CREATE TABLE IF NOT EXISTS `tb_user_business` (
  `ub_id` int(11) NOT NULL AUTO_INCREMENT,
  `ub_us_id` int(11) NOT NULL,
  `ub_website_url` varchar(1000) DEFAULT NULL,
  `ub_business_name` varchar(500) DEFAULT NULL,
  `ub_logo` varchar(1000) DEFAULT NULL,
  `ub_cover_image` varchar(1000) DEFAULT NULL,
  `ub_business_id` varchar(100) DEFAULT NULL,
  `ub_description` varchar(5000) DEFAULT NULL,
  `ub_first_name` varchar(100) DEFAULT NULL,
  `ub_last_name` varchar(100) DEFAULT NULL,
  `ub_whatsapp_number` varchar(20) DEFAULT NULL,
  `ub_alternate_number` varchar(20) DEFAULT NULL,
  `ub_email` varchar(100) DEFAULT NULL,
  `ub_address` varchar(1000) DEFAULT NULL,
  `ub_zipcode` varchar(100) DEFAULT NULL,
  `ub_alternate_email` varchar(100) DEFAULT NULL,
  `ub_state` varchar(100) DEFAULT NULL,
  `ub_language` varchar(500) DEFAULT NULL,
  `ub_google_map_url` varchar(500) DEFAULT NULL,
  `ub_district` varchar(500) DEFAULT NULL,
  `ub_business_segment` varchar(500) DEFAULT NULL,
  `ub_active` enum('a','d') DEFAULT NULL,
  `ub_added_on` varchar(100) DEFAULT NULL,
  `ub_flipkart_url` varchar(500) DEFAULT NULL,
  `ub_facebook_url` varchar(500) DEFAULT NULL,
  `ub_amazon_url` varchar(500) DEFAULT NULL,
  `ub_instagram_url` varchar(500) DEFAULT NULL,
  `ub_ebay_url` varchar(500) DEFAULT NULL,
  `ub_whatsapp_url` varchar(500) DEFAULT NULL,
  `ub_india_mart_url` varchar(500) DEFAULT NULL,
  `ub_youtube_url` varchar(500) DEFAULT NULL,
  `ub_big_basket_url` varchar(500) DEFAULT NULL,
  `ub_x_url` varchar(500) DEFAULT NULL,
  `ub_zomato_url` varchar(500) DEFAULT NULL,
  `ub_linkedin_url` varchar(500) DEFAULT NULL,
  `ub_swiggy_url` varchar(500) DEFAULT NULL,
  `ub_pan_number` varchar(10) DEFAULT NULL,
  `ub_gst_number` varchar(15) DEFAULT NULL,
  `ub_website_title` longtext,
  `ub_home_title` longtext,
  `ub_meta_keyword` longtext,
  `ub_meta_description` longtext,
  `ub_google_analytics` longtext,
  `ub_privacy_policy` longtext,
  `ub_terms_condition` longtext,
  PRIMARY KEY (`ub_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user_business`
--

INSERT INTO `tb_user_business` (`ub_id`, `ub_us_id`, `ub_website_url`, `ub_business_name`, `ub_logo`, `ub_cover_image`, `ub_business_id`, `ub_description`, `ub_first_name`, `ub_last_name`, `ub_whatsapp_number`, `ub_alternate_number`, `ub_email`, `ub_address`, `ub_zipcode`, `ub_alternate_email`, `ub_state`, `ub_language`, `ub_google_map_url`, `ub_district`, `ub_business_segment`, `ub_active`, `ub_added_on`, `ub_flipkart_url`, `ub_facebook_url`, `ub_amazon_url`, `ub_instagram_url`, `ub_ebay_url`, `ub_whatsapp_url`, `ub_india_mart_url`, `ub_youtube_url`, `ub_big_basket_url`, `ub_x_url`, `ub_zomato_url`, `ub_linkedin_url`, `ub_swiggy_url`, `ub_pan_number`, `ub_gst_number`, `ub_website_title`, `ub_home_title`, `ub_meta_keyword`, `ub_meta_description`, `ub_google_analytics`, `ub_privacy_policy`, `ub_terms_condition`) VALUES
(1, 1, 'Website', 'business name 1', '', '', NULL, 'business description', 'name', 'last', '987987987', '8979879879', 'email@email.com', 'address', '898989', 'email@mail.com', 'state', 'language', 'google map url', 'district', 'segment', 'a', '2024-03-15 17:06:06', 'Flipkart', 'Facebook', 'Amazon', 'Instagram', 'Ebay', 'Whatsapp', 'India Mart', 'Youtube', 'Big Basket', 'xurl', 'Zomato', 'Linked', 'Swiggy', 'gjhgjhgjgj', '876876876868687', 'site title', 'home title', 'meta keywords', 'meta description', 'google analytics', '&lt;p&gt;We at Wasai LLC respect the privacy of your personal information and, as such, make every effort to ensure your information is protected and remains private. As the owner and operator of loremipsum.io (the &amp;quot;Website&amp;quot;) hereafter referred to in this Privacy Policy as &amp;quot;Lorem Ipsum&amp;quot;, &amp;quot;us&amp;quot;, &amp;quot;our&amp;quot; or &amp;quot;we&amp;quot;, we have provided this Privacy Policy to explain how we collect, use, share and protect information about the users of our Website (hereafter referred to as &amp;ldquo;user&amp;rdquo;, &amp;ldquo;you&amp;rdquo; or &amp;quot;your&amp;quot;). For the purposes of this Agreement, any use of the terms &amp;quot;Lorem Ipsum&amp;quot;, &amp;quot;us&amp;quot;, &amp;quot;our&amp;quot; or &amp;quot;we&amp;quot; includes Wasai LLC, without limitation. We will not use or share your personal information with anyone except as described in this Privacy Policy.&lt;/p&gt;\r\n\r\n&lt;p&gt;This Privacy Policy will inform you about the types of personal data we collect, the purposes for which we use the data, the ways in which the data is handled and your rights with regard to your personal data. Furthermore, this Privacy Policy is intended to satisfy the obligation of transparency under the EU General Data Protection Regulation 2016/679 (&amp;quot;GDPR&amp;quot;) and the laws implementing GDPR.&lt;/p&gt;\r\n\r\n&lt;p&gt;For the purpose of this Privacy Policy the Data Controller of personal data is Wasai LLC and our contact details are set out in the Contact section at the end of this Privacy Policy. Data Controller means the natural or legal person who (either alone or jointly or in common with other persons) determines the purposes for which and the manner in which any personal information are, or are to be, processed.&lt;/p&gt;\r\n\r\n&lt;p&gt;For purposes of this Privacy Policy, &amp;quot;Your Information&amp;quot; or &amp;quot;Personal Data&amp;quot; means information about you, which may be of a confidential or sensitive nature and may include personally identifiable information (&amp;quot;PII&amp;quot;) and/or financial information. PII means individually identifiable information that would allow us to determine the actual identity of a specific living person, while sensitive data may include information, comments, content and other information that you voluntarily provide.&lt;/p&gt;\r\n\r\n&lt;p&gt;Lorem Ipsum collects information about you when you use our Website to access our services, and other online products and services (collectively, the &amp;ldquo;Services&amp;rdquo;) and through other interactions and communications you have with us. The term Services includes, collectively, various applications, websites, widgets, email notifications and other mediums, or portions of such mediums, through which you have accessed this Privacy Policy.&lt;/p&gt;\r\n\r\n&lt;p&gt;We may change this Privacy Policy from time to time. If we decide to change this Privacy Policy, we will inform you by posting the revised Privacy Policy on the Site. Those changes will go into effect on the &amp;quot;Last updated&amp;quot; date shown at the end of this Privacy Policy. By continuing to use the Site or Services, you consent to the revised Privacy Policy. We encourage you to periodically review the Privacy Policy for the latest information on our privacy practices.&lt;/p&gt;\r\n\r\n&lt;p&gt;BY ACCESSING OR USING OUR SERVICES, YOU CONSENT TO THE COLLECTION, TRANSFER, MANIPULATION, STORAGE, DISCLOSURE AND OTHER USES OF YOUR INFORMATION (COLLECTIVELY, &amp;quot;USE OF YOUR INFORMATION&amp;quot;) AS DESCRIBED IN THIS PRIVACY POLICY. IF YOU DO NOT AGREE WITH OR CONSENT TO THIS PRIVACY POLICY YOU MAY NOT ACCESS OR USE OUR SERVICES.&lt;/p&gt;\r\n\r\n&lt;ol&gt;\r\n	&lt;li&gt;\r\n	&lt;h2&gt;CHILDREN&amp;#39;S PRIVACY&lt;/h2&gt;\r\n\r\n	&lt;p&gt;Lorem Ipsum does not knowingly collect personally identifiable information (PII) from persons under the age of 13. If you are under the age of 13, please do not provide us with information of any kind whatsoever. If you have reason to believe that we may have accidentally received information from a child under the age of 13, please contact us immediately at&amp;nbsp;&lt;a href=&quot;mailto:legal@wasai.co&quot;&gt;legal@wasai.co&lt;/a&gt;. If we become aware that we have inadvertently received Personal Information from a person under the age of 13, we will delete such information from our records.&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;h2&gt;INFORMATION PROVIDED DIRECTLY BY YOU&lt;/h2&gt;\r\n\r\n	&lt;p&gt;We collect information you provide directly to us, such as when you request information, create or modify your personal account, request Services, subscribe to our Services, complete a Lorem Ipsum form, survey, quiz or application, contact customer support, join or enroll for an event or otherwise communicate with us in any manner. This information may include, without limitation: name, date of birth, e-mail address, physical address, business address, phone number, or any other personal information you choose to provide.&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;h2&gt;INFORMATION COLLECTED THROUGH YOUR USE OF OUR SERVICES&lt;/h2&gt;\r\n\r\n	&lt;p&gt;The following are situations in which you may provide Your Information to us:&lt;/p&gt;\r\n\r\n	&lt;ol&gt;\r\n		&lt;li&gt;\r\n		&lt;p&gt;When you fill out forms or fields through our Services;&lt;/p&gt;\r\n		&lt;/li&gt;\r\n		&lt;li&gt;\r\n		&lt;p&gt;When you register for an account with our Service;&lt;/p&gt;\r\n		&lt;/li&gt;\r\n		&lt;li&gt;\r\n		&lt;p&gt;When you create a subscription for our newsletter or Services;&lt;/p&gt;\r\n		&lt;/li&gt;\r\n		&lt;li&gt;\r\n		&lt;p&gt;When you provide responses to a survey;&lt;/p&gt;\r\n		&lt;/li&gt;\r\n		&lt;li&gt;\r\n		&lt;p&gt;When you answer questions on a quiz;&lt;/p&gt;\r\n		&lt;/li&gt;\r\n		&lt;li&gt;\r\n		&lt;p&gt;When you join or enroll in an event through our Services;&lt;/p&gt;\r\n		&lt;/li&gt;\r\n		&lt;li&gt;\r\n		&lt;p&gt;When you order services or products from, or through our Service;&lt;/p&gt;\r\n		&lt;/li&gt;\r\n		&lt;li&gt;\r\n		&lt;p&gt;When you provide information to us through a third-party application, service or Website;&lt;/p&gt;\r\n		&lt;/li&gt;\r\n		&lt;li&gt;\r\n		&lt;p&gt;When you communicate with us or request information about us or our products or Services, whether via email or other means; and&lt;/p&gt;\r\n		&lt;/li&gt;\r\n		&lt;li&gt;\r\n		&lt;p&gt;When you participate in any of our marketing initiatives, including, contests, events, or promotions.&lt;/p&gt;\r\n		&lt;/li&gt;\r\n	&lt;/ol&gt;\r\n\r\n	&lt;p&gt;We also automatically collect information via the Website through the use of various technologies, including, but not limited to Cookies and Web Beacons (explained below). We may collect your IP address, browsing behavior and device IDs. This information is used by us in order to enable us to better understand how our Services are being used by visitors and allows us to administer and customize the Services to improve your overall experience.&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;h2&gt;INFORMATION COLLECTED FROM OTHER SOURCES&lt;/h2&gt;\r\n\r\n	&lt;p&gt;We may also receive information from other sources and combine that with information we collect through our Services. For example if you choose to link, create, or log in to your Lorem Ipsum account with a social media service, e.g. LinkedIn, Facebook or Twitter, or if you engage with a separate App or Website that uses our API, or whose API we use, we may receive information about you or your connections from that Site or App. This includes, without limitation, profile information, profile picture, gender, user name, user ID associated with your social media account, age range, language, country, friends list, and any other information you permit the social network to share with third parties. The data we receive is solely dependent upon your privacy settings with the social network.&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;h2&gt;INFORMATION THIRD PARTIES PROVIDE&lt;/h2&gt;\r\n\r\n	&lt;p&gt;We may collect information about you from sources other than you, such as from social media websites (i.e., Facebook, LinkedIn, Twitter or others), blogs, analytics providers, business affiliates and partners and other users. This includes, without limitation, identity data, contact data, marketing and communications data, behavioral data, technical data and content data.&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;h2&gt;AGGREGATED DATA&lt;/h2&gt;\r\n\r\n	&lt;p&gt;We may collect, use and share Aggregated Data such as statistical or demographic data for any purpose. Aggregated Data is de-identified or anonymized and does not constitute Personal Data for the purposes of the GDPR as this data does not directly or indirectly reveal your identity. If we ever combine Aggregated Data with your Personal Data so that it can directly or indirectly identify you, we treat the combined data as PII which will only be used in accordance with this Privacy Policy.&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;h2&gt;COOKIES, LOG FILES AND ANONYMOUS IDENTIFIERS&lt;/h2&gt;\r\n\r\n	&lt;ol&gt;\r\n		&lt;li&gt;\r\n		&lt;p&gt;When you visit our Services, we may send one or more Cookies &amp;ndash; small data files &amp;ndash; to your computer to uniquely identify your browser and let us help you log in faster and enhance your navigation through the Sites. &amp;ldquo;Cookies&amp;rdquo; are text-only pieces of information that a website transfers to an individual&amp;rsquo;s hard drive or other website browsing equipment for record keeping purposes. A Cookie may convey anonymous information about how you browse the Services to us so we can provide you with a more personalized experience, but does not collect personal information about you. Cookies allow the Sites to remember important information that will make your use of the site more convenient. A Cookie will typically contain the name of the domain from which the Cookie has come, the &amp;ldquo;lifetime&amp;rdquo; of the Cookie, and a randomly generated unique number or other value. Certain Cookies may be used on the Sites regardless of whether you are logged in to your account or not.&lt;/p&gt;\r\n		&lt;/li&gt;\r\n		&lt;li&gt;\r\n		&lt;p&gt;Session Cookies are temporary Cookies that remain in the Cookie file of your browser until you leave the Site.&lt;/p&gt;\r\n		&lt;/li&gt;\r\n		&lt;li&gt;\r\n		&lt;p&gt;Persistent Cookies remain in the Cookie file of your browser for much longer (though how long will depend on the lifetime of the specific Cookie).&lt;/p&gt;\r\n		&lt;/li&gt;\r\n		&lt;li&gt;\r\n		&lt;p&gt;When we use session Cookies to track the total number of visitors to our Site, this is done on an anonymous aggregate basis (as Cookies do not in themselves carry any personal data).&lt;/p&gt;\r\n		&lt;/li&gt;\r\n		&lt;li&gt;\r\n		&lt;p&gt;We may also employ Cookies so that we remember your computer when it is used to return to the Site to help customize your Lorem Ipsum web experience. We may associate personal information with a Cookie file in those instances.&lt;/p&gt;\r\n		&lt;/li&gt;\r\n		&lt;li&gt;\r\n		&lt;p&gt;We use Cookies to help us know that you are logged on, provide you with features based on your preferences, understand when you are interacting with our Services, and compile other information regarding use of our Services.&lt;/p&gt;\r\n		&lt;/li&gt;\r\n		&lt;li&gt;\r\n		&lt;p&gt;Third parties with whom we partner to provide certain features on our Site or to display advertising based upon your Web browsing activity use Cookies to collect and store information.&lt;/p&gt;\r\n		&lt;/li&gt;\r\n		&lt;li&gt;\r\n		&lt;p&gt;Our Website may use remarketing services, to serve ads on our behalf across the internet on third party websites to previous visitors to our Sites. It could mean that we advertise to previous visitors who haven&amp;rsquo;t completed a task on our site. This could be in the form of an advertisement on the Google search results page or a site in the Google Display Network. Third-party vendors, including Google, use Cookies to serve ads based on your past visits to our Website. Any data collected will be used in accordance with our own privacy policy, as well as Google&amp;#39;s privacy policies. To learn more, or to opt-out of receiving advertisements tailored to your interests by our third parties, visit the Network Advertising Initiative at&amp;nbsp;&lt;a href=&quot;https://www.networkadvertising.org/choices&quot; target=&quot;_blank&quot;&gt;www.networkadvertising.org/choices&lt;/a&gt;.&lt;/p&gt;\r\n		&lt;/li&gt;\r\n		&lt;li&gt;\r\n		&lt;p&gt;Lorem Ipsum may use third-party services such as Google Analytics to help understand use of the Services. These services typically collect the information sent by your browser as part of a web page request, including Cookies and your IP address. They receive this information and their use of it is governed by their respective privacy policies. You may opt-out of Google Analytics for Display Advertisers including AdWords and opt-out of customized Google Display Network ads by visiting the Google Ads Preferences Manager here&amp;nbsp;. To provide website visitors more choice on how their data is collected by Google Analytics, Google has developed an Opt-out Browser add-on, which is available by visiting Google Analytics Opt-out Browser Add-on here&amp;nbsp;.&lt;/p&gt;\r\n		&lt;/li&gt;\r\n		&lt;li&gt;\r\n		&lt;p&gt;You can control the use of Cookies at the individual browser level. Use the options in your web browser if you do not wish to receive a Cookie or if you wish to set your browser to notify you when you receive a Cookie. You can easily delete and manage any Cookies that have been installed in the Cookie folder of your browser by following the instructions provided by your particular browser manufacturer. Consult the documentation that your particular browser manufacturer provides. You may also consult your mobile device documentation for information on how to disable Cookies on your mobile device. If you reject Cookies, you may still use our Website, but your ability to use some features or areas of our Service may be limited.&lt;/p&gt;\r\n		&lt;/li&gt;\r\n		&lt;li&gt;\r\n		&lt;p&gt;Lorem Ipsum cannot control the use of Cookies by third parties (or the resulting information), and use of third party Cookies is not covered by this policy.&lt;/p&gt;\r\n		&lt;/li&gt;\r\n		&lt;li&gt;\r\n		&lt;p&gt;We automatically collect information about how you interact with our Services, preferences expressed, and settings chosen and store it in Log Files. This information may include internet protocol (IP) addresses, browser type, internet service provider (ISP), referring/exit pages, operating system, date/time stamp, and/or clickstream data. We may combine this automatically collected log information with other information we collect about you. We do this to improve services we offer you, to improve marketing, analytics, or Website functionality, and to document your consent to receiving products, services or communications from us or our partners. If we link such information with personally identifiable information in a manner that identifies a particular individual, then we will treat all such information as PII for purposes of this Privacy Policy.&lt;/p&gt;\r\n		&lt;/li&gt;\r\n		&lt;li&gt;\r\n		&lt;p&gt;When you use our Services, we may employ Web Beacons (also known as clear GIFs or tracking pixels) to anonymously track online usage patterns. No Personally Identifiable Information from your account is collected using these Web Beacons.&lt;/p&gt;\r\n		&lt;/li&gt;\r\n	&lt;/ol&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;h2&gt;DEVICE INFORMATION&lt;/h2&gt;\r\n\r\n	&lt;p&gt;When you use our Services through your computer, mobile phone or other device, we may collect information regarding and related to your device, such as hardware models and IDs, device type, operating system version, the request type, the content of your request and basic usage information about your use of our Services, such as date and time. We may also collect and store information locally on your device using mechanisms such as browser web storage and application data caches.&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;h2&gt;LOCATION INFORMATION&lt;/h2&gt;\r\n\r\n	&lt;p&gt;When you use the Services we may collect your precise location data. We may also derive your approximate location from your IP address.&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;h2&gt;PROTECTIVE MEASURES WE USE&lt;/h2&gt;\r\n\r\n	&lt;p&gt;We protect your information using commercially reasonable technical and administrative security measures to reduce the risks of loss, misuse, unauthorized access, disclosure and alteration. Although we take measures to secure your information, we do not promise, and you should not expect, that your personal information, or searches, or other information will always remain secure. We cannot guarantee the security of our information storage, nor can we guarantee that the information you supply will not be intercepted while being transmitted to and from us over the Internet including, without limitation, email and text transmissions. In the event that any information under our control is compromised as a result of a breach of security, we will take reasonable steps to investigate the situation and where appropriate, notify those individuals whose information may have been compromised and take other steps, in accordance with any applicable laws and regulations.&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;h2&gt;THE LEGAL BASIS FOR COLLECTION AND PROCESSING OF YOUR PERSONAL INFORMATION&lt;/h2&gt;\r\n\r\n	&lt;p&gt;The legal basis upon which we rely for the collection and processing of your Personal Information under the GDPR are the following:&lt;/p&gt;\r\n\r\n	&lt;ol&gt;\r\n		&lt;li&gt;\r\n		&lt;p&gt;When signing up subscribing to use our Services, you have given us explicit consent allowing Lorem Ipsum to provide you with our Services and generally to process your information in accordance with this Privacy Policy; and to the transfer of your personal data to other jurisdictions including, without limitation, the United States;&lt;/p&gt;\r\n		&lt;/li&gt;\r\n		&lt;li&gt;\r\n		&lt;p&gt;It is necessary registering you as a user, managing your account and profile, and authenticating you when you log in.&lt;/p&gt;\r\n		&lt;/li&gt;\r\n		&lt;li&gt;\r\n		&lt;p&gt;It is necessary for our legitimate interests in the proper administration of our website and business; analyzing the use of the website and our Services; assuring the security of our website and Services; maintaining back-ups of our databases; and communicating with you;&lt;/p&gt;\r\n		&lt;/li&gt;\r\n		&lt;li&gt;\r\n		&lt;p&gt;To resolve technical issues you encounter, to respond to your requests for assistance, comments and questions, to analyze crash information, to repair and improve the Services and provide other customer support.&lt;/p&gt;\r\n		&lt;/li&gt;\r\n		&lt;li&gt;\r\n		&lt;p&gt;To send communications via email and within the Services, including, for example, responding to your comments, questions and requests, providing customer support, and sending you technical notices, product updates, security alerts, and administrative and account management related messages.&lt;/p&gt;\r\n		&lt;/li&gt;\r\n		&lt;li&gt;\r\n		&lt;p&gt;To send promotional communications that may be of specific interest to you.&lt;/p&gt;\r\n		&lt;/li&gt;\r\n		&lt;li&gt;\r\n		&lt;p&gt;It is necessary for our legitimate interests in the protection and assertion of our legal rights, and the legal rights of others, including you;&lt;/p&gt;\r\n		&lt;/li&gt;\r\n		&lt;li&gt;\r\n		&lt;p&gt;It is necessary for our compliance with certain legal provisions which may require us to process your personal data. By way of example, and without limitation, we may be required by law to disclose your personal data to law enforcement or a regulatory agency.&lt;/p&gt;\r\n		&lt;/li&gt;\r\n	&lt;/ol&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;h2&gt;HOW WE USE INFORMATION WE COLLECT&lt;/h2&gt;\r\n\r\n	&lt;p&gt;Our primary purpose in collecting, holding, using and disclosing your Information is for our legitimate business purposes and to provide you with a safe, smooth, efficient, and customized experience.&lt;/p&gt;\r\n\r\n	&lt;ol&gt;\r\n		&lt;li&gt;\r\n		&lt;p&gt;We will use this information in order to:&lt;/p&gt;\r\n\r\n		&lt;ol&gt;\r\n			&lt;li&gt;\r\n			&lt;p&gt;Provide users with our Services and customer support including, but not limited to, confirming emails related to our services, reminders, confirmations, requests for information and transactions.&lt;/p&gt;\r\n			&lt;/li&gt;\r\n			&lt;li&gt;\r\n			&lt;p&gt;Contact you and provide you with information.&lt;/p&gt;\r\n			&lt;/li&gt;\r\n			&lt;li&gt;\r\n			&lt;p&gt;Analyze, improve and manage our Services and operations.&lt;/p&gt;\r\n			&lt;/li&gt;\r\n			&lt;li&gt;\r\n			&lt;p&gt;Resolve problems and disputes, and engage in other legal and security matters.&lt;/p&gt;\r\n			&lt;/li&gt;\r\n			&lt;li&gt;\r\n			&lt;p&gt;Enforce any terms and conditions of any subscription for our Services.&lt;/p&gt;\r\n			&lt;/li&gt;\r\n		&lt;/ol&gt;\r\n		&lt;/li&gt;\r\n		&lt;li&gt;\r\n		&lt;p&gt;Additionally, we may use the information we collect about you to:&lt;/p&gt;\r\n\r\n		&lt;ol&gt;\r\n			&lt;li&gt;\r\n			&lt;p&gt;Send you communications we think will be of interest to you, including information about products, services, promotions, news, and events of Lorem Ipsum and other affiliated or sponsoring companies with whom we have established a relationship.&lt;/p&gt;\r\n			&lt;/li&gt;\r\n			&lt;li&gt;\r\n			&lt;p&gt;Display advertising, including advertising that is targeted to you or other users based on your location, interests, as well as your activities on our Services.&lt;/p&gt;\r\n			&lt;/li&gt;\r\n			&lt;li&gt;\r\n			&lt;p&gt;Verify your identity and prevent impersonation, spam or other unauthorized or illegal activity.&lt;/p&gt;\r\n			&lt;/li&gt;\r\n			&lt;li&gt;\r\n			&lt;p&gt;We may transfer the information described in this Privacy Policy to, and process and store it in, the United States and other countries, some of which may have less protective data protection laws than the region in which you reside. Where this is the case, we will take appropriate measures to protect your personal information in accordance with this Privacy Policy.&lt;/p&gt;\r\n			&lt;/li&gt;\r\n		&lt;/ol&gt;\r\n		&lt;/li&gt;\r\n	&lt;/ol&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;h2&gt;HOW WE SHARE INFORMATION WE COLLECT&lt;/h2&gt;\r\n\r\n	&lt;ol&gt;\r\n		&lt;li&gt;\r\n		&lt;p&gt;We may share the information we collect about you as described in this Privacy Policy or as described at the time of collection or sharing, including as follows:&lt;/p&gt;\r\n\r\n		&lt;ol&gt;\r\n			&lt;li&gt;\r\n			&lt;p&gt;With third party Service Providers to enable them to provide the Services you request;&lt;/p&gt;\r\n			&lt;/li&gt;\r\n			&lt;li&gt;\r\n			&lt;p&gt;With third parties with whom you choose to let us share information, for example other websites or apps that integrate with our API or Services, or those with an API or Service with which we integrate.&lt;/p&gt;\r\n			&lt;/li&gt;\r\n			&lt;li&gt;\r\n			&lt;p&gt;With Lorem Ipsum subsidiaries and affiliated entities that provide services or conduct data processing on our behalf, or for data verification, data centralization and/or logistics purposes;&lt;/p&gt;\r\n			&lt;/li&gt;\r\n			&lt;li&gt;\r\n			&lt;p&gt;With vendors, consultants, marketing partners, and other service providers who need access to such information to carry out work on our behalf;&lt;/p&gt;\r\n			&lt;/li&gt;\r\n			&lt;li&gt;\r\n			&lt;p&gt;In response to a request for information by a competent authority if we believe disclosure is in accordance with, or is otherwise required by, any applicable law, regulation, or legal process;&lt;/p&gt;\r\n			&lt;/li&gt;\r\n			&lt;li&gt;\r\n			&lt;p&gt;With law enforcement officials, government authorities, or other third parties if we believe your actions are inconsistent with our user agreements, Terms of Service, or policies, or to protect the rights, property, or safety of Lorem Ipsum or others;&lt;/p&gt;\r\n			&lt;/li&gt;\r\n			&lt;li&gt;\r\n			&lt;p&gt;In connection with, or during negotiations of, any merger, sale of company assets, consolidation or restructuring, financing, or acquisition of all or a portion of our business by or into another company;&lt;/p&gt;\r\n			&lt;/li&gt;\r\n			&lt;li&gt;\r\n			&lt;p&gt;If we otherwise notify you and you consent to the sharing; and&lt;/p&gt;\r\n			&lt;/li&gt;\r\n			&lt;li&gt;\r\n			&lt;p&gt;In an aggregated and/or de-identified form which cannot reasonably be used to identify you. We only use such data in the aggregate form and our analytical services do not record any personal information.&lt;/p&gt;\r\n			&lt;/li&gt;\r\n		&lt;/ol&gt;\r\n		&lt;/li&gt;\r\n		&lt;li&gt;\r\n		&lt;p&gt;We may disclose Your Information:&lt;/p&gt;\r\n\r\n		&lt;ol&gt;\r\n			&lt;li&gt;\r\n			&lt;p&gt;To any person who, in our reasonable judgment, is authorized to receive Your Information as your agent, including as a result of your business dealings with that person (for example, your attorney);&lt;/p&gt;\r\n			&lt;/li&gt;\r\n			&lt;li&gt;\r\n			&lt;p&gt;To our third-party vendors and service providers so that they may provide support for our internal and business operations, including handling of data processing, data verification, data storage, surveys, research, internal marketing, delivery of promotional, marketing and transaction materials, and our Services maintenance and security. These companies are authorized to use Your Information only as necessary to provide these services to us and are contractually obligated to keep Your Information confidential;&lt;/p&gt;\r\n			&lt;/li&gt;\r\n			&lt;li&gt;\r\n			&lt;p&gt;To third parties when you engage in certain activities through our Services that are sponsored by them, such as purchasing products or services offered by a third party, electing to receive information or communications from a third party, or electing to participate in contests, sweepstakes, games or other programs sponsored, in whole or in part, by a third party. When we disclose Your Information to these third parties, Your Information will become subject to the information use and sharing practices of the third party, and the third party will not be restricted by this Privacy Policy with respect to its use and further sharing of Your Information;&lt;/p&gt;\r\n			&lt;/li&gt;\r\n			&lt;li&gt;\r\n			&lt;p&gt;As required by law or ordered by a court, regulatory, or administrative agency;&lt;/p&gt;\r\n			&lt;/li&gt;\r\n			&lt;li&gt;\r\n			&lt;p&gt;As we deem necessary, in our sole discretion, if we believe that you are violating any applicable law, rule or regulation, or are otherwise interfering with another&amp;#39;s rights or property, including, without limitation, our rights or property;&lt;/p&gt;\r\n			&lt;/li&gt;\r\n			&lt;li&gt;\r\n			&lt;p&gt;To enforce this Privacy Policy, and any other applicable agreements and policies;&lt;/p&gt;\r\n			&lt;/li&gt;\r\n			&lt;li&gt;\r\n			&lt;p&gt;To enforce or protect our legal rights.&lt;/p&gt;\r\n			&lt;/li&gt;\r\n		&lt;/ol&gt;\r\n		&lt;/li&gt;\r\n	&lt;/ol&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;h2&gt;SHARING INFORMATION WITH LAW ENFORCEMENT&lt;/h2&gt;\r\n\r\n	&lt;ol&gt;\r\n		&lt;li&gt;\r\n		&lt;p&gt;Lorem Ipsum is committed to cooperating with law enforcement while respecting each individual&amp;rsquo;s right to privacy. If Lorem Ipsum receives a request for user account information from a government agency investigating criminal activity, we will review the request to be certain that it satisfies all legal requirements before releasing information to the requesting agency.&lt;/p&gt;\r\n		&lt;/li&gt;\r\n		&lt;li&gt;\r\n		&lt;p&gt;Furthermore, under 18 U.S.C. &amp;sect;&amp;sect; 2702(b)(8) and 2702(c)(4) (Voluntary Disclosure Of Customer Communications or Records), Lorem Ipsum may disclose user account information to law enforcement, without a subpoena, court order, or search warrant, in response to a valid emergency when we believe that doing so is necessary to prevent death or serious physical harm to someone. Lorem Ipsum will not release more information than it prudently believes is necessary to prevent harm in an emergency situation.&lt;/p&gt;\r\n		&lt;/li&gt;\r\n	&lt;/ol&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;h2&gt;SOCIAL MEDIA SHARING&lt;/h2&gt;\r\n\r\n	&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n	&lt;ol&gt;\r\n		&lt;li&gt;\r\n		&lt;p&gt;Our Services may now or in the future integrate with social sharing features and other related tools which let you share actions you take on our Services with other Apps, sites, or media, and vice versa. Your use of such features enables the sharing of information with your friends or the public, depending on the settings you establish with the social sharing service. Please refer to the privacy policies of those social sharing services for more information about how they handle the data you provide to or share through them.&lt;/p&gt;\r\n		&lt;/li&gt;\r\n		&lt;li&gt;\r\n		&lt;p&gt;Any information or content that you voluntarily disclose for posting publicly to a social sharing service becomes available to the public, as controlled by any applicable privacy settings that you set with the social sharing service. Once you have shared User Content or made it public, that User Content may be re-shared by others. If you remove information that you posted to the social sharing service, copies may still remain viewable in cached and archived pages, or if other users or third parties, using the social sharing service, have re-shared, copied or saved that User Content.&lt;/p&gt;\r\n		&lt;/li&gt;\r\n	&lt;/ol&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;h2&gt;ANALYTIC SERVICES PROVIDED BY OTHERS&lt;/h2&gt;\r\n\r\n	&lt;p&gt;We may allow others to provide audience measurement and analytics services for us, to serve advertisements on our behalf across the Internet, and to track and report on the performance of those advertisements. These entities may use Cookies, Web Beacons, software development kits (SDKs), and other technologies to identify your device when you visit our Site and use our Services, as well as when you visit other online sites and services.&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;h2&gt;LINKS TO THIRD-PARTY WEBSITES&lt;/h2&gt;\r\n\r\n	&lt;ol&gt;\r\n		&lt;li&gt;\r\n		&lt;p&gt;Our Services, as well as the email messages sent with respect to our Services, may contain links or access to websites operated by third parties that are beyond our control. Links or access to third parties from our Services are not an endorsement by us of such third parties, or their websites, applications, products, services, or practices. We are not responsible for the privacy policy, terms and conditions, practices or the content of such third parties. These third-parties may send their own Cookies to you and independently collect data.&lt;/p&gt;\r\n		&lt;/li&gt;\r\n		&lt;li&gt;\r\n		&lt;p&gt;If you visit or access a third-party Website, application or other property that is linked or accessed from our Services, we encourage you to read any privacy policies and terms and conditions of that third party before providing any personally identifiable information. If you have a question about the terms and conditions, privacy policy, practices or contents of a third party, please contact the third party directly.&lt;/p&gt;\r\n		&lt;/li&gt;\r\n	&lt;/ol&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;h2&gt;DO NOT TRACK SETTINGS&lt;/h2&gt;\r\n\r\n	&lt;p&gt;Some web browsers may give you the ability to enable a &amp;quot;do not track&amp;quot; feature that sends signals to the websites you visit, indicating that you do not want your online activities tracked. We do not respond to &amp;quot;do not track&amp;quot; signals at this time; if we do so in the future, we will describe how in this Privacy Policy.&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;h2&gt;ADVERTISERS&lt;/h2&gt;\r\n\r\n	&lt;p&gt;This Site is affiliated with Publisher First, Inc. dba Freestar (&amp;quot;Freestar&amp;quot;) for the purposes of placing certain advertising on the Site, and Freestar will collect and use certain data for advertising purposes. To learn more about Freestar&amp;rsquo;s data usage, click&amp;nbsp;&lt;a href=&quot;https://freestar.com/privacy-policy/&quot; target=&quot;_blank&quot;&gt;here&lt;/a&gt;.&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;h2&gt;INTERNATIONAL PRIVACY POLICIES&lt;/h2&gt;\r\n\r\n	&lt;p&gt;In order to provide our products and services to you, we may send and store your personal information outside of the country where you reside or are located, including to the United States. Accordingly, if you reside or are located outside of the United States, your personal information may be transferred outside of the country where you reside or are located, including countries that may not, or do not, provide the same level of protection for your personal information. We are committed to protecting the privacy and confidentiality of personal information when it is transferred. If you reside or are located within the European Economic Area and such transfers occur, we take appropriate steps to provide the same level of protection for the processing carried out in any such countries as you would have within the European Economic Area to the extent feasible under applicable law. By using and accessing our products and services, users who reside or are located in countries outside of the United States agree and consent to the transfer to and processing of personal information on servers located outside of the country where they reside, and assume the risk that the protection of such information may be different and may be less protective than those required under the laws of their residence or location.&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;h2&gt;ACCOUNT INFORMATION&lt;/h2&gt;\r\n\r\n	&lt;p&gt;You may correct your account information at any time by logging into your online account. If you wish to cancel your account, please email us at&amp;nbsp;&lt;a href=&quot;mailto:legal@wasai.co&quot;&gt;legal@wasai.co&lt;/a&gt;&amp;nbsp;Please note that in some cases we may retain certain information about you as required by law, or for legitimate business purposes to the extent permitted by law.&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;h2&gt;PROMOTIONAL INFORMATION OPT OUT&lt;/h2&gt;\r\n\r\n	&lt;p&gt;You may opt out of receiving our newsletters or any other promotional messages from us at any time by following the instructions in those messages sent to you and the link provided therein, or by contacting us at any time using the Contact Us information at the end of this Privacy Policy. If you opt out, we may still send you non-promotional communications, such as those about your account, about Services you have requested, or our ongoing business relations.&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;h2&gt;YOUR ACCESS AND RIGHTS TO YOUR PERSONAL INFORMATION&lt;/h2&gt;\r\n\r\n	&lt;p&gt;You have certain rights in relation to Personal Information we hold about you. You can exercise any of the following rights by contacting us using any of the methods in the Contact section below. We may need to request specific information from you to help us confirm your identity and ensure your right to access your Personal Data (or to exercise any of your other rights). This is a security measure to ensure that Personal Data is not disclosed to any person who has no right to receive it. We try to respond to all legitimate requests within one month. Occasionally it may take us longer than a month if your request is particularly complex or you have made a number of requests. In this case, we will notify you and keep you updated.&lt;/p&gt;\r\n\r\n	&lt;ol&gt;\r\n		&lt;li&gt;\r\n		&lt;p&gt;&lt;strong&gt;Right to Access Your Personal Data.&lt;/strong&gt;&amp;nbsp;You have the right to access information held about you for the purpose of viewing and in certain cases updating or deleting such information. Furthermore, if you prefer that Lorem Ipsum does not share certain information as described in this Privacy Policy, you can direct Lorem Ipsum not to share that information. We will comply with an individual&amp;rsquo;s requests regarding access, correction, sharing and/or deletion of the personal data we store in accordance with applicable law. To make changes to your account affecting your personal information contact us at the email address in our Contact section below. For any deletion, non-sharing or update request, we will make the changes as soon as practicable, however this information may stay in our backup files. If we cannot make the changes you want, we will let you know and explain why.&lt;/p&gt;\r\n		&lt;/li&gt;\r\n		&lt;li&gt;\r\n		&lt;p&gt;&lt;strong&gt;Right of Correction or Completion of Your Personal Data.&lt;/strong&gt;&amp;nbsp;If personal information we hold about you is not accurate, out of date or incomplete, you have a right to have the data corrected or completed. To make corrections to your account please contact us at the email address in our Contact section below.&lt;/p&gt;\r\n		&lt;/li&gt;\r\n		&lt;li&gt;\r\n		&lt;p&gt;&lt;strong&gt;Right of Erasure or Deletion of Your Personal Data.&lt;/strong&gt;&amp;nbsp;In certain circumstances, you have the right to request that personal information we hold about you is deleted. If we cannot delete the information you want, we will let you know and explain why. To request information deletion please contact us at the email address in our Contact section below.&lt;/p&gt;\r\n		&lt;/li&gt;\r\n		&lt;li&gt;\r\n		&lt;p&gt;&lt;strong&gt;Right to Object to or Restrict Processing of Your Personal Data.&lt;/strong&gt;&amp;nbsp;In certain circumstances, you have the right to object to our processing of your personal information. For example, you have the right to object to use of your personal information for direct marketing purposes. Similarly, you have the right to object to use of your personal information if we are processing your information on the basis of our legitimate interests and there are no compelling legitimate grounds for our processing which supersede your rights and interests. You may also have the right to restrict our use of your personal information, such as in circumstances where you have challenged the accuracy of the information and during the period where we are verifying its accuracy. To object to or restrict processing please contact us at the email address in our Contact section below.&lt;/p&gt;\r\n		&lt;/li&gt;\r\n		&lt;li&gt;\r\n		&lt;p&gt;&lt;strong&gt;Right to Data Portability or Transfer of Your Personal Data.&lt;/strong&gt;&amp;nbsp;You have the right to be provided with a copy of the information we maintain about you in a structured, machine-readable and commonly used format. To receive a copy of the information we maintain about you please contact us at the email address in our Contact section below.&lt;/p&gt;\r\n		&lt;/li&gt;\r\n		&lt;li&gt;\r\n		&lt;p&gt;&lt;strong&gt;Right to Withdrawal of Consent.&lt;/strong&gt;&amp;nbsp;If you have given your consent to us to process and share your Personal Information after we have requested it, you have the right to withdraw your consent at any time. To withdraw your consent please contact us at the email address in our Contact section below.&lt;/p&gt;\r\n		&lt;/li&gt;\r\n	&lt;/ol&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;h2&gt;YOUR CALIFORNIA PRIVACY RIGHTS&lt;/h2&gt;\r\n\r\n	&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n	&lt;ol&gt;\r\n		&lt;li&gt;\r\n		&lt;p&gt;California Civil Code Section 1798.83 entitles California residents to request information concerning whether a business has disclosed Personal Information to any third parties for their direct marketing purposes. California residents may request and obtain from us once a year, free of charge, information about the personal information, if any, we disclosed to third parties for direct marketing purposes within the immediately preceding calendar year. If applicable, this information would include a list of the categories of personal information that was shared and the names and addresses of all third parties with which we shared information within the immediately preceding calendar year.&lt;/p&gt;\r\n		&lt;/li&gt;\r\n		&lt;li&gt;\r\n		&lt;p&gt;If you are a California resident and would like to make such a request, please submit your request in writing to:&amp;nbsp;&lt;a href=&quot;mailto:legal@wasai.co&quot;&gt;legal@wasai.co&lt;/a&gt;&lt;/p&gt;\r\n		&lt;/li&gt;\r\n	&lt;/ol&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;h2&gt;OUR INFORMATION RETENTION POLICY&lt;/h2&gt;\r\n\r\n	&lt;p&gt;Unless you request that we delete certain information, we retain the information we collect for as long as your account is active or as needed to provide you services. Following termination or deactivation of your account, we will retain information for at least 3 years and may retain the information for as long as needed for our business and legal purposes. We will only retain your Personal Data for so long as we reasonably need to unless a longer retention period is required by law (for example for regulatory purposes).&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;h2&gt;CONTACT US&lt;/h2&gt;\r\n\r\n	&lt;p&gt;If you have any questions or if you would like to contact us about our processing of your personal information, including exercising your rights as outlined above, please contact us by any of the methods below. When you contact us, we will ask you to verify your identity.&lt;/p&gt;\r\n	&lt;/li&gt;\r\n&lt;/ol&gt;\r\n', '&lt;p&gt;Welcome to www.lorem-ipsum.info. This site is provided as a service to our visitors and may be used for informational purposes only. Because the Terms and Conditions contain legal obligations, please read them carefully.&lt;/p&gt;\r\n\r\n&lt;h2&gt;1. YOUR AGREEMENT&lt;/h2&gt;\r\n\r\n&lt;p&gt;By using this Site, you agree to be bound by, and to comply with, these Terms and Conditions. If you do not agree to these Terms and Conditions, please do not use this site.&lt;/p&gt;\r\n\r\n&lt;blockquote&gt;PLEASE NOTE: We reserve the right, at our sole discretion, to change, modify or otherwise alter these Terms and Conditions at any time. Unless otherwise indicated, amendments will become effective immediately. Please review these Terms and Conditions periodically. Your continued use of the Site following the posting of changes and/or modifications will constitute your acceptance of the revised Terms and Conditions and the reasonableness of these standards for notice of changes. For your information, this page was last updated as of the date at the top of these terms and conditions.&lt;/blockquote&gt;\r\n\r\n&lt;h2&gt;2. PRIVACY&lt;/h2&gt;\r\n\r\n&lt;p&gt;Please review our Privacy Policy, which also governs your visit to this Site, to understand our practices.&lt;/p&gt;\r\n\r\n&lt;h2&gt;3. LINKED SITES&lt;/h2&gt;\r\n\r\n&lt;p&gt;This Site may contain links to other independent third-party Web sites (&amp;quot;Linked Sites&amp;rdquo;). These Linked Sites are provided solely as a convenience to our visitors. Such Linked Sites are not under our control, and we are not responsible for and does not endorse the content of such Linked Sites, including any information or materials contained on such Linked Sites. You will need to make your own independent judgment regarding your interaction with these Linked Sites.&lt;/p&gt;\r\n\r\n&lt;h2&gt;4. FORWARD LOOKING STATEMENTS&lt;/h2&gt;\r\n\r\n&lt;p&gt;All materials reproduced on this site speak as of the original date of publication or filing. The fact that a document is available on this site does not mean that the information contained in such document has not been modified or superseded by events or by a subsequent document or filing. We have no duty or policy to update any information or statements contained on this site and, therefore, such information or statements should not be relied upon as being current as of the date you access this site.&lt;/p&gt;\r\n\r\n&lt;h2&gt;5. DISCLAIMER OF WARRANTIES AND LIMITATION OF LIABILITY&lt;/h2&gt;\r\n\r\n&lt;p&gt;A. THIS SITE MAY CONTAIN INACCURACIES AND TYPOGRAPHICAL ERRORS. WE DOES NOT WARRANT THE ACCURACY OR COMPLETENESS OF THE MATERIALS OR THE RELIABILITY OF ANY ADVICE, OPINION, STATEMENT OR OTHER INFORMATION DISPLAYED OR DISTRIBUTED THROUGH THE SITE. YOU EXPRESSLY UNDERSTAND AND AGREE THAT: (i) YOUR USE OF THE SITE, INCLUDING ANY RELIANCE ON ANY SUCH OPINION, ADVICE, STATEMENT, MEMORANDUM, OR INFORMATION CONTAINED HEREIN, SHALL BE AT YOUR SOLE RISK; (ii) THE SITE IS PROVIDED ON AN &amp;quot;AS IS&amp;quot; AND &amp;quot;AS AVAILABLE&amp;quot; BASIS; (iii) EXCEPT AS EXPRESSLY PROVIDED HEREIN WE DISCLAIM ALL WARRANTIES OF ANY KIND, WHETHER EXPRESS OR IMPLIED, INCLUDING, BUT NOT LIMITED TO IMPLIED WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, WORKMANLIKE EFFORT, TITLE AND NON-INFRINGEMENT; (iv) WE MAKE NO WARRANTY WITH RESPECT TO THE RESULTS THAT MAY BE OBTAINED FROM THIS SITE, THE PRODUCTS OR SERVICES ADVERTISED OR OFFERED OR MERCHANTS INVOLVED; (v) ANY MATERIAL DOWNLOADED OR OTHERWISE OBTAINED THROUGH THE USE OF THE SITE IS DONE AT YOUR OWN DISCRETION AND RISK; and (vi) YOU WILL BE SOLELY RESPONSIBLE FOR ANY DAMAGE TO YOUR COMPUTER SYSTEM OR FOR ANY LOSS OF DATA THAT RESULTS FROM THE DOWNLOAD OF ANY SUCH MATERIAL.&lt;/p&gt;\r\n\r\n&lt;p&gt;B. YOU UNDERSTAND AND AGREE THAT UNDER NO CIRCUMSTANCES, INCLUDING, BUT NOT LIMITED TO, NEGLIGENCE, SHALL WE BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, PUNITIVE OR CONSEQUENTIAL DAMAGES THAT RESULT FROM THE USE OF, OR THE INABILITY TO USE, ANY OF OUR SITES OR MATERIALS OR FUNCTIONS ON ANY SUCH SITE, EVEN IF WE HAVE BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES. THE FOREGOING LIMITATIONS SHALL APPLY NOTWITHSTANDING ANY FAILURE OF ESSENTIAL PURPOSE OF ANY LIMITED REMEDY.&lt;/p&gt;\r\n\r\n&lt;h2&gt;6. EXCLUSIONS AND LIMITATIONS&lt;/h2&gt;\r\n\r\n&lt;p&gt;SOME JURISDICTIONS DO NOT ALLOW THE EXCLUSION OF CERTAIN WARRANTIES OR THE LIMITATION OR EXCLUSION OF LIABILITY FOR INCIDENTAL OR CONSEQUENTIAL DAMAGES. ACCORDINGLY, OUR LIABILITY IN SUCH JURISDICTION SHALL BE LIMITED TO THE MAXIMUM EXTENT PERMITTED BY LAW.&lt;/p&gt;\r\n\r\n&lt;h2&gt;7. OUR PROPRIETARY RIGHTS&lt;/h2&gt;\r\n\r\n&lt;p&gt;This Site and all its Contents are intended solely for personal, non-commercial use. Except as expressly provided, nothing within the Site shall be construed as conferring any license under our or any third party&amp;#39;s intellectual property rights, whether by estoppel, implication, waiver, or otherwise. Without limiting the generality of the foregoing, you acknowledge and agree that all content available through and used to operate the Site and its services is protected by copyright, trademark, patent, or other proprietary rights. You agree not to: (a) modify, alter, or deface any of the trademarks, service marks, trade dress (collectively &amp;quot;Trademarks&amp;quot;) or other intellectual property made available by us in connection with the Site; (b) hold yourself out as in any way sponsored by, affiliated with, or endorsed by us, or any of our affiliates or service providers; (c) use any of the Trademarks or other content accessible through the Site for any purpose other than the purpose for which we have made it available to you; (d) defame or disparage us, our Trademarks, or any aspect of the Site; and (e) adapt, translate, modify, decompile, disassemble, or reverse engineer the Site or any software or programs used in connection with it or its products and services.&lt;/p&gt;\r\n\r\n&lt;p&gt;The framing, mirroring, scraping or data mining of the Site or any of its content in any form and by any method is expressly prohibited.&lt;/p&gt;\r\n\r\n&lt;h2&gt;8. INDEMNITY&lt;/h2&gt;\r\n\r\n&lt;p&gt;By using the Site web sites you agree to indemnify us and affiliated entities (collectively &amp;quot;Indemnities&amp;quot;) and hold them harmless from any and all claims and expenses, including (without limitation) attorney&amp;#39;s fees, arising from your use of the Site web sites, your use of the Products and Services, or your submission of ideas and/or related materials to us or from any person&amp;#39;s use of any ID, membership or password you maintain with any portion of the Site, regardless of whether such use is authorized by you.&lt;/p&gt;\r\n\r\n&lt;h2&gt;9. COPYRIGHT AND TRADEMARK NOTICE&lt;/h2&gt;\r\n\r\n&lt;p&gt;Except our generated dummy copy, which is free to use for private and commercial use, all other text is copyrighted. generator.lorem-ipsum.info &amp;copy; 2013, all rights reserved&lt;/p&gt;\r\n\r\n&lt;h2&gt;10. INTELLECTUAL PROPERTY INFRINGEMENT CLAIMS&lt;/h2&gt;\r\n\r\n&lt;p&gt;It is our policy to respond expeditiously to claims of intellectual property infringement. We will promptly process and investigate notices of alleged infringement and will take appropriate actions under the Digital Millennium Copyright Act (&amp;quot;DMCA&amp;quot;) and other applicable intellectual property laws. Notices of claimed infringement should be directed to:&lt;/p&gt;\r\n\r\n&lt;p&gt;generator.lorem-ipsum.info&lt;/p&gt;\r\n\r\n&lt;p&gt;126 Electricov St.&lt;/p&gt;\r\n\r\n&lt;p&gt;Kiev, Kiev 04176&lt;/p&gt;\r\n\r\n&lt;p&gt;Ukraine&lt;/p&gt;\r\n\r\n&lt;p&gt;contact@lorem-ipsum.info&lt;/p&gt;\r\n\r\n&lt;h2&gt;11. PLACE OF PERFORMANCE&lt;/h2&gt;\r\n\r\n&lt;p&gt;This Site is controlled, operated and administered by us from our office in Kiev, Ukraine. We make no representation that materials at this site are appropriate or available for use at other locations outside of the Ukraine and access to them from territories where their contents are illegal is prohibited. If you access this Site from a location outside of the Ukraine, you are responsible for compliance with all local laws.&lt;/p&gt;\r\n\r\n&lt;h2&gt;12. GENERAL&lt;/h2&gt;\r\n\r\n&lt;p&gt;A. If any provision of these Terms and Conditions is held to be invalid or unenforceable, the provision shall be removed (or interpreted, if possible, in a manner as to be enforceable), and the remaining provisions shall be enforced. Headings are for reference purposes only and in no way define, limit, construe or describe the scope or extent of such section. Our failure to act with respect to a breach by you or others does not waive our right to act with respect to subsequent or similar breaches. These Terms and Conditions set forth the entire understanding and agreement between us with respect to the subject matter contained herein and supersede any other agreement, proposals and communications, written or oral, between our representatives and you with respect to the subject matter hereof, including any terms and conditions on any of customer&amp;#39;s documents or purchase orders.&lt;/p&gt;\r\n\r\n&lt;p&gt;B. No Joint Venture, No Derogation of Rights. You agree that no joint venture, partnership, employment, or agency relationship exists between you and us as a result of these Terms and Conditions or your use of the Site. Our performance of these Terms and Conditions is subject to existing laws and legal process, and nothing contained herein is in derogation of our right to comply with governmental, court and law enforcement requests or requirements relating to your use of the Site or information provided to or gathered by us with respect to such use.&lt;/p&gt;\r\n');
INSERT INTO `tb_user_business` (`ub_id`, `ub_us_id`, `ub_website_url`, `ub_business_name`, `ub_logo`, `ub_cover_image`, `ub_business_id`, `ub_description`, `ub_first_name`, `ub_last_name`, `ub_whatsapp_number`, `ub_alternate_number`, `ub_email`, `ub_address`, `ub_zipcode`, `ub_alternate_email`, `ub_state`, `ub_language`, `ub_google_map_url`, `ub_district`, `ub_business_segment`, `ub_active`, `ub_added_on`, `ub_flipkart_url`, `ub_facebook_url`, `ub_amazon_url`, `ub_instagram_url`, `ub_ebay_url`, `ub_whatsapp_url`, `ub_india_mart_url`, `ub_youtube_url`, `ub_big_basket_url`, `ub_x_url`, `ub_zomato_url`, `ub_linkedin_url`, `ub_swiggy_url`, `ub_pan_number`, `ub_gst_number`, `ub_website_title`, `ub_home_title`, `ub_meta_keyword`, `ub_meta_description`, `ub_google_analytics`, `ub_privacy_policy`, `ub_terms_condition`) VALUES
(2, 1, 'http://localhost/adsp/user-business-details.php', 'business name', 'ub_logo2.png', 'ub_cover_image2.png', NULL, 'business description', 'name', 'last', '987987987', '8979879879', 'email@email.com', 'address', '898989', 'email@mail.com', 'state', 'language', 'google map url', 'district', 'segment', 'a', '2024-03-12 22:24:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_login`
--

DROP TABLE IF EXISTS `tb_user_login`;
CREATE TABLE IF NOT EXISTS `tb_user_login` (
  `ul_id` int(11) NOT NULL AUTO_INCREMENT,
  `ul_firstname` varchar(50) DEFAULT NULL,
  `ul_surname` varchar(50) DEFAULT NULL,
  `ul_telephone` varchar(20) DEFAULT NULL,
  `ul_mail` varchar(50) DEFAULT NULL,
  `ul_username` varchar(100) DEFAULT NULL,
  `ul_password` varchar(200) DEFAULT NULL,
  `ul_occupation` varchar(100) DEFAULT NULL,
  `ul_language` char(10) DEFAULT NULL,
  `ul_status` enum('a','d') DEFAULT 'a',
  `type` varchar(20) NOT NULL DEFAULT 'admin',
  PRIMARY KEY (`ul_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user_login`
--

INSERT INTO `tb_user_login` (`ul_id`, `ul_firstname`, `ul_surname`, `ul_telephone`, `ul_mail`, `ul_username`, `ul_password`, `ul_occupation`, `ul_language`, `ul_status`, `type`) VALUES
(1, 'user', 'user', '9876543210', 'user@gmail.com', 'root', 'c42ed237ae635a4da5315bfba2cabc6e57cb1eae48f9942e33433324b77d06ec1556f73d69e57543b4da2fae52800b341813b80ad2bd0243e4038781efe489a2', 'occupation', 'en', 'a', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
