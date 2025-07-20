-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 20, 2025 at 03:31 PM
-- Server version: 8.0.42-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `c3622379`
--

-- --------------------------------------------------------

--
-- Table structure for table `Credentials`
--

CREATE TABLE `Credentials` (
  `userId` int NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `emailAd` varchar(30) NOT NULL,
  `userPassword` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Credentials`
--

INSERT INTO `Credentials` (`userId`, `firstName`, `lastName`, `emailAd`, `userPassword`) VALUES
(37, 'Tess', 'Brown', 'tb@gmail.com', 'tbrown'),
(39, 'hi', 'hi', 'hi@gmail.com', 'hi'),
(40, 'hi', 'hi', 'hi@gmail.com', 'hi'),
(41, 'hi', 'hi', 'hi@gmail.com', 'hr'),
(43, 'hi', 'hi', 'hi@gmail.com', 'hi'),
(44, 'Emily', 'Everett', 'e_everett@outlook.com', 'Blossom100'),
(45, 'roger', 'rabbit', 'rogerrabbit@gmail.com', 'roger'),
(46, 'account', 'admin', 'admin@gmail.com', 'admin'),
(47, 'admin', 'account', 'admin@admin.com', 'admin'),
(48, 'admin', 'account', 'adminacc@gmail.com', 'admin'),
(49, 'brian', 'honk', 'brown@gmail.com', 'pea'),
(50, 'brain', 'pinky', 'pinky@gmail.com', 'pink'),
(51, 'apple', 'apple', 'apple@apple.com', 'apple'),
(52, 'apple', 'apple', 'apple@apple.com', 'apple'),
(53, 'orange', 'orange', 'orange@orange.com', 'orange'),
(54, 'pear', 'pear', 'pear@pear.com', 'pear');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Credentials`
--
ALTER TABLE `Credentials`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Credentials`
--
ALTER TABLE `Credentials`
  MODIFY `userId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
