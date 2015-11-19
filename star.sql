-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2015 at 11:46 PM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `star`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `size`, `type`, `description`) VALUES
(1, 'Test, lets attempt', 5, 'Users', 'TEST YAY'),
(7, 'Lets GO!', 10, 'Users', 'Ayy Lmao?'),
(8, 'The yo-yos', 6, 'Users', 'banana pie'),
(30, '', 4, 'Users', ''),
(31, 'Tricycle', 3, 'Users', 'You know it'),
(35, 'Test', 5, 'Users', 'LETS GOO'),
(36, 'Different Tricycle', 3, 'Users', 'Why?!?!');

-- --------------------------------------------------------

--
-- Table structure for table `group_member`
--

CREATE TABLE `group_member` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `group_id` varchar(255) NOT NULL,
  `comp_num` int(11) NOT NULL DEFAULT '1',
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_member`
--

INSERT INTO `group_member` (`id`, `user_id`, `name`, `group_id`, `comp_num`, `score`) VALUES
(11, 1, 'Sam Rackey', 'Tricycle', 6, 2),
(12, 3, 'Deb Weidman', 'Tricycle', 6, 3),
(13, 4, 'Jared Rushanan', 'Tricycle', 1, 1),
(19, 1, 'Sam Rackey', 'Test', 4, 2),
(20, 2, 'Ethan Graf', 'Test', 4, 1),
(21, 3, 'Deb Weidman', 'Test', 3, 2),
(22, 4, 'Jared Rushanan', 'Test', 5, 1),
(23, 5, 'Taiga Okada', 'Test', 5, 2),
(24, 1, 'Sam Rackey', 'Different Tricycle', 1, 0),
(25, 5, 'Taiga Okada', 'Different Tricycle', 1, 0),
(26, 6, 'Parker', 'Different Tricycle', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `hash`) VALUES
(1, 'Sam Rackey', 'sam@sam.com', 'goat'),
(2, 'Ethan Graf', 'ethan@ethan.com', 'goat'),
(3, 'Deb Weidman', 'deb@deb.com', 'goat'),
(4, 'Jared Rushanan', 'jared@jared.com', 'goat'),
(5, 'Taiga Okada', 'taiga@taiga.jp', 'goat'),
(6, 'Parker', 'parker@parker.se', 'goat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `group_member`
--
ALTER TABLE `group_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `group_member`
--
ALTER TABLE `group_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
