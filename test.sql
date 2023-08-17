-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2023 at 12:03 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 5.6.30

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) NOT NULL,
  `sdt` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `birth` date NOT NULL,
  `gender` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `sdt`, `pass`, `birth`, `gender`) VALUES
(1, 'admin', 'admin@gmail.com', '0364369066', '1', '2000-02-13', 'Male'),
(2, 'Linh', 'test@gmail.com', '0124824819', '123456cscsc', '2001-03-03', 'Female'),
(3, 'a', 'a', 'a', '1', '2001-03-03', 'Male'),
(5, 'linh', 'songvedemtiktok@gmail.com', '09149894819', 'e10adc3949ba59abbe56e057f20f883e', '2002-09-12', 'Male'),
(10, 'ronaldo', 'ronaldo@gmail.com', '090289108', '202cb962ac59075b964b07152d234b70', '1985-12-05', 'Male'),
(12, 'sscjsnc', 'phuong@gmail.com', '', 'e10adc3949ba59abbe56e057f20f883e', '9898-09-08', 'Male'),
(13, '3213231', 'nxlinh.19it4@sict.udn.vn', '', 'e10adc3949ba59abbe56e057f20f883e', '2321-12-31', 'Male'),
(14, 'Linh Nguyễn', 'lingnguyen3301@gmail.com', '09944428895', 'e10adc3949ba59abbe56e057f20f883e', '1999-01-01', 'Male'),
(15, 'Mr.Linh', 'nxlinh.19it4@vku.udn.vn', '099284292', 'e10adc3949ba59abbe56e057f20f883e', '2000-02-09', 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
