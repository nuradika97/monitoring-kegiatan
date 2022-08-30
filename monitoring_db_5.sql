-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2022 at 08:43 AM
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
-- Table structure for table `detail_kegiatan`
--

CREATE TABLE `detail_kegiatan` (
  `id_detail_kegiatan` int(11) NOT NULL,
  `detail_kegiatan` varchar(50) NOT NULL DEFAULT '',
  `id_kegiatan` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `created_at` date NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_kegiatan`
--

INSERT INTO `detail_kegiatan` (`id_detail_kegiatan`, `detail_kegiatan`, `id_kegiatan`, `id_satuan`, `tgl_mulai`, `tgl_selesai`, `created_at`, `modified_at`) VALUES
(51, 'test', 44, 1, '2022-08-29', '2022-08-29', '2022-08-28', '2022-08-30 04:07:12'),
(78, 'test4', 44, 2, '2022-08-29', '2022-08-29', '2022-08-29', '2022-08-30 04:07:12'),
(79, 'test3', 44, 2, '2022-08-29', '2022-08-29', '2022-08-29', '2022-08-30 04:07:12'),
(80, 'Percepatan', 44, 2, '2022-08-29', '2022-08-29', '2022-08-29', '2022-08-30 04:07:12');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kegiatan`
--

CREATE TABLE `jenis_kegiatan` (
  `id_jenis_kegiatan` int(11) NOT NULL,
  `nama_jenis_kegiatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_kegiatan`
--

INSERT INTO `jenis_kegiatan` (`id_jenis_kegiatan`, `nama_jenis_kegiatan`) VALUES
(1, 'Survei'),
(2, 'Sensus'),
(3, 'Non Sensus/Survei');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `id_tim` int(11) NOT NULL,
  `nama_kegiatan` varchar(80) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `id_periode` int(11) NOT NULL,
  `id_jenis_kegiatan` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `id_tim`, `nama_kegiatan`, `tgl_mulai`, `tgl_selesai`, `id_periode`, `id_jenis_kegiatan`, `id_satuan`, `created_at`, `modified_at`) VALUES
(44, 2, 'Kegiatan B', '2022-08-11', '2022-08-27', 1, 3, 1, '2022-08-26 12:07:04', '2022-08-26 12:07:04'),
(45, 1, 'Kegiatan C', '2022-08-16', '2022-08-24', 1, 1, 1, '2022-08-28 12:39:07', '2022-08-28 12:39:07'),
(46, 7, 'Sakernas', '2022-08-29', '2022-09-30', 1, 1, 1, '2022-08-29 09:41:29', '2022-08-29 09:41:29');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_alokasi_satker`
--

CREATE TABLE `laporan_alokasi_satker` (
  `id_alokasi_satker` int(11) NOT NULL,
  `id_detail_kegiatan` int(11) NOT NULL,
  `id_satker` int(11) NOT NULL,
  `target` varchar(100) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `laporan_alokasi_satker`
--

INSERT INTO `laporan_alokasi_satker` (`id_alokasi_satker`, `id_detail_kegiatan`, `id_satker`, `target`, `created_at`, `modified_at`) VALUES
(55, 51, 1, '1', '2022-08-30', '2022-08-30 06:40:53'),
(56, 51, 2, '2', '2022-08-30', '2022-08-30 06:40:53'),
(57, 51, 3, '3', '2022-08-30', '2022-08-30 06:40:53'),
(58, 51, 4, '4', '2022-08-30', '2022-08-30 06:40:53'),
(59, 51, 5, '5', '2022-08-30', '2022-08-30 06:40:53'),
(60, 51, 6, '6', '2022-08-30', '2022-08-30 06:40:53'),
(61, 51, 7, '7', '2022-08-30', '2022-08-30 06:40:53'),
(62, 51, 8, '8', '2022-08-30', '2022-08-30 06:40:53'),
(63, 51, 9, '9', '2022-08-30', '2022-08-30 06:40:53');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_kegiatan`
--

CREATE TABLE `laporan_kegiatan` (
  `id_laporan_kegiatan` int(11) NOT NULL,
  `id_detail_kegiatan` int(11) NOT NULL,
  `id_satker` int(11) NOT NULL,
  `tgl_laporan` date NOT NULL,
  `realisasi` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(80) NOT NULL,
  `email` varchar(60) NOT NULL,
  `terakhir_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `username`, `password`, `email`, `terakhir_login`) VALUES
(1, 'Ir. Dody Herlando M.Econ.', 'dody', 'e10adc3949ba59abbe56e057f20f883e', 'dody@bps.go.id', '2022-08-24 03:18:05'),
(2, 'Ridwan Hidayat S.Si.', 'ridwanh', 'e10adc3949ba59abbe56e057f20f883e', 'ridwanh@bps.go.id', '2022-08-20 15:08:07'),
(3, 'Desi Novianti S.ST, MM', 'desi.novianti', 'e10adc3949ba59abbe56e057f20f883e', 'desi.novianti@bps.go.id', '2022-08-20 15:08:07'),
(4, 'Faizal Ahkami S.E.', 'ahkami', 'e10adc3949ba59abbe56e057f20f883e', 'ahkami@bps.go.id', '2022-08-20 15:08:07'),
(5, 'Triyanto SE', 'triyanto2', 'e10adc3949ba59abbe56e057f20f883e', 'triyanto2@bps.go.id', '2022-08-20 15:08:07'),
(6, 'Iman Nugraha S.H, M.H.', 'imann', 'e10adc3949ba59abbe56e057f20f883e', 'imann@bps.go.id', '2022-08-20 15:08:07'),
(7, 'Pramita Gayatri S.Psi', 'pramita', 'e10adc3949ba59abbe56e057f20f883e', 'pramita@bps.go.id', '2022-08-20 15:08:07'),
(8, 'Baimahdi', 'baimahdi', 'e10adc3949ba59abbe56e057f20f883e', 'baimahdi@bps.go.id', '2022-08-20 15:08:07'),
(9, 'Rahma Dian Muliasti A.Md', 'rdmuliasti', 'e10adc3949ba59abbe56e057f20f883e', 'rdmuliasti@bps.go.id', '2022-08-20 15:08:07'),
(10, 'Intan Putri Firdaus A.Md', 'intan.pf', 'e10adc3949ba59abbe56e057f20f883e', 'intan.pf@bps.go.id', '2022-08-20 15:08:07'),
(11, 'Vicky Fernando A.P.Kb.N.', 'vicky.fernando', 'e10adc3949ba59abbe56e057f20f883e', 'vicky.fernando@bps.go.id', '2022-08-20 15:08:07'),
(12, 'Tedi Ruswandi MM', 'tedi', 'e10adc3949ba59abbe56e057f20f883e', 'tedi@bps.go.id', '2022-08-20 15:08:07'),
(13, 'Desty Tritanti SE', 'desty.tritanti', 'e10adc3949ba59abbe56e057f20f883e', 'desty.tritanti@bps.go.id', '2022-08-20 15:08:07'),
(14, 'Puwiwi S.AP', 'puwiwi', 'e10adc3949ba59abbe56e057f20f883e', 'puwiwi@bps.go.id', '2022-08-20 15:08:07'),
(15, 'Gugun Gunarto', 'gugun.gunarto', 'e10adc3949ba59abbe56e057f20f883e', 'gugun.gunarto@bps.go.id', '2022-08-20 15:08:07'),
(16, 'Aan Fathurahman', 'aan.fathur', 'e10adc3949ba59abbe56e057f20f883e', 'aan.fathur@bps.go.id', '2022-08-20 15:08:07'),
(17, 'Abdullah', 'abdullah2', 'e10adc3949ba59abbe56e057f20f883e', 'abdullah2@bps.go.id', '2022-08-20 15:08:07'),
(18, 'Chusni Maria Rosidah S.E', 'cmrosidah', 'e10adc3949ba59abbe56e057f20f883e', 'cmrosidah@bps.go.id', '2022-08-20 15:08:07'),
(19, 'Yoga Bayu Adi S.E', 'yogabayu', 'e10adc3949ba59abbe56e057f20f883e', 'yogabayu@bps.go.id', '2022-08-20 15:08:07'),
(20, 'Yuliana Mayangsari A.Md,', 'yuliana', 'e10adc3949ba59abbe56e057f20f883e', 'yuliana@bps.go.id', '2022-08-20 15:08:07'),
(21, 'Dandi Iswandi S.Si, MM.', 'dandi', 'e10adc3949ba59abbe56e057f20f883e', 'dandi@bps.go.id', '2022-08-20 15:08:07'),
(22, 'Wahyu Muhamad Nugraha S.E', 'wmnugraha', 'e10adc3949ba59abbe56e057f20f883e', 'wmnugraha@bps.go.id', '2022-08-20 15:08:07'),
(23, 'Ir. Indra Warman', 'warman', 'e10adc3949ba59abbe56e057f20f883e', 'warman@bps.go.id', '2022-08-20 15:08:07'),
(24, 'Yulian Sarwo Edi SST, M.Si.', 'yulian.sarwo', 'e10adc3949ba59abbe56e057f20f883e', 'yulian.sarwo@bps.go.id', '2022-08-20 15:08:07'),
(25, 'Heri Purnomo SST.,M.Si', 'hpurnomo', 'e10adc3949ba59abbe56e057f20f883e', 'hpurnomo@bps.go.id', '2022-08-20 15:08:07'),
(26, 'Pradhita Andiah Permani SST', 'pradhita.andiah', 'e10adc3949ba59abbe56e057f20f883e', 'pradhita.andiah@bps.go.id', '2022-08-20 15:08:07'),
(27, 'Hani Febrimuliani SST', 'hani.febrimuliani', 'e10adc3949ba59abbe56e057f20f883e', 'hani.febrimuliani@bps.go.id', '2022-08-20 15:08:07'),
(28, 'Urip Puji Raharjo SST, MAP', 'urip_puji', 'e10adc3949ba59abbe56e057f20f883e', 'urip_puji@bps.go.id', '2022-08-20 15:08:07'),
(29, 'Khoirul Minan A.Md', 'khoirulminan', 'e10adc3949ba59abbe56e057f20f883e', 'khoirulminan@bps.go.id', '2022-08-20 15:08:07'),
(30, 'Nurina Paramitasari SST., SE.,M.Si', 'nurina', 'e10adc3949ba59abbe56e057f20f883e', 'nurina@bps.go.id', '2022-08-20 15:08:07'),
(31, 'Sukma Direja SST, M.S.E', 'direja', 'e10adc3949ba59abbe56e057f20f883e', 'direja@bps.go.id', '2022-08-20 15:08:07'),
(32, 'Frenky Wachida Rachmawati SST', 'wachida.rachma', 'e10adc3949ba59abbe56e057f20f883e', 'wachida.rachma@bps.go.id', '2022-08-20 15:08:07'),
(33, 'Hariyanto SST, M.Si', 'hariyanto', 'e10adc3949ba59abbe56e057f20f883e', 'hariyanto@bps.go.id', '2022-08-20 15:08:07'),
(34, 'Noviar S.Si, M.Si', 'noviar', 'e10adc3949ba59abbe56e057f20f883e', 'noviar@bps.go.id', '2022-08-20 15:08:07'),
(35, 'Purwanto Badarani SST', 'pbadarani', 'e10adc3949ba59abbe56e057f20f883e', 'pbadarani@bps.go.id', '2022-08-20 15:08:07'),
(36, 'Wahyudi SST', 'wahyudim', 'e10adc3949ba59abbe56e057f20f883e', 'wahyudim@bps.go.id', '2022-08-20 15:08:07'),
(37, 'Nera Difia SST', 'nera', 'e10adc3949ba59abbe56e057f20f883e', 'nera@bps.go.id', '2022-08-20 15:08:07'),
(38, 'Enang Sumarna S.Si', 'enangs', 'e10adc3949ba59abbe56e057f20f883e', 'enangs@bps.go.id', '2022-08-20 15:08:07'),
(39, 'Moh. Sis Hidayatullah', 'moh.hidayatullah', 'e10adc3949ba59abbe56e057f20f883e', 'moh.hidayatullah@bps.go.id', '2022-08-20 15:08:07'),
(40, 'Mohamad Nordin SE, MAP', 'mnordin', 'e10adc3949ba59abbe56e057f20f883e', 'mnordin@bps.go.id', '2022-08-20 15:08:07'),
(41, 'Suwandari SST', 'ndari', 'e10adc3949ba59abbe56e057f20f883e', 'ndari@bps.go.id', '2022-08-20 15:08:07'),
(42, 'Bambang Widjonarko SP, M.M.', 'bambangw', 'e10adc3949ba59abbe56e057f20f883e', 'bambangw@bps.go.id', '2022-08-20 15:08:07'),
(43, 'Suhandi S.ST, MM', 'suhandi', 'e10adc3949ba59abbe56e057f20f883e', 'suhandi@bps.go.id', '2022-08-20 15:08:07'),
(44, 'Viska Ekayani SE', 'viska', 'e10adc3949ba59abbe56e057f20f883e', 'viska@bps.go.id', '2022-08-20 15:08:07'),
(45, 'Yuaninda Poersianti A.Md', 'yuaninda', 'e10adc3949ba59abbe56e057f20f883e', 'yuaninda@bps.go.id', '2022-08-20 15:08:07'),
(46, 'Deviani Kusumawati SAP', 'deviani', 'e10adc3949ba59abbe56e057f20f883e', 'deviani@bps.go.id', '2022-08-20 15:08:07'),
(47, 'Sigit Nugroho S.Si, M.URP', 'sigit_nugh', 'e10adc3949ba59abbe56e057f20f883e', 'sigit_nugh@bps.go.id', '2022-08-20 15:08:07'),
(48, 'Ir. Evodia Trionerawati', 'evodia', 'e10adc3949ba59abbe56e057f20f883e', 'evodia@bps.go.id', '2022-08-20 15:08:07'),
(49, 'Septiarida Nonalisa SST', 'septiarida.nonalisa', 'e10adc3949ba59abbe56e057f20f883e', 'septiarida.nonalisa@bps.go.id', '2022-08-20 15:08:07'),
(50, 'Elizabeth S.ST', 'elizabeth', 'e10adc3949ba59abbe56e057f20f883e', 'elizabeth@bps.go.id', '2022-08-20 15:08:07'),
(51, 'Awang Pramila BSM, M.M', 'awang', 'e10adc3949ba59abbe56e057f20f883e', 'awang@bps.go.id', '2022-08-20 15:08:07'),
(52, 'Saeful Hidayat S.Si, MSE', 'saefulh', 'e10adc3949ba59abbe56e057f20f883e', 'saefulh@bps.go.id', '2022-08-20 15:08:07'),
(53, 'Hendro Prayitno S.Si, MM', 'hendrop', 'e10adc3949ba59abbe56e057f20f883e', 'hendrop@bps.go.id', '2022-08-20 15:08:07'),
(54, 'Muhammad Fajar SST, M.Stat', 'mfajar', 'e10adc3949ba59abbe56e057f20f883e', 'mfajar@bps.go.id', '2022-08-20 15:08:07'),
(55, 'Teuku Muhammad Madinah S.Si', 'teuku', 'e10adc3949ba59abbe56e057f20f883e', 'teuku@bps.go.id', '2022-08-20 15:08:07'),
(56, 'Lucie Suparintina S.Si, M.S.E', 'lucies', 'e10adc3949ba59abbe56e057f20f883e', 'lucies@bps.go.id', '2022-08-20 15:08:07'),
(57, 'Khafid Akhiriyanto SST', 'khafid', 'e10adc3949ba59abbe56e057f20f883e', 'khafid@bps.go.id', '2022-08-20 15:08:07'),
(58, 'Puji Aditia Sulistiani SST', 'pujiaditia', 'e10adc3949ba59abbe56e057f20f883e', 'pujiaditia@bps.go.id', '2022-08-20 15:08:07'),
(59, 'Sa\'diah SST', 'sadiah', 'e10adc3949ba59abbe56e057f20f883e', 'sadiah@bps.go.id', '2022-08-20 15:08:07'),
(60, 'Andrean MA.', 'andrean', 'e10adc3949ba59abbe56e057f20f883e', 'andrean@bps.go.id', '2022-08-20 15:08:07'),
(61, 'Bisma Ariasena Slamet SE., MAP', 'bisma.as', 'e10adc3949ba59abbe56e057f20f883e', 'bisma.as@bps.go.id', '2022-08-29 02:24:03'),
(62, 'A. Jaenus Solihin SE', 'jaenus', 'e10adc3949ba59abbe56e057f20f883e', 'jaenus@bps.go.id', '2022-08-20 15:08:07'),
(63, 'Canggih Hostika Fajarwati S.Si', 'canggih', 'e10adc3949ba59abbe56e057f20f883e', 'canggih@bps.go.id', '2022-08-20 15:08:07'),
(64, 'Asti Rumiatun S.Si, M.Ec.Dev', 'asti', 'e10adc3949ba59abbe56e057f20f883e', 'asti@bps.go.id', '2022-08-20 15:08:07'),
(65, 'Sugara Ady S S.Si', 'soegara', 'e10adc3949ba59abbe56e057f20f883e', 'soegara@bps.go.id', '2022-08-20 15:08:07'),
(66, 'Nuradika Pradana Reeza Krisna Utama S.Tr.Stat.', 'nuradika.reeza', 'e10adc3949ba59abbe56e057f20f883e', 'nuradika.reeza@bps.go.id', '2022-08-30 02:49:46'),
(67, 'Drs. Agusman Simbolon MAB', 'agusman', 'e10adc3949ba59abbe56e057f20f883e', 'agusman@bps.go.id', '2022-08-20 15:08:07'),
(68, 'Nur\'izzah Inayati SST, M.T', 'nuri.izzah', 'e10adc3949ba59abbe56e057f20f883e', 'nuri.izzah@bps.go.id', '2022-08-20 15:08:07'),
(69, 'Toga Hamonangan S.Si, M.M', 'toga', 'e10adc3949ba59abbe56e057f20f883e', 'toga@bps.go.id', '2022-08-20 15:08:07'),
(70, 'Eben Baenuri S.E.', 'baenuri', 'e10adc3949ba59abbe56e057f20f883e', 'baenuri@bps.go.id', '2022-08-20 15:08:07'),
(71, 'Dian Solihah S.Tr.Stat', 'dian.solihah', 'e10adc3949ba59abbe56e057f20f883e', 'dian.solihah@bps.go.id', '2022-08-20 15:08:07'),
(72, 'Hilda S.Si.', 'hilda', 'e10adc3949ba59abbe56e057f20f883e', 'hilda@bps.go.id', '2022-08-20 15:08:07');

-- --------------------------------------------------------

--
-- Table structure for table `periode`
--

CREATE TABLE `periode` (
  `id_periode` int(11) NOT NULL,
  `nama_periode` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `periode`
--

INSERT INTO `periode` (`id_periode`, `nama_periode`) VALUES
(1, 'Bulanan'),
(2, 'Triwulanan'),
(3, 'Subround'),
(4, 'Semesteran'),
(5, 'Tahunan');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `nama_role`) VALUES
(1, 'Admin'),
(2, 'Operator'),
(3, 'Kepala'),
(4, 'Viewer');

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
(8, 3674, 'BPS Kota Tangerang Selatan'),
(9, 3600, 'BPS Provinsi Banten');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(11) NOT NULL,
  `nama_satuan` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `nama_satuan`) VALUES
(1, 'Dokumen'),
(2, 'Laporan'),
(3, 'Database'),
(4, 'Responden'),
(5, 'Publikasi');

-- --------------------------------------------------------

--
-- Table structure for table `tim`
--

CREATE TABLE `tim` (
  `id_tim` int(11) NOT NULL,
  `ketua_tim` int(11) NOT NULL COMMENT 'ketua_tim',
  `kode_tim` varchar(10) NOT NULL,
  `nama_tim` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tim`
--

INSERT INTO `tim` (`id_tim`, `ketua_tim`, `kode_tim`, `nama_tim`) VALUES
(1, 3, '3611', 'Perencanaan'),
(2, 6, '3612', 'SDM'),
(3, 12, '3613', 'Keuangan'),
(4, 21, '3614', 'PBJ'),
(5, 15, '3615', 'Umum'),
(6, 25, '3621', 'Duknaker'),
(7, 31, '3622', 'Kesra'),
(8, 28, '3623', 'Hansos'),
(9, 35, '3631', 'pertanian'),
(10, 38, '3632', 'industri'),
(11, 40, '3633', 'PEK'),
(12, 47, '3641', 'Stat Harga'),
(13, 43, '3642', 'Stat Distribusi '),
(14, 48, '3643', 'Stat KTIP'),
(15, 57, '3651', 'Neraca Produksi'),
(16, 53, '3652', 'Neraca Konsumsi'),
(17, 1, '3653', 'ASLS'),
(18, 60, '3661', 'Tim Pengolahan Long Form SP2020'),
(19, 60, '3662', 'Tim IPDS #2'),
(20, 60, '3663', 'Tim IPDS #3'),
(21, 52, '3681', 'JF Statistik'),
(22, 1, '3682', 'DTKS'),
(23, 1, '3683', 'Unit Kerja Kepala'),
(24, 52, '3684', 'IPS'),
(25, 69, '3685', 'Satu Data Indonesia'),
(26, 67, '3686', 'Pojok Statistik'),
(27, 43, '3687', 'Desa Cantik'),
(28, 51, '3688', 'Change Champion');

-- --------------------------------------------------------

--
-- Table structure for table `tim_kegiatan`
--

CREATE TABLE `tim_kegiatan` (
  `id_timkeg` int(11) NOT NULL,
  `id_tim` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `terakhir_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tim_kegiatan`
--

INSERT INTO `tim_kegiatan` (`id_timkeg`, `id_tim`, `id_pegawai`, `id_role`, `terakhir_login`) VALUES
(3, 3, 12, 2, '2022-08-21 14:49:30'),
(5, 5, 15, 2, '2022-08-21 14:49:30'),
(6, 6, 25, 2, '2022-08-21 14:49:30'),
(7, 7, 31, 2, '2022-08-21 14:49:30'),
(8, 8, 28, 2, '2022-08-21 14:49:30'),
(9, 9, 35, 2, '2022-08-21 14:49:30'),
(10, 10, 38, 2, '2022-08-21 14:49:30'),
(11, 11, 40, 2, '2022-08-21 14:49:30'),
(12, 12, 43, 2, '2022-08-21 14:49:30'),
(13, 13, 48, 2, '2022-08-21 14:49:30'),
(14, 14, 47, 2, '2022-08-21 14:49:30'),
(15, 15, 53, 2, '2022-08-21 14:49:30'),
(16, 16, 57, 2, '2022-08-21 14:49:30'),
(17, 17, 59, 2, '2022-08-21 14:49:30'),
(18, 18, 64, 2, '2022-08-21 14:49:30'),
(19, 19, 63, 2, '2022-08-21 14:49:30'),
(20, 20, 68, 2, '2022-08-21 14:49:30'),
(21, 21, 7, 2, '2022-08-21 14:49:30'),
(22, 22, 24, 2, '2022-08-21 14:49:30'),
(23, 23, 52, 2, '2022-08-21 14:49:30'),
(24, 24, 42, 2, '2022-08-21 14:49:30'),
(25, 25, 69, 2, '2022-08-21 14:49:30'),
(26, 26, 67, 2, '2022-08-21 14:49:30'),
(27, 27, 43, 2, '2022-08-21 14:49:30'),
(28, 28, 34, 2, '2022-08-21 14:49:30'),
(29, 20, 71, 2, '2022-08-21 14:49:30'),
(30, 18, 64, 2, '2022-08-21 14:49:30'),
(37, 4, 21, 2, '2022-08-23 13:24:02'),
(38, 1, 3, 2, '2022-08-22 16:17:21'),
(48, 2, 6, 2, '2022-08-23 13:21:11'),
(51, 18, 61, 2, '2022-08-25 11:44:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_kegiatan`
--
ALTER TABLE `detail_kegiatan`
  ADD PRIMARY KEY (`id_detail_kegiatan`),
  ADD KEY `FK_detail_kegiatan_kegiatan` (`id_kegiatan`),
  ADD KEY `FK_detail_kegiatan_satuan` (`id_satuan`);

--
-- Indexes for table `jenis_kegiatan`
--
ALTER TABLE `jenis_kegiatan`
  ADD PRIMARY KEY (`id_jenis_kegiatan`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `id_tim` (`id_tim`),
  ADD KEY `id_periode` (`id_periode`),
  ADD KEY `id_jenis_kegiatan` (`id_jenis_kegiatan`),
  ADD KEY `id_satuan` (`id_satuan`);

--
-- Indexes for table `laporan_alokasi_satker`
--
ALTER TABLE `laporan_alokasi_satker`
  ADD PRIMARY KEY (`id_alokasi_satker`) USING BTREE,
  ADD KEY `kegitan_satker_fk_2` (`id_satker`),
  ADD KEY `id_tim` (`id_detail_kegiatan`) USING BTREE;

--
-- Indexes for table `laporan_kegiatan`
--
ALTER TABLE `laporan_kegiatan`
  ADD PRIMARY KEY (`id_laporan_kegiatan`),
  ADD KEY `FK_lkdk` (`id_detail_kegiatan`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id_periode`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `satker`
--
ALTER TABLE `satker`
  ADD PRIMARY KEY (`id_satker`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `tim`
--
ALTER TABLE `tim`
  ADD PRIMARY KEY (`id_tim`),
  ADD KEY `ketua_tim` (`ketua_tim`);

--
-- Indexes for table `tim_kegiatan`
--
ALTER TABLE `tim_kegiatan`
  ADD PRIMARY KEY (`id_timkeg`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `id_tim` (`id_tim`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_kegiatan`
--
ALTER TABLE `detail_kegiatan`
  MODIFY `id_detail_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `jenis_kegiatan`
--
ALTER TABLE `jenis_kegiatan`
  MODIFY `id_jenis_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `laporan_alokasi_satker`
--
ALTER TABLE `laporan_alokasi_satker`
  MODIFY `id_alokasi_satker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `laporan_kegiatan`
--
ALTER TABLE `laporan_kegiatan`
  MODIFY `id_laporan_kegiatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `id_periode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `satker`
--
ALTER TABLE `satker`
  MODIFY `id_satker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tim`
--
ALTER TABLE `tim`
  MODIFY `id_tim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tim_kegiatan`
--
ALTER TABLE `tim_kegiatan`
  MODIFY `id_timkeg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_kegiatan`
--
ALTER TABLE `detail_kegiatan`
  ADD CONSTRAINT `FK_detail_kegiatan_kegiatan` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_detail_kegiatan_satuan` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id_satuan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `kegiatan_ibfk_1` FOREIGN KEY (`id_tim`) REFERENCES `tim` (`id_tim`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kegiatan_ibfk_2` FOREIGN KEY (`id_periode`) REFERENCES `periode` (`id_periode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kegiatan_ibfk_3` FOREIGN KEY (`id_jenis_kegiatan`) REFERENCES `jenis_kegiatan` (`id_jenis_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kegiatan_ibfk_4` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id_satuan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `laporan_alokasi_satker`
--
ALTER TABLE `laporan_alokasi_satker`
  ADD CONSTRAINT `FK_kegiatan_satker_detail_kegiatan` FOREIGN KEY (`id_detail_kegiatan`) REFERENCES `detail_kegiatan` (`id_detail_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kegitan_satker_fk_2` FOREIGN KEY (`id_satker`) REFERENCES `satker` (`id_satker`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `laporan_kegiatan`
--
ALTER TABLE `laporan_kegiatan`
  ADD CONSTRAINT `FK_lkdk` FOREIGN KEY (`id_detail_kegiatan`) REFERENCES `detail_kegiatan` (`id_detail_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tim`
--
ALTER TABLE `tim`
  ADD CONSTRAINT `FK_tim_pegawai` FOREIGN KEY (`ketua_tim`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tim_kegiatan`
--
ALTER TABLE `tim_kegiatan`
  ADD CONSTRAINT `tim_kegiatan_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tim_kegiatan_ibfk_2` FOREIGN KEY (`id_tim`) REFERENCES `tim` (`id_tim`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tim_kegiatan_ibfk_3` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
