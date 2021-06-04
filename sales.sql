-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 08, 2019 at 01:44 PM
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
-- Database: `web`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlog`
--

DROP TABLE IF EXISTS `adminlog`;
CREATE TABLE IF NOT EXISTS `adminlog` (
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminlog`
--

INSERT INTO `adminlog` (`email`, `password`) VALUES
('admin', '1234'),
('admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `categorytable`
--

DROP TABLE IF EXISTS `categorytable`;
CREATE TABLE IF NOT EXISTS `categorytable` (
  `cat` varchar(30) NOT NULL,
  PRIMARY KEY (`cat`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorytable`
--

INSERT INTO `categorytable` (`cat`) VALUES
('Fan'),
('Projector'),
('switch'),
('Tube Light');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

DROP TABLE IF EXISTS `class`;
CREATE TABLE IF NOT EXISTS `class` (
  `cl` varchar(30) NOT NULL,
  PRIMARY KEY (`cl`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`cl`) VALUES
('EL100'),
('EL101'),
('EL102'),
('EL103');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

DROP TABLE IF EXISTS `complaints`;
CREATE TABLE IF NOT EXISTS `complaints` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FNAME` varchar(30) NOT NULL,
  `LNAME` varchar(30) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `CAT` varchar(30) NOT NULL,
  `CLASS` varchar(30) NOT NULL,
  `COMP` varchar(100) NOT NULL,
  `status` varchar(30) NOT NULL,
  `time` timestamp NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`ID`, `FNAME`, `LNAME`, `EMAIL`, `CAT`, `CLASS`, `COMP`, `status`, `time`) VALUES
(57, 'Thanush', 'Bangera', 'thanushbangera@gmail.com', 'switch', 'EL100', 'damaged', 'Not Process Yet', '2019-12-02 11:59:02'),
(56, 'pavan', 'nayak', 'pavan@gmail.com', 'Tube Light', 'EL103', 'not working from yesterday', 'Not Process Yet', '2019-12-02 11:58:05'),
(54, 'Sush', 'Hegde', 'sush@gmail.com', 'Projector', 'EL102', 'cc', 'In Process', '2019-12-02 11:53:25'),
(55, 'pavan', 'nayak', 'pavan@gmail.com', 'Fan', 'EL101', 'not working', 'Not Process Yet', '2019-12-02 11:57:32'),
(58, 'vinyak', 'naik', 'vinyak@gmail.com', 'Projector', 'EL102', 'not working !!!', 'Not Process Yet', '2019-12-02 11:59:37'),
(59, 'Thanush', 'Bangera', 'thanushbangera@gmail.com', 'Projector', 'EL102', 'hwu', 'Not Process Yet', '2019-12-02 22:28:13');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `password`, `flag`) VALUES
(1, 'Sush', 'Hegde', 'sush@gmail.com', '12345', 1),
(11, 'Thanush', 'Bangera', 'thanushbangera@gmail.com', '12345', 1),
(15, 'wins', 'ston', 'wi@gmail.com', '2345', 1),
(18, 'vinyak', 'naik', 'vinyak@gmail.com', '25619', 1),
(19, 'pavan', 'nayak', 'pavan@gmail.com', '23456', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
