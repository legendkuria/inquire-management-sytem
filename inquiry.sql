-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2021 at 12:20 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inquiry`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `username`, `password`) VALUES
(1, 'ngongucynthia@gmail.com', 'cynthiangongu', '3a9357ba0b1007ca3bf5f354dd737d78');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryname` varchar(50) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryname`, `creationDate`, `updationDate`) VALUES
(5, 'other general issue', '2021-05-22 08:42:38', '2021-05-22 08:42:38'),
(8, 'Exam', '2021-05-25 13:38:03', '2021-05-25 13:38:03'),
(9, 'Timetable', '2021-05-26 11:37:01', '2021-05-26 11:37:01'),
(10, 'units', '2021-05-26 11:43:31', '2021-05-26 11:43:31'),
(11, 'Transcript', '2021-07-07 11:42:11', '2021-07-07 11:42:11');

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `inquirynumber` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `categoryname` varchar(50) NOT NULL,
  `inquirydetails` varchar(255) NOT NULL,
  `inquiryfile` varchar(255) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(50) DEFAULT NULL,
  `lastupdationdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`inquirynumber`, `userid`, `email`, `category`, `categoryname`, `inquirydetails`, `inquiryfile`, `regDate`, `status`, `lastupdationdate`) VALUES
(33, 1, 'ivy@gmail.com', '7', 'Transcript', 'no marks ...', '', '2021-05-26 08:23:44', 'in process', '2021-05-26 08:23:44'),
(34, 1, 'ivy@gmail.com', '7', 'Transcript', 'no marks ...', '', '2021-05-26 07:45:13', 'in process', '2021-05-26 07:45:13'),
(35, 4, 'cynthia734wangari@gmail.com', '8', 'Exam', 'nnnnnnnnn', '', '2021-05-26 07:28:36', 'in process', '2021-05-26 07:28:36'),
(36, 4, 'cynthia734wangari@gmail.com', '5', 'other general issue', 'units not taught', '', '2021-05-26 08:21:02', NULL, '2021-05-26 08:21:02'),
(37, 4, 'cynthia734wangari@gmail.com', '9', 'Timetable', 'timetableconflict', '', '2021-05-26 11:37:34', NULL, '2021-05-26 11:37:34'),
(38, 1, 'ivy@gmail.com', '7', 'Transcript', 'missing unit', '', '2021-06-08 12:47:10', NULL, '2021-06-08 12:47:10'),
(39, 5, 'ke734cynthiawangari@gmail.com', '9', 'Timetable', 'missing unit on timetable', '', '2021-06-10 09:57:04', NULL, '2021-06-10 09:57:04'),
(40, 5, 'ke734cynthiawangari@gmail.com', '8', 'Exam', 'Not allowed to sit for the Database exam', '', '2021-06-10 10:06:43', NULL, '2021-06-10 10:06:43'),
(41, 4, 'cynthia734wangari@gmail.com', '5', 'other general issue', 'Not capable of sitting for the exam', '', '2021-06-10 10:18:04', 'in process', '2021-06-10 10:18:04'),
(42, 5, 'ke734cynthiawangari@gmail.com', '7', 'Transcript', 'Name not indicated correctly', '', '2021-06-10 14:24:36', 'in process', '2021-06-10 14:24:36'),
(43, 4, 'cynthia734wangari@gmail.com', '8', 'Exam', 'jjjjjjjjjjjjjjj', '', '2021-06-10 12:26:59', 'closed', '2021-06-10 12:26:59'),
(44, 1, 'ivy@gmail.com', '10', 'units', 'Database system not taught', '', '2021-06-10 14:00:41', NULL, '2021-06-10 14:00:41'),
(45, 6, 'judy@gmail.com', '7', 'Transcript', 'nnnnnnnnnnnnnnn', '', '2021-06-16 12:27:05', 'closed', '2021-06-16 12:27:05'),
(46, 4, 'cynthia734wangari@gmail.com', '7', 'Transcript', 'Two units have not being included on my transcript second year academic year', 'Untitled Diagram.png', '2021-06-15 09:50:23', NULL, '2021-06-15 09:50:23'),
(47, 4, 'cynthia734wangari@gmail.com', '9', 'Timetable', 'wwwwwwwwwwrrr', 'printstatement.pdf', '2021-06-15 10:31:02', NULL, '2021-06-15 10:31:02'),
(48, 4, 'cynthia734wangari@gmail.com', '10', 'units', 'yyyyyyyyyg', 'Array', '2021-06-15 10:44:16', NULL, '2021-06-15 10:44:16'),
(49, 1, 'ivy@gmail.com', '9', 'Timetable', 'conflict 0n timetable', '', '2021-06-24 11:23:23', NULL, '2021-06-24 11:23:23'),
(50, 7, 'judy1@gmail.com', '8', 'Exam', 'special exam', '', '2021-06-24 11:50:20', NULL, '2021-06-24 11:50:20');

