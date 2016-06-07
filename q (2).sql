-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 24, 2016 at 02:54 AM
-- Server version: 5.7.10
-- PHP Version: 7.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `q`
--

-- --------------------------------------------------------

--
-- Table structure for table `qmessages`
--

CREATE TABLE `qmessages` (
  `id` int(11) NOT NULL,
  `sender` varchar(3000) NOT NULL,
  `receiver` varchar(3000) NOT NULL,
  `message` text,
  `file` varchar(3000) DEFAULT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `received` enum('true','false') NOT NULL,
  `processed` enum('true','false') NOT NULL,
  `node_response` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qmessages`
--

INSERT INTO `qmessages` (`id`, `sender`, `receiver`, `message`, `file`, `time_stamp`, `received`, `processed`, `node_response`) VALUES
(1, 'aditya.s.walvekar@gmail.com', 'aditya', 'Hello, World!', NULL, '2008-11-11 07:53:44', 'false', 'false', NULL),
(2, 'aditya.s.walvekar@gmail.com', 'aditya', 'Hello, World!', NULL, '2008-11-11 07:53:44', 'false', 'false', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_email` varchar(3000) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_email`, `user_id`, `name`) VALUES
('aditya.s.walvekar@gmail.com', 1, ''),
('addi61195@gmail.com', 2, 'Aditya Walvekar'),
('yash.choukse123@gmail.com', 3, 'Yash Choukse');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `qmessages`
--
ALTER TABLE `qmessages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `qmessages`
--
ALTER TABLE `qmessages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
