-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2021 at 03:04 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `archive`
--

CREATE TABLE `archive` (
  `archive_id` int(11) NOT NULL,
  `year` date DEFAULT NULL,
  `total` double DEFAULT NULL,
  `classification` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `archive`
--

INSERT INTO `archive` (`archive_id`, `year`, `total`, `classification`) VALUES
(0, '0000-00-00', 40000, 1),
(1, '0000-00-00', 30000, 1),
(2, '0000-00-00', 50000, 1),
(3, '0000-00-00', 60000, 0),
(4, '0000-00-00', 70000, 0),
(5, '0000-00-00', 80000, 0),
(7, '0000-00-00', 90000, 2),
(8, '0000-00-00', 100000, 2),
(9, '0000-00-00', 110000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `pass` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `campuses`
--

CREATE TABLE `campuses` (
  `id` int(11) NOT NULL,
  `campus` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `campuses`
--

INSERT INTO `campuses` (`id`, `campus`) VALUES
(1, 'Main Campus'),
(2, 'East Campus'),
(3, 'Daraga Campus'),
(4, 'Outside Campuses');

-- --------------------------------------------------------

--
-- Table structure for table `classification`
--

CREATE TABLE `classification` (
  `classification_id` int(11) NOT NULL,
  `cl_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classification`
--

INSERT INTO `classification` (`classification_id`, `cl_name`) VALUES
(0, 'Equipment'),
(1, 'IT'),
(2, 'Laboratory');

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE `colleges` (
  `id` int(10) UNSIGNED NOT NULL,
  `college` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `campus_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`id`, `college`, `code`, `address`, `campus_id`) VALUES
(1, 'College of Science', 'CS', 'Legazpi City', 1),
(2, 'College of Nursing', 'CN', 'Legazpi City', 1),
(3, 'College of Arts and Letters', 'CAL', 'Legazpi City', 1),
(4, 'College of Education', 'CE', 'Daraga, Albay', 1),
(5, 'Institute of Physical Education, Sports and Recreation', 'IPESR', 'Daraga, Albay', 1),
(6, 'College of Business, Economics and Management', 'CBEM', 'Daraga, Albay', 3),
(7, 'College of Social Sciences and Philosophy', 'CSSP', 'Daraga, Albay', 3),
(8, 'College of Engineering', 'CENG', 'Legazpi City', 2),
(9, 'College of Industrial Technology', 'CIT', 'Legazpi City', 2),
(10, 'General Administration and Support Services', 'GASS', 'Legazpi City', 1),
(11, 'Graduate School', 'GS', 'Legazpi City', 1),
(12, 'Tabaco Campus', 'TC', 'Tabaco City', 4),
(13, 'Gubat Campus', 'GC', 'Gubat, Sorsogon', 4),
(14, 'Polangui Campus', 'PC', 'Polangui, Albay', 4),
(15, 'College of Agriculture and Forestry', 'CAF', 'Guinobatan, Albay', 4),
(16, 'Auxiliary Services', 'AuxSer', 'Legazpi City', 1),
(17, 'College of Medicine', 'CM', 'Legazpi City', 1),
(18, 'Institute of Architecture', 'IA', 'Legazpi City', 2),
(19, 'Research and Development Management Division', 'RDMD', 'Legazpi City', 2),
(20, 'Extension Management Division', 'EMD', 'Legazpi City', 2),
(21, 'Jesse M. Robredo Institute of Governance and Development', 'JMRIGD', 'Legazpi City', 2),
(22, 'College of Law', 'CL', 'Legazpi City', 1),
(23, 'Open University', 'OU', 'Legazpi City', 1);

-- --------------------------------------------------------

--
-- Table structure for table `component`
--

CREATE TABLE `component` (
  `comp_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `comp_name` varchar(200) DEFAULT NULL,
  `c_unit_meas` varchar(10) DEFAULT NULL,
  `c_unit_val` double DEFAULT NULL,
  `c_total_val` double DEFAULT NULL,
  `c_quan_propcar` int(11) DEFAULT NULL,
  `c_quan_phycou` int(11) DEFAULT NULL,
  `c_SO_quan` int(11) DEFAULT NULL,
  `c_SO_val` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(255) NOT NULL,
  `department_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department_name`) VALUES
(1, 'Biology'),
(2, 'Chemistry'),
(3, 'CS/IT'),
(4, 'Mathematics'),
(5, 'Physics'),
(6, 'Automotive Technology'),
(7, 'Civil Technology'),
(8, 'Electrical Technology'),
(9, 'Electronics'),
(10, 'Food Technology'),
(11, 'Industrial Design'),
(12, 'Mechanical Technology'),
(13, 'Technical Vocational Teacher Education'),
(14, 'Education'),
(15, 'Fisheries'),
(16, 'Nursing'),
(17, 'Entrepreneur'),
(18, 'Social Work'),
(19, 'IBS'),
(20, 'Integrative Community Medicine'),
(21, 'Clinical Sciences'),
(22, 'Agricultural Technology & BTVTEd'),
(23, 'Agriculture'),
(24, 'Agricultural and Biosystems Engineering'),
(25, 'Agribusiness'),
(26, 'Forestry\r\n'),
(27, 'Physical Education (BPEd)'),
(28, 'Exercise and Sports Sciences (BSESS)'),
(29, 'Management and Professional Education (MPE)'),
(30, 'Language and Literature (LAL) and Humanities and Social Sciences (HSS)'),
(31, 'Science Technology and Mathematics (STM)'),
(32, 'Early and Late Childhood (ELC)'),
(33, 'Teacher Education'),
(34, 'Computer Studies'),
(35, 'Technology & Entrepreneur'),
(36, 'Engineering'),
(37, 'Nursing and Health Sciences'),
(38, 'Chemical Engineering'),
(39, 'Geodetic Engineering'),
(40, 'Civil Engineering'),
(41, 'Electrical Engineering'),
(42, 'Mechanical Engineering'),
(43, 'Mining Engineering'),
(44, 'BAT'),
(45, 'BEED'),
(46, 'BSED'),
(47, 'BSBA'),
(48, 'Accountancy'),
(49, 'Economics\r\n'),
(50, 'Entrepreneurship'),
(51, 'General Education'),
(52, 'Psychology'),
(53, 'Peace Studies'),
(54, 'Philosophy'),
(55, 'Political Science'),
(56, 'Sociology'),
(57, 'Communication'),
(58, 'English'),
(59, 'Literature'),
(60, 'Performing Arts-Theater'),
(61, 'Print and Braodcast Media'),
(62, 'Filipino'),
(63, 'Humanities');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(255) NOT NULL,
  `employee_number` varchar(30) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birthday` date NOT NULL,
  `name_extension` varchar(11) NOT NULL,
  `honorifics` varchar(10) NOT NULL,
  `first_day_service` date NOT NULL,
  `years_in_service` int(100) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `employee_number`, `first_name`, `middle_name`, `last_name`, `gender`, `birthday`, `name_extension`, `honorifics`, `first_day_service`, `years_in_service`, `status`) VALUES
(162, '2011-005-76', 'Benedicto', 'Balinquit', 'Balilo', 'M', '1974-01-22', 'Jr.', 'Prof', '0000-00-00', 0, '1'),
(899, '2011-005-74', 'Aris', 'Jarabejo', 'Ordoñez', 'M', '1976-11-16', '', 'Prof', '0000-00-00', 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(100) DEFAULT NULL,
  `item_desc` varchar(500) DEFAULT NULL,
  `property_num` varchar(50) DEFAULT NULL,
  `date_aq` date DEFAULT NULL,
  `unit_meas` varchar(10) DEFAULT NULL,
  `unit_val` double DEFAULT NULL,
  `total_val` double DEFAULT NULL,
  `quant_propcar` int(5) DEFAULT NULL,
  `quant_phycou` int(5) DEFAULT NULL,
  `remarks` varchar(30) DEFAULT NULL,
  `classification` int(2) DEFAULT NULL,
  `SO_quant` int(3) DEFAULT NULL,
  `SO_val` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `item_desc`, `property_num`, `date_aq`, `unit_meas`, `unit_val`, `total_val`, `quant_propcar`, `quant_phycou`, `remarks`, `classification`, `SO_quant`, `SO_val`) VALUES
(1, 'laptop', '', '123001', '2021-01-01', 'unit', 30000, 30000, 1, 1, '0', 1, 0, 0),
(2, 'PC', '', '123002', '2021-01-01', 'unit', 60000, 60000, 1, 1, '0', 0, 0, 0),
(3, 'Sound System', '', '123003', '2021-01-01', 'unit', 70000, 70000, 1, 1, '0', 1, 0, 0),
(11, '234', '78', '78', '0009-08-07', '789', 7, 123, 798, 789, '789', 0, 789, 789),
(12, '123', '12312389', '89', '2009-08-07', '789', 789, 789, 789, 789, '789', 1, 789, 789),
(13, '213', '123789', '789', '2309-08-07', '789', 789, 879, 789, 789, '789', 0, 789, 789),
(14, '123', '789', '789', '0009-08-07', '789', 789, 789, 789, 978, '789', 1, 789, 978978),
(15, '123', 'u8', '879', '0009-08-07', '789', 789789, 789, 789, 789, '978', 0, 789, 789);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `log_id` int(11) NOT NULL,
  `item_name` varchar(200) DEFAULT NULL,
  `action` varchar(10) DEFAULT NULL,
  `date_action` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`log_id`, `item_name`, `action`, `date_action`) VALUES
(1, 'Laptop', 'Add', '2021-07-01'),
(2, 'PC', 'Add', '2021-07-01'),
(3, 'Sound Sytem', 'Add', '2021-07-01');

-- --------------------------------------------------------

--
-- Table structure for table `nbc`
--

CREATE TABLE `nbc` (
  `id` int(11) NOT NULL,
  `employee_id` int(255) NOT NULL,
  `plantilla_no` varchar(255) NOT NULL,
  `position_id` int(255) NOT NULL,
  `appointment_type` varchar(15) NOT NULL,
  `salary_grade_id` int(255) NOT NULL,
  `college_id` int(255) NOT NULL,
  `deployment_id` int(100) NOT NULL,
  `department_id` int(100) NOT NULL,
  `circular_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nbc`
--

INSERT INTO `nbc` (`id`, `employee_id`, `plantilla_no`, `position_id`, `appointment_type`, `salary_grade_id`, `college_id`, `deployment_id`, `department_id`, `circular_id`) VALUES
(2638, 899, 'BUB-AP4-7-2019', 26, 'Permanent', 916, 1, 1, 3, '3'),
(2658, 162, 'BUB-APRO4-2-1998', 23, 'Permanent', 948, 1, 1, 3, '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `archive`
--
ALTER TABLE `archive`
  ADD PRIMARY KEY (`archive_id`),
  ADD UNIQUE KEY `archive_id` (`archive_id`);

--
-- Indexes for table `campuses`
--
ALTER TABLE `campuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classification`
--
ALTER TABLE `classification`
  ADD PRIMARY KEY (`classification_id`);

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `component`
--
ALTER TABLE `component`
  ADD PRIMARY KEY (`comp_id`),
  ADD UNIQUE KEY `comp_id` (`comp_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `item_id` (`item_id`),
  ADD KEY `classification` (`classification`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `nbc`
--
ALTER TABLE `nbc`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `campuses`
--
ALTER TABLE `campuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `classification`
--
ALTER TABLE `classification`
  MODIFY `classification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1081;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nbc`
--
ALTER TABLE `nbc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3849;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `component`
--
ALTER TABLE `component`
  ADD CONSTRAINT `component_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
