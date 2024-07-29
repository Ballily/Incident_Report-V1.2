-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 29, 2024 at 12:45 PM
-- Server version: 10.6.17-MariaDB-log
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `holeit_itnotify`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_action`
--

CREATE TABLE `add_action` (
  `id_ac` int(11) NOT NULL,
  `title_ac` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `description_ac` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `status_ac` enum('onProgress','Completed','','') CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `create_ac` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` enum('active','completed') CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'active',
  `department` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `date`, `time`, `status`, `department`) VALUES
(60, 'ระงับไฟฟ้าชั่วคราว The Bazaar Hotel Bangkok โซน 4 และ โซน 3', 'ส่งผลให้ไม่มีกระแสไฟฟ้าใช้งานในช่วงเวลาดังกล่าว ในวันที่ 13 มิถุนายน 2567 ตั้งแต่เวลา 10:00 น. ถึง 15:00 น. รวมระยะเวลา 5 ชั่วโมง', '2024-06-13', '10:00:00', 'active', 'การใช้งาน Comanche, Internet ระบบต่าง ๆ '),
(61, 'ระบบ Network ของส่วนออฟฟิศใช้งานไม่ได้', 'ได้รับแจ้งว่า อินเตอร์เน็ต และ Comanche ไม่สามารถใชงานได้', '2024-06-12', '10:38:00', 'completed', 'พนักงานทุกท่าน และระบบทั้งหมด');

-- --------------------------------------------------------

--
-- Table structure for table `sub_events`
--

CREATE TABLE `sub_events` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `status` enum('กำลังแก้ไข','แก้ไขเสร็จสิ้น') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'กำลังแก้ไข',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sub_events`
--

INSERT INTO `sub_events` (`id`, `event_id`, `description`, `status`, `created_at`) VALUES
(14, 14, '123456', 'กำลังแก้ไข', '2024-07-21 15:44:44'),
(15, 14, '11111111', 'กำลังแก้ไข', '0000-00-00 00:00:00'),
(125, 14, 'asdsadasdasd', 'กำลังแก้ไข', '2024-07-21 17:09:48'),
(126, 14, 'asdasd', 'กำลังแก้ไข', '2024-07-21 17:09:52'),
(127, 14, 'aaaaaaaaaaaaaaa', 'กำลังแก้ไข', '2024-07-21 17:10:00'),
(128, 14, 'aaaaaaaaaaaaaaa', 'กำลังแก้ไข', '2024-07-21 17:11:45'),
(129, 14, 'aaaaaaaaaaaaaaa', 'กำลังแก้ไข', '2024-07-21 17:11:54'),
(130, 14, '(ป', 'กำลังแก้ไข', '2024-07-21 17:12:07'),
(131, 14, '(ป', 'กำลังแก้ไข', '2024-07-21 17:13:17'),
(132, 14, 'ฟหกหฟก', 'กำลังแก้ไข', '2024-07-21 17:13:22'),
(133, 4, '1111111', 'กำลังแก้ไข', '2024-07-21 17:13:39'),
(134, 15, 'PP ', 'กำลังแก้ไข', '2024-07-21 17:15:41'),
(135, 15, 'PP ', 'กำลังแก้ไข', '2024-07-21 17:16:18'),
(136, 15, 'PP ', 'กำลังแก้ไข', '2024-07-21 17:16:24'),
(137, 15, 'aaaaaaasdsdsd', 'กำลังแก้ไข', '2024-07-22 10:51:48'),
(138, 15, 'asdsd', 'กำลังแก้ไข', '2024-07-22 10:51:57'),
(139, 15, 'asdsd', 'กำลังแก้ไข', '2024-07-22 10:52:34'),
(140, 15, 'aaaaaaaassqsq', 'แก้ไขเสร็จสิ้น', '2024-07-22 10:52:47'),
(141, 15, '5555555', 'กำลังแก้ไข', '2024-07-24 14:50:44'),
(142, 16, '111', 'กำลังแก้ไข', '2024-07-24 14:53:48'),
(143, 16, '123123', 'กำลังแก้ไข', '2024-07-24 14:53:53'),
(144, 13, 'wwwww', 'กำลังแก้ไข', '2024-07-26 18:03:16'),
(145, 13, 'aaaaaaaaaaaaaaa', 'กำลังแก้ไข', '2024-07-26 18:03:24'),
(146, 13, 'aaaaaaaaaaaaaaa', 'กำลังแก้ไข', '2024-07-26 18:03:51'),
(147, 14, 'sssss', 'กำลังแก้ไข', '2024-07-26 18:04:31'),
(148, 14, 'ฟหก', 'กำลังแก้ไข', '2024-07-26 18:04:55'),
(149, 17, '1', 'กำลังแก้ไข', '2024-07-26 18:06:29'),
(150, 17, '2', 'กำลังแก้ไข', '2024-07-26 18:06:43'),
(151, 17, '1', 'กำลังแก้ไข', '2024-07-26 18:06:48'),
(152, 17, '3', 'กำลังแก้ไข', '2024-07-26 18:08:30'),
(153, 17, '5', 'กำลังแก้ไข', '2024-07-26 18:08:37'),
(154, 17, '6', 'แก้ไขเสร็จสิ้น', '2024-07-26 18:08:46'),
(155, 17, '1', 'กำลังแก้ไข', '2024-07-26 18:24:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(11) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `AdminuserName` varchar(20) NOT NULL,
  `MobileNumber` bigint(12) NOT NULL,
  `Email` varchar(120) NOT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp(),
  `userRole` int(1) DEFAULT NULL,
  `isActive` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `AdminuserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`, `userRole`, `isActive`) VALUES
(1, 'Admin', 'admin', 2147483647, 'sdadsa@gmail.com', '07811dc6c422334ce36a09ff5cd6fe71', '2022-02-24 18:30:00', NULL, 1),
(4, 'it', 'it', 0, '0@0.0', '07811dc6c422334ce36a09ff5cd6fe71', '2022-02-24 18:30:00', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblfirereport`
--

