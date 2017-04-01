-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2017 at 09:34 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `eggafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL,
  `dish_name` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `dish_name`, `image`, `price`) VALUES
(2, 'rkd', 'http://localhost/eggafe/view/images/13859.jpg', 78),
(3, 'egg bhurj', 'http://localhost/eggafe/view/images/5308.jpg', 120),
(4, 'egg curry', 'http://localhost/eggafe/view/images/19525.jpg', 130),
(5, 'egg roll', 'http://localhost/eggafe/view/images/31749.jpg', 100);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE IF NOT EXISTS `tbl_customer` (
  `CustomerID` int(11) NOT NULL AUTO_INCREMENT,
  `CustomerName` varchar(250) NOT NULL,
  `Address` text NOT NULL,
  `City` varchar(250) NOT NULL,
  `PostalCode` varchar(30) NOT NULL,
  `Country` varchar(100) NOT NULL,
  PRIMARY KEY (`CustomerID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`CustomerID`, `CustomerName`, `Address`, `City`, `PostalCode`, `Country`) VALUES
(1, 'Maria Anders', 'Obere Str. 57', 'Berlin', '12209', 'Germany'),
(2, 'Ana Trujillo', 'Avda. de la Constituci?n 2222', 'M?xico D.F.', '05021', 'Mexico'),
(3, 'Antonio Moreno', 'Mataderos 2312', 'M?xico D.F.', '05023', 'Mexico'),
(4, 'Thomas Hardy', '120 Hanover Sq.', 'London', 'WA1 1DP', 'UK'),
(7, 'Paula Parente', 'Rua do Mercado, 12', 'Resende', '08737-363', 'Brazil');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE IF NOT EXISTS `tbl_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `creation_date` date NOT NULL,
  `order_status` varchar(50) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `customer_id`, `creation_date`, `order_status`) VALUES
(1, 1, '2016-12-17', 'pending'),
(2, 1, '2016-12-17', 'pending'),
(3, 1, '2016-12-17', 'pending'),
(4, 1, '2017-01-04', 'pending'),
(5, 1, '2017-01-06', 'pending'),
(6, 1, '2017-03-29', 'pending'),
(7, 1, '2017-04-01', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_details`
--

CREATE TABLE IF NOT EXISTS `tbl_order_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` double(10,2) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`id`, `order_id`, `product_name`, `product_price`, `product_quantity`) VALUES
(1, 1, 'egg', 90.00, 1),
(2, 1, 'egg roll', 100.00, 1),
(3, 1, 'egg bhurji', 120.00, 10),
(4, 2, 'egg', 90.00, 12),
(5, 3, 'egg', 90.00, 1),
(6, 4, 'egg', 90.00, 1),
(7, 4, 'egg roll', 100.00, 1),
(8, 5, 'rft', 78.00, 6),
(9, 6, 'rkd', 78.00, 9),
(10, 6, 'egg curry', 130.00, 10),
(11, 7, 'rkd', 78.00, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
