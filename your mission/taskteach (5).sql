-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2024 at 10:01 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taskteach`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `lesson_id` int(11) NOT NULL,
  `lesson_name` varchar(100) NOT NULL,
  `lesson_day_of_week` varchar(20) NOT NULL,
  `lesson_time` time NOT NULL,
  `task_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`lesson_id`, `lesson_name`, `lesson_day_of_week`, `lesson_time`, `task_date`) VALUES
(4, 'المهمة رقم واحد', 'الأحد', '00:02:00', '2024-03-24'),
(5, 'المهمة رقم 2', 'الاثنين', '01:21:00', '2024-03-24');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacher_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'الاستاذ الاول', 'الدوسري', 'nogod@email.com', '123'),
(9, 'الاستاذ الثاني', 'الثاني', 'amal@gggg.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_lesson_assignment`
--

CREATE TABLE `teacher_lesson_assignment` (
  `assignment_id` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `lesson_id` int(11) DEFAULT NULL,
  `day_of_week` varchar(20) NOT NULL,
  `lesson_time` time NOT NULL,
  `lesson_date` date NOT NULL DEFAULT current_timestamp(),
  `lesson_status` varchar(30) NOT NULL DEFAULT 'تاكيد الحضور',
  `Confirm` varchar(5) NOT NULL DEFAULT 'غائب'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_lesson_assignment`
--

INSERT INTO `teacher_lesson_assignment` (`assignment_id`, `teacher_id`, `lesson_id`, `day_of_week`, `lesson_time`, `lesson_date`, `lesson_status`, `Confirm`) VALUES
(1, 1, 4, 'الاثنين', '07:49:00', '2024-03-26', 'حاضر', 'لا'),
(2, 1, 5, 'الاثنين', '05:56:00', '2024-03-26', 'حاضر', 'لا'),
(4, 1, 4, 'الأثنين', '07:40:00', '2024-03-26', 'حاضر', 'لا'),
(5, 9, 4, 'الثلاثاء', '03:57:00', '2024-03-26', 'حاضر', 'غائب'),
(6, 1, 4, 'الأربعاء', '05:38:00', '2024-03-27', 'تاكيد الحضور', 'غائب'),
(7, 1, 5, 'الخميس', '03:59:00', '2024-03-28', 'حاضر', 'غائب'),
(8, 9, 4, 'الثلاثاء', '23:06:00', '2024-04-15', 'تقديم اعتذار', 'غائب');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_2` (`email`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`lesson_id`),
  ADD UNIQUE KEY `lesson_name` (`lesson_name`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacher_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `teacher_lesson_assignment`
--
ALTER TABLE `teacher_lesson_assignment`
  ADD PRIMARY KEY (`assignment_id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `lesson_id` (`lesson_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `lesson_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `teacher_lesson_assignment`
--
ALTER TABLE `teacher_lesson_assignment`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `teacher_lesson_assignment`
--
ALTER TABLE `teacher_lesson_assignment`
  ADD CONSTRAINT `teacher_lesson_assignment_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`teacher_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teacher_lesson_assignment_ibfk_2` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`lesson_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
