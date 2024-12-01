-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2024 at 12:29 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `nim` varchar(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jk` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `password` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`nim`, `nama`, `jk`, `alamat`, `password`) VALUES
('10', '10', 'Laki-Laki', '10', ''),
('1022', 'Firman', 'Laki-Laki', 'disini', '1022'),
('11', '11', 'Laki-Laki', '11', '11'),
('12345', 'Mirza', 'Laki-Laki', 'konzzz', '12345'),
('13', '13', 'Laki-Laki', '13', '13'),
('3', 'z', 'Laki-Laki', '3', ''),
('5', 'r', 'Perempuan', 'g', ''),
('9', '9', 'Laki-Laki', '9', '9'),
('jwd06', 'Ari Firmansyah', 'Laki-Laki', 'Karawang', ''),
('jwd07', 'cengyusril', 'Laki-Laki', 'majalengka', ''),
('jwd09', 'raihan', 'Laki-Laki', 'sukaresik', ''),
('jwd10', 'Dela', 'Perempuan', 'abred', ''),
('jwd11', 'emak abred', 'Laki-Laki', 'cilampung', ''),
('jwd12', 'jeri', 'Laki-Laki', 'cipasung', '');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `idbuku` varchar(5) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `penulis` varchar(30) NOT NULL,
  `banyak` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`idbuku`, `judul`, `penulis`, `banyak`) VALUES
('bk001', 'retorika', 'aristoteles', 0),
('bk002', 'pola pikir', 'zahid', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pinjam`
--

CREATE TABLE `pinjam` (
  `idpinjam` int(12) NOT NULL,
  `nim` varchar(11) NOT NULL,
  `idbuku` varchar(30) NOT NULL,
  `tanggalpinjam` date NOT NULL,
  `status` enum('Dipinjam','Dikembalikan','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pinjam`
--

INSERT INTO `pinjam` (`idpinjam`, `nim`, `idbuku`, `tanggalpinjam`, `status`) VALUES
(1, '11', 'bk001', '2024-11-27', 'Dipinjam'),
(2, '11', 'bk002', '2024-11-27', 'Dipinjam'),
(3, '12345', 'bk001', '2024-11-27', 'Dipinjam'),
(4, '1022', 'bk002', '2024-11-27', 'Dipinjam'),
(5, '1022', 'bk001', '2024-11-28', 'Dipinjam');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `nama`, `pass`) VALUES
('admin', 'Abduh Zahid Attholibi', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`idbuku`);

--
-- Indexes for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`idpinjam`),
  ADD KEY `idanggota` (`nim`),
  ADD KEY `idbuku` (`idbuku`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pinjam`
--
ALTER TABLE `pinjam`
  MODIFY `idpinjam` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
