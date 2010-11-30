-- phpMyAdmin SQL Dump
-- version 3.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 29, 2010 at 10:22 PM
-- Server version: 5.1.44
-- PHP Version: 5.3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `safari`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `tracking_number` varchar(255) NOT NULL,
  `created` date NOT NULL,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_opt_in` tinyint(1) NOT NULL,
  `address` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip_code` char(5) NOT NULL,
  `int_address` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `notes` text NOT NULL,
  `cc_name` varchar(255) NOT NULL,
  `cc_number` varchar(255) NOT NULL,
  `cc_type` varchar(255) NOT NULL,
  `cc_code` varchar(255) NOT NULL,
  `cc_expiration` varchar(255) NOT NULL,
  `cc_address` varchar(255) NOT NULL,
  `cc_address2` varchar(255) NOT NULL,
  `cc_city` varchar(255) NOT NULL,
  `cc_state` varchar(255) NOT NULL,
  `cc_zip_code` varchar(5) NOT NULL,
  `cc_int_address` text NOT NULL,
  `shipping_type` varchar(255) NOT NULL,
  `shipping` decimal(10,2) NOT NULL,
  `tax` decimal(10,2) NOT NULL,
  `promotion` varchar(255) NOT NULL,
  `discount_code` varchar(255) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=86 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` VALUES(83, 0, NULL, '', '', '0000-00-00', '0000-00-00 00:00:00', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0.00, 0.00, '', '', 0.00, 0.00);
INSERT INTO `cart` VALUES(84, 0, NULL, 'Pending', '', '2010-11-29', '2010-11-29 22:22:03', 'Andy Canfield', 'Andrew@thepog.net', 1, '115 E Liberty', '', 'Spokane', 'Washington', '99209', '', '(509) 216-8740', '', 'Andy Canfield', '4111111111111111', 'visa', '123', '1 / 2011', '115 E Liberty', '', 'Spokane', 'Washington', '99209', '', 'Ground', 9.99, 6.96, '', '', 0.00, 96.91);
INSERT INTO `cart` VALUES(85, 0, NULL, '', '', '0000-00-00', '0000-00-00 00:00:00', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0.00, 0.00, '', '', 0.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `cart_products`
--

CREATE TABLE `cart_products` (
  `cart_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `options` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_products`
--

INSERT INTO `cart_products` VALUES(84, 7025, 4, '1465', 19.99);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `note` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notes`
--


-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `manufacturer` varchar(255) DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `upc` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `cost` decimal(6,2) NOT NULL,
  `price` decimal(6,2) DEFAULT NULL,
  `discontinued` tinyint(1) DEFAULT NULL,
  `description` text,
  `allow_upload` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7028 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` VALUES(7025, 'Product 01', 'ABC Company', 'ABC123', '', 'Category 01', 0.00, 19.99, 0, 'A simple, easy to use test product.', NULL);
INSERT INTO `products` VALUES(7026, 'Product 02', 'ABC Company', 'ABC111', '', 'Category 01', 0.00, 29.99, 0, 'Another simple product.', NULL);
INSERT INTO `products` VALUES(7027, 'Product 03', 'ABC Company', 'ABC122', '', 'Category 02', 9.99, 29.99, 0, 'A wonderfully simple product.', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_options`
--

CREATE TABLE `product_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `option_name` varchar(255) NOT NULL,
  `options` varchar(255) NOT NULL,
  `price_impact` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1467 ;

--
-- Dumping data for table `product_options`
--

INSERT INTO `product_options` VALUES(1465, 7025, 'Size', 'S', 0.00);
INSERT INTO `product_options` VALUES(1466, 7025, 'Size', 'M', 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `promo_code` varchar(255) NOT NULL,
  `discount_percent` decimal(10,2) NOT NULL,
  `discount_amount` decimal(10,2) NOT NULL,
  `min_amount` decimal(10,2) NOT NULL,
  `storewide` tinyint(4) NOT NULL,
  `sales` decimal(10,2) NOT NULL,
  `savings` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `promotions`
--


-- --------------------------------------------------------

--
-- Table structure for table `promo_category`
--

CREATE TABLE `promo_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `promotion_id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `promo_category`
--


-- --------------------------------------------------------

--
-- Table structure for table `promo_manufacturer`
--

CREATE TABLE `promo_manufacturer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `promotion_id` int(11) NOT NULL,
  `manufacturer` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `promo_manufacturer`
--


-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tier` int(11) NOT NULL,
  `max_amt` decimal(10,2) NOT NULL,
  `ground` decimal(10,2) NOT NULL,
  `third_day` decimal(10,2) NOT NULL,
  `second_day` decimal(10,2) NOT NULL,
  `next_day` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `shipping`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `zip_code` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password_hash` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT 'User',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` VALUES(24, '', '', NULL, 'Admin', '80d54a973c2816ad086cf34ae23d6a9351a5afda', 'admin');
INSERT INTO `users` VALUES(25, 'Andy', 'Canfield', 99209, 'Andrew@thepog.net', '80d54a973c2816ad086cf34ae23d6a9351a5afda', 'user');
