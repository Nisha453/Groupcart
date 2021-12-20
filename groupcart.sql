-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2021 at 07:50 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `groupcart`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(50) NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `group_name`, `description`) VALUES
(1, 'grocery', 'This is the description for grocery group'),
(2, 'fashion', 'This is the description for fashion group'),
(3, 'hardware', 'This is a group description for hardware group');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `price`, `group_id`, `date_added`) VALUES
(1, 'bread', 21, 1, '2021-12-16 14:27:50'),
(2, 'eggs', 85, 1, '2021-12-18 18:01:16'),
(3, 'jeans', 98, 2, '2021-12-20 05:04:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `date_added` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `address`, `email`, `password`, `phone_number`, `date_added`) VALUES
(1, 'nisha', '123, 1st street', 'abc@gmail.com', 'abc', 1234567891, '2021-12-16 16:45:32'),
(2, 'test', '456, 2nd street', 'xyz@gmail.com', 'xyz', 1239874560, '2021-12-16 16:48:21'),
(3, 'eqff2', 'ewgr3g', 'fwef', 'wefwg', 132577, '2021-12-20 02:22:31'),
(4, 'wqf', 'rewqrr', 'wefew', 'weer', 12435367, '2021-12-20 02:24:51'),
(5, 'qwer', 'asfweg', 'ewf3r', 'regfg', 11242356, '2021-12-20 02:27:43'),
(6, 'wdd', 'fdasf', 'fds', 'sdfa', 124566, '2021-12-20 02:31:08'),
(7, 'qer2er', 'weqrr', 'wqr', 'ewrq', 213256, '2021-12-20 02:32:11'),
(8, 'dwsaf', 'dawg', 'ffsfr', 'fsf', 123456, '2021-12-20 02:32:58'),
(9, 'qwf', 'fwef', 'wef', 'weff', 12346, '2021-12-20 02:35:02'),
(10, 'wfe', 'dafgg', 'fwea', 'weag', 12356, '2021-12-20 02:36:49'),
(11, 'asdf', 'af', 'asff', 'asff', 12356, '2021-12-20 02:38:10'),
(12, 'asdf', 'af', 'asff', 'asff', 12356, '2021-12-20 02:38:26'),
(13, 'saFD', 'wqr52', 'fqRW', 'arewr', 12256, '2021-12-20 02:39:51'),
(14, 'awF', 'wrrw', 'dfaf', 'afwr', 12335677, '2021-12-20 02:41:15'),
(15, 'admin', 'admin', 'admin', 'admin', 12113255, '2021-12-20 02:44:28'),
(16, 'saDF', 'afwe', 'adf', 'dev1999$', 124, '2021-12-20 02:45:22'),
(17, 'saDF', 'afwe', 'adf', 'dev1999$', 124, '2021-12-20 02:47:40'),
(18, 'asf', 'fwq', 'admin', 'dev1999$', 1255, '2021-12-20 02:49:10'),
(19, 'wdaF', 'AWF', 'admin', 'dev1999$', 124331, '2021-12-20 02:50:25');

-- --------------------------------------------------------

--
-- Table structure for table `user_to_group`
--

CREATE TABLE `user_to_group` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_to_group`
--

INSERT INTO `user_to_group` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 1, 2),
(4, 1, 3),
(5, 19, 1),
(6, 18, 1),
(7, 18, 2),
(8, 18, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_to_item`
--

CREATE TABLE `user_to_item` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `shopper_id` int(11) NOT NULL,
  `date_added` date NOT NULL DEFAULT current_timestamp(),
  `deadline` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_to_item`
--

INSERT INTO `user_to_item` (`id`, `user_id`, `item_id`, `quantity`, `group_id`, `shopper_id`, `date_added`, `deadline`, `status`) VALUES
(1, 1, 1, 1, 1, 18, '2021-12-16', '2021-12-16', 'processing'),
(2, 1, 2, 2, 1, 18, '2021-12-20', '0000-00-00', 'processing'),
(3, 1, 2, 2, 1, 18, '2021-12-20', '0000-00-00', 'processing'),
(4, 1, 1, 2, 1, 0, '2021-12-20', '2021-12-29', 'pending'),
(5, 1, 3, 1, 2, 0, '2021-12-20', '2021-12-30', 'pending'),
(6, 18, 3, 3, 2, 0, '2021-12-20', '2021-12-15', 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_to_group`
--
ALTER TABLE `user_to_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_to_item`
--
ALTER TABLE `user_to_item`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_to_group`
--
ALTER TABLE `user_to_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_to_item`
--
ALTER TABLE `user_to_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
