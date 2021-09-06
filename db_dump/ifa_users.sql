-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2021 at 08:57 AM
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
(5, 1, 'IFA user2', 'IFA user2', 'admin@admin.com2', 'c775e7b757ede630cd0aa1113bd102661ab38829ca52a6422ab782862f268646', '2021-09-06 05:11:22', NULL, 1, 'Designation2', 'Hyderabad'),
(7, 1, 'IFA user3', 'IFA user3', 'admin@admin.com3', 'c775e7b757ede630cd0aa1113bd102661ab38829ca52a6422ab782862f268646', '2021-09-06 05:26:45', NULL, 1, 'Designation3', 'Hyderabad');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
