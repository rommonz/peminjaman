-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2021 at 05:42 PM
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
  `id_ruangan` int(11) NOT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `kode_barang`, `nama_barang`, `merk`, `no_seri`, `kondisi_barang`, `id_ruangan`, `foto`) VALUES
(1, '3060324005-', 'spektrum analyzer', 'anritsu ms 2720t', '1536028', 'Baik', 1, NULL),
(2, '3060324005', 'antena dipole', 'anritsu mp534b', '', 'baik', 1, NULL),
(3, 'gps123', 'gps garmin', 'montana 680', '30303010726', 'Baik', 2, NULL),
(6, 'coba update', 'coba update', 'merk coba update', 'seri coba update', 'Baik', 5, 'adasd.jpg'),
(7, 'baranga', 'KURSI', 'merks', '12345', 'Baik', 1, 'baranga.png'),
(8, 'barangnya22', 'Meja', 'merk', '1234', 'Baik', 1, 'barangnya22.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `id` int(11) NOT NULL,
  `title` varchar(126) DEFAULT NULL,
  `description` text,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `create_by` varchar(45) DEFAULT NULL,
  `modified_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(45) DEFAULT NULL,
  `allday` tinyint(1) DEFAULT '0',
  `id_ruangan` int(11) DEFAULT NULL,
  `approval` varchar(45) DEFAULT 'PENDING',
  `approved_by` varchar(45) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`id`, `title`, `description`, `start_date`, `end_date`, `create_at`, `create_by`, `modified_at`, `modified_by`, `allday`, `id_ruangan`, `approval`, `approved_by`, `creator_id`) VALUES
(12, 'test', 'coba', '2020-12-29 08:30:00', '2020-12-30 00:00:00', NULL, 'Vicky', NULL, NULL, 0, 1, 'APPROVED', NULL, NULL),
(14, 'test2', 'coba2', '2020-12-29 08:30:00', '2020-12-30 00:00:00', NULL, 'Vicky', NULL, NULL, 0, 2, 'APPROVED', NULL, NULL),
(16, 'judul kegiatan', 'deskripsi', '2021-01-02 08:00:00', '2021-01-03 16:00:00', '2021-01-02 12:55:45', 'Vicky', '2021-01-02 12:55:45', 'Vicky', 0, 1, 'REJECTED', NULL, NULL),
(17, 'test bentrol', 'deskripsi bentrol', '2021-01-04 08:00:00', '2021-01-05 16:00:00', '2021-01-02 16:27:49', 'Vicky', '2021-01-02 16:27:49', 'Vicky', 0, 1, 'PENDING', NULL, NULL),
(18, 'rapat senin selasa', 'test', '2021-01-04 08:00:00', '2021-01-05 16:00:00', '2021-01-03 09:13:36', 'Admin', '2021-01-03 09:13:36', 'Admin', 0, 2, 'APPROVED', NULL, 1),
(19, 'coba lagi', 'coba', '2021-01-06 08:00:00', '2021-01-06 16:00:00', '2021-01-03 09:15:35', 'Admin', '2021-01-03 09:15:35', 'Admin', 0, 2, 'REJECTED', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pemeliharaan`
--

CREATE TABLE `pemeliharaan` (
  `id_pemeliharaan` int(11) NOT NULL,
  `kode_barang` varchar(45) DEFAULT NULL,
  `nama_barang` varchar(45) DEFAULT NULL,
  `keterangan` text,
  `created_by` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `creator_id` int(11) DEFAULT NULL,
  `approval` enum('PENDING','APPROVED','REJECTED') DEFAULT 'PENDING',
  `modified_by` varchar(45) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemeliharaan`
--

INSERT INTO `pemeliharaan` (`id_pemeliharaan`, `kode_barang`, `nama_barang`, `keterangan`, `created_by`, `created_at`, `creator_id`, `approval`, `modified_by`, `modified_at`) VALUES
(2, '321123', 'laptop updated', 'ngehang terus', 'Vicky Vitriandi, S.Komp', '2021-01-03 16:55:07', 2, 'PENDING', 'Admin', '2021-01-03 12:04:00'),
(4, '1234', 'motor', 'ganti oli', 'Admin', '2021-01-03 18:04:25', 1, 'PENDING', NULL, NULL),
(5, '35345345', 'mobil', 'ganti ban', 'rudi', '2021-01-03 18:16:11', 3, 'PENDING', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `persediaan`
--

CREATE TABLE `persediaan` (
  `id_persediaan` int(11) NOT NULL,
  `id_persediaan_jenis` varchar(45) DEFAULT NULL,
  `nama_persediaan` varchar(45) DEFAULT NULL,
  `jumlah_masuk` int(11) DEFAULT NULL,
  `jumlah_keluar` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `creator_id` int(11) DEFAULT NULL,
  `keterangan` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persediaan`
--

INSERT INTO `persediaan` (`id_persediaan`, `id_persediaan_jenis`, `nama_persediaan`, `jumlah_masuk`, `jumlah_keluar`, `tanggal`, `created_by`, `created_at`, `creator_id`, `keterangan`) VALUES
(1, '1', 'swalow', 5, NULL, '2021-01-02', 'Admin', '2021-01-03 23:38:05', 1, 'hari sabtu');

-- --------------------------------------------------------

--
-- Table structure for table `persediaan_jenis`
--

CREATE TABLE `persediaan_jenis` (
  `id_persediaan_jenis` int(11) NOT NULL,
  `jenis_persediaan` varchar(45) DEFAULT NULL,
  `satuan` varchar(45) DEFAULT NULL,
  `keterangan` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persediaan_jenis`
--

INSERT INTO `persediaan_jenis` (`id_persediaan_jenis`, `jenis_persediaan`, `satuan`, `keterangan`) VALUES
(1, 'Kertas A4', 'rim', 'Ukuran 80gr'),
(2, 'Kertas F4', 'rim', NULL),
(3, 'Buku', 'pak', 'Ukuran A5'),
(4, 'Pulpen', 'Lusin', '');

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
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `role_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `role_name`) VALUES
(1, 'SUPERADMIN'),
(2, 'ADMIN'),
(3, 'PENGGUNA');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `kode_ruangan` varchar(45) DEFAULT NULL,
  `nama_ruangan` varchar(100) DEFAULT NULL,
  `kapasitas` int(11) DEFAULT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `kode_ruangan`, `nama_ruangan`, `kapasitas`, `keterangan`) VALUES
(1, 'AULA1', 'Aula Dinas kesehatan lantai 1', 49, 'ini keterangan'),
(2, 'AULA 2', 'aula 2', 150, 'blablabla');

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
  `role` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `username`, `password`, `nip`, `nama`, `role`) VALUES
