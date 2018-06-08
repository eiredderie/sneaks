-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2018 at 03:52 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

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
  `I_Price` float NOT NULL,
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
(1, 'Sprite Rite', 'Casual', 'Boys', 'Surprize Sneakers (Navy)', 1466.12, 12, '5,6,7,8,9,10,11,12', 'assets/img/Boys/surprizesneakernavy.jpg', 'For cozy-yet-cool style, Surprize by Stride Rite Tanner sneakers pack a sporty punch for busy feet. The memory foam footbed provides a cushy foundation for overactive soles, while the anti-stink linking repels odor so he can enjoy hours of play -- without a whiff of sweat. For your peace of mind, these sneakers feature durable cupsoles to help protect against stubs and stumbles.\r\n\r\n', '05/19/2018'),
(2, 'Ewan', 'MAMA', 'Boys', 'MEDINA', 11000, 10, '5,6,7,8,9,10,11,12', 'assets/img/Boys/baselinek.jpg', 'WOWOWOWOWOW', '05/19/2018'),
(3, 'Sprite Rite', 'Casual', 'Boys', 'Surprize Sneakers (Red)', 1466.12, 12, '5,6,7,8,9,10,11,12', 'assets/img/Boys/surprizesneakersred.jpg', 'For cozy-yet-cool style, Surprize by Stride Rite Tanner sneakers pack a sporty punch for busy feet. The memory foam footbed provides a cushy foundation for overactive soles, while the anti-stink linking repels odor so he can enjoy hours of play -- without a whiff of sweat. For your peace of mind, these sneakers feature durable cupsoles to help protect against stubs and stumbles.', '05/19/2018'),
(4, 'Cat&Jack', 'Casual', 'Boys', 'Marty Double Strap', 1047.08, 12, '5,6,7,8,9,10,11,12', 'assets/img/Marty-Double-Strap.jpeg', 'Bring a little retro pep to his step with the Marty Double-Strap Sneakers from Cat & Jack™. These brown faux leather sneakers are the perfect finishing touch to any outfit — with the two top straps, they’ll stay securely on his feet, no matter what he’s up to.', '05/19/2018'),
(5, 'Cat&Jack', 'Casual', 'Boys', 'Cayden Mid Top (Tan)', 1047.08, 0, '5,6,7,8,9,10,11,12', 'assets/img/Boys/caydenmidtoptan.jpg', 'Let your boy rock a casual-cool style anywhere — from the playground to the classroom — with the Cayden Mid-Top Casual Sneakers from Cat & Jack™. With the stitched detail, contrasting sole and zipper closure, these shoes will quickly become his go-to adventure wear.', '05/19/2018'),
(6, 'Cat&Jack', 'Casual', 'Boys', 'Cayden Mid Top (Burgundy)', 1047.08, 0, '5,6,7,8,9,10,11,12', 'assets/img/Boys/caydenmidtopburgund.jpg', 'Let your boy rock a casual-cool style anywhere — from the playground to the classroom — with the Cayden Mid-Top Casual Sneakers from Cat & Jack™. With the stitched detail, contrasting sole and zipper closure, these shoes will quickly become his go-to adventure wear.', '05/19/2018'),
(7, 'Art Class', 'Casual', 'Boys', 'Wiley High Top (White)', 1204.22, 0, '5,6,7,8,9,10,11,12', 'assets/img/Boys/wileyhightopwhite.jpg', 'Your little superstar will love the cool, grown-up look of these Lace-Up Sneakers from art class™. With a sporty low profile and no heel, these simple athletic shoes will provide a cool and comfy look with a variety of different outfits. Extra textured details on these casual sneakers include a tag on the tongue, a shiny heel tab and sporty punched-out stripes on the sides.', '05/19/2018'),
(8, 'Art Class', 'Casual', 'Boys', 'Wiley High Top (Black)', 1204.22, 0, '5,6,7,8,9,10,11,12', 'assets/img/Boys/wileyhightopblack.jpg', 'Your little superstar will love the cool, grown-up look of these Lace-Up Sneakers from art class™. With a sporty low profile and no heel, these simple athletic shoes will provide a cool and comfy look with a variety of different outfits. Extra textured details on these casual sneakers include a tag on the tongue, a shiny heel tab and sporty punched-out stripes on the sides.', '05/19/2018'),
(9, 'Adidas', 'Casual', 'Boys', 'Kids’ Adidas Basline K', 2247.5, 0, '', 'assets/img/baselinek.jpg', 'They\'ll love sporting clean and classic style in the Adidas Baseline K! These sneakers feature smooth leather uppers, signature 3-stripes branding detail, and comfort cushioned insole for all day comfort. ', '05/19/2018');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`ItemID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `ItemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
