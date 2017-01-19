-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 18, 2017 at 09:11 AM
-- Server version: 5.7.13-log
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ahsec_hrmis`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment_master`
--

CREATE TABLE `appointment_master` (
  `appointment_master_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `rule_id` int(11) NOT NULL,
  `qualification_id` int(11) NOT NULL,
  `post_name` varchar(50) NOT NULL,
  `total_post` int(11) NOT NULL,
  `grade` varchar(100) NOT NULL,
  `originalclause` varchar(200) NOT NULL,
  `newclause` varchar(200) NOT NULL,
  `sanction_no` varchar(50) NOT NULL,
  `sanction_date` date NOT NULL,
  `scale` varchar(100) NOT NULL,
  `increment_amount` int(11) NOT NULL,
  `increment_date` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `asset_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `policy_no` varchar(50) NOT NULL,
  `ammount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `attendance_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `in_time` time DEFAULT NULL,
  `out_time` time DEFAULT NULL,
  `date` date NOT NULL,
  `month` varchar(40) NOT NULL,
  `year` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`attendance_id`, `emp_id`, `in_time`, `out_time`, `date`, `month`, `year`) VALUES
(1, 1001, '10:00:00', '17:00:00', '2016-11-01', 'December', '2016'),
(2, 1001, '10:00:00', '17:00:00', '2016-11-02', 'December', '2016'),
(3, 1001, '10:00:00', '17:00:00', '2016-11-03', 'December', '2016'),
(4, 1001, '10:00:00', '17:00:00', '2016-11-04', 'December', '2016'),
(5, 1001, '10:00:00', '17:00:00', '2016-11-05', 'December', '2016'),
(6, 1001, '10:00:00', '17:00:00', '2016-11-06', 'December', '2016'),
(7, 1001, '10:00:00', '17:00:00', '2016-11-07', 'December', '2016'),
(8, 1001, '10:00:00', '17:00:00', '2016-11-08', 'December', '2016'),
(9, 1001, '10:00:00', '17:00:00', '2016-11-09', 'December', '2016'),
(10, 1001, '10:00:00', '17:00:00', '2016-11-10', 'December', '2016'),
(11, 1001, '10:00:00', '17:00:00', '2016-11-11', 'December', '2016'),
(12, 1001, '10:00:00', '17:00:00', '2016-11-12', 'December', '2016'),
(13, 1001, '10:00:00', '17:00:00', '2016-11-13', 'December', '2016'),
(14, 1001, '10:00:00', '17:00:00', '2016-11-14', 'December', '2016'),
(15, 1001, '10:00:00', '17:00:00', '2016-11-15', 'December', '2016'),
(16, 1001, '10:00:00', '17:00:00', '2016-11-16', 'December', '2016'),
(17, 1001, '10:00:00', '17:00:00', '2016-11-17', 'December', '2016'),
(18, 1001, '10:00:00', '17:00:00', '2016-11-18', 'December', '2016'),
(19, 1001, '10:00:00', '17:00:00', '2016-11-19', 'December', '2016'),
(20, 1001, '10:00:00', '17:00:00', '2016-11-20', 'December', '2016'),
(21, 1001, '10:00:00', '17:00:00', '2016-11-21', 'December', '2016'),
(22, 1001, '10:00:00', '17:00:00', '2016-11-22', 'December', '2016'),
(23, 1001, '10:00:00', '17:00:00', '2016-11-23', 'December', '2016'),
(24, 1001, '10:00:00', '17:00:00', '2016-11-24', 'December', '2016'),
(25, 1001, '10:00:00', '17:00:00', '2016-11-25', 'December', '2016'),
(26, 1001, '10:00:00', '17:00:00', '2016-11-26', 'December', '2016'),
(27, 1001, '10:00:00', '17:00:00', '2016-11-27', 'December', '2016'),
(28, 1001, '10:00:00', '17:00:00', '2016-11-28', 'December', '2016'),
(29, 1001, '10:00:00', '17:00:00', '2016-11-29', 'December', '2016'),
(30, 1001, '10:00:00', '17:00:00', '2016-11-30', 'December', '2016'),
(31, 1002, '10:00:00', '20:00:00', '2016-12-01', 'December', '2016'),
(32, 1002, '10:00:00', '20:00:00', '2016-12-02', 'December', '2016'),
(33, 1002, '10:00:00', '20:00:00', '2016-12-03', 'December', '2016'),
(34, 1002, '10:00:00', '20:00:00', '2016-12-04', 'December', '2016'),
(35, 1002, '10:00:00', '20:00:00', '2016-12-05', 'December', '2016'),
(36, 1002, '10:00:00', '20:00:00', '2016-12-06', 'December', '2016'),
(37, 1002, '10:00:00', '20:00:00', '2016-12-07', 'December', '2016'),
(38, 1002, '10:00:00', '20:00:00', '2016-12-08', 'December', '2016'),
(39, 1002, '10:00:00', '20:00:00', '2016-12-09', 'December', '2016'),
(40, 1002, '10:00:00', '20:00:00', '2016-12-10', 'December', '2016'),
(41, 1002, '10:00:00', '20:00:00', '2016-12-11', 'December', '2016'),
(42, 1002, '10:00:00', '20:00:00', '2016-12-12', 'December', '2016'),
(43, 1002, '10:00:00', '20:00:00', '2016-12-13', 'December', '2016'),
(44, 1002, '10:00:00', '20:00:00', '2016-12-14', 'December', '2016'),
(45, 1002, '10:00:00', '20:00:00', '2016-12-15', 'December', '2016'),
(46, 1002, '10:00:00', '20:00:00', '2016-12-16', 'December', '2016'),
(47, 1002, '10:00:00', '20:00:00', '2016-12-17', 'December', '2016'),
(48, 1002, '10:00:00', '20:00:00', '2016-12-18', 'December', '2016'),
(49, 1002, '10:00:00', '20:00:00', '2016-12-19', 'December', '2016'),
(50, 1002, '10:00:00', '20:00:00', '2016-12-20', 'December', '2016'),
(51, 1002, '10:00:00', '20:00:00', '2016-12-21', 'December', '2016'),
(52, 1002, '10:00:00', '20:00:00', '2016-12-22', 'December', '2016'),
(53, 1002, '10:00:00', '20:00:00', '2016-12-23', 'December', '2016'),
(54, 1002, '10:00:00', '20:00:00', '2016-12-24', 'December', '2016'),
(55, 1002, '10:00:00', '20:00:00', '2016-12-25', 'December', '2016'),
(56, 1002, '10:00:00', '20:00:00', '2016-12-26', 'December', '2016'),
(57, 1002, '10:00:00', '20:00:00', '2016-12-27', 'December', '2016'),
(58, 1002, '10:00:00', '20:00:00', '2016-12-28', 'December', '2016'),
(59, 1002, '10:00:00', '20:00:00', '2016-12-29', 'December', '2016'),
(60, 1002, '10:00:00', '20:00:00', '2016-12-30', 'December', '2016'),
(61, 1002, '10:00:00', '20:00:00', '2016-12-31', 'December', '2016'),
(62, 1003, '10:00:00', '21:00:00', '2016-12-01', 'December', '2016'),
(63, 1003, '10:00:00', '21:00:00', '2016-12-02', 'December', '2016'),
(64, 1003, '10:00:00', '21:00:00', '2016-12-03', 'December', '2016'),
(65, 1003, '10:00:00', '21:00:00', '2016-12-04', 'December', '2016'),
(66, 1003, '10:00:00', '21:00:00', '2016-12-05', 'December', '2016'),
(67, 1003, '10:00:00', '21:00:00', '2016-12-06', 'December', '2016'),
(68, 1003, '10:00:00', '21:00:00', '2016-12-07', 'December', '2016'),
(69, 1003, '10:00:00', '21:00:00', '2016-12-08', 'December', '2016'),
(70, 1003, '10:00:00', '21:00:00', '2016-12-09', 'December', '2016'),
(71, 1003, '10:00:00', '21:00:00', '2016-12-10', 'December', '2016'),
(72, 1003, '10:00:00', '21:00:00', '2016-12-11', 'December', '2016'),
(73, 1003, '10:00:00', '21:00:00', '2016-12-12', 'December', '2016'),
(74, 1003, '10:00:00', '21:00:00', '2016-12-13', 'December', '2016'),
(75, 1003, '10:00:00', '21:00:00', '2016-12-14', 'December', '2016'),
(76, 1003, '10:00:00', '21:00:00', '2016-12-15', 'December', '2016'),
(77, 1003, '10:00:00', '21:00:00', '2016-12-16', 'December', '2016'),
(78, 1003, '10:00:00', '21:00:00', '2016-12-17', 'December', '2016'),
(79, 1003, '10:00:00', '21:00:00', '2016-12-18', 'December', '2016'),
(80, 1003, '10:00:00', '21:00:00', '2016-12-19', 'December', '2016'),
(81, 1003, '10:00:00', '21:00:00', '2016-12-20', 'December', '2016'),
(82, 1003, '10:00:00', '21:00:00', '2016-12-21', 'December', '2016'),
(83, 1003, '10:00:00', '21:00:00', '2016-12-22', 'December', '2016'),
(84, 1003, '10:00:00', '21:00:00', '2016-12-23', 'December', '2016'),
(85, 1003, '10:00:00', '21:00:00', '2016-12-24', 'December', '2016'),
(86, 1003, '10:00:00', '21:00:00', '2016-12-25', 'December', '2016'),
(87, 1003, '10:00:00', '21:00:00', '2016-12-26', 'December', '2016'),
(88, 1003, '10:00:00', '21:00:00', '2016-12-27', 'December', '2016'),
(89, 1003, '10:00:00', '21:00:00', '2016-12-28', 'December', '2016'),
(90, 1003, '10:00:00', '21:00:00', '2016-12-29', 'December', '2016'),
(91, 1003, '10:00:00', '21:00:00', '2016-12-30', 'December', '2016'),
(92, 1003, '10:00:00', '21:00:00', '2016-12-31', 'December', '2016');

