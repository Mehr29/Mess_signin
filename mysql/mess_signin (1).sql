-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2020 at 08:43 AM
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
(2, 'f20190274', 'GAURAV DASH', '2019AAPS0274H', '2020-04-16', '2020-04-06 12:04:31', 0),
(3, 'f20190705', 'PRITHVI RAJ', '2019B3PS0705', '2020-04-17', '2020-04-16 13:05:21', 0),
(4, 'f20190219', 'SARTHAK GUPTA', '2019AAPS0219H', '2020-04-21', '2020-04-21 10:49:38', 4),
(5, 'f21090463', 'NITISH AGGARWAL', '2019A3PS0463H', '2020-04-21', '2020-04-21 11:12:58', 3),
(6, 'f20190463', 'NITISH AGGARWAL', '2019A3PS0463H', '2020-05-03', '2020-05-03 07:29:57', 4),
(7, 'f20190020', 'ASHUTOSH TRIPATHY', '2019A7PS0020H', '2020-05-05', '2020-05-03 07:29:57', 4),
(8, 'f20190219', 'SARTHAK GUPTA', '2019AAPS0219H', '2020-05-03', '2020-05-03 07:42:42', 4);

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
  `time` time NOT NULL DEFAULT current_timestamp(),
  `Mess` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mess_attendance`
--

INSERT INTO `mess_attendance` (`student_id`, `student_name`, `ID`, `type`, `date`, `time`, `Mess`) VALUES
(2, 'GAURAV DASH', '2019AAPS0274H', '', '2020-04-13', '22:32:00', ''),
(3, 'NITISH AGGARWAL', '2019A3PS0463H', '', '2020-04-13', '22:33:00', ''),
(4, 'PRITHVI RAJ', '2019B3PS0705H', '', '2020-04-13', '22:36:00', 'MESS-1'),
(5, 'SARTHAK GUPTA', '2019AAPS0219H', 'Dinner', '2020-04-13', '22:38:00', 'MESS-1'),
(6, 'GAURAV DASH', '2019AAPS0274H', '', '2020-04-14', '06:26:00', 'MESS-1'),
(7, 'PRITHVI RAJ', '2019B3PS0705H', 'Breakfast', '2020-04-14', '07:09:00', 'MESS-1'),
(8, 'NITISH AGGARWAL', '2019A3PS0463H', 'Breakfast', '2020-04-14', '07:12:00', 'MESS-2'),
(9, 'NITISH AGGARWAL', '2019A3PS0463H', '', '2020-04-16', '16:02:00', 'MESS-2'),
(10, 'SARTHAK GUPTA', '2019AAPS0219H', '', '2020-04-16', '18:37:00', 'MESS-1'),
(11, 'KUSHAGRA SINGH', '2019B1PS0994H', 'Dinner', '2020-04-16', '19:43:00', 'MESS-1'),
(12, 'PRITHVI RAJ', '2019B3PS0705H', 'Dinner', '2020-04-16', '20:28:00', 'MESS-1'),
(13, 'ADITYA ARYAN', '2019B5PS0899H', 'Dinner', '2020-04-16', '20:46:00', 'MESS-1'),
(14, 'ASHUTOSH TRIPATHY', '2019A7PS0020H', 'Dinner', '2020-04-16', '21:17:00', 'MESS-1'),
(15, 'GAURAV DASH', '2019AAPS0274H', '', '2020-04-20', '18:33:00', 'MESS-1'),
(16, 'PRITHVI RAJ', '2019B3PS0705H', '', '2020-04-20', '18:34:00', 'MESS-1'),
(17, 'ADITYA ARYAN', '2019B5PS0899H', 'Dinner', '2020-04-20', '19:04:00', 'MESS-1'),
(18, 'NITISH AGGARWAL', '2019A3PS0463H', 'Dinner', '2020-04-20', '20:41:00', 'MESS-2'),
(19, 'SARTHAK GUPTA', '2019AAPS0219H', 'Dinner', '2020-04-20', '21:11:00', 'MESS-1'),
(20, 'KUSHAGRA SINGH', '2019B1PS0994H', 'Dinner', '2020-04-20', '21:11:00', 'MESS-1'),
(21, 'NITISH AGGARWAL', '2019A3PS0463H', '', '2020-04-21', '18:47:00', 'MESS-2'),
(22, 'SARTHAK GUPTA', '2019AAPS0219H', '', '2020-04-24', '05:18:00', 'MESS-1'),
(23, 'GAURAV DASH', '2019AAPS0274H', '', '2020-04-24', '05:19:00', 'MESS-1'),
(24, 'SARTHAK GUPTA', '2019AAPS0219H', '', '2020-04-28', '16:27:00', 'MESS-1'),
(25, 'PRITHVI RAJ', '2019B3PS0705H', '', '2020-05-03', '04:20:00', 'MESS-1'),
(26, 'SARTHAK GUPTA', '2019AAPS0219H', '', '2020-05-03', '04:23:00', 'MESS-1'),
(27, 'KUSHAGRA SINGH', '2019B1PS0994H', '', '2020-05-03', '04:25:00', 'MESS-1'),
(28, 'GAURAV DASH', '2019AAPS0274H', '', '2020-05-03', '04:26:00', 'MESS-1'),
(29, 'ASHUTOSH TRIPATHY', '2019A7PS0020H', '', '2020-05-03', '04:28:00', 'MESS-1'),
(30, 'ADITYA ARYAN', '2019B5PS0899H', '', '2020-05-03', '04:34:00', 'MESS-1'),
(31, 'NITISH AGGARWAL', '2019A3PS0463H', '', '2020-05-03', '04:35:00', 'MESS-2'),
(32, 'ASHUTOSH TRIPATHY', '2019A7PS0020H', '', '2020-05-03', '15:01:00', 'MESS-1'),
(33, 'GAURAV DASH', '2019AAPS0274H', '', '2020-05-03', '15:13:00', 'MESS-1'),
(34, 'PRITHVI RAJ', '2019B3PS0705H', '', '2020-05-03', '15:15:00', 'MESS-1'),
(35, 'ADITYA ARYAN', '2019B5PS0899H', '', '2020-05-03', '15:24:00', 'MESS-1'),
(36, 'KUSHAGRA SINGH', '2019B1PS0994H', '', '2020-05-03', '15:25:00', 'MESS-1'),
(37, 'SWASTIK BARPANDA', '2019A3PS0462H', 'Dinner', '2020-05-03', '20:33:00', 'MESS-1'),
(38, 'OM AGGARWAL', '2019A7PS0065H', 'Dinner', '2020-05-03', '20:36:00', 'MESS-2'),
(39, 'JAHNAVI GURDASANI', '2019A8PS0556H', 'Dinner', '2020-05-03', '20:39:00', 'MESS-1'),
(40, 'SARTHAK GUPTA', '2019AAPS0219H', 'Lunch', '2020-08-30', '13:39:00', 'MESS-1'),
(41, 'GAURAV DASH', '2019AAPS0274H', 'Lunch', '2020-08-30', '13:39:00', 'MESS-1');

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
  `ID` varchar(15) NOT NULL,
  `Name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`Total remaining Graces`, `uid`, `Mess`, `ID`, `Name`) VALUES
