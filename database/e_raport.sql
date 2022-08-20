-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2022 at 04:08 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_raport`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `idguru` int(4) NOT NULL,
  `nip` varchar(25) DEFAULT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `tmp_lhr` varchar(128) DEFAULT NULL,
  `tgl_lhr` date DEFAULT NULL,
  `jk` enum('L','P') DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`idguru`, `nip`, `nama`, `tmp_lhr`, `tgl_lhr`, `jk`, `alamat`) VALUES
(7, '92060112710970001', 'Eka Saputra, S.Pd.', 'Pati', '1984-07-26', 'L', 'Jl. Merdeka '),
(8, '92060112710970002', 'Bagus Prihandoko, S.Pd.', 'Pati', '1989-08-30', 'L', 'Jl. Penjawi'),
(9, '92060112710970003', 'Silvani Violita, S.Pd.', 'Pati', '1997-10-29', 'P', 'Jl. Ratu Kalinyamat'),
(10, '92060112710970004', 'Dwi Agus Salim, S.Pd.', 'Pati', '1998-01-07', 'L', 'Jl. Merdeka'),
(12, '92060112710970005', 'Zahra Amelia, S.Pd.', 'Pati', '1995-07-13', 'L', 'Jl. Kaliurang'),
(13, '92060112710970006', 'Putri Yulia Sari, S.Pd.', 'Pati', '1998-08-20', 'P', 'Jl. Kaliurang'),
(14, '92060112710970007', 'Hafidzah, S.Pd.', 'Pati', '1995-12-28', 'P', 'Jl. Pandawa'),
(15, '92060112710970008', 'Lina Noor Afifah, S.Pd.', 'Pati', '1999-06-24', 'P', 'Jl. Gunungsari'),
(16, '92060112710970009', 'Intan Erviatun, S.H.', 'Pati', '1999-06-16', 'P', 'Jl. Ratu Kalinyamat'),
(17, '92060112710970010', 'Reza Alfiana, S.E.', 'Pati', '1999-08-20', 'P', 'Jl. Ratu Kalinyamat'),
(18, '92060112710970011', 'Muhammad Adam, S.Kom.', 'Pati', '1998-11-04', 'L', 'Jl. Merdeka Barat'),
(19, '92060112710970012', 'Risa Yunianti, S.Pd.', 'Pati', '1998-07-23', 'P', 'Jl. Ratu Kalinyamat'),
(20, '92060112710970013', 'Nur Wahyudha, S.Pd.', 'Pati', '1999-12-02', 'L', 'Jl. Ratu Kalinyamat');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `idkelas` int(4) NOT NULL,
  `kelas_kd` varchar(10) DEFAULT NULL,
  `kelas_nama` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`idkelas`, `kelas_kd`, `kelas_nama`) VALUES
(1, '1A', 'Kelas 1 A'),
(2, '1B', 'Kelas 1 B'),
(4, '2', 'Kelas 2'),
(5, '3', 'Kelas 3'),
(6, '4', 'Kelas 4'),
(7, '5', 'Kelas 5'),
(8, '6', 'Kelas 6');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `idmapel` int(4) NOT NULL,
  `mapel_kd` varchar(10) DEFAULT NULL,
  `mapel_nama` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`idmapel`, `mapel_kd`, `mapel_nama`) VALUES
(1, 'MTK', 'Matematika'),
(2, 'BING', 'Bahasa Inggris'),
(3, 'BIND', 'Bahasa Indonesia'),
(4, 'IPA', 'Ilmu Pengetahuan Alam'),
(5, 'IPS', 'Ilmu Pengetahuan Sosial');

-- --------------------------------------------------------

--
-- Table structure for table `mengajar`
--

CREATE TABLE `mengajar` (
  `idmengajar` int(4) NOT NULL,
  `idtahun_akademik` int(11) NOT NULL,
  `semester` enum('Ganjil','Genap') DEFAULT NULL,
  `idguru` int(4) NOT NULL,
  `idmapel` int(4) NOT NULL,
  `idkelas` int(4) NOT NULL,
  `kkm` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mengajar`
--

