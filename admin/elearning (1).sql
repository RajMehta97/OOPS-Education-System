-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2017 at 02:48 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT 'Untitled.txt',
  `mime` varchar(50) NOT NULL DEFAULT 'text/plain',
  `size` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `data` mediumblob NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`username`, `password`, `name`, `type`) VALUES
('$ach', '1234', 'Sanchi Gupta', 'administrator'),
('dnizhu', '1234', 'Nishant', 'student'),
('rajmehta97', '1234', 'Raj Mehta', 'professor');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `quizid` int(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `subject` varchar(10) NOT NULL,
  `validity` varchar(4) NOT NULL,
  `q1` varchar(500) NOT NULL,
  `q2` varchar(500) NOT NULL,
  `q3` varchar(500) NOT NULL,
  `q4` varchar(500) NOT NULL,
  `q5` varchar(500) NOT NULL,
  `a1` varchar(2) NOT NULL,
  `a2` varchar(2) NOT NULL,
  `a3` varchar(2) NOT NULL,
  `a4` varchar(2) NOT NULL,
  `a5` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`quizid`, `name`, `subject`, `validity`, `q1`, `q2`, `q3`, `q4`, `q5`, `a1`, `a2`, `a3`, `a4`, `a5`) VALUES
(1, 'name', 'subject', '0', '$q1', '$q2', '$q3', '$q4', '$q5', '$a', '$a', '$a', '$a', '$a'),
(2, '`jkkjkj', 'hiuj', '0', 'kjkjkjl', 'kjlkjlkj', 'kljlkjlkj', 'kjlkjlkj', 'lkjkjlkj', 'kj', 'kj', 'lk', 'lk', 'lj');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `topicid` int(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `file` varchar(200) NOT NULL,
  `valid` varchar(20) NOT NULL,
  `subject` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topicid`, `name`, `file`, `valid`, `subject`) VALUES
(2, '', '195705-200.png', '0', ''),
(3, 'dfg', 'Joseph.jpg', '0', ''),
(4, 'dfg', '0', '0', ''),
(6, 'dfg', 'uploads/Joseph.jpg', '0', ''),
(7, 'dfg', 'uploads/Joseph.jpg', '0', ''),
(8, '234er', 'uploads/BUDGET -Marketing Workshop.pdf', '0', ''),
(9, 'vkdjf', 'kfdm.txt', '0', '2'),
(10, 'vkdjf', 'kfdm.txt', '0', '2'),
(12, '123ds', 'uploads/adders.pdf', '0', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`quizid`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topicid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `quizid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `topicid` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
