-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2022 at 04:53 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `purchasing`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode_barang` char(21) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `uraian_real` varchar(50) NOT NULL,
  `harga` int(10) NOT NULL,
  `kelompok` varchar(15) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `satuan` varchar(15) NOT NULL,
  `stok_barang` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `idbrg_keluar` char(7) NOT NULL,
  `idunit` char(7) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `idusers` char(7) NOT NULL,
  `nama_penerima` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`idbrg_keluar`, `idunit`, `tanggal_keluar`, `idusers`, `nama_penerima`) VALUES
('KBR0001', 'UGMR001', '2022-08-08', 'P01UGMR', 'Danang');

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `idbrg_masuk` char(7) NOT NULL,
  `idbelanja` char(7) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `idusers` char(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `belanja`
--

CREATE TABLE `belanja` (
  `idbelanja` char(7) NOT NULL,
  `tanggal_belanja` date NOT NULL,
  `idsuplier` char(7) NOT NULL,
  `status_bayar` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detail_belanja`
--

CREATE TABLE `detail_belanja` (
  `iddbelanja` char(7) NOT NULL,
  `idbelanja` char(7) NOT NULL,
  `iddrab` char(7) NOT NULL,
  `jumlah_belanja` int(5) NOT NULL,
  `harga_belanja` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detail_keluar`
--

CREATE TABLE `detail_keluar` (
  `idbrg_keluar` char(7) NOT NULL,
  `kode_barang` char(21) NOT NULL,
  `jumlah_keluar` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detail_masuk`
--

CREATE TABLE `detail_masuk` (
  `idbrg_masuk` char(7) NOT NULL,
  `iddbelanja` char(7) NOT NULL,
  `jumlah_masuk` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detail_rab`
--

CREATE TABLE `detail_rab` (
  `iddrab` char(7) NOT NULL,
  `idrab` char(7) NOT NULL,
  `kode_barang` char(21) NOT NULL,
  `spesifikasi` varchar(255) NOT NULL,
  `jumlah_barang` int(5) NOT NULL,
  `harga` int(10) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `status_barang` char(13) NOT NULL,
  `prioritas` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `idusers` char(7) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` char(8) NOT NULL,
  `level` varchar(14) NOT NULL,
  `jenis_kelamin` char(9) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `idunit` char(7) NOT NULL,
  `jabatan` varchar(25) NOT NULL,
  `alamat` varchar(75) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`idusers`, `nama_lengkap`, `username`, `password`, `level`, `jenis_kelamin`, `tanggal_lahir`, `idunit`, `jabatan`, `alamat`, `email`, `foto`) VALUES
('P01UGMR', 'Marta Surya Ningrum', 'martasn', '19240006', 'SPV Purchasing', 'Perempuan', '2001-08-12', 'UGMR001', 'Supervisor', 'Ngrundul, Ngrundul, Kebonarum, Klaten', 'martasuryaningrum02@gmail.com', ''),
('P02UGMR', 'Rini Wulandari', 'rini', '19240006', 'Adm Purchasing', 'Perempuan', '2001-08-12', 'UGMR001', 'admin', 'Sleman', 'riniwulan2629@gmail.com', ''),
('P03UGMR', 'Reva Ayu', 'reva', '19240016', 'SPV Unit', 'Laki-laki', '2001-04-16', 'UGMR002', 'Supervisor', 'Yogyakarta', 'revaayu@gmail.com', 'IMG-20220203-WA0003.jpg'),
('P04UGMR', 'Reva Ayu', '', 'caraka', 'Adm Purchasing', 'Perempuan', '2022-08-08', 'UGMR002', 'Supervisor', 'Ngrundul, Kebonarum, Klaten', 'martasuryaningrum02@gmail.com', 'asrama.jpg'),
('P05UGMR', 'Istianah', 'isti', '19240002', 'Manajer', 'Perempuan', '2001-09-18', 'UGMR001', 'Manajer', 'Yogyakarta', 'istianah@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `rab`
--

CREATE TABLE `rab` (
  `idrab` char(7) NOT NULL,
  `idunit` char(7) NOT NULL,
  `kegiatan` varchar(100) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `tanggal_rab` date NOT NULL,
  `tanggal_sah` date NOT NULL,
  `status_rab` varchar(7) NOT NULL,
  `jumlah_sah` int(1) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rab`
--

INSERT INTO `rab` (`idrab`, `idunit`, `kegiatan`, `pekerjaan`, `tanggal_rab`, `tanggal_sah`, `status_rab`, `jumlah_sah`, `keterangan`) VALUES
('RAB0001', 'UGMR001', 'Penyediaan Gudang', 'Pembelian ATK', '2022-08-09', '2022-08-09', 'Selesai', 3, 'Bagian Pengadaan Barang Langsung'),
('RAB0002', 'UGMR001', 'Penyediaan Gudang', 'Pembelian ATK', '2022-08-09', '2022-08-09', 'Selesai', 3, 'Bagian Pengadaan Barang Langsung'),
('RAB0003', 'UGMR001', 'Penyediaan Gudang', 'Pembelian ATK', '2022-08-09', '2022-08-09', 'Selesai', 3, 'Bagian Pengadaan Barang Langsung'),
('RAB0004', 'UGMR001', 'Penyediaan Gudang', 'Pembelian ATK', '2022-08-09', '2022-08-09', 'Selesai', 3, 'Bagian Pengadaan Barang Langsung');

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE `suplier` (
  `idsuplier` char(7) NOT NULL,
  `nama_suplier` varchar(50) NOT NULL,
  `nama_pemilik` varchar(50) NOT NULL,
  `alamat` varchar(75) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suplier`
--

INSERT INTO `suplier` (`idsuplier`, `nama_suplier`, `nama_pemilik`, `alamat`, `telp`, `email`, `keterangan`) VALUES
('SUP0001', 'Sinar Mataram', 'Marta', 'Jl Mataram No 63 Yogyakarta', '02174322', 'sinarmataram@gmail.com', 'Toko alat elektronik'),
('SUP0002', 'Lancar', 'Surya', 'Jl Monjali Yogyakarta', '0898765321', 'tokocatlancar@gmail.com', 'Toko Cat'),
('SUP0003', 'Marta Tilaar', 'Marta', 'Jakarta Selatan', '085674832221', 'martatilaarcosmetic@gmail.com', 'Toko Make Up'),
('SUP0004', 'sdfgh', 'cvbn', 'vbn', '3456', 'ertyu', 'ertyu');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `idunit` char(7) NOT NULL,
  `nama_unit` varchar(50) NOT NULL,
  `nama_supervisor` varchar(50) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`idunit`, `nama_unit`, `nama_supervisor`, `keterangan`) VALUES
('UGMR001', 'Purchasing', 'Kris Jihantoro', 'Bagian Pengadaan Barang Langsung'),
('UGMR002', 'Darmaputra Karanggayam ', 'Dewa', 'Asrama Putra');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`idbrg_keluar`),
  ADD KEY `idunit` (`idunit`),
  ADD KEY `idusers` (`idusers`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`idbrg_masuk`),
  ADD KEY `idbelanja` (`idbelanja`),
  ADD KEY `iduser` (`idusers`);

--
-- Indexes for table `belanja`
--
ALTER TABLE `belanja`
  ADD PRIMARY KEY (`idbelanja`),
  ADD KEY `idsuplier` (`idsuplier`);

--
-- Indexes for table `detail_belanja`
--
ALTER TABLE `detail_belanja`
  ADD PRIMARY KEY (`iddbelanja`),
  ADD KEY `idbelanja` (`idbelanja`),
  ADD KEY `iddrab` (`iddrab`);

--
-- Indexes for table `detail_keluar`
--
ALTER TABLE `detail_keluar`
  ADD KEY `idbrg_keluar` (`idbrg_keluar`,`kode_barang`),
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `detail_masuk`
--
ALTER TABLE `detail_masuk`
  ADD KEY `idbrg_masuk` (`idbrg_masuk`,`iddbelanja`),
  ADD KEY `iddbelanja` (`iddbelanja`);

--
-- Indexes for table `detail_rab`
--
ALTER TABLE `detail_rab`
  ADD PRIMARY KEY (`iddrab`),
  ADD KEY `idrab` (`idrab`),
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`idusers`),
  ADD KEY `IDUnit` (`idunit`);

