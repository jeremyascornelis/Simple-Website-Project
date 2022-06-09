-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2022 at 04:59 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dborder`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) DEFAULT NULL,
  `hrg` double DEFAULT NULL,
  `jml` int(11) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama`, `hrg`, `jml`, `keterangan`, `foto`) VALUES
(1, 'aglonema Suksom', 45000, 15, 'Edisi Premium', 'aglonemaSuksom.jpg'),
(2, 'aglonema Rotundum Aceh', 30000, 10, '-', 'aglonemaRotundumAceh.jpg'),
(4, 'aglonemaSnowWhiteRemaja', 77, 10, '-', 'aglonemaSnowWhiteRemaja.jpg'),
(5, 'aglonemaSuperWhite', 90000, 50, '-', 'aglonemaSuperWhite.jpg'),
(6, 'aglonemaVenus', 90000, 10, '77', 'aglonemaVenus.jpg'),
(7, 'aglonemaRedAnjamaniDewasa', 75000, 10, '-', 'aglonemaRedAnjamaniDewasa.jpg'),
(9, 'Algonema Ayunindi', NULL, 20, 'Langka', 'aglonemaAyunindi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `nama_member` varchar(40) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `telp` varchar(30) DEFAULT NULL,
  `alamat` varchar(60) DEFAULT NULL,
  `kota` varchar(40) DEFAULT NULL,
  `provinsi` varchar(40) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `userName` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `nama_member`, `email`, `telp`, `alamat`, `kota`, `provinsi`, `gender`, `userName`, `password`) VALUES
(1, 'Jeremyas Cornelis', 'jeremyasjimi9a@gmail.com', '0895804965392', 'Plamongan Indah Blok C 13 No 28', 'Semarang', 'Jawa Tengah', 'Laki-Laki', 'jercor15', '1234'),
(2, 'Steven Benedict', 'steven02asb@gmail.com', '089589032432', 'Arya Mukti Timur No.56 ', 'Semarang', 'Jawa Tengah', 'Laki-Laki', 'darkchie', 'steven234'),
(3, 'Naufal Fawwazi', 'naufalfawwaz@gmail.com', '0895804965389', 'Jl. Imam Bonjol No.207', 'Semarang', 'Jawa Tengah', 'Laki-Laki', 'nopal45', '5678'),
(4, 'Kevin Setiadi', 'kevset02@gmail.com', '08882537177', 'Semarang Indah Blok E3', 'Semarang', 'Jawa Tengah', 'Laki-Laki', 'keset02', 'kevin2409'),
(5, 'Putri', 'pockypoem10@gmail.com', '0895804965391', 'Jl. Imam Bonjol No.207, Pendrikan Kidul, Kec. Semarang Tenga', 'Semarang', 'Jawa Tengah', 'Perempuan', 'putri02', '123456'),
(6, 'Mikael Ronald', 'mikaelnal12@gmail.com', '08999567821', 'Perumahan Makmur Blok B5 No. 12A', 'Banyumanik', 'Jawa Tengah', 'Laki-Laki', 'miky30', '12345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
