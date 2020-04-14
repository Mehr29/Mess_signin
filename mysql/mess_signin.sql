-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2020 at 02:34 AM
-- Server version: 10.4.11-MariaDB
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
-- Database: `mess_signin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `admin_id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', 'password'),
(2, 'Gaurav', '21051971');

-- --------------------------------------------------------

--
-- Table structure for table `grace_info`
--

CREATE TABLE `grace_info` (
  `Grace_id` int(15) NOT NULL,
  `uid` varchar(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  `id` varchar(15) NOT NULL,
  `Date` date NOT NULL,
  `Requested_On` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Total_graces` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grace_info`
--

INSERT INTO `grace_info` (`Grace_id`, `uid`, `name`, `id`, `Date`, `Requested_On`, `Total_graces`) VALUES
(1, 'f20190705', 'PRITHVI RAJ', '2019B3PS0705H', '2020-04-16', '2020-04-06 12:03:05', 5),
(2, 'f20190274', 'GAURAV DASH', '2019AAPS0274H', '2020-04-16', '2020-04-06 12:04:31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mess_attendance`
--

CREATE TABLE `mess_attendance` (
  `student_id` int(15) NOT NULL,
  `student_name` varchar(25) NOT NULL,
  `ID` varchar(25) NOT NULL,
  `type` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mess_attendance`
--

INSERT INTO `mess_attendance` (`student_id`, `student_name`, `ID`, `type`, `date`, `time`) VALUES
(2, 'GAURAV DASH', '2019AAPS0274', '', '2020-04-13', '22:32:00'),
(3, 'NITISH AGGARWAL', '2019A3PS0463', '', '2020-04-13', '22:33:00'),
(4, 'PRITHVI RAJ', '2019B3PS0274', '', '2020-04-13', '22:36:00'),
(5, 'SARTHAK GUPTA', '2019AAPS0219', 'Dinner', '2020-04-13', '22:38:00'),
(6, 'GAURAV DASH', '2019AAPS0274', '', '2020-04-14', '06:26:00'),
(7, 'PRITHVI RAJ', '2019B3PS0274', 'Breakfast', '2020-04-14', '07:09:00'),
(8, 'NITISH AGGARWAL', '2019A3PS0463', 'Breakfast', '2020-04-14', '07:12:00');

-- --------------------------------------------------------

--
-- Table structure for table `mess_info`
--

CREATE TABLE `mess_info` (
  `mess_id` int(15) NOT NULL,
  `mess_username` varchar(25) NOT NULL,
  `mess_password` varchar(25) NOT NULL,
  `mess_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mess_info`
--

INSERT INTO `mess_info` (`mess_id`, `mess_username`, `mess_password`, `mess_name`) VALUES
(1, 'mess1', 'mess1', 'MESS-1'),
(2, 'mess2', 'mess2', 'MESS-2');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `Total remaining Graces` int(15) NOT NULL DEFAULT 5,
  `uid` varchar(10) NOT NULL,
  `Mess` text NOT NULL,
  `ID` varchar(12) NOT NULL,
  `Name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`Total remaining Graces`, `uid`, `Mess`, `ID`, `Name`) VALUES
(5, 'f20190219', 'MESS-1', '2019AAPS0219', 'SARTHAK GUPTA'),
(5, 'f20190274', 'MESS-1', '2019AAPS0274', 'GAURAV DASH'),
(5, 'f20190463', 'MESS-2', '2019A3PS0463', 'NITISH AGGARWAL'),
(5, 'f20190705', 'MESS-1', '2019B3PS0274', 'PRITHVI RAJ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `grace_info`
--
ALTER TABLE `grace_info`
  ADD PRIMARY KEY (`Grace_id`),
  ADD KEY `Grace_id` (`Grace_id`);

--
-- Indexes for table `mess_attendance`
--
ALTER TABLE `mess_attendance`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `mess_info`
--
ALTER TABLE `mess_info`
  ADD PRIMARY KEY (`mess_id`),
  ADD KEY `mess_id` (`mess_id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grace_info`
--
ALTER TABLE `grace_info`
  MODIFY `Grace_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mess_attendance`
--
ALTER TABLE `mess_attendance`
  MODIFY `student_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mess_info`
--
ALTER TABLE `mess_info`
  MODIFY `mess_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
