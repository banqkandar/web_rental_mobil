--
-- Database : rental_baru
--
-- --------------------------------------------------
-- ---------------------------------------------------
SET AUTOCOMMIT = 0 ;
SET FOREIGN_KEY_CHECKS=0 ;
--
-- Tabel structure for table `akun`
--
DROP TABLE  IF EXISTS `akun`;
CREATE TABLE `akun` (
  `id_akun` int(15) NOT NULL AUTO_INCREMENT,
  `nama_akun` varchar(55) NOT NULL,
  `email_akun` varchar(55) NOT NULL,
  `password_akun` varchar(55) NOT NULL,
  `level_akun` varchar(55) NOT NULL,
  PRIMARY KEY (`id_akun`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO `akun`  VALUES ( "1","admin","admin","admin","admin");
INSERT INTO `akun`  VALUES ( "6","Iskandar","iskandar@gmail.com","iskandar","karyawan");
INSERT INTO `akun`  VALUES ( "7","Karyawan","karyawan@gmail.com","karyawan","karyawan");


--
-- Tabel structure for table `contact`
--
DROP TABLE  IF EXISTS `contact`;
CREATE TABLE `contact` (
  `id_contact` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subjek` varchar(100) NOT NULL,
  `pesan` varchar(255) NOT NULL,
  PRIMARY KEY (`id_contact`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `contact`  VALUES ( "1","siti","siti@gmail.com","ask","r");


--
-- Tabel structure for table `konsumen`
--
DROP TABLE  IF EXISTS `konsumen`;
CREATE TABLE `konsumen` (
  `id_konsumen` int(15) NOT NULL AUTO_INCREMENT,
  `nama_konsumen` varchar(55) NOT NULL,
  `email_konsumen` varchar(55) NOT NULL,
  `password_konsumen` varchar(100) NOT NULL,
  `alamat_konsumen` varchar(125) NOT NULL,
  `telepon_konsumen` int(13) NOT NULL,
  `noktp_konsumen` int(20) NOT NULL,
  PRIMARY KEY (`id_konsumen`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO `konsumen`  VALUES ( "5","Siti","siti@gmail.com","$2y$10$OmtNyUu6aO0/filKOnNNoORKv0NihRN4g34cHSxhwPIPnTPpzC/TG","Bandung","1092308","19823");
INSERT INTO `konsumen`  VALUES ( "6","Ndar","ndar@gmail.com","$2y$10$qJNXwO6JGTf.pZU2Glt8uuX5qVJXcf/6Ne8p6kdf9uRfZ6H1JxFDe","bandung","123123123","2147483647");
INSERT INTO `konsumen`  VALUES ( "7","Syem","syem@gmail.com","$2y$10$7VXy/LOHgiCbg2ydl9Idh.0lzgVqTW7bnWb2sNYdlDLbY1SWvLucS","Madura","2147483647","123230127");
INSERT INTO `konsumen`  VALUES ( "8","Ilham","ilham@gmail.com","$2y$10$nTQ9ODXW8a9BYhKpDmZNV.JdhRxqAAhcVwrXe8e3VMLoN/ix/U3fi","banjaran","89128399","2147483647");


--
-- Tabel structure for table `mobil`
--
DROP TABLE  IF EXISTS `mobil`;
CREATE TABLE `mobil` (
  `plat_mobil` varchar(10) NOT NULL,
  `merk_mobil` varchar(55) NOT NULL,
  `gambar_mobil` varchar(55) NOT NULL,
  `harga_sewa` int(16) NOT NULL,
  `tahun_pajak` int(4) NOT NULL,
  `bahan_bakar` varchar(20) NOT NULL,
  `fasilitas` varchar(100) NOT NULL,
  `status_mobil` varchar(10) NOT NULL,
  PRIMARY KEY (`plat_mobil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `mobil`  VALUES ( "B 444 PP","Kijang Innova","kijang.jpg","1500000","2015","Bensin","bagus banget","ada");
INSERT INTO `mobil`  VALUES ( "B 471 M","Toyota Avanza","Toyota Avanza.jpg","1000000","2019","Bensin","AC,9 Orang Penumpang","ada");
INSERT INTO `mobil`  VALUES ( "B 903 ID","Mobilio","mobilio.png","1600000","2020","Solar","Ruang Tamu","ada");
INSERT INTO `mobil`  VALUES ( "BB 1 EE","Pajero Sport","pajero.jpg","2400000","2021","Solar","Toilet","ada");
INSERT INTO `mobil`  VALUES ( "F 678 PP","Ayla","ayla.jpg","1400000","2019","Bensin","Kamar mandi","kosong");
INSERT INTO `mobil`  VALUES ( "F 888 IO","Jeep","jeep.jpg","3200000","2018","solar","Tempat Bermain","ada");


--
-- Tabel structure for table `transaksi`
--
DROP TABLE  IF EXISTS `transaksi`;
CREATE TABLE `transaksi` (
  `id_transaksi` int(15) NOT NULL AUTO_INCREMENT,
  `kode_faktur` varchar(30) NOT NULL,
  `plat_mobil` varchar(55) NOT NULL,
  `id_konsumen` int(15) NOT NULL,
  `cek_in` datetime NOT NULL,
  `cek_out` datetime DEFAULT NULL,
  `lama_pakai` int(8) NOT NULL,
  `keterlambatan` int(8) DEFAULT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `total_biaya` int(20) NOT NULL,
  `biaya_denda` int(20) DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`),
  KEY `id_konsumen` (`id_konsumen`),
  KEY `plat_mobil` (`plat_mobil`),
  CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_konsumen`) REFERENCES `konsumen` (`id_konsumen`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`plat_mobil`) REFERENCES `mobil` (`plat_mobil`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

INSERT INTO `transaksi`  VALUES ( "26","SEMXARI8","B 471 M","5","2018-07-17 00:00:00","2018-07-18 00:00:00","1","0","2018-07-17 00:00:00","1000000","0");
INSERT INTO `transaksi`  VALUES ( "27","SEM8CQ0U","B 471 M","5","2018-07-26 00:00:00","2018-07-27 00:00:00","1","0","2018-07-17 00:00:00","1000000","0");
INSERT INTO `transaksi`  VALUES ( "28","SEMV8YYP","B 444 PP","5","2018-07-18 00:00:00","2018-07-19 00:00:00","2","0","2018-07-17 00:00:00","3000000","0");
INSERT INTO `transaksi`  VALUES ( "29","SEMA9X2J","B 903 ID","5","2018-07-15 00:00:00","2018-07-16 00:00:00","1","0","2018-07-17 00:00:00","1600000","0");
INSERT INTO `transaksi`  VALUES ( "32","SEM82ITS","B 903 ID","5","2018-07-19 09:00:00","2018-07-21 17:04:15","1","2","2018-07-19 19:37:15","1600000","3200000");
INSERT INTO `transaksi`  VALUES ( "33","SEMOBANF","B 444 PP","5","2018-07-21 11:12:00","2018-07-21 17:13:20","1","1","2018-07-19 19:39:16","1500000","1500000");
INSERT INTO `transaksi`  VALUES ( "34","SEM0OA3U","B 471 M","5","2018-07-25 09:00:00","0000-00-00 00:00:00","1","0","2018-07-21 11:22:51","1000000","0");
INSERT INTO `transaksi`  VALUES ( "35","SEMCHY78","B 903 ID","7","2018-07-22 09:00:00","0000-00-00 00:00:00","1","0","2018-07-21 17:24:32","1600000","0");
INSERT INTO `transaksi`  VALUES ( "36","SEM0UOQS","B 444 PP","7","2018-07-20 09:00:00","0000-00-00 00:00:00","1","0","2018-07-21 17:39:21","1500000","0");
INSERT INTO `transaksi`  VALUES ( "37","SEM348O3","F 678 PP","5","2018-09-11 09:00:00","0000-00-00 00:00:00","1","0","2018-07-28 18:31:39","1400000","0");


SET FOREIGN_KEY_CHECKS = 1 ; 
COMMIT ; 
SET AUTOCOMMIT = 1 ; 
