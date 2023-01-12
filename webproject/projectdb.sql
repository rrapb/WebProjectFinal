-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2021 at 09:45 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `contactform`
--

CREATE TABLE `contactform` (
  `id` int(11) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `email` varchar(45) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactform`
--

INSERT INTO `contactform` (`id`, `firstname`, `lastname`, `gender`, `email`, `message`) VALUES
(1, 'test', 'test', 0, 'test3@test.com', 'test test test test'),
(2, 'test', 'test', 1, 'test4@test.com', 'test test test test'),
(3, 'test', 'test', 0, 'test6@test.com', 'test test test test'),
(4, 'test', 'test', 0, 'test4@test.com', 'test test test test'),
(5, 'test5', 'test5', 1, 'test5@test.com', 'test test test test'),
(8, 'samir', 'tahiri', 0, 'samir@tahiri.com', 'une dua te aplikoj'),
(10, 'cxdsxacw', 'eweee', 0, 'ndsa@go.xo', 'dsakjndsa');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `password` varchar(512) NOT NULL,
  `email` varchar(128) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `admin`, `image`) VALUES
(50, 'rrap12', '$2y$10$V4LieYhQRaqAk5cHvV7Cxurs5QwSKd8poJ5njNhIKi8wxD0L4J/3.', 'rrap@email.com', 1, ''),
(63, 'freskim2', '$2y$10$nCUWYTYAJT2h.OEZx/EKWuUtzVQNuhOwh3It39XVqU7ORCQl2u0Oy', 'freskim@gmail.com', 1, ''),
(72, 'samirrrrr', '$2y$10$65oS.TL6aeawN16.BslH6ec8ke.hz5FoZD2mik0rnh5.vzVjr/e6y', 'samir@dsd.com', 1, ''),
(76, 'betim', '$2y$10$Ib/B8G50gpTVdRojUW/2BOHc8v9O4T.yhhHfu5uqp4Hg4sVS9lLpa', 'be@gmai.com', 0, ''),
(77, 'freskim', '$2y$10$O7w2/lDcRe4UedOkPe7uVONwJKItjDz9DArphYAq574zfo/9bxpxK', 'freska@go.co', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contactform`
--
ALTER TABLE `contactform`
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
-- AUTO_INCREMENT for table `contactform`
--
ALTER TABLE `contactform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
