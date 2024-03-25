-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2024 at 01:29 AM
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
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`name`, `email`, `message`) VALUES
('ili', 'ilazgashi258@gmail.com', 'hello'),
('ilii', 'ilaz.gashi.33@gmail.com', 'hi'),
('ilii', 'ilaz.gashi.33@gmail.com', 'hi'),
('hello', 'edi.kuliqi01@outlook.com', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `rubrika`
--

CREATE TABLE `rubrika` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `photo` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rubrika`
--

INSERT INTO `rubrika` (`id`, `title`, `photo`) VALUES
(2, 'hello', 0x75706c6f6164732f70726f6a656b74206b6f6e636570742e504e47);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(30) NOT NULL DEFAULT current_timestamp(),
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `email`, `password`, `role`) VALUES
('1', 'admin', 'admin', 'admin@admin.com', 'admin', 'admin'),
('2024-03-18 23:19:37', 'Ilazz', 'Gashi', 'ilazgashi258@gmail.com', 'ili', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rubrika`
--
ALTER TABLE `rubrika`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rubrika`
--
ALTER TABLE `rubrika`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
