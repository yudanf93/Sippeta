-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2020 at 10:01 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sippeta.com`
--

-- --------------------------------------------------------

--
-- Table structure for table `berkas`
--

CREATE TABLE `berkas` (
  `id_berkas` int(15) NOT NULL,
  `file_berkas` text NOT NULL,
  `id_user` int(15) NOT NULL,
  `tgl_berkas` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nama_berkas` varchar(200) NOT NULL,
  `status_berkas` varchar(10) NOT NULL,
  `biaya_berkas` int(50) NOT NULL,
  `kode_pembayaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berkas`
--

INSERT INTO `berkas` (`id_berkas`, `file_berkas`, `id_user`, `tgl_berkas`, `nama_berkas`, `status_berkas`, `biaya_berkas`, `kode_pembayaran`) VALUES
(1, 'cv_ynf.pdf', 1, '2020-08-15 14:30:54', 'Pengajuan Tanah seluas 2000 M', '1', 1500000, 'Qr_Xcqwy');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(15) NOT NULL,
  `id_berkas` int(15) NOT NULL,
  `nama_pembayaran` varchar(50) NOT NULL,
  `bukti_pembayaran` varchar(150) NOT NULL,
  `nominal_pembayaran` int(50) NOT NULL,
  `tglbayar_pembayaran` date NOT NULL,
  `tgl_pembayaran` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status_pembayaran` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_berkas`, `nama_pembayaran`, `bukti_pembayaran`, `nominal_pembayaran`, `tglbayar_pembayaran`, `tgl_pembayaran`, `status_pembayaran`) VALUES
(1, 1, 'Yuda Fadillah', 'bukti.jpg', 1500000, '2020-08-20', '2020-08-15 14:48:42', '0');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(15) NOT NULL,
  `email_pengaduan` varchar(50) NOT NULL,
  `nohp_pengaduan` int(15) NOT NULL,
  `nama_pengaduan` varchar(50) NOT NULL,
  `pesan_pengaduan` text NOT NULL,
  `balaske_pengaduan` varchar(150) NOT NULL,
  `tgl_pengaduan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `email_pengaduan`, `nohp_pengaduan`, `nama_pengaduan`, `pesan_pengaduan`, `balaske_pengaduan`, `tgl_pengaduan`) VALUES
(1, 'emeralda@gmail.com', 89454545, 'Emeralda', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet', '2020-08-16 08:10:52');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(15) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `nohp_user` varchar(20) NOT NULL,
  `password_user` varchar(150) NOT NULL,
  `foto` varchar(150) NOT NULL,
  `akses_level` varchar(20) NOT NULL,
  `tgl_user` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `email_user`, `nohp_user`, `password_user`, `foto`, `akses_level`, `tgl_user`) VALUES
(1, 'admin', 'admin@gmail.com', '089674555439', '7488e331b8b64e5794da3fa4eb10ad5d', 'faa35a7971000a17de9842c9d6d6e3a4.png', 'admin', '2020-08-15 05:49:11'),
(2, 'Yuda Nur Fadillah', 'yuda.fadillah@students.amikom.ac.id', '089674555439', '8cf270792c08bb8dada4ad907137cbb7', 'b57c3cdc6e1ac58ee5a5d5aac66b68b3.png', 'admin', '2020-08-15 08:46:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`id_berkas`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berkas`
--
ALTER TABLE `berkas`
  MODIFY `id_berkas` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
