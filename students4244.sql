-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Feb 27, 2024 at 08:54 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `students4244`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

DROP TABLE IF EXISTS `contact_info`;
CREATE TABLE IF NOT EXISTS `contact_info` (
  `id` int NOT NULL AUTO_INCREMENT,
  `state` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `pincode` varchar(10) DEFAULT NULL,
  `address` text,
  `phonenumber` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `document_info`
--

DROP TABLE IF EXISTS `document_info`;
CREATE TABLE IF NOT EXISTS `document_info` (
  `id` int NOT NULL AUTO_INCREMENT,
  `resume` blob,
  `photo` blob,
  `signature` blob,
  `typist_cert` bit(1) DEFAULT NULL,
  `stenography_cert` bit(1) DEFAULT NULL,
  `computer_course_cert` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `education_info`
--

DROP TABLE IF EXISTS `education_info`;
CREATE TABLE IF NOT EXISTS `education_info` (
  `id` int NOT NULL AUTO_INCREMENT,
  `field` varchar(255) DEFAULT NULL,
  `year_of_passing` int DEFAULT NULL,
  `mark` decimal(5,2) DEFAULT NULL,
  `qualification` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

DROP TABLE IF EXISTS `exams`;
CREATE TABLE IF NOT EXISTS `exams` (
  `id` int NOT NULL AUTO_INCREMENT,
  `exam_id` int DEFAULT NULL,
  `exam_datetime` datetime DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `status` bit(1) DEFAULT b'0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_info`
--

DROP TABLE IF EXISTS `exam_info`;
CREATE TABLE IF NOT EXISTS `exam_info` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `exam_info`
--

INSERT INTO `exam_info` (`id`, `name`, `qualification`) VALUES
(1, 'Group 2', 'SSLC'),
(2, 'Group 4', 'HSC'),
(3, 'TNPSC', 'Diploma'),
(4, 'UPSC', 'Graduation'),
(5, 'IBPS PO', 'Post Graduation'),
(6, 'NDA&NA', 'SSLC'),
(7, 'RRB', 'HSC'),
(8, 'SSC CHSL', 'Diploma'),
(9, 'SSC CGL', 'Graduation'),
(10, 'CDS', 'Post Graduation'),
(11, 'State PSC', 'SSLC'),
(12, 'Civil Services', 'HSC'),
(13, 'UPSC CAPF', 'Diploma'),
(14, 'ALP', 'Graduation'),
(15, 'Defence exams', 'Post Graduation'),
(16, 'CTET exam', 'SSLC'),
(17, 'Multi tasking staff', 'HSC');

-- --------------------------------------------------------

--
-- Table structure for table `login_info`
--

DROP TABLE IF EXISTS `login_info`;
CREATE TABLE IF NOT EXISTS `login_info` (
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `createdAt` datetime NOT NULL,
  `status` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_info`
--

DROP TABLE IF EXISTS `personal_info`;
CREATE TABLE IF NOT EXISTS `personal_info` (
  `id` int NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `community` varchar(20) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `refugee` bit(1) DEFAULT NULL,
  `differently_abled` bit(1) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
