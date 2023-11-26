-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2023 at 04:50 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `kodeKategori` int(11) NOT NULL,
  `namaKategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`kodeKategori`, `namaKategori`) VALUES
(1, 'Chicken'),
(2, 'Wagyu'),
(3, 'Local Cow'),
(4, 'Goat');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `kodePelanggan` int(11) NOT NULL,
  `alamatPelanggan` varchar(100) DEFAULT NULL,
  `passwordPelanggan` varchar(256) NOT NULL,
  `usernamePelanggan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`kodePelanggan`, `alamatPelanggan`, `passwordPelanggan`, `usernamePelanggan`) VALUES
(1, 'Jl Setia Budi Surabaya', '123', 'glendy11'),
(2, 'Gang Pop ice telang', '123', 'PPP'),
(3, 'jl Tunjungan surabaya', '123', 'budi111'),
(4, '12', 'a9f0e71fd97a882a27b3e2614026758a27de262ab3df7c18a01a7ff25e092ba5', 'g@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `kodeJabatan` int(11) NOT NULL,
  `namaJabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`kodeJabatan`, `namaJabatan`) VALUES
(1, 'admin'),
(2, 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `kodeKaryawan` int(11) NOT NULL,
  `kodeJabatan` int(11) DEFAULT NULL,
  `usernameKaryawan` varchar(100) DEFAULT NULL,
  `passwordKaryawan` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`kodeKaryawan`, `kodeJabatan`, `usernameKaryawan`, `passwordKaryawan`) VALUES
(1, 1, 'glendy', 'a9f0e71fd97a882a27b3e2614026758a27de262ab3df7c18a01a7ff25e092ba5');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `kodeProduk` int(11) NOT NULL,
  `kodePesanan` int(11) NOT NULL,
  `subHarga` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`kodeProduk`, `kodePesanan`, `subHarga`, `qty`) VALUES
(21, 65, 444, 1),
(21, 67, 2220, 5),
(51, 65, 80000, 8),
(51, 70, 70000, 7),
(55, 64, 45000, 3),
(55, 66, 75000, 5),
(58, 71, 615, 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `kodePesanan` int(11) NOT NULL,
  `kodePelanggan` int(11) NOT NULL,
  `tanggalPesan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `keterangan` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`kodePesanan`, `kodePelanggan`, `tanggalPesan`, `keterangan`) VALUES
(64, 1, '2023-11-21 07:10:53', 'sudah'),
(65, 1, '2023-11-22 11:38:13', 'sudah'),
(66, 2, '2023-11-22 06:04:53', 'sudah'),
(67, 2, '2023-11-22 06:05:03', 'belum'),
(68, 3, '2023-11-22 06:05:37', 'belum'),
(69, 1, '2023-11-22 12:25:01', 'sudah'),
(70, 1, '2023-11-22 12:26:39', 'belum'),
(71, 4, '2023-11-24 10:36:28', 'sudah');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `kodePembayaran` int(11) NOT NULL,
  `kodePesanan` int(11) NOT NULL,
  `waktuBayar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total` int(11) NOT NULL,
  `metode` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`kodePembayaran`, `kodePesanan`, `waktuBayar`, `total`, `metode`) VALUES
(1, 71, '2023-11-24 10:36:28', 615, 'COD');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `kodeProduk` int(11) NOT NULL,
  `kodeKategori` int(11) NOT NULL,
  `kodeSuplaier` int(11) DEFAULT NULL,
  `namaProduk` varchar(100) NOT NULL,
  `gambarProduk` varchar(255) NOT NULL,
  `hargaProduk` int(11) NOT NULL,
  `stokProduk` int(11) NOT NULL,
  `deskripsiProduk` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`kodeProduk`, `kodeKategori`, `kodeSuplaier`, `namaProduk`, `gambarProduk`, `hargaProduk`, `stokProduk`, `deskripsiProduk`) VALUES
