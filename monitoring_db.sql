-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2022 at 02:39 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monitoring_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `nama_kegiatan`
--

CREATE TABLE `nama_kegiatan` (
  `id_nama` int(11) NOT NULL,
  `id_tim` int(11) NOT NULL,
  `nama_keg` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `id_tim` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `nama_pegawai` int(100) NOT NULL,
  `username` int(50) NOT NULL,
  `password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `role_pegawai`
--

CREATE TABLE `role_pegawai` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role_pegawai`
--

INSERT INTO `role_pegawai` (`id_role`, `nama_role`) VALUES
(1, 'Kepala'),
(2, 'Operator'),
(3, 'Viewer');

-- --------------------------------------------------------

--
-- Table structure for table `satker`
--

CREATE TABLE `satker` (
  `id_satker` int(11) NOT NULL,
  `kode_satker` int(11) NOT NULL,
  `nama_satker` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `satker`
--

INSERT INTO `satker` (`id_satker`, `kode_satker`, `nama_satker`) VALUES
(1, 3601, 'BPS Kabupaten Pandeglang'),
(2, 3602, 'BPS Kabupaten Lebak'),
(3, 3603, 'BPS Kabupaten Tangerang'),
(4, 3604, 'BPS Kabupaten Serang'),
(5, 3671, 'BPS Kota Tangerang'),
(6, 3672, 'BPS Kota Cilegon'),
(7, 3673, 'BPS Kota Serang'),
(8, 3674, 'BPS Kota Tangerang Selatan');

-- --------------------------------------------------------

--
-- Table structure for table `tim`
--

CREATE TABLE `tim` (
  `id_tim` int(11) NOT NULL,
  `kode_tim` varchar(10) NOT NULL,
  `nama_tim` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tim`
--

INSERT INTO `tim` (`id_tim`, `kode_tim`, `nama_tim`) VALUES
(1, '3611', 'Perencanaan'),
(2, '3612', 'SDM'),
(3, '3613', 'Keuangan'),
(4, '3614', 'PBJ'),
(5, '3615', 'Umum'),
(6, '3621', 'Duknaker'),
(7, '3622', 'Kesra'),
(8, '3623', 'Hansos'),
(9, '3631', 'pertanian'),
(10, '3632', 'industri'),
(11, '3633', 'PEK'),
(12, '3641', 'Stat Harga'),
(13, '3642', 'Stat Distribusi '),
(14, '3643', 'Stat KTIP'),
(15, '3651', 'Neraca Produksi'),
(16, '3652', 'Neraca Konsumsi'),
(17, '3653', 'ASLS'),
(18, '3661', 'Tim IPDS #1'),
(19, '3662', 'Tim IPDS #2'),
(20, '3663', 'Tim IPDS #3'),
(21, '3681', 'JF Statistik'),
(22, '3682', 'DTKS'),
(23, '3683', 'Unit Kerja Kepala'),
(24, '3684', 'IPS'),
(25, '3685', 'Satu Data Indonesia'),
(26, '3686', 'Pojok Statistik'),
(27, '3687', 'Desa Cantik'),
(28, '3688', 'Change Champion');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nama_kegiatan`
--
ALTER TABLE `nama_kegiatan`
  ADD PRIMARY KEY (`id_nama`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `satker`
--
ALTER TABLE `satker`
  ADD PRIMARY KEY (`id_satker`);

--
-- Indexes for table `tim`
--
ALTER TABLE `tim`
  ADD PRIMARY KEY (`id_tim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nama_kegiatan`
--
ALTER TABLE `nama_kegiatan`
  MODIFY `id_nama` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `satker`
--
ALTER TABLE `satker`
  MODIFY `id_satker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tim`
--
ALTER TABLE `tim`
  MODIFY `id_tim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
