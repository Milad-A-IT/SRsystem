-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 29, 2020 at 08:56 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
/*SET GLOBAL time_zone = '-5:00';*/


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registration`
--

CREATE DATABASE IF NOT EXISTS `registration` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `registration`;
-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `sid` varchar(100) NOT NULL,
  `course_id` varchar(255) NOT NULL,
  `sessionid` varchar(45) NOT NULL,
  `status` tinyint(45) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` varchar(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `unit` varchar(11) NOT NULL,
  `class_level` int(3) NOT NULL,
  `department` varchar(255) NOT NULL,
  `course_lecturer` varchar(255) NOT NULL,
  `semester` varchar(45) NOT NULL,
  `time` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='course table';

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `title`, `unit`, `class_level`, `department`, `course_lecturer`, `semester`, `time`, `location`) VALUES
('ACCT109', 'Basics of Income Taxes', '3', 0, 'ACCT', 'Aaron Douglas', 'FALL', 'Tu 8:00am-8:50am', 'REMOTE'),
('ACCT111', 'Small Business Accounting', '3', 0, 'ACCT', 'DR. OLOKO', 'FALL', 'Tu 8:00am-8:50am', 'BLB ROOM 311'),
('ACCT121', 'Accounting I', '3', 0, 'ACCT', 'EKPEZU AKON OBU', 'FALL', 'Mon 9:30am-10:20am', 'BLB ROOM 241'),
('ACCT122', 'Accounting II', '3', 0, 'ACCT', 'OFUT OGAR TUMENAYU', 'SPRING', 'Mon, Wed 9:30am-10:20am', 'BLB ROOM 242'),
('ACCT135', 'Computerized Accounting Application', '3', 0, 'ACCT', 'EMMANUEL OYO-ITA', 'SPRING', 'Tue, Thurs 1:00pm-1:50pm', 'BLB ROOM 172'),
('CSCE1203', 'INTRODUCTION TO INTERNET', '2', 0, 'CSCE', 'MR.ANTHONY OTIKO O.', 'FALL', 'Wed 10:00am-11:20am', 'Discovery Park ROOM 113'),
('CSCE2101', 'JAVA', '3', 0, 'CSCE', 'DR. UMOH ENOIMA ESSIEN', 'FALL', 'Fri 11:00am-12:20pm', 'Discovery Park ROOM 228'),
('CSCE2102', 'ASSEMBLY LANGUAGE(AL)', '3', 0, 'CSCE', 'MR. EMMANUEL OYO-ITA', 'SPRING', 'Mon, Wed 2:00pm-2:50pm', 'Discovery Park ROOM 212'),
('CSCE2103', 'OPERATING SYSTEM I', '2', 0, 'CSCE', 'PROF WILLIAMS EDEM E.', 'FALL', 'Thurs 3:00pm-4:20pm', 'REMOTE'),
('CSCE2201', 'PHP', '3', 0, 'CSCE', 'DR. FIDELIS .I. ONAH', 'FALL', 'Mon 9:00am-11:50am', 'Discovery Park ROOM 142'),
('CSCE2202', 'DATA STRUCTURES', '3', 0, 'CSCE', 'MR. OYO-ITA ETIM ESU', 'SPRING', 'Wed,Fri 4:00pm-4:50pm', 'Discovery Park ROOM 223'),
('CSCE2203', 'DIGITAL DESIGN', '3', 0, 'CSCE', 'MISS EKPEZU AKON OBU', 'SPRING', 'Wed 10:00am-11:20am', 'Discovery Park ROOM 211'),
('CSCE2204', 'SWITCHING ALGEBRA', '3', 0, 'CSCE', 'MR. EMMANUEL OYO-ITA', 'FALL', 'Wed,Fri 1:00pm-2:20pm', 'Discovery Park ROOM 131'),
('CSCE2205', 'OPERATING SYSTEMS II', '2', 0, 'CSCE', 'MR. OKWONG ATTE ENYINIH', 'FALL', 'Mon, Wed 2:30pm-3:20pm', 'REMOTE'),
('CSCE3101', 'COMPUTER ARCHITECTURES', '3', 0, 'CSCE', 'DR. UMOH ENOIMA ESSIEN', 'FALL', 'Mon 3:00pm-5:50pm', 'Discovery Park ROOM 111'),
('CSCE3102', 'SYSTEM ANALYSIS AND DESIGN', '3', 0, 'CSCE', 'MR. OKWONG ATTE ENYINIHI', 'FALL', 'Mon, Wed 9:30am-10:20am', 'Discovery Park ROOM 127'),
('CSCE3103', 'NUMERICAL METHODS', '3', 0, 'CSCE', 'DR. FIDELIS .I. ONAH', 'FALL', 'Wed,Fri 1:00pm-2:20pm', 'Discovery Park ROOM 228'),
('CSCE3104', 'COMPILER CONSTRUCTION', '2', 0, 'CSCE', 'MR. OBIDINU', 'FALL', 'Fri 3:00pm-5:50pm', 'Discovery Park ROOM 241'),
('CSCE3105', 'OBJECT ORIENTED\r\nPROGRAMMING', '3', 0, 'CSCE', '\r\nMR. OYO-ITA ETIM ESU', 'FALL', 'Tue,Thurs 11:00am-11:50am', 'Discovery Park ROOM 244'),
('CSCE3106', 'ANALYSIS OF ALGORITHM', '2', 0, 'CSCE', 'DR. FIDELIS .I. ONAH', 'FALL', 'Mon, Wed 2:30pm-3:20pm', 'Discovery Park ROOM 111'),
('CSCE3107', 'DATABASE DESIGN AND\r\nMANAGEMENT', '3', 0, 'CSCE', 'MR. OFUT OGAR TUMENAYU', 'FALL', 'Wed 3:00pm-5:50pm', 'Discovery Park ROOM 112'),
('CSCE3201', 'SIWES(industrial Training)', '6', 0, 'CSCE', 'DR. UMOH ENOIMA ESSIEN', 'SPRING', 'Tue 3:00pm-5:50pm)', 'Discovery Park ROOM 226'),
('CSCE4101', 'AUTOMATA THEORY & FORMAL LANGUAGES', '3', 0, 'CSCE', 'PROF. LIPCSEY ZSCLT', 'FALL', 'Wed 3:00pm-5:50pm', 'Discovery Park ROOM 228'),
('CSCE4102', 'ARTIFICIAL INTELLIGENCE', '2', 0, 'CSCE', 'PROF. OLIVER .E. OSUAGWU', 'FALL', 'Wed 3:00pm-5:50pm', 'Discovery Park ROOM 201'),
('CSCE4103', 'SOFTWARE ENGINEERING', '2', 0, 'CSCE', 'DR. ORUOK', 'FALL', 'Fri 3:00pm-5:50pm', 'Discovery Park ROOM 109'),
('CSCE4104', 'SYSTEM MODELLING & SIMULATION', '2', 0, 'CSCE', ' MR.OBIDINU', 'FALL', 'Tue 3:00pm-5:50pm', 'Discovery Park ROOM 162'),
('CSCE4105', 'COMPUTER NETWORK & COMMUNICATION', '3', 0, 'CSCE', 'PROF. CHUKWUGOZIEM .I.', 'FALL', 'Wed,Fri 1:00pm-2:20pm', 'Discovery Park ROOM 249'),
('CSCE4106', 'SPECIAL TOPICS IN COMPUTER SCIENCE', '2', 0, 'CSCE', 'DR. UMOH ENOIMA ESSIEN', 'FALL', 'Thurs 3:00pm-5:50pm', 'Discovery Park ROOM 237'),
('CSCE4107', 'NET-CENTRIC COMPUTING', '3', 0, 'CSCE', 'MR. PRINCE ANA', 'FALL', 'Fri 3:00pm-5:50pm', 'Discovery Park ROOM 215'),
('CSCE4200', 'PROJECT', '6', 0, 'CSCE', 'DR. UMOH ENOIMA ESSIEN', 'SPRING', 'Mon 3:00pm-5:50pm' ,'Discovery Park ROOM 236'),
('CSCE4201', 'QUEUING SYSTEM', '2', 0, 'CSCE', 'DR. ORUOK', 'SPRING', 'Tue 3:00pm-5:50pm', 'Discovery Park ROOM 135'),
('CSCE4202', 'COMPUTER NETWORKS ADMINISTRATION', '3', 0, 'CSCE', 'MR. PRINCE ANA', 'SPRING', 'Tue,Thurs 11:00am-11:50am', 'Discovery Park ROOM 137'),
('CSCE4203', 'SOFTWARE PROJECT MANAGEMENT', '2', 0, 'CSCE', ' DR. UMOH ENOIMA ESSIEN', 'SPRING', 'Mon 3:00pm-5:50pm', 'Discovery Park ROOM 141'),
('CSCE4204', 'COMPUTER GRAPHICS AND VISUALIZATION', '3', 0, 'CSCE', ' MR.OBIDINU', 'SPRING', 'Wed,Fri 1:00pm-2:20pm', 'Discovery Park ROOM 255'),
('CSCE4205', 'OPERATION RESEARCH', '3', 0, 'CSCE', 'DR. FIDELIS .I. ONAH', 'FALL', 'Mon, Wed 9:30am-10:20am', 'Discovery Park ROOM 152'),
('ENT2101', 'ENTERPRENEURSHIP STUDY I', '2', 0, 'ENT', 'DR. ADEBISI .A. .A', 'FALL', 'Thurs 3:00pm-5:50pm', 'BLB ROOM 168'),
('ENT2201', 'ENTERPRENEURSHIP STUDY II', '2', 0, 'ENT', 'DR. ADEBISI .A. .A.', 'SPRING', 'Tue,Thurs 11:00am-11:50am', 'BLB ROOM 311'),
('GSS1101', 'USE OF ENGLISH AND\r\nCOMMUNICATION SKILL I', '2', 0, 'GSS', 'PROF. ETIEWO', 'FALL', 'Wed 10:00am-11:20am', 'GAB ROOM 412'),
('GSS1102', 'PHILOSOPHY AND LOGIC', '2', 0, 'GSS', 'MR ONYA', 'FALL', 'Thurs 3:00pm-5:50pm', 'GAB ROOM 211'),
('GSS1103', 'INTRODUCTION TO COMPUTER\r\nSCIENCE', '2', 0, 'GSS', 'MR PRINCE ANA', 'FALL', 'Thurs 3:00pm-5:50pm', 'GAB ROOM 133'),
('GSS1201', 'USE OF ENGLISH AND\r\nCOMMUNICATION SKILL II', '2', 0, 'GSS', 'PROF. ETIEWO', 'SPRING', 'Wed,Fri 1:00pm-2:20pm', 'GAB ROOM 141'),
('GSS1202', 'NIGERIAN PEOPLE AND\r\nCULTURE', '2', 0, 'GSS', 'DR. OFEM', 'SPRING', 'Tue,Thurs 11:00am-11:50am', 'GAB ROOM 311'),
('GSS1203', 'HISTORY AND PHILOSOPHY OF\r\nSCIENCE', '2', 0, 'GSS', 'MR ONYA', 'SPRING', 'Wed 10:00am-11:20am', 'GAB ROOM 332'),
('GSS2101', 'PEACE AND CONFLICT STUDIES', '2', 0, 'GSS', 'DR. ELOMA', 'FALL', 'Mon, Wed 2:30pm-3:20pm', 'GAB ROOM 225'),
('MTH1101', 'GENERAL MATHEMATICS I', '3', 0, 'MTH', 'MR ODOK', 'FALL', 'Thurs 9:00am-11:50am', 'REMOTE'),
('MTH1201', 'GENERAL MATHEMATICS II', '3', 0, 'MTH', 'MR. ODOK', 'SPRING', 'Mon, Wed 9:30am-10:20am', 'REMOTE'),
('MTH1202', 'GENERAL MATHEMATICS III', '3', 0, 'MTH', 'OKOYI JASPER', 'SPRING', 'Wed,Fri 1:00pm-2:20pm', 'ENVIRONMENT BUILDING ROOM 111'),
('MTH2103', 'LINEAR ALGEBRA', '3', 0, 'MTH', 'MR. ATSU', 'FALL', 'Thurs 9:00am-11:50am', 'GAB ROOM 122'),
('MTH2104', 'MATHEMATICAL METHODS', '3', 0, 'CSC', 'MR. ATSU', 'FALL', 'Thurs 9:00am-11:50am', 'REMOTE'),
('MTH2201', 'LINEAR ALGEBRA II', '3', 0, 'MTH', 'MR. ATSU', 'SPRING', 'Mon, Wed 2:30pm-3:20pm', 'LANGUAGE BUILDING ROOM 231'),
('PHY1101', 'GENERAL PHYSICS I', '3', 0, 'PHY', 'DR. AKAMPA', 'FALL', 'Mon, Wed 2:30pm-3:20pm', 'PHYSIC BUILDING ROOM 131'),
('PHY1104', 'PRACTICAL PHYSICS', '1', 0, 'PHY', 'DR. AKAMPA', 'FALL', 'Mon,Wed 9:00am-9:50am', 'PHYSIC BUILDING ROOM 211'),
('PHY1201', 'GENERAL PHYSICS II', '3', 0, 'PHY', 'DR. AKAMPA', 'FALL', 'Tue,Thurs 11:00am-11:50am', 'PHYSIC BUILDING ROOM 168');

