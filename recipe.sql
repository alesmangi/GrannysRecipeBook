-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 16, 2021 at 05:05 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

DROP TABLE IF EXISTS `recipe`;
CREATE TABLE IF NOT EXISTS `recipe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) NOT NULL,
  `time` varchar(200) NOT NULL,
  `bookmarks` int(11) NOT NULL DEFAULT 0,
  `owner_name` varchar(300) NOT NULL,
  `recipe` text NOT NULL,
  `ingredients` text NOT NULL,
  `photo_1` varchar(400) DEFAULT NULL,
  `photo_2` varchar(400) DEFAULT NULL,
  `photo_3` varchar(400) DEFAULT NULL,
  `photo_4` varchar(400) DEFAULT NULL,
  `nutrition` text DEFAULT NULL,
  `notes` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`id`, `title`, `time`, `bookmarks`, `owner_name`, `recipe`, `ingredients`, `photo_1`, `photo_2`, `photo_3`, `photo_4`, `nutrition`, `notes`) VALUES
(1, 'This is the title of the recipe', 'in 3 minutes', 50, 'Kim Jun', 'Put the oil in water', 'Water, Oil', '', 'warning-icons.png', '', '', '', ''),
(2, 'Wonderful recipe', 'in 3 minutes', 50, 'Kim Jun', 'Put the oil in water', 'Water, Oil', 'img-1.jpeg', 'warning-icons.png', '', '', '', ''),
(3, 'Pesto Pasta', '15 minutes', 20, 'Aless Mangialardo', 'Cook pasta, cook rest of ingredients in another pan, mix once done', 'pasta, onions, pesto, olive oil', 'warning-icons.png', 'warning-icons.png', '', '', '', '');

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'John Doe', 'johndoe@gmail.com', '123456');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
