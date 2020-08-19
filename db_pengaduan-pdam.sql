-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2020 at 06:06 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pengaduan-pdam`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Bocor Pipa Distribusi', '2020-08-06 06:20:30', '2020-08-06 06:20:30'),
(2, 'Bocor Pipa Dinas', '2020-08-06 06:20:42', '2020-08-06 06:20:42'),
(3, 'Bocor Instalasi Meter', '2020-08-06 06:20:51', '2020-08-06 06:20:51'),
(4, 'Meter Pecah, Buram, Dll.', '2020-08-06 06:21:25', '2020-08-06 06:21:25'),
(5, 'Kesalahan Angka Meter', '2020-08-06 06:21:38', '2020-08-06 06:21:38'),
(6, 'Kesalahan Input Rekening', '2020-08-06 06:21:56', '2020-08-06 06:21:56'),
(7, 'Tekanan Air Lemah', '2020-08-06 06:22:11', '2020-08-06 06:22:11'),
(8, 'Tidak Ada Air', '2020-08-06 06:22:29', '2020-08-06 06:22:29'),
(9, 'Pemakaian Tinggi', '2020-08-06 06:22:39', '2020-08-06 06:22:39');

-- --------------------------------------------------------

--
-- Table structure for table `meter_pelanggan`
--

CREATE TABLE `meter_pelanggan` (
  `id` int(11) UNSIGNED NOT NULL,
  `tanggal_meter` date NOT NULL,
  `meter` varchar(255) NOT NULL,
  `no_sambung` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `meter_pelanggan`
--

INSERT INTO `meter_pelanggan` (`id`, `tanggal_meter`, `meter`, `no_sambung`, `created_at`, `updated_at`) VALUES
(1, '2020-08-11', '100000', '0001', '2020-08-11 08:35:39', '2020-08-11 08:35:39'),
(2, '2020-08-12', '150000', '0002', '2020-08-11 08:35:39', '2020-08-11 08:35:39');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` text NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(27, '2020-07-22-051658', 'App\\Database\\Migrations\\Pelanggan', 'default', 'App', 1597150566, 1),
(28, '2020-07-22-051710', 'App\\Database\\Migrations\\Petugas', 'default', 'App', 1597150566, 1),
(29, '2020-07-22-051720', 'App\\Database\\Migrations\\Kategori', 'default', 'App', 1597150566, 1),
(30, '2020-07-22-051729', 'App\\Database\\Migrations\\Pengaduan', 'default', 'App', 1597150566, 1),
(31, '2020-08-06-110305', 'App\\Database\\Migrations\\MeterPelanggan', 'default', 'App', 1597150567, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) UNSIGNED NOT NULL,
  `no_sambung` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `no_hp` char(15) NOT NULL,
  `alamat` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `no_sambung`, `nama_lengkap`, `jenis_kelamin`, `no_hp`, `alamat`, `created_at`, `updated_at`) VALUES
(1, '0001', 'Rahmat Triadi', 'L', '0852xxxxxxxx', 'Jl. Kh. Adam Zakaria', '2020-08-11 08:07:12', '2020-08-11 08:07:23'),
(2, '0002', 'Muh. Harto Sulila', 'L', '0852xxxxxxxx', 'Jl. JDS', '2020-08-11 08:07:12', '2020-08-11 08:07:12');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) UNSIGNED NOT NULL,
  `tanggal_pengaduan` date NOT NULL,
  `no_sambung` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `pengaduan` varchar(255) NOT NULL,
  `penyelesaian_pengaduan` text DEFAULT NULL,
  `id_petugas` int(11) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` tinyint(1) NOT NULL,
  `nama_lengkap_petugas` varchar(255) NOT NULL,
  `jenis_kelamin_petugas` char(1) NOT NULL,
  `no_hp_petugas` char(15) NOT NULL,
  `alamat_petugas` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `level`, `nama_lengkap_petugas`, `jenis_kelamin_petugas`, `no_hp_petugas`, `alamat_petugas`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 0, 'Administrator', 'L', '0852xxxxxxxx', 'Jl. Kh. Adam Zakaria, Kel. Dembe Jaya, Kec. Kota Utara, Kota Gorontalo', '2020-08-11 00:00:00', NULL),
(2, 'pimpinan', '59335c9f58c78597ff73f6706c6c8fa278e08b3a', 1, 'Pimpinan PDAM', 'P', '0853xxxxxxxx', 'Jl. Taman Surya', '2020-08-11 21:29:02', '2020-08-11 21:29:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `meter_pelanggan`
--
ALTER TABLE `meter_pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `meter_pelanggan`
--
ALTER TABLE `meter_pelanggan`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
