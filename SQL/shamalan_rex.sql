-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 12, 2021 at 03:26 PM
-- Server version: 10.3.25-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shamalan_rex`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `Booking_id` varchar(200) NOT NULL,
  `PID` varchar(200) NOT NULL,
  `OwnerID` varchar(200) NOT NULL,
  `Booking_name` varchar(200) NOT NULL,
  `Booking_phone` varchar(20) NOT NULL,
  `Booking_email` varchar(100) NOT NULL,
  `Booking_message` varchar(2000) NOT NULL,
  `Booking_status` varchar(2) NOT NULL,
  `BookDate` date NOT NULL,
  `BookTime` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`Booking_id`, `PID`, `OwnerID`, `Booking_name`, `Booking_phone`, `Booking_email`, `Booking_message`, `Booking_status`, `BookDate`, `BookTime`) VALUES
('REX432880PYIOA', 'AoCQ434985BARIDA', 'AKnV408779BARIDA', 'Kanji', '11', 'kanjianto@gmail.com', 'want', '0', '2021-05-12', '14:09:29'),
('REX479951PWRGT', 'AoCQ434985BARIDA', 'AKnV408779BARIDA', 'Kanji', '11', 'kanjianto@gmail.com', 'want', '0', '2021-05-12', '14:10:33'),
('REX541590PMAX', 'AoCQ434985BARIDA', 'AKnV408779BARIDA', 'Kanji Antony', '456', 'kanji@kanji.co.ke', 'want', '0', '2021-05-12', '14:21:36');

-- --------------------------------------------------------

--
-- Table structure for table `floorplan`
--

CREATE TABLE `floorplan` (
  `FloorplanId` varchar(200) NOT NULL,
  `ListingId` varchar(200) NOT NULL,
  `FloorplanBedrooms` int(5) NOT NULL,
  `FloorplanBathrooms` int(5) NOT NULL,
  `FloorplanSize` varchar(1000) NOT NULL,
  `FloorplanImage` varchar(2000) NOT NULL,
  `FloorplanPrice` int(20) NOT NULL,
  `FloorplanDesc` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `floorplan`
--

INSERT INTO `floorplan` (`FloorplanId`, `ListingId`, `FloorplanBedrooms`, `FloorplanBathrooms`, `FloorplanSize`, `FloorplanImage`, `FloorplanPrice`, `FloorplanDesc`) VALUES
('FPLAN65039ABRl', 'Anfj280481BARIDA', 3, 3, '3', 'Uploaded/Images/Babylon Reggae.png', 3, 'fr'),
('FPLAN539125AxqN', 'Anfj280481BARIDA', 3, 3, '3', 'Uploaded/Images/ill_turn.jpg', 3, 'fr'),
('FPLAN709030AHwq', 'Anfj280481BARIDA', 23, 23, '25 sq metres', 'Uploaded/Images/ill_turn.jpg', 23, 'gtr'),
('FPLAN388231AXGk', 'AKhW312484BARIDA', 2, 2, '100 sq metres', 'Uploaded/Images/floor1.jpg', 30000, 'A much more spacious house'),
('FPLAN606438APnR', 'AKhW312484BARIDA', 1, 1, '50 sq metres', 'Uploaded/Images/floor2.jpg', 15000, 'This is the smaller version'),
('FPLAN343796ALIJ', 'Afnl598661BARIDA', 5, 4, '25 sq metres', 'Uploaded/Images/floor2.jpg', 30000, 'Nice'),
('FPLAN766742AIOg', 'Afnl598661BARIDA', 7, 5, '100 sq metres', 'Uploaded/Images/floor1.jpg', 60000, 'Good'),
('FPLAN471459AXjp', 'AfB103407BARIDA', 2, 1, '200 sq metres', 'Uploaded/Images/floor2.jpg', 25000, 'Beautiful');

-- --------------------------------------------------------

--
-- Table structure for table `listing`
--

CREATE TABLE `listing` (
  `OwnerId` varchar(200) NOT NULL,
  `PID` varchar(30) NOT NULL,
  `Pname` varchar(100) NOT NULL,
  `Pdetails` varchar(255) DEFAULT NULL,
  `Paddress` varchar(100) DEFAULT NULL,
  `Pcountry` varchar(100) DEFAULT NULL,
  `Pcity` varchar(100) DEFAULT NULL,
  `Pzip` varchar(100) DEFAULT NULL,
  `Pcounty` varchar(200) DEFAULT NULL,
  `Platitude` varchar(500) DEFAULT NULL,
  `Plongitude` varchar(500) DEFAULT NULL,
  `Pcode` varchar(100) DEFAULT NULL,
  `Ptype` varchar(100) DEFAULT NULL,
  `Pstatus` varchar(100) DEFAULT NULL,
  `Pprice` int(5) DEFAULT NULL,
  `PpricePeriod` varchar(5) DEFAULT NULL,
  `PstartPrice` int(5) DEFAULT NULL,
  `Pcategory` varchar(10) NOT NULL,
  `PletDate` date DEFAULT NULL,
  `PownershipType` varchar(100) DEFAULT NULL,
  `PsaleType` varchar(100) DEFAULT NULL,
  `Pfeatures` text DEFAULT NULL,
  `PfurnishType` varchar(100) DEFAULT NULL,
  `PwindowsType` varchar(100) DEFAULT NULL,
  `PheatingType` varchar(100) DEFAULT NULL,
  `PnearestAmenities` varchar(2000) DEFAULT NULL,
  `Psize` int(10) DEFAULT NULL,
  `PyearBuilt` year(4) DEFAULT NULL,
  `PnearestTown` varchar(250) DEFAULT NULL,
  `Prooms` int(10) DEFAULT NULL,
  `Pgarage` int(10) DEFAULT NULL,
  `PgarageSize` varchar(2000) DEFAULT NULL,
  `Pbedrooms` int(5) DEFAULT NULL,
  `Pbathrooms` int(5) DEFAULT NULL,
  `Pimage` text DEFAULT NULL,
  `P_epcImage` varchar(9000) DEFAULT NULL,
  `PAttachment` varchar(9000) DEFAULT NULL,
  `PVideo` varchar(9000) DEFAULT NULL,
  `PcontactName` varchar(30) DEFAULT NULL,
  `PcontactPhone` varchar(15) DEFAULT NULL,
  `PcontactEmail` varchar(100) DEFAULT NULL,
  `PcontactInfo` varchar(255) DEFAULT NULL,
  `PVacancy` varchar(20) DEFAULT NULL,
  `PApproval` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `listing`
--

INSERT INTO `listing` (`OwnerId`, `PID`, `Pname`, `Pdetails`, `Paddress`, `Pcountry`, `Pcity`, `Pzip`, `Pcounty`, `Platitude`, `Plongitude`, `Pcode`, `Ptype`, `Pstatus`, `Pprice`, `PpricePeriod`, `PstartPrice`, `Pcategory`, `PletDate`, `PownershipType`, `PsaleType`, `Pfeatures`, `PfurnishType`, `PwindowsType`, `PheatingType`, `PnearestAmenities`, `Psize`, `PyearBuilt`, `PnearestTown`, `Prooms`, `Pgarage`, `PgarageSize`, `Pbedrooms`, `Pbathrooms`, `Pimage`, `P_epcImage`, `PAttachment`, `PVideo`, `PcontactName`, `PcontactPhone`, `PcontactEmail`, `PcontactInfo`, `PVacancy`, `PApproval`) VALUES
('AKnV408779BARIDA', 'AfB103407BARIDA', 'Bing', 'Awesome house', '32 Wartnaby Road', 'United Kingdom', 'Aigburth', 'L17 8RY', 'Aigburth', '', '', 'GGOP', 'Apartment', 'Enabled', 10000, '', 0, 'Sale', '0000-00-00', 'Owned', 'Soley', 'Swimming Pool,Barbeque', 'Furnished', 'Tinted', 'Furnace', 'Braeburn school, Walmart', 500, 1990, NULL, 5, 1, '20 sq metres', 2, 1, '[\"house-1836070_1280.jpg\",\"living-room-1835923_1280.jpg\"]', '[\"about.png\"]', '[\"The House Rex Platform.pdf\"]', '[\"Slave to fear.mp4\"]', NULL, NULL, NULL, NULL, NULL, 0),
('AKnV408779BARIDA', 'AoCQ434985BARIDA', 'Kanjitech', 'Big and nice', '32 Wartnaby Road', 'United Kingdom', 'Aigburth', 'L17 8RY', 'Aigburth', '', '', 'HHI67', 'House', 'Enabled', 5000, 'Month', 10000, 'Rent', '2021-05-12', '', '', 'Air Conditioning,Microwave', 'Furnished', 'Clear', 'Wood', 'Java, Starbucks', 700, 2001, NULL, 6, 1, '30 sq metres', 3, 2, '[\"kitchen-2165756_1280.jpg\"]', '[\"living-room-1835923_1280.jpg\"]', '[\"The House Rex Platform.pdf\",\"The House Rex Platform.pdf\"]', '[\"Slave to fear.mp4\"]', NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `UserId` varchar(200) NOT NULL,
  `LoginDate` date NOT NULL,
  `LoginTime` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`UserId`, `LoginDate`, `LoginTime`) VALUES
('AKnV408779BARIDA', '2021-03-29', '14:31:57'),
('AKnV408779BARIDA', '2021-03-31', '09:53:34'),
('AKnV408779BARIDA', '2021-03-31', '12:35:03'),
('AKnV408779BARIDA', '2021-03-31', '13:15:20'),
('AKnV408779BARIDA', '2021-03-31', '14:22:50'),
('AKnV408779BARIDA', '2021-03-31', '16:39:08'),
('AKnV408779BARIDA', '2021-03-31', '17:28:23'),
('AKnV408779BARIDA', '2021-03-31', '19:52:07'),
('AKnV408779BARIDA', '2021-04-21', '11:07:42'),
('AKnV408779BARIDA', '2021-04-22', '09:35:48'),
('AKnV408779BARIDA', '2021-04-22', '13:10:03'),
('AKnV408779BARIDA', '2021-04-22', '16:40:34'),
('AKnV408779BARIDA', '2021-04-25', '04:51:18'),
('AKnV408779BARIDA', '2021-04-25', '11:14:15'),
('AKnV408779BARIDA', '2021-04-26', '10:29:07'),
('AKnV408779BARIDA', '2021-04-26', '12:27:48'),
('AKnV408779BARIDA', '2021-04-26', '15:18:56'),
('AKnV408779BARIDA', '2021-04-26', '16:37:27'),
('AKnV408779BARIDA', '2021-04-26', '17:10:13'),
('AKnV408779BARIDA', '2021-04-26', '19:03:47'),
('AKnV408779BARIDA', '2021-04-26', '19:48:11'),
('AKnV408779BARIDA', '2021-05-09', '04:27:53'),
('AKnV408779BARIDA', '2021-05-10', '04:22:48'),
('AKnV408779BARIDA', '2021-05-10', '15:27:14'),
('AKnV408779BARIDA', '2021-05-10', '16:54:56'),
('AKnV408779BARIDA', '2021-05-10', '19:20:58'),
('AKnV408779BARIDA', '2021-05-12', '03:08:23'),
('AKnV408779BARIDA', '2021-05-12', '15:12:18');

-- --------------------------------------------------------

--
-- Table structure for table `user_reg`
--

CREATE TABLE `user_reg` (
  `UserId` varchar(200) NOT NULL,
  `UserName` varchar(600) NOT NULL,
  `UserEmail` varchar(500) NOT NULL,
  `UserType` varchar(20) NOT NULL,
  `UserMobile` varchar(200) DEFAULT NULL,
  `UserFacebook` varchar(5000) DEFAULT NULL,
  `UserTwitter` varchar(5000) DEFAULT NULL,
  `UserLinkedin` varchar(5000) DEFAULT NULL,
  `UserInstagram` varchar(5000) DEFAULT NULL,
  `UserDescription` varchar(5000) DEFAULT NULL,
  `UserPic` varchar(1000) DEFAULT NULL,
  `Password` varchar(600) NOT NULL,
  `Approval` varchar(10) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_reg`