CREATE TABLE `tblfirereport` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `Description` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Time` time DEFAULT NULL,
  `assignTo` int(11) DEFAULT NULL,
  `status` varchar(120) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `assignTime` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `assignTme` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `Concern` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `Track` enum('กำลังแก้ไข','แก้ไขเสร็จสิ้น') CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'กำลังแก้ไข'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblfirereport`
--

INSERT INTO `tblfirereport` (`id`, `fullName`, `Description`, `Date`, `Time`, `assignTo`, `status`, `postingDate`, `assignTime`, `assignTme`, `Concern`, `Track`) VALUES
(4, 'Ball', '1', '0000-00-00', '00:00:00', NULL, NULL, '2024-07-07 14:11:13', NULL, '', '', 'แก้ไขเสร็จสิ้น'),
(5, 'ball it', '1', '0000-00-00', '01:11:11', NULL, NULL, '2024-07-10 03:56:50', NULL, '', '', 'กำลังแก้ไข'),
(6, '1', '', '0000-00-00', '00:00:00', NULL, NULL, '2024-07-10 05:28:29', NULL, '', '', 'แก้ไขเสร็จสิ้น'),
(7, '1', '', '0000-00-00', '00:00:00', NULL, NULL, '2024-07-10 05:30:58', NULL, '', '', 'กำลังแก้ไข'),
(8, 'asd', '', '0000-00-00', '00:00:01', NULL, NULL, '2024-07-10 07:12:19', NULL, '', '00', 'กำลังแก้ไข'),
(9, 'Test1 online', 'oline', '2024-07-11', '12:03:00', NULL, NULL, '2024-07-11 05:03:59', NULL, '', 'ccc', 'กำลังแก้ไข'),
(10, 'asd', 'asdasd', '2024-07-01', '12:05:00', NULL, NULL, '2024-07-11 05:05:35', NULL, '', 'aaaa', 'กำลังแก้ไข'),
(11, '1', '111', '0000-00-00', '00:00:00', NULL, NULL, '2024-07-11 05:39:35', NULL, '', '11111', 'กำลังแก้ไข'),
(12, '2', '22', '2024-07-11', '12:46:00', NULL, NULL, '2024-07-11 05:40:26', NULL, '', '222', 'แก้ไขเสร็จสิ้น'),
(13, 'Test 1 Event', 'Event Desicription', '2024-07-13', '16:28:00', 5, 'Fire Relief Work in Progress', '2024-07-13 09:28:18', NULL, '14-07-24 03:07:14', 'IT', 'แก้ไขเสร็จสิ้น'),
(14, 'PP Ballily', 'ssss', '2024-07-14', '13:53:00', NULL, NULL, '2024-07-14 06:54:02', NULL, '', 'qqwe', 'แก้ไขเสร็จสิ้น'),
(15, 'PP PP ', 'ssss', '2024-07-22', '00:15:00', NULL, NULL, '2024-07-21 17:15:21', NULL, '', 'PP ', 'กำลังแก้ไข'),
(16, 'papa didi', '123123', '2024-07-24', '21:14:00', NULL, NULL, '2024-07-24 14:53:23', NULL, '', '000', 'กำลังแก้ไข'),
(17, '2024', '2024', '2024-07-27', '00:02:00', NULL, NULL, '2024-07-26 17:02:47', NULL, '', '2024', 'กำลังแก้ไข');

