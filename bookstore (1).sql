-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2020 at 04:31 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id`, `name`) VALUES
(1, 'nm'),
(2, 'nm'),
(3, 'COMPLETE SERIES OF SHERLOCK HOLMES : 12 BOOKS BOX SET'),
(4, 'SAPEKSHATHAWADAYA SARALA BASIN'),
(5, 'STREET CHILD'),
(6, 'GO SET A WATCHMAN'),
(7, 'TEN STORIES'),
(8, ''),
(9, ''),
(10, ''),
(11, ''),
(12, 'jayasignha_agro'),
(13, ''),
(14, 'wsw'),
(15, 'Sir Arthur Conan Doyle'),
(16, 'Sir Arthur Conan Doyle'),
(17, 'Sir Arthur Conan Doyle');

-- --------------------------------------------------------

--
-- Table structure for table `book_details`
--

CREATE TABLE `book_details` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `auther_name` varchar(244) NOT NULL,
  `publish` varchar(200) NOT NULL,
  `price` int(110) NOT NULL,
  `isbn` varchar(200) NOT NULL,
  `medium` varchar(200) NOT NULL,
  `image` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_details`
--

INSERT INTO `book_details` (`id`, `name`, `auther_name`, `publish`, `price`, `isbn`, `medium`, `image`, `cat_id`) VALUES
(8, 'COMPLETE SERIES OF SHERLOCK HOLMES : 12 BOOKS BOX SET', 'Sir Arthur Conan Doylee', '2012-02-27', 10500, '9789557169125', 'english    ', 'BK208800.jpg', 1),
(9, 'SAPEKSHATHAWADAYA SARALA BASIN', 'Prasanna Maduranga Pranandu', '2020-07-01', 300, '9789557169124', 'sinhala', 'SB 0016259.jpg', 1),
(10, 'STREET CHILD', '	Berlie Doherty', '2018-03-07', 1090, '9780007311255', 'english', 'BK200795.jpg', 2),
(11, 'GO SET A WATCHMAN', 'Harper Lee', '2020-06-11', 2490, '9781785150289', 'english', '186936.jpg', 2),
(12, 'TEN STORIES', 'Kamala Wijeratne', '2019-11-20', 275, '9789559662747', 'english', 'BK 159854.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `id` int(11) NOT NULL,
  `catagory_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`id`, `catagory_name`) VALUES
(1, 'science'),
(2, 'Classics'),
(3, 'Short Stories'),
(5, 'Novels');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_details`
--
ALTER TABLE `book_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `book_details`
--
ALTER TABLE `book_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
