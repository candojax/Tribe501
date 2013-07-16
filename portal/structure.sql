-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2013 at 11:12 PM
-- Server version: 5.5.31-0ubuntu0.13.04.1
-- PHP Version: 5.4.9-4ubuntu2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `revosvc`
--
CREATE DATABASE IF NOT EXISTS `revosvc` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `revosvc`;

-- --------------------------------------------------------

--
-- Table structure for table `agegroups`
--

CREATE TABLE IF NOT EXISTS `agegroups` (
  `agegrp-id` int(11) NOT NULL AUTO_INCREMENT,
  `agegrp` text NOT NULL,
  PRIMARY KEY (`agegrp-id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `alerts`
--

CREATE TABLE IF NOT EXISTS `alerts` (
  `alt_id` int(11) NOT NULL AUTO_INCREMENT,
  `alt_name` text NOT NULL,
  `alt_date` date NOT NULL,
  `alt_text` text NOT NULL,
  PRIMARY KEY (`alt_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `artid` int(5) NOT NULL AUTO_INCREMENT,
  `author` varchar(255) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `comments` text NOT NULL,
  `dateposted` date NOT NULL,
  `categoryID` text NOT NULL,
  `contents` text NOT NULL,
  `artimg` text NOT NULL,
  PRIMARY KEY (`artid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE IF NOT EXISTS `classes` (
  `clss-id` int(11) NOT NULL AUTO_INCREMENT,
  `clss-age` enum('Adults','Children','Any') NOT NULL,
  `clss-name` text NOT NULL,
  `clss-prgm` text NOT NULL,
  `clss-lvl` int(11) NOT NULL,
  `clss-inst` text NOT NULL,
  `clss-seats` int(11) NOT NULL,
  `clss-dscptn` text NOT NULL,
  `clss-roster` text NOT NULL,
  `clss-price` decimal(10,2) NOT NULL,
  `clss-begin` date NOT NULL,
  `clss-over` date NOT NULL,
  `clss-stime` time NOT NULL,
  `clss-ftime` time NOT NULL,
  `clss-img` text NOT NULL,
  PRIMARY KEY (`clss-id`),
  UNIQUE KEY `class-id` (`clss-id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `com_id` int(11) NOT NULL AUTO_INCREMENT,
  `com_usr` int(11) NOT NULL,
  `com_dis` text NOT NULL,
  `post_id_fk` int(11) NOT NULL,
  PRIMARY KEY (`com_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_admin` text NOT NULL,
  `event_date` date NOT NULL,
  `event_description` text NOT NULL,
  `event_seats` int(11) NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

-- --------------------------------------------------------

--
-- Table structure for table `forumreplies`
--

CREATE TABLE IF NOT EXISTS `forumreplies` (
  `parent` int(11) NOT NULL,
  `replyid` int(11) NOT NULL AUTO_INCREMENT,
  `commenter` int(11) NOT NULL,
  `comdate` datetime NOT NULL,
  `replycontent` text NOT NULL,
  PRIMARY KEY (`replyid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `forumtopics`
--

CREATE TABLE IF NOT EXISTS `forumtopics` (
  `topicid` int(11) NOT NULL AUTO_INCREMENT,
  `opid` int(11) NOT NULL,
  `title` text NOT NULL,
  `posted` datetime NOT NULL,
  `postcontent` text NOT NULL,
  PRIMARY KEY (`topicid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `google_users`
--

CREATE TABLE IF NOT EXISTS `google_users` (
  `google_id` decimal(21,0) NOT NULL,
  `usr_id` int(11) NOT NULL AUTO_INCREMENT,
  `usr_code` int(11) NOT NULL DEFAULT '0',
  `google_name` varchar(60) NOT NULL,
  `google_email` varchar(60) NOT NULL,
  `google_link` varchar(60) NOT NULL,
  `google_picture_link` varchar(60) NOT NULL,
  PRIMARY KEY (`google_id`),
  UNIQUE KEY `google_id` (`google_id`),
  KEY `usr_id` (`usr_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE IF NOT EXISTS `instructors` (
  `inst-id` int(11) NOT NULL AUTO_INCREMENT,
  `inst-name` text NOT NULL,
  `inst-email` text NOT NULL,
  PRIMARY KEY (`inst-id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `pageid` int(4) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `template` text NOT NULL,
  `leftcol` text NOT NULL,
  `content` text NOT NULL,
  `rightcol` text NOT NULL,
  PRIMARY KEY (`pageid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `postcats`
--

CREATE TABLE IF NOT EXISTS `postcats` (
  `catid` int(5) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`catid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE IF NOT EXISTS `programs` (
  `pgmid` int(11) NOT NULL AUTO_INCREMENT,
  `pgm-name` text NOT NULL,
  PRIMARY KEY (`pgmid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `regd`
--

CREATE TABLE IF NOT EXISTS `regd` (
  `stdid` int(11) NOT NULL,
  `courses` text NOT NULL,
  UNIQUE KEY `stdid` (`stdid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registered`
--

CREATE TABLE IF NOT EXISTS `registered` (
  `courseid` int(11) NOT NULL,
  `stdid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `stu_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin` int(1) NOT NULL DEFAULT '0',
  `stu_usrname` text NOT NULL,
  `stu_pass` varchar(200) NOT NULL,
  `stu_name` text NOT NULL,
  `stu_status` set('0','1') NOT NULL,
  `stu_lvl` set('1','2','3','4','dt','appr') NOT NULL,
  `stu_cmpfnd` set('0','1') NOT NULL,
  `stu_empl` text NOT NULL,
  `stu_phone` varchar(15) NOT NULL,
  `stu_phone2` varchar(15) NOT NULL,
  `stu_email` text NOT NULL,
  `stu_addr` text NOT NULL,
  `stu_dob` date NOT NULL,
  `stu_emcon1` text NOT NULL,
  `stu_emcon2` text NOT NULL,
  `stu_trainyr` year(4) NOT NULL,
  `enrolled` varchar(255) NOT NULL,
  PRIMARY KEY (`stu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE IF NOT EXISTS `tickets` (
  `tktid` int(11) NOT NULL AUTO_INCREMENT,
  `tktusr` text NOT NULL,
  `tktsub` text NOT NULL,
  `tktmsg` text NOT NULL,
  PRIMARY KEY (`tktid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE IF NOT EXISTS `user_data` (
  `usr_id` int(11) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `job` text NOT NULL,
  `address` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `zip` int(5) NOT NULL,
  `othr_schls` text NOT NULL,
  `cmpltd` text NOT NULL,
  PRIMARY KEY (`usr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
