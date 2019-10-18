-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 08, 2019 at 04:36 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jwm_tokoonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jenis_berita` varchar(20) NOT NULL,
  `judul_berita` varchar(255) NOT NULL,
  `slug_berita` varchar(255) NOT NULL,
  `keywords` text,
  `status_berita` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `judul_gambar` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `header_transaksi`
--

CREATE TABLE `header_transaksi` (
  `id_header_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `nama_penerima` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `jumlah_transaksi` int(11) NOT NULL,
  `status_bayar` varchar(255) NOT NULL,
  `nomor_resi` varchar(255) DEFAULT NULL,
  `jumlah_bayar` int(11) DEFAULT NULL,
  `rekening_pembayaran` varchar(255) DEFAULT NULL,
  `rekening_pelanggan` varchar(255) DEFAULT NULL,
  `bukti_bayar` varchar(255) DEFAULT NULL,
  `id_rekening` int(11) DEFAULT NULL,
  `tanggal_bayar` varchar(255) DEFAULT NULL,
  `nama_bank` varchar(255) DEFAULT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `header_transaksi`
--

INSERT INTO `header_transaksi` (`id_header_transaksi`, `id_user`, `id_pelanggan`, `nama_penerima`, `email`, `telepon`, `alamat`, `kode_transaksi`, `tanggal_transaksi`, `jumlah_transaksi`, `status_bayar`, `nomor_resi`, `jumlah_bayar`, `rekening_pembayaran`, `rekening_pelanggan`, `bukti_bayar`, `id_rekening`, `tanggal_bayar`, `nama_bank`, `tanggal_post`, `tanggal_update`) VALUES
(1, 0, 2, 'tb fajri', 'tbfajri7@gmail.com', '08123456789', '										BTN ONA									', '03052019JFNMB2QK', '2019-05-03 00:00:00', 102432, 'Barang Sudah Dikirim', '12345555', 102432, '53444433', 'Tb Fajri', '0d27f647-5cb9-4331-af6e-e248a317a07e7.jpeg', 4, '03-05-2019', 'BRI Syariah', '2019-05-03 05:13:39', '2019-05-06 06:38:40'),
(2, 0, 2, 'tb fajri', 'tbfajri7@gmail.com', '08123456789', '										BTN ONA									', '03052019OQH9YIGR', '2019-05-03 00:00:00', 111432, 'Pembayaran Telah diterima admin, Pesanan anda telah dilanjutkan kepada Penjual', '', 111432, '5987654321', 'Tb Fajri', '12194635_978981595500796_6682185876263690333_o2.jpg', 4, '03-05-2019', 'BRI Syariah', '2019-05-03 08:44:06', '2019-05-06 09:51:16'),
(3, 0, 2, 'tb fajri', 'tbfajri7@gmail.com', '08123456789', '										BTN ONA									', '06052019HASL5BPO', '2019-05-06 00:00:00', 93432, 'Belum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 08:34:54', '2019-05-06 06:34:54'),
(4, 0, 2, 'tb fajri', 'tbfajri7@gmail.com', '08123456789', '										BTN ONA									', '06052019T4VT1RB6', '2019-05-06 00:00:00', 122432, 'Barang Sedang Dikemas', '1234567', 122432, '53444433', 'test', '12194635_978981595500796_6682185876263690333_o3.jpg', 4, '06-05-2019', 'BCA', '2019-05-06 09:03:43', '2019-05-06 07:56:51'),
(5, 0, 2, 'tb fajri', 'tbfajri7@gmail.com', '08123456789', '										BTN ONA									', '06052019FATQEQ98', '2019-05-06 00:00:00', 102432, 'Pembayaran Telah diterima admin, Pesanan anda telah dilanjutkan kepada Penjual', '', 102432, '5987654321', 'Tb Fajri', '0d27f647-5cb9-4331-af6e-e248a317a07e8.jpeg', 4, '06-05-2019', 'BRI Syariah', '2019-05-06 12:10:17', '2019-05-06 10:10:49');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `slug_kategori` varchar(255) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `gambar` text NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `slug_kategori`, `nama_kategori`, `gambar`, `urutan`, `tanggal_update`) VALUES
(4, 'kue-tradisional-1', 'Kue Tradisional', 'wall-wallpaper-concrete-colored-painted-textured-concept_53876-31799.jpg', 1, '2019-04-27 08:29:57'),
(5, 'snack-asin-2', 'Snack Asin', 'light-blue-grunge-texture-with-space-text-design_24972-243.jpg', 2, '2019-04-27 08:29:03'),
(6, 'pie-3', 'Pie', 'urban-background-with-business-people-books_1262-18983.jpg', 3, '2019-04-27 08:27:14'),
(7, 'source-code-tutorial-web-desain-5', 'Source Code Tutorial web desain', '625969773874e57.jpg', 5, '2019-04-27 07:50:19');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `namaweb` varchar(255) NOT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `keywords` text,
  `metatext` text,
  `telepon` varchar(50) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `logo` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `rekening_pembayaran` varchar(255) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `namaweb`, `tagline`, `email`, `website`, `keywords`, `metatext`, `telepon`, `alamat`, `facebook`, `instagram`, `deskripsi`, `logo`, `icon`, `rekening_pembayaran`, `tanggal_update`) VALUES
