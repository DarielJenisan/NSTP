-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2024 at 03:14 AM
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
-- Database: `db_nstp`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `masterlist_view`
-- (See below for the actual view)
--
CREATE TABLE `masterlist_view` (
`student_id` int(11)
,`firstname` varchar(30)
,`middlename` varchar(30)
,`lastname` varchar(30)
,`suffixname` varchar(6)
,`gender` varchar(6)
,`semester1` varchar(10)
,`sectioncode1` varchar(10)
,`school1` text
,`academicyear1` varchar(10)
,`semester2` varchar(10)
,`sectioncode2` varchar(10)
,`school2` text
,`academicyear2` varchar(10)
,`serialnumber` text
,`remarks` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `studentinformation_view`
-- (See below for the actual view)
--
CREATE TABLE `studentinformation_view` (
`student_id` int(11)
,`firstname` varchar(30)
,`middlename` varchar(30)
,`lastname` varchar(30)
,`suffixname` varchar(6)
,`birthday` varchar(20)
,`gender` varchar(6)
,`email` varchar(100)
,`barangay` varchar(30)
,`municipality` varchar(30)
,`province` varchar(30)
,`region` varchar(30)
,`contactnumber` text
,`yearlevel` varchar(20)
,`department` text
,`major` text
,`serialnumber` text
,`semester1` varchar(10)
,`sectioncode1` varchar(10)
,`school1` text
,`academicyear1` varchar(10)
,`semester2` varchar(10)
,`sectioncode2` varchar(10)
,`school2` text
,`academicyear2` varchar(10)
,`awardyear` varchar(20)
,`component` varchar(10)
,`institutioncode` int(10)
,`agencytype` text
,`remarks` text
,`program` text
,`daterelease` varchar(50)
,`coordinator` varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `admin_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `middlename` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `suffixname` varchar(10) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`admin_id`, `school_id`, `firstname`, `middlename`, `lastname`, `suffixname`, `email`, `username`, `password`, `role`, `created_at`) VALUES
(1, 123456, 'John Mark', 'L.', 'Boyonas', NULL, '123456@nbsc.edu.ph', 'admin', '123456', 'Coordinator', '2024-08-19 04:50:31'),
(2, 20211271, 'Dariel', 'Sayagnon', 'Jenisan', NULL, '20211271@nbsc.edu.ph', 'dariel', 'SleepyAsh', 'System Developer', '2024-08-19 09:34:23');

-- --------------------------------------------------------

--
-- Table structure for table `tblcertificate`
--

CREATE TABLE `tblcertificate` (
  `certificate_id` int(11) NOT NULL,
  `daterelease` varchar(50) NOT NULL,
  `coordinator` varchar(100) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcertificate`
--

INSERT INTO `tblcertificate` (`certificate_id`, `daterelease`, `coordinator`, `student_id`) VALUES
(1, '03/23/2004', 'JOHN MARK L. BOYONAS, MAEng', 20232059),
(2, '12/29/2009', 'JOHN MARK L. BOYONAS, MAEng', 20231110),
(3, '08/30/2022', 'JOHN MARK L. BOYONAS, MAEng', 20231900),
(4, '08/30/2022', 'JOHN MARK L. BOYONAS, MAEng', 20231090),
(5, '08/30/2022', 'JOHN MARK L. BOYONAS, MAEng', 20231154),
(6, '08/30/2022', 'JOHN MARK L. BOYONAS, MAEng', 20231033),
(7, '9/09/2007', 'JOHN MARK L. BOYONAS, MAEng', 20231359),
(8, '9/09/2007', 'JOHN MARK L. BOYONAS, MAEng', 20231562),
(9, '9/09/2007', 'JOHN MARK L. BOYONAS, MAEng', 20232254);

-- --------------------------------------------------------

--
-- Table structure for table `tblnstp`
--

CREATE TABLE `tblnstp` (
  `nstp_id` int(13) NOT NULL,
  `semester1` varchar(10) DEFAULT NULL,
  `sectioncode1` varchar(10) DEFAULT NULL,
  `school1` text DEFAULT NULL,
  `academicyear1` varchar(10) DEFAULT NULL,
  `semester2` varchar(10) DEFAULT NULL,
  `sectioncode2` varchar(10) DEFAULT NULL,
  `school2` text DEFAULT NULL,
  `academicyear2` varchar(10) DEFAULT NULL,
  `student_id` int(11) NOT NULL,
  `awardyear` varchar(20) DEFAULT NULL,
  `component` varchar(10) DEFAULT NULL,
  `institutioncode` int(10) DEFAULT NULL,
  `program` text DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `agencytype` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblnstp`
--

INSERT INTO `tblnstp` (`nstp_id`, `semester1`, `sectioncode1`, `school1`, `academicyear1`, `semester2`, `sectioncode2`, `school2`, `academicyear2`, `student_id`, `awardyear`, `component`, `institutioncode`, `program`, `remarks`, `agencytype`) VALUES
(1, 'CWTS1', 'TEP21', 'Northern Bukidnon State College', '2023-2024', 'CWTS2', 'TEP50', 'Northern Bukidnon State College', '2023-2024', 20231090, '2025', 'CWTS', 10114, NULL, 'VALIDATED', 'SUV'),
(2, 'CWTS1', 'TEP47', 'Northern Bukidnon State College', '2023-2024', 'CWTS2', 'TEP40', 'Northern Bukidnon State College', '2023-2024', 20231110, '2025', 'CWTS', 10114, NULL, 'VALIDATED', 'SUV'),
(3, 'ROTC1', 'TEP225', 'Northern Bukidnon State College', '2023-2024', 'ROTC2', 'BA227', 'Northern Bukidnon State College', '2023-2024', 20231154, '2025', NULL, 10114, NULL, 'VALIDATED', 'SUV'),
(4, 'CWTS1', 'BA179', 'Northern Bukidnon State College', '2023-2024', 'CWTS2', 'BA219', 'Northern Bukidnon State College', '2023-2024', 20231359, '2025', 'CWTS', 10114, NULL, 'VALIDATED', 'SUV'),
(5, 'ROTC1', 'IT7', 'Northern Bukidnon State College', '2023-2024', 'ROTC2', 'BA227', 'Northern Bukidnon State College', '2023-2024', 20231562, '2025', NULL, 10114, NULL, 'VALIDATED', 'SUV'),
(6, 'CWTS1', 'IT23', 'Northern Bukidnon State College', '2023-2024', 'CWTS2', 'IT93', 'Northern Bukidnon State College', '2023-2024', 20231900, '2025', '', 10114, NULL, 'VALIDATED', 'SUV'),
(7, 'ROTC1', 'BA170', 'Northern Bukidnon State College', '2023-2024', 'ROTC2', 'BA227', 'Northern Bukidnon State College', '2023-2024', 20232059, '2025', 'ROTC', 10114, '', 'VALIDATED', 'SUV'),
(8, 'CWTS1', 'BA184', 'Northern Bukidnon State College', '2023-2024', 'CWTS2', 'BA217', 'Northern Bukidnon State College', '2023-2024', 20232254, '2025', 'CWTS', 10114, NULL, 'VALIDATED', 'SUV'),
(9, 'ROTC1', 'TEP224', 'Northern Bukidnon State College', '2023-2024', 'ROTC2', 'IT18', 'Northern Bukidnon State College', '2023-2024', 20231033, '2025', NULL, 10114, NULL, 'VALIDATED', 'SUV'),
(16, 'CWTS1', 'BA172', 'Northern Bukidnon State College', '2023-2024', 'CWTS2', 'BA226', 'Northern Bukidnon State College', '2023-2024', 20231170, '2025', 'CWTS', 10114, NULL, 'VALIDATED', 'SUV'),
(17, 'CWTS1', 'BA172', 'Northern Bukidnon State College', '2023-2024', 'CWTS2', 'BA214', 'Northern Bukidnon State College', '2023-2024', 20231553, '2025', 'CWTS', 10114, NULL, 'VALIDATED', 'SUV'),
(18, 'CWTS1', 'BA175', 'Northern Bukidnon State College', '2023-2024', 'CWTS2', 'BA222', 'Northern Bukidnon State College', '2023-2024', 20231453, '2025', 'CWTS', 10114, NULL, 'VALIDATED', 'SUV'),
(19, 'CWTS1', 'BA180', 'Northern Bukidnon State College', '2023-2024', 'CWTS2', 'BA217', 'Northern Bukidnon State College', '2023-2024', 20231472, '2025', 'CWTS', 10114, NULL, 'VALIDATED', 'SUV'),
(20, 'CWTS1', 'BA262', 'Northern Bukidnon State College', '2023-2024', 'CWTS2', 'BA217', 'Northern Bukidnon State College', '2023-2024', 20221237, '2025', 'CWTS', 10114, NULL, 'VALIDATED', 'SUV'),
(21, 'CWTS1', 'BA181', 'Northern Bukidnon State College', '2023-2024', 'CWTS2', 'BA213', 'Northern Bukidnon State College', '2023-2024', 20231204, '2025', 'CWTS', 10114, NULL, 'VALIDATED', 'SUV'),
(22, 'CWTS1', 'BA175', 'Northern Bukidnon State College', '2023-2024', 'CWTS2', 'BA216', 'Northern Bukidnon State College', '2023-2024', 20231184, '2025', 'CWTS', 10114, NULL, 'VALIDATED', 'SUV'),
(23, 'CWTS1', 'BA173', 'Northern Bukidnon State College', '2023-2024', 'CWTS2', 'BA216', 'Northern Bukidnon State College', '2023-2024', 20231508, '2025', 'CWTS', 10114, NULL, 'VALIDATED', 'SUV'),
(24, 'CWTS1', 'BA182', 'Northern Bukidnon State College', '2023-2024', 'CWTS2', 'BA214', 'Northern Bukidnon State College', '2023-2024', 20231502, '2025', 'CWTS', 10114, NULL, 'VALIDATED', 'SUV'),
(25, 'CWTS1', 'TEP21', 'Northern Bukidnon State College', '2023-2024', 'CWTS2', 'TEP60', 'Northern Bukidnon State College', '2023-2024', 20231149, '2025', 'CWTS', 10114, NULL, 'VALIDATED', 'SUV'),
(26, 'CWTS1', 'TEP4', 'Northern Bukidnon State College', '2023-2024', 'CWTS2', 'TEP10', 'Northern Bukidnon State College', '2023-2024', 20231278, '2025', 'CWTS', 10114, '', 'VALIDATED', 'SUV'),
(27, 'CWTS1', 'TEP4', 'Northern Bukidnon State College', '2023-2024', 'CWTS2', 'TEP30', 'Northern Bukidnon State College', '2023-2024', 20231158, '2025', 'CWTS', 10114, NULL, 'VALIDATED', 'SUV'),
(28, 'CWTS1', 'BA173', 'Northern Bukidnon State College', '2023-2024', 'CWTS2', 'BA217', 'Northern Bukidnon State College', '2023-2024', 20231265, '2025', 'CWTS', 10114, NULL, 'VALIDATED', 'SUV'),
(29, 'CWTS1', 'TEP16', 'Northern Bukidnon State College', '2023-2024', 'CWTS2', 'TEP20', 'Northern Bukidnon State College', '2023-2024', 20231087, '2025', 'CWTS', 10114, NULL, 'VALIDATED', 'SUV'),
(30, 'CWTS1', 'IT7', 'Northern Bukidnon State College', '2021-2022', 'CWTS2', 'IT8', 'Northern Bukidnon State College', '2021-2022', 20211271, '2022', 'CWTS', 10114, NULL, 'VALIDATED', 'SUV'),
(31, 'ROTC1', 'BA170', 'Northern Bukidnon State College', '2023-2024', 'ROTC2', 'BA227', 'Northern Bukidnon State College', '2023-2024', 20231099, NULL, NULL, NULL, NULL, 'VALIDATED', NULL),
(32, 'ROTC1', 'BA170', 'Northern Bukidnon State College', '2023-2024', 'ROTC2', 'BA227', 'Northern Bukidnon State College', '2023-2024', 20232048, NULL, NULL, NULL, NULL, 'VALIDATED', NULL),
(33, 'ROTC1', 'BA167', 'Northern Bukidnon State College', '2023-2024', 'ROTC2', 'BA227', 'Northern Bukidnon State College', '2023-2024', 20221595, NULL, NULL, NULL, NULL, 'VALIDATED', NULL),
(34, 'ROTC1', 'BA167', 'Northern Bukidnon State College', '2023-2024', 'ROTC2', 'BA227', 'Northern Bukidnon State College', '2023-2024', 20232022, NULL, NULL, NULL, NULL, 'VALIDATED', NULL),
(35, 'ROTC1', 'BA169', 'Northern Bukidnon State College', '2023-2024', 'ROTC2', 'BA227', 'Northern Bukidnon State College', '2023-2024', 20231252, NULL, NULL, NULL, NULL, 'VALIDATED', NULL),
(36, 'ROTC1', 'BA169', 'Northern Bukidnon State College', '2023-2024', 'ROTC2', 'BA227', 'Northern Bukidnon State College', '2023-2024', 20232226, NULL, NULL, NULL, NULL, 'VALIDATED', NULL),
(37, 'ROTC1', 'IT15', 'Northern Bukidnon State College', '2023-2024', 'ROTC2', 'BA227', 'Northern Bukidnon State College', '2023-2024', 20231392, NULL, NULL, NULL, NULL, 'VALIDATED', NULL),
(38, 'ROTC1', 'BA171', 'Northern Bukidnon State College', '2023-2024', 'ROTC2', 'IT18', 'Northern Bukidnon State College', '2023-2024', 20232214, NULL, NULL, NULL, NULL, 'VALIDATED', NULL),
(39, 'ROTC1', 'BA169', 'Northern Bukidnon State College', '2023-2024', 'ROTC2', 'TEP72', 'Northern Bukidnon State College', '2023-2024', 20231973, NULL, NULL, NULL, NULL, 'VALIDATED', NULL),
(40, 'ROTC1', 'BA170', 'Northern Bukidnon State College', '2023-2024', 'ROTC2', 'IT18', 'Northern Bukidnon State College', '2023-2024', 20231654, NULL, NULL, NULL, NULL, 'VALIDATED', NULL),
(41, 'ROTC1', 'IT7', 'Northern Bukidnon State College', '2023-2024', 'ROTC2', 'TEP72', 'Northern Bukidnon State College', '2023-2024', 20231223, NULL, NULL, NULL, NULL, 'VALIDATED', NULL),
(42, 'ROTC1', 'BA169', 'Northern Bukidnon State College', '2023-2024', 'ROTC2', 'BA227', 'Northern Bukidnon State College', '2023-2024', 20232269, NULL, NULL, NULL, NULL, 'VALIDATED', NULL),
(43, 'ROTC1', 'BA169', 'Northern Bukidnon State College', '2023-2024', 'ROTC2', 'BA227', 'Northern Bukidnon State College', '2023-2024', 20231947, NULL, NULL, NULL, NULL, 'VALIDATED', NULL),
(44, 'ROTC1', 'BA167', 'Northern Bukidnon State College', '2023-2024', 'ROTC2', 'BA227', 'Northern Bukidnon State College', '2023-2024', 20232164, NULL, NULL, NULL, NULL, 'VALIDATED', NULL),
(45, 'ROTC1', 'IT15', 'Northern Bukidnon State College', '2023-2024', 'ROTC2', 'BA227', 'Northern Bukidnon State College', '2023-2024', 20231860, NULL, NULL, NULL, NULL, 'VALIDATED', NULL),
(46, 'CWTS1', 'IT7', 'Northern Bukidnon State College', '2021-2022', 'CWTS2', 'IT8', 'Northern Bukidnon State College', '2021-2022', 20201641, '2022', 'CWTS', 10114, '', 'VALIDATED', 'SUV'),
(47, 'CWTS1', 'BA179', 'Northern Bukidnon State College', '2023-2024', '', 'BA219', 'Northern Bukidnon State College', '2023-2024', 20222360, '', '', 0, '', 'VALIDATED', ''),
(48, 'CWTS1', 'IT7', 'Northern Bukidnon State College', '2023-2024', 'CWTS2', 'IT8', 'Northern Bukidnon State College', '2023-2024', 20231516, '', '', 0, '', 'VALIDATED', ''),
(49, 'CWTS1', 'IT7', 'Northern Bukidnon State College', '2023-2024', 'CWTS2', 'IT8', 'Northern Bukidnon State College', '2023-2024', 20211879, '', '', 0, '', 'VALIDATED', ''),
(50, 'CWTS1', 'IT7', 'Northern Bukidnon State College', '2023-2024', 'CWTS2', 'IT8', 'Northern Bukidnon State College', '2023-2024', 20231937, '2024', '', 0, '', 'VALIDATED', ''),
(51, 'CWTS1', 'IT7', 'Northern Bukidnon State College', '2021-2022', 'CWTS2', 'IT8', 'Northern Bukidnon State College', '2023-2024', 20232199, '', '', 0, '', 'VALIDATED', ''),
(52, 'CWTS1', 'TEP225', 'Northern Bukidnon State College', '2021-2022', 'CWTS2', 'TEP50', 'Northern Bukidnon State College', '2021-2022', 20231963, '', '', 0, '', 'VALIDATED', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent`
--

CREATE TABLE `tblstudent` (
  `student_id` int(11) NOT NULL,
  `firstname` varchar(30) DEFAULT NULL,
  `middlename` varchar(30) DEFAULT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `suffixname` varchar(6) DEFAULT NULL,
  `birthday` varchar(20) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `barangay` varchar(30) DEFAULT NULL,
  `municipality` varchar(30) DEFAULT NULL,
  `province` varchar(30) DEFAULT NULL,
  `region` varchar(30) DEFAULT NULL,
  `contactnumber` text DEFAULT NULL,
  `yearlevel` varchar(20) DEFAULT NULL,
  `department` text DEFAULT NULL,
  `major` text DEFAULT NULL,
  `serialnumber` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` (`student_id`, `firstname`, `middlename`, `lastname`, `suffixname`, `birthday`, `gender`, `email`, `barangay`, `municipality`, `province`, `region`, `contactnumber`, `yearlevel`, `department`, `major`, `serialnumber`) VALUES
(20201641, 'Kent Bryan', 'Tejada', 'Palangpanagan', '', '', 'MALE', '', 'SANKANAN', 'Manolo Fortich', 'Bukidnon', NULL, '', '4th', 'Bachelor of Science in Information Technology', '', '0202121'),
(20211271, 'DARIEL', 'SAYAGNON', 'JENISAN', '', '2024-10-28', 'MALE', '20211271@nbsc.edu.ph', 'SANKANAN', 'MANOLO FORTICH', 'BUKIDNON', NULL, '09704434613', '4th', 'Bachelor of Science in Information Technology', '', '9656453'),
(20211879, 'PRINCESS DIANNE', 'GAYAPA', 'ALINDONG', '', '', 'FEMALE', '', '', '', '', NULL, '', '', 'Bachelor of Science in Information Technology', '', '221312313'),
(20221237, 'RHEALYN CLAIRE', 'ANLICAO', 'ACAO', '', '3/29/2002', 'FEMALE', '20221237@nbsc.edu.ph', 'TANKULAN', 'MANOLO FORTIC', 'BUKIDNON', 'X', '9456466745', '1st year', 'Bachelor of Science in Business Administration', 'Marketing Management', '9353925569'),
(20221595, 'PRINCESS CAMILLE', 'PASAGDE', 'ABASOLO', NULL, NULL, 'FEMALE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bachelor of Science in Business Administration', 'Marketing Management', '9979459651'),
(20222360, 'LEAH MAE', 'SENAGONIA', 'ALIMBOG', '', '', 'FEMALE', '', 'TANKULAN', 'MANOLO FORTIC', 'BUKIDNON', NULL, '', '1st year', 'Teacher Education Program', '', ''),
(20231033, 'MARIA WENCYLIZ', NULL, 'ACIL', NULL, NULL, 'MALE', '20231033@nbsc.edu.ph', NULL, NULL, NULL, NULL, '9456466745', '1st year', 'Teacher Education Program', NULL, '9352975609'),
(20231087, 'ALTHEA GENESIS', 'MANDAMIENTO', 'ALEJAGA', '', '4/8/2002', 'FEMALE', '20231087@nbsc.edu.ph', 'TANKULAN', 'MANOLO FORTIC', 'BUKIDNON', 'X', '9456466745', '1st year', 'Teacher Education Program', NULL, '9676059821'),
(20231090, 'JESTHONY', 'LAMORIN', 'AGUA', '', '4/4/2002', 'MALE', '20231090@nbsc.edu.ph', 'TANKULAN', 'MANOLO FORTIC', 'BUKIDNON', 'X', '9456466745', '1st year', 'Teacher Education Program', NULL, '9476978484'),
(20231099, 'WELLAND ROE', 'GANTE', 'ABAN', NULL, NULL, 'MALE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bachelor of Science in Business Administration', 'Marketing Management', '9531527954'),
(20231110, 'CHRISTINE', 'DEGORIO', 'ABELLA', '', '3/24/2002', 'FEMALE', '20231110@nbsc.edu.ph', 'TANKULAN', 'MANOLO FORTIC', 'BUKIDNON', 'X', '9456466745', '1st year', 'Teacher Education Program', NULL, '9059635492'),
(20231149, 'SANDARA', 'SASAHIC', 'AGBAY', '', '4/3/2002', 'FEMALE', '20231149@nbsc.edu.ph', 'TANKULAN', 'MANOLO FORTIC', 'BUKIDNON', 'X', '9456466745', '1st year', 'Teacher Education Program', NULL, '9682091897'),
(20231154, 'JOCIEL', 'DOMO', 'ALBIA', '', '', 'MALE', '20231154@nbsc.edu.ph', '', '', '', NULL, '9456466745', '1st year', 'Teacher Education Program', NULL, '9771085562'),
(20231158, 'FRANCINE EZRA', 'RAAGAS', 'ALBARECE', '', '4/6/2002', 'FEMALE', '20231158@nbsc.edu.ph', 'TANKULAN', 'MANOLO FORTIC', 'BUKIDNON', 'X', '9456466745', '1st year', 'Teacher Education Program', NULL, '9658972962'),
(20231170, 'VIA MARIE', 'BACUDO', 'ABELLA', '', '3/25/2002', 'FEMALE', '20231170@nbsc.edu.ph', 'TANKULAN', 'MANOLO FORTIC', 'BUKIDNON', 'X', '9456466745', '1st year', 'Bachelor of Science in Business Administration', 'Marketing Management', '9655902212'),
(20231184, 'KIAHRA', 'VELASQUEZ', 'ACHAS', '', '3/31/2002', 'FEMALE', '20231184@nbsc.edu.ph', 'TANKULAN', 'MANOLO FORTIC', 'BUKIDNON', 'X', '9456466745', '1st year', 'Bachelor of Science in Business Administration', 'Marketing Management', '9073380445'),
(20231204, 'MELANIE', 'PELORAMAS', 'ACASO', '', '3/30/2002', 'FEMALE', '20231204@nbsc.edu.ph', 'TANKULAN', 'MANOLO FORTIC', 'BUKIDNON', 'X', '9456466745', '1st year', 'Bachelor of Science in Business Administration', 'Marketing Management', '9651002621'),
(20231223, 'AVILLA MAE', 'CAPAYCAPAY', 'ACMA', NULL, NULL, 'FEMALE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bachelor of Science in Information Technology', NULL, '9364894683'),
(20231252, 'ANNA LOU', 'SALUAGA', 'ABELLO', NULL, NULL, 'FEMALE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bachelor of Science in Business Administration', 'Marketing Management', '9366175947'),
(20231265, 'JOHN LOYD', 'CAGABCABON', 'ALBERCA', '', '4/7/2002', 'MALE', '20231265@nbsc.edu.ph', 'TANKULAN', 'MANOLO FORTIC', 'BUKIDNON', 'X', '9456466745', '1st year', 'Bachelor of Science in Business Administration', 'Marketing Management', '9153019166'),
(20231278, 'DINAH JEHALLELEL', 'ONAHON', 'AGUNOD', '', '', 'FEMALE', '20231278@nbsc.edu.ph', 'TANKULAN', 'MANOLO FORTIC', 'BUKIDNON', 'X', '9456466745', '1st year', 'Teacher Education Program', '', '9759753691'),
(20231359, 'PAULEEN ANNE', 'FRANCHE', 'ABAN', '', '', 'FEMALE', '20231359@nbsc.edu.ph', 'TANKULAN', 'MANOLO FORTIC', 'BUKIDNON', 'X', '9456466745', '1st year', 'Bachelor of Science in Business Administration', 'Marketing Management', '9058125231'),
(20231392, 'IRISH CATHERINE', 'BATUIGAS', 'ABRADA', NULL, NULL, 'MALE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bachelor of Science in Information Technology', NULL, '9948537817'),
(20231453, 'JANICE', 'HULAGPOS', 'ABONALES', '', '3/27/2002', 'FEMALE', '20231453@nbsc.edu.ph', 'TANKULAN', 'MANOLO FORTIC', 'BUKIDNON', 'X', '9456466745', '1st year', 'Bachelor of Science in Business Administration', 'Marketing Management', '9709827497'),
(20231472, 'KIZZIAH', 'HONONGAN', 'ABUNDA', '', '3/28/2002', 'FEMALE', '20231472@nbsc.edu.ph', 'TANKULAN', 'MANOLO FORTIC', 'BUKIDNON', 'X', '9456466745', '1st year', 'Bachelor of Science in Business Administration', 'Marketing Management', '9461081768'),
(20231502, 'RHEA PRINCES JANE', 'REPIÃ‘AN', 'ADORABLE', '', '4/2/2002', 'FEMALE', '20231502@nbsc.edu.ph', 'TANKULAN', 'MANOLO FORTIC', 'BUKIDNON', 'X', '9456466745', '1st year', 'Bachelor of Science in Business Administration', 'Marketing Management', '9513866191'),
(20231508, 'JOSHUA ALPHONSUS', 'LICUANAN', 'ACHAS', '', '4/1/2002', 'MALE', '20231508@nbsc.edu.ph', 'TANKULAN', 'MANOLO FORTIC', 'BUKIDNON', 'X', '9456466745', '1st year', 'Bachelor of Science in Business Administration', 'Marketing Management', '9271466256'),
(20231516, 'ROVAGENE', 'SARSALEJO', 'ALIMBOG', '', '', 'FEMALE', '', '', '', '', NULL, '', '', 'Bachelor of Science in Information Technology', '', '9531586989'),
(20231553, 'SANDRA', 'EDUROT', 'ABISTA', '', '3/26/2002', 'FEMALE', '20231553@nbsc.edu.ph', 'TANKULAN', 'MANOLO FORTIC', 'BUKIDNON', 'X', '9456466745', '1st year', 'Bachelor of Science in Business Administration', 'Marketing Management', '9758413140'),
(20231562, 'RYNIER CADE', 'TABAQUE', 'ACHAS', NULL, NULL, 'FEMALE', '20231562@nbsc.edu.ph', NULL, NULL, NULL, NULL, '9456466745', '1st year', 'Bachelor of Science in Information Technology', NULL, '9261058361'),
(20231654, 'ELGEN', 'MORILLO', 'ABUELO', NULL, NULL, 'FEMALE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bachelor of Science in Business Administration', 'Marketing Management', '9366850901'),
(20231860, 'DUSTIN DAVE', 'CABAÃ‘EROS', 'AGUANTA', NULL, NULL, 'MALE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bachelor of Science in Information Technology', NULL, '9614949662'),
(20231900, 'JAMES FLORENCE', 'FERNANDEZ', 'ANTICAMARA', '', '', 'MALE', '20231900@nbsc.edu.ph', '', '', '', NULL, '9456466745', '1st year', 'Bachelor of Science in Information Technology', '', '9512909933'),
(20231937, 'ELIZA GRACE', 'GABINETE', 'ALIVIO', '', '', 'FEMALE', '', 'TANKULAN', '', '', NULL, '', '1st', 'Bachelor of Science in Information Technology', '', '1231221'),
(20231947, 'ALVINNE SHAYNE', 'ESNALDO', 'ACUT', NULL, NULL, 'MALE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bachelor of Science in Business Administration', 'Marketing Management', '9100672284'),
(20231963, 'RAYFRANCES', 'OBSIOMA', 'ALUTO', '', '', 'MALE', '', '', '', '', NULL, '', '', 'Teacher Education Program', '', '9531586989'),
(20231973, 'ARCHELLO', 'TILACAS', 'ABUCAYAN', NULL, NULL, 'FEMALE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bachelor of Science in Business Administration', 'Marketing Management', '9756040908'),
(20232022, 'JOHN REY', NULL, 'ABELLA', NULL, NULL, 'MALE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bachelor of Science in Business Administration', 'Marketing Management', '9353986175'),
(20232048, 'FLORDELIZ', 'TABAQUE', 'ABARABAR', NULL, NULL, 'FEMALE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bachelor of Science in Business Administration', 'Marketing Management', '9353927945'),
(20232059, 'ROSE GERALDINE', 'TUMAMPOS', 'ABADINAS', '', '2024-09-11', 'FEMALE', '20232059@nbsc.edu.ph', 'Tankulan', 'Manolo Fortich', 'Bukidnon', NULL, '90867568', '1st', 'Bachelor of Science in Business Administration', 'Marketing Management', '9531586989'),
(20232164, 'CARLOS NEIL', 'CAÃ‘ETE', 'AGPASA', NULL, NULL, 'FEMALE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bachelor of Science in Business Administration', 'Marketing Management', '9651727151'),
(20232199, 'PRYNZ', 'BINOTONG', 'ALUMBRO', '', '', 'MALE', '', '', '', '', NULL, '', '', 'Bachelor of Science in Information Technology', '', '9655902212'),
(20232214, 'VINCENT BRYELL', 'MALINAWON', 'ABRIOL', NULL, NULL, 'MALE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bachelor of Science in Business Administration', 'Marketing Management', '9639580655'),
(20232226, 'SHENNA GRACE', NULL, 'ABONALO', NULL, NULL, 'FEMALE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bachelor of Science in Business Administration', 'Marketing Management', '9557567573'),
(20232254, 'SALIMA', 'SUMANGAN', 'ABDUL ALI', '', '3/23/2002', 'FEMALE', '20232254@nbsc.edu.ph', 'TANKULAN', 'MANOLO FORTIC', 'BUKIDNON', 'X', '9456466745', '1st year', 'Bachelor of Science in Business Administration', 'Marketing Management', '9855179330'),
(20232269, 'LYSLY SHY', 'DONSIG', 'ACOT', NULL, NULL, 'FEMALE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bachelor of Science in Business Administration', 'Marketing Management', '9262136929');

-- --------------------------------------------------------

--
-- Structure for view `masterlist_view`
--
DROP TABLE IF EXISTS `masterlist_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `masterlist_view`  AS SELECT `s`.`student_id` AS `student_id`, `s`.`firstname` AS `firstname`, `s`.`middlename` AS `middlename`, `s`.`lastname` AS `lastname`, `s`.`suffixname` AS `suffixname`, `s`.`gender` AS `gender`, `n`.`semester1` AS `semester1`, `n`.`sectioncode1` AS `sectioncode1`, `n`.`school1` AS `school1`, `n`.`academicyear1` AS `academicyear1`, `n`.`semester2` AS `semester2`, `n`.`sectioncode2` AS `sectioncode2`, `n`.`school2` AS `school2`, `n`.`academicyear2` AS `academicyear2`, `s`.`serialnumber` AS `serialnumber`, `n`.`remarks` AS `remarks` FROM (`tblstudent` `s` left join `tblnstp` `n` on(`s`.`student_id` = `n`.`student_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `studentinformation_view`
--
DROP TABLE IF EXISTS `studentinformation_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `studentinformation_view`  AS SELECT `s`.`student_id` AS `student_id`, `s`.`firstname` AS `firstname`, `s`.`middlename` AS `middlename`, `s`.`lastname` AS `lastname`, `s`.`suffixname` AS `suffixname`, `s`.`birthday` AS `birthday`, `s`.`gender` AS `gender`, `s`.`email` AS `email`, `s`.`barangay` AS `barangay`, `s`.`municipality` AS `municipality`, `s`.`province` AS `province`, `s`.`region` AS `region`, `s`.`contactnumber` AS `contactnumber`, `s`.`yearlevel` AS `yearlevel`, `s`.`department` AS `department`, `s`.`major` AS `major`, `s`.`serialnumber` AS `serialnumber`, `n`.`semester1` AS `semester1`, `n`.`sectioncode1` AS `sectioncode1`, `n`.`school1` AS `school1`, `n`.`academicyear1` AS `academicyear1`, `n`.`semester2` AS `semester2`, `n`.`sectioncode2` AS `sectioncode2`, `n`.`school2` AS `school2`, `n`.`academicyear2` AS `academicyear2`, `n`.`awardyear` AS `awardyear`, `n`.`component` AS `component`, `n`.`institutioncode` AS `institutioncode`, `n`.`agencytype` AS `agencytype`, `n`.`remarks` AS `remarks`, `n`.`program` AS `program`, `c`.`daterelease` AS `daterelease`, `c`.`coordinator` AS `coordinator` FROM ((`tblstudent` `s` left join `tblnstp` `n` on(`s`.`student_id` = `n`.`student_id`)) left join `tblcertificate` `c` on(`s`.`student_id` = `c`.`student_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tblcertificate`
--
ALTER TABLE `tblcertificate`
  ADD PRIMARY KEY (`certificate_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `tblnstp`
--
ALTER TABLE `tblnstp`
  ADD PRIMARY KEY (`nstp_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `tblstudent`
--
ALTER TABLE `tblstudent`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblcertificate`
--
ALTER TABLE `tblcertificate`
  MODIFY `certificate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblnstp`
--
ALTER TABLE `tblnstp`
  MODIFY `nstp_id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tblstudent`
--
ALTER TABLE `tblstudent`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20232270;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblcertificate`
--
ALTER TABLE `tblcertificate`
  ADD CONSTRAINT `tblcertificate_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `tblstudent` (`student_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tblnstp`
--
ALTER TABLE `tblnstp`
  ADD CONSTRAINT `tblnstp_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `tblstudent` (`student_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
