-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 28, 2024 at 11:03 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test3`
--

-- --------------------------------------------------------

--
-- Table structure for table `caravan_details`
--

DROP TABLE IF EXISTS `caravan_details`;
CREATE TABLE IF NOT EXISTS `caravan_details` (
  `name` varchar(50) NOT NULL,
  `description` varchar(250) NOT NULL,
  `location` varchar(50) NOT NULL,
  `pricepernight` int NOT NULL,
  `availabilityStart` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `availabilityEnd` varchar(50) NOT NULL,
  `image_url` varchar(250) NOT NULL,
  `video_url` varchar(250) NOT NULL,
  `amenities` varchar(250) NOT NULL,
  `notes` varchar(250) NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `caravan_details`
--

INSERT INTO `caravan_details` (`name`, `description`, `location`, `pricepernight`, `availabilityStart`, `availabilityEnd`, `image_url`, `video_url`, `amenities`, `notes`, `id`, `user_id`) VALUES
('Vintage Caravan', 'Enjoy a lovely caravan that is very spacious with a vintage touch. ', 'London, UK', 110, '2024-04-25', '2024-05-05', 'https://imgur.com/gallery/EkHD4NR', 'https://www.youtube.com/watch?v=twFqO7hatHc', '3 bed (8 berth) 1.5 bathrooms. 7 years remaining on park lease. Parking, super fast Broadband installed, includes a metal large shed in price.', 'The main bedroom has a king size bed. The kitchen has all the requirements needed to cook for the whole family while visiting.', 10, 3),
('test1', 'test', 'test', 7357, '7357-03-07', '7357-03-07', '', '', '', '', 5, 0),
('test123', '123', '123', 123, '1234-03-12', '1234-12-12', '', '', '', '', 7, 0),
('123123123123', '123', '123', 123, '2000-07-25', '3000-07-25', '', '', '', '', 8, 0),
('j', 'k', 'k', 0, 'availabilityStart', 'availabilityEnd', '', '', '', '', 11, 0),
('d', 'd', 'd', 0, '', '', '', '', '', '', 15, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
