-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Sep 2021 pada 08.22
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbikan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `kode_cart` varchar(20) DEFAULT NULL,
  `kode_ikan` varchar(15) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `qty` int(5) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`id_cart`, `kode_cart`, `kode_ikan`, `harga`, `qty`, `subtotal`) VALUES
(20, '2106211624276603', 'I0001', 27000, 20, 540000),
(21, '2106211624276746', 'I0001', 27000, 2, 54000),
(22, '1408211628963218', 'I0005', 70000, 48, 3360000),
(23, '1408211628963218', 'I0004', 38000, 35, 1330000),
(24, '1408211628963218', 'I0003', 40000, 43, 1720000),
(25, '1408211628963218', 'I0002', 35000, 20, 700000),
(26, '1408211628963218', 'I0001', 27000, 57, 1539000),
(27, '1408211628963429', 'I0001', 27000, 1, 27000),
(28, '1508211629007532', 'I0003', 40000, 1, 40000),
(29, '2008211629447613', 'I0002', 35000, 1, 35000),
(30, '2008211629449283', 'I0003', 40000, 3, 120000),
(31, '2008211629449843', 'I0001', 27000, 1, 27000),
(32, '2008211629449843', 'I0001', 27000, 1, 27000),
(33, '2008211629449843', 'I0003', 40000, 1, 40000),
(34, '2308211629724902', 'I0001', 27000, 1, 27000),
(35, '2308211629724902', 'I0001', 27000, 1, 27000),
(36, '2308211629724902', 'I0002', 35000, 1, 35000),
(37, '1209211631462012', 'I0006', 24000, 55, 1320000),
(38, '1209211631462227', 'I0006', 24000, 24, 576000),
(39, '1209211631462227', 'I0007', 20000, 21, 420000),
(40, '1209211631462227', 'I0008', 40000, 10, 400000),
(41, '1209211631463072', 'I0010', 25, 35, 875),
(42, '1209211631463072', 'I0009', 50000, 25, 1250000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ikan_pemasok`
--

CREATE TABLE `ikan_pemasok` (
  `id_ikan_pemasok` int(11) NOT NULL,
  `kode_ikan` varchar(10) DEFAULT NULL,
  `nama_ikan` varchar(50) DEFAULT NULL,
  `harga` int(9) DEFAULT NULL,
  `jenis` varchar(30) DEFAULT NULL,
  `merek` varchar(30) DEFAULT NULL,
  `stok` int(5) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ikan_pemasok`
--

INSERT INTO `ikan_pemasok` (`id_ikan_pemasok`, `kode_ikan`, `nama_ikan`, `harga`, `jenis`, `merek`, `stok`, `id_user`) VALUES
(7, 'I0001', 'Ikan Mujahir', 27000, 'Ikan Air Tawar', 'Biasa', 85, 3),
(8, 'I0002', 'Ikan Mas', 35000, 'Ikan air tawar', 'Biasa', 14, 3),
(9, 'I0003', 'Ikan Nila', 40000, 'Ikan air tawar', 'Biasa', 76, 3),
(10, 'I0004', 'Ikan Tongkol', 38000, 'IKan Laut', 'Biasa', 13, 3),
(11, 'I0005', 'Ikan Tuna', 70000, 'IKan Laut', 'Biasa', -24, 3),
(12, 'I0006', 'Ikan Tenggiri', 24000, 'Ikan Laut', 'Biasa', 6, 3),
(13, 'I0007', 'Ikan Gabus', 20000, 'Ikan air tawar', 'Biasa', 34, 3),
(14, 'I0008', 'Ikan Gurame', 40000, 'Ikan air tawar', 'Biasa', 14, 3),
(15, 'I0009', 'Ikan Baronang', 50000, 'Ikan Laut', 'Biasa', 41, 3),
(16, 'I0010', 'Ikan Kembung', 25, 'Ikan Laut', 'Biasa', 27, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ikan_supplier`
--

CREATE TABLE `ikan_supplier` (
  `id_ikan_supplier` int(11) NOT NULL,
  `kode_ikan` varchar(10) DEFAULT NULL,
  `nama_ikan` varchar(50) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `jenis` varchar(30) DEFAULT NULL,
  `merek` varchar(30) DEFAULT NULL,
  `stok` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ikan_supplier`
--

INSERT INTO `ikan_supplier` (`id_ikan_supplier`, `kode_ikan`, `nama_ikan`, `harga`, `jenis`, `merek`, `stok`) VALUES
(7, 'I0005', 'Ikan Tuna', 70000, 'IKan Laut', 'Biasa', 96),
(8, 'I0004', 'Ikan Tongkol', 38000, 'IKan Laut', 'Biasa', 70),
(9, 'I0003', 'Ikan Nila', 40000, 'Ikan air tawar', 'Biasa', 85),
(10, 'I0002', 'Ikan Mas', 35000, 'Ikan air tawar', 'Biasa', 39),
(11, 'I0001', 'Ikan Mujahir', 27000, 'Ikan Air Tawar', 'Biasa', 113),
(12, 'I0006', 'Ikan Tenggiri', 24000, 'Ikan Laut', 'Biasa', 79),
(13, 'I0007', 'Ikan Gabus', 20000, 'Ikan air tawar', 'Biasa', 21),
(14, 'I0008', 'Ikan Gurame', 40000, 'Ikan air tawar', 'Biasa', 10),
(15, 'I0010', 'Ikan Kembung', 25000, 'Ikan Laut', 'Biasa', 35),
(16, 'I0009', 'Ikan Baronang', 50000, 'Ikan Laut', 'Biasa', 25);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `kode_pemesanan` varchar(20) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `kode_cart` varchar(20) DEFAULT NULL,
  `status_pesanan` varchar(1) DEFAULT 't',
  `bukti_pembayaran` varchar(100) DEFAULT NULL,
  `username_pelanggan` varchar(50) DEFAULT NULL,
  `alamat_pengiriman` text DEFAULT NULL,
  `jumlah_bayar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `kode_pemesanan`, `tgl`, `kode_cart`, `status_pesanan`, `bukti_pembayaran`, `username_pelanggan`, `alamat_pengiriman`, `jumlah_bayar`) VALUES
(8, '2106211624276746', '2021-06-21', '2106211624276746', 'y', 'bukti_2106211624276746.jpg', 'user', 'Jakarta', 54000),
(9, '1408211628963429', '2021-08-14', '1408211628963429', 'y', 'bukti_1408211628963429.jpg', 'pembeli', 'jl siliwangi', 27000),
(10, '1508211629007532', '2021-08-15', '1508211629007532', 'y', NULL, NULL, NULL, NULL),
(11, '2008211629447613', '2021-08-20', '2008211629447613', 'y', NULL, NULL, NULL, NULL),
(12, '2008211629449843', '2021-08-20', '2008211629449843', 't', 'bukti_2008211629449843', 'pembeli', 'alamat pembeli', 0),
(13, '2308211629724902', '2021-08-23', '2308211629724902', 't', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan_supplier`
--

CREATE TABLE `pesanan_supplier` (
  `id_pesanan` int(11) NOT NULL,
  `kode_pesanan` varchar(20) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `kode_cart` varchar(20) DEFAULT NULL,
  `status_pesanan` varchar(1) DEFAULT 't',
  `username_pelanggan` varchar(100) DEFAULT NULL,
  `alamat_pengiriman` text DEFAULT NULL,
  `jumlah_bayar` int(11) DEFAULT NULL,
  `bukti_pembayaran` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan_supplier`
--

INSERT INTO `pesanan_supplier` (`id_pesanan`, `kode_pesanan`, `tgl`, `kode_cart`, `status_pesanan`, `username_pelanggan`, `alamat_pengiriman`, `jumlah_bayar`, `bukti_pembayaran`) VALUES
(9, '2106211624276603', '2021-06-21', '2106211624276603', 'y', 'supplier', 'Jakarta', 540000, 'bukti_2106211624276603.jpg'),
(10, '1408211628963218', '2021-08-14', '1408211628963218', 'y', 'penjual', 'Jl sillwiangi', 8, 'bukti_1408211628963218.jpg'),
(11, '2008211629449283', '2021-08-20', '2008211629449283', 't', NULL, NULL, NULL, NULL),
(12, '1209211631462012', '2021-09-12', '1209211631462012', 'y', 'penjual', 'Alamat supplier', 0, 'bukti_1209211631462012'),
(13, '1209211631462227', '2021-09-12', '1209211631462227', 'y', 'penjual', 'Alamat supplier', 0, 'bukti_1209211631462227'),
(14, '1209211631463072', '2021-09-12', '1209211631463072', 'y', 'penjual', 'Alamat supplier', 0, 'bukti_1209211631463072');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `level` varchar(20) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level`, `foto`, `alamat`) VALUES
(1, 'Penjual', 'penjual', 'penjual', 'supplier', 'usr_1628930366', 'Alamat supplier'),
(3, 'Pemasok', 'pemasok', 'pemasok', 'pemasok', 'usr_1509092906', 'alamat pemasok'),
(6, 'Pembeli', 'pembeli', 'pembeli', 'user', 'usr_1628963629', 'alamat pembeli');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indeks untuk tabel `ikan_pemasok`
--
ALTER TABLE `ikan_pemasok`
  ADD PRIMARY KEY (`id_ikan_pemasok`);

--
-- Indeks untuk tabel `ikan_supplier`
--
ALTER TABLE `ikan_supplier`
  ADD PRIMARY KEY (`id_ikan_supplier`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indeks untuk tabel `pesanan_supplier`
--
ALTER TABLE `pesanan_supplier`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `ikan_pemasok`
--
ALTER TABLE `ikan_pemasok`
  MODIFY `id_ikan_pemasok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `ikan_supplier`
--
ALTER TABLE `ikan_supplier`
  MODIFY `id_ikan_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `pesanan_supplier`
--
ALTER TABLE `pesanan_supplier`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
