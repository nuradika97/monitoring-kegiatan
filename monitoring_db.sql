-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2022 at 04:05 AM
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
  `nama_pegawai` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(80) NOT NULL,
  `email` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `username`, `password`, `email`) VALUES
(1, 'Ir. Dody Herlando M.Econ.', 'dody', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'dody@bps.go.id'),
(2, 'Ridwan Hidayat S.Si.', 'ridwanh', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'ridwanh@bps.go.id'),
(3, 'Desi Novianti S.ST, MM', 'desi.novianti', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'desi.novianti@bps.go.id'),
(4, 'Faizal Ahkami S.E.', 'ahkami', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'ahkami@bps.go.id'),
(5, 'Triyanto SE', 'triyanto2', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'triyanto2@bps.go.id'),
(6, 'Iman Nugraha S.H, M.H.', 'imann', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'imann@bps.go.id'),
(7, 'Pramita Gayatri S.Psi', 'pramita', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'pramita@bps.go.id'),
(8, 'Baimahdi', 'baimahdi', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'baimahdi@bps.go.id'),
(9, 'Rahma Dian Muliasti A.Md', 'rdmuliasti', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'rdmuliasti@bps.go.id'),
(10, 'Intan Putri Firdaus A.Md', 'intan.pf', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'intan.pf@bps.go.id'),
(11, 'Vicky Fernando A.P.Kb.N.', 'vicky.fernando', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'vicky.fernando@bps.go.id'),
(12, 'Tedi Ruswandi MM', 'tedi', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'tedi@bps.go.id'),
(13, 'Desty Tritanti SE', 'desty.tritanti', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'desty.tritanti@bps.go.id'),
(14, 'Puwiwi S.AP', 'puwiwi', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'puwiwi@bps.go.id'),
(15, 'Gugun Gunarto', 'gugun.gunarto', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'gugun.gunarto@bps.go.id'),
(16, 'Aan Fathurahman', 'aan.fathur', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'aan.fathur@bps.go.id'),
(17, 'Abdullah', 'abdullah2', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'abdullah2@bps.go.id'),
(18, 'Chusni Maria Rosidah S.E', 'cmrosidah', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'cmrosidah@bps.go.id'),
(19, 'Yoga Bayu Adi S.E', 'yogabayu', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'yogabayu@bps.go.id'),
(20, 'Yuliana Mayangsari A.Md,', 'yuliana', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'yuliana@bps.go.id'),
(21, 'Dandi Iswandi S.Si, MM.', 'dandi', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'dandi@bps.go.id'),
(22, 'Wahyu Muhamad Nugraha S.E', 'wmnugraha', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'wmnugraha@bps.go.id'),
(23, 'Ir. Indra Warman', 'warman', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'warman@bps.go.id'),
(24, 'Yulian Sarwo Edi SST, M.Si.', 'yulian.sarwo', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'yulian.sarwo@bps.go.id'),
(25, 'Heri Purnomo SST.,M.Si', 'hpurnomo', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'hpurnomo@bps.go.id'),
(26, 'Pradhita Andiah Permani SST', 'pradhita.andiah', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'pradhita.andiah@bps.go.id'),
(27, 'Hani Febrimuliani SST', 'hani.febrimuliani', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'hani.febrimuliani@bps.go.id'),
(28, 'Urip Puji Raharjo SST, MAP', 'urip_puji', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'urip_puji@bps.go.id'),
(29, 'Khoirul Minan A.Md', 'khoirulminan', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'khoirulminan@bps.go.id'),
(30, 'Nurina Paramitasari SST., SE.,M.Si', 'nurina', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'nurina@bps.go.id'),
(31, 'Sukma Direja SST, M.S.E', 'direja', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'direja@bps.go.id'),
(32, 'Frenky Wachida Rachmawati SST', 'wachida.rachma', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'wachida.rachma@bps.go.id'),
(33, 'Hariyanto SST, M.Si', 'hariyanto', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'hariyanto@bps.go.id'),
(34, 'Noviar S.Si, M.Si', 'noviar', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'noviar@bps.go.id'),
(35, 'Purwanto Badarani SST', 'pbadarani', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'pbadarani@bps.go.id'),
(36, 'Wahyudi SST', 'wahyudim', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'wahyudim@bps.go.id'),
(37, 'Nera Difia SST', 'nera', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'nera@bps.go.id'),
(38, 'Enang Sumarna S.Si', 'enangs', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'enangs@bps.go.id'),
(39, 'Moh. Sis Hidayatullah', 'moh.hidayatullah', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'moh.hidayatullah@bps.go.id'),
(40, 'Mohamad Nordin SE, MAP', 'mnordin', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'mnordin@bps.go.id'),
(41, 'Suwandari SST', 'ndari', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'ndari@bps.go.id'),
(42, 'Bambang Widjonarko SP, M.M.', 'bambangw', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'bambangw@bps.go.id'),
(43, 'Suhandi S.ST, MM', 'suhandi', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'suhandi@bps.go.id'),
(44, 'Viska Ekayani SE', 'viska', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'viska@bps.go.id'),
(45, 'Yuaninda Poersianti A.Md', 'yuaninda', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'yuaninda@bps.go.id'),
(46, 'Deviani Kusumawati SAP', 'deviani', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'deviani@bps.go.id'),
(47, 'Sigit Nugroho S.Si, M.URP', 'sigit_nugh', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'sigit_nugh@bps.go.id'),
(48, 'Ir. Evodia Trionerawati', 'evodia', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'evodia@bps.go.id'),
(49, 'Septiarida Nonalisa SST', 'septiarida.nonalisa', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'septiarida.nonalisa@bps.go.id'),
(50, 'Elizabeth S.ST', 'elizabeth', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'elizabeth@bps.go.id'),
(51, 'Awang Pramila BSM, M.M', 'awang', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'awang@bps.go.id'),
(52, 'Saeful Hidayat S.Si, MSE', 'saefulh', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'saefulh@bps.go.id'),
(53, 'Hendro Prayitno S.Si, MM', 'hendrop', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'hendrop@bps.go.id'),
(54, 'Muhammad Fajar SST, M.Stat', 'mfajar', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'mfajar@bps.go.id'),
(55, 'Teuku Muhammad Madinah S.Si', 'teuku', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'teuku@bps.go.id'),
(56, 'Lucie Suparintina S.Si, M.S.E', 'lucies', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'lucies@bps.go.id'),
(57, 'Khafid Akhiriyanto SST', 'khafid', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'khafid@bps.go.id'),
(58, 'Puji Aditia Sulistiani SST', 'pujiaditia', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'pujiaditia@bps.go.id'),
(59, 'Sa\'diah SST', 'sadiah', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'sadiah@bps.go.id'),
(60, 'Andrean MA.', 'andrean', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'andrean@bps.go.id'),
(61, 'Bisma Ariasena Slamet SE., MAP', 'bisma.as', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'bisma.as@bps.go.id'),
(62, 'A. Jaenus Solihin SE', 'jaenus', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'jaenus@bps.go.id'),
(63, 'Canggih Hostika Fajarwati S.Si', 'canggih', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'canggih@bps.go.id'),
(64, 'Asti Rumiatun S.Si, M.Ec.Dev', 'asti', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'asti@bps.go.id'),
(65, 'Sugara Ady S S.Si', 'soegara', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'soegara@bps.go.id'),
(66, 'Nuradika Pradana Reeza Krisna Utama S.Tr.Stat.', 'nuradika.reeza', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'nuradika.reeza@bps.go.id'),
(67, 'Drs. Agusman Simbolon MAB', 'agusman', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'agusman@bps.go.id'),
(68, 'Nur\'izzah Inayati SST, M.T', 'nuri.izzah', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'nuri.izzah@bps.go.id'),
(69, 'Toga Hamonangan S.Si, M.M', 'toga', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'toga@bps.go.id'),
(70, 'Eben Baenuri S.E.', 'baenuri', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'baenuri@bps.go.id'),
(71, 'Dian Solihah S.Tr.Stat', 'dian.solihah', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'dian.solihah@bps.go.id'),
(72, 'Hilda S.Si.', 'hilda', '$2y$10$fwEObiyjIMHGhbCbaJhSMuA6DYpvgESk2AGoVtrp.RtKkHncpbuoG', 'hilda@bps.go.id');

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

