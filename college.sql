-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2022 at 09:20 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `college`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `UserName` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`UserName`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(20) NOT NULL,
  `course_duration` int(11) NOT NULL,
  `course_fees` varchar(20) NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_duration`, `course_fees`) VALUES
(5, 'IT   ', 3, '10000    '),
(9, 'MECH ', 3, '15000 '),
(11, 'ETC', 3, '15000'),
(13, 'Civil', 3, '10000');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_name` varchar(50) NOT NULL,
  `news_desc` text NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_name`, `news_desc`) VALUES
(3, 'Testing ', 'TEsting Message'),
(4, 'Testing ', 'Update Message');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `sid` int(11) NOT NULL,
  `sname` varchar(20) NOT NULL,
  `sbirthdate` varchar(30) NOT NULL,
  `scourse` varchar(20) NOT NULL,
  `semail` varchar(30) NOT NULL,
  `smobile` varchar(20) NOT NULL,
  `sgender` varchar(10) NOT NULL,
  `sfees` varchar(10) NOT NULL,
  `saddress` varchar(100) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sid`, `sname`, `sbirthdate`, `scourse`, `semail`, `smobile`, `sgender`, `sfees`, `saddress`) VALUES
(1, 'Amol', '2022-04-06', 'IT   ', 'amol@gmail.com', '9763206009', 'male', '20000', 'Pune'),
(2, 'Sagar', '2022-04-25', 'IT   ', 'sagar@gmail.com', '1245788956', 'male', '10000', 'Pune');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `Course_id` int(11) NOT NULL AUTO_INCREMENT,
  `Course_name` varchar(50) NOT NULL,
  `Course_semister` varchar(50) NOT NULL,
  `Course_subject` varchar(50) NOT NULL,
  PRIMARY KEY (`Course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`Course_id`, `Course_name`, `Course_semister`, `Course_subject`) VALUES
(3, 'IT   ', 'First', 'English'),
(4, 'IT   ', 'First', 'Basic Science'),
(5, 'IT   ', 'First', 'Basic Mathamatics'),
(6, 'IT   ', 'Second', 'Elements of Electrical Engg'),
(7, 'IT   ', 'Second', 'Applied Maths'),
(8, 'IT   ', 'Second', 'Basic Electronics'),
(9, 'IT   ', 'First', 'Programming in C');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `tid` int(11) NOT NULL,
  `tname` varchar(20) NOT NULL,
  `tqualification` varchar(20) NOT NULL,
  `tfaculty` varchar(10) NOT NULL,
  `tdesignation` varchar(20) NOT NULL,
  `temail` varchar(30) NOT NULL,
  `tmobile` varchar(20) NOT NULL,
  `tgender` varchar(10) NOT NULL,
  `taddress` varchar(50) NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`tid`, `tname`, `tqualification`, `tfaculty`, `tdesignation`, `temail`, `tmobile`, `tgender`, `taddress`) VALUES
(1, 'Amol', 'BEIT', 'IT   ', 'Principle', 'amol@gmail.com', '9763206009', 'male', 'Pune'),
(2, 'Sagar Balasaheb Vikh', 'BE IT', 'MECH ', 'Professor', 'sagar@gmail.com', '9763206009', 'male', 'Loni');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
