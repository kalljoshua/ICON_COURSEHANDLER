-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 10, 2016 at 08:53 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `course_handler`
--

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE IF NOT EXISTS `college` (
  `idcollege` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone_no` varchar(45) DEFAULT NULL,
  `box_no` varchar(45) DEFAULT NULL,
  `details` text,
  `iduniversity` int(11) NOT NULL,
  PRIMARY KEY (`idcollege`),
  KEY `fk_college_university` (`iduniversity`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`idcollege`, `name`, `email`, `phone_no`, `box_no`, `details`, `iduniversity`) VALUES
(1, 'College of Computing and information Technolo', 'mails@mak.ac.ug', '+256 414 256 814', 'P.O Box 22675, Kampala', 'Our goal is to support businesses create a total experience for their customers, with the aim of growing their customer base and maximising customer lifetime value.', 1),
(2, 'School of Computing', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `idcourse` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `tuition` varchar(45) NOT NULL,
  `duration` int(11) NOT NULL,
  `cp_pujab` float NOT NULL,
  `cp_private` float DEFAULT NULL,
  `details` text,
  `idschool` int(11) NOT NULL,
  PRIMARY KEY (`idcourse`),
  KEY `fk_course_school1` (`idschool`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`idcourse`, `name`, `tuition`, `duration`, `cp_pujab`, `cp_private`, `details`, `idschool`) VALUES
(1, 'Software Engineering', '1,300,000', 4, 42, 32, 'Magpie Digital is pursuing a Long Tail business model. The reason for this approach is the nature of service that Magpie Digital is setting out to provide. ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `essential`
--

CREATE TABLE IF NOT EXISTS `essential` (
  `idessential` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `idcourse` int(11) NOT NULL,
  PRIMARY KEY (`idessential`),
  KEY `fk_essential_course1` (`idcourse`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `opportunity`
--

CREATE TABLE IF NOT EXISTS `opportunity` (
  `idopportunity` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `idcourse` int(11) NOT NULL,
  PRIMARY KEY (`idopportunity`),
  KEY `fk_opportunity_course1` (`idcourse`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `relevant`
--

CREATE TABLE IF NOT EXISTS `relevant` (
  `idrelevant` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `idcourse` int(11) NOT NULL,
  PRIMARY KEY (`idrelevant`),
  KEY `fk_relevant_course1` (`idcourse`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE IF NOT EXISTS `school` (
  `idschool` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `idcollege` int(11) NOT NULL,
  PRIMARY KEY (`idschool`),
  KEY `fk_school_college1` (`idcollege`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`idschool`, `name`, `idcollege`) VALUES
(0, 'School of Computing', 1);

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

CREATE TABLE IF NOT EXISTS `university` (
  `iduniversity` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone_no` varchar(45) DEFAULT NULL,
  `box_no` varchar(45) DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  `details` text,
  PRIMARY KEY (`iduniversity`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `university`
--

INSERT INTO `university` (`iduniversity`, `name`, `email`, `phone_no`, `box_no`, `location`, `details`) VALUES
(1, 'Makerere University', 'mails@mak.ac.ug', '+256 414 256 814', 'P.O Box 22675, Kampala', 'Wandegeya, Kampala', 'We will work on fixing that right away. Meanwhile, you may return to dashboard or try using the search form.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `number` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `college`
--
ALTER TABLE `college`
  ADD CONSTRAINT `fk_college_university` FOREIGN KEY (`iduniversity`) REFERENCES `university` (`iduniversity`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `fk_course_school1` FOREIGN KEY (`idschool`) REFERENCES `school` (`idschool`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `essential`
--
ALTER TABLE `essential`
  ADD CONSTRAINT `fk_essential_course1` FOREIGN KEY (`idcourse`) REFERENCES `course` (`idcourse`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `opportunity`
--
ALTER TABLE `opportunity`
  ADD CONSTRAINT `fk_opportunity_course1` FOREIGN KEY (`idcourse`) REFERENCES `course` (`idcourse`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `relevant`
--
ALTER TABLE `relevant`
  ADD CONSTRAINT `fk_relevant_course1` FOREIGN KEY (`idcourse`) REFERENCES `course` (`idcourse`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `school`
--
ALTER TABLE `school`
  ADD CONSTRAINT `fk_school_college1` FOREIGN KEY (`idcollege`) REFERENCES `college` (`idcollege`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
