-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2015 at 05:30 AM
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
  `group_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `group_id`) VALUES
(1, 'Ayy Lmao', 'A E S T H E T I C'),
(2, 'activity', 'A E S T H E T I C'),
(3, 'books', 'A E S T H E T I C'),
(4, 'wo', 'A E S T H E T I C'),
(5, 'lamp', 'A E S T H E T I C'),
(6, 'ooooooooooooooo', 'A E S T H E T I C'),
(7, 'Ben Ng', 'A E S T H E T I C'),
(8, 'Moxie', 'A E S T H E T I C'),
(9, 'proletarian', 'A E S T H E T I C'),
(10, 'google box', 'A E S T H E T I C'),
(11, 'Overall Quality', 'Tricycle'),
(12, 'Overall Quality', 'Test'),
(13, 'Overall Quality', 'Different Tricycle'),
(14, 'Overall Quality', 'Another Group'),
(15, 'Overall Quality', 'Loneliness'),
(16, 'Overall Quality', 'Mirror Monsters'),
(17, 'Overall Quality', 'Gingers + Sam'),
(18, 'Overall Quality', 'Testaroo'),
(19, 'Overall Quality', 'testiiiiiiiiii'),
(20, 'Overall Quality', 'ayy lmao'),
(21, 'Overall Quality', 'Just Conor'),
(22, 'Overall Quality', 'Fancy Tricycle'),
(33, 'goood', 'Sams2');

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
(7, 2, 0, 'image', 1, 1, 2),
(8, 2, 0, 'image', 1, 2, 3),
(9, 4, 0, 'image', 3, 1, 3),
(10, 1, 0, 'image', 1, 0, 0),
(11, 3, 0, 'image', 1, 1, 1),
(12, 6, 0, 'image', 1, 1, 2),
(13, 7, 0, 'audio', 1, 0, 3),
(14, 8, 0, 'audio', 1, 1, 1),
(15, 9, 0, 'audio', 3, 1, 1),
(16, 10, 0, 'audio', 3, 0, 1),
(17, 11, 0, 'audio', 4, 0, 1),
(18, 12, 0, 'document', 1, 2, 2);

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
(31, 'Tricycle', 4, 'Users', 'You know it'),
(35, 'Test', 18, 'Users', 'LETS GOO'),
(36, 'Different Tricycle', 5, 'Users', 'Why?!?!'),
(37, 'Another Group', 3, 'Users', 'For testing purposes'),
(38, 'Loneliness', 1, 'Images', ':('),
(39, 'Mirror Monsters', 5, 'Users', 'c. 2010'),
(40, 'Gingers + Sam', 3, 'Users', 'Test'),
(41, 'Testaroo', 3, 'Users', 'iiiiiiiiiii'),
(42, 'testiiiiiiiiii', 3, 'Users', 'pppppppppp'),
(43, 'ayy lmao', 2, 'Users', 'plz help'),
(49, 'Just Conor', 1, 'Users', 'ayy lmao'),
(50, 'Fancy Tricycle', 3, 'Users', 'Tis true'),
(52, 'A E S T H E T I C', 5, 'Users', '420'),
(55, 'Sams2', 2, 'Users', 'sam');

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
(11, 1, 'Sam Rackey', 'Tricycle', 23, 9),
(12, 3, 'Deb Weidman', 'Tricycle', 26, 15),
(13, 4, 'Jared Rushanan', 'Tricycle', 30, 19),
(19, 1, 'Sam Rackey', 'Test', 21, 10),
(20, 2, 'Ethan Graf', 'Test', 23, 4),
(21, 3, 'Deb Weidman', 'Test', 24, 14),
(22, 4, 'Jared Rushanan', 'Test', 36, 20),
(23, 5, 'Taiga Okada', 'Test', 21, 12),
(25, 5, 'Taiga Okada', 'Different Tricycle', 20, 12),
(26, 6, 'Parker', 'Different Tricycle', 17, 7),
(27, 1, 'Sam Rackey', 'Another Group', 47, 33),
(28, 4, 'Jared Rushanan', 'Another Group', 59, 21),
(29, 7, 'Da-Jin Chu', 'Another Group', 1, 0),
(30, 6, 'Parker', 'Loneliness', 16, 7),
(32, 2, 'Ethan Graf', 'Mirror Monsters', 20, 3),
(33, 7, 'Da-Jin Chu', 'Mirror Monsters', 1, 0),
(34, 8, 'Mike Richard', 'Mirror Monsters', 1, 0),
(35, 6, 'Parker Taggard', 'Mirror Monsters', 16, 7),
(37, 3, 'Deborah Weidman', 'Gingers + Sam', 21, 12),
(38, 8, 'Mike Richard', 'Gingers + Sam', 1, 0),
(40, 4, 'Jared', 'Testaroo', 30, 18),
(41, 6, 'Parker', 'Testaroo', 16, 7),
(43, 7, 'da-jin', 'testiiiiiiiiii', 1, 0),
(44, 2, 'ethan', 'testiiiiiiiiii', 20, 3),
(47, 9, 'Natalie Tomeh', 'Tricycle', 2, 1),
(48, 2, 'Ethan Graf', 'Different Tricycle', 20, 3),
(49, 4, 'Jared', 'Different Tricycle', 30, 18),
(50, 6, 'Parker Taggard', 'Test', 16, 7),
(54, 13, 'Conor Wisentaner', 'Just Conor', 1, 0),
(55, 1, 'Sam Rackey', 'Fancy Tricycle', 10, 5),
(56, 3, 'Deb', 'Fancy Tricycle', 7, 4),
(57, 4, 'Jared Rushanan', 'Fancy Tricycle', 11, 5),
(61, 1, 'Sam Rackey', 'A E S T H E T I C', 10, 5),
(62, 3, 'Deb Weidman', 'A E S T H E T I C', 7, 4),
(63, 2, 'Ethan Graf', 'A E S T H E T I C', 6, 1),
(64, 16, 'Vanya Vegner', 'A E S T H E T I C', 13, 6),
(65, 4, 'Jared Rushanan', 'A E S T H E T I C', 11, 5),
(73, 1, 'Sam Rackey', 'Sams2', 1, 0),
(74, 25, 'sam', 'Sams2', 1, 0);

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
(1, '1QjVgbT.jpg', 'image', 'uploads/1/images/1QjVgbT.jpg', 1),
(2, 'Operation_Ivy_-_Energy_(1989).jpg', 'image', 'uploads/1/images/Operation_Ivy_-_Energy_(1989).jpg', 1),
(3, 'zapdos.jpg', 'image', 'uploads/1/images/zapdos.jpg', 1),
(4, 'h86494k.jpg', 'image', 'uploads/3/images/h86494k.jpg', 3),
(5, 'robbing.jpg', 'image', 'uploads/3/images/robbing.jpg', 3),
(6, 's-AFLAC-DUCK-large300.jpg', 'image', 'uploads/1/images/s-AFLAC-DUCK-large300.jpg', 1),
(7, '13 - Bombastic Intro.mp3', 'audio', 'uploads/1/audio/13 - Bombastic Intro.mp3', 1),
(8, '05 Avalanche Rock.mp3', 'audio', 'uploads/1/audio/05 Avalanche Rock.mp3', 1),
(9, '02 - Sick And Sad.mp3', 'audio', 'uploads/3/audio/02 - Sick And Sad.mp3', 3),
(10, '06 V-2 schneider.mp3', 'audio', 'uploads/3/audio/06 V-2 schneider.mp3', 3),
(11, '04 - Why Bother.mp3', 'audio', 'uploads/4/audio/04 - Why Bother.mp3', 4),
(12, 'MW - 03 - Notes - Nationalism in Europe.pdf', 'document', 'uploads/1/documents/MW - 03 - Notes - Nationalism in Europe.pdf', 1);

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
(1, 'Sam Rackey', 'sam@sam.com', '$2y$10$NiaPk6ibHXkxZ1LoJC274eV4TJOodSd.AjJjAqcDAy.NpTUzzAq3m'),
(2, 'Ethan Graf', 'ethan@ethan.com', '$2y$10$khlRrWC9JoEGphM9E58tWe5osI0HfxHkl48SqJrtlAPnNQhHHlpuy'),
(3, 'Deb Weidman', 'deb@deb.com', '$2y$10$khlRrWC9JoEGphM9E58tWe5osI0HfxHkl48SqJrtlAPnNQhHHlpuy'),
(4, 'Jared Rushanan', 'jared@jared.com', '$2y$10$khlRrWC9JoEGphM9E58tWe5osI0HfxHkl48SqJrtlAPnNQhHHlpuy'),
(5, 'Taiga Okada', 'taiga@taiga.jp', '$2y$10$khlRrWC9JoEGphM9E58tWe5osI0HfxHkl48SqJrtlAPnNQhHHlpuy'),
(6, 'Parker', 'parker@parker.se', '$2y$10$khlRrWC9JoEGphM9E58tWe5osI0HfxHkl48SqJrtlAPnNQhHHlpuy'),
(7, 'Da-Jin Chu', 'Dajin@dajin.com', '$2y$10$khlRrWC9JoEGphM9E58tWe5osI0HfxHkl48SqJrtlAPnNQhHHlpuy'),
(8, 'Mike Richard', 'mike@mike.com', '$2y$10$khlRrWC9JoEGphM9E58tWe5osI0HfxHkl48SqJrtlAPnNQhHHlpuy'),
(9, 'Natalie Tomeh', 'natalie@natalie.gov', '$2y$10$khlRrWC9JoEGphM9E58tWe5osI0HfxHkl48SqJrtlAPnNQhHHlpuy'),
(13, 'Conor Wisentaner', 'conor@conor.com', '$2y$10$khlRrWC9JoEGphM9E58tWe5osI0HfxHkl48SqJrtlAPnNQhHHlpuy'),
(16, 'Vanya Vegner', 'vanya@vanya.ru', '$2y$10$PW.QuRAJmZxvNdEJb8Wrmem14HEWwEixD8gIvefqRs4q0l8WJRVaK'),
(17, 'Nate Fissete', 'nate@nate.com', '$2y$10$OBtokYZNcha0kamoVyPy3e3pcczZKpF938uiXFxSkCz6551Oofsx.'),
(18, 'Leo Goldscmidt', 'leo@leo.com', '$2y$10$sFgwoLm0cAwPrD9CdwlUHe9tZiMlpOsHT1lEACVS7b6gy6N2r9RsO'),
(19, 'Ben Ng', 'benng@benng.com', '$2y$10$otND40/J3jj3oMXiRmV8COiKdr/Lc3FwM41F7Xk33FLhh4c1DDgfG'),
(25, 'sam', 'samrcr71@gmail.com', '$2y$10$607dDxNSY1l.6DTwSnsOluGlVI/kt42Zx9sZpQvl5nSyQBCs9Oipy');

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `compare_object_group`
--
ALTER TABLE `compare_object_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `group_member`
--
ALTER TABLE `group_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