INSERT INTO `mengajar` (`idmengajar`, `idtahun_akademik`, `semester`, `idguru`, `idmapel`, `idkelas`, `kkm`) VALUES
(18, 5, 'Ganjil', 7, 3, 1, 60),
(22, 5, 'Genap', 7, 1, 1, NULL),
(23, 5, 'Genap', 7, 1, 2, NULL),
(24, 5, 'Genap', 7, 3, 1, NULL),
(25, 5, 'Genap', 7, 3, 2, NULL),
(28, 5, 'Genap', 8, 2, 1, NULL),
(29, 5, 'Genap', 7, 2, 2, NULL),
(30, 5, 'Ganjil', 9, 2, 1, 65),
(31, 5, 'Ganjil', 10, 2, 2, 60),
(32, 5, 'Ganjil', 7, 1, 1, 60),
(33, 5, 'Ganjil', 7, 1, 2, 65),
(34, 5, 'Ganjil', 8, 3, 2, 0),
(41, 7, 'Ganjil', 7, 3, 1, 75),
(42, 7, 'Ganjil', 9, 2, 1, NULL),
(43, 7, 'Ganjil', 10, 2, 2, NULL),
(44, 7, 'Ganjil', 7, 1, 1, NULL),
(45, 7, 'Ganjil', 7, 1, 2, NULL),
(46, 7, 'Ganjil', 8, 3, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `idnilai` int(11) NOT NULL,
  `idtahun_akademik` int(4) NOT NULL,
  `semester` enum('Ganjil','Genap') DEFAULT NULL,
  `idkelas` int(4) NOT NULL,
  `idmapel` int(4) NOT NULL,
  `idsiswa` int(4) NOT NULL,
  `nilai_tp1` int(4) DEFAULT NULL,
  `nilai_tp2` int(4) DEFAULT NULL,
  `nilai_tp3` int(4) DEFAULT NULL,
  `nilai_tp4` int(4) DEFAULT NULL,
  `nilai_tp5` int(4) DEFAULT NULL,
  `nilai_tp6` int(4) DEFAULT NULL,
  `nilai_tp7` int(4) DEFAULT NULL,
  `rata_tp` int(4) DEFAULT NULL,
  `nilai_uh1` int(4) DEFAULT NULL,
  `nilai_uh2` int(4) DEFAULT NULL,
  `nilai_uh3` int(4) DEFAULT NULL,
  `nilai_uh4` int(4) DEFAULT NULL,
  `nilai_uh5` int(4) DEFAULT NULL,
  `nilai_uh6` int(4) DEFAULT NULL,
  `nilai_uh7` int(4) DEFAULT NULL,
  `rata_uh` int(4) DEFAULT NULL,
  `nilai_pts` int(4) DEFAULT NULL,
  `nilai_uas` int(4) DEFAULT NULL,
  `nilai_akhir` int(4) DEFAULT NULL,
  `nilai_huruf` enum('A','B','C','D','E') DEFAULT NULL,
  `deskripsi` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`idnilai`, `idtahun_akademik`, `semester`, `idkelas`, `idmapel`, `idsiswa`, `nilai_tp1`, `nilai_tp2`, `nilai_tp3`, `nilai_tp4`, `nilai_tp5`, `nilai_tp6`, `nilai_tp7`, `rata_tp`, `nilai_uh1`, `nilai_uh2`, `nilai_uh3`, `nilai_uh4`, `nilai_uh5`, `nilai_uh6`, `nilai_uh7`, `rata_uh`, `nilai_pts`, `nilai_uas`, `nilai_akhir`, `nilai_huruf`, `deskripsi`) VALUES
