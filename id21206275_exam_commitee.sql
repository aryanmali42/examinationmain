-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 05, 2024 at 05:03 PM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id21206275_exam_commitee`
--

-- --------------------------------------------------------

--
-- Table structure for table `allotment`
--

CREATE TABLE `allotment` (
  `p_id` int(11) NOT NULL,
  `pr_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `e_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `role` enum('rs','js','ss') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(50) NOT NULL,
  `sem` varchar(50) NOT NULL,
  `pr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`c_id`, `c_name`, `sem`, `pr_id`) VALUES
(1, 'java', '1', 1),
(2, 'python', '3', 1),
(3, 'artificial intelligance', '2', 2),
(4, 'book keeping', '3', 3),
(18, 'Ecology', '4', 17),
(19, 'Shakespearean Studies', '5', 18),
(20, 'Cinematography', '3', 19),
(21, 'Music Theory', '2', 20),
(22, 'Contemporary Dance', '4', 21),
(23, 'Painting', '3', 22),
(24, 'Criminal Psychology', '5', 23),
(25, 'Abnormal Psychiatry', '4', 24),
(26, 'Astronomy', '2', 25),
(27, 'Marine Biology', '5', 26);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `d_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `nrs` int(11) NOT NULL,
  `nvs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`d_id`, `name`, `nrs`, `nvs`) VALUES
(1, 'physics', 60, 6),
(2, 'maths', 55, 23),
(3, 'chemistry', 67, 34),
(4, 'it', 5, 3),
(5, 'commerce', 15, 4),
(18, 'Environmental Science', 40, 10),
(19, 'Drama', 35, 8),
(20, 'Film Studies', 60, 20),
(21, 'Music', 50, 15),
(22, 'Dance', 65, 22),
(23, 'Fine Arts', 45, 12),
(24, 'Criminology', 70, 25),
(25, 'Psychiatry', 75, 28),
(26, 'Astrophysics', 65, 24),
(27, 'Oceanography', 40, 10);

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `e_id` int(11) NOT NULL,
  `type` enum('C','R','A') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`e_id`, `type`) VALUES
