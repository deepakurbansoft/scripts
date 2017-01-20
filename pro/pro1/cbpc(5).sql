-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2017 at 04:15 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cbpc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `name`, `password`, `created_date`) VALUES
(1, 'admin', 'admin@123', '2016-09-13 02:17:29');

-- --------------------------------------------------------

--
-- Table structure for table `cashbook`
--

CREATE TABLE IF NOT EXISTS `cashbook` (
  `id` int(11) NOT NULL,
  `item_name` varchar(200) NOT NULL,
  `dollar_value` varchar(200) NOT NULL,
  `coupon_price` varchar(200) NOT NULL,
  `coupon_img` text NOT NULL,
  `company_id` int(11) NOT NULL,
  `featured` int(11) NOT NULL,
  `featured_home` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `details` text NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cashbook`
--

INSERT INTO `cashbook` (`id`, `item_name`, `dollar_value`, `coupon_price`, `coupon_img`, `company_id`, `featured`, `featured_home`, `created_date`, `details`, `time_stamp`) VALUES
(50, 'Mac Book Pro11', '10', '5', 'MACBOOKPRO.jpg', 1, 1, 0, '2016-10-11', 'detsils \r\ndsdgds\r\ndsfgdsfgfgdsfg\r\ndfsg\r\ndsfg\r\ndsf\r\ngd\r\nsg\r\ndsf', '2016-10-11 06:51:29');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `folder_name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `folder_name`, `logo`, `time_stamp`) VALUES
(1, 'Texas', 'texas', 'ts.jpg', '2016-12-16 09:39:47'),
(2, 'Dairy', 'dairy', 'dairy_queen_logo.svg.png', '2016-11-24 05:36:00'),
(3, 'Hobby Lobby', 'hobby-lobby', 'logo.png', '2016-11-24 05:36:25');

-- --------------------------------------------------------

--
-- Table structure for table `list`
--

