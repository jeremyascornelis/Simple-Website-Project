-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2022 at 02:06 PM
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
-- Database: `uts_12415`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode_barang` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `jml_stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama`, `harga`, `gambar`, `jml_stok`) VALUES
(1, 'Aglonema Khocin', 60000, '625ea22d54ec3.jpg', 12),
(2, 'Aglonema Bigroy', 60000, '625ea244b28a8.jpg', 15),
(3, 'Aglonema Suksom', 35000, '625ea27a7db54.jpg', 10),
(4, 'Aglonema Ayunindi', 35000, '625ea2944cfd4.jpg', 17),
(6, 'Aglonema Super White', 90000, '625ea470dda6d.jpg', 12);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `kode_user` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(80) NOT NULL,
  `telp` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `peran` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`kode_user`, `nama`, `email`, `telp`, `password`, `peran`) VALUES
(1, 'Jeremyas Cornelis', 'jeremyasjimi9a@gmail.com', '0895804965391', '$2y$10$f/HvN4506QcT3Nz0cEdfU.Rl0MiGiE8McFN86dZgScMrm7HXUMXsK', 'admin toko'),
(2, 'kevin setiadi', 'kevinset@gmail.com', '08956789351', '$2y$10$Qw53GkDKB/LIm7sCLLySReofbDZGUeEBSzXzi/fF0NhywcciI/GFy', 'marketing'),
(3, 'naufal fawwazi', 'faw10zi@gmail.com', '082287708760', '$2y$10$sTvsM5D/fl7nd9jaktPtN.n12fUiNB2tM/6RVB.JCViLBoy1badE2', 'Programmer'),
(5, 'augusta steven', 'stevenasb02@gmail.com', '08952358049', '$2y$10$hQG7OF0gBUSNCyFyTuR0juXAHVABFX1zHbcUdVzyhjMIQV2pblIdG', 'Ahli Tanam'),
(6, 'angga', 'angga@gmail.com', '08742437891', '$2y$10$BdyFROEqntbDo8KgIaAziOOxwfMIcPdFJqaKcoagpikmOQLy1VNJq', 'kasir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`kode_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `kode_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `kode_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
