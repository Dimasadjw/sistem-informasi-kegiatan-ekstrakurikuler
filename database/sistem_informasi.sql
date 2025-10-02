-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2024 at 07:57 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_informasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` int(15) NOT NULL,
  `id_buat_absensi` int(15) NOT NULL,
  `id_user` int(15) NOT NULL,
  `id_ekstra` int(15) NOT NULL,
  `kelas` varchar(225) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `waktu_absen` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `id_buat_absensi`, `id_user`, `id_ekstra`, `kelas`, `keterangan`, `waktu_absen`) VALUES
(8, 6, 2, 11, 'XII RPL A', 'hadir', '2024-02-26 10:24:25'),
(13, 8, 2, 9, 'XII RPL A', 'ijin', '2024-02-27 10:37:14'),
(24, 8, 7, 9, 'XII RPL A', 'sakit', '2024-02-27 11:23:11');

-- --------------------------------------------------------

--
-- Table structure for table `buat_absensi`
--

CREATE TABLE `buat_absensi` (
  `id_buat_absen` int(15) NOT NULL,
  `id_user` int(15) NOT NULL,
  `id_ekstra` int(15) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `ekstrakurikuler` varchar(225) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buat_absensi`
--

INSERT INTO `buat_absensi` (`id_buat_absen`, `id_user`, `id_ekstra`, `nama`, `ekstrakurikuler`, `tanggal`) VALUES
(6, 5, 11, 'andik gapuro', 'PMR', '2024-02-26'),
(7, 5, 11, 'andik gapuro', 'PMR', '2024-02-27'),
(8, 1, 9, 'alan herva', 'Renang', '2024-02-27'),
(9, 6, 15, 'dimas', 'Futsal', '2024-02-27');

-- --------------------------------------------------------

--
-- Table structure for table `ekstra_diikuti`
--

CREATE TABLE `ekstra_diikuti` (
  `id_ekstra_diikuti` int(15) NOT NULL,
  `id_user` int(15) NOT NULL,
  `id_ekstra` int(15) NOT NULL,
  `kelas` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ekstra_diikuti`
--

INSERT INTO `ekstra_diikuti` (`id_ekstra_diikuti`, `id_user`, `id_ekstra`, `kelas`) VALUES
(17, 2, 11, 'XII RPL A'),
(18, 2, 9, 'XII RPL A'),
(19, 7, 9, 'XII RPL B'),
(20, 7, 15, 'XII RPL B'),
(21, 8, 9, 'XII RPL A'),
(22, 8, 11, 'XII RPL A');

-- --------------------------------------------------------

--
-- Table structure for table `jurnal`
--

CREATE TABLE `jurnal` (
  `id_jurnal` int(15) NOT NULL,
  `id_user` int(15) NOT NULL,
  `id_ekstra` int(15) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `ekstrakurikuler` varchar(225) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp(),
  `judul` varchar(500) NOT NULL,
  `isi_jurnal` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jurnal`
--

INSERT INTO `jurnal` (`id_jurnal`, `id_user`, `id_ekstra`, `nama`, `ekstrakurikuler`, `tanggal`, `judul`, `isi_jurnal`) VALUES
(21, 4, 6, 'budi setiawan', 'Rohis', '2024-02-21', 'mmm', 'mmm'),
(22, 4, 6, 'budi setiawan', 'Rohis', '2024-02-22', 'siraman rohani', 'siraman rohani'),
(23, 1, 9, 'alan herva', 'Renang', '2024-02-22', 'asdadsadasd', 'adadsadasd'),
(24, 1, 9, 'alan herva', 'Renang', '2024-02-23', 'latihan 1', 'latihan dasar gaya bebas');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ekstra`
--

CREATE TABLE `tb_ekstra` (
  `id` int(11) NOT NULL,
  `nama_ekstra` varchar(225) NOT NULL,
  `id_user` int(225) NOT NULL,
  `hari` varchar(25) NOT NULL,
  `waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_ekstra`
--

INSERT INTO `tb_ekstra` (`id`, `nama_ekstra`, `id_user`, `hari`, `waktu`) VALUES
(9, 'Renang', 1, 'Sabtu', '09:00:00'),
(11, 'PMR', 5, 'Kamis', '15:00:00'),
(15, 'Futsal', 6, 'Rabu', '20:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(25) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `role` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `username`, `password`, `role`) VALUES
(1, 'alan herva', 'alan', 'alan123', 'pelatih'),
(2, 'anas budiman', 'anas', 'anas123', 'siswa'),
(3, 'bagus gos', 'bagus', 'bagus123', 'kesiswaan'),
(4, 'budi setiawan', 'budi', 'budi123', 'pelatih'),
(5, 'andik gapuro', 'andik', 'andik123', 'pelatih'),
(6, 'dimas', 'dimas', 'dimas123', 'pelatih'),
(7, 'dani', 'dani', 'dani123', 'siswa'),
(8, 'eka', 'eka', 'eka123', 'siswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indexes for table `buat_absensi`
--
ALTER TABLE `buat_absensi`
  ADD PRIMARY KEY (`id_buat_absen`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_ekstra` (`id_ekstra`);

--
-- Indexes for table `ekstra_diikuti`
--
ALTER TABLE `ekstra_diikuti`
  ADD PRIMARY KEY (`id_ekstra_diikuti`);

--
-- Indexes for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD PRIMARY KEY (`id_jurnal`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_ekstra` (`id_ekstra`);

--
-- Indexes for table `tb_ekstra`
--
ALTER TABLE `tb_ekstra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pelatih` (`id_user`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `buat_absensi`
--
ALTER TABLE `buat_absensi`
  MODIFY `id_buat_absen` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ekstra_diikuti`
--
ALTER TABLE `ekstra_diikuti`
  MODIFY `id_ekstra_diikuti` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `jurnal`
--
ALTER TABLE `jurnal`
  MODIFY `id_jurnal` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_ekstra`
--
ALTER TABLE `tb_ekstra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
