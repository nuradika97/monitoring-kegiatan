-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.17-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for monitoring_db
CREATE DATABASE IF NOT EXISTS `monitoring_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `monitoring_db`;

-- Dumping structure for table monitoring_db.jenis_kegiatan
CREATE TABLE IF NOT EXISTS `jenis_kegiatan` (
  `id_jenis_kegiatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jenis_kegiatan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_jenis_kegiatan`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table monitoring_db.jenis_kegiatan: ~3 rows (approximately)
/*!40000 ALTER TABLE `jenis_kegiatan` DISABLE KEYS */;
INSERT INTO `jenis_kegiatan` (`id_jenis_kegiatan`, `nama_jenis_kegiatan`) VALUES
	(1, 'Survei'),
	(2, 'Sensus'),
	(3, 'Non Sensus/Survei');
/*!40000 ALTER TABLE `jenis_kegiatan` ENABLE KEYS */;

-- Dumping structure for table monitoring_db.kegiatan
CREATE TABLE IF NOT EXISTS `kegiatan` (
  `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT,
  `id_tim` int(11) NOT NULL,
  `nama_kegiatan` varchar(80) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `id_periode` int(11) NOT NULL,
  `id_jenis_kegiatan` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_kegiatan`),
  KEY `id_tim` (`id_tim`),
  KEY `id_periode` (`id_periode`),
  KEY `id_jenis_kegiatan` (`id_jenis_kegiatan`),
  KEY `id_satuan` (`id_satuan`),
  CONSTRAINT `kegiatan_ibfk_1` FOREIGN KEY (`id_tim`) REFERENCES `tim` (`id_tim`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `kegiatan_ibfk_2` FOREIGN KEY (`id_periode`) REFERENCES `periode` (`id_periode`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `kegiatan_ibfk_3` FOREIGN KEY (`id_jenis_kegiatan`) REFERENCES `jenis_kegiatan` (`id_jenis_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `kegiatan_ibfk_4` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id_satuan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table monitoring_db.kegiatan: ~0 rows (approximately)
/*!40000 ALTER TABLE `kegiatan` DISABLE KEYS */;
/*!40000 ALTER TABLE `kegiatan` ENABLE KEYS */;

-- Dumping structure for table monitoring_db.kegiatan_satker
CREATE TABLE IF NOT EXISTS `kegiatan_satker` (
  `id_kegiatan_satker` int(11) NOT NULL AUTO_INCREMENT,
  `id_kegiatan` int(11) NOT NULL,
  `id_satker` int(11) NOT NULL,
  `target` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_kegiatan_satker`) USING BTREE,
  KEY `id_tim` (`id_kegiatan`) USING BTREE,
  KEY `kegitan_satker_fk_2` (`id_satker`),
  CONSTRAINT `kegiatan_satker_fk_1` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `kegitan_satker_fk_2` FOREIGN KEY (`id_satker`) REFERENCES `satker` (`id_satker`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table monitoring_db.kegiatan_satker: ~0 rows (approximately)
/*!40000 ALTER TABLE `kegiatan_satker` DISABLE KEYS */;
/*!40000 ALTER TABLE `kegiatan_satker` ENABLE KEYS */;

-- Dumping structure for table monitoring_db.laporan_kegiatan
CREATE TABLE IF NOT EXISTS `laporan_kegiatan` (
  `id_laporan_kegiatan` int(11) NOT NULL AUTO_INCREMENT,
  `id_kegiatan` int(11) NOT NULL,
  `tgl_laporan` date NOT NULL,
  `realisasi` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_laporan_kegiatan`),
  KEY `id_kegiatan` (`id_kegiatan`),
  CONSTRAINT `laporan_kegiatan_ibfk_1` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table monitoring_db.laporan_kegiatan: ~0 rows (approximately)
/*!40000 ALTER TABLE `laporan_kegiatan` DISABLE KEYS */;
/*!40000 ALTER TABLE `laporan_kegiatan` ENABLE KEYS */;

