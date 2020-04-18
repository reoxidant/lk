-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 18, 2020 at 12:19 PM
-- Server version: 5.7.26
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yii2basic`
--

-- --------------------------------------------------------

--
-- Table structure for table `plk_class_products`
--

CREATE TABLE `plk_class_products` (
  `id` int(8) NOT NULL,
  `title` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plk_class_products`
--

INSERT INTO `plk_class_products` (`id`, `title`) VALUES
(1, 'MacBook Pro 15'),
(2, 'MacBook Pro 13'),
(3, 'MacBook Air 13'),
(4, 'MacBook Air 11'),
(5, 'MacBook 12');

-- --------------------------------------------------------

--
-- Table structure for table `plk_countries`
--

CREATE TABLE `plk_countries` (
  `code` char(2) NOT NULL,
  `name` char(52) NOT NULL,
  `population` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plk_countries`
--

INSERT INTO `plk_countries` (`code`, `name`, `population`, `status`) VALUES
('AU', 'Australia', 24016400, 0),
('BR', 'Brazil', 205722000, 0),
('CA', 'Canada', 35985751, 0),
('CN', 'China', 1375210000, 1),
('DE', 'Germany', 81459000, 1),
('ES', 'Spain', 47007367, 1),
('FR', 'France', 64513242, 0),
('GB', 'United Kingdom', 65097000, 0),
('KZ', 'Kazakhstan', 18653500, 1),
('US', 'United States', 322976000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `plk_products`
--

CREATE TABLE `plk_products` (
  `id` int(8) NOT NULL,
  `title` tinytext NOT NULL,
  `class_id` int(8) NOT NULL,
  `year` int(8) NOT NULL,
  `price` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plk_products`
--

INSERT INTO `plk_products` (`id`, `title`, `class_id`, `year`, `price`) VALUES
(1, 'Apple MacBook Air 13 ', 3, 2015, 40000),
(2, 'MacBook Pro 15 Retina 2012 256 в хорошем состоянии', 1, 2012, 45000),
(3, 'Apple MacBook Pro 15 2017', 1, 2017, 125000),
(4, 'MacBook Pro 13 2017', 2, 2017, 61000),
(5, 'MacBook Air 11/Mid2013/i5/4/256/HD5000', 4, 2013, 30000),
(6, 'MacBook 12\" Retina/Core M/DDR3-8Gb/SSD-256Gb/Mojave', 5, 2015, 62999),
(7, 'MacBook Pro 13 2016 i7 3.3GHz 16GB Гарантия art385', 2, 2016, 86000),
(8, 'Apple MacBook Pro 15 i7 16Gb ssd750', 1, 2011, 49500),
(9, 'Apple MacBook Pro 15 (Late 2013) 2.3GHz/16GB/512GB', 1, 2013, 95000),
(10, 'Apple MacBook Pro 13\" TouchBar (mid 2018)\r\n', 2, 2018, 107990),
(11, 'Apple MacBook Air 13\" (mjve2) Core i5 1,6 ггц, 4 Г', 3, 2015, 69990),
(12, 'Apple MacBook Retina 12 2017 рст', 5, 2017, 62000),
(13, 'MacBook Pro 15 2014 i7 2.2GHz 16GB 256SSD art409', 1, 14, 55000),
(14, 'MacBook air 11 2013 128gb идеал', 4, 2013, 32000),
(15, 'Apple MacBook Air 11 2015 Идеал', 4, 2015, 51000),
(16, 'Apple MacBook air 13 2019', 3, 2019, 74000),
(17, 'Macbook air 13 идеал ; 256ssd; активация ', 3, 2017, 45000),
(18, 'Apple MacBook air 13 2019', 3, 2019, 74000),
(19, 'Macbook air 13 идеал ; 256ssd; активация ', 3, 2017, 45000),
(20, 'Apple MacBook Air 13 mid 2014 Core i7 8GB 128Gb SS', 3, 2014, 29990),
(21, 'MacBook 12 25 циклов 2017год', 5, 2017, 55000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `plk_class_products`
--
ALTER TABLE `plk_class_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plk_countries`
--
ALTER TABLE `plk_countries`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `plk_products`
--
ALTER TABLE `plk_products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `plk_class_products`
--
ALTER TABLE `plk_class_products`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `plk_products`
--
ALTER TABLE `plk_products`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
