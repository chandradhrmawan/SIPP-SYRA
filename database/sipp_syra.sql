-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 11 Jan 2018 pada 20.15
-- Versi Server: 5.6.24
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
-- Struktur dari tabel `detail_pemesanan`
--

CREATE TABLE IF NOT EXISTS `detail_pemesanan` (
  `id_detail` int(255) DEFAULT NULL,
  `id_pemesanan` varchar(255) DEFAULT NULL,
  `id_barang` varchar(255) DEFAULT NULL,
  `jumlah_pesan` int(11) DEFAULT NULL,
  `sub_total` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pemesanan`
--

INSERT INTO `detail_pemesanan` (`id_detail`, `id_pemesanan`, `id_barang`, `jumlah_pesan`, `sub_total`) VALUES
(5, 'PN001251117', '1', 2, '1000000'),
(6, 'PN001251117', '3', 5, '55615'),
(7, 'PN002251117', '2', 2, '200000'),
(8, 'PN002251117', '3', 4, '44492'),
(9, 'PN002251117', '1', 10, '5000000'),
(1, 'PN003031217', '4', 1, '3000000'),
(1, 'PN004110118', '2', 2, '200000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan`
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
-- Dumping data untuk tabel `detail_penjualan`
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
-- Struktur dari tabel `detail_retur`
--

CREATE TABLE IF NOT EXISTS `detail_retur` (
  `id_detail` int(11) NOT NULL,
  `id_retur` varchar(25) NOT NULL,
  `id_barang` varchar(25) NOT NULL,
  `jumlah_retur` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_retur`
--

INSERT INTO `detail_retur` (`id_detail`, `id_retur`, `id_barang`, `jumlah_retur`, `keterangan`) VALUES
(1, 'RT007160717', 'OB001', 90, 'Obat Rusak'),
(2, 'RT007160717', 'OB002', 50, 'Obat Rusak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_barang`
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
  `direktori` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_barang`
--

INSERT INTO `m_barang` (`id_barang`, `nama_barang`, `id_kategori`, `id_warna`, `stok`, `keterangan`, `harga_jual`, `harga_beli`, `direktori`) VALUES
('1', 'Hijab Syari', 1, 5, '10', 'Kerudung Syari', '100000', '500000', '-'),
('2', 'kerudung As', 1, 4, '124', 'Isi Deskripsi Barang', '50000', '100000', 'B00002.jpg'),
('3', 'kerudung rabani', 3, 1, '1245', 'Isi Deskripsi Barang', '2323', '11123', 'P006.jpg'),
('4', 'Kerudung Segiempat', 1, 1, '148', 'Isi Deskripsi Barang', '1500000', '3000000', 'P007.jpg'),
('5', 'kerudung panjang', 1, 1, '1', 'Isi Deskripsi Barang', '1', '2', 'B00008.jpg'),
('6', 'pasmina', 1, 1, '12', 'Isi Deskripsi Barang', '12', '15', 'user8-128x128.jpg'),
('8', 'dawdawd', 1, 1, '1212', 'Isi Deskripsi Barang', '3232', '3232', '69.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_kategori`
--

CREATE TABLE IF NOT EXISTS `m_kategori` (
  `id_kategori` int(12) NOT NULL,
  `nama_kategori` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_kategori`
--

INSERT INTO `m_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Segi Empat'),
(2, 'Pasmina'),
(3, 'Kerudung Langsung'),
(4, 'Syaari');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_level`
--

CREATE TABLE IF NOT EXISTS `m_level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_level`
--

INSERT INTO `m_level` (`id_level`, `nama_level`) VALUES
(1, 'Administrator'),
(2, 'Petugas Penjualan'),
(3, 'Gudang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_suplier`
--

CREATE TABLE IF NOT EXISTS `m_suplier` (
  `id_suplier` int(255) NOT NULL,
  `nama_suplier` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_suplier`
--

INSERT INTO `m_suplier` (`id_suplier`, `nama_suplier`) VALUES
(1, 'Syra A'),
(2, 'Syra B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_user`
--

CREATE TABLE IF NOT EXISTS `m_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `id_level` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_user`
--

INSERT INTO `m_user` (`id_user`, `username`, `password`, `nama_lengkap`, `id_level`, `status`) VALUES
(3, 'penjualan', '13bf2c8effae21d17a277520aa9b9277', 'Borsak Sihombing', 2, 1),
(5, 'gudang', '202446dd1d6028084426867365b0c7a1', 'Dede Wahidin', 3, 1),
(8, 'coba', 'c3ec0f7b054e729c5a716c8125839829', 'Admin 1', 1, 1),
(9, 'admin', '0c3cc2b229a290c98e6b161a607f48d3', 'admin', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_warna`
--

CREATE TABLE IF NOT EXISTS `m_warna` (
  `id_warna` int(25) NOT NULL,
  `nama_warna` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_warna`
--

INSERT INTO `m_warna` (`id_warna`, `nama_warna`) VALUES
(1, 'Merah'),
(2, 'Biru'),
(3, 'Hijau'),
(4, 'Kuning'),
(5, 'Abu - Abu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE IF NOT EXISTS `pemesanan` (
  `id_pemesanan` varchar(255) NOT NULL,
  `tgl_pemesanan` datetime DEFAULT NULL,
  `id_user` varchar(255) DEFAULT NULL,
  `total_bayar` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `tgl_pemesanan`, `id_user`, `total_bayar`, `status`) VALUES
('PN001251117', '2017-11-25 20:46:20', '7', '1055615', 1),
('PN002251117', '2017-11-25 21:11:42', '7', '5244492', 1),
('PN003031217', '2017-12-03 06:35:17', '7', '3000000', 1),
('PN004110118', '2018-01-11 18:33:38', '5', '200000', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerimaan`
--

CREATE TABLE IF NOT EXISTS `penerimaan` (
  `id_penerimaan` varchar(255) NOT NULL,
  `id_pemesanan` varchar(255) DEFAULT NULL,
  `tgl_penerimaan` datetime DEFAULT NULL,
  `id_user` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penerimaan`
--

INSERT INTO `penerimaan` (`id_penerimaan`, `id_pemesanan`, `tgl_penerimaan`, `id_user`) VALUES
('PM001251117', 'PN001251117', '2017-11-25 22:51:14', '7'),
('PM002261117', 'PN002251117', '2017-11-26 08:15:01', '7'),
('PM003031217', 'PN003031217', '2017-12-03 06:35:50', '7'),
('PM004110118', 'PN004110118', '2018-01-11 18:36:24', '5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE IF NOT EXISTS `penjualan` (
  `id_transaksi` varchar(255) NOT NULL,
  `tgl_transaksi` datetime DEFAULT NULL,
  `id_user` varchar(255) DEFAULT NULL,
  `total_bayar` varchar(255) DEFAULT NULL,
  `nama_pelanggan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan`
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
-- Struktur dari tabel `retur`
--

CREATE TABLE IF NOT EXISTS `retur` (
  `id_retur` varchar(25) NOT NULL,
  `tgl_retur` varchar(25) NOT NULL,
  `id_penerimaan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `retur`
--

INSERT INTO `retur` (`id_retur`, `tgl_retur`, `id_penerimaan`) VALUES
('RT001', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_detail_pemesanan`
--

CREATE TABLE IF NOT EXISTS `tmp_detail_pemesanan` (
  `id_detail` int(255) NOT NULL,
  `id_pemesanan` varchar(255) DEFAULT NULL,
  `id_barang` varchar(255) DEFAULT NULL,
  `jumlah_pesan` int(11) DEFAULT NULL,
  `sub_total` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_detail_penjualan`
--

CREATE TABLE IF NOT EXISTS `tmp_detail_penjualan` (
  `id_detail` int(255) NOT NULL,
  `id_transaksi` varchar(255) DEFAULT NULL,
  `id_barang` varchar(255) DEFAULT NULL,
  `jumlah_beli` int(255) DEFAULT NULL,
  `sub_total` int(255) DEFAULT NULL,
  `nama_pelanggan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_detail_retur`
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
-- AUTO_INCREMENT for table `m_kategori`
--
ALTER TABLE `m_kategori`
  MODIFY `id_kategori` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `m_level`
--
ALTER TABLE `m_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `m_suplier`
--
ALTER TABLE `m_suplier`
  MODIFY `id_suplier` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `m_user`
--
ALTER TABLE `m_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `m_warna`
--
ALTER TABLE `m_warna`
  MODIFY `id_warna` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tmp_detail_pemesanan`
--
ALTER TABLE `tmp_detail_pemesanan`
  MODIFY `id_detail` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tmp_detail_penjualan`
--
ALTER TABLE `tmp_detail_penjualan`
  MODIFY `id_detail` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tmp_detail_retur`
--
ALTER TABLE `tmp_detail_retur`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
