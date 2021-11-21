-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2021 at 06:59 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wireshark`
--

-- --------------------------------------------------------

--
-- Table structure for table `sign-up`
--

CREATE TABLE `sign-up` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(512) NOT NULL,
  `phone_no` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sign-up`
--

INSERT INTO `sign-up` (`id`, `name`, `email`, `password`, `phone_no`) VALUES
(1, 'Bilal', 'bilalali@gmail.com', '03355815387', '$2y$10$iwLbcShCE7ip.3mCJqgG2uAT9'),
(2, 'User1', 'user1@email.com', '03230034567', '$2y$10$Uh16DKmiOSx7sKKKGEDq/O/5N'),
(3, 'user2@email.com', 'user2@email.com', '$2y$10$q/.bPl9d2i9q2O6.jItuNORzHajUecfnf2LDhY8WhiX4IrpWpdqfW', '03000000000');

-- --------------------------------------------------------

--
-- Table structure for table `user-file`
--

CREATE TABLE `user-file` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_file_path` varchar(512) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user-file`
--

INSERT INTO `user-file` (`id`, `user_id`, `user_file_path`, `date`) VALUES
(1, 3, './files/users/3181326.docx', '2021-11-21'),
(2, 3, './files/users/3181326-MC-LT3.docx', '2021-11-21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sign-up`
--
ALTER TABLE `sign-up`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user-file`
--
ALTER TABLE `user-file`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sign-up`
--
ALTER TABLE `sign-up`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user-file`
--
ALTER TABLE `user-file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
