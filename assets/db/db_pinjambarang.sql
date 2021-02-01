-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2021 at 02:22 AM
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
(1, '3060324005-', 'spektrum analyzer', 'anritsu ms 2720t', '1536028', 'Baik', 1, '3060324005-.jpg'),
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
(12, 'test', 'coba', '2020-12-29 08:30:00', '2020-12-30 00:00:00', NULL, 'Vicky', NULL, NULL, 0, 1, 'CANCELED', NULL, NULL),
(14, 'test2', 'coba2', '2020-12-29 08:30:00', '2020-12-30 00:00:00', NULL, 'Vicky', NULL, NULL, 0, 2, 'APPROVED', NULL, NULL),
(16, 'judul kegiatan', 'deskripsi', '2021-01-02 08:00:00', '2021-01-03 16:00:00', '2021-01-02 12:55:45', 'Vicky', '2021-01-02 12:55:45', 'Vicky', 0, 1, 'REJECTED', NULL, NULL),
(17, 'test bentrol', 'deskripsi bentrol', '2021-01-04 08:00:00', '2021-01-05 16:00:00', '2021-01-02 16:27:49', 'Vicky', '2021-01-02 16:27:49', 'Vicky', 0, 1, 'CANCELED', NULL, NULL),
(18, 'rapat senin selasa', 'test', '2021-01-04 08:00:00', '2021-01-05 16:00:00', '2021-01-03 09:13:36', 'Admin', '2021-01-03 09:13:36', 'Admin', 0, 2, 'CANCELED', NULL, 1),
(19, 'coba lagi', 'coba', '2021-01-06 08:00:00', '2021-01-06 16:00:00', '2021-01-03 09:15:35', 'Admin', '2021-01-03 09:15:35', 'Admin', 0, 2, 'REJECTED', NULL, 1),
(20, 'tes bulan februari', 'tes aja', '2021-02-01 08:00:00', '2021-02-01 08:00:00', '2021-01-29 19:00:35', 'Admin', '2021-01-29 19:00:35', 'Admin', 0, 1, 'REJECTED', NULL, 1);

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
(2, '321123', 'laptop updated', 'ngehang terus', 'Vicky Vitriandi, S.Komp', '2021-01-03 16:55:07', 2, 'APPROVED', 'Admin', '2021-01-03 12:04:00'),
(4, '1234', 'motor', 'ganti oli', 'Admin', '2021-01-03 18:04:25', 1, 'PENDING', NULL, NULL),
(5, '35345345', 'mobil', 'ganti ban', 'rudi', '2021-01-03 18:16:11', 3, 'PENDING', NULL, NULL),
(6, 'asd', 'asdasd', 'adad', 'Admin', '2021-01-28 06:01:38', 1, 'PENDING', NULL, NULL),
(8, '-', 'AC Split', 'ac kurang dingin', 'ahmad', '2021-01-31 22:07:12', 7, 'PENDING', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `persediaan`
--

CREATE TABLE `persediaan` (
  `id_persediaan` int(11) NOT NULL,
  `id_persediaan_jenis` varchar(45) DEFAULT NULL,
  `nama_persediaan` varchar(45) DEFAULT NULL,
  `jumlah_persediaan` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `creator_id` int(11) DEFAULT NULL,
  `keterangan` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persediaan`
--

INSERT INTO `persediaan` (`id_persediaan`, `id_persediaan_jenis`, `nama_persediaan`, `jumlah_persediaan`, `tanggal`, `created_by`, `created_at`, `creator_id`, `keterangan`) VALUES
(1, '1', 'swalow', 2, '2021-01-02', 'Admin', '2021-01-03 23:38:05', 1, 'hari sabtu'),
(2, '1', 'sinar dunia', 90, '2021-01-10', 'Admin', '2021-01-10 21:10:59', 1, '-'),
(3, '3', 'Buku Tulis', NULL, '2021-01-22', 'Admin', '2021-01-22 10:56:55', 1, '-'),
(4, '4', 'pilot', 20, '2021-01-22', 'Admin', '2021-01-22 13:30:51', 1, '-'),
(5, '4', 'ball liner', 5, '2021-01-22', 'Admin', '2021-01-22 13:32:12', 1, '-'),
(6, '5', 'garuda', 1500, '2021-01-31', 'Admin', '2021-01-31 15:42:56', 1, '-');

-- --------------------------------------------------------

--
-- Table structure for table `persediaan_history`
--

CREATE TABLE `persediaan_history` (
  `id_persediaan_history` int(11) NOT NULL,
  `id_persediaan` int(11) DEFAULT NULL,
  `jenis_transaksi` enum('MASUK','KELUAR') DEFAULT NULL,
  `tgl_pembelian` date DEFAULT NULL,
  `tgl_transaksi` datetime DEFAULT CURRENT_TIMESTAMP,
  `id_user` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persediaan_history`
--

INSERT INTO `persediaan_history` (`id_persediaan_history`, `id_persediaan`, `jenis_transaksi`, `tgl_pembelian`, `tgl_transaksi`, `id_user`, `jumlah`, `keterangan`, `created_by`) VALUES
(3, 3, 'MASUK', '2021-01-22', '2021-01-22 11:40:56', 1, 100, '-', 'Admin'),
(4, 4, 'MASUK', '2021-01-22', '2021-01-22 13:46:18', 1, 10, 'apa saja', 'Admin'),
(5, 4, 'MASUK', '2021-01-22', '2021-01-22 13:50:29', 1, 15, '-', 'Admin'),
(6, 6, 'MASUK', '2021-01-31', '2021-01-31 15:42:56', 1, 1500, '-', 'Admin');

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
(4, 'Pulpen', 'Lusin', ''),
(5, 'STOPMAP', 'pak', 'uk. folio');

-- --------------------------------------------------------

--
-- Table structure for table `persediaan_transaksi`
--

CREATE TABLE `persediaan_transaksi` (
  `id_persediaan_transaksi` int(11) NOT NULL,
  `jenis_transaksi` enum('MASUK','KELUAR') DEFAULT NULL,
  `tgl_transaksi` datetime DEFAULT CURRENT_TIMESTAMP,
  `id_user` int(11) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `status_transaksi` varchar(45) DEFAULT NULL,
  `tgl_approval` datetime DEFAULT NULL,
  `tgl_diterima` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persediaan_transaksi`
--

INSERT INTO `persediaan_transaksi` (`id_persediaan_transaksi`, `jenis_transaksi`, `tgl_transaksi`, `id_user`, `keterangan`, `status_transaksi`, `tgl_approval`, `tgl_diterima`) VALUES
(1, 'KELUAR', '2021-01-20 13:26:03', 1, 'umum dan kepegawaian', 'APPROVED', '2021-01-31 15:12:57', NULL),
(2, 'KELUAR', '2021-01-22 06:17:35', 1, 'keterangan', 'APPROVED', '2021-01-31 15:13:41', NULL),
(3, 'KELUAR', '2021-01-31 21:49:33', 7, 'Seksi Anu', 'PENDING', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `persediaan_transaksi_detail`
--

CREATE TABLE `persediaan_transaksi_detail` (
  `id_persediaan_transaksi_detail` int(11) NOT NULL,
  `id_persediaan_transaksi` int(11) DEFAULT NULL,
  `id_persediaan` int(11) DEFAULT NULL,
  `jumlah_permintaan` int(11) DEFAULT '0',
  `jumlah_disetujui` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persediaan_transaksi_detail`
--

INSERT INTO `persediaan_transaksi_detail` (`id_persediaan_transaksi_detail`, `id_persediaan_transaksi`, `id_persediaan`, `jumlah_permintaan`, `jumlah_disetujui`) VALUES
(3, 1, 1, 2, 3),
(4, 2, 2, 19, 10),
(5, 2, 4, 5, 5),
(6, 2, 5, 2, 5),
(7, 3, 2, 20, 0),
(8, 3, 4, 10, 0);

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
(2, 'ADMINRUANG'),
(3, 'ADMINASET'),
(4, 'ADMINSUPPLY'),
(5, 'USER');

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
(2, 'AULA 2', 'aula 2', 150, 'blablabla'),
(3, 'AULA3', 'nama ruangan aula 3', 200, 'bla bla bla');

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
  `nama` varchar(50) DEFAULT NULL,
  `role` varchar(45) NOT NULL DEFAULT 'PENGGUNA'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `username`, `password`, `nama`, `role`) VALUES
(1, 'admin', 'adminadmin', 'vicky', 'SUPERADMIN'),
(2, 'rommonz', '12345', 'Vicky Vitriandi, S.Komp', 'ADMINRUANG'),
(3, '19850618', 'rudi', 'rudi', 'PENGGUNA'),
(7, 'gie', 'ahmad', 'ahmad', 'USER'),
(8, 'gege', 'gege', 'gege', 'ADMINRUANG');

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
-- Indexes for table `persediaan_history`
--
ALTER TABLE `persediaan_history`
  ADD PRIMARY KEY (`id_persediaan_history`);

--
-- Indexes for table `persediaan_jenis`
--
ALTER TABLE `persediaan_jenis`
  ADD PRIMARY KEY (`id_persediaan_jenis`);

--
-- Indexes for table `persediaan_transaksi`
--
ALTER TABLE `persediaan_transaksi`
  ADD PRIMARY KEY (`id_persediaan_transaksi`);

--
-- Indexes for table `persediaan_transaksi_detail`
--
ALTER TABLE `persediaan_transaksi_detail`
  ADD PRIMARY KEY (`id_persediaan_transaksi_detail`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `pemeliharaan`
--
ALTER TABLE `pemeliharaan`
  MODIFY `id_pemeliharaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `persediaan`
--
ALTER TABLE `persediaan`
  MODIFY `id_persediaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `persediaan_history`
--
ALTER TABLE `persediaan_history`
  MODIFY `id_persediaan_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `persediaan_jenis`
--
ALTER TABLE `persediaan_jenis`
  MODIFY `id_persediaan_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `persediaan_transaksi`
--
ALTER TABLE `persediaan_transaksi`
  MODIFY `id_persediaan_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `persediaan_transaksi_detail`
--
ALTER TABLE `persediaan_transaksi_detail`
  MODIFY `id_persediaan_transaksi_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pinjam_ruangan`
--
ALTER TABLE `pinjam_ruangan`
  MODIFY `id_pinjam_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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
