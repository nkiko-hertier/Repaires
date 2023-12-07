-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2023 at 10:28 PM
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
-- Database: `progress`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `uid` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `tech_id` varchar(200) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `c_date` date NOT NULL DEFAULT current_timestamp(),
  `e_date` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0=pending,1=complete'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `uid`, `name`, `type`, `tech_id`, `customer_id`, `c_date`, `e_date`, `status`) VALUES
(1, '34334', 'Iphone 250', 'Phone', '6556683621ca9', 1, '2023-11-23', '2023-11-23', 48),
(2, '5411221111', 'Galaxy Fontom 2', 'Phone', '6563af00dc8cf', 1, '2023-11-01', NULL, 63),
(3, '456897567', 'Mac Book pro', 'PC', '6556683621ca9', 1, '2023-11-27', NULL, 0),
(4, '456897567', 'Mac Book pro', 'PC', '6556683621ca9', 1, '2023-11-27', '2023-11-27', 0),
(6, '', 'Mac Book Pro 6', 'PC', '12233\'', 98765, '2023-12-02', NULL, 50),
(7, '', 'Iphone Glaxy X10', 'Minds', '12233', 98765, '2023-12-02', NULL, 50),
(8, '', 'Iphone Glaxy X10\'', 'Minds\'', '12233\'', 98765, '2023-12-02', NULL, 50),
(9, '656b8f119ac6a', 'Iphone Glaxy X10\'', 'Minds\'', '655869a8c2e84', 98765, '2023-12-02', NULL, 50),
(10, '656f5770a44ae', 'Mac Elite Book', 'PC', '655869a8c2e84', 2, '2023-12-05', NULL, 89);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `username` varchar(200) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `Contact` varchar(200) NOT NULL DEFAULT 'unknown'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`username`, `customer_id`, `Contact`) VALUES
('Meta bit', 1, '0791386099');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `uname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `number` int(11) NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0 COMMENT '0=a,1=u',
  `uid` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `uname`, `email`, `number`, `password`, `type`, `uid`) VALUES
(1, 'kabanda', 'Gossias', 'Nkiko', 'kabandajosias@gamil.com', 792458566, '202cb962ac59075b964b07152d234b70', 0, '6556683621ca9'),
(2, 'Nkiko', 'Van Vivien', 'Snoaw', 'kabandajosias@gamil.com', 792458566, '202cb962ac59075b964b07152d234b70', 1, '655869a8c2e84'),
(7, 'Nkiko', 'Hertier Van Viviven', 'nkiko.snoaw', 'afrigames123@gmail.com', 784480456, '202cb962ac59075b964b07152d234b70', 0, '6563af00dc8cf'),
(8, 'John', 'Doe', 'JoDoe', 'johndoe@gmail.com', 784480456, '202cb962ac59075b964b07152d234b70', 1, '6563af00dc8c6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `tech_id` (`tech_id`),
  ADD KEY `user_id` (`customer_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`uname`),
  ADD UNIQUE KEY `uid_2` (`uid`),
  ADD KEY `uid` (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
