-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2024 at 01:54 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school-test`
--

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tags-grab` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tags-grab`) VALUES
('Body'),
('GUN'),
('None'),
('test');

-- --------------------------------------------------------

--
-- Table structure for table `words`
--

CREATE TABLE `words` (
  `duma` char(255) DEFAULT NULL,
  `znachenie` char(255) DEFAULT NULL,
  `znachenie2` char(255) DEFAULT NULL,
  `znachenie3` char(255) DEFAULT NULL,
  `znachenie4` char(255) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `time_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `words`
--

INSERT INTO `words` (`duma`, `znachenie`, `znachenie2`, `znachenie3`, `znachenie4`, `tags`, `time_added`) VALUES
('Apple', 'Ябълка', '', '', '', NULL, '2024-06-01 11:15:37'),
('Orange', 'Портокал', '', '', '', NULL, '2024-06-01 11:15:37'),
('Shot', 'Изтрел', '', '', '', NULL, '2024-06-01 11:15:37'),
('Log', 'Вписвам', '', '', '', NULL, '2024-06-01 11:15:37'),
('', '', '', '', '', NULL, '2024-06-01 11:15:37'),
('that mf clean', 'тест', '', '', '', NULL, '2024-06-01 11:15:37'),
('asdqwd asd qw asdqw', 'asdq', '', '', '', NULL, '2024-06-01 11:15:37'),
('Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo soluta facilis officia voluptate reiciendis aspernatur magnam blanditiis tempora unde fugiat?', 'sadqw', '', '', '', NULL, '2024-06-01 11:15:37'),
('Gun', 'Оръжие', '', '', '', NULL, '2024-06-01 11:15:37'),
('test', 'testt', 'test', 'test', 'test', NULL, '2024-06-01 11:15:37'),
('s', 's', 's', 's', 's', NULL, '2024-06-01 11:15:37'),
('s', 's', 's', 's', 's', NULL, '2024-06-01 11:15:37'),
('s', 's', 's', 's', 's', NULL, '2024-06-01 11:15:37'),
('2:16', '2:16', '', '', '', NULL, '2024-06-01 11:16:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tags-grab`);

--
-- Indexes for table `words`
--
ALTER TABLE `words`
  ADD KEY `tags` (`tags`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `words`
--
ALTER TABLE `words`
  ADD CONSTRAINT `words_ibfk_1` FOREIGN KEY (`tags`) REFERENCES `tags` (`tags-grab`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
