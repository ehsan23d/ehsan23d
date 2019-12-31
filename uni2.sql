-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2019 at 08:08 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uni2`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file` text COLLATE utf8_unicode_ci NOT NULL,
  `local_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `file`, `local_name`, `type`) VALUES
(6, 2, '5e01bd855d64e.jpg', 'm7.jpg', 'image/jpeg'),
(7, 2, '5e01bdb2b266b.jpg', 'mm.jpg', 'image/jpeg'),
(8, 2, '5e01fef016394.jpg', 'mm5.jpg', 'image/jpeg'),
(9, 11, '5e07a69fde6fb.jpg', 'mm.jpg', 'image/jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `user_id`, `post_id`, `text`) VALUES
(1, 4, 6, 'ok'),
(2, 4, 7, 'kjh'),
(3, 4, 6, 'mmmm'),
(4, 4, 7, 'kn n'),
(5, 12, 6, 'ridy'),
(6, 12, 7, 'zz');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `access` tinyint(4) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `access`, `image`) VALUES
(1, 'mahdi', 'mahdi', '81dc9bdb52d04dc20036dbd8313ed055', 1, ''),
(2, 'shams', 'shams', '81dc9bdb52d04dc20036dbd8313ed055', 1, ''),
(3, 'mahdi', 'mahdi', '81dc9bdb52d04dc20036dbd8313ed055', 2, ''),
(4, 'mohammad', 'mohammad', '81dc9bdb52d04dc20036dbd8313ed055', 2, ''),
(5, 'mohammad', 'mohammad', '81dc9bdb52d04dc20036dbd8313ed055', 2, ''),
(6, 'mohammad', 'mohammad', '81dc9bdb52d04dc20036dbd8313ed055', 2, ''),
(7, 'kamal', 'kamal', '81dc9bdb52d04dc20036dbd8313ed055', 1, ''),
(8, 'shams', 'shams', '81dc9bdb52d04dc20036dbd8313ed055', 1, ''),
(9, 'mohammad', 'mohammad', '81dc9bdb52d04dc20036dbd8313ed055', 2, ''),
(10, 'shams', 'shams', '81dc9bdb52d04dc20036dbd8313ed055', 1, ''),
(11, 'mahsa', 'mahsa', '81dc9bdb52d04dc20036dbd8313ed055', 1, ''),
(12, 'bagher', 'bagher', '81dc9bdb52d04dc20036dbd8313ed055', 2, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
