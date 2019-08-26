-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 26, 2019 at 01:03 PM
-- Server version: 5.7.24
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `landprop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(60) NOT NULL,
  `lastname` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `tel` varchar(60) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `firstname`, `lastname`, `email`, `password`, `tel`) VALUES
(1, 'Admin', 'admin', 'admin@gmail.com', 'admin', '08076373637'),
(2, 'Godson', 'Pius', 'godson@admin.com', 'pass', '07064536353'),
(3, 'Mary', 'Bonnke', 'mary@yahoo.com', 'pass', '070544756657'),
(4, 'Hannah', 'James', 'hannah@admin.com', 'pass', '08094624051');

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

DROP TABLE IF EXISTS `agents`;
CREATE TABLE IF NOT EXISTS `agents` (
  `agent_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(60) NOT NULL,
  `lastname` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `tel` varchar(60) NOT NULL,
  `address` varchar(60) NOT NULL,
  `union_id_fk` int(11) NOT NULL,
  PRIMARY KEY (`agent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`agent_id`, `firstname`, `lastname`, `email`, `password`, `tel`, `address`, `union_id_fk`) VALUES
(2, 'James', 'Peter', 'admin@admin.com', 'pass', '090876547676', '#50 ziks Avenue, Enugu', 1),
(3, 'Bond', 'Broid', 'broid@landprop.com', 'pass', '09084746364', 'Enugu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `agent_properties`
--

DROP TABLE IF EXISTS `agent_properties`;
CREATE TABLE IF NOT EXISTS `agent_properties` (
  `property_id` int(11) NOT NULL AUTO_INCREMENT,
  `listing_id_fk` int(11) NOT NULL,
  PRIMARY KEY (`property_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(60) NOT NULL,
  `lastname` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `tel` varchar(60) NOT NULL,
  `address` varchar(60) NOT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `firstname`, `lastname`, `email`, `password`, `tel`, `address`) VALUES
(2, 'Peter', 'Peter', 'peter@yahoo.com', 'pass', '081647838389', 'Asaba'),
(4, 'Peter', 'Peter', 'peter@yahoo.com', 'pass', '081647838389', 'Asaba'),
(5, 'Paul', 'Breakthrough', 'admin@gmail.com', 'admin', '07053016947', 'Enugu');

-- --------------------------------------------------------

--
-- Table structure for table `client_properties`
--

DROP TABLE IF EXISTS `client_properties`;
CREATE TABLE IF NOT EXISTS `client_properties` (
  `property_id` int(11) NOT NULL AUTO_INCREMENT,
  `listing_id_fk` int(11) NOT NULL,
  `client_id_fk` int(11) NOT NULL,
  PRIMARY KEY (`property_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_properties`
--

INSERT INTO `client_properties` (`property_id`, `listing_id_fk`, `client_id_fk`) VALUES
(1, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

DROP TABLE IF EXISTS `listings`;
CREATE TABLE IF NOT EXISTS `listings` (
  `listing_id` int(11) NOT NULL AUTO_INCREMENT,
  `agent_id_fk` int(11) NOT NULL,
  `image_id` varchar(60) NOT NULL,
  `type` varchar(60) NOT NULL,
  `description` varchar(60) NOT NULL,
  `price` varchar(60) NOT NULL,
  `location` varchar(60) NOT NULL,
  `video_link` varchar(60) NOT NULL,
  PRIMARY KEY (`listing_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `listings`
--

INSERT INTO `listings` (`listing_id`, `agent_id_fk`, `image_id`, `type`, `description`, `price`, `location`, `video_link`) VALUES
(1, 3, 'thumb_07.jpg', 'Sale', 'A very nice apartment', '78000', 'Enugu', 'youtube/001/video-home-apartment'),
(2, 2, 'thumb_01.jpg', 'Sale', 'lihjdw', '78000', 'Enugu', 'youtube/001/video-home-apartment'),
(3, 4, 'thumb_07.jpg', 'Rent', 'Nice Rooms and Garages, Gardens', '78000', 'Enugu', 'youtube/001/video-home-apartment'),
(15, 2, 'thumb_07.jpg', 'Sale', 'Nice', '100000', 'US', 'youtube/001/video-home-apartment_agencies'),
(16, 2, 'thumb_08.jpg', 'Rent', 'Beautiful', '78000', 'Asaba', 'youtube/001/video-home-for-sale');

-- --------------------------------------------------------

--
-- Table structure for table `unions`
--

DROP TABLE IF EXISTS `unions`;
CREATE TABLE IF NOT EXISTS `unions` (
  `union_id` int(11) NOT NULL AUTO_INCREMENT,
  `verification_code` varchar(255) NOT NULL,
  PRIMARY KEY (`union_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unions`
--

INSERT INTO `unions` (`union_id`, `verification_code`) VALUES
(1, '546454645'),
(2, '746474644'),
(3, '546454645'),
(4, '746474644');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