-- --------------------------------------------------------

--
-- Table structure for table `tim_kegiatan`
--

CREATE TABLE `tim_kegiatan` (
  `id_timkeg` int(11) NOT NULL,
  `id_tim` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tim_kegiatan`
--

INSERT INTO `tim_kegiatan` (`id_timkeg`, `id_tim`, `id_pegawai`, `id_role`) VALUES
(1, 1, 3, 2),
(2, 2, 6, 2),
(3, 3, 12, 2),
(4, 4, 21, 2),
(5, 5, 15, 2),
(6, 6, 25, 2),
(7, 7, 31, 2),
(8, 8, 28, 2),
(9, 9, 35, 2),
(10, 10, 38, 2),
(11, 11, 40, 2),
(12, 12, 43, 2),
(13, 13, 48, 2),
(14, 14, 47, 2),
(15, 15, 53, 2),
(16, 16, 57, 2),
(17, 17, 59, 2),
(18, 18, 64, 2),
(19, 19, 63, 2),
(20, 20, 68, 2),
(21, 21, 7, 2),
(22, 22, 24, 2),
(23, 23, 52, 2),
(24, 24, 42, 2),
(25, 25, 69, 2),
(26, 26, 67, 2),
(27, 27, 43, 2),
(28, 28, 34, 2),
(29, 20, 71, 2),
(30, 18, 64, 2);

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
-- Indexes for table `tim`
--
ALTER TABLE `tim`
  ADD PRIMARY KEY (`id_tim`);

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
-- AUTO_INCREMENT for table `nama_kegiatan`
--
ALTER TABLE `nama_kegiatan`
  MODIFY `id_nama` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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

--
-- AUTO_INCREMENT for table `tim_kegiatan`
--
ALTER TABLE `tim_kegiatan`
  MODIFY `id_timkeg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

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
