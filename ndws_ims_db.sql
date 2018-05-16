-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2017 at 05:49 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ndws_ims_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `addproduct`
--

CREATE TABLE `addproduct` (
  `addProductID` int(10) NOT NULL,
  `productID` int(10) NOT NULL,
  `batchID` int(10) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addproduct`
--

INSERT INTO `addproduct` (`addProductID`, `productID`, `batchID`, `date`, `time`, `qty`) VALUES
(40, 1, 1000, '2017-12-13', '10:26:26', 25),
(41, 4, 1000, '2017-12-13', '10:26:26', 25),
(42, 5, 1000, '2017-12-13', '10:26:26', 25),
(43, 6, 1000, '2017-12-13', '10:26:26', 25),
(44, 7, 1000, '2017-12-13', '10:26:26', 25),
(45, 8, 1000, '2017-12-13', '10:26:26', 25),
(46, 4, 1001, '2017-12-13', '10:27:49', 40),
(47, 8, 1001, '2017-12-13', '10:27:49', 90),
(48, 6, 1001, '2017-12-13', '10:27:49', 150),
(49, 5, 1001, '2017-12-21', '02:20:46', 10),
(50, 6, 1002, '2017-12-21', '02:20:59', 50),
(51, 4, 1002, '2017-12-21', '02:21:25', 10),
(52, 5, 1002, '2017-12-21', '02:21:42', 10);

--
-- Triggers `addproduct`
--
DELIMITER $$
CREATE TRIGGER `add_time_addproduct` BEFORE INSERT ON `addproduct` FOR EACH ROW SET NEW.time = curtime()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cusID` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `address1` varchar(100) NOT NULL,
  `address2` varchar(100) NOT NULL,
  `address3` varchar(100) NOT NULL,
  `cusTp` varchar(15) NOT NULL,
  `cusNIC` varchar(15) NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cusID`, `fname`, `lname`, `address1`, `address2`, `address3`, `cusTp`, `cusNIC`, `deleted`) VALUES
(440016, 'Suranja', 'Liyanage', 'Kahangama', 'Ratnapura', 'Ratnapura', '94717039441', '940731720v', 0),
(1, 'Rasika', 'Lakshan', 'Wegama', 'Bibila', 'Uwa', '94712378925', '960145892v', 0),
(2, 'Kamal ', 'Perera', '2street', 'Badulla', 'Colombo 6', '94775515391', '840215952v', 0),
(3, 'Saddeep', 'Mihiranga', '56', 'First Lane', 'Maradana', '94766295259', '931952145v', 0),
(440026, 'assssssss', 'aaaaaaaa', 'a', 'a', 'a', '94716505314', '1234567890', 1),
(440027, 'jhjknk', 'knknk', 'nknk', 'nlknkln', 'knk', '987541235v', '94756215485', 1);

-- --------------------------------------------------------

--
-- Table structure for table `damproreturn`
--

CREATE TABLE `damproreturn` (
  `damProReturnID` int(10) NOT NULL,
  `returnDate` date NOT NULL,
  `time` time NOT NULL,
  `cusID` int(10) NOT NULL,
  `orderReturnAmt` decimal(10,2) NOT NULL,
  `discription` varchar(300) NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `damproreturn`
--

INSERT INTO `damproreturn` (`damProReturnID`, `returnDate`, `time`, `cusID`, `orderReturnAmt`, `discription`, `deleted`) VALUES
(8, '2017-11-18', '23:26:55', 1, '60.00', '', 0),
(9, '2017-11-18', '23:28:14', 1, '60.00', '', 0),
(10, '2017-12-20', '17:13:28', 2, '98.00', 'acac', 0);

--
-- Triggers `damproreturn`
--
DELIMITER $$
CREATE TRIGGER `add_time_dam_rm_return` BEFORE INSERT ON `damproreturn` FOR EACH ROW SET NEW.time = curtime()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `damproreturnitem`
--

CREATE TABLE `damproreturnitem` (
  `damProReturnItemID` int(10) NOT NULL,
  `damProReturnID` int(10) NOT NULL,
  `productID` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  `tot` decimal(10,2) NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `damproreturnitem`
--

INSERT INTO `damproreturnitem` (`damProReturnItemID`, `damProReturnID`, `productID`, `qty`, `rate`, `tot`, `deleted`) VALUES
(13, 8, 4, 1, '60.00', '60.00', 0),
(14, 8, 4, 1, '60.00', '60.00', 0),
(15, 9, 4, 1, '60.00', '60.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `damrmreturn`
--

CREATE TABLE `damrmreturn` (
  `damRMReturnID` int(10) NOT NULL,
  `returnDate` date NOT NULL,
  `time` time NOT NULL,
  `supID` int(10) NOT NULL,
  `orderReturnAmt` decimal(10,2) NOT NULL,
  `discription` varchar(300) NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `damrmreturn`
--

INSERT INTO `damrmreturn` (`damRMReturnID`, `returnDate`, `time`, `supID`, `orderReturnAmt`, `discription`, `deleted`) VALUES
(1, '2017-11-18', '23:33:13', 1, '23.00', '', 0),
(2, '2017-12-20', '17:23:50', 2, '5.00', 'jjjjjk', 0);

--
-- Triggers `damrmreturn`
--
DELIMITER $$
CREATE TRIGGER `add_time_rm_dam_return` BEFORE INSERT ON `damrmreturn` FOR EACH ROW SET NEW.time = curtime()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `damrmreturnitem`
--

CREATE TABLE `damrmreturnitem` (
  `damRMReturnItemID` int(10) NOT NULL,
  `damRMReturnID` int(10) NOT NULL,
  `rmID` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  `tot` decimal(10,2) NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `damrmreturnitem`
--

INSERT INTO `damrmreturnitem` (`damRMReturnItemID`, `damRMReturnID`, `rmID`, `qty`, `rate`, `tot`, `deleted`) VALUES
(4, 1, 1, 1, '4.00', '4.00', 0),
(5, 1, 2, 1, '5.00', '5.00', 0),
(6, 1, 7, 1, '14.00', '14.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `grn`
--

CREATE TABLE `grn` (
  `grnID` int(10) NOT NULL,
  `grnDate` date NOT NULL,
  `pOrderID` int(10) NOT NULL,
  `grnAmt` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grn`
--

INSERT INTO `grn` (`grnID`, `grnDate`, `pOrderID`, `grnAmt`) VALUES
(1, '2017-12-12', 23, '51500.00'),
(2, '2017-12-29', 25, '6.00'),
(3, '2018-02-08', 26, '6.00'),
(4, '2018-02-08', 27, '21700.00'),
(5, '2017-12-25', 28, '6.00'),
(6, '2017-09-11', 23, '51500.00'),
(7, '2018-05-11', 23, '51500.00'),
(8, '2017-09-19', 32, '4.00'),
(9, '2017-12-21', 44, '36000.00'),
(10, '2017-09-06', 45, '52200.00'),
(11, '2017-12-26', 31, '6.00'),
(12, '2017-09-11', 46, '4.00'),
(13, '2017-10-31', 46, '2.00'),
(14, '2017-10-09', 46, '2.00'),
(15, '2017-10-15', 46, '2.00'),
(16, '2017-10-23', 46, '2.00'),
(17, '2017-10-16', 46, '2.00'),
(18, '0000-00-00', 46, '2.00'),
(19, '0000-00-00', 47, '1.00'),
(20, '0000-00-00', 48, '1.00'),
(21, '0000-00-00', 48, '8.00'),
(22, '0000-00-00', 48, '2.00'),
(23, '0000-00-00', 48, '2.00'),
(24, '0000-00-00', 27, '1.00'),
(25, '0000-00-00', 48, '1.00'),
(26, '0000-00-00', 48, '2.00'),
(27, '0000-00-00', 48, '2.00'),
(28, '0000-00-00', 48, '2.00'),
(29, '0000-00-00', 48, '2.00'),
(30, '0000-00-00', 48, '2.00'),
(31, '0000-00-00', 48, '2.00'),
(32, '0000-00-00', 49, '1.00'),
(33, '0000-00-00', 49, '2.00'),
(34, '0000-00-00', 50, '1.00'),
(35, '0000-00-00', 50, '2.00'),
(36, '0000-00-00', 51, '1.00'),
(37, '0000-00-00', 52, '1.00'),
(38, '0000-00-00', 53, '1.00'),
(39, '0000-00-00', 56, '42000008.00'),
(40, '0000-00-00', 57, '1.00'),
(41, '0000-00-00', 57, '2.00'),
(42, '0000-00-00', 57, '2.00'),
(43, '0000-00-00', 57, '425.00'),
(44, '0000-00-00', 63, '1.00'),
(45, '0000-00-00', 63, '2.00'),
(46, '0000-00-00', 63, '2.00'),
(47, '0000-00-00', 63, '2.00'),
(48, '0000-00-00', 62, '1.00'),
(49, '0000-00-00', 58, '4.00'),
(50, '0000-00-00', 58, '4.00'),
(51, '0000-00-00', 58, '4.00'),
(52, '0000-00-00', 58, '4.00'),
(53, '0000-00-00', 58, '4.00'),
(54, '0000-00-00', 58, '4.00'),
(55, '0000-00-00', 58, '4.00'),
(56, '0000-00-00', 58, '4.00'),
(57, '0000-00-00', 58, '4.00'),
(58, '0000-00-00', 58, '4.00'),
(59, '0000-00-00', 58, '4.00'),
(60, '0000-00-00', 58, '5.00'),
(61, '0000-00-00', 58, '4.00'),
(62, '0000-00-00', 58, '5.00'),
(63, '0000-00-00', 58, '5.00'),
(64, '0000-00-00', 60, '1.00'),
(65, '0000-00-00', 60, '2.00'),
(66, '0000-00-00', 60, '2.00'),
(67, '0000-00-00', 60, '2.00'),
(68, '0000-00-00', 59, '4.00'),
(69, '0000-00-00', 59, '4.00'),
(70, '0000-00-00', 59, '4.00'),
(71, '0000-00-00', 59, '4.00'),
(72, '0000-00-00', 61, '5.00'),
(73, '0000-00-00', 64, '24.00'),
(74, '0000-00-00', 23, '51500.00'),
(75, '0000-00-00', 24, '4.00'),
(76, '0000-00-00', 24, '4.00'),
(77, '0000-00-00', 24, '4.00'),
(78, '0000-00-00', 25, '6.00'),
(79, '0000-00-00', 25, '6.00'),
(80, '0000-00-00', 25, '6.00'),
(81, '0000-00-00', 26, '6.00'),
(82, '0000-00-00', 65, '70005.00'),
(83, '0000-00-00', 66, '25.00'),
(84, '0000-00-00', 66, '25.00'),
(85, '0000-00-00', 68, '5.00'),
(86, '0000-00-00', 69, '6.00'),
(88, '0000-00-00', 69, '6.00'),
(89, '0000-00-00', 69, '6.00'),
(90, '0000-00-00', 69, '6.00'),
(91, '0000-00-00', 69, '6.00'),
(92, '0000-00-00', 69, '6.00'),
(93, '0000-00-00', 69, '6.00'),
(94, '0000-00-00', 69, '6.00'),
(95, '0000-00-00', 69, '6.00'),
(96, '2017-12-21', 79, '500.00'),
(97, '2017-12-21', 80, '1500.00'),
(98, '2017-12-21', 81, '1500.00'),
(99, '2017-12-21', 82, '1500.00');

-- --------------------------------------------------------

--
-- Table structure for table `grnitem`
--

CREATE TABLE `grnitem` (
  `grnItemID` int(10) NOT NULL,
  `grnID` int(10) NOT NULL,
  `rmID` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  `tot` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grnitem`
--

INSERT INTO `grnitem` (`grnItemID`, `grnID`, `rmID`, `qty`, `rate`, `tot`) VALUES
(1, 28, 3, 1, '6.00', '6.00'),
(2, 23, 1, 5000, '4.00', '20000.00'),
(3, 23, 2, 4500, '6.00', '27000.00'),
(4, 23, 2, 750, '6.00', '4500.00'),
(5, 23, 1, 5000, '4.00', '20000.00'),
(6, 23, 2, 4500, '6.00', '27000.00'),
(7, 23, 2, 750, '6.00', '4500.00'),
(8, 32, 1, 1, '4.00', '4.00'),
(9, 44, 7, 1200, '14.00', '16800.00'),
(10, 44, 3, 1200, '6.00', '7200.00'),
(11, 44, 9, 800, '15.00', '12000.00'),
(12, 45, 1, 4500, '4.00', '18000.00'),
(13, 45, 2, 3200, '6.00', '19200.00'),
(14, 45, 3, 2500, '6.00', '15000.00'),
(15, 31, 2, 1, '6.00', '6.00'),
(16, 46, 1, 1, '4.00', '4.00'),
(17, 46, 3, 1, '6.00', '6.00'),
(18, 46, 3, 1, '6.00', '6.00'),
(19, 46, 3, 1, '6.00', '6.00'),
(20, 46, 3, 1, '6.00', '6.00'),
(21, 46, 3, 1, '6.00', '6.00'),
(22, 46, 3, 1, '6.00', '6.00'),
(23, 47, 2, 1, '6.00', '6.00'),
(24, 48, 2, 1, '6.00', '6.00'),
(25, 48, 1, 1, '4.00', '4.00'),
(26, 48, 1, 1, '4.00', '4.00'),
(27, 48, 2, 1, '6.00', '6.00'),
(28, 48, 2, 1, '6.00', '6.00'),
(29, 27, 7, 800, '14.00', '11200.00'),
(30, 27, 1, 750, '4.00', '3000.00'),
(31, 27, 9, 500, '15.00', '7500.00'),
(32, 48, 2, 1, '6.00', '6.00'),
(33, 48, 2, 1, '6.00', '6.00'),
(34, 48, 2, 1, '6.00', '6.00'),
(35, 48, 2, 1, '6.00', '6.00'),
(36, 48, 2, 1, '6.00', '6.00'),
(37, 48, 2, 1, '6.00', '6.00'),
(38, 48, 2, 1, '6.00', '6.00'),
(39, 49, 3, 1, '6.00', '6.00'),
(40, 49, 3, 1, '6.00', '6.00'),
(41, 50, 2, 1, '6.00', '6.00'),
(42, 50, 2, 1, '6.00', '6.00'),
(43, 51, 1, 1, '4.00', '4.00'),
(44, 52, 1, 500, '4.00', '2000.00'),
(45, 53, 2, 1, '6.00', '6.00'),
(46, 56, 1, 1500000, '28.00', '42000000.00'),
(47, 56, 1, 1, '4.00', '4.00'),
(48, 56, 1, 1, '4.00', '4.00'),
(49, 57, 1, 1, '28.00', '28.00'),
(50, 57, 1, 1, '28.00', '28.00'),
(51, 57, 1, 1, '4.00', '4.00'),
(52, 57, 7, 1, '365.00', '365.00'),
(53, 63, 1, 1500000, '4.00', '6000000.00'),
(54, 63, 2, 1, '5.00', '5.00'),
(55, 63, 3, 1, '6.00', '6.00'),
(56, 63, 1, 1500000, '4.00', '6000000.00'),
(57, 63, 2, 1, '5.00', '5.00'),
(58, 63, 3, 1, '6.00', '6.00'),
(59, 63, 1, 1500000, '4.00', '6000000.00'),
(60, 63, 2, 1, '5.00', '5.00'),
(61, 63, 3, 1, '6.00', '6.00'),
(62, 63, 1, 1500000, '4.00', '6000000.00'),
(63, 63, 2, 1, '5.00', '5.00'),
(64, 63, 3, 1, '6.00', '6.00'),
(65, 62, 2, 1, '5.00', '5.00'),
(66, 60, 2, 1, '5.00', '5.00'),
(67, 61, 1, 1, '4.00', '4.00'),
(68, 62, 2, 1, '5.00', '5.00'),
(69, 63, 2, 1, '5.00', '5.00'),
(70, 64, 1, 1, '28.00', '28.00'),
(71, 65, 1, 1, '28.00', '28.00'),
(72, 66, 1, 1, '28.00', '28.00'),
(73, 67, 1, 1, '28.00', '28.00'),
(74, 68, 1, 1, '4.00', '4.00'),
(75, 69, 1, 1, '4.00', '4.00'),
(76, 70, 1, 1, '4.00', '4.00'),
(77, 71, 1, 1, '4.00', '4.00'),
(78, 72, 2, 1, '5.00', '5.00'),
(79, 73, 1, 1, '4.00', '4.00'),
(80, 73, 3, 1, '6.00', '6.00'),
(81, 73, 7, 1, '14.00', '14.00'),
(82, 74, 1, 5000, '4.00', '20000.00'),
(83, 74, 2, 4500, '6.00', '27000.00'),
(84, 74, 2, 750, '6.00', '4500.00'),
(85, 75, 1, 1, '4.00', '4.00'),
(86, 76, 1, 1, '4.00', '4.00'),
(87, 77, 1, 1, '4.00', '4.00'),
(88, 78, 2, 1, '6.00', '6.00'),
(89, 79, 2, 1, '6.00', '6.00'),
(90, 80, 2, 1, '6.00', '6.00'),
(91, 81, 3, 1, '6.00', '6.00'),
(92, 82, 7, 5000, '14.00', '70000.00'),
(93, 82, 2, 1, '5.00', '5.00'),
(94, 83, 2, 5, '5.00', '25.00'),
(95, 84, 2, 5, '5.00', '25.00'),
(96, 85, 2, 1, '5.00', '5.00'),
(97, 86, 3, 1, '6.00', '6.00'),
(98, 87, 3, 1, '6.00', '6.00'),
(99, 88, 3, 1, '6.00', '6.00'),
(100, 89, 3, 1, '6.00', '6.00'),
(101, 90, 3, 1, '6.00', '6.00'),
(102, 91, 3, 1, '6.00', '6.00'),
(103, 92, 3, 1, '6.00', '6.00'),
(104, 93, 3, 1, '6.00', '6.00'),
(105, 94, 3, 1, '6.00', '6.00'),
(106, 95, 3, 1, '6.00', '6.00'),
(107, 96, 2, 100, '5.00', '500.00'),
(108, 97, 1, 100, '4.00', '400.00'),
(109, 97, 2, 100, '5.00', '500.00'),
(110, 97, 3, 100, '6.00', '600.00'),
(111, 98, 1, 100, '4.00', '400.00'),
(112, 98, 2, 100, '5.00', '500.00'),
(113, 98, 3, 100, '6.00', '600.00'),
(114, 99, 1, 100, '4.00', '400.00'),
(115, 99, 2, 100, '5.00', '500.00'),
(116, 99, 3, 100, '6.00', '600.00');

-- --------------------------------------------------------

--
-- Table structure for table `issuerm`
--

CREATE TABLE `issuerm` (
  `issueRMID` int(10) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issuerm`
--

INSERT INTO `issuerm` (`issueRMID`, `date`, `time`) VALUES
(8, '2017-11-19', '12:06:01');

-- --------------------------------------------------------

--
-- Table structure for table `issuermitem`
--

CREATE TABLE `issuermitem` (
  `issueRMItemID` int(10) NOT NULL,
  `issueRMID` int(10) NOT NULL,
  `rmID` int(10) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issuermitem`
--

INSERT INTO `issuermitem` (`issueRMItemID`, `issueRMID`, `rmID`, `qty`) VALUES
(7, 8, 2, 150);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `msgID` int(10) NOT NULL,
  `sendTo` varchar(20) NOT NULL,
  `msgDescript` varchar(500) NOT NULL,
  `msgDate` varchar(20) NOT NULL,
  `msgTime` varchar(20) NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`msgID`, `sendTo`, `msgDescript`, `msgDate`, `msgTime`, `deleted`) VALUES
(1, '94779279206', '', '0000-00-00', '00:00:00', 0),
(2, '94779279216', '', '0000-00-00', '00:00:00', 0),
(3, '94779279246', '', '0000-00-00', '00:00:00', 0),
(4, '94779279456', '', '0000-00-00', '00:00:00', 0),
(5, '94716505314', 'Test+message', '2017-12-21', '02:01:29am', 0),
(6, '94717039441', 'test+mesage', '2017-12-21', '10:18:23am', 0);

-- --------------------------------------------------------

--
-- Table structure for table `porderitem`
--

CREATE TABLE `porderitem` (
  `pOrderItemID` int(10) NOT NULL,
  `pOrderID` int(10) NOT NULL,
  `rmID` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  `tot` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `porderitem`
--

INSERT INTO `porderitem` (`pOrderItemID`, `pOrderID`, `rmID`, `qty`, `rate`, `tot`) VALUES
(69, 23, 1, 5000, '4.00', '20000.00'),
(70, 23, 2, 4500, '6.00', '27000.00'),
(71, 23, 2, 750, '6.00', '4500.00'),
(72, 24, 1, 1, '4.00', '4.00'),
(73, 25, 2, 1, '6.00', '6.00'),
(74, 26, 3, 1, '6.00', '6.00'),
(75, 27, 7, 800, '14.00', '11200.00'),
(76, 27, 1, 750, '4.00', '3000.00'),
(77, 27, 9, 500, '15.00', '7500.00'),
(78, 28, 3, 1, '6.00', '6.00'),
(79, 29, 1, 1, '4.00', '4.00'),
(80, 30, 3, 1, '6.00', '6.00'),
(81, 31, 2, 1, '6.00', '6.00'),
(82, 32, 1, 1, '4.00', '4.00'),
(83, 33, 2, 1, '6.00', '6.00'),
(84, 34, 2, 1, '6.00', '6.00'),
(85, 34, 3, 1, '6.00', '6.00'),
(86, 35, 1, 1, '4.00', '4.00'),
(87, 35, 3, 1, '6.00', '6.00'),
(88, 35, 7, 1, '14.00', '14.00'),
(89, 36, 2, 1, '6.00', '6.00'),
(90, 37, 2, 1, '6.00', '6.00'),
(91, 38, 3, 1, '6.00', '6.00'),
(92, 39, 2, 500, '6.00', '3000.00'),
(93, 39, 9, 800, '15.00', '12000.00'),
(94, 39, 2, 250, '6.00', '1500.00'),
(95, 40, 3, 1, '6.00', '6.00'),
(96, 41, 1, 1, '4.00', '4.00'),
(97, 42, 1, 1500, '4.00', '6000.00'),
(98, 42, 2, 2000, '6.00', '12000.00'),
(99, 42, 3, 1800, '6.00', '10800.00'),
(100, 42, 7, 1200, '14.00', '16800.00'),
(101, 42, 9, 800, '15.00', '12000.00'),
(102, 43, 1, 800, '4.00', '3200.00'),
(103, 43, 2, 700, '6.00', '4200.00'),
(104, 43, 3, 650, '6.00', '3900.00'),
(105, 43, 7, 800, '14.00', '11200.00'),
(106, 43, 9, 450, '15.00', '6750.00'),
(107, 44, 7, 1200, '14.00', '16800.00'),
(108, 44, 3, 1500, '6.00', '9000.00'),
(109, 44, 9, 800, '15.00', '12000.00'),
(110, 45, 1, 4500, '4.00', '18000.00'),
(111, 45, 2, 3200, '6.00', '19200.00'),
(112, 45, 3, 2500, '6.00', '15000.00'),
(113, 46, 3, 1, '6.00', '6.00'),
(114, 47, 2, 1, '6.00', '6.00'),
(115, 48, 2, 1, '6.00', '6.00'),
(116, 49, 3, 1, '6.00', '6.00'),
(117, 50, 2, 1, '6.00', '6.00'),
(118, 51, 1, 1, '4.00', '4.00'),
(119, 52, 1, 500, '4.00', '2000.00'),
(120, 53, 2, 1, '6.00', '6.00'),
(121, 54, 2, 1, '6.00', '6.00'),
(122, 55, 2, 1, '6.00', '6.00'),
(123, 56, 1, 1, '28.00', '28.00'),
(124, 56, 4, 1, '60.00', '60.00'),
(125, 56, 5, 1, '98.00', '98.00'),
(126, 57, 1, 1, '28.00', '28.00'),
(127, 57, 1, 1, '28.00', '28.00'),
(128, 57, 4, 1, '60.00', '60.00'),
(129, 57, 7, 1, '365.00', '365.00'),
(130, 58, 4, 60000, '60.00', '3600000.00'),
(131, 59, 5, 1, '98.00', '98.00'),
(132, 85, 1, 1, '28.00', '28.00'),
(133, 86, 4, 1, '60.00', '60.00'),
(134, 87, 1, 1, '28.00', '28.00'),
(135, 60, 1, 1, '28.00', '28.00'),
(136, 98, 1, 1, '28.00', '28.00'),
(137, 61, 4, 1, '60.00', '60.00'),
(138, 107, 4, 1, '60.00', '60.00'),
(139, 0, 1, 1, '28.00', '28.00'),
(140, 109, 6, 1, '155.00', '155.00'),
(141, 0, 4, 1, '60.00', '60.00'),
(142, 0, 5, 1, '98.00', '98.00'),
(143, 112, 4, 1, '60.00', '60.00'),
(144, 113, 5, 1, '98.00', '98.00'),
(145, 114, 4, 1, '60.00', '60.00'),
(146, 115, 4, 1, '60.00', '60.00'),
(147, 116, 1, 1, '28.00', '28.00'),
(148, 117, 4, 1, '60.00', '60.00'),
(149, 62, 2, 1, '5.00', '5.00'),
(150, 63, 1, 1500000, '4.00', '6000000.00'),
(151, 63, 2, 1, '5.00', '5.00'),
(152, 63, 3, 1, '6.00', '6.00'),
(153, 64, 1, 1, '4.00', '4.00'),
(154, 64, 3, 1, '6.00', '6.00'),
(155, 64, 7, 1, '14.00', '14.00'),
(156, 65, 7, 5000, '14.00', '70000.00'),
(157, 65, 2, 1, '5.00', '5.00'),
(158, 66, 2, 5, '5.00', '25.00'),
(159, 67, 2, 1, '5.00', '5.00'),
(160, 67, 3, 1, '6.00', '6.00'),
(161, 67, 18, 1, '1.00', '1.00'),
(162, 68, 2, 1, '5.00', '5.00'),
(163, 69, 3, 1, '6.00', '6.00'),
(164, 70, 1, 1, '4.00', '4.00'),
(165, 71, 2, 1, '5.00', '5.00'),
(166, 72, 2, 1000, '5.00', '5000.00'),
(167, 72, 3, 1000, '6.00', '6000.00'),
(168, 72, 18, 1000, '1.00', '1000.00'),
(169, 73, 1, 1000, '4.00', '4000.00'),
(170, 73, 2, 1000, '5.00', '5000.00'),
(171, 73, 3, 1000, '6.00', '6000.00'),
(172, 74, 1, 100, '4.00', '400.00'),
(173, 75, 2, 100, '5.00', '500.00'),
(174, 76, 3, 1, '6.00', '6.00'),
(175, 77, 2, 1, '5.00', '5.00'),
(176, 78, 2, 1500, '5.00', '7500.00'),
(177, 79, 2, 100, '5.00', '500.00'),
(178, 80, 1, 100, '4.00', '400.00'),
(179, 80, 2, 100, '5.00', '500.00'),
(180, 80, 3, 100, '6.00', '600.00'),
(181, 81, 1, 100, '4.00', '400.00'),
(182, 81, 2, 100, '5.00', '500.00'),
(183, 81, 3, 100, '6.00', '600.00'),
(184, 82, 1, 100, '4.00', '400.00'),
(185, 82, 2, 100, '5.00', '500.00'),
(186, 82, 3, 100, '6.00', '600.00');

-- --------------------------------------------------------

--
-- Table structure for table `preturnitem`
--

CREATE TABLE `preturnitem` (
  `pRreturnItemID` int(10) NOT NULL,
  `pReturnID` int(10) NOT NULL,
  `productID` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `rate` decimal(10,2) DEFAULT NULL,
  `tot` decimal(10,2) NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `preturnitem`
--

INSERT INTO `preturnitem` (`pRreturnItemID`, `pReturnID`, `productID`, `qty`, `rate`, `tot`, `deleted`) VALUES
(123, 125, 1, 550, '28.00', '15400.00', 0),
(124, 125, 4, 550, '60.00', '33000.00', 0),
(125, 125, 5, 500, '98.00', '49000.00', 0),
(126, 125, 6, 860, '155.00', '133300.00', 0),
(127, 125, 7, 25, '365.00', '9125.00', 0),
(128, 130, 4, 1, '60.00', '60.00', 0),
(129, 130, 5, 1, '98.00', '98.00', 0),
(130, 130, 7, 1, '365.00', '365.00', 0),
(131, 130, 7, 1, '365.00', '365.00', 0),
(132, 131, 1, 1, '4.00', '4.00', 0),
(133, 131, 1, 1, '4.00', '4.00', 0),
(134, 131, 1, 1, '4.00', '4.00', 0),
(135, 132, 1, 1, '28.00', '28.00', 0),
(136, 1, 1, 1, '4.00', '4.00', 0),
(137, 133, 8, 0, '42.00', '0.00', 0),
(138, 134, 1, 1, '28.00', '28.00', 0),
(139, 135, 1, 1, '28.00', '28.00', 0),
(140, 135, 5, 1, '98.00', '98.00', 0),
(141, 135, 5, 1, '98.00', '98.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `production`
--

CREATE TABLE `production` (
  `productID` int(10) NOT NULL,
  `productName` varchar(50) NOT NULL,
  `productRate` decimal(10,2) NOT NULL,
  `productQty` int(10) NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `production`
--

INSERT INTO `production` (`productID`, `productName`, `productRate`, `productQty`, `deleted`) VALUES
(1, '500ml', '28.00', 2735, 0),
(4, '1000ml', '60.00', 10605, 0),
(5, '1500ml', '98.00', 296, 0),
(6, '5l', '155.00', 3123, 0),
(7, '19l', '365.00', 1770, 0),
(8, '500ml - El', '42.00', 994, 0);

-- --------------------------------------------------------

--
-- Table structure for table `productreturn`
--

CREATE TABLE `productreturn` (
  `pReturnID` int(10) NOT NULL,
  `returnDate` date NOT NULL,
  `returnTime` time NOT NULL,
  `cusID` int(10) NOT NULL,
  `orderReturnAmt` decimal(10,2) NOT NULL,
  `discription` varchar(300) NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productreturn`
--

INSERT INTO `productreturn` (`pReturnID`, `returnDate`, `returnTime`, `cusID`, `orderReturnAmt`, `discription`, `deleted`) VALUES
(125, '2017-11-18', '19:22:32', 3, '239825.00', '', 0),
(126, '2017-11-18', '19:31:15', 0, '0.00', '', 0),
(127, '2017-11-18', '19:31:30', 0, '0.00', '', 0),
(128, '2017-11-18', '19:32:34', 0, '0.00', '', 0),
(129, '2017-11-18', '19:32:38', 0, '0.00', '', 0),
(130, '2017-11-18', '20:05:44', 1, '888.00', '', 0),
(131, '2017-11-18', '20:33:39', 1, '12.00', '', 0),
(132, '2017-11-18', '20:54:29', 1, '28.00', '', 0),
(133, '2017-11-18', '22:28:22', 1, '0.00', '', 0),
(134, '2017-11-18', '23:10:49', 1, '28.00', '', 0),
(135, '2017-11-18', '23:13:25', 2, '224.00', '', 0),
(136, '2017-12-20', '16:49:56', 440016, '600.00', 'kunu wela', 0),
(137, '2017-12-21', '02:30:17', 440016, '60.00', 'cvcvcx', 0);

--
-- Triggers `productreturn`
--
DELIMITER $$
CREATE TRIGGER `add_time_product_return` BEFORE INSERT ON `productreturn` FOR EACH ROW SET NEW.returnTime = curtime()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `purchaseorder`
--

CREATE TABLE `purchaseorder` (
  `pOrderID` int(10) NOT NULL,
  `pOderDate` date NOT NULL,
  `supID` int(10) NOT NULL,
  `pOrderAmt` decimal(10,2) NOT NULL,
  `orderStatus` int(1) NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchaseorder`
--

INSERT INTO `purchaseorder` (`pOrderID`, `pOderDate`, `supID`, `pOrderAmt`, `orderStatus`, `deleted`) VALUES
(23, '2017-11-01', 1, '51500.00', 2, 0),
(24, '2017-11-07', 2, '4.00', 2, 0),
(25, '2017-12-03', 3, '6.00', 2, 0),
(26, '2017-11-06', 1, '6.00', 2, 0),
(46, '2017-12-12', 1, '6.00', 2, 0),
(47, '2017-11-06', 2, '6.00', 2, 0),
(48, '2017-12-05', 2, '6.00', 2, 0),
(49, '2017-12-05', 2, '6.00', 2, 0),
(50, '2017-12-06', 1, '6.00', 2, 0),
(51, '2017-12-17', 1, '4.00', 2, 0),
(52, '2017-12-06', 2, '2000.00', 2, 0),
(53, '2017-12-01', 1, '6.00', 2, 0),
(70, '2017-12-20', 3, '4.00', 2, 0),
(71, '2017-12-21', 2, '5.00', 2, 0),
(72, '2017-12-21', 2, '12000.00', 2, 0),
(73, '2017-12-21', 1, '15000.00', 2, 0),
(74, '2017-12-21', 2, '400.00', 2, 0),
(75, '2017-12-21', 2, '500.00', 2, 0),
(76, '2017-12-21', 1, '6.00', 2, 0),
(77, '2017-12-21', 2, '5.00', 2, 0),
(78, '2017-12-21', 2, '7500.00', 2, 0),
(79, '2017-12-21', 1, '500.00', 2, 0),
(80, '2017-12-21', 2, '1500.00', 2, 0),
(81, '2017-12-21', 2, '1500.00', 2, 0),
(82, '2017-12-21', 2, '1500.00', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rmitem`
--

CREATE TABLE `rmitem` (
  `rmID` int(10) NOT NULL,
  `rmName` varchar(50) NOT NULL,
  `rmRate` decimal(10,2) NOT NULL,
  `rmQty` int(10) NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rmitem`
--

INSERT INTO `rmitem` (`rmID`, `rmName`, `rmRate`, `rmQty`, `deleted`) VALUES
(1, 'Lid 3', '4.00', 6092702, 0),
(2, '1000ml EB', '5.00', 6238968, 0),
(3, '1.5l EB', '6.00', 6011272, 0),
(7, '19l EB', '14.00', 6803, 1),
(9, '750ml EB', '15.00', 1450, 1),
(10, '4', '4.00', 0, 1),
(11, 'zxca', '22.00', 0, 1),
(12, '', '0.00', 0, 1),
(13, 'ssss', '0.00', 0, 1),
(14, '33333', '0.00', 0, 1),
(15, 'ddd', '0.00', 0, 1),
(16, '', '2.00', 0, 1),
(17, '', '1.00', 0, 1),
(18, 'Lid 1', '1.00', 4000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rmreturn`
--

CREATE TABLE `rmreturn` (
  `rmReturnID` int(10) NOT NULL,
  `returnDate` date NOT NULL,
  `returnTime` time NOT NULL,
  `supID` int(10) NOT NULL,
  `orderReturnAmt` decimal(10,2) NOT NULL,
  `discription` varchar(300) NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rmreturn`
--

INSERT INTO `rmreturn` (`rmReturnID`, `returnDate`, `returnTime`, `supID`, `orderReturnAmt`, `discription`, `deleted`) VALUES
(1, '2017-11-18', '00:00:00', 1, '4.00', '', 0),
(2, '2017-11-18', '00:00:00', 1, '7500.00', '', 0),
(3, '2017-11-18', '21:07:09', 1, '4.00', '', 0),
(4, '2017-11-18', '22:37:19', 0, '0.00', '', 0),
(5, '2017-11-18', '23:21:22', 1, '23.00', '', 0),
(6, '2017-11-18', '23:22:10', 2, '16.00', '', 0),
(7, '2017-11-18', '23:23:22', 1, '5.00', '', 0),
(8, '2017-12-20', '16:56:15', 1, '5.00', 'kela wela', 0);

--
-- Triggers `rmreturn`
--
DELIMITER $$
CREATE TRIGGER `add_time_rm_return` BEFORE INSERT ON `rmreturn` FOR EACH ROW SET NEW.returnTime = curtime()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `rmreturnitem`
--

CREATE TABLE `rmreturnitem` (
  `rmReturnItemID` int(10) NOT NULL,
  `rmReturnID` int(10) NOT NULL,
  `rmID` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  `tot` decimal(10,2) NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rmreturnitem`
--

INSERT INTO `rmreturnitem` (`rmReturnItemID`, `rmReturnID`, `rmID`, `qty`, `rate`, `tot`, `deleted`) VALUES
(1, 2, 1, 500, '4.00', '2000.00', 0),
(2, 2, 2, 500, '5.00', '2500.00', 0),
(3, 2, 3, 500, '6.00', '3000.00', 0),
(4, 3, 1, 1, '4.00', '4.00', 0),
(5, 5, 1, 1, '4.00', '4.00', 0),
(6, 5, 2, 1, '5.00', '5.00', 0),
(7, 5, 7, 1, '14.00', '14.00', 0),
(8, 6, 2, 1, '5.00', '5.00', 0),
(9, 6, 2, 1, '5.00', '5.00', 0),
(10, 6, 3, 1, '6.00', '6.00', 0),
(11, 7, 2, 1, '5.00', '5.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `salesorder`
--

CREATE TABLE `salesorder` (
  `sOrderID` int(10) NOT NULL,
  `sOrderDate` date NOT NULL,
  `cusID` int(10) NOT NULL,
  `tot` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `grandTot` decimal(10,2) NOT NULL,
  `payType` int(1) NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salesorder`
--

INSERT INTO `salesorder` (`sOrderID`, `sOrderDate`, `cusID`, `tot`, `discount`, `grandTot`, `payType`, `deleted`) VALUES
(2, '2017-11-18', 1, '28.00', '0.00', '28.00', 1, 1),
(10, '2017-11-18', 1, '28.00', '0.00', '28.00', 1, 0),
(11, '2017-11-18', 2, '28.00', '0.00', '28.00', 1, 1),
(12, '2017-11-17', 1, '186.00', '0.00', '186.00', 3, 1),
(13, '2017-11-10', 1, '148.00', '0.00', '148.00', 2, 0),
(14, '2017-11-01', 3, '28.00', '0.00', '28.00', 1, 0),
(15, '2017-11-09', 1, '28.00', '0.00', '28.00', 2, 0),
(5000, '0000-00-00', 1, '60.00', '0.00', '60.00', 2, 1),
(5001, '0000-00-00', 2, '60.00', '0.00', '60.00', 2, 0),
(5002, '0000-00-00', 1, '280.00', '0.00', '280.00', 1, 0),
(5003, '0000-00-00', 1, '112.00', '0.00', '112.00', 1, 0),
(5004, '0000-00-00', 1, '23800.00', '0.00', '23800.00', 1, 1),
(5005, '0000-00-00', 2, '23800.00', '0.00', '23800.00', 1, 1),
(5006, '0000-00-00', 2, '23800.00', '0.00', '23800.00', 1, 1),
(5007, '0000-00-00', 2, '23800.00', '0.00', '23800.00', 1, 1),
(5008, '0000-00-00', 1, '490000.00', '0.00', '490000.00', 1, 0),
(5009, '0000-00-00', 1, '49000.00', '0.00', '49000.00', 1, 0),
(5010, '0000-00-00', 2, '60.00', '0.00', '60.00', 1, 0),
(5011, '2017-11-18', 0, '98.00', '120.00', '450.00', 0, 1),
(5012, '2017-11-21', 2, '154.00', '0.00', '154.00', 1, 0),
(5013, '2017-11-21', 2, '155.00', '0.00', '155.00', 1, 0),
(5014, '2017-11-21', 1, '28.00', '0.00', '28.00', 2, 0),
(5015, '2017-11-21', 440016, '600.00', '0.00', '600.00', 1, 0),
(5016, '2017-11-22', 440016, '28.00', '0.00', '28.00', 2, 0),
(5017, '2017-11-27', 1, '60.00', '0.00', '60.00', 1, 0),
(5018, '2017-11-28', 440016, '60.00', '0.00', '60.00', 3, 0),
(5019, '2017-12-21', 1, '60.00', '0.00', '60.00', 2, 0),
(5020, '2017-12-21', 440016, '274750.00', '0.00', '274750.00', 2, 0),
(5021, '2017-12-21', 440016, '249400.00', '0.00', '249400.00', 2, 0),
(5022, '2017-12-21', 440016, '122000.00', '0.00', '122000.00', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sorderitem`
--

CREATE TABLE `sorderitem` (
  `sOrderItemID` int(10) NOT NULL,
  `sOrderID` int(10) NOT NULL,
  `productID` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  `tot` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sorderitem`
--

INSERT INTO `sorderitem` (`sOrderItemID`, `sOrderID`, `productID`, `qty`, `rate`, `tot`) VALUES
(22, 9, 4, 1, '0.00', '60.00'),
(23, 2, 1, 1, '0.00', '28.00'),
(24, 2, 1, 1, '0.00', '28.00'),
(25, 10, 1, 1, '0.00', '28.00'),
(26, 11, 1, 1, '0.00', '28.00'),
(27, 12, 5, 1, '0.00', '98.00'),
(28, 12, 4, 1, '0.00', '60.00'),
(29, 12, 1, 1, '0.00', '28.00'),
(30, 13, 4, 1, '0.00', '60.00'),
(31, 13, 4, 1, '0.00', '60.00'),
(32, 13, 1, 1, '0.00', '28.00'),
(33, 14, 1, 1, '28.00', '28.00'),
(34, 15, 1, 1, '28.00', '28.00'),
(35, 0, 1, 301, '0.00', '0.00'),
(36, 5001, 4, 1, '60.00', '60.00'),
(37, 5002, 1, 10, '28.00', '280.00'),
(38, 5003, 1, 4, '28.00', '112.00'),
(39, 5009, 5, 500, '98.00', '49000.00'),
(40, 5010, 4, 1, '60.00', '60.00'),
(41, 5011, 5, 1, '0.00', '98.00'),
(42, 0, 4, 1, '0.00', '60.00'),
(43, 5012, 1, 1, '28.00', '28.00'),
(44, 5012, 5, 1, '98.00', '98.00'),
(45, 5012, 1, 1, '28.00', '28.00'),
(46, 5013, 6, 1, '155.00', '155.00'),
(47, 5014, 1, 1, '28.00', '28.00'),
(48, 5015, 4, 10, '60.00', '600.00'),
(49, 5016, 1, 1, '28.00', '28.00'),
(50, 5017, 4, 1, '60.00', '60.00'),
(51, 5018, 4, 1, '60.00', '60.00'),
(52, 5019, 4, 1, '60.00', '60.00'),
(53, 5020, 1, 1000, '28.00', '28000.00'),
(54, 5020, 4, 750, '60.00', '45000.00'),
(55, 5020, 5, 1800, '98.00', '176400.00'),
(56, 5021, 1, 1000, '28.00', '28000.00'),
(57, 5021, 4, 750, '60.00', '45000.00'),
(58, 5022, 1, 1000, '28.00', '28000.00'),
(59, 5022, 4, 750, '60.00', '45000.00'),
(60, 5022, 5, 500, '98.00', '49000.00');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supID` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `address1` varchar(100) NOT NULL,
  `address2` varchar(100) NOT NULL,
  `address3` varchar(100) NOT NULL,
  `supTp` varchar(15) NOT NULL,
  `supNIC` varchar(15) NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supID`, `fname`, `lname`, `address1`, `address2`, `address3`, `supTp`, `supNIC`, `deleted`) VALUES
(1, 'Suranja', 'Liyanage', 'No 45', 'Moragasmulla', 'Bibile', '94717039441', '940731720v', 0),
(2, 'Gihan', 'Fernando', '421', 'Halgahadeniya', 'Monaragala', '94702378925', '960401184v', 0),
(3, 'Saddeep', 'Mihiranga', '45Lane', 'Chioyon', 'Kahangama', '94766295259', '970465710v', 0),
(440026, 'Chamal', 'Gayan', '78/B', 'Nawalakanda', 'Mahiyanganaya', '94716505314', '903456789v', 0),
(440027, 'hjgvhj', 'jhbhjb', 'hjbjhb', 'jbjhb', 'hjbh', '94785412354', '974258962v', 1),
(440028, 'jhbjk', 'kjnkjn', 'kjnjkn', 'kjnjkn', 'kjnjkn', '9471703955', '987541235v', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uID` int(10) NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uID`, `name`) VALUES
(1, '1234'),
(2, '1234'),
(3, '4'),
(4, '2017-12-12'),
(5, '50'),
(6, '4545'),
(7, '2017-12-12'),
(80, '2017-12-12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `userType` varchar(50) NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `userType`, `deleted`) VALUES
(1, 'manager', '81dc9bdb52d04dc20036dbd8313ed055', 'Manager', 0),
(2, 'stock', '81dc9bdb52d04dc20036dbd8313ed055', 'Stock Manager', 0),
(3, 'rasika', 'c21170f4a8bdf85d111efa82e9798a39', 'Stock Manager', 0),
(4, 'suranja', 'fe008700f25cb28940ca8ed91b23b354', 'Stock Manager', 1),
(5, 'suranja', 'fe008700f25cb28940ca8ed91b23b354', 'Stock Manager', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addproduct`
--
ALTER TABLE `addproduct`
  ADD PRIMARY KEY (`addProductID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cusID`);

--
-- Indexes for table `damproreturn`
--
ALTER TABLE `damproreturn`
  ADD PRIMARY KEY (`damProReturnID`);

--
-- Indexes for table `damproreturnitem`
--
ALTER TABLE `damproreturnitem`
  ADD PRIMARY KEY (`damProReturnItemID`);

--
-- Indexes for table `damrmreturn`
--
ALTER TABLE `damrmreturn`
  ADD PRIMARY KEY (`damRMReturnID`);

--
-- Indexes for table `damrmreturnitem`
--
ALTER TABLE `damrmreturnitem`
  ADD PRIMARY KEY (`damRMReturnItemID`);

--
-- Indexes for table `grn`
--
ALTER TABLE `grn`
  ADD PRIMARY KEY (`grnID`);

--
-- Indexes for table `grnitem`
--
ALTER TABLE `grnitem`
  ADD PRIMARY KEY (`grnItemID`);

--
-- Indexes for table `issuerm`
--
ALTER TABLE `issuerm`
  ADD PRIMARY KEY (`issueRMID`);

--
-- Indexes for table `issuermitem`
--
ALTER TABLE `issuermitem`
  ADD PRIMARY KEY (`issueRMItemID`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`msgID`);

--
-- Indexes for table `porderitem`
--
ALTER TABLE `porderitem`
  ADD PRIMARY KEY (`pOrderItemID`);

--
-- Indexes for table `preturnitem`
--
ALTER TABLE `preturnitem`
  ADD PRIMARY KEY (`pRreturnItemID`);

--
-- Indexes for table `production`
--
ALTER TABLE `production`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `productreturn`
--
ALTER TABLE `productreturn`
  ADD PRIMARY KEY (`pReturnID`);

--
-- Indexes for table `purchaseorder`
--
ALTER TABLE `purchaseorder`
  ADD PRIMARY KEY (`pOrderID`);

--
-- Indexes for table `rmitem`
--
ALTER TABLE `rmitem`
  ADD PRIMARY KEY (`rmID`);

--
-- Indexes for table `rmreturn`
--
ALTER TABLE `rmreturn`
  ADD PRIMARY KEY (`rmReturnID`);

--
-- Indexes for table `rmreturnitem`
--
ALTER TABLE `rmreturnitem`
  ADD PRIMARY KEY (`rmReturnItemID`);

--
-- Indexes for table `salesorder`
--
ALTER TABLE `salesorder`
  ADD PRIMARY KEY (`sOrderID`);

--
-- Indexes for table `sorderitem`
--
ALTER TABLE `sorderitem`
  ADD PRIMARY KEY (`sOrderItemID`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addproduct`
--
ALTER TABLE `addproduct`
  MODIFY `addProductID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cusID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=440028;
--
-- AUTO_INCREMENT for table `damproreturn`
--
ALTER TABLE `damproreturn`
  MODIFY `damProReturnID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `damproreturnitem`
--
ALTER TABLE `damproreturnitem`
  MODIFY `damProReturnItemID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `damrmreturn`
--
ALTER TABLE `damrmreturn`
  MODIFY `damRMReturnID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `damrmreturnitem`
--
ALTER TABLE `damrmreturnitem`
  MODIFY `damRMReturnItemID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `grn`
--
ALTER TABLE `grn`
  MODIFY `grnID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `grnitem`
--
ALTER TABLE `grnitem`
  MODIFY `grnItemID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;
--
-- AUTO_INCREMENT for table `issuerm`
--
ALTER TABLE `issuerm`
  MODIFY `issueRMID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `issuermitem`
--
ALTER TABLE `issuermitem`
  MODIFY `issueRMItemID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `msgID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `porderitem`
--
ALTER TABLE `porderitem`
  MODIFY `pOrderItemID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;
--
-- AUTO_INCREMENT for table `preturnitem`
--
ALTER TABLE `preturnitem`
  MODIFY `pRreturnItemID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;
--
-- AUTO_INCREMENT for table `production`
--
ALTER TABLE `production`
  MODIFY `productID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `productreturn`
--
ALTER TABLE `productreturn`
  MODIFY `pReturnID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;
--
-- AUTO_INCREMENT for table `purchaseorder`
--
ALTER TABLE `purchaseorder`
  MODIFY `pOrderID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT for table `rmitem`
--
ALTER TABLE `rmitem`
  MODIFY `rmID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `rmreturn`
--
ALTER TABLE `rmreturn`
  MODIFY `rmReturnID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `rmreturnitem`
--
ALTER TABLE `rmreturnitem`
  MODIFY `rmReturnItemID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `salesorder`
--
ALTER TABLE `salesorder`
  MODIFY `sOrderID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5023;
--
-- AUTO_INCREMENT for table `sorderitem`
--
ALTER TABLE `sorderitem`
  MODIFY `sOrderItemID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=440029;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
