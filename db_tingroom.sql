-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2017 at 10:37 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tingroom`
--
DROP DATABASE IF EXISTS `db_tingroom`;
CREATE DATABASE IF NOT EXISTS `db_tingroom` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_tingroom`;

-- --------------------------------------------------------

--
-- Table structure for table `tb_booking`
--

DROP TABLE IF EXISTS `tb_booking`;
CREATE TABLE IF NOT EXISTS `tb_booking` (
  `id_booking` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `waktu` date NOT NULL,
  `deskripsi` text,
  `status` int(11) NOT NULL,
  `read` int(11) NOT NULL,
  `time_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_det_booking`
--

DROP TABLE IF EXISTS `tb_det_booking`;
CREATE TABLE IF NOT EXISTS `tb_det_booking` (
  `id_det_booking` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `id_booking` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_gedung`
--

DROP TABLE IF EXISTS `tb_gedung`;
CREATE TABLE IF NOT EXISTS `tb_gedung` (
  `id_gedung` int(11) NOT NULL,
  `nama_gedung` varchar(255) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gedung`
--

INSERT INTO `tb_gedung` (`id_gedung`, `nama_gedung`, `deleted`) VALUES
(1, 'Menara Prima', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal`
--

DROP TABLE IF EXISTS `tb_jadwal`;
CREATE TABLE IF NOT EXISTS `tb_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_ruangan` int(11) NOT NULL,
  `jam_awal` varchar(10) NOT NULL,
  `jam_akhir` varchar(10) NOT NULL,
  `status` int(11) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=253 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id_jadwal`, `id_ruangan`, `jam_awal`, `jam_akhir`, `status`, `deleted`) VALUES
(1, 1, '07:00', '07:30', 0, 0),
(2, 1, '07:30', '08:00', 0, 0),
(3, 1, '08:00', '08:30', 0, 0),
(4, 1, '08:30', '09:00', 0, 0),
(5, 1, '09:00', '09:30', 0, 0),
(6, 1, '09:30', '10:00', 0, 0),
(7, 1, '10:00', '10:30', 0, 0),
(8, 1, '10:30', '11:00', 0, 0),
(9, 1, '11:00', '11:30', 0, 0),
(10, 1, '11:30', '12:00', 0, 0),
(11, 1, '12:00', '12:30', 0, 0),
(12, 1, '12:30', '13:00', 0, 0),
(13, 1, '13:00', '13:30', 0, 0),
(14, 1, '13:30', '14:00', 0, 0),
(15, 1, '14:00', '14:30', 0, 0),
(16, 1, '14:30', '15:00', 0, 0),
(17, 1, '15:00', '15:30', 0, 0),
(18, 1, '15:30', '16:00', 0, 0),
(19, 1, '16:00', '16:30', 0, 0),
(20, 1, '16:30', '17:00', 0, 0),
(21, 1, '17:00', '17:30', 0, 0),
(22, 1, '17:30', '18:00', 0, 0),
(23, 1, '18:00', '18:30', 0, 0),
(24, 1, '18:30', '19:00', 0, 0),
(25, 1, '19:00', '19:30', 0, 0),
(26, 1, '19:30', '20:00', 0, 0),
(27, 1, '20:00', '20:30', 0, 0),
(28, 1, '20:30', '21:00', 0, 0),
(29, 2, '07:00', '07:30', 0, 0),
(30, 2, '07:30', '08:00', 0, 0),
(31, 2, '08:00', '08:30', 0, 0),
(32, 2, '08:30', '09:00', 0, 0),
(33, 2, '09:00', '09:30', 0, 0),
(34, 2, '09:30', '10:00', 0, 0),
(35, 2, '10:00', '10:30', 0, 0),
(36, 2, '10:30', '11:00', 0, 0),
(37, 2, '11:00', '11:30', 0, 0),
(38, 2, '11:30', '12:00', 0, 0),
(39, 2, '12:00', '12:30', 0, 0),
(40, 2, '12:30', '13:00', 0, 0),
(41, 2, '13:00', '13:30', 0, 0),
(42, 2, '13:30', '14:00', 0, 0),
(43, 2, '14:00', '14:30', 0, 0),
(44, 2, '14:30', '15:00', 0, 0),
(45, 2, '15:00', '15:30', 0, 0),
(46, 2, '15:30', '16:00', 0, 0),
(47, 2, '16:00', '16:30', 0, 0),
(48, 2, '16:30', '17:00', 0, 0),
(49, 2, '17:00', '17:30', 0, 0),
(50, 2, '17:30', '18:00', 0, 0),
(51, 2, '18:00', '18:30', 0, 0),
(52, 2, '18:30', '19:00', 0, 0),
(53, 2, '19:00', '19:30', 0, 0),
(54, 2, '19:30', '20:00', 0, 0),
(55, 2, '20:00', '20:30', 0, 0),
(56, 2, '20:30', '21:00', 0, 0),
(57, 3, '07:00', '07:30', 0, 0),
(58, 3, '07:30', '08:00', 0, 0),
(59, 3, '08:00', '08:30', 0, 0),
(60, 3, '08:30', '09:00', 0, 0),
(61, 3, '09:00', '09:30', 0, 0),
(62, 3, '09:30', '10:00', 0, 0),
(63, 3, '10:00', '10:30', 0, 0),
(64, 3, '10:30', '11:00', 0, 0),
(65, 3, '11:00', '11:30', 0, 0),
(66, 3, '11:30', '12:00', 0, 0),
(67, 3, '12:00', '12:30', 0, 0),
(68, 3, '12:30', '13:00', 0, 0),
(69, 3, '13:00', '13:30', 0, 0),
(70, 3, '13:30', '14:00', 0, 0),
(71, 3, '14:00', '14:30', 0, 0),
(72, 3, '14:30', '15:00', 0, 0),
(73, 3, '15:00', '15:30', 0, 0),
(74, 3, '15:30', '16:00', 0, 0),
(75, 3, '16:00', '16:30', 0, 0),
(76, 3, '16:30', '17:00', 0, 0),
(77, 3, '17:00', '17:30', 0, 0),
(78, 3, '17:30', '18:00', 0, 0),
(79, 3, '18:00', '18:30', 0, 0),
(80, 3, '18:30', '19:00', 0, 0),
(81, 3, '19:00', '19:30', 0, 0),
(82, 3, '19:30', '20:00', 0, 0),
(83, 3, '20:00', '20:30', 0, 0),
(84, 3, '20:30', '21:00', 0, 0),
(85, 4, '07:00', '07:30', 0, 0),
(86, 4, '07:30', '08:00', 0, 0),
(87, 4, '08:00', '08:30', 0, 0),
(88, 4, '08:30', '09:00', 0, 0),
(89, 4, '09:00', '09:30', 0, 0),
(90, 4, '09:30', '10:00', 0, 0),
(91, 4, '10:00', '10:30', 0, 0),
(92, 4, '10:30', '11:00', 0, 0),
(93, 4, '11:00', '11:30', 0, 0),
(94, 4, '11:30', '12:00', 0, 0),
(95, 4, '12:00', '12:30', 0, 0),
(96, 4, '12:30', '13:00', 0, 0),
(97, 4, '13:00', '13:30', 0, 0),
(98, 4, '13:30', '14:00', 0, 0),
(99, 4, '14:00', '14:30', 0, 0),
(100, 4, '14:30', '15:00', 0, 0),
(101, 4, '15:00', '15:30', 0, 0),
(102, 4, '15:30', '16:00', 0, 0),
(103, 4, '16:00', '16:30', 0, 0),
(104, 4, '16:30', '17:00', 0, 0),
(105, 4, '17:00', '17:30', 0, 0),
(106, 4, '17:30', '18:00', 0, 0),
(107, 4, '18:00', '18:30', 0, 0),
(108, 4, '18:30', '19:00', 0, 0),
(109, 4, '19:00', '19:30', 0, 0),
(110, 4, '19:30', '20:00', 0, 0),
(111, 4, '20:00', '20:30', 0, 0),
(112, 4, '20:30', '21:00', 0, 0),
(113, 5, '07:00', '07:30', 0, 0),
(114, 5, '07:30', '08:00', 0, 0),
(115, 5, '08:00', '08:30', 0, 0),
(116, 5, '08:30', '09:00', 0, 0),
(117, 5, '09:00', '09:30', 0, 0),
(118, 5, '09:30', '10:00', 0, 0),
(119, 5, '10:00', '10:30', 0, 0),
(120, 5, '10:30', '11:00', 0, 0),
(121, 5, '11:00', '11:30', 0, 0),
(122, 5, '11:30', '12:00', 0, 0),
(123, 5, '12:00', '12:30', 0, 0),
(124, 5, '12:30', '13:00', 0, 0),
(125, 5, '13:00', '13:30', 0, 0),
(126, 5, '13:30', '14:00', 0, 0),
(127, 5, '14:00', '14:30', 0, 0),
(128, 5, '14:30', '15:00', 0, 0),
(129, 5, '15:00', '15:30', 0, 0),
(130, 5, '15:30', '16:00', 0, 0),
(131, 5, '16:00', '16:30', 0, 0),
(132, 5, '16:30', '17:00', 0, 0),
(133, 5, '17:00', '17:30', 0, 0),
(134, 5, '17:30', '18:00', 0, 0),
(135, 5, '18:00', '18:30', 0, 0),
(136, 5, '18:30', '19:00', 0, 0),
(137, 5, '19:00', '19:30', 0, 0),
(138, 5, '19:30', '20:00', 0, 0),
(139, 5, '20:00', '20:30', 0, 0),
(140, 5, '20:30', '21:00', 0, 0),
(141, 6, '07:00', '07:30', 0, 0),
(142, 6, '07:30', '08:00', 0, 0),
(143, 6, '08:00', '08:30', 0, 0),
(144, 6, '08:30', '09:00', 0, 0),
(145, 6, '09:00', '09:30', 0, 0),
(146, 6, '09:30', '10:00', 0, 0),
(147, 6, '10:00', '10:30', 0, 0),
(148, 6, '10:30', '11:00', 0, 0),
(149, 6, '11:00', '11:30', 0, 0),
(150, 6, '11:30', '12:00', 0, 0),
(151, 6, '12:00', '12:30', 0, 0),
(152, 6, '12:30', '13:00', 0, 0),
(153, 6, '13:00', '13:30', 0, 0),
(154, 6, '13:30', '14:00', 0, 0),
(155, 6, '14:00', '14:30', 0, 0),
(156, 6, '14:30', '15:00', 0, 0),
(157, 6, '15:00', '15:30', 0, 0),
(158, 6, '15:30', '16:00', 0, 0),
(159, 6, '16:00', '16:30', 0, 0),
(160, 6, '16:30', '17:00', 0, 0),
(161, 6, '17:00', '17:30', 0, 0),
(162, 6, '17:30', '18:00', 0, 0),
(163, 6, '18:00', '18:30', 0, 0),
(164, 6, '18:30', '19:00', 0, 0),
(165, 6, '19:00', '19:30', 0, 0),
(166, 6, '19:30', '20:00', 0, 0),
(167, 6, '20:00', '20:30', 0, 0),
(168, 6, '20:30', '21:00', 0, 0),
(169, 7, '07:00', '07:30', 0, 0),
(170, 7, '07:30', '08:00', 0, 0),
(171, 7, '08:00', '08:30', 0, 0),
(172, 7, '08:30', '09:00', 0, 0),
(173, 7, '09:00', '09:30', 0, 0),
(174, 7, '09:30', '10:00', 0, 0),
(175, 7, '10:00', '10:30', 0, 0),
(176, 7, '10:30', '11:00', 0, 0),
(177, 7, '11:00', '11:30', 0, 0),
(178, 7, '11:30', '12:00', 0, 0),
(179, 7, '12:00', '12:30', 0, 0),
(180, 7, '12:30', '13:00', 0, 0),
(181, 7, '13:00', '13:30', 0, 0),
(182, 7, '13:30', '14:00', 0, 0),
(183, 7, '14:00', '14:30', 0, 0),
(184, 7, '14:30', '15:00', 0, 0),
(185, 7, '15:00', '15:30', 0, 0),
(186, 7, '15:30', '16:00', 0, 0),
(187, 7, '16:00', '16:30', 0, 0),
(188, 7, '16:30', '17:00', 0, 0),
(189, 7, '17:00', '17:30', 0, 0),
(190, 7, '17:30', '18:00', 0, 0),
(191, 7, '18:00', '18:30', 0, 0),
(192, 7, '18:30', '19:00', 0, 0),
(193, 7, '19:00', '19:30', 0, 0),
(194, 7, '19:30', '20:00', 0, 0),
(195, 7, '20:00', '20:30', 0, 0),
(196, 7, '20:30', '21:00', 0, 0),
(197, 8, '07:00', '07:30', 0, 0),
(198, 8, '07:30', '08:00', 0, 0),
(199, 8, '08:00', '08:30', 0, 0),
(200, 8, '08:30', '09:00', 0, 0),
(201, 8, '09:00', '09:30', 0, 0),
(202, 8, '09:30', '10:00', 0, 0),
(203, 8, '10:00', '10:30', 0, 0),
(204, 8, '10:30', '11:00', 0, 0),
(205, 8, '11:00', '11:30', 0, 0),
(206, 8, '11:30', '12:00', 0, 0),
(207, 8, '12:00', '12:30', 0, 0),
(208, 8, '12:30', '13:00', 0, 0),
(209, 8, '13:00', '13:30', 0, 0),
(210, 8, '13:30', '14:00', 0, 0),
(211, 8, '14:00', '14:30', 0, 0),
(212, 8, '14:30', '15:00', 0, 0),
(213, 8, '15:00', '15:30', 0, 0),
(214, 8, '15:30', '16:00', 0, 0),
(215, 8, '16:00', '16:30', 0, 0),
(216, 8, '16:30', '17:00', 0, 0),
(217, 8, '17:00', '17:30', 0, 0),
(218, 8, '17:30', '18:00', 0, 0),
(219, 8, '18:00', '18:30', 0, 0),
(220, 8, '18:30', '19:00', 0, 0),
(221, 8, '19:00', '19:30', 0, 0),
(222, 8, '19:30', '20:00', 0, 0),
(223, 8, '20:00', '20:30', 0, 0),
(224, 8, '20:30', '21:00', 0, 0),
(225, 9, '07:00', '07:30', 0, 0),
(226, 9, '07:30', '08:00', 0, 0),
(227, 9, '08:00', '08:30', 0, 0),
(228, 9, '08:30', '09:00', 0, 0),
(229, 9, '09:00', '09:30', 0, 0),
(230, 9, '09:30', '10:00', 0, 0),
(231, 9, '10:00', '10:30', 0, 0),
(232, 9, '10:30', '11:00', 0, 0),
(233, 9, '11:00', '11:30', 0, 0),
(234, 9, '11:30', '12:00', 0, 0),
(235, 9, '12:00', '12:30', 0, 0),
(236, 9, '12:30', '13:00', 0, 0),
(237, 9, '13:00', '13:30', 0, 0),
(238, 9, '13:30', '14:00', 0, 0),
(239, 9, '14:00', '14:30', 0, 0),
(240, 9, '14:30', '15:00', 0, 0),
(241, 9, '15:00', '15:30', 0, 0),
(242, 9, '15:30', '16:00', 0, 0),
(243, 9, '16:00', '16:30', 0, 0),
(244, 9, '16:30', '17:00', 0, 0),
(245, 9, '17:00', '17:30', 0, 0),
(246, 9, '17:30', '18:00', 0, 0),
(247, 9, '18:00', '18:30', 0, 0),
(248, 9, '18:30', '19:00', 0, 0),
(249, 9, '19:00', '19:30', 0, 0),
(250, 9, '19:30', '20:00', 0, 0),
(251, 9, '20:00', '20:30', 0, 0),
(252, 9, '20:30', '21:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_lantai`
--

DROP TABLE IF EXISTS `tb_lantai`;
CREATE TABLE IF NOT EXISTS `tb_lantai` (
  `id_lantai` int(11) NOT NULL,
  `nama_lantai` varchar(255) NOT NULL,
  `id_gedung` int(11) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_lantai`
--

INSERT INTO `tb_lantai` (`id_lantai`, `nama_lantai`, `id_gedung`, `deleted`) VALUES
(1, '32', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ruangan`
--

DROP TABLE IF EXISTS `tb_ruangan`;
CREATE TABLE IF NOT EXISTS `tb_ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `nama_ruangan` varchar(255) NOT NULL,
  `id_lantai` int(11) NOT NULL,
  `board` int(11) NOT NULL,
  `proyektor` int(11) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ruangan`
--

INSERT INTO `tb_ruangan` (`id_ruangan`, `nama_ruangan`, `id_lantai`, `board`, `proyektor`, `kapasitas`, `deleted`) VALUES
(1, 'Room A', 1, 1, 0, 4, 0),
(2, 'Room B', 1, 1, 0, 4, 0),
(3, 'Room C', 1, 2, 1, 8, 0),
(4, 'Room D', 1, 2, 1, 12, 0),
(5, 'Room E', 1, 1, 0, 4, 0),
(6, 'Room F', 1, 2, 0, 4, 0),
(7, 'Room G', 1, 3, 0, 4, 0),
(8, 'Room H', 1, 1, 0, 10, 0),
(9, 'Room I', 1, 1, 1, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_unit`
--

DROP TABLE IF EXISTS `tb_unit`;
CREATE TABLE IF NOT EXISTS `tb_unit` (
  `id_unit` int(11) NOT NULL,
  `nama_unit` varchar(255) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_unit`
--

INSERT INTO `tb_unit` (`id_unit`, `nama_unit`, `deleted`) VALUES
(1, 'IT', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE IF NOT EXISTS `tb_user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `id_lantai` int(11) DEFAULT NULL,
  `id_unit` int(11) DEFAULT NULL,
  `level` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `email`, `password`, `nama`, `no_hp`, `id_lantai`, `id_unit`, `level`, `status`, `deleted`) VALUES
(1, 'admin', '$2y$10$/GzucEPIc3fQrEEJK5Lq.uqvSEbzBCWcTy8LK1WGEmGs5x1rR3D5e', 'Admin', NULL, NULL, NULL, 1, 1, 0),
(2, 'sekretaris', '$2y$10$k3Wtl06fhzMaCvF5nERRXOAY5oesfhukQhat14FKJ5f3nOnyQwZzm', 'Sekretaris', '', 1, 1, 2, 1, 0),
(3, 'testuser@test.com', '$2y$10$c4I3Fy4TuG6TT4AoUnV0GORWpSXGkFMhQQsa7vwZeOBrQfmUWuvC2', 'Test-User', '', 1, 1, 3, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_booking`
--
ALTER TABLE `tb_booking`
  ADD PRIMARY KEY (`id_booking`),
  ADD KEY `fk_id_user` (`id_user`);

--
-- Indexes for table `tb_det_booking`
--
ALTER TABLE `tb_det_booking`
  ADD PRIMARY KEY (`id_det_booking`),
  ADD KEY `fk_id_booking` (`id_booking`),
  ADD KEY `fk_id_jadwal` (`id_jadwal`);

--
-- Indexes for table `tb_gedung`
--
ALTER TABLE `tb_gedung`
  ADD PRIMARY KEY (`id_gedung`);

--
-- Indexes for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `fk_id_room` (`id_ruangan`),
  ADD KEY `fk_id_jam` (`jam_awal`);

--
-- Indexes for table `tb_lantai`
--
ALTER TABLE `tb_lantai`
  ADD PRIMARY KEY (`id_lantai`),
  ADD KEY `fk_id_gedung` (`id_gedung`);

--
-- Indexes for table `tb_ruangan`
--
ALTER TABLE `tb_ruangan`
  ADD PRIMARY KEY (`id_ruangan`),
  ADD KEY `fk_id_floor` (`id_lantai`);

--
-- Indexes for table `tb_unit`
--
ALTER TABLE `tb_unit`
  ADD PRIMARY KEY (`id_unit`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_unit` (`id_unit`),
  ADD KEY `id_lantai` (`id_lantai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_booking`
--
ALTER TABLE `tb_booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_det_booking`
--
ALTER TABLE `tb_det_booking`
  MODIFY `id_det_booking` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_gedung`
--
ALTER TABLE `tb_gedung`
  MODIFY `id_gedung` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=253;
--
-- AUTO_INCREMENT for table `tb_lantai`
--
ALTER TABLE `tb_lantai`
  MODIFY `id_lantai` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_ruangan`
--
ALTER TABLE `tb_ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tb_unit`
--
ALTER TABLE `tb_unit`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_booking`
--
ALTER TABLE `tb_booking`
  ADD CONSTRAINT `fk_id_user` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`),
  ADD CONSTRAINT `tb_booking_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);

--
-- Constraints for table `tb_det_booking`
--
ALTER TABLE `tb_det_booking`
  ADD CONSTRAINT `fk_id_booking` FOREIGN KEY (`id_booking`) REFERENCES `tb_booking` (`id_booking`),
  ADD CONSTRAINT `fk_id_jadwal` FOREIGN KEY (`id_jadwal`) REFERENCES `tb_jadwal` (`id_jadwal`);

--
-- Constraints for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD CONSTRAINT `fk_id_room` FOREIGN KEY (`id_ruangan`) REFERENCES `tb_ruangan` (`id_ruangan`);

--
-- Constraints for table `tb_lantai`
--
ALTER TABLE `tb_lantai`
  ADD CONSTRAINT `fk_id_gedung` FOREIGN KEY (`id_gedung`) REFERENCES `tb_gedung` (`id_gedung`);

--
-- Constraints for table `tb_ruangan`
--
ALTER TABLE `tb_ruangan`
  ADD CONSTRAINT `fk_id_floor` FOREIGN KEY (`id_lantai`) REFERENCES `tb_lantai` (`id_lantai`);

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_unit`) REFERENCES `tb_unit` (`id_unit`),
  ADD CONSTRAINT `tb_user_ibfk_2` FOREIGN KEY (`id_lantai`) REFERENCES `tb_lantai` (`id_lantai`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
