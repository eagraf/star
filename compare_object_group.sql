-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2015 at 02:04 AM
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
-- Table structure for table `compare_object_group`
--

CREATE TABLE `compare_object_group` (
  `id` int(11) NOT NULL,
  `object_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `score` int(11) NOT NULL DEFAULT '0',
  `comp_num` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `compare_object_group`
--

INSERT INTO `compare_object_group` (`id`, `object_id`, `group_id`, `type`, `owner_id`, `score`, `comp_num`) VALUES
(1, 13, 0, 'image', 7, 0, 0),
(2, 14, 0, 'image', 7, 0, 0),
(3, 15, 0, 'document', 7, 0, 0),
(4, 16, 0, 'image', 7, 0, 0),
(5, 17, 0, 'image', 7, 0, 0),
(6, 18, 0, 'image', 7, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `compare_object_group`
--
ALTER TABLE `compare_object_group`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `compare_object_group`
--
ALTER TABLE `compare_object_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
