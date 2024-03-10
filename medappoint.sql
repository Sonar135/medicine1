-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2024 at 04:45 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medappoint`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `phone`, `email`, `password`, `user_type`) VALUES
(1, 'Kenneth ken', 'vefidi135@gmail.com', 'vefidi135@gmail.com', '$2y$10$R/mjEUVFSRTWAdBvRAkzUe4PQllkoJwYc/b/rblZal1xB5xjTiKyu', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `patient_id` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `consulting_doc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `name`, `patient_id`, `email`, `date`, `time`, `reason`, `status`, `consulting_doc`) VALUES
(1, 'Victor Efidi okechukwu', 'pat01', 'vefidi135@gmail.com', '2024-03-14', '11am-12am ', 'ailment', 'pending', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis`
--

CREATE TABLE `diagnosis` (
  `id` int(11) NOT NULL,
  `patient` varchar(255) DEFAULT NULL,
  `test_done` varchar(255) DEFAULT NULL,
  `chief_complaint` varchar(255) DEFAULT NULL,
  `medications` varchar(255) DEFAULT NULL,
  `doctor` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `test_for` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `doctor_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `date_birth` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `patient_id` varchar(255) DEFAULT NULL,
  `medical_history` mediumtext DEFAULT NULL,
  `user_type` varchar(500) NOT NULL,
  `prefix` varchar(500) NOT NULL,
  `phone` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `date_birth`, `gender`, `email`, `password`, `nationality`, `patient_id`, `medical_history`, `user_type`, `prefix`, `phone`) VALUES
(1, 'Victor Efidi okechukwu', '2003-01-03', 'male', 'vefidi135@gmail.com', '$2y$10$1oKqWY0u.ZoivJ.6pRYcw.cKM4tdnXLJSHAAI3C92PM.pEYy5qRWe', 'Nigerian', 'pat01', 'dcdcdc', 'patient', 'pat', 'vefidi135@gmail.com');

--
-- Triggers `patients`
--
DELIMITER $$
CREATE TRIGGER `trg_generate_patient_id` BEFORE INSERT ON `patients` FOR EACH ROW BEGIN
    DECLARE max_id INT;
    
    SELECT IFNULL(MAX(id), 0) INTO max_id FROM patients;
    
    SET NEW.patient_id = CONCAT(NEW.prefix, RIGHT(CONCAT('00', max_id + 1), 2));
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `diagnosis`
--
ALTER TABLE `diagnosis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
