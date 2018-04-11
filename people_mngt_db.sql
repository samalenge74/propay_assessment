-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2018 at 08:40 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `people_mngt_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `id` int(13) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Full_Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`id`, `Username`, `Password`, `Full_Name`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Thomas Hunkin');

-- --------------------------------------------------------

--
-- Table structure for table `interests_tbl`
--

CREATE TABLE `interests_tbl` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `interests_tbl`
--

INSERT INTO `interests_tbl` (`id`, `Name`) VALUES
(1, 'Acting'),
(2, 'Archery'),
(3, 'Arts'),
(4, 'Bowling'),
(5, 'Body Building'),
(6, 'Bird Watching'),
(7, 'Camping'),
(8, 'Car Racing'),
(9, 'Chess'),
(10, 'Dancing'),
(11, 'Digital Photography'),
(12, 'Drawing'),
(13, 'Eating out'),
(14, 'Embroidery'),
(15, 'Exercise (aerobics, weights)');

-- --------------------------------------------------------

--
-- Table structure for table `languages_tbl`
--

CREATE TABLE `languages_tbl` (
  `id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `languages_tbl`
--

INSERT INTO `languages_tbl` (`id`, `Name`) VALUES
(1, 'Zulu'),
(2, 'Xhosa'),
(3, 'Afrikaans'),
(4, 'English'),
(5, 'Northern Sotho'),
(6, 'Tswana'),
(7, 'Sesotho'),
(8, 'Tsonga'),
(9, 'Swati'),
(10, 'Venda'),
(11, 'Ndebele'),
(12, 'SA Sign Language');

-- --------------------------------------------------------

--
-- Table structure for table `people_tbl`
--

CREATE TABLE `people_tbl` (
  `id` int(13) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Surname` varchar(50) NOT NULL,
  `SA_ID` varchar(13) NOT NULL,
  `Mobile_Number` int(10) UNSIGNED ZEROFILL NOT NULL,
  `Email` varchar(150) NOT NULL,
  `DOB` date NOT NULL,
  `Language_ID` int(11) NOT NULL,
  `interests` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interests_tbl`
--
ALTER TABLE `interests_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages_tbl`
--
ALTER TABLE `languages_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `people_tbl`
--
ALTER TABLE `people_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Language_ID` (`Language_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `interests_tbl`
--
ALTER TABLE `interests_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `languages_tbl`
--
ALTER TABLE `languages_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `people_tbl`
--
ALTER TABLE `people_tbl`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `people_tbl`
--
ALTER TABLE `people_tbl`
  ADD CONSTRAINT `people_tbl_ibfk_1` FOREIGN KEY (`Language_ID`) REFERENCES `languages_tbl` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