CREATE TABLE IF NOT EXISTS `list` (
  `id` int(11) NOT NULL,
  `item_name` varchar(200) NOT NULL,
  `dollar_value` varchar(200) NOT NULL,
  `coupon_price` varchar(200) NOT NULL,
  `coupon_img` text NOT NULL,
  `company_id` int(11) NOT NULL,
  `featured` int(11) NOT NULL,
  `featured_home` int(11) NOT NULL,
  `firstpage_coupon` int(11) NOT NULL COMMENT '1->Yes, 2->No',
  `created_date` date NOT NULL,
  `details` text NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list`
--

INSERT INTO `list` (`id`, `item_name`, `dollar_value`, `coupon_price`, `coupon_img`, `company_id`, `featured`, `featured_home`, `firstpage_coupon`, `created_date`, `details`, `time_stamp`) VALUES
(21, '6 OZ Steak', '2.10', '5.10', 'ice_cream.png', 1, 0, 0, 1, '2016-09-19', '', '2016-11-14 14:31:12'),
(24, 'Pizza', '2.10', '2.10', 'pizza_fav.png', 2, 0, 0, 1, '2016-09-19', '', '2016-11-14 14:31:10'),
(25, 'Pizza', '2.10', '3.10', 'pizza_fav.png', 1, 0, 0, 1, '2016-09-20', '', '2016-11-14 14:31:09'),
(26, 'Pizza', '2.10', '5.10', 'pizza_trad_pepperoni.png', 1, 0, 0, 1, '2016-09-20', '', '2016-11-14 14:32:00'),
(27, '6 OZ Steak', '2.10', '2.10', 'ice_cream.png', 1, 0, 0, 1, '2016-09-20', '', '2016-11-14 14:25:22'),
(28, 'Religious Trinket', '10', '5', 'coupon.png', 3, 0, 0, 1, '2016-09-21', '', '2016-11-14 14:25:22'),
(29, 'demo', '10', '5', 'coupon.png', 3, 0, 0, 1, '2016-09-21', '', '2016-11-14 14:25:21'),
(30, '6 OZ Steak', '2.10', '5.10', 'index.jpg', 2, 0, 0, 1, '2016-09-22', '', '2016-11-14 14:25:18'),
(31, 'Religious Trinket', '2.10', '5.10', 'icecream.jpg', 2, 0, 0, 1, '2016-09-22', '', '2016-11-14 14:25:17'),
(34, 'demo', '10', '5', 'index.jpg', 1, 0, 0, 1, '2016-09-22', '', '2016-11-14 14:25:16'),
(36, 'Religious Trinket', '10', '5.10', 'MIC-3scoops-banner.png', 2, 0, 0, 1, '2016-09-22', '', '2016-11-14 14:25:15'),
(37, 'Religious Trinket', '2.10', '5.10', 'blogicecream760by250.jpg', 2, 0, 0, 1, '2016-09-22', '', '2016-11-14 14:25:14'),
(38, '6 OZ Steak', '10', '5', 'icecream.jpg', 1, 0, 0, 1, '2016-09-22', '', '2016-11-14 14:25:14'),
(39, 'Ice Cream', '2.10', '5.10', 'index.jpg', 2, 0, 0, 1, '2016-09-22', '', '2016-11-14 14:25:13'),
(40, '6 OZ Steak', '10', '5', 'MIC-3scoops-banner.png', 1, 0, 0, 1, '2016-09-22', '', '2016-11-14 14:25:12'),
(41, 'Religious Trinket', '2.10', '5.10', 'MIC-3scoops-banner.png', 1, 0, 0, 1, '2016-09-22', '', '2016-11-14 14:25:11'),
(42, 'Religious Trinket', '2.10', '5.10', 'icecream.jpg', 1, 0, 0, 1, '2016-09-22', '', '2016-11-14 14:25:09'),
(43, '6 OZ Steak', '2.10', '5.10', 'MIC-3scoops-banner.png', 2, 0, 0, 1, '2016-09-22', '', '2016-11-14 14:25:06'),
(44, 'Ice Cream', '10', '5', 'strawberry.jpg', 2, 0, 0, 1, '2016-09-22', '', '2016-11-14 14:25:04'),
(47, 'Big Ice Cream', '2.10', '5.10', 'big.jpg', 5, 1, 0, 0, '2016-09-28', 'detsils dsdgds dsfgdsfgfgdsfg dfsg dsfg dsf', '2016-10-24 07:07:12'),
(50, 'Mac Book Pro11', '10', '5', 'MACBOOKPRO.jpg', 1, 0, 0, 1, '2016-10-11', 'detsils \r\ndsdgds\r\ndsfgdsfgfgdsfg\r\ndfsg\r\ndsfg\r\ndsf\r\ngd\r\nsg\r\ndsf', '2016-11-23 09:38:28'),
(51, 'water Mark', '80.00', '40.00', 'big.jpg', 1, 0, 0, 1, '2016-10-25', 'this is a problrm sdknsdablnkfa', '2016-11-14 14:14:05'),
(52, 'fgdsg', '2.10', '5.10', 'banner.jpg', 1, 0, 0, 0, '2016-10-25', 'dfg', '2016-11-14 14:35:03'),
(71, 'Religious Trinket', '2.10', '5.10', 'big.jpg', 2, 0, 0, 1, '2016-10-25', '', '2016-11-14 14:14:26'),
(72, 'demo', '2.10', '2.10', 'banner.jpg', 1, 1, 0, 0, '2016-10-26', 'details demo', '2016-11-23 09:38:28'),
(77, 'Mac Book Pro', '2.10', '5.10', 'mac_book_pro_1477486934.png', 2, 1, 1, 0, '2016-10-26', 'sdgdfsgdfg', '2016-11-23 09:04:48'),
(78, 'Mac Book Pro', '2.10', '5.10', 'mac_book_pro_1477487033.jpg', 1, 0, 0, 0, '2016-10-26', 'details of macbook pro', '2016-11-15 07:02:42'),
(79, 'demo', '2.10', '5.10', 'demo_1478169322.jpg', 1, 0, 0, 0, '2016-11-03', 'dem', '2016-11-23 07:57:45'),
(80, 'dmo', '15.10', '5.10', 'dmo_1479195624.jpg', 1, 0, 0, 0, '2016-11-15', 'dmo details', '2016-11-15 07:40:24'),
(81, 'iPas Pro', '80.00', '15.00', 'ipas_pro_1479887847.jpg', 32, 1, 0, 1, '2016-11-23', '', '2016-11-23 07:57:46'),
(82, 'iPad Pro', '80.00', '10.00', 'ipad_pro_1479891871.jpg', 36, 1, 0, 0, '2016-11-23', '', '2016-11-23 09:35:20'),
(83, 'Mac Book Pro', '50.00', '10.00', 'mac_book_pro_1479891930.jpg', 36, 0, 0, 0, '2016-11-23', '', '2016-11-23 09:10:56'),
(84, 'iPad 3', '12.00', '10.00', 'ipad_3_1479892247.jpg', 37, 1, 0, 0, '2016-11-23', '', '2016-11-23 09:26:14'),
(85, 'dmo', '2.10', '5.10', 'dmo_1479893170.jpg', 38, 1, 0, 1, '2016-11-23', '', '2016-11-23 09:26:19'),
(86, 'Religious Trinket', '80.00', '10.00', 'religious_trinket_1479893715.jpg', 39, 0, 0, 1, '2016-11-23', 'dsagf', '2016-11-23 10:43:50'),
(88, 'Pizza', '15.10', '5.10', 'pizza_1479898095.jpg', 39, 1, 0, 0, '2016-11-23', 'sdfasfas', '2016-11-23 10:48:39');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE IF NOT EXISTS `order_details` (
  `id` int(11) NOT NULL,
  `invoice` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `invoice`, `product_id`, `time_stamp`) VALUES
(1, '1', 79, '2016-11-18 09:41:36'),
(2, '1', 72, '2016-11-18 09:41:36'),
(3, '1', 0, '2016-11-18 09:41:36'),
(4, '1', 79, '2016-11-18 09:42:38'),
(5, '1', 72, '2016-11-18 09:42:38'),
(6, '1', 71, '2016-11-18 09:42:38'),
(7, '1', 51, '2016-11-18 09:42:38'),
(8, '1', 50, '2016-11-18 09:42:38'),
(9, '2', 79, '2016-11-18 09:45:07'),
(10, '2', 72, '2016-11-18 09:45:07'),
(11, '2', 71, '2016-11-18 09:45:08'),
(12, '2', 51, '2016-11-18 09:45:08'),
(13, '2', 50, '2016-11-18 09:45:08'),
(14, '3', 79, '2016-11-18 09:45:41'),
(15, '3', 72, '2016-11-18 09:45:41'),
(16, '3', 71, '2016-11-18 09:45:41'),
(17, '3', 51, '2016-11-18 09:45:41'),
(18, '3', 50, '2016-11-18 09:45:41'),
(19, '4', 79, '2016-11-18 09:47:20'),
(20, '4', 72, '2016-11-18 09:47:20'),
(21, '4', 71, '2016-11-18 09:47:20'),
(22, '4', 51, '2016-11-18 09:47:20'),
(23, '4', 50, '2016-11-18 09:47:20'),
(24, '5', 79, '2016-11-18 14:00:16'),
(25, '5', 72, '2016-11-18 14:00:16'),
(26, '5', 0, '2016-11-18 14:00:16'),
(27, '6', 79, '2016-11-18 14:00:58'),
(28, '6', 72, '2016-11-18 14:00:58'),
(29, '6', 0, '2016-11-18 14:00:58'),
(30, '7', 36, '2016-11-21 07:59:54'),
(31, '8', 86, '2016-11-23 13:16:42'),
(32, '8', 0, '2016-11-23 13:16:42'),
(33, '9', 44, '2016-12-15 13:07:14'),
(34, '9', 0, '2016-12-15 13:07:14'),
(35, '10', 71, '2016-12-15 13:17:52'),
(36, '10', 51, '2016-12-15 13:17:52'),
(37, '10', 50, '2016-12-15 13:17:52'),
(38, '10', 0, '2016-12-15 13:17:52'),
(39, '10', 71, '2016-12-15 13:21:08'),
(40, '10', 51, '2016-12-15 13:21:08'),
(41, '10', 50, '2016-12-15 13:21:08'),
(42, '10', 0, '2016-12-15 13:21:08'),
(43, '10', 71, '2016-12-15 13:35:49'),
(44, '10', 51, '2016-12-15 13:35:49'),
(45, '10', 50, '2016-12-15 13:35:49'),
(46, '10', 0, '2016-12-15 13:35:50'),
(47, '10', 71, '2016-12-15 13:37:02'),
(48, '10', 51, '2016-12-15 13:37:02'),
(49, '10', 50, '2016-12-15 13:37:02'),
(50, '10', 0, '2016-12-15 13:37:02'),
(51, '10', 71, '2016-12-15 13:52:20'),
(52, '10', 0, '2016-12-15 13:52:21'),
(53, '10', 43, '2016-12-16 09:57:23'),
(54, '10', 0, '2016-12-16 09:57:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `time_stamp`) VALUES
(1, '', 'deepak@urbansoft.in', '2016-11-18 09:34:41'),
(2, '', 'deepak.urbansoft@gmail.com', '2016-11-18 09:42:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cashbook`
--
ALTER TABLE `cashbook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cashbook`
--
ALTER TABLE `cashbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `list`
--
ALTER TABLE `list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
