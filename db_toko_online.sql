-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 20 Mei 2020 pada 09.52
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_toko_online`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_brg` int(11) NOT NULL,
  `nama_barang` varchar(120) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(4) NOT NULL,
  `foto` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_brg`, `nama_barang`, `keterangan`, `kategori`, `harga`, `stok`, `foto`) VALUES
(2, 'sepatu adidas', 'kw super cina punya', 'kelas menengah', 250000, 14, 'd1a6sr2-0975e122-bf30-4e5e-bcdc-576bf67a9d48.gif'),
(3, 'tas gucci', 'orri korea punya', 'kelas bagus', 18000000, 4, 'tas_gucci1.jpg'),
(5, 'hp oppo', 'Ram 16GB Rom 32GB', 'elektronik', 2300000, 15, 'hp_oppo2.jpg'),
(6, 'laptop Hp 3321p', 'Processor core i3 Ram 4GB HDD 500GB', 'elektronik', 7000000, 55, 'laptop.jpg'),
(7, 'laptop Hp 4141p', 'Processor core i7 Ram 16GB HDD 1Tera ', 'elektronik', 18000000, 14, 'hp1.jpg'),
(8, 'laptop Hp gaming pro omen', 'Processor core i7 Ram 32GB HDD 1Tera ', 'elektronik', 2000000, 5, 'omen.jpg'),
(9, 'kaos nike', 'bahan katun ', 'pakaian pria', 70000, 900, 'kaos_keren.jpg'),
(10, 'kemeja hijau', 'bahan halus banget', 'pakaian pria', 125000, 45, 'baju_hijau.jpg'),
(11, 'kemeja biru dongker', 'bahan  dalgona', 'pakaian pria', 167000, 55, 'kemeja_pria.jpg'),
(12, 'baju korea kekinian', 'bahan lembut enak d pakai', 'pakaian wanita', 340000, 45, 'cewe.jpg'),
(13, 'bola sepak', 'asli indonesia', 'peralatan olahraga', 250000, 55, 'bola_eropa.jpg'),
(14, 'kaos anak', 'umur 3-5 tahun', 'pakaian anak', 25000, 500, 'pakaian_bayi.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id` int(11) NOT NULL,
  `nama_pemesan` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_invoice`
--

INSERT INTO `tb_invoice` (`id`, `nama_pemesan`, `alamat`, `tgl_pesan`, `batas_bayar`) VALUES
(5, 'ade nantia', 'cikampek', '2020-05-19 10:36:04', '2020-05-20 10:36:04'),
(6, 'mila setiawan', 'karawang barat', '2020-05-19 11:05:00', '2020-05-20 11:05:00'),
(7, 'AA', 'AA', '2020-05-19 15:56:40', '2020-05-20 15:56:40'),
(8, 'ade nantia', 'Ccikampek selatan', '2020-05-19 15:57:42', '2020-05-20 15:57:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(10) NOT NULL,
  `pilihan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id`, `id_invoice`, `id_brg`, `nama_barang`, `jumlah`, `harga`, `pilihan`) VALUES
(3, 5, 2, 'sepatu adidas', 2, 250000, ''),
(4, 6, 4, 'saringgan', 1, 16777777, ''),
(5, 7, 6, 'laptop Hp 3321p', 1, 7000000, ''),
(6, 7, 7, 'laptop Hp 4141p', 1, 18000000, ''),
(7, 7, 3, 'tas gucci', 1, 18000000, ''),
(8, 8, 2, 'sepatu adidas', 1, 250000, '');

--
-- Trigger `tb_pesanan`
--
DELIMITER $$
CREATE TRIGGER `pesanan_penjualan` AFTER INSERT ON `tb_pesanan` FOR EACH ROW BEGIN 
	UPDATE tb_barang SET stok = stok-NEW.jumlah
    WHERE id_brg = NEW.id_brg;
 END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(54) NOT NULL,
  `username` varchar(54) NOT NULL,
  `password` varchar(54) NOT NULL,
  `role_id` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `role_id`) VALUES
(1, 'admin', 'admin', '123', 1),
(3, 'user', 'user', '123', 2),
(4, 'mirna', 'mirna', '12345', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indexes for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
