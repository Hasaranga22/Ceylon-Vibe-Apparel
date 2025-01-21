-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jan 21, 2025 at 07:01 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thousesl`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `adminID` int(20) NOT NULL,
  `adminEmail` varchar(200) NOT NULL,
  `adminPassword` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`adminID`, `adminEmail`, `adminPassword`) VALUES
(2, 'admin@gmail.com', '$2y$10$P8WplfGCN6ofxAAhV9BXXu6gJVZzhCDI9htBkxLj3b7FFyI.DUD4a'),
(3, 'admin2@gmail.com', '$2y$10$YhwQVLP6E3s/cO/2s353rew0MR9jXM/nk/RkJMbAGSKVCFwEtpgg2');

-- --------------------------------------------------------

--
-- Table structure for table `casualshorts`
--

CREATE TABLE `casualshorts` (
  `tshirtID` int(20) NOT NULL,
  `tName` varchar(100) DEFAULT NULL,
  `tNowPrice` varchar(20) NOT NULL,
  `tThenPrice` varchar(20) NOT NULL,
  `tImage` varchar(250) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `casualshorts`
--

INSERT INTO `casualshorts` (`tshirtID`, `tName`, `tNowPrice`, `tThenPrice`, `tImage`, `quantity`) VALUES
(19, 'Men’s Casual Shorts Bundle Pack 0011', '3350.00', '4000.00', 'Casual-Shorts-Bundle-Pack-Offer-0011.webp', 10),
(20, 'Navy Blue Men’s Casual Short', '1195.00', '1465.00', 'Navy-Blue-Mens-Casual-Short.webp', 0),
(21, 'Navy Blue Men’s Casual Short', '1195.00', '1465.00', 'Scarlet-Red-Mens-Casual-Short.webp', 0),
(22, 'Charcoal Grey Marl Men’s Casual Short', '1195.00', '1465.00', 'Charcoal-Grey-Mens-Casual-Short.webp', 0),
(23, 'Men’s Casual Shorts Bundle Pack 0012', '3350.00', '4000.00', 'Casual-Shorts-Bundle-Pack-Offer-0012.webp', 0),
(24, 'Men’s Casual Shorts Bundle Pack 0015', '3350.00', '4000.00', 'Casual-Shorts-Bundle-Pack-Offer-0015.webp', 0),
(25, 'Grey Marl Men’s Casual Short', '1195.00', '1465.00', 'Raven-Black-Mens-Casual-Short.webp', 0),
(26, 'Men’s Casual Shorts Bundle Pack 0014', '3350.00', '4000.00', 'Casual-Shorts-Bundle-Pack-Offer-0014.webp', 0),
(27, 'Men’s Casual Shorts Bundle Pack 0013', '3350.00', '4000.00', 'Casual-Shorts-Bundle-Pack-Offer-0013.jpg', 0),
(28, 'Maroon Men’s Casual Short', '1195.00', '1465.00', 'Maroon-Mens-Casual-Short.webp', 0),
(29, 'Sky Blue Marl Men’s Casual Short', '1195.00', '1465.00', 'Sky-Blue-Mens-Casual-Short.webp', 0),
(30, 'Sea Green Marl Men’s Casual Short', '1195.00', '1465.00', 'Sea-Green-Mens-Casual-Short.webp', 0),
(31, 'Cotton White Men’s Casual Short', '1195.00', '1465.00', 'Cotton-White-Mens-Casual-Short.webp', 0),
(32, 'Hot Pink Men’s Casual Short', '1195.00', '1465.00', 'Hot-Pink-Mens-Casual-Short.webp', 0),
(33, 'Carbon Blue Men’s Casual Short', '1195.00', '1465.00', 'Carbon-Blue-Mens-Casual-Short.webp', 0),
(34, 'Bumblebee Yellow Men’s Casual Short', '1195.00', '1465.00', 'Bumblebee-Yellow-Mens-Casual-Short.webp', 0),
(35, 'Men’s Casual Shorts Bundle Pack 0016', '3350.00', '4000.00', 'Casual-Shorts-Bundle-Pack-Offer-0016.webp', 0);

-- --------------------------------------------------------

--
-- Table structure for table `casualshortscart`
--

CREATE TABLE `casualshortscart` (
  `cartID` int(20) NOT NULL,
  `itemCode` int(20) NOT NULL,
  `quantity` int(20) NOT NULL,
  `itemSize` varchar(10) NOT NULL,
  `usersId` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `casualshortscart`
--

INSERT INTO `casualshortscart` (`cartID`, `itemCode`, `quantity`, `itemSize`, `usersId`) VALUES
(4, 7, 1, 'm', 'navodahasaranga9@gmail.com'),
(8, 23, 1, 'xxl', 'madura@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `country` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `note` text DEFAULT NULL,
  `itemCode` varchar(50) NOT NULL,
  `itemImage` text NOT NULL,
  `itemName` varchar(255) NOT NULL,
  `itemSize` varchar(50) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `itemTotal` decimal(10,2) NOT NULL,
  `totalBill` decimal(10,2) NOT NULL,
  `orderDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id`, `firstName`, `lastName`, `address`, `country`, `phone`, `email`, `note`, `itemCode`, `itemImage`, `itemName`, `itemSize`, `quantity`, `itemTotal`, `totalBill`, `orderDate`) VALUES
(76, 'Madura', 'Jeewantha', 'Polgasowita', 'Sri lanka', '0772360588', 'madura@gmail.com', 'No', '22', 'Crew-Neck-T-Shirts-Bundle-Pack-Offer-0060-V2.webp', 'Men’s Crew Neck T Shirts Bundle Pack Offer', 'xxl', 1, 3350.00, 9545.00, '2025-01-19 05:12:01'),
(77, 'Madura', 'Jeewantha', 'Polgasowita', 'Sri lanka', '0772360588', 'madura@gmail.com', 'No', '33', 'Purple-Mens-Polo-T-Shirt.webp', 'Purple Men’s Polo T Shirt', 'xxl', 1, 1650.00, 9545.00, '2025-01-19 05:12:01'),
(78, 'Madura', 'Jeewantha', 'Polgasowita', 'Sri lanka', '0772360588', 'madura@gmail.com', 'No', '23', 'Casual-Shorts-Bundle-Pack-Offer-0012.webp', 'Men’s Casual Shorts Bundle Pack 0012', 'xxl', 1, 3350.00, 9545.00, '2025-01-19 05:12:01'),
(79, 'Navoda', 'Hasaranga', 'Wetara', 'Sri lanka', '0772360588', 'testmail@gmail.com', 'No', '16', 'Neon-Green-Sports-T-Shirt.webp', 'Neon Green Sports T Shirt', 'xs', 1, 1195.00, 5975.00, '2025-01-19 15:31:58'),
(80, 'Navoda', 'Hasaranga', 'Wetara', 'Sri lanka', '0772360588', 'testmail@gmail.com', 'No', '4', 'Neon-Yellow-Steel-Grey-Sports-T-Shirt.webp', 'Neon Yellow & Steel Grey Sports T Shirt', 's', 4, 4780.00, 5975.00, '2025-01-19 15:31:58'),
(81, 'abc', 'abc', 'abcAab', 'abc', '0772366056', 'testmail@gmail.com', 'no', '16', 'Neon-Green-Sports-T-Shirt.webp', 'Neon Green Sports T Shirt', 'xs', 1, 1195.00, 2845.00, '2025-01-19 16:56:25'),
(82, 'abc', 'abc', 'abcAab', 'abc', '0772366056', 'testmail@gmail.com', 'no', '29', 'Maroon-Mens-Polo-T-Shirt.webp', 'Maroon Men’s Polo T Shirt', 'm', 1, 1650.00, 2845.00, '2025-01-19 16:56:25');

-- --------------------------------------------------------

--
-- Table structure for table `customer_return`
--

CREATE TABLE `customer_return` (
  `returnID` int(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `orderNo` int(50) NOT NULL,
  `service` varchar(200) NOT NULL,
  `message` varchar(200) NOT NULL,
  `document` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_return`
