-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2020 at 10:56 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_reta`
--

-- --------------------------------------------------------

--
-- Table structure for table `loker`
--

CREATE TABLE `loker` (
  `id` int(11) NOT NULL,
  `nama_lowongan` varchar(50) NOT NULL,
  `syarat` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loker`
--

INSERT INTO `loker` (`id`, `nama_lowongan`, `syarat`, `status`, `date_created`) VALUES
(1, 'Programmer', '1. Mahir Java\r\n2. Mahir PHP\r\n3. Pengalaman minimal 2 tahun\r\n4. Lulusan IT', 'aktif', 1597975414),
(2, 'System Analyst', '1. Pengalaman kerja minimal 2 tahun\r\n2. Ahli dalam analisis database', 'aktif', 1597975441),
(3, 'Database Programmer', '1. Pengalaman minimal 2 tahun\r\n2. Ahli menggunakan MySQL Database\r\n3. Mampu bekerja secara tim ataupun individu', 'aktif', 1597975473);

-- --------------------------------------------------------

--
-- Table structure for table `pelamar`
--

CREATE TABLE `pelamar` (
  `id` int(11) NOT NULL,
  `posisi` varchar(35) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `pendidikan` varchar(10) NOT NULL,
  `spesialisasi` varchar(100) NOT NULL,
  `cv` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) NOT NULL,
  `tentang` varchar(128) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date_submitted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelamar`
--

INSERT INTO `pelamar` (`id`, `posisi`, `nama`, `pendidikan`, `spesialisasi`, `cv`, `alamat`, `tentang`, `telepon`, `email`, `date_submitted`) VALUES
(1, 'Programmer', 'M. Hafidh Dliyaul Haq', 'S1', 'Ahli dalam Java dan PHP', 'CV_MHafidh.pdf', 'Jalan Lapas Raya', 'Memiliki pengalaman kerja di bidang terkait selama 5 tahun, Mampu mengelola tim dengan baik, dan dapat bekerja secara tim ataupu', '082282036505', 'mhafidhdliyaulh11@gmail.com', 1598171870);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$kRnUySSA32tokfRYFwU2GexyMI/z2ufYJMaTOzTz1K7bux6Pryrf.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loker`
--
ALTER TABLE `loker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelamar`
--
ALTER TABLE `pelamar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loker`
--
ALTER TABLE `loker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pelamar`
--
ALTER TABLE `pelamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
