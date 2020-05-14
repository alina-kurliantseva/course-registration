-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 04, 2019 at 09:05 PM
-- Server version: 5.6.35
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `CST8257`
--

-- --------------------------------------------------------

--
-- Table structure for table `Course`
--

CREATE TABLE IF NOT EXISTS `Course` (
  `course_code` varchar(10) NOT NULL,
  `title` varchar(256) NOT NULL,
  `weekly_hours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Course`
--

INSERT INTO `Course` (`course_code`, `title`, `weekly_hours`) VALUES
('CAD8400', 'AutoCAD I', 3),
('CAD8405', 'AutoCAD II', 4),
('CON8101', 'Residential Building/Estimating', 5),
('CON8102', 'Commercial Building/Estimating', 5),
('CON8404', 'Civil Estimating', 3),
('CON8406', 'Project Scheduling and Cost Control', 3),
('CON8411', 'Construction Materials I', 3),
('CON8416', 'GIS for Civil Engineering', 3),
('CON8417', 'Construction Materials II', 5),
('CON8418', 'Construction Building Code', 3),
('CON8425', ' Design of Steel Structures', 3),
('CON8430', 'Computers and You', 3),
('CON8436', 'Building Systems', 5),
('CON8445', 'Soils Analysis', 3),
('CON8447', 'Foundations', 3),
('CON8466', 'Highway Engineering', 3),
('CON8476', 'Business Principles', 3),
('CST8110', 'Introduction to Computer Programming', 4),
('CST8209', 'Web Programming I', 4),
('CST8250', 'Database Design and Administration', 4),
('CST8253', 'Web Programming II', 3),
('CST8254', 'Network Operating Systems', 4),
('CST8255', 'Web Imaging and Animations', 3),
('CST8256', 'Web Programming Languages I', 4),
('CST8257', 'Web Applications Development', 4),
('CST8258', 'Web Project Management', 3),
('CST8259', 'Web Programming Languages II', 4),
('CST8260', 'Database System and Concepts', 3),
('CST8265', 'Web Security Basics', 4),
('CST8267', 'Ecommerce', 3),
('ENG8101', 'Statics', 5),
('ENG8102', 'Strength of Materials', 3),
('ENG8328', 'Hydraulics', 3),
('ENG8404', 'Introduction to Structural Design', 3),
('ENG8411', 'Structural Analysis', 3),
('ENG8435', 'Reinforced Concrete Design', 3),
('ENG8451', 'Water and Waste Water Technology', 3),
('ENG8454', 'Geotechnical Materials', 3),
('ENL1818M', 'Communications II', 6),
('ENL1818T', 'Communications I', 3),
('ENL1819Q', 'Reporting Technical Information II', 5),
('ENL1819T', 'Reporting Technical Information', 3),
('ENL4004', 'Orientation to Report Writing', 4),
('ENL8420', 'Project Report', 3),
('ENV8400', 'Environmental Engineering', 3),
('GED0192', 'General Education Elective', 3),
('MAT8001', 'Math Fundamentals', 3),
('MAT8050', 'Geometry and Trigonometry', 3),
('MAT8051', 'Algebra', 3),
('MAT8201', 'Calculus 1', 3),
('MGT8100', 'Career and College Success Skills', 3),
('MGT8400', 'Project Administration', 4),
('SAF8408', 'Health and Safety', 4),
('SUR8400', 'Civil Surveying III', 3),
('SUR8411', 'Construction Surveying I', 5),
('SUR8417', 'Construction Surveying II', 3),
('WKT8100', 'Cooperative Education Work Term Preparation', 5);

-- --------------------------------------------------------

--
-- Table structure for table `CourseOffer`
--

CREATE TABLE IF NOT EXISTS `CourseOffer` (
  `course_code` varchar(10) NOT NULL,
  `semester_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CourseOffer`
--

INSERT INTO `CourseOffer` (`course_code`, `semester_code`) VALUES
('CAD8405', '17F'),
('CON8418', '17F'),
('ENG8328', '17F'),
('ENG8404', '17F'),
('ENG8411', '17F'),
('ENG8454', '17F'),
('MGT8400', '17F'),
('CAD8400', '17S'),
('CON8404', '17S'),
('CON8436', '17S'),
('CST8253', '17S'),
('CST8254', '17S'),
('CST8255', '17S'),
('ENG8102', '17S'),
('GED0192', '17S'),
('MAT8051', '17S'),
('SUR8417', '17S'),
('CON8102', '17W'),
('CON8417', '17W'),
('CST8250', '17W'),
('ENG8101', '17W'),
('ENL1818M', '17W'),
('ENL1818T', '17W'),
('MAT8001', '17W'),
('MAT8050', '17W'),
('MGT8100', '17W'),
('SAF8408', '17W'),
('SUR8411', '17W'),
('CON8447', '18F'),
('CON8476', '18F'),
('CST8110', '18F'),
('CST8209', '18F'),
('CST8260', '18F'),
('ENG8435', '18F'),
('ENG8451', '18F'),
('ENL8420', '18F'),
('CON8416', '18S'),
('ENG8404', '18S'),
('ENG8454', '18S'),
('ENL4004', '18S'),
('MAT8201', '18S'),
('SUR8400', '18S'),
('CAD8405', '18W'),
('CON8406', '18W'),
('CON8418', '18W'),
('CON8425', '18W'),
('CON8445', '18W'),
('CON8466', '18W'),
('ENG8328', '18W'),
('ENG8411', '18W'),
('ENL1819Q', '18W'),
('ENV8400', '18W'),
('MGT8400', '18W'),
('CON8101', '19F'),
('CON8411', '19F'),
('CON8430', '19F'),
('CST8258', '19F'),
('CST8259', '19F'),
('CST8265', '19F'),
('CST8267', '19F'),
('ENL1819T', '19F'),
('WKT8100', '19F'),
('CST8253', '19S'),
('CST8254', '19S'),
('CST8255', '19S'),
('CST8256', '19S'),
('CST8257', '19S'),
('CST8110', '19W'),
('CST8209', '19W'),
('CST8250', '19W'),
('CST8260', '19W'),
('ENL1818T', '19W'),
('MAT8001', '19W'),
('MGT8100', '19W');

-- --------------------------------------------------------

--
-- Table structure for table `Registration`
--

CREATE TABLE IF NOT EXISTS `Registration` (
  `student_id` varchar(16) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `semester_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Registration`
--

INSERT INTO `Registration` (`student_id`, `course_code`, `semester_code`) VALUES
('1', 'CAD8405', '17F'),
('1', 'CON8418', '17F'),
('tam', 'ENG8404', '17F'),
('tam', 'ENG8411', '17F'),
('tam', 'ENG8454', '17F'),
('tam', 'MGT8400', '17F'),
('0001', 'CAD8400', '17S'),
('0001', 'CON8436', '17S'),
('55', 'CST8254', '17S'),
('tam', 'CST8253', '17S'),
('0001', 'CON8417', '17W'),
('0001', 'SUR8411', '17W'),
('55', 'CON8102', '17W'),
('55', 'CST8250', '17W'),
('55', 'ENL1818M', '17W'),
('1', 'CST8110', '18F'),
('tam', 'CAD8405', '18W'),
('tam', 'CON8418', '18W'),
('tam', 'ENG8328', '18W'),
('55', 'CST8267', '19F');

-- --------------------------------------------------------

--
-- Table structure for table `Semester`
--

CREATE TABLE IF NOT EXISTS `Semester` (
  `semester_code` varchar(10) NOT NULL,
  `term` enum('Fall','Winter','Summer','Spring') NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Semester`
--

INSERT INTO `Semester` (`semester_code`, `term`, `year`) VALUES
('17F', 'Fall', 2017),
('17S', 'Summer', 2017),
('17W', 'Winter', 2017),
('18F', 'Fall', 2018),
('18S', 'Summer', 2018),
('18W', 'Winter', 2018),
('19F', 'Fall', 2019),
('19S', 'Summer', 2019),
('19W', 'Winter', 2019);

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE IF NOT EXISTS `Student` (
  `student_id` varchar(16) NOT NULL,
  `name` varchar(256) NOT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Student`
--

INSERT INTO `Student` (`student_id`, `name`, `phone`, `password`) VALUES
('', 'Alina KY', '', ''),
('0001', 'Wei Gong', '613-222-3333', 'Password1'),
('1', 'Alina Kurliantseva', '613-700-4510', '2505aK'),
('2', 'Tanil Yildir', '613-700-4510', '2505tY'),
('25', 'Andrea de Boer', '613-555-5555', '2505aK'),
('5', 'ALINA KURLIANTSEVA', '613-700-4510', '2505tY'),
('55', 'ALINA KURLIANTSEVA', '613-700-4510', '2505tY'),
('777', 'ALINA KURLIANTSEVA', '613-700-4510', '2505aK'),
('tam', '<script>alert(''Alina is not my best friend'');</script>', '613-700-4510', '1Pokemon');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Course`
--
ALTER TABLE `Course`
  ADD PRIMARY KEY (`course_code`);

--
-- Indexes for table `CourseOffer`
--
ALTER TABLE `CourseOffer`
  ADD PRIMARY KEY (`course_code`,`semester_code`),
  ADD KEY `fk_course_offer_semester` (`semester_code`);

--
-- Indexes for table `Registration`
--
ALTER TABLE `Registration`
  ADD PRIMARY KEY (`student_id`,`course_code`),
  ADD KEY `semester_code` (`semester_code`),
  ADD KEY `fk_registration_course_code` (`course_code`);

--
-- Indexes for table `Semester`
--
ALTER TABLE `Semester`
  ADD PRIMARY KEY (`semester_code`);

--
-- Indexes for table `Student`
--
ALTER TABLE `Student`
  ADD PRIMARY KEY (`student_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `CourseOffer`
--
ALTER TABLE `CourseOffer`
  ADD CONSTRAINT `fk_course_offer_course` FOREIGN KEY (`course_code`) REFERENCES `Course` (`course_code`),
  ADD CONSTRAINT `fk_course_offer_semester` FOREIGN KEY (`semester_code`) REFERENCES `Semester` (`semester_code`);

--
-- Constraints for table `Registration`
--
ALTER TABLE `Registration`
  ADD CONSTRAINT `fk_registration_course_code` FOREIGN KEY (`course_code`) REFERENCES `CourseOffer` (`course_code`),
  ADD CONSTRAINT `fk_registration_semester_code` FOREIGN KEY (`semester_code`) REFERENCES `CourseOffer` (`semester_code`),
  ADD CONSTRAINT `fk_registration_student` FOREIGN KEY (`student_id`) REFERENCES `Student` (`student_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
