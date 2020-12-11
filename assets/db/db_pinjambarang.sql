-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2020 at 03:53 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pinjambarang`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `kode_barang` varchar(50) DEFAULT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `no_seri` varchar(50) DEFAULT NULL,
  `kondisi_barang` varchar(50) NOT NULL,
  `id_ruangan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `kode_barang`, `nama_barang`, `merk`, `no_seri`, `kondisi_barang`, `id_ruangan`) VALUES
(1, '3060324005-', 'spektrum analyzer', 'anritsu ms 2720t', '1536028', 'Baik', 1),
(2, '3060324005', 'antena dipole', 'anritsu mp534b', '', 'baik', 1),
(3, 'gps123', 'gps garmin', 'montana 680', '30303010726', 'Baik', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pemeliharaan_asset`
--

CREATE TABLE `pemeliharaan_asset` (
  `id_pemeliharaan_asset` int(11) NOT NULL,
  `nama_barang` varchar(45) DEFAULT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pinjam_ruangan`
--

CREATE TABLE `pinjam_ruangan` (
  `id_pinjam_ruangan` int(11) NOT NULL,
  `id_ruangan` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `lama_pinjam` int(11) NOT NULL,
  `id_peminjam` int(11) DEFAULT NULL,
  `tujuan` text,
  `approval` varchar(45) DEFAULT 'PENDING'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinjam_ruangan`
--

INSERT INTO `pinjam_ruangan` (`id_pinjam_ruangan`, `id_ruangan`, `tgl_pinjam`, `lama_pinjam`, `id_peminjam`, `tujuan`, `approval`) VALUES
(1, 1, '2020-12-07', 1, 2, 'Sosialisasi', 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` int(11) NOT NULL AUTO_INCREMENT,
  `kode_ruangan` varchar(45) DEFAULT NULL,
  `nama_ruangan` varchar(100) DEFAULT NULL,
  `kapasitas` int(11) DEFAULT NULL,
  `keterangan` text,
  PRIMARY KEY (`id_ruangan`),
  UNIQUE KEY `kode_ruangan_UNIQUE` (`kode_ruangan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- --------------------------------------------------------

--
-- Table structure for table `tbl_detailpb`
--

CREATE TABLE `tbl_detailpb` (
  `id_pb` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `unit` int(11) NOT NULL,
  `keterangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_detailpb`
--

INSERT INTO `tbl_detailpb` (`id_pb`, `id_barang`, `unit`, `keterangan`) VALUES
(7, 3, 1, 'bla bla bla');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id` int(10) NOT NULL,
  `username` varchar(8) NOT NULL,
  `password` varchar(10) NOT NULL,
  `nip` varchar(18) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `role` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `username`, `password`, `nip`, `nama`, `role`) VALUES
(1, 'admin', 'admin123', NULL, 'Admin', 0),
(2, 'rudi', 'rudi123', '19888888888888888', 'Rudi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pinjambarang`
--

CREATE TABLE `tbl_pinjambarang` (
  `id_pb` int(11) NOT NULL,
  `no_pb` varchar(50) NOT NULL,
  `no_spt` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `nama1` varchar(30) NOT NULL,
  `nama2` varchar(30) NOT NULL,
  `tujuan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pinjambarang`
--

INSERT INTO `tbl_pinjambarang` (`id_pb`, `no_pb`, `no_spt`, `tanggal`, `nama1`, `nama2`, `tujuan`) VALUES
(7, '1', 'asdasd', '2020-12-21', 'adasd', 'asdads', 'asdasd');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_barang`
--
CREATE TABLE `view_barang` (
);

-- --------------------------------------------------------

--
-- Structure for view `view_barang`
--
DROP TABLE IF EXISTS `view_barang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_barang`  AS  select `a`.`id_pb` AS `id_pb`,`a`.`id_barang` AS `id_barang`,`b`.`kode_barang` AS `kode_barang`,`b`.`nama_barang` AS `nama_barang`,`b`.`merk` AS `merk`,`b`.`no_seri` AS `no_seri`,`b`.`kondisi_barang` AS `kondisi_barang`,`a`.`unit` AS `unit`,`a`.`keterangan` AS `keterangan` from (`tbl_detailpb` `a` join `tb_barang` `b`) where (`a`.`id_barang` = `b`.`id_barang`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `pemeliharaan_asset`
--
ALTER TABLE `pemeliharaan_asset`
  ADD PRIMARY KEY (`id_pemeliharaan_asset`);

--
-- Indexes for table `pinjam_ruangan`
--
ALTER TABLE `pinjam_ruangan`
  ADD PRIMARY KEY (`id_pinjam_ruangan`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `tbl_detailpb`
--
ALTER TABLE `tbl_detailpb`
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `no_pb` (`id_pb`),
  ADD KEY `no_pb_2` (`id_pb`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pinjambarang`
--
ALTER TABLE `tbl_pinjambarang`
  ADD PRIMARY KEY (`id_pb`),
  ADD KEY `no_spt` (`no_spt`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pemeliharaan_asset`
--
ALTER TABLE `pemeliharaan_asset`
  MODIFY `id_pemeliharaan_asset` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pinjam_ruangan`
--
ALTER TABLE `pinjam_ruangan`
  MODIFY `id_pinjam_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_pinjambarang`
--
ALTER TABLE `tbl_pinjambarang`
  MODIFY `id_pb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_detailpb`
--
ALTER TABLE `tbl_detailpb`
  ADD CONSTRAINT `tbl_detailpb_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `tbl_detailpb_ibfk_3` FOREIGN KEY (`id_pb`) REFERENCES `tbl_pinjambarang` (`id_pb`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
