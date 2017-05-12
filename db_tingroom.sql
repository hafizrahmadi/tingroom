-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2017 at 11:12 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

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
CREATE DATABASE IF NOT EXISTS `db_tingroom` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_tingroom`;

-- --------------------------------------------------------

--
-- Table structure for table `tb_booking`
--

DROP TABLE IF EXISTS `tb_booking`;
CREATE TABLE `tb_booking` (
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

DROP TABLE IF EXISTS `tb_det_booking`;
CREATE TABLE `tb_det_booking` (
  `id_det_booking` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `id_booking` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_gedung`
--

DROP TABLE IF EXISTS `tb_gedung`;
CREATE TABLE `tb_gedung` (
  `id_gedung` int(11) NOT NULL,
  `nama_gedung` varchar(255) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(13, 'Lalalangsat Tower', 1),
(14, '', 1),
(15, '', 1),
(16, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal`
--

DROP TABLE IF EXISTS `tb_jadwal`;
CREATE TABLE `tb_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_ruangan` int(11) NOT NULL,
  `jam_awal` varchar(10) NOT NULL,
  `jam_akhir` varchar(10) NOT NULL,
  `status` int(11) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id_jadwal`, `id_ruangan`, `jam_awal`, `jam_akhir`, `status`, `deleted`) VALUES
(1, 4, '08:00', '08:30', 0, 0),
(2, 5, '10:00', '10:30', 0, 1),
(3, 4, '08:30', '09:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_lantai`
--

DROP TABLE IF EXISTS `tb_lantai`;
CREATE TABLE `tb_lantai` (
  `id_lantai` int(11) NOT NULL,
  `nama_lantai` varchar(255) NOT NULL,
  `id_gedung` int(11) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_lantai`
--

INSERT INTO `tb_lantai` (`id_lantai`, `nama_lantai`, `id_gedung`, `deleted`) VALUES
(1, '10', 1, 0),
(2, '5', 2, 1),
(6, '3', 4, 0),
(7, '12', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ruangan`
--

DROP TABLE IF EXISTS `tb_ruangan`;
CREATE TABLE `tb_ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `nama_ruangan` varchar(255) NOT NULL,
  `id_lantai` int(11) NOT NULL,
  `board` int(11) NOT NULL,
  `proyektor` int(11) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ruangan`
--

INSERT INTO `tb_ruangan` (`id_ruangan`, `nama_ruangan`, `id_lantai`, `board`, `proyektor`, `kapasitas`, `deleted`) VALUES
(1, 'Room ASD', 1, 0, 0, 0, 1),
(2, 'Room XII AB', 7, 0, 0, 0, 1),
(3, 'Room C', 6, 0, 0, 0, 1),
(4, 'Room A', 1, 0, 0, 0, 0),
(5, 'Room ASD', 7, 0, 0, 0, 0),
(6, 'Ruang Rindu', 1, 2, 1, 10, 0),
(7, 'Ruang Hati yang terdalam', 1, 3, 1, 6, 0),
(8, 'Ruang Hampa', 1, 1, 3, 13, 0),
(9, 'Ruang Hompimpa', 1, 1, 3, 15, 0),
(10, 'Ruang Rektor', 1, 1, 2, 8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_unit`
--

DROP TABLE IF EXISTS `tb_unit`;
CREATE TABLE `tb_unit` (
  `id_unit` int(11) NOT NULL,
  `nama_unit` varchar(255) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_unit`
--

INSERT INTO `tb_unit` (`id_unit`, `nama_unit`, `deleted`) VALUES
(1, 'Marketing', 0),
(2, 'Retard', 1),
(3, 'IT', 0),
(4, 'HRD', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `id_lantai` int(11) DEFAULT NULL,
  `id_unit` int(11) DEFAULT NULL,
  `level` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `email`, `password`, `nama`, `no_hp`, `id_lantai`, `id_unit`, `level`, `status`) VALUES
(1, 'admin', '$2y$10$C.wMwSG2iu9dRdL9MAILiuOlhQ0yRPl0xaTDy5X8mw7hnS0m1GvxC', 'admin', NULL, NULL, NULL, 1, 1),
(2, 'hafiz.rahmadi@gmail.com', '$2y$10$lAliR428t1bCfy24x/nvxeki6fdewu1yRQ9nizN3AkKlFhYik4AAC', 'Moh. Hafiz Rahmadi', '081913596746', NULL, NULL, 3, 1),
(3, 'sekretaris', '$2y$10$2.ZeIP2bwJMQnqlO9Z7kme0937vPzNgYRkWs.T84R2E6WGxPK2Wwa', 'Sekretaris', NULL, NULL, NULL, 2, 1);

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
-- AUTO_INCREMENT for table `tb_gedung`
--
ALTER TABLE `tb_gedung`
  MODIFY `id_gedung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_lantai`
--
ALTER TABLE `tb_lantai`
  MODIFY `id_lantai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_ruangan`
--
ALTER TABLE `tb_ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tb_unit`
--
ALTER TABLE `tb_unit`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
