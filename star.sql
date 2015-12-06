-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2015 at 05:02 PM
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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(64) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `group_id`) VALUES
(33, 'Style', 48),
(34, 'Composition', 48),
(35, 'Lighting', 48),
(36, 'Technique', 48),
(37, 'Creativity', 48);

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
  `rating` float(28,4) NOT NULL DEFAULT '1500.0000',
  `deviation` float(28,4) NOT NULL DEFAULT '350.0000'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `compare_object_group`
--

INSERT INTO `compare_object_group` (`id`, `object_id`, `group_id`, `type`, `owner_id`, `rating`, `deviation`) VALUES
(100, 94, 48, 'image', 34, 1429.0818, 124.3649),
(101, 95, 48, 'image', 34, 1566.3162, 122.7479),
(102, 96, 48, 'image', 34, 1419.9801, 146.3190),
(103, 97, 48, 'image', 33, 1527.9351, 124.9660),
(104, 98, 48, 'image', 33, 1621.1373, 131.0657),
(105, 99, 48, 'image', 33, 1538.1641, 132.2894),
(106, 100, 48, 'image', 32, 1785.8113, 228.4415),
(107, 101, 48, 'image', 32, 1465.1609, 190.7265),
(108, 102, 48, 'image', 32, 1449.2899, 173.8028),
(109, 103, 48, 'image', 30, 1516.3961, 228.6224),
(110, 104, 48, 'image', 30, 1211.1375, 230.6486),
(111, 105, 48, 'image', 30, 1312.8740, 211.9921),
(112, 106, 48, 'image', 31, 1715.5272, 250.0534),
(113, 107, 48, 'image', 31, 1337.6891, 290.3190),
(114, 108, 48, 'image', 31, 1427.4395, 242.1600);

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
(48, 'Paintings', 6, '', 'Beautiful paintings.');

-- --------------------------------------------------------

--
-- Table structure for table `group_member`
--

CREATE TABLE `group_member` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `group_id` varchar(255) NOT NULL,
  `rating` float(28,4) NOT NULL DEFAULT '1500.0000',
  `deviation` float(28,4) NOT NULL DEFAULT '350.0000'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_member`
--

INSERT INTO `group_member` (`id`, `user_id`, `name`, `group_id`, `rating`, `deviation`) VALUES
(69, 30, 'Vincent Van Gogh', '48', 1496.5320, 175.8861),
(70, 31, 'Salvador Dali', '48', 1709.9998, 193.0572),
(71, 32, 'Leonardo DaVinci', '48', 2102.0444, 215.9508),
(72, 33, 'Rembrandt', '48', 2150.1250, 210.9233),
(73, 34, 'Pablo Picasso', '48', 12284.5410, 350.3102);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `owner_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `name`, `type`, `address`, `owner_id`) VALUES
(94, 'Guernica', 'image', 'uploads/5664550fca68e.jpg', 34),
(95, 'The Old Guitarist', 'image', 'uploads/566455315ce2d.jpg', 34),
(96, 'The Weeping Woman', 'image', 'uploads/56645570d1b52.jpg', 34),
(97, 'Landscape with a Stone Bridge', 'image', 'uploads/566455e366743.jpg', 33),
(98, 'The Mill', 'image', 'uploads/566456463f23f.jpg', 33),
(99, 'Return of the Prodigal Son', 'image', 'uploads/566456a653d83.jpg', 33),
(100, 'Mona Lisa', 'image', 'uploads/56645a44df903.jpg', 32),
(101, 'Last Supper', 'image', 'uploads/56645a6220b18.jpg', 32),
(102, 'Vitruvian Man', 'image', 'uploads/56645a8cd2860.jpg', 32),
(103, 'Starry Night', 'image', 'uploads/56645ada37a8b.jpg', 30),
(104, 'Vase', 'image', 'uploads/56645aef39f9c.jpg', 30),
(105, 'Self Portrait', 'image', 'uploads/56645b1d77fa4.jpg', 30),
(106, 'Persistence of Memory', 'image', 'uploads/56645b7091de6.jpg', 31),
(107, 'Swans Reflecting Elephants', 'image', 'uploads/56645b9b235d8.jpg', 31),
(108, 'The Disintegration', 'image', 'uploads/56645bc304521.jpg', 31);

-- --------------------------------------------------------

--
-- Table structure for table `object_category`
--

