-- phpMyAdmin SQL Dump
-- version 4.4.15.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2018 at 12:01 PM
-- Server version: 5.6.25
-- PHP Version: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paomi`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `ID` int(10) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ID`, `Name`) VALUES
(1, 'General News'),
(2, 'Sports'),
(3, 'Breaking News'),
(4, 'Lost and Found'),
(8, 'Current Affairs');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `ID` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `posted_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `posted_by` int(10) NOT NULL,
  `no_like` int(50) NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`ID`, `cat_id`, `title`, `body`, `image`, `posted_on`, `posted_by`, `no_like`, `isActive`) VALUES
(2, 2, 'NEROCA wins cc meet', 'Neroca won the match by 10-0', 'header-bg.jpg', '2017-12-03 13:41:32', 1, 10, 1),
(3, 8, 'News title', 'News body', 'image.jpg', '2017-12-03 13:41:22', 2, 0, 1),
(4, 8, 'News title', 'News body john''s mother', 'image.jpg', '2017-12-03 13:41:20', 2, 0, 1),
(5, 8, 'News title', 'News body', 'image.jpg', '2017-12-03 13:41:29', 1, 0, 1),
(6, 8, 'new task testing', 'yes teinh', 'heloo', '2017-12-03 13:41:27', 1, 0, 1),
(7, 8, 'News title', 'News body', 'image.jpg', '2017-12-03 13:41:25', 1, 0, 1),
(8, 8, 'News title', 'News body', 'image.jpg', '2017-12-03 13:41:17', 1, 0, 1),
(9, 8, 'News title', 'News body', 'image.jpg', '2017-12-03 13:41:13', 1, 0, 1),
(10, 8, 'News title', 'News body', 'image.jpg', '2017-12-03 13:55:31', 1, 0, 0),
(11, 0, '', '', '', '2017-12-03 13:59:35', 0, 0, 0),
(12, 0, '', '', '', '2017-12-03 13:59:42', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `image_url`
--

CREATE TABLE IF NOT EXISTS `image_url` (
  `id` int(125) NOT NULL,
  `url` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `like_table`
--

CREATE TABLE IF NOT EXISTS `like_table` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `new_id` int(11) NOT NULL,
  `is_like` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `like_table`
--

INSERT INTO `like_table` (`id`, `user_id`, `new_id`, `is_like`) VALUES
(1, 1, 2, 1),
(2, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `ID` int(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `profile_url` varchar(200) NOT NULL,
  `facebook_id` varchar(200) NOT NULL,
  `isActive` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `name`, `profile_url`, `facebook_id`, `isActive`) VALUES
(1, 'Nengkhoiba Chungkham', 'image.png', 'adadadadqeqe1313', 1),
(2, 'Tom', 'http://kajdkajkj.com', '12121313kndsan', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `like_table`
--
ALTER TABLE `like_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `like_table`
--
ALTER TABLE `like_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
