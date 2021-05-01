-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 01, 2021 at 07:39 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id16219776_webform`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `pwd` varchar(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `pwd`) VALUES
('admin1', 'admin1');

-- --------------------------------------------------------

--
-- Table structure for table `boq`
--

CREATE TABLE `boq` (
  `status` varchar(11) NOT NULL DEFAULT 'draft',
  `id` varchar(11) NOT NULL,
  `pwd` varchar(11) NOT NULL,
  `noOfsub` int(11) NOT NULL,
  `rate1` int(11) NOT NULL,
  `rate2` int(11) NOT NULL,
  `rate3` int(11) NOT NULL,
  `rate4` int(11) NOT NULL,
  `cur1` varchar(11) NOT NULL,
  `cur2` varchar(11) NOT NULL,
  `amt1` int(11) NOT NULL,
  `amt2` int(11) NOT NULL,
  `amt3` int(11) NOT NULL,
  `amt4` int(11) NOT NULL,
  `total1` int(11) NOT NULL,
  `total2` int(11) NOT NULL,
  `sst2` float NOT NULL,
  `total2withsst2` float NOT NULL,
  `week1` int(11) NOT NULL,
  `week2` int(11) NOT NULL,
  `week3` int(11) NOT NULL,
  `week4` int(11) NOT NULL,
  `weekstotal` int(11) NOT NULL,
  `per1` float NOT NULL,
  `per2` float NOT NULL,
  `per3` float NOT NULL,
  `per4` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `boq`
--

INSERT INTO `boq` (`status`, `id`, `pwd`, `noOfsub`, `rate1`, `rate2`, `rate3`, `rate4`, `cur1`, `cur2`, `amt1`, `amt2`, `amt3`, `amt4`, `total1`, `total2`, `sst2`, `total2withsst2`, `week1`, `week2`, `week3`, `week4`, `weekstotal`, `per1`, `per2`, `per3`, `per4`) VALUES
('draft', 'abb1', 'abb1', 0, 20, 5, 9, 7, 'USD', 'USD', 20, 5, 9, 7, 25, 16, 2.08, 18.08, 0, 0, 0, 0, 0, 3, 3, 3, 23),
('unsub', 'schneider1', 'schneider1', 0, 2, 3, 4, 4, 'USD', 'USD', 2, 3, 4, 4, 5, 8, 1.04, 9.04, 4, 4, 6, 6, 20, 8, 9, 6, 8),
('unsub', 'siemens1', 'siemens1', 0, 0, 0, 0, 0, 'Euro', 'Euro', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boq`
--
ALTER TABLE `boq`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pwd` (`pwd`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
