-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 04, 2017 at 03:09 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--
CREATE DATABASE IF NOT EXISTS `ecommerce` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ecommerce`;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  KEY `product_key` (`product_id`),
  KEY `user_key` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `address_country` varchar(32) DEFAULT NULL,
  `address_state` varchar(32) DEFAULT NULL,
  `address_city` varchar(32) DEFAULT NULL,
  `address_zip_code` varchar(32) DEFAULT NULL,
  `address_street` varchar(32) DEFAULT NULL,
  `address_number` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_history`
--

DROP TABLE IF EXISTS `order_history`;
CREATE TABLE IF NOT EXISTS `order_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `price` double NOT NULL,
  `origin` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(256) NOT NULL,
  `stock` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `origin`, `description`, `image`, `stock`, `weight`) VALUES
(1, 'Blue Cheese', 20, 'France', 'French cheese matured in caves with in growth microscopic mushrooms, has a strong taste, perfect match with sugary condiments.', 'http://localhost/ecommerce/images/blue_cheese.jpg', 50, 150),
(2, 'Gouda Young', 5, 'Netherlands', 'Dutch yellow cheese from cow\'s milk, matured for less than a year, optimal on a grilled slice of bread.', 'http://localhost/ecommerce/images/gouda_young.jpg', 200, 200),
(3, 'Gouda Old', 8, 'Netherlands', 'Dutch yellow cheese from cow\'s milk, matured for more than a year, optimal with a beer at the aperitif.', 'http://localhost/ecommerce/images/gouda_old.jpg', 150, 200),
(4, 'Parmigiano-Reggiano', 50, 'Italy', 'Italian hard granular cheese made from cow\'s milk, has a strong taste, delicious when put upon pasta.', 'http://localhost/ecommerce/images/parmigiano-reggiano.jpg', 100, 50),
(5, 'Herve Cheese', 15, 'Belgium', 'Belgian soft cheese produced from raw or pasteurized cow\'s milk, optimal for dessert.', 'http://localhost/ecommerce/images/herve_cheese.jpg', 150, 150),
(6, 'Goat Cheese', 20, 'Spain', 'Spanish goat cheese made from the milk of the mountain goats, has a strong taste, discover its pleasure when grilled in oven or very fresh out of the fridge.', 'http://localhost/ecommerce/images/goat_cheese.jpg', 100, 100);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `product_key` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_key` FOREIGN KEY (`user_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_history`
--
ALTER TABLE `order_history`
  ADD CONSTRAINT `customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
