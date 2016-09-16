-- phpMyAdmin SQL Dump
-- version 4.4.13.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 16, 2016 at 01:28 PM
-- Server version: 5.6.31-0ubuntu0.15.10.1
-- PHP Version: 5.6.11-1ubuntu3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cazri`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `UserName` varchar(10) NOT NULL,
  `Password` varchar(60) NOT NULL,
  `Name of Nursery` varchar(40) NOT NULL,
  `Name of owner` varchar(20) NOT NULL,
  `Location` varchar(50) NOT NULL,
  `contact no` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`UserName`, `Password`, `Name of Nursery`, `Name of owner`, `Location`, `contact no`) VALUES
('admin', 'admin', 'CAZRI', 'CAZRI', 'CZARI', 1234567890),
('test1', 'test1', 'test1', 'test1', 'test1', 987654321),
('test2', 'test2', 'test2', 'test2', 'test2', 1236549870),
('test3', 'test3', 'test3', 'test3', 'jodhpur', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `plant_list`
--

CREATE TABLE IF NOT EXISTS `plant_list` (
  `Name of plant` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `test1` int(11) NOT NULL,
  `test2` int(11) NOT NULL,
  `test3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plant_list`
--

INSERT INTO `plant_list` (`Name of plant`, `price`, `test1`, `test2`, `test3`) VALUES
('tulsi', 100, 2, 200, 300),
('Neem', 125, 100, 200, 300),
('Ashoka', 100, 99, 197, 300),
('Rose', 100, 100, 200, 100);

-- --------------------------------------------------------

--
-- Table structure for table `selling`
--

CREATE TABLE IF NOT EXISTS `selling` (
  `UserName` varchar(10) NOT NULL,
  `Date` date NOT NULL,
  `Name of plant` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `total sell` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `selling`
--

INSERT INTO `selling` (`UserName`, `Date`, `Name of plant`, `price`, `total sell`) VALUES
('test1', '0000-00-00', '', 10, 1),
('test2', '0000-00-00', '', 20, 2),
('test1', '0000-00-00', 'tulsi', 10.5, 0),
('test2', '0000-00-00', 'tulsi', 10.5, 1),
('test2', '2007-09-16', 'tulsi', 10.5, 10),
('test2', '2007-09-16', '--select--', 0, 0),
('test1', '2007-09-16', 'tulsi', 10.5, 0),
('test1', '2007-09-16', 'tulsi', 10.5, 0),
('', '2007-09-16', 'tulsi', 10.5, 2),
('', '2007-09-16', 'tulsi', 10.5, 2),
('', '2007-09-16', 'tulsi', 10.5, 2),
('test2', '2007-09-16', '--select--', 0, 0),
('test1', '2016-09-07', 'tulsi', 10.5, 2),
('test1', '2016-09-08', 'Rose', 200, 4),
('test1', '2016-09-08', 'Rose', 200, 8),
('test2', '2016-09-08', 'Ashoka', 50, 5),
('test1', '2016-09-08', 'tulsi', 100, 2),
('test1', '2016-09-08', 'tulsi', 100, 2),
('test1', '2016-09-08', 'tulsi', 100, 1),
('test1', '2016-09-08', 'tulsi', 100, 1),
('test1', '2016-09-08', 'tulsi', 100, 2),
('test2', '2016-09-08', 'Ashoka', 100, 7),
('test2', '2016-09-08', 'Ashoka', 100, 0),
('test1', '2016-09-14', 'tulsi', 100, 4),
('test1', '2016-09-14', 'Ashoka', 100, 5),
('test3', '2016-09-14', 'Rose', 100, 300);

-- --------------------------------------------------------

--
-- Stand-in structure for view `test1`
--
CREATE TABLE IF NOT EXISTS `test1` (
`Date` date
,`Name of plant` varchar(50)
,`price` float
,`total sell` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `test2`
--
CREATE TABLE IF NOT EXISTS `test2` (
`Date` date
,`Name of plant` varchar(50)
,`price` float
,`total sell` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `test3`
--
CREATE TABLE IF NOT EXISTS `test3` (
`Date` date
,`Name of plant` varchar(50)
,`price` float
,`total sell` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `test1`
--
DROP TABLE IF EXISTS `test1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `test1` AS select `selling`.`Date` AS `Date`,`selling`.`Name of plant` AS `Name of plant`,`selling`.`price` AS `price`,`selling`.`total sell` AS `total sell` from `selling` where (`selling`.`UserName` = 'test1');

-- --------------------------------------------------------

--
-- Structure for view `test2`
--
DROP TABLE IF EXISTS `test2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `test2` AS select `selling`.`Date` AS `Date`,`selling`.`Name of plant` AS `Name of plant`,`selling`.`price` AS `price`,`selling`.`total sell` AS `total sell` from `selling` where (`selling`.`UserName` = 'test2');

-- --------------------------------------------------------

--
-- Structure for view `test3`
--
DROP TABLE IF EXISTS `test3`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `test3` AS select `selling`.`Date` AS `Date`,`selling`.`Name of plant` AS `Name of plant`,`selling`.`price` AS `price`,`selling`.`total sell` AS `total sell` from `selling` where (`selling`.`UserName` = 'test3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`UserName`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