-- --------------------------------------------------------

--
-- Table structure for table `tblfiretequesthistory`
--

CREATE TABLE `tblfiretequesthistory` (
  `id` int(11) NOT NULL,
  `requestId` int(11) DEFAULT NULL,
  `status` varchar(120) DEFAULT NULL,
  `remark` mediumtext DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblfiretequesthistory`
--

INSERT INTO `tblfiretequesthistory` (`id`, `requestId`, `status`, `remark`, `postingDate`) VALUES
(7, 13, 'Team On the Way', '12345', '2024-07-14 08:20:35'),
(8, 13, 'Fire Relief Work in Progress', 'asasa', '2024-07-14 08:28:50');

-- --------------------------------------------------------

--
-- Table structure for table `tblsite`
--

CREATE TABLE `tblsite` (
  `id` int(11) NOT NULL,
  `siteTitle` varchar(255) DEFAULT NULL,
  `siteLogo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblsite`
--

INSERT INTO `tblsite` (`id`, `siteTitle`, `siteLogo`) VALUES
(1, ' Website Name', '0ff253604021e7220d4e77c1979b3c46.png');

-- --------------------------------------------------------

--
-- Table structure for table `tblteams`
--

CREATE TABLE `tblteams` (
  `id` int(11) NOT NULL,
  `teamName` varchar(255) DEFAULT NULL,
  `teamLeaderName` varchar(255) DEFAULT NULL,
  `teamLeadMobno` bigint(12) DEFAULT NULL,
  `teamMembers` mediumtext DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblteams`
--

INSERT INTO `tblteams` (`id`, `teamName`, `teamLeaderName`, `teamLeadMobno`, `teamMembers`, `postingDate`) VALUES
(5, 'Padiat.pa', 'IT', 5013, 'IT,1', '2024-07-14 08:14:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_action`
--
ALTER TABLE `add_action`
  ADD PRIMARY KEY (`id_ac`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_events`
--
ALTER TABLE `sub_events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblfirereport`
--
ALTER TABLE `tblfirereport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblfiretequesthistory`
--
ALTER TABLE `tblfiretequesthistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsite`
--
ALTER TABLE `tblsite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblteams`
--
ALTER TABLE `tblteams`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_action`
--
ALTER TABLE `add_action`
  MODIFY `id_ac` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `sub_events`
--
ALTER TABLE `sub_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblfirereport`
--
ALTER TABLE `tblfirereport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tblfiretequesthistory`
--
ALTER TABLE `tblfiretequesthistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblsite`
--
ALTER TABLE `tblsite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblteams`
--
ALTER TABLE `tblteams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sub_events`
--
ALTER TABLE `sub_events`
  ADD CONSTRAINT `sub_events_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `tblfirereport` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
