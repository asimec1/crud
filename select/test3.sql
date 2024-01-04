-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2024 at 11:11 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test3`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_firstname`, `user_lastname`) VALUES
(1, 'John', 'Doe'),
(2, 'Jane', 'Smith'),
(3, 'Bob', 'Johnson'),
(4, 'Alice', 'Williams'),
(5, 'Charlie', 'Brown'),
(6, 'Eva', 'Davis'),
(7, 'Frank', 'Miller'),
(8, 'Grace', 'Moore'),
(9, 'Henry', 'Taylor'),
(10, 'Isabel', 'Anderson'),
(11, 'Jack', 'Wilson'),
(12, 'Katherine', 'Thomas'),
(13, 'Liam', 'Harris'),
(14, 'Mia', 'Jackson'),
(15, 'Noah', 'White'),
(16, 'Olivia', 'Martin'),
(17, 'Parker', 'Thompson'),
(18, 'Quinn', 'Allen'),
(19, 'Ryan', 'Young'),
(20, 'Sophia', 'Scott'),
(21, 'Tyler', 'Lewis'),
(22, 'Uma', 'Wright'),
(23, 'Vincent', 'Turner'),
(24, 'Wendy', 'Ward'),
(25, 'Xander', 'Baker'),
(26, 'Yasmine', 'Hill'),
(27, 'Zachary', 'Cooper'),
(28, 'Ava', 'Evans'),
(29, 'Benjamin', 'Fisher'),
(30, 'Chloe', 'Gray'),
(31, 'Daniel', 'Green'),
(32, 'Emma', 'Hall'),
(33, 'Felix', 'Hill'),
(34, 'Gabriella', 'Jones'),
(35, 'Harrison', 'King'),
(36, 'Ivy', 'Lopez'),
(37, 'Jackson', 'Morgan'),
(38, 'Kate', 'Nelson'),
(39, 'Logan', 'Owens'),
(40, 'Mila', 'Perez'),
(41, 'Nathan', 'Quinn'),
(42, 'Oliver', 'Reed'),
(43, 'Penelope', 'Roberts'),
(44, 'Quincy', 'Smith'),
(45, 'Riley', 'Turner'),
(46, 'Samantha', 'Underwood'),
(47, 'Thomas', 'Vargas'),
(48, 'Ursula', 'Wells'),
(49, 'Victor', 'Xavier'),
(50, 'Winnie', 'Young'),
(51, 'Xander', 'Zimmerman');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