--

INSERT INTO `user_reg` (`UserId`, `UserName`, `UserEmail`, `UserType`, `UserMobile`, `UserFacebook`, `UserTwitter`, `UserLinkedin`, `UserInstagram`, `UserDescription`, `UserPic`, `Password`, `Approval`, `Date`, `Time`) VALUES
('AKnV408779BARIDA', 'Kanji Antony', 'kanjianto@gmail.com', 'Seller', '0705972361', NULL, NULL, NULL, NULL, 'I am a private seller', 'Uploaded/Images/icon.png', '$2y$10$j11wugkLrMU9RHlKZnLsnOIHfMtR9xRfl6w/Z26Hg.aPd/TyTw352', '0', '2021-03-29', '14:31:43'),
('AOLl69404BARIDA', 'Martin', 'martin@gmail.com', 'Seller', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$QJY6U7RIAwUr7FjA4wImdeeXQYelaxWU/vFlAhUKLJwkLD67Bf5Tu', '0', '2021-03-30', '12:04:42'),
('Augv198006BARIDA', 'Brian', 'wanene@gmail.com', 'Agency', '0711111', NULL, NULL, NULL, NULL, 'Nice agency', 'Uploaded/Images/icon - Copy.png', '$2y$10$YX30pTBzISKBM5ksz4KG2./Lr.SJQrqc2jr0x50.ebrPpxrw1nU3K', '0', '2021-04-26', '20:17:06'),
('AvnV926288BARIDA', 'Junior Usina', 'usinachristopher@gmail.com', 'Seller', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$Gp.Pc2nFfuCrAYAEbhcbNuZWl5JFUel07wqHbgrF7DAqL29zrnuSG', '0', '2021-04-02', '15:41:03'),
('Aucq983366BARIDA', 'Brian Properties', 'brian@yahoo.com', 'Agent', NULL, NULL, NULL, NULL, NULL, NULL, 'Uploaded/Images/IMG-20200117-WA0011.jpg', '$2y$10$4Bj8zCkXKAmkhIOP2HUAOOB4Vat5r49gF6wE4pCXD7WbYpGbR8TKu', '0', '2021-04-28', '15:26:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`Booking_id`);

--
-- Indexes for table `floorplan`
--
ALTER TABLE `floorplan`
  ADD PRIMARY KEY (`FloorplanId`);

--
-- Indexes for table `listing`
--
ALTER TABLE `listing`
  ADD PRIMARY KEY (`PID`);

--
-- Indexes for table `user_reg`
--
ALTER TABLE `user_reg`
  ADD PRIMARY KEY (`UserId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
