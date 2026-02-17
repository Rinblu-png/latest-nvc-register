-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2023 at 10:42 AM
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
-- Database: `web`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL UNIQUE,
  `password` varchar(255) NOT NULL,
  `usertypeID` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `lastname`, `username`, `password`, `usertypeID`) VALUES
(1, 'admintest', 'kub', 'admin', '202cb962ac59075b964b07152d234b70', 1),
(2, 'usertest', 'kub', 'user', '202cb962ac59075b964b07152d234b70', 2);

-- --------------------------------------------------------

--
-- Table structure for table `round`
--

CREATE TABLE `round` (
  `id` bigint(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `round`
--

INSERT INTO `round` (`id`, `name`, `status`) VALUES
(1, 'รอบโควต้า', 1),
(2, 'รอบปกติ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `saka`
--

CREATE TABLE `saka` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `vcID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `saka`
--

INSERT INTO `saka` (`id`, `name`, `vcID`) VALUES
(1, 'การบัญชี', 1),
(2, 'การตลาด', 1),
(3, 'การจัดการสำนักงาน', 1),
(4, 'คอมพิวเตอร์ธุรกิจ', 1),
(5, 'เทคโนโลยีสารสนเทศ', 1),
(6, 'แฟชั่นดีไซน์', 1),
(7, 'อาหารและโภชนาการ', 1),
(8, 'คหกรรมเพื่อการโรงแรม', 1),
(9, 'คอมพิวเตอร์กราฟิกอาร์ต', 1),
(10, 'การออกแบบ', 1),
(11, 'การโรงแรม', 1),
(12, 'โลจิสติกส์(ปกติ/ทวิ)', 1),
(13, 'ธุรกิจค้าปลีกสมัยใหม่(ทวิ)', 1),
(14, 'ภาษาต่างประเทศ', 1),
(15, 'การบัญชี', 2),
(16, 'การตลาด(ปกติ/ทวิ)', 2),
(17, 'การจัดการสำนักงาน', 2),
(18, 'ธุรกิจดิจิทัล(ปกติ/ทวิ)', 2),
(19, 'นักพัฒนาซอฟต์แวร์คอมพิวเตอร์(ปกติ/ทวิ)', 2),
(20, 'การจัดการดอกไม้และงานประดิษฐ์', 2),
(21, 'แพทเทิร์นเสื้อผ้าและเครื่องแต่งกาย', 2),
(22, 'การออกแบบนิเทศศิลป์', 2),
(23, 'ธุรกิจค้าปลีกสมัยใหม่(ปกติ/ทวิ)', 2),
(24, 'การจัดการโลจิสติกส์และซัพพลายเชน(ปกติ/ทวิ)', 2),
(25, 'อาหารและโภชนาการ(ปกติ/ทวิ)', 2),
(26, 'การบริการอาหารและเครื่องดื่ม(ปกติ/ทวิ)', 2),
(27, 'ดิจิทัลกราฟิก(ทวิ)', 2),
(28, 'ภาษาต่างประเทศธุรกิจ', 2),
(29, 'การบัญชี', 3),
(30, 'การจัดการโลจิสติกส์', 3),
(31, 'เทคโนโลยีอาหารและโภชนาการ', 3),
(32, 'การโรงแรม', 3),
(33, 'ดิจิทัลกราฟิก', 3),
(34, 'การจัดการธุรกิจค้าปลีก', 3);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `age` varchar(5) NOT NULL,
  `birthday` varchar(30) NOT NULL,
  `ethnicity` varchar(20) NOT NULL,
  `nationality` varchar(20) NOT NULL,
  `religion` varchar(20) NOT NULL,
  `idcard` varchar(13) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(10) NOT NULL,
  `studying` varchar(20) NOT NULL,
  `schoolname` varchar(100) NOT NULL,
  `schooladdress` varchar(100) NOT NULL,
  `yoursaka` varchar(100) NOT NULL,
  `workings` varchar(100) NOT NULL,
  `talent` varchar(100) NOT NULL,
  `gpa` varchar(5) NOT NULL,
  `vcID` varchar(10) NOT NULL,
  `sakaname` varchar(100) NOT NULL,
  `yearID` varchar(10) NOT NULL,
  `roundID` int(10) NOT NULL,
  `status` enum('new','accepted','cancelled') NOT NULL DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `lastname`, `age`, `birthday`, `ethnicity`, `nationality`, `religion`, `idcard`, `address`, `phone`, `studying`, `schoolname`, `schooladdress`, `yoursaka`, `workings`, `talent`, `gpa`, `vcID`, `sakaname`, `yearID`, `roundID`, `status`) VALUES
(1, 'นายอิอิ', 'โวโว่', '18', '2023-12-12', 'ไทย', 'ไทย', 'พุธ', '1739990000000', '44 ไม่รุ้ ถนน 55', '0995555555', 'ม.3', 'โรงเรียนอิอิ', '55 ถนนเทศา ฮาๆ', '', '', '', '3.99', '1', 'ภาษาต่างประเทศ', '1', 2, 'new'),
(2, 'นายอุอุๆ', 'เว่ๆ', '18', '2023-12-28', 'ไทย', 'ไทย', 'พุธ', '1739990000000', '44 ไม่รุ้ ถนน 55', '0995555555', 'ม.3', 'โรงเรียนอิอิ', '55 ถนนเทศา ฮาๆ', '', '', 'test', '3.99', '1', 'ภาษาต่างประเทศ', '1', 2, 'new'),
(3, 'เร่กเกา้ก่้้ด่ด่ดา', 'ด้่ด่า้กดา่้กดา้กดส่าสดส่', '18', '2023-12-28', 'ไทย', 'ไทย', 'พุทธ', '1234567891234', '265', '0936375620', 'ปวช.3', 'ด้แด่ด่ด่่เ', '้ก้ด่ด้เด่้า', '้ด่ด่เา้า้ส้ส่ว', '', 'า้ดื่ดาืทดาืด', '3.02', '2', 'นักพัฒนาซอฟต์แวร์คอมพิวเตอร์(ปกติ/ทวิ)', '16', 1, 'new'),
(4, 'test', 'tesr33', '14', '2005-02-07', 'thai', 'thai', 'buddist', '1369999999999', 'gg 44', '555555', 'm3', 'eieischool', 'school 66', '', '', '', '4', '1', 'ภาษาต่างประเทศ', '1', 2, 'new'),
(5, 'bbb', 'bb', '14', '2023-11-28', 'asds', 'asdas', 'asdas', '6666666666666', 'ff', '0000000000', 'm3', 'eieieiscool', 'addaress school', '', '', '', '5.77', '1', 'ภาษาต่างประเทศ', '1', 2, 'new');

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `id` bigint(20) NOT NULL,
  `name` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `vc`
--

CREATE TABLE `vc` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vc`
--

INSERT INTO `vc` (`id`, `name`) VALUES
(1, 'ปวช.'),
(2, 'ปวส.'),
(3, 'ป.ตรี');

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE `year` (
  `id` bigint(20) NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `year`
--

INSERT INTO `year` (`id`, `name`) VALUES
(1, '2566'),
(16, '2567');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `round`
--
ALTER TABLE `round`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saka`
--
ALTER TABLE `saka`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vc`
--
ALTER TABLE `vc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `year`
--
ALTER TABLE `year`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `round`
--
ALTER TABLE `round`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `saka`
--
ALTER TABLE `saka`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vc`
--
ALTER TABLE `vc`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `year`
--
ALTER TABLE `year`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