(1, 'admin', 'admin123', NULL, 'Admin', 1),
(2, 'rommonz', '12345', '19888888888888888', 'Vicky Vitriandi, S.Komp', 3),
(3, '19850618', 'rudi', NULL, 'rudi', 3);

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
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemeliharaan`
--
ALTER TABLE `pemeliharaan`
  ADD PRIMARY KEY (`id_pemeliharaan`);

--
-- Indexes for table `persediaan`
--
ALTER TABLE `persediaan`
  ADD PRIMARY KEY (`id_persediaan`);

--
-- Indexes for table `persediaan_jenis`
--
ALTER TABLE `persediaan_jenis`
  ADD PRIMARY KEY (`id_persediaan_jenis`);

--
-- Indexes for table `pinjam_ruangan`
--
ALTER TABLE `pinjam_ruangan`
  ADD PRIMARY KEY (`id_pinjam_ruangan`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`),
  ADD UNIQUE KEY `kode_ruangan_UNIQUE` (`kode_ruangan`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

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
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `pemeliharaan`
--
ALTER TABLE `pemeliharaan`
  MODIFY `id_pemeliharaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `persediaan`
--
ALTER TABLE `persediaan`
  MODIFY `id_persediaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `persediaan_jenis`
--
ALTER TABLE `persediaan_jenis`
  MODIFY `id_persediaan_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pinjam_ruangan`
--
ALTER TABLE `pinjam_ruangan`
  MODIFY `id_pinjam_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
