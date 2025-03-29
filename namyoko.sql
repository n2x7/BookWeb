-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2024 at 04:41 AM
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
-- Database: `namyoko`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bid` int(20) NOT NULL,
  `bName` varchar(50) NOT NULL,
  `bPrice` int(4) NOT NULL,
  `bCover` varchar(255) NOT NULL,
  `bAuthor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Book Information';

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bid`, `bName`, `bPrice`, `bCover`, `bAuthor`) VALUES
(1, 'Harry Potter and the Sorcerer\'s Stone', 300, 'uploads/h1.jpg', 'J.K'),
(2, 'Harry Potter and the Chamber of Secrets', 350, 'uploads/h2.jpg', 'J.K'),
(3, 'Harry Potter and the Prisoner of Azkaban', 400, 'uploads/h3.jpg', 'J.K'),
(4, 'Harry Potter and the Goblet of Fire', 460, 'uploads/h4.jpg', 'J.K'),
(5, 'Harry Potter and the Order of the Phoenix', 470, 'uploads/h5.jpg', 'J.K'),
(6, 'Harry Potter and the Half-Blood Prince', 500, 'uploads/h6.jpg', 'J.K'),
(7, ' Harry Potter and the Deathly Hallows', 450, 'uploads/h7.jpg', 'J.K'),
(17, ' The Lightning Thief', 289, 'uploads/p1.jpg', 'Rick Riordan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fName` varchar(80) NOT NULL,
  `lName` varchar(80) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='user information';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `password`, `email`, `fName`, `lName`, `date`) VALUES
(1, 'n2x7', '0800688004', 'namboy180@gmail.com', 'Tip', 'Non', '2024-10-07 23:27:37'),
(2, 'nam', '123456', 'namxu19@hotmail.com', 'Non', 'Tip', '2024-10-07 23:28:22'),
(5, 'namxu', '123456789', 'namtii06@gmail.com', 'tipaporn', 'nonthamat', '2024-10-09 01:11:05'),
(7, 'ying', '1234', 'nam@gmail.com', 'Ying', 'nonthamat', '2024-10-09 01:16:17'),
(9, 'gkhuk', 'gyk', 'na@gmail.com', 'tipaporn', 'nonthamat', '2024-10-11 09:22:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bid`),
  ADD UNIQUE KEY `bName` (`bName`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `bid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
