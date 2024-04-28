-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 28, 2024 at 04:46 AM
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_buisness_category`
--

INSERT INTO `tb_buisness_category` (`bca_id`, `bca_bd_id`, `bca_bc_id`) VALUES
(1, 1, 2),
(2, 1, 3);

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_business_details`
--

INSERT INTO `tb_business_details` (`bd_id`, `bd_user_id`, `bd_business_name`, `bd_business_id`, `bd_url`, `bd_city`, `bd_category`, `bd_meta_title`, `bd_meta_keywords`, `bd_meta_description`, `bd_added_date`, `bd_status`) VALUES
(1, 1, 'hailey', 'BI1BN31', 'https://hailey.com/', 3, 1, 'cloth title', 'cloth Keywords', 'hjgvgvvhvh', '2024-04-26 22:09:39', 'a');

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
  `bg_product_type` varchar(200) DEFAULT NULL,
  `bg_product_url` varchar(500) DEFAULT NULL,
  `bg_added_on` varchar(50) NOT NULL,
  PRIMARY KEY (`bg_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `bp_description` varchar(50000) DEFAULT NULL,
  `bp_price` varchar(100) DEFAULT NULL,
  `bp_added_on` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`bp_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `bs_service_description` varchar(200) NOT NULL,
  `bs_added_on` varchar(50) NOT NULL,
  PRIMARY KEY (`bs_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `ub_password` varchar(5000) DEFAULT NULL,
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
  `ub_template_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`ub_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user_business`
--

INSERT INTO `tb_user_business` (`ub_id`, `ub_us_id`, `ub_website_url`, `ub_business_name`, `ub_logo`, `ub_cover_image`, `ub_business_id`, `ub_description`, `ub_first_name`, `ub_last_name`, `ub_whatsapp_number`, `ub_alternate_number`, `ub_email`, `ub_password`, `ub_address`, `ub_zipcode`, `ub_alternate_email`, `ub_state`, `ub_language`, `ub_google_map_url`, `ub_district`, `ub_business_segment`, `ub_active`, `ub_added_on`, `ub_flipkart_url`, `ub_facebook_url`, `ub_amazon_url`, `ub_instagram_url`, `ub_ebay_url`, `ub_whatsapp_url`, `ub_india_mart_url`, `ub_youtube_url`, `ub_big_basket_url`, `ub_x_url`, `ub_zomato_url`, `ub_linkedin_url`, `ub_swiggy_url`, `ub_pan_number`, `ub_gst_number`, `ub_website_title`, `ub_home_title`, `ub_meta_keyword`, `ub_meta_description`, `ub_google_analytics`, `ub_privacy_policy`, `ub_terms_condition`, `ub_template_id`) VALUES
(1, 1, NULL, 'hailey', 'ub_logo1.jpeg', 'ub_cover_image1.jpeg', NULL, 'gvgh', NULL, NULL, '878767676', '87654456', 'hailey@123', 'RGhYWHhQNjFQSHdneUVzcWpHZkJPZz09', 'hkljlkjlj', '76767', 'hailey1@123', 'kjhkjhkjh', 'kjhkjhkjhkj', 'hkjhkjhkjh', 'kjhkjhkjhkjh', 'kjhkjhkjhkj', 'a', '2024-04-26 22:09:39', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
(1, 'user', 'user', '9876543210', 'user@gmail.com', 'root', 'S0pwMjhZeUkybVlaR0ZZdnlKeFk1Zz09', 'occupation', 'en', 'a', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
