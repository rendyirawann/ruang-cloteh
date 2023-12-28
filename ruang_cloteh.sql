-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2022 at 06:02 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ruang_cloteh`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `harga` int(10) NOT NULL,
  `kategori` enum('kopi','non kopi','snack') NOT NULL,
  `image` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `nama_menu`, `harga`, `kategori`, `image`) VALUES
(1, 'Vanilla Latte', 15000, 'kopi', ''),
(4, 'Caramel Machiato', 30000, 'kopi', ''),
(5, 'Sanger', 10000, 'kopi', ''),
(6, 'Kopi itam', 5000, 'kopi', ''),
(11, 'Kentang Goreng', 10000, 'snack', NULL),
(12, 'Cold Brew', 20000, 'kopi', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `atas_nama` varchar(50) NOT NULL,
  `pesanan` varchar(250) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tipe_pembayaran` enum('dana','cash') NOT NULL,
  `status` enum('sukses','gagal','pending') NOT NULL,
  `tanggal_pesan` varchar(15) NOT NULL,
  `waktu_pesan` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id`, `atas_nama`, `pesanan`, `jumlah`, `total`, `tipe_pembayaran`, `status`, `tanggal_pesan`, `waktu_pesan`) VALUES
(1, 'eq', 'Vanilla Latte', 1, 15000, 'cash', 'sukses', '2022-06-03', '00:00:00'),
(2, 'eq', 'Kopi Merah', 1, 5000, 'cash', 'sukses', '2022-06-03', '00:00:00'),
(3, 'arief', 'Vanilla Latte', 1, 15000, 'cash', 'sukses', '2022-06-03', '05:07:20'),
(4, 'arief', 'Caramel Machiato', 1, 30000, 'cash', 'sukses', '2022-06-03', '05:07:20'),
(5, 'ea', 'Vanilla Latte', 1, 15000, 'dana', 'sukses', '2022-06-03', '05:32:31'),
(6, 'mumi', 'Vanilla Latte', 1, 15000, 'cash', 'sukses', '2022-06-03', '05:48:00'),
(7, 'mumi', 'Caramel Machiato', 1, 30000, 'cash', 'sukses', '2022-06-03', '05:48:00'),
(8, 'arief', 'Caramel Machiato', 1, 30000, 'cash', 'sukses', '2022-06-04', '05:22:14'),
(9, 'aref', 'Caramel Machiato', 1, 30000, 'cash', 'sukses', '2022-06-04', '05:23:51'),
(10, 'arief', 'Vanilla Latte', 1, 15000, 'cash', 'sukses', '2022-06-04', '05:24:06'),
(11, 'jokon', 'Caramel Machiato', 1, 30000, 'cash', 'sukses', '2022-06-04', '05:24:19'),
(12, 'ea', 'Caramel Machiato', 1, 30000, 'cash', 'sukses', '2022-06-04', '05:24:48'),
(13, 'ea', 'Sanger', 1, 10000, 'cash', 'sukses', '2022-06-04', '05:24:48'),
(14, 'eaea', 'Vanilla Latte', 1, 15000, 'cash', 'sukses', '2022-06-04', '05:25:19'),
(15, 'asd', 'Caramel Machiato', 1, 30000, 'cash', 'sukses', '2022-06-04', '05:25:28'),
(16, 'aaaaaaaaa', 'Sanger', 1, 10000, 'cash', 'sukses', '2022-06-04', '05:25:34'),
(17, 'letsgop', 'Vanilla Latte', 1, 15000, 'cash', 'sukses', '2022-06-04', '05:26:54'),
(18, 'yea', 'Caramel Machiato', 1, 30000, 'cash', 'sukses', '2022-06-04', '05:35:40'),
(19, 'aref', 'Vanilla Latte', 1, 15000, 'cash', 'sukses', '2022-06-04', '05:37:12'),
(20, 'arief', 'Vanilla Latte', 1, 15000, 'cash', 'sukses', '2022-06-04', '05:37:56'),
(21, 'ae', 'Vanilla Latte', 1, 15000, 'cash', 'sukses', '2022-06-04', '05:40:35'),
(22, 'arief', 'Vanilla Latte', 1, 15000, 'cash', 'sukses', '2022-06-04', '05:41:23'),
(23, 'yeaaa', 'Vanilla Latte', 1, 15000, 'cash', 'sukses', '2022-06-04', '05:54:50'),
(24, 'yeaaa', 'Sanger', 1, 10000, 'cash', 'sukses', '2022-06-04', '05:54:50'),
(25, 'arief', 'Sanger', 3, 10000, 'cash', 'sukses', '2022-06-04', '06:01:39'),
(26, 'arief', 'Caramel Machiato', 1, 30000, 'cash', 'sukses', '2022-06-04', '06:01:39'),
(27, 'ariefganteng', 'Caramel Machiato', 1, 30000, 'cash', 'sukses', '2022-06-04', '06:02:40'),
(28, 'ariefganteng', 'Sanger', 4, 10000, 'cash', 'sukses', '2022-06-04', '06:02:40'),
(29, 'yea', 'Caramel Machiato', 1, 30000, 'cash', 'sukses', '2022-06-04', '06:04:39'),
(30, 'yea', 'Sanger', 1, 10000, 'cash', 'sukses', '2022-06-04', '06:04:39'),
(31, 'yea', 'Kopi itam', 3, 5000, 'cash', 'sukses', '2022-06-04', '06:04:39'),
(32, 'ea', 'Sanger', 2, 10000, 'cash', 'sukses', '2022-06-04', '06:06:14'),
(33, 'ea', 'Caramel Machiato', 1, 30000, 'cash', 'sukses', '2022-06-04', '06:06:14'),
(34, 'arief', 'Vanilla Latte', 1, 15000, 'cash', 'sukses', '2022-06-04', '06:07:31'),
(35, 'arief', 'Caramel Machiato', 1, 30000, 'cash', 'sukses', '2022-06-04', '06:07:31'),
(36, 'arief', 'Sanger', 5, 10000, 'cash', 'sukses', '2022-06-04', '06:07:31'),
(37, 'arief', 'Vanilla Latte', 1, 15000, 'cash', 'sukses', '2022-06-04', '06:12:23'),
(38, 'arief', 'Caramel Machiato', 1, 30000, 'cash', 'sukses', '2022-06-04', '06:12:23'),
(39, 'ayam jago', 'Vanilla Latte', 1, 15000, 'cash', 'sukses', '2022-06-04', '06:15:40'),
(40, 'ayam jago', 'Caramel Machiato', 1, 30000, 'cash', 'sukses', '2022-06-04', '06:15:40'),
(41, 'ayam jago', 'Sanger', 1, 10000, 'cash', 'sukses', '2022-06-04', '06:15:40'),
(42, 'kuku', 'Vanilla Latte', 1, 15000, 'cash', 'sukses', '2022-06-04', '06:25:37'),
(43, 'kuku', 'Sanger', 1, 10000, 'cash', 'sukses', '2022-06-04', '06:25:37'),
(44, 'e', 'Vanilla Latte', 1, 15000, 'cash', 'sukses', '2022-06-04', '06:31:31'),
(45, 'tari', 'Vanilla Latte', 1, 15000, 'cash', 'sukses', '2022-06-04', '06:32:10'),
(46, 'Rendy', 'Caramel Machiato', 1, 30000, 'cash', 'sukses', '2022-06-04', '12:59:37'),
(47, 'Rendy', 'Boba Taro Hazelnut Milk Tea Mentai', 1, 20000, 'cash', 'sukses', '2022-06-04', '12:59:37'),
(48, 'Rendy', 'Vanilla Latte', 1, 15000, 'cash', 'sukses', '2022-06-05', '18:54:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `username`, `password`) VALUES
(1, 'Muhammad Arief', 'arief@admin.com', 'arief', 'arief');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`,`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
