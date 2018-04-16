-- phpMyAdmin SQL Dump
-- version 4.7.9 
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2018 at 01:38 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `royals`
--

-- --------------------------------------------------------

--
-- Table structure for table `quick_info`
--

CREATE TABLE `quick_info` (
  `id` int(11) NOT NULL,
  `details` varchar(200) DEFAULT NULL,
  `personID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quick_info`
--

INSERT INTO `quick_info` (`id`, `details`, `personID`) VALUES
(1, 'Born: April 21, 1926', 1),
(2, 'Coronation: June 2, 1953', 1),
(3, 'Reign: February 6, 1952-present', 1),
(4, 'Spouse: Prince Philip married 1947', 1),
(5, 'Child: Prince Charles', 1),
(6, 'Child: Princess Anne', 1),
(7, 'Child: Prince Andrew', 1),
(8, 'Child: Prince Edward', 1),
(14, 'ffd', 2),
(15, 'ffdsdfsfd', 2),
(28, 'sdafsdf', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quick_info`
--
ALTER TABLE `quick_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quick_info`
--
ALTER TABLE `quick_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