-- --------------------------------------------------------

--
-- Table structure for table `course_lecturer`
--

CREATE TABLE `course_lecturer` (
  `lecturer_name` varchar(45) NOT NULL,
  `course_id` varchar(45) NOT NULL,
  `registered_students` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course_registered`
--

CREATE TABLE `course_registered` (
  `sid` varchar(100) NOT NULL,
  `course_id` varchar(255) NOT NULL,
  `sessionid` varchar(45) NOT NULL,
  `status` tinyint(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_registered`
--

INSERT INTO `course_registered` (`sid`, `course_id`, `sessionid`, `status`) VALUES
('asw0133', 'ACCT121', '2020', 0);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` varchar(45) NOT NULL,
  `dept_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`) VALUES
('ACCT', 'ACCOUNTING'),
('CHEM', 'CHEMISTRY'),
('CSCE', 'COMPUTER SCIENCE'),
('ENT', 'ENTREPRENEURSHIP'),
('GSS', 'GENERAL STUDIES'),
('MTH', 'MATHEMATICS'),
('PHY', 'PHYSICS'),
('STA', 'STATISTICS');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `sessionid` varchar(45) NOT NULL,
  `semester` varchar(45) NOT NULL DEFAULT 'FALL',
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='session dates';

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`sessionid`, `semester`, `start_date`, `end_date`, `status`) VALUES
('2020', 'FALL', '2020-08-24', '2020-12-11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admins`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `euid` varchar(45) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `dob` date NOT NULL,
  `phone` varchar(15) NOT NULL,
  `addr` varchar(200) NOT NULL,
  `profileimg` varchar(45) NOT NULL DEFAULT 'avatar.png',
  `lastlogin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatelogin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`euid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admins`
--

INSERT INTO `admin` (`euid`, `first_name`, `last_name`, `gender`, `password`, `email`, `dob`, `phone`, `addr`, `profileimg`, `lastlogin`, `updatelogin`) VALUES
('jd1234', 'Joseph', 'Daniel', 'Male', '123456', 'admin@test.unt.edu', '1970-8-12', '487-885-1787', '123 College Blvd. Brushy, TX 50833', '1.jpg', '2018-11-10 18:00:30', '2018-11-10 18:00:30');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `euid` varchar(45) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `department` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `gpa` varchar(45) NOT NULL,
  `level` int(3) NOT NULL,
  `dob` date NOT NULL,
  `phone` varchar(15) NOT NULL,
  `addr` varchar(200) NOT NULL,
  `courseofstudy` varchar(100) NOT NULL,
  `profileimg` varchar(45) NOT NULL DEFAULT 'avatar.png',
  `lastlogin` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatelogin` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`euid`, `first_name`, `last_name`, `gender`, `password`, `department`, `email`, `gpa`, `level`, `dob`, `phone`, `addr`, `courseofstudy`, `profileimg`, `lastlogin`, `updatelogin`) VALUES