--

INSERT INTO `customer_return` (`returnID`, `name`, `phone`, `email`, `orderNo`, `service`, `message`, `document`) VALUES
(7, 'Navy Blue Men’s Crew Neck T Sh', '0772366056', 'newhasaranga2002@gmail.com', 23, 'other_exchange', 'xcxc', '1380398.jpg'),
(8, 'Navy Blue Men’s Crew Neck T Sh', '0772366056', 'newhasaranga2002@gmail.com', 23, 'other_exchange', 'xcxc', '1380398.jpg'),
(9, 'Navoda', '0772366056', 'navodahasaranga9@gmail.com', 25, 'other_exchange', 'Test', 'Grey-Marl-Mens-Casual-Short.webp');

-- --------------------------------------------------------

--
-- Table structure for table `mensactivewear`
--

CREATE TABLE `mensactivewear` (
  `tshirtID` int(20) NOT NULL,
  `tName` varchar(100) DEFAULT NULL,
  `tNowPrice` varchar(20) NOT NULL,
  `tThenPrice` varchar(20) NOT NULL,
  `tImage` varchar(250) NOT NULL,
  `quantity` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mensactivewear`
--

INSERT INTO `mensactivewear` (`tshirtID`, `tName`, `tNowPrice`, `tThenPrice`, `tImage`, `quantity`) VALUES
(2, 'Royal Blue & Navy Blue Sports T Shirt', '1195', '1465', 'Royal-Blue-Navy-Blue-Sports-T-Shirt.webp', 5),
(3, 'Purple & Violet Sports T Shirt', '1195', '1465', 'Purple-Violet-Sports-T-Shirt.webp', 62),
(4, 'Neon Yellow & Steel Grey Sports T Shirt', '1195.00', '1465', 'Neon-Yellow-Steel-Grey-Sports-T-Shirt.webp', 0),
(5, 'Navy Blue & Jet Black Sports T Shirt', '1195', '1465', 'Navy-Blue-Jet-Black-Sports-T-Shirt.jpg', 8),
(6, 'Electric Red & Navy Blue Sports T Shirt', '1195.00', '1465', 'Electric-Red-Navy-Blue-Sports-T-Shirt-1.webp', 0),
(7, 'Maroon & Jet Black Sports T Shirt', '1195.00', '1465', 'Maroon-Jet-Black-Sports-T-Shirt.webp', 0),
(8, 'Salmon Pink & Steel Grey Sports T Shirt', '1195.00', '1465', 'Salmon-Pink-Steel-Grey-Sports-T-Shirt.webp', 0),
(9, 'Neon Green & Jungle Green Sports T Shirt', '1195.00', '1465', 'Neon-Green-Jungle-Green-Sports-T-Shirt.webp', 0),
(10, 'Royal Blue & Electric Red Sports T Shirt', '1195.00', '1465', 'Royal-Blue-Electric-Red-Sports-T-Shirt.webp', 0),
(11, 'Steel Grey & Cloud Grey Sports T Shirt', '1195.00', '1465', 'Steel-Grey-Cloud-Grey-Sports-T-Shirt.webp', 0),
(12, 'Jet Black & Cloud Grey Sports ', '1195.00', '1465', 'Jet-Black-Cloud-Grey-Sports-T-Shirt.webp', 0),
(13, 'Summer Blue Sports T Shirt', '1195.00', '1465', 'Summer-Blue-Sports-T-Shirt.webp', 0),
(14, 'Jet Black Sports T Shirt', '1195', '1465', 'Jet-Black-Sports-T-Shirt.webp', 8),
(15, 'Maroon Sports T Shirt', '1195.00', '1465', 'Maroon-Sports-T-Shirt.webp', 0),
(16, 'Neon Green Sports T Shirt', '1195.00', '1465', 'Neon-Green-Sports-T-Shirt.webp', 0),
(17, 'Purple Sports T Shirt', '1195.00', '1465', 'Purple-Sports-T-Shirt.webp', 0),
(18, 'Salmon Pink Sports T Shirt', '1195.00', '1465', 'Salomon-Pink-Sports-T-Shirt.webp', 0),
(19, 'Royal Blue Sports T Shirt', '1195.00', '1465', 'Royal-Blue-Sports-T-Shirt.webp', 0),
(20, 'Steel Grey Sports T Shirt', '1195.00', '1465', 'Steel-Grey-Sports-T-Shirt.webp', 0),
(21, 'Sky Blue Sports T Shirt', '1195', '1465', 'Sky-Blue-Sports-T-Shirt.webp', 9),
(22, 'Neon Yellow Sports T Shirt', '1195.00', '1465', 'Neon-Yellow-Sports-T-Shirt-1.webp', 0),
(23, 'Violet Sports T Shirt', '1195.00', '1465', 'Violet-Sports-T-Shirt.webp', 0),
(24, 'Electric Red Sports T Shirt', '1195.00', '1465', 'Electric-Red-Sports-T-Shirt.webp', 0),
(25, 'White Sports T Shirt', '1195.00', '1465', 'White-Sports-T-Shirt.webp', 0),
(26, 'Jungle Green Sports T Shirt', '1195.00', '1465', 'Jungle-Green-Sports-T-Shirt.webp', 0),
(27, 'Cloud Grey Sports T Shirt', '1195.00', '1465', 'Cloud-Grey-Sports-T-Shirt.webp', 0),
(28, 'Navy Blue Sports T Shirt', '1195.00', '1465', 'Navy-Blue-Sports-T-Shirt.webp', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mensactivewearcart`
--

CREATE TABLE `mensactivewearcart` (
  `cartID` int(200) NOT NULL,
  `itemCode` int(200) NOT NULL,
  `quantity` int(100) NOT NULL,
  `itemSize` varchar(10) NOT NULL,
  `usersId` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mensactivewearcart`
--

INSERT INTO `mensactivewearcart` (`cartID`, `itemCode`, `quantity`, `itemSize`, `usersId`) VALUES
(25, 8, 1, 'm', 'navodahasaranga9@gmail.com'),
(48, 16, 1, 'xs', 'testmail@gmail.com'),
(49, 2, 1, 'xxl', 'madura@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `menscrewneck`
--

CREATE TABLE `menscrewneck` (
  `tshirtID` int(20) NOT NULL,
  `tName` varchar(100) DEFAULT NULL,
  `tNowPrice` varchar(20) NOT NULL,
  `tThenPrice` varchar(20) NOT NULL,
  `tImage` varchar(250) NOT NULL,
  `quantity` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menscrewneck`
--

INSERT INTO `menscrewneck` (`tshirtID`, `tName`, `tNowPrice`, `tThenPrice`, `tImage`, `quantity`) VALUES
(30, 'Blaze Orange Men’s Crew Neck T Shirt', '1195', '1465', 'Blaze-Orange-Crew-Neck-T-Shirt-Ver-01.webp', 401),
(31, 'Chocolate Brown Men’s Crew Neck T Shirt', '1195', '1465', 'Chocolate-Brown-Crew-Neck-T-Shirt-Ver-01.webp', 5),
(32, 'Safari Brown Men’s Crew Neck T Shirt', '1195.00', '1465.00', 'Safari-Brown-Crew-Neck-T-Shirt-Ver-01.webp', 0),
(33, 'Mustard Men’s Crew Neck T Shirt', '1195.00', '1465.00', 'Mustard-Crew-Neck-T-Shirt-Ver-01.webp', 0),
(34, 'Brick Orange Men’s Crew Neck T Shirt', '1195.00', '1465.00', 'Brick-Orange-Crew-Neck-T-Shirt-Ver-01.webp', 0),
(35, 'Army Green Men’s Crew Neck T Shirt', '1195.00', '1465.00', 'Army-Green-Crew-Neck-T-Shirt-Ver-01.webp', 0),
(36, 'Desert Tan Men’s Crew Neck T Shirt', '1195.00', '1465.00', 'Desert-Tan-Crew-Neck-T-Shirt-Ver-01.webp', 0),
(37, 'Scarlet Red Men’s Crew Neck T Shirt', '1195.00', '1465.00', 'Scarlet-Red-Crew-Neck-T-Shirt-Ver-01.webp', 0),
(38, 'Navy Blue Men’s Crew Neck T Shirt', '1195.00', '1465.00', 'Navy-Blue-Crew-Neck-T-Shirt-Ver-01.webp', 0),
(39, 'Maroon Men’s Crew Neck T Shirt', '1195.00', '1465.00', 'Maroon-Crew-Neck-T-Shirt-Ver-01.webp', 0),
(40, 'Ice Blue Men’s Crew Neck T Shirt', '1195.00', '1465.00', 'Ice-Blue-Crew-Neck-T-Shirt-Ver-01.webp', 0),
(41, 'Cotton White Men’s Crew Neck T shirt', '1195.00', '1465.00', 'Cotton-White-Crew-Neck-T-Shirt-Ver-01.webp', 0),
(42, 'Hot Pink Men’s Crew Neck T Shirt', '1195.00', '1465.00', 'Hot-Pink-Crew-Neck-T-Shirt-Ver-01.webp', 0),
(43, 'Bumblebee Yellow Men’s Crew Neck T Shirt', '1195.00', '1465.00', 'Bumblebee-Yellow-Crew-Neck-T-Shirt-Ver-01.webp', 0),
(44, 'Carbon Blue Men’s Crew Neck T shirt', '1195.00', '1465.00', 'Carbon-Blue-Crew-Neck-T-Shirt-V10.webp', 0),
(45, 'Charcoal Grey Men’s Crew Neck T shirt ', '1195.00', '1465.00', 'Charcoal-Grey-Crew-Neck-T-Shirt-Ver-05.webp', 0),
(46, 'Sea Green Men’s Crew Neck T Shirt', '1195.00', '1465.00', 'Sea-Green-Crew-Neck-T-Shirt-Ver-01.webp', 0),
(47, 'Deep Purple Men’s Crew Neck T shirt', '1195.00', '1465.00', 'Orchid-Crew-Neck-T-Shirt-Ver-01.webp', 0),
(48, 'Grey Marl Men’s Crew Neck T Shirt', '1195.00', '1465.00', 'Grey-Marl-Crew-Neck-T-Shirt-Ver-01.webp', 0),
(49, 'Raspberry Red Men’s Crew Neck T shirt ', '1195.00', '1465.00', 'Raspberry-Red-Crew-Neck-T-Shirt-Ver-01.webp', 0),
(50, 'Sky Blue Men’s Crew Neck T Shirt', '1195.00', '1465.00', 'Sky-Blue-Crew-Neck-T-Shirt-Ver-01.webp', 0),
(51, 'Zinc Blue Men’s Crew Neck T Shirt', '1195.00', '1465.00', 'Zinc-Blue-Crew-Neck-T-Shirt-Ver-01.webp', 0),
(52, 'Bubblegum Pink Men’s Crew Neck T shirt', '1195.00', '1465.00', 'Bubblegum-Pink-Crew-Neck-T-Shirt-Ver-01.webp', 0),
(53, 'Amazon Green Men’s Crew Neck T shirt', '1195.00', '1465.00', 'Amazon-Green-Crew-Neck-T-Shirt-Ver-01.webp', 0);

-- --------------------------------------------------------

--
-- Table structure for table `menscrewneckcart`
--

CREATE TABLE `menscrewneckcart` (
  `cartID` int(20) NOT NULL,
  `itemCode` int(30) NOT NULL,
  `quantity` int(20) NOT NULL,
  `itemSize` varchar(10) NOT NULL,
  `usersId` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `polopcks`
--

CREATE TABLE `polopcks` (
  `tshirtID` int(20) NOT NULL,
  `tName` varchar(100) DEFAULT NULL,
  `tNowPrice` varchar(20) NOT NULL,
  `tThenPrice` varchar(20) NOT NULL,
  `tImage` varchar(250) NOT NULL,
  `quantity` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `polopcks`
--

INSERT INTO `polopcks` (`tshirtID`, `tName`, `tNowPrice`, `tThenPrice`, `tImage`, `quantity`) VALUES
(19, 'Amazon Green Men’s Polo T Shirt', '1650.00', '1950.00', 'Amazon-Green-Mens-Polo-T-Shirt-1.webp', 0),
(20, 'Coffee Brown Men’s Polo T Shirt', '1650.00', '1950.00', 'Coffee-Brown-Mens-Polo-T-Shirt.webp', 0),
(21, 'Raspberry Red Men’s Polo T Shirt', '1650.00', '1950.00', 'Raspberry-Red-Mens-Polo-T-Shirt.webp', 0),
(22, 'Grey Marl Men’s Polo T Shirt', '1650.00', '1950.00', 'Grey-Marl-Mens-Polo-T-Shirt.webp', 0),
(23, 'Raven Black Men’s Polo T Shirt', '1650.00', '1950.00', 'Raven-Black-Mens-Polo-T-Shirt.webp', 0),
(24, 'Scarlet Red Men’s Polo T Shirt', '1650.00', '1950.00', 'Scarlet-Red-Mens-Polo-T-Shirt.webp', 0),
(25, 'Misty Grey Men’s Polo T Shirt', '1650.00', '1950.00', 'Misty-Grey-Mens-Polo-T-Shirt.webp', 0),
(26, 'Navy Blue Men’s Polo T Shirt', '1650.00', '1950.00', 'Navy-Blue-Mens-Polo-T-Shirt.webp', 0),
(27, 'Charcoal Grey Men’s Polo T Shirt', '1650.00', '1950.00', 'Charcoal-Grey-Mens-Polo-T-Shirt.jpg', 0),
(28, 'Sky Blue Men’s Polo T Shirt', '1650.00', '1950.00', 'Sky-Blue-Mens-Polo-T-Shirt-V05.webp', 0),
(29, 'Maroon Men’s Polo T Shirt', '1650.00', '1950.00', 'Maroon-Mens-Polo-T-Shirt.webp', 0),
(30, 'Teal Blue Men’s Polo T Shirt', '1650.00', '1950.00', 'Teal-Blue-Mens-Polo-T-Shirt.webp', 0),
(31, 'Cinnamon Brown Men’s Polo T Shirt', '1650.00', '1950.00', 'Cinnamon-Brown-Mens-Polo-T-Shirt.webp', 0),
(32, 'Cotton White Men’s Polo T Shirt', '1650.00', '1950.00', 'Cotton-White-Mens-Polo-T-Shirt.jpg', 0),
(33, 'Purple Men’s Polo T Shirt', '1650.00', '1950.00', 'Purple-Mens-Polo-T-Shirt.webp', 0),
(34, 'Forest Green Men’s Polo T Shirt', '1650.00', '1950.00', 'Forest-Green-Mens-Polo-T-Shirt-V05.webp', 0),
(35, 'Carbon Blue Men’s Polo T Shirt', '1650.00', '1950.00', 'Carbon-Blue-Mens-Polo-T-Shirt.webp', 0),
(36, 'Bumblebee Yellow Men’s Polo T Shirt', '1650.00', '1950.00', 'Bumblebee-Yellow-Mens-Polo-T-Shirt.webp', 0);

-- --------------------------------------------------------

--
-- Table structure for table `polopckscart`
--

CREATE TABLE `polopckscart` (
  `cartID` int(20) NOT NULL,
  `itemCode` int(30) NOT NULL,
  `quantity` int(20) NOT NULL,
  `itemSize` varchar(10) NOT NULL,
  `usersId` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `polopckscart`
--

INSERT INTO `polopckscart` (`cartID`, `itemCode`, `quantity`, `itemSize`, `usersId`) VALUES
(2, 3, 14, 'xl', 'navodahasaranga9@gmail.com'),
(5, 33, 1, 'xxl', 'madura@gmail.com'),
(6, 29, 1, 'm', 'testmail@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usersId` int(30) NOT NULL,
  `userEmail` varchar(30) NOT NULL,
  `userPassword` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usersId`, `userEmail`, `userPassword`) VALUES
(15, 'testmail@gmail.com', '$2y$10$PNTA3aDxm5Jv2cuJ0LnEcOsExt9FViC9GcXEuuC9XGkz7/WYlSwde'),
(19, 'navodahasaranga9@gmail.com', '$2y$10$.B6EaI6e8/bKr0YmA8k7Ye9pLb7HpR15Pu03vJwX4hJB/ivXmrSRq'),
(20, 'testmail2@gmail.com', '$2y$10$75jVhrdDg9B/ApNhqxnnne8yOeg/V6wg9WNXIy5n3.xpIkDo4q58q'),
(21, 'testmail3@gmail.com', '$2y$10$auZPNhUH9/C5sEjAh/heneUxXlUS1g2r0DZ1f.61FOUv9QjP8m0Pm'),
(22, 'testmail4@gmail.com', '$2y$10$HmqPHkmHgNsjMz2CuNI/2.1pzAJl6yBQPyC4RbrbUKaLlPzHCZozG'),
(23, 'madura@gmail.com', '$2y$10$rDHJCbsvwcu3Df1dnosbOeYVIaHpbhdXfCTuPQZmsEvQZ1oiYYHgK');

-- --------------------------------------------------------

--
-- Table structure for table `valuepcks`
--

CREATE TABLE `valuepcks` (
  `tshirtID` int(20) NOT NULL,
  `tName` varchar(100) DEFAULT NULL,
  `tNowPrice` varchar(20) NOT NULL,
  `tThenPrice` varchar(20) NOT NULL,
  `tImage` varchar(250) NOT NULL,
  `quantity` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `valuepcks`
--

INSERT INTO `valuepcks` (`tshirtID`, `tName`, `tNowPrice`, `tThenPrice`, `tImage`, `quantity`) VALUES
(13, 'Men’s Crew Neck T Shirts Bundle Pack Offer', '3350.00', '4000.00', 'Crew-Neck-T-Shirts-Bundle-Pack-Offer-0051-V2.webp', 0),
(14, 'Men’s Crew Neck T Shirts Bundle Pack Offer', '3350.00', '4000.00', 'Crew-Neck-T-Shirts-Bundle-Pack-Offer-0052-V2.webp', 0),
(15, 'Men’s Crew Neck T Shirts Bundle Pack Offer', '3350.00', '4000.00', 'Crew-Neck-T-Shirts-Bundle-Pack-Offer-0053-V2.webp', 0),
(16, 'Men’s Crew Neck T Shirts Bundle Pack Offer', '3350.00', '4000.00', 'Crew-Neck-T-Shirts-Bundle-Pack-Offer-0054-V2.webp', 0),
(17, 'Men’s Crew Neck T Shirts Bundle Pack Offer', '3350.00', '4000.00', 'Crew-Neck-T-Shirts-Bundle-Pack-Offer-0055-V2.webp', 0),
(18, 'Men’s Crew Neck T Shirts Bundle Pack Offer', '3350.00', '4000.00', 'Crew-Neck-T-Shirts-Bundle-Pack-Offer-0056-V2.webp', 0),
(19, 'Men’s Crew Neck T Shirts Bundle Pack Offer', '3350.00', '4000.00', 'Crew-Neck-T-Shirts-Bundle-Pack-Offer-0057-V2.webp', 0),
(20, 'Men’s Crew Neck T Shirts Bundle Pack Offer', '3350.00', '4000.00', 'Crew-Neck-T-Shirts-Bundle-Pack-Offer-0058-V2.webp', 0),
(21, 'Men’s Crew Neck T Shirts Bundle Pack Offer', '3350.00', '4000.00', 'Crew-Neck-T-Shirts-Bundle-Pack-Offer-0059-V2.webp', 0),
(22, 'Men’s Crew Neck T Shirts Bundle Pack Offer', '3350.00', '4000.00', 'Crew-Neck-T-Shirts-Bundle-Pack-Offer-0060-V2.webp', 0);

-- --------------------------------------------------------

--
-- Table structure for table `valuepckscart`
--

CREATE TABLE `valuepckscart` (
  `cartID` int(20) NOT NULL,
  `itemCode` int(20) NOT NULL,
  `quantity` int(20) NOT NULL,
  `itemSize` varchar(10) NOT NULL,
  `usersId` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `valuepckscart`
--

INSERT INTO `valuepckscart` (`cartID`, `itemCode`, `quantity`, `itemSize`, `usersId`) VALUES
(4, 4, 1, 'xxl', 'testmail@gmail.com'),
(8, 22, 1, 'xxl', 'madura@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `casualshorts`
--
ALTER TABLE `casualshorts`
  ADD PRIMARY KEY (`tshirtID`);

--
-- Indexes for table `casualshortscart`
--
ALTER TABLE `casualshortscart`
  ADD PRIMARY KEY (`cartID`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_return`
--
ALTER TABLE `customer_return`
  ADD PRIMARY KEY (`returnID`);

--
-- Indexes for table `mensactivewear`
--
ALTER TABLE `mensactivewear`
  ADD PRIMARY KEY (`tshirtID`);

--
-- Indexes for table `mensactivewearcart`
--
ALTER TABLE `mensactivewearcart`
  ADD PRIMARY KEY (`cartID`);

--
-- Indexes for table `menscrewneck`
--
ALTER TABLE `menscrewneck`
  ADD PRIMARY KEY (`tshirtID`);

--
-- Indexes for table `menscrewneckcart`
--
ALTER TABLE `menscrewneckcart`
  ADD PRIMARY KEY (`cartID`);

--
-- Indexes for table `polopcks`
--
ALTER TABLE `polopcks`
  ADD PRIMARY KEY (`tshirtID`);

--
-- Indexes for table `polopckscart`
--
ALTER TABLE `polopckscart`
  ADD PRIMARY KEY (`cartID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersId`);

--
-- Indexes for table `valuepcks`
--
ALTER TABLE `valuepcks`
  ADD PRIMARY KEY (`tshirtID`);

--
-- Indexes for table `valuepckscart`
--
ALTER TABLE `valuepckscart`
  ADD PRIMARY KEY (`cartID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `adminID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `casualshorts`
--
ALTER TABLE `casualshorts`
  MODIFY `tshirtID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `casualshortscart`
--
ALTER TABLE `casualshortscart`
  MODIFY `cartID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `customer_return`
--
ALTER TABLE `customer_return`
  MODIFY `returnID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mensactivewear`
--
ALTER TABLE `mensactivewear`
  MODIFY `tshirtID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `mensactivewearcart`
--
ALTER TABLE `mensactivewearcart`
  MODIFY `cartID` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `menscrewneck`
--
ALTER TABLE `menscrewneck`
  MODIFY `tshirtID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `menscrewneckcart`
--
ALTER TABLE `menscrewneckcart`
  MODIFY `cartID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `polopcks`
--
ALTER TABLE `polopcks`
  MODIFY `tshirtID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `polopckscart`
--
ALTER TABLE `polopckscart`
  MODIFY `cartID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usersId` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `valuepcks`
--
ALTER TABLE `valuepcks`
  MODIFY `tshirtID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `valuepckscart`
--
ALTER TABLE `valuepckscart`
  MODIFY `cartID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
