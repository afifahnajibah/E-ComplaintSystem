-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2022 at 05:46 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomplaint`
--

-- --------------------------------------------------------

--
-- Table structure for table `avatar`
--

CREATE TABLE `avatar` (
  `avatarid` int(100) NOT NULL,
  `avatarname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `avatar`
--

INSERT INTO `avatar` (`avatarid`, `avatarname`) VALUES
(1, 'a4.jpg'),
(2, 'a1.jpg'),
(3, 'a2.jpg'),
(4, 'a3.jpg'),
(5, 'a5.jpg'),
(6, 'a6.jpg'),
(7, 'a7.jpg'),
(8, 'a8.jpg'),
(9, 'a11.jpg'),
(10, 'a10.jpg'),
(11, 'a12.jpg'),
(12, 'a13.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `block`
--

CREATE TABLE `block` (
  `bid` int(100) NOT NULL,
  `blockname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `block`
--

INSERT INTO `block` (`bid`, `blockname`) VALUES
(23, 'Block A'),
(24, 'Block B'),
(25, 'Block C'),
(30, 'Block D (Lecturer Rooms)'),
(26, 'Block E'),
(7, 'Block F (STAR Complex)'),
(36, 'Cengal Hall'),
(19, 'Chemistry Lab'),
(3, 'Coconut Farm '),
(8, 'Industry Network Centre'),
(35, 'Integrated Information System Unit '),
(10, 'Jackfruit Farm'),
(17, 'Labs'),
(29, 'Latex Lab'),
(18, 'Lecture Room'),
(20, 'Lecture Theatres '),
(15, 'Main Library'),
(11, 'Main Office Building'),
(5, 'Mango Farm'),
(2, 'Marching Field'),
(4, 'Palm Farm'),
(12, 'Seri Semarak Hall'),
(1, 'Sports Complex'),
(6, 'Star Fruit Farm'),
(21, 'Student Affairs Division Building '),
(22, 'Student Society Room'),
(16, 'Wooden Hall '),
(9, 'Workshop ');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `cid` int(100) NOT NULL,
  `sid` int(100) DEFAULT NULL,
  `stid` int(100) NOT NULL,
  `cdate` date NOT NULL,
  `ctitle` varchar(100) NOT NULL,
  `cdescription` varchar(255) NOT NULL,
  `cdepartment` text NOT NULL,
  `cblock` varchar(100) NOT NULL,
  `cstatus` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`cid`, `sid`, `stid`, `cdate`, `ctitle`, `cdescription`, `cdepartment`, `cblock`, `cstatus`) VALUES
(38, NULL, 100004, '2021-12-13', 'monitor', 'repair asap', 'ICT', 'Block E', NULL),
(39, NULL, 100007, '2021-12-26', 'CPU ', 'cpu tak boleh on, asap!', 'ICT', 'Block B', 'Closed'),
(48, NULL, 100000, '2022-01-26', 'bikar pecah', 'need new bikar, penyapu and also vacuum', 'GENERAL', 'Labs', 'InProcess');

-- --------------------------------------------------------

--
-- Table structure for table `complaintaction`
--

CREATE TABLE `complaintaction` (
  `aid` int(100) NOT NULL,
  `sid` int(100) DEFAULT NULL,
  `cid` int(100) NOT NULL,
  `adescription` varchar(255) DEFAULT NULL,
  `atimestamp` varchar(100) DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaintaction`
--

INSERT INTO `complaintaction` (`aid`, `sid`, `cid`, `adescription`, `atimestamp`) VALUES
(19, 10000, 38, NULL, NULL),
(20, 10000, 39, 'dah ganti cpu baru                                                                                   ', '2021-12-26 16:02:25'),
(29, 10000, 48, 'already order new bikar', '2022-01-26 15:00:41');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `crid` int(100) NOT NULL,
  `fid` int(100) NOT NULL,
  `crcode` varchar(100) NOT NULL,
  `crname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`crid`, `fid`, `crcode`, `crname`) VALUES
(1, 1, 'AP220', 'Bachelor of Surveying Science and Geomatics (Hons)'),
(2, 1, 'AP120', 'Diploma in Geomatic Science'),
(3, 2, 'AS201', 'Bachelor of Science (Hons) Biology'),
(4, 2, 'AS202', 'Bachelor of Science (Hons) Chemistry'),
(5, 3, 'CS240', 'Bachelor of Information Technology (Hons)'),
(6, 3, 'CS245', 'Bachelor of Computer Science (Hons) Data Communication and Network'),
(7, 4, 'SR241', 'Bachelor of Sports Management (Hons)'),
(8, 4, 'SR243', 'Bachelor of Sports Science (Hons)'),
(9, 5, 'BM240/BA240', 'Bachelor of Business Administration (Hons) Marketing'),
(10, 5, 'BM242/BA242', 'Bachelor of Business Administration (Hons) Finance'),
(11, 6, 'AT232', 'Bachelor of Science Agrotechnology (Hons) Horticulture Technology'),
(12, 6, 'AT110', 'Diploma in Planting Industry Management'),
(13, 7, 'AC120', 'Diploma in Accounting Information System');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `fid` int(100) NOT NULL,
  `fcode` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`fid`, `fcode`, `fname`) VALUES
(1, 'AP', 'Faculty of Architecture, Planning and Surveying '),
(2, 'AS', 'Faculty of Applied Sciences '),
(3, 'CS', 'Faculty of Computer and Mathematical Sciences '),
(4, 'SR', 'Faculty of Sports Science and Recreation '),
(5, 'BM', 'Faculty of Business Management '),
(6, 'AT', 'Faculty of Plantation and Agrotechnology '),
(7, 'AC', 'Faculty of Accountancy ');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `sid` int(100) NOT NULL,
  `sname` text NOT NULL,
  `semail` varchar(100) NOT NULL,
  `susername` varchar(100) NOT NULL,
  `spassword` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`sid`, `sname`, `semail`, `susername`, `spassword`) VALUES
(10000, 'amira', 'amiracomel@yahoo.com', 'amira', 'passwordamira'),
(10001, 'sara suhairi', 'sarasara@yahoo.com', 'sara', 'passwordsara'),
(10002, 'afifah najibah', 'afifahnarif@yes.my', 'fiefa', 'passwordfiefa');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stid` int(100) NOT NULL,
  `sid` int(100) DEFAULT NULL,
  `stname` text NOT NULL,
  `stphonenum` varchar(12) NOT NULL,
  `stprofilepic` varchar(100) DEFAULT NULL,
  `fid` int(100) NOT NULL,
  `crid` int(100) NOT NULL,
  `staddress` varchar(100) DEFAULT NULL,
  `stemail` varchar(100) NOT NULL,
  `stusername` varchar(100) DEFAULT NULL,
  `stpassword` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stid`, `sid`, `stname`, `stphonenum`, `stprofilepic`, `fid`, `crid`, `staddress`, `stemail`, `stusername`, `stpassword`) VALUES
(100000, 10000, 'afifah najibah ', '011-61442264', 'a12.jpg', 3, 5, 'Amanjaya, Sungai Petani', 'afifahnajibah99@gmail.com', 'POOHOI', '990830071234'),
(100004, 10000, 'salmiah', '013-4380042', 'a1.jpg', 1, 1, 'jalan dua', 'salmiah@gmail.com', 'salmiah', '651101021234'),
(100005, 10000, 'samirah', '012-4347672', 'a8.jpg', 2, 2, 'kota damansara, selangor', 'samirahsamirah@yahoo.com', 'SAMI', '600828071234'),
(100006, 10000, 'anwar nazirul', '011-81114524', NULL, 2, 10, 'kota kuala muda, kedah', 'anwarnazirul@gmail.com', '', '070497071234'),
(100007, 10000, 'saya binti sayuti', '011-12345678', 'a6.jpg', 2, 4, 'jalan bagan luar 12/6 butterworth', 'sayasayuti@gmail.com', 'SAYAA', '980201071234'),
(100008, 10000, 'nabilah arif', '018-12345646', '', 2, 2, 'damansara damai', 'nabilaharif@gmail.com', '', '031290071234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avatar`
--
ALTER TABLE `avatar`
  ADD PRIMARY KEY (`avatarid`);

--
-- Indexes for table `block`
--
ALTER TABLE `block`
  ADD PRIMARY KEY (`bid`),
  ADD UNIQUE KEY `blockname` (`blockname`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `stid` (`stid`);

--
-- Indexes for table `complaintaction`
--
ALTER TABLE `complaintaction`
  ADD PRIMARY KEY (`aid`),
  ADD KEY `cid` (`cid`),
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`crid`),
  ADD KEY `fid` (`fid`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `email` (`semail`,`susername`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stid`),
  ADD UNIQUE KEY `email` (`stemail`,`stusername`),
  ADD KEY `sid` (`sid`),
  ADD KEY `student_ibfk_2` (`fid`),
  ADD KEY `student_ibfk_3` (`crid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avatar`
--
ALTER TABLE `avatar`
  MODIFY `avatarid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `block`
--
ALTER TABLE `block`
  MODIFY `bid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `cid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `complaintaction`
--
ALTER TABLE `complaintaction`
  MODIFY `aid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `crid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `fid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `sid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10003;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `stid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100009;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complaint`
--
ALTER TABLE `complaint`
  ADD CONSTRAINT `complaint_ibfk_2` FOREIGN KEY (`stid`) REFERENCES `student` (`stid`);

--
-- Constraints for table `complaintaction`
--
ALTER TABLE `complaintaction`
  ADD CONSTRAINT `complaintaction_ibfk_3` FOREIGN KEY (`cid`) REFERENCES `complaint` (`cid`),
  ADD CONSTRAINT `complaintaction_ibfk_4` FOREIGN KEY (`sid`) REFERENCES `staff` (`sid`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`fid`) REFERENCES `faculty` (`fid`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `staff` (`sid`),
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`fid`) REFERENCES `faculty` (`fid`),
  ADD CONSTRAINT `student_ibfk_3` FOREIGN KEY (`crid`) REFERENCES `course` (`crid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