(1, 'C'),
(2, 'R'),
(3, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `type` enum('A','O') NOT NULL,
  `status` enum('A','I') NOT NULL,
  `p_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `type`, `status`, `p_id`, `email`) VALUES
('abc1', '1111', 'A', 'A', 3, ''),
('and12', '1234', 'O', 'I', 21, 'walfra52777@gmail.com'),
('aryan2', '22221', 'O', 'I', 2, ''),
('nitin07', '818180', 'A', 'A', 1, ''),
('qq', 'qq', 'A', 'A', 1, ''),
('sachin08', '1121', 'A', 'A', 3, ''),
('virat11', '1212', 'A', 'A', 4, '');

-- --------------------------------------------------------

--
-- Table structure for table `professor`
--

CREATE TABLE `professor` (
  `p_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `doj` date NOT NULL,
  `reg_sfc` enum('reg','sfc','both') NOT NULL,
  `designation` varchar(50) NOT NULL,
  `type` enum('R','V') NOT NULL,
  `ecm` enum('Y','N') NOT NULL,
  `unfair_means` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `professor`
--

INSERT INTO `professor` (`p_id`, `name`, `doj`, `reg_sfc`, `designation`, `type`, `ecm`, `unfair_means`) VALUES
(1, 'Nitin', '2023-08-10', 'sfc', 'HOD', 'R', '', 'Y'),
(2, 'aryan', '2023-08-13', 'reg', 'HOD', 'V', '', 'Y'),
(3, 'abc', '2023-08-01', 'both', 'HOD', 'R', '', 'Y'),
(4, 'Nitin Singh', '2023-08-26', 'both', 'yes', 'V', '', 'Y'),
(17, 'vvv', '2023-08-11', 'reg', 'yes', 'R', '', 'Y'),
(21, '', '0000-00-00', 'both', 'yes', 'R', '', 'Y'),
(34, 'Sophie Turner', '2023-09-18', 'sfc', 'Professor', 'R', 'N', 'N'),
(35, 'Tom Hanks', '2023-10-05', 'reg', 'Assistant Professor', 'V', 'N', 'N'),
(36, 'Emma Watson', '2023-11-22', 'both', 'Associate Professor', 'R', 'N', 'N'),
(37, 'Leonardo DiCaprio', '2023-08-30', 'both', 'Professor', 'V', 'N', 'N'),
(38, 'Jennifer Lawrence', '2023-12-10', 'reg', 'Assistant Professor', 'R', 'N', 'N'),
(39, 'Brad Pitt', '2023-10-15', 'sfc', 'Professor', 'V', 'N', 'N'),
(40, 'Natalie Portman', '2023-09-05', 'both', 'Associate Professor', 'R', 'N', 'N'),
(41, 'Will Smith', '2023-11-28', 'both', 'Professor', 'V', 'N', 'N'),
(42, 'Angelina Jolie', '2023-10-20', 'reg', 'Assistant Professor', 'R', 'N', 'N'),
(43, 'Chris Hemsworth', '2023-09-10', 'sfc', 'Professor', 'V', 'N', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `programme`
--

CREATE TABLE `programme` (
  `pr_id` int(11) NOT NULL,
  `pr_name` varchar(50) NOT NULL,
  `strength` int(11) NOT NULL,
  `d_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `programme`
--

INSERT INTO `programme` (`pr_id`, `pr_name`, `strength`, `d_id`) VALUES
(1, 'bsc-it', 80, 4),
(2, 'msc-it', 60, 4),
(3, 'bcom', 60, 5),
(17, 'BSc Environmental Science', 70, 18),
(18, 'BA Drama', 55, 19),
(19, 'BFA Film Studies', 80, 20),
(20, 'BMus Music', 60, 21),
(21, 'BDance Dance', 75, 22),
(22, 'BFA Fine Arts', 50, 23),
(23, 'BCriminology', 85, 24),
(24, 'BPsychiatry', 65, 25),
(25, 'BSc Astrophysics', 60, 26),
(26, 'BOceanography', 40, 27);

-- --------------------------------------------------------

--
-- Table structure for table `p_course`
--

CREATE TABLE `p_course` (
  `p_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p_course`
--

INSERT INTO `p_course` (`p_id`, `c_id`) VALUES
(34, 18),
(35, 19),
(36, 20),
(37, 21),
(38, 22),
(39, 23),
(40, 24),
(41, 25),
(42, 26),
(43, 27);

-- --------------------------------------------------------

--
-- Table structure for table `p_department`
--

CREATE TABLE `p_department` (
  `p_id` int(11) NOT NULL,
  `d_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p_department`
--

INSERT INTO `p_department` (`p_id`, `d_id`) VALUES
(34, 18),
(35, 19),
(36, 20),
(37, 21),
(38, 22),
(39, 23),
(40, 24),
(41, 25),
(42, 26),
(43, 27);

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `pr_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `e_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `f_time` time NOT NULL,
  `t_time` time NOT NULL,
  `nob` int(11) NOT NULL,
  `academic_year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`pr_id`, `c_id`, `e_id`, `date`, `f_time`, `t_time`, `nob`, `academic_year`) VALUES
(1, 1, 1, '2023-08-23', '22:41:00', '23:42:00', 0, '2023'),
(1, 1, 1, '2023-08-23', '22:41:00', '23:42:00', 0, '2023'),
(2, 3, 2, '2024-01-04', '23:50:00', '23:50:00', 0, '2025'),
(2, 3, 2, '2024-01-12', '21:58:00', '21:57:00', 1, '2024');

-- --------------------------------------------------------

--
-- Table structure for table `unavailability`
--

CREATE TABLE `unavailability` (
  `date` date NOT NULL,
  `reason` varchar(100) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `unavailability`
--

INSERT INTO `unavailability` (`date`, `reason`, `p_id`) VALUES
('2023-08-01', 'reason 1', 1),
('2023-08-01', 'reason 1', 1),
('2024-01-12', 'On leave', 34),
('2024-01-13', 'Conference', 35),
('2024-01-14', 'Family emergency', 36),
('2024-01-15', 'Medical leave', 37),
('2024-01-16', 'Seminar', 38),
('2024-01-17', 'Vacation', 39),
('2024-01-18', 'Training', 40),
('2024-01-19', 'Sabbatical', 41),
('2024-01-20', 'Research trip', 42),
('2024-01-21', 'Personal reasons', 43);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allotment`
--
ALTER TABLE `allotment`
  ADD KEY `allotment_ibfk_1` (`c_id`),
  ADD KEY `allotment_ibfk_2` (`e_id`),
  ADD KEY `allotment_ibfk_3` (`pr_id`),
  ADD KEY `allotment_ibfk_4` (`p_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `course_ibfk_1` (`pr_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `programme`
--
ALTER TABLE `programme`
  ADD PRIMARY KEY (`pr_id`),
  ADD KEY `programme_ibfk_1` (`d_id`);

--
-- Indexes for table `p_course`
--
ALTER TABLE `p_course`
  ADD KEY `c_id` (`c_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `p_department`
--
ALTER TABLE `p_department`
  ADD KEY `d_id` (`d_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD KEY `timetable_ibfk_1` (`pr_id`),
  ADD KEY `timetable_ibfk_2` (`c_id`),
  ADD KEY `timetable_ibfk_3` (`e_id`);

--
-- Indexes for table `unavailability`
--
ALTER TABLE `unavailability`
  ADD KEY `unavailability_ibfk_1` (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `professor`
--
ALTER TABLE `professor`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `programme`
--
ALTER TABLE `programme`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `allotment`
--
ALTER TABLE `allotment`
  ADD CONSTRAINT `allotment_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `course` (`c_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `allotment_ibfk_2` FOREIGN KEY (`e_id`) REFERENCES `exam` (`e_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `allotment_ibfk_3` FOREIGN KEY (`pr_id`) REFERENCES `programme` (`pr_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `allotment_ibfk_4` FOREIGN KEY (`p_id`) REFERENCES `professor` (`p_id`) ON UPDATE CASCADE;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`pr_id`) REFERENCES `programme` (`pr_id`) ON UPDATE CASCADE;

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `professor` (`p_id`) ON UPDATE CASCADE;

--
-- Constraints for table `programme`
--
ALTER TABLE `programme`
  ADD CONSTRAINT `programme_ibfk_1` FOREIGN KEY (`d_id`) REFERENCES `department` (`d_id`) ON UPDATE CASCADE;

--
-- Constraints for table `p_course`
--
ALTER TABLE `p_course`
  ADD CONSTRAINT `p_course_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `course` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `p_course_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `professor` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `p_department`
--
ALTER TABLE `p_department`
  ADD CONSTRAINT `p_department_ibfk_1` FOREIGN KEY (`d_id`) REFERENCES `department` (`d_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `p_department_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `professor` (`p_id`);

--
-- Constraints for table `timetable`
--
ALTER TABLE `timetable`
  ADD CONSTRAINT `timetable_ibfk_1` FOREIGN KEY (`pr_id`) REFERENCES `programme` (`pr_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `timetable_ibfk_2` FOREIGN KEY (`c_id`) REFERENCES `course` (`c_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `timetable_ibfk_3` FOREIGN KEY (`e_id`) REFERENCES `exam` (`e_id`) ON UPDATE CASCADE;

--
-- Constraints for table `unavailability`
--
ALTER TABLE `unavailability`
  ADD CONSTRAINT `unavailability_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `professor` (`p_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