(5, 'f20190020', 'MESS-1', '2019A7PS0020H', 'ASHUTOSH TRIPATHY'),
(5, 'f20190065', 'MESS-2', '2019A7PS0065H', 'OM AGGARWAL'),
(5, 'f20190219', 'MESS-1', '2019AAPS0219H', 'SARTHAK GUPTA'),
(5, 'f20190274', 'MESS-1', '2019AAPS0274H', 'GAURAV DASH'),
(5, 'f20190462', 'MESS-1', '2019A3PS0462H', 'SWASTIK BARPANDA'),
(5, 'f20190463', 'MESS-2', '2019A3PS0463H', 'NITISH AGGARWAL'),
(5, 'f20190556', 'MESS-1', '2019A8PS0556H', 'JAHNAVI GURDASANI'),
(5, 'f20190705', 'MESS-1', '2019B3PS0705H', 'PRITHVI RAJ'),
(5, 'f20190899', 'MESS-1', '2019B5PS0899H', 'ADITYA ARYAN'),
(5, 'f20190994', 'MESS-1', '2019B1PS0994H', 'KUSHAGRA SINGH');

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
  MODIFY `Grace_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mess_attendance`
--
ALTER TABLE `mess_attendance`
  MODIFY `student_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `mess_info`
--
ALTER TABLE `mess_info`
  MODIFY `mess_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
