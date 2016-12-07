-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2016 at 01:30 AM
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
  `User` varchar(50) NOT NULL,
  `PostDate` datetime NOT NULL,
  `Comment` mediumtext NOT NULL,
  KEY `CourseSection` (`CourseSection`),
  KEY `ThreadSubject` (`ThreadSubject`),
  KEY `ForiegnKey` (`CourseNumber`,`CourseSection`,`ThreadSubject`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`CourseNumber`, `CourseSection`, `ThreadSubject`, `User`, `PostDate`, `Comment`) VALUES
('CS372', '01', 'When is the final exam?', 'Alex New', '2016-12-04 17:01:14', 'Does anyone know the date/time for the cs372 final exam? My dog ate my syllabus.. Â¯\\_(ãƒ„)_/Â¯'),
('CS372', '01', 'Color picker help', 'Alex New', '2016-12-05 20:20:32', 'How do I use the color picker?'),
('CS350', '01', 'Homework 4', 'Grace', '2016-12-05 20:36:15', 'Does anyone have any clue when the last homework is due? I haven''t started it, but I don''t want to until a day before it''s due, I work best under pressure.'),
('CS364', '02', 'Lectures', 'Grace', '2016-12-05 20:37:45', 'Does anyone know what happened the last 16 weeks? I keep watching Star Trek instead of sleeping and don''t remember a thing from all semester!'),
('CS368', '05', 'Project', 'Grace', '2016-12-05 20:38:33', 'So have you guys started the project yet? Apparently we have presentations this week or something? I don''t know, I kind of forgot I was even enrolled in this class.'),
('CS372', '01', 'Presentations??', 'Grace', '2016-12-05 20:40:00', 'Since when do we have presentations? I thought we could just mock up some Powerpoints and slide through, does this mean we were supposed to actually do work? Does anyone know who''s even in my group?'),
('VCD-H205', '01', 'Why?', 'Grace', '2016-12-05 20:40:32', 'I''m a CS major, why am I even in this class? Who are you people?'),
('CS350', '01', 'Homework 4', 'Grace', '2016-12-05 20:40:55', 'Oh never mind, apparently that was due like a month ago.'),
('CS372', '01', 'When is the final exam?', 'Grace', '2016-12-05 20:41:24', 'I thought we didn''t have one, what are you talking about?'),
('CS372', '01', 'Color picker help', 'Grace', '2016-12-05 20:42:29', 'Well, first you open MS Paint...'),
('VCD-H205', '01', 'Why?', 'Bob', '2016-12-05 22:44:35', 'As a Math major, I was wondering the same thing! At least my selfie game will improve from this course.'),
('CS364', '02', 'Lectures', 'James T. Kirk', '2016-12-05 22:48:31', 'Must''ve been a memory wipe from some Klingons! Or accidentally DROP''d the tables from this semester.'),
('CS364', '02', 'Lectures', 'Spock', '2016-12-05 22:51:19', 'Today, we covered the topic of Java Database Connectivity, also known as JDBC. Regards.'),
('CS372', '01', 'When is the final exam?', 'Mikah', '2016-12-05 22:53:41', 'It''s probably on a Tuesday.');

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
('CS350', '01', 'Programming Language Design', 'Dr. Ng'),
('CS364', '02', 'Intro to Database Systems', 'Dr. Yoo'),
('CS368', '05', 'Human Computer Interaction', 'Dr. Hayes'),
('CS372', '01', 'Web App Development', 'Dr. Chen'),
('CS472', '02', 'Operating Systems Design', 'Dr. Liu'),
('MA175', '42', 'Intro Discrete Math', 'Dr. Akkari'),
('VCD-H205', '01', 'History of Photography', 'Dr. Heister');

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
('CS350', '01', '2016-12-05 20:36:15', 'Homework 4', 'Grace'),
('CS364', '02', '2016-12-05 20:37:45', 'Lectures', 'Grace'),
('CS368', '05', '2016-12-05 20:38:33', 'Project', 'Grace'),
('CS372', '01', '2016-12-04 17:01:14', 'When is the final exam?', 'Alex New'),
('CS372', '01', '2016-12-05 20:20:32', 'Color picker help', 'Alex New'),
('CS372', '01', '2016-12-05 20:40:00', 'Presentations??', 'Grace'),
('VCD-H205', '01', '2016-12-05 20:40:32', 'Why?', 'Grace');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`) VALUES
(2, 'Alex New', 'newaj01@students.ipfw.edu', '*012D664AE4A3F39E43D62343F53D32EE6E27D71A'),
(3, 'Grace', 'mavige01@students.ipfw.edu', '*E44BF0E0E5FCA2B674D48B12A36263CF3E8EB439'),
(4, 'Bob', 'bob@ipfw.edu', '*2470C0C06DEE42FD1618BB99005ADCA2EC9D1E19'),
(5, 'James T. Kirk', 'jim@ipfw.edu', '*2470C0C06DEE42FD1618BB99005ADCA2EC9D1E19'),
(6, 'Spock', 'spock@ipfw.edu', '*2470C0C06DEE42FD1618BB99005ADCA2EC9D1E19'),
(7, 'Mikah', 'm@ipfw.edu', '*2470C0C06DEE42FD1618BB99005ADCA2EC9D1E19'),
(8, 'Carter Chase', 'stevej@students.ipfw.edu', '*6691484EA6B50DDDE1926A220DA01FA9E575C18A');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`CourseNumber`) REFERENCES `thread` (`CourseNumber`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`CourseSection`) REFERENCES `thread` (`Section`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`ThreadSubject`) REFERENCES `thread` (`Subject`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `thread`
--
ALTER TABLE `thread`
  ADD CONSTRAINT `thread_ibfk_1` FOREIGN KEY (`CourseNumber`) REFERENCES `courses` (`CourseNumber`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `thread_ibfk_2` FOREIGN KEY (`Section`) REFERENCES `courses` (`Section`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
