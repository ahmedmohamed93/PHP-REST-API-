-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2018 at 10:10 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myapi`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`) VALUES
(1, 'Technology', '2018-09-15 14:34:38'),
(2, 'Gaming', '2018-09-15 14:34:38'),
(3, 'Audio', '2018-09-15 14:34:38'),
(4, 'Entertainment', '2018-09-15 14:34:38'),
(5, 'Books', '2018-09-15 14:34:38');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `title`, `body`, `author`, `created_at`) VALUES
(1, 1, 'Technology Post One', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.', 'Ahemd Kappo', '2018-09-15 17:20:44'),
(2, 2, 'Gaming Post One', 'Cupiditate hic explicabo doloremque sint saepe.', 'Mallek Ahmed', '2018-09-15 17:24:10'),
(3, 1, 'Technology Post Two', 'Alias possimus rerum animi voluptatibus nemo quod? Doloremque porro dicta eum facilis praesentium rerum recusandae distinctio!', 'Mohamed Mostafa', '2018-09-15 17:24:10'),
(4, 4, 'Entertainment Post One', 'Cupiditate hic explicabo doloremque sint saepe', 'Mostafa Mohamed', '2018-09-15 17:24:10'),
(5, 4, 'Entertainment Post Two', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit', 'Ahmed Mohamed', '2018-09-15 17:24:10'),
(6, 1, 'Technology Post Three', 'Alias possimus rerum animi voluptatibus nemo quod? Doloremque porro dicta eum facilis praesentium rerum recusandae distinctio!', 'Ahmed CR7', '2018-09-15 17:25:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