('asw0133', 'Andrew', 'Wong', 'Male', '123456', 'CSCE', 'andrewwong@my.unt.edu', '3.6', 400, '1996-11-30', '411-123-4567', '123 College Blvd. Brushy, TX 50833', 'BSC. COMPUTER SCIENCE', '1.jpg', '2020-10-29 23:22:06', '2020-10-29 23:22:06'),
('CY0023', 'Earon', 'Johnson', 'Male', '123456', 'CSCE', 'yehudahC@example.edu', '4', 300, '1997-11-14', '216-549-7781', '1501 Canterbury Trail, Jenkx TX 68002', 'BSC. COMPUTER SCIENCE', '2.jpg', '2018-11-07 15:10:45', '0000-00-00 00:00:00'),
('mia1234', 'Milad', 'Azizi', 'Male', '123456', 'CSCE', 'milad@my.unt.edu', '3', 400, '1997-10-05', '402-569-8871', '168 Sequoia Dr, Plano TX', 'BSC. Computer Science', '1.jpg', '2020-10-28 20:49:21', '0000-00-00 00:00:00'),
('ss1234', 'Salam', 'Saeed', 'Female', '123456', 'CSCE', 'salamesaeed@my.unt.edu', '3', 100, '1998-10-18', '315-895-5597', '67 Cello Rd, Leonard TX 65116', 'BSC. COMPUTER SCIENCE', '4.png', '2020-10-28 20:27:36', '0000-00-00 00:00:00'),
('YJ0024', 'Patrick', 'Kaburu', 'Male', '123456', 'CSCE', 'jorge@example.edu', '3', 200, '2000-10-24', '410-115-8967', '5050 Hummingbird Trail, Landis TX 68001', 'BSC. COMPUTER SCIENCE', '3.jpeg', '2018-10-31 16:20:30', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`),
  ADD UNIQUE KEY `course_id` (`course_id`),
  ADD KEY `department` (`department`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`sessionid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`euid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