CREATE TABLE `object_category` (
  `object_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `rating` float(28,4) NOT NULL DEFAULT '1500.0000',
  `deviation` float(28,4) NOT NULL DEFAULT '350.0000'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `object_category`
--

INSERT INTO `object_category` (`object_id`, `category_id`, `rating`, `deviation`) VALUES
(94, 33, 1500.0000, 290.3190),
(94, 34, 1500.0000, 350.0000),
(94, 35, 1500.0000, 227.8909),
(94, 36, 1337.6891, 290.3190),
(94, 37, 1500.0000, 350.0000),
(95, 33, 1500.0000, 350.0000),
(95, 34, 1500.0000, 290.3190),
(95, 35, 1662.3109, 290.3190),
(95, 36, 1376.3409, 253.4046),
(95, 37, 1500.0000, 290.3190),
(96, 33, 1667.5079, 281.3107),
(96, 34, 1500.0000, 350.0000),
(96, 35, 1337.6891, 290.3190),
(96, 36, 1500.0000, 350.0000),
(96, 37, 1545.8252, 213.7248),
(97, 33, 1500.0000, 350.0000),
(97, 34, 1337.6891, 290.3190),
(97, 35, 1500.0000, 350.0000),
(97, 36, 1662.3109, 290.3190),
(97, 37, 1433.8292, 252.8330),
(98, 33, 1500.0000, 350.0000),
(98, 34, 1662.3109, 290.3190),
(98, 35, 1337.6891, 290.3190),
(98, 36, 1629.5024, 247.3476),
(98, 37, 1500.0000, 350.0000),
(99, 33, 1662.3109, 290.3190),
(99, 34, 1500.0000, 290.3190),
(99, 35, 1662.3109, 290.3190),
(99, 36, 1500.0000, 290.3190),
(99, 37, 1337.6891, 290.3190),
(100, 33, 1500.0000, 350.0000),
(100, 34, 1662.3109, 290.3190),
(100, 35, 1500.0000, 350.0000),
(100, 36, 1662.3109, 290.3190),
(100, 37, 1500.0000, 350.0000),
(101, 33, 1500.0000, 350.0000),
(101, 34, 1500.0000, 350.0000),
(101, 35, 1500.0000, 350.0000),
(101, 36, 1376.2195, 253.5290),
(101, 37, 1500.0000, 290.3190),
(102, 33, 1376.2195, 253.5290),
(102, 34, 1500.0000, 350.0000),
(102, 35, 1500.0000, 275.3811),
(102, 36, 1500.0000, 350.0000),
(102, 37, 1662.3109, 290.3190),
(103, 33, 1500.0000, 350.0000),
(103, 34, 1500.0000, 350.0000),
(103, 35, 1500.0000, 350.0000),
(103, 36, 1623.7805, 253.5290),
(103, 37, 1442.3785, 286.9272),
(104, 33, 1500.0000, 350.0000),
(104, 34, 1500.0000, 350.0000),
(104, 35, 1500.0000, 350.0000),
(104, 36, 1500.0000, 350.0000),
(104, 37, 1266.3058, 226.7056),
(105, 33, 1337.6891, 290.3190),
(105, 34, 1337.6891, 290.3190),
(105, 35, 1500.0000, 350.0000),
(105, 36, 1500.0000, 290.3190),
(105, 37, 1500.0000, 350.0000),
(106, 33, 1500.0000, 350.0000),
(106, 34, 1500.0000, 350.0000),
(106, 35, 1500.0000, 350.0000),
(106, 36, 1662.3109, 290.3190),
(106, 37, 1648.0844, 281.5237),
(107, 33, 1500.0000, 350.0000),
(107, 34, 1500.0000, 350.0000),
(107, 35, 1500.0000, 350.0000),
(107, 36, 1337.6891, 290.3190),
(107, 37, 1500.0000, 350.0000),
(108, 33, 1500.0000, 350.0000),
(108, 34, 1500.0000, 350.0000),
(108, 35, 1500.0000, 350.0000),
(108, 36, 1332.4921, 281.3107),
(108, 37, 1648.0844, 281.5237);

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
(24, 'Ethan Graf', 'graf.ethan@gmail.com', '$2y$10$IVCqgnrP2ewoFLHofcqvcOObhEc2sZiVCOy7qdKje5OE4A4eBqaDG'),
(30, 'Vincent Van Gogh', 'vincent@gmail.com', '$2y$10$IVCqgnrP2ewoFLHofcqvcOObhEc2sZiVCOy7qdKje5OE4A4eBqaDG'),
(31, 'Salvador Dali', 'salvador@gmail.com', '$2y$10$IVCqgnrP2ewoFLHofcqvcOObhEc2sZiVCOy7qdKje5OE4A4eBqaDG'),
(32, 'Leonardo DaVinci', 'leonardo@gmail.com', '$2y$10$IVCqgnrP2ewoFLHofcqvcOObhEc2sZiVCOy7qdKje5OE4A4eBqaDG'),
(33, 'Rembrandt', 'rembrandt@gmail.com', '$2y$10$IVCqgnrP2ewoFLHofcqvcOObhEc2sZiVCOy7qdKje5OE4A4eBqaDG'),
(34, 'Pablo Picasso', 'pablo@gmail.com', '$2y$10$IVCqgnrP2ewoFLHofcqvcOObhEc2sZiVCOy7qdKje5OE4A4eBqaDG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compare_object_group`
--
ALTER TABLE `compare_object_group`
  ADD UNIQUE KEY `id` (`id`);

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
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `object_category`
--
ALTER TABLE `object_category`
  ADD UNIQUE KEY `object_id` (`object_id`,`category_id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `compare_object_group`
--
ALTER TABLE `compare_object_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `group_member`
--
ALTER TABLE `group_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
