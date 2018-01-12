-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2018 at 05:55 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sipp_syra`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemesanan`
--

CREATE TABLE IF NOT EXISTS `detail_pemesanan` (
  `id_detail` int(255) DEFAULT NULL,
  `id_pemesanan` varchar(255) DEFAULT NULL,
  `id_barang` varchar(255) DEFAULT NULL,
  `jumlah_pesan` int(11) DEFAULT NULL,
  `sub_total` varchar(255) DEFAULT NULL,
  `status_barang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pemesanan`
--

INSERT INTO `detail_pemesanan` (`id_detail`, `id_pemesanan`, `id_barang`, `jumlah_pesan`, `sub_total`, `status_barang`) VALUES
(5, 'PN001251117', '1', 2, '1000000', NULL),
(6, 'PN001251117', '3', 5, '55615', NULL),
(7, 'PN002251117', '2', 2, '200000', NULL),
(8, 'PN002251117', '3', 4, '44492', NULL),
(9, 'PN002251117', '1', 10, '5000000', NULL),
(1, 'PN003031217', '4', 1, '3000000', NULL),
(1, 'PN004110118', '2', 2, '200000', NULL),
(2, 'PN005120118', '4', 2, '6000000', NULL),
(3, 'PN005120118', '6', 2, '30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE IF NOT EXISTS `detail_penjualan` (
  `id_detail` int(255) DEFAULT NULL,
  `id_transaksi` varchar(255) DEFAULT NULL,
  `id_barang` varchar(255) DEFAULT NULL,
  `jumlah_beli` int(11) DEFAULT NULL,
  `sub_total` varchar(255) DEFAULT NULL,
  `nama_pelanggan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id_detail`, `id_transaksi`, `id_barang`, `jumlah_beli`, `sub_total`, `nama_pelanggan`) VALUES
(4, 'TR002251117', '1', 1, '100000', NULL),
(6, 'TR002251117', '2', 3, '150000', NULL),
(7, 'TR002251117', '2', 2, '100000', NULL),
(8, 'TR003251117', '1', 2, '200000', NULL),
(9, 'TR003251117', '2', 1, '50000', NULL),
(10, 'TR004251117', '2', 2, '100000', NULL),
(11, 'TR004251117', '2', 2, '100000', NULL),
(14, 'TR005251117', '2', 2, '100000', NULL),
(1, 'TR006271117', '2', 10, '500000', NULL),
(2, 'TR008031217', '1', 2, '200000', NULL),
(3, 'TR009031217', '2', 2, '100000', NULL),
(4, 'TR009031217', '4', 3, '4500000', NULL),
(5, 'TR009031217', '3', 1, '2323', NULL),
(6, 'TR010031217', '1', 5, '500000', 'Hendra'),
(8, 'TR010031217', '2', 3, '150000', 'Hendra'),
(12, 'TR011031217', '1', 3, '300000', 'Astri'),
(13, 'TR011031217', '3', 1, '2323', 'Astri'),
(14, 'TR011031217', '2', 1, '50000', 'Astri'),
(15, 'TR012031217', '2', 2, '100000', 'Bagus'),
(16, 'TR013031217', '2', 2, '100000', 'Arum'),
(1, 'TR014110118', '2', 2, '100000', 'aa');

-- --------------------------------------------------------

--
-- Table structure for table `detail_retur`
--

CREATE TABLE IF NOT EXISTS `detail_retur` (
  `id_detail` int(11) NOT NULL,
  `id_retur` varchar(25) NOT NULL,
  `id_barang` varchar(25) NOT NULL,
  `jumlah_retur` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_retur`
--

INSERT INTO `detail_retur` (`id_detail`, `id_retur`, `id_barang`, `jumlah_retur`, `keterangan`) VALUES
(1, 'RT007160717', 'OB001', 90, 'Obat Rusak'),
(2, 'RT007160717', 'OB002', 50, 'Obat Rusak');

-- --------------------------------------------------------

--
-- Table structure for table `m_barang`
--

CREATE TABLE IF NOT EXISTS `m_barang` (
  `id_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `id_warna` int(11) DEFAULT NULL,
  `stok` varchar(100) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `harga_jual` varchar(100) DEFAULT NULL,
  `harga_beli` varchar(100) DEFAULT NULL,
  `direktori` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_barang`
--

INSERT INTO `m_barang` (`id_barang`, `nama_barang`, `id_kategori`, `id_warna`, `stok`, `keterangan`, `harga_jual`, `harga_beli`, `direktori`) VALUES
('1', 'Hijab Syari', 1, 5, '10', 'Kerudung Syari', '100000', '500000', '-'),
('2', 'kerudung As', 1, 4, '126', 'Isi Deskripsi Barang', '50000', '100000', 'B00002.jpg'),
('3', 'kerudung rabani', 3, 1, '1245', 'Isi Deskripsi Barang', '2323', '11123', 'P006.jpg'),
('4', 'Kerudung Segiempat', 1, 1, '150', 'Isi Deskripsi Barang', '1500000', '3000000', 'P007.jpg'),
('5', 'kerudung panjang', 1, 1, '1', 'Isi Deskripsi Barang', '1', '2', 'B00008.jpg'),
('6', 'pasmina', 1, 1, '14', 'Isi Deskripsi Barang', '12', '15', 'user8-128x128.jpg'),
('8', 'dawdawd', 1, 1, '1212', 'Isi Deskripsi Barang', '3232', '3232', '69.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `m_kategori`
--

CREATE TABLE IF NOT EXISTS `m_kategori` (
  `id_kategori` int(12) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `m_kategori`
--

INSERT INTO `m_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Segi Empat'),
(2, 'Pasmina'),
(3, 'Kerudung Langsung'),
(4, 'Syaari');

-- --------------------------------------------------------

--
-- Table structure for table `m_level`
--

CREATE TABLE IF NOT EXISTS `m_level` (
  `id_level` int(11) NOT NULL AUTO_INCREMENT,
  `nama_level` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_level`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `m_level`
--

INSERT INTO `m_level` (`id_level`, `nama_level`) VALUES
(1, 'Administrator'),
(2, 'Petugas Penjualan'),
(3, 'Gudang');

-- --------------------------------------------------------

--
-- Table structure for table `m_suplier`
--

CREATE TABLE IF NOT EXISTS `m_suplier` (
  `id_suplier` int(255) NOT NULL AUTO_INCREMENT,
  `nama_suplier` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_suplier`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `m_suplier`
--

INSERT INTO `m_suplier` (`id_suplier`, `nama_suplier`) VALUES
(1, 'Syra A'),
(2, 'Syra B');

-- --------------------------------------------------------

--
-- Table structure for table `m_user`
--

CREATE TABLE IF NOT EXISTS `m_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `id_level` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `m_user`
--

INSERT INTO `m_user` (`id_user`, `username`, `password`, `nama_lengkap`, `id_level`, `status`) VALUES
(3, 'penjualan', '13bf2c8effae21d17a277520aa9b9277', 'Borsak Sihombing', 2, 1),
(5, 'gudang', '202446dd1d6028084426867365b0c7a1', 'Dede Wahidin', 3, 1),
(8, 'coba', 'c3ec0f7b054e729c5a716c8125839829', 'Admin 1', 1, 1),
(9, 'admin', '0c3cc2b229a290c98e6b161a607f48d3', 'admin', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_warna`
--

CREATE TABLE IF NOT EXISTS `m_warna` (
  `id_warna` int(25) NOT NULL AUTO_INCREMENT,
  `nama_warna` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_warna`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `m_warna`
--

INSERT INTO `m_warna` (`id_warna`, `nama_warna`) VALUES
(1, 'Merah'),
(2, 'Biru'),
(3, 'Hijau'),
(4, 'Kuning'),
(5, 'Abu - Abu');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE IF NOT EXISTS `pemesanan` (
  `id_pemesanan` varchar(255) NOT NULL,
  `tgl_pemesanan` datetime DEFAULT NULL,
  `id_user` varchar(255) DEFAULT NULL,
  `total_bayar` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pemesanan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `tgl_pemesanan`, `id_user`, `total_bayar`, `status`) VALUES
('PN001251117', '2017-11-25 20:46:20', '7', '1055615', 1),
('PN002251117', '2017-11-25 21:11:42', '7', '5244492', 1),
('PN003031217', '2017-12-03 06:35:17', '7', '3000000', 1),
('PN004110118', '2018-01-11 18:33:38', '5', '200000', 1),
('PN005120118', '2018-01-12 14:16:47', '5', '6000030', 1);

-- --------------------------------------------------------

--
-- Table structure for table `penerimaan`
--

CREATE TABLE IF NOT EXISTS `penerimaan` (
  `id_penerimaan` varchar(255) NOT NULL,
  `id_pemesanan` varchar(255) DEFAULT NULL,
  `tgl_penerimaan` datetime DEFAULT NULL,
  `id_user` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_penerimaan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penerimaan`
--

INSERT INTO `penerimaan` (`id_penerimaan`, `id_pemesanan`, `tgl_penerimaan`, `id_user`, `status`) VALUES
('PM001251117', 'PN001251117', '2017-11-25 22:51:14', '7', '1'),
('PM002261117', 'PN002251117', '2017-11-26 08:15:01', '7', '1'),
('PM003031217', 'PN003031217', '2017-12-03 06:35:50', '7', '1'),
('PM004110118', 'PN004110118', '2018-01-11 18:36:24', '5', '1'),
('PM005120118', 'PN005120118', '2018-01-12 14:25:09', '5', '2');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE IF NOT EXISTS `penjualan` (
  `id_transaksi` varchar(255) NOT NULL,
  `tgl_transaksi` datetime DEFAULT NULL,
  `id_user` varchar(255) DEFAULT NULL,
  `total_bayar` varchar(255) DEFAULT NULL,
  `nama_pelanggan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_transaksi`, `tgl_transaksi`, `id_user`, `total_bayar`, `nama_pelanggan`) VALUES
('TR001251117', '2017-12-01 22:02:59', '1', '100', NULL),
('TR002251117', '2017-12-01 22:02:59', '1', '350000 ', NULL),
('TR003251117', '2017-11-25 18:08:46', '7', '250000', NULL),
('TR004251117', '2017-11-25 18:12:56', '7', '200000', NULL),
('TR005251117', '2017-11-25 18:39:50', '7', '100000', NULL),
('TR006271117', '2017-11-27 15:55:49', '7', '500000', NULL),
('TR008031217', '2017-12-03 06:45:30', '8', '200000', NULL),
('TR009031217', '2017-12-03 06:47:47', '8', '4602323', NULL),
('TR010031217', '2017-12-03 09:56:47', '7', '650000', 'Hendra'),
('TR011031217', '2017-12-03 10:06:12', '7', '352323', 'Astri'),
('TR012031217', '2017-12-03 10:08:03', '7', '100000', 'Bagus'),
('TR013031217', '2017-12-03 10:15:11', '7', '100000', 'Arum'),
('TR014110118', '2018-01-11 18:30:25', '3', '100000', 'aa');

-- --------------------------------------------------------

--
-- Table structure for table `retur`
--

CREATE TABLE IF NOT EXISTS `retur` (
  `id_retur` varchar(25) NOT NULL,
  `tgl_retur` varchar(25) NOT NULL,
  `id_penerimaan` varchar(25) NOT NULL,
  PRIMARY KEY (`id_retur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retur`
--

INSERT INTO `retur` (`id_retur`, `tgl_retur`, `id_penerimaan`) VALUES
('RT001', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_detail_pemesanan`
--

CREATE TABLE IF NOT EXISTS `tmp_detail_pemesanan` (
  `id_detail` int(255) NOT NULL AUTO_INCREMENT,
  `id_pemesanan` varchar(255) DEFAULT NULL,
  `id_barang` varchar(255) DEFAULT NULL,
  `jumlah_pesan` int(11) DEFAULT NULL,
  `sub_total` varchar(255) DEFAULT NULL,
  `status_barang` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_detail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_detail_penjualan`
--

CREATE TABLE IF NOT EXISTS `tmp_detail_penjualan` (
  `id_detail` int(255) NOT NULL AUTO_INCREMENT,
  `id_transaksi` varchar(255) DEFAULT NULL,
  `id_barang` varchar(255) DEFAULT NULL,
  `jumlah_beli` int(255) DEFAULT NULL,
  `sub_total` int(255) DEFAULT NULL,
  `nama_pelanggan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_detail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_detail_retur`
--

CREATE TABLE IF NOT EXISTS `tmp_detail_retur` (
  `id_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_retur` varchar(25) NOT NULL,
  `id_barang` varchar(25) NOT NULL,
  `jumlah_retur` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_detail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
