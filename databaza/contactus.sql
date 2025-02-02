-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2025 at 05:26 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web`
--

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `username` text NOT NULL,
  `message` varchar(100) DEFAULT NULL,
  `attachment` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `surname`, `username`, `message`, `attachment`) VALUES
(2, 'elmedina', 'menxhiqi', 'elmedinamenxhiqi9@gmail.com', 'bla bla\r\n', NULL),
(3, 'arba ', 'kelmendi', 'arbakelmendi@gmail.com', 'bla bla bla', NULL),
(4, 'arba ', 'kelmendi', 'arbakelmendi@gmail.com', 'bla bla bla', NULL),
(5, 'arba ', 'kelmendi', 'arbakelmendi@gmail.com', 'bla bla bla', NULL),
(6, 'arba ', 'kelmendi', 'arbakelmendi@gmail.com', 'bla bla bla', NULL),
(7, 'arba', 'kelmendi', 'ak@gmail.com', 'blaaa', NULL),
(8, 'arba', 'kelmendi', 'ak@gmail.com', 'blaaa', NULL),
(9, 'arba', 'kelmendi', 'ak@gmail.com', 'blaaa', NULL),
(10, 'elmedina', 'menxhiqi', 'em@gmail.com', 'lksdnfkld', NULL),
(11, 'elmedina', 'menxhiqi', 'em@gmail.com', 'lksdnfkld', NULL),
(12, 'elmedina', 'me', 'e@gmail.com', 'kldfng', NULL),
(13, 'elmedina', 'me', 'e@gmail.com', 'kldfng', NULL),
(14, 'e', 'e', 'e@kdnf.com', 'sdfdsf', NULL),
(15, 'e', 'e', 'e@kdnf.com', 'sdfdsf', NULL),
(16, 'e', 'e', 'e@gmail.com', 'sdf', NULL),
(17, 'e', 'e', 'e@gmail.com', 'sdf', NULL),
(18, 'e', 'e', 'e@gmail.com', 'sdf', NULL),
(19, 'e', 'e', 'e@gmail.com', 'sdf', NULL),
(20, 'elmedina', 'menxhiqi', 'em@gmail.com', 'jlsnfdksl', NULL),
(21, 'elmedina', 'menxhiqi', 'em@gmail.com', 'jlsnfdksl', NULL),
(22, 'elmedina', 'menxhiqi', 'em@gmail.com', 'jlsnfdksl', NULL),
(23, 'elmedina', 'menxhiqi', 'em@gmail.com', 'jlsnfdksl', NULL),
(24, 'dsfg', 'fdg', 'dkn@gmail.com', 'sdfsd', NULL),
(25, 'arba', 'kelmendi', 'arbakelmendi@gmail.com', 'dsfgfdgsfg', NULL),
(26, 'elmedina', 'menxhiqi', 'elmedinamenxhiqi@gmail.com', 'elmedinsldknsdg', NULL),
(27, 'elmedina', 'menxhiqi', 'elmedinamenxhiqi@gmail.com', 'elmedinsldknsdg', NULL),
(28, 'elmedina', 'menxhiqi', 'elmedinamenxhiqi@gmail.com', 'elmedinsldknsdg', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