-- --------------------------------------------------------

--
-- Table structure for table `inquiryremark`
--

CREATE TABLE `inquiryremark` (
  `id` int(11) NOT NULL,
  `inquirynumber` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `remarkdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inquiryremark`
--

INSERT INTO `inquiryremark` (`id`, `inquirynumber`, `status`, `remark`, `remarkdate`) VALUES
(1, 5, 'in process', 'inquiry being acted upon ', '2021-05-23 10:29:17'),
(2, 5, 'closed', 'granted check email', '2021-05-23 11:47:20'),
(3, 6, 'in process', 'received', '2021-05-23 17:17:08'),
(4, 8, 'in process', 'it being acted upon', '2021-05-23 18:12:55'),
(5, 23, 'in process', 'inquiry received ', '2021-05-25 12:47:04'),
(6, 25, 'in process', 'mmmm', '2021-05-25 12:59:19'),
(7, 25, 'in process', 'nnnnn', '2021-05-25 13:07:23'),
(8, 25, 'in process', 'eeee', '2021-05-25 13:23:28'),
(9, 25, 'in process', 'ttt', '2021-05-25 13:26:10'),
(10, 24, 'in process', 'received', '2021-05-25 15:14:29'),
(11, 30, 'in process', 'received', '2021-05-25 19:49:24'),
(12, 35, 'in process', 'received in process', '2021-05-26 07:28:36'),
(13, 35, 'in process', 'received being checked', '2021-05-26 07:31:51'),
(14, 35, 'in process', 'received being checked', '2021-05-26 07:31:55'),
(15, 34, 'in process', 'qwwwee', '2021-05-26 07:45:13'),
(16, 33, 'in process', 'received', '2021-05-26 08:23:44'),
(17, 41, 'in process', 'inquiry received come to my office on monday', '2021-06-10 10:18:04'),
(18, 43, 'closed', 'completed check details', '2021-06-10 12:26:59'),
(19, 42, 'in process', 'received', '2021-06-10 14:24:36'),
(20, 45, 'closed', 'feedback sent check your email', '2021-06-16 12:27:05');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `regno` varchar(100) NOT NULL,
  `mobileno` int(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `fullname`, `email`, `regno`, `mobileno`, `password`, `regDate`, `updationDate`, `status`) VALUES
(2, 'Cynthia wangari', 'cynthiangongu7@gmail.com', 'C025-01-1038/2018', 702552392, '3a9357ba0b1007ca3bf5f354dd737d78', '2021-05-23 11:46:02', '2021-05-23 11:30:02', 1),
(4, 'cynthia', 'cynthia734wangari@gmail.com', 'C025-01-1049/2018', 702552392, '3a9357ba0b1007ca3bf5f354dd737d78', '2021-05-25 12:56:22', '2021-05-25 12:56:22', 1),
(5, 'Cindy wangari', 'ke734cynthiawangari@gmail.com', 'C025-01-1040/2018', 70598765, '3a9357ba0b1007ca3bf5f354dd737d78', '2021-05-26 07:13:20', '2021-05-26 07:13:20', 1),
(6, 'Judy Gathoni', 'judy@gmail.com', 'C025-01-1192/2019', 734567892, 'c6a1ca47b645f4c4b786ce951f8d26a7', '2021-06-10 14:08:53', '2021-06-10 14:08:53', 1),
(7, 'Judy Gathoni', 'judy1@gmail.com', 'C025-01-1023/2019', 734567892, '9e31b9bbd9e25d5969c911a9a301eae3', '2021-06-24 11:47:46', '2021-06-24 11:47:46', 1);

-- --------------------------------------------------------

--
-- Table structure for table `studentlog`
--

CREATE TABLE `studentlog` (
  `id` int(50) NOT NULL,
  `uid` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `userip` varchar(50) NOT NULL,
  `logintime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `logout` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentlog`
--

INSERT INTO `studentlog` (`id`, `uid`, `username`, `userip`, `logintime`, `logout`, `status`) VALUES
(0, 1, 'ivy@gmail.com', '::1', '2021-05-22 11:18:37', '2021-05-22 14:18:37', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`inquirynumber`);

--
-- Indexes for table `inquiryremark`
--
ALTER TABLE `inquiryremark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentlog`
--
ALTER TABLE `studentlog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `inquirynumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `inquiryremark`
--
ALTER TABLE `inquiryremark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
