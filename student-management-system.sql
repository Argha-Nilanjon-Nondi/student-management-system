-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2021 at 03:57 PM
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
  `timetext` time NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `breaks`
--

INSERT INTO `breaks` (`no`, `userid`, `workdate`, `reason`, `timetext`) VALUES
(2, '2010287043', '2021-05-10', 'I am ill', '09:53:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `checks`
--

INSERT INTO `checks` (`no`, `userid`, `workdate`, `checkin`, `checkout`, `presenttype`) VALUES
(1, '2010287043', '2021-05-01', '09:10:00', '00:00:00', 'AB'),
(2, '2010287043', '2021-05-02', '09:10:00', '00:00:00', 'PR'),
(3, '2010287043', '2021-05-03', '09:10:00', '00:00:00', 'PR'),
(4, '901825436', '2021-05-03', '09:10:00', '00:00:00', 'PR');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`no`, `userid`, `username`, `class`, `section`, `roll`, `contactno`) VALUES
(1, '901825436', 'Mita Ghosh', '9', 'A', 1, '+880171574359'),
(2, '2010287043', 'Mita Ghosh', '9', 'A', 2, '+880171574359');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`no`, `userid`, `username`, `class`, `section`, `contactno`) VALUES
(2, '1222738298', 'Rahul', 10, 'A', '+8801710962748'),
(3, '6675646', 'Nilanjon Nondi', 7, 'B', '+8801715743000'),
(4, '1521188876', 'Rahul Hossion', 2, 'A', '+8801710962748'),
(5, '1170173354', 'Rahul', 9, 'A', '+8801710962748');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`no`, `userid`, `usertype`, `password`, `email`, `createdate`, `token`) VALUES
(1, 657634785, 'admin', '4e27bd6246632b9722653a909ae93798243b5cc93c223dfd6264b24f16cee712', 'admin@gmail.com', '2021-05-12 16:38:06', '62e1b52a996e8f98abb67b80e80b4e7533e20a076be91159b122930226d6005b'),
(3, 1160872454, '', 'c797b0dbdaa4fee9c4f5c1e4d83c8634b0dcff3790b4bced7a3e0ea12a0c3508', 'user@gmail.com', '2021-05-15 03:06:44', '94ad6bb68fc3c374384ade6ed47454b9ece77dfce71919ef2762522c6117771f'),
(6, 624526760, '', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'user11@gmail.com', '2021-05-15 03:34:52', 'b91716bfbe8eb77bdb6fb7e7a29d8f40c32b145ab4e02f0575fb83d2866848cd'),
(8, 1222738298, '', '4e27bd6246632b9722653a909ae93798243b5cc93c223dfd6264b24f16cee712', 'teacher0@gmail.com', '2021-05-16 06:37:57', '1195a1ac33e3e1bf8d7f90487c933382aebb5c01cc44b6c6e5125058c23e8265'),
(10, 1521188876, '', '4e27bd6246632b9722653a909ae93798243b5cc93c223dfd6264b24f16cee712', 'teacher09@gmail.com', '2021-05-16 16:40:15', 'a42ebf779e075fa1238f8c692ce3bdda95fbf7b50024ad17f7321a68c138dc72'),
(14, 1170173354, 'teacher', '4e27bd6246632b9722653a909ae93798243b5cc93c223dfd6264b24f16cee712', 'teache001r@gmail.com', '2021-05-19 14:51:02', '8e68b6e85270a5ac0eff23aceaab0382f000821e86fd8bec8cc0517dc2e1e87c'),
(15, 901825436, 'student', '4e27bd6246632b9722653a909ae93798243b5cc93c223dfd6264b24f16cee712', 'student1@gmail.com', '2021-05-19 17:00:51', '58d8e43ae1bd768cfc6ec1e4d2262217ff5cbd65d3f8d07b3d595e967f870444'),
(16, 2010287043, 'student', '4e27bd6246632b9722653a909ae93798243b5cc93c223dfd6264b24f16cee712', 'student2@gmail.com', '2021-05-19 17:02:19', '8538602aa2d1fdf3a7020c0cb88756e7e426924713c3352b353972c4ac68a385');

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
MODIFY `no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `checks`
--
ALTER TABLE `checks`
MODIFY `no` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
MODIFY `no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
MODIFY `no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
