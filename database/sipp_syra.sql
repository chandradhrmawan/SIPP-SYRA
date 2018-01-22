-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2018 at 09:44 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

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
  `status_barang` int(11) DEFAULT NULL,
  `id_suplier` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pemesanan`
--

INSERT INTO `detail_pemesanan` (`id_detail`, `id_pemesanan`, `id_barang`, `jumlah_pesan`, `sub_total`, `status_barang`, `id_suplier`) VALUES
(4, 'PN001120118', '4', 2, '6000000', 2, '1'),
(5, 'PN001120118', '6', 2, '30', 2, '1'),
(6, 'PN001120118', '5', 1, '', 2, '1'),
(7, 'PN002120118', '1', 1, '', 0, '1'),
(8, 'PN002120118', '4', 2, '6000000', 2, '1'),
(9, 'PN002120118', '3', 2, '22246', 2, '1'),
(10, 'PN003120118', '10', 5, '200000', 2, '1'),
(11, 'PN004120118', '6', 10, '400000', 2, '1'),
(12, 'PN004120118', '10', 5, '200000', 2, '1'),
(1, 'PN005150118', '10', 5, '200000', 2, '1'),
(1, 'PN006210118', '10', 10, '400000', 2, '1'),
(2, 'PN007220118', '7', 5, '', 2, '1'),
(3, 'PN008220118', '8', 35, '1400000', 2, '1'),
(6, 'PN009220118', '7', 2, '', 2, '1'),
(7, 'PN009220118', '9', 1, '40000', 2, '1'),
(8, 'PN010220118', '6', 2, '80000', 0, '1'),
(9, 'PN010220118', '8', 1, '', 2, '1'),
(10, 'PN010220118', '10', 1, '40000', 0, '1'),
(11, 'PN010220118', '19', 1, '', 0, '1'),
(12, 'PN011220118', '7', 2, '80000', 2, '2'),
(13, 'PN011220118', '10', 1, '40000', 0, '2'),
(14, 'PN011220118', '17', 2, '30000', 0, '2'),
(15, 'PN011220118', '18', 1, '15000', 0, '2'),
(16, 'PN011220118', '20', 1, '60000', 0, '2');

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
  `nama_pelanggan` varchar(255) DEFAULT NULL,
  `alamat_pelanggan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id_detail`, `id_transaksi`, `id_barang`, `jumlah_beli`, `sub_total`, `nama_pelanggan`, `alamat_pelanggan`) VALUES
(2, 'TR002220118', '8', 20, '1600000', 'Pak Rauf', 'Unikom'),
(3, 'TR002220118', '6', 10, '800000', 'Pak Rauf', 'Unikom'),
(4, 'TR003220118', '8', 20, '1600000', 'Pak Rauf', 'Unikom'),
(5, 'TR004220118', '9', 10, '800000', 'Pak Rauf', 'Unikom'),
(6, 'TR005220118', '6', 2, '160000', 'Chand3', 'Jakarta, Jl.lurus No 12'),
(7, 'TR005220118', '10', 2, '160000', 'Chand3', 'Jakarta, Jl.lurus No 12'),
(8, 'TR006220118', '6', 2, '160000', 'Septi', 'Bandung'),
(9, 'TR006220118', '9', 1, '80000', 'Septi', 'Bandung'),
(10, 'TR007220118', '8', 1, '80000', 'Ibu Rika', 'Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `detail_retur`
--

CREATE TABLE IF NOT EXISTS `detail_retur` (
  `id_detail` int(11) NOT NULL,
  `id_pemesanan` varchar(255) DEFAULT NULL,
  `id_retur` varchar(25) NOT NULL,
  `id_barang` varchar(25) NOT NULL,
  `jumlah_retur` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_retur`
--

INSERT INTO `detail_retur` (`id_detail`, `id_pemesanan`, `id_retur`, `id_barang`, `jumlah_retur`, `keterangan`) VALUES
(9, 'PN001120118', 'RT001120118', '4', 2, 'Rusak Parah Ya 1'),
(10, 'PN001120118', 'RT001120118', '5', 1, 'Rusak Parah Ya 3'),
(11, 'PN003120118', 'RT002120118', '10', 5, 'rusak'),
(12, 'PN004120118', 'RT003120118', '10', 3, 'rusak'),
(13, 'PN004120118', 'RT003120118', '6', 5, 'kurang'),
(14, 'PN002120118', 'RT004120118', '3', 2, 'rusak'),
(15, 'PN005150118', 'RT005150118', '10', 2, 'rusak'),
(16, 'PN006210118', 'RT006210118', '10', 10, 'tidak sesuai'),
(17, 'PN007220118', 'RT007220118', '7', 3, 'kurang'),
(18, 'PN008220118', 'RT008220118', '8', 30, 'Rusak Parah Ya'),
(19, 'PN009220118', 'RT009220118', '7', 2, 'Rusak PN009220118 2'),
(20, 'PN009220118', 'RT009220118', '9', 1, 'Rusak PN009220118 1');