(21, 1, 1, 'hahahahah', '6561c6c594ace.png', 1244555, 123, '100 gr'),
(25, 1, 1, '&lt;h1&gt;hahaha&lt;/h1&gt;', 'tes.jpg', 10000000, 90, '&lt;h1&gt;hahaha&lt;/h1&gt;'),
(51, 1, 2, 'oke', '6553827578dc9.png', 10000, 21297, ''),
(55, 1, 9, 'coba', '655c2ef9d6280.', 15000, 0, ''),
(56, 2, 11, 'asdad', '6560203d9e113.png', 123, 1, '100gr'),
(57, 1, 1, '', '6560208fdbd2a.png', 0, 0, ''),
(58, 1, 1, 'manusia', '6560210565212.png', 123, 217, 'sfsdfd');

-- --------------------------------------------------------

--
-- Table structure for table `suplaier`
--

CREATE TABLE `suplaier` (
  `kodeSuplaier` int(11) NOT NULL,
  `namaSuplaier` varchar(100) NOT NULL,
  `telpSuplaier` varchar(15) NOT NULL,
  `alamatSuplaier` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suplaier`
--

INSERT INTO `suplaier` (`kodeSuplaier`, `namaSuplaier`, `telpSuplaier`, `alamatSuplaier`) VALUES
(1, 'asasasasas', '099328432423', 'jakarta 5'),
(2, 'CV Anubis aja', '0857483784', 'Jl Mawar'),
(9, 'PT Rizky kanibal', '0895637284', 'simo jawar'),
(11, 'Rizkyan Kanibal', '09866474', 'addsad'),
(13, 'PT Rizky Karnivora', '0895377321', 'Jl Mawar VA no 120');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `kodeWallet` int(11) NOT NULL,
  `kodePelanggan` int(11) NOT NULL,
  `namaWallet` varchar(64) NOT NULL,
  `nomorWallet` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`kodeKategori`) USING BTREE;

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`kodePelanggan`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`kodeJabatan`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`kodeKaryawan`),
  ADD UNIQUE KEY `usernameKaryawan` (`usernameKaryawan`),
  ADD KEY `fk_kodeJabatan` (`kodeJabatan`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`kodeProduk`,`kodePesanan`),
  ADD KEY `fk_orders_orderdetail` (`kodePesanan`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`kodePesanan`),
  ADD KEY `FK_MEMESAN` (`kodePelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`kodePembayaran`),
  ADD KEY `fk_kodePesanan` (`kodePesanan`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`kodeProduk`) USING BTREE,
  ADD KEY `fk_products_mempunyai_kategori` (`kodeKategori`) USING BTREE,
  ADD KEY `fk_kodeSuplaier` (`kodeSuplaier`);

--
-- Indexes for table `suplaier`
--
ALTER TABLE `suplaier`
  ADD PRIMARY KEY (`kodeSuplaier`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`kodeWallet`),
  ADD KEY `fk_wallet_kodePelanggan` (`kodePelanggan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `kodeKategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `kodePelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `kodeJabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `kodeKaryawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `kodePesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `kodePembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `kodeProduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `suplaier`
--
ALTER TABLE `suplaier`
  MODIFY `kodeSuplaier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `kodeWallet` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `fk_kodeJabatan` FOREIGN KEY (`kodeJabatan`) REFERENCES `jabatan` (`kodeJabatan`);

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `fk_orders_orderdetail` FOREIGN KEY (`kodePesanan`) REFERENCES `orders` (`kodePesanan`),
  ADD CONSTRAINT `fk_produk_orderdetail` FOREIGN KEY (`kodeProduk`) REFERENCES `products` (`kodeProduk`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_MEMESAN` FOREIGN KEY (`kodePelanggan`) REFERENCES `customers` (`kodePelanggan`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `fk_kodePesanan` FOREIGN KEY (`kodePesanan`) REFERENCES `orders` (`kodePesanan`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_kodeSuplaier` FOREIGN KEY (`kodeSuplaier`) REFERENCES `suplaier` (`kodeSuplaier`),
  ADD CONSTRAINT `fk_products_mempunyai_kategori` FOREIGN KEY (`kodeKategori`) REFERENCES `categories` (`kodeKategori`) ON UPDATE CASCADE;

--
-- Constraints for table `wallet`
--
ALTER TABLE `wallet`
  ADD CONSTRAINT `fk_wallet_kodePelanggan` FOREIGN KEY (`kodePelanggan`) REFERENCES `customers` (`kodePelanggan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
