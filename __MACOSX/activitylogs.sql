-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2018 at 11:47 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sneaks`
--

-- --------------------------------------------------------

--
-- Table structure for table `activitylogs`
--

CREATE TABLE `activitylogs` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Date` varchar(25) NOT NULL,
  `Time` varchar(25) NOT NULL,
  `Activity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activitylogs`
--

INSERT INTO `activitylogs` (`ID`, `UserID`, `Date`, `Time`, `Activity`) VALUES
(1, 4, 'May 24, 2015', '8:00am', 'Added Nike Sneaks 2'),
(2, 4, 'May 26, 2015', '6:00am', 'Added Nike Sneaks 10'),
(3, 4, 'May 25, 2018', '11:07pm', 'Juan Antonio Juan Antonio Logged In'),
(4, 3, 'May 25, 2018', '11:08pm', 'janjan medina Logged In'),
(5, 3, 'May 25, 2018', '11:10pm', 'janjan janjan UPDATED Order  STATUS TO BEING DELIVERED'),
(6, 3, 'May 25, 2018', '11:28pm', 'janjan medina Deactivated User 5'),
(7, 3, 'May 25, 2018', '11:28pm', 'janjan medina Activated User 5'),
(8, 3, 'May 25, 2018', '11:29pm', 'janjan medina Finished Order  STATUS TO BEING DELIVERED');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activitylogs`
--
ALTER TABLE `activitylogs`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activitylogs`
--
ALTER TABLE `activitylogs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
