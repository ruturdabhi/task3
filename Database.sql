-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 04, 2023 at 08:59 PM
-- Server version: 8.0.33
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `userdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessType`
--

CREATE TABLE `accessType` (
  `id` int NOT NULL,
  `type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `accessType`
--

INSERT INTO `accessType` (`id`, `type`) VALUES
(1, 'admin'),
(2, 'teacher'),
(3, 'student');

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE `chapters` (
  `id` int NOT NULL,
  `chapterName` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`id`, `chapterName`) VALUES
(2, 'algorithm');

-- --------------------------------------------------------

--
-- Table structure for table `chapterToSubject`
--

CREATE TABLE `chapterToSubject` (
  `id` int NOT NULL,
  `chapterId` int NOT NULL,
  `subjectid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chapterToSubject`
--

INSERT INTO `chapterToSubject` (`id`, `chapterId`, `subjectid`) VALUES
(1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `standards`
--

CREATE TABLE `standards` (
  `id` int NOT NULL,
  `standard` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `standards`
--

INSERT INTO `standards` (`id`, `standard`) VALUES
(1, 1),
(4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `studentToStandard`
--

CREATE TABLE `studentToStandard` (
  `id` int NOT NULL,
  `studentId` int NOT NULL,
  `standardId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `studentToStandard`
--

INSERT INTO `studentToStandard` (`id`, `studentId`, `standardId`) VALUES
(1, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subjectId` int NOT NULL,
  `subject` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subjectId`, `subject`) VALUES
(1, 'math'),
(2, 'science'),
(3, 'economic');

-- --------------------------------------------------------

--
-- Table structure for table `subjectTostandard`
--

CREATE TABLE `subjectTostandard` (
  `id` int NOT NULL,
  `subjectid` int NOT NULL,
  `standardId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subjectTostandard`
--

INSERT INTO `subjectTostandard` (`id`, `subjectid`, `standardId`) VALUES
(1, 1, 1),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `Username` varchar(32) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Username`, `Email`, `City`, `Password`, `image`) VALUES
(2, 'parth', 'parth@gmail.com', 'ahmedabad', '81dc9bdb52d04dc20036dbd8313ed055', ''),
(3, 'himashu', 'himashu@gmail.com', 'botad', '81dc9bdb52d04dc20036dbd8313ed055', ''),
(4, 'raghav', 'raghav@gmail.com', 'ahmedabad', '81dc9bdb52d04dc20036dbd8313ed055', ''),
(5, 'rajnish', 'rajnish@gmail.com', 'ahmedabad', '81dc9bdb52d04dc20036dbd8313ed055', ''),
(6, 'charmi', 'charmi@gmail.com', 'Patan', '81dc9bdb52d04dc20036dbd8313ed055', ''),
(7, 'vrunda', 'vrunda@gmail.com', 'ahmedabad', '81dc9bdb52d04dc20036dbd8313ed055', ''),
(8, 'ruturaj', 'rutu@gmail.com', 'dholka', '81dc9bdb52d04dc20036dbd8313ed055', '');

-- --------------------------------------------------------

--
-- Table structure for table `userType`
--

CREATE TABLE `userType` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `access_type_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `userType`
--

INSERT INTO `userType` (`id`, `user_id`, `access_type_id`) VALUES
(2, 2, 2),
(3, 3, 3),
(4, 4, 3),
(5, 5, 3),
(6, 6, 2),
(7, 7, 3),
(8, 8, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessType`
--
ALTER TABLE `accessType`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chapterToSubject`
--
ALTER TABLE `chapterToSubject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cts_chapter_id` (`chapterId`),
  ADD KEY `cts_subject_id` (`subjectid`);

--
-- Indexes for table `standards`
--
ALTER TABLE `standards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentToStandard`
--
ALTER TABLE `studentToStandard`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_standard_user_id` (`studentId`),
  ADD KEY `student_standard_standard_id` (`standardId`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subjectId`);

--
-- Indexes for table `subjectTostandard`
--
ALTER TABLE `subjectTostandard`
  ADD PRIMARY KEY (`id`),
  ADD KEY `standard_subject_standardid` (`standardId`),
  ADD KEY `standard_subject_subjectid` (`subjectid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `userType`
--
ALTER TABLE `userType`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chapterToSubject`
--
ALTER TABLE `chapterToSubject`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `standards`
--
ALTER TABLE `standards`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `studentToStandard`
--
ALTER TABLE `studentToStandard`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subjectId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subjectTostandard`
--
ALTER TABLE `subjectTostandard`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `userType`
--
ALTER TABLE `userType`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chapterToSubject`
--
ALTER TABLE `chapterToSubject`
  ADD CONSTRAINT `cts_chapter_id` FOREIGN KEY (`chapterId`) REFERENCES `chapters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cts_subject_id` FOREIGN KEY (`subjectid`) REFERENCES `subjects` (`subjectId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `studentToStandard`
--
ALTER TABLE `studentToStandard`
  ADD CONSTRAINT `student_standard_standard_id` FOREIGN KEY (`standardId`) REFERENCES `standards` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_standard_user_id` FOREIGN KEY (`studentId`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subjectTostandard`
--
ALTER TABLE `subjectTostandard`
  ADD CONSTRAINT `standard_subject_standardid` FOREIGN KEY (`standardId`) REFERENCES `standards` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `standard_subject_subjectid` FOREIGN KEY (`subjectid`) REFERENCES `subjects` (`subjectId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
