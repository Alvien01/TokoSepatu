-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2023 at 06:02 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_sepatu`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `nama_customer` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama_customer`, `username`, `password`, `alamat`) VALUES
(1, 'Renatta Glasc', 'renata', 'rere', 'Ds.Afha,Zaun'),
(2, 'Andi Bayem', 'andi', 'bayem', 'Ds. Isekai, Jepang');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `id_owner` int(11) NOT NULL,
  `nama_karyawan` varchar(30) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `id_owner`, `nama_karyawan`, `no_telp`, `alamat`, `password`, `username`) VALUES
(562001, 0, 'Arum Manis', '081234567890', 'Ds. Sobontoro, Boyolangu, Tulungagung', 'admin', 'arum'),
(562002, 0, 'Dani Irwansyah', '081210617656', 'Ds. Moyoketen,  Boyolangu, Tulungagung', 'admin', 'dani'),
(562003, 0, 'Arin Areen', '081098765432', 'Ds. Mangunsari, Kedungwaru, Tulungagung', 'admin', 'arin');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(3, 'High Shoes'),
(4, 'Flat Shoes');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `id_owner` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `nama_owner` varchar(30) NOT NULL,
  `email_owner` varchar(30) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`id_owner`, `id_supplier`, `id_karyawan`, `nama_owner`, `email_owner`, `no_telp`, `alamat`, `PASSWORD`) VALUES
(0, 666, 562001, 'Dani Irwansyah', 'daniirwansyah406@gmail.com', '081210617656', 'Ds. Moyoketen, Boyolangu, Tulungagung', 'dani');

-- --------------------------------------------------------

--
-- Table structure for table `sepatu`
--

CREATE TABLE `sepatu` (
  `id_sepatu` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(30) NOT NULL,
  `gambar_produk` varchar(50) NOT NULL,
  `deskripsi_produk` varchar(500) NOT NULL,
  `status_produk` tinyint(1) NOT NULL,
  `merk` varchar(15) NOT NULL,
  `ukuran` int(11) NOT NULL,
  `warna` varchar(20) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sepatu`
--

INSERT INTO `sepatu` (`id_sepatu`, `id_kategori`, `nama_produk`, `gambar_produk`, `deskripsi_produk`, `status_produk`, `merk`, `ukuran`, `warna`, `harga_produk`, `stok`) VALUES
(5, 3, 'Ethnic High', 'produk1672810138.jpg', '<p>Ethnic High Shoes</p>\r\n\r\n<p>Bahan : Sintetis</p>\r\n\r\n<p>Distributor : Bekasi</p>\r\n', 1, 'Ventela', 32, 'Hitam', 150000, 100),
(6, 3, 'BTS High', 'produk1672810579.jpg', '<p>BTS High Dark Green</p>\r\n\r\n<p>Bahan : Kulit Sintetis</p>\r\n\r\n<p>Distributor : Bekasi</p>\r\n', 1, 'Ventela', 33, 'Dark Green', 250000, 100),
(7, 4, 'Basic Low Natural', 'produk1672838449.jpg', '<p>Ventela Basic Low Black Natural</p>\r\n\r\n<p>Bahan : Kulit Sintetis</p>\r\n\r\n<p>Distributor : Bekasi</p>\r\n', 1, 'Ventela', 33, 'Hitam', 200000, 100),
(8, 4, 'Public Low Dark Yellow', 'produk1672991737.jpg', '<p>Ventela Public Low Dark Yellow</p>\r\n\r\n<p>Bahan : Kulit Sintetis</p>\r\n', 1, 'Ventela', 31, 'Dark Yellow', 230000, 100),
(9, 4, 'sepatu', 'produk1673322781.jpg', '', 1, 'Ventela', 32, 'Dark Green', 120000, 100);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `id_sepatu` int(11) NOT NULL,
  `id_owner` int(11) NOT NULL,
  `nama_supplier` varchar(30) NOT NULL,
  `kode_pengiriman` int(11) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`) USING BTREE;

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD KEY `id_owner` (`id_owner`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`id_owner`,`id_karyawan`) USING BTREE,
  ADD KEY `id_karyawan` (`id_karyawan`),
  ADD KEY `id_supplier` (`id_supplier`),
  ADD KEY `id_karyawan_2` (`id_karyawan`);

--
-- Indexes for table `sepatu`
--
ALTER TABLE `sepatu`
  ADD PRIMARY KEY (`id_sepatu`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=562004;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sepatu`
--
ALTER TABLE `sepatu`
  MODIFY `id_sepatu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`id_owner`) REFERENCES `owner` (`id_owner`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `sepatu` (`id_supplier`),
  ADD CONSTRAINT `supplier_ibfk_2` FOREIGN KEY (`id_supplier`) REFERENCES `owner` (`id_supplier`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
