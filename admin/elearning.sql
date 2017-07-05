-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2017 at 09:27 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

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
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `username` varchar(40) NOT NULL,
  `name` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `type` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`username`, `name`, `password`, `type`) VALUES
('adi', 'adit', 'adit', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `subject` int(11) NOT NULL,
  `topic` varchar(45) NOT NULL,
  `quizid` int(11) NOT NULL,
  `validity` int(11) NOT NULL,
  `q1` varchar(200) NOT NULL,
  `q2` varchar(200) NOT NULL,
  `q3` varchar(200) NOT NULL,
  `q4` varchar(200) NOT NULL,
  `q5` varchar(200) NOT NULL,
  `a1` varchar(1) NOT NULL,
  `a2` varchar(1) NOT NULL,
  `a3` varchar(1) NOT NULL,
  `a4` varchar(1) NOT NULL,
  `a5` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`subject`, `topic`, `quizid`, `validity`, `q1`, `q2`, `q3`, `q4`, `q5`, `a1`, `a2`, `a3`, `a4`, `a5`) VALUES
(2, 'CONCURRENT PROGRAMING', 1, 1, '1. What is a data type in which expressions are stored in places identified by integer indexes?\r\na) Structure\r\nb) List\r\nc) Array\r\nd) None of the mentioned', '1. What is a data type in which expressions are stored in places identified by integer indexes?\r\na) Structure\r\nb) List\r\nc) Array\r\nd) None of the mentioned', '1. What is a data type in which expressions are stored in places identified by integer indexes?\r\na) Structure\r\nb) List\r\nc) Array\r\nd) None of the mentioned', '1. What is a data type in which expressions are stored in places identified by integer indexes?\r\na) Structure\r\nb) List\r\nc) Array\r\nd) None of the mentioned', '1. What is a data type in which expressions are stored in places identified by integer indexes?\r\na) Structure\r\nb) List\r\nc) Array\r\nd) None of the mentioned', 'c', 'c', 'c', 'c', 'c');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `topic` varchar(45) NOT NULL,
  `score` int(11) NOT NULL,
  `username` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `topicid` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `subject` int(1) NOT NULL,
  `link` varchar(200) NOT NULL,
  `validity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topicid`, `name`, `subject`, `link`, `validity`) VALUES
(1, 'CONCURRENT PROGRAMING', 2, 'https://www.w3schools.com', 1),
(2, 'PARALLEL PROGRAMING', 2, 'https://www.google.com', 1),
(3, 'ASSEMBLY LANGUAGE', 2, 'https://www.google.com', 0);

--
-- Indexes for dumped tables
--

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
