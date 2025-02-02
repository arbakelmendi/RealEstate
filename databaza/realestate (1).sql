-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2025 at 05:37 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `realestate`
--

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(11) NOT NULL,
  `location` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` text NOT NULL,
  `pw` text NOT NULL,
  `status` text NOT NULL,
  `id` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `pw`, `status`, `id`, `created_by`) VALUES
('arba', '$2y$10$s6YHqhiez/kl4y8.ArSXAuDl26zpR5v9wxh6mjVDcy/0/Eb8lZKUi', 'admin', 4, NULL),
('besa', '$2y$10$fu7YS7XD53Voy3MD0a2kc.JjW2EVMZnfmzdA5pdaMZu0gcifmHyd6', 'user', 6, NULL),
('vesa', '$2y$10$OfGxZ/UcanWrZhukSsfgw.YgH1CZ0Sedt96Pdwp8xZflh1R4qwCoS', 'user', 8, NULL),
('elmedina', '$2y$10$eRDfT57ndoz0c2VZnAnwN.G.HdARxsJsBvSBQFmuZX0HgZd5V0ase', 'admin', 9, NULL),
('leon', '$2y$10$T/N62aW0DhriBZJqt0ufTemC7lYVCgeKvdPOdqrrBBlAEDwly0Dv.', 'user', 10, NULL),
('andi', '$2y$10$4dCY.XD8Xh/jDW1DJOwUOO0DCoimNT5TvDOVRYqvP8/OlmnuxOttG', 'admin', 12, NULL),
('fatmir', '$2y$10$wnQviIlTnvyroPtOzEZOfuEmXcfWWGQ2VSBZR/gtidnsMduZ0dFqa', 'admin', 13, NULL),
('lumi', '$2y$10$xuc6rs6GUbGfG.zzOjM43eoEg/U6O2Fd51kMDtthWEsMXnakFz2pq', 'user', 16, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_created_by` (`created_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_created_by` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