-- Dumping structure for table monitoring_db.pegawai
CREATE TABLE IF NOT EXISTS `pegawai` (
  `id_pegawai` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pegawai` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(80) NOT NULL,
  `email` varchar(60) NOT NULL,
  `terakhir_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_pegawai`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table monitoring_db.pegawai: ~72 rows (approximately)
/*!40000 ALTER TABLE `pegawai` DISABLE KEYS */;
INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `username`, `password`, `email`, `terakhir_login`) VALUES
	(1, 'Ir. Dody Herlando M.Econ.', 'dody', 'e10adc3949ba59abbe56e057f20f883e', 'dody@bps.go.id', '2022-08-24 10:18:05'),
	(2, 'Ridwan Hidayat S.Si.', 'ridwanh', 'e10adc3949ba59abbe56e057f20f883e', 'ridwanh@bps.go.id', '2022-08-20 22:08:07'),
	(3, 'Desi Novianti S.ST, MM', 'desi.novianti', 'e10adc3949ba59abbe56e057f20f883e', 'desi.novianti@bps.go.id', '2022-08-20 22:08:07'),
	(4, 'Faizal Ahkami S.E.', 'ahkami', 'e10adc3949ba59abbe56e057f20f883e', 'ahkami@bps.go.id', '2022-08-20 22:08:07'),
	(5, 'Triyanto SE', 'triyanto2', 'e10adc3949ba59abbe56e057f20f883e', 'triyanto2@bps.go.id', '2022-08-20 22:08:07'),
	(6, 'Iman Nugraha S.H, M.H.', 'imann', 'e10adc3949ba59abbe56e057f20f883e', 'imann@bps.go.id', '2022-08-20 22:08:07'),
	(7, 'Pramita Gayatri S.Psi', 'pramita', 'e10adc3949ba59abbe56e057f20f883e', 'pramita@bps.go.id', '2022-08-20 22:08:07'),
	(8, 'Baimahdi', 'baimahdi', 'e10adc3949ba59abbe56e057f20f883e', 'baimahdi@bps.go.id', '2022-08-20 22:08:07'),
	(9, 'Rahma Dian Muliasti A.Md', 'rdmuliasti', 'e10adc3949ba59abbe56e057f20f883e', 'rdmuliasti@bps.go.id', '2022-08-20 22:08:07'),
	(10, 'Intan Putri Firdaus A.Md', 'intan.pf', 'e10adc3949ba59abbe56e057f20f883e', 'intan.pf@bps.go.id', '2022-08-20 22:08:07'),
	(11, 'Vicky Fernando A.P.Kb.N.', 'vicky.fernando', 'e10adc3949ba59abbe56e057f20f883e', 'vicky.fernando@bps.go.id', '2022-08-20 22:08:07'),
	(12, 'Tedi Ruswandi MM', 'tedi', 'e10adc3949ba59abbe56e057f20f883e', 'tedi@bps.go.id', '2022-08-20 22:08:07'),
	(13, 'Desty Tritanti SE', 'desty.tritanti', 'e10adc3949ba59abbe56e057f20f883e', 'desty.tritanti@bps.go.id', '2022-08-20 22:08:07'),
	(14, 'Puwiwi S.AP', 'puwiwi', 'e10adc3949ba59abbe56e057f20f883e', 'puwiwi@bps.go.id', '2022-08-20 22:08:07'),
	(15, 'Gugun Gunarto', 'gugun.gunarto', 'e10adc3949ba59abbe56e057f20f883e', 'gugun.gunarto@bps.go.id', '2022-08-20 22:08:07'),
	(16, 'Aan Fathurahman', 'aan.fathur', 'e10adc3949ba59abbe56e057f20f883e', 'aan.fathur@bps.go.id', '2022-08-20 22:08:07'),
	(17, 'Abdullah', 'abdullah2', 'e10adc3949ba59abbe56e057f20f883e', 'abdullah2@bps.go.id', '2022-08-20 22:08:07'),
	(18, 'Chusni Maria Rosidah S.E', 'cmrosidah', 'e10adc3949ba59abbe56e057f20f883e', 'cmrosidah@bps.go.id', '2022-08-20 22:08:07'),
	(19, 'Yoga Bayu Adi S.E', 'yogabayu', 'e10adc3949ba59abbe56e057f20f883e', 'yogabayu@bps.go.id', '2022-08-20 22:08:07'),
	(20, 'Yuliana Mayangsari A.Md,', 'yuliana', 'e10adc3949ba59abbe56e057f20f883e', 'yuliana@bps.go.id', '2022-08-20 22:08:07'),
	(21, 'Dandi Iswandi S.Si, MM.', 'dandi', 'e10adc3949ba59abbe56e057f20f883e', 'dandi@bps.go.id', '2022-08-20 22:08:07'),
	(22, 'Wahyu Muhamad Nugraha S.E', 'wmnugraha', 'e10adc3949ba59abbe56e057f20f883e', 'wmnugraha@bps.go.id', '2022-08-20 22:08:07'),
	(23, 'Ir. Indra Warman', 'warman', 'e10adc3949ba59abbe56e057f20f883e', 'warman@bps.go.id', '2022-08-20 22:08:07'),
	(24, 'Yulian Sarwo Edi SST, M.Si.', 'yulian.sarwo', 'e10adc3949ba59abbe56e057f20f883e', 'yulian.sarwo@bps.go.id', '2022-08-20 22:08:07'),
	(25, 'Heri Purnomo SST.,M.Si', 'hpurnomo', 'e10adc3949ba59abbe56e057f20f883e', 'hpurnomo@bps.go.id', '2022-08-20 22:08:07'),
	(26, 'Pradhita Andiah Permani SST', 'pradhita.andiah', 'e10adc3949ba59abbe56e057f20f883e', 'pradhita.andiah@bps.go.id', '2022-08-20 22:08:07'),
	(27, 'Hani Febrimuliani SST', 'hani.febrimuliani', 'e10adc3949ba59abbe56e057f20f883e', 'hani.febrimuliani@bps.go.id', '2022-08-20 22:08:07'),
	(28, 'Urip Puji Raharjo SST, MAP', 'urip_puji', 'e10adc3949ba59abbe56e057f20f883e', 'urip_puji@bps.go.id', '2022-08-20 22:08:07'),
	(29, 'Khoirul Minan A.Md', 'khoirulminan', 'e10adc3949ba59abbe56e057f20f883e', 'khoirulminan@bps.go.id', '2022-08-20 22:08:07'),
	(30, 'Nurina Paramitasari SST., SE.,M.Si', 'nurina', 'e10adc3949ba59abbe56e057f20f883e', 'nurina@bps.go.id', '2022-08-20 22:08:07'),
	(31, 'Sukma Direja SST, M.S.E', 'direja', 'e10adc3949ba59abbe56e057f20f883e', 'direja@bps.go.id', '2022-08-20 22:08:07'),
	(32, 'Frenky Wachida Rachmawati SST', 'wachida.rachma', 'e10adc3949ba59abbe56e057f20f883e', 'wachida.rachma@bps.go.id', '2022-08-20 22:08:07'),
	(33, 'Hariyanto SST, M.Si', 'hariyanto', 'e10adc3949ba59abbe56e057f20f883e', 'hariyanto@bps.go.id', '2022-08-20 22:08:07'),
	(34, 'Noviar S.Si, M.Si', 'noviar', 'e10adc3949ba59abbe56e057f20f883e', 'noviar@bps.go.id', '2022-08-20 22:08:07'),
	(35, 'Purwanto Badarani SST', 'pbadarani', 'e10adc3949ba59abbe56e057f20f883e', 'pbadarani@bps.go.id', '2022-08-20 22:08:07'),
	(36, 'Wahyudi SST', 'wahyudim', 'e10adc3949ba59abbe56e057f20f883e', 'wahyudim@bps.go.id', '2022-08-20 22:08:07'),
	(37, 'Nera Difia SST', 'nera', 'e10adc3949ba59abbe56e057f20f883e', 'nera@bps.go.id', '2022-08-20 22:08:07'),
	(38, 'Enang Sumarna S.Si', 'enangs', 'e10adc3949ba59abbe56e057f20f883e', 'enangs@bps.go.id', '2022-08-20 22:08:07'),
	(39, 'Moh. Sis Hidayatullah', 'moh.hidayatullah', 'e10adc3949ba59abbe56e057f20f883e', 'moh.hidayatullah@bps.go.id', '2022-08-20 22:08:07'),
	(40, 'Mohamad Nordin SE, MAP', 'mnordin', 'e10adc3949ba59abbe56e057f20f883e', 'mnordin@bps.go.id', '2022-08-20 22:08:07'),
	(41, 'Suwandari SST', 'ndari', 'e10adc3949ba59abbe56e057f20f883e', 'ndari@bps.go.id', '2022-08-20 22:08:07'),
	(42, 'Bambang Widjonarko SP, M.M.', 'bambangw', 'e10adc3949ba59abbe56e057f20f883e', 'bambangw@bps.go.id', '2022-08-20 22:08:07'),
	(43, 'Suhandi S.ST, MM', 'suhandi', 'e10adc3949ba59abbe56e057f20f883e', 'suhandi@bps.go.id', '2022-08-20 22:08:07'),
	(44, 'Viska Ekayani SE', 'viska', 'e10adc3949ba59abbe56e057f20f883e', 'viska@bps.go.id', '2022-08-20 22:08:07'),
	(45, 'Yuaninda Poersianti A.Md', 'yuaninda', 'e10adc3949ba59abbe56e057f20f883e', 'yuaninda@bps.go.id', '2022-08-20 22:08:07'),
	(46, 'Deviani Kusumawati SAP', 'deviani', 'e10adc3949ba59abbe56e057f20f883e', 'deviani@bps.go.id', '2022-08-20 22:08:07'),
	(47, 'Sigit Nugroho S.Si, M.URP', 'sigit_nugh', 'e10adc3949ba59abbe56e057f20f883e', 'sigit_nugh@bps.go.id', '2022-08-20 22:08:07'),
	(48, 'Ir. Evodia Trionerawati', 'evodia', 'e10adc3949ba59abbe56e057f20f883e', 'evodia@bps.go.id', '2022-08-20 22:08:07'),
	(49, 'Septiarida Nonalisa SST', 'septiarida.nonalisa', 'e10adc3949ba59abbe56e057f20f883e', 'septiarida.nonalisa@bps.go.id', '2022-08-20 22:08:07'),
	(50, 'Elizabeth S.ST', 'elizabeth', 'e10adc3949ba59abbe56e057f20f883e', 'elizabeth@bps.go.id', '2022-08-20 22:08:07'),
	(51, 'Awang Pramila BSM, M.M', 'awang', 'e10adc3949ba59abbe56e057f20f883e', 'awang@bps.go.id', '2022-08-20 22:08:07'),
	(52, 'Saeful Hidayat S.Si, MSE', 'saefulh', 'e10adc3949ba59abbe56e057f20f883e', 'saefulh@bps.go.id', '2022-08-20 22:08:07'),
	(53, 'Hendro Prayitno S.Si, MM', 'hendrop', 'e10adc3949ba59abbe56e057f20f883e', 'hendrop@bps.go.id', '2022-08-20 22:08:07'),
	(54, 'Muhammad Fajar SST, M.Stat', 'mfajar', 'e10adc3949ba59abbe56e057f20f883e', 'mfajar@bps.go.id', '2022-08-20 22:08:07'),
	(55, 'Teuku Muhammad Madinah S.Si', 'teuku', 'e10adc3949ba59abbe56e057f20f883e', 'teuku@bps.go.id', '2022-08-20 22:08:07'),
	(56, 'Lucie Suparintina S.Si, M.S.E', 'lucies', 'e10adc3949ba59abbe56e057f20f883e', 'lucies@bps.go.id', '2022-08-20 22:08:07'),
	(57, 'Khafid Akhiriyanto SST', 'khafid', 'e10adc3949ba59abbe56e057f20f883e', 'khafid@bps.go.id', '2022-08-20 22:08:07'),
	(58, 'Puji Aditia Sulistiani SST', 'pujiaditia', 'e10adc3949ba59abbe56e057f20f883e', 'pujiaditia@bps.go.id', '2022-08-20 22:08:07'),
	(59, 'Sa\'diah SST', 'sadiah', 'e10adc3949ba59abbe56e057f20f883e', 'sadiah@bps.go.id', '2022-08-20 22:08:07'),
	(60, 'Andrean MA.', 'andrean', 'e10adc3949ba59abbe56e057f20f883e', 'andrean@bps.go.id', '2022-08-20 22:08:07'),
	(61, 'Bisma Ariasena Slamet SE., MAP', 'bisma.as', 'e10adc3949ba59abbe56e057f20f883e', 'bisma.as@bps.go.id', '2022-08-24 09:42:17'),
	(62, 'A. Jaenus Solihin SE', 'jaenus', 'e10adc3949ba59abbe56e057f20f883e', 'jaenus@bps.go.id', '2022-08-20 22:08:07'),
	(63, 'Canggih Hostika Fajarwati S.Si', 'canggih', 'e10adc3949ba59abbe56e057f20f883e', 'canggih@bps.go.id', '2022-08-20 22:08:07'),
	(64, 'Asti Rumiatun S.Si, M.Ec.Dev', 'asti', 'e10adc3949ba59abbe56e057f20f883e', 'asti@bps.go.id', '2022-08-20 22:08:07'),
	(65, 'Sugara Ady S S.Si', 'soegara', 'e10adc3949ba59abbe56e057f20f883e', 'soegara@bps.go.id', '2022-08-20 22:08:07'),
	(66, 'Nuradika Pradana Reeza Krisna Utama S.Tr.Stat.', 'nuradika.reeza', 'e10adc3949ba59abbe56e057f20f883e', 'nuradika.reeza@bps.go.id', '2022-08-20 22:08:07'),
	(67, 'Drs. Agusman Simbolon MAB', 'agusman', 'e10adc3949ba59abbe56e057f20f883e', 'agusman@bps.go.id', '2022-08-20 22:08:07'),
	(68, 'Nur\'izzah Inayati SST, M.T', 'nuri.izzah', 'e10adc3949ba59abbe56e057f20f883e', 'nuri.izzah@bps.go.id', '2022-08-20 22:08:07'),
	(69, 'Toga Hamonangan S.Si, M.M', 'toga', 'e10adc3949ba59abbe56e057f20f883e', 'toga@bps.go.id', '2022-08-20 22:08:07'),
	(70, 'Eben Baenuri S.E.', 'baenuri', 'e10adc3949ba59abbe56e057f20f883e', 'baenuri@bps.go.id', '2022-08-20 22:08:07'),
	(71, 'Dian Solihah S.Tr.Stat', 'dian.solihah', 'e10adc3949ba59abbe56e057f20f883e', 'dian.solihah@bps.go.id', '2022-08-20 22:08:07'),
	(72, 'Hilda S.Si.', 'hilda', 'e10adc3949ba59abbe56e057f20f883e', 'hilda@bps.go.id', '2022-08-20 22:08:07');
/*!40000 ALTER TABLE `pegawai` ENABLE KEYS */;

-- Dumping structure for table monitoring_db.periode
CREATE TABLE IF NOT EXISTS `periode` (
  `id_periode` int(11) NOT NULL AUTO_INCREMENT,
  `nama_periode` varchar(60) NOT NULL,
  PRIMARY KEY (`id_periode`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table monitoring_db.periode: ~5 rows (approximately)
/*!40000 ALTER TABLE `periode` DISABLE KEYS */;
INSERT INTO `periode` (`id_periode`, `nama_periode`) VALUES
	(1, 'Bulanan'),
	(2, 'Triwulanan'),
	(3, 'Subround'),
	(4, 'Semesteran'),
	(5, 'Tahunan');
/*!40000 ALTER TABLE `periode` ENABLE KEYS */;

-- Dumping structure for table monitoring_db.role
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `nama_role` varchar(50) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table monitoring_db.role: ~4 rows (approximately)
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` (`id_role`, `nama_role`) VALUES
	(1, 'Admin'),
	(2, 'Operator'),
	(3, 'Kepala'),
	(4, 'Viewer');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;

-- Dumping structure for table monitoring_db.satker
CREATE TABLE IF NOT EXISTS `satker` (
  `id_satker` int(11) NOT NULL AUTO_INCREMENT,
  `kode_satker` int(11) NOT NULL,
  `nama_satker` varchar(50) NOT NULL,
  PRIMARY KEY (`id_satker`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table monitoring_db.satker: ~9 rows (approximately)
/*!40000 ALTER TABLE `satker` DISABLE KEYS */;
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
/*!40000 ALTER TABLE `satker` ENABLE KEYS */;

-- Dumping structure for table monitoring_db.satuan
CREATE TABLE IF NOT EXISTS `satuan` (
  `id_satuan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_satuan` varchar(60) NOT NULL,
  PRIMARY KEY (`id_satuan`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table monitoring_db.satuan: ~5 rows (approximately)
/*!40000 ALTER TABLE `satuan` DISABLE KEYS */;
INSERT INTO `satuan` (`id_satuan`, `nama_satuan`) VALUES
	(1, 'dokumen'),
	(2, 'laporan'),
	(3, 'database'),
	(4, 'responden'),
	(5, 'publikasi');
/*!40000 ALTER TABLE `satuan` ENABLE KEYS */;

-- Dumping structure for table monitoring_db.tim
CREATE TABLE IF NOT EXISTS `tim` (
  `id_tim` int(11) NOT NULL AUTO_INCREMENT,
  `kode_tim` varchar(10) NOT NULL,
  `nama_tim` varchar(60) NOT NULL,
  PRIMARY KEY (`id_tim`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table monitoring_db.tim: ~28 rows (approximately)
/*!40000 ALTER TABLE `tim` DISABLE KEYS */;
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
/*!40000 ALTER TABLE `tim` ENABLE KEYS */;

-- Dumping structure for table monitoring_db.tim_kegiatan
CREATE TABLE IF NOT EXISTS `tim_kegiatan` (
  `id_timkeg` int(11) NOT NULL AUTO_INCREMENT,
  `id_tim` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `terakhir_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_timkeg`),
  KEY `id_role` (`id_role`),
  KEY `id_tim` (`id_tim`),
  KEY `id_pegawai` (`id_pegawai`),
  CONSTRAINT `tim_kegiatan_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tim_kegiatan_ibfk_2` FOREIGN KEY (`id_tim`) REFERENCES `tim` (`id_tim`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tim_kegiatan_ibfk_3` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table monitoring_db.tim_kegiatan: ~30 rows (approximately)
/*!40000 ALTER TABLE `tim_kegiatan` DISABLE KEYS */;
INSERT INTO `tim_kegiatan` (`id_timkeg`, `id_tim`, `id_pegawai`, `id_role`, `terakhir_login`) VALUES
	(3, 3, 12, 2, '2022-08-21 21:49:30'),
	(5, 5, 15, 2, '2022-08-21 21:49:30'),
	(6, 6, 25, 2, '2022-08-21 21:49:30'),
	(7, 7, 31, 2, '2022-08-21 21:49:30'),
	(8, 8, 28, 2, '2022-08-21 21:49:30'),
	(9, 9, 35, 2, '2022-08-21 21:49:30'),
	(10, 10, 38, 2, '2022-08-21 21:49:30'),
	(11, 11, 40, 2, '2022-08-21 21:49:30'),
	(12, 12, 43, 2, '2022-08-21 21:49:30'),
	(13, 13, 48, 2, '2022-08-21 21:49:30'),
	(14, 14, 47, 2, '2022-08-21 21:49:30'),
	(15, 15, 53, 2, '2022-08-21 21:49:30'),
	(16, 16, 57, 2, '2022-08-21 21:49:30'),
	(17, 17, 59, 2, '2022-08-21 21:49:30'),
	(18, 18, 64, 2, '2022-08-21 21:49:30'),
	(19, 19, 63, 2, '2022-08-21 21:49:30'),
	(20, 20, 68, 2, '2022-08-21 21:49:30'),
	(21, 21, 7, 2, '2022-08-21 21:49:30'),
	(22, 22, 24, 2, '2022-08-21 21:49:30'),
	(23, 23, 52, 2, '2022-08-21 21:49:30'),
	(24, 24, 42, 2, '2022-08-21 21:49:30'),
	(25, 25, 69, 2, '2022-08-21 21:49:30'),
	(26, 26, 67, 2, '2022-08-21 21:49:30'),
	(27, 27, 43, 2, '2022-08-21 21:49:30'),
	(28, 28, 34, 2, '2022-08-21 21:49:30'),
	(29, 20, 71, 2, '2022-08-21 21:49:30'),
	(30, 18, 64, 2, '2022-08-21 21:49:30'),
	(37, 4, 21, 2, '2022-08-23 20:24:02'),
	(38, 1, 3, 2, '2022-08-22 23:17:21'),
	(48, 2, 6, 2, '2022-08-23 20:21:11');
/*!40000 ALTER TABLE `tim_kegiatan` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
