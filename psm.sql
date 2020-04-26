-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2020 at 08:02 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `psm`
--

-- --------------------------------------------------------

--
-- Table structure for table `kursus`
--

CREATE TABLE `kursus` (
  `KodKursus` varchar(50) COLLATE utf8_bin NOT NULL,
  `NamaKursus` varchar(50) COLLATE utf8_bin NOT NULL,
  `JumlahSeksyen` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `kursus`
--

INSERT INTO `kursus` (`KodKursus`, `NamaKursus`, `JumlahSeksyen`) VALUES
('BIT1003', 'Pengaturcaraan Web', 5),
('BIT30303', 'Pengaturcaraan Dot Net', 5),
('DKA20202', 'Pengurusan Pasir', 5),
('DKU22123', 'Pembinaan Bangunan', 6),
('PJK20102', 'Pengurusan Buku', 3);

-- --------------------------------------------------------

--
-- Table structure for table `kursuspelajar`
--

CREATE TABLE `kursuspelajar` (
  `IDKursusPelajar` int(11) NOT NULL,
  `NoMatrik` varchar(10) COLLATE utf8_bin NOT NULL,
  `NamaKursus` varchar(50) COLLATE utf8_bin NOT NULL,
  `Seksyen` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `kursuspelajar`
--

INSERT INTO `kursuspelajar` (`IDKursusPelajar`, `NoMatrik`, `NamaKursus`, `Seksyen`) VALUES
(29, 'Di170056', 'Pengurusan Pasir', 1),
(30, 'Di170009', 'Pengaturcaraan Web', 3),
(31, 'DI170032', 'Pembinaan Bangunan', 2),
(32, 'DI170044', 'Pengurusan Buku', 3),
(33, 'Di170020', 'Pembinaan Bangunan', 1),
(34, 'Di170001', 'Pengaturcaraan Dot Net', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pelajar`
--

CREATE TABLE `pelajar` (
  `NoMatrik` varchar(10) COLLATE utf8_bin NOT NULL,
  `NamaPelajar` varchar(50) COLLATE utf8_bin NOT NULL,
  `NoKp` varchar(12) COLLATE utf8_bin NOT NULL,
  `NoPas` varchar(10) COLLATE utf8_bin NOT NULL,
  `NamaProgram` varchar(50) COLLATE utf8_bin NOT NULL,
  `Fakulti` varchar(50) COLLATE utf8_bin NOT NULL,
  `TahunPengajian` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `pelajar`
--

INSERT INTO `pelajar` (`NoMatrik`, `NamaPelajar`, `NoKp`, `NoPas`, `NamaProgram`, `Fakulti`, `TahunPengajian`) VALUES
('DI170032', 'John Wick', '880101015431', '', 'Sarjana Muda Animasi', 'Fakulti Sains Komputer Dan Teknologi Maklumat', 'Tahun2 Semester2'),
('DI170044', 'Juan Maata', '990101428821', '', 'Sarjana Muda Pengurusan', 'Fakulti Teknologi Pengurusan', 'Tahun3 Semester1'),
('Di170001', 'Kamal Rusyadi', '990807045398', '', 'Sarjana Muda Animasi', 'Fakulti Sains Komputer Dan Teknologi Maklumat', 'Tahun2 Semester2'),
('Di170009', 'Ahmad Fitri', '990207045872', '', 'Sarjana Muda Sekuriti', 'Fakulti Teknologi Pengurusan', 'Tahun2 Semester1'),
('Di170020', 'Syukrie Mohamad', '990807045362', '', 'Sarjana Muda Animasi', 'Fakulti Sains Komputer Dan Teknologi Maklumat', 'Tahun2 Semester1'),
('Di170056', 'Haikal Shah', '970324128364', '', 'Sarjana Muda Teknologi Maklumat', 'Fakulti Sains Komputer Dan Teknologi Maklumat', 'Tahun2 Semester1');

-- --------------------------------------------------------

--
-- Table structure for table `pensyarah`
--

CREATE TABLE `pensyarah` (
  `IdPensyarah` varchar(12) COLLATE utf8_bin NOT NULL,
  `NamaPensyarah` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `pensyarah`
--

INSERT INTO `pensyarah` (`IdPensyarah`, `NamaPensyarah`) VALUES
('AE1231245', 'Mohd Halim Othman'),
('AF1933002', 'Encik Mohd Hatta Bin Md Hani');

-- --------------------------------------------------------

--
-- Table structure for table `pentadbir`
--

CREATE TABLE `pentadbir` (
  `NamaStaff` text COLLATE utf8_bin NOT NULL,
  `Idstaff` varchar(20) COLLATE utf8_bin NOT NULL,
  `NoKp` varchar(12) COLLATE utf8_bin NOT NULL,
  `NoPas` varchar(12) COLLATE utf8_bin NOT NULL,
  `KataLaluan` varchar(16) COLLATE utf8_bin NOT NULL,
  `Jabatan` varchar(50) COLLATE utf8_bin NOT NULL,
  `Fakulti` varchar(50) COLLATE utf8_bin NOT NULL,
  `Verifikasi` varchar(16) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `pentadbir`
--

INSERT INTO `pentadbir` (`NamaStaff`, `Idstaff`, `NoKp`, `NoPas`, `KataLaluan`, `Jabatan`, `Fakulti`, `Verifikasi`) VALUES
('Haliq', 'AD2994821', '', 'A93836293', 'liar', 'PPA', 'FSKTM', 'SKPMBCJ_20_Admin'),
('Syah', 'AD2994822', '990807045362', '', 'perak', 'FSKTM', 'FSKTM', 'SKPMBCJ_20_Admin');

-- --------------------------------------------------------

--
-- Table structure for table `peperiksaan`
--

CREATE TABLE `peperiksaan` (
  `JenisPeperiksaan` varchar(50) COLLATE utf8_bin NOT NULL,
  `Kursus` varchar(50) COLLATE utf8_bin NOT NULL,
  `NamaPensyarah` varchar(50) COLLATE utf8_bin NOT NULL,
  `Tempat` varchar(50) COLLATE utf8_bin NOT NULL,
  `Tarikh` date NOT NULL,
  `Masa` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `peperiksaan`
--

INSERT INTO `peperiksaan` (`JenisPeperiksaan`, `Kursus`, `NamaPensyarah`, `Tempat`, `Tarikh`, `Masa`) VALUES
('Ujian', 'Pengaturcaraan Dot Net', 'Encik Mohd Hatta Bin Md Hani', 'G3 Bawah', '2020-04-15', '05:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `NamaProgram` varchar(50) COLLATE utf8_bin NOT NULL,
  `Fakulti` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`NamaProgram`, `Fakulti`) VALUES
('Sarjana Muda Animasi', 'Fakulti Sains Komputer Dan Teknologi Maklumat'),
('Sarjana Muda Kejuruteraan Mekanikal', 'Fakulti Alam Bina'),
('Sarjana Muda Pengurusan', 'Fakulti Teknologi Pengurusan'),
('Sarjana Muda Sekuriti', 'Fakulti Sains Komputer Dan Teknologi Maklumat'),
('Sarjana Muda Teknologi Maklumat', 'Fakulti Sains Komputer Dan Teknologi Maklumat');

-- --------------------------------------------------------

--
-- Table structure for table `tempat`
--

CREATE TABLE `tempat` (
  `NamaTempat` varchar(50) COLLATE utf8_bin NOT NULL,
  `Kapasiti` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tempat`
--

INSERT INTO `tempat` (`NamaTempat`, `Kapasiti`) VALUES
('F2 Bawah', 100),
('G3 Atas', 200);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kursus`
--
ALTER TABLE `kursus`
  ADD PRIMARY KEY (`KodKursus`);

--
-- Indexes for table `kursuspelajar`
--
ALTER TABLE `kursuspelajar`
  ADD PRIMARY KEY (`IDKursusPelajar`);

--
-- Indexes for table `pelajar`
--
ALTER TABLE `pelajar`
  ADD PRIMARY KEY (`NoMatrik`);

--
-- Indexes for table `pensyarah`
--
ALTER TABLE `pensyarah`
  ADD PRIMARY KEY (`IdPensyarah`);

--
-- Indexes for table `pentadbir`
--
ALTER TABLE `pentadbir`
  ADD PRIMARY KEY (`Idstaff`);

--
-- Indexes for table `peperiksaan`
--
ALTER TABLE `peperiksaan`
  ADD PRIMARY KEY (`JenisPeperiksaan`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`NamaProgram`);

--
-- Indexes for table `tempat`
--
ALTER TABLE `tempat`
  ADD PRIMARY KEY (`NamaTempat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kursuspelajar`
--
ALTER TABLE `kursuspelajar`
  MODIFY `IDKursusPelajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
