-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2021 at 02:19 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gem_ifa`
--

-- --------------------------------------------------------

--
-- Table structure for table `ifa_users`
--

CREATE TABLE `ifa_users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=Deleted,1=Active,2=Inactive',
  `designation` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ifa_users`
--

INSERT INTO `ifa_users` (`id`, `role_id`, `first_name`, `last_name`, `username`, `password`, `created_at`, `modified_at`, `status`, `designation`, `location`) VALUES
(1, 1, 'IFA user 1', '', 'admin@admin.com', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', '2021-09-02 06:19:49', NULL, 1, '', ''),
(2, 0, 'wwwwwww', 'www', 'admin@admin.com22', '', '2021-09-03 11:38:00', NULL, 1, 'ddddd', 'ssssww'),
(3, 1, 'narayana', 'reddy', 'admin@admin.com33', '', '2021-09-03 11:52:37', NULL, 1, 'ddddd', 'ssssww'),
(4, 1, 'narayana', 'www', 'admin@admin.comss', '123123wwwwwwww', '2021-09-03 12:15:03', NULL, 1, 'ddddd', 'ssssww');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ifa_users`
--
ALTER TABLE `ifa_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ifa_users`
--
ALTER TABLE `ifa_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