-- --------------------------------------------------------

--
-- Table structure for table `m_barang`
--

CREATE TABLE IF NOT EXISTS `m_barang` (
  `id_barang` int(100) NOT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `id_warna` int(11) DEFAULT NULL,
  `stok` varchar(100) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `harga_jual` varchar(100) DEFAULT NULL,
  `harga_beli` varchar(100) DEFAULT NULL,
  `direktori` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_barang`
--

INSERT INTO `m_barang` (`id_barang`, `nama_barang`, `id_kategori`, `id_warna`, `stok`, `keterangan`, `harga_jual`, `harga_beli`, `direktori`) VALUES
(3, 'kerudung rabani', 3, 1, '1245', 'Isi Deskripsi Barang', '2323', '11123', 'P006.jpg'),
(6, 'Alisha Plain Square Maroon', 1, 1, '32', 'Bahan : maxmara silk\r\nukuran :110x110cm', '80000', '40000', '1512642174742.jpg'),
(7, 'Alisha Plain Square Navy', 1, 2, '32', 'Bahan : maxmara silk \r\nukuran :110x110cm', '80000', '40000', '1512642179958.jpg'),
(8, 'Alisha Plain Square Black', 1, 3, '103', 'Bahan : maxmara silk \r\nukuran :110x110cm', '80000', '40000', '1512642169861.jpg'),
(9, 'Alisha Plain Square Salmon', 1, 5, '30', 'Bahan : maxmara silk \r\nukuran :110x110cm', '80000', '40000', '1512642185313.jpg'),
(10, 'Alisha Plain Square Soft Banana', 1, 7, '35', 'Bahan : maxmara silk \r\nukuran :110x110cm', '80000', '40000', '1512642195352.jpg'),
(11, 'Alisha Plain Square light grey', 1, 11, '20', 'Bahan : maxmara silk ukuran :110x110cm', '80000', '40000', '1512642200659.jpg'),
(12, 'Alisha Plain Square Milo', 1, 9, '12', 'Bahan : maxmara silk ukuran :110x110cm', '80000', '40000', '1512642198913.jpg'),
(13, 'Alisha Plain Square Banana', 1, 6, '34', 'Bahan : maxmara silk ukuran :110x110cm', '80000', '40000', 'Banana.jpg'),
(14, 'Alisha Plain Square Lavender', 1, 4, '37', 'Bahan : maxmara silk ukuran :110x110cm', '80000', '70000', 'Lavender.jpg'),
(15, 'Printing Square Ungu', 4, 13, '10', 'Bahan : maxmara silk ukuran :110x110cm', '200000', '110000', '1512642281954.jpg'),
(16, 'Printing Square Putih', 4, 13, '15', 'Bahan : maxmara silk ukuran :110x110cm', '200000', '110000', '1512642298617.jpg'),
(17, 'Bandana Ungu', 7, 14, '40', 'Bandana', '25000', '15000', '1512642300453.jpg'),
(18, 'Bandana Pink', 7, 15, '20', 'Bandana', '25000', '15000', '1512642317233.jpg'),
(19, 'Bandana Coklat', 7, 16, '16', 'Bandana', '25000', '14000', '1512642315697.jpg'),
(20, 'Fur Square Peach', 5, 12, '20', '110x110', '95000', '60000', '1512642262345.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `m_kategori`
--

CREATE TABLE IF NOT EXISTS `m_kategori` (
  `id_kategori` int(12) NOT NULL,
  `nama_kategori` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_kategori`
--

INSERT INTO `m_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Plain Square'),
(4, 'Printing Square'),
(5, 'Fur Square'),
(7, 'Bandana');

-- --------------------------------------------------------

--
-- Table structure for table `m_level`
--

CREATE TABLE IF NOT EXISTS `m_level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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
  `id_suplier` int(255) NOT NULL,
  `nama_suplier` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_suplier`
--

INSERT INTO `m_suplier` (`id_suplier`, `nama_suplier`) VALUES
(1, 'Yesamalika'),
(2, 'Syra B'),
(3, 'Bandung SONY');

-- --------------------------------------------------------

--
-- Table structure for table `m_user`
--

CREATE TABLE IF NOT EXISTS `m_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `id_level` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_user`
--

INSERT INTO `m_user` (`id_user`, `username`, `password`, `nama_lengkap`, `id_level`, `status`) VALUES
(3, 'penjualan', '13bf2c8effae21d17a277520aa9b9277', 'Laili Salsabila', 2, 1),
(5, 'gudang', '202446dd1d6028084426867365b0c7a1', 'Irfan Mediandry', 3, 1),
(7, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Dessy Rarahayu', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_warna`
--

CREATE TABLE IF NOT EXISTS `m_warna` (
  `id_warna` int(25) NOT NULL,
  `nama_warna` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_warna`
--

INSERT INTO `m_warna` (`id_warna`, `nama_warna`) VALUES
(1, 'Maroon'),
(2, 'Navy'),
(3, 'Black'),
(4, 'Lavender'),
(5, 'Salmon'),
(6, 'Banana'),
(7, 'Soft banana'),
(8, 'Beige'),
(9, 'Milo'),
(10, 'Peanut'),
(11, 'Light Grey'),
(12, 'Peach'),
(13, 'Motif'),
(14, 'Ungu'),
(15, 'Pink'),
(16, 'Coklat'),
(17, 'Lime');

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
  `id_suplier` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `tgl_pemesanan`, `id_user`, `total_bayar`, `status`, `id_suplier`) VALUES
('PN001120118', '2018-01-12 17:22:56', '5', '56000030', 1, '1'),
('PN002120118', '2018-01-12 17:25:05', '5', '6522246', 1, '1'),
('PN003120118', '2018-01-12 18:38:18', '5', '200000', 1, '1'),
('PN004120118', '2018-01-12 18:40:18', '5', '600000', 1, '1'),
('PN005150118', '2018-01-15 02:24:32', '5', '200000', 1, '1'),
('PN006210118', '2018-01-21 12:14:33', '7', '400000', 1, '1'),
('PN007220118', '2018-01-22 04:06:34', '5', '200000', 1, '1'),
('PN008220118', '2018-01-22 15:32:23', '7', '1400000', 1, '1'),
('PN009220118', '2018-01-22 20:16:40', '7', '120000', 1, '1'),
('PN010220118', '2018-01-22 20:30:29', '7', '174000', 1, '1'),
('PN011220118', '2018-01-22 20:40:13', '7', '225000', 0, '2');

-- --------------------------------------------------------

--
-- Table structure for table `penerimaan`
--

CREATE TABLE IF NOT EXISTS `penerimaan` (
  `id_penerimaan` varchar(255) NOT NULL,
  `id_pemesanan` varchar(255) DEFAULT NULL,
  `tgl_penerimaan` datetime DEFAULT NULL,
  `id_user` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penerimaan`
--

INSERT INTO `penerimaan` (`id_penerimaan`, `id_pemesanan`, `tgl_penerimaan`, `id_user`, `status`) VALUES
('PM001120118', 'PN001120118', '2018-01-12 17:24:16', '5', '2'),
('PM002120118', 'PN002120118', '2018-01-12 17:25:14', '5', '2'),
('PM003120118', 'PN003120118', '2018-01-12 18:38:43', '5', '2'),
('PM004120118', 'PN004120118', '2018-01-12 18:40:35', '5', '2'),
('PM005150118', 'PN005150118', '2018-01-15 02:24:53', '5', '2'),
('PM006210118', 'PN006210118', '2018-01-21 12:15:26', '5', '2'),
('PM007220118', 'PN007220118', '2018-01-22 04:07:21', '5', '2'),
('PM008220118', 'PN008220118', '2018-01-22 15:32:56', '7', '2'),
('PM009220118', 'PN008220118', '2018-01-22 15:33:28', '7', '2'),
('PM010220118', 'PN008220118', '2018-01-22 15:33:38', '7', '2'),
('PM011220118', 'PN009220118', '2018-01-22 21:02:02', '7', '2'),
('PM012220118', 'PN010220118', '2018-01-22 21:06:36', '7', '1');

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
  `alamat_pelanggan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_transaksi`, `tgl_transaksi`, `id_user`, `total_bayar`, `nama_pelanggan`, `alamat_pelanggan`) VALUES
('TR002220118', '2018-01-22 04:15:20', '3', '2400000', 'Pak Rauf', 'Unikom'),
('TR003220118', '2018-01-22 15:26:20', '7', '1600000', 'Pak Rauf', 'Unikom'),
('TR004220118', '2018-01-22 15:29:58', '7', '800000', 'Pak Rauf', 'Unikom'),
('TR005220118', '2018-01-22 19:41:11', '7', '320000', 'Chand3', 'Jakarta, Jl.lurus No 12'),
('TR006220118', '2018-01-22 19:49:39', '7', '240000', 'Septi', 'Bandung'),
('TR007220118', '2018-01-22 19:55:51', '7', '80000', 'Ibu Rika', 'Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `retur`
--

CREATE TABLE IF NOT EXISTS `retur` (
  `id_retur` varchar(25) NOT NULL,
  `tgl_retur` varchar(25) NOT NULL,
  `id_pemesanan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retur`
--

INSERT INTO `retur` (`id_retur`, `tgl_retur`, `id_pemesanan`) VALUES
('RT001120118', '2018-01-12', 'PN001120118'),
('RT002120118', '2018-01-12', 'PN003120118'),
('RT003120118', '2018-01-12', 'PN004120118'),
('RT004120118', '2018-01-12', 'PN002120118'),
('RT005150118', '2018-01-15', 'PN005150118'),
('RT006210118', '2018-01-21', 'PN006210118'),
('RT007220118', '2018-01-22', 'PN007220118'),
('RT008220118', '2018-01-22', 'PN008220118'),
('RT009220118', '2018-01-22', 'PN009220118');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_detail_pemesanan`
--

CREATE TABLE IF NOT EXISTS `tmp_detail_pemesanan` (
  `id_detail` int(255) NOT NULL,
  `id_pemesanan` varchar(255) DEFAULT NULL,
  `id_barang` varchar(255) DEFAULT NULL,
  `jumlah_pesan` int(11) DEFAULT NULL,
  `sub_total` varchar(255) DEFAULT NULL,
  `status_barang` int(11) DEFAULT NULL,
  `id_suplier` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_detail_penjualan`
--

CREATE TABLE IF NOT EXISTS `tmp_detail_penjualan` (
  `id_detail` int(255) NOT NULL,
  `id_transaksi` varchar(255) DEFAULT NULL,
  `id_barang` varchar(255) DEFAULT NULL,
  `jumlah_beli` int(255) DEFAULT NULL,
  `sub_total` int(255) DEFAULT NULL,
  `nama_pelanggan` varchar(255) DEFAULT NULL,
  `alamat_pelanggan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_detail_retur`
--

CREATE TABLE IF NOT EXISTS `tmp_detail_retur` (
  `id_detail` int(11) NOT NULL,
  `id_retur` varchar(25) NOT NULL,
  `id_barang` varchar(25) NOT NULL,
  `jumlah_retur` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_retur`
--
ALTER TABLE `detail_retur`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `m_barang`
--
ALTER TABLE `m_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `m_kategori`
--
ALTER TABLE `m_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `m_level`
--
ALTER TABLE `m_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `m_suplier`
--
ALTER TABLE `m_suplier`
  ADD PRIMARY KEY (`id_suplier`);

--
-- Indexes for table `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `m_warna`
--
ALTER TABLE `m_warna`
  ADD PRIMARY KEY (`id_warna`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `penerimaan`
--
ALTER TABLE `penerimaan`
  ADD PRIMARY KEY (`id_penerimaan`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `retur`
--
ALTER TABLE `retur`
  ADD PRIMARY KEY (`id_retur`);

--
-- Indexes for table `tmp_detail_pemesanan`
--
ALTER TABLE `tmp_detail_pemesanan`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `tmp_detail_penjualan`
--
ALTER TABLE `tmp_detail_penjualan`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `tmp_detail_retur`
--
ALTER TABLE `tmp_detail_retur`
  ADD PRIMARY KEY (`id_detail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_retur`
--
ALTER TABLE `detail_retur`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `m_barang`
--
ALTER TABLE `m_barang`
  MODIFY `id_barang` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `m_kategori`
--
ALTER TABLE `m_kategori`
  MODIFY `id_kategori` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `m_level`
--
ALTER TABLE `m_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `m_suplier`
--
ALTER TABLE `m_suplier`
  MODIFY `id_suplier` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `m_user`
--
ALTER TABLE `m_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `m_warna`
--
ALTER TABLE `m_warna`
  MODIFY `id_warna` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tmp_detail_pemesanan`
--
ALTER TABLE `tmp_detail_pemesanan`
  MODIFY `id_detail` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tmp_detail_penjualan`
--
ALTER TABLE `tmp_detail_penjualan`
  MODIFY `id_detail` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tmp_detail_retur`
--
ALTER TABLE `tmp_detail_retur`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
