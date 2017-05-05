-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2017 at 10:24 AM
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

CREATE TABLE IF NOT EXISTS `tb_booking` (
  `id_booking` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `waktu` date NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` int(11) NOT NULL,
  `time_created` datetime NOT NULL,
  PRIMARY KEY (`id_booking`),
  KEY `fk_id_jadwal` (`id_jadwal`),
  KEY `fk_id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_det_booking`
--

CREATE TABLE IF NOT EXISTS `tb_det_booking` (
  `id_det_booking` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `id_booking` int(11) NOT NULL,
  KEY `fk_id_booking` (`id_booking`),
  KEY `fk_id_jadwal` (`id_jadwal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_gedung`
--

CREATE TABLE IF NOT EXISTS `tb_gedung` (
  `id_gedung` int(11) NOT NULL AUTO_INCREMENT,
  `nama_gedung` varchar(255) NOT NULL,
  `deleted` int(11) NOT NULL,
  PRIMARY KEY (`id_gedung`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

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
(14, '', 0),
(15, '', 0),
(16, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal`
--

CREATE TABLE IF NOT EXISTS `tb_jadwal` (
  `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,
  `id_ruangan` int(11) NOT NULL,
  `jam_awal` varchar(10) NOT NULL,
  `jam_akhir` varchar(10) NOT NULL,
  `status` int(11) NOT NULL,
  `deleted` int(11) NOT NULL,
  PRIMARY KEY (`id_jadwal`),
  KEY `fk_id_room` (`id_ruangan`),
  KEY `fk_id_jam` (`jam_awal`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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

CREATE TABLE IF NOT EXISTS `tb_lantai` (
  `id_lantai` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lantai` varchar(255) NOT NULL,
  `id_gedung` int(11) NOT NULL,
  `deleted` int(11) NOT NULL,
  PRIMARY KEY (`id_lantai`),
  KEY `fk_id_gedung` (`id_gedung`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

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

CREATE TABLE IF NOT EXISTS `tb_ruangan` (
  `id_ruangan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_ruangan` varchar(255) NOT NULL,
  `id_lantai` int(11) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `deleted` int(11) NOT NULL,
  PRIMARY KEY (`id_ruangan`),
  KEY `fk_id_floor` (`id_lantai`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ruangan`
--

INSERT INTO `tb_ruangan` (`id_ruangan`, `nama_ruangan`, `id_lantai`, `keterangan`, `deleted`) VALUES
(1, 'Room ASD', 1, 'Fasilitas  : AC, Proyektor, Kabel LAN, Kabel Roll, Meja 2, Kursi 34', 1),
(2, 'Room XII AB', 7, 'Fasilitas : AC, Kursi, Meja, Proyektor. Luas : 4x6m', 1),
(3, 'Room C', 6, 'Fasilitas : Kursi dan Meja', 1),
(4, 'Room A', 1, 'Fasilitas : AC, Proyektor, Kabel LAN, Kabel Roll, Meja 2, Kursi 3', 0),
(5, 'Room ASD', 7, 'Fasilitas : AC, Kursi, Meja, Proyektor. Luas : 4x6m', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `bahasa` varchar(50) NOT NULL,
  `floor` int(11) DEFAULT NULL,
  `level` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `email`, `password`, `nama`, `no_hp`, `bahasa`, `floor`, `level`, `status`) VALUES
(1, 'admin', 'admintingroom', 'admin', NULL, 'bahasa', NULL, 1, 1),
(2, 'hafiz.rahmadi@gmail.com', 'asdasdasd', 'Moh. Hafiz Rahmadi', '081913596746', 'bahasa', NULL, 2, 1);

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
