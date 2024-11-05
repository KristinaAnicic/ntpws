-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2024 at 03:08 AM
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
-- Database: `ntpws_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `country_code` varchar(3) NOT NULL,
  `about` text DEFAULT NULL,
  `created` tinyint(1) UNSIGNED NOT NULL,
  `modified` tinyint(1) UNSIGNED NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `country_code`, `about`, `created`, `modified`, `date`) VALUES
(1, 'John', 'Doe', 'john.doe', 'john1234', 'USA', NULL, 0, 0, '2024-11-01 02:02:51'),
(2, 'Maria', 'Garcia', 'mariagarcia', 'password123', 'ESP', NULL, 0, 0, '2024-11-01 02:03:38'),
(3, 'Amira', 'Doe', 'amiradoe', 'password123', 'UAE', NULL, 0, 0, '2024-11-01 02:04:35'),
(4, 'Liam', 'Smith', 'liam_smith', 'password123', 'GBR', NULL, 0, 0, '2024-11-01 02:05:14'),
(5, 'John', 'Smith', 'johnsmith99', 'password123', '', NULL, 0, 0, '2024-11-01 02:06:06'),
(6, 'Sarah', 'Lee', 'sarahlee', 'password123', 'CAN', NULL, 0, 0, '2024-11-01 02:06:48'),
(7, 'Sarah', 'Kim', 'sarahkim', 'password123', 'USA', NULL, 0, 0, '2024-11-01 02:07:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_key` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
