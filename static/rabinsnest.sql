-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 30, 2021 at 06:23 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id16408701_rabinsnest`
--

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `user` varchar(16) DEFAULT NULL,
  `friend` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`user`, `friend`) VALUES
('sachin', 'pegasus'),
('pegasus', 'sachin'),
('HERO', 'sachin'),
('Anubhav', 'sachin'),
('sachin', 'Midoriya'),
('rinku', 'Midoriya'),
('sachin', 'Anubhav'),
('pegasus', 'hardik'),
('Anubhav', 'hardik'),
('rinku', 'hardik'),
('sachin', 'hardik'),
('HERO', 'hardik'),
('Horror', 'hardik'),
('Anubhav', 'Anubhavjain'),
('sachin', 'Anubhavjain'),
('Anubhav', 'SachinJangir');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `user` varchar(16) DEFAULT NULL,
  `pass` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`user`, `pass`) VALUES
('sdfsdf', 'dfsdf'),
('sachin', 'hiii'),
('pegasus', 'peg'),
('rinku', '1234'),
('HERO', '1234'),
('Anubhav', '123'),
('Midoriya', 'Midoriya'),
('Horror', 'Bug22horror'),
('hardik', 'hardik'),
('Anubhavjain', 'Anubhav123'),
('jangir', '12345'),
('hi', '12'),
('SachinJangir', '123');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `auth` varchar(16) DEFAULT NULL,
  `recip` varchar(16) DEFAULT NULL,
  `pm` char(1) DEFAULT NULL,
  `time` int(10) UNSIGNED DEFAULT NULL,
  `message` varchar(4096) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `auth`, `recip`, `pm`, `time`, `message`) VALUES
(1, 'sachin', 'pegasus', '0', 1616000431, 'hii pegasus'),
(2, 'pegasus', 'pegasus', '0', 1616000451, 'hii sachin'),
(6, 'sachin', 'sachin', '0', 1616063891, 'kkj'),
(7, 'rinku', 'sachin', '0', 1616073321, 'hgkjhk'),
(8, 'HERO', 'sachin', '1', 1616081253, 'this is my mesage to sachin in private'),
(9, 'HERO', 'Anubhav', '1', 1616081283, 'are bsdk'),
(10, 'Horror', 'Horror', '1', 1616085449, 'Ggghfb'),
(11, 'Anubhavjain', 'Anubhavjain', '1', 1621586506, 'Hello'),
(12, 'hi', 'hi', '0', 1626280705, 'hi there\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `user` varchar(16) DEFAULT NULL,
  `text` varchar(4096) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`user`, `text`) VALUES
('sachin', 'hey there, this is my nest!'),
('Midoriya', 'OAK IS LOB'),
('hi', 'I am coding this.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD KEY `user` (`user`(6)),
  ADD KEY `friend` (`friend`(6));

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD KEY `user` (`user`(6));

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth` (`auth`(6)),
  ADD KEY `recip` (`recip`(6));

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD KEY `user` (`user`(6));

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
