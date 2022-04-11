-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2021 at 05:51 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `z_fitness_club`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(2) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'user1@fitness.com', 'user1'),
(2, 'user2@fitness.com', 'user2'),
(3, 'user3@fitness.com', 'user3');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(5) UNSIGNED NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `doj` timestamp NOT NULL DEFAULT current_timestamp(),
  `mobileno` bigint(10) UNSIGNED NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `firstname`, `lastname`, `emailid`, `dob`, `doj`, `mobileno`, `password`) VALUES
(10002, 'Ajay', 'Akiwate', 'ajay1@mail.com', '1995-07-10', '2021-06-26 13:11:47', 9900990099, 'ajay'),
(10006, 'a', 'a', 'a1@g.c', '2021-06-01', '2021-06-28 15:31:41', 2222222222, '1'),
(10010, 'ajay', 'akiwate', 'b@g.c', '2021-06-02', '2021-06-29 16:21:43', 2222222222, 'b');

-- --------------------------------------------------------

--
-- Table structure for table `entry`
--

CREATE TABLE `entry` (
  `tr_id` int(5) NOT NULL,
  `date_ts` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `height` int(3) NOT NULL,
  `weight` int(3) NOT NULL,
  `id` int(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `entry`
--

INSERT INTO `entry` (`tr_id`, `date_ts`, `height`, `weight`, `id`) VALUES
(30000, '2021-06-28 14:32:22', 180, 90, 10002),
(30001, '2021-06-28 14:42:59', 170, 65, 10002),
(30003, '2021-06-28 14:45:00', 130, 160, 10002),
(30004, '2021-06-28 14:46:24', 120, 350, 10002),
(30005, '2021-06-28 14:51:31', 123, 123, 10002),
(30007, '2021-06-29 03:20:35', 1, 1, 10006),
(30008, '2021-06-29 13:13:17', 12, 13, 10002),
(30009, '2021-06-30 09:18:34', 170, 70, 10006);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `mobileno` bigint(10) UNSIGNED NOT NULL,
  `comments` varchar(500) NOT NULL,
  `t_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `emailid`, `mobileno`, `comments`, `t_date`) VALUES
(5, 'ajay', 'a@g.c', 9999999999, 'AjayHello', '2021-06-29 17:05:54'),
(6, 'ajay', 'a@g.c', 8888888888, 'shld      ', '2021-06-29 17:18:39'),
(7, 'ajayAkiwate', 'a@g.c', 9999999999, 'dfbkjasdf           ', '2021-06-29 17:19:20'),
(8, 'AjayAkiwate', 'a@g.c', 8888888888, 'Ajay  Akiwate', '2021-06-30 09:14:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emailid` (`emailid`);

--
-- Indexes for table `entry`
--
ALTER TABLE `entry`
  ADD PRIMARY KEY (`tr_id`),
  ADD KEY `customer_id` (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10011;

--
-- AUTO_INCREMENT for table `entry`
--
ALTER TABLE `entry`
  MODIFY `tr_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30010;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `entry`
--
ALTER TABLE `entry`
  ADD CONSTRAINT `customer_id` FOREIGN KEY (`id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