(17, 5, 'Ganjil', 1, 3, 4, 12, 0, 0, 0, 0, 0, 0, 12, 34, 0, 0, 0, 0, 0, 0, 34, 56, 78, 45, 'D', 'Kurang Baik'),
(18, 5, 'Ganjil', 1, 3, 5, 23, 0, 0, 0, 0, 0, 0, 23, 45, 0, 0, 0, 0, 0, 0, 45, 67, 89, 56, 'D', 'Kurang Baik'),
(19, 5, 'Ganjil', 1, 3, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
(20, 5, 'Ganjil', 1, 3, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
(21, 5, 'Ganjil', 1, 3, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
(22, 5, 'Ganjil', 1, 3, 14, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
(23, 5, 'Ganjil', 1, 3, 15, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
(24, 5, 'Ganjil', 1, 3, 16, 89, 21, 0, 0, 0, 0, 0, 55, 98, 89, 0, 0, 0, 0, 0, 94, 95, 95, 85, 'B', 'Baik'),
(25, 5, 'Ganjil', 2, 3, 9, 12, 11, 0, 0, 0, 0, 0, 12, 21, 90, 0, 0, 0, 0, 0, 56, 55, 55, 44, 'B', 'Baik'),
(26, 5, 'Ganjil', 2, 3, 10, 23, 21, 0, 0, 0, 0, 0, 22, 32, 89, 0, 0, 0, 0, 0, 61, 60, 60, 51, 'B', 'Baik'),
(27, 5, 'Ganjil', 2, 3, 11, 34, 32, 0, 0, 0, 0, 0, 33, 43, 78, 0, 0, 0, 0, 0, 61, 65, 65, 56, 'B', 'Baik'),
(28, 5, 'Ganjil', 2, 3, 12, 45, 43, 0, 0, 0, 0, 0, 44, 54, 67, 0, 0, 0, 0, 0, 61, 70, 70, 61, 'B', 'Baik'),
(29, 5, 'Ganjil', 2, 3, 13, 56, 54, 0, 0, 0, 0, 0, 55, 65, 56, 0, 0, 0, 0, 0, 61, 75, 75, 66, 'B', 'Baik'),
(30, 5, 'Ganjil', 2, 3, 17, 67, 65, 0, 0, 0, 0, 0, 66, 76, 45, 0, 0, 0, 0, 0, 61, 80, 80, 72, 'A', 'Sangat Baik'),
(31, 5, 'Ganjil', 2, 3, 18, 78, 76, 0, 0, 0, 0, 0, 77, 87, 34, 0, 0, 0, 0, 0, 61, 85, 85, 77, 'A', 'Sangat Baik'),
(32, 5, 'Ganjil', 2, 3, 19, 89, 87, 0, 0, 0, 0, 0, 88, 98, 23, 0, 0, 0, 0, 0, 61, 90, 90, 82, 'A', 'Sangat Baik'),
(33, 5, 'Ganjil', 2, 3, 20, 90, 98, 0, 0, 0, 0, 0, 94, 90, 12, 0, 0, 0, 0, 0, 51, 95, 95, 84, 'A', 'Sangat Baik'),
(34, 5, 'Ganjil', 1, 2, 4, 56, 78, 0, 0, 0, 0, 0, 67, 76, 77, 0, 0, 0, 0, 0, 77, 87, 89, 80, 'B', 'Baik'),
(35, 5, 'Ganjil', 1, 2, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
(36, 5, 'Ganjil', 1, 2, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
(37, 5, 'Ganjil', 1, 2, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
(38, 5, 'Ganjil', 1, 2, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
(39, 5, 'Ganjil', 1, 2, 14, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
(40, 5, 'Ganjil', 1, 2, 15, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
(41, 5, 'Ganjil', 1, 2, 16, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
(42, 5, 'Ganjil', 2, 1, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 5, 'Ganjil', 2, 1, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 5, 'Ganjil', 2, 1, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 5, 'Ganjil', 2, 1, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, 5, 'Ganjil', 2, 1, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 5, 'Ganjil', 2, 1, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 5, 'Ganjil', 2, 1, 18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 5, 'Ganjil', 2, 1, 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 5, 'Ganjil', 2, 1, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, 5, 'Ganjil', 2, 2, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, 5, 'Ganjil', 2, 2, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, 5, 'Ganjil', 2, 2, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, 5, 'Ganjil', 2, 2, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(64, 5, 'Ganjil', 2, 2, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(65, 5, 'Ganjil', 2, 2, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, 5, 'Ganjil', 2, 2, 18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(67, 5, 'Ganjil', 1, 1, 4, 56, 78, 0, 0, 0, 0, 0, 67, 89, 87, 0, 0, 0, 0, 0, 88, 80, 86, 80, 'B', 'Baik'),
(68, 5, 'Ganjil', 1, 1, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
(69, 5, 'Ganjil', 1, 1, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
(70, 5, 'Ganjil', 1, 1, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
(71, 5, 'Ganjil', 1, 1, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
(72, 5, 'Ganjil', 1, 1, 14, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
(73, 5, 'Ganjil', 1, 1, 15, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
(74, 5, 'Ganjil', 1, 1, 16, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
(75, 7, 'Ganjil', 1, 3, 5, 80, 80, 81, 97, 75, 80, 80, 82, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
(76, 7, 'Ganjil', 1, 3, 6, 80, 85, 75, 80, 75, 80, 89, 81, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
(77, 7, 'Ganjil', 1, 3, 7, 85, 83, 89, 80, 89, 85, 80, 84, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
(78, 7, 'Ganjil', 1, 3, 8, 80, 87, 80, 85, 89, 80, 81, 83, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
(79, 7, 'Ganjil', 1, 3, 14, 80, 89, 80, 81, 80, 80, 89, 83, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
(80, 7, 'Ganjil', 1, 3, 15, 80, 80, 75, 85, 80, 80, 80, 80, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
(81, 7, 'Ganjil', 1, 3, 16, 75, 80, 85, 81, 80, 80, 80, 80, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `profil_sekolah`
--

CREATE TABLE `profil_sekolah` (
  `idprofil_sekolah` int(4) NOT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `npsn` varchar(10) DEFAULT NULL,
  `status` enum('Negeri','Swasta') DEFAULT NULL,
  `nama_kepsek` varchar(128) DEFAULT NULL,
  `nip_kepsek` varchar(25) DEFAULT NULL,
  `akreditasi` enum('kosong','A','B','C') DEFAULT NULL,
  `logo` varchar(128) DEFAULT NULL,
  `provinsi` varchar(128) DEFAULT NULL,
  `kabupaten` varchar(128) DEFAULT NULL,
  `kecamatan` varchar(128) DEFAULT NULL,
  `kelurahan` varchar(128) DEFAULT NULL,
  `dusun` varchar(128) DEFAULT NULL,
  `rt` varchar(5) DEFAULT NULL,
  `rw` varchar(5) DEFAULT NULL,
  `alamat` varchar(256) DEFAULT NULL,
  `kodepos` varchar(10) DEFAULT NULL,
  `lintang` varchar(15) DEFAULT NULL,
  `bujur` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profil_sekolah`
--

INSERT INTO `profil_sekolah` (`idprofil_sekolah`, `nama`, `npsn`, `status`, `nama_kepsek`, `nip_kepsek`, `akreditasi`, `logo`, `provinsi`, `kabupaten`, `kecamatan`, `kelurahan`, `dusun`, `rt`, `rw`, `alamat`, `kodepos`, `lintang`, `bujur`) VALUES
(1, 'SD NEGERI KARANGWOTAN', '60401524', 'Negeri', 'Sunaryo, S.Pd., M.Pd.', '-', 'A', 'logo-sekolah.png', 'Jawa Tengah', 'Kab. Pati', 'Kec. Pucakwangi', 'Karangwotan', 'Karangwotan', '001', '001', 'Jl. Perjuangan', '59180', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `rombel`
--

CREATE TABLE `rombel` (
  `idrombel` int(4) NOT NULL,
  `idwali_kelas` int(4) NOT NULL,
  `idsiswa` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rombel`
--

INSERT INTO `rombel` (`idrombel`, `idwali_kelas`, `idsiswa`) VALUES
(1, 1, 4),
(2, 1, 5),
(3, 1, 6),
(4, 1, 7),
(5, 1, 8),
(6, 2, 9),
(7, 2, 10),
(8, 2, 11),
(9, 2, 12),
(10, 2, 13),
(11, 1, 14),
(12, 1, 15),
(13, 1, 16),
(14, 2, 17),
(15, 2, 18),
(16, 2, 19),
(17, 2, 20),
(19, 5, 5),
(20, 5, 6),
(21, 5, 7),
(22, 5, 8),
(23, 5, 14),
(24, 5, 15),
(25, 5, 16),
(26, 6, 9),
(27, 6, 10),
(28, 6, 11),
(29, 6, 12),
(30, 6, 13),
(31, 6, 17),
(32, 6, 18),
(33, 6, 19);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `idsiswa` int(4) NOT NULL,
  `foto` varchar(128) DEFAULT NULL,
  `nis` varchar(5) DEFAULT NULL,
  `nisn` varchar(15) DEFAULT NULL,
  `nik` varchar(25) DEFAULT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `tmp_lhr` varchar(128) DEFAULT NULL,
  `tgl_lhr` date DEFAULT NULL,
  `jk` enum('L','P') DEFAULT NULL,
  `hobi` varchar(128) DEFAULT NULL,
  `citacita` varchar(128) DEFAULT NULL,
  `sts_anak` enum('Anak Kandung','Anak Tiri','Anak Angkat') DEFAULT NULL,
  `jml_sdr` int(2) DEFAULT NULL,
  `anak_ke` int(2) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `nik_ayah` varchar(25) DEFAULT NULL,
  `nama_ayah` varchar(128) DEFAULT NULL,
  `pend_ayah` varchar(50) DEFAULT NULL,
  `pekr_ayah` varchar(50) DEFAULT NULL,
  `nik_ibu` varchar(25) DEFAULT NULL,
  `nama_ibu` varchar(128) DEFAULT NULL,
  `pend_ibu` varchar(50) DEFAULT NULL,
  `pekr_ibu` varchar(50) DEFAULT NULL,
  `alamat_ortu` text DEFAULT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `status` enum('Aktif','Nonaktif','Pindah','Keluar','Alumni') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`idsiswa`, `foto`, `nis`, `nisn`, `nik`, `nama`, `tmp_lhr`, `tgl_lhr`, `jk`, `hobi`, `citacita`, `sts_anak`, `jml_sdr`, `anak_ke`, `alamat`, `nik_ayah`, `nama_ayah`, `pend_ayah`, `pekr_ayah`, `nik_ibu`, `nama_ibu`, `pend_ibu`, `pekr_ibu`, `alamat_ortu`, `tgl_masuk`, `tgl_keluar`, `status`) VALUES
(4, 'siswa-4.jpg', '1234', '9206011271', '9206011603090001', 'Eka Saputra', 'Pati', '2007-10-27', 'P', 'Hobi', 'Pilot', 'Anak Kandung', 4, 3, 'Jl. Pejuang', 'nik ayah', 'nama ayah', 'D2', 'pekr ayah', 'nik ibu', 'nama ibu', 'S1', 'pekr ibu', 'bbbbb', NULL, NULL, 'Aktif'),
(5, 'siswa-5.jpg', '1235', '9206011272', '', 'Bagus Saputra', 'Pati', '2007-10-28', 'L', '', 'Pilot', NULL, 0, 0, 'Jalur 5 SP 1 Kampung Waraitama', '', '', NULL, '', '', '', NULL, '', '', NULL, NULL, 'Aktif'),
(6, '', '1236', '9206011273', NULL, 'Ahmad Saputra', 'Pati', '2007-10-29', 'L', NULL, NULL, NULL, NULL, NULL, 'Jalur 5 SP 1 Kampung Waraitama', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Aktif'),
(7, '', '1237', '9206011274', NULL, 'Mega Purnama', 'Pati', '2007-10-22', 'P', NULL, NULL, NULL, NULL, NULL, 'Jalur 5 SP 1 Kampung Waraitama', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Aktif'),
(8, '', '1238', '9206011275', NULL, 'Mualifatul Ulya', 'Pati', '2007-10-21', 'P', NULL, NULL, NULL, NULL, NULL, 'Jalur 5 SP 1 Kampung Waraitama', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Aktif'),
(9, '', '1238', '9206011275', NULL, 'Muhammad Agung', 'Pati', '2007-10-21', 'L', NULL, NULL, NULL, NULL, NULL, 'Jalur 5 SP 1 Kampung Waraitama', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Aktif'),
(10, '', '1238', '9206011275', NULL, 'Fitri Ayu', 'Pati', '2008-10-21', 'L', NULL, NULL, NULL, NULL, NULL, 'Jalur 5 SP 1 Kampung Waraitama', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Aktif'),
(11, '', '1238', '9206011275', NULL, 'Siti Muanifah', 'Pati', '2008-10-21', 'P', NULL, NULL, NULL, NULL, NULL, 'Jalur 5 SP 1 Kampung Waraitama', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Aktif'),
(12, '', '1238', '9206011275', NULL, 'Tio Ahmadi', 'Pati', '2009-10-21', 'L', NULL, NULL, NULL, NULL, NULL, 'Jalur 5 SP 1 Kampung Waraitama', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Aktif'),
(13, '', '1238', '9206011275', NULL, 'Mia Mia', 'Pati', '2008-10-21', 'L', NULL, NULL, NULL, NULL, NULL, 'Jalur 5 SP 1 Kampung Waraitama', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Aktif'),
(14, '', '1238', '9206011275', NULL, 'Tri Ermawati', 'Pati', '2008-10-21', 'P', NULL, NULL, NULL, NULL, NULL, 'Jalur 5 SP 1 Kampung Waraitama', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Aktif'),
(15, '', '1238', '9206011275', NULL, 'Muhammad Andi', 'Pati', '2007-10-21', 'L', NULL, NULL, NULL, NULL, NULL, 'Jalur 5 SP 1 Kampung Waraitama', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Aktif'),
(16, '', '1238', '9206011275', NULL, 'Edi Bagus Setiawan', 'Pati', '2008-10-21', 'L', NULL, NULL, NULL, NULL, NULL, 'Jalur 5 SP 1 Kampung Waraitama', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Aktif'),
(17, '', '1238', '9206011275', NULL, 'Lutfia Yuniasti', 'Pati', '2008-10-21', 'P', NULL, NULL, NULL, NULL, NULL, 'Jalur 5 SP 1 Kampung Waraitama', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Aktif'),
(18, '', '1238', '9206011275', NULL, 'Novenda Salsabila', 'Pati', '2007-10-21', 'P', NULL, NULL, NULL, NULL, NULL, 'Jalur 5 SP 1 Kampung Waraitama', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Aktif'),
(19, '', '1238', '9206011275', NULL, 'Andi Setiawan', 'Pati', '2005-10-21', 'L', NULL, NULL, NULL, NULL, NULL, 'Jalur 5 SP 1 Kampung Waraitama', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Keluar'),
(20, '', '1238', '9206011275', NULL, 'Eka Saputro, A.Md', 'Bintuni 4', '1997-10-21', 'L', NULL, NULL, NULL, NULL, NULL, 'Jalur 5 SP 1 Kampung Waraitama', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Alumni');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_akademik`
--

CREATE TABLE `tahun_akademik` (
  `idtahun_akademik` int(4) NOT NULL,
  `tahun_akademik` varchar(10) DEFAULT NULL,
  `semester` enum('Ganjil','Genap') DEFAULT NULL,
  `semester_aktif` tinyint(4) DEFAULT NULL,
  `tempat` varchar(128) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tahun_akademik`
--

INSERT INTO `tahun_akademik` (`idtahun_akademik`, `tahun_akademik`, `semester`, `semester_aktif`, `tempat`, `tanggal`) VALUES
(5, '2018-2019', 'Ganjil', 0, 'Manokwari', '2020-04-02'),
(7, '2019-2020', 'Ganjil', 1, '', '2020-04-02'),
(8, '2022-2023', 'Genap', 0, NULL, '2022-08-20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idusers` int(11) NOT NULL,
  `user_name` varchar(25) DEFAULT NULL,
  `user_password` varchar(128) DEFAULT NULL,
  `user_fullname` varchar(128) DEFAULT NULL,
  `user_type` enum('super_user','guru','siswa') DEFAULT NULL,
  `is_block` tinyint(1) DEFAULT NULL,
  `create_at` int(11) DEFAULT NULL,
  `update_at` int(11) DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idusers`, `user_name`, `user_password`, `user_fullname`, `user_type`, `is_block`, `create_at`, `update_at`, `create_by`, `update_by`) VALUES
(1, 'admin', '$2y$10$ePYvbmZHzPxjanA.aCprMO9p0Z7Q9JgzlzyCevd7Jqf.Wb2huO8t.', 'SD N Karangwotan', 'super_user', 0, 1556509343, 1586934959, 1, 1),
(18, 'guru', '$2y$10$k6jo/S9Bme1fUCLFMrzWvOGdKpz5N5e96LaAMBuzAx/4NwCFjyjZK', 'guru', 'guru', 0, 1586150893, 1660960218, 1, 1),
(29, 'guru1', '$2y$10$hTwF1b8UKv66utTJfA9t8O92VJFqp/1nUhWuS37TUCVEvR8Opa2Zi', 'guru1', 'guru', 0, 1586151104, NULL, 1, NULL),
(30, 'guru2', '$2y$10$e79TkCEI2gBpSzb06eaGIOE4UDQXPUzU0944QdSBp/Ir1rYzT/qWa', 'guru2', 'guru', 0, 1586151104, NULL, 1, NULL),
(31, 'guru3', '$2y$10$K7wLEa5sjGF.DpvNL1pkPek3Fc5iGzNzLiogwW.4LDt/8IfUr9fe.', 'guru3', 'guru', 0, 1586151104, NULL, 1, NULL),
(32, 'guru4', '$2y$10$3v47kVI.v0DDxM.lkDV.ruFB5RKrCOCAxcrQNomvOCkJwJVj77WPa', 'guru4', 'guru', 0, 1586151104, NULL, 1, NULL),
(33, 'siswa', '$2y$10$CXBNfEgUwvQjtdtF3uPWxu84wz1dzsUk9cA.ZWPEu3MhUU6NJHIPi', 'Siswa', 'siswa', 0, 1586151396, 1660960885, 1, 1),
(38, '92060112710970006', '$2y$10$eFStSKpabDiXeVNwSGElt.G32otg/iIBMyoJkXX9fJ/D.y.BKYgqi', 'Putri Yulia Sari, S.Pd.', 'guru', 0, 1660958133, NULL, 1, NULL),
(39, '92060112710970007', '$2y$10$05YwUdblVOyPLwgYAX6MWuOUt/gGRgNbmwtj9XaCvhtbhYOZzQ6L6', 'Hafidzah, S.Pd.', 'guru', 0, 1660958386, NULL, 1, NULL),
(40, '92060112710970008', '$2y$10$GmFfKNLJHhzuJ2K6wSTbiufeEGKFYGfFx7wFJffErUDgiCLQlR1Zi', 'Lina Noor Afifah, S.Pd.', 'guru', 0, 1660958389, NULL, 1, NULL),
(41, '92060112710970009', '$2y$10$xiXV5IHUCtUbGdnF4v7D8OQCszRwqWgmwmB2e/gJQ9eG6uTti5s9y', 'Intan Erviatun, S.H.', 'guru', 0, 1660958457, NULL, 1, NULL),
(42, '92060112710970010', '$2y$10$Grp6TvB.FEuz/PAc06A/be93oc7H9cz.i.lQGQyDwW2uTIvRatJH.', 'Reza Alfiana, S.E.', 'guru', 0, 1660958521, NULL, 1, NULL),
(43, '92060112710970011', '$2y$10$Sbc7XroehO6UfiLV35BRfOj1dL3FTKlHFUfXDEsCXaWzCXOpWafGi', 'Muhammad Adam, S.Kom.', 'guru', 0, 1660958754, NULL, 1, NULL),
(44, '92060112710970012', '$2y$10$EVzphBpmeOiaxjKBPg4h6OwU/2vLQ8fYQ0.Xm3qtzTG/oIgVzNksG', 'Risa Yunianti, S.Pd.', 'guru', 0, 1660958759, NULL, 1, NULL),
(45, '92060112710970013', '$2y$10$PZqbkLBFKGpn5bPR8kOYYuWGPaT7rEvRyd7LZaSc/DRR/dxX0jO6O', 'Nur Wahyudha, S.Pd.', 'guru', 0, 1660958760, NULL, 1, NULL),
(46, '92060112710970001', '$2y$10$0wgO41WCumbzibUlTUys.eIq7WpDlFVFh8a1VYSdrW9RGRElAPJyy', 'Eka Saputra, S.Pd.', 'guru', 0, 1660961250, NULL, 1, NULL),
(47, '92060112710970002', '$2y$10$5DJBQXxqSac43DpgWf2Gg.7NSko7vNp2Es3DwN7yrLIzlrSznn9UC', 'Bagus Prihandoko, S.Pd.', 'guru', 0, 1660961251, NULL, 1, NULL),
(48, '92060112710970004', '$2y$10$cHjGcQQfuzJg/Cj3y0ag3ugP/J5srCVJ140XVXFtgWBb5ueLRxxyi', 'Dwi Agus Salim, S.Pd.', 'guru', 0, 1660961253, NULL, 1, NULL),
(49, '92060112710970003', '$2y$10$2gVdYiBLig7a3p19cpVUm.UC3ddUo7OPpzfr489OeuQ8zxslINsPi', 'Silvani Violita, S.Pd.', 'guru', 0, 1660961255, NULL, 1, NULL),
(50, '92060112710970005', '$2y$10$KuEW62nWA5WHQPHwJyvvkOcl7KTZMwpslzr6hVQx3Se32nAKB5UXi', 'Zahra Amelia, S.Pd.', 'guru', 0, 1660961257, NULL, 1, NULL),
(51, '1234', '$2y$10$UyBKCEhTZQbwhlCYTbx4YOG4KxjL882Ci7/yjIFMUgeZCv1WQPIa2', 'Eka Saputra', 'siswa', 0, 1660961278, NULL, 1, NULL),
(52, '1235', '$2y$10$xDT.YbBSEXgUTbLGphCpyOaZ7oUwBnPQ82cQ6Hz/jDk3eXWqaYZgC', 'Bagus Saputra', 'siswa', 0, 1660961278, NULL, 1, NULL),
(53, '1236', '$2y$10$b.syT/0bYZF/A.D4/P6e4uFf2a.7b6b38AAbWw/xEeHT87Jf0aBRW', 'Ahmad Saputra', 'siswa', 0, 1660961278, NULL, 1, NULL),
(54, '1237', '$2y$10$iJ0JJWiOe.IsbXTmM9Ua7O916qd8MOvt367CSP9dNcrYmaebtAhAi', 'Mega Purnama', 'siswa', 0, 1660961278, NULL, 1, NULL),
(55, '1238', '$2y$10$tiLH91WKkJuvrRFUF2680.yhiq88905vkToqKLvfIgM7sD5nvturO', 'Mualifatul Ulya', 'siswa', 0, 1660961278, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wali_kelas`
--

CREATE TABLE `wali_kelas` (
  `idwali_kelas` int(4) NOT NULL,
  `idtahun_akademik` int(4) NOT NULL,
  `semester` enum('Ganjil','Genap') DEFAULT NULL,
  `idkelas` int(4) NOT NULL,
  `idguru` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wali_kelas`
--

INSERT INTO `wali_kelas` (`idwali_kelas`, `idtahun_akademik`, `semester`, `idkelas`, `idguru`) VALUES
(1, 5, 'Ganjil', 1, 7),
(2, 5, 'Ganjil', 2, 7),
(5, 7, 'Ganjil', 1, 7),
(6, 7, 'Ganjil', 2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `_sessions`
--

CREATE TABLE `_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `_sessions`
--

INSERT INTO `_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('iheqe903c7p9ho981tnumkbhbkf2232j', '::1', 1660961293, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636303936313133313b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b6163636573737c733a31303a2273757065725f75736572223b),
('q9ft27spqiu6ed4aot6b1ihj23ouki14', '::1', 1618715707, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383731353730333b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b6163636573737c733a31303a2273757065725f75736572223b);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`idguru`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`idkelas`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`idmapel`);

--
-- Indexes for table `mengajar`
--
ALTER TABLE `mengajar`
  ADD PRIMARY KEY (`idmengajar`,`idtahun_akademik`,`idguru`,`idmapel`,`idkelas`),
  ADD KEY `fk_guru_has_mapel_mapel1_idx` (`idmapel`),
  ADD KEY `fk_guru_has_mapel_guru1_idx` (`idguru`),
  ADD KEY `fk_mengajar_tahun_akademik1_idx` (`idtahun_akademik`),
  ADD KEY `fk_mengajar_kelas1_idx` (`idkelas`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`idnilai`,`idtahun_akademik`,`idkelas`,`idmapel`,`idsiswa`),
  ADD KEY `fk_mapel_has_siswa_siswa1_idx` (`idsiswa`),
  ADD KEY `fk_mapel_has_siswa_mapel1_idx` (`idmapel`),
  ADD KEY `fk_nilai_tahun_akademik1_idx` (`idtahun_akademik`),
  ADD KEY `fk_nilai_kelas1_idx` (`idkelas`);

--
-- Indexes for table `profil_sekolah`
--
ALTER TABLE `profil_sekolah`
  ADD PRIMARY KEY (`idprofil_sekolah`);

--
-- Indexes for table `rombel`
--
ALTER TABLE `rombel`
  ADD PRIMARY KEY (`idrombel`,`idwali_kelas`,`idsiswa`),
  ADD KEY `fk_rombel_siswa1_idx` (`idsiswa`),
  ADD KEY `fk_rombel_wali_kelas1_idx` (`idwali_kelas`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`idsiswa`);

--
-- Indexes for table `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  ADD PRIMARY KEY (`idtahun_akademik`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idusers`);

--
-- Indexes for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
  ADD PRIMARY KEY (`idwali_kelas`,`idtahun_akademik`,`idkelas`,`idguru`),
  ADD KEY `fk_rombel_has_guru_guru1_idx` (`idguru`),
  ADD KEY `fk_wali_kelas_kelas1_idx` (`idkelas`),
  ADD KEY `fk_tahun_akademik_tahun_akademik1_idx` (`idtahun_akademik`);

--
-- Indexes for table `_sessions`
--
ALTER TABLE `_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_TIMESTAMP` (`timestamp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `idguru` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `idkelas` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `idmapel` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mengajar`
--
ALTER TABLE `mengajar`
  MODIFY `idmengajar` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `idnilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `profil_sekolah`
--
ALTER TABLE `profil_sekolah`
  MODIFY `idprofil_sekolah` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rombel`
--
ALTER TABLE `rombel`
  MODIFY `idrombel` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `idsiswa` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  MODIFY `idtahun_akademik` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idusers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
  MODIFY `idwali_kelas` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mengajar`
--
ALTER TABLE `mengajar`
  ADD CONSTRAINT `fk_guru_has_mapel_guru1` FOREIGN KEY (`idguru`) REFERENCES `guru` (`idguru`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_guru_has_mapel_mapel1` FOREIGN KEY (`idmapel`) REFERENCES `mapel` (`idmapel`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mengajar_kelas1` FOREIGN KEY (`idkelas`) REFERENCES `kelas` (`idkelas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mengajar_tahun_akademik1` FOREIGN KEY (`idtahun_akademik`) REFERENCES `tahun_akademik` (`idtahun_akademik`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `fk_mapel_has_siswa_mapel1` FOREIGN KEY (`idmapel`) REFERENCES `mapel` (`idmapel`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mapel_has_siswa_siswa1` FOREIGN KEY (`idsiswa`) REFERENCES `siswa` (`idsiswa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_nilai_kelas1` FOREIGN KEY (`idkelas`) REFERENCES `kelas` (`idkelas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_nilai_tahun_akademik1` FOREIGN KEY (`idtahun_akademik`) REFERENCES `tahun_akademik` (`idtahun_akademik`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rombel`
--
ALTER TABLE `rombel`
  ADD CONSTRAINT `fk_rombel_siswa1` FOREIGN KEY (`idsiswa`) REFERENCES `siswa` (`idsiswa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_rombel_wali_kelas1` FOREIGN KEY (`idwali_kelas`) REFERENCES `wali_kelas` (`idwali_kelas`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
  ADD CONSTRAINT `fk_rombel_has_guru_guru1` FOREIGN KEY (`idguru`) REFERENCES `guru` (`idguru`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tahun_akademik_tahun_akademik1` FOREIGN KEY (`idtahun_akademik`) REFERENCES `tahun_akademik` (`idtahun_akademik`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_wali_kelas_kelas1` FOREIGN KEY (`idkelas`) REFERENCES `kelas` (`idkelas`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
