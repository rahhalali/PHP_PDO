-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 05, 2021 at 10:37 PM
-- Server version: 8.0.26-0ubuntu0.20.04.2
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `First`
--

-- --------------------------------------------------------

--
-- Table structure for table `Blogs`
--

CREATE TABLE `Blogs` (
  `Blog_id` int NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Overview` varchar(255) NOT NULL,
  `Content` longtext NOT NULL,
  `Date` date NOT NULL,
  `User_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Blogs`
--

INSERT INTO `Blogs` (`Blog_id`, `Title`, `Overview`, `Content`, `Date`, `User_id`) VALUES
(1, 'Ali 2 Jad', 'abbas ya dammeeee', '<p>hello</p>\r\n\r\n<p>&nbsp;</p>\r\n', '2021-07-31', 11),
(3, 'Sometimes you Love it', 'Yes all we can do it ', '<p>Helloz codi, specially khaldon, hasan and samar.</p>\r\n', '2021-07-31', 9),
(4, 'Second Record', 'shu ya ka2ed', '<p>ya3ne shway shway by7mshe l 7al</p>\r\n', '2021-08-01', 11),
(8, 'wefwefwfd', 'fsdfsdfs', '<p>dfsdfsdfsdf</p>\r\n', '2021-08-01', 9),
(9, 'wefwefwe', 'fwefwef', '<p>dwfwdfwdfwdfw</p>\r\n', '2021-08-01', 9),
(10, 'wefwefwefwe', 'fwdwfwdfwfwf', '<p>wdfwdfwfwd</p>\r\n', '2021-08-01', 9),
(13, 'asdasdasd', 'sadasdasd', '<p>qwdqwdqwdqwdqw</p>\r\n', '2021-08-01', 9),
(16, 'Jad ', 'Ma3louf', '<p>ya hala</p>\r\n\r\n<p>&nbsp;</p>\r\n', '2021-08-03', 9),
(17, 'Mahmoud', 'Haidar', '<p>Not Here.</p>\r\n', '2021-08-03', 9),
(18, 'Samar', 'khanafer', '<p>Emmmmm</p>\r\n', '2021-08-03', 9),
(19, 'Khaldoun', 'Noureddine', '<p>Back-end</p>\r\n', '2021-08-03', 9),
(20, 'Hassan', 'Awwad', '<p>EMMMMMM okay&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '2021-08-03', 9),
(21, 'Ali Rahhal', 'Codi', '<p>Hello World.</p>\r\n', '2021-08-03', 9);

-- --------------------------------------------------------

--
-- Table structure for table `Files`
--

CREATE TABLE `Files` (
  `Id` int NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Size` double NOT NULL,
  `Format` char(10) NOT NULL,
  `Path` varchar(255) NOT NULL,
  `User_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Files`
--

INSERT INTO `Files` (`Id`, `Name`, `Size`, `Format`, `Path`, `User_id`) VALUES
(7, 'poster.png', 378475, 'image/png', 'user_images/user_11/poster.png', 11),
(9, '3omri.jpg', 39812, 'image/jpeg', 'user_images/user_11/3omri.jpg', 11),
(13, '7assoun.png', 378475, 'image/png', 'user_images/user_9/7assoun.png', 9),
(15, 'lara.png', 378475, 'image/png', 'user_images/user_13/lara.png', 13);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `Id` int NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`Id`, `Username`, `Email`, `Password`) VALUES
(6, 'ali', 'Rahhal@hotmail.com', 'Dead'),
(7, 'mohammad', 'Ali@hotmail.com', '$2y$10$PaWagfi68Ku7z1R5tW2YuuyW3XqTdYSq5/Pa3NBa4cg24MPqNIkGG'),
(9, 'Abbas', 'Abbas@hotmail.com', '$2y$10$Q8vQJrAp.ax9Trohm4.90OFQ/sxHHMPU5Yhbqit2bMLdocc5Hp5FC'),
(11, 'Yossef', 'Yossef@hotmail.com', '$2y$10$UNRPt5kMDeqQMqPfToxTHexlVuPzxbKm/btbDglbnnW9qUJg5o9Bi'),
(13, 'lara', 'lara@hotmail.com', '$2y$10$BGIWE7RKXqlTPX4GKUG55ORIIj7m2GDSwb2651jgoX7DKmJqzm7g6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Blogs`
--
ALTER TABLE `Blogs`
  ADD PRIMARY KEY (`Blog_id`),
  ADD KEY `User_id` (`User_id`);

--
-- Indexes for table `Files`
--
ALTER TABLE `Files`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Blogs`
--
ALTER TABLE `Blogs`
  MODIFY `Blog_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `Files`
--
ALTER TABLE `Files`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Blogs`
--
ALTER TABLE `Blogs`
  ADD CONSTRAINT `test` FOREIGN KEY (`User_id`) REFERENCES `Users` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
