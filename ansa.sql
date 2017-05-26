-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2017 at 08:31 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ansa`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE IF NOT EXISTS `customer_details` (
  `Customer_id` int(11) NOT NULL,
  `Customer_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact_no` bigint(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `landmark` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`Customer_id`, `Customer_name`, `email`, `contact_no`, `address`, `landmark`) VALUES
(11395, 'Deepak Kumar Goyal', 'goyaldeepu468@gmail.com', 7575053163, 'tyi', 'vbn'),
(18047, '', '', 0, '', ''),
(45930, 'goli', '201452058@iiitvadodara.ac.in', 7567775852, 'vb', 'hj'),
(57062, '', '', 0, '', ''),
(57941, 'dee', '2014@gmail.com', 7575053163, 'ghj', 'jkjk'),
(61278, '', '', 0, '', ''),
(71394, 'Deepak Kumar Goyal', 'goyaldeepu468@gmail.com', 7575053163, 'ad', 'df'),
(91425, 'hj', '9@gmail.com', 7575053163, 'yu', 'bn');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL,
  `dish_name` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `dish_name`, `image`, `price`) VALUES
(2, 'TEA', 'http://localhost/Ansa_website/view/images/tea.jpg', 15),
(3, 'COFFEE', 'http://localhost/Ansa_website/view/images/coffee.jpg', 30),
(4, 'DHOKALA  ', 'http://localhost/Ansa_website/view/images/dhokala.jpg', 40),
(5, 'SANDWICH', 'http://localhost/Ansa_website/view/images/Sandwich.jpg', 50);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE IF NOT EXISTS `tbl_customer` (
  `CustomerID` int(11) NOT NULL,
  `CustomerName` varchar(250) NOT NULL,
  `Address` text NOT NULL,
  `City` varchar(250) NOT NULL,
  `PostalCode` varchar(30) NOT NULL,
  `Country` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

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
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `creation_date` date NOT NULL,
  `order_status` varchar(50) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `customer_id`, `creation_date`, `order_status`) VALUES
(22, 1, '2017-04-09', 'pending'),
(21, 1, '2017-04-09', 'pending'),
(20, 1, '2017-04-09', 'pending'),
(19, 1, '2017-04-09', 'pending'),
(18, 1, '2017-04-08', 'pending'),
(17, 1, '2017-04-08', 'pending'),
(16, 1, '2017-04-08', 'pending'),
(15, 1, '2017-04-08', 'pending'),
(14, 1, '2017-04-08', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_details`
--

CREATE TABLE IF NOT EXISTS `tbl_order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` double(10,2) NOT NULL,
  `product_quantity` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`id`, `order_id`, `product_name`, `product_price`, `product_quantity`) VALUES
(29, 22, 'rkd', 78.00, 1),
(28, 21, 'rkd', 78.00, 1),
(27, 20, 'egg curry', 130.00, 1),
(26, 20, 'rkd', 78.00, 1),
(25, 19, 'egg bhurj', 120.00, 1),
(24, 18, 'egg bhurj', 120.00, 1),
(23, 16, 'rkd', 78.00, 1),
(22, 15, 'egg curry', 130.00, 5),
(21, 14, 'egg roll', 100.00, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`Customer_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
