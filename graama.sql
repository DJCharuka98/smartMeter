-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2021 at 06:11 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `graama`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `reg_no` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `joined_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`reg_no`, `name`, `username`, `password`, `joined_date`) VALUES
('000', 'admin', 'admin', 'admin', '2021-05-23'),
('554584', 'Chamodi Weedagama', 'chamodi', 'chamodi', '2021-05-16'),
('8468', 'dhg', 'bewhgy', 'egwyg', '2021-05-24'),
('ftughuirh', 'riuhyre', 'jruiheiur', 'eiur8u', '2021-03-25'),
('gyudgt', 'heyg', 'ebgte', 'ehygdy', '2021-03-12'),
('jfduhg', 'rkjter', 'rtjejrit', 'rjitjie', '2021-03-02'),
('uehuifs', 're7uy', 'rjui', 'iji', '2021-04-01');

-- --------------------------------------------------------

--
-- Table structure for table `adult`
--

CREATE TABLE `adult` (
  `person_id` int(11) NOT NULL,
  `married_status` varchar(50) NOT NULL,
  `vote_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adult`
--

INSERT INTO `adult` (`person_id`, `married_status`, `vote_status`) VALUES
(25, 'Married', 'Voter'),
(26, 'Married', 'Voter'),
(32, 'Unmarried', 'Non-voter'),
(33, 'Married', 'Voter'),
(25, 'Married', 'Voter'),
(26, 'Married', 'Voter'),
(32, 'Unmarried', 'Non-voter'),
(33, 'Married', 'Voter');

-- --------------------------------------------------------

--
-- Table structure for table `certichar`
--

CREATE TABLE `certichar` (
  `cert_id` int(11) NOT NULL,
  `NIC` varchar(255) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `additional description` varchar(255) NOT NULL,
  `issue_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `certichar`
--

INSERT INTO `certichar` (`cert_id`, `NIC`, `purpose`, `additional description`, `issue_date`) VALUES
(1, '985093709v', 'job', 'She is involved in social activities', '2021-05-15'),
(2, '985093709v', 'job', 'good', '2021-05-15'),
(3, '985093709v', 'hhh', 'ojuiui', '2021-05-15'),
(4, '985093709v', 'djsj', 'djijua', '2021-05-15'),
(5, '985093709v', 'job', 'good', '2021-05-15'),
(6, '985093709v', '', '', '2021-05-15'),
(7, '985093709v', 'job', 'good character', '2021-05-15'),
(8, '985093709v', 'to apply a job', 'She has a good character.', '2021-05-15'),
(9, '985093709v', 'to job', '', '2021-05-16'),
(10, '985093709v', 'To job', '', '2021-05-16'),
(11, '985093709v', 'to job', '', '2021-05-17'),
(12, '985093709v', '', '', '2021-05-21');

-- --------------------------------------------------------

--
-- Table structure for table `certires`
--

