-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2017 at 08:45 PM
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
DROP DATABASE `db_tingroom`;

-- --------------------------------------------------------

--
-- Table structure for table `tb_booking`
--

CREATE TABLE IF NOT EXISTS `tb_booking` (
  `id_booking` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `waktu` date NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` int(11) NOT NULL,
  `time_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_det_booking`
--

CREATE TABLE IF NOT EXISTS `tb_det_booking` (
  `id_det_booking` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `id_booking` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_gedung`
--

CREATE TABLE IF NOT EXISTS `tb_gedung` (
  `id_gedung` int(11) NOT NULL,
  `nama_gedung` varchar(255) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gedung`
--

INSERT INTO `tb_gedung` (`id_gedung`, `nama_gedung`, `deleted`) VALUES
(1, 'gedung sate', 0),
(2, 'Gedung Karesidenan', 0),
(3, 'gedung-gedungan', 1),
(4, 'old trafford', 0),
(5, 'bernabeu', 0),
(6, 'bukit cemara tujuh', 1),
(7, 'samantha krida', 0),
(8, 'hmm', 1),
(9, 'Dome UMM', 0),
(10, 'asdjhasj d', 1),
(11, 'sky eye', 1),
(12, 'sky eyes', 1),
(13, 'Lalalangsat Tower', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal`
--

CREATE TABLE IF NOT EXISTS `tb_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_room` int(11) NOT NULL,
  `id_jam` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_jam`
--

CREATE TABLE IF NOT EXISTS `tb_jam` (
  `id_jam` int(11) NOT NULL,
  `jam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_lantai`
--

CREATE TABLE IF NOT EXISTS `tb_lantai` (
  `id_lantai` int(11) NOT NULL,
  `nama_lantai` varchar(255) NOT NULL,
  `id_gedung` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_ruang`
--

CREATE TABLE IF NOT EXISTS `tb_ruang` (
  `id_ruang` int(11) NOT NULL,
  `nama_ruang` varchar(255) NOT NULL,
  `id_lantai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `bahasa` varchar(50) NOT NULL,
  `floor` int(11) DEFAULT NULL,
  `level` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `email`, `password`, `nama`, `no_hp`, `bahasa`, `floor`, `level`, `status`) VALUES
(1, 'admin', 'admintingroom', 'admin', NULL, 'bahasa', NULL, 1, 1),
(2, 'hafiz.rahmadi@gmail.com', 'asdasdasd', 'Moh. Hafiz Rahmadi', '081913596746', 'bahasa', NULL, 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_booking`
--
ALTER TABLE `tb_booking`
  ADD PRIMARY KEY (`id_booking`),
  ADD KEY `fk_id_jadwal` (`id_jadwal`),
  ADD KEY `fk_id_user` (`id_user`);

--
-- Indexes for table `tb_det_booking`
--
ALTER TABLE `tb_det_booking`
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
  ADD KEY `fk_id_room` (`id_room`),
  ADD KEY `fk_id_jam` (`id_jam`);

--
-- Indexes for table `tb_jam`
--
ALTER TABLE `tb_jam`
  ADD PRIMARY KEY (`id_jam`);

--
-- Indexes for table `tb_lantai`
--
ALTER TABLE `tb_lantai`
  ADD PRIMARY KEY (`id_lantai`),
  ADD KEY `fk_id_gedung` (`id_gedung`);

--
-- Indexes for table `tb_ruang`
--
ALTER TABLE `tb_ruang`
  ADD PRIMARY KEY (`id_ruang`),
  ADD KEY `fk_id_floor` (`id_lantai`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_booking`
--
ALTER TABLE `tb_booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_gedung`
--
ALTER TABLE `tb_gedung`
  MODIFY `id_gedung` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_jam`
--
ALTER TABLE `tb_jam`
  MODIFY `id_jam` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_lantai`
--
ALTER TABLE `tb_lantai`
  MODIFY `id_lantai` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_ruang`
--
ALTER TABLE `tb_ruang`
  MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_booking`
--
ALTER TABLE `tb_booking`
  ADD CONSTRAINT `fk_id_user` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);

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
  ADD CONSTRAINT `fk_id_jam` FOREIGN KEY (`id_jam`) REFERENCES `tb_jam` (`id_jam`),
  ADD CONSTRAINT `fk_id_room` FOREIGN KEY (`id_room`) REFERENCES `tb_ruang` (`id_ruang`);

--
-- Constraints for table `tb_lantai`
--
ALTER TABLE `tb_lantai`
  ADD CONSTRAINT `fk_id_gedung` FOREIGN KEY (`id_gedung`) REFERENCES `tb_gedung` (`id_gedung`);

--
-- Constraints for table `tb_ruang`
--
ALTER TABLE `tb_ruang`
  ADD CONSTRAINT `fk_id_floor` FOREIGN KEY (`id_lantai`) REFERENCES `tb_lantai` (`id_lantai`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
