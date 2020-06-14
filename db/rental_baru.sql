-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2018 at 02:02 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_baru`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(15) NOT NULL,
  `nama_akun` varchar(55) NOT NULL,
  `email_akun` varchar(55) NOT NULL,
  `password_akun` varchar(55) NOT NULL,
  `level_akun` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `nama_akun`, `email_akun`, `password_akun`, `level_akun`) VALUES
(1, 'admin', 'admin', 'admin', 'admin'),
(6, 'Iskandar', 'iskandar@gmail.com', 'iskandar', 'karyawan'),
(7, 'Karyawan', 'karyawan@gmail.com', 'karyawan', 'karyawan');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subjek` varchar(100) NOT NULL,
  `pesan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id_contact`, `nama`, `email`, `subjek`, `pesan`) VALUES
(1, 'siti', 'siti@gmail.com', 'ask', 'r');

-- --------------------------------------------------------

--
-- Table structure for table `konsumen`
--

CREATE TABLE `konsumen` (
  `id_konsumen` int(15) NOT NULL,
  `nama_konsumen` varchar(55) NOT NULL,
  `email_konsumen` varchar(55) NOT NULL,
  `password_konsumen` varchar(100) NOT NULL,
  `alamat_konsumen` varchar(125) NOT NULL,
  `telepon_konsumen` int(13) NOT NULL,
  `noktp_konsumen` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konsumen`
--

INSERT INTO `konsumen` (`id_konsumen`, `nama_konsumen`, `email_konsumen`, `password_konsumen`, `alamat_konsumen`, `telepon_konsumen`, `noktp_konsumen`) VALUES
(5, 'Siti', 'siti@gmail.com', '$2y$10$OmtNyUu6aO0/filKOnNNoORKv0NihRN4g34cHSxhwPIPnTPpzC/TG', 'Bandung', 1092308, 19823),
(6, 'Ndar', 'ndar@gmail.com', '$2y$10$qJNXwO6JGTf.pZU2Glt8uuX5qVJXcf/6Ne8p6kdf9uRfZ6H1JxFDe', 'bandung', 123123123, 2147483647),
(7, 'Syem', 'syem@gmail.com', '$2y$10$7VXy/LOHgiCbg2ydl9Idh.0lzgVqTW7bnWb2sNYdlDLbY1SWvLucS', 'Madura', 2147483647, 123230127);

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `plat_mobil` varchar(10) NOT NULL,
  `merk_mobil` varchar(55) NOT NULL,
  `gambar_mobil` varchar(55) NOT NULL,
  `harga_sewa` int(16) NOT NULL,
  `tahun_pajak` int(4) NOT NULL,
  `bahan_bakar` varchar(20) NOT NULL,
  `fasilitas` varchar(100) NOT NULL,
  `status_mobil` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`plat_mobil`, `merk_mobil`, `gambar_mobil`, `harga_sewa`, `tahun_pajak`, `bahan_bakar`, `fasilitas`, `status_mobil`) VALUES
('B 444 PP', 'Kijang Innova', 'kijang.jpg', 1500000, 2015, 'Bensin', 'bagus banget', 'ada'),
('B 471 M', 'Toyota Avanza', 'Toyota Avanza.jpg', 1000000, 2019, 'Bensin', 'AC,9 Orang Penumpang', 'kosong'),
('B 903 ID', 'Mobilio', 'mobilio.png', 1600000, 2020, 'Solar', 'Ruang Tamu', 'kosong'),
('BB 1 EE', 'Pajero Sport', 'pajero.jpg', 2400000, 2021, 'Solar', 'Toilet', 'ada'),
('F 678 PP', 'Ayla', 'ayla.jpg', 1400000, 2019, 'Bensin', 'Kamar mandi', 'ada'),
('F 888 IO', 'Jeep', 'jeep.jpg', 3200000, 2018, 'solar', 'Tempat Bermain', 'ada');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(15) NOT NULL,
  `kode_faktur` varchar(30) NOT NULL,
  `plat_mobil` varchar(55) NOT NULL,
  `id_konsumen` int(15) NOT NULL,
  `cek_in` datetime NOT NULL,
  `cek_out` datetime DEFAULT NULL,
  `lama_pakai` int(8) NOT NULL,
  `keterlambatan` int(8) DEFAULT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `total_biaya` int(20) NOT NULL,
  `biaya_denda` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `kode_faktur`, `plat_mobil`, `id_konsumen`, `cek_in`, `cek_out`, `lama_pakai`, `keterlambatan`, `tanggal_transaksi`, `total_biaya`, `biaya_denda`) VALUES
(26, 'SEMXARI8', 'B 471 M', 5, '2018-07-17 00:00:00', '2018-07-18 00:00:00', 1, 0, '2018-07-17 00:00:00', 1000000, 0),
(27, 'SEM8CQ0U', 'B 471 M', 5, '2018-07-26 00:00:00', '2018-07-27 00:00:00', 1, 0, '2018-07-17 00:00:00', 1000000, 0),
(28, 'SEMV8YYP', 'B 444 PP', 5, '2018-07-18 00:00:00', '2018-07-19 00:00:00', 2, 0, '2018-07-17 00:00:00', 3000000, 0),
(29, 'SEMA9X2J', 'B 903 ID', 5, '2018-07-15 00:00:00', '2018-07-16 00:00:00', 1, 0, '2018-07-17 00:00:00', 1600000, 0),
(32, 'SEM82ITS', 'B 903 ID', 5, '2018-07-19 09:00:00', '2018-07-21 17:04:15', 1, 2, '2018-07-19 19:37:15', 1600000, 3200000),
(33, 'SEMOBANF', 'B 444 PP', 5, '2018-07-21 11:12:00', '2018-07-21 17:13:20', 1, 1, '2018-07-19 19:39:16', 1500000, 1500000),
(34, 'SEM0OA3U', 'B 471 M', 5, '2018-07-25 09:00:00', NULL, 1, NULL, '2018-07-21 11:22:51', 1000000, NULL),
(35, 'SEMCHY78', 'B 903 ID', 7, '2018-07-22 09:00:00', NULL, 1, NULL, '2018-07-21 17:24:32', 1600000, NULL),
(36, 'SEM0UOQS', 'B 444 PP', 7, '2018-07-20 09:00:00', NULL, 1, NULL, '2018-07-21 17:39:21', 1500000, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Indexes for table `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`id_konsumen`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`plat_mobil`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_konsumen` (`id_konsumen`),
  ADD KEY `plat_mobil` (`plat_mobil`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `konsumen`
--
ALTER TABLE `konsumen`
  MODIFY `id_konsumen` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_konsumen`) REFERENCES `konsumen` (`id_konsumen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`plat_mobil`) REFERENCES `mobil` (`plat_mobil`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