CREATE TABLE `certires` (
  `certi_id` int(11) NOT NULL,
  `NIC` varchar(15) NOT NULL,
  `purpose` text NOT NULL,
  `additional description` varchar(255) NOT NULL,
  `issue_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `certires`
--

INSERT INTO `certires` (`certi_id`, `NIC`, `purpose`, `additional description`, `issue_date`) VALUES
(1, '985093709v', 'job', '', '2021-05-16'),
(2, '985093709v', 'job', '', '2021-05-16'),
(3, '985093709v', 'to apply a job', '', '2021-05-16'),
(4, '985093709v', 'job', '', '2021-05-16'),
(5, '985093709v', 'apply a job', '', '2021-05-16'),
(6, '985093709v', 'to job', '', '2021-05-16'),
(7, '985093709v', 'For job', '', '2021-05-16'),
(8, '985093707v', 'vfgfgtft', '', '2021-05-17'),
(9, '985093709v', '', '', '2021-05-21');

-- --------------------------------------------------------

--
-- Table structure for table `child`
--

CREATE TABLE `child` (
  `person_id` int(11) NOT NULL,
  `guardian_name` varchar(200) NOT NULL,
  `guardian_NIC` varchar(14) NOT NULL,
  `school` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `child`
--

INSERT INTO `child` (`person_id`, `guardian_name`, `guardian_NIC`, `school`) VALUES
(24, 'gttt', '985093709v', ''),
(28, 'ftftre', '985093709v', 'hesyyr7ye'),
(31, 'neh', '985288725V', ''),
(24, 'gttt', '985093709v', ''),
(28, 'ftftre', '985093709v', 'hesyyr7ye'),
(31, 'neh', '985288725V', ''),
(35, 'gtftf', '975083405v', ''),
(36, 'wbqgyg', '978523102v', '');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `person_id` int(11) NOT NULL,
  `telephone_no` varchar(10) DEFAULT NULL,
  `mobile_no` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`person_id`, `telephone_no`, `mobile_no`) VALUES
(28, '0723639508', 'Mobile'),
(29, '0723639508', 'Mobile'),
(28, '0723639508', 'Mobile'),
(29, '0723639508', 'Mobile');

-- --------------------------------------------------------

--
-- Table structure for table `curcert`
--

CREATE TABLE `curcert` (
  `f_name` varchar(255) NOT NULL,
  `NIC` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `des` varchar(255) NOT NULL,
  `joined_date` date NOT NULL,
  `issue_date` date NOT NULL,
  `purpose` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `curcert`
--

INSERT INTO `curcert` (`f_name`, `NIC`, `address`, `des`, `joined_date`, `issue_date`, `purpose`) VALUES
('charuka jayamali', '985093709v', '607/3,meegahagoda', '', '2021-03-27', '2021-05-21', '');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `person_id` int(11) NOT NULL,
  `job_type` varchar(255) NOT NULL,
  `job_income` float NOT NULL,
  `other_income` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`person_id`, `job_type`, `job_income`, `other_income`) VALUES
(26, 'Government', 14000, 0),
(29, 'Government', 14000, 0),
(17, 'Non-Government', 52000, 0),
(26, 'Government', 14000, 0),
(29, 'Government', 14000, 0),
(17, 'Non-Government', 52000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `family`
--

CREATE TABLE `family` (
  `family_no` int(11) NOT NULL,
  `samurdhi_status` varchar(15) NOT NULL,
  `house_no` int(11) NOT NULL,
  `p_nic` varchar(100) NOT NULL,
  `real_inc` float NOT NULL,
  `money_inc` float DEFAULT NULL,
  `total_inc` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `family`
--

INSERT INTO `family` (`family_no`, `samurdhi_status`, `house_no`, `p_nic`, `real_inc`, `money_inc`, `total_inc`) VALUES
(14, 'Not-Receiving', 55, '985022300V', 2200, 0, 2200),
(22, 'Not-Receiving', 55, '985212000V', 1000, 0, 1000),
(29, 'Receiving', 55, '553399709V', 5500, 0, 5500),
(55, 'Receiving', 33, '985093709v', 2350, 104000, 106350),
(85, 'Receiving', 33, '203620202V', 1000, 0, 1000),
(96, 'Receiving', 4, '523212000V', 5555, 0, 5555);

-- --------------------------------------------------------

--
-- Table structure for table `house`
--

CREATE TABLE `house` (
  `house_no` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `roof_type` varchar(20) NOT NULL,
  `wall_type` varchar(20) NOT NULL,
  `floor_type` varchar(20) NOT NULL,
  `toilet_fac` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `house`
--

INSERT INTO `house` (`house_no`, `location`, `roof_type`, `wall_type`, `floor_type`, `toilet_fac`) VALUES
(4, 'yy', 'Asbastes', 'Clay', 'Clay', 0),
(13, 'l lane', 'Asbastes', 'Clay', 'Clay', 0),
(16, 'l lane', 'Roofing tiles ', 'Clay', 'Other', 0),
(33, 'rehyf', 'Roofing tiles ', 'Cement Bricks', 'Cement', 1),
(44, 'l lane', 'Roofing tiles ', 'Cement Bricks', 'Clay', 4),
(52, 'rgtgf', 'Roofing tiles ', 'Cement Bricks', 'Clay', 4),
(55, 'irejhfyugery', 'erufye', 'rehyg', 'nrbgv', 0),
(62, 'deyy', 'Asbastes', 'Clay', 'Other', 2);

-- --------------------------------------------------------

--
-- Table structure for table `mahapola`
--

CREATE TABLE `mahapola` (
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `NIC` varchar(15) NOT NULL,
  `family_no` int(11) NOT NULL,
  `family_income` float NOT NULL,
  `university` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahapola`
--

INSERT INTO `mahapola` (`first_name`, `last_name`, `NIC`, `family_no`, `family_income`, `university`) VALUES
('charuka', 'jayamali', '985093709v', 22, 1000, 'japura'),
('charuka', 'jayamali', '985093709v', 22, 1000, 'japura');

-- --------------------------------------------------------

--
-- Table structure for table `nofac`
--

CREATE TABLE `nofac` (
  `house_no` int(11) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nofac`
--

INSERT INTO `nofac` (`house_no`, `location`) VALUES
(4, 'yy'),
(13, 'l lane'),
(16, 'l lane'),
(55, 'irejhfyugery');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `id` int(10) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `NIC` varchar(14) DEFAULT NULL,
  `DOB` date NOT NULL,
  `joined_date` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `nation` varchar(20) NOT NULL,
  `religion` varchar(20) NOT NULL,
  `family_no` int(11) NOT NULL,
  `house_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`id`, `first_name`, `last_name`, `address`, `NIC`, `DOB`, `joined_date`, `gender`, `nation`, `religion`, `family_no`, `house_no`) VALUES
(6, 'defius', 'fsrfuhr', 'rjuhiurssjusrhuh', 'euhuhfu', '2021-03-02', '2021-03-04', 'Male', 'hdhfu', 'dudu', 5, 55),
(15, 'charuka', 'jayamali', '607/3,meegahagoda', '985093709v', '1998-01-09', '2021-03-27', 'Female', 'Sinhala', 'Buddhism', 22, 33),
(16, 'oshini', 'thaa', 'gampha', '942244701V', '1994-08-20', '2021-04-06', 'Female', 'Sinhala', 'Buddhism', 55, 452),
(17, 'gg', 'wh', 'mqiji', '', '2020-01-04', '2021-04-07', 'Male', 'Sinhala', 'Islam', 55, 55),
(18, 'jhhre', 'kmme', 'emen', '595888924V', '2021-04-07', '2021-04-01', 'Male', 'Tamil', 'Buddhism', 848, 555),
(19, 'euhud', 'nehui', 'jneue', '', '2021-03-29', '2021-04-01', 'Male', 'Sinhala', 'Buddhism', 65, 56),
(20, 'dhbshg', 'nd', 'msk', '220099884V', '1974-08-17', '2021-04-01', 'Male', 'Sinhala', 'Buddhism', 44, 4458),
(21, 'mju', 'nujhu', 'uu', '', '2021-04-01', '2021-04-01', 'Female', 'Sinhala', 'Buddhism', 22, 22),
(22, 'yyg', 'gtt', 'ttt', '', '2021-04-01', '2021-04-01', 'Male', 'Sinhala', 'Buddhism', 22, 66),
(23, 'shsdsrdad', 'ss', 'shsu', '', '2021-04-01', '2021-04-01', 'Male', 'Tamil', 'Buddhism', 55, 55),
(24, 'uyhy', 'gttf', 'hyy', '', '2021-04-01', '2021-04-01', 'Male', 'Tamil', 'Buddhism', 212, 55),
(25, 'byfgy', 'eydyw', 'eyyy', '985012405V', '1994-06-14', '2021-04-01', 'Male', 'Muslim', 'Islam', 66, 65),
(26, 'tir', 'tuhty', 'hyey', '985093707v', '1984-06-12', '2021-04-01', 'Male', 'Sinhala', 'Buddhism', 33, 55),
(28, 'nthyt', 'jfruhurh', 'h4u5uy', '', '2021-04-01', '2021-04-01', 'Male', 'Sinhala', 'Buddhism', 32, 22),
(29, 'tir', 'tuhty', 'hyey', '985093707v', '1984-06-12', '2021-04-01', 'Male', 'Sinhala', 'Buddhism', 33, 55),
(31, 'hyyue', 'tytye', 'egty', '', '2009-04-07', '2021-04-07', 'Male', 'Tamil', 'Hindu', 55, 22),
(32, 'snn', 'nj', 'nn', '985088702V', '1990-03-08', '2021-04-08', 'Female', 'Sinhala', 'Buddhism', 22, 11),
(33, 'ses', 'kjh', 'k', '465022412v', '1946-12-21', '2021-04-10', 'Female', 'Sinhala', 'Buddhism', 55, 665),
(35, 'fr', 'vgfgf', 'rfdgrdrgtdgtr', '', '2021-05-23', '2021-05-23', 'Female', 'Sinhala', 'Hindu', 11, 1),
(36, 'ewgygew', 'ygtydeq', 'egteq', '', '2021-05-23', '2021-05-23', 'Male', 'Sinhala', 'Buddhism', 55, 11);

-- --------------------------------------------------------

--
-- Table structure for table `samurdhi`
--

CREATE TABLE `samurdhi` (
  `family_no` int(11) NOT NULL,
  `house_no` int(11) NOT NULL,
  `p_NIC` varchar(255) NOT NULL,
  `family_income` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `samurdhi`
--

INSERT INTO `samurdhi` (`family_no`, `house_no`, `p_NIC`, `family_income`) VALUES
(29, 55, '553399709V', 5500),
(55, 33, '985093709v', 106350),
(85, 33, '203620202V', 1000),
(96, 4, '523212000V', 5555);

-- --------------------------------------------------------

--
-- Table structure for table `unemployee`
--

CREATE TABLE `unemployee` (
  `person_id` int(11) NOT NULL,
  `other_income` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unemployee`
--

INSERT INTO `unemployee` (`person_id`, `other_income`) VALUES
(32, 2000),
(33, 0),
(32, 2000),
(33, 0);

-- --------------------------------------------------------

--
-- Table structure for table `uni_student`
--

CREATE TABLE `uni_student` (
  `person_id` int(11) NOT NULL,
  `university` varchar(100) NOT NULL,
  `mahapola_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uni_student`
--

INSERT INTO `uni_student` (`person_id`, `university`, `mahapola_status`) VALUES
(15, 'japura', 'Yes'),
(15, 'japura', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `village`
--

CREATE TABLE `village` (
  `GND_code` varchar(150) NOT NULL,
  `GND_name` varchar(150) NOT NULL,
  `division` varchar(150) NOT NULL,
  `district` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `village`
--

INSERT INTO `village` (`GND_code`, `GND_name`, `division`, `district`) VALUES
('00512', 'ratnapura', 'pelmadulla', 'Ratnapura');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`reg_no`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `adult`
--
ALTER TABLE `adult`
  ADD KEY `person_id` (`person_id`);

--
-- Indexes for table `certichar`
--
ALTER TABLE `certichar`
  ADD PRIMARY KEY (`cert_id`);

--
-- Indexes for table `certires`
--
ALTER TABLE `certires`
  ADD PRIMARY KEY (`certi_id`);

--
-- Indexes for table `child`
--
ALTER TABLE `child`
  ADD KEY `person_id` (`person_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD KEY `person_id` (`person_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD KEY `person_id` (`person_id`);

--
-- Indexes for table `family`
--
ALTER TABLE `family`
  ADD PRIMARY KEY (`family_no`),
  ADD KEY `house_no` (`house_no`);

--
-- Indexes for table `house`
--
ALTER TABLE `house`
  ADD PRIMARY KEY (`house_no`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unemployee`
--
ALTER TABLE `unemployee`
  ADD KEY `person_id` (`person_id`);

--
-- Indexes for table `uni_student`
--
ALTER TABLE `uni_student`
  ADD KEY `person_id` (`person_id`);

--
-- Indexes for table `village`
--
ALTER TABLE `village`
  ADD PRIMARY KEY (`GND_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `certichar`
--
ALTER TABLE `certichar`
  MODIFY `cert_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `certires`
--
ALTER TABLE `certires`
  MODIFY `certi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adult`
--
ALTER TABLE `adult`
  ADD CONSTRAINT `adult_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`);

--
-- Constraints for table `child`
--
ALTER TABLE `child`
  ADD CONSTRAINT `child_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`);

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`);

--
-- Constraints for table `family`
--
ALTER TABLE `family`
  ADD CONSTRAINT `family_ibfk_1` FOREIGN KEY (`house_no`) REFERENCES `house` (`house_no`);

--
-- Constraints for table `unemployee`
--
ALTER TABLE `unemployee`
  ADD CONSTRAINT `unemployee_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`);

--
-- Constraints for table `uni_student`
--
ALTER TABLE `uni_student`
  ADD CONSTRAINT `uni_student_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
