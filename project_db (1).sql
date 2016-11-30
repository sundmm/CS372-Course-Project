-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2016 at 10:05 PM
-- Server version: 5.5.50-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `CourseNumber` varchar(20) NOT NULL,
  `CourseSection` varchar(10) NOT NULL,
  `ThreadSubject` varchar(40) NOT NULL,
  `ThreadDate` datetime NOT NULL,
  `User` varchar(50) NOT NULL,
  `PostDate` datetime NOT NULL,
  `Comment` mediumtext NOT NULL,
  UNIQUE KEY `ForiegnKey` (`CourseNumber`,`CourseSection`,`ThreadSubject`,`ThreadDate`),
  KEY `CourseSection` (`CourseSection`),
  KEY `ThreadSubject` (`ThreadSubject`),
  KEY `ThreadDate` (`ThreadDate`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`CourseNumber`, `CourseSection`, `ThreadSubject`, `ThreadDate`, `User`, `PostDate`, `Comment`) VALUES
('CS372', '01', 'When is the final exam?', '2016-10-20 12:00:00', 'Steve Jobs', '2016-10-20 12:00:00', 'Does anyone know the date/time for the cs372 final exam? My dog ate my syllabus.. ¯\\_(?)_/¯');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `CourseNumber` varchar(20) NOT NULL,
  `Section` varchar(10) NOT NULL,
  `CourseName` varchar(50) NOT NULL,
  `Professor` varchar(30) NOT NULL,
  PRIMARY KEY (`CourseNumber`,`Section`),
  KEY `Section` (`Section`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`CourseNumber`, `Section`, `CourseName`, `Professor`) VALUES
('CS350', '01', 'Program Language Design', 'Ng'),
('CS372', '01', 'Web App Development', 'Dr. Chen');

-- --------------------------------------------------------

--
-- Table structure for table `thread`
--

CREATE TABLE IF NOT EXISTS `thread` (
  `CourseNumber` varchar(20) NOT NULL,
  `Section` varchar(10) NOT NULL,
  `Date` datetime NOT NULL,
  `Subject` varchar(40) NOT NULL,
  `Author` varchar(30) NOT NULL,
  PRIMARY KEY (`CourseNumber`,`Section`,`Date`,`Subject`),
  KEY `Section` (`Section`),
  KEY `ForiegnKey` (`CourseNumber`,`Section`),
  KEY `Date` (`Date`),
  KEY `Subject` (`Subject`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thread`
--

INSERT INTO `thread` (`CourseNumber`, `Section`, `Date`, `Subject`, `Author`) VALUES
('CS372', '01', '0000-00-00 00:00:00', 'Color picker help', 'test'),
('CS372', '01', '2016-10-20 12:00:00', 'When is the final exam?', 'Steve Jobs');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`) VALUES
(2, 'Alex New', 'newaj01@students.ipfw.edu', '*012D664AE4A3F39E43D62343F53D32EE6E27D71A'),
(3, 'Ben Schmidt', 'schmbl04@students.ipfw.edu', '*012D664AE4A3F39E43D62343F53D32EE6E27D71A');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`CourseNumber`) REFERENCES `thread` (`CourseNumber`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`CourseSection`) REFERENCES `thread` (`Section`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`ThreadSubject`) REFERENCES `thread` (`Subject`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `comments_ibfk_4` FOREIGN KEY (`ThreadDate`) REFERENCES `thread` (`Date`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `thread`
--
ALTER TABLE `thread`
  ADD CONSTRAINT `thread_ibfk_1` FOREIGN KEY (`CourseNumber`) REFERENCES `courses` (`CourseNumber`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `thread_ibfk_2` FOREIGN KEY (`Section`) REFERENCES `courses` (`Section`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
