-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2020 at 09:58 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_jualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbjual`
--

CREATE TABLE `tbjual` (
  `id` int(10) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jumlah` int(2) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbjual`
--

INSERT INTO `tbjual` (`id`, `kode_barang`, `nama_barang`, `jumlah`, `harga`, `gambar`) VALUES
(2, 'AQUA00234', 'Aqua Mineral 600ml', 20, 5000, 'aqua600ml.jpg'),
(4, 'PG002', 'Pure Green Beras Organik 1kg - Putih', 10, 25000, 'beraspg1kgputih.jpg'),
(42, 'FF100', 'Frisian Flag kental manis 370g', 5, 12000, '5fece93453156.jpg'),
(71, 'BM0012L', 'Bimoli 2lt', 20, 23000, '5fece95e24dd4.jpg'),
(81, 'FF101', 'Frisian Flag Gold kental manis 370g', 20, 18000, '5fece98a8f6fe.jpg'),
(82, 'AQUA00330', 'Aqua Mineral 330ml', 300, 3000, '5fece9d6f1f1e.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tborder`
--

CREATE TABLE `tborder` (
  `id` int(11) NOT NULL,
  `id_order` int(50) NOT NULL,
  `total_item` int(50) NOT NULL,
  `total_bayar_item` int(50) NOT NULL,
  `tagihan` int(50) NOT NULL,
  `tunai` int(50) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tborder`
--

INSERT INTO `tborder` (`id`, `id_order`, `total_item`, `total_bayar_item`, `tagihan`, `tunai`, `kembalian`, `tgl_transaksi`) VALUES
(1, 1, 143, 615000, 615000, 700000, 85000, '2020-12-30'),
(2, 2, 6, 25000, 25000, 50000, 25000, '2020-12-30');

-- --------------------------------------------------------

--
-- Table structure for table `tborderdetail`
--

CREATE TABLE `tborderdetail` (
  `id` int(11) NOT NULL,
  `id_order` int(50) NOT NULL,
  `id_produk` int(50) NOT NULL,
  `kuantitas` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tborderdetail`
--

INSERT INTO `tborderdetail` (`id`, `id_order`, `id_produk`, `kuantitas`) VALUES
(1, 1, 2, 123),
(2, 1, 42, 20),
(3, 2, 2, 5),
(4, 2, 42, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbpengguna`
--

CREATE TABLE `tbpengguna` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbpengguna`
--

INSERT INTO `tbpengguna` (`id`, `username`, `password`) VALUES
(1, 'user', '$2y$10$RlPjLMj4kq5sZkKH17c8R.BWZE5N2v9cw1iPKHEIcnySP6dTbz2GG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbjual`
--
ALTER TABLE `tbjual`
  ADD PRIMARY KEY (`id`,`kode_barang`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `id_2` (`id`,`jumlah`),
  ADD UNIQUE KEY `id_3` (`id`,`jumlah`),
  ADD UNIQUE KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `tborder`
--
ALTER TABLE `tborder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tborderdetail`
--
ALTER TABLE `tborderdetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbpengguna`
--
ALTER TABLE `tbpengguna`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbjual`
--
ALTER TABLE `tbjual`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `tborder`
--
ALTER TABLE `tborder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tborderdetail`
--
ALTER TABLE `tborderdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbpengguna`
--
ALTER TABLE `tbpengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
