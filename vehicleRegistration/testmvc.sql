-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2020 at 11:06 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testmvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(6) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phoneno` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `firstname`, `lastname`, `email`, `password`, `phoneno`) VALUES
(1, 'hjh', 'jhj', 'hh', 'jhj', 0),
(2, 'jj', 'jj', 'jj', 'jj', 23541),
(9, 'jkjk', 'jkj', 'kjk', 'jkj', 362),
(10, 'jkjk', 'jkj', 'kjk', 'jkj', 362),
(11, 'jkjk', 'jkj', 'kjk', 'jkj', 362),
(12, 'hjj', 'jhjh', 'hjhj', 'hjhj', 362514),
(13, 'uu', 'uu', 'uu', 'uu', 362511),
(14, 'hh', 'hh', 'hh', 'hh', 632541),
(15, 'hh', 'hh', 'hh', 'hh', 632541);

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `address_id` int(11) NOT NULL,
  `user_id` int(6) NOT NULL,
  `street` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip_code` int(6) NOT NULL,
  `country` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`address_id`, `user_id`, `street`, `city`, `state`, `zip_code`, `country`) VALUES
(1, 14, 'hhg', 'hh', 'h', 0, 'dsfsdf'),
(2, 15, 'hhg', 'hh', 'h', 0, 'dsfsdf');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_service`
--

CREATE TABLE `vehicle_service` (
  `service_id` int(6) NOT NULL,
  `user_id` int(6) NOT NULL,
  `title` varchar(50) NOT NULL,
  `vehicle_no` varchar(20) NOT NULL,
  `user_licence_no` int(6) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_slot` varchar(20) NOT NULL,
  `vehicle_issue` varchar(20) NOT NULL,
  `service_center` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle_service`
--

INSERT INTO `vehicle_service` (`service_id`, `user_id`, `title`, `vehicle_no`, `user_licence_no`, `date`, `time_slot`, `vehicle_issue`, `service_center`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'kk', '52', 521463, '2020-02-11 18:30:00', '11-12', 'efasefasdgfdfg', 'adodara', '', '2020-02-21 11:01:16', ''),
(2, 2, 'tt', '201536', 123654, '2020-02-05 18:30:00', '11-12', 'sfsudjfhdj', 'adodara', '', '2020-02-21 11:11:22', ''),
(4, 2, 'll', '251463', 415236, '2020-02-19 18:30:00', '11-12', 'adskjfadksj', 'adodara', '', '2020-02-21 11:14:24', ''),
(6, 2, 'gg', '63145', 216325, '2020-02-18 18:30:00', '11-12', 'sdfsdf', 'surat', '', '2020-02-21 11:40:26', ''),
(7, 2, 'dd', '3232', 44515, '2020-02-26 18:30:00', '1-2', 'zxczxczxczx', 'vadodara', '', '2020-02-21 11:45:28', ''),
(10, 2, 'dd', '32322', 12, '2020-02-22 17:32:05', '9-10', 'zxczxczxczx', 'vadodara', 'Pending', '2020-02-21 11:46:48', ''),
(12, 2, 'dd', '323212', 2121, '2020-02-26 18:30:00', '9-10', 'zxczxczxczx', 'vadodara', '', '2020-02-21 11:48:01', ''),
(13, 2, 'dd', '32341', 23, '2020-02-26 18:30:00', '10-11', 'zxczxczxczx', 'vadodara', '', '2020-02-21 11:48:40', ''),
(15, 13, 'ff', '12365', 41265, '2020-02-11 18:30:00', '2-3', 'Sdsdcsdc', 'surat', '', '2020-02-21 11:54:15', ''),
(17, 2, 'ss', '52163', 123652, '2020-02-11 18:30:00', '1-2', 'sijhdfjhsdjf', 'vadodara', '', '2020-02-21 12:12:56', ''),
(19, 13, 'kl', '12', 122355, '2019-11-29 18:30:00', '12-01', 'zxczxczxczx', 'surat', '', '2020-02-22 16:01:19', ''),
(21, 13, 'uu', '56563', 232265, '2019-10-29 18:30:00', '9-10', 'efasefasdgfdfg', 'vadodara', 'Pending', '2020-02-22 16:19:33', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `vehicle_service`
--
ALTER TABLE `vehicle_service`
  ADD PRIMARY KEY (`service_id`),
  ADD UNIQUE KEY `vehicle_no` (`vehicle_no`,`user_licence_no`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vehicle_service`
--
ALTER TABLE `vehicle_service`
  MODIFY `service_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_address`
--
ALTER TABLE `user_address`
  ADD CONSTRAINT `user_address_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vehicle_service`
--
ALTER TABLE `vehicle_service`
  ADD CONSTRAINT `vehicle_service_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
