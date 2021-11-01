-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 01, 2021 at 10:04 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Notemates`
--

-- --------------------------------------------------------

--
-- Table structure for table `belongs_to`
--

CREATE TABLE `belongs_to` (
  `userID` int(11) NOT NULL,
  `documentID` int(11) NOT NULL,
  `courseID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `belongs_to`
--

INSERT INTO `belongs_to` (`userID`, `documentID`, `courseID`) VALUES
(28, 2, 'CS2150'),
(30, 4, 'CS3240'),
(29, 3, 'CS3330'),
(27, 1, 'CS4750'),
(31, 5, 'CS4750');

-- --------------------------------------------------------

--
-- Table structure for table `Courses`
--

CREATE TABLE `Courses` (
  `courseID` varchar(10) NOT NULL,
  `courseName` varchar(50) DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Courses`
--

INSERT INTO `Courses` (`courseID`, `courseName`, `department`) VALUES
('CS2150', 'Program and Data Representation', 'CS'),
('CS3240', 'Advanced Software Development Techniques', 'CS'),
('CS3330', 'Computer Architecture', 'CS'),
('CS3710', 'Intro to Cybersecurity', 'CS'),
('CS4414', 'Operating Systems', 'CS'),
('CS4750', 'Database Systems', 'CS');

-- --------------------------------------------------------

--
-- Table structure for table `Document`
--

CREATE TABLE `Document` (
  `documentID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `dateCreated` varchar(20) NOT NULL,
  `displayName` varchar(50) NOT NULL,
  `fileType` varchar(50) NOT NULL,
  `fileName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Document`
--

INSERT INTO `Document` (`documentID`, `userID`, `dateCreated`, `displayName`, `fileType`, `fileName`) VALUES
(1, 25, '9/02/21', 'DB Notes', 'pdf', 'DB_Notes'),
(2, 26, '9/06/21', 'Cyber Assignment', 'docx', 'Cyber_Assignment'),
(3, 27, '9/09/21', 'PDR Lab', 'pdf', '2150_Lab'),
(4, 28, '9/14/21', 'Computer Arch Notes', 'txt', 'Comp_Arch_Notes'),
(5, 29, '9/18/21', 'ASD Homework', 'docx', 'ASD_HW'),
(6, 30, '9/27/21', 'OS Assignment', 'pdf', 'OS_Assignment'),
(35, 25, '9/02/21', 'DB Notes', 'pdf', 'DB_Notes');

-- --------------------------------------------------------

--
-- Table structure for table `File`
--

CREATE TABLE `File` (
  `fileName` varchar(30) NOT NULL,
  `fileType` varchar(7) NOT NULL,
  `fileContents` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Professor`
--

CREATE TABLE `Professor` (
  `computingID` varchar(10) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `phone` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Professor`
--

INSERT INTO `Professor` (`computingID`, `firstName`, `lastName`, `phone`) VALUES
('asb2t', 'Aaron', 'Bloomfield', '4349822215'),
('cr4bd', 'Charles', 'Reiss', '4349822225'),
('dqt5vt', 'David', 'Tran', '7725386884'),
('mrf8t', 'Mark', 'Floryan', '4342433087'),
('mss2x', 'Mark', 'Sherriff', '4349822688'),
('nb3f', 'Nada', 'Basit', '4349822213'),
('tbh3f', 'Thomas', 'Horton', '4349822217');

-- --------------------------------------------------------

--
-- Table structure for table `Section`
--

CREATE TABLE `Section` (
  `courseID` varchar(10) NOT NULL,
  `sectionID` int(11) NOT NULL,
  `time` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Section`
--

INSERT INTO `Section` (`courseID`, `sectionID`, `time`) VALUES
('CS2150', 15421, '12:00-12:50'),
('CS3240', 15915, '11:00-12:15'),
('CS3240', 16438, '2:00-3:00'),
('CS3330', 15947, '11:00-12:15'),
('CS4414', 15428, '12:30-1:45'),
('CS4414', 16439, '3:30-4:45');

-- --------------------------------------------------------

--
-- Table structure for table `takes`
--

CREATE TABLE `takes` (
  `userID` int(11) NOT NULL,
  `courseID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `takes`
--

INSERT INTO `takes` (`userID`, `courseID`) VALUES
(25, 'CS4750'),
(26, 'CS3330'),
(27, 'CS4414'),
(28, 'CS3240'),
(29, 'CS2150'),
(30, 'CS2150');

--
-- Triggers `takes`
--
DELIMITER $$
CREATE TRIGGER `verifyExists` BEFORE INSERT ON `takes` FOR EACH ROW BEGIN
		IF new.courseID not in (
			SELECT C.courseID
			FROM Courses C
			WHERE new.courseID = C.courseID
		) THEN
			CALL `Course does not exist`;
		END IF;
	END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `teaches`
--

CREATE TABLE `teaches` (
  `sectionID` int(11) NOT NULL,
  `computingID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `userID` int(11) NOT NULL COMMENT 'userID is primary key',
  `password` varchar(25) DEFAULT NULL,
  `firstName` varchar(15) DEFAULT NULL,
  `lastName` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='User table';

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`userID`, `password`, `firstName`, `lastName`) VALUES
(25, 'ABC123', 'David', 'Tran'),
(26, 'abc123', 'David', 'Tran'),
(27, 'abc123', 'David', 'Tran'),
(28, 'abc123', 'Kabir', 'Menghrajani'),
(29, 'abc123', 'Ruthvik', 'Gajjala'),
(30, 'abc123', 'Cameron', 'Mukerjee'),
(31, 'abc123', 'Kim', 'Kardashian'),
(32, 'abc123', 'Ariana', 'Grande');

-- --------------------------------------------------------

--
-- Table structure for table `User_email`
--

CREATE TABLE `User_email` (
  `userID` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `User_email`
--

INSERT INTO `User_email` (`userID`, `email`) VALUES
(32, 'arianagrande@music.biz'),
(30, 'crm6zg@virginia.edu'),
(27, 'dqt5vt@virginia.edu'),
(31, 'kimkardashianwest@kuwtk.gov'),
(28, 'km5qte@virginia.edu'),
(29, 'rrg5kq@virginia.edu');

-- --------------------------------------------------------

--
-- Table structure for table `User_phone`
--

CREATE TABLE `User_phone` (
  `userID` int(11) NOT NULL,
  `phoneNumber` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `User_phone`
--

INSERT INTO `User_phone` (`userID`, `phoneNumber`) VALUES
(25, '1234567890'),
(26, '0987654321'),
(27, '1234509876'),
(28, '5432167890'),
(29, '6789054321'),
(30, '0987612345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `belongs_to`
--
ALTER TABLE `belongs_to`
  ADD PRIMARY KEY (`userID`,`documentID`),
  ADD KEY `documentID` (`documentID`),
  ADD KEY `courseID` (`courseID`);

--
-- Indexes for table `Courses`
--
ALTER TABLE `Courses`
  ADD PRIMARY KEY (`courseID`);

--
-- Indexes for table `Document`
--
ALTER TABLE `Document`
  ADD PRIMARY KEY (`documentID`,`userID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `File`
--
ALTER TABLE `File`
  ADD PRIMARY KEY (`fileName`);

--
-- Indexes for table `Professor`
--
ALTER TABLE `Professor`
  ADD PRIMARY KEY (`computingID`);

--
-- Indexes for table `Section`
--
ALTER TABLE `Section`
  ADD PRIMARY KEY (`courseID`,`sectionID`);

--
-- Indexes for table `takes`
--
ALTER TABLE `takes`
  ADD PRIMARY KEY (`userID`,`courseID`),
  ADD KEY `courseID` (`courseID`);

--
-- Indexes for table `teaches`
--
ALTER TABLE `teaches`
  ADD PRIMARY KEY (`sectionID`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `User_email`
--
ALTER TABLE `User_email`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `UX_email` (`email`);

--
-- Indexes for table `User_phone`
--
ALTER TABLE `User_phone`
  ADD PRIMARY KEY (`userID`,`phoneNumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'userID is primary key', AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `User_email`
--
ALTER TABLE `User_email`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `User_phone`
--
ALTER TABLE `User_phone`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `belongs_to`
--
ALTER TABLE `belongs_to`
  ADD CONSTRAINT `belongs_to_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `User` (`userID`),
  ADD CONSTRAINT `belongs_to_ibfk_3` FOREIGN KEY (`documentID`) REFERENCES `Document` (`documentID`),
  ADD CONSTRAINT `belongs_to_ibfk_4` FOREIGN KEY (`courseID`) REFERENCES `Courses` (`courseID`);

--
-- Constraints for table `Document`
--
ALTER TABLE `Document`
  ADD CONSTRAINT `document_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `User` (`userID`);

--
-- Constraints for table `Section`
--
ALTER TABLE `Section`
  ADD CONSTRAINT `section_ibfk_1` FOREIGN KEY (`courseID`) REFERENCES `Courses` (`courseID`);

--
-- Constraints for table `takes`
--
ALTER TABLE `takes`
  ADD CONSTRAINT `takes_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `User` (`userID`),
  ADD CONSTRAINT `takes_ibfk_2` FOREIGN KEY (`courseID`) REFERENCES `Courses` (`courseID`);

--
-- Constraints for table `User_email`
--
ALTER TABLE `User_email`
  ADD CONSTRAINT `user_email_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `User` (`userID`);

--
-- Constraints for table `User_phone`
--
ALTER TABLE `User_phone`
  ADD CONSTRAINT `user_phone_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `User` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
