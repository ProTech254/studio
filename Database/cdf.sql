-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2021 at 05:17 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cdf`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE `advertisement` (
  `Id` int(100) NOT NULL,
  `title` varchar(200) NOT NULL,
  `img` varchar(200) NOT NULL,
  `details` varchar(210) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `advertisement`
--

INSERT INTO `advertisement` (`Id`, `title`, `img`, `details`) VALUES
(1, 'Outdoor Advertising', 'img/CK_rest1.jpg', 'For outdoor Advertising services contact us'),
(2, 'Print Advertising', 'img/print.jpg', 'We print'),
(3, 'Souvenirs', 'img/sov.jpg', 'Visit us for more');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `app_date` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `first_name`, `last_name`, `app_date`, `status`) VALUES
(1, 'Erick', 'Omundi', '', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_list`
--

CREATE TABLE `appointment_list` (
  `id` int(30) NOT NULL,
  `designer_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `schedule` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0= for verification, 1=confirmed,2= reschedule,3=done',
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment_list`
--

INSERT INTO `appointment_list` (`id`, `designer_id`, `user_id`, `schedule`, `status`, `date_created`) VALUES
(5, 2, 7, '2020-09-30 11:00:00', 2, '2020-09-24 15:20:52');

-- --------------------------------------------------------

--
-- Table structure for table `designers_list`
--

CREATE TABLE `designers_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `name_pref` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `contact` text NOT NULL,
  `email` text NOT NULL,
  `specialty_ids` text NOT NULL,
  `img_path` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `designers_list`
--

INSERT INTO `designers_list` (`id`, `name`, `name_pref`, `address`, `contact`, `email`, `specialty_ids`, `img_path`, `date_created`) VALUES
(2, 'Stoyan Moskofyan', 'D.s.', '416, Nairobi', '+1456 554 55623', 'jsmith@sample.com', '[6,1]', 'img/team1.png', '2020-09-24 09:52:00'),
(3, 'Sonya Kuchukova', 'D.s.', '679,Bungoma', '+5465 555 623', 'cblake@sample.com', '[4,1]', 'img/team2.png', '2020-09-24 13:07:21'),
(4, 'Garbis Moskofyan', 'D.s.', '590,Nyakach', '+5465 555 623', 'cblake@sample.com', '[4,1]', 'img/team3.png', '2020-09-24 13:07:21');

-- --------------------------------------------------------

--
-- Table structure for table `designers_schedule`
--

CREATE TABLE `designers_schedule` (
  `id` int(30) NOT NULL,
  `designer_id` int(30) NOT NULL,
  `day` varchar(20) NOT NULL,
  `time_from` time NOT NULL,
  `time_to` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `designers_schedule`
--

INSERT INTO `designers_schedule` (`id`, `designer_id`, `day`, `time_from`, `time_to`) VALUES
(3, 2, 'Monday', '10:00:00', '17:00:00'),
(4, 2, 'Wednesday', '10:00:00', '17:00:00'),
(5, 3, 'Monday', '10:00:00', '15:00:00'),
(6, 3, 'Tuesday', '10:00:00', '15:00:00'),
(7, 3, 'Wednesday', '10:00:00', '15:00:00'),
(8, 3, 'Thursday', '10:00:00', '15:00:00'),
(9, 3, 'Friday', '10:00:00', '15:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `designs`
--

CREATE TABLE `designs` (
  `id` int(100) NOT NULL,
  `title` varchar(150) NOT NULL,
  `img` varchar(150) NOT NULL,
  `details` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `designs`
--

INSERT INTO `designs` (`id`, `title`, `img`, `details`) VALUES
(1, '3D Exterior Visualizations', 'img/PchelinaSgrada0002.jpg', 'We are good in 3D Exterior Visualizations'),
(2, 'Interior Design', 'img/008.jpg', 'We do Interior design'),
(3, 'Exterior Design', 'img/exterior.jpg', 'We do Exterior design');

-- --------------------------------------------------------

--
-- Table structure for table `design_specialty`
--

CREATE TABLE `design_specialty` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `img_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `design_specialty`
--

INSERT INTO `design_specialty` (`id`, `name`, `img_path`) VALUES
(1, 'Interior Designer', '1600909800_estetoscópio-dos-instrumentos-médicos-à-disposição-do-bebê-recém-nascido-57898568.jpg'),
(4, '3D Exterior Designer', '1600910640_human-anatomy-orthopedic-vector-16867686.jpg'),
(6, 'External Designer', '1600910100_human-heart-illustration-png-clip-art.png'),
(7, 'Photography', '1637934240_Screenshot from 2021-11-19 07-20-29.png');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `designer_id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `contact` text NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1=admin , 2 = doctor,3=patient'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `designer_id`, `name`, `address`, `contact`, `username`, `password`, `type`) VALUES
(1, 0, 'Administrator', '', '', 'admin', 'admin123', 1),
(7, 0, 'DR.James Smith, M.D.', 'Sample Clinic Address', '+1456 554 55623', 'user', '$2y$10$umVxCY1JIAguKDaaoxNQkOll74jqu4LIu4DG12PyP0qHSx1JySrH6', 3),
(10, 3, 'DR.Claire Blake, M.D.', 'Sample Only', '+5465 555 623', 'cblake@sample.com', 'blake123', 2),
(12, 0, 'ygfffgf', '', '', 'adminqww', '123456', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment_list`
--
ALTER TABLE `appointment_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designers_list`
--
ALTER TABLE `designers_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designers_schedule`
--
ALTER TABLE `designers_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designs`
--
ALTER TABLE `designs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `design_specialty`
--
ALTER TABLE `design_specialty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertisement`
--
ALTER TABLE `advertisement`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment_list`
--
ALTER TABLE `appointment_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `designers_list`
--
ALTER TABLE `designers_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `designers_schedule`
--
ALTER TABLE `designers_schedule`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `designs`
--
ALTER TABLE `designs`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `design_specialty`
--
ALTER TABLE `design_specialty`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