-- --------------------------------------------------------

--
-- Table structure for table `demos`
--

CREATE TABLE `demos` (
  `demo_id` int(11) UNSIGNED NOT NULL,
  `qualification` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `demos`
--

INSERT INTO `demos` (`demo_id`, `qualification`) VALUES
(100, 'sdsd'),
(101, 'sdsd');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `fld_DeptID` int(11) NOT NULL,
  `fld_Department` varchar(50) DEFAULT NULL,
  `fld_Status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`fld_DeptID`, `fld_Department`, `fld_Status`) VALUES
(0, 'NULL', 0),
(1, 'Admin', 1),
(2, 'Academic', 1),
(3, 'Examination', 1),
(4, 'Inspection', 1),
(5, 'Finance', 1),
(6, 'P R & S', 1),
(7, 'Academic-Computer', 1),
(8, 'Academic - Arts', 1),
(9, 'Academic - Commerce', 1),
(10, 'R & A', 1),
(11, 'R & P', 1),
(12, 'Open School', 1),
(13, 'Pension', 1),
(14, 'Certificate', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dependants`
--

CREATE TABLE `dependants` (
  `dependant_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `relation` varchar(60) DEFAULT NULL,
  `first_name` varchar(60) DEFAULT NULL,
  `last_name` varchar(60) DEFAULT NULL,
  `dob` date DEFAULT '1950-01-01',
  `profession` varchar(60) DEFAULT NULL,
  `status` varchar(60) DEFAULT NULL,
  `submission_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dependants`
--

INSERT INTO `dependants` (`dependant_id`, `emp_id`, `relation`, `first_name`, `last_name`, `dob`, `profession`, `status`, `submission_date`) VALUES
(1, 1002, 'brother', 'Kalyan ', 'Kalita', '1987-05-08', 'teacher', '1', '0000-00-00'),
(4, 1002, 'Brother', 'Naba Jyoti', 'Roy', '1982-11-23', 'Eng', '1', '0000-00-00'),
(5, 1001, 'Sister', 'Rashmi ', 'Kalita', '1992-12-03', 'Teacher', '2', '0000-00-00'),
(6, 1004, 'Mother', 'Demo', 'Test', '1937-12-14', 'Teacher', '1', '2016-12-13'),
(8, 1001, 'Brother', 'KK', 'Kalita', '2016-12-08', 'Teacher', '1', '2016-12-27');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `emp_id` int(9) NOT NULL,
  `emp_qualification_id` int(11) DEFAULT NULL,
  `emp_f_name` varchar(60) DEFAULT NULL,
  `emp_m_name` varchar(60) DEFAULT NULL,
  `emp_l_name` varchar(60) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `fld_DeptID` int(11) DEFAULT NULL,
  `emp_dob` date DEFAULT NULL,
  `emp_date_of_joining` date DEFAULT NULL,
  `emp_gender` varchar(7) DEFAULT NULL,
  `emp_type` varchar(40) DEFAULT NULL,
  `emp_blood_group` varchar(30) DEFAULT NULL,
  `emp_contact_no` varchar(15) DEFAULT NULL,
  `emp_alt_contact_no` varchar(15) DEFAULT NULL,
  `bank_account_number` varchar(127) DEFAULT NULL,
  `pension_bank_account_no` varchar(60) DEFAULT NULL,
  `emp_present_house_no` varchar(15) DEFAULT NULL,
  `emp_present_locality` varchar(60) DEFAULT NULL,
  `emp_present_city` varchar(60) DEFAULT NULL,
  `emp_present_district` varchar(60) DEFAULT NULL,
  `emp_permanent_house_no` varchar(20) DEFAULT NULL,
  `emp_permanent_locality` varchar(60) DEFAULT NULL,
  `emp_permanent_city` varchar(60) DEFAULT NULL,
  `emp_permanent_district` varchar(60) DEFAULT NULL,
  `emp_cast` varchar(8) DEFAULT NULL,
  `emp_religion` varchar(20) DEFAULT NULL,
  `emp_date_of_death` date DEFAULT NULL,
  `emp_date_of_retirement` date DEFAULT NULL,
  `submission_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`emp_id`, `emp_qualification_id`, `emp_f_name`, `emp_m_name`, `emp_l_name`, `post_id`, `fld_DeptID`, `emp_dob`, `emp_date_of_joining`, `emp_gender`, `emp_type`, `emp_blood_group`, `emp_contact_no`, `emp_alt_contact_no`, `bank_account_number`, `pension_bank_account_no`, `emp_present_house_no`, `emp_present_locality`, `emp_present_city`, `emp_present_district`, `emp_permanent_house_no`, `emp_permanent_locality`, `emp_permanent_city`, `emp_permanent_district`, `emp_cast`, `emp_religion`, `emp_date_of_death`, `emp_date_of_retirement`, `submission_date`) VALUES
(1001, 1, 'Mumu', 'J', 'Kalita', 1, 12, '1988-05-08', NULL, 'Male', 'Permanent', 'B+ ve', '9707702901', '8486350404', NULL, NULL, '26 C', 'Silpukhuri', 'Guwahati', 'Kamrup(M)', '18 R', 'Rampur', 'Rampur', 'Kamrup(R)', 'Gen', 'Hindu', NULL, NULL, NULL),
(1002, 4, 'Dhruwa', 'M', 'Kalita', 5, 12, '1987-05-08', NULL, 'Male', 'Permanent', 'O+ ve', '9707702901', '8486350404', NULL, NULL, '26 D', 'Chandmari', 'Guwahati', 'Kamrup(M)', '18 R', 'Rampur', 'Rampur', 'Kamrup(R)', 'Gen', 'Hindu', NULL, '2016-12-01', NULL),
(1003, 3, 'MD. MUYIZUR', NULL, 'Rahman', 11, 12, '1960-03-04', NULL, 'Male', 'Permanent', 'O -ve', '0', '1111111111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-12-02', NULL),
(1004, 3, 'DHANESWAR', NULL, 'Das', 7, 12, '1959-01-01', NULL, 'Male', 'Permanent', NULL, '8888888888', '7777777777', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Hindu', NULL, NULL, NULL),
(1005, 2, 'NARENDRA', NULL, 'GOSWAMI', 7, 12, '1960-12-04', NULL, 'Mane', 'Permanent', NULL, '0', '1111111111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Hindu', NULL, NULL, NULL),
(1006, 0, 'SRI NATHU ', 'Ram', 'Boro', 10, 12, '1957-05-01', NULL, 'Male', 'Permanent', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1007, 0, 'DURGA', 'PRASAD ', 'DAS', 7, 12, '1962-08-01', NULL, 'MALE', 'Permanent', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'HINDU', NULL, NULL, NULL),
(1008, 0, 'DIGANTA', NULL, 'SARMA', 7, 12, '1962-03-01', NULL, 'MALE', 'Permanent', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'HINDU', NULL, NULL, NULL),
(1009, 0, 'MRIDUL', 'KR.', 'BARUAH', 11, 12, '1961-09-25', NULL, 'Male', 'Permanent', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1010, 0, 'BHUBAN', 'KR.', 'DAS', 11, 12, '1962-12-31', NULL, 'Male', 'Permanent', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1011, 0, 'JITENDRA', 'NATH', 'TALUKDAR', 15, 12, '1960-09-01', NULL, 'Male', 'Permanent', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1012, 0, 'MAHIDHAR', NULL, 'DEKA', 10, 12, '1957-01-01', NULL, 'Male', 'Permanent', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1013, 0, 'NATHU', 'RAM', 'BORO', 10, 12, '1957-05-01', NULL, 'Male', 'Permanent', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1014, 0, 'ANANDA', 'KR.', 'SARMA', 10, 12, '1959-12-31', NULL, 'Male', 'Permanent', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1015, 0, 'PRAFULLA', NULL, 'BAYAN', 10, 12, '1961-01-01', NULL, 'Male', 'Permanent', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1016, 0, 'ABANI', NULL, 'TALUKDAR', 10, 12, '1962-01-01', NULL, 'Male', 'Permanent', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1017, 0, 'PABIN', 'CH.', 'DAS', 10, 12, '1962-01-01', NULL, 'Male', 'Permanent', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1018, 0, 'KAMALESWAR', NULL, 'SARMA', 10, 12, '1963-02-01', NULL, 'Male', 'Permanent', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1019, 0, 'BHUPENDRA', 'NATH', 'DAS', 11, 12, '1963-07-01', NULL, 'Male', 'Permanent', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1020, 0, 'BABUL', 'CH.', 'DAS', 11, 12, '1963-11-01', NULL, 'Male', 'Permanent', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1021, 0, 'KAMESWAR', NULL, 'KALITA', 7, 12, '1964-09-01', NULL, 'Male', 'Permanent', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1022, 0, 'BIJAN', NULL, 'DAS', 11, 12, '1964-10-24', NULL, 'Male', 'Permanent', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1023, 0, 'AMULYA', 'KR.', 'MAZUMDAR', 10, 12, '1965-01-01', NULL, 'Male', 'Permanent', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1024, 0, 'DINESH', NULL, 'RAJBONGSHI', 18, 12, '1965-03-01', NULL, 'Male', 'Permanent', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1025, 0, 'MADAN', 'CH.', 'KALITA', 18, 12, '1965-05-12', NULL, 'Male', 'Permanent', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1026, 0, 'GOKUL', NULL, 'SARMA', 11, 12, '1966-01-01', NULL, 'Male', 'Permanent', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1027, 0, 'BIRAJ', 'KRISHNA', 'DAS', 11, 12, '1966-02-23', NULL, 'Male', 'Permanent', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1028, 0, 'JYOTISH', NULL, 'HALOI', 11, 12, '1966-08-04', NULL, 'Male', 'Permanent', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1029, 0, 'BIBHUTI', 'KR.', 'DAS', 15, 12, '1966-09-04', NULL, 'Male', 'Permanent', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1030, 0, 'DINESH', 'CH.', 'BEY', 15, 12, '1967-01-06', NULL, 'Male', 'Permanent', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1031, 0, 'ISLAMUDDIN', NULL, 'AHMED', 15, 12, '1967-03-23', NULL, 'Male', 'Permanent', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1032, 0, 'MAJNUR', NULL, 'ALI', 16, 12, '1967-04-01', NULL, 'Male', 'Permanent', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1033, 0, 'KALIN', 'CH.', 'DEKA', 15, 12, '1967-10-01', NULL, 'Male', 'Permanent', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1034, 0, 'KANAK', 'CH.', 'BORAH', 16, 12, '1968-02-29', NULL, 'Male', 'Permanent', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1035, 0, 'SUREN ', 'CH.', 'DAS', 16, 12, '1968-10-18', NULL, 'Male', 'Permanent', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1036, 0, 'BHUPEN', NULL, 'KALITA', 16, 12, '1968-11-30', NULL, 'Male', 'Permanent', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1037, 0, 'PRADIP', 'KR.', 'BAISHYA', 15, 12, '1969-01-01', NULL, 'Male', 'Permanent', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1038, 0, 'NARAYAN', 'CH.', 'DAS', 16, 12, '1969-03-01', NULL, 'Male', 'Permanent', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1039, 0, 'SARU', 'BALA', 'RAHANG', 15, 12, '1970-01-01', NULL, 'Female', 'Permanent', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1040, 0, 'BHUPEN', NULL, 'DOLEY', 15, 12, '1970-03-05', NULL, 'Male', 'Permanent', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1041, 0, 'PRADIP', 'KR.', 'DAS', 15, 12, '1970-07-29', NULL, 'Male', 'Permanent', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1042, 0, 'UTPAL', NULL, 'RABHA', 18, 12, '1971-01-01', NULL, 'Male', 'Permanent', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1043, 0, 'DIPAK', NULL, 'BHATTA', 16, 12, '1971-05-01', NULL, 'Male', 'Permanent', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1044, 0, 'MRIDUL', 'KR.', 'SARMA', 15, 12, '1974-10-19', NULL, 'Male', 'Permanent', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1045, 0, 'AJIT', NULL, 'DEOGHARIA', 15, 12, '1977-01-01', NULL, 'Male', 'Permanent', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1046, 0, 'BHASKARJYOTI', NULL, 'KALITA', 16, 12, '1977-03-01', NULL, 'Male', 'Permanent', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1047, 0, 'RUBUL', 'KR.', 'BRAHMA', 15, 12, '1983-03-01', NULL, 'Male', 'Permanent', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_loan`
--

CREATE TABLE `employee_loan` (
  `emp_loan_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `loan_type_id` int(11) NOT NULL,
  `loan_ammount` int(11) NOT NULL,
  `interest_amount` float(12,2) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_loan`
--

INSERT INTO `employee_loan` (`emp_loan_id`, `emp_id`, `loan_type_id`, `loan_ammount`, `interest_amount`, `status`) VALUES
(1, 1003, 1, 200000, 0.00, 3),
(3, 1004, 4, 100000, NULL, 4),
(4, 1003, 5, 10000, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee_pension_details`
--

CREATE TABLE `employee_pension_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `emp_id` int(10) UNSIGNED NOT NULL,
  `bank_details` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `current_address` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee_pension_details`
--

INSERT INTO `employee_pension_details` (`id`, `emp_id`, `bank_details`, `current_address`, `created_at`, `updated_at`) VALUES
(1, 1002, 'SBI \r\nSilpukhuri\r\n1245789632', 'HN- 26 D, Chandmari,City - Guwahati, District -Kamrup(M)', '2016-12-29 06:44:55', '2016-12-29 06:44:55'),
(2, 1003, 'SBI \r\nSilpukhuri\r\n2145789632', 'HN-28 , ,City -Guwahati , District -kamrup', '2016-12-29 06:45:39', '2016-12-29 06:45:39');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(9) NOT NULL,
  `title` varchar(40) NOT NULL,
  `description` varchar(40) NOT NULL,
  `name` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `title`, `description`, `name`) VALUES
(1, 'demo', 'test', '2016-11-15'),
(2, 'demo1', 'test1', '2016-11-15'),
(3, 'demo2', 'test2', '2016-11-15'),
(4, 'demo3', 'test3', '2016-11-15'),
(5, 'demo4', 'test4', '2016-11-15');

-- --------------------------------------------------------

--
-- Table structure for table `kss`
--

CREATE TABLE `kss` (
  `kss_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `loan_amount` int(11) DEFAULT NULL,
  `interest` int(11) DEFAULT NULL,
  `subscrptn` int(11) DEFAULT NULL,
  `recovery` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `month` varchar(40) DEFAULT NULL,
  `year` varchar(40) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kss`
--

INSERT INTO `kss` (`kss_id`, `emp_id`, `loan_amount`, `interest`, `subscrptn`, `recovery`, `total`, `month`, `year`, `status`) VALUES
(1, 1001, 0, 0, 500, NULL, 500, 'December', '2016', 1),
(2, 1002, 0, 0, 500, NULL, 500, 'December', '2016', 1),
(3, 1003, 27500, 550, 500, 2000, 3050, 'December', '2016', 1),
(4, 1004, 75000, 1500, 500, 3000, 5000, 'December', '2016', 1),
(5, 1005, 0, 0, 500, NULL, 500, 'December', '2016', 1),
(6, 1006, 0, 0, 500, NULL, 500, 'December', '2016', 1),
(7, 1007, 24000, 480, 500, 1000, 1980, 'December', '2016', 1),
(8, 1008, 0, 0, 500, NULL, 500, 'December', '2016', 1),
(9, 1009, 50000, 1000, 500, 2000, 3500, 'December', '2016', 1),
(10, 1010, 59000, 1180, 500, 2000, 3680, 'December', '2016', 1),
(11, 1011, 0, 0, 500, NULL, 500, 'December', '2016', 1),
(12, 1012, 85000, 1700, 500, 2000, 4200, 'December', '2016', 1),
(13, 1013, 0, 0, 500, NULL, 500, 'December', '2016', 1),
(14, 1014, 15000, 300, 500, 1000, 1800, 'December', '2016', 1),
(15, 1015, 7000, 140, 500, 1000, 1640, 'December', '2016', 1),
(16, 1016, 9000, 180, 500, 1000, 1680, 'December', '2016', 1),
(17, 1017, 9000, 180, 500, 1000, 1680, 'December', '2016', 1),
(18, 1018, 21000, 420, 500, 1000, 1920, 'December', '2016', 1),
(19, 1019, 86500, 1730, 500, 3000, 5230, 'December', '2016', 1),
(20, 1020, 36000, 720, 500, 2000, 3220, 'December', '2016', 1),
(21, 1021, 18000, 360, 500, 5000, 5860, 'December', '2016', 1),
(22, 1022, 17000, 340, 500, 1000, 1840, 'December', '2016', 1),
(23, 1023, 75000, 1500, 500, 3000, 5000, 'December', '2016', 1),
(24, 1024, 56000, 1120, 500, 2000, 3620, 'December', '2016', 1),
(25, 1025, 6000, 120, 500, 1000, 1620, 'December', '2016', 1),
(26, 1026, 26000, 520, 500, 1000, 2020, 'December', '2016', 1),
(27, 1027, 16500, 330, 500, 1000, 1830, 'December', '2016', 1),
(28, 1028, 0, 0, 500, NULL, 500, 'December', '2016', 1),
(29, 1029, 0, 0, 500, NULL, 500, 'December', '2016', 1),
(30, 1030, 40000, 800, 500, 1000, 2300, 'December', '2016', 1),
(31, 1031, 52000, 1040, 500, 2000, 3540, 'December', '2016', 1);

-- --------------------------------------------------------

--
-- Table structure for table `leavetypes`
--

CREATE TABLE `leavetypes` (
  `leave_type_id` int(11) NOT NULL,
  `leave_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leavetypes`
--

INSERT INTO `leavetypes` (`leave_type_id`, `leave_type`) VALUES
(1, 'CL'),
(2, 'EL'),
(3, 'Medical Leave');

-- --------------------------------------------------------

--
-- Table structure for table `leave_balance`
--

CREATE TABLE `leave_balance` (
  `leave_balance_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `leave_type_id` int(11) NOT NULL,
  `no_of_days` int(11) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_balance`
--

INSERT INTO `leave_balance` (`leave_balance_id`, `emp_id`, `leave_type_id`, `no_of_days`, `balance`) VALUES
(1, 4, 1, 20, 17),
(2, 4, 2, 20, 40);

-- --------------------------------------------------------

--
-- Table structure for table `leave_master`
--

CREATE TABLE `leave_master` (
  `leave_master_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `leave_type_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_master`
--

INSERT INTO `leave_master` (`leave_master_id`, `emp_id`, `leave_type_id`, `status`) VALUES
(1, 4, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `leave_transaction`
--

CREATE TABLE `leave_transaction` (
  `leave_transaction_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `fld_DeptID` int(11) NOT NULL,
  `leave_type_id` int(11) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `no_of_day` int(11) NOT NULL,
  `reason` varchar(250) NOT NULL,
  `applied_on` date NOT NULL,
  `applied_by` varchar(100) NOT NULL,
  `applied_for` varchar(150) NOT NULL,
  `status` int(11) NOT NULL,
  `sh_forwarded_on` date DEFAULT NULL,
  `sh_forwarded_by` int(11) DEFAULT NULL,
  `sh_remarks` varchar(200) DEFAULT NULL,
  `br_forwarded_on` date DEFAULT NULL,
  `br_forwarded_by` int(11) DEFAULT NULL,
  `br_remarks` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_transaction`
--

INSERT INTO `leave_transaction` (`leave_transaction_id`, `emp_id`, `fld_DeptID`, `leave_type_id`, `from_date`, `to_date`, `no_of_day`, `reason`, `applied_on`, `applied_by`, `applied_for`, `status`, `sh_forwarded_on`, `sh_forwarded_by`, `sh_remarks`, `br_forwarded_on`, `br_forwarded_by`, `br_remarks`) VALUES
(1, 4, 12, 1, '2016-12-08', '2016-12-10', 3, 'Test', '2016-12-17', 'demo', 'demo', 2, '2016-12-17', 2, 'No', '2016-12-17', 14, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `loan_trasection`
--

CREATE TABLE `loan_trasection` (
  `loan_transection_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `loan_type_id` int(11) NOT NULL,
  `loan_ammount` float(10,2) DEFAULT NULL,
  `no_of_instalment` int(11) DEFAULT NULL,
  `emi` float(10,2) DEFAULT NULL,
  `interest_amount` float(10,2) DEFAULT NULL,
  `pricipal_ammount` float(10,2) DEFAULT NULL,
  `no_of_instalment_interest` int(11) DEFAULT NULL,
  `interest_emi` float(10,2) DEFAULT NULL,
  `applied_on` date DEFAULT NULL,
  `applied_for` varchar(200) DEFAULT NULL,
  `fld_DeptID` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `forwarded_by` varchar(40) DEFAULT NULL,
  `forwarded_on` date DEFAULT NULL,
  `remarks` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_trasection`
--

INSERT INTO `loan_trasection` (`loan_transection_id`, `emp_id`, `loan_type_id`, `loan_ammount`, `no_of_instalment`, `emi`, `interest_amount`, `pricipal_ammount`, `no_of_instalment_interest`, `interest_emi`, `applied_on`, `applied_for`, `fld_DeptID`, `status`, `forwarded_by`, `forwarded_on`, `remarks`) VALUES
(1, 1003, 1, 200000.00, 180, 1111.11, 123578.18, 323578.19, 4, 30894.54, '2016-12-01', 'GPF', 12, 3, 'Test User1', '2016-12-01', 'Demo'),
(3, 1003, 4, 100000.00, 24, 4166.67, 0.00, 100000.00, 0, 0.00, '2016-12-05', 'GPF', 12, 4, 'Test User1', '2016-12-02', 'No'),
(4, 1001, 4, 50000.00, 24, 2083.34, 0.00, 50000.00, 0, 0.00, '2016-12-15', NULL, 12, 4, NULL, '2016-12-16', NULL),
(5, 1003, 5, 10000.00, 4, 2500.00, 0.00, 10000.00, 0, 0.00, '2016-12-30', 'Festive Advance', 12, 2, 'Test User1', '2016-12-30', '');

-- --------------------------------------------------------

--
-- Table structure for table `loan_type`
--

CREATE TABLE `loan_type` (
  `loan_type_id` int(11) NOT NULL,
  `loan_type` varchar(50) NOT NULL,
  `interest` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_type`
--

INSERT INTO `loan_type` (`loan_type_id`, `loan_type`, `interest`) VALUES
(1, 'Housing Loan', 7),
(2, 'Car Loan', 10),
(3, 'Bike Loan', 0),
(4, 'GPF Loan', 1),
(5, 'Festival Advance', 1);

-- --------------------------------------------------------

--
-- Table structure for table `log_books`
--

CREATE TABLE `log_books` (
  `log_book_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `action` varchar(50) NOT NULL,
  `role` int(11) NOT NULL,
  `table_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_books`
--

INSERT INTO `log_books` (`log_book_id`, `id`, `date`, `action`, `role`, `table_name`) VALUES
(1, 1001, '2016-12-27 13:26:11', 'Dependant Insert', 1, 'dependants'),
(2, 1001, '2016-12-27 13:28:25', 'Dependant Update', 1, 'dependants'),
(3, 1001, '2016-12-27 13:29:48', 'Dependant Update', 1, 'dependants'),
(4, 1001, '2016-12-27 13:31:49', 'Dependant Delete', 1, 'dependants'),
(5, 1003, '2016-12-30 17:05:45', 'Employee Loan Apply', 5, 'employee_loan, loan_trasection'),
(6, 1002, '2016-12-30 17:17:10', 'Employee Loan Forward', 2, 'employee_loan, loan_trasection'),
(7, 1002, '2016-12-30 17:32:19', 'Employee Loan Forward', 2, 'employee_loan, loan_trasection'),
(8, 1001, '2016-12-31 15:52:10', 'User Insert', 1, 'users'),
(9, 1001, '2017-01-03 17:16:02', 'Scale Revision', 1, 'post'),
(10, 1001, '2017-01-05 12:32:01', 'User Insert', 1, 'users'),
(11, 1001, '2017-01-05 12:32:56', 'User Insert', 1, 'users'),
(12, 1001, '2017-01-09 17:46:40', 'Post Insert', 1, 'posts'),
(13, 1001, '2017-01-09 17:46:49', 'Post Delete', 1, 'posts'),
(14, 1001, '2017-01-11 11:14:09', 'Employee Insert', 1, 'employees'),
(15, 1001, '2017-01-11 17:50:40', 'Post redesignation', 1, 'employees'),
(16, 1001, '2017-01-11 17:52:38', 'Employee Insert', 1, 'employees'),
(17, 1001, '2017-01-11 17:52:44', 'Employee Delete', 1, 'employees'),
(18, 1001, '2017-01-11 18:28:03', 'Employee Insert', 1, 'employees'),
(19, 1001, '2017-01-12 15:47:50', 'Scale revision', 1, 'employees'),
(20, 1001, '2017-01-12 15:49:22', 'Scale revision', 1, 'employees'),
(21, 1001, '2017-01-12 16:30:13', 'Scale revision', 1, 'employees'),
(22, 1001, '2017-01-18 11:53:13', 'Grade Pay Revision', 1, 'posts'),
(23, 1001, '2017-01-18 11:54:52', 'Grade Pay Revision', 1, 'posts'),
(24, 1001, '2017-01-18 11:55:12', 'Grade Pay Revision', 1, 'posts'),
(25, 1001, '2017-01-18 11:57:33', 'Scale revision', 1, 'posts');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `name`, `email`, `password`, `role`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin', 'Admin'),
(2, 'Establishment', 'establishment@gmail.com', 'establishment', 'Establishment'),
(3, 'Accounts', 'accounts@gmail.com', 'accounts', 'Accounts');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_11_10_084718_create_test_table', 2),
(4, '2016_12_16_122132_create_pensions_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `ot_genneration`
--

CREATE TABLE `ot_genneration` (
  `ot_genneration_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `working_days` int(11) NOT NULL,
  `ot_hours` int(11) NOT NULL,
  `amount` float(15,2) NOT NULL,
  `month` varchar(60) DEFAULT NULL,
  `year` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `parameters`
--

CREATE TABLE `parameters` (
  `parameter_id` int(11) NOT NULL,
  `parameter_type` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parameters`
--

INSERT INTO `parameters` (`parameter_id`, `parameter_type`) VALUES
(1, 'Dearness Allowance'),
(2, 'Incerment Persentage'),
(3, 'Car Loan'),
(4, 'Bike Loan'),
(5, 'GPF'),
(6, 'Grade Pay'),
(7, 'HRA'),
(8, 'Medical'),
(9, 'NPS'),
(10, 'Welfare'),
(11, 'Personal Tax');

-- --------------------------------------------------------

--
-- Table structure for table `parameter_values`
--

CREATE TABLE `parameter_values` (
  `id` int(10) NOT NULL,
  `parameter_id` int(10) UNSIGNED NOT NULL,
  `value` decimal(15,2) NOT NULL,
  `effective_from` date DEFAULT NULL,
  `effective_to` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `parameter_values`
--

INSERT INTO `parameter_values` (`id`, `parameter_id`, `value`, `effective_from`, `effective_to`, `status`) VALUES
(1, 1, '131.00', '2016-12-13', '', 0),
(2, 1, '131.00', '2016-12-27', '', 1),
(3, 1, '131.00', '2016-12-28', '', 0),
(4, 1, '139.00', '2016-08-01', '', 0),
(5, 2, '3.00', '2017-01-03', '', 1),
(6, 7, '15.00', '2017-01-01', '', 1),
(7, 8, '750.00', '2017-01-01', '', 1),
(8, 9, '10.00', '2017-01-01', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('dhruwajyoti@gmail.com', '65eca19c308650bd9dc8c324b497ce968b62e3ad81b0b9aa017a0990d03f2ae6', '2016-11-12 00:02:58');

-- --------------------------------------------------------

--
-- Table structure for table `pensions`
--

CREATE TABLE `pensions` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(10) UNSIGNED NOT NULL,
  `pension_order_number` varchar(127) COLLATE utf8_unicode_ci NOT NULL,
  `pension_order_date` date NOT NULL,
  `pension_type` enum('FP','SP') COLLATE utf8_unicode_ci NOT NULL,
  `pension_status` enum('active','closed') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `rtgs_generated` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  `month` int(10) UNSIGNED NOT NULL,
  `year` int(10) UNSIGNED NOT NULL,
  `dr` decimal(10,2) NOT NULL,
  `medical` decimal(10,2) NOT NULL,
  `pension` decimal(10,2) NOT NULL,
  `basic` decimal(10,2) NOT NULL,
  `total_pension` decimal(10,2) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pensions`
--

INSERT INTO `pensions` (`id`, `employee_id`, `pension_order_number`, `pension_order_date`, `pension_type`, `pension_status`, `rtgs_generated`, `month`, `year`, `dr`, `medical`, `pension`, `basic`, `total_pension`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '111', '2016-12-29', 'SP', 'active', 'yes', 12, 2016, '107.00', '750.00', '2121.00', '1222.00', '5140.00', 1, '2016-12-22 06:01:43', '2016-12-26 06:12:27'),
(2, 2, '111', '2016-12-29', 'SP', 'active', 'yes', 12, 2016, '107.00', '750.00', '2112.00', '3333.00', '5122.00', 1, '2016-12-22 06:01:44', '2016-12-26 06:12:27'),
(3, 4, '111', '2016-12-29', 'SP', 'active', 'yes', 12, 2016, '107.00', '750.00', '2222.00', '4444.00', '5350.00', 1, '2016-12-22 06:01:44', '2016-12-26 06:12:27'),
(4, 1, '2111', '2016-12-27', 'SP', 'active', 'yes', 12, 2016, '107.00', '750.00', '222.00', '1222.00', '1210.00', 1, '2016-12-26 00:38:59', '2016-12-26 06:12:27'),
(5, 2, '333', '2016-12-27', 'SP', 'active', 'yes', 12, 2016, '107.00', '750.00', '1221.00', '2121.00', '3277.00', 1, '2016-12-26 00:39:00', '2016-12-26 06:12:27'),
(6, 4, '2222', '2016-12-22', 'SP', 'active', 'yes', 12, 2016, '107.00', '750.00', '1212.00', '2121.00', '3259.00', 1, '2016-12-26 00:39:00', '2016-12-26 06:12:28'),
(7, 1, '2111', '2016-12-27', 'SP', 'active', 'yes', 12, 2016, '107.00', '750.00', '222.00', '1222.00', '1210.00', 1, '2016-12-26 01:06:36', '2016-12-26 06:12:28'),
(8, 2, '333', '2016-12-27', 'SP', 'active', 'yes', 12, 2016, '107.00', '750.00', '1221.00', '2121.00', '3277.00', 1, '2016-12-26 01:06:36', '2016-12-26 06:12:28'),
(9, 4, '2222', '2016-12-22', 'SP', 'active', 'yes', 12, 2016, '107.00', '750.00', '1212.00', '2121.00', '3259.00', 1, '2016-12-26 01:06:37', '2016-12-26 06:12:28'),
(10, 1002, '4785', '2016-12-27', 'SP', 'active', 'yes', 12, 2016, '107.00', '750.00', '478596.00', '2444.00', '481961.00', 1, '2016-12-29 06:46:16', '2016-12-29 06:46:35'),
(11, 1003, '7458', '2016-12-28', 'SP', 'active', 'yes', 12, 2016, '107.00', '750.00', '254178.00', '3444.00', '258613.00', 1, '2016-12-29 06:46:16', '2016-12-29 06:46:35');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `fld_PostID` int(11) NOT NULL,
  `fld_QualificationID` int(11) DEFAULT '1',
  `fld_PostName` varchar(50) DEFAULT NULL,
  `fld_TotalPost` int(11) DEFAULT NULL,
  `fld_GradePay` int(11) DEFAULT NULL,
  `fld_OriginalClause` varchar(255) DEFAULT NULL,
  `fld_NewClause` varchar(255) DEFAULT NULL,
  `fld_SanctionNo` varchar(100) DEFAULT NULL,
  `fld_SanctionDate` varchar(60) DEFAULT NULL,
  `fld_PayScale_lower_limit` int(11) DEFAULT NULL,
  `fld_PayScale_uper_limit` int(11) DEFAULT NULL,
  `fld_PayScale` varchar(50) DEFAULT NULL,
  `fld_IncramentPercent` varchar(40) DEFAULT NULL,
  `fld_DateOfIncreament` varchar(60) DEFAULT NULL,
  `fld_Status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`fld_PostID`, `fld_QualificationID`, `fld_PostName`, `fld_TotalPost`, `fld_GradePay`, `fld_OriginalClause`, `fld_NewClause`, `fld_SanctionNo`, `fld_SanctionDate`, `fld_PayScale_lower_limit`, `fld_PayScale_uper_limit`, `fld_PayScale`, `fld_IncramentPercent`, `fld_DateOfIncreament`, `fld_Status`) VALUES
(1, NULL, 'Chairman', 1, 8100, NULL, NULL, NULL, NULL, 12000, 40000, '12000 - 40000', NULL, NULL, 1),
(2, NULL, 'Secretary', NULL, 6400, NULL, NULL, NULL, NULL, 12000, 40000, '12000 - 40000', NULL, NULL, 1),
(3, NULL, 'Controller of Examination', 1, 6400, NULL, NULL, NULL, NULL, 12000, 40000, '12000 - 40000', NULL, NULL, 1),
(4, NULL, 'Dy Secretary', NULL, 6300, NULL, NULL, NULL, NULL, 12000, 40000, '12000 - 40000', NULL, NULL, 1),
(5, NULL, 'Academic Officer', NULL, 6100, NULL, NULL, NULL, NULL, 12000, 40000, '12000 - 40000', NULL, NULL, 1),
(6, NULL, 'Programmer', NULL, 6100, NULL, NULL, NULL, NULL, 12000, 40000, '12000 - 40000', NULL, NULL, 1),
(7, NULL, 'Asstt. Secretary', NULL, 5900, NULL, NULL, NULL, NULL, 12000, 40000, '12000 - 40000', NULL, NULL, 1),
(8, NULL, 'Estate Officer', NULL, 5900, NULL, NULL, NULL, NULL, 12000, 40000, '12000 - 40000', NULL, NULL, 1),
(9, NULL, 'Audit Officer', NULL, 4600, NULL, NULL, NULL, NULL, 8000, 35000, '8000 - 35000', NULL, NULL, 1),
(10, NULL, 'Superintendent', NULL, 4600, NULL, NULL, NULL, NULL, 8000, 35000, '8000 - 35000', NULL, NULL, 1),
(11, NULL, 'Asstt. Superintendent', NULL, 4300, NULL, NULL, NULL, NULL, 8000, 35000, '8000 - 35000', NULL, NULL, 1),
(12, NULL, 'PA to Chairman', NULL, 2900, NULL, NULL, NULL, NULL, 5200, 20200, '5200-20200', NULL, NULL, 1),
(13, NULL, 'PA to Secretary', NULL, 2900, NULL, NULL, NULL, NULL, 5200, 20200, '5200-20200', NULL, NULL, 1),
(14, NULL, 'Confidential Asstt.', NULL, 2900, NULL, NULL, NULL, NULL, 5200, 20200, '5200-20200', NULL, NULL, 1),
(15, NULL, 'Senior Assistant', NULL, 3100, NULL, NULL, NULL, NULL, 5200, 20200, '5200-20200', NULL, NULL, 1),
(16, NULL, 'Junior Assistant', NULL, 2400, NULL, NULL, NULL, NULL, 5200, 20200, '5200-20200', NULL, NULL, 1),
(17, NULL, 'Electrician', NULL, 2200, NULL, NULL, NULL, NULL, 5200, 20200, '5200-20200', NULL, NULL, 1),
(18, NULL, 'Typist', NULL, 2200, NULL, NULL, NULL, NULL, 5200, 20200, '5200-20200', NULL, NULL, 1),
(19, NULL, 'Driver', NULL, 2100, NULL, NULL, NULL, NULL, 5200, 20200, '5200-20200', NULL, NULL, 1),
(20, NULL, 'Duftry', NULL, 1800, NULL, NULL, NULL, NULL, 4560, 15000, '4560-15000', NULL, NULL, 1),
(21, NULL, 'Peon/Grade IV', NULL, 3000, NULL, NULL, NULL, NULL, 6000, 20000, '4560-15000', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `promotion_id` int(11) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `current_post_id` int(11) DEFAULT NULL,
  `new_post_id` int(11) DEFAULT NULL,
  `scale` varchar(60) DEFAULT NULL,
  `grade_pay` int(11) DEFAULT NULL,
  `submission_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`promotion_id`, `emp_id`, `current_post_id`, `new_post_id`, `scale`, `grade_pay`, `submission_date`) VALUES
(1, 1047, 15, 14, '5200-20200', 2900, '2017-01-02');

-- --------------------------------------------------------

--
-- Table structure for table `qualifications`
--

CREATE TABLE `qualifications` (
  `qualification_id` int(9) NOT NULL,
  `qualification` varchar(60) NOT NULL,
  `status` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qualifications`
--

INSERT INTO `qualifications` (`qualification_id`, `qualification`, `status`) VALUES
(1, 'BCA', 'BCA'),
(2, 'Bsc', 'Bsc'),
(3, 'Mca', 'Mca'),
(4, 'Ma', 'Ma'),
(10, 'NULL', 'NULL');

-- --------------------------------------------------------

--
-- Table structure for table `salary_claims`
--

CREATE TABLE `salary_claims` (
  `salary_claim_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `basic_pay` int(11) DEFAULT NULL,
  `dearness_allowance` float(10,2) DEFAULT NULL,
  `hra` float(10,2) DEFAULT NULL,
  `medical_allowance` float(10,2) DEFAULT NULL,
  `conveyance_allowance` float(10,2) DEFAULT NULL,
  `city_allowance` float(10,2) DEFAULT NULL,
  `others` float(10,2) DEFAULT NULL,
  `gross_salary` float(10,2) DEFAULT NULL,
  `month` varchar(40) DEFAULT NULL,
  `year` varchar(20) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary_claims`
--

INSERT INTO `salary_claims` (`salary_claim_id`, `emp_id`, `basic_pay`, `dearness_allowance`, `hra`, `medical_allowance`, `conveyance_allowance`, `city_allowance`, `others`, `gross_salary`, `month`, `year`, `status`) VALUES
(1, 1003, 21818, 24654.00, 3272.70, 750.00, 1200.00, 0.00, 0.00, 51694.70, 'December', '2016', 1),
(2, 1004, 24210, 31715.00, 3631.50, 750.00, 1200.00, 0.00, 0.00, 61506.50, 'December', '2016', 1),
(3, 1005, 22920, 30025.00, 3438.00, 750.00, 1200.00, 0.00, 0.00, 58333.00, 'December', '2016', 1),
(4, 1006, 20480, 26829.00, 3072.00, 750.00, 1200.00, 0.00, 0.00, 52331.00, 'December', '2016', 1),
(5, 1008, 20120, 26357.00, 3018.00, 750.00, 1200.00, 0.00, 0.00, 51445.00, 'December', '2016', 1),
(6, 1009, 16140, 21143.00, 2421.00, 750.00, 1200.00, 0.00, 0.00, 41654.00, 'December', '2016', 1),
(7, 1010, 17950, 23515.00, 2692.50, 750.00, 1200.00, 0.00, 0.00, 46107.50, 'December', '2016', 1),
(8, 1011, 14420, 18890.00, 2163.00, 750.00, 1200.00, 0.00, 0.00, 37423.00, 'December', '2016', 1),
(9, 1012, 19760, 25886.00, 2964.00, 750.00, 1200.00, 0.00, 0.00, 50560.00, 'December', '2016', 1),
(10, 1013, 20480, 26829.00, 3072.00, 750.00, 1200.00, 0.00, 0.00, 52331.00, 'December', '2016', 1),
(11, 1014, 20430, 26763.00, 3064.50, 750.00, 1200.00, 0.00, 0.00, 52207.50, 'December', '2016', 1),
(12, 1015, 20480, 26829.00, 3072.00, 750.00, 1200.00, 0.00, 0.00, 52331.00, 'December', '2016', 1),
(13, 1016, 24670, 32318.00, 3700.50, 750.00, 1200.00, 0.00, 0.00, 62638.50, 'December', '2016', 1),
(14, 1017, 19140, 25073.00, 2871.00, 750.00, 1200.00, 0.00, 0.00, 49034.00, 'December', '2016', 1),
(15, 1018, 20430, 26763.00, 3064.50, 750.00, 1200.00, 0.00, 0.00, 52207.50, 'December', '2016', 1),
(16, 1019, 16140, 21143.00, 2421.00, 750.00, 1200.00, 0.00, 0.00, 41654.00, 'December', '2016', 1),
(17, 1020, 17950, 23515.00, 2692.50, 750.00, 1200.00, 0.00, 0.00, 46107.50, 'December', '2016', 1),
(18, 1021, 23320, 30549.00, 3498.00, 750.00, 1200.00, 0.00, 0.00, 59317.00, 'December', '2016', 1),
(19, 1022, 18500, 24235.00, 2775.00, 750.00, 1200.00, 0.00, 0.00, 47460.00, 'December', '2016', 1),
(20, 1023, 20480, 26829.00, 3072.00, 750.00, 1200.00, 0.00, 0.00, 52331.00, 'December', '2016', 1),
(21, 1024, 12320, 16139.00, 1848.00, 750.00, 1200.00, 0.00, 0.00, 32257.00, 'December', '2016', 1),
(22, 1025, 11040, 14462.00, 1656.00, 750.00, 1200.00, 0.00, 0.00, 29108.00, 'December', '2016', 1),
(23, 1026, 17100, 22401.00, 2565.00, 750.00, 1200.00, 0.00, 0.00, 44016.00, 'December', '2016', 1),
(24, 1027, 17660, 23135.00, 2649.00, 750.00, 1200.00, 0.00, 0.00, 45394.00, 'December', '2016', 1),
(25, 1028, 16140, 21143.00, 2421.00, 750.00, 1200.00, 0.00, 0.00, 41654.00, 'December', '2016', 1),
(26, 1029, 14440, 19783.00, 2166.00, 750.00, 1200.00, 0.00, 0.00, 38339.00, 'December', '2016', 1),
(27, 1030, 11490, 15741.00, 1723.50, 750.00, 1200.00, 0.00, 0.00, 30904.50, 'December', '2016', 1),
(28, 1031, 10480, 14358.00, 1572.00, 750.00, 1200.00, 0.00, 0.00, 28360.00, 'December', '2016', 1),
(29, 1032, 12610, 17276.00, 1891.50, 750.00, 1200.00, 0.00, 0.00, 33727.50, 'December', '2016', 1),
(30, 1033, 12470, 17084.00, 1870.50, 750.00, 1200.00, 0.00, 0.00, 33374.50, 'December', '2016', 1),
(31, 1001, 12470, 17084.00, 1870.50, 750.00, 1200.00, 0.00, 0.00, 33374.50, 'December', '2016', 1),
(32, 1002, 14100, 19317.00, 2115.00, 750.00, 1200.00, 0.00, 0.00, 37482.00, 'December', '2016', 1);

-- --------------------------------------------------------

--
-- Table structure for table `salary_deductions`
--

CREATE TABLE `salary_deductions` (
  `salary_deduction_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `gpf_deduction` float(10,2) DEFAULT NULL,
  `nps_deduction` float(10,2) DEFAULT NULL,
  `festival_deduction` float(10,2) DEFAULT NULL,
  `house_building_deduction` float(10,2) DEFAULT NULL,
  `car_loan_deduction` float(10,2) DEFAULT NULL,
  `motor_cycle_deduction` float(10,2) DEFAULT NULL,
  `group_deduction` float(10,2) DEFAULT NULL,
  `salary_saving_deduction` float(10,2) DEFAULT NULL,
  `professional_tax_deduction` float(10,2) DEFAULT NULL,
  `income_tax_deduction` float(10,2) DEFAULT NULL,
  `welfare_deduction` float(10,2) DEFAULT NULL,
  `other_deduction` float(10,2) DEFAULT NULL,
  `union_fee` int(11) DEFAULT NULL,
  `kss` int(11) DEFAULT NULL,
  `glsi` int(11) DEFAULT NULL,
  `total_deduction` float(10,2) DEFAULT NULL,
  `month` varchar(25) DEFAULT NULL,
  `year` varchar(20) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary_deductions`
--

INSERT INTO `salary_deductions` (`salary_deduction_id`, `emp_id`, `gpf_deduction`, `nps_deduction`, `festival_deduction`, `house_building_deduction`, `car_loan_deduction`, `motor_cycle_deduction`, `group_deduction`, `salary_saving_deduction`, `professional_tax_deduction`, `income_tax_deduction`, `welfare_deduction`, `other_deduction`, `union_fee`, `kss`, `glsi`, `total_deduction`, `month`, `year`, `status`) VALUES
(1, 1003, 6348.47, 0.00, 2500.00, 1111.11, 0.00, 0.00, 0.00, 208.00, 0.00, 0.00, 300.00, 0.00, 0, 0, 0, 10467.58, 'December', '2016', 1),
(2, 1004, 3532.11, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 208.00, 0.00, 0.00, 300.00, 0.00, 0, 0, 0, 4040.11, 'December', '2016', 1),
(3, 1005, 3403.11, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 208.00, 0.00, 0.00, 300.00, 0.00, 0, 0, 0, 3911.11, 'December', '2016', 1),
(4, 1006, 3159.11, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 208.00, 0.00, 0.00, 300.00, 0.00, 0, 0, 0, 3667.11, 'December', '2016', 1),
(5, 1008, 3123.11, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 208.00, 0.00, 0.00, 300.00, 0.00, 0, 0, 0, 3631.11, 'December', '2016', 1),
(6, 1009, 2725.11, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 208.00, 0.00, 0.00, 300.00, 0.00, 0, 0, 0, 3233.11, 'December', '2016', 1),
(7, 1010, 2906.11, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 208.00, 0.00, 0.00, 300.00, 0.00, 0, 0, 0, 3414.11, 'December', '2016', 1),
(8, 1011, 2553.11, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 208.00, 0.00, 0.00, 300.00, 0.00, 0, 0, 0, 3061.11, 'December', '2016', 1),
(9, 1012, 3087.11, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 208.00, 0.00, 0.00, 300.00, 0.00, 0, 0, 0, 3595.11, 'December', '2016', 1),
(10, 1013, 3159.11, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 208.00, 0.00, 0.00, 300.00, 0.00, 0, 0, 0, 3667.11, 'December', '2016', 1),
(11, 1014, 3154.11, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 208.00, 0.00, 0.00, 300.00, 0.00, 0, 0, 0, 3662.11, 'December', '2016', 1),
(12, 1015, 3159.11, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 208.00, 0.00, 0.00, 300.00, 0.00, 0, 0, 0, 3667.11, 'December', '2016', 1),
(13, 1016, 3578.11, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 208.00, 0.00, 0.00, 300.00, 0.00, 0, 0, 0, 4086.11, 'December', '2016', 1),
(14, 1017, 3025.11, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 208.00, 0.00, 0.00, 300.00, 0.00, 0, 0, 0, 3533.11, 'December', '2016', 1),
(15, 1018, 3154.11, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 208.00, 0.00, 0.00, 300.00, 0.00, 0, 0, 0, 3662.11, 'December', '2016', 1),
(16, 1019, 2725.11, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 208.00, 0.00, 0.00, 300.00, 0.00, 0, 0, 0, 3233.11, 'December', '2016', 1),
(17, 1020, 2906.11, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 208.00, 0.00, 0.00, 300.00, 0.00, 0, 0, 0, 3414.11, 'December', '2016', 1),
(18, 1021, 3443.11, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 208.00, 0.00, 0.00, 300.00, 0.00, 0, 0, 0, 3951.11, 'December', '2016', 1),
(19, 1022, 2961.11, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 208.00, 0.00, 0.00, 300.00, 0.00, 0, 0, 0, 3469.11, 'December', '2016', 1),
(20, 1023, 3159.11, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 208.00, 0.00, 0.00, 300.00, 0.00, 0, 0, 0, 3667.11, 'December', '2016', 1),
(21, 1024, 2343.11, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 208.00, 0.00, 0.00, 300.00, 0.00, 0, 0, 0, 2851.11, 'December', '2016', 1),
(22, 1025, 2215.11, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 208.00, 0.00, 0.00, 300.00, 0.00, 0, 0, 0, 2723.11, 'December', '2016', 1),
(23, 1026, 2821.11, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 208.00, 0.00, 0.00, 300.00, 0.00, 0, 0, 0, 3329.11, 'December', '2016', 1),
(24, 1027, 2877.11, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 208.00, 0.00, 0.00, 300.00, 0.00, 0, 0, 0, 3385.11, 'December', '2016', 1),
(25, 1028, 2725.11, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 208.00, 0.00, 0.00, 300.00, 0.00, 0, 0, 0, 3233.11, 'December', '2016', 1),
(26, 1029, 2555.11, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 208.00, 0.00, 0.00, 300.00, 0.00, 0, 0, 0, 3063.11, 'December', '2016', 1),
(27, 1030, 2260.11, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 208.00, 0.00, 0.00, 300.00, 0.00, 0, 0, 0, 2768.11, 'December', '2016', 1),
(28, 1031, 2159.11, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 208.00, 0.00, 0.00, 300.00, 0.00, 0, 0, 0, 2667.11, 'December', '2016', 1),
(29, 1032, 2372.11, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 208.00, 0.00, 0.00, 300.00, 0.00, 0, 0, 0, 2880.11, 'December', '2016', 1),
(30, 1033, 2358.11, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 208.00, 0.00, 0.00, 300.00, 0.00, 0, 0, 0, 2866.11, 'December', '2016', 1),
(31, 1001, 3330.34, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 208.00, 0.00, 0.00, 300.00, 0.00, 0, 0, 0, 3838.34, 'December', '2016', 1),
(32, 1002, 3070.34, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 208.00, 0.00, 0.00, 300.00, 0.00, 0, 0, 0, 3578.34, 'December', '2016', 1);

-- --------------------------------------------------------

--
-- Table structure for table `servicebooks`
--

CREATE TABLE `servicebooks` (
  `service_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `emp_type` varchar(20) NOT NULL,
  `application_id` varchar(60) DEFAULT NULL,
  `da` int(11) DEFAULT '0',
  `basic_pay` int(11) DEFAULT '0',
  `scale` varchar(60) DEFAULT NULL,
  `emp_pf_category` varchar(20) NOT NULL,
  `gpf_persentage` float(15,2) DEFAULT NULL,
  `nps_persentage` float(15,2) DEFAULT NULL,
  `doa` varchar(100) DEFAULT NULL,
  `doj` varchar(100) DEFAULT NULL,
  `service_image` varchar(200) DEFAULT NULL,
  `dop` varchar(100) DEFAULT NULL,
  `dol` varchar(100) DEFAULT NULL,
  `doi` varchar(100) DEFAULT NULL,
  `dor` varchar(100) DEFAULT NULL,
  `remarks` varchar(200) DEFAULT NULL,
  `status` varchar(100) NOT NULL DEFAULT '1',
  `union_fee` int(11) DEFAULT NULL,
  `kss` int(11) DEFAULT NULL,
  `glsi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servicebooks`
--

INSERT INTO `servicebooks` (`service_id`, `emp_id`, `dept_id`, `post_id`, `emp_type`, `application_id`, `da`, `basic_pay`, `scale`, `emp_pf_category`, `gpf_persentage`, `nps_persentage`, `doa`, `doj`, `service_image`, `dop`, `dol`, `doi`, `dor`, `remarks`, `status`, `union_fee`, `kss`, `glsi`) VALUES
(1, 1003, 12, 11, 'Permanent', '', 24654, 21818, '8000 - 35000', 'GPF', 10.00, 0.00, '', '', NULL, '', '', '', '2020/03/31', '', '1', NULL, NULL, NULL),
(2, 1004, 12, 7, 'Permanent', '', 31715, 24210, '12000 - 40000', 'GPF', 10.00, 0.00, '', '', NULL, '', '', '', '2019/01/31', '', '1', NULL, NULL, NULL),
(3, 1005, 12, 7, 'Permanent', '', 30025, 22920, '12000 - 40000', 'GPF', 10.00, 0.00, '', '', NULL, '', '', '', '2020/12/31', '', '1', NULL, NULL, NULL),
(4, 1006, 12, 10, 'Permanent', '', 26829, 20480, '8000 - 35000', 'GPF', 10.00, 0.00, '', '', NULL, '', '', '', '2017/05/31', '', '1', NULL, NULL, NULL),
(5, 1008, 12, 11, 'Permanent', '', 26357, 20120, '8000 - 35000', 'GPF', 10.00, 0.00, '', '', NULL, '', '', '', '2021/03/31', '', '1', NULL, NULL, NULL),
(6, 1009, 12, 11, 'Permanent', '', 21143, 16140, '8000 - 35000', 'GPF', 10.00, 0.00, '', '', NULL, '', '', '', '2021/09/30', '', '1', NULL, NULL, NULL),
(7, 1010, 12, 11, 'Permanent', '', 23515, 17950, '8000 - 35000', 'GPF', 10.00, 0.00, '', '', NULL, '', '', '', '2022/12/31', '', '1', NULL, NULL, NULL),
(8, 1011, 12, 15, 'Permanent', '', 18890, 14420, '5200-20200', 'GPF', 10.00, 0.00, '', '', NULL, '', '', '', '2020/09/30', '', '1', NULL, NULL, NULL),
(9, 1012, 12, 10, 'Permanent', '', 25886, 19760, '8000 - 35000', 'GPF', 10.00, 0.00, '', '', NULL, '', '', '', '2017/01/31', '', '1', NULL, NULL, NULL),
(10, 1013, 12, 10, 'Permanent', '', 26829, 20480, '8000 - 35000', 'GPF', 10.00, 0.00, '', '', NULL, '', '', '', '2017/05/31', '', '1', NULL, NULL, NULL),
(11, 1014, 12, 10, 'Permanent', '', 26763, 20430, '8000 - 35000', 'GPF', 10.00, 0.00, '', '', NULL, '', '', '', '2019/12/31', '', '1', NULL, NULL, NULL),
(12, 1015, 12, 10, 'Permanent', '', 26829, 20480, '8000 - 35000', 'GPF', 10.00, 0.00, '', '', NULL, '', '', '', '2021/01/31', '', '1', NULL, NULL, NULL),
(13, 1016, 12, 7, 'Permanent', '', 32318, 24670, '12000 - 40000', 'GPF', 10.00, 0.00, '', '', NULL, '', '', '', '2022/01/31', '', '1', NULL, NULL, NULL),
(14, 1017, 12, 10, 'Permanent', '', 25073, 19140, '8000 - 35000', 'GPF', 10.00, 0.00, '', '', NULL, '', '', '', '2022/03/31', '', '1', NULL, NULL, NULL),
(15, 1018, 12, 10, 'Permanent', '', 26763, 20430, '8000 - 35000', 'GPF', 10.00, 0.00, '', '', NULL, '', '', '', '2023/02/28', '', '1', NULL, NULL, NULL),
(16, 1019, 12, 11, 'Permanent', '', 21143, 16140, '8000 - 35000', 'GPF', 10.00, 0.00, '', '', NULL, '', '', '', '2023/07/31', '', '1', NULL, NULL, NULL),
(17, 1020, 12, 11, 'Permanent', '', 23515, 17950, '8000 - 35000', 'GPF', 10.00, 0.00, '', '', NULL, '', '', '', '2023/11/30', '', '1', NULL, NULL, NULL),
(18, 1021, 12, 7, 'Permanent', '', 30549, 23320, '12000 - 40000', 'GPF', 10.00, 0.00, '', '', NULL, '', '', '', '2024/09/30', '', '1', NULL, NULL, NULL),
(19, 1022, 12, 11, 'Permanent', '', 24235, 18500, '8000 - 35000', 'GPF', 10.00, 0.00, '', '', NULL, '', '', '', '2024/10/31', '', '1', NULL, NULL, NULL),
(20, 1023, 12, 10, 'Permanent', '', 26829, 20480, '8000 - 35000', 'GPF', 10.00, 0.00, '', '', NULL, '', '', '', '2025/01/31', '', '1', NULL, NULL, NULL),
(21, 1024, 12, 16, 'Permanent', '', 16139, 12320, '5200-20200', 'GPF', 10.00, 0.00, '', '', NULL, '', '', '', '2025/03/31', '', '1', NULL, NULL, NULL),
(22, 1025, 12, 16, 'Permanent', '', 14462, 11040, '5200-20200', 'GPF', 10.00, 0.00, '', '', NULL, '', '', '', '2025/05/31', '', '1', NULL, NULL, NULL),
(23, 1026, 12, 11, 'Permanent', '', 22401, 17100, '8000 - 35000', 'GPF', 10.00, 0.00, '', '', NULL, '', '', '', '2026/01/31', '', '1', NULL, NULL, NULL),
(24, 1027, 12, 11, 'Permanent', '', 23135, 17660, '8000 - 35000', 'GPF', 10.00, 0.00, '', '', NULL, '', '', '', '2026/02/28', '', '1', NULL, NULL, NULL),
(25, 1028, 12, 11, 'Permanent', '', 21143, 16140, '8000 - 35000', 'GPF', 10.00, 0.00, '', '', NULL, '', '', '', '2026/08/31', '', '1', NULL, NULL, NULL),
(26, 1029, 12, 15, 'Permanent', '', 19783, 14440, '5200-20200', 'GPF', 10.00, 0.00, '', '', NULL, '', '', '', '2026/09/30', '', '1', NULL, NULL, NULL),
(27, 1030, 12, 15, 'Permanent', '', 15741, 11490, '5200-20200', 'GPF', 10.00, 0.00, '', '', NULL, '', '', '', '2027/01/31', '', '1', NULL, NULL, NULL),
(28, 1031, 12, 16, 'Permanent', '', 14358, 10480, '5200-20200', 'GPF', 10.00, 0.00, '', '', NULL, '', '', '', '2027/03/31', '', '1', NULL, NULL, NULL),
(29, 1032, 12, 16, 'Permanent', '', 17276, 12610, '5200-20200', 'GPF', 10.00, 0.00, '', '', NULL, '', '', '', '2027/04/30', '', '1', NULL, NULL, NULL),
(30, 1033, 12, 15, 'Permanent', '', 17084, 12470, '5200-20200', 'GPF', 10.00, 0.00, '', '', NULL, '', '', '', '2027/10/31', '', '1', NULL, NULL, NULL),
(31, 1001, 12, 15, 'Permanent', '', 17084, 12470, '5200-20200', 'GPF', 10.00, 0.00, '', '', NULL, '', '', '', '2027/10/31', '', '1', NULL, NULL, NULL),
(32, 1002, 12, 15, 'Permanent', '', 17084, 12470, '5200-20200', 'GPF', 10.00, 0.00, '', '', NULL, '', '', '', '2027/10/31', '', '1', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `transfer_id` int(11) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `current_dept_id` int(11) DEFAULT NULL,
  `new_dept_id` int(11) DEFAULT NULL,
  `submission_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transfer`
--

INSERT INTO `transfer` (`transfer_id`, `emp_id`, `current_dept_id`, `new_dept_id`, `submission_date`) VALUES
(1, 1004, 12, 12, '2017-01-02'),
(2, 1017, 12, 13, '2017-01-02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `id` int(10) NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `middlename` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '/img/avatar.png',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `id`, `firstname`, `middlename`, `lastname`, `email`, `password`, `role`, `status`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1001, 'Mumu ', 'J', 'Kalita', 'admin', '$2y$10$QmiQEAdkisDOrQ4a8/Ozi.igdBjdFulCyxsfn0u3aPEEksruX/igW', '1', 1, '/img/avatar.png', 'NHFfGZmIuSE5SYnWmfo8JowOkF73SHR4o3B0AV1khBiS6oTIAIbdYNMVOOpG', '2016-11-07 02:08:03', '2016-12-31 04:53:32'),
(2, 1002, 'Dhruwa ', 'M', 'Kalita', 'dhruwajyoti', '$2y$10$QmiQEAdkisDOrQ4a8/Ozi.igdBjdFulCyxsfn0u3aPEEksruX/igW', '2', 2, '/img/avatar.png', 'tkknc6fFb38ngnQiWPmog3Po4zjF0RQsvSopyVFAOvO5s1uMYYGyUHZnqmvL', '2016-11-07 02:13:55', '2016-12-31 00:11:44'),
(3, 1003, 'MD. MUYIZUR', '', 'Rahman', 'muyizur', '$2y$10$pv4DqoJs.Q5fxo5ZOqiWM.jNp2GA49lkb4cQsftyg5WJtcob3Qkgq', '5', 1, '/img/avatar.png', 'ZT9eqtWA05N3siMoC0czR24NSPfN0IBIAECqZ0mHph31iqZq9xPEiLZTWCZA', '2016-12-05 00:28:17', '2016-12-30 06:06:01'),
(4, 1004, 'DHANESWAR', '', 'Das', 'dhaneswar', '$2y$10$D2/Q84Rf7TCsaoUa1dkIt.msgomqJp6TLk8uvosguTeXrLx61Ega6', '5', 1, '/img/avatar.png', NULL, '2016-12-05 00:28:38', '2016-12-05 00:28:38'),
(5, 1005, 'NARENDRA', '', 'GOSWAMI', 'narendra', '$2y$10$Eawxh8Nn9t/fRHqeeutGXufzANhmx5YTXLDuy3TC.WoBW7Ksm4G2e', '5', 1, '/img/avatar.png', NULL, '2016-12-05 00:28:58', '2016-12-05 00:28:58'),
(6, 1006, 'SRI NATHU ', 'Ram', 'Boro', 'nathu', '$2y$10$/k9roQWPISqif4QMC/XBfeO.cckEjuNgUXgdE1G.imRtPtDwzYbyK', '5', 1, '/img/avatar.png', NULL, '2016-12-05 00:29:20', '2016-12-05 00:29:20'),
(7, 1007, 'DURGA', 'PRASAD ', 'DAS', 'durga', '$2y$10$60Cb2o4PnQYrWJQXMFHy0.Q9n9VS.OWf1QRElpHCYXlFIiGlHqCby', '5', 1, '/img/avatar.png', NULL, '2016-12-05 00:29:37', '2016-12-05 00:29:37'),
(8, 1008, 'DIGANTA', '', 'SARMA', 'diganta', '$2y$10$WOzoJD41sd3/PA1ugurGV.1EMxS5zXjDxLrHbjKw1ps3msQgtG2g2', '3', 1, '/img/avatar.png', 'ESFx4tddu4liQJ1emSGXNb901YZhBlCg9AQNxhw23uLeg2PDpNs7OowjYX3e', '2016-12-05 00:29:56', '2016-12-17 05:01:45'),
(9, 1045, 'AJIT', '', 'DEOGHARIA', '1045ajit', '$2y$10$4R.p/5kGSuhC/GPFnvt20.qRpiPF3ADtbU0btuG7J77Xt4NqmjRJi', '2', 1, '/img/avatar.png', NULL, NULL, NULL),
(10, 1045, 'AJIT', '', 'DEOGHARIA', '1045ajit', '$2y$10$hOn/c6.2zT9Twyf5f1fcYOwq/NWr1VlfVMbWpoyYq5fPHGxpc9LH6', '3', 1, '/img/avatar.png', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment_master`
--
ALTER TABLE `appointment_master`
  ADD PRIMARY KEY (`appointment_master_id`);

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`asset_id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `demos`
--
ALTER TABLE `demos`
  ADD PRIMARY KEY (`demo_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`fld_DeptID`);

--
-- Indexes for table `dependants`
--
ALTER TABLE `dependants`
  ADD PRIMARY KEY (`dependant_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `employee_loan`
--
ALTER TABLE `employee_loan`
  ADD PRIMARY KEY (`emp_loan_id`);

--
-- Indexes for table `employee_pension_details`
--
ALTER TABLE `employee_pension_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kss`
--
ALTER TABLE `kss`
  ADD PRIMARY KEY (`kss_id`);

--
-- Indexes for table `leavetypes`
--
ALTER TABLE `leavetypes`
  ADD PRIMARY KEY (`leave_type_id`);

--
-- Indexes for table `leave_balance`
--
ALTER TABLE `leave_balance`
  ADD PRIMARY KEY (`leave_balance_id`);

--
-- Indexes for table `leave_master`
--
ALTER TABLE `leave_master`
  ADD PRIMARY KEY (`leave_master_id`);

--
-- Indexes for table `leave_transaction`
--
ALTER TABLE `leave_transaction`
  ADD PRIMARY KEY (`leave_transaction_id`);

--
-- Indexes for table `loan_trasection`
--
ALTER TABLE `loan_trasection`
  ADD PRIMARY KEY (`loan_transection_id`);

--
-- Indexes for table `loan_type`
--
ALTER TABLE `loan_type`
  ADD PRIMARY KEY (`loan_type_id`);

--
-- Indexes for table `log_books`
--
ALTER TABLE `log_books`
  ADD PRIMARY KEY (`log_book_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ot_genneration`
--
ALTER TABLE `ot_genneration`
  ADD PRIMARY KEY (`ot_genneration_id`);

--
-- Indexes for table `parameters`
--
ALTER TABLE `parameters`
  ADD PRIMARY KEY (`parameter_id`);

--
-- Indexes for table `parameter_values`
--
ALTER TABLE `parameter_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `pensions`
--
ALTER TABLE `pensions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pensions_employee_id_index` (`employee_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`fld_PostID`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`promotion_id`);

--
-- Indexes for table `qualifications`
--
ALTER TABLE `qualifications`
  ADD PRIMARY KEY (`qualification_id`);

--
-- Indexes for table `salary_claims`
--
ALTER TABLE `salary_claims`
  ADD PRIMARY KEY (`salary_claim_id`);

--
-- Indexes for table `salary_deductions`
--
ALTER TABLE `salary_deductions`
  ADD PRIMARY KEY (`salary_deduction_id`);

--
-- Indexes for table `servicebooks`
--
ALTER TABLE `servicebooks`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`transfer_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment_master`
--
ALTER TABLE `appointment_master`
  MODIFY `appointment_master_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `asset_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT for table `demos`
--
ALTER TABLE `demos`
  MODIFY `demo_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `dependants`
--
ALTER TABLE `dependants`
  MODIFY `dependant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `emp_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1048;
--
-- AUTO_INCREMENT for table `employee_loan`
--
ALTER TABLE `employee_loan`
  MODIFY `emp_loan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `employee_pension_details`
--
ALTER TABLE `employee_pension_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kss`
--
ALTER TABLE `kss`
  MODIFY `kss_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `leavetypes`
--
ALTER TABLE `leavetypes`
  MODIFY `leave_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `leave_balance`
--
ALTER TABLE `leave_balance`
  MODIFY `leave_balance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `leave_master`
--
ALTER TABLE `leave_master`
  MODIFY `leave_master_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `leave_transaction`
--
ALTER TABLE `leave_transaction`
  MODIFY `leave_transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `loan_trasection`
--
ALTER TABLE `loan_trasection`
  MODIFY `loan_transection_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `loan_type`
--
ALTER TABLE `loan_type`
  MODIFY `loan_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `log_books`
--
ALTER TABLE `log_books`
  MODIFY `log_book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ot_genneration`
--
ALTER TABLE `ot_genneration`
  MODIFY `ot_genneration_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `parameters`
--
ALTER TABLE `parameters`
  MODIFY `parameter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `parameter_values`
--
ALTER TABLE `parameter_values`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pensions`
--
ALTER TABLE `pensions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `fld_PostID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `promotion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `salary_claims`
--
ALTER TABLE `salary_claims`
  MODIFY `salary_claim_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `salary_deductions`
--
ALTER TABLE `salary_deductions`
  MODIFY `salary_deduction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `servicebooks`
--
ALTER TABLE `servicebooks`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `transfer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