(1, 'Plaza Lebak', 'Pusat Promosi dan Penjualan Produk IKM', 'Plazalebak@gmail.com', 'https://plazalebak.com', '            Plaza-lebak        ', '            Plaza-lebak        ', '08123456789', '            Jl. Soekarno Hatta, Kaduagung Tengah, Cibadak, Kabupaten Lebak, Banten 42317        ', 'https://facebook.com/plaza', 'https://instagram.com/plaza', '            Pusat Promosi dan Penjualan Produk IKM                     ', 'plaza2.png', 'plaza3.png', '            123457767                 ', '2019-04-02 07:07:25');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `id_penjual` varchar(255) NOT NULL,
  `status_pelanggan` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `tanggal_daftar` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `id_penjual`, `status_pelanggan`, `nama_pelanggan`, `email`, `password`, `telepon`, `alamat`, `tanggal_daftar`, `tanggal_update`) VALUES
(1, '1', 'Pending', 'Yayan', 'yayan@ymail.com', '88ad5e6ae627867e5453f3be63e522e0bee5506f', '08123456789', 'BTN ONA', '2019-04-02 09:14:19', '2019-04-05 13:42:20'),
(2, '2', 'Pending', 'tb fajri', 'tbfajri7@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '08123456789', 'BTN ONA', '2019-04-02 09:16:09', '2019-04-05 13:42:33'),
(4, '3', 'Pending', 'tb', 'tb@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '08123456789', 'serang', '2019-04-05 16:08:11', '2019-04-05 14:08:11'),
(5, '12', 'Pending', 'Tessed', 'tes@tes.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '08123456789', 'Cekk', '2019-04-10 05:35:26', '2019-04-10 03:35:26'),
(6, '5', 'Pending', 'Bagas', 'bagas31@gmail.com', 'cd19030730b5774fc3bd4c5bc9a956b34702d6f3', '08123456789', 'Pasir Sukarayat', '2019-04-23 08:39:01', '2019-04-23 06:39:01'),
(7, 'fajri03', 'Pending', 'fajri', 'fajri@gmail.com', 'ef5739c4c3f1e47076fec10a7a9ec32aa8de1e63', '08123456789', 'btn ona rangkasbitung', '2019-04-25 10:08:53', '2019-04-25 08:08:53');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_pelanggan` varchar(255) DEFAULT NULL,
  `id_penjual` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_toko` varchar(255) NOT NULL,
  `kode_produk` varchar(20) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `slug_produk` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `keywords` text,
  `harga` int(11) NOT NULL,
  `stok` int(11) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `berat` float DEFAULT NULL,
  `ukuran` varchar(255) DEFAULT NULL,
  `status_produk` varchar(20) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_user`, `id_pelanggan`, `id_penjual`, `id_kategori`, `nama_toko`, `kode_produk`, `nama_produk`, `slug_produk`, `keterangan`, `keywords`, `harga`, `stok`, `gambar`, `berat`, `ukuran`, `status_produk`, `tanggal_post`, `tanggal_update`) VALUES
(1, 3, NULL, 0, 5, '', 'BGL01', 'Bolu Gula Merah', 'bolu-gula-merah-bgl01', '<p>Gula enak sekali</p>\r\n', 'gula', 9000, 5, '061.jpg', 100, '10x10', 'Publish', '2019-04-25 10:02:16', '2019-04-25 08:02:16'),
(2, 3, NULL, 0, 4, '', 'KK01', 'Kue Kering', 'kue-kering-kk01', '<p>Kue Enak Sekali</p>\r\n', 'Kue', 10000, 5, '082.jpg', 100, '10x10', 'Publish', '2019-04-25 10:03:32', '2019-04-25 08:03:32'),
(3, 3, NULL, 0, 6, '', 'Bk01', 'Bolu Kukus', 'bolu-kukus-bk01', '<p>Bolu</p>\r\n', 'Boluu', 12000, 6, '027.png', 300, '10x10', 'Publish', '2019-04-25 10:04:47', '2019-04-25 08:04:47'),
(4, 3, NULL, 0, 6, '', 'KE01', 'Kue Enak', 'kue-enak-ke01', '<p>Kue Lezat home madw</p>\r\n', 'Kue enak', 20000, 5, '056.jpg', 100, '10x10', 'Publish', '2019-04-25 10:07:55', '2019-04-25 08:07:55'),
(5, 3, '2', 2, 5, 'tb fajri', 'Bk001', 'Buku', 'buku-bk001', '<p>tes</p>\r\n', '            tes        ', 9000, 5, '057.jpg', 100, '10x10', 'Publish', '2019-04-25 10:40:56', '2019-04-25 08:41:10'),
(6, 3, '6', 5, 5, 'Bagas', 'BA01', 'Buku anak', 'buku-anak-ba01', '<p>cek</p>\r\n', '            cek        ', 9000, 6, '085.jpg', 100, '10x10', 'Publish', '2019-04-25 10:42:34', '2019-04-25 08:42:43'),
(7, 3, NULL, 0, 7, '', 'WE22', 'Buku', 'buku-we22', '<p>searching</p>\r\n', '            teas        ', 9000, 5, 'logo-hugi5.png', 100, '10x10', 'Publish', '2019-04-27 05:19:39', '2019-04-27 03:19:39'),
(8, 3, '1', 1, 7, 'Yayan', 'KK02', 'Buku', 'buku-kk02', '<p>coba-coba</p>\r\n', '                        coba-coba                ', 93432, 6, '088.jpg', 100, '10x10', 'Publish', '2019-04-30 05:09:55', '2019-04-30 03:10:21'),
(9, 3, '1', 1, 7, 'Yayan', 'W010', 'Wingko', 'wingko-w010', '<p>tes</p>\r\n', '            tes        ', 20000, 6, 'logo-hugi6.png', 300, '10x10', 'Publish', '2019-05-06 09:02:13', '2019-05-06 07:02:47');

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(255) NOT NULL,
  `nomor_rekening` varchar(20) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal_pos` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id_rekening`, `nama_bank`, `nomor_rekening`, `nama_pemilik`, `gambar`, `tanggal_pos`) VALUES
(2, 'BRI Syariah', '0993232', 'tb fajri', NULL, '2019-04-02 03:43:30'),
(4, 'BRI Syariah', '482348923', 'Plaza', NULL, '2019-04-02 04:14:56');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id_slider` int(11) NOT NULL,
  `nama_slider` varchar(255) NOT NULL,
  `urutan` int(11) NOT NULL,
  `gambar` text NOT NULL,
  `slug_slider` text NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id_slider`, `nama_slider`, `urutan`, `gambar`, `slug_slider`, `tanggal_update`) VALUES
(2, 'cek', 1, '31.jpg', 'cek-1', '2019-04-27 07:38:37'),
(3, 'ayam', 34, '3201709291900344.jpg', 'ayam-34', '2019-04-27 07:38:19');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `nama_toko` varchar(255) NOT NULL,
  `id_penjual` int(11) NOT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `id_produk` varchar(255) NOT NULL,
  `no_resi` int(11) NOT NULL,
  `status_barang` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_pelanggan`, `nama_toko`, `id_penjual`, `kode_transaksi`, `id_produk`, `no_resi`, `status_barang`, `harga`, `jumlah`, `total_harga`, `tanggal_transaksi`, `tanggal_update`) VALUES
(1, 0, 2, 'Bagas', 5, '03052019JFNMB2QK', '6', 0, '', 9000, 1, 9000, '2019-05-03 00:00:00', '2019-05-03 03:13:39'),
(2, 0, 2, 'Yayan', 1, '03052019JFNMB2QK', '8', 12366, 'Barang Sedang di Kemas', 93432, 1, 93432, '2019-05-03 00:00:00', '2019-05-06 09:47:40'),
(3, 0, 2, 'Yayan', 1, '03052019OQH9YIGR', '8', 12366, 'Barang Sudah di Kirim', 93432, 1, 93432, '2019-05-03 00:00:00', '2019-05-06 09:52:33'),
(4, 0, 2, 'Bagas', 5, '03052019OQH9YIGR', '6', 0, '', 9000, 2, 18000, '2019-05-03 00:00:00', '2019-05-03 06:44:06'),
(5, 0, 2, 'Yayan', 1, '06052019HASL5BPO', '8', 0, '', 93432, 1, 93432, '2019-05-06 00:00:00', '2019-05-06 06:34:54'),
(6, 0, 2, 'Yayan', 1, '06052019T4VT1RB6', '9', 123, 'Barang Sudah di Kirim', 20000, 1, 20000, '2019-05-06 00:00:00', '2019-05-06 09:45:48'),
(7, 0, 2, 'Yayan', 1, '06052019T4VT1RB6', '8', 123, 'Barang Sudah di Kirim', 93432, 1, 93432, '2019-05-06 00:00:00', '2019-05-06 09:45:48'),
(8, 0, 2, 'Bagas', 5, '06052019T4VT1RB6', '6', 12366, 'Barang Sudah di Kirim', 9000, 1, 9000, '2019-05-06 00:00:00', '2019-05-06 09:58:06'),
(9, 0, 2, 'Bagas', 5, '06052019FATQEQ98', '6', 12366, 'Barang Sudah di Kirim', 9000, 1, 9000, '2019-05-06 00:00:00', '2019-05-06 10:11:30'),
(10, 0, 2, 'Yayan', 1, '06052019FATQEQ98', '8', 12366, 'Barang Sudah di Kirim', 93432, 1, 93432, '2019-05-06 00:00:00', '2019-05-06 10:12:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `akses_level` varchar(20) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `username`, `password`, `akses_level`, `tanggal_update`) VALUES
(3, 'Tb Fajri', 'tbfajri@gmail.com', 'tbfajri', '31f648bb69a1019ceee1379794de22fc03273a0e', 'Admin', '2019-03-20 07:40:04'),
(6, 'yayan', 'fajri@gmail.com', 'superadmin', '0987654321', 'User', '2019-03-20 05:09:16'),
(8, 'Tb Fajri', 'tes@tes.com', 'admin', '213c4738cc35c04f021cb47d03c4226bdf330636', 'User', '2019-03-20 08:34:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `header_transaksi`
--
ALTER TABLE `header_transaksi`
  ADD PRIMARY KEY (`id_header_transaksi`),
  ADD UNIQUE KEY `kode_transaksi` (`kode_transaksi`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `id_penjual` (`id_penjual`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD UNIQUE KEY `kode_produk` (`kode_produk`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `header_transaksi`
--
ALTER TABLE `header_transaksi`
  MODIFY `id_header_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
