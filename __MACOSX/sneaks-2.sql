-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2018 at 01:11 PM
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
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `ItemID` int(11) NOT NULL,
  `I_Brand` varchar(50) NOT NULL,
  `I_Type` varchar(50) NOT NULL,
  `I_Gender` varchar(8) NOT NULL,
  `I_Name` varchar(255) NOT NULL,
  `I_Price` int(11) NOT NULL,
  `I_Stock` int(11) NOT NULL,
  `I_Size` varchar(50) NOT NULL,
  `I_Image` varchar(255) NOT NULL,
  `I_Description` longtext NOT NULL,
  `AddedDate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`ItemID`, `I_Brand`, `I_Type`, `I_Gender`, `I_Name`, `I_Price`, `I_Stock`, `I_Size`, `I_Image`, `I_Description`, `AddedDate`) VALUES
(1, 'Ewan', 'Janjan', '', 'janjan', 5000, 12, '', 'asdf', 'EWANEWANEAWNEAWEAW', '05/19/2018'),
(2, 'Ewan', 'MAMA', '', 'MEDINA', 11000, 10, '', 'asdf', 'WOWOWOWOWOW', '05/19/2018');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `Date` varchar(30) NOT NULL,
  `Time` varchar(15) NOT NULL,
  `Items` varchar(255) NOT NULL,
  `Total` int(11) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `Contact` varchar(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `PaymentOption` varchar(20) NOT NULL,
  `Address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `Date`, `Time`, `Items`, `Total`, `Status`, `Contact`, `Email`, `PaymentOption`, `Address`) VALUES
(1, '05/19/2018', '12:37:58', '', 559516, 'PENDING', '09210432052', '2015081398@ust-ics.mygbiz.com', 'COD', 'Blk 23 Lot 11 Viceroy St. East Fairview Q.C.'),
(2, '05/19/2018', '01:16:17', '1@5000@5@10?2@5000@2@5', 47000, 'PENDING', '09210432052', 'medinajuanantonio95@gmail.com', 'COD', 'Blk 23 Lot 11 Viceroy St. East Fairview Q.C.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `U_FirstName` varchar(255) NOT NULL,
  `U_MiddleName` varchar(255) NOT NULL,
  `U_LastName` varchar(255) NOT NULL,
  `U_Password` varchar(255) NOT NULL,
  `U_Email` varchar(255) NOT NULL,
  `U_Contact` varchar(11) NOT NULL,
  `U_AccountType` varchar(9) NOT NULL,
  `U_Address` varchar(255) NOT NULL,
  `U_Cart` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `U_FirstName`, `U_MiddleName`, `U_LastName`, `U_Password`, `U_Email`, `U_Contact`, `U_AccountType`, `U_Address`, `U_Cart`) VALUES
(1, 'Juan Antonio', 'Pineda', 'Medina', '81dc9bdb52d04dc20036dbd8313ed055', 'medinajuanantonio95@gmail.com', '09210432052', 'USER', 'Blk 23 Lot 11 Viceroy St. East Fairview Q.C.', ''),
(2, 'Janjan', '', 'Medina', '81dc9bdb52d04dc20036dbd8313ed055', '2015081398@ust-ics.mygbiz.com', '09210432052', 'USER', 'Blk 23 Lot 11 Viceroy St. East Fairview Q.C.', '1@1500@5@10?2@5000@2@5'),
(3, 'janjan', '', 'medina', '81dc9bdb52d04dc20036dbd8313ed055', 'janjan@email.com', '09210432052', 'USER', 'bahay namin', '1@1000@5@10?2@5000@2@5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`ItemID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `ItemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
