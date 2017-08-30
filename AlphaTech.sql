-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 30, 2017 at 10:50 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `AlphaTech`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminID` int(6) NOT NULL,
  `AdminPass` int(4) NOT NULL,
  `AdminName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `AdminPass`, `AdminName`) VALUES
(1034, 3412, 'Daniel Amos'),
(1035, 2483, 'William McMartin'),
(1037, 7413, 'Jacky Smith');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customerID` int(5) NOT NULL,
  `customerName` varchar(20) NOT NULL,
  `cusUserName` varchar(20) NOT NULL,
  `cPass` int(4) NOT NULL,
  `address` varchar(20) NOT NULL,
  `city` varchar(15) NOT NULL,
  `state` varchar(15) NOT NULL,
  `zipCode` int(5) NOT NULL,
  `creditCard` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerID`, `customerName`, `cusUserName`, `cPass`, `address`, `city`, `state`, `zipCode`, `creditCard`) VALUES
(1, 'Ugur Armagan', 'uarmagan ', 1234, '4202 N Newland Ave ', 'Norridge', 'Illinois', 60706, 2147483647),
(2, 'Tom Brady', 'TomBrady', 1423, '123 fake st', 'Chicago', 'Illinois', 60630, 2147483647),
(3, 'David Mccoy', 'dMccoy', 1593, '4321 blank st', 'Chicago', 'Illinois', 60647, 2147483647),
(4, 'Robin', 'robin', 1234, '5522 N Austin Ave', 'Chicago', 'Illinois', 60630, 2147483647),
(5, 'eric magpantay', 'emag', 1234, '123 fake st', 'Chicago', 'Illinois', 60630, 2173618);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(10) NOT NULL,
  `customerID` int(5) NOT NULL,
  `orderDate` date NOT NULL,
  `totalPrice` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `customerID`, `orderDate`, `totalPrice`) VALUES
(18, 1, '2017-08-09', '293.00'),
(20, 1, '2017-08-09', '123.00'),
(21, 1, '2017-08-09', '293.00'),
(22, 1, '2017-08-09', '293.00'),
(23, 4, '2017-08-09', '1.00'),
(24, 4, '2017-08-09', '109.00'),
(25, 0, '2017-08-09', '1.00'),
(26, 1, '2017-08-09', '170.00'),
(27, 1, '2017-08-09', '180.00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(5) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `retailPrice` decimal(5,2) NOT NULL,
  `type` varchar(20) NOT NULL,
  `inventory` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `productName`, `retailPrice`, `type`, `inventory`) VALUES
(19110, 'AlphaT', '760.34', 'Cell Phone', 18),
(23341, 'EMusic', '109.99', 'MP3 Player', 0),
(30183, 'TechSum', '450.99', 'TV', 45),
(32314, 'Leno', '980.00', 'Laptop', 33),
(39120, 'Maximus', '170.00', 'Media Player ', 8),
(39123, 'TrE', '45.00', 'Laptop', 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customerID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39124;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
