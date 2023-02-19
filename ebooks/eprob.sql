-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Oct 17, 2022 at 06:44 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eprob`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ad_id` int(11) NOT NULL,
  `ad_name` varchar(50) NOT NULL,
  `ad_email` varchar(50) NOT NULL,
  `ad_password` varchar(50) NOT NULL,
  `role` varchar(11) NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_id`, `ad_name`, `ad_email`, `ad_password`, `role`) VALUES
(1, 'haris', 'haris@gmail.com', '123', 'admin'),
(2, 'asad', 'asad@gmail.com', '111', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `SubCategory_Id` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` int(11) NOT NULL,
  `no_of_books` int(11) NOT NULL,
  `language` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`Id`, `Name`, `SubCategory_Id`, `gender`, `age`, `no_of_books`, `language`) VALUES
(14, '     ali', 6, 'Male', 62, 2, 'Pashto'),
(15, '  haris', 6, 'Male', 16, 55, 'Urdu'),
(18, 'asad', 11, 'Male', 20, 9, 'English');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `ISBN` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `SUBCATEGORY_ID` int(11) NOT NULL,
  `AUTHOR_ID` int(11) NOT NULL,
  `PUBLISHER_ID` int(11) NOT NULL,
  `CATEGORY_ID` int(11) NOT NULL,
  `published_date` varchar(50) NOT NULL,
  `avalaibility` varchar(15) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `image` varchar(260) NOT NULL,
  `book_pdf` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`ISBN`, `name`, `SUBCATEGORY_ID`, `AUTHOR_ID`, `PUBLISHER_ID`, `CATEGORY_ID`, `published_date`, `avalaibility`, `price`, `description`, `image`, `book_pdf`) VALUES
(1111, 'asad', 9, 15, 2, 11, '2022-11-16', '0', 10000, 'aaaaaaaa', 'asas', 'www'),
(1234, 'rrttw', 8, 15, 2, 9, '2022-10-17', 'Yes', 5, 'saaaaaaaaaa', '../image/Fly bird logo (4).png', ''),
(2222, 'yyyyyyyy', 8, 15, 2, 6, '2022-10-31', 'Yes', 1222, 'qqqqqqqqqqqqqqqqqqqqqqqgggggggggggggggggggggggggg', '../image/meat2.jfif', '../pdf/Braiding Sweetgrass_ Indigenous Wisdom, Scientific Knowledge and the Teachings of Plants ( PDFDrive ).pdf'),
(2323, 'haris', 8, 15, 2, 6, '2022-10-08', '0', 5000, 'yuuyjyjtyutyuytuytuyuyuyuyuyuyu', 'ygr', ''),
(4444, 'harray potter', 11, 18, 2, 6, '2022-10-18', 'No', 66666, 'JHHHHHHHHHHHHHHHHHHHHHH6gggggggggggggggggggggggreeeeeeeeeeewre', '../image/1.jpg', '../pdf/Braiding Sweetgrass_ Indigenous Wisdom, Scientific Knowledge and the Teachings of Plants ( PDFDrive ).pdf'),
(5656, 'toy', 9, 14, 2, 6, '2022-10-20', '0', 5000, 'yuuyjyjtyutyuytuytuyuyuyuyuyuyufdshghgdhteetetytrrrrytr', 'y', ''),
(6777, 'sa', 11, 15, 2, 6, '2022-09-21', 'Yes', 34445, 'fbgnhnhnmjmjgmgjjmjmgjmjgmgjmjmjfvv', '', ''),
(7667, '45466', 8, 14, 2, 11, '2022-10-17', 'No', 4444, 'fdfgg', 'ggf', 'fgf'),
(56555, 'haris1', 8, 15, 2, 9, '2022-10-12', 'Yes', 3444, 'fbgnhnhnmjmjgmgjjmjmgjmjgmgjmjmj', '', ''),
(444444646, 'ali', 8, 15, 2, 9, '2022-10-27', 'No', 344, 'fdfgg', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(3, 'novel'),
(6, 'non fiction'),
(9, 'fiction'),
(11, 'children');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Phonenumber` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Message` varchar(900) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`Id`, `Name`, `Phonenumber`, `Email`, `Message`) VALUES
(2, 'ali', '798983442', 'ali@gmail.com', 'dgfygthyutyjkyukukyukuktukktuktjtjtykyktyuktykt'),
(3, 'ahmed', '563434343', 'ahmed@gmail.com', 'rreytytuyuyuyjhjhjhjhjffghghghdghdghdghhgh');

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`id`, `name`, `address`) VALUES
(2, 'ali', 'north11');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Category_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`Id`, `Name`, `Category_Id`) VALUES
(6, 'sad1', 3),
(8, 'action', 6),
(9, 'naat', 6),
(11, 'toy', 11);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `us_id` int(11) NOT NULL,
  `us_name` varchar(50) NOT NULL,
  `us_email` varchar(50) NOT NULL,
  `us_password` varchar(50) NOT NULL,
  `role` varchar(11) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`us_id`, `us_name`, `us_email`, `us_password`, `role`) VALUES
(2, 'ali', 'ali@gmail.com', '1234', 'admin'),
(3, 'aaaa', 'aa@gmail.com', '234', 'user'),
(4, 'basit', 'basit@gmail.com', '12345', 'user'),
(5, 'aadi', 'aadi@gmail.com', '123', 'user'),
(6, 'asad', 'asad@gmail.com', '1234', 'user'),
(7, 'ali', 'ali@gmail.com', '1234', 'user'),
(8, 'jawwad', 'jawwad@gmail.com', '12345', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `SubCategory_Id` (`SubCategory_Id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`ISBN`),
  ADD KEY `CATEGORY_ID` (`CATEGORY_ID`),
  ADD KEY `AUTHOR_ID` (`AUTHOR_ID`),
  ADD KEY `SUBCATEGORY_ID` (`SUBCATEGORY_ID`),
  ADD KEY `PUBLISHER_ID` (`PUBLISHER_ID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Category_Id` (`Category_Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`us_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `us_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `author`
--
ALTER TABLE `author`
  ADD CONSTRAINT `author_ibfk_1` FOREIGN KEY (`SubCategory_Id`) REFERENCES `subcategory` (`Id`);

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`CATEGORY_ID`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`AUTHOR_ID`) REFERENCES `author` (`Id`),
  ADD CONSTRAINT `book_ibfk_3` FOREIGN KEY (`SUBCATEGORY_ID`) REFERENCES `subcategory` (`Id`),
  ADD CONSTRAINT `book_ibfk_4` FOREIGN KEY (`PUBLISHER_ID`) REFERENCES `publisher` (`id`);

--
-- Constraints for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `subcategory_ibfk_1` FOREIGN KEY (`Category_Id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
