-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 27, 2021 at 06:02 AM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `groupprojectdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `user_id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `post` varchar(255) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `viewerviewable` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`user_id`, `category`, `post`, `topic`, `viewerviewable`) VALUES
(3, 'dog', '1st dog post', '1st dog topic', 1),
(7, 'cat', 'first cat post', 'first cat topic', 1),
(4, 'testing space', 'post on testing space', 'topic on testing space', 1),
(8, 'orca', 'orca post', 'orca topic', 0),
(8, 'Category with no topic or post!', '', '', 1),
(6, 'dog', 'second dog post!', 'second dog topic!', 1),
(4, 'cat', 'second cat post!', 'second cat topic!', 1),
(27, 'hello there', '', '', 0),
(27, 'hi', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `permission` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `permission`) VALUES
(27, 'annsuperuser', '$2y$10$1F8/jk.qoSJfKLnkQodpxOc82NW0.U5evnGpOXTVDGg31BuT07842', 'superuser'),
(28, 'annadmin', '$2y$10$c7AEREcbmWM9wK00svv1iuwfYdscM5YX7x.GFNo2q71nHTn3kGVc2', 'admin'),
(29, 'annposter', '$2y$10$qvwe1ngMPaZFKQdMGQxY6.85ScB0j28Byi2PeMlj5XcUegxxKWRXG', 'poster');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
