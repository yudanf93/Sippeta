-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2020 at 10:43 AM
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
(1, 'cv_ynf.pdf', 2, '2020-08-19 09:53:35', 'Pengajuan Tanah seluas 2000 M', '1', 1500000, 'Qr_Xcqwy'),
(4, 'f4b050548665fea8a0651bdd389d4da8.pdf', 2, '2020-08-21 05:55:06', 'Tanah yang ada di sana ', '2', 0, '-');

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
(1, 1, 'Yuda Fadillah', 'bukti.jpg', 1500000, '2020-08-20', '2020-08-15 14:48:42', '0'),
(4, 0, 'Alief Fadzli', '231d01c7a0ad88d862eb58904f33154f.jpg', 1500000, '2020-08-22', '2020-08-21 05:59:56', '2');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(15) NOT NULL,
  `email_pengaduan` varchar(50) NOT NULL,
  `nohp_pengaduan` varchar(15) NOT NULL,
  `nama_pengaduan` varchar(50) NOT NULL,
  `pesan_pengaduan` text NOT NULL,
  `balaske_pengaduan` varchar(150) NOT NULL,
  `tgl_pengaduan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `email_pengaduan`, `nohp_pengaduan`, `nama_pengaduan`, `pesan_pengaduan`, `balaske_pengaduan`, `tgl_pengaduan`) VALUES
(3, 'Yuda@gmail.com', '2147483647', 'Fadilah Nur', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '', '2020-08-19 14:41:16'),
(4, 'Yuda@gmail.com', '2147483647', 'Fadilah Nur', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n          ?>', '', '2020-08-19 14:42:33');

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
(2, 'Yuda Nur Fadillah', 'yuda.fadillah@students.amikom.ac.id', '089674555439', 'ba2bee8d4143c15a5fcfd9922ee71e7f', 'b57c3cdc6e1ac58ee5a5d5aac66b68b3.png', 'user', '2020-08-19 07:19:38'),
(5, 'Alief Fadzli', 'yudafadilah04@gmail.com', '08674555439', '25f9e794323b453885f5181f1b624d0b', 'profil.png', 'user', '2020-08-21 04:26:17');

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
  MODIFY `id_berkas` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
