-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2017 at 01:31 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `security`
--
CREATE DATABASE IF NOT EXISTS `security` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `security`;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `company_ID` int(11) NOT NULL,
  `company_name` varchar(80) NOT NULL,
  `location` varchar(80) NOT NULL,
  `company_description` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `staff` int(11) NOT NULL,
  `contact` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  PRIMARY KEY (`company_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_ID`, `company_name`, `location`, `company_description`, `url`, `staff`, `contact`, `email`) VALUES
(2000, 'KK Security', 'ntinda', 'we ar bak in business', 'http://localhost/security_system/logos/PadLock-icon.png', 26, '0789239742', 'police@gmail.com'),
(2001, 'NDUGARI', 'kiwatule', 'We are Located along Kiwatule', 'http://localhost/security_system/logos/default_logo.png', 10, '0756124598', ''),
(2002, 'savanna', 'kampala', 'the best security company ever', 'http://localhost/security_system/logos/default_logo.png', 54, '0789239742', 'savanna@gmail.com'),
(2003, 'Securico', 'Banda', 'the best security company ever', 'http://localhost/security_system/logos/security-icon.png', 25, '0789239742', 'kk@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `empl_ID` int(11) NOT NULL AUTO_INCREMENT,
  `empl_fname` varchar(80) NOT NULL,
  `empl_lname` varchar(80) NOT NULL,
  `empl_position` varchar(80) NOT NULL,
  `empl_dob` date NOT NULL,
  `empl_company` varchar(80) NOT NULL,
  `empl_criminalrecord` varchar(120) NOT NULL,
  `empl_recommendation` varchar(150) NOT NULL,
  `url` varchar(255) NOT NULL,
  `contact` varchar(80) NOT NULL,
  `email` varchar(90) NOT NULL,
  PRIMARY KEY (`empl_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3005 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empl_ID`, `empl_fname`, `empl_lname`, `empl_position`, `empl_dob`, `empl_company`, `empl_criminalrecord`, `empl_recommendation`, `url`, `contact`, `email`) VALUES
(3000, 'tom', 'bob', 'officer', '1972-09-04', 'ndugari', 'clean record', 'hardworking', '', '', ''),
(3001, 'henry', 'katwe', 'banker', '1986-09-14', 'savanna', 'thief', 'dont hire', '', '', ''),
(3002, 'wakata', 'tom', 'secretary', '1987-08-11', 'KK security', 'clean', 'good worker', '', '', ''),
(3003, 'tony', 'stark', 'engineer', '1980-08-09', 'special forces', 'clean', 'Good ,talented engineer', 'http://localhost/security_system/employees/vlcsnap-2017-03-25-23h49m38s982.png', '0789239742', 'tony.stark@gmail.com'),
(3004, 'mark', 'kabi', 'checker', '1973-08-09', 'kk', 'no criminal record', 'he is a lazy human, dont hire', 'http://localhost/security_system/employees/man-icon.png', '0789239742', 'mark.kabi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

CREATE TABLE IF NOT EXISTS `employer` (
  `emp_ID` int(11) NOT NULL AUTO_INCREMENT,
  `emp_uname` varchar(80) NOT NULL,
  `emp_fname` varchar(80) NOT NULL,
  `emp_lname` varchar(80) NOT NULL,
  `company_ID` int(11) NOT NULL,
  `emp_password` varchar(100) NOT NULL,
  `rank` varchar(50) NOT NULL,
  `url` varchar(255) NOT NULL,
  `email` varchar(80) NOT NULL,
  `contact` varchar(15) NOT NULL,
  PRIMARY KEY (`emp_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1006 ;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`emp_ID`, `emp_uname`, `emp_fname`, `emp_lname`, `company_ID`, `emp_password`, `rank`, `url`, `email`, `contact`) VALUES
(1000, 'conrad', 'mugisha', 'ariho', 2001, '12345', 'CEO', 'http://localhost/security_system/employer/def.png', '', ''),
(1001, 'cmugisha', 'ariho', 'ben', 2001, 'ariho12345', 'director', 'http://localhost/security_system/employer/def.png', '', ''),
(1002, 'nel', 'frog', 'kikele', 2001, 'frog12345', 'admin', 'http://localhost/security_system/employer/def.png', '', ''),
(1003, 'testing', 'mugisha', 'conrad', 2001, 'testing12345', 'Assistant Manager', 'http://localhost/security_system/employer/vlcsnap-2017-03-03-20h20m53s0.png', 'one.two@gmail.com', '0789239742'),
(1004, 'roman', 'roman', 'reigns', 2002, 'roman12345', 'banking officer', 'http://localhost/security_system/employer/vlcsnap-2017-03-09-09h55m48s200.png', 'roman@gmail.com', '0789239742'),
(1005, 'banda', 'kakuru', 'badman', 2003, 'kakuru12345', 'Manager', 'http://localhost/security_system/employer/Policeman-icon.png', 'kakuru@gmail.com', '0789239742');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
