-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2021 at 08:30 PM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `student-management-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `breaks`
--

CREATE TABLE IF NOT EXISTS `breaks` (
`no` int(11) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `workdate` date NOT NULL,
  `reason` varchar(300) NOT NULL,
  `timetext` time NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `breaks`
--

INSERT INTO `breaks` (`no`, `userid`, `workdate`, `reason`, `timetext`, `status`) VALUES
(9, '1591966086', '2021-08-06', 'I have to go the vet', '12:21:00', 'accept'),
(10, '1591966086', '2021-08-13', 'I have to go the contest', '12:21:00', 'pending'),
(11, '1591966086', '2021-08-18', 'I will be at the book fair', '12:21:00', 'reject');

-- --------------------------------------------------------

--
-- Table structure for table `checks`
--

CREATE TABLE IF NOT EXISTS `checks` (
`no` int(8) NOT NULL,
  `userid` varchar(55) NOT NULL,
  `workdate` date NOT NULL,
  `checkin` time NOT NULL,
  `checkout` time NOT NULL DEFAULT '00:00:00',
  `presenttype` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `checks`
--

INSERT INTO `checks` (`no`, `userid`, `workdate`, `checkin`, `checkout`, `presenttype`) VALUES
(9, '1591966086', '2021-07-28', '10:30:00', '18:12:00', 'PR'),
(10, '1753441896', '2021-07-28', '10:22:00', '00:23:00', 'PR'),
(11, '281222411', '2021-07-28', '10:30:00', '18:12:00', 'AB'),
(12, '183345382', '2021-07-28', '10:30:00', '18:12:00', 'PR');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
`no` int(11) NOT NULL,
  `userid` varchar(55) NOT NULL,
  `username` varchar(100) NOT NULL,
  `class` varchar(10) NOT NULL,
  `section` varchar(10) NOT NULL,
  `roll` int(10) NOT NULL,
  `contactno` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`no`, `userid`, `username`, `class`, `section`, `roll`, `contactno`) VALUES
(5, '1753441896', 'Student 01', '1', 'A', 2, '+8801710762741'),
(6, '281222411', 'Student 02', '1', 'A', 3, '+8801710762742'),
(7, '183345382', 'Student 03', '1', 'A', 4, '+8801710762743'),
(8, '1591966086', 'Student 00', '1', 'A', 1, '+8801710762740');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE IF NOT EXISTS `teachers` (
`no` int(11) NOT NULL,
  `userid` varchar(55) NOT NULL,
  `username` varchar(100) NOT NULL,
  `class` int(10) NOT NULL,
  `section` varchar(10) NOT NULL,
  `contactno` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`no`, `userid`, `username`, `class`, `section`, `contactno`) VALUES
(48, '995960612', 'Teacher 00', 1, 'A', '+8801710762740'),
(49, '2102903393', 'Teacher 01', 1, 'B', '+8801710762741'),
(50, '958724738', 'Teacher 02', 2, 'A', '+8801710762742'),
(51, '253217592', 'Teacher 03', 2, 'B', '+8801710762743'),
(52, '971451051', 'Teacher 04', 3, 'A', '+8801710762744');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`no` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(20) NOT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `token` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`no`, `userid`, `usertype`, `password`, `email`, `createdate`, `token`) VALUES
(1, 657634785, 'admin', '4e27bd6246632b9722653a909ae93798243b5cc93c223dfd6264b24f16cee712', 'admin@gmail.com', '2021-05-12 16:38:06', '74f5bdd6fa138b472125192fbc03fc3643afeaf9a0396c3f11e9912fd72f531a'),
(63, 995960612, 'teacher', '4e27bd6246632b9722653a909ae93798243b5cc93c223dfd6264b24f16cee712', 'teacher0@gmail.com', '2021-07-28 17:10:02', '5ee5ebb06e9b6dc8eea32e53b9c02f0856194d663019c5cdd4d92ad10927bab3'),
(64, 2102903393, 'teacher', '4e27bd6246632b9722653a909ae93798243b5cc93c223dfd6264b24f16cee712', 'teacher1@gmail.com', '2021-07-28 17:10:53', '6533b7ca15f05fdfb9245b6ecb37713c75cd9b150e4b8ab1522831fa35c97beb'),
(65, 958724738, 'teacher', '4e27bd6246632b9722653a909ae93798243b5cc93c223dfd6264b24f16cee712', 'teacher2@gmail.com', '2021-07-28 17:11:31', 'e2dd94cd165ea80cbd5792e5e775c242cb640dfb5c074cad26c1884ad4d0e91c'),
(66, 253217592, 'teacher', '4e27bd6246632b9722653a909ae93798243b5cc93c223dfd6264b24f16cee712', 'teacher3@gmail.com', '2021-07-28 17:12:14', '48affed762ac37ae966b597f7e8ce286c33b07501113963e8cf5dcc7e75c835a'),
(67, 971451051, 'teacher', '4e27bd6246632b9722653a909ae93798243b5cc93c223dfd6264b24f16cee712', 'teacher4@gmail.com', '2021-07-28 17:15:09', '697820895b23dde72c8a01aca0c07aacfe16614d397489411043f27b68d29abe'),
(68, 1753441896, 'student', '4e27bd6246632b9722653a909ae93798243b5cc93c223dfd6264b24f16cee712', 'student1@gmail.com', '2021-07-28 17:21:10', '340f8b8d9e10ea86496882eb153457ccf4f32efa59fdb333104fdd10e9f90748'),
(69, 281222411, 'student', '4e27bd6246632b9722653a909ae93798243b5cc93c223dfd6264b24f16cee712', 'student2@gmail.com', '2021-07-28 17:21:48', 'e907b614f32d66450782b065996930b339da2d8d038438b39a7a3526464dc135'),
(70, 183345382, 'student', '4e27bd6246632b9722653a909ae93798243b5cc93c223dfd6264b24f16cee712', 'student3@gmail.com', '2021-07-28 17:22:21', 'a96f03b6e641057c0a674c56f9b64c5b38e5b30af34fc03c2d23f952bc9c9910'),
(71, 1591966086, 'student', '4e27bd6246632b9722653a909ae93798243b5cc93c223dfd6264b24f16cee712', 'student0@gmail.com', '2021-07-28 17:26:05', 'f67ebc83e69a26bda3a960bb090a691168e9af738ad5e0769bef5afb302387ee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `breaks`
--
ALTER TABLE `breaks`
 ADD PRIMARY KEY (`no`);

--
-- Indexes for table `checks`
--
ALTER TABLE `checks`
 ADD PRIMARY KEY (`no`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
 ADD PRIMARY KEY (`no`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
 ADD PRIMARY KEY (`no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `breaks`
--
ALTER TABLE `breaks`
MODIFY `no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `checks`
--
ALTER TABLE `checks`
MODIFY `no` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
MODIFY `no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
MODIFY `no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=72;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
