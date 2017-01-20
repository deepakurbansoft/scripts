-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2016 at 11:27 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

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
-- Table structure for table `list`
--

CREATE TABLE IF NOT EXISTS `list` (
`id` int(11) NOT NULL,
  `company_logo` text NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `item_name` varchar(200) NOT NULL,
  `dollar_value` varchar(200) NOT NULL,
  `coupon_price` varchar(200) NOT NULL,
  `coupon_img` text NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list`
--

INSERT INTO `list` (`id`, `company_logo`, `company_name`, `item_name`, `dollar_value`, `coupon_price`, `coupon_img`, `created_date`) VALUES
(4, 'Hydrangeas.jpg', 'urban', 'u2', '1', '1', 'Jellyfish.jpg', '2016-09-14'),
(5, 'avatar (1).png', 'urban', 'pi', '1', '1', 'Icons-Land-Vista-Map-Markers-Map-Marker-Marker-Outside-Pink.ico', '2016-09-05'),
(6, 'group.png', 'a', 'ice', '1', '1', 'logo_LMR_2_png.png', '2016-09-14'),
(7, 'Jellyfish.jpg', 'urban', 'ice', '1', '1', 'Hydrangeas.jpg', '2016-09-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list`
--
ALTER TABLE `list`
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
-- AUTO_INCREMENT for table `list`
--
ALTER TABLE `list`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
