-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 13, 2013 at 12:19 PM
-- Server version: 5.1.50
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `calendar`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE IF NOT EXISTS `calendar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(160) NOT NULL,
  `description` text NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `allDay` varchar(5) NOT NULL,
  `color` varchar(7) NOT NULL,
  `url` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`id`, `title`, `description`, `start`, `end`, `allDay`, `color`, `url`, `category`, `user_id`) VALUES
(1, 'Demouser Event', 'Demouser Private Event', '2013-10-12 00:00:00', '1970-01-01 00:00:00', 'true', '#587ca3', 'false', 'General', 1),
(2, 'QuickSave Demouser', 'QuickSave Private Demouser', '2013-10-01 00:00:00', '2013-10-01 00:00:00', 'true', '#587ca3', 'false', 'General', 1),
(5, 'testuser', 'testuser', '2013-10-13 13:59:00', '2013-10-14 13:59:00', 'true', '', 'false', 'General', 2),
(6, 'Private testuser', 'Private testuser', '2013-10-09 00:00:00', '2013-10-09 00:00:00', 'true', '#587ca3', 'false', 'General', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'demouser', '8cb2237d0679ca88db6464eac60da96345513964'),
(2, 'testuser', '8cb2237d0679ca88db6464eac60da96345513964');
