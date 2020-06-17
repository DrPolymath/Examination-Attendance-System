-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2020 at 05:04 PM
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
-- Table structure for table `kehadiran`
--

CREATE TABLE `kehadiran` (
  `IDKehadiran` int(11) NOT NULL,
  `JenisPeperiksaan` varchar(50) COLLATE utf8_bin NOT NULL,
  `Kursus` varchar(50) COLLATE utf8_bin NOT NULL,
  `NoMatrik` varchar(10) COLLATE utf8_bin NOT NULL,
  `StatusKehadiran` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `kehadiran`
--

INSERT INTO `kehadiran` (`IDKehadiran`, `JenisPeperiksaan`, `Kursus`, `NoMatrik`, `StatusKehadiran`) VALUES
(1, 'Ujian', 'Pengaturcaraan Dot Net', 'Di170001', 'Hadir'),
(2, 'Ujian', 'Pengaturcaraan Dot Net', 'Di170081', 'TidakHadir'),
(3, 'Ujian', 'Pengaturcaraan Dot Net', 'Di170039', 'TidakHadir'),
(4, 'Ujian', 'Pengaturcaraan Dot Net', 'Di170051', 'Hadir'),
(5, 'Ujian', 'Pengaturcaraan Dot Net', 'Di170046', 'TidakHadir'),
(6, 'Peperiksaan Akhir', 'Pengaturcaraan Web', 'Di170009', 'Hadir'),
(7, 'Peperiksaan Akhir', 'Pengaturcaraan Web', 'DI170032', 'TidakHadir'),
(8, 'Peperiksaan Akhir', 'Pengaturcaraan Web', 'DI170044', 'Hadir'),
(9, 'Peperiksaan Akhir', 'Pengaturcaraan Web', 'Di170001', 'TidakHadir'),
(10, 'Peperiksaan Akhir', 'Pengaturcaraan Web', 'Di170020', 'Hadir');

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
('DKU22123', 'Pembinaan Bangunan', 6),
('BIT30303', 'Pengaturcaraan Dot Net', 5),
('BIT1003', 'Pengaturcaraan Web', 5),
('PJK20102', 'Pengurusan Buku', 3),
('DKA20202', 'Pengurusan Pasir', 5);

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
(30, 'Di170009', 'Pengaturcaraan Web', 3),
(31, 'DI170032', 'Pembinaan Bangunan', 2),
(32, 'DI170044', 'Pengurusan Buku', 3),
(33, 'Di170020', 'Pembinaan Bangunan', 1),
(34, 'Di170001', 'Pengaturcaraan Dot Net', 3),
(35, 'Di170081', 'Pengaturcaraan Dot Net', 1),
(36, 'Di170039', 'Pengaturcaraan Dot Net', 3),
(37, 'Di170051', 'Pengaturcaraan Dot Net', 3),
(38, 'Di170046', 'Pengaturcaraan Dot Net', 4),
(39, 'DI170032', 'Pengaturcaraan Web', 1),
(40, 'DI170044', 'Pengaturcaraan Web', 2),
(41, 'Di170001', 'Pengaturcaraan Web', 3),
(42, 'Di170020', 'Pengaturcaraan Web', 5);

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
('Di170039', 'Muhammad Ezlan', '970321103322', '', 'Sarjana Muda Teknologi Maklumat', 'Fakulti Sains Komputer Dan Teknologi Maklumat', 'Tahun1 Semester2'),
('Di170046', 'Muhammad Hazim', '970321107654', '', 'Sarjana Muda Teknologi Maklumat', 'Fakulti Sains Komputer Dan Teknologi Maklumat', 'Tahun2 Semester1'),
('Di170051', 'Muhammad Hazman', '990207045872', '', 'Sarjana Muda Teknologi Maklumat', 'Fakulti Sains Komputer Dan Teknologi Maklumat', 'Tahun2 Semester2'),
('Di170081', 'Haikal Shah', '990807045362', '', 'Sarjana Muda Teknologi Maklumat', 'Fakulti Sains Komputer Dan Teknologi Maklumat', 'Tahun2 Semester1');

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
('AF1933002', 'Encik Mohd Hatta Bin Md Hani'),
('AE1231245', 'Mohd Halim Othman');

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
('Peperiksaan Akhir', 'Pengaturcaraan Web', 'Mohd Halim Othman', 'F2 Bawah', '2020-07-15', '10:00:00'),
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
-- Indexes for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`IDKehadiran`);

--
-- Indexes for table `kursus`
--
ALTER TABLE `kursus`
  ADD PRIMARY KEY (`NamaKursus`);

--
-- Indexes for table `kursuspelajar`
--
ALTER TABLE `kursuspelajar`
  ADD PRIMARY KEY (`IDKursusPelajar`),
  ADD KEY `NamaKursus` (`NamaKursus`),
  ADD KEY `NoMatrik` (`NoMatrik`);

--
-- Indexes for table `pelajar`
--
ALTER TABLE `pelajar`
  ADD PRIMARY KEY (`NoMatrik`);

--
-- Indexes for table `pensyarah`
--
ALTER TABLE `pensyarah`
  ADD PRIMARY KEY (`NamaPensyarah`);

--
-- Indexes for table `pentadbir`
--
ALTER TABLE `pentadbir`
  ADD PRIMARY KEY (`Idstaff`);

--
-- Indexes for table `peperiksaan`
--
ALTER TABLE `peperiksaan`
  ADD PRIMARY KEY (`JenisPeperiksaan`),
  ADD KEY `Kursus` (`Kursus`),
  ADD KEY `NamaPensyarah` (`NamaPensyarah`);

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
-- AUTO_INCREMENT for table `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `IDKehadiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kursuspelajar`
--
ALTER TABLE `kursuspelajar`
  MODIFY `IDKursusPelajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kursuspelajar`
--
ALTER TABLE `kursuspelajar`
  ADD CONSTRAINT `kursuspelajar_ibfk_1` FOREIGN KEY (`NamaKursus`) REFERENCES `kursus` (`NamaKursus`),
  ADD CONSTRAINT `kursuspelajar_ibfk_2` FOREIGN KEY (`NoMatrik`) REFERENCES `pelajar` (`NoMatrik`);

--
-- Constraints for table `peperiksaan`
--
ALTER TABLE `peperiksaan`
  ADD CONSTRAINT `peperiksaan_ibfk_1` FOREIGN KEY (`Kursus`) REFERENCES `kursus` (`NamaKursus`),
  ADD CONSTRAINT `peperiksaan_ibfk_2` FOREIGN KEY (`NamaPensyarah`) REFERENCES `pensyarah` (`NamaPensyarah`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