--
-- Indexes for table `rab`
--
ALTER TABLE `rab`
  ADD PRIMARY KEY (`idrab`),
  ADD KEY `idunit` (`idunit`);

--
-- Indexes for table `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`idsuplier`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`idunit`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD CONSTRAINT `barang_keluar_ibfk_1` FOREIGN KEY (`idusers`) REFERENCES `pengguna` (`idusers`),
  ADD CONSTRAINT `barang_keluar_ibfk_2` FOREIGN KEY (`idunit`) REFERENCES `unit` (`idunit`);

--
-- Constraints for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `barang_masuk_ibfk_1` FOREIGN KEY (`idusers`) REFERENCES `pengguna` (`idusers`),
  ADD CONSTRAINT `barang_masuk_ibfk_2` FOREIGN KEY (`idbelanja`) REFERENCES `belanja` (`idbelanja`);

--
-- Constraints for table `belanja`
--
ALTER TABLE `belanja`
  ADD CONSTRAINT `belanja_ibfk_1` FOREIGN KEY (`idsuplier`) REFERENCES `suplier` (`idsuplier`);

--
-- Constraints for table `detail_belanja`
--
ALTER TABLE `detail_belanja`
  ADD CONSTRAINT `detail_belanja_ibfk_1` FOREIGN KEY (`idbelanja`) REFERENCES `belanja` (`idbelanja`),
  ADD CONSTRAINT `detail_belanja_ibfk_2` FOREIGN KEY (`iddrab`) REFERENCES `detail_rab` (`iddrab`);

--
-- Constraints for table `detail_keluar`
--
ALTER TABLE `detail_keluar`
  ADD CONSTRAINT `detail_keluar_ibfk_1` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`),
  ADD CONSTRAINT `detail_keluar_ibfk_2` FOREIGN KEY (`idbrg_keluar`) REFERENCES `barang_keluar` (`idbrg_keluar`);

--
-- Constraints for table `detail_masuk`
--
ALTER TABLE `detail_masuk`
  ADD CONSTRAINT `detail_masuk_ibfk_1` FOREIGN KEY (`iddbelanja`) REFERENCES `detail_belanja` (`iddbelanja`),
  ADD CONSTRAINT `detail_masuk_ibfk_2` FOREIGN KEY (`idbrg_masuk`) REFERENCES `barang_masuk` (`idbrg_masuk`);

--
-- Constraints for table `detail_rab`
--
ALTER TABLE `detail_rab`
  ADD CONSTRAINT `detail_rab_ibfk_1` FOREIGN KEY (`idrab`) REFERENCES `rab` (`idrab`),
  ADD CONSTRAINT `detail_rab_ibfk_2` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`);

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`idunit`) REFERENCES `unit` (`idunit`),
  ADD CONSTRAINT `pengguna_ibfk_2` FOREIGN KEY (`idunit`) REFERENCES `unit` (`idunit`);

--
-- Constraints for table `rab`
--
ALTER TABLE `rab`
  ADD CONSTRAINT `rab_ibfk_1` FOREIGN KEY (`idunit`) REFERENCES `unit` (`idunit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
