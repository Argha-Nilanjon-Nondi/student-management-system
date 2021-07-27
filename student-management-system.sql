-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2021 at 12:52 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `breaks`
--

INSERT INTO `breaks` (`no`, `userid`, `workdate`, `reason`, `timetext`, `status`) VALUES
(2, '2010287043', '2021-05-10', 'I am ill', '09:53:00', 'accept'),
(6, '2010287043', '2021-05-20', 'I am ill', '09:53:00', 'reject'),
(8, '2010287043', '2020-08-23', 'Hi Sir', '12:09:00', 'pending');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `checks`
--

INSERT INTO `checks` (`no`, `userid`, `workdate`, `checkin`, `checkout`, `presenttype`) VALUES
(1, '2010287043', '2021-05-01', '09:10:00', '00:00:00', 'AB'),
(2, '2010287043', '2021-05-02', '09:10:00', '00:00:00', 'PR'),
(3, '2010287043', '2021-05-03', '09:10:00', '00:00:00', 'PR'),
(4, '901825436', '2021-05-03', '09:10:00', '00:00:00', 'PR'),
(7, '1581605672', '2021-07-25', '16:03:00', '16:11:00', 'PR'),
(8, '1581605672', '2021-07-26', '16:03:00', '16:11:00', 'PR');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`no`, `userid`, `username`, `class`, `section`, `roll`, `contactno`) VALUES
(1, '901825436', 'Mita Ghosh', '9', 'A', 1, '+880171574359'),
(2, '2010287043', 'Mita Ghosh', '9', 'A', 2, '+880171574359'),
(3, '446511277', 'Argha Nilanjon Nondi 998', '9', 'B', 25, '+8801710762748'),
(4, '1581605672', ' avunix', '9', 'B', 23, '+8801710762748');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`no`, `userid`, `username`, `class`, `section`, `contactno`) VALUES
(3, '6675646', 'Nilanjon Nondi', 7, 'B', '+8801715743000'),
(4, '1931483431', 'argha0', 10, 'A', '+8801710962748'),
(6, '706052055', 'argha2', 9, 'A', '+8801710962748'),
(7, '774336837', 'argha3', 9, 'B', '+8801710962748'),
(8, '1342840762', 'argha4', 8, 'B', '+8801710962748'),
(9, '1854161608', 'argha5', 8, 'A', '+8801710962748'),
(12, '693172830', 'Argha Nilanjon Nondi', 9, 'B', '+8801710762748'),
(13, '356926622', 'Argha Nilanj', 9, 'A', '+8801710762749'),
(14, '1916156950', 'Argha Nilanj', 9, 'A', '+8801710762749'),
(15, '1243975389', 'avunix', 9, 'A', '+8801710762748'),
(16, '185261968', 'avunix', 9, 'A', '+8801710762748'),
(17, '1424004969', 'pcic095@gmail.com', 9, 'A', '+8801710762748'),
(18, '1066001034', 'pcic095@gmail.com', 9, 'A', '+8801710762748'),
(20, '2023588524', '65656774556767tgghf', 9, 'A', '+8801710762748'),
(21, '1692672724', 'fgfgfgfgf', 9, 'A', '+8801710762748'),
(22, '270275092', 'argha7999', 9, 'A', '+8801710762748'),
(23, '1164103233', 'avunix', 9, 'A', '+8801710762748'),
(24, '1934570392', 'avunix', 5, 'B', '+8801710762748'),
(25, '1652523850', 'avunix', 9, 'A', '+8801710762748'),
(27, '1819728468', 'avunix', 8, 'A', '+8801710762748'),
(28, '1807114592', 'avunix', 8, 'A', '+8801710762748'),
(29, '1379248016', 'avunix', 8, 'A', '+8801710762748'),
(30, '1022209739', 'avunix', 8, 'A', '+8801710762748'),
(31, '1559330952', ' avunix', 9, 'A', '+8801710762748'),
(32, '491180621', ' avunix', 9, 'A', '+8801710762748'),
(33, '1245264959', ' avunix', 9, 'A', '+8801710762748'),
(35, '709226726', ' avunix', 10, 'A', '+8801710762748'),
(36, '468716120', '67576575765', 10, 'A', '+8801710762748'),
(37, '1041139498', '67576575765', 10, 'A', '+8801710762748'),
(38, '398199239', '67576575765', 10, 'A', '+8801710762748'),
(39, '1599069346', '67576575765', 10, 'A', '+8801710762748'),
(40, '933887699', '67576575765', 10, 'A', '+8801710762748'),
(41, '1440594946', '67576575765', 10, 'A', '+8801710762748'),
(42, '1460586902', '67576575765', 10, 'B', '+8801710762748'),
(46, '67079428', 'pcic09', 9, 'A', '+8801710762748'),
(47, '127556622', 'Argha Nilanjon Nondi', 2, 'A', '+8801710762748');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`no`, `userid`, `usertype`, `password`, `email`, `createdate`, `token`) VALUES
(1, 657634785, 'admin', '1fbdf1f94e0cda6bc30f9ca73542e2224e7905a13cc3087c02039d7850714a6c', 'admin@gmail.com', '2021-05-12 16:38:06', '74f5bdd6fa138b472125192fbc03fc3643afeaf9a0396c3f11e9912fd72f531a'),
(15, 901825436, 'student', '4e27bd6246632b9722653a909ae93798243b5cc93c223dfd6264b24f16cee712', 'student1@gmail.com', '2021-05-19 17:00:51', '58d8e43ae1bd768cfc6ec1e4d2262217ff5cbd65d3f8d07b3d595e967f870444'),
(16, 2010287043, 'student', '4e27bd6246632b9722653a909ae93798243b5cc93c223dfd6264b24f16cee712', 'student2@gmail.com', '2021-05-19 17:02:19', 'c8c0f2a89e58ac53d6d0636f3e4ac2d28dfa52a7a14c8bae39570e08252137a9'),
(17, 1931483431, 'teacher', '9ac64ab15cf356c839502528c59257364e0aaced5a338f640a5a1a1784f12484', 'teacher0@gmail.com', '2021-07-12 03:53:08', '98b9a4e8e24df544db694e5319aa770abf5898020cd693b7dac879bb674e3381'),
(19, 706052055, 'teacher', '0761d944c65f2e6a078095908f08a637a1ad62cb6e708c8f309c830dfacd034f', 'teacher2@gmail.com', '2021-07-12 03:55:12', '77b266af1e72b20c06f28adaf2f1be976ab3bad77243f34beda9dea0a8f9db97'),
(20, 774336837, 'teacher', '9d2e6cf9d83cf32c0acdfa6bbfc95e36d6973fe8f652f392145437e277533a30', 'teacher3@gmail.com', '2021-07-12 03:55:48', '81b3f3b4b80550cb6a470222242f7266f90d18cc712314fd197725f7f609c937'),
(21, 1342840762, 'teacher', '6401679f41edfc407d2c277f7339a1711bb51e38b0441ac61a75449d8eedf040', 'teacher4@gmail.com', '2021-07-12 04:06:01', 'a4bf50731cbb3acb5ffe20dbdc3af175986baec3b2d87d60acaa6a8cb0636d6c'),
(22, 1854161608, 'teacher', '42fb5550d0f3ab26621e5b1a5586a00aa601dee02b50ae7d1b7b4b420e365494', 'teacher5@gmail.com', '2021-07-12 04:06:56', '87f7ccacf05661c04aade7f22c11b8531c982aba1e1ee07daf1a67ac77223906'),
(25, 693172830, 'teacher', '4e27bd6246632b9722653a909ae93798243b5cc93c223dfd6264b24f16cee712', 'pcic095@gmail.com', '2021-07-15 16:47:53', 'fbc112bd24451ab8c154f0d793cff48cb98a3b09f7a2ac0595dd8b0102c8baf6'),
(26, 356926622, 'teacher', '26abc1fe3c9dbcd19e43d90c312f3342c4a7b4e1920366a59d6f6a3a5ff102e0', 'pcic0999@gmail.com', '2021-07-15 17:02:15', 'ac9d018539fdf8aa1782094a60554b63ae58bfaa8863d0d4a4e804d7acf7c2a0'),
(27, 1916156950, 'teacher', '26abc1fe3c9dbcd19e43d90c312f3342c4a7b4e1920366a59d6f6a3a5ff102e0', 'pcic099989@gmail.com', '2021-07-15 17:02:56', '57d88df273f0538145f2db59b1c4ef8fa866fc100b974782a0e7d185b69103fb'),
(28, 1243975389, 'teacher', '9ad96001a8e883d07e5a576a890e8e1ea7ced70f12c67bd5f60e2ffba75c072d', 'pcic067@gmail.com', '2021-07-15 17:20:52', '1fdd9598cfa9f66d0c45421cbc6008b7c8254418c1f3a08fc9121c3afbf4ec82'),
(29, 185261968, 'teacher', '4e27bd6246632b9722653a909ae93798243b5cc93c223dfd6264b24f16cee712', 'pcic069997@gmail.com', '2021-07-15 17:21:47', 'f4b6db16149533075e771709b376a6bdfeb6f81f4a4f88fd9ca4f66e268797c8'),
(30, 1424004969, 'teacher', '4e27bd6246632b9722653a909ae93798243b5cc93c223dfd6264b24f16cee712', 'pcic0678787@gmail.co', '2021-07-15 17:23:37', 'c4786ca3a0c16e1c7f420c5922c6c3894891c56ecb91556492dd8665b5000c31'),
(31, 1066001034, 'teacher', '4e27bd6246632b9722653a909ae93798243b5cc93c223dfd6264b24f16cee712', 'pcic0678787@gmail.co', '2021-07-15 17:24:50', 'b8754aa2472133a5d774ff2810f04314ce9df565450654319c132570e88d708b'),
(33, 2023588524, 'teacher', '38902a8be2c1e1ec7658f7967c0a37774278bd33cea3fd06d3ae0d4e23e95169', 'pcic099995@gmail.com', '2021-07-15 17:27:07', '08d34ec04494f883601cdea25f46a63c5773b5980e1674bd183ff11dd6df033f'),
(34, 1692672724, 'teacher', '6fba2606703e300869740c02d6d65f19619bc6fdfe9a469990dbc8ac89c05845', 'pcic090909@gmail.com', '2021-07-15 17:33:03', '47c7390789f44df01b0a02b86a8d758e626e0417e56ded39a0dea6f8673889fb'),
(35, 270275092, 'teacher', '4e27bd6246632b9722653a909ae93798243b5cc93c223dfd6264b24f16cee712', 'test9@gmail.com', '2021-07-16 09:12:27', 'a9626e5fbd6049ab1aee78a0b48c8f41225849bb4cf4aec4546228d186614d67'),
(36, 1164103233, 'teacher', '4e27bd6246632b9722653a909ae93798243b5cc93c223dfd6264b24f16cee712', 'pcic0999095@gmail.co', '2021-07-16 09:16:24', '982266dea850ab18be29cdd373085f8c7cefc5fa5d2917756ab55cf8eaf72afd'),
(37, 1934570392, 'teacher', '6401679f41edfc407d2c277f7339a1711bb51e38b0441ac61a75449d8eedf040', 'pcic09yry5@gmail.com', '2021-07-16 09:17:44', '9493137374a62963a640a0930bae188ad57c8f7324bf39201f9208bd66bb52a3'),
(38, 1652523850, 'teacher', '6401679f41edfc407d2c277f7339a1711bb51e38b0441ac61a75449d8eedf040', 'pcic09yry65@gmail.co', '2021-07-16 09:22:44', 'fa983a2dbfab4ca7ca1c0b6ad7245eba57406aa8d2a1922dfe032e0eec481b2c'),
(40, 1819728468, 'teacher', '6401679f41edfc407d2c277f7339a1711bb51e38b0441ac61a75449d8eedf040', 'pcic09yry65@gmail.co', '2021-07-16 09:26:15', 'd512086ed8239fb0bce86c1874e88cd00177981da00e6042170fb743a25fbf86'),
(41, 1807114592, 'teacher', '6401679f41edfc407d2c277f7339a1711bb51e38b0441ac61a75449d8eedf040', 'pcic09yry65@gmail.co', '2021-07-16 09:29:45', '636cfe677ece8a7b46a67dede1a58da486aac186493f9b85e4fed01107de9ac0'),
(42, 1379248016, 'teacher', '6401679f41edfc407d2c277f7339a1711bb51e38b0441ac61a75449d8eedf040', 'pcic09yry65@gmail.co', '2021-07-16 09:30:30', '050ed4e209c87affeaad586fe86e6f145d4d7d8856854857d47bb9011900e39d'),
(43, 1022209739, 'teacher', '6401679f41edfc407d2c277f7339a1711bb51e38b0441ac61a75449d8eedf040', 'pcic09yry65@gmail.co', '2021-07-16 09:30:50', '72bf244f5f92f8e3243477f74461b4880630eb9c277027f165b4e92c92dc6a8a'),
(44, 1559330952, 'teacher', 'ef9439160b93dd27b4d5578f7f0e3d3ae4a9f8c141c31b16d9ceedf0edc5dca0', 'pcic098885@gmail.com', '2021-07-16 09:34:08', 'b20c3918071b7c76c469ad7830256e919b95a89b7dc9e893fe5731ecb5db1dcf'),
(45, 491180621, 'teacher', 'ef9439160b93dd27b4d5578f7f0e3d3ae4a9f8c141c31b16d9ceedf0edc5dca0', 'pcic098uu885@gmail.c', '2021-07-16 09:36:14', 'e2937d3b51fdcdd254d507e39a533fe7137f284e460b23cb901f134998f5a1a9'),
(46, 1245264959, 'teacher', 'ef9439160b93dd27b4d5578f7f0e3d3ae4a9f8c141c31b16d9ceedf0edc5dca0', 'pcic098uu885@gmail.c', '2021-07-16 09:37:19', 'caf5d30cb0c4411d7d42a34125e78e9c4587360dcd3927e3215d9396fc11833f'),
(48, 709226726, 'teacher', 'ef9439160b93dd27b4d5578f7f0e3d3ae4a9f8c141c31b16d9ceedf0edc5dca0', 'pcic098uu885@gmail.c', '2021-07-16 09:38:20', '3cf2c5cbf5e42cfdaa7d3023691799a36399d218b53dadcfbc13634603872efc'),
(49, 468716120, 'teacher', '8e858d79696791134a4fdf87018f3bfded0edc112899c7f29c6af84c65356533', 'pcic09665@gmail.com', '2021-07-16 09:45:53', '10e9460d24cd9ab5b6baf502c0b58047cac4a1960282936977665d1c3b79bfee'),
(50, 1041139498, 'teacher', '8e858d79696791134a4fdf87018f3bfded0edc112899c7f29c6af84c65356533', 'pcic0969965@gmail.co', '2021-07-16 09:49:35', 'bb05012eebbe1795e83a0224d4b9e075c74a06f0a7497c533c7f9893dcf628fc'),
(51, 398199239, 'teacher', '8e858d79696791134a4fdf87018f3bfded0edc112899c7f29c6af84c65356533', 'pcic0969965@gmail.co', '2021-07-16 09:52:27', 'c5408a924786b2b9009066cef3bba5e2e4be7e770babc9f508bc7fe30f1d9ecb'),
(52, 1599069346, 'teacher', '8e858d79696791134a4fdf87018f3bfded0edc112899c7f29c6af84c65356533', 'pcic0969965@gmail.co', '2021-07-16 09:55:47', '9dfb55ea787fe1878d5acca35cf6582120b6b43c3881c54b8057883777d28625'),
(53, 933887699, 'teacher', '8e858d79696791134a4fdf87018f3bfded0edc112899c7f29c6af84c65356533', 'pcic0969965@gmail.co', '2021-07-16 09:57:01', '33ee4f1f1277b8f9c8df3da4757d0d37427403fe00c926b31df314a4ebc75d8e'),
(54, 1440594946, 'teacher', '8e858d79696791134a4fdf87018f3bfded0edc112899c7f29c6af84c65356533', 'pcic0969965@gmail.co', '2021-07-16 09:58:04', '1582f1951b46872bbfbeeffd1934e34674b3f922b146f7f1dceb6cd477e87180'),
(55, 1460586902, 'teacher', '8e858d79696791134a4fdf87018f3bfded0edc112899c7f29c6af84c65356533', 'pcic0969965@gmail.co', '2021-07-16 10:00:29', 'cd1983e009f93f42ed2f41a496b0821414637b5366d248aeac90bf78ca86fe43'),
(59, 67079428, 'teacher', '4e27bd6246632b9722653a909ae93798243b5cc93c223dfd6264b24f16cee712', 'pcicasa095@gmail.com', '2021-07-16 15:23:09', '35483112919703606eca2ba900f8d44a0f3d5ebcfe3d997dd2293d94ddc7fab2'),
(60, 127556622, 'teacher', '4e27bd6246632b9722653a909ae93798243b5cc93c223dfd6264b24f16cee712', 'pcic1009@gmail.com', '2021-07-16 16:27:38', 'ac6520ab5240b0efb5df0ea5135026ba82fb2dea8cd633652e0a5ea3aa29d225'),
(61, 446511277, 'student', '4e27bd6246632b9722653a909ae93798243b5cc93c223dfd6264b24f16cee712', 'pcic0795@gmail.com', '2021-07-18 16:56:11', '46ea687e866cf1a5ad4119d00db5e6d48d0a790ff2855beb709c32137bc5674c'),
(62, 1581605672, 'student', '7d319970137e87162c5b45235957bcf54d0a20aeb70b60cee3fd5cd53a312c06', 'pcic0956666@gmail.co', '2021-07-19 08:29:38', 'a19bcecb4a97837619308a3b0241b23865736e4aad7ac2ca709c5e94fba08881');

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
MODIFY `no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `checks`
--
ALTER TABLE `checks`
MODIFY `no` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
MODIFY `no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
MODIFY `no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=63;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
