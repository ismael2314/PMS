-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2019 at 12:21 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pm_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `pdt_usr_tbl`
--

CREATE TABLE `pdt_usr_tbl` (
  `pdt_id` varchar(100) NOT NULL,
  `usr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_tbl`
--

CREATE TABLE `product_tbl` (
  `pdt_id` varchar(100) NOT NULL,
  `pdt_name` varchar(100) NOT NULL,
  `pdt_quantity` int(11) NOT NULL,
  `pdt_price` double NOT NULL,
  `pdt_discription` text NOT NULL,
  `pdt_avalible` enum('avaliable','not-avaliable') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_regdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`user_id`, `user_name`, `user_email`, `user_password`, `user_regdate`) VALUES
(1, 'isma', 'ismael@gmail.com', '$2y$10$9LTr9JsahWJ/uQBDZexUNeh6JlHsZVWpoq/PLSTrVI9x/cX04fVdO', '2019-12-11 09:53:58'),
(2, 'werwrewer', 'ismae2l@gmail.com', '$2y$10$CdJa8cjeePHm9yr9lIqo0uMeZandInfUfsZlVdrvkzWpBWs0moiPq', '2019-12-12 09:40:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pdt_usr_tbl`
--
ALTER TABLE `pdt_usr_tbl`
  ADD KEY `usr_id` (`usr_id`),
  ADD KEY `pdt_id` (`pdt_id`);

--
-- Indexes for table `product_tbl`
--
ALTER TABLE `product_tbl`
  ADD PRIMARY KEY (`pdt_id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pdt_usr_tbl`
--
ALTER TABLE `pdt_usr_tbl`
  ADD CONSTRAINT `pdt_usr_tbl_ibfk_2` FOREIGN KEY (`usr_id`) REFERENCES `user_tbl` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `pdt_usr_tbl_ibfk_3` FOREIGN KEY (`pdt_id`) REFERENCES `product_tbl` (`pdt_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
