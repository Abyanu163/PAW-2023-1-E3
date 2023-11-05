-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Nov 2023 pada 08.11
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `modul-5`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cartdetails`
--

CREATE TABLE `cartdetails` (
  `kodeDetilKeranjang` int(11) NOT NULL,
  `kodeKeranjang` int(11) NOT NULL,
  `kodeProduk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `carts`
--

CREATE TABLE `carts` (
  `kodeKeranjang` int(11) NOT NULL,
  `kodePelanggan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `carts`
--

INSERT INTO `carts` (`kodeKeranjang`, `kodePelanggan`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `kodeKategori` int(11) NOT NULL,
  `namaKategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`kodeKategori`, `namaKategori`) VALUES
(1, 'makanan'),
(2, 'minuman'),
(3, 'sayuran'),
(4, 'buah-buahan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `kodePelanggan` int(11) NOT NULL,
  `emailPelanggan` varchar(100) NOT NULL,
  `passwordPelanggan` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`kodePelanggan`, `emailPelanggan`, `passwordPelanggan`) VALUES
(1, 'pelanggan@gmail.com', 'p314ngg4n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orderdetails`
--

CREATE TABLE `orderdetails` (
  `kodeDetilPesanan` int(11) NOT NULL,
  `kodePesanan` int(11) NOT NULL,
  `kodeProduk` int(11) NOT NULL,
  `hargaProduk` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `kodePesanan` int(11) NOT NULL,
  `kodePelanggan` int(11) NOT NULL,
  `tanggalPesan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `kodeProduk` int(11) NOT NULL,
  `kodeKategori` int(11) NOT NULL,
  `namaProduk` varchar(100) NOT NULL,
  `gambarProduk` varchar(255) NOT NULL,
  `hargaProduk` int(11) NOT NULL,
  `stokProduk` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`kodeProduk`, `kodeKategori`, `namaProduk`, `gambarProduk`, `hargaProduk`, `stokProduk`, `created_at`, `updated_at`) VALUES
(1, 1, 'kebab', 'kebab.jpg', 120000, 10, '2023-10-20 06:39:51', NULL),
(2, 2, 'jus jeruk', 'jus-jeruk.jpg', 20000, 12, '2023-10-19 06:41:15', NULL),
(3, 3, 'brokoli', 'brokoli.jpg', 10000, 5, '2023-10-20 06:41:54', NULL),
(4, 4, 'durian', 'durian.jpg', 50000, 0, '2023-10-20 06:42:34', NULL),
(5, 1, 'pizza', '5_pizza.jpg', 150000, 8, '2023-10-24 12:45:00', NULL),
(6, 2, 'kopi', 'kopi.jpg', 22000, 20, '2023-10-18 06:44:17', NULL),
(7, 3, 'wortel', 'wortel.jpg', 5000, 2, '2023-10-15 06:46:02', NULL),
(8, 4, 'mangga', 'mangga.jpg', 10000, 0, '2023-10-20 06:46:46', NULL),
(9, 1, 'sushi', 'sushi.jpg', 100000, 3, '2023-10-20 06:47:30', NULL),
(10, 2, 'teh', 'teh.jpg', 15000, 10, '2023-10-02 06:48:03', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cartdetails`
--
ALTER TABLE `cartdetails`
  ADD PRIMARY KEY (`kodeDetilKeranjang`),
  ADD KEY `FK_MENDETAIL` (`kodeKeranjang`),
  ADD KEY `FK_TERMASUK` (`kodeProduk`);

--
-- Indeks untuk tabel `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`kodeKeranjang`),
  ADD KEY `FK_Menambahkan` (`kodePelanggan`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`kodeKategori`) USING BTREE;

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`kodePelanggan`);

--
-- Indeks untuk tabel `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`kodeDetilPesanan`),
  ADD KEY `FK_Memiliki` (`kodePesanan`),
  ADD KEY `FK_Membeli` (`kodeProduk`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`kodePesanan`),
  ADD KEY `FK_MEMESAN` (`kodePelanggan`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`kodeProduk`) USING BTREE,
  ADD KEY `fk_products_mempunyai_kategori` (`kodeKategori`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cartdetails`
--
ALTER TABLE `cartdetails`
  MODIFY `kodeDetilKeranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `carts`
--
ALTER TABLE `carts`
  MODIFY `kodeKeranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `kodeKategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `kodePelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `kodeDetilPesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `kodePesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `kodeProduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cartdetails`
--
ALTER TABLE `cartdetails`
  ADD CONSTRAINT `FK_MENDETAIL` FOREIGN KEY (`kodeKeranjang`) REFERENCES `carts` (`kodeKeranjang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_TERMASUK` FOREIGN KEY (`kodeProduk`) REFERENCES `products` (`kodeProduk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `FK_Menambahkan` FOREIGN KEY (`kodePelanggan`) REFERENCES `customers` (`kodePelanggan`);

--
-- Ketidakleluasaan untuk tabel `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `FK_Membeli` FOREIGN KEY (`kodeProduk`) REFERENCES `products` (`kodeProduk`),
  ADD CONSTRAINT `FK_Memiliki` FOREIGN KEY (`kodePesanan`) REFERENCES `orders` (`kodePesanan`);

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_MEMESAN` FOREIGN KEY (`kodePelanggan`) REFERENCES `customers` (`kodePelanggan`);

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_mempunyai_kategori` FOREIGN KEY (`kodeKategori`) REFERENCES `categories` (`kodeKategori`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
